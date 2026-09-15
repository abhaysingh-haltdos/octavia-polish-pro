@extends('admin.layouts.app')

@section('title', 'Lead #' . $lead->submission_id)
@section('page-title', 'Lead Inquiries')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
            <h1 class="text-lg font-bold text-white">Lead Details</h1>
            <span class="font-mono text-xs text-amber-400 bg-amber-500/10 px-2 py-0.5 rounded-lg border border-amber-500/20">#{{ $lead->submission_id }}</span>
        </div>
        <a href="{{ route('admin.leads.index') }}" class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-colors border border-slate-700">
            &larr; Back to Leads
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Left: Prospect Submission Details (2 Cols) -->
        <div class="md:col-span-2 space-y-5">
            <!-- Details Card -->
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-4">
                <h2 class="text-xs font-bold uppercase tracking-wider text-slate-300">Client Submission Info</h2>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <span class="text-[11px] text-slate-500 block">Full Name</span>
                        <span class="text-xs font-bold text-white">{{ $lead->full_name }}</span>
                    </div>
                    <div>
                        <span class="text-[11px] text-slate-500 block">Company / Organization</span>
                        <span class="text-xs font-medium text-slate-200">{{ $lead->company ?: 'Not specified' }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <span class="text-[11px] text-slate-500 block">Email Address</span>
                        <a href="mailto:{{ $lead->email }}" class="text-xs font-medium text-amber-400 hover:underline">{{ $lead->email }}</a>
                    </div>
                    <div>
                        <span class="text-[11px] text-slate-500 block">Phone Number</span>
                        @if($lead->phone)
                            <a href="tel:{{ $lead->phone }}" class="text-xs font-medium text-slate-200 hover:text-white">{{ $lead->phone }}</a>
                        @else
                            <span class="text-xs text-slate-500">Not provided</span>
                        @endif
                    </div>
                </div>

                <div class="pt-2 border-t border-slate-800">
                    <span class="text-[11px] text-slate-500 block mb-1">Service of Interest</span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-800 text-xs text-white border border-slate-700 inline-block font-medium">
                        {{ $lead->service_category ?: 'General Inquiry' }}
                    </span>
                </div>

                <div class="pt-2 border-t border-slate-800">
                    <span class="text-[11px] text-slate-500 block mb-1">Inquiry Message</span>
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 text-xs text-slate-200 leading-relaxed whitespace-pre-wrap">
                        {{ $lead->message ?: 'No message body provided.' }}
                    </div>
                </div>
            </div>

            <!-- Technical / Tracking Origin Card -->
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-3 text-xs text-slate-400">
                <h3 class="font-bold uppercase tracking-wider text-[11px] text-slate-300">Technical Context</h3>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <span class="text-[11px] text-slate-500 block">Source Form</span>
                        <span class="text-slate-300 font-mono text-[11px]">{{ $lead->source_form ?: 'Website Contact' }}</span>
                    </div>
                    <div>
                        <span class="text-[11px] text-slate-500 block">IP Address</span>
                        <span class="text-slate-300 font-mono text-[11px]">{{ $lead->ip_address ?: 'Unknown' }}</span>
                    </div>
                </div>
                <div>
                    <span class="text-[11px] text-slate-500 block">Referral / Landing URL</span>
                    <span class="text-slate-300 font-mono text-[11px] break-all">{{ $lead->source_url ?: '/' }}</span>
                </div>
            </div>
        </div>

        <!-- Right: Status Update & Admin Notes (1 Col) -->
        <div class="space-y-5">
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-4">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-300">Lead Status & Notes</h3>

                <form method="POST" action="{{ route('admin.leads.update', $lead) }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="status" class="block text-xs font-semibold text-slate-400 mb-1">Pipeline Status</label>
                        <select id="status" name="status" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                            <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>New (Unread)</option>
                            <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="qualified" {{ $lead->status === 'qualified' ? 'selected' : '' }}>Qualified Opportunity</option>
                            <option value="closed" {{ $lead->status === 'closed' ? 'selected' : '' }}>Closed / Won</option>
                            <option value="archived" {{ $lead->status === 'archived' ? 'selected' : '' }}>Archived / Closed</option>
                        </select>
                    </div>

                    <div>
                        <label for="admin_notes" class="block text-xs font-semibold text-slate-400 mb-1">Internal Admin Notes</label>
                        <textarea
                            id="admin_notes"
                            name="admin_notes"
                            rows="5"
                            placeholder="Add notes about discovery call, budget discussion, assigned rep..."
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        >{{ old('admin_notes', $lead->admin_notes) }}</textarea>
                    </div>

                    <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20">
                        Update Lead Status
                    </button>
                </form>
            </div>

            <!-- Timestamp Info -->
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-4 text-[11px] text-slate-400 space-y-1.5">
                <div class="flex justify-between">
                    <span>Submitted:</span>
                    <span class="text-white">{{ $lead->created_at?->format('M d, Y H:i:s') }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Last Updated:</span>
                    <span class="text-white">{{ $lead->updated_at?->format('M d, Y H:i:s') }}</span>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
