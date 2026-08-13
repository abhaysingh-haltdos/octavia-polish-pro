import React, { useState } from 'react';
import {
  Video,
  Sparkles,
  Building2,
  Globe,
  Zap,
  Cpu,
  ShieldCheck,
  Search,
  ArrowUpRight,
  PhoneCall,
  Radio,
  Layers,
} from '@/site/icons';
import { SOLUTION_DATA } from '../../data/solutionData';

interface SolutionsListingPageProps {
  onSolutionClick: (slug: string) => void;
  onOpenConsultation: (topic: string) => void;
  onLinkClick: (href: string, label: string) => void;
}

const ALL_SOLUTIONS = [
  {
    slug: 'webrtc-development',
    name: 'WebRTC & Real-Time Audio/Video Streaming',
    category: 'Real-Time Communications',
    icon: Video,
    badge: 'SUB-150MS LATENCY',
    desc: 'High-concurrency SFU/MCU media servers, custom signaling, STUN/TURN relays, and WebRTC SDKs for live interactive video.',
  },
  {
    slug: 'ai-solutions',
    name: 'Enterprise Generative AI & Agentic Workflows',
    category: 'Artificial Intelligence',
    icon: Sparkles,
    badge: 'AGENTIC WORKFLOWS',
    desc: 'RAG knowledge search, custom LLM fine-tuning, autonomous multi-agent swarms, and private VPC model hosting.',
  },
  {
    slug: 'saas-solutions',
    name: 'Multi-Tenant Cloud SaaS Product Engineering',
    category: 'Product Engineering',
    icon: Building2,
    badge: 'MULTI-TENANT ARCHITECTURE',
    desc: 'Row-level security database isolation, automated Stripe billing, tenant onboarding workflows, and microservices.',
  },
  {
    slug: 'cloud-solutions',
    name: 'Multi-Cloud Infrastructure & DevOps Engineering',
    category: 'Cloud & Infrastructure',
    icon: Globe,
    badge: 'KUBERNETES & FINOPS',
    desc: 'Auto-scaling Kubernetes clusters, Terraform Infrastructure as Code, zero-downtime CI/CD pipelines, and FinOps cost reduction.',
  },
  {
    slug: 'automation-solutions',
    name: 'Intelligent Process Automation & API Integration',
    category: 'Enterprise Automation',
    icon: Zap,
    badge: 'AI-POWERED RPA',
    desc: 'Robotic process automation, AI intelligent OCR document ingestion, enterprise service bus, and ERP/CRM syncing.',
  },
  {
    slug: 'enterprise-solutions',
    name: 'Legacy Core Modernization & High-Concurrency Systems',
    category: 'Enterprise Engineering',
    icon: ShieldCheck,
    badge: 'ZERO TRUST SECURITY',
    desc: 'Strangler-fig mainframe refactoring, event-driven Kafka architectures, and 1,000,000+ TPS high-capacity pipelines.',
  },
  {
    slug: 'startup-solutions',
    name: 'Rapid MVP Product Engineering for Startups',
    category: 'Product Engineering',
    icon: Cpu,
    badge: 'RAPID MVP (6-8 WEEKS)',
    desc: 'Go from concept to investor-ready product launch in 6 to 8 weeks with scalable cloud foundations and UX design.',
  },
  {
    slug: 'business-solutions',
    name: 'Custom ERP, CRM & Business Intelligence Tools',
    category: 'Enterprise Engineering',
    icon: Layers,
    badge: 'CUSTOM ERP & BI',
    desc: 'Bespoke business operating systems, custom lead CRMs, fulfillment software, and real-time executive dashboard analytics.',
  },
];

export const SolutionsListingPage: React.FC<SolutionsListingPageProps> = ({
  onSolutionClick,
  onOpenConsultation,
  onLinkClick,
}) => {
  const [searchTerm, setSearchTerm] = useState('');
  const [selectedCategory, setSelectedCategory] = useState<string>('All');

  const categories = [
    'All',
    'Real-Time Communications',
    'Artificial Intelligence',
    'Product Engineering',
    'Cloud & Infrastructure',
    'Enterprise Automation',
    'Enterprise Engineering',
  ];

  const filteredSolutions = ALL_SOLUTIONS.filter((sol) => {
    const matchesSearch =
      sol.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
      sol.desc.toLowerCase().includes(searchTerm.toLowerCase()) ||
      sol.category.toLowerCase().includes(searchTerm.toLowerCase());

    const matchesCategory = selectedCategory === 'All' || sol.category === selectedCategory;

    return matchesSearch && matchesCategory;
  });

  return (
    <div className="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans pb-24">
      {/* Hero Banner Header */}
      <section className="bg-[#153758] text-white pt-28 pb-16 px-6 border-b border-[#153758] relative overflow-hidden">
        <div className="max-w-7xl mx-auto text-center space-y-4 relative z-10">
          <span className="text-xs font-bold text-[#D9C48F] uppercase tracking-widest bg-[#264868] px-3.5 py-1.5 rounded-full border border-[#C1A972]/30 inline-flex items-center gap-1.5">
            <Sparkles className="w-3.5 h-3.5" />
            <span>Octavia Tech Enterprise Solutions Directory</span>
          </span>

          <h1 className="text-3xl sm:text-5xl font-black tracking-tight text-white">
            Enterprise Technology Solutions
          </h1>

          <p className="text-[#B4C1CD] text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
            Modular software architectures, real-time media engines, Generative AI pipelines, and high-concurrency cloud frameworks engineered for modern enterprises.
          </p>

          {/* Search Bar */}
          <div className="pt-6 max-w-xl mx-auto relative">
            <Search className="w-5 h-5 text-[#B4C1CD] absolute left-4 top-1/2 -translate-y-1/2" />
            <input
              type="text"
              placeholder="Search solutions (e.g., WebRTC, AI, Cloud, SaaS, ERP)..."
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
              className="w-full pl-12 pr-4 py-3.5 rounded-2xl bg-white/10 border border-white/20 text-white placeholder-[#93A3B2] text-sm focus:outline-none focus:border-[#C1A972] focus:ring-2 focus:ring-[#C1A972]/30 transition-all"
            />
          </div>
        </div>
      </section>

      {/* Category Tabs */}
      <section className="max-w-7xl mx-auto px-6 py-8 border-b border-[#DDE3E9]">
        <div className="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
          {categories.map((cat, idx) => (
            <button
              key={idx}
              onClick={() => setSelectedCategory(cat)}
              className={`px-4 py-2 rounded-xl text-xs font-bold whitespace-nowrap transition-all border ${
                selectedCategory === cat
                  ? 'bg-[#264868] text-white border-[#264868] shadow-md'
                  : 'bg-white text-[#5C6B7A] border-[#DDE3E9] hover:border-[#DDE3E9] hover:text-[#153758]'
              }`}
            >
              {cat}
            </button>
          ))}
        </div>
      </section>

      {/* Solutions Cards Grid */}
      <section className="max-w-7xl mx-auto px-6 py-12">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {filteredSolutions.map((sol, idx) => {
            const Icon = sol.icon;
            return (
              <div
                key={idx}
                onClick={() => onSolutionClick(sol.slug)}
                className="bg-white rounded-3xl p-8 border border-[#DDE3E9]/80 hover:border-[#C1A972] hover:shadow-xl hover:shadow-[#DDE3E9]/60 transition-all duration-300 cursor-pointer flex flex-col justify-between group relative overflow-hidden"
              >
                <div>
                  <div className="flex items-center justify-between mb-6">
                    <div className="w-12 h-12 rounded-2xl bg-[#264868]/10 text-[#264868] flex items-center justify-center group-hover:bg-[#264868] group-hover:text-[#D9C48F] transition-all">
                      <Icon className="w-6 h-6" />
                    </div>

                    <span className="text-[10px] font-bold text-[#D9C48F] uppercase bg-[#153758] px-2.5 py-1 rounded-full border border-[#C1A972]/30">
                      {sol.badge}
                    </span>
                  </div>

                  <h3 className="text-xl font-bold text-[#264868] mb-3 group-hover:text-[#153758] transition-colors">
                    {sol.name}
                  </h3>

                  <p className="text-xs text-[#5C6B7A] leading-relaxed mb-6">
                    {sol.desc}
                  </p>
                </div>

                <div className="pt-4 border-t border-[#F3F5F7] flex items-center justify-between text-xs font-bold text-[#264868] group-hover:text-[#D9C48F] transition-colors">
                  <span>View Solution Architecture</span>
                  <ArrowUpRight className="w-4 h-4 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" />
                </div>
              </div>
            );
          })}
        </div>

        {filteredSolutions.length === 0 && (
          <div className="text-center py-16 bg-white rounded-3xl border border-[#DDE3E9] space-y-4">
            <p className="text-[#5C6B7A] text-sm">No technology solutions found matching your search term.</p>
            <button
              onClick={() => {
                setSearchTerm('');
                setSelectedCategory('All');
              }}
              className="px-6 py-2.5 bg-[#264868] text-white font-bold text-xs rounded-xl hover:bg-[#153758] transition-all"
            >
              Reset Filters
            </button>
          </div>
        )}
      </section>

      {/* Bottom Call to Action */}
      <section className="max-w-7xl mx-auto px-6 mt-12">
        <div className="bg-[#153758] text-white rounded-3xl p-10 text-center space-y-4 shadow-xl border border-[#153758]">
          <h2 className="text-2xl sm:text-4xl font-black">
            Need a Custom Architecture Blueprint?
          </h2>
          <p className="text-[#B4C1CD] text-xs sm:text-sm max-w-xl mx-auto">
            Speak directly with an Octavia principal systems architect to review your performance requirements and design a tailored solution roadmap.
          </p>
          <div className="pt-2">
            <button
              onClick={() => onOpenConsultation('Custom Solution Architecture')}
              className="px-8 py-3.5 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs uppercase tracking-wider rounded-xl transition-all shadow-lg inline-flex items-center gap-2"
            >
              <span>Schedule Architecture Review</span>
              <PhoneCall className="w-4 h-4" />
            </button>
          </div>
        </div>
      </section>
    </div>
  );
};
