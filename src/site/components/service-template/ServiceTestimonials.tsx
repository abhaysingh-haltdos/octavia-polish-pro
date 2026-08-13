import React from 'react';
import { ServiceTestimonialsData } from '../../types/service';
import { Star, MessageSquare } from '@/site/icons';

interface ServiceTestimonialsProps {
  data: ServiceTestimonialsData;
}

export const ServiceTestimonials: React.FC<ServiceTestimonialsProps> = ({ data }) => {
  if (!data || !data.testimonials || data.testimonials.length === 0) return null;

  return (
    <section className="py-20 md:py-24 bg-[#FEFEFE] text-[#153758] border-b border-[#DDE3E9] relative">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto space-y-4 mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#264868]/10 border border-[#264868]/20">
            <MessageSquare className="w-3.5 h-3.5 text-[#264868]" />
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

        {/* Enterprise Testimonials Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {data.testimonials.map((item, idx) => (
            <div
              key={idx}
              className="p-8 rounded-[20px] bg-white border border-[#DDE3E9] hover:border-[#264868] transition-all duration-300 shadow-[0px_4px_20px_rgba(24,43,58,0.04)] hover:shadow-[0px_10px_30px_rgba(32,70,105,0.08)] flex flex-col justify-between group"
            >
              <div>
                {/* 5-Star Rating */}
                <div className="flex items-center gap-1 mb-4">
                  {[...Array(item.rating || 5)].map((_, sIdx) => (
                    <Star key={sIdx} className="w-4 h-4 fill-[#C1A972] text-[#C1A972]" />
                  ))}
                </div>

                <p className="text-sm text-[#153758] italic leading-relaxed mb-6 font-medium">
                  "{item.review}"
                </p>
              </div>

              {/* Author Profile */}
              <div className="pt-4 border-t border-[#DDE3E9] flex items-center gap-3">
                <img
                  src={item.avatar}
                  alt={item.name}
                  className="w-11 h-11 rounded-full object-cover border border-[#DDE3E9]"
                  loading="lazy"
                />
                <div>
                  <h4 className="text-sm font-bold text-[#153758]">{item.name}</h4>
                  <p className="text-xs text-[#4A5A6B]">
                    {item.role} • <span className="font-semibold text-[#264868]">{item.company}</span>
                  </p>
                </div>
              </div>
            </div>
          ))}
        </div>

      </div>
    </section>
  );
};
