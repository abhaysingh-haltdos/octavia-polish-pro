import React from 'react';
import { Quote, Star } from '@/site/icons';

export const TestimonialsSection: React.FC = () => {
  const testimonials = [
    {
      author: 'James Chen',
      role: 'CTO, GlobalTech Corp',
      avatar: 'JC',
      avatarBg: 'bg-gradient-to-br from-[#264868] to-[#264868]',
      quote:
        'Reduced cloud infrastructure costs by 42% while improving uptime to 99.99%. Octavia is our secret weapon for engineering velocity.',
      results: [
        { value: '42%', label: 'Cost Reduction' },
        { value: '99.99%', label: 'Uptime SLA' },
      ],
    },
    {
      author: 'Sarah Palmer',
      role: 'CISO, FinSecure Bank',
      avatar: 'SP',
      avatarBg: 'bg-gradient-to-br from-[#153758] to-[#264868]',
      quote:
        'Zero-trust architecture gave us complete peace of mind. Their security team is genuinely world-class — we sleep better at night.',
      results: [
        { value: 'Zero', label: 'Breaches' },
        { value: '24/7', label: 'SOC Coverage' },
      ],
    },
    {
      author: 'Ahmed Rashid',
      role: 'Founder & CEO, QuickServe',
      avatar: 'AR',
      avatarBg: 'bg-gradient-to-br from-[#264868] to-[#C1A972]',
      quote:
        'From MVP to 2 million users — Octavia was with us at every step. Their expertise helped us raise our Series B.',
      results: [
        { value: '2M+', label: 'Active Users' },
        { value: '$8M', label: 'Series B Raised' },
      ],
    },
    {
      author: 'Maria Lopez',
      role: 'CMO, RetailMax',
      avatar: 'ML',
      avatarBg: 'bg-gradient-to-br from-[#153758] to-[#264868]',
      quote:
        'Digital marketing doubled our online revenue in 6 months. Their data-driven approach set them apart from every agency we have tried.',
      results: [
        { value: '2x', label: 'Online Revenue' },
        { value: '6mo', label: 'Timeline' },
      ],
    },
    {
      author: 'Robert Kim',
      role: 'VP Engineering, LogiFlow',
      avatar: 'RK',
      avatarBg: 'bg-gradient-to-br from-[#264868] to-[#C1A972]',
      quote:
        'Redesigned infrastructure across 15 offices with zero downtime during migration — unheard of in our industry.',
      results: [
        { value: '15', label: 'Offices Migrated' },
        { value: 'Zero', label: 'Downtime' },
      ],
    },
  ];

  return (
    <section className="py-24 bg-[#0F2334] text-white border-t border-[#153758]/30" id="testimonials">
      <div className="max-w-7xl mx-auto px-6">
        <div className="text-center max-w-3xl mx-auto mb-16 space-y-4">
          <span className="text-xs font-bold uppercase tracking-widest text-[#B4C1CD]">
            Verified Enterprise Results
          </span>
          <h2 className="text-3xl sm:text-5xl font-black text-white tracking-tight">
            What Our Clients Say
          </h2>
          <p className="text-[#B4C1CD] text-base sm:text-lg">
            Trusted by Fortune 500 companies and fast-growing startups. Here&apos;s what leadership teams say about working with us.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {testimonials.map((t, idx) => (
            <div
              key={idx}
              className="p-8 rounded-3xl bg-white/5 border border-white/10 hover:border-[#264868]/80 hover:bg-white/10 transition-all duration-300 flex flex-col justify-between"
            >
              <div>
                {/* Results Row */}
                <div className="flex items-center gap-6 mb-6 pb-4 border-b border-white/10">
                  {t.results.map((r, i) => (
                    <div key={i}>
                      <span className="text-2xl font-extrabold text-[#D9C48F] block">
                        {r.value}
                      </span>
                      <span className="text-[11px] font-semibold text-[#B4C1CD]">
                        {r.label}
                      </span>
                    </div>
                  ))}
                </div>

                {/* Stars */}
                <div className="flex gap-1 mb-4 text-[#D9C48F]">
                  {[...Array(5)].map((_, i) => (
                    <Star key={i} className="w-4 h-4 fill-[#C1A972] text-[#D9C48F]" />
                  ))}
                </div>

                {/* Quote */}
                <p className="text-sm text-[#FEFEFE] italic leading-relaxed mb-8">
                  &ldquo;{t.quote}&rdquo;
                </p>
              </div>

              {/* Author */}
              <div className="flex items-center gap-3 pt-4 border-t border-white/10">
                <div className={`w-10 h-10 rounded-full ${t.avatarBg} text-white font-bold flex items-center justify-center text-sm shadow-md`}>
                  {t.avatar}
                </div>
                <div>
                  <h4 className="font-bold text-sm text-white">{t.author}</h4>
                  <span className="text-xs text-[#B4C1CD]">{t.role}</span>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};
