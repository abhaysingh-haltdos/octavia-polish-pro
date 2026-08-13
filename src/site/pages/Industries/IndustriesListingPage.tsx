import React, { useState } from 'react';
import {
  Stethoscope,
  Building2,
  Shield,
  ShoppingBag,
  GraduationCap,
  Home,
  Truck,
  Factory,
  Landmark,
  Radio,
  Zap,
  Car,
  Film,
  Plane,
  Sprout,
  Users,
  Scale,
  HeartHandshake,
  Utensils,
  Dumbbell,
  ArrowRight,
  Search,
  Sparkles,
  PhoneCall,
  ArrowUpRight,
} from '@/site/icons';

interface IndustriesListingPageProps {
  onIndustryClick: (slug: string) => void;
  onOpenConsultation: (topic: string) => void;
  onLinkClick: (href: string, label: string) => void;
}

const ALL_INDUSTRIES = [
  {
    slug: 'wholesale-softswitch-billing',
    name: 'Wholesale Softswitch & Real-Time Billing',
    category: 'Telecom & Networking',
    icon: Radio,
    badge: 'FEATURED SOLUTION',
    desc: 'Carrier-grade Class 4 VoIP routing, automated rate sheet imports, least cost routing (LCR), and zero-leakage financial settlement.',
  },
  {
    slug: 'healthcare',
    name: 'Healthcare & Life Sciences',
    category: 'Healthcare & Life Sciences',
    icon: Stethoscope,
    badge: 'HIPAA COMPLIANT',
    desc: 'EHR integrations (Epic/Cerner), clinical AI diagnostic support, patient mobile portals, and FDA medical device software.',
  },
  {
    slug: 'fintech',
    name: 'FinTech, Banking & Payments',
    category: 'Financial Services',
    icon: Building2,
    badge: 'PCI-DSS LEVEL 1',
    desc: 'Core banking modernization, biometric fraud shields, real-time payment processing, and automated ledger reconciliation.',
  },
  {
    slug: 'retail',
    name: 'Headless Retail & E-Commerce',
    category: 'Commerce & Retail',
    icon: ShoppingBag,
    badge: 'HIGH CONCURRENCY',
    desc: 'Composable commerce architecture, AI recommendation engines, omnichannel POS systems, and sub-second checkout.',
  },
  {
    slug: 'manufacturing',
    name: 'Smart Manufacturing & Industrial IoT',
    category: 'Industrial & Manufacturing',
    icon: Factory,
    badge: 'INDUSTRY 4.0',
    desc: '5,000+ IoT sensor telemetry, predictive maintenance ML, digital twin factory modeling, and supply chain visibility.',
  },
  {
    slug: 'logistics',
    name: 'Logistics, Freight & Fleet Telematics',
    category: 'Logistics & Supply Chain',
    icon: Truck,
    badge: 'REAL-TIME TRACKING',
    desc: 'AI dynamic fleet route optimization, warehouse management (WMS), cold chain sensors, and electronic proof of delivery.',
  },
  {
    slug: 'insurance',
    name: 'Insurance & InsurTech',
    category: 'Financial Services',
    icon: Shield,
    badge: 'AUTOMATED CLAIMS',
    desc: 'Automated policy management, OCR claims processing, actuarial risk analytics, and instant customer portal access.',
  },
  {
    slug: 'automotive',
    name: 'Automotive & Connected Mobility',
    category: 'Industrial & Manufacturing',
    icon: Car,
    badge: 'TELEMETRY IoT',
    desc: 'Connected vehicle OBD-II telematics, EV charging station networks, fleet analytics, and mobility ride-hailing apps.',
  },
  {
    slug: 'education',
    name: 'Education & EdTech Platforms',
    category: 'Public & Services',
    icon: GraduationCap,
    badge: 'VIRTUAL CAMPUS',
    desc: 'Learning Management Systems (LMS), virtual classrooms, automated grading AI, and student record management.',
  },
  {
    slug: 'government',
    name: 'Government & Defense Sector',
    category: 'Public & Services',
    icon: Landmark,
    badge: 'SECURE GOVCLOUD',
    desc: 'Citizen portal services, e-governance workflows, defense logistics, and FedRAMP compliant cloud architecture.',
  },
  {
    slug: 'real-estate',
    name: 'Real Estate & PropTech',
    category: 'Commerce & Retail',
    icon: Home,
    badge: 'PROPTECH AI',
    desc: 'Property management portals, 3D virtual property tours, tenant billing, and IoT smart building automation.',
  },
  {
    slug: 'travel',
    name: 'Travel, Tourism & Hospitality',
    category: 'Public & Services',
    icon: Plane,
    badge: 'BOOKING ENGINE',
    desc: 'High-speed flight & hotel booking engines, hotel PMS, guest mobile keyless entry, and AI loyalty portals.',
  },
];

export const IndustriesListingPage: React.FC<IndustriesListingPageProps> = ({
  onIndustryClick,
  onOpenConsultation,
  onLinkClick,
}) => {
  const [searchTerm, setSearchTerm] = useState('');
  const [selectedCategory, setSelectedCategory] = useState<string>('All');

  const categories = ['All', 'Telecom & Networking', 'Healthcare & Life Sciences', 'Financial Services', 'Commerce & Retail', 'Industrial & Manufacturing', 'Logistics & Supply Chain', 'Public & Services'];

  const filteredIndustries = ALL_INDUSTRIES.filter((ind) => {
    const matchesSearch =
      ind.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
      ind.desc.toLowerCase().includes(searchTerm.toLowerCase()) ||
      ind.category.toLowerCase().includes(searchTerm.toLowerCase());

    const matchesCategory = selectedCategory === 'All' || ind.category === selectedCategory;

    return matchesSearch && matchesCategory;
  });

  return (
    <div className="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans pb-24">
      {/* Hero Banner Header */}
      <section className="bg-[#153758] text-white pt-28 pb-16 px-6 border-b border-[#153758] relative overflow-hidden">
        <div className="max-w-7xl mx-auto text-center space-y-4 relative z-10">
          <span className="text-xs font-bold text-[#D9C48F] uppercase tracking-widest bg-[#264868] px-3.5 py-1.5 rounded-full border border-[#C1A972]/30 inline-flex items-center gap-1.5">
            <Sparkles className="w-3.5 h-3.5" />
            <span>Octavia Tech Industry Directory</span>
          </span>

          <h1 className="text-3xl sm:text-5xl font-black tracking-tight text-white">
            Industry Solutions &amp; Domain Expertise
          </h1>

          <p className="text-[#B4C1CD] text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
            Decades of combined engineering leadership across mission-critical industries. Explore specialized solutions tailored to your compliance, scale, and performance needs.
          </p>

          {/* Search Input Bar */}
          <div className="pt-6 max-w-xl mx-auto relative">
            <Search className="w-5 h-5 text-[#B4C1CD] absolute left-4 top-1/2 -translate-y-1/2" />
            <input
              type="text"
              placeholder="Search by industry (e.g., Softswitch, Healthcare, FinTech, IoT)..."
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
              className="w-full pl-12 pr-4 py-3.5 rounded-2xl bg-white/10 border border-white/20 text-white placeholder-[#93A3B2] text-sm focus:outline-none focus:border-[#C1A972] focus:ring-2 focus:ring-[#C1A972]/30 transition-all"
            />
          </div>
        </div>
      </section>

      {/* Category Filter Tabs */}
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

      {/* Industry Cards Grid */}
      <section className="max-w-7xl mx-auto px-6 py-12">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {filteredIndustries.map((ind, idx) => {
            const Icon = ind.icon;
            return (
              <div
                key={idx}
                onClick={() => onIndustryClick(ind.slug)}
                className="bg-white rounded-3xl p-8 border border-[#DDE3E9]/80 hover:border-[#C1A972] hover:shadow-xl hover:shadow-[#DDE3E9]/60 transition-all duration-300 cursor-pointer flex flex-col justify-between group relative overflow-hidden"
              >
                <div>
                  <div className="flex items-center justify-between mb-6">
                    <div className="w-12 h-12 rounded-2xl bg-[#264868]/10 text-[#264868] flex items-center justify-center group-hover:bg-[#264868] group-hover:text-[#D9C48F] transition-all">
                      <Icon className="w-6 h-6" />
                    </div>

                    <span className="text-[10px] font-bold text-[#D9C48F] uppercase bg-[#153758] px-2.5 py-1 rounded-full border border-[#C1A972]/30">
                      {ind.badge}
                    </span>
                  </div>

                  <h3 className="text-xl font-bold text-[#264868] mb-3 group-hover:text-[#153758] transition-colors">
                    {ind.name}
                  </h3>

                  <p className="text-xs text-[#5C6B7A] leading-relaxed mb-6">
                    {ind.desc}
                  </p>
                </div>

                <div className="pt-4 border-t border-[#F3F5F7] flex items-center justify-between text-xs font-bold text-[#264868] group-hover:text-[#D9C48F] transition-colors">
                  <span>Explore Industry Solutions</span>
                  <ArrowUpRight className="w-4 h-4 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" />
                </div>
              </div>
            );
          })}
        </div>

        {filteredIndustries.length === 0 && (
          <div className="text-center py-16 bg-white rounded-3xl border border-[#DDE3E9] space-y-4">
            <p className="text-[#5C6B7A] text-sm">No industry solutions found matching your filter criteria.</p>
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

      {/* Bottom CTA Banner */}
      <section className="max-w-7xl mx-auto px-6 mt-12">
        <div className="bg-[#153758] text-white rounded-3xl p-10 text-center space-y-4 shadow-xl border border-[#153758]">
          <h2 className="text-2xl sm:text-4xl font-black">
            Need a Custom Enterprise Solution?
          </h2>
          <p className="text-[#B4C1CD] text-xs sm:text-sm max-w-xl mx-auto">
            Our principal solutions engineering team designs custom architectures for unique compliance, high-concurrency, or multi-cloud requirements.
          </p>
          <div className="pt-2">
            <button
              onClick={() => onOpenConsultation('Custom Industry Solution')}
              className="px-8 py-3.5 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs uppercase tracking-wider rounded-xl transition-all shadow-lg inline-flex items-center gap-2"
            >
              <span>Speak with an Architect</span>
              <PhoneCall className="w-4 h-4" />
            </button>
          </div>
        </div>
      </section>
    </div>
  );
};
