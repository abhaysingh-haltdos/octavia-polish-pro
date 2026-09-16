<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    {{-- Static URLs --}}
    @foreach ($staticUrls as $entry)
    <url>
        <loc>{{ $entry['url'] }}</loc>
        <lastmod>{{ $entry['lastmod'] }}</lastmod>
        <changefreq>{{ $entry['changefreq'] }}</changefreq>
        <priority>{{ $entry['priority'] }}</priority>
    </url>
    @endforeach

    {{-- Commercial Services & Sub-services --}}
    @if (!empty($servicesUrls))
    @foreach ($servicesUrls as $serviceEntry)
    <url>
        <loc>{{ $serviceEntry['url'] }}</loc>
        <lastmod>{{ $serviceEntry['lastmod'] }}</lastmod>
        <changefreq>{{ $serviceEntry['changefreq'] }}</changefreq>
        <priority>{{ $serviceEntry['priority'] }}</priority>
    </url>
    @endforeach
    @endif

    {{-- Industry Vertical Landing Pages --}}
    @if (!empty($industriesUrls))
    @foreach ($industriesUrls as $indEntry)
    <url>
        <loc>{{ $indEntry['url'] }}</loc>
        <lastmod>{{ $indEntry['lastmod'] }}</lastmod>
        <changefreq>{{ $indEntry['changefreq'] }}</changefreq>
        <priority>{{ $indEntry['priority'] }}</priority>
    </url>
    @endforeach
    @endif

    {{-- Solution Architecture Pages --}}
    @if (!empty($solutionsUrls))
    @foreach ($solutionsUrls as $solEntry)
    <url>
        <loc>{{ $solEntry['url'] }}</loc>
        <lastmod>{{ $solEntry['lastmod'] }}</lastmod>
        <changefreq>{{ $solEntry['changefreq'] }}</changefreq>
        <priority>{{ $solEntry['priority'] }}</priority>
    </url>
    @endforeach
    @endif

    {{-- Published Blog Posts --}}
    @foreach ($posts as $post)
    <url>
        <loc>{{ $baseUrl }}/blog/{{ $post->slug }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($post->updated_at)->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    {{-- Published Case Studies --}}
    @foreach ($caseStudies as $study)
    <url>
        <loc>{{ $baseUrl }}/case-studies/{{ $study->slug }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($study->updated_at)->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

    {{-- Published CMS Pages (non-static) --}}
    @foreach ($cmsPages as $page)
    <url>
        <loc>{{ $baseUrl }}/{{ ltrim($page->slug, '/') }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($page->updated_at)->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach

</urlset>
