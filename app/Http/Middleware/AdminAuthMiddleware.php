<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthenticated.'], 401);
            }
            return redirect()->guest(route('admin.login'))->with('error', 'Please log in to access the control panel.');
        }

        $user = Auth::user();

        // Check active status
        if ($user->status !== 'active') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            if ($request->expectsJson()) {
                return response()->json(['error' => 'Your account has been deactivated.'], 403);
            }
            return redirect()->route('admin.login')->with('error', 'Your account has been deactivated. Please contact an administrator.');
        }

        // Check administrative role
        $allowedRoles = ['super_admin', 'admin', 'editor', 'author'];
        if (!in_array($user->role, $allowedRoles)) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthorized access.'], 403);
            }
            return redirect()->route('admin.login')->with('error', 'Access denied. You do not have administrative privileges.');
        }

        return $next($request);
    }
}
