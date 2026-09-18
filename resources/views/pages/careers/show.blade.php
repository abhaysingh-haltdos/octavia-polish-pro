@extends('layouts.app')

@section('title', "{$job['title']} Career Profile | Octavia Tech Solutions")
@section('description', "Apply for the {$job['title']} position at Octavia Tech Solutions. {$job['shortDescription']}")

@section('content')
<div class="bg-[#FEFEFE] text-[#0F2334] overflow-hidden">

    <!-- 1. Job Profile Hero Header -->
    <section class="relative pt-36 pb-20 bg-gradient-to-b from-[#0F2334] via-[#153758] to-[#0F2334] text-white overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-[#C1A972]/15 via-transparent to-transparent pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 text-xs font-semibold text-[#B4C1CD] mb-6">
                <a href="{{ url('/careers') }}" class="hover:text-white transition-colors flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    <span>All Roles</span>
                </a>
                <span>/</span>
                <span class="text-[#D9C48F]">{{ $job['department'] }}</span>
            </div>

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                <div class="space-y-4 max-w-3xl">
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight">
                        {{ $job['title'] }}
                    </h1>

                    <!-- Key Metadata Badges -->
                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-white/10 border border-white/15 text-xs text-white backdrop-blur-md">
                            <svg class="w-4 h-4 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>{{ $job['location'] }}</span>
                        </div>

                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-white/10 border border-white/15 text-xs text-white backdrop-blur-md">
                            <svg class="w-4 h-4 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>{{ $job['type'] }}</span>
                        </div>

                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-white/10 border border-white/15 text-xs text-white backdrop-blur-md">
                            <svg class="w-4 h-4 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>{{ $job['experience'] }}</span>
                        </div>

                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-[#C1A972]/20 border border-[#C1A972]/40 text-xs text-[#D9C48F] font-bold">
                            <span>{{ $job['badge'] ?? $job['department'] }}</span>
                        </div>
                    </div>
                </div>

                <!-- Fast Apply Anchor -->
                <div class="shrink-0">
                    <button
                        onclick="document.getElementById('apply-form').scrollIntoView({ behavior: 'smooth', block: 'start' })"
                        class="px-8 py-4 rounded-xl bg-[#C1A972] text-[#0F2334] font-extrabold hover:bg-white transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 flex items-center gap-2 text-sm"
                    >
                        <span>Apply for This Role</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Main Job Details & Sticky Application Sidebar -->
    <section class="py-16 lg:py-24 bg-[#F8FAFC]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                
                <!-- Left Column: Job Description & Specifications (7 Cols) -->
                <div class="lg:col-span-7 space-y-12">
                    
                    <!-- About the Role -->
                    <div class="p-8 sm:p-10 rounded-3xl bg-white border border-[#E2E8F0] shadow-sm space-y-4">
                        <div class="inline-flex items-center gap-2 text-xs font-extrabold uppercase tracking-wider text-[#153758]">
                            <span class="w-2 h-2 rounded-full bg-[#153758]"></span>
                            <span>OVERVIEW</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-black text-[#0F2334] tracking-tight">About the Role</h2>
                        <p class="text-sm sm:text-base text-[#52667A] leading-relaxed font-normal">
                            {{ $job['aboutRole'] }}
                        </p>
                    </div>

                    <!-- Responsibilities -->
                    <div class="p-8 sm:p-10 rounded-3xl bg-white border border-[#E2E8F0] shadow-sm space-y-6">
                        <div class="inline-flex items-center gap-2 text-xs font-extrabold uppercase tracking-wider text-[#153758]">
                            <span class="w-2 h-2 rounded-full bg-[#153758]"></span>
                            <span>WHAT YOU WILL DO</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-black text-[#0F2334] tracking-tight">Key Responsibilities</h2>
                        
                        <div class="space-y-3.5">
                            @foreach ($job['responsibilities'] as $resp)
                                <div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0]/60">
                                    <div class="w-6 h-6 rounded-lg bg-[#153758]/10 text-[#153758] flex items-center justify-center shrink-0 mt-0.5">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <span class="text-xs sm:text-sm text-[#0F2334] font-medium leading-relaxed">{{ $resp }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Experience & Qualifications -->
                    <div class="p-8 sm:p-10 rounded-3xl bg-white border border-[#E2E8F0] shadow-sm space-y-6">
                        <div class="inline-flex items-center gap-2 text-xs font-extrabold uppercase tracking-wider text-[#153758]">
                            <span class="w-2 h-2 rounded-full bg-[#153758]"></span>
                            <span>WHO WE ARE LOOKING FOR</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-black text-[#0F2334] tracking-tight">Experience & Qualifications</h2>
                        
                        <div class="space-y-3.5">
                            @foreach ($job['qualifications'] as $qual)
                                <div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0]/60">
                                    <div class="w-6 h-6 rounded-lg bg-[#C1A972]/20 text-[#153758] flex items-center justify-center shrink-0 mt-0.5">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <span class="text-xs sm:text-sm text-[#0F2334] font-medium leading-relaxed">{{ $qual }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Skills & Competencies -->
                    @if (!empty($job['skills']))
                        <div class="p-8 sm:p-10 rounded-3xl bg-white border border-[#E2E8F0] shadow-sm space-y-6">
                            <div class="inline-flex items-center gap-2 text-xs font-extrabold uppercase tracking-wider text-[#153758]">
                                <span class="w-2 h-2 rounded-full bg-[#153758]"></span>
                                <span>TECH & DOMAIN COMPETENCIES</span>
                            </div>
                            <h2 class="text-2xl sm:text-3xl font-black text-[#0F2334] tracking-tight">Key Skills & Tools</h2>

                            <div class="flex flex-wrap gap-2.5">
                                @foreach ($job['skills'] as $skill)
                                    <span class="px-4 py-2 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] text-xs font-bold text-[#153758] hover:border-[#153758] hover:bg-[#153758] hover:text-white transition-all cursor-default">
                                        {{ $skill }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- What We Offer -->
                    @if (!empty($job['perks']))
                        <div class="p-8 sm:p-10 rounded-3xl bg-white border border-[#E2E8F0] shadow-sm space-y-6">
                            <div class="inline-flex items-center gap-2 text-xs font-extrabold uppercase tracking-wider text-[#153758]">
                                <span class="w-2 h-2 rounded-full bg-[#153758]"></span>
                                <span>BENEFITS & GROWTH</span>
                            </div>
                            <h2 class="text-2xl sm:text-3xl font-black text-[#0F2334] tracking-tight">What We Offer</h2>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach ($job['perks'] as $perk)
                                    <div class="flex items-center gap-3 p-4 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0]">
                                        <div class="w-8 h-8 rounded-lg bg-[#C1A972]/20 text-[#153758] flex items-center justify-center shrink-0">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                        </div>
                                        <span class="text-xs font-bold text-[#0F2334] leading-snug">{{ $perk }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>

                <!-- Right Column: Sticky Job Application Form (5 Cols) -->
                <div class="lg:col-span-5 lg:sticky lg:top-28" id="apply-form">
                    <div
                        x-data="careerApplication('{{ $job['slug'] }}', '{{ addslashes($job['title']) }}')"
                        class="rounded-3xl bg-white border border-[#E2E8F0] shadow-2xl overflow-hidden"
                    >
                        <!-- Form Header Banner -->
                        <div class="bg-gradient-to-r from-[#0F2334] via-[#153758] to-[#264868] p-6 sm:p-8 text-white relative">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-[#C1A972]/15 rounded-full blur-2xl pointer-events-none"></div>
                            <span class="text-[10px] font-extrabold uppercase tracking-widest text-[#D9C48F] px-2.5 py-0.5 rounded-full bg-white/10 border border-white/15 inline-block mb-2">
                                JOIN OUR GLOBAL TEAM
                            </span>
                            <h3 class="text-xl sm:text-2xl font-black text-white leading-tight">
                                Apply for {{ $job['title'] }}
                            </h3>
                            <p class="text-xs text-white/80 mt-1 leading-relaxed">
                                Fill in your professional details below to submit your application.
                            </p>
                        </div>

                        <!-- Form Body -->
                        <form @submit.prevent="submitApplication" class="p-6 sm:p-8 space-y-5">
                            @csrf
                            <!-- Honeypot -->
                            <input type="text" name="website_hp" x-model="formData.honeypot" class="hidden" tabindex="-1" autocomplete="off" />

                            <!-- Full Name -->
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-[#0F2334]">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="text"
                                    x-model="formData.full_name"
                                    required
                                    placeholder="e.g. Rahul Sharma"
                                    class="w-full px-4 py-3 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] text-[#0F2334] text-xs font-medium focus:outline-none focus:ring-2 focus:ring-[#153758] transition-all"
                                />
                            </div>

                            <!-- Email & Phone Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="space-y-1.5">
                                    <label class="block text-xs font-bold text-[#0F2334]">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="email"
                                        x-model="formData.email"
                                        required
                                        placeholder="rahul@example.com"
                                        class="w-full px-4 py-3 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] text-[#0F2334] text-xs font-medium focus:outline-none focus:ring-2 focus:ring-[#153758] transition-all"
                                    />
                                </div>

                                <div class="space-y-1.5">
                                    <label class="block text-xs font-bold text-[#0F2334]">
                                        Phone Number <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="tel"
                                        x-model="formData.phone"
                                        required
                                        placeholder="+91 98765 43210"
                                        class="w-full px-4 py-3 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] text-[#0F2334] text-xs font-medium focus:outline-none focus:ring-2 focus:ring-[#153758] transition-all"
                                    />
                                </div>
                            </div>

                            <!-- Experience & Notice Period Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="space-y-1.5">
                                    <label class="block text-xs font-bold text-[#0F2334]">
                                        Years of Experience <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        x-model="formData.experience"
                                        required
                                        placeholder="e.g. 2.5 Years"
                                        class="w-full px-4 py-3 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] text-[#0F2334] text-xs font-medium focus:outline-none focus:ring-2 focus:ring-[#153758] transition-all"
                                    />
                                </div>

                                <div class="space-y-1.5">
                                    <label class="block text-xs font-bold text-[#0F2334]">
                                        Notice Period <span class="text-red-500">*</span>
                                    </label>
                                    <select
                                        x-model="formData.notice_period"
                                        required
                                        class="w-full px-4 py-3 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] text-[#0F2334] text-xs font-medium focus:outline-none focus:ring-2 focus:ring-[#153758] transition-all"
                                    >
                                        <option value="Immediate">Immediate</option>
                                        <option value="15 Days">15 Days</option>
                                        <option value="30 Days">30 Days</option>
                                        <option value="45 Days">45 Days</option>
                                        <option value="60+ Days">60+ Days</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Current CTC & Expected CTC Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="space-y-1.5">
                                    <label class="block text-xs font-bold text-[#0F2334]">
                                        Current CTC <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        x-model="formData.current_ctc"
                                        required
                                        placeholder="e.g. 6 LPA / $45k"
                                        class="w-full px-4 py-3 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] text-[#0F2334] text-xs font-medium focus:outline-none focus:ring-2 focus:ring-[#153758] transition-all"
                                    />
                                </div>

                                <div class="space-y-1.5">
                                    <label class="block text-xs font-bold text-[#0F2334]">
                                        Expected CTC <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        x-model="formData.expected_ctc"
                                        required
                                        placeholder="e.g. 9 LPA / $65k"
                                        class="w-full px-4 py-3 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] text-[#0F2334] text-xs font-medium focus:outline-none focus:ring-2 focus:ring-[#153758] transition-all"
                                    />
                                </div>
                            </div>

                            <!-- LinkedIn Profile URL -->
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-[#0F2334]">
                                    LinkedIn Profile URL
                                </label>
                                <input
                                    type="url"
                                    x-model="formData.linkedin_url"
                                    placeholder="https://linkedin.com/in/username"
                                    class="w-full px-4 py-3 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] text-[#0F2334] text-xs font-medium focus:outline-none focus:ring-2 focus:ring-[#153758] transition-all"
                                />
                            </div>

                            <!-- Short Introduction -->
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-[#0F2334]">
                                    Short Introduction / Note
                                </label>
                                <textarea
                                    rows="3"
                                    x-model="formData.introduction"
                                    placeholder="Briefly describe your background and why you are excited to join Octavia..."
                                    class="w-full px-4 py-3 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] text-[#0F2334] text-xs font-medium focus:outline-none focus:ring-2 focus:ring-[#153758] transition-all resize-none"
                                ></textarea>
                            </div>

                            <!-- CV / Resume File Upload -->
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-[#0F2334]">
                                    Upload Resume (PDF, DOC, DOCX up to 10MB)
                                </label>
                                <div class="relative">
                                    <input
                                        type="file"
                                        id="resume_file"
                                        @change="handleFileSelect"
                                        accept=".pdf,.doc,.docx"
                                        class="hidden"
                                    />
                                    <label
                                        for="resume_file"
                                        class="w-full p-4 rounded-xl border-2 border-dashed border-[#CBD5E1] hover:border-[#153758] bg-[#F8FAFC] flex flex-col items-center justify-center cursor-pointer transition-colors text-center"
                                    >
                                        <template x-if="!selectedFile">
                                            <div class="space-y-1">
                                                <svg class="w-8 h-8 text-[#153758] mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                <p class="text-xs font-bold text-[#0F2334]">Click to upload CV / Resume</p>
                                                <p class="text-[10px] text-[#52667A]">PDF, DOCX up to 10MB</p>
                                            </div>
                                        </template>

                                        <template x-if="selectedFile">
                                            <div class="flex items-center justify-between w-full px-2">
                                                <div class="flex items-center gap-2 text-xs font-bold text-[#153758] truncate">
                                                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                    <span x-text="selectedFile.name" class="truncate"></span>
                                                </div>
                                                <button
                                                    type="button"
                                                    @click.stop="removeFile"
                                                    class="text-red-500 hover:text-red-700 font-bold text-xs shrink-0 ml-2"
                                                >
                                                    Remove
                                                </button>
                                            </div>
                                        </template>
                                    </label>
                                </div>
                            </div>

                            <!-- Math Security Captcha -->
                            <div class="p-3.5 rounded-xl bg-[#F1F5F9] border border-[#E2E8F0] space-y-2">
                                <div class="flex items-center justify-between">
                                    <label class="text-xs font-bold text-[#0F2334]">
                                        Security Check: What is <span class="font-mono text-sm text-[#153758]" x-text="num1"></span> + <span class="font-mono text-sm text-[#153758]" x-text="num2"></span>?
                                    </label>
                                    <button
                                        type="button"
                                        @click="generateCaptcha"
                                        class="text-[10px] text-[#153758] hover:underline font-bold"
                                    >
                                        Refresh
                                    </button>
                                </div>
                                <input
                                    type="number"
                                    x-model="formData.userCaptchaAnswer"
                                    required
                                    placeholder="Enter sum"
                                    class="w-full px-4 py-2 rounded-lg bg-white border border-[#CBD5E1] text-xs font-bold text-[#0F2334] focus:outline-none focus:ring-2 focus:ring-[#153758]"
                                />
                            </div>

                            <!-- Success Message -->
                            <div x-show="successMessage" x-cloak class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs leading-relaxed">
                                <div class="flex items-center gap-2 font-bold mb-1">
                                    <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    <span>Application Submitted!</span>
                                </div>
                                <p x-text="successMessage"></p>
                            </div>

                            <!-- Error Message -->
                            <div x-show="errorMessage" x-cloak class="p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs leading-relaxed">
                                <p x-text="errorMessage"></p>
                            </div>

                            <!-- Submit Button -->
                            <button
                                type="submit"
                                :disabled="submitting"
                                class="w-full py-4 rounded-xl bg-[#C1A972] hover:bg-[#153758] text-[#0F2334] hover:text-white font-black text-xs uppercase tracking-wider transition-all duration-300 shadow-xl hover:shadow-2xl flex items-center justify-center gap-2 cursor-pointer disabled:opacity-50"
                            >
                                <span x-show="!submitting">Submit Application</span>
                                <span x-show="submitting" x-cloak class="flex items-center gap-2">
                                    <svg class="animate-spin w-4 h-4 text-current" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                                    <span>Submitting Application...</span>
                                </span>
                            </button>

                            <p class="text-[10px] text-center text-[#52667A] leading-relaxed">
                                We respect your privacy. Your contact info and CV are securely handled under ISO 27001 data governance.
                            </p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. "Build Products. Build Yourself" 4-Column Grid Section -->
    <section class="py-20 lg:py-28 bg-white border-t border-[#E2E8F0]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <span class="text-xs font-bold uppercase tracking-widest text-[#153758] px-3.5 py-1 rounded-full bg-[#153758]/10 inline-block">
                    OUR COMMITMENT
                </span>
                <h2 class="text-3xl sm:text-5xl font-black text-[#0F2334] tracking-tight leading-tight">
                    Build Products. <br/>
                    Build <span class="text-[#C1A972]">Yourself</span>
                </h2>
                <p class="text-[#52667A] text-base sm:text-lg">
                    When you join Octavia, your personal mastery grows alongside the mission-critical software we ship.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-8 rounded-3xl bg-[#F8FAFC] border border-[#E2E8F0] hover:border-[#153758]/40 hover:shadow-xl transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-[#153758] text-[#D9C48F] flex items-center justify-center font-bold shadow-md">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <span class="text-xs font-black text-[#C1A972] tracking-wider">01.</span>
                        <h3 class="text-xl font-bold text-[#0F2334]">Innovation That Moves Fast</h3>
                        <p class="text-xs text-[#52667A] leading-relaxed">
                            Work on AI, SaaS, cloud infrastructure, and enterprise products solving real-world challenges with zero lag.
                        </p>
                    </div>
                </div>

                <div class="p-8 rounded-3xl bg-[#F8FAFC] border border-[#E2E8F0] hover:border-[#153758]/40 hover:shadow-xl transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-[#153758] text-[#D9C48F] flex items-center justify-center font-bold shadow-md">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <span class="text-xs font-black text-[#C1A972] tracking-wider">02.</span>
                        <h3 class="text-xl font-bold text-[#0F2334]">Ownership From Day One</h3>
                        <p class="text-xs text-[#52667A] leading-relaxed">
                            Take initiative, make decisions, and see your code and ideas become reality in high-impact deployments.
                        </p>
                    </div>
                </div>

                <div class="p-8 rounded-3xl bg-[#F8FAFC] border border-[#E2E8F0] hover:border-[#153758]/40 hover:shadow-xl transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-[#153758] text-[#D9C48F] flex items-center justify-center font-bold shadow-md">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <span class="text-xs font-black text-[#C1A972] tracking-wider">03.</span>
                        <h3 class="text-xl font-bold text-[#0F2334]">Learn Beyond Your Role</h3>
                        <p class="text-xs text-[#52667A] leading-relaxed">
                            Collaborate with experts across full-stack design, engineering, cloud infrastructure, and AI solutions.
                        </p>
                    </div>
                </div>

                <div class="p-8 rounded-3xl bg-[#F8FAFC] border border-[#E2E8F0] hover:border-[#153758]/40 hover:shadow-xl transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-[#153758] text-[#D9C48F] flex items-center justify-center font-bold shadow-md">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <span class="text-xs font-black text-[#C1A972] tracking-wider">04.</span>
                        <h3 class="text-xl font-bold text-[#0F2334]">Impact You Can Measure</h3>
                        <p class="text-xs text-[#52667A] leading-relaxed">
                            Build products deployed to high-growth organizations and enterprise teams across North America and Europe.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Other Open Positions Section -->
    @if (!empty($relatedJobs))
        <section class="py-20 bg-[#F8FAFC] border-t border-[#E2E8F0]">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-12">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest text-[#153758]">EXPLORE MORE</span>
                        <h2 class="text-2xl sm:text-4xl font-black text-[#0F2334] tracking-tight">Other Open Positions</h2>
                    </div>
                    <a href="{{ url('/careers') }}" class="text-xs font-bold text-[#153758] hover:text-[#C1A972] transition-colors flex items-center gap-1.5">
                        <span>View All Roles</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($relatedJobs as $rSlug => $rJob)
                        <div class="p-7 rounded-2xl bg-white border border-[#E2E8F0] hover:border-[#153758]/40 hover:shadow-xl transition-all duration-300 flex flex-col justify-between space-y-6">
                            <div class="space-y-3">
                                <span class="text-[10px] font-extrabold uppercase tracking-wider px-2.5 py-1 rounded-full bg-[#153758]/10 text-[#153758]">
                                    {{ $rJob['badge'] ?? $rJob['department'] }}
                                </span>
                                <h3 class="text-lg font-bold text-[#0F2334]">
                                    <a href="{{ url('/career/' . $rSlug) }}" class="hover:text-[#153758] transition-colors">
                                        {{ $rJob['title'] }}
                                    </a>
                                </h3>
                                <p class="text-xs text-[#52667A] leading-relaxed line-clamp-2">
                                    {{ $rJob['shortDescription'] }}
                                </p>
                            </div>

                            <div class="pt-4 border-t border-[#F1F5F9] flex items-center justify-between">
                                <span class="text-xs text-[#52667A] font-medium">{{ $rJob['experience'] }}</span>
                                <a href="{{ url('/career/' . $rSlug) }}" class="text-xs font-bold text-[#153758] hover:underline flex items-center gap-1">
                                    <span>View Details</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</div>

<!-- Alpine Form Controller Script -->
<script>
function careerApplication(jobSlug, jobTitle) {
    return {
        formData: {
            full_name: '',
            email: '',
            phone: '',
            experience: '',
            current_ctc: '',
            expected_ctc: '',
            notice_period: 'Immediate',
            linkedin_url: '',
            introduction: '',
            job_slug: jobSlug,
            job_title: jobTitle,
            honeypot: '',
            userCaptchaAnswer: '',
            expectedCaptchaAnswer: 0
        },
        num1: 0,
        num2: 0,
        selectedFile: null,
        submitting: false,
        successMessage: '',
        errorMessage: '',

        init() {
            this.generateCaptcha();
        },

        generateCaptcha() {
            this.num1 = Math.floor(Math.random() * 8) + 2;
            this.num2 = Math.floor(Math.random() * 7) + 1;
            this.formData.expectedCaptchaAnswer = this.num1 + this.num2;
            this.formData.userCaptchaAnswer = '';
        },

        handleFileSelect(e) {
            const file = e.target.files[0];
            if (file) {
                if (file.size > 10 * 1024 * 1024) {
                    alert('File size exceeds 10MB limit.');
                    e.target.value = '';
                    this.selectedFile = null;
                    return;
                }
                this.selectedFile = file;
            }
        },

        removeFile() {
            this.selectedFile = null;
            const input = document.getElementById('resume_file');
            if (input) input.value = '';
        },

        async submitApplication() {
            if (this.formData.honeypot) return;

            if (parseInt(this.formData.userCaptchaAnswer) !== this.formData.expectedCaptchaAnswer) {
                this.errorMessage = 'Incorrect security check answer. Please verify the sum.';
                return;
            }

            this.submitting = true;
            this.errorMessage = '';
            this.successMessage = '';

            const payload = new FormData();
            payload.append('full_name', this.formData.full_name);
            payload.append('email', this.formData.email);
            payload.append('phone', this.formData.phone);
            payload.append('experience', this.formData.experience);
            payload.append('current_ctc', this.formData.current_ctc);
            payload.append('expected_ctc', this.formData.expected_ctc);
            payload.append('notice_period', this.formData.notice_period);
            payload.append('linkedin_url', this.formData.linkedin_url);
            payload.append('introduction', this.formData.introduction);
            payload.append('job_slug', this.formData.job_slug);
            payload.append('job_title', this.formData.job_title);
            payload.append('userCaptchaAnswer', this.formData.userCaptchaAnswer);
            payload.append('expectedCaptchaAnswer', this.formData.expectedCaptchaAnswer);

            if (this.selectedFile) {
                payload.append('resume', this.selectedFile);
            }

            const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            try {
                const response = await fetch('/career/apply', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrf,
                        'Accept': 'application/json'
                    },
                    body: payload
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    this.successMessage = data.message || 'Application submitted successfully! Our talent acquisition team will contact you.';
                    // Reset fields
                    this.formData.full_name = '';
                    this.formData.email = '';
                    this.formData.phone = '';
                    this.formData.experience = '';
                    this.formData.current_ctc = '';
                    this.formData.expected_ctc = '';
                    this.formData.linkedin_url = '';
                    this.formData.introduction = '';
                    this.removeFile();
                    this.generateCaptcha();
                } else {
                    this.errorMessage = data.message || 'There was an issue processing your submission. Please verify your details.';
                    this.generateCaptcha();
                }
            } catch (err) {
                this.errorMessage = 'Network error. Please verify your internet connection and try again.';
                this.generateCaptcha();
            } finally {
                this.submitting = false;
            }
        }
    };
}
</script>
@endsection