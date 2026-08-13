import React from 'react';
import { Stethoscope, Landmark, ShoppingBag, Factory, ShieldCheck, Radio, ArrowUpRight } from '@/site/icons';
import { CASE_STUDIES } from '../../data/caseStudiesData';

export const CaseStudiesSection: React.FC<{
  onOpenConsultation: (topic: string) => void;
  onLinkClick?: (href: string, label: string) => void;
}> = ({ onOpenConsultation, onLinkClick }) => {
  const caseStudyMap = [
    {
      title: 'AI-Powered Healthcare Diagnostic Platform',
      category: 'Healthcare & Life Sciences',
      icon: Stethoscope,
      slug: 'ai-powered-healthcare-diagnostic-platform',
      summary: 'AI diagnostic assistant with NLP symptom analysis, urgency-based prioritization, auto-scheduling — serving 50+ hospital networks on HIPAA-compliant infrastructure.',
      metrics: [
        { label: 'Diagnostic Time', value: '-40%' },
        { label: 'Hospitals Served', value: '50+' },
        { label: 'Patient Uptime', value: '99.99%' },
      ],
      featured: true,
    },
    {
      title: 'Automated QuickBooks Financial Reconciliation',
      category: 'FinTech & Banking',
      icon: Landmark,
      slug: 'fixing-reconciliation-accuracy-with-quickbooks-integration',
      summary: 'Multi-entity QuickBooks API integration automating financial ledger reconciliation from 14 days down to 45 minutes.',
      metrics: [
        { label: 'Reconciliation', value: '99.99%' },
        { label: 'Audit Savings', value: '$2.4M' },
      ],
      featured: false,
    },
    {
      title: 'Digital Core Banking Modernization',
      category: 'FinTech & Banking',
      icon: Landmark,
      slug: 'digital-banking-core-modernization-and-biometrics',
      summary: 'Full digital banking core overhaul with biometric fraud shield, processing $12B+ annual transactions.',
      metrics: [
        { label: 'Annual Volume', value: '$12B+' },
        { label: 'App Rating', value: '4.8★' },
      ],
      featured: false,
    },
    {
      title: 'Headless Global E-Commerce Architecture',
      category: 'Retail & E-Commerce',
      icon: ShoppingBag,
      slug: 'headless-ecommerce-and-ai-recommendation-engine',
      summary: 'Headless commerce architecture handling 500K+ concurrent users with real-time AI recommendation engines.',
      metrics: [
        { label: 'Revenue Growth', value: '3.2x' },
        { label: 'Peak Concurrency', value: '500K+' },
      ],
      featured: false,
    },
    {
      title: 'Smart Factory IoT & Predictive Maintenance',
      category: 'Manufacturing & IoT',
      icon: Factory,
      slug: 'smart-factory-iot-predictive-maintenance',
      summary: '5,000+ IoT sensors connected with machine learning models predicting hardware failures 48 hours in advance.',
      metrics: [
        { label: 'Predictive Accuracy', value: '94%' },
        { label: 'Downtime Avoided', value: '1,200 hrs' },
      ],
      featured: false,
    },
    {
      title: 'GenAI Telecom CX Platform',
      category: 'Telecom & Media',
      icon: Radio,
      slug: 'omnichannel-telecom-cx-genai-automation',
      summary: 'Omnichannel CX platform with GenAI self-service agents resolving 60% of routine subscriber support tickets automatically.',
      metrics: [
        { label: 'Support Cost', value: '-45%' },
        { label: 'Resolution Rate', value: '88%' },
      ],
      featured: false,
    },
  ];

  return (
    <section className="py-24 bg-[#153758] text-white border-t border-[#153758]" id="case-studies">
      <div className="max-w-7xl mx-auto px-6">
        <div className="text-center max-w-3xl mx-auto mb-16 space-y-4">
          <span className="text-xs font-bold uppercase tracking-widest text-[#D9C48F]">
            Enterprise Client Impact
          </span>
          <h2 className="text-3xl sm:text-5xl font-black text-white tracking-tight">
            Featured Case Studies & ROI
          </h2>
          <p className="text-[#B4C1CD] text-base sm:text-lg">
            Real engineering results for global enterprises. See how Octavia Tech Solutions transforms complex operations across banking, healthcare, retail, and manufacturing.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {caseStudyMap.map((cs, idx) => {
            const Icon = cs.icon;
            return (
              <div
                key={idx}
                className={`rounded-3xl p-8 border flex flex-col justify-between transition-all duration-300 group ${
                  cs.featured
                    ? 'bg-gradient-to-br from-[#264868] to-[#153758] border-[#C1A972] shadow-xl shadow-black/30 md:col-span-2 lg:col-span-1'
                    : 'bg-white/5 border-white/10 hover:border-[#C1A972]/60 hover:bg-white/10'
                }`}
              >
                <div>
                  <div className="flex items-center justify-between mb-6">
                    <div className="w-10 h-10 rounded-xl bg-[#C1A972]/20 text-[#D9C48F] flex items-center justify-center font-bold border border-[#C1A972]/30">
                      <Icon className="w-5 h-5" />
                    </div>
                    <span className="text-[11px] font-bold text-[#D9C48F] uppercase bg-[#153758] px-3 py-1 rounded-full border border-[#C1A972]/30">
                      {cs.category}
                    </span>
                  </div>

                  <h3
                    onClick={() => onLinkClick?.(`/case-studies/${cs.slug}`, cs.title)}
                    className="text-2xl font-bold text-white mb-3 group-hover:text-[#D9C48F] transition-colors cursor-pointer"
                  >
                    {cs.title}
                  </h3>
                  <p className="text-sm text-[#B4C1CD] leading-relaxed mb-8">
                    {cs.summary}
                  </p>

                  {/* Metrics Row */}
                  <div className="grid grid-cols-2 gap-4 mb-8 pt-4 border-t border-white/10">
                    {cs.metrics.map((m, i) => (
                      <div key={i}>
                        <div className="text-2xl font-black text-[#D9C48F]">{m.value}</div>
                        <div className="text-[11px] font-semibold text-[#B4C1CD]">{m.label}</div>
                      </div>
                    ))}
                  </div>
                </div>

                <button
                  onClick={() => onLinkClick?.(`/case-studies/${cs.slug}`, cs.title)}
                  className="w-full py-3 px-4 rounded-xl font-extrabold text-xs uppercase tracking-wider bg-white/10 text-white hover:bg-[#C1A972] hover:text-[#153758] transition-all flex items-center justify-center gap-2"
                >
                  <span>Read Full Case Study</span>
                  <ArrowUpRight className="w-4 h-4 text-[#D9C48F] group-hover:text-[#153758]" />
                </button>
              </div>
            );
          })}
        </div>

        <div className="mt-12 text-center">
          <button
            onClick={() => onLinkClick?.('/case-studies', 'All Case Studies')}
            className="px-8 py-3.5 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs sm:text-sm rounded-xl transition-all shadow-lg inline-flex items-center gap-2"
          >
            <span>View All Enterprise Case Studies</span>
            <ArrowUpRight className="w-4 h-4" />
          </button>
        </div>
      </div>
    </section>
  );
};
