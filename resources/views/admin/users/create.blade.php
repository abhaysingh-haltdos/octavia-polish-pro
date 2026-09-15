@extends('admin.layouts.app')

@section('title', 'Create User')
@section('page-title', 'Create User')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-lg font-bold text-white">Add New User</h1>
            <p class="text-xs text-slate-400">Create a new team member with specific administrative or authoring permissions.</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-colors border border-slate-700">
            &larr; Back to Users
        </a>
    </div>

    <form method="POST" action="{{ route('admin.users.store') }}" class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 space-y-5">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="name" class="block text-xs font-semibold text-slate-200 mb-1">Full Name <span class="text-rose-400">*</span></label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    placeholder="e.g. Sarah Connor"
                    class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                />
            </div>

            <div>
                <label for="username" class="block text-xs font-semibold text-slate-200 mb-1">Username (Optional)</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="e.g. sconnor"
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
                    value="{{ old('email') }}"
                    required
                    placeholder="sarah@octaviatechnologies.com"
                    class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                />
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-slate-200 mb-1">Password <span class="text-rose-400">*</span></label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    placeholder="Minimum 8 characters"
                    class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="role" class="block text-xs font-semibold text-slate-200 mb-1">Assigned Role <span class="text-rose-400">*</span></label>
                <select id="role" name="role" required class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                    <option value="author" {{ old('role') === 'author' ? 'selected' : '' }}>Author (Can write & edit own blog posts)</option>
                    <option value="editor" {{ old('role') === 'editor' ? 'selected' : '' }}>Editor (Can manage all content, pages, blogs)</option>
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin (Can manage settings, leads, users)</option>
                    @if(auth()->user()->role === 'super_admin')
                        <option value="super_admin" {{ old('role') === 'super_admin' ? 'selected' : '' }}>Super Admin (Unrestricted Full Access)</option>
                    @endif
                </select>
            </div>

            <div>
                <label for="status" class="block text-xs font-semibold text-slate-200 mb-1">Account Status <span class="text-rose-400">*</span></label>
                <select id="status" name="status" required class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                    <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="disabled" {{ old('status') === 'disabled' ? 'selected' : '' }}>Disabled (Cannot sign in)</option>
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
                    value="{{ old('designation') }}"
                    placeholder="e.g. Lead Cloud Architect"
                    class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                />
            </div>

            <div>
                <label for="avatar" class="block text-xs font-semibold text-slate-200 mb-1">Avatar Image URL</label>
                <input
                    type="text"
                    id="avatar"
                    name="avatar"
                    value="{{ old('avatar') }}"
                    placeholder="/uploads/avatar.jpg"
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
                placeholder="Short bio shown at the footer of authored blog articles..."
                class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
            >{{ old('bio') }}</textarea>
        </div>

        <div class="pt-4 border-t border-slate-800 flex justify-end">
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20">
                Create User
            </button>
        </div>
    </form>

</div>
@endsection
