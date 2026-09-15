<section class="py-24 bg-[#FEFEFE] text-[#153758]" id="services" x-data="servicesSection()">
  <div class="max-w-7xl mx-auto px-6">
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
      <h2 class="text-3xl sm:text-5xl font-black text-[#153758] tracking-tight">
        Enterprise-Grade Technology Services
      </h2>
      <p class="text-[#5C6B7A] text-base sm:text-lg">
        Comprehensive technology solutions engineered for scale, zero-trust security, and
        continuous innovation.
      </p>
    </div>

    <!-- Category Selector Tabs -->
    <div class="flex flex-wrap items-center justify-center gap-3 mb-12">
      <template x-for="cat in categories" :key="cat.id">
        <button
          @click="selectCategory(cat.id)"
          :class="activeCategory === cat.id ? 'bg-[#264868] text-white shadow-xl shadow-black/20 scale-105' : 'bg-white text-[#153758] hover:bg-[#F3F5F7] border border-[#DDE3E9]'"
          class="flex items-center gap-2.5 px-6 py-3 rounded-2xl text-sm font-bold transition-all duration-300"
        >
          <div x-html="cat.icon" :class="activeCategory === cat.id ? 'text-[#C1A972]' : 'text-[#264868]'" class="[&>svg]:w-5 [&>svg]:h-5 flex items-center justify-center"></div>
          <span x-text="cat.label"></span>
        </button>
      </template>
    </div>

    <!-- Main Service Interactive Showcase -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
      <!-- Left Service Menu List -->
      <div class="lg:col-span-5 space-y-3">
        <template x-for="service in filteredServices" :key="service.id">
          <div
            @click="selectedServiceId = service.id"
            :class="selectedServiceId === service.id ? 'bg-white border-[#264868] shadow-lg shadow-black/10 ring-2 ring-[#264868]/20' : 'bg-white/80 border-[#DDE3E9]/80 hover:bg-white hover:border-[#C1A972]'"
            class="p-5 rounded-2xl cursor-pointer transition-all duration-200 border"
          >
            <div class="flex items-start gap-4">
              <div
                :class="selectedServiceId === service.id ? 'bg-[#264868] text-[#C1A972]' : 'bg-[#264868]/10 text-[#264868]'"
                class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0 transition-colors [&>svg]:w-6 [&>svg]:h-6"
                x-html="service.icon"
              >
              </div>
              <div class="flex-1 min-w-0 pt-0.5">
                <div class="flex items-center justify-between gap-2">
                  <h4
                    :class="selectedServiceId === service.id ? 'text-[#264868]' : 'text-[#153758]'"
                    class="font-bold text-base transition-colors"
                    x-text="service.title"
                  ></h4>
                  <svg :class="selectedServiceId === service.id ? 'translate-x-1 text-[#264868]' : 'text-[#93A3B2]'" class="w-4 h-4 transition-transform shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </div>
                <p class="text-xs text-[#5C6B7A] line-clamp-2 mt-1" x-text="service.description"></p>
              </div>
            </div>
          </div>
        </template>
      </div>

      <!-- Right Active Service Detailed Spotlight -->
      <div class="lg:col-span-7 bg-white rounded-3xl p-8 sm:p-10 border border-[#DDE3E9] shadow-xl shadow-black/5 relative overflow-hidden" x-show="activeService" x-transition>
        <div class="absolute top-0 right-0 w-64 h-64 bg-[#C1A972]/10 rounded-full blur-3xl pointer-events-none -mr-20 -mt-20"></div>

        <div class="relative z-10 space-y-8">
          <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-[#264868] text-[#C1A972] flex items-center justify-center shadow-md [&>svg]:w-7 [&>svg]:h-7" x-html="activeService.icon">
            </div>
            <div>
              <span class="text-xs font-bold text-[#264868] uppercase tracking-wider">
                Featured Capability
              </span>
              <h3 class="text-2xl sm:text-3xl font-black text-[#153758]" x-text="activeService.title"></h3>
            </div>
          </div>

          <p class="text-[#5C6B7A] text-base leading-relaxed" x-text="activeService.description"></p>

          <!-- Highlights Checklist -->
          <div class="space-y-3">
            <h4 class="text-xs font-bold text-[#5C6B7A] uppercase tracking-widest">
              Key Technical Deliverables
            </h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
              <template x-for="highlight in activeService.highlights" :key="highlight">
                <div class="flex items-center gap-2.5 p-3 rounded-xl bg-[#FEFEFE] text-xs font-semibold text-[#153758] border border-[#DDE3E9]">
                  <svg class="w-4 h-4 text-[#C1A972] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span x-text="highlight"></span>
                </div>
              </template>
            </div>
          </div>

          <!-- Metrics Grid -->
          <div class="grid grid-cols-3 gap-4 pt-4 border-t border-[#F3F5F7]">
            <template x-for="m in activeService.metrics" :key="m.label">
              <div class="p-3.5 rounded-2xl bg-[#FEFEFE] text-center border border-[#F3F5F7]">
                <div class="text-2xl font-black text-[#264868]" x-text="m.value"></div>
                <div class="text-[11px] font-semibold text-[#5C6B7A] mt-0.5" x-text="m.label"></div>
              </div>
            </template>
          </div>

          <!-- Action Button -->
          <div class="pt-2 flex flex-col sm:flex-row gap-4">
            <button @click="$dispatch('open-consultation', { topic: activeService.title })" class="px-8 py-4 bg-[#264868] hover:bg-[#153758] text-white font-bold rounded-2xl transition-all shadow-xl shadow-black/20 flex items-center justify-center gap-2 group">
              <span x-text="activeService.ctaText"></span>
              <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
function servicesSection() {
    const defaultIcon = `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>`;
    const cloudIcon = `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>`;
    const aiIcon = `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>`;
    const healthIcon = `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>`;

    return {
        activeCategory: 'dev',
        selectedServiceId: 'web-dev',
        categories: [
            { id: "dev", label: "Development & Engineering", icon: defaultIcon },
            { id: "cloud", label: "Cloud & Security", icon: cloudIcon },
            { id: "ai", label: "AI, Data & Automation", icon: aiIcon },
            { id: "health", label: "Healthcare Technology", icon: healthIcon },
        ],
        servicesData: [
            {
                id: "web-dev", title: "Web Development", category: "dev",
                description: "Build high-performance, scalable web applications that drive business growth and deliver measurable results across every platform.",
                highlights: ["Custom React, Next.js & Vue Architecture", "Microservices & Serverless Backends", "High-Concurrency Architecture & Optimization"],
                metrics: [{ value: "300+", label: "Web Apps Built" }, { value: "99.9%", label: "Uptime SLA" }, { value: "50ms", label: "Avg Response" }],
                ctaText: "Discuss Web Development", icon: defaultIcon
            },
            {
                id: "mobile-apps", title: "Mobile Apps", category: "dev",
                description: "Intuitive mobile experiences built natively and cross-platform, from concept to app store, designed for performance and delight.",
                highlights: ["iOS (Swift) & Android (Kotlin) Native", "React Native & Flutter Cross-Platform", "Biometric Auth & Offline Data Sync"],
                metrics: [{ value: "150+", label: "Apps Published" }, { value: "4.8★", label: "Avg Store Rating" }, { value: "50M+", label: "Active End Users" }],
                ctaText: "Build Your App", icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>`
            },
            {
                id: "saas-dev", title: "SaaS Development", category: "dev",
                description: "End-to-end multi-tenant SaaS engineering with automated billing, user management, and API orchestration for high growth.",
                highlights: ["Multi-Tenant Tenant Isolation", "Stripe / Subscription Engine Integration", "SOC 2 Compliant Infrastructure"],
                metrics: [{ value: "40+", label: "SaaS Products Launched" }, { value: "10x", label: "Scalability Factor" }, { value: "Zero", label: "Data Leakage Incidents" }],
                ctaText: "Launch Your SaaS", icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>`
            },
            {
                id: "ui-ux", title: "UI/UX Design", category: "dev",
                description: "User-centered design systems, design tokens, interactive prototypes, and accessible UI engineering that converts.",
                highlights: ["Figma Design Systems & Tokens", "WCAG 2.1 AA Accessibility Standards", "Usability Testing & User Research"],
                metrics: [{ value: "85%", label: "User Retention Boost" }, { value: "2.5x", label: "Conversion Lift" }, { value: "100+", label: "Design Systems" }],
                ctaText: "Design Your Experience", icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>`
            },
            {
                id: "cyber-security", title: "Cyber Security", category: "cloud",
                description: "Enterprise-grade security from threat detection to compliance, protecting your digital assets against evolving cyber threats.",
                highlights: ["Zero-Trust Architecture & IAM", "Penetration Testing & Vulnerability Audits", "24/7 SOC Threat Monitoring"],
                metrics: [{ value: "99.97%", label: "Threat Detection" }, { value: "200+", label: "Security Audits" }, { value: "24/7", label: "SOC Monitoring" }],
                ctaText: "Secure Your Business", icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>`
            },
            {
                id: "cloud-devops", title: "Cloud & DevOps", category: "cloud",
                description: "Seamless migration, CI/CD automation, and optimization across AWS, Azure, and GCP for cost-efficient, high-availability infrastructure.",
                highlights: ["AWS, Azure & Google Cloud Certified", "Kubernetes & Terraform Infrastructure as Code", "Cost Optimization & FinOps Controls"],
                metrics: [{ value: "45%", label: "Cloud Cost Savings" }, { value: "99.99%", label: "High Availability" }, { value: "10x", label: "Faster Deployments" }],
                ctaText: "Modernize Your Infra", icon: cloudIcon
            },
            {
                id: "networking", title: "Networking & SD-WAN", category: "cloud",
                description: "Enterprise networking solutions, SD-WAN deployment, and unified communications designed for distributed workforces.",
                highlights: ["Cisco & Fortinet Enterprise Routing", "VPN & Zero Trust Network Access (ZTNA)", "Multi-site Network Telephony"],
                metrics: [{ value: "100+", label: "Networks Deployed" }, { value: "<1ms", label: "Internal Latency" }, { value: "99.99%", label: "Network SLA" }],
                ctaText: "Upgrade Your Network", icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>`
            },
            {
                id: "ai-ml", title: "AI & Machine Learning", category: "ai",
                description: "Custom AI models, Generative AI integration, NLP, and predictive analytics that transform operations and unlock intelligence.",
                highlights: ["LLM Fine-Tuning & RAG Pipelines", "Computer Vision & Object Detection", "Predictive Maintenance & Forecasting"],
                metrics: [{ value: "80+", label: "AI Models Deployed" }, { value: "3x", label: "Efficiency Gain" }, { value: "98%", label: "Model Accuracy" }],
                ctaText: "Explore AI Solutions", icon: aiIcon
            },
            {
                id: "data-analytics", title: "Data & Analytics", category: "ai",
                description: "Turn raw enterprise data into real-time actionable insights with modern data lakes, ETL pipelines, and BI dashboards.",
                highlights: ["Snowflake, BigQuery & Databricks", "Real-time Event Streaming (Kafka)", "PowerBI & Tableau Executive Dashboards"],
                metrics: [{ value: "10PB+", label: "Data Processed" }, { value: "Real-Time", label: "Insights Pipeline" }, { value: "100%", label: "Data Governance" }],
                ctaText: "Unlock Your Data", icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>`
            },
            {
                id: "health-tech", title: "Healthcare Technology", category: "health",
                description: "HIPAA & GDPR-compliant medical software, clinical AI tools, hospital management ERPs, and biomedical asset management.",
                highlights: ["HL7 / FHIR Interoperability Protocols", "HIPAA & HITECH Security Compliance", "Biomedical Facilities & Equipment Repair"],
                metrics: [{ value: "50+", label: "Hospitals Served" }, { value: "100%", label: "HIPAA Compliant" }, { value: "2M+", label: "Patients Managed" }],
                ctaText: "Transform Healthcare IT", icon: healthIcon
            }
        ],

        get filteredServices() {
            return this.servicesData.filter(s => s.category === this.activeCategory);
        },

        get activeService() {
            let active = this.servicesData.find(s => s.id === this.selectedServiceId && s.category === this.activeCategory);
            if (!active && this.filteredServices.length > 0) {
                active = this.filteredServices[0];
                this.selectedServiceId = active.id;
            }
            return active;
        },

        selectCategory(catId) {
            this.activeCategory = catId;
            const first = this.servicesData.find(s => s.category === catId);
            if (first) {
                this.selectedServiceId = first.id;
            }
        }
    }
}
</script>

