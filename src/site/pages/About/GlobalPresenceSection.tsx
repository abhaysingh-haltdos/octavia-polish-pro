import React from 'react';
import { MapPin, Globe } from '@/site/icons';

export const GlobalPresenceSection: React.FC = () => {
  const offices = [
    {
      country: 'United States',
      tag: 'HQ',
      title: 'Headquarters & Innovation Hub',
      address: '6100 Channingway Blvd, Columbus, OH 43232, USA',
    },
    {
      country: 'West Africa',
      tag: 'Innovation Center',
      title: 'West Africa Innovation Center',
      address: 'Sacré cœur 1, suite 8410, Dakar, Senegal, West Africa - 27013',
    },
    {
      country: 'Dubai, UAE',
      tag: 'MENA Hub',
      title: 'Middle East & North Africa Hub',
      address: 'Dubai Internet City, Building 12, Dubai, United Arab Emirates',
    },
    {
      country: 'India',
      tag: 'R&D Center',
      title: 'Engineering & Development Center',
      address: 'UNIT No - 103 1st Floor, TOWER-C, Noida One, Sector 62, Noida, UP 201309, India',
    },
  ];

  return (
    <section className="py-24 bg-[#0F2334] text-white border-t border-[#153758]/30" id="global">
      <div className="max-w-7xl mx-auto px-6">
        <div className="text-center max-w-3xl mx-auto mb-16 space-y-4">
          <span className="text-xs font-bold uppercase tracking-widest text-[#B4C1CD]">
            Worldwide Reach
          </span>
          <h2 className="text-3xl sm:text-5xl font-black text-white tracking-tight">
            Our Global Presence
          </h2>
          <p className="text-[#B4C1CD] text-base sm:text-lg">
            Delivering technology solutions across 4 countries and 3 continents — with local expertise and global scale.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          {offices.map((off, idx) => (
            <div
              key={idx}
              className="p-8 rounded-3xl bg-white/5 border border-white/10 hover:border-[#264868]/80 hover:bg-white/10 transition-all duration-300 group flex flex-col justify-between"
            >
              <div>
                <div className="flex items-center justify-between mb-6">
                  <div className="w-10 h-10 rounded-xl bg-[#264868]/20 text-[#B4C1CD] flex items-center justify-center font-bold group-hover:bg-[#264868] group-hover:text-white transition-all">
                    <MapPin className="w-5 h-5" />
                  </div>
                  <span className="text-[10px] font-extrabold uppercase px-2.5 py-1 rounded-full bg-[#153758]/50 text-[#D9C48F] border border-[#264868]/40">
                    {off.tag}
                  </span>
                </div>

                <h3 className="text-2xl font-bold text-white mb-1 group-hover:text-[#D9C48F] transition-colors">
                  {off.country}
                </h3>
                <h4 className="text-xs font-bold text-[#B4C1CD] mb-4">{off.title}</h4>
                <p className="text-xs text-[#B4C1CD] leading-relaxed font-mono">
                  {off.address}
                </p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};
