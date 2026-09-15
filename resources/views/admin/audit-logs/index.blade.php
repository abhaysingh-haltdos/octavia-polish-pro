@extends('admin.layouts.app')

@section('title', 'Security & Audit Trail')
@section('page-title', 'System Audit Trail')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-lg font-bold text-white">System Audit Trail</h1>
            <p class="text-xs text-slate-400">Chronological, tamper-evident log of administrative logins, content updates, and security events.</p>
        </div>
    </div>

    <!-- Filters & Search -->
    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-4">
        <form method="GET" action="{{ route('admin.audit-logs.index') }}" class="flex flex-col sm:flex-row gap-3 items-center justify-between">
            <div class="relative w-full sm:w-80">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search logs by keyword, user, or IP..."
                    class="w-full pl-9 pr-4 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                />
                <svg class="w-4 h-4 absolute left-3 top-2.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>

            <div class="flex items-center gap-3 w-full sm:w-auto">
                <select name="action" onchange="this.form.submit()" class="px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-slate-300 focus:outline-none focus:border-amber-500 font-mono">
                    <option value="">All Actions</option>
                    @foreach($distinctActions as $act)
                        <option value="{{ $act }}" {{ request('action') === $act ? 'selected' : '' }}>{{ $act }}</option>
                    @endforeach
                </select>

                @if(request('search') || request('action'))
                    <a href="{{ route('admin.audit-logs.index') }}" class="text-xs text-slate-400 hover:text-white px-2 py-1">Clear</a>
                @endif
            </div>
        </form>
    </div>

    <!-- Audit Table -->
    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900/80 border-b border-slate-800 text-slate-400">
                    <tr>
                        <th class="py-3 px-4 font-semibold">Timestamp</th>
                        <th class="py-3 px-4 font-semibold">Action</th>
                        <th class="py-3 px-4 font-semibold">Actor / User</th>
                        <th class="py-3 px-4 font-semibold">IP Address</th>
                        <th class="py-3 px-4 font-semibold">Activity Details</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($logs as $log)
                        <tr class="hover:bg-slate-800/25 transition-colors">
                            <td class="py-3 px-4 font-mono text-slate-400 whitespace-nowrap text-[11px]">
                                {{ $log->created_at?->format('Y-m-d H:i:s') }}
                            </td>
                            <td class="py-3 px-4 whitespace-nowrap">
                                @php
                                    $actionClass = 'bg-slate-800 text-slate-300 border-slate-700';
                                    if (str_contains($log->action, 'LOGIN_FAILED') || str_contains($log->action, 'THROTTLED') || str_contains($log->action, 'BLOCKED')) {
                                        $actionClass = 'bg-rose-500/15 text-rose-400 border-rose-500/30';
                                    } elseif (str_contains($log->action, 'DELETED')) {
                                        $actionClass = 'bg-red-500/15 text-red-300 border-red-500/30';
                                    } elseif (str_contains($log->action, 'CREATED') || str_contains($log->action, 'SUCCESS')) {
                                        $actionClass = 'bg-emerald-500/15 text-emerald-400 border-emerald-500/30';
                                    } elseif (str_contains($log->action, 'UPDATED') || str_contains($log->action, 'CHANGED')) {
                                        $actionClass = 'bg-amber-500/15 text-amber-300 border-amber-500/30';
                                    }
                                @endphp
                                <span class="px-2 py-0.5 rounded font-mono text-[10px] font-bold border {{ $actionClass }}">
                                    {{ $log->action }}
                                </span>
                            </td>
                            <td class="py-3 px-4 whitespace-nowrap">
                                <div class="font-bold text-white">{{ $log->user?->name ?: ($log->username ?: 'Anonymous') }}</div>
                                @if($log->user?->email)
                                    <div class="text-[10px] text-slate-500 font-mono">{{ $log->user->email }}</div>
                                @endif
                            </td>
                            <td class="py-3 px-4 font-mono text-slate-400 whitespace-nowrap text-[11px]">
                                {{ $log->ip_address ?: '127.0.0.1' }}
                            </td>
                            <td class="py-3 px-4 text-slate-200">
                                {{ $log->details }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-10 text-center text-slate-500">
                                No audit log records found matching the filter criteria.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($logs->hasPages())
            <div class="p-4 border-t border-slate-800 bg-slate-900/40">
                {{ $logs->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
