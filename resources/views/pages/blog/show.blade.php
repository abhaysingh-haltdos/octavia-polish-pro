@extends('layouts.app')

@section('content')
<div x-data="{ readingProgress: 0, activeTocId: '', copiedLink: false, openFaq: 0 }" 
     @scroll.window="
        let totalHeight = document.documentElement.scrollHeight - window.innerHeight;
        readingProgress = totalHeight > 0 ? (window.scrollY / totalHeight) * 100 : 0;
        
        let tocs = @js($article['content']['toc'] ?? []);
        for(let i = tocs.length - 1; i >= 0; i--) {
            let el = document.getElementById(tocs[i].id);
            if (el && el.getBoundingClientRect().top <= 140) {
                activeTocId = tocs[i].id;
                break;
            }
        }
     "
     class="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans pt-24 pb-20 relative">
     
    <!-- FLOATING READING PROGRESS BAR -->
    <div class="fixed top-0 left-0 right-0 h-1.5 bg-[#DDE3E9] z-50">
        <div class="h-full bg-gradient-to-r from-[#264868] via-[#C1A972] to-[#264868] transition-all duration-150 ease-out" :style="`width: ${readingProgress}%`"></div>
    </div>

    <!-- HERO META HEADER -->
    <section class="bg-[#153758] text-white py-12 sm:py-16 px-4 sm:px-6 lg:px-8 border-b border-[#C1A972]/30 relative overflow-hidden">
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-[#C1A972]/10 blur-3xl rounded-full pointer-events-none"></div>

        <div class="max-w-5xl mx-auto space-y-6 relative z-10">
            <nav class="flex flex-wrap items-center gap-2 text-xs text-[#93A3B2] font-medium">
                <a href="/" class="hover:text-[#C1A972] transition-colors">Home</a>
                <span>/</span>
                <a href="/blog" class="hover:text-[#C1A972] transition-colors">Blog</a>
                <span>/</span>
                <span class="text-[#C1A972] font-bold">{{ $article['category'] }}</span>
            </nav>

            <div class="flex flex-wrap items-center gap-3 text-xs font-semibold">
                <span class="px-3 py-1 bg-[#264868] text-[#C1A972] border border-[#C1A972]/40 rounded-full uppercase tracking-wider shadow-sm">
                    {{ $article['category'] }}
                </span>
                <span class="text-[#93A3B2] flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $article['publishDate'] }}
                </span>
            </div>

            <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight leading-tight">
                {{ $article['title'] }}
            </h1>

            <p class="text-sm sm:text-lg text-[#FEFEFE] leading-relaxed max-w-4xl font-normal">
                {{ $article['excerpt'] }}
            </p>

            <div class="pt-6 border-t border-white/10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <img src="{{ $article['author']['avatar'] }}" alt="{{ $article['author']['name'] }}" class="w-12 h-12 rounded-full object-cover border-2 border-[#C1A972] shadow-md" />
                    <div>
                        <h4 class="text-sm font-bold text-white flex items-center gap-2">
                            <span>{{ $article['author']['name'] }}</span>
                            <span class="text-[10px] bg-[#C1A972]/20 text-[#C1A972] px-2 py-0.5 rounded-full border border-[#C1A972]/30">Verified Author</span>
                        </h4>
                        <p class="text-xs text-[#93A3B2]">{{ $article['author']['role'] }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-xs text-[#93A3B2] font-semibold mr-1">Share:</span>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($article['title']) }}" target="_blank" class="p-2 rounded-xl bg-white/10 hover:bg-[#264868] text-white transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank" class="p-2 rounded-xl bg-white/10 hover:bg-[#264868] text-white transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg>
                    </a>
                    <button @click="navigator.clipboard.writeText(window.location.href); copiedLink = true; setTimeout(() => copiedLink = false, 2000)" class="p-2 rounded-xl bg-white/10 hover:bg-[#264868] text-white transition-colors">
                        <template x-if="copiedLink"><svg class="w-4 h-4 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></template>
                        <template x-if="!copiedLink"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg></template>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN ARTICLE CONTAINER -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="mb-12 rounded-3xl overflow-hidden border border-[#DDE3E9] shadow-xl bg-[#0F2334] group relative">
            <img src="{{ $article['featuredImage'] }}" alt="{{ $article['title'] }}" class="w-full h-[320px] sm:h-[480px] object-cover object-center group-hover:scale-102 transition-transform duration-700" />
            <div class="p-3 bg-white/90 backdrop-blur-md border-t text-[#5C6B7A] text-xs text-center font-medium">
                📸 Enterprise Architecture Blueprint: {{ $article['title'] }}
            </div>
        </div>

        <div class="max-w-4xl mx-auto">
            <main class="space-y-10">
                @if(!empty($article['content']['toc']))
                    <div class="bg-white border border-[#DDE3E9] rounded-2xl p-6 shadow-sm space-y-3">
                        <h3 class="text-sm font-extrabold text-[#264868] uppercase tracking-wider flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                            <span>Table of Contents</span>
                        </h3>
                        <nav class="space-y-1 text-xs">
                            @foreach($article['content']['toc'] as $item)
                                <a href="#{{ $item['id'] }}" :class="activeTocId === '{{ $item['id'] }}' ? 'bg-[#264868] text-white font-bold' : 'text-[#5C6B7A] hover:bg-[#FEFEFE] hover:text-[#264868]'" class="block py-1.5 px-3 rounded-lg font-medium transition-colors">
                                    {{ $item['title'] }}
                                </a>
                            @endforeach
                        </nav>
                    </div>
                @endif

                <div class="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 shadow-sm text-base sm:text-lg text-[#153758] leading-relaxed font-normal border-l-4 border-l-[#264868]">
                    <p>{{ $article['content']['introduction'] }}</p>
                </div>

                @foreach($article['content']['sections'] as $section)
                    <section id="{{ $section['id'] }}" class="space-y-6 pt-2">
                        <h2 class="text-2xl sm:text-3xl font-black text-[#264868] tracking-tight leading-snug border-b border-[#DDE3E9] pb-3">
                            {{ $section['heading'] }}
                        </h2>

                        @if(!empty($section['subheading']))
                            <h3 class="text-base sm:text-lg font-bold text-[#C1A972] uppercase tracking-wider">
                                {{ $section['subheading'] }}
                            </h3>
                        @endif

                        <div class="space-y-4 text-[#153758] text-base leading-relaxed font-normal">
                            @foreach($section['bodyParagraphs'] as $para)
                                <p>{{ $para }}</p>
                            @endforeach
                        </div>

                        @if(!empty($section['callout']))
                            <div class="p-6 rounded-2xl bg-[#264868]/5 border-l-4 border-l-[#264868] space-y-2">
                                <span class="text-xs font-bold uppercase tracking-wider text-[#264868] block">
                                    💡 {{ $section['callout']['title'] }}
                                </span>
                                <p class="text-sm text-[#153758] font-medium leading-relaxed">
                                    {{ $section['callout']['text'] }}
                                </p>
                            </div>
                        @endif

                        @if(!empty($section['quote']))
                            <blockquote class="p-6 rounded-2xl bg-gradient-to-r from-[#153758] to-[#264868] text-white border-l-4 border-l-[#C1A972] space-y-3 shadow-md">
                                <p class="text-base sm:text-lg font-semibold italic leading-relaxed">
                                    &ldquo;{{ $section['quote']['text'] }}&rdquo;
                                </p>
                                <footer class="text-xs text-[#C1A972] font-bold">
                                    — {{ $section['quote']['author'] }}, <span class="text-[#93A3B2] font-normal">{{ $section['quote']['role'] }}</span>
                                </footer>
                            </blockquote>
                        @endif

                        @if(!empty($section['bulletList']))
                            <ul class="space-y-2.5 pt-2">
                                @foreach($section['bulletList'] as $item)
                                    <li class="flex items-start gap-3 text-sm text-[#153758] font-medium">
                                        <span class="w-2 h-2 rounded-full bg-[#C1A972] mt-2 shrink-0"></span>
                                        <span>{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if(!empty($section['codeBlock']))
                            <div class="rounded-2xl overflow-hidden bg-[#0F2334] text-[#FEFEFE] border border-[#153758] shadow-xl my-4">
                                <div class="px-4 py-2.5 bg-[#153758] border-b border-[#153758] flex items-center justify-between text-xs font-mono text-[#93A3B2]">
                                    <span>{{ $section['codeBlock']['filename'] ?? 'Code Snippet' }}</span>
                                    <span class="uppercase text-[10px] text-[#C1A972] font-bold">{{ $section['codeBlock']['language'] }}</span>
                                </div>
                                <pre class="p-4 text-xs font-mono overflow-x-auto leading-relaxed"><code>{{ $section['codeBlock']['code'] }}</code></pre>
                            </div>
                        @endif
                    </section>
                @endforeach

                <!-- PREVIOUS / NEXT ARTICLE NAVIGATION -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-[#DDE3E9] mt-8 pt-8">
                    @if($prevArticle)
                        <a href="/blog/{{ $prevArticle['slug'] }}" class="p-5 rounded-2xl bg-white border border-[#DDE3E9] hover:border-[#C1A972] transition-all cursor-pointer shadow-sm group block">
                            <span class="text-[10px] font-bold text-[#93A3B2] uppercase flex items-center gap-1 mb-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg> Previous Article
                            </span>
                            <h5 class="text-xs font-bold text-[#264868] group-hover:text-[#C1A972] line-clamp-2">
                                {{ $prevArticle['title'] }}
                            </h5>
                        </a>
                    @else
                        <div></div>
                    @endif

                    @if($nextArticle)
                        <a href="/blog/{{ $nextArticle['slug'] }}" class="p-5 rounded-2xl bg-white border border-[#DDE3E9] hover:border-[#C1A972] transition-all cursor-pointer shadow-sm group text-right block">
                            <span class="text-[10px] font-bold text-[#93A3B2] uppercase flex items-center justify-end gap-1 mb-1">
                                Next Article <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </span>
                            <h5 class="text-xs font-bold text-[#264868] group-hover:text-[#C1A972] line-clamp-2">
                                {{ $nextArticle['title'] }}
                            </h5>
                        </a>
                    @else
                        <div></div>
                    @endif
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
