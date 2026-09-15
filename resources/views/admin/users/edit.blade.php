@extends('admin.layouts.app')

@section('title', 'Edit User: ' . $user->name)
@section('page-title', 'Edit User')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-lg font-bold text-white">Edit User Profile</h1>
            <p class="text-xs text-slate-400">Modify user role, account status, contact details, or reset password.</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-colors border border-slate-700">
            &larr; Back to Users
        </a>
    </div>

    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 space-y-5">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="name" class="block text-xs font-semibold text-slate-200 mb-1">Full Name <span class="text-rose-400">*</span></label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    required
                    class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                />
            </div>

            <div>
                <label for="username" class="block text-xs font-semibold text-slate-200 mb-1">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username', $user->username) }}"
                    class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 font-mono"
                />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="email" class="block text-xs font-semibold text-slate-200 mb-1">Email Address <span class="text-rose-400">*</span></label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    required
                    class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                />
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-slate-200 mb-1">New Password (Optional)</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Leave blank to keep existing password"
                    class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="role" class="block text-xs font-semibold text-slate-200 mb-1">Assigned Role <span class="text-rose-400">*</span></label>
                <select id="role" name="role" required class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                    <option value="author" {{ old('role', $user->role) === 'author' ? 'selected' : '' }}>Author (Can write & edit own blog posts)</option>
                    <option value="editor" {{ old('role', $user->role) === 'editor' ? 'selected' : '' }}>Editor (Can manage all content, pages, blogs)</option>
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin (Can manage settings, leads, users)</option>
                    @if(auth()->user()->role === 'super_admin')
                        <option value="super_admin" {{ old('role', $user->role) === 'super_admin' ? 'selected' : '' }}>Super Admin (Unrestricted Full Access)</option>
                    @endif
                </select>
            </div>

            <div>
                <label for="status" class="block text-xs font-semibold text-slate-200 mb-1">Account Status <span class="text-rose-400">*</span></label>
                <select id="status" name="status" required class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                    <option value="active" {{ old('status', $user->status) === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="disabled" {{ old('status', $user->status) === 'disabled' ? 'selected' : '' }}>Disabled (Cannot sign in)</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="designation" class="block text-xs font-semibold text-slate-200 mb-1">Job Designation</label>
                <input
                    type="text"
                    id="designation"
                    name="designation"
                    value="{{ old('designation', $user->designation) }}"
                    class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                />
            </div>

            <div>
                <label for="avatar" class="block text-xs font-semibold text-slate-200 mb-1">Avatar Image URL</label>
                <input
                    type="text"
                    id="avatar"
                    name="avatar"
                    value="{{ old('avatar', $user->avatar) }}"
                    class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                />
            </div>
        </div>

        <div>
            <label for="bio" class="block text-xs font-semibold text-slate-200 mb-1">Author Bio</label>
            <textarea
                id="bio"
                name="bio"
                rows="3"
                class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
            >{{ old('bio', $user->bio) }}</textarea>
        </div>

        <div class="pt-4 border-t border-slate-800 flex justify-end">
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20">
                Update User
            </button>
        </div>
    </form>

</div>
@endsection
