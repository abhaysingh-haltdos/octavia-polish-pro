<div
    x-show="consultationOpen"
    x-cloak
    class="fixed inset-0 z-[1100] flex items-center justify-center p-4 bg-black/70 backdrop-blur-md"
    x-data="consultationModal()"
    @open-consultation.window="consultationOpen = true; if ($event.detail && $event.detail.topic) service = $event.detail.topic"
    @keydown.escape.window="consultationOpen = false"
>
    <div
        @click.away="consultationOpen = false"
        class="bg-white rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-[#F3F5F7] relative overflow-hidden text-[#153758]"
    >
        <!-- Decorative Top Accent -->
        <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-[#264868] via-[#264868] to-[#153758]"></div>

        <button
            @click="consultationOpen = false"
            class="absolute top-5 right-5 p-2 rounded-full text-[#93A3B2] hover:text-[#5C6B7A] hover:bg-[#F3F5F7] transition-colors"
            id="close-consultation-modal"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>

        <template x-if="submitted">
            <div class="text-center py-8 space-y-4">
                <div class="w-16 h-16 bg-[#EDF0F3] text-[#264868] rounded-full flex items-center justify-center mx-auto">
                    <svg class="w-10 h-10 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-[#153758]">Consultation Requested!</h3>
                <p class="text-sm text-[#5C6B7A] max-w-sm mx-auto">
                    Thank you! Our solutions architect from Octavia Tech Solutions will contact you within 24 hours.
                </p>
            </div>
        </template>

        <template x-if="!submitted">
            <div>
                <div class="flex items-center gap-2 text-[#264868] text-xs font-bold uppercase tracking-wider mb-1">
                    <svg class="w-4 h-4 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    <span>Enterprise Architecture</span>
                </div>
                <h3 class="text-2xl font-black text-[#153758] tracking-tight mb-2">Schedule Consultation</h3>
                <p class="text-xs sm:text-sm text-[#5C6B7A] mb-6">
                    Connect directly with a Principal Engineer. NDA guaranteed before discussion.
                </p>

                <form @submit.prevent="submitForm()" class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold uppercase text-[#5C6B7A] mb-1">Full Name *</label>
                        <input
                            type="text"
                            required
                            x-model="name"
                            placeholder="Alex Morgan"
                            class="w-full px-4 py-2.5 rounded-xl border border-[#DDE3E9] text-sm focus:outline-none focus:border-[#264868] focus:ring-1 focus:ring-[#264868]"
                        />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-[#5C6B7A] mb-1">Work Email *</label>
                            <input
                                type="email"
                                required
                                x-model="email"
                                placeholder="alex@company.com"
                                class="w-full px-4 py-2.5 rounded-xl border border-[#DDE3E9] text-sm focus:outline-none focus:border-[#264868] focus:ring-1 focus:ring-[#264868]"
                            />
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-[#5C6B7A] mb-1">Phone Number</label>
                            <input
                                type="tel"
                                x-model="phone"
                                placeholder="+1 (555) 000-0000"
                                class="w-full px-4 py-2.5 rounded-xl border border-[#DDE3E9] text-sm focus:outline-none focus:border-[#264868] focus:ring-1 focus:ring-[#264868]"
                            />
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-[#5C6B7A] mb-1">Area of Interest / Service</label>
                        <input
                            type="text"
                            x-model="service"
                            class="w-full px-4 py-2.5 rounded-xl border border-[#DDE3E9] text-sm focus:outline-none focus:border-[#264868] focus:ring-1 focus:ring-[#264868]"
                        />
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-[#5C6B7A] mb-1">Project Details</label>
                        <textarea
                            rows="3"
                            x-model="message"
                            placeholder="Briefly describe your objectives, architecture challenges, or timelines..."
                            class="w-full px-4 py-2.5 rounded-xl border border-[#DDE3E9] text-sm focus:outline-none focus:border-[#264868] focus:ring-1 focus:ring-[#264868]"
                        ></textarea>
                    </div>

                    <!-- Bot Protection Math Captcha -->
                    <div class="p-3 rounded-xl bg-[#F3F5F7] border border-[#DDE3E9] flex items-center justify-between gap-3">
                        <span class="text-xs font-bold text-[#153758]">Security Check: <span x-text="num1"></span> + <span x-text="num2"></span> = ?</span>
                        <input
                            type="number"
                            required
                            x-model="captchaAnswer"
                            placeholder="Result"
                            class="w-24 px-3 py-1.5 rounded-lg border border-[#DDE3E9] text-xs text-center font-bold focus:outline-none focus:border-[#264868]"
                        />
                    </div>

                    <div x-show="errorMessage" x-text="errorMessage" class="text-xs font-bold text-red-600"></div>

                    <button
                        type="submit"
                        :disabled="isSubmitting"
                        class="w-full py-3.5 px-6 rounded-xl bg-[#264868] hover:bg-[#153758] text-white font-bold text-xs uppercase tracking-wider transition-all shadow-xl shadow-[#264868]/20 flex items-center justify-center gap-2"
                    >
                        <span x-text="isSubmitting ? 'Sending Request...' : 'Schedule Architecture Session'"></span>
                        <svg class="w-4 h-4 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </form>
            </div>
        </template>
    </div>
</div>

<script>
function consultationModal() {
    return {
        submitted: false,
        isSubmitting: false,
        errorMessage: '',
        name: '',
        email: '',
        phone: '',
        service: 'Enterprise Architecture Consultation',
        message: '',
        num1: Math.floor(Math.random() * 8) + 2,
        num2: Math.floor(Math.random() * 8) + 1,
        captchaAnswer: '',

        submitForm() {
            if (parseInt(this.captchaAnswer) !== (this.num1 + this.num2)) {
                this.errorMessage = 'Incorrect security check answer. Please try again.';
                return;
            }

            this.errorMessage = '';
            this.isSubmitting = true;

            setTimeout(() => {
                this.isSubmitting = false;
                this.submitted = true;
                setTimeout(() => {
                    this.submitted = false;
                    this.name = '';
                    this.email = '';
                    this.phone = '';
                    this.message = '';
                    this.captchaAnswer = '';
                }, 4000);
            }, 800);
        }
    }
}
</script>
