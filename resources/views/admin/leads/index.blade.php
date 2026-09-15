@extends('admin.layouts.app')

@section('title', 'Client Inquiries & Leads')
@section('page-title', 'Inbound Leads')

@section('content')
<div class="space-y-6">

    <!-- Header & Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-lg font-bold text-white">Client Inquiries & Leads</h1>
            <p class="text-xs text-slate-400">Track and manage contact requests, enterprise inquiries, and consulting opportunities.</p>
        </div>
        <a href="{{ route('admin.leads.export') }}" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-semibold text-xs transition-all border border-slate-700 flex items-center gap-2 self-start shadow-sm">
            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            <span>Export CSV Dataset</span>
        </a>
    </div>

    <!-- Status Tabs Bar -->
    <div class="flex items-center gap-2 overflow-x-auto pb-1">
        <a href="{{ route('admin.leads.index') }}" class="px-3.5 py-1.5 rounded-xl text-xs font-semibold whitespace-nowrap transition-all flex items-center gap-2 {{ !request('status') ? 'bg-amber-500/15 text-amber-400 border border-amber-500/30' : 'bg-slate-900/60 text-slate-400 hover:text-white border border-slate-800' }}">
            <span>All Inquiries</span>
            <span class="px-1.5 py-0.2 rounded-full bg-slate-800 text-[10px]">{{ $statusCounts['all'] }}</span>
        </a>

        @foreach(['new' => 'New', 'contacted' => 'Contacted', 'qualified' => 'Qualified', 'closed' => 'Closed', 'archived' => 'Archived'] as $key => $label)
            <a href="{{ route('admin.leads.index', ['status' => $key]) }}" class="px-3.5 py-1.5 rounded-xl text-xs font-semibold whitespace-nowrap transition-all flex items-center gap-2 {{ request('status') === $key ? 'bg-amber-500/15 text-amber-400 border border-amber-500/30' : 'bg-slate-900/60 text-slate-400 hover:text-white border border-slate-800' }}">
                <span>{{ $label }}</span>
                <span class="px-1.5 py-0.2 rounded-full {{ $key === 'new' && $statusCounts['new'] > 0 ? 'bg-emerald-500/20 text-emerald-400 font-bold' : 'bg-slate-800' }} text-[10px]">
                    {{ $statusCounts[$key] }}
                </span>
            </a>
        @endforeach
    </div>

    <!-- Search Form -->
    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-4">
        <form method="GET" action="{{ route('admin.leads.index') }}" class="relative max-w-sm">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by name, email, company, submission ID..."
                class="w-full pl-9 pr-4 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
            />
            <svg class="w-4 h-4 absolute left-3 top-2.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </form>
    </div>

    <!-- Leads Table -->
    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900/80 border-b border-slate-800 text-slate-400">
                    <tr>
                        <th class="py-3 px-4 font-semibold">Submission ID</th>
                        <th class="py-3 px-4 font-semibold">Prospect</th>
                        <th class="py-3 px-4 font-semibold">Company</th>
                        <th class="py-3 px-4 font-semibold">Interest / Service</th>
                        <th class="py-3 px-4 font-semibold">Status</th>
                        <th class="py-3 px-4 font-semibold">Received</th>
                        <th class="py-3 px-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($leads as $lead)
                        <tr class="hover:bg-slate-800/25 transition-colors">
                            <td class="py-3.5 px-4 font-mono text-slate-400 text-[11px]">
                                #{{ $lead->submission_id }}
                            </td>
                            <td class="py-3.5 px-4">
                                <div class="font-bold text-white">{{ $lead->full_name }}</div>
                                <div class="text-[11px] text-slate-400 flex items-center gap-2">
                                    <span>{{ $lead->email }}</span>
                                    @if($lead->phone)
                                        <span>&bull;</span>
                                        <span>{{ $lead->phone }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3.5 px-4 text-slate-300">
                                {{ $lead->company ?: '—' }}
                            </td>
                            <td class="py-3.5 px-4 text-slate-300">
                                <span class="px-2 py-0.5 rounded-md bg-slate-800 text-[10px] border border-slate-700">
                                    {{ $lead->service_category ?: 'General Inquiry' }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4">
                                @if($lead->status === 'new')
                                    <span class="px-2 py-0.5 rounded-full bg-emerald-500/15 text-emerald-400 font-bold text-[10px] border border-emerald-500/30">New</span>
                                @elseif($lead->status === 'contacted')
                                    <span class="px-2 py-0.5 rounded-full bg-blue-500/15 text-blue-400 font-bold text-[10px] border border-blue-500/30">Contacted</span>
                                @elseif($lead->status === 'qualified')
                                    <span class="px-2 py-0.5 rounded-full bg-amber-500/15 text-amber-400 font-bold text-[10px] border border-amber-500/30">Qualified</span>
                                @elseif($lead->status === 'closed')
                                    <span class="px-2 py-0.5 rounded-full bg-purple-500/15 text-purple-400 font-bold text-[10px] border border-purple-500/30">Closed</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full bg-slate-800 text-slate-400 text-[10px]">Archived</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-slate-400">
                                {{ $lead->created_at?->format('M d, Y H:i') }}
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <a href="{{ route('admin.leads.show', $lead) }}" class="text-xs font-semibold text-amber-400 hover:text-amber-300 transition-colors">
                                    View Details &rarr;
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-10 text-center text-slate-500">
                                No inbound leads matching criteria.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($leads->hasPages())
            <div class="p-4 border-t border-slate-800 bg-slate-900/40">
                {{ $leads->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
