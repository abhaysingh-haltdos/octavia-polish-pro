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
} from '@/site/icons';

const INDUSTRIES = [
  { name: 'Healthcare & Life Sciences', icon: Stethoscope, desc: 'HIPAA compliant EHRs, clinical AI, diagnostic tools & patient portals.' },
  { name: 'Banking & Financial Services', icon: Building2, desc: 'Digital banking, payment gateways, fraud detection & core modernization.' },
  { name: 'Insurance & InsurTech', icon: Shield, desc: 'Automated claims processing, actuarial analytics & policy engines.' },
  { name: 'E-Commerce & Retail', icon: ShoppingBag, desc: 'Headless commerce, omni-channel POS & personalized AI recommendations.' },
  { name: 'Education & EdTech', icon: GraduationCap, desc: 'LMS platforms, virtual classrooms, student analytics & school ERP.' },
  { name: 'Real Estate & PropTech', icon: Home, desc: 'Property management, tenant portals, IoT building automation & virtual tours.' },
  { name: 'Logistics & Supply Chain', icon: Truck, desc: 'Fleet tracking, warehouse management, route optimization & cold chain IoT.' },
  { name: 'Manufacturing & Industrial', icon: Factory, desc: 'Smart factory IoT, predictive maintenance, MES & supply chain visibility.' },
  { name: 'Government & Defense', icon: Landmark, desc: 'Citizen services, e-governance, secure communications & defense logistics.' },
  { name: 'Telecom & Networking', icon: Radio, desc: '5G network management, OSS/BSS integration & subscriber self-service.' },
  { name: 'Energy & Utilities', icon: Zap, desc: 'Smart grid monitoring, renewable management & field service automation.' },
  { name: 'Automotive & Mobility', icon: Car, desc: 'Connected vehicle telemetry, EV charging networks & ride-hailing apps.' },
  { name: 'Media & Entertainment', icon: Film, desc: 'OTT streaming platforms, DRM protection, ad tech & digital asset hubs.' },
  { name: 'Travel & Hospitality', icon: Plane, desc: 'Booking engines, hotel PMS, guest mobile keys & loyalty programs.' },
  { name: 'Agriculture & AgriTech', icon: Sprout, desc: 'Precision farming sensors, crop yield AI & supply chain traceability.' },
  { name: 'Human Resources & HRTech', icon: Users, desc: 'ATS recruitment, payroll automation, employee engagement & performance AI.' },
  { name: 'Legal & Compliance', icon: Scale, desc: 'Contract analysis NLP, document automation & e-discovery platforms.' },
  { name: 'Non-Profit & NGO', icon: HeartHandshake, desc: 'Donor management, volunteer portals, impact analytics & grant tracking.' },
  { name: 'Food & Beverage', icon: Utensils, desc: 'Restaurant POS, online ordering, inventory management & kitchen display systems.' },
  { name: 'Sports & Fitness', icon: Dumbbell, desc: 'Wearable integration, gym management software & fan engagement apps.' },
];

export const IndustriesSection: React.FC<{
  onOpenConsultation: (topic: string) => void;
  onLinkClick?: (href: string, label: string) => void;
}> = ({ onOpenConsultation, onLinkClick }) => {
  const [searchTerm, setSearchTerm] = useState('');

  const slugMap: Record<string, string> = {
    'Healthcare & Life Sciences': 'healthcare',
    'Banking & Financial Services': 'fintech',
    'E-Commerce & Retail': 'retail',
    'Manufacturing & Industrial': 'manufacturing',
    'Logistics & Supply Chain': 'logistics',
    'Telecom & Networking': 'wholesale-softswitch-billing',
    'Insurance & InsurTech': 'insurance',
    'Automotive & Mobility': 'automotive',
    'Education & EdTech': 'education',
    'Government & Defense': 'government',
    'Real Estate & PropTech': 'real-estate',
    'Travel & Hospitality': 'travel',
  };

  const filtered = INDUSTRIES.filter((ind) =>
    ind.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
    ind.desc.toLowerCase().includes(searchTerm.toLowerCase())
  );

  return (
    <section className="py-24 bg-[#153758] text-white border-t border-white/10" id="industries">
      <div className="max-w-7xl mx-auto px-6">
        <div className="text-center max-w-3xl mx-auto mb-12 space-y-4">
          <span className="text-xs font-bold uppercase tracking-widest text-[#D9C48F]">
            Domain Expertise
          </span>
          <h2 className="text-3xl sm:text-5xl font-black text-white tracking-tight">
            Industries We Serve
          </h2>
          <p className="text-[#B4C1CD] text-base sm:text-lg">
            Decades of combined experience across industries where technology isn&apos;t optional — it&apos;s the competitive edge. We speak your language before writing a single line of code.
          </p>

          {/* Quick Filter Input */}
          <div className="pt-4 max-w-md mx-auto">
            <input
              type="text"
              placeholder="Search your industry (e.g., Banking, Healthcare, Logistics)..."
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
              className="w-full px-5 py-3 rounded-2xl bg-white/5 border border-white/10 text-sm text-white placeholder-[#93A3B2] focus:outline-none focus:border-[#C1A972] focus:ring-2 focus:ring-[#C1A972]/30 transition-all"
            />
          </div>
        </div>

        {/* Industry Cards Grid */}
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
          {filtered.map((ind, idx) => {
            const Icon = ind.icon;
            return (
              <div
                key={idx}
                onClick={() => {
                  const slug = slugMap[ind.name];
                  if (slug && onLinkClick) {
                    onLinkClick(`/industries/${slug}`, ind.name);
                  } else if (onLinkClick) {
                    onLinkClick('/industries', ind.name);
                  } else {
                    onOpenConsultation(`Industry: ${ind.name}`);
                  }
                }}
                className="p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-[#C1A972]/80 hover:bg-white/10 transition-all duration-300 group cursor-pointer flex flex-col justify-between"
              >
                <div>
                  <div className="w-10 h-10 rounded-xl bg-[#C1A972]/20 text-[#D9C48F] flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-[#264868] group-hover:text-white transition-all">
                    <Icon className="w-5 h-5" />
                  </div>
                  <h3 className="text-lg font-bold text-white mb-2 group-hover:text-[#D9C48F] transition-colors">
                    {ind.name}
                  </h3>
                  <p className="text-xs text-[#B4C1CD] leading-relaxed mb-4">
                    {ind.desc}
                  </p>
                </div>

                <div className="flex items-center gap-1 text-xs font-bold text-[#D9C48F] group-hover:text-white transition-colors">
                  <span>Explore Solutions</span>
                  <ArrowRight className="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" />
                </div>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
};
