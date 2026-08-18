import React from 'react';
import { GlobalPresenceSection } from './GlobalPresenceSection';
import { 
  Users, 
  Award, 
  Globe, 
  Target, 
  ShieldCheck, 
  Zap, 
  ChevronRight, 
  CheckCircle2, 
  Sparkles, 
  ArrowRight,
  Building2,
  TrendingUp,
  Cpu,
  Lock
} from '@/site/icons';

interface AboutPageProps {
  onOpenConsultation: (topic?: string) => void;
  onLinkClick: (href: string, label: string) => void;
}

export const AboutPage: React.FC<AboutPageProps> = ({ onOpenConsultation, onLinkClick }) => {
  const stats = [
    { label: 'Years of Engineering Excellence', value: '10+' },
    { label: 'Enterprise Projects Delivered', value: '250+' },
    { label: 'Global Tech Experts', value: '150+' },
    { label: 'Client Satisfaction Rate', value: '99.4%' },
  ];

  const coreValues = [
    {
      title: 'Engineering Rigor',
      description: 'We do not build minimum viable code; we architect resilient, sub-second enterprise platforms using zero-trust security and clean design patterns.',
      icon: Cpu,
    },
    {
      title: 'Radical Transparency',
      description: 'Zero hidden fees, 100% direct source code ownership, and real-time visibility into Jira backlogs, sprint velocity, and CI/CD pipelines.',
      icon: ShieldCheck,
    },
    {
      title: 'Continuous Innovation',
      description: 'Pioneering production AI systems, autonomous Agentic workflows, and cloud-native Kubernetes architectures that keep our clients ahead.',
      icon: Sparkles,
    },
    {
      title: 'Global Delivery & Speed',
      description: 'Cross-functional engineering pods operating across US, MENA, Europe, and Asia with guaranteed 48-hour onboarding capabilities.',
      icon: Globe,
    },
  ];

  const milestones = [
    { year: '2015', title: 'Company Founded', desc: 'Established as an enterprise software development boutique specializing in custom web and cloud applications.' },
    { year: '2018', title: 'Global Scale & Cloud Focus', desc: 'Expanded delivery centers across 3 continents and launched dedicated AWS, Azure & GCP DevOps practices.' },
    { year: '2021', title: 'Enterprise Digital Transformation', desc: 'Crossed 200+ completed enterprise software products across Healthcare, Fintech, and SaaS sectors.' },
    { year: '2024+', title: 'AI & Agentic Engineering', desc: 'Pioneered custom RAG vector search, LLM fine-tuning, and autonomous multi-agent software solutions.' },
  ];

  const leadership = [
    {
      name: 'Alexandre Mercer',
      role: 'Chief Executive Officer',
      bio: '15+ years leading enterprise digital transformation and scaling technology teams across Fortune 500 companies.',
      tag: 'Executive Leadership',
    },
    {
      name: 'Elena Rostova',
      role: 'Chief Technology Officer',
      bio: 'Former Cloud Systems Architect specializing in microservices, distributed AI vector databases, and zero-trust security.',
      tag: 'Engineering Lead',
    },
    {
      name: 'Marcus Vance',
      role: 'VP of AI & Agentic Solutions',
      bio: 'Pioneer in LLM fine-tuning, Autonomous Multi-Agent frameworks, and enterprise Machine Learning Ops.',
      tag: 'AI Strategy',
    },
  ];

  return (
    <div className="bg-[#FEFEFE] text-[#0F2334] overflow-hidden">
      {/* 1. Hero Section */}
      <section className="relative pt-32 pb-24 bg-gradient-to-b from-[#0F2334] via-[#153758] to-[#264868] text-white overflow-hidden">
        <div className="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-[#C1A972]/10 via-transparent to-transparent pointer-events-none" />
        
        <div className="max-w-7xl mx-auto px-6 relative z-10">
          <div className="max-w-3xl space-y-6">
            <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 text-[#C1A972] text-xs font-bold uppercase tracking-wider backdrop-blur-md">
              <Building2 className="w-4 h-4 text-[#C1A972]" />
              <span>ABOUT OCTAVIA TECH SOLUTIONS</span>
            </div>

            <h1 className="text-4xl sm:text-6xl font-black tracking-tight leading-[1.1]">
              Architecting the Future of <span className="text-transparent bg-clip-text bg-gradient-to-r from-white via-white to-[#C1A972]">Enterprise Software & AI</span>
            </h1>

            <p className="text-lg sm:text-xl text-white/80 leading-relaxed font-normal max-w-2xl">
              We are a global team of senior software engineers, AI architects, and cloud specialists building mission-critical digital products for high-growth enterprises worldwide.
            </p>

            <div className="flex flex-wrap items-center gap-4 pt-4">
              <button
                onClick={() => onOpenConsultation('About Us Inquiry')}
                className="px-7 py-4 rounded-xl bg-[#C1A972] text-[#0F2334] font-bold hover:bg-white transition-all shadow-xl hover:shadow-2xl hover:scale-[1.02] flex items-center gap-2 text-sm"
              >
                <span>Partner With Us</span>
                <ArrowRight className="w-4 h-4" />
              </button>
              
              <button
                onClick={() => {
                  const el = document.getElementById('global');
                  el?.scrollIntoView({ behavior: 'smooth' });
                }}
                className="px-7 py-4 rounded-xl bg-white/10 text-white font-semibold hover:bg-white/20 transition-all border border-white/15 text-sm backdrop-blur-md"
              >
                Explore Global Hubs
              </button>
            </div>
          </div>
        </div>
      </section>

      {/* 2. Stats Bar */}
      <section className="relative z-20 -mt-10 max-w-7xl mx-auto px-6">
        <div className="bg-white rounded-2xl shadow-xl border border-[#DDE3E9] p-8 grid grid-cols-2 md:grid-cols-4 gap-8">
          {stats.map((stat, idx) => (
            <div key={idx} className="space-y-1">
              <div className="text-3xl sm:text-4xl font-black text-[#153758] tracking-tight">{stat.value}</div>
              <div className="text-xs sm:text-sm font-semibold text-[#52667A]">{stat.label}</div>
            </div>
          ))}
        </div>
      </section>

      {/* 3. Our Mission & Vision */}
      <section className="py-24 max-w-7xl mx-auto px-6">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          <div className="space-y-6">
            <span className="text-xs font-bold uppercase tracking-widest text-[#153758] bg-[#153758]/5 px-3 py-1 rounded-md">
              OUR MISSION & PURPOSE
            </span>
            
            <h2 className="text-3xl sm:text-5xl font-black tracking-tight text-[#0F2334]">
              Empowering Enterprises with High-Performance Tech
            </h2>

            <p className="text-[#52667A] text-lg leading-relaxed">
              Founded on the belief that complex software should be engineered with extreme precision, Octavia Tech Solutions bridges the gap between ambitious business vision and scalable technical reality.
            </p>

            <p className="text-[#52667A] text-base leading-relaxed">
              We specialize in custom web applications, cloud-native DevOps architectures, AI & Agentic systems, and dedicated engineering pods. We don't just write code — we build digital infrastructure that drives measurable revenue and efficiency.
            </p>

            <div className="space-y-3 pt-2">
              {[
                '100% Source Code & Intellectual Property Ownership',
                'SOC2 Type II & HIPAA Security Compliant Engineering',
                'Sub-300ms Performance & 99.99% Availability SLAs',
                'Direct Access to Senior Software & AI Architects',
              ].map((item, idx) => (
                <div key={idx} className="flex items-center gap-3">
                  <CheckCircle2 className="w-5 h-5 text-[#C1A972] shrink-0" />
                  <span className="text-sm font-bold text-[#0F2334]">{item}</span>
                </div>
              ))}
            </div>
          </div>

          <div className="relative">
            <div className="p-8 sm:p-12 rounded-3xl bg-gradient-to-br from-[#0F2334] to-[#153758] text-white space-y-8 shadow-2xl relative overflow-hidden">
              <div className="absolute top-0 right-0 w-64 h-64 bg-[#C1A972]/10 rounded-full blur-3xl pointer-events-none" />
              
              <div className="space-y-4">
                <span className="text-xs font-bold text-[#C1A972] uppercase tracking-widest">WHY CLIENTS CHOOSE US</span>
                <h3 className="text-2xl sm:text-3xl font-extrabold text-white">
                  Built for Speed, Security, and Scalability
                </h3>
              </div>

              <div className="space-y-6">
                <div className="flex gap-4">
                  <div className="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center text-[#C1A972] shrink-0 font-bold">
                    01
                  </div>
                  <div>
                    <h4 className="font-bold text-white text-base">Top 1% Senior Engineers</h4>
                    <p className="text-xs text-white/70 mt-1">Every candidate passes a 5-stage technical screening evaluating algorithms, system design, and security.</p>
                  </div>
                </div>

                <div className="flex gap-4">
                  <div className="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center text-[#C1A972] shrink-0 font-bold">
                    02
                  </div>
                  <div>
                    <h4 className="font-bold text-white text-base">48-Hour Talent Onboarding</h4>
                    <p className="text-xs text-white/70 mt-1">Rapidly augment your engineering capacity with dedicated pods matched to your exact tech stack.</p>
                  </div>
                </div>

                <div className="flex gap-4">
                  <div className="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center text-[#C1A972] shrink-0 font-bold">
                    03
                  </div>
                  <div>
                    <h4 className="font-bold text-white text-base">Zero-Data Retention AI</h4>
                    <p className="text-xs text-white/70 mt-1">Enterprise LLMs and RAG vector search deployed safely inside your private cloud perimeter.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* 4. Core Values Section */}
      <section className="py-24 bg-[#F8FAFC] border-y border-[#E2E8F0]">
        <div className="max-w-7xl mx-auto px-6">
          <div className="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span className="text-xs font-bold uppercase tracking-widest text-[#153758]">
              OUR GUIDING PRINCIPLES
            </span>
            <h2 className="text-3xl sm:text-5xl font-black text-[#0F2334] tracking-tight">
              The Values That Drive Our Engineering
            </h2>
            <p className="text-[#52667A] text-base sm:text-lg">
              We operate as an extended technology partner, committed to absolute quality and transparent delivery.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {coreValues.map((val, idx) => {
              const IconComp = val.icon;
              return (
                <div
                  key={idx}
                  className="p-8 rounded-2xl bg-white border border-[#E2E8F0] shadow-sm hover:shadow-xl hover:border-[#153758]/40 transition-all duration-300 space-y-4 group"
                >
                  <div className="w-12 h-12 rounded-xl bg-[#153758]/5 text-[#153758] flex items-center justify-center group-hover:bg-[#153758] group-hover:text-white transition-all">
                    <IconComp className="w-6 h-6" />
                  </div>
                  <h3 className="text-xl font-bold text-[#0F2334]">{val.title}</h3>
                  <p className="text-xs sm:text-sm text-[#52667A] leading-relaxed">{val.description}</p>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* 5. Company Journey / Milestones */}
      <section className="py-24 max-w-7xl mx-auto px-6">
        <div className="text-center max-w-3xl mx-auto mb-16 space-y-4">
          <span className="text-xs font-bold uppercase tracking-widest text-[#153758]">
            EVOLUTION & GROWTH
          </span>
          <h2 className="text-3xl sm:text-5xl font-black text-[#0F2334] tracking-tight">
            Our Journey of Innovation
          </h2>
          <p className="text-[#52667A] text-base sm:text-lg">
            A decade of scaling software capabilities, engineering teams, and enterprise solutions.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          {milestones.map((ms, idx) => (
            <div key={idx} className="p-8 rounded-2xl bg-white border border-[#E2E8F0] shadow-md space-y-3 relative">
              <div className="text-2xl font-black text-[#C1A972] font-mono">{ms.year}</div>
              <h3 className="text-lg font-bold text-[#0F2334]">{ms.title}</h3>
              <p className="text-xs text-[#52667A] leading-relaxed">{ms.desc}</p>
            </div>
          ))}
        </div>
      </section>

      {/* 6. Leadership Team */}
      <section className="py-24 bg-[#F8FAFC] border-t border-[#E2E8F0]">
        <div className="max-w-7xl mx-auto px-6">
          <div className="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span className="text-xs font-bold uppercase tracking-widest text-[#153758]">
              EXECUTIVE LEADERSHIP
            </span>
            <h2 className="text-3xl sm:text-5xl font-black text-[#0F2334] tracking-tight">
              Guided by Senior Tech Visionaries
            </h2>
            <p className="text-[#52667A] text-base sm:text-lg">
              Our leadership team combines deep technical expertise with strategic enterprise vision.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {leadership.map((member, idx) => (
              <div key={idx} className="p-8 rounded-2xl bg-white border border-[#E2E8F0] shadow-md space-y-4">
                <span className="text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full bg-[#153758]/10 text-[#153758]">
                  {member.tag}
                </span>
                <h3 className="text-xl font-bold text-[#0F2334]">{member.name}</h3>
                <div className="text-xs font-semibold text-[#C1A972] uppercase tracking-wider">{member.role}</div>
                <p className="text-xs text-[#52667A] leading-relaxed">{member.bio}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* 7. Global Locations */}
      <GlobalPresenceSection />

      {/* 8. Call to Action Banner */}
      <section className="py-20 bg-gradient-to-r from-[#153758] via-[#264868] to-[#153758] text-white">
        <div className="max-w-5xl mx-auto px-6 text-center space-y-8">
          <h2 className="text-3xl sm:text-5xl font-black tracking-tight text-white">
            Ready to Build Your Next Digital Innovation?
          </h2>
          <p className="text-[#B4C1CD] text-lg max-w-2xl mx-auto">
            Schedule a free consultation with our senior solutions architects to discuss your custom software, AI, or cloud engineering roadmap.
          </p>
          <button
            onClick={() => onOpenConsultation('About Us Banner CTA')}
            className="px-8 py-4 rounded-xl bg-[#C1A972] text-[#0F2334] font-bold hover:bg-white transition-all shadow-xl hover:shadow-2xl hover:scale-105 inline-flex items-center gap-2 text-sm"
          >
            <span>Talk to an Expert Engineer →</span>
          </button>
        </div>
      </section>
    </div>
  );
};
