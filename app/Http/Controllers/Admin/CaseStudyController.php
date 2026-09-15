<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Redirect;
use App\Models\SeoMeta;
use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CaseStudyController extends Controller
{
    /**
     * Display a paginated listing of case studies.
     */
    public function index(Request $request): View
    {
        $query = CaseStudy::orderByDesc('id');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('client_name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        if ($industry = $request->input('industry')) {
            $query->where('industry', $industry);
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $caseStudies = $query->paginate(12)->withQueryString();
        $industries = CaseStudy::pluck('industry')->filter()->unique()->values()->all();

        return view('admin.case-studies.index', compact('caseStudies', 'industries'));
    }

    /**
     * Show the form for creating a new case study.
     */
    public function create(): View
    {
        return view('admin.case-studies.create');
    }

    /**
     * Store a newly created case study in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:150', 'unique:case_studies,slug'],
            'subtitle' => ['nullable', 'string', 'max:500'],
            'client_name' => ['required', 'string', 'max:100'],
            'client_location' => ['nullable', 'string', 'max:100'],
            'industry' => ['required', 'string', 'max:100'],
            'service_category' => ['required', 'string', 'max:100'],
            'solution_category' => ['nullable', 'string', 'max:100'],
            'technologies_input' => ['nullable', 'string'],
            'project_duration' => ['nullable', 'string', 'max:50'],
            'team_size' => ['nullable', 'string', 'max:50'],
            'engagement_model' => ['nullable', 'string', 'max:100'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'hero_banner_image' => ['nullable', 'string', 'max:255'],
            'short_challenge' => ['nullable', 'string'],
            'result_highlight' => ['nullable', 'string'],
            'business_overview' => ['nullable', 'string'],
            'our_approach' => ['nullable', 'string'],
            'status' => ['required', Rule::in(['draft', 'published'])],
            'published_at' => ['nullable', 'date'],
            'is_featured' => ['nullable', 'boolean'],
            'is_latest' => ['nullable', 'boolean'],
            'challenges_lines' => ['nullable', 'string'],
            'goals_lines' => ['nullable', 'string'],
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;
        while (CaseStudy::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $counter++;
        }
        $validated['slug'] = $slug;

        // Process technology tags
        $techs = !empty($validated['technologies_input'])
            ? array_filter(array_map('trim', explode(',', $validated['technologies_input'])))
            : [];
        $validated['technologies'] = array_values($techs);

        // Process multi-line array items
        $validated['client_challenges'] = !empty($validated['challenges_lines'])
            ? array_values(array_filter(array_map('trim', explode("\n", $validated['challenges_lines']))))
            : [];
        $validated['business_goals'] = !empty($validated['goals_lines'])
            ? array_values(array_filter(array_map('trim', explode("\n", $validated['goals_lines']))))
            : [];

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_latest'] = $request->boolean('is_latest');
        $validated['published_at'] = $validated['status'] === 'published' ? ($validated['published_at'] ?? now()) : null;

        unset($validated['technologies_input'], $validated['challenges_lines'], $validated['goals_lines']);

        $caseStudy = CaseStudy::create($validated);

        // Polymorphic SEO
        $this->saveSeoMeta($caseStudy, $request);

        AuditLogger::log('CASE_STUDY_CREATED', "Case Study created: [{$caseStudy->title}] (slug: {$caseStudy->slug})");

        return redirect()->route('admin.case-studies.index')->with('success', "Case study '{$caseStudy->title}' created.");
    }

    /**
     * Show the form for editing the specified case study.
     */
    public function edit(CaseStudy $caseStudy): View
    {
        $caseStudy->load('seoMeta');
        return view('admin.case-studies.edit', compact('caseStudy'));
    }

    /**
     * Update the specified case study in storage.
     */
    public function update(Request $request, CaseStudy $caseStudy): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:150', Rule::unique('case_studies', 'slug')->ignore($caseStudy->id)],
            'subtitle' => ['nullable', 'string', 'max:500'],
            'client_name' => ['required', 'string', 'max:100'],
            'client_location' => ['nullable', 'string', 'max:100'],
            'industry' => ['required', 'string', 'max:100'],
            'service_category' => ['required', 'string', 'max:100'],
            'solution_category' => ['nullable', 'string', 'max:100'],
            'technologies_input' => ['nullable', 'string'],
            'project_duration' => ['nullable', 'string', 'max:50'],
            'team_size' => ['nullable', 'string', 'max:50'],
            'engagement_model' => ['nullable', 'string', 'max:100'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'hero_banner_image' => ['nullable', 'string', 'max:255'],
            'short_challenge' => ['nullable', 'string'],
            'result_highlight' => ['nullable', 'string'],
            'business_overview' => ['nullable', 'string'],
            'our_approach' => ['nullable', 'string'],
            'status' => ['required', Rule::in(['draft', 'published'])],
            'published_at' => ['nullable', 'date'],
            'is_featured' => ['nullable', 'boolean'],
            'is_latest' => ['nullable', 'boolean'],
            'challenges_lines' => ['nullable', 'string'],
            'goals_lines' => ['nullable', 'string'],
        ]);

        $newSlug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $oldSlug = $caseStudy->slug;
        $validated['slug'] = $newSlug;

        $slugWarning = null;
        if ($oldSlug !== $newSlug && $caseStudy->status === 'published') {
            Redirect::updateOrCreate(
                ['old_url' => '/case-studies/' . ltrim($oldSlug, '/')],
                [
                    'new_url' => '/case-studies/' . ltrim($newSlug, '/'),
                    'status_code' => 301,
                    'is_active' => true,
                ]
            );
            $slugWarning = "Note: Published URL changed from '/case-studies/{$oldSlug}' to '/case-studies/{$newSlug}'. An automatic 301 redirect was created.";
            AuditLogger::log('CASE_STUDY_SLUG_CHANGED', "Case Study [{$caseStudy->id}] slug changed from {$oldSlug} to {$newSlug}. 301 redirect created.");
        }

        // Process technologies
        if (isset($validated['technologies_input'])) {
            $techs = array_filter(array_map('trim', explode(',', $validated['technologies_input'])));
            $validated['technologies'] = array_values($techs);
        }

        if (isset($validated['challenges_lines'])) {
            $validated['client_challenges'] = array_values(array_filter(array_map('trim', explode("\n", $validated['challenges_lines']))));
        }

        if (isset($validated['goals_lines'])) {
            $validated['business_goals'] = array_values(array_filter(array_map('trim', explode("\n", $validated['goals_lines']))));
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_latest'] = $request->boolean('is_latest');

        if ($validated['status'] === 'published' && !$caseStudy->published_at) {
            $validated['published_at'] = $validated['published_at'] ?? now();
        }

        unset($validated['technologies_input'], $validated['challenges_lines'], $validated['goals_lines']);

        $caseStudy->update($validated);

        // Polymorphic SEO
        $this->saveSeoMeta($caseStudy, $request);

        AuditLogger::log('CASE_STUDY_UPDATED', "Case Study updated: [{$caseStudy->title}] (slug: {$caseStudy->slug})");

        $redirect = redirect()->route('admin.case-studies.index')->with('success', "Case study '{$caseStudy->title}' updated.");
        if ($slugWarning) {
            $redirect->with('warning', $slugWarning);
        }

        return $redirect;
    }

    /**
     * Remove the specified case study from storage.
     */
    public function destroy(CaseStudy $caseStudy): RedirectResponse
    {
        $title = $caseStudy->title;
        $caseStudy->seoMeta()->delete();
        $caseStudy->delete();

        AuditLogger::log('CASE_STUDY_DELETED', "Case Study deleted: [{$title}]");

        return redirect()->route('admin.case-studies.index')->with('success', "Case study '{$title}' was deleted.");
    }

    /**
     * Reusable SEO helper for Case Studies
     */
    protected function saveSeoMeta(CaseStudy $caseStudy, Request $request): void
    {
        $seo = $request->input('seo', []);

        SeoMeta::updateOrCreate(
            [
                'seoable_type' => CaseStudy::class,
                'seoable_id' => $caseStudy->id,
            ],
            [
                'meta_title' => $seo['meta_title'] ?? $caseStudy->title . ' | Octavia Tech Solutions',
                'meta_description' => $seo['meta_description'] ?? $caseStudy->subtitle,
                'canonical_url' => $seo['canonical_url'] ?? url('/case-studies/' . $caseStudy->slug),
                'robots_index' => !empty($seo['robots_index']),
                'robots_follow' => !empty($seo['robots_follow']),
                'og_title' => $seo['og_title'] ?? $caseStudy->title,
                'og_description' => $seo['og_description'] ?? $caseStudy->subtitle,
                'og_image' => $seo['og_image'] ?? $caseStudy->featured_image ?: $caseStudy->hero_banner_image,
                'twitter_title' => $seo['twitter_title'] ?? $caseStudy->title,
                'twitter_description' => $seo['twitter_description'] ?? $caseStudy->subtitle,
                'twitter_image' => $seo['twitter_image'] ?? $caseStudy->featured_image ?: $caseStudy->hero_banner_image,
                'schema_type' => 'CaseStudy',
            ]
        );
    }
}
