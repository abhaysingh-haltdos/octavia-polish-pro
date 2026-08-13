import React from 'react';
import { ServiceComparisonData } from '../../types/service';
import { ShieldCheck, Check, X, Sparkles } from '@/site/icons';

interface ServiceComparisonProps {
  data: ServiceComparisonData;
}

export const ServiceComparison: React.FC<ServiceComparisonProps> = ({ data }) => {
  if (!data || !data.criteria || data.criteria.length === 0) return null;

  return (
    <section className="py-20 md:py-24 bg-white text-[#153758] border-b border-[#DDE3E9] relative overflow-hidden">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto space-y-4 mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#264868]/10 border border-[#264868]/20">
            <Sparkles className="w-3.5 h-3.5 text-[#264868]" />
            <span className="text-xs font-semibold tracking-wide text-[#264868] uppercase">
              {data.badge}
            </span>
          </div>
          <h2 className="text-3xl sm:text-4xl font-extrabold text-[#153758] tracking-tight leading-tight">
            {data.heading}
          </h2>
          <p className="text-base sm:text-lg text-[#153758] max-w-2xl mx-auto">
            {data.subheading}
          </p>
        </div>

        {/* Comparison Matrix Table */}
        <div className="overflow-x-auto rounded-[20px] border border-[#DDE3E9] shadow-[0px_4px_20px_rgba(24,43,58,0.06)] bg-white">
          <table className="w-full text-left border-collapse min-w-[700px]">
            <thead>
              <tr className="bg-[#153758] text-white border-b border-[#264868]">
                <th className="py-5 px-6 font-bold text-sm">Evaluation Dimension</th>
                <th className="py-5 px-6 font-bold text-sm text-[#C1A972] bg-[#264868]/60 border-x border-[#264868]">
                  <div className="flex items-center gap-2">
                    <ShieldCheck className="w-4 h-4 text-[#C1A972]" />
                    <span>Octavia Tech Solutions</span>
                  </div>
                </th>
                <th className="py-5 px-6 font-semibold text-sm text-[#93A3B2]">Traditional Agency</th>
                <th className="py-5 px-6 font-semibold text-sm text-[#93A3B2]">Freelancer Marketplace</th>
                <th className="py-5 px-6 font-semibold text-sm text-[#93A3B2]">In-House Hiring</th>
              </tr>
            </thead>
            <tbody className="divide-y divide-[#DDE3E9] text-xs sm:text-sm text-[#153758]">
              {data.criteria.map((item, idx) => (
                <tr key={idx} className={idx % 2 === 0 ? 'bg-[#FEFEFE]' : 'bg-white'}>
                  <td className="py-4 px-6 font-bold text-[#153758]">{item.feature}</td>
                  
                  {/* Octavia Column */}
                  <td className="py-4 px-6 font-bold text-[#264868] bg-[#264868]/5 border-x border-[#264868]/15">
                    <div className="flex items-center gap-2">
                      <Check className="w-4 h-4 text-[#264868] shrink-0" />
                      <span>{item.octavia}</span>
                    </div>
                  </td>

                  <td className="py-4 px-6 text-[#153758]">{item.traditionalAgency}</td>
                  <td className="py-4 px-6 text-[#153758]">{item.freelancers}</td>
                  <td className="py-4 px-6 text-[#153758]">{item.inHouseTeam}</td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>

      </div>
    </section>
  );
};
