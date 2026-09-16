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
            'email' => 'nullable|email|max:100',
            'workEmail' => 'nullable|email|max:100',
            'work_email' => 'nullable|email|max:100',
            'phone' => 'nullable|string|max:30',
            'company' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'topic' => 'nullable|string|max:100',
            'serviceCategory' => 'nullable|string|max:100',
            'service_category' => 'nullable|string|max:100',
            'message' => 'nullable|string|max:5000',
            'sourceForm' => 'nullable|string|max:100',
            'sourceUrl' => 'nullable|string|max:500',
            'userCaptchaAnswer' => 'nullable|numeric',
            'expectedCaptchaAnswer' => 'nullable|numeric',
        ]);

        $email = $validated['email'] ?? $validated['workEmail'] ?? $validated['work_email'] ?? null;
        if (!$email) {
            return response()->json([
                'success' => false,
                'message' => 'A valid email address is required.',
            ], 422);
        }

        // Server-side Math Captcha Verification
        if (isset($validated['userCaptchaAnswer']) && isset($validated['expectedCaptchaAnswer'])) {
            if ((int)$validated['userCaptchaAnswer'] !== (int)$validated['expectedCaptchaAnswer']) {
                return response()->json([
                    'success' => false,
                    'message' => 'Incorrect security check answer. Please try again.',
                ], 422);
            }
        }

        $fullName = $validated['fullName'] ?? $validated['full_name'] ?? 'Inquirer';
        $submissionId = 'LEAD-' . strtoupper(substr(md5(uniqid((string)mt_rand(), true)), 0, 7));

        $serviceCategory = $validated['serviceCategory'] 
            ?? $validated['service_category'] 
            ?? $validated['topic'] 
            ?? 'General Inquiry';

        $notes = [];
        if (!empty($validated['country'])) {
            $notes[] = 'Country: ' . $validated['country'];
        }

        $lead = Lead::create([
            'submission_id' => $submissionId,
            'source_form' => $validated['sourceForm'] ?? 'Website Inquiry',
            'source_url' => $validated['sourceUrl'] ?? $request->header('referer'),
            'full_name' => $fullName,
            'email' => $email,
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'service_category' => $serviceCategory,
            'message' => $validated['message'] ?? null,
            'admin_notes' => !empty($notes) ? implode(' | ', $notes) : null,
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
