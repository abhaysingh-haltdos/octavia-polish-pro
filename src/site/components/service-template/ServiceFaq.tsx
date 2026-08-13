import React, { useState } from 'react';
import { ServiceFaqData } from '../../types/service';
import { ChevronDown, HelpCircle } from '@/site/icons';

interface ServiceFaqProps {
  data: ServiceFaqData;
}

export const ServiceFaq: React.FC<ServiceFaqProps> = ({ data }) => {
  const [openIndex, setOpenIndex] = useState<number | null>(0);

  const toggleAccordion = (idx: number) => {
    setOpenIndex(openIndex === idx ? null : idx);
  };

  if (!data || !data.faqs || data.faqs.length === 0) return null;

  // Schema.org FAQPage structured data
  const faqSchema = {
    '@context': 'https://schema.org',
    '@type': 'FAQPage',
    mainEntity: data.faqs.map((faq) => ({
      '@type': 'Question',
      name: faq.question,
      acceptedAnswer: {
        '@type': 'Answer',
        text: faq.answer,
      },
    })),
  };

  return (
    <section className="py-20 md:py-24 bg-white text-[#153758] border-b border-[#DDE3E9] relative">
      {/* Schema JSON-LD */}
      <script
        type="application/ld+json"
        dangerouslySetInnerHTML={{ __html: JSON.stringify(faqSchema) }}
      />

      <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto space-y-4 mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#264868]/10 border border-[#264868]/20">
            <HelpCircle className="w-3.5 h-3.5 text-[#264868]" />
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

        {/* FAQ Accordion list */}
        <div className="space-y-4">
          {data.faqs.map((faq, idx) => {
            const isOpen = openIndex === idx;
            return (
              <div
                key={idx}
                className="rounded-[20px] bg-[#FEFEFE] border border-[#DDE3E9] overflow-hidden transition-all duration-200"
              >
                <button
                  onClick={() => toggleAccordion(idx)}
                  className="w-full p-6 text-left font-bold text-base sm:text-lg text-[#153758] flex items-center justify-between gap-4 hover:text-[#264868] transition-colors"
                  aria-expanded={isOpen}
                >
                  <span>{faq.question}</span>
                  <div className={`p-1.5 rounded-full bg-[#264868]/10 text-[#264868] transition-transform duration-200 shrink-0 ${isOpen ? 'rotate-180 bg-[#264868] text-white' : ''}`}>
                    <ChevronDown className="w-4 h-4" />
                  </div>
                </button>

                {isOpen && (
                  <div className="px-6 pb-6 pt-0 text-xs sm:text-sm text-[#153758] leading-relaxed border-t border-[#DDE3E9] mt-2 pt-4">
                    <p>{faq.answer}</p>
                  </div>
                )}
              </div>
            );
          })}
        </div>

      </div>
    </section>
  );
};
