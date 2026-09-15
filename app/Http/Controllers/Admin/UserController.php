<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of system users.
     */
    public function index(Request $request): View
    {
        $query = User::orderBy('name');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('username', 'like', "%{$search}%");
            });
        }

        if ($role = $request->input('role')) {
            $query->where('role', $role);
        }

        $users = $query->paginate(15)->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create(): View
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'username' => ['nullable', 'string', 'max:50', 'unique:users,username'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', Password::min(8)],
            'role' => ['required', Rule::in(['super_admin', 'admin', 'editor', 'author'])],
            'status' => ['required', Rule::in(['active', 'disabled'])],
            'designation' => ['nullable', 'string', 'max:100'],
            'avatar' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:600'],
        ]);

        $validated['username'] = !empty($validated['username'])
            ? Str::slug($validated['username'], '_')
            : Str::slug($validated['name'], '_');

        $validated['password'] = Hash::make($validated['password']);

        $newUser = User::create($validated);
        AuditLogger::log('USER_CREATED', "New user created: [{$newUser->email}] with role [{$newUser->role}]");

        return redirect()->route('admin.users.index')->with('success', "User '{$newUser->name}' created successfully.");
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user): View
    {
        $currentUser = Auth::user();

        // Non-super-admins cannot edit super admins
        if ($currentUser->role !== 'super_admin' && $user->role === 'super_admin') {
            abort(403, 'You are not authorized to modify a Super Administrator account.');
        }

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $currentUser = Auth::user();

        if ($currentUser->role !== 'super_admin' && $user->role === 'super_admin') {
            abort(403, 'You are not authorized to modify a Super Administrator account.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'username' => ['nullable', 'string', 'max:50', Rule::unique('users', 'username')->ignore($user->id)],
            'email' => ['required', 'email', 'max:100', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', Password::min(8)],
            'role' => ['required', Rule::in(['super_admin', 'admin', 'editor', 'author'])],
            'status' => ['required', Rule::in(['active', 'disabled'])],
            'designation' => ['nullable', 'string', 'max:100'],
            'avatar' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:600'],
        ]);

        // Guard against removing/demoting the LAST active super_admin
        if ($user->role === 'super_admin' && ($validated['role'] !== 'super_admin' || $validated['status'] !== 'active')) {
            $activeSuperAdmins = User::where('role', 'super_admin')->where('status', 'active')->count();
            if ($activeSuperAdmins <= 1) {
                return back()->withInput()->with('error', 'Cannot demote or deactivate the last active Super Administrator.');
            }
        }

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);
        AuditLogger::log('USER_UPDATED', "User updated: [{$user->email}]");

        return redirect()->route('admin.users.index')->with('success', "User '{$user->name}' updated successfully.");
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $currentUser = Auth::user();

        if ($user->id === $currentUser->id) {
            return back()->with('error', 'You cannot delete your own active account.');
        }

        if ($user->role === 'super_admin') {
            $activeSuperAdmins = User::where('role', 'super_admin')->where('status', 'active')->count();
            if ($activeSuperAdmins <= 1) {
                return back()->with('error', 'Cannot delete the last active Super Administrator.');
            }
        }

        $name = $user->name;
        $email = $user->email;
        $user->delete();

        AuditLogger::log('USER_DELETED', "User deleted: [{$email}] ({$name})");

        return redirect()->route('admin.users.index')->with('success', "User '{$name}' was deleted.");
    }
}
