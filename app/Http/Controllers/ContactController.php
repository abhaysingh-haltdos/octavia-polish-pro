<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display contact page
     */
    public function index(): View
    {
        return view('pages.contact');
    }

    /**
     * Handle lead inquiry submission
     */
    public function submit(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'fullName' => 'nullable|string|max:100',
            'full_name' => 'nullable|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:30',
            'company' => 'nullable|string|max:100',
            'serviceCategory' => 'nullable|string|max:100',
            'service_category' => 'nullable|string|max:100',
            'message' => 'nullable|string',
            'sourceForm' => 'nullable|string|max:100',
            'sourceUrl' => 'nullable|string',
            'userCaptchaAnswer' => 'nullable|numeric',
            'expectedCaptchaAnswer' => 'nullable|numeric',
        ]);

        $fullName = $validated['fullName'] ?? $validated['full_name'] ?? 'Inquirer';
        $submissionId = 'LEAD-' . strtoupper(substr(md5(uniqid((string)mt_rand(), true)), 0, 7));

        $lead = Lead::create([
            'submission_id' => $submissionId,
            'source_form' => $validated['sourceForm'] ?? 'Website Inquiry',
            'source_url' => $validated['sourceUrl'] ?? $request->header('referer'),
            'full_name' => $fullName,
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'service_category' => $validated['serviceCategory'] ?? $validated['service_category'] ?? 'General Inquiry',
            'message' => $validated['message'] ?? null,
            'status' => 'new',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thank you! Your request has been securely submitted. A solutions architect will contact you within 24 hours.',
            'submissionId' => $submissionId,
            'dbSaved' => true,
        ]);
    }
}
