<footer class="bg-[#0F2334] text-[#B4C1CD] text-xs border-t border-[#153758] relative z-10 overflow-hidden" id="main-footer">
    <!-- Decorative Glow Elements -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#264868]/20 rounded-full blur-3xl pointer-events-none -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-10 w-96 h-96 bg-[#C1A972]/10 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Top Pre-Footer Banner / CTA Box (Codinix Style) -->
    <div class="border-b border-[#153758]/80 bg-gradient-to-r from-[#153758] via-[#264868] to-[#153758] py-12 px-6 relative z-10">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-between gap-8">
            <div class="space-y-2 max-w-2xl text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#C1A972]/10 border border-[#C1A972]/30 text-[#D9C48F] font-bold text-[11px] uppercase tracking-wider">
                    <svg class="w-3.5 h-3.5 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    <span>Enterprise Technology Consulting</span>
                </div>
                <h3 class="text-2xl sm:text-3xl font-black text-white tracking-tight">
                    Ready to Accelerate Your Digital Transformation?
                </h3>
                <p class="text-[#B4C1CD] text-xs sm:text-sm leading-relaxed">
                    Partner with our global solution architects for CRM, Cloud DevOps, Custom AI, or Dedicated IT Staffing.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-4 w-full lg:w-auto" x-data="{ newsletterEmail: '', subscribed: false }">
                <button
                    @click="consultationOpen = true"
                    class="w-full sm:w-auto px-6 py-3.5 bg-[#C1A972] hover:bg-[#D9C48F] text-[#153758] font-extrabold text-xs uppercase tracking-wider rounded-xl transition-all shadow-lg hover:shadow-[#C1A972]/20 flex items-center justify-center gap-2"
                >
                    <span>Schedule Free Consultation</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>

                <!-- Newsletter Subscription Form -->
                <form @submit.prevent="if (newsletterEmail.trim()) { subscribed = true; setTimeout(() => subscribed = false, 5000); newsletterEmail = ''; }" class="relative w-full sm:w-80 flex items-center">
                    <input
                        type="email"
                        required
                        x-model="newsletterEmail"
                        placeholder="Enter work email for insights"
                        class="w-full pl-4 pr-24 py-3.5 rounded-xl bg-[#0F2334]/90 border border-[#153758] text-white placeholder-[#93A3B2] text-xs focus:outline-none focus:border-[#C1A972] transition-all"
                    />
                    <button
                        type="submit"
                        class="absolute right-1.5 px-3 py-2 bg-[#264868] hover:bg-[#153758] text-white font-bold text-[11px] rounded-lg transition-all flex items-center gap-1.5 border border-white/10"
                    >
                        <span>Subscribe</span>
                        <svg class="w-3 h-3 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    </button>
                </form>
            </div>
        </div>

        <div x-show="subscribed" x-cloak x-transition class="max-w-7xl mx-auto mt-4 p-3 bg-[#153758]/80 border border-[#264868]/40 rounded-xl text-white text-xs text-center flex items-center justify-center gap-2">
            <svg class="w-4 h-4 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>Thank you for subscribing to Octavia Tech Insights! Check your inbox shortly.</span>
        </div>
    </div>

    <!-- Main Multi-Column Footer Grid -->
    <div class="max-w-7xl mx-auto px-6 py-16 space-y-12 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10">
            
            <!-- Column 1: Brand Profile & Trust Certifications (Span 4) -->
            <div class="lg:col-span-4 space-y-6">
                <a href="/" class="flex items-center gap-2" aria-label="Octavia Tech Solutions — home">
                    <span class="inline-flex items-center rounded-xl bg-[#FEFEFE] px-3 py-1.5 shadow-md shadow-black/20">
                        <span class="font-extrabold text-2xl tracking-tight text-[#153758]">Octavia</span>
                    </span>
                </a>

                <p class="text-[#B4C1CD] text-xs leading-relaxed max-w-sm">
                    Codinix-grade software development & enterprise IT consulting. Engineering secure cloud platforms, AI integrations, CRM/ERP modernizations, and 24/7 managed infrastructure worldwide.
                </p>

                <!-- Certifications & Badges Row -->
                <div class="grid grid-cols-2 gap-2 pt-2 max-w-sm">
                    <div class="flex items-center gap-2 p-2 rounded-lg bg-white/5 border border-white/10 text-[11px] text-[#B4C1CD]">
                        <svg class="w-4 h-4 text-[#264868] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        <span>ISO 27001 Certified</span>
                    </div>
                    <div class="flex items-center gap-2 p-2 rounded-lg bg-white/5 border border-white/10 text-[11px] text-[#B4C1CD]">
                        <svg class="w-4 h-4 text-[#D9C48F] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        <span>SOC 2 Type II Compliant</span>
                    </div>
                    <div class="flex items-center gap-2 p-2 rounded-lg bg-white/5 border border-white/10 text-[11px] text-[#B4C1CD]">
                        <svg class="w-4 h-4 text-[#D9C48F] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        <span>Salesforce Partner</span>
                    </div>
                    <div class="flex items-center gap-2 p-2 rounded-lg bg-white/5 border border-white/10 text-[11px] text-[#B4C1CD]">
                        <svg class="w-4 h-4 text-[#264868] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>AWS Premier Tier</span>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="pt-2 flex items-center gap-2.5">
                    <a href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 hover:border-[#C1A972] hover:bg-[#264868] text-[#B4C1CD] hover:text-white flex items-center justify-center transition-all" aria-label="LinkedIn">
                        <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    <a href="https://x.com" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 hover:border-[#C1A972] hover:bg-[#264868] text-[#B4C1CD] hover:text-white flex items-center justify-center transition-all" aria-label="X / Twitter">
                        <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 hover:border-[#C1A972] hover:bg-[#264868] text-[#B4C1CD] hover:text-white flex items-center justify-center transition-all" aria-label="Facebook">
                        <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M24 12.073C24 5.446 18.627.073 12 .073S0 5.446 0 12.073c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 hover:border-[#C1A972] hover:bg-[#264868] text-[#B4C1CD] hover:text-white flex items-center justify-center transition-all" aria-label="Instagram">
                        <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 1-2.881 0 1.44 1.44 0 0 1 2.881 0z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Column 2: Core Technology Services (Span 2) -->
            <div class="lg:col-span-2 space-y-3">
                <h4 class="text-[#D9C48F] font-extrabold text-xs uppercase tracking-wider">Services</h4>
                <ul class="space-y-2 text-[#B4C1CD]">
                    <li><a href="/services/crm-erp" class="hover:text-white transition-colors block">CRM & ERP Modernization</a></li>
                    <li><a href="/services/cloud-devops" class="hover:text-white transition-colors block">Cloud Enablement & DevOps</a></li>
                    <li><a href="/services/web-development" class="hover:text-white transition-colors block">Custom Software Dev</a></li>
                    <li><a href="/services/ai-ml" class="hover:text-white transition-colors block">AI & Machine Learning</a></li>
                    <li><a href="/services/mobile-apps" class="hover:text-white transition-colors block">Mobile App Engineering</a></li>
                    <li><a href="/services/cyber-security" class="hover:text-white transition-colors block">Cybersecurity & Zero Trust</a></li>
                    <li><a href="/services/staff-augmentation" class="hover:text-white transition-colors block">IT Staff Augmentation</a></li>
                </ul>
            </div>

            <!-- Column 3: Industries & Solutions (Span 2) -->
            <div class="lg:col-span-2 space-y-3">
                <h4 class="text-[#D9C48F] font-extrabold text-xs uppercase tracking-wider">Industries</h4>
                <ul class="space-y-2 text-[#B4C1CD]">
                    <li><a href="/industries/healthcare" class="hover:text-white transition-colors block">Healthcare & Life Sciences</a></li>
                    <li><a href="/industries/fintech" class="hover:text-white transition-colors block">FinTech & Digital Banking</a></li>
                    <li><a href="/industries/retail" class="hover:text-white transition-colors block">Retail & Headless Commerce</a></li>
                    <li><a href="/industries/manufacturing" class="hover:text-white transition-colors block">Smart Manufacturing & IoT</a></li>
                    <li><a href="/industries/wholesale-softswitch-billing" class="hover:text-white transition-colors block">Telecom & Media</a></li>
                    <li><a href="/industries/logistics" class="hover:text-white transition-colors block">Supply Chain & Logistics</a></li>
                </ul>
            </div>

            <!-- Column 4: Quick Links / Company (Span 2) -->
            <div class="lg:col-span-2 space-y-3">
                <h4 class="text-[#D9C48F] font-extrabold text-xs uppercase tracking-wider">Company</h4>
                <ul class="space-y-2 text-[#B4C1CD]">
                    <li><a href="/about-us" class="hover:text-white transition-colors block">About Octavia</a></li>
                    <li><a href="/case-studies" class="hover:text-white transition-colors block">Case Studies & ROI</a></li>
                    <li><a href="/services" class="hover:text-white transition-colors block">Delivery Process</a></li>
                    <li><a href="/about-us#careers" class="hover:text-white transition-colors flex items-center gap-1.5">Careers <span class="text-[9px] font-bold bg-[#264868] text-[#D9C48F] px-1.5 py-0.5 rounded uppercase">Hiring</span></a></li>
                    <li><a href="/blog" class="hover:text-white transition-colors block">Insights & Whitepapers</a></li>
                    <li><a href="/contact" class="hover:text-white transition-colors block">Contact Us</a></li>
                </ul>
            </div>

            <!-- Column 5: Global Offices & Contact (Span 2) -->
            <div class="lg:col-span-2 space-y-4">
                <h4 class="text-[#D9C48F] font-extrabold text-xs uppercase tracking-wider">Global Offices</h4>

                <!-- US Office -->
                <div class="space-y-1">
                    <div class="flex items-center gap-1.5 font-bold text-white text-[11px]">
                        <svg class="w-3.5 h-3.5 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <span>US Headquarters</span>
                    </div>
                    <p class="text-[#B4C1CD] text-[11px] leading-snug">
                        200 Middlesex Essex Turnpike,<br />
                        Suite 306E, Iselin, NJ 08830, USA
                    </p>
                </div>

                <!-- India Office -->
                <div class="space-y-1 pt-1 border-t border-[#153758]">
                    <div class="flex items-center gap-1.5 font-bold text-white text-[11px]">
                        <svg class="w-3.5 h-3.5 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <span>India Tech Hub</span>
                    </div>
                    <p class="text-[#B4C1CD] text-[11px] leading-snug">
                        Bhutani Cyber Park, Sector 62,<br />
                        Noida, Uttar Pradesh, India
                    </p>
                </div>

                <!-- Contact Details -->
                <div class="space-y-1.5 pt-2 border-t border-[#153758]">
                    <div class="flex items-center gap-2 text-[#B4C1CD]">
                        <svg class="w-3.5 h-3.5 text-[#D9C48F] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <a href="mailto:connect@codinix.com" class="hover:text-white transition-colors truncate">connect@codinix.com</a>
                    </div>
                    <div class="flex items-center gap-2 text-[#B4C1CD]">
                        <svg class="w-3.5 h-3.5 text-[#D9C48F] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <a href="tel:+17713332222" class="hover:text-white transition-colors">+1 (771) 333-2222</a>
                    </div>
                    <div class="flex items-center gap-2 text-[#B4C1CD]">
                        <svg class="w-3.5 h-3.5 text-[#264868] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-[11px] text-[#B4C1CD]">24/7 Global Delivery Support</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar: Copyright & Legal -->
        <div class="pt-8 border-t border-[#153758] flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-[#B4C1CD]">
            <p>© {{ date('Y') }} Octavia Tech Solutions / Codinix. All rights reserved.</p>

            <div class="flex flex-wrap items-center gap-6">
                <a href="/privacy-policy" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="/terms-of-service" class="hover:text-white transition-colors">Terms of Service</a>
                <a href="/cookie-policy" class="hover:text-white transition-colors">Cookie Policy</a>
                <a href="/sitemap" class="hover:text-white transition-colors">Sitemap</a>

                <!-- Back to Top Floating Button -->
                <button
                    @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
                    class="w-8 h-8 rounded-lg bg-white/10 hover:bg-[#C1A972] text-white hover:text-[#153758] flex items-center justify-center transition-all ml-2"
                    title="Back to top"
                    aria-label="Back to top"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                </button>
            </div>
        </div>
    </div>
</footer>
