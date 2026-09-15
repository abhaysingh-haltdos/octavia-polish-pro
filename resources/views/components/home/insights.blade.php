@php
    $recentPosts = \App\Models\Post::where('status', 'published')
        ->with('category')
        ->orderByDesc('published_at')
        ->take(3)
        ->get();
@endphp

<section class="py-24 bg-white text-[#153758]" id="insights">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#EDF0F3] text-[#264868] text-xs font-bold uppercase tracking-wider">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
        <span>Thought Leadership</span>
      </div>
      <h2 class="text-3xl sm:text-5xl font-black text-[#153758] tracking-tight">
        Latest Insights
      </h2>
      <p class="text-[#5C6B7A] text-base sm:text-lg">
        Actionable perspective and architectural blueprints from our senior engineering and AI
        research experts.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @if($recentPosts->isNotEmpty())
        @foreach($recentPosts as $post)
          <div class="p-8 rounded-3xl bg-[#F3F5F7] border border-[#DDE3E9]/80 hover:border-[#264868]/50 hover:shadow-xl hover:shadow-[#264868]/5 transition-all duration-300 group flex flex-col justify-between">
            <div>
              <div class="flex items-center justify-between gap-2 text-xs font-bold text-[#5C6B7A] mb-4">
                <span class="px-3 py-1 rounded-full bg-[#EDF0F3] text-[#264868] font-bold">
                  {{ $post->category?->name ?? 'Enterprise IT' }}
                </span>
                <div class="flex items-center gap-2">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span>{{ $post->read_time ?? '5 min read' }}</span>
                </div>
              </div>
              <h3 class="text-xl font-bold text-[#153758] mb-3 group-hover:text-[#264868] transition-colors leading-snug">
                {{ $post->title }}
              </h3>
              <p class="text-sm text-[#5C6B7A] leading-relaxed mb-6">{{ \Illuminate\Support\Str::limit($post->excerpt, 140) }}</p>
            </div>
            <div class="pt-4 border-t border-[#DDE3E9]/60 flex items-center justify-between text-xs font-bold">
              <div class="flex items-center gap-1.5 text-[#5C6B7A]">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Recent' }}</span>
              </div>
              <a href="{{ url('/blog/' . $post->slug) }}" class="text-[#264868] hover:text-[#153758] flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                <span>Read Article</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
              </a>
            </div>
          </div>
        @endforeach
      @else
      
      <!-- Article 1 -->
      <div class="p-8 rounded-3xl bg-[#F3F5F7] border border-[#DDE3E9]/80 hover:border-[#264868]/50 hover:shadow-xl hover:shadow-[#264868]/5 transition-all duration-300 group flex flex-col justify-between">
        <div>
          <div class="flex items-center justify-between gap-2 text-xs font-bold text-[#5C6B7A] mb-4">
            <span class="px-3 py-1 rounded-full bg-[#EDF0F3] text-[#264868] font-bold">
              Artificial Intelligence
            </span>
            <div class="flex items-center gap-2">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
              <span>5 min read</span>
            </div>
          </div>
          <h3 class="text-xl font-bold text-[#153758] mb-3 group-hover:text-[#264868] transition-colors leading-snug">
            How Generative AI Is Reshaping Enterprise Software Development
          </h3>
          <p class="text-sm text-[#5C6B7A] leading-relaxed mb-6">Explore how leading enterprises are leveraging LLMs, code generation, and AI-assisted workflows to accelerate delivery cycles by 300%.</p>
        </div>
        <div class="pt-4 border-t border-[#DDE3E9]/60 flex items-center justify-between text-xs font-bold">
          <div class="flex items-center gap-1.5 text-[#5C6B7A]">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <span>Jan 28, 2026</span>
          </div>
          <a href="/blog/how-generative-ai-reshaping-enterprise-software-development" class="text-[#264868] hover:text-[#153758] flex items-center gap-1 group-hover:translate-x-1 transition-transform">
            <span>Read Article</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
          </a>
        </div>
      </div>

      <!-- Article 2 -->
      <div class="p-8 rounded-3xl bg-[#F3F5F7] border border-[#DDE3E9]/80 hover:border-[#264868]/50 hover:shadow-xl hover:shadow-[#264868]/5 transition-all duration-300 group flex flex-col justify-between">
        <div>
          <div class="flex items-center justify-between gap-2 text-xs font-bold text-[#5C6B7A] mb-4">
            <span class="px-3 py-1 rounded-full bg-[#EDF0F3] text-[#264868] font-bold">
              Cyber Security
            </span>
            <div class="flex items-center gap-2">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
              <span>8 min read</span>
            </div>
          </div>
          <h3 class="text-xl font-bold text-[#153758] mb-3 group-hover:text-[#264868] transition-colors leading-snug">
            Zero Trust Architecture: A Complete Implementation Guide for 2026
          </h3>
          <p class="text-sm text-[#5C6B7A] leading-relaxed mb-6">A step-by-step framework for implementing zero-trust security across your organization, from network segmentation to continuous identity verification.</p>
        </div>
        <div class="pt-4 border-t border-[#DDE3E9]/60 flex items-center justify-between text-xs font-bold">
          <div class="flex items-center gap-1.5 text-[#5C6B7A]">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <span>Jan 20, 2026</span>
          </div>
          <a href="/blog/zero-trust-architecture-implementation-guide-2026" class="text-[#264868] hover:text-[#153758] flex items-center gap-1 group-hover:translate-x-1 transition-transform">
            <span>Read Article</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
          </a>
        </div>
      </div>

      <!-- Article 3 -->
      <div class="p-8 rounded-3xl bg-[#F3F5F7] border border-[#DDE3E9]/80 hover:border-[#264868]/50 hover:shadow-xl hover:shadow-[#264868]/5 transition-all duration-300 group flex flex-col justify-between">
        <div>
          <div class="flex items-center justify-between gap-2 text-xs font-bold text-[#5C6B7A] mb-4">
            <span class="px-3 py-1 rounded-full bg-[#EDF0F3] text-[#264868] font-bold">
              Cloud Infrastructure
            </span>
            <div class="flex items-center gap-2">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
              <span>6 min read</span>
            </div>
          </div>
          <h3 class="text-xl font-bold text-[#153758] mb-3 group-hover:text-[#264868] transition-colors leading-snug">
            Multi-Cloud Strategy: Avoiding Vendor Lock-In While Maximizing ROI
          </h3>
          <p class="text-sm text-[#5C6B7A] leading-relaxed mb-6">Our architects share battle-tested strategies for building resilient multi-cloud architectures that optimize cost without sacrificing performance.</p>
        </div>
        <div class="pt-4 border-t border-[#DDE3E9]/60 flex items-center justify-between text-xs font-bold">
          <div class="flex items-center gap-1.5 text-[#5C6B7A]">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <span>Jan 12, 2026</span>
          </div>
          <a href="/blog/multi-cloud-strategy-avoiding-vendor-lock-in" class="text-[#264868] hover:text-[#153758] flex items-center gap-1 group-hover:translate-x-1 transition-transform">
            <span>Read Article</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
          </a>
        </div>
      </div>
      @endif
    </div>
  </div>
</section>
