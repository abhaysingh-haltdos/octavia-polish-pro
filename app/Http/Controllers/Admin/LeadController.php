<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LeadController extends Controller
{
    /**
     * Display a listing of inbound client leads.
     */
    public function index(Request $request): View
    {
        $query = Lead::orderByDesc('id');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('submission_id', 'like', "%{$search}%");
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $leads = $query->paginate(15)->withQueryString();
        $statusCounts = [
            'all' => Lead::count(),
            'new' => Lead::where('status', 'new')->count(),
            'contacted' => Lead::where('status', 'contacted')->count(),
            'qualified' => Lead::where('status', 'qualified')->count(),
            'closed' => Lead::where('status', 'closed')->count(),
            'archived' => Lead::where('status', 'archived')->count(),
        ];

        return view('admin.leads.index', compact('leads', 'statusCounts'));
    }

    /**
     * Display lead submission details.
     */
    public function show(Lead $lead): View
    {
        return view('admin.leads.show', compact('lead'));
    }

    /**
     * Update lead status and administrative notes.
     */
    public function update(Request $request, Lead $lead): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(['new', 'contacted', 'qualified', 'closed', 'archived'])],
            'admin_notes' => ['nullable', 'string'],
        ]);

        $oldStatus = $lead->status;
        $lead->update($validated);

        if ($oldStatus !== $lead->status) {
            AuditLogger::log('LEAD_STATUS_UPDATED', "Lead [{$lead->submission_id}] status changed from {$oldStatus} to {$lead->status}");
        } else {
            AuditLogger::log('LEAD_NOTES_UPDATED', "Admin notes updated for lead [{$lead->submission_id}]");
        }

        return redirect()->route('admin.leads.show', $lead)->with('success', "Lead #{$lead->submission_id} updated.");
    }

    /**
     * Export leads dataset to CSV format.
     */
    public function export(Request $request): StreamedResponse
    {
        AuditLogger::log('LEADS_EXPORTED', "Leads dataset exported to CSV by admin");

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="leads_export_' . date('Y-m-d_His') . '.csv"',
        ];

        return Response::stream(function () {
            $handle = fopen('php://output', 'w');
            // Write UTF-8 BOM for Microsoft Excel compatibility
            fwrite($handle, "\xEF\xBB\xBF");
            fputcsv($handle, ['Submission ID', 'Full Name', 'Email', 'Phone', 'Company', 'Service Category', 'Status', 'Message', 'Source Form', 'Source URL', 'IP Address', 'Created At'], ',', '"', '\\');

            Lead::orderByDesc('id')->chunk(200, function ($leads) use ($handle) {
                foreach ($leads as $lead) {
                    fputcsv($handle, [
                        $lead->submission_id,
                        $lead->full_name,
                        $lead->email,
                        $lead->phone,
                        $lead->company,
                        $lead->service_category,
                        $lead->status,
                        $lead->message,
                        $lead->source_form,
                        $lead->source_url,
                        $lead->ip_address,
                        $lead->created_at?->toDateTimeString(),
                    ], ',', '"', '\\');
                }
            });

            fclose($handle);
        }, 200, $headers);
    }

    /**
     * Download Excel (.xlsx) spreadsheet of all leads.
     */
    public function exportExcel(\App\Services\LeadSpreadsheetService $spreadsheetService): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        AuditLogger::log('LEADS_EXCEL_EXPORTED', "Leads dataset exported to XLSX Excel sheet by admin");

        $spreadsheetService->syncAllLeads();
        $xlsxPath = $spreadsheetService->getXlsxPath();

        return response()->download($xlsxPath, 'octavia_leads_' . date('Y-m-d_His') . '.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }
}
