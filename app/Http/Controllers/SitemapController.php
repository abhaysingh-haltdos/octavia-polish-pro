<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class SitemapController extends Controller
{
    /**
     * Serve the XML sitemap for all public, indexable, published content.
     *
     * Includes:
     * - Static public routes (home, about-us, blog index, case-studies, etc.)
     * - Published blog posts (excluding noindex)
     * - Published case studies (excluding noindex)
     * - Published CMS pages (excluding noindex)
     *
     * Excludes:
     * - Drafts
     * - Admin routes
     * - Legal/utility pages already included as static entries
     * - Pages marked noindex in SEO meta
     */
    public function index(): Response
    {
        $baseUrl = rtrim(config('app.url'), '/');

        $staticUrls = $this->staticUrls($baseUrl);

        $posts = Post::where('status', 'published')
            ->whereHas('seoMeta', fn($q) => $q->where('robots_index', true))
            ->orWhere(function ($q) {
                $q->where('status', 'published')
                  ->whereDoesntHave('seoMeta');
            })
            ->orderByDesc('updated_at')
            ->get(['slug', 'updated_at', 'published_at']);

        $caseStudies = CaseStudy::where('status', 'published')
            ->whereHas('seoMeta', fn($q) => $q->where('robots_index', true))
            ->orWhere(function ($q) {
                $q->where('status', 'published')
                  ->whereDoesntHave('seoMeta');
            })
            ->orderByDesc('updated_at')
            ->get(['slug', 'updated_at', 'published_at']);

        // CMS pages that are NOT the static legal pages (those are already in $staticUrls)
        $staticSlugs = ['privacy-policy', 'terms-of-service', 'cookie-policy', 'sitemap'];
        $cmsPages = Page::where('status', 'published')
            ->whereNotIn('slug', $staticSlugs)
            ->whereHas('seoMeta', fn($q) => $q->where('robots_index', true))
            ->orWhere(function ($q) use ($staticSlugs) {
                $q->where('status', 'published')
                  ->whereNotIn('slug', $staticSlugs)
                  ->whereDoesntHave('seoMeta');
            })
            ->get(['slug', 'updated_at']);

        $content = view('sitemap.index', compact(
            'baseUrl',
            'staticUrls',
            'posts',
            'caseStudies',
            'cmsPages'
        ))->render();

        return response($content, 200)
            ->header('Content-Type', 'application/xml; charset=utf-8')
            ->header('X-Robots-Tag', 'noindex');
    }

    /**
     * Static public URL entries with priorities and change frequencies.
     */
    private function staticUrls(string $baseUrl): array
    {
        $now = Carbon::now()->toAtomString();

        return [
            ['url' => $baseUrl . '/',              'priority' => '1.0', 'changefreq' => 'daily',   'lastmod' => $now],
            ['url' => $baseUrl . '/about-us',      'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => $baseUrl . '/services',      'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => $baseUrl . '/solutions',     'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => $baseUrl . '/industries',    'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => $baseUrl . '/case-studies',  'priority' => '0.9', 'changefreq' => 'weekly',  'lastmod' => $now],
            ['url' => $baseUrl . '/blog',          'priority' => '0.9', 'changefreq' => 'daily',   'lastmod' => $now],
            ['url' => $baseUrl . '/contact',       'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => $baseUrl . '/privacy-policy','priority' => '0.3', 'changefreq' => 'yearly',  'lastmod' => $now],
            ['url' => $baseUrl . '/terms-of-service','priority' => '0.3','changefreq' => 'yearly', 'lastmod' => $now],
            ['url' => $baseUrl . '/cookie-policy', 'priority' => '0.3', 'changefreq' => 'yearly',  'lastmod' => $now],
        ];
    }
}
