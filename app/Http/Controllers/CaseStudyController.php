<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use Illuminate\Contracts\View\View;

class CaseStudyController extends Controller
{
    /**
     * Display case studies listing page
     */
    public function index(): View
    {
        $studies = CaseStudy::where('status', 'published')
            ->orderByDesc('published_at')
            ->get();

        $industries = $studies->pluck('industry')->filter()->unique()->values()->all();
        $services = $studies->pluck('service_category')->filter()->unique()->values()->all();
        $technologies = $studies->pluck('technologies')->flatten()->filter()->unique()->values()->all();
        $solutions = $studies->pluck('solutions')->flatten()->filter()->unique()->values()->all();

        $data = [
            'studies' => $studies->map(fn(CaseStudy $cs) => $cs->toViewArray())->values()->all(),
            'industries' => $industries,
            'services' => $services,
            'technologies' => $technologies,
            'solutions' => $solutions,
        ];

        return view('pages.case-studies.index', ['data' => $data]);
    }

    /**
     * Display single case study with strict 404
     */
    public function show(CaseStudy $caseStudy): View
    {
        if ($caseStudy->status !== 'published') {
            abort(404);
        }

        $caseStudy->load('seoMeta');

        $related = CaseStudy::where('status', 'published')
            ->where('id', '!=', $caseStudy->id)
            ->take(3)
            ->get()
            ->map(fn(CaseStudy $cs) => $cs->toViewArray())
            ->values()
            ->all();

        return view('pages.case-studies.show', [
            'study' => $caseStudy->toViewArray(),
            'related' => $related,
            'seoMeta' => $caseStudy->seoMeta,
        ]);
    }
}
