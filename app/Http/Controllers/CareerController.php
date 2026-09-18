<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    /**
     * Display career opportunities & company culture listing
     */
    public function index(): View
    {
        $careersPath = storage_path('app/careers.json');
        $careers = File::exists($careersPath) ? json_decode(File::get($careersPath), true) : [];

        // Group categories for filtering
        $departments = array_values(array_unique(array_column($careers, 'department')));

        return view('pages.careers.index', [
            'careers' => $careers,
            'departments' => $departments,
            'title' => 'Careers & Engineering Culture | Octavia Tech Solutions',
        ]);
    }

    /**
     * Display a specific career profile / job specification
     */
    public function show(string $slug): View
    {
        $careersPath = storage_path('app/careers.json');
        $careers = File::exists($careersPath) ? json_decode(File::get($careersPath), true) : [];

        if (empty($careers[$slug])) {
            abort(404);
        }

        $job = $careers[$slug];

        // Other related jobs (excluding current)
        $relatedJobs = array_filter($careers, fn($item, $key) => $key !== $slug, ARRAY_FILTER_USE_BOTH);
        $relatedJobs = array_slice($relatedJobs, 0, 3, true);

        return view('pages.careers.show', [
            'job' => $job,
            'slug' => $slug,
            'relatedJobs' => $relatedJobs,
            'title' => "{$job['title']} Career Profile | Octavia Tech Solutions",
        ]);
    }

    /**
     * Handle job application form submission
     */
    public function apply(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:30',
            'experience' => 'required|string|max:50',
            'current_ctc' => 'required|string|max:50',
            'expected_ctc' => 'required|string|max:50',
            'notice_period' => 'nullable|string|max:50',
            'linkedin_url' => 'nullable|string|max:255',
            'introduction' => 'nullable|string|max:5000',
            'job_slug' => 'required|string|max:100',
            'job_title' => 'nullable|string|max:150',
            'userCaptchaAnswer' => 'nullable|numeric',
            'expectedCaptchaAnswer' => 'nullable|numeric',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        // Security Math Captcha Verification
        if (isset($validated['userCaptchaAnswer']) && isset($validated['expectedCaptchaAnswer'])) {
            if ((int)$validated['userCaptchaAnswer'] !== (int)$validated['expectedCaptchaAnswer']) {
                return response()->json([
                    'success' => false,
                    'message' => 'Incorrect security check answer. Please verify and try again.',
                ], 422);
            }
        }

        // Handle Resume Upload
        $resumeFileName = null;
        $resumeRelativePath = null;
        if ($request->hasFile('resume') && $request->file('resume')->isValid()) {
            $file = $request->file('resume');
            $extension = $file->getClientOriginalExtension();
            $safeSlug = Str::slug($validated['job_slug']);
            $safeName = Str::slug($validated['full_name']);
            $resumeFileName = "resume_{$safeSlug}_{$safeName}_" . time() . ".{$extension}";
            
            $resumesDir = storage_path('app/resumes');
            if (!File::isDirectory($resumesDir)) {
                File::makeDirectory($resumesDir, 0755, true);
            }
            
            $file->move($resumesDir, $resumeFileName);
            $resumeRelativePath = "storage/app/resumes/{$resumeFileName}";
        }

        $jobTitle = $validated['job_title'] ?? ucwords(str_replace('-', ' ', $validated['job_slug']));
        $submissionId = 'APP-' . strtoupper(substr(md5(uniqid((string)mt_rand(), true)), 0, 7));

        $intro = $validated['introduction'] ?? 'No introduction provided.';
        $linkedin = !empty($validated['linkedin_url']) ? "\nLinkedIn: {$validated['linkedin_url']}" : '';
        $resumeNote = $resumeFileName ? "\nResume File: {$resumeFileName}" : "\nResume: None attached";

        $fullMessage = "Job Role: {$jobTitle} ({$validated['job_slug']})\n" .
                       "Experience: {$validated['experience']} Years\n" .
                       "Current CTC: {$validated['current_ctc']}\n" .
                       "Expected CTC: {$validated['expected_ctc']}\n" .
                       "Notice Period: " . ($validated['notice_period'] ?? 'Immediate') . "\n" .
                       $linkedin . $resumeNote . "\n\n" .
                       "Applicant Introduction:\n{$intro}";

        $adminNotes = [
            "Role: {$jobTitle}",
            "Exp: {$validated['experience']}y",
            "CTC: {$validated['current_ctc']} -> {$validated['expected_ctc']}",
            "Notice: " . ($validated['notice_period'] ?? 'Immediate')
        ];
        if ($resumeFileName) {
            $adminNotes[] = "Resume: {$resumeFileName}";
        }

        $lead = Lead::create([
            'submission_id' => $submissionId,
            'source_form' => "Career Application: {$jobTitle}",
            'source_url' => $request->header('referer') ?? url("/career/{$validated['job_slug']}"),
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'company' => 'Candidate',
            'service_category' => "Careers - {$jobTitle}",
            'message' => $fullMessage,
            'admin_notes' => implode(' | ', $adminNotes),
            'status' => 'new',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return response()->json([
            'success' => true,
            'message' => "Thank you, {$validated['full_name']}! Your application for {$jobTitle} has been securely submitted. Our talent acquisition team will review your profile within 48 hours.",
            'submissionId' => $submissionId,
            'dbSaved' => true,
        ]);
    }
}