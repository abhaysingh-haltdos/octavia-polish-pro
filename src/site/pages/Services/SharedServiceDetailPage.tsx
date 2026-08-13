import React, { useState } from "react";
import { ServicePageData } from "@/site/types/service";
import { getServicePageData } from "@/site/data/serviceCategoriesData";
import { useSite } from "@/site/SiteChrome";
import {
  Zap,
  Check,
  ChevronDown,
  ChevronUp,
  Target,
  Search,
  Share2,
  Briefcase,
  Video,
  BarChart3,
  TrendingDown,
  AlertTriangle,
  Clock,
  Star,
  ArrowRight,
  Code2,
  Boxes,
  Building2,
  ShoppingBag,
  Smartphone,
  Layers,
  Database,
  Network
} from "@/site/icons";

const iconMap: Record<string, React.FC<{ className?: string }>> = {
  Zap,
  Search,
  Share2,
  Briefcase,
  Video,
  BarChart3,
  Target,
  Star,
  TrendingDown,
  AlertTriangle,
  Clock,
  Code2,
  Boxes,
  Building2,
  ShoppingBag,
  Smartphone,
  Layers,
  Database,
  Network
};

interface SharedServiceDetailPageProps {
  pathOrSlug: string;
}

export const SharedServiceDetailPage: React.FC<SharedServiceDetailPageProps> = ({
  pathOrSlug,
}) => {
  const data: ServicePageData = getServicePageData(pathOrSlug);
  const { openConsultation } = useSite();
  const [openFaq, setOpenFaq] = useState<number | null>(0);

  const heroTags = data.hero.tags && data.hero.tags.length > 0 
    ? data.hero.tags 
    : ["Tailored Architecture", "Enterprise Security & SLA", "Sub-Second Loading"];

  const challengesList = data.challenges?.challenges && data.challenges.challenges.length > 0
    ? data.challenges.challenges
    : [
        { category: "Efficiency", issue: "Generate Measurable Revenue Growth", description: "Connect every feature directly to business outcomes and user engagement." },
        { category: "High-Intent Reach", issue: "Reach & Engage High-Intent Audiences", description: "Deliver fast, reliable experiences to users searching for solutions." },
        { category: "Lower Bounce Rates", issue: "Reduce Bounce Rates & Abandonment", description: "Sub-second load speeds keep visitors engaged on all viewports." },
        { category: "Scalability", issue: "Scale Rapidly with Cloud Infrastructure", description: "Serverless and elastic backends expand seamlessly during demand spikes." },
        { category: "ROI Maximization", issue: "Maximize Digital ROI & Conversion", description: "Strategic UI layouts and conversion-rate optimization turn visitors into clients." },
        { category: "Competitive Edge", issue: "Outperform Competitors in User Experience", description: "Modern technical stack delivers a polished experience setting your brand apart." }
      ];

  const featuresList = data.features?.features && data.features.features.length > 0
    ? data.features.features
    : [
        { title: `${data.serviceCategory} Solution`, description: "Bespoke engineering designed around your exact business requirements.", iconName: "Code2" },
        { title: "Enterprise System Security", description: "Integrated authentication, data encryption, and OWASP compliance.", iconName: "Layers" },
        { title: "High-Performance Architecture", description: "Optimized server rendering, bundle splitting, and global CDN caching.", iconName: "Zap" },
        { title: "Custom API & Middleware", description: "Connect third-party databases, CRMs, and payment gateways seamlessly.", iconName: "Network" },
        { title: "Conversion Rate Optimization", description: "Data-driven UI design and optimized user journeys to maximize ROI.", iconName: "BarChart3" },
        { title: "24/7 Monitoring & Support", description: "Continuous uptime tracking, security updates, and SLA support.", iconName: "Clock" }
      ];

  const faqsList = data.faq?.faqs && data.faq.faqs.length > 0
    ? data.faq.faqs
    : [
        { question: `What is ${data.serviceCategory}?`, answer: `${data.serviceCategory} delivers high-performance, secure, and scalable solutions tailored specifically to your business goals.` },
        { question: "How quickly can we start the technical engagement?", answer: "Our engineering team begins technical discovery and architecture planning within 48 hours of project alignment." },
        { question: "Do you provide ongoing support and maintenance?", answer: "Yes! We offer 24/7 uptime monitoring, security patching, and guaranteed SLA response times post-launch." }
      ];

  return (
    <div className="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans pb-24 selection:bg-[#264868] selection:text-white">
      {/* 1. HERO SECTION (Dark Navy Brand Background) */}
      <section className="bg-gradient-to-b from-[#0F2334] via-[#153758] to-[#264868] text-white pt-28 pb-20 px-6 relative overflow-hidden border-b border-[#153758]">
        <div className="absolute top-1/4 left-1/2 -translate-x-1/2 w-[800px] h-[350px] bg-[#C1A972]/10 rounded-full blur-3xl pointer-events-none" />

        <div className="max-w-7xl mx-auto relative z-10 text-center flex flex-col items-center">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#C1A972]/15 border border-[#C1A972]/30 text-[#C1A972] text-xs font-bold uppercase tracking-widest mb-6">
            <Zap className="w-3.5 h-3.5" />
            <span>{data.hero.badge || data.serviceCategory}</span>
          </div>

          <h1 className="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-[1.15] max-w-4xl mb-6">
            {data.hero.title} <span className="text-[#C1A972]">{data.hero.titleHighlight}</span>
          </h1>

          <p className="text-[#93A3B2] text-base sm:text-lg leading-relaxed max-w-2xl mb-8">
            {data.hero.description}
          </p>

          <div className="flex flex-col sm:flex-row items-center gap-4 pt-2">
            <button
              onClick={() => openConsultation(data.hero.primaryCtaText || "Get FREE consultation")}
              className="w-full sm:w-auto px-8 py-4 bg-[#C1A972] hover:bg-[#C1A972]/90 text-[#153758] font-extrabold text-xs sm:text-sm uppercase tracking-wider rounded-xl transition-all shadow-xl shadow-[#C1A972]/10 flex items-center justify-center gap-2 cursor-pointer"
            >
              <span>{data.hero.primaryCtaText || "Get FREE consultation"}</span>
              <ArrowRight className="w-4 h-4" />
            </button>
            <a
              href="#approach"
              className="w-full sm:w-auto px-7 py-4 bg-white/10 hover:bg-white/20 text-white font-bold text-xs sm:text-sm rounded-xl border border-white/20 transition-all text-center"
            >
              {data.hero.secondaryCtaText || "Explore Approach"}
            </a>
          </div>

          <div className="pt-10 border-t border-white/10 flex flex-wrap items-center justify-center gap-8 text-xs text-[#93A3B2] font-semibold mt-10 w-full max-w-3xl">
            {heroTags.map((tag, idx) => (
              <div key={idx} className="flex items-center gap-2">
                <Check className="w-4 h-4 text-[#C1A972]" />
                <span>{tag}</span>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* 2. BY THE NUMBERS (Elevated Light Floating Card) */}
      <section className="max-w-7xl mx-auto px-6 -mt-10 relative z-20 mb-16">
        <div className="bg-white border border-[#DDE3E9]/80 rounded-3xl p-8 shadow-xl shadow-[#DDE3E9]/50">
          <div className="text-center mb-8">
            <span className="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">
              BY THE NUMBERS
            </span>
            <h2 className="text-2xl sm:text-3xl font-black text-[#264868] mt-3">
              Why {data.serviceCategory} Matters
            </h2>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div className="p-8 bg-[#F3F5F7] rounded-2xl border border-[#DDE3E9]/80 text-center flex flex-col items-center justify-center">
              <span className="text-5xl sm:text-6xl font-black text-[#264868] tracking-tight mb-2">0.4s</span>
              <span className="text-xs sm:text-sm font-semibold text-[#153758] max-w-sm leading-relaxed">
                average page load speed achieved through modern server-side rendering
              </span>
              <span className="text-[10px] uppercase font-bold text-[#5C6B7A] tracking-wider mt-4">
                Source: Google Core Web Vitals Benchmark
              </span>
            </div>
            <div className="p-8 bg-[#F3F5F7] rounded-2xl border border-[#DDE3E9]/80 text-center flex flex-col items-center justify-center">
              <span className="text-5xl sm:text-6xl font-black text-[#264868] tracking-tight mb-2">99.99%</span>
              <span className="text-xs sm:text-sm font-semibold text-[#153758] max-w-sm leading-relaxed">
                guaranteed operational uptime with high-availability cloud architecture
              </span>
              <span className="text-[10px] uppercase font-bold text-[#5C6B7A] tracking-wider mt-4">
                Source: Enterprise SLA Metric
              </span>
            </div>
          </div>
        </div>
      </section>

      {/* 3. SERVICE EXPLAINED (Light Vision Overview) */}
      <section className="max-w-7xl mx-auto px-6 py-16">
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
          <div className="lg:col-span-5 space-y-4">
            <span className="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">
              {data.overview.badge || "SERVICE OVERVIEW"}
            </span>
            <h2 className="text-2xl sm:text-4xl font-black text-[#264868] tracking-tight leading-tight">
              {data.overview.heading}
            </h2>
          </div>

          <div className="lg:col-span-7 bg-white p-8 rounded-3xl border border-[#DDE3E9]/80 shadow-md space-y-4 text-[#153758] text-xs sm:text-sm leading-relaxed">
            <p className="text-base sm:text-lg font-bold text-[#264868] leading-snug">
              {data.overview.leadParagraph}
            </p>
            <p className="text-[#5C6B7A]">
              {data.overview.secondaryParagraph}
            </p>
          </div>
        </div>
      </section>

      {/* 4. WHY IT MATTERS (Proven Scenarios Grid) */}
      <section className="max-w-7xl mx-auto px-6 py-16">
        <div className="text-center max-w-3xl mx-auto mb-12 space-y-3">
          <span className="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">
            {data.challenges?.badge || "WHY IT MATTERS"}
          </span>
          <h2 className="text-3xl sm:text-4xl font-black text-[#264868]">
            {data.challenges?.heading || `Why ${data.serviceCategory} Matters for Modern Businesses`}
          </h2>
          <p className="text-[#5C6B7A] text-xs sm:text-sm leading-relaxed">
            {data.challenges?.subheading || "Technology decisions directly impact business growth, user retention, and security."}
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {challengesList.map((item, idx) => (
            <div key={idx} className="bg-white border border-[#DDE3E9] rounded-3xl p-6 shadow-sm flex flex-col justify-between space-y-4">
              <div className="w-10 h-10 rounded-2xl bg-[#264868] text-[#C1A972] flex items-center justify-center font-extrabold text-sm border border-[#C1A972]/30">
                <Zap className="w-5 h-5" />
              </div>
              <div>
                <h3 className="text-lg font-bold text-[#264868] mb-2">{item.issue}</h3>
                <p className="text-xs text-[#5C6B7A] leading-relaxed">{item.description}</p>
              </div>
            </div>
          ))}
        </div>
      </section>

      {/* 5. EVERYTHING INCLUDED (Full Dark Navy Section Break) */}
      <section className="bg-[#153758] text-white py-24 px-6 border-t border-b border-[#153758] relative">
        <div className="max-w-7xl mx-auto space-y-16">
          <div className="text-center max-w-3xl mx-auto space-y-4">
            <span className="text-xs font-bold uppercase tracking-widest text-[#C1A972]">
              {data.features?.badge || "OUR SERVICES"}
            </span>
            <h2 className="text-3xl sm:text-5xl font-black text-white tracking-tight">
              {data.features?.heading || `Everything Included in Our ${data.serviceCategory}`}
            </h2>
            <p className="text-[#93A3B2] text-sm sm:text-base">
              {data.features?.subheading || "Comprehensive capabilities engineered across modern web technologies."}
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {featuresList.map((service, idx) => {
              const IconComp = iconMap[service.iconName || "Code2"] || Code2;
              return (
                <div
                  key={idx}
                  className="bg-white/5 border border-white/10 hover:border-[#C1A972]/80 hover:bg-white/10 rounded-3xl p-8 transition-all duration-300 flex flex-col justify-between group"
                >
                  <div>
                    <div className="w-12 h-12 rounded-2xl bg-[#264868] text-[#C1A972] flex items-center justify-center mb-6 group-hover:bg-[#C1A972] group-hover:text-[#153758] transition-colors border border-[#C1A972]/30 font-bold">
                      <IconComp className="w-6 h-6" />
                    </div>
                    <h3 className="text-xl font-bold text-white mb-3 group-hover:text-[#C1A972] transition-colors">
                      {service.title}
                    </h3>
                    <p className="text-xs text-[#93A3B2] leading-relaxed">
                      {service.description}
                    </p>
                  </div>
                </div>
              );
            })}
          </div>

          {/* Sub-breakdown Cards matching Performance Marketing Layout */}
          <div className="grid grid-cols-1 md:grid-cols-2 gap-8 pt-8">
            <div className="bg-[#0F2334]/90 border border-[#153758]/80 rounded-3xl p-8 shadow-2xl space-y-4">
              <span className="text-[11px] font-bold text-[#C1A972] uppercase bg-[#264868] px-3 py-1 rounded-full flex items-center gap-1.5 w-max">
                <Code2 className="w-3.5 h-3.5" />
                <span>FRONTEND ARCHITECTURE</span>
              </span>
              <h3 className="text-2xl font-bold text-white">Sub-Second Loading &amp; Modern UI</h3>
              <h4 className="text-xs font-bold text-[#C1A972]">Deliver Frictionless Experiences Across All Devices</h4>
              <p className="text-xs text-[#93A3B2] leading-relaxed">
                Modern frontend engineering ensures high Core Web Vitals, server-side rendering, and responsive accessibility.
              </p>
              <ul className="space-y-2 border-t border-white/10 pt-4 text-xs text-[#93A3B2]">
                {["Next.js & React SSR/SSG", "Tailwind CSS Design Tokens", "TypeScript Type Safety", "WCAG AA Accessibility", "Edge Caching & CDN Delivery"].map((point, pIdx) => (
                  <li key={pIdx} className="flex items-center gap-2">
                    <Check className="w-4 h-4 text-[#C1A972]" />
                    <span>{point}</span>
                  </li>
                ))}
              </ul>
            </div>

            <div className="bg-[#0F2334]/90 border border-[#153758]/80 rounded-3xl p-8 shadow-2xl space-y-4">
              <span className="text-[11px] font-bold text-[#C1A972] uppercase bg-[#264868] px-3 py-1 rounded-full flex items-center gap-1.5 w-max">
                <Database className="w-3.5 h-3.5" />
                <span>BACKEND &amp; SECURITY</span>
              </span>
              <h3 className="text-2xl font-bold text-white">Scalable APIs &amp; Enterprise Security</h3>
              <h4 className="text-xs font-bold text-[#C1A972]">Hardened Backends Built for High Concurrency</h4>
              <p className="text-xs text-[#93A3B2] leading-relaxed">
                Secure API gateways, microservices, and database schemas engineered for 99.99% operational uptime.
              </p>
              <ul className="space-y-2 border-t border-white/10 pt-4 text-xs text-[#93A3B2]">
                {["RESTful & GraphQL APIs", "Single Sign-On (SSO / OAuth2)", "Automated CI/CD Pipelines", "OWASP Security Standards", "24/7 SLA Health Monitoring"].map((point, pIdx) => (
                  <li key={pIdx} className="flex items-center gap-2">
                    <Check className="w-4 h-4 text-[#C1A972]" />
                    <span>{point}</span>
                  </li>
                ))}
              </ul>
            </div>
          </div>
        </div>
      </section>

      {/* 6. THE APPROACH (Light Technical Vision) */}
      <section id="approach" className="max-w-7xl mx-auto px-6 py-20">
        <div className="bg-white border border-[#DDE3E9] rounded-3xl p-8 md:p-12 shadow-lg space-y-8">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <div className="lg:col-span-5 space-y-3">
              <span className="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">
                THE APPROACH
              </span>
              <h2 className="text-3xl font-black text-[#264868]">
                How We Make Growth Predictable
              </h2>
            </div>
            <div className="lg:col-span-7 space-y-4 text-xs sm:text-sm text-[#5C6B7A] leading-relaxed">
              <p className="text-base font-bold text-[#153758]">
                Our {data.serviceCategory} combines clean architecture, automated testing, security governance, and cloud deployment into a unified engineering system. Every line of code is written to achieve business growth.
              </p>
              <p>
                At Octavia Tech Solutions, software development is treated as a continuous delivery discipline driven by performance benchmarks, code reviews, and enterprise reliability guarantees.
              </p>
            </div>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-6 pt-6 border-t border-[#F3F5F7]">
            {[
              { num: "01", title: "No Technical Debt", desc: "We write clean, modular, and maintainable codebases built to last." },
              { num: "02", title: "Full System Ownership", desc: "From technical discovery to deployment and post-launch SLA support." },
              { num: "03", title: "Transparent Engineering", desc: "Complete visibility into release sprints, code commits, and project milestones." },
            ].map((item, idx) => (
              <div key={idx} className="p-4 bg-[#F3F5F7] rounded-2xl border border-[#DDE3E9]/80 flex flex-col gap-2">
                <span className="text-xs font-extrabold text-[#264868] bg-white px-3 py-1 rounded-lg border border-[#DDE3E9] w-max">
                  {item.num}
                </span>
                <span className="text-xs font-bold text-[#153758] mt-1">{item.title}</span>
                <span className="text-[11px] text-[#5C6B7A] leading-relaxed">{item.desc}</span>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* 7. OUR PROCESS (Numbered Workflow) */}
      <section className="max-w-7xl mx-auto px-6 py-16">
        <div className="text-center max-w-3xl mx-auto mb-12 space-y-3">
          <span className="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">
            OUR PROCESS
          </span>
          <h2 className="text-3xl sm:text-4xl font-black text-[#264868]">
            Our Engineering Process
          </h2>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
          {[
            { num: "01", title: "Discovery & Blueprint", desc: "Analyze business requirements, target users, and technical architecture." },
            { num: "02", title: "UI/UX & Prototyping", desc: "Design interactive component wireframes and design system tokens." },
            { num: "03", title: "Agile Development", desc: "Develop modular frontends and secure API backends in iterative sprints." },
            { num: "04", title: "QA & Performance Tuning", desc: "Rigorous security audits, load testing, and Core Web Vitals tuning." },
            { num: "05", title: "Deployment & SLA", desc: "Zero-downtime production launch backed by 24/7 SRE support." },
          ].map((step, idx) => (
            <div key={idx} className="bg-white border border-[#DDE3E9] rounded-2xl p-6 shadow-sm text-center flex flex-col items-center justify-between space-y-4">
              <div className="w-10 h-10 rounded-full bg-[#264868] text-[#C1A972] font-black flex items-center justify-center text-sm border border-[#C1A972]/30">
                {step.num}
              </div>
              <div>
                <h3 className="text-sm font-bold text-[#264868] mb-1">{step.title}</h3>
                <p className="text-[11px] text-[#5C6B7A] leading-relaxed">{step.desc}</p>
              </div>
            </div>
          ))}
        </div>
      </section>

      {/* 8. WHAT INACTION COSTS YOU (Risk Cards) */}
      <section className="max-w-7xl mx-auto px-6 py-16">
        <div className="bg-white border border-[#DDE3E9] rounded-3xl p-8 md:p-12 shadow-sm space-y-8">
          <div className="text-center max-w-3xl mx-auto space-y-2">
            <span className="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">
              WHAT INACTION COSTS YOU
            </span>
            <h2 className="text-3xl font-black text-[#264868]">
              The Cost of Technical Debt
            </h2>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
            {[
              { title: "Losing customers to competitors.", desc: "Competitors with faster, more reliable web platforms capture market share.", icon: TrendingDown },
              { title: "Security & Downtime Vulnerabilities.", desc: "Outdated software leads to unexpected outages and expensive data leaks.", icon: AlertTriangle },
              { title: "Slower Feature Releases.", desc: "Monolithic systems slow down engineering velocity and delay product launches.", icon: Clock },
            ].map((cost, idx) => (
              <div key={idx} className="p-6 bg-[#F3F5F7] rounded-2xl border border-[#DDE3E9]/80 text-center flex flex-col items-center space-y-3">
                <div className="w-10 h-10 rounded-full bg-[#153758] text-[#C1A972] flex items-center justify-center">
                  <cost.icon className="w-5 h-5" />
                </div>
                <h3 className="text-sm font-bold text-[#153758]">{cost.title}</h3>
                <p className="text-[11px] text-[#5C6B7A] leading-relaxed">{cost.desc}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* 9. LEAD FORM / CTA BANNER (Healthcare Dark CTA Card Style) */}
      <section id="lead-form" className="max-w-7xl mx-auto px-6 py-12">
        <div className="bg-gradient-to-r from-[#153758] via-[#264868] to-[#153758] rounded-3xl p-8 sm:p-12 text-[#FEFEFE] shadow-2xl relative overflow-hidden border border-[#C1A972]/30">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div className="lg:col-span-6 space-y-6">
              <span className="text-[11px] font-bold text-[#C1A972] uppercase bg-[#0F2334] px-3 py-1 rounded-full border border-[#C1A972]/30">
                FREE TECHNICAL CONSULTATION
              </span>
              <h2 className="text-3xl sm:text-4xl font-black text-white leading-tight">
                Ready to Scale Your Web Presence?
              </h2>
              <div className="space-y-3">
                {[
                  { title: "Identify architecture bottlenecks.", desc: "Discover how to optimize web performance and security." },
                  { title: "Receive actionable technical proposals.", desc: "Get practical roadmaps tailored to your engineering goals." },
                  { title: "Improve deployment efficiency.", desc: "Eliminate legacy code debt and streamline user conversion paths." },
                ].map((benefit, idx) => (
                  <div key={idx} className="flex items-start gap-3 bg-[#0F2334]/60 p-4 rounded-xl border border-[#153758]">
                    <Check className="w-4 h-4 text-[#C1A972] shrink-0 mt-0.5" />
                    <div>
                      <h4 className="font-bold text-white text-xs mb-0.5">{benefit.title}</h4>
                      <p className="text-[11px] text-[#93A3B2]">{benefit.desc}</p>
                    </div>
                  </div>
                ))}
              </div>
            </div>

            <div className="lg:col-span-6">
              <div className="bg-[#0F2334]/90 rounded-2xl p-6 sm:p-8 border border-[#153758] shadow-2xl">
                <form onSubmit={(e) => { e.preventDefault(); openConsultation(`Audit Form: ${data.serviceCategory}`); }} className="space-y-4">
                  <h3 className="text-white text-base font-extrabold tracking-wide mb-4 text-center">Get In Touch</h3>
                  <input
                    type="text"
                    required
                    placeholder="Full Name"
                    className="w-full bg-[#153758] border border-[#264868] rounded-xl px-4 py-3 text-xs text-white placeholder-[#93A3B2] focus:border-[#C1A972] focus:outline-none"
                  />
                  <input
                    type="email"
                    required
                    placeholder="Business Email"
                    className="w-full bg-[#153758] border border-[#264868] rounded-xl px-4 py-3 text-xs text-white placeholder-[#93A3B2] focus:border-[#C1A972] focus:outline-none"
                  />
                  <input
                    type="tel"
                    required
                    placeholder="Phone Number"
                    className="w-full bg-[#153758] border border-[#264868] rounded-xl px-4 py-3 text-xs text-white placeholder-[#93A3B2] focus:border-[#C1A972] focus:outline-none"
                  />
                  <input
                    type="url"
                    required
                    placeholder="Website URL"
                    className="w-full bg-[#153758] border border-[#264868] rounded-xl px-4 py-3 text-xs text-white placeholder-[#93A3B2] focus:border-[#C1A972] focus:outline-none"
                  />
                  <textarea
                    rows={3}
                    placeholder="What's your main web engineering requirement?"
                    className="w-full bg-[#153758] border border-[#264868] rounded-xl px-4 py-3 text-xs text-white placeholder-[#93A3B2] focus:border-[#C1A972] focus:outline-none resize-none"
                  ></textarea>
                  <button
                    type="submit"
                    className="w-full bg-[#C1A972] hover:bg-[#C1A972]/90 text-[#153758] font-extrabold text-xs uppercase tracking-wider py-3.5 rounded-xl transition-all shadow-xl cursor-pointer flex items-center justify-center gap-2"
                  >
                    <span>CONTACT US</span>
                    <ArrowRight className="w-4 h-4" />
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* 10. FREQUENTLY ASKED QUESTIONS (FAQ Accordion Style) */}
      <section className="max-w-4xl mx-auto px-6 py-16">
        <div className="text-center mb-12 space-y-3">
          <span className="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">
            Frequently Asked Questions
          </span>
          <h2 className="text-3xl sm:text-4xl font-black text-[#264868]">
            Technical &amp; Commercial FAQ
          </h2>
        </div>

        <div className="space-y-4">
          {faqsList.map((faq, idx) => {
            const isOpen = openFaq === idx;
            return (
              <div
                key={idx}
                className="bg-white border border-[#DDE3E9] rounded-2xl overflow-hidden transition-all shadow-sm"
              >
                <button
                  onClick={() => setOpenFaq(isOpen ? null : idx)}
                  className="w-full p-6 text-left font-bold text-sm sm:text-base text-[#264868] flex items-center justify-between gap-4 hover:bg-[#F3F5F7] transition-colors cursor-pointer"
                >
                  <span>{faq.question}</span>
                  <span className="text-[#C1A972] font-bold text-lg">
                    {isOpen ? <ChevronUp className="w-5 h-5 text-[#C1A972]" /> : <ChevronDown className="w-5 h-5 text-[#C1A972]" />}
                  </span>
                </button>

                {isOpen && (
                  <div className="px-6 pb-6 text-xs sm:text-sm text-[#5C6B7A] leading-relaxed border-t border-[#F3F5F7] pt-4">
                    {faq.answer}
                  </div>
                )}
              </div>
            );
          })}
        </div>
      </section>
    </div>
  );
};
