@props(['seo' => null, 'defaultTitle' => '', 'defaultDescription' => '', 'defaultImage' => ''])

@php
    $seoMeta = $seo;
    $metaTitle = old('seo.meta_title', $seoMeta->meta_title ?? $defaultTitle);
    $metaDesc = old('seo.meta_description', $seoMeta->meta_description ?? $defaultDescription);
    $canonicalUrl = old('seo.canonical_url', $seoMeta->canonical_url ?? '');
    $robotsIndex = old('seo.robots_index', $seoMeta ? ($seoMeta->robots_index ? '1' : '0') : '1');
    $robotsFollow = old('seo.robots_follow', $seoMeta ? ($seoMeta->robots_follow ? '1' : '0') : '1');
    $ogTitle = old('seo.og_title', $seoMeta->og_title ?? '');
    $ogDesc = old('seo.og_description', $seoMeta->og_description ?? '');
    $ogImage = old('seo.og_image', $seoMeta->og_image ?? $defaultImage);
    $twitterTitle = old('seo.twitter_title', $seoMeta->twitter_title ?? '');
    $twitterDesc = old('seo.twitter_description', $seoMeta->twitter_description ?? '');
    $twitterImage = old('seo.twitter_image', $seoMeta->twitter_image ?? $defaultImage);
    $schemaType = old('seo.schema_type', $seoMeta->schema_type ?? 'WebPage');
@endphp

<div x-data="{ openSeo: false, activeTab: 'meta' }" class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 mb-6">
    <div class="flex items-center justify-between cursor-pointer select-none" @click="openSeo = !openSeo">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-amber-500/10 text-amber-400 flex items-center justify-center font-bold text-sm border border-amber-500/20">
                SEO
            </div>
            <div>
                <h3 class="text-sm font-bold text-white">Search Engine Optimization & Social Sharing</h3>
                <p class="text-[11px] text-slate-400">Configure search rankings, OpenGraph cards, Twitter cards, and Schema.org markup</p>
            </div>
        </div>
        <button type="button" class="text-xs font-semibold text-amber-400 hover:text-amber-300 flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700">
            <span x-text="openSeo ? 'Collapse SEO' : 'Configure SEO'">Configure SEO</span>
            <svg :class="openSeo ? 'rotate-180' : ''" class="w-3.5 h-3.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>
    </div>

    <div x-show="openSeo" x-cloak class="mt-5 pt-5 border-t border-slate-800/80 space-y-5">
        <!-- Sub-tabs -->
        <div class="flex items-center gap-2 border-b border-slate-800 pb-2">
            <button type="button" @click="activeTab = 'meta'" :class="activeTab === 'meta' ? 'text-amber-400 border-b-2 border-amber-400 font-bold' : 'text-slate-400 hover:text-white'" class="px-3 py-1.5 text-xs font-medium transition-colors">
                Meta Tags & Crawling
            </button>
            <button type="button" @click="activeTab = 'social'" :class="activeTab === 'social' ? 'text-amber-400 border-b-2 border-amber-400 font-bold' : 'text-slate-400 hover:text-white'" class="px-3 py-1.5 text-xs font-medium transition-colors">
                Social Cards (OG & Twitter)
            </button>
            <button type="button" @click="activeTab = 'schema'" :class="activeTab === 'schema' ? 'text-amber-400 border-b-2 border-amber-400 font-bold' : 'text-slate-400 hover:text-white'" class="px-3 py-1.5 text-xs font-medium transition-colors">
                Schema & Rich Snippets
            </button>
        </div>

        <!-- Meta Tab -->
        <div x-show="activeTab === 'meta'" class="space-y-4">
            <div>
                <div class="flex items-center justify-between mb-1">
                    <label class="text-xs font-semibold text-slate-300">Meta Title</label>
                    <span class="text-[11px] text-slate-500" x-data="{ len: {{ strlen($metaTitle) }} }">
                        <span x-text="len"></span> / 60 optimal
                    </span>
                </div>
                <input type="text" name="seo[meta_title]" value="{{ $metaTitle }}" placeholder="Leave blank to use default page title" class="w-full px-3.5 py-2.5 bg-slate-950/70 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 transition-colors" @input="len = $event.target.value.length" />
                <p class="text-[10px] text-slate-500 mt-1">Displayed in Google search results and browser title bars.</p>
            </div>

            <div>
                <div class="flex items-center justify-between mb-1">
                    <label class="text-xs font-semibold text-slate-300">Meta Description</label>
                    <span class="text-[11px] text-slate-500" x-data="{ len: {{ strlen($metaDesc) }} }">
                        <span x-text="len"></span> / 160 optimal
                    </span>
                </div>
                <textarea name="seo[meta_description]" rows="3" placeholder="Compelling summary for search engine snippets..." class="w-full px-3.5 py-2.5 bg-slate-950/70 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 transition-colors" @input="len = $event.target.value.length">{{ $metaDesc }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-semibold text-slate-300 mb-1 block">Canonical URL</label>
                    <input type="url" name="seo[canonical_url]" value="{{ $canonicalUrl }}" placeholder="https://..." class="w-full px-3.5 py-2.5 bg-slate-950/70 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 transition-colors" />
                    <p class="text-[10px] text-slate-500 mt-1">Optional. Defaults to current URL if left blank.</p>
                </div>

                <div class="flex items-center gap-6 pt-5">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="hidden" name="seo[robots_index]" value="0">
                        <input type="checkbox" name="seo[robots_index]" value="1" {{ $robotsIndex ? 'checked' : '' }} class="w-4 h-4 rounded text-amber-500 focus:ring-amber-500/20 bg-slate-900 border-slate-700" />
                        <span class="text-xs text-slate-300">Allow Indexing (index)</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="hidden" name="seo[robots_follow]" value="0">
                        <input type="checkbox" name="seo[robots_follow]" value="1" {{ $robotsFollow ? 'checked' : '' }} class="w-4 h-4 rounded text-amber-500 focus:ring-amber-500/20 bg-slate-900 border-slate-700" />
                        <span class="text-xs text-slate-300">Follow Links (follow)</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Social Tab -->
        <div x-show="activeTab === 'social'" class="space-y-4" x-cloak>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-semibold text-slate-300 mb-1 block">OpenGraph (Facebook / LinkedIn) Title</label>
                    <input type="text" name="seo[og_title]" value="{{ $ogTitle }}" placeholder="Custom social card headline..." class="w-full px-3.5 py-2.5 bg-slate-950/70 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 transition-colors" />
                </div>
                <div>
                    <label class="text-xs font-semibold text-slate-300 mb-1 block">Twitter Card Title</label>
                    <input type="text" name="seo[twitter_title]" value="{{ $twitterTitle }}" placeholder="Custom Twitter headline..." class="w-full px-3.5 py-2.5 bg-slate-950/70 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 transition-colors" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-semibold text-slate-300 mb-1 block">OpenGraph Description</label>
                    <textarea name="seo[og_description]" rows="2" placeholder="Custom description for social feeds..." class="w-full px-3.5 py-2.5 bg-slate-950/70 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 transition-colors">{{ $ogDesc }}</textarea>
                </div>
                <div>
                    <label class="text-xs font-semibold text-slate-300 mb-1 block">Twitter Description</label>
                    <textarea name="seo[twitter_description]" rows="2" placeholder="Custom Twitter description..." class="w-full px-3.5 py-2.5 bg-slate-950/70 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 transition-colors">{{ $twitterDesc }}</textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-semibold text-slate-300 mb-1 block">OpenGraph Image URL</label>
                    <input type="text" name="seo[og_image]" value="{{ $ogImage }}" placeholder="/uploads/og-image.jpg" class="w-full px-3.5 py-2.5 bg-slate-950/70 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 transition-colors" />
                </div>
                <div>
                    <label class="text-xs font-semibold text-slate-300 mb-1 block">Twitter Share Image URL</label>
                    <input type="text" name="seo[twitter_image]" value="{{ $twitterImage }}" placeholder="/uploads/twitter-card.jpg" class="w-full px-3.5 py-2.5 bg-slate-950/70 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 transition-colors" />
                </div>
            </div>
        </div>

        <!-- Schema Tab -->
        <div x-show="activeTab === 'schema'" class="space-y-4" x-cloak>
            <div>
                <label class="text-xs font-semibold text-slate-300 mb-1 block">Schema.org Structured Data Type</label>
                <select name="seo[schema_type]" class="w-full max-w-sm px-3.5 py-2.5 bg-slate-950/70 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 transition-colors">
                    <option value="WebPage" {{ $schemaType === 'WebPage' ? 'selected' : '' }}>WebPage (General)</option>
                    <option value="Article" {{ $schemaType === 'Article' ? 'selected' : '' }}>Article (Blog / Insights)</option>
                    <option value="TechArticle" {{ $schemaType === 'TechArticle' ? 'selected' : '' }}>TechArticle (Technical Case Studies)</option>
                    <option value="AboutPage" {{ $schemaType === 'AboutPage' ? 'selected' : '' }}>AboutPage</option>
                    <option value="ContactPage" {{ $schemaType === 'ContactPage' ? 'selected' : '' }}>ContactPage</option>
                    <option value="Organization" {{ $schemaType === 'Organization' ? 'selected' : '' }}>Organization</option>
                </select>
                <p class="text-[10px] text-slate-500 mt-1">Defines the JSON-LD schema entity generated for Google Structured Results.</p>
            </div>
        </div>
    </div>
</div>
