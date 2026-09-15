<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Display the admin login form.
     */
    public function showLogin(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    /**
     * Handle admin login submission with rate limiting and audit logging.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $throttleKey = Str::transliterate(Str::lower($request->input('login')) . '|' . $request->ip());

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            AuditLogger::log('LOGIN_THROTTLED', "Too many failed login attempts from IP: {$request->ip()}");
            return back()->withInput($request->only('login'))
                ->with('error', "Too many login attempts. Please try again in {$seconds} seconds.");
        }

        $loginInput = $request->input('login');
        $field = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $user = User::where($field, $loginInput)->first();

        if (!$user || !Auth::attempt([$field => $loginInput, 'password' => $request->input('password')], $request->boolean('remember'))) {
            RateLimiter::hit($throttleKey, 60);
            AuditLogger::log('LOGIN_FAILED', "Failed login attempt for [{$loginInput}] from IP: {$request->ip()}");
            return back()->withInput($request->only('login'))
                ->with('error', 'The provided credentials do not match our records.');
        }

        if ($user->status !== 'active') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            AuditLogger::log('LOGIN_BLOCKED', "Blocked login on deactivated account: {$user->email}", $user);
            return back()->with('error', 'Your account has been deactivated. Please contact an administrator.');
        }

        $allowedRoles = ['super_admin', 'admin', 'editor', 'author'];
        if (!in_array($user->role, $allowedRoles)) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            AuditLogger::log('LOGIN_UNAUTHORIZED_ROLE', "User [{$user->email}] lacks administrative role", $user);
            return back()->with('error', 'Access denied. You do not have administrative privileges.');
        }

        RateLimiter::clear($throttleKey);
        $request->session()->regenerate();

        $user->update(['last_login_at' => now()]);
        AuditLogger::log('LOGIN_SUCCESS', "Admin logged in successfully: {$user->email} (Role: {$user->role})", $user);

        return redirect()->intended(route('admin.dashboard'))->with('success', "Welcome back, {$user->name}!");
    }

    /**
     * Log the admin user out.
     */
    public function logout(Request $request): RedirectResponse
    {
        $user = Auth::user();
        if ($user) {
            AuditLogger::log('LOGOUT', "Admin logged out: {$user->email}", $user);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'You have been safely logged out.');
    }
}
