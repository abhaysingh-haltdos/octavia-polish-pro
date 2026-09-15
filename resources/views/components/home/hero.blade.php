<div class="relative min-h-screen bg-[#153758] text-white pt-36 pb-20 px-6 overflow-hidden">
    <!-- Background Animated Gradient Orbs -->
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-to-tr from-[#264868]/50 via-[#C1A972]/20 to-[#153758]/80 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-[400px] h-[400px] bg-[#C1A972]/15 rounded-full blur-[100px] pointer-events-none"></div>

    <!-- Futuristic Background Grid -->
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#FEFEFE0a_1px,transparent_1px),linear-gradient(to_bottom,#FEFEFE0a_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] pointer-events-none"></div>

    <!-- Hero Content Container -->
    <div class="max-w-6xl mx-auto relative z-10 text-center space-y-8">
        <!-- Eyebrow Tag -->
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-[#C1A972]/30 text-xs sm:text-sm font-semibold text-[#C1A972] backdrop-blur-md">
            <svg class="w-4 h-4 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
            <span>Next-Gen Enterprise Software & AI Innovation</span>
        </div>

        <!-- Hero Headline -->
        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight max-w-4xl mx-auto leading-[1.1]">
            Engineered for 
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#C1A972] via-[#FEFEFE] to-[#C1A972]">
                Scale, AI & Digital Speed
            </span>
        </h1>

        <!-- Subhead -->
        <p class="text-base sm:text-xl text-[#93A3B2] max-w-2xl mx-auto font-normal leading-relaxed">
            Octavia Tech Solutions empowers global enterprises with custom SaaS platforms, AI systems, cloud architecture, and end-to-end digital transformation.
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
            <button
                @click="consultationOpen = true"
                class="w-full sm:w-auto px-8 py-4 bg-[#264868] hover:bg-[#153758] border border-[#C1A972]/40 text-white font-bold rounded-2xl shadow-xl shadow-black/40 transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2 text-base"
            >
                <span>Get a Free Consultation</span>
                <svg class="w-6 h-6 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
            <a
                href="/services"
                class="w-full sm:w-auto px-8 py-4 bg-white/10 hover:bg-white/15 border border-white/15 text-white font-semibold rounded-2xl backdrop-blur-md transition-all text-base text-center"
            >
                Explore Services
            </a>
        </div>

        <!-- Features Row -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 pt-16 max-w-5xl mx-auto text-left">
            <div class="p-5 rounded-2xl bg-white/[0.03] border border-white/10 backdrop-blur-md space-y-2">
                <div class="w-12 h-12 rounded-xl bg-[#C1A972]/20 text-[#C1A972] flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                </div>
                <h3 class="font-bold text-white text-base">Custom Software</h3>
                <p class="text-xs text-[#93A3B2]">
                    Web apps, mobile solutions, SaaS & healthcare platforms.
                </p>
            </div>

            <div class="p-5 rounded-2xl bg-white/[0.03] border border-white/10 backdrop-blur-md space-y-2">
                <div class="w-12 h-12 rounded-xl bg-[#C1A972]/20 text-[#C1A972] flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                </div>
                <h3 class="font-bold text-white text-base">AI & Intelligence</h3>
                <p class="text-xs text-[#93A3B2]">
                    GenAI bots, predictive analytics, MLOps & custom LLMs.
                </p>
            </div>

            <div class="p-5 rounded-2xl bg-white/[0.03] border border-white/10 backdrop-blur-md space-y-2">
                <div class="w-12 h-12 rounded-xl bg-[#C1A972]/20 text-[#C1A972] flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h3 class="font-bold text-white text-base">Cloud & Security</h3>
                <p class="text-xs text-[#93A3B2]">
                    DevOps, zero-trust cybersecurity, compliance & networking.
                </p>
            </div>

            <div class="p-5 rounded-2xl bg-white/[0.03] border border-white/10 backdrop-blur-md space-y-2">
                <div class="w-12 h-12 rounded-xl bg-[#C1A972]/20 text-[#C1A972] flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="font-bold text-white text-base">Global Presence</h3>
                <p class="text-xs text-[#93A3B2]">
                    Serving 20+ industries with round-the-clock delivery.
                </p>
            </div>
        </div>
    </div>
</div>
