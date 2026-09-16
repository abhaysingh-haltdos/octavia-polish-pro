<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@php
    $seo = $seoMeta ?? null;
    $defaultTitle = \App\Models\Setting::get('default_meta_title', 'Octavia Tech Solutions — Enterprise Software & AI Engineering');
    $defaultDesc = \App\Models\Setting::get('default_meta_description', 'Leading enterprise IT staff augmentation, custom software, and cloud engineering.');
    $siteName = \App\Models\Setting::get('site_name', 'Octavia Tech Solutions');

    $isError = isset($exception) || (isset($isErrorPage) && $isErrorPage);
    $pageTitle = $seo?->meta_title ?? (isset($title) ? "{$title} | {$siteName}" : ($isError ? "Page Not Found | {$siteName}" : $defaultTitle));
    $pageDesc = $seo?->meta_description ?? $defaultDesc;
    $canonicalUrl = $seo?->canonical_url ?? url()->current();
    
    if ($isError) {
        $robots = 'noindex,nofollow';
    } else {
        $robots = ($seo && (!$seo->robots_index || !$seo->robots_follow))
            ? (($seo->robots_index ? 'index' : 'noindex') . ',' . ($seo->robots_follow ? 'follow' : 'nofollow'))
            : 'index,follow';
    }

    $ogTitle = $seo?->og_title ?? $pageTitle;
    $ogDesc = $seo?->og_description ?? $pageDesc;
    $ogImage = $seo?->og_image ?? asset('assets/octavia-logo.png');
    $ogType = ($seo?->schema_type === 'Article') ? 'article' : 'website';
    $twitterTitle = $seo?->twitter_title ?? $ogTitle;
    $twitterDesc = $seo?->twitter_description ?? $ogDesc;
    $twitterImage = $seo?->twitter_image ?? $ogImage;
@endphp
    <title>@yield('title', $pageTitle)</title>
    <meta name="description" content="{{ $pageDesc }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <meta name="robots" content="@yield('robots', $robots)">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:title" content="{{ $ogTitle }}">
    <meta property="og:description" content="{{ $ogDesc }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:site_name" content="{{ $siteName }}">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $canonicalUrl }}">
    <meta name="twitter:title" content="{{ $twitterTitle }}">
    <meta name="twitter:description" content="{{ $twitterDesc }}">
    <meta name="twitter:image" content="{{ $twitterImage }}">

    <!-- JSON-LD Structured Data -->
@php
    $appUrl = rtrim(config('app.url'), '/');
    $structuredData = [];

    // Organization schema — present on every page
    $structuredData[] = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => $siteName,
        'url' => $appUrl,
        'logo' => $appUrl . '/assets/octavia-logo.png',
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'contactType' => 'customer service',
            'url' => $appUrl . '/contact',
        ],
        'sameAs' => array_filter([
            \App\Models\Setting::get('linkedin_url', ''),
            \App\Models\Setting::get('twitter_url', ''),
        ]),
    ];

    // WebSite schema — adds sitelinks search box signal
    $structuredData[] = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => $siteName,
        'url' => $appUrl,
    ];

    // Article/BlogPosting schema — injected by blog show controller via $jsonLd variable
    if (!empty($jsonLd) && is_array($jsonLd)) {
        $structuredData[] = $jsonLd;
    }

    // BreadcrumbList — injected by individual controllers via $breadcrumbs variable
    if (!empty($breadcrumbs) && is_array($breadcrumbs) && count($breadcrumbs) > 1) {
        $breadcrumbItems = [];
        foreach ($breadcrumbs as $idx => $crumb) {
            $breadcrumbItems[] = [
                '@type' => 'ListItem',
                'position' => $idx + 1,
                'name' => $crumb['name'],
                'item' => $crumb['url'] ?? null,
            ];
        }
        $structuredData[] = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $breadcrumbItems,
        ];
    }
@endphp
    @foreach ($structuredData as $schema)
    <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>
    @endforeach

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Alpine.js for Interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="antialiased bg-background text-foreground"
    x-data="{ mobileNavOpen: false, searchOpen: false, consultationOpen: false, consultationTopic: 'Enterprise Technology Consultation' }"
>
    <!-- Top Header -->
    <x-layout.header />

    <!-- Main Page Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Global Footer -->
    <x-layout.footer />

    <!-- Slide-Out Mobile Navigation Drawer -->
    <x-layout.mobile-nav />

    <!-- Global Consultation Modal -->
    <x-common.consultation-modal />

    <!-- Global Search Modal (Cmd+K / Ctrl+K) -->
    <x-common.search-modal />

</body>
</html>
