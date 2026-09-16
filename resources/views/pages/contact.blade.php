@extends('layouts.app')

@section('content')
<div class="bg-[#153758] text-[#FEFEFE] min-h-screen pt-36 pb-20 font-sans selection:bg-[#264868] selection:text-white" x-data="contactPage()">
    <!-- Background Lighting Gradients -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0">
        <div class="absolute top-10 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] bg-gradient-to-b from-[#264868]/20 via-[#C1A972]/10 to-transparent blur-[160px] rounded-full"></div>
        <div class="absolute top-[800px] left-0 w-[500px] h-[500px] bg-[#153758]/10 blur-[140px] rounded-full"></div>
        <div class="absolute top-[1600px] right-0 w-[500px] h-[500px] bg-[#C1A972]/10 blur-[140px] rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-16">
        <!-- 1. HERO HEADER -->
        <div class="text-center max-w-4xl mx-auto space-y-6 pt-4">
            <!-- Breadcrumb Navigation -->
            <nav class="flex items-center justify-center gap-2 text-xs text-[#B4C1CD] font-medium">
                <a href="/" class="hover:text-[#D9C48F] transition-colors">Home</a>
                <span>/</span>
                <span class="text-[#D9C48F] font-semibold">Contact Us</span>
            </nav>

            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#264868]/60 border border-[#C1A972]/40 text-[#D9C48F] text-xs font-bold uppercase tracking-wider shadow-lg shadow-black/20">
                <svg class="w-3.5 h-3.5 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                <span>Direct Engineering Access</span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                Get in Touch with Our <br class="hidden sm:inline" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#C1A972] via-[#C1A972] to-[#C1A972]">
                    Engineering Team
                </span>
            </h1>

            <!-- Subtitle -->
            <p class="text-base sm:text-xl text-[#B4C1CD] max-w-3xl mx-auto leading-relaxed font-normal">
                Have a question or want to discuss a project? The right person on our team will pick it
                up, usually within a business day — routed directly without front-desk delays.
            </p>

            <!-- Key Value Badges -->
            <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-8 pt-4 text-xs sm:text-sm font-semibold text-[#B4C1CD]">
                <div class="flex items-center gap-2 bg-white/5 px-4 py-2 rounded-xl border border-white/10 shadow-sm">
                    <svg class="w-4 h-4 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Under 24h Response SLA</span>
                </div>
                <div class="flex items-center gap-2 bg-white/5 px-4 py-2 rounded-xl border border-white/10 shadow-sm">
                    <svg class="w-4 h-4 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <span>Mutual NDA Protected</span>
                </div>
                <div class="flex items-center gap-2 bg-white/5 px-4 py-2 rounded-xl border border-white/10 shadow-sm">
                    <svg class="w-4 h-4 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <span>Direct Lead Engineer Route</span>
                </div>
            </div>
        </div>

        <!-- 2. MAIN SPLIT SECTION: FORM (LEFT) + DIRECT CHANNELS (RIGHT) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            <!-- LEFT: FORM CARD -->
            <div class="lg:col-span-7 bg-[#0F2334]/90 border border-white/15 rounded-3xl p-6 sm:p-10 shadow-2xl backdrop-blur-xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-48 h-48 bg-[#C1A972]/10 blur-3xl rounded-full pointer-events-none"></div>

                <div class="mb-8 space-y-2">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight flex items-center gap-3">
                            <svg class="w-6 h-6 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            <span>Send a message</span>
                        </h2>
                        <span class="text-xs font-semibold text-[#D9C48F] bg-[#C1A972]/10 border border-[#C1A972]/30 px-3 py-1 rounded-full">
                            Step 1 of 1
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm text-[#B4C1CD]">
                        Fill out the details below and we'll route your request directly to our senior tech architects.
                    </p>
                </div>

                <template x-if="isSubmitted">
                    <div class="bg-[#153758]/60 border border-[#264868]/40 rounded-2xl p-8 text-center space-y-4">
                        <div class="w-16 h-16 bg-[#264868]/20 text-[#264868] rounded-full flex items-center justify-center mx-auto border border-[#264868]/40 shadow-lg shadow-[#153758]/30">
                            <svg class="w-8 h-8 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white">Message Received!</h3>
                        <p class="text-sm text-[#FEFEFE] max-w-md mx-auto leading-relaxed">
                            Thank you <strong class="text-[#264868]" x-text="formData.fullName"></strong>. Your
                            inquiry regarding <strong class="text-[#D9C48F]" x-text="formData.topic"></strong> has
                            been assigned to our lead tech architect. We will reach back to
                            <span class="underline text-[#264868]" x-text="formData.workEmail"></span> within 24 hours.
                        </p>
                        <button
                            @click="isSubmitted = false; resetForm()"
                            class="mt-4 px-6 py-2.5 bg-white/10 hover:bg-white/20 text-white font-semibold text-xs rounded-xl border border-white/20 transition-all"
                        >
                            Send Another Message
                        </button>
                    </div>
                </template>

                <template x-if="!isSubmitted">
                    <form @submit.prevent="submitContactForm()" class="space-y-6">
                        <!-- Name & Email Row -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-[#FEFEFE] uppercase tracking-wider flex items-center justify-between">
                                    <span>Full Name <span class="text-[#D9C48F]">*</span></span>
                                </label>
                                <div class="relative">
                                    <svg class="w-4 h-4 text-[#B4C1CD] absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    <input
                                        type="text"
                                        required
                                        maxlength="100"
                                        x-model="formData.fullName"
                                        placeholder="e.g. Alex Morgan"
                                        class="w-full bg-white/5 border border-white/15 focus:border-[#C1A972] focus:bg-white/10 text-white rounded-xl pl-10 pr-4 py-3 text-sm transition-all focus:outline-none placeholder-[#5C6B7A]"
                                    />
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs font-bold text-[#FEFEFE] uppercase tracking-wider flex items-center justify-between">
                                    <span>Work Email <span class="text-[#D9C48F]">*</span></span>
                                </label>
                                <div class="relative">
                                    <svg class="w-4 h-4 text-[#B4C1CD] absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    <input
                                        type="email"
                                        required
                                        maxlength="100"
                                        x-model="formData.workEmail"
                                        placeholder="alex@company.com"
                                        class="w-full bg-white/5 border border-white/15 focus:border-[#C1A972] focus:bg-white/10 text-white rounded-xl pl-10 pr-4 py-3 text-sm transition-all focus:outline-none placeholder-[#5C6B7A]"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Company & Country Row -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-[#FEFEFE] uppercase tracking-wider">
                                    Company / Organization <span class="text-[#D9C48F]">*</span>
                                </label>
                                <div class="relative">
                                    <svg class="w-4 h-4 text-[#B4C1CD] absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    <input
                                        type="text"
                                        required
                                        maxlength="100"
                                        x-model="formData.company"
                                        placeholder="e.g. Acme Corp"
                                        class="w-full bg-white/5 border border-white/15 focus:border-[#C1A972] focus:bg-white/10 text-white rounded-xl pl-10 pr-4 py-3 text-sm transition-all focus:outline-none placeholder-[#5C6B7A]"
                                    />
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs font-bold text-[#FEFEFE] uppercase tracking-wider">
                                    Country / Region
                                </label>
                                <div class="relative">
                                    <svg class="w-4 h-4 text-[#B4C1CD] absolute left-3.5 top-3.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                                    <select
                                        x-model="formData.country"
                                        class="w-full bg-[#153758] border border-white/15 focus:border-[#C1A972] text-white rounded-xl pl-10 pr-8 py-3 text-sm transition-all focus:outline-none appearance-none cursor-pointer"
                                    >
                                        <option value="United States">United States</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="India">India</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Other">Other Region</option>
                                    </select>
                                    <svg class="w-4 h-4 text-[#B4C1CD] absolute right-3.5 top-3.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <!-- Topic Dropdown -->
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-[#FEFEFE] uppercase tracking-wider flex items-center justify-between">
                                <span>What's this about? <span class="text-[#D9C48F]">*</span></span>
                            </label>
                            <div class="relative">
                                <select
                                    required
                                    x-model="formData.topic"
                                    class="w-full bg-[#153758] border border-white/15 focus:border-[#C1A972] text-white rounded-xl px-4 py-3 text-sm transition-all focus:outline-none appearance-none cursor-pointer font-medium"
                                >
                                    <option value="Sales / New Project Inquiry">Sales / Demo / New Project Inquiry</option>
                                    <option value="Run a pilot">Run a pilot / Proof of Concept (PoC)</option>
                                    <option value="Partnership">Strategic Partnership & Vendor Channel</option>
                                    <option value="Careers">Careers & Engineering Talent</option>
                                    <option value="Press / Analyst">Press, Media & Analyst Inquiry</option>
                                    <option value="Existing customer support">Existing Customer Support & SLA Ticket</option>
                                    <option value="Something else">Something else</option>
                                </select>
                                <svg class="w-4 h-4 text-[#B4C1CD] absolute right-3.5 top-3.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>

                        <!-- Message Textarea -->
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-[#FEFEFE] uppercase tracking-wider flex items-center justify-between">
                                <span>Tell us a bit more <span class="text-[#D9C48F]">*</span></span>
                                <span class="text-[10px] text-[#B4C1CD] font-normal">Project scope, tech stack, or objectives</span>
                            </label>
                            <textarea
                                required
                                maxlength="5000"
                                rows="4"
                                x-model="formData.message"
                                placeholder="Share your technical goals, target timeline, key requirements, or questions..."
                                class="w-full bg-white/5 border border-white/15 focus:border-[#C1A972] focus:bg-white/10 text-white rounded-xl p-4 text-sm transition-all focus:outline-none placeholder-[#5C6B7A] resize-y"
                            ></textarea>
                        </div>

                        <!-- Privacy Agreement Checkbox -->
                        <div class="flex items-start gap-3 pt-1">
                            <input
                                type="checkbox"
                                id="agreePrivacy"
                                x-model="formData.agreePrivacy"
                                required
                                class="mt-1 w-4 h-4 rounded border-white/20 bg-white/10 text-[#D9C48F] focus:ring-[#C1A972] cursor-pointer"
                            />
                            <label for="agreePrivacy" class="text-xs text-[#B4C1CD] leading-relaxed cursor-pointer">
                                I agree to Octavia's <a href="/privacy-policy" class="text-[#D9C48F] hover:underline">Privacy Policy</a> and consent to processing my contact information to handle this inquiry.
                            </label>
                        </div>

                        <!-- Bot Protection Math Captcha -->
                        <div class="p-3 rounded-xl bg-white/5 border border-white/15 flex items-center justify-between gap-3">
                            <span class="text-xs font-bold text-white">Security Check: <span x-text="captchaNum1"></span> + <span x-text="captchaNum2"></span> = ?</span>
                            <input
                                type="number"
                                required
                                x-model="captchaInput"
                                placeholder="Result"
                                class="w-24 px-3 py-1.5 rounded-lg bg-[#153758] border border-white/20 text-xs text-center font-bold text-white focus:outline-none focus:border-[#C1A972]"
                            />
                        </div>

                        <div x-show="formError" x-text="formError" class="p-3 bg-red-950/80 border border-red-500/50 text-red-200 text-xs font-semibold rounded-xl"></div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            :disabled="isSubmitting"
                            class="w-full py-4 px-8 bg-gradient-to-r from-[#264868] via-[#153758] to-[#264868] hover:from-[#153758] hover:to-[#264868] border border-[#C1A972]/50 text-white font-extrabold text-sm sm:text-base rounded-2xl transition-all shadow-xl shadow-black/40 flex items-center justify-center gap-3 group"
                        >
                            <span x-text="isSubmitting ? 'Routing to Engineering Team...' : 'Send Message'"></span>
                            <svg class="w-5 h-5 text-[#D9C48F] group-hover:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>

                        <p class="text-center text-[11px] text-[#B4C1CD]">
                            ⚡ Average turnaround: 2-4 hours during business days. Mutual NDA signed upon request.
                        </p>
                    </form>
                </template>
            </div>

            <!-- RIGHT: "Skip the form" / DIRECT CONTACT CHANNELS -->
            <div class="lg:col-span-5 space-y-8">
                <!-- Direct Email Cards -->
                <div class="bg-[#0F2334]/90 border border-white/15 rounded-3xl p-6 sm:p-8 backdrop-blur-xl space-y-6 shadow-xl">
                    <div class="border-b border-white/10 pb-4">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#C1A972]/10 text-[#D9C48F] text-[11px] font-bold uppercase tracking-wider border border-[#C1A972]/20 mb-2">
                            <span>Direct Communication</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white">Skip the form</h3>
                        <p class="text-xs text-[#B4C1CD] mt-1">
                            Email the specialized department handling your inquiry directly.
                        </p>
                    </div>

                    <div class="space-y-3">
                        @php
                            $directEmailChannels = [
                                ['title' => "Sales & New Projects", 'email' => "sales@octaviatechnologies.com", 'desc' => "Project proposals, RFPs, scope audits, & timeline estimates."],
                                ['title' => "Client Support", 'email' => "support@octaviatechnologies.com", 'desc' => "Existing client SLAs, portal help, & ongoing sprint tickets."],
                                ['title' => "Careers & Talent", 'email' => "careers@octaviatechnologies.com", 'desc' => "Engineering applications, leadership roles, & internships."],
                                ['title' => "Press & Media", 'email' => "press@octaviatechnologies.com", 'desc' => "Media inquiries, analyst relations, & brand asset kits."],
                                ['title' => "Investor Relations", 'email' => "investors@octaviatechnologies.com", 'desc' => "Growth capital, strategic ventures, & financial disclosures."],
                            ];
                        @endphp

                        @foreach ($directEmailChannels as $ch)
                            <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 hover:border-[#C1A972]/40 transition-all flex items-start justify-between gap-3 group">
                                <div class="flex items-start gap-3">
                                    <div class="p-2.5 rounded-xl bg-[#264868]/30 border border-[#264868]/40 text-[#D9C48F] shrink-0 mt-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <div>
                                        <div class="text-xs font-bold text-white group-hover:text-[#D9C48F] transition-colors">
                                            {{ $ch['title'] }}
                                        </div>
                                        <a href="mailto:{{ $ch['email'] }}" class="text-xs font-semibold text-[#D9C48F] hover:underline block my-0.5">
                                            {{ $ch['email'] }}
                                        </a>
                                        <div class="text-[11px] text-[#B4C1CD] leading-tight">{{ $ch['desc'] }}</div>
                                    </div>
                                </div>

                                <button
                                    @click="copyEmail('{{ $ch['email'] }}')"
                                    class="p-2 text-[#B4C1CD] hover:text-white hover:bg-white/10 rounded-lg transition-colors shrink-0"
                                    title="Copy email address"
                                >
                                    <span x-show="copiedEmail === '{{ $ch['email'] }}'" class="text-[10px] text-[#264868] font-bold">Copied!</span>
                                    <svg x-show="copiedEmail !== '{{ $ch['email'] }}'" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Direct Regional Phone Hotlines -->
                <div class="bg-[#0F2334]/90 border border-white/15 rounded-3xl p-6 sm:p-8 backdrop-blur-xl space-y-4 shadow-xl">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2 border-b border-white/10 pb-3">
                        <svg class="w-4 h-4 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span>Regional Support Lines</span>
                    </h3>

                    <div class="space-y-3 text-xs">
                        <div class="flex items-center justify-between p-3 rounded-xl bg-white/5 border border-white/10">
                            <div class="flex items-center gap-2.5">
                                <span class="text-lg">🇺🇸</span>
                                <div>
                                    <span class="font-bold text-white block">United States (Americas)</span>
                                    <span class="text-[10px] text-[#B4C1CD]">PST / EST Hours</span>
                                </div>
                            </div>
                            <a href="tel:+16504548668" class="font-bold text-[#D9C48F] hover:underline">+1 650-454-8668</a>
                        </div>

                        <div class="flex items-center justify-between p-3 rounded-xl bg-white/5 border border-white/10">
                            <div class="flex items-center gap-2.5">
                                <span class="text-lg">🇦🇪</span>
                                <div>
                                    <span class="font-bold text-white block">Dubai, UAE (EMEA)</span>
                                    <span class="text-[10px] text-[#B4C1CD]">GST Hours</span>
                                </div>
                            </div>
                            <a href="tel:+97144800000" class="font-bold text-[#D9C48F] hover:underline">+971 4 480 0000</a>
                        </div>

                        <div class="flex items-center justify-between p-3 rounded-xl bg-white/5 border border-white/10">
                            <div class="flex items-center gap-2.5">
                                <span class="text-lg">🇮🇳</span>
                                <div>
                                    <span class="font-bold text-white block">India (APAC Engine)</span>
                                    <span class="text-[10px] text-[#B4C1CD]">IST Hours</span>
                                </div>
                            </div>
                            <a href="tel:+918048123456" class="font-bold text-[#D9C48F] hover:underline">+91 80 4812 3456</a>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-[#264868]/20 border border-[#264868]/40 text-[#B4C1CD] text-xs flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-[#264868] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        <span>
                            <strong>No automated phone trees:</strong> You will connect directly with an engineering manager or technical client manager.
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. GLOBAL OFFICES SECTION WITH MAP TABS -->
        <div class="pt-8 space-y-10" x-data="{ activeOfficeTab: 0 }">
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#264868]/40 border border-[#C1A972]/30 text-[#D9C48F] text-xs font-bold uppercase tracking-wider">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    <span>International Hubs</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                    Our Global Offices
                </h2>
                <p class="text-sm sm:text-base text-[#B4C1CD]">
                    Operating across three continents to support global enterprises with 24/7 engineering pipelines.
                </p>
            </div>

            @php
                $offices = [
                    [
                        'id' => "sf",
                        'city' => "San Francisco",
                        'country' => "United States",
                        'region' => "Americas HQ",
                        'address' => "548 Market Street, Suite 800, San Francisco, CA 94104",
                        'email' => "sf@octaviatechnologies.com",
                        'phone' => "+1 (650) 454-8668",
                        'timezone' => "PST (UTC-8)",
                        'hours' => "8:30 AM - 6:00 PM PST",
                        'flag' => "🇺🇸",
                        'mapEmbedUrl' => "https://maps.google.com/maps?q=548+Market+Street+San+Francisco+CA+94104&t=&z=13&ie=UTF8&iwloc=&output=embed",
                    ],
                    [
                        'id' => "dubai",
                        'city' => "Dubai",
                        'country' => "United Arab Emirates",
                        'region' => "EMEA HQ",
                        'address' => "Dubai Internet City, Building 3, Suite 402, Dubai, UAE",
                        'email' => "dubai@octaviatechnologies.com",
                        'phone' => "+971 4 480 0000",
                        'timezone' => "GST (UTC+4)",
                        'hours' => "9:00 AM - 6:30 PM GST",
                        'flag' => "🇦🇪",
                        'mapEmbedUrl' => "https://maps.google.com/maps?q=Dubai+Internet+City+Building+3&t=&z=13&ie=UTF8&iwloc=&output=embed",
                    ],
                    [
                        'id' => "noida",
                        'city' => "Noida (Delhi NCR)",
                        'country' => "India",
                        'region' => "APAC Engineering Hub",
                        'address' => "Noida One Tower, Tower-C, Unit 1017, 10th Floor, Sector 62, Noida 201309",
                        'email' => "india@octaviatechnologies.com",
                        'phone' => "+91 80 4812 3456",
                        'timezone' => "IST (UTC+5:30)",
                        'hours' => "9:30 AM - 7:00 PM IST",
                        'flag' => "🇮🇳",
                        'mapEmbedUrl' => "https://maps.google.com/maps?q=Noida+One+Sector+62+Noida&t=&z=13&ie=UTF8&iwloc=&output=embed",
                    ],
                ];
            @endphp

            <!-- Office Selector Tabs -->
            <div class="flex flex-wrap items-center justify-center gap-3">
                @foreach ($offices as $idx => $office)
                    <button
                        @click="activeOfficeTab = {{ $idx }}"
                        :class="activeOfficeTab === {{ $idx }} ? 'bg-[#264868] text-white border-[#C1A972] shadow-lg shadow-black/30' : 'bg-white/5 text-[#B4C1CD] hover:bg-white/10 border-white/10'"
                        class="px-5 py-2.5 rounded-2xl text-xs font-bold transition-all flex items-center gap-2.5 border"
                    >
                        <span class="text-base">{{ $office['flag'] }}</span>
                        <span>{{ $office['city'] }}</span>
                        <span class="text-[10px] font-normal text-[#B4C1CD]">({{ $office['region'] }})</span>
                    </button>
                @endforeach
            </div>

            <!-- Selected Office Card Grid + Interactive Map Box -->
            @foreach ($offices as $idx => $office)
                <div
                    x-show="activeOfficeTab === {{ $idx }}"
                    x-cloak
                    class="grid grid-cols-1 lg:grid-cols-12 gap-8 bg-[#0F2334]/90 border border-white/15 rounded-3xl p-6 sm:p-10 shadow-2xl backdrop-blur-xl"
                >
                    <div class="lg:col-span-5 space-y-6">
                        <div class="space-y-2 border-b border-white/10 pb-4">
                            <div class="flex items-center gap-3">
                                <span class="text-3xl">{{ $office['flag'] }}</span>
                                <div>
                                    <h3 class="text-2xl font-bold text-white">{{ $office['city'] }}</h3>
                                    <span class="text-xs text-[#D9C48F] font-semibold uppercase tracking-wider">
                                        {{ $office['region'] }} • {{ $office['country'] }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 text-xs sm:text-sm">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#D9C48F] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div>
                                    <span class="text-[11px] font-bold text-[#B4C1CD] block uppercase">Physical Address</span>
                                    <p class="text-[#FEFEFE] font-medium leading-relaxed">{{ $office['address'] }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#D9C48F] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                <div>
                                    <span class="text-[11px] font-bold text-[#B4C1CD] block uppercase">Office Email</span>
                                    <a href="mailto:{{ $office['email'] }}" class="text-[#D9C48F] hover:underline font-semibold">{{ $office['email'] }}</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#D9C48F] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                <div>
                                    <span class="text-[11px] font-bold text-[#B4C1CD] block uppercase">Direct Hotline</span>
                                    <a href="tel:{{ $office['phone'] }}" class="text-[#FEFEFE] hover:text-[#D9C48F] font-semibold">{{ $office['phone'] }}</a>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-3 pt-2">
                                <div class="p-3 rounded-xl bg-white/5 border border-white/10">
                                    <span class="text-[10px] text-[#B4C1CD] font-bold block uppercase">Time Zone</span>
                                    <span class="text-xs font-bold text-white flex items-center gap-1.5 mt-0.5">
                                        <svg class="w-3.5 h-3.5 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        {{ $office['timezone'] }}
                                    </span>
                                </div>
                                <div class="p-3 rounded-xl bg-white/5 border border-white/10">
                                    <span class="text-[10px] text-[#B4C1CD] font-bold block uppercase">Working Hours</span>
                                    <span class="text-xs font-bold text-white mt-0.5 block">{{ $office['hours'] }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="pt-2">
                            <a
                                href="https://maps.google.com/?q={{ urlencode($office['address']) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/15 text-xs font-bold text-white transition-all group"
                            >
                                <span>Open in Google Maps</span>
                                <svg class="w-3.5 h-3.5 text-[#D9C48F] group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                        </div>
                    </div>

                    <div class="lg:col-span-7 rounded-2xl overflow-hidden border border-white/15 min-h-[300px] relative bg-[#0F2334] shadow-inner">
                        <iframe
                            title="Map of {{ $office['city'] }}"
                            src="{{ $office['mapEmbedUrl'] }}"
                            width="100%"
                            height="100%"
                            style="border: 0; min-height: 320px;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            class="w-full h-full grayscale opacity-85 hover:grayscale-0 hover:opacity-100 transition-all duration-300"
                        ></iframe>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- 4. QUARTERLY INSIGHTS / NEWSLETTER SUBSCRIPTION -->
        <div class="bg-gradient-to-r from-[#264868] via-[#153758] to-[#264868] border border-[#C1A972]/40 rounded-3xl p-8 sm:p-12 shadow-2xl relative overflow-hidden" x-data="{ newsletterEmail: '', newsletterSuccess: false }">
            <div class="absolute top-0 right-0 w-80 h-80 bg-[#C1A972]/15 blur-3xl rounded-full pointer-events-none"></div>

            <div class="max-w-3xl mx-auto text-center space-y-6 relative z-10">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#C1A972]/10 text-[#D9C48F] text-xs font-bold uppercase tracking-wider border border-[#C1A972]/20">
                    <svg class="w-3.5 h-3.5 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    <span>Quarterly Engineering Journal</span>
                </div>

                <h3 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                    Subscribe to Engineering Insights
                </h3>

                <p class="text-xs sm:text-sm text-[#FEFEFE] leading-relaxed max-w-xl mx-auto">
                    Quarterly deep-dives into AI agent architectures, zero-trust cloud setups, and
                    microservices performance — delivered every 3 months. <strong class="text-white">Zero marketing fluff.</strong>
                </p>

                <template x-if="newsletterSuccess">
                    <div class="p-4 rounded-xl bg-[#264868]/20 border border-[#264868]/40 text-[#264868] text-xs font-bold inline-flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Subscribed! You will receive our next quarterly edition.</span>
                    </div>
                </template>

                <template x-if="!newsletterSuccess">
                    <form @submit.prevent="newsletterSuccess = true; setTimeout(() => { newsletterEmail = ''; newsletterSuccess = false; }, 4000)" class="flex flex-col sm:flex-row items-center justify-center gap-3 max-w-md mx-auto">
                        <input
                            type="email"
                            required
                            x-model="newsletterEmail"
                            placeholder="Enter your work email..."
                            class="w-full bg-white/10 border border-white/20 focus:border-[#C1A972] text-white rounded-xl px-4 py-3 text-sm focus:outline-none placeholder-[#B4C1CD]"
                        />
                        <button
                            type="submit"
                            class="w-full sm:w-auto px-6 py-3 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs sm:text-sm rounded-xl transition-all shrink-0 shadow-lg"
                        >
                            Subscribe
                        </button>
                    </form>
                </template>

                <p class="text-[11px] text-[#B4C1CD]">
                    🔒 Unsubscribe anytime in 1-click. We respect your privacy.
                </p>
            </div>
        </div>

        <!-- 5. FREQUENTLY ASKED QUESTIONS (FAQ) -->
        <div class="pt-8 space-y-8" x-data="{ openFaq: 0 }">
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/5 border border-white/10 text-xs font-bold uppercase tracking-wider text-[#D9C48F]">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Contact FAQs</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Frequently Asked Questions
                </h2>
                <p class="text-xs sm:text-sm text-[#B4C1CD]">
                    Clear answers regarding turnaround SLAs, NDA execution, and technical discovery.
                </p>
            </div>

            @php
                $faqs = [
                    [
                        'q' => "How quickly will I receive a response after submitting the contact form?",
                        'a' => "Your message is routed directly to our technical engagement leads without any generic front-desk delay. You will receive an initial response or scheduling link within 1 business day (and typically within 2-4 hours during global operating hours)."
                    ],
                    [
                        'q' => "Can we sign an NDA prior to sharing proprietary project details or specs?",
                        'a' => "Absolutely. We enforce strict enterprise confidentiality protocols. You can request a mutual NDA prior to our discovery session, or we can execute your standard vendor NDA agreement."
                    ],
                    [
                        'q' => "What information should I include in my initial message?",
                        'a' => "Providing a brief overview of your technical objectives, target timeline, high-level budget range, and current tech stack helps us assign the exact domain lead (e.g., AI/LLM Specialist, Cloud Architect, or Mobile Tech Lead) to your kick-off call."
                    ],
                    [
                        'q' => "Do you offer onsite technical workshops or client meetings?",
                        'a' => "Yes. Our senior solution architects and engineering leads regularly conduct on-site discovery workshops at client locations across North America, Europe, UAE, and APAC."
                    ],
                    [
                        'q' => "How do direct phone calls work if we are in a different time zone?",
                        'a' => "We operate across three major global hubs (Americas, EMEA, and APAC) offering 24/7 coverage. When you call any of our regional office lines, your call is connected directly to an on-duty technical account manager."
                    ]
                ];
            @endphp

            <div class="max-w-3xl mx-auto space-y-3">
                @foreach ($faqs as $idx => $faq)
                    <div class="rounded-2xl bg-[#0F2334]/90 border border-white/10 transition-all overflow-hidden">
                        <button
                            @click="openFaq = (openFaq === {{ $idx }} ? null : {{ $idx }})"
                            class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-sm sm:text-base text-white hover:text-[#D9C48F] transition-colors"
                        >
                            <span>{{ $faq['q'] }}</span>
                            <svg
                                :class="openFaq === {{ $idx }} ? 'rotate-180' : ''"
                                class="w-4 h-4 text-[#D9C48F] shrink-0 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="openFaq === {{ $idx }}" x-cloak class="px-5 pb-5 pt-0 text-xs sm:text-sm text-[#B4C1CD] leading-relaxed border-t border-white/5">
                            <p class="pt-3">{{ $faq['a'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 6. BOTTOM CONSULTATION BANNER -->
        <div class="text-center p-8 bg-white/5 rounded-3xl border border-white/10 max-w-3xl mx-auto space-y-4">
            <h3 class="text-xl font-bold text-white">Prefer a 1-on-1 Live Strategy Session?</h3>
            <p class="text-xs sm:text-sm text-[#B4C1CD] max-w-md mx-auto">
                Book a complimentary 30-minute discovery video call with an Enterprise Architect to
                discuss your custom project requirements.
            </p>
            <button
                @click="consultationTopic = 'Contact Us Page Strategy Call'; consultationOpen = true"
                class="px-8 py-3.5 bg-gradient-to-r from-[#264868] to-[#153758] border border-[#C1A972]/40 text-white font-bold text-xs sm:text-sm rounded-2xl transition-all shadow-xl hover:border-[#C1A972] inline-flex items-center gap-2"
            >
                <svg class="w-4 h-4 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                <span>Book 1-on-1 Discovery Session</span>
            </button>
        </div>
    </div>
</div>

<script>
function contactPage() {
    return {
        formData: {
            fullName: '',
            workEmail: '',
            company: '',
            country: 'United States',
            topic: 'Sales / New Project Inquiry',
            message: '',
            agreePrivacy: true
        },
        isSubmitting: false,
        isSubmitted: false,
        formError: null,
        captchaNum1: Math.floor(Math.random() * 8) + 2,
        captchaNum2: Math.floor(Math.random() * 8) + 1,
        captchaInput: '',
        copiedEmail: null,

        copyEmail(email) {
            navigator.clipboard.writeText(email);
            this.copiedEmail = email;
            setTimeout(() => this.copiedEmail = null, 2000);
        },

        resetForm() {
            this.formData = {
                fullName: '',
                workEmail: '',
                company: '',
                country: 'United States',
                topic: 'Sales / New Project Inquiry',
                message: '',
                agreePrivacy: true
            };
            this.captchaInput = '';
            this.captchaNum1 = Math.floor(Math.random() * 8) + 2;
            this.captchaNum2 = Math.floor(Math.random() * 8) + 1;
        },

        async submitContactForm() {
            const expectedSum = this.captchaNum1 + this.captchaNum2;
            if (parseInt(this.captchaInput, 10) !== expectedSum) {
                this.formError = 'Incorrect security check answer. Please try again.';
                return;
            }

            this.formError = null;
            this.isSubmitting = true;

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

            try {
                const res = await fetch('/contact', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        fullName: this.formData.fullName,
                        workEmail: this.formData.workEmail,
                        company: this.formData.company,
                        country: this.formData.country,
                        topic: this.formData.topic,
                        message: this.formData.message,
                        sourceForm: 'Main Contact Page',
                        sourceUrl: window.location.href,
                        userCaptchaAnswer: parseInt(this.captchaInput, 10),
                        expectedCaptchaAnswer: expectedSum
                    })
                });

                const data = await res.json();

                if (res.ok && data.success) {
                    this.isSubmitting = false;
                    this.isSubmitted = true;
                } else {
                    this.isSubmitting = false;
                    this.formError = data.message || (data.errors ? Object.values(data.errors).flat().join(' ') : 'Submission failed. Please verify your entries.');
                }
            } catch (err) {
                this.isSubmitting = false;
                this.formError = 'A network error occurred while submitting your message. Please try again or reach out directly.';
            }
        }
    }
}
</script>
@endsection
