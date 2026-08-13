import React from 'react';
import { ArrowUpRight, BookOpen, Calendar, Clock } from '@/site/icons';

export const InsightsSection: React.FC<{
  onOpenConsultation: (topic: string) => void;
}> = ({ onOpenConsultation }) => {
  const articles = [
    {
      title: 'How Generative AI Is Reshaping Enterprise Software Development',
      excerpt:
        'Explore how leading enterprises are leveraging LLMs, code generation, and AI-assisted workflows to accelerate delivery cycles by 300%.',
      category: 'Artificial Intelligence',
      readTime: '5 min read',
      date: 'Jan 28, 2026',
    },
    {
      title: 'Zero Trust Architecture: A Complete Implementation Guide for 2026',
      excerpt:
        'A step-by-step framework for implementing zero-trust security across your organization, from network segmentation to continuous identity verification.',
      category: 'Cyber Security',
      readTime: '8 min read',
      date: 'Jan 20, 2026',
    },
    {
      title: 'Multi-Cloud Strategy: Avoiding Vendor Lock-In While Maximizing ROI',
      excerpt:
        'Our architects share battle-tested strategies for building resilient multi-cloud architectures that optimize cost without sacrificing performance.',
      category: 'Cloud Infrastructure',
      readTime: '6 min read',
      date: 'Jan 12, 2026',
    },
  ];

  return (
    <section className="py-24 bg-white text-[#153758]" id="insights">
      <div className="max-w-7xl mx-auto px-6">
        <div className="text-center max-w-3xl mx-auto mb-16 space-y-4">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#EDF0F3] text-[#264868] text-xs font-bold uppercase tracking-wider">
            <BookOpen className="w-4 h-4" />
            <span>Thought Leadership</span>
          </div>
          <h2 className="text-3xl sm:text-5xl font-black text-[#153758] tracking-tight">
            Latest Insights
          </h2>
          <p className="text-[#5C6B7A] text-base sm:text-lg">
            Actionable perspective and architectural blueprints from our senior engineering and AI research experts.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {articles.map((art, idx) => (
            <div
              key={idx}
              className="p-8 rounded-3xl bg-[#F3F5F7] border border-[#DDE3E9]/80 hover:border-[#264868]/50 hover:shadow-xl hover:shadow-[#264868]/5 transition-all duration-300 group flex flex-col justify-between"
            >
              <div>
                <div className="flex items-center justify-between gap-2 text-xs font-bold text-[#5C6B7A] mb-4">
                  <span className="px-3 py-1 rounded-full bg-[#EDF0F3] text-[#264868] font-bold">
                    {art.category}
                  </span>
                  <div className="flex items-center gap-2">
                    <Clock className="w-3.5 h-3.5" />
                    <span>{art.readTime}</span>
                  </div>
                </div>

                <h3 className="text-xl font-bold text-[#153758] mb-3 group-hover:text-[#264868] transition-colors leading-snug">
                  {art.title}
                </h3>
                <p className="text-sm text-[#5C6B7A] leading-relaxed mb-6">
                  {art.excerpt}
                </p>
              </div>

              <div className="pt-4 border-t border-[#DDE3E9]/60 flex items-center justify-between text-xs font-bold">
                <div className="flex items-center gap-1.5 text-[#5C6B7A]">
                  <Calendar className="w-3.5 h-3.5" />
                  <span>{art.date}</span>
                </div>
                <button
                  onClick={() => onOpenConsultation(`Article: ${art.title}`)}
                  className="text-[#264868] hover:text-[#153758] flex items-center gap-1 group-hover:translate-x-1 transition-transform"
                >
                  <span>Read Article</span>
                  <ArrowUpRight className="w-4 h-4" />
                </button>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};
