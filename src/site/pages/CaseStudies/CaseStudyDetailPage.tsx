import React, { useState, useEffect } from 'react';
import {
  ArrowLeft,
  Calendar,
  Clock,
  MapPin,
  Users,
  Building2,
  Layers,
  Sparkles,
  CheckCircle2,
  TrendingUp,
  Download,
  Share2,
  MessageSquare,
  FileText,
  ChevronRight,
  ShieldAlert,
  Target,
  Compass,
  Cpu,
  Workflow,
  LayoutDashboard,
  BarChart3,
  ArrowRight,
  Bookmark,
  Check,
  Zap,
  Globe,
  Award,
} from '@/site/icons';
import { CASE_STUDIES } from '../../data/caseStudiesData';

interface CaseStudyDetailPageProps {
  slug: string;
  onNavigateToCaseStudy: (slug: string) => void;
  onNavigateToCategory?: (category: string) => void;
  onOpenConsultation?: (topic?: string) => void;
  onLinkClick?: (href: string, label: string) => void;
}

export const CaseStudyDetailPage: React.FC<CaseStudyDetailPageProps> = ({
  slug,
  onNavigateToCaseStudy,
  onOpenConsultation,
  onLinkClick,
}) => {
  const [downloadedPdf, setDownloadedPdf] = useState(false);
  const [copiedLink, setCopiedLink] = useState(false);
  const [activeSection, setActiveSection] = useState('overview');

  // Find case study by slug or fallback to first
  const caseStudy =
    CASE_STUDIES.find((cs) => cs.slug === slug) || CASE_STUDIES[0]!;

  // Related items
  const relatedCaseStudies = CASE_STUDIES.filter((cs) => cs.id !== caseStudy.id).slice(0, 3);

  // Auto-scroll spy for table of contents
  useEffect(() => {
    const handleScroll = () => {
      const sections = ['overview', 'challenges', 'approach', 'architecture', 'features', 'results', 'before-after', 'impact'];
      const scrollPosition = window.scrollY + 200;

      for (const section of sections) {
        const el = document.getElementById(section);
        if (el) {
          const top = el.offsetTop;
          const height = el.offsetHeight;
          if (scrollPosition >= top && scrollPosition < top + height) {
            setActiveSection(section);
            break;
          }
        }
      }
    };

    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const handleDownloadPdf = () => {
    setDownloadedPdf(true);
    setTimeout(() => setDownloadedPdf(false), 4000);
  };

  const handleCopyLink = () => {
    if (typeof navigator !== 'undefined') {
      navigator.clipboard.writeText(window.location.href);
      setCopiedLink(true);
      setTimeout(() => setCopiedLink(false), 3000);
    }
  };

  const scrollToId = (id: string) => {
    const el = document.getElementById(id);
    if (el) {
      el.scrollIntoView({ behavior: 'smooth', block: 'start' });
      setActiveSection(id);
    }
  };

  // Inject JSON-LD Schema for Enterprise SEO
  useEffect(() => {
    const schemaData = {
      '@context': 'https://schema.org',
      '@type': 'TechArticle',
      'headline': caseStudy.title,
      'description': caseStudy.subtitle,
      'image': caseStudy.heroBannerImage,
      'author': {
        '@type': 'Organization',
        'name': 'Octavia Tech Solutions',
        'url': 'https://octaviatechnologies.com',
      },
      'publisher': {
        '@type': 'Organization',
        'name': 'Octavia Tech Solutions',
      },
      'datePublished': caseStudy.publishDate,
      'keywords': caseStudy.seo.keywords.join(', '),
    };

    const script = document.createElement('script');
    script.type = 'application/ld+json';
    script.text = JSON.stringify(schemaData);
    document.head.appendChild(script);

    return () => {
      document.head.removeChild(script);
    };
  }, [caseStudy]);

  return (
    <div className="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans selection:bg-[#264868] selection:text-white pt-24 pb-20">
      
      {/* 1. HERO BANNER SECTION */}
      <section className="bg-gradient-to-b from-[#153758] via-[#264868] to-[#153758] text-white py-16 sm:py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <div className="absolute top-0 right-1/4 w-[700px] h-[350px] bg-[#C1A972]/10 blur-[140px] rounded-full pointer-events-none" />

        <div className="max-w-7xl mx-auto space-y-6 relative z-10">
          
          {/* Breadcrumbs & Back Button */}
          <div className="flex flex-wrap items-center justify-between gap-4">
            <nav className="flex items-center gap-2 text-xs text-[#93A3B2] font-medium">
              <button
                onClick={() => onLinkClick?.('/', 'Home')}
                className="hover:text-[#C1A972] transition-colors"
              >
                Home
              </button>
              <span>/</span>
              <button
                onClick={() => onLinkClick?.('/case-studies', 'Case Studies')}
                className="hover:text-[#C1A972] transition-colors"
              >
                Case Studies
              </button>
              <span>/</span>
              <span className="text-[#C1A972] font-semibold truncate max-w-xs sm:max-w-md">
                {caseStudy.clientName}
              </span>
            </nav>

            <button
              onClick={() => onLinkClick?.('/case-studies', 'Case Studies')}
              className="inline-flex items-center gap-1.5 text-xs font-bold text-[#C1A972] hover:text-[#C1A972] transition-colors"
            >
              <ArrowLeft className="w-4 h-4" />
              <span>Back to Case Studies</span>
            </button>
          </div>

          {/* Badges Bar */}
          <div className="flex flex-wrap items-center gap-2 pt-2">
            <span className="px-3 py-1 bg-white/10 backdrop-blur-md text-[#C1A972] text-xs font-bold rounded-full border border-[#C1A972]/40 flex items-center gap-1">
              <Building2 className="w-3.5 h-3.5" />
              {caseStudy.industry}
            </span>
            <span className="px-3 py-1 bg-white/10 backdrop-blur-md text-white text-xs font-bold rounded-full border border-white/20 flex items-center gap-1">
              <Layers className="w-3.5 h-3.5 text-[#C1A972]" />
              {caseStudy.serviceCategory}
            </span>
            <span className="px-3 py-1 bg-white/10 backdrop-blur-md text-[#FEFEFE] text-xs font-semibold rounded-full border border-white/20 flex items-center gap-1">
              <Globe className="w-3.5 h-3.5 text-[#93A3B2]" />
              {caseStudy.engagementModel}
            </span>
          </div>

          {/* Title & Subtitle */}
          <h1 className="text-2xl sm:text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight max-w-4xl">
            {caseStudy.title}
          </h1>

          <p className="text-sm sm:text-lg text-[#FEFEFE] max-w-3xl leading-relaxed font-normal">
            {caseStudy.subtitle}
          </p>

          {/* Executive Metadata Pills Row */}
          <div className="pt-4 grid grid-cols-2 sm:grid-cols-4 gap-4 border-t border-white/15 max-w-4xl text-xs text-[#93A3B2]">
            <div>
              <span className="text-[#93A3B2] block text-[10px] font-bold uppercase tracking-wider">Client Organization</span>
              <strong className="text-white font-bold">{caseStudy.clientName}</strong>
            </div>
            <div>
              <span className="text-[#93A3B2] block text-[10px] font-bold uppercase tracking-wider">Location</span>
              <strong className="text-white font-bold">{caseStudy.clientLocation}</strong>
            </div>
            <div>
              <span className="text-[#93A3B2] block text-[10px] font-bold uppercase tracking-wider">Project Duration</span>
              <strong className="text-white font-bold">{caseStudy.projectDuration}</strong>
            </div>
            <div>
              <span className="text-[#93A3B2] block text-[10px] font-bold uppercase tracking-wider">Team Size</span>
              <strong className="text-white font-bold">{caseStudy.teamSize}</strong>
            </div>
          </div>

        </div>
      </section>

      {/* 2. HERO COVER IMAGE / DASHBOARD PREVIEW BANNER */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-20">
        <div className="rounded-3xl overflow-hidden border-4 border-white shadow-2xl relative h-64 sm:h-96 lg:h-[480px]">
          <img
            src={caseStudy.heroBannerImage}
            alt={caseStudy.title}
            className="w-full h-full object-cover"
          />
          <div className="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent" />
          
          <div className="absolute bottom-6 left-6 right-6 flex flex-wrap items-center justify-between gap-4 text-white">
            <div className="bg-[#153758]/90 backdrop-blur-md px-4 py-2 rounded-2xl border border-[#C1A972]/40 flex items-center gap-2 text-xs font-bold">
              <Sparkles className="w-4 h-4 text-[#C1A972]" />
              <span>Octavia Architecture & Delivery Standard</span>
            </div>

            <div className="flex items-center gap-2">
              <button
                onClick={handleCopyLink}
                className="p-2.5 bg-white/20 hover:bg-white/30 backdrop-blur-md rounded-xl text-white text-xs font-bold transition-all flex items-center gap-1.5"
              >
                <Share2 className="w-4 h-4" />
                <span className="hidden sm:inline">{copiedLink ? 'Link Copied!' : 'Share'}</span>
              </button>

              <button
                onClick={handleDownloadPdf}
                className="px-4 py-2.5 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs rounded-xl transition-all shadow-md flex items-center gap-1.5"
              >
                <Download className="w-4 h-4" />
                <span>{downloadedPdf ? 'PDF Requested!' : 'Download Case Study PDF'}</span>
              </button>
            </div>
          </div>
        </div>
      </div>

      {/* 3. MAIN SPLIT LAYOUT (8 COLS CONTENT + 4 COLS STICKY SIDEBAR) */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
          
          {/* LEFT 8 COLS: CASE STUDY DETAILED SECTIONS */}
          <main className="lg:col-span-8 space-y-12">
            
            {/* SECTION 1: BUSINESS OVERVIEW */}
            <section id="overview" className="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 space-y-4 shadow-sm scroll-mt-32">
              <div className="flex items-center gap-2 text-[#264868] font-extrabold uppercase text-xs tracking-wider">
                <FileText className="w-4 h-4 text-[#C1A972]" />
                <span>1. Business Overview</span>
              </div>
              <h2 className="text-xl sm:text-2xl font-black text-[#153758]">
                Client Background & Operational Context
              </h2>
              <p className="text-xs sm:text-sm text-[#5C6B7A] leading-relaxed font-normal">
                {caseStudy.businessOverview}
              </p>
            </section>

            {/* SECTION 2: CLIENT CHALLENGES */}
            <section id="challenges" className="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm scroll-mt-32">
              <div className="flex items-center gap-2 text-[#264868] font-extrabold uppercase text-xs tracking-wider">
                <ShieldAlert className="w-4 h-4 text-[#153758]" />
                <span>2. Key Challenges & Bottlenecks</span>
              </div>
              <h2 className="text-xl sm:text-2xl font-black text-[#153758]">
                Operational Limitations Before Engagement
              </h2>

              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                {caseStudy.clientChallenges.map((challenge, idx) => (
                  <div
                    key={idx}
                    className="p-4 bg-[#C1A972]/50 border border-[#C1A972]/15 rounded-2xl space-y-2"
                  >
                    <div className="w-7 h-7 bg-[#C1A972]/15 text-[#153758] rounded-lg flex items-center justify-center text-xs font-bold">
                      0{idx + 1}
                    </div>
                    <p className="text-xs text-[#153758] leading-relaxed font-medium">
                      {challenge}
                    </p>
                  </div>
                ))}
              </div>

              {/* Goals & Objectives Grid */}
              <div className="pt-4 border-t border-[#F3F5F7] grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div className="space-y-3">
                  <h4 className="text-xs font-extrabold text-[#264868] uppercase tracking-wider flex items-center gap-1.5">
                    <Target className="w-4 h-4 text-[#C1A972]" />
                    Business Goals
                  </h4>
                  <ul className="space-y-2">
                    {caseStudy.businessGoals.map((goal, i) => (
                      <li key={i} className="text-xs text-[#5C6B7A] flex items-start gap-2">
                        <Check className="w-4 h-4 text-[#264868] shrink-0 mt-0.5" />
                        <span>{goal}</span>
                      </li>
                    ))}
                  </ul>
                </div>

                <div className="space-y-3">
                  <h4 className="text-xs font-extrabold text-[#264868] uppercase tracking-wider flex items-center gap-1.5">
                    <Compass className="w-4 h-4 text-[#264868]" />
                    Engineering Objectives
                  </h4>
                  <ul className="space-y-2">
                    {caseStudy.projectObjectives.map((obj, i) => (
                      <li key={i} className="text-xs text-[#5C6B7A] flex items-start gap-2">
                        <Check className="w-4 h-4 text-[#264868] shrink-0 mt-0.5" />
                        <span>{obj}</span>
                      </li>
                    ))}
                  </ul>
                </div>
              </div>
            </section>

            {/* SECTION 3: OUR APPROACH & DISCOVERY */}
            <section id="approach" className="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm scroll-mt-32">
              <div className="flex items-center gap-2 text-[#264868] font-extrabold uppercase text-xs tracking-wider">
                <Workflow className="w-4 h-4 text-[#C1A972]" />
                <span>3. Our Approach & Discovery</span>
              </div>
              <h2 className="text-xl sm:text-2xl font-black text-[#153758]">
                Engineering Strategy & Discovery Process
              </h2>
              <p className="text-xs sm:text-sm text-[#5C6B7A] leading-relaxed font-normal">
                {caseStudy.ourApproach}
              </p>

              <div className="p-5 bg-[#FEFEFE] border border-[#DDE3E9] rounded-2xl space-y-3">
                <h4 className="text-xs font-black text-[#264868] uppercase tracking-wider">
                  Discovery Phase Deliverables
                </h4>
                <div className="space-y-2">
                  {caseStudy.discoveryProcess.map((item, i) => (
                    <div key={i} className="flex items-start gap-2.5 text-xs text-[#153758]">
                      <div className="w-5 h-5 bg-[#264868] text-white rounded-full flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">
                        {i + 1}
                      </div>
                      <span>{item}</span>
                    </div>
                  ))}
                </div>
              </div>
            </section>

            {/* SECTION 4: SOLUTION ARCHITECTURE DIAGRAM MOCKUP */}
            <section id="architecture" className="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm scroll-mt-32">
              <div className="flex items-center gap-2 text-[#264868] font-extrabold uppercase text-xs tracking-wider">
                <Cpu className="w-4 h-4 text-[#264868]" />
                <span>4. Solution Architecture</span>
              </div>
              <h2 className="text-xl sm:text-2xl font-black text-[#153758]">
                High-Availability System Blueprint
              </h2>
              <p className="text-xs sm:text-sm text-[#5C6B7A] leading-relaxed font-normal">
                {caseStudy.solutionArchitecture.summary}
              </p>

              {/* Architecture Visual Diagram Mock Box */}
              <div className="bg-[#153758] rounded-2xl p-6 text-white space-y-4 border border-[#C1A972]/30 shadow-inner">
                <div className="flex items-center justify-between text-xs text-[#93A3B2] pb-3 border-b border-white/10">
                  <span className="font-mono text-[11px] text-[#C1A972]">
                    System Pipeline Data Flow Diagram
                  </span>
                  <span className="bg-[#264868]/20 text-[#264868] px-2.5 py-0.5 rounded-full font-bold text-[10px]">
                    Production Verified
                  </span>
                </div>

                <p className="font-mono text-xs text-[#C1A972]/90 leading-relaxed bg-black/30 p-3 rounded-xl border border-white/10">
                  {caseStudy.solutionArchitecture.diagramDescription}
                </p>

                {/* Architecture Components Grid */}
                <div className="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2">
                  {caseStudy.solutionArchitecture.components.map((comp, idx) => (
                    <div key={idx} className="bg-white/5 border border-white/10 p-3.5 rounded-xl space-y-1">
                      <div className="text-xs font-bold text-[#C1A972]">{comp.name}</div>
                      <p className="text-[11px] text-[#93A3B2] leading-tight">{comp.description}</p>
                      <span className="inline-block mt-2 text-[10px] font-mono text-[#93A3B2] bg-black/40 px-2 py-0.5 rounded">
                        {comp.tech}
                      </span>
                    </div>
                  ))}
                </div>
              </div>

              {/* Implementation Phased Timeline */}
              <div className="space-y-4 pt-4">
                <h3 className="text-sm font-black text-[#264868] uppercase tracking-wider">
                  Implementation Roadmap & Timeline
                </h3>
                <div className="space-y-3">
                  {caseStudy.implementationProcess.map((step, i) => (
                    <div
                      key={i}
                      className="p-4 bg-[#FEFEFE] border border-[#DDE3E9] rounded-2xl flex flex-col sm:flex-row sm:items-center justify-between gap-3"
                    >
                      <div>
                        <div className="text-xs font-extrabold text-[#264868]">{step.phase}</div>
                        <p className="text-xs text-[#5C6B7A] mt-0.5">{step.summary}</p>
                      </div>
                      <span className="px-3 py-1 bg-[#264868]/10 text-[#264868] text-xs font-bold rounded-full shrink-0 self-start sm:self-center">
                        {step.duration}
                      </span>
                    </div>
                  ))}
                </div>
              </div>
            </section>

            {/* SECTION 5: KEY FEATURES & DASHBOARD MOCKUP */}
            <section id="features" className="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm scroll-mt-32">
              <div className="flex items-center gap-2 text-[#264868] font-extrabold uppercase text-xs tracking-wider">
                <LayoutDashboard className="w-4 h-4 text-[#C1A972]" />
                <span>5. Key Features & Dashboard UX</span>
              </div>
              <h2 className="text-xl sm:text-2xl font-black text-[#153758]">
                Delivered Capabilities & Dashboard UI
              </h2>

              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                {caseStudy.keyFeaturesDelivered.map((feat, i) => (
                  <div key={i} className="p-4 bg-[#FEFEFE] border border-[#DDE3E9] rounded-2xl space-y-2">
                    <div className="flex items-center gap-2 text-xs font-extrabold text-[#264868]">
                      <Zap className="w-4 h-4 text-[#C1A972]" />
                      <span>{feat.title}</span>
                    </div>
                    <p className="text-xs text-[#5C6B7A] leading-relaxed">{feat.description}</p>
                  </div>
                ))}
              </div>

              {/* SIMULATED ENTERPRISE DASHBOARD PREVIEW */}
              <div className="bg-[#153758] rounded-2xl p-6 text-white space-y-4 border border-[#C1A972]/30 shadow-xl">
                <div className="flex items-center justify-between border-b border-white/10 pb-3">
                  <div className="flex items-center gap-2">
                    <div className="w-3 h-3 rounded-full bg-[#264868]" />
                    <div className="w-3 h-3 rounded-full bg-[#C1A972]" />
                    <div className="w-3 h-3 rounded-full bg-[#264868]" />
                    <span className="text-xs font-mono text-[#93A3B2] ml-2">
                      {caseStudy.clientName} Admin Executive Portal v4.2
                    </span>
                  </div>
                  <span className="text-[10px] font-mono text-[#C1A972] bg-white/10 px-2 py-0.5 rounded">
                    LIVE SYSTEM PREVIEW
                  </span>
                </div>

                <div className="grid grid-cols-2 sm:grid-cols-4 gap-3">
                  {caseStudy.kpis.map((kpi, idx) => (
                    <div key={idx} className="bg-white/5 border border-white/10 p-3 rounded-xl text-center">
                      <div className="text-lg font-black text-[#C1A972]">{kpi.value}</div>
                      <div className="text-[10px] text-[#93A3B2] font-bold uppercase">{kpi.label}</div>
                    </div>
                  ))}
                </div>

                <div className="p-4 bg-black/40 rounded-xl border border-white/10 flex items-center justify-between flex-wrap gap-3 text-xs">
                  <div className="flex items-center gap-2 text-[#264868] font-mono text-[11px]">
                    <CheckCircle2 className="w-4 h-4" />
                    <span>Pipeline Status: 100% Operational • Zero Latency Bottlenecks</span>
                  </div>
                  <span className="text-[10px] text-[#93A3B2] font-mono">
                    Updated 2 seconds ago
                  </span>
                </div>
              </div>
            </section>

            {/* SECTION 6: BUSINESS RESULTS & KPIS */}
            <section id="results" className="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm scroll-mt-32">
              <div className="flex items-center gap-2 text-[#264868] font-extrabold uppercase text-xs tracking-wider">
                <BarChart3 className="w-4 h-4 text-[#264868]" />
                <span>6. Business Results & ROI Metrics</span>
              </div>
              <h2 className="text-xl sm:text-2xl font-black text-[#153758]">
                Quantifiable Impact & Performance Gains
              </h2>

              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                {caseStudy.kpis.map((kpi, i) => (
                  <div key={i} className="p-5 bg-gradient-to-br from-white to-[#C1A972]/20 border border-[#DDE3E9] rounded-2xl space-y-2 shadow-sm">
                    <div className="flex items-center justify-between">
                      <span className="text-xs font-bold text-[#5C6B7A] uppercase tracking-wider">{kpi.label}</span>
                      <span className="px-2 py-0.5 bg-[#264868]/15 text-[#153758] text-[10px] font-extrabold rounded-md flex items-center gap-1">
                        <TrendingUp className="w-3 h-3" />
                        {kpi.change}
                      </span>
                    </div>
                    <div className="text-3xl font-black text-[#264868]">{kpi.value}</div>
                    <p className="text-xs text-[#5C6B7A]">{kpi.description}</p>
                  </div>
                ))}
              </div>
            </section>

            {/* SECTION 7: BEFORE VS AFTER COMPARISON TABLE */}
            <section id="before-after" className="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm scroll-mt-32">
              <div className="flex items-center gap-2 text-[#264868] font-extrabold uppercase text-xs tracking-wider">
                <TrendingUp className="w-4 h-4 text-[#C1A972]" />
                <span>7. Before vs After Comparison</span>
              </div>
              <h2 className="text-xl sm:text-2xl font-black text-[#153758]">
                Operational Transformation Scorecard
              </h2>

              <div className="overflow-x-auto">
                <table className="w-full text-left text-xs border-collapse">
                  <thead>
                    <tr className="border-b border-[#DDE3E9] bg-[#FEFEFE]">
                      <th className="py-3 px-4 font-black text-[#264868] uppercase">Metric / Area</th>
                      <th className="py-3 px-4 font-black text-[#153758] uppercase">Before Octavia</th>
                      <th className="py-3 px-4 font-black text-[#264868] uppercase">After Octavia</th>
                      <th className="py-3 px-4 font-black text-[#264868] uppercase">Strategic Benefit</th>
                    </tr>
                  </thead>
                  <tbody className="divide-y divide-[#F3F5F7]">
                    {caseStudy.beforeAfter.map((row, idx) => (
                      <tr key={idx} className="hover:bg-[#F3F5F7]/80 transition-colors">
                        <td className="py-3.5 px-4 font-bold text-[#153758]">{row.metric}</td>
                        <td className="py-3.5 px-4 text-[#153758] font-semibold bg-[#C1A972]/30">{row.before}</td>
                        <td className="py-3.5 px-4 text-[#153758] font-bold bg-[#264868]/30">{row.after}</td>
                        <td className="py-3.5 px-4 text-[#5C6B7A]">{row.impact}</td>
                      </tr>
                    ))}
                  </tbody>
                </table>
              </div>
            </section>

            {/* CLIENT TESTIMONIAL QUOTE BOX */}
            {caseStudy.testimonial && (
              <div className="bg-gradient-to-r from-[#264868] to-[#153758] rounded-3xl p-8 text-white space-y-6 shadow-xl border border-[#C1A972]/30 relative overflow-hidden">
                <div className="text-4xl text-[#C1A972] font-serif font-black leading-none opacity-50">
                  &ldquo;
                </div>
                <p className="text-base sm:text-lg font-medium italic text-[#FEFEFE] leading-relaxed">
                  {caseStudy.testimonial.quote}
                </p>
                <div className="flex items-center gap-4 pt-2 border-t border-white/15">
                  <img
                    src={caseStudy.testimonial.avatar}
                    alt={caseStudy.testimonial.authorName}
                    className="w-12 h-12 rounded-full object-cover border-2 border-[#C1A972]"
                  />
                  <div>
                    <h4 className="text-sm font-bold text-white">{caseStudy.testimonial.authorName}</h4>
                    <p className="text-xs text-[#C1A972] font-semibold">{caseStudy.testimonial.authorRole}, {caseStudy.testimonial.company}</p>
                  </div>
                </div>
              </div>
            )}

            {/* SECTION 8: BUSINESS IMPACT & LESSONS LEARNED */}
            <section id="impact" className="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm scroll-mt-32">
              <div className="flex items-center gap-2 text-[#264868] font-extrabold uppercase text-xs tracking-wider">
                <Award className="w-4 h-4 text-[#264868]" />
                <span>8. Strategic Impact & Future Roadmap</span>
              </div>

              <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div className="space-y-3">
                  <h3 className="text-sm font-black text-[#264868] uppercase tracking-wider">
                    Long-Term Business Impact
                  </h3>
                  <ul className="space-y-2">
                    {caseStudy.businessImpact.map((item, i) => (
                      <li key={i} className="text-xs text-[#5C6B7A] flex items-start gap-2">
                        <CheckCircle2 className="w-4 h-4 text-[#264868] shrink-0 mt-0.5" />
                        <span>{item}</span>
                      </li>
                    ))}
                  </ul>
                </div>

                <div className="space-y-3">
                  <h3 className="text-sm font-black text-[#264868] uppercase tracking-wider">
                    Future Expansion Roadmap
                  </h3>
                  <ul className="space-y-2">
                    {caseStudy.futureRoadmap.map((item, i) => (
                      <li key={i} className="text-xs text-[#5C6B7A] flex items-start gap-2">
                        <ArrowRight className="w-4 h-4 text-[#C1A972] shrink-0 mt-0.5" />
                        <span>{item}</span>
                      </li>
                    ))}
                  </ul>
                </div>
              </div>
            </section>

            {/* RELATED ENTERPRISE SERVICES & BLOGS */}
            <div className="pt-6 space-y-6">
              <h3 className="text-base font-extrabold text-[#264868]">
                Related Enterprise Services & Technical Resources
              </h3>
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                {caseStudy.relatedServices.map((srv, i) => (
                  <button
                    key={i}
                    onClick={() => onLinkClick?.(srv.href, srv.title)}
                    className="p-4 bg-white border border-[#DDE3E9] hover:border-[#264868] rounded-2xl text-left transition-all hover:shadow-md flex items-center justify-between group"
                  >
                    <div>
                      <span className="text-[10px] font-bold text-[#93A3B2] uppercase block">Core Service</span>
                      <span className="text-xs font-bold text-[#264868] group-hover:text-[#C1A972] transition-colors">
                        {srv.title}
                      </span>
                    </div>
                    <ArrowRight className="w-4 h-4 text-[#C1A972] group-hover:translate-x-1 transition-transform" />
                  </button>
                ))}
              </div>
            </div>

            {/* RELATED CASE STUDIES GRID */}
            <div className="pt-8 border-t border-[#DDE3E9] space-y-6">
              <h3 className="text-lg font-black text-[#153758]">
                Explore More Case Studies
              </h3>
              <div className="grid grid-cols-1 sm:grid-cols-3 gap-4">
                {relatedCaseStudies.map((rcs) => (
                  <div
                    key={rcs.id}
                    onClick={() => onNavigateToCaseStudy(rcs.slug)}
                    className="p-4 bg-white border border-[#DDE3E9] hover:border-[#264868] rounded-2xl cursor-pointer hover:shadow-lg transition-all space-y-2 group"
                  >
                    <span className="text-[10px] font-bold text-[#C1A972] uppercase">{rcs.industry}</span>
                    <h4 className="text-xs font-bold text-[#264868] group-hover:text-[#C1A972] line-clamp-2">
                      {rcs.title}
                    </h4>
                    <p className="text-[11px] text-[#5C6B7A] line-clamp-2">{rcs.shortChallenge}</p>
                  </div>
                ))}
              </div>
            </div>

          </main>

          {/* RIGHT 4 COLS: STICKY SIDEBAR */}
          <aside className="lg:col-span-4 space-y-6 sticky top-28">
            
            {/* PROJECT OVERVIEW SUMMARY CARD */}
            <div className="bg-white border border-[#DDE3E9] rounded-3xl p-6 space-y-4 shadow-sm">
              <h3 className="text-sm font-black text-[#264868] uppercase tracking-wider border-b pb-3">
                Project Snapshot
              </h3>

              <div className="space-y-3 text-xs">
                <div>
                  <span className="text-[#93A3B2] block text-[10px] font-bold uppercase">Client</span>
                  <span className="font-bold text-[#153758]">{caseStudy.clientName}</span>
                </div>
                <div>
                  <span className="text-[#93A3B2] block text-[10px] font-bold uppercase">Industry</span>
                  <span className="font-bold text-[#264868]">{caseStudy.industry}</span>
                </div>
                <div>
                  <span className="text-[#93A3B2] block text-[10px] font-bold uppercase">Service</span>
                  <span className="font-bold text-[#153758]">{caseStudy.serviceCategory}</span>
                </div>
                <div>
                  <span className="text-[#93A3B2] block text-[10px] font-bold uppercase">Engagement Model</span>
                  <span className="font-bold text-[#153758]">{caseStudy.engagementModel}</span>
                </div>
                <div>
                  <span className="text-[#93A3B2] block text-[10px] font-bold uppercase">Duration & Team</span>
                  <span className="font-bold text-[#153758]">{caseStudy.projectDuration} • {caseStudy.teamSize}</span>
                </div>
              </div>

              {/* Download PDF & Consultation Buttons */}
              <div className="pt-2 space-y-2">
                <button
                  onClick={handleDownloadPdf}
                  className="w-full py-2.5 bg-[#FEFEFE] hover:bg-[#F3F5F7] text-[#264868] border border-[#DDE3E9] font-bold text-xs rounded-xl transition-all flex items-center justify-center gap-2 shadow-sm"
                >
                  <Download className="w-3.5 h-3.5 text-[#C1A972]" />
                  <span>{downloadedPdf ? 'PDF Requested!' : 'Download Case Study PDF'}</span>
                </button>

                <button
                  onClick={() => onOpenConsultation?.(`Case Study Consultation: ${caseStudy.title}`)}
                  className="w-full py-3 bg-[#264868] hover:bg-[#153758] text-white font-extrabold text-xs rounded-xl transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2"
                >
                  <MessageSquare className="w-3.5 h-3.5 text-[#C1A972]" />
                  <span>Book Strategy Call</span>
                </button>
              </div>
            </div>

            {/* STICKY TABLE OF CONTENTS */}
            <div className="bg-white border border-[#DDE3E9] rounded-3xl p-6 space-y-3 shadow-sm hidden lg:block">
              <h3 className="text-xs font-black text-[#264868] uppercase tracking-wider">
                Table of Contents
              </h3>
              <nav className="space-y-1 text-xs">
                {[
                  { id: 'overview', label: '1. Business Overview' },
                  { id: 'challenges', label: '2. Client Challenges & Goals' },
                  { id: 'approach', label: '3. Engineering Approach' },
                  { id: 'architecture', label: '4. Solution Architecture' },
                  { id: 'features', label: '5. Key Features & Dashboard UX' },
                  { id: 'results', label: '6. Business Results & KPIs' },
                  { id: 'before-after', label: '7. Before vs After Scorecard' },
                  { id: 'impact', label: '8. Strategic Impact' },
                ].map((item) => (
                  <button
                    key={item.id}
                    onClick={() => scrollToId(item.id)}
                    className={`w-full text-left py-1.5 px-3 rounded-lg text-xs font-semibold transition-all flex items-center justify-between ${
                      activeSection === item.id
                        ? 'bg-[#264868] text-white font-bold shadow-sm'
                        : 'text-[#5C6B7A] hover:bg-[#F3F5F7]'
                    }`}
                  >
                    <span>{item.label}</span>
                    <ChevronRight className="w-3 h-3 opacity-60" />
                  </button>
                ))}
              </nav>
            </div>

            {/* TECHNOLOGIES USED BOX */}
            <div className="bg-white border border-[#DDE3E9] rounded-3xl p-6 space-y-3 shadow-sm">
              <h3 className="text-xs font-black text-[#264868] uppercase tracking-wider">
                Technologies Employed
              </h3>
              <div className="flex flex-wrap gap-1.5">
                {caseStudy.technologies.map((tech) => (
                  <span
                    key={tech}
                    className="px-2.5 py-1 bg-[#F3F5F7] text-[#153758] text-xs font-bold rounded-lg border border-[#DDE3E9]"
                  >
                    {tech}
                  </span>
                ))}
              </div>
            </div>

            {/* DIRECT EXPERT CONTACT CARD */}
            <div className="bg-gradient-to-br from-[#153758] to-[#264868] text-white rounded-3xl p-6 space-y-4 shadow-xl border border-[#C1A972]/30">
              <div className="flex items-center gap-3">
                <div className="w-10 h-10 bg-[#C1A972]/20 text-[#C1A972] rounded-2xl flex items-center justify-center border border-[#C1A972]/40">
                  <Users className="w-5 h-5" />
                </div>
                <div>
                  <h4 className="text-xs font-bold text-white">Speak with an Architect</h4>
                  <p className="text-[11px] text-[#93A3B2]">Need similar results for your tech stack?</p>
                </div>
              </div>
              <button
                onClick={() => onOpenConsultation?.(`Direct Expert Call: ${caseStudy.industry}`)}
                className="w-full py-2.5 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs rounded-xl transition-all shadow-md"
              >
                Schedule Technical Review
              </button>
            </div>

          </aside>

        </div>
      </div>

    </div>
  );
};
