<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Page;
use App\Models\Post;
use App\Models\SeoMeta;
use App\Models\Setting;
use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SeoController extends Controller
{
    /**
     * Display centralized SEO management console.
     */
    public function index(Request $request): View
    {
        $type = $request->input('type', 'posts');

        $query = SeoMeta::with('seoable')->orderByDesc('id');

        if ($type === 'posts') {
            $query->where('seoable_type', Post::class);
        } elseif ($type === 'pages') {
            $query->where('seoable_type', Page::class);
        } elseif ($type === 'case_studies') {
            $query->where('seoable_type', CaseStudy::class);
        }

        $seoRecords = $query->paginate(15)->withQueryString();

        // Global defaults
        $globalSeo = [
            'default_meta_title' => Setting::get('default_meta_title', 'Octavia Tech Solutions | Enterprise IT & AI Engineering'),
            'default_meta_description' => Setting::get('default_meta_description', 'Leading enterprise IT staff augmentation, custom software, and cloud engineering.'),
            'analytics_ga_id' => Setting::get('analytics_ga_id', 'G-XXXXXXX'),
            'social_twitter' => Setting::get('social_twitter', 'https://twitter.com/octavia_tech'),
            'social_linkedin' => Setting::get('social_linkedin', 'https://linkedin.com/company/octavia-tech'),
        ];

        return view('admin.seo.index', compact('seoRecords', 'globalSeo', 'type'));
    }

    /**
     * Update global site SEO defaults.
     */
    public function updateGlobal(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'default_meta_title' => ['required', 'string', 'max:255'],
            'default_meta_description' => ['required', 'string', 'max:500'],
            'analytics_ga_id' => ['nullable', 'string', 'max:50'],
        ]);

        foreach ($validated as $key => $val) {
            Setting::set($key, $val, 'seo');
        }

        AuditLogger::log('GLOBAL_SEO_UPDATED', "Global SEO defaults updated by administrator");

        return redirect()->route('admin.seo.index')->with('success', 'Global SEO defaults updated.');
    }
}
