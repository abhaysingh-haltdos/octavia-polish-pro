import React, { useState } from 'react';
import {
  Mail,
  Phone,
  MapPin,
  Clock,
  Send,
  CheckCircle2,
  Building2,
  Globe2,
  Sparkles,
  ShieldCheck,
  ArrowRight,
  ChevronDown,
  User,
  Briefcase,
  MessageSquare,
  HelpCircle,
  Lock,
  Copy,
  ExternalLink,
  Check,
  Search,
  Users,
  Award,
  Headphones,
} from '@/site/icons';

interface ContactPageProps {
  onOpenConsultation?: (topic?: string) => void;
  onLinkClick?: (href: string, label: string) => void;
}

export const ContactPage: React.FC<ContactPageProps> = ({
  onOpenConsultation,
  onLinkClick,
}) => {
  // Form State
  const [formData, setFormData] = useState({
    fullName: '',
    workEmail: '',
    company: '',
    country: 'United States',
    topic: 'Sales / New Project Inquiry',
    message: '',
    agreePrivacy: true,
  });

  const [isSubmitting, setIsSubmitting] = useState(false);
  const [isSubmitted, setIsSubmitted] = useState(false);

  // Copy state for email links
  const [copiedEmail, setCopiedEmail] = useState<string | null>(null);

  // Office active tab for map focus
  const [activeOfficeTab, setActiveOfficeTab] = useState<number>(0);

  // Newsletter state
  const [newsletterEmail, setNewsletterEmail] = useState('');
  const [newsletterSuccess, setNewsletterSuccess] = useState(false);

  // FAQ open index
  const [openFaq, setOpenFaq] = useState<number | null>(0);

  const handleInputChange = (
    e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement | HTMLSelectElement>
  ) => {
    const { name, value, type } = e.target;
    if (type === 'checkbox') {
      const checked = (e.target as HTMLInputElement).checked;
      setFormData((prev) => ({ ...prev, [name]: checked }));
    } else {
      setFormData((prev) => ({ ...prev, [name]: value }));
    }
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    setIsSubmitting(true);
    setTimeout(() => {
      setIsSubmitting(false);
      setIsSubmitted(true);
    }, 1200);
  };

  const handleCopyEmail = (email: string) => {
    navigator.clipboard.writeText(email);
    setCopiedEmail(email);
    setTimeout(() => setCopiedEmail(null), 2000);
  };

  const handleNewsletterSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (newsletterEmail) {
      setNewsletterSuccess(true);
      setTimeout(() => {
        setNewsletterEmail('');
        setNewsletterSuccess(false);
      }, 4000);
    }
  };

  const offices = [
    {
      id: 'sf',
      city: 'San Francisco',
      country: 'United States',
      region: 'Americas HQ',
      address: '548 Market Street, Suite 800, San Francisco, CA 94104',
      email: 'sf@octaviatechnologies.com',
      phone: '+1 (650) 454-8668',
      timezone: 'PST (UTC-8)',
      hours: '8:30 AM - 6:00 PM PST',
      coordinates: '37.7897° N, 122.4010° W',
      flag: '🇺🇸',
      mapEmbedUrl: 'https://maps.google.com/maps?q=548+Market+Street+San+Francisco+CA+94104&t=&z=13&ie=UTF8&iwloc=&output=embed',
    },
    {
      id: 'dubai',
      city: 'Dubai',
      country: 'United Arab Emirates',
      region: 'EMEA HQ',
      address: 'Dubai Internet City, Building 3, Suite 402, Dubai, UAE',
      email: 'dubai@octaviatechnologies.com',
      phone: '+971 4 480 0000',
      timezone: 'GST (UTC+4)',
      hours: '9:00 AM - 6:30 PM GST',
      coordinates: '25.0935° N, 55.1557° E',
      flag: '🇦🇪',
      mapEmbedUrl: 'https://maps.google.com/maps?q=Dubai+Internet+City+Building+3&t=&z=13&ie=UTF8&iwloc=&output=embed',
    },
    {
      id: 'noida',
      city: 'Noida (Delhi NCR)',
      country: 'India',
      region: 'APAC Engineering Hub',
      address: 'Noida One Tower, Tower-C, Unit 1017, 10th Floor, Sector 62, Noida 201309',
      email: 'india@octaviatechnologies.com',
      phone: '+91 80 4812 3456',
      timezone: 'IST (UTC+5:30)',
      hours: '9:30 AM - 7:00 PM IST',
      coordinates: '28.6272° N, 77.3725° E',
      flag: '🇮🇳',
      mapEmbedUrl: 'https://maps.google.com/maps?q=Noida+One+Sector+62+Noida&t=&z=13&ie=UTF8&iwloc=&output=embed',
    },
  ];

  const directEmailChannels = [
    {
      title: 'Sales & New Projects',
      email: 'sales@octaviatechnologies.com',
      desc: 'Project proposals, RFPs, scope audits, & timeline estimates.',
      icon: Briefcase,
      color: 'from-[#264868]/20 to-[#264868]/10 border-[#264868]/30 text-[#264868]',
    },
    {
      title: 'Client Support',
      email: 'support@octaviatechnologies.com',
      desc: 'Existing client SLAs, portal help, & ongoing sprint tickets.',
      icon: Headphones,
      color: 'from-[#264868]/20 to-[#264868]/10 border-[#264868]/30 text-[#264868]',
    },
    {
      title: 'Careers & Talent',
      email: 'careers@octaviatechnologies.com',
      desc: 'Engineering applications, leadership roles, & internships.',
      icon: Users,
      color: 'from-[#264868]/20 to-[#264868]/10 border-[#264868]/30 text-[#D9C48F]',
    },
    {
      title: 'Press & Media',
      email: 'press@octaviatechnologies.com',
      desc: 'Media inquiries, analyst relations, & brand asset kits.',
      icon: MessageSquare,
      color: 'from-[#C1A972]/20 to-[#C1A972]/10 border-[#C1A972]/30 text-[#D9C48F]',
    },
    {
      title: 'Investor Relations',
      email: 'investors@octaviatechnologies.com',
      desc: 'Growth capital, strategic ventures, & financial disclosures.',
      icon: Award,
      color: 'from-[#C1A972]/20 to-[#C1A972]/10 border-[#C1A972]/30 text-[#D9C48F]',
    },
  ];

  const faqs = [
    {
      q: 'How quickly will I receive a response after submitting the contact form?',
      a: 'Your message is routed directly to our technical engagement leads without any generic front-desk delay. You will receive an initial response or scheduling link within 1 business day (and typically within 2-4 hours during global operating hours).',
    },
    {
      q: 'Can we sign an NDA prior to sharing proprietary project details or specs?',
      a: 'Absolutely. We enforce strict enterprise confidentiality protocols. You can request a mutual NDA prior to our discovery session, or we can execute your standard vendor NDA agreement.',
    },
    {
      q: 'What information should I include in my initial message?',
      a: 'Providing a brief overview of your technical objectives, target timeline, high-level budget range, and current tech stack helps us assign the exact domain lead (e.g., AI/LLM Specialist, Cloud Architect, or Mobile Tech Lead) to your kick-off call.',
    },
    {
      q: 'Do you offer onsite technical workshops or client meetings?',
      a: 'Yes. Our senior solution architects and engineering leads regularly conduct on-site discovery workshops at client locations across North America, Europe, UAE, and APAC.',
    },
    {
      q: 'How do direct phone calls work if we are in a different time zone?',
      a: 'We operate across three major global hubs (Americas, EMEA, and APAC) offering 24/7 coverage. When you call any of our regional office lines, your call is connected directly to an on-duty technical account manager.',
    },
  ];

  return (
    <div className="bg-[#153758] text-[#FEFEFE] min-h-screen pt-24 pb-20 font-sans selection:bg-[#264868] selection:text-white">
      
      {/* Background Lighting Gradients */}
      <div className="fixed inset-0 pointer-events-none overflow-hidden z-0">
        <div className="absolute top-10 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] bg-gradient-to-b from-[#264868]/20 via-[#C1A972]/10 to-transparent blur-[160px] rounded-full" />
        <div className="absolute top-[800px] left-0 w-[500px] h-[500px] bg-[#153758]/10 blur-[140px] rounded-full" />
        <div className="absolute top-[1600px] right-0 w-[500px] h-[500px] bg-[#C1A972]/10 blur-[140px] rounded-full" />
      </div>

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-16">

        {/* 1. HERO HEADER */}
        <div className="text-center max-w-4xl mx-auto space-y-6 pt-4">
          
          {/* Breadcrumb Navigation */}
          <nav className="flex items-center justify-center gap-2 text-xs text-[#B4C1CD] font-medium">
            <button
              onClick={() => onLinkClick?.('/', 'Home')}
              className="hover:text-[#D9C48F] transition-colors"
            >
              Home
            </button>
            <span>/</span>
            <span className="text-[#D9C48F] font-semibold">Contact Us</span>
          </nav>

          {/* Badge */}
          <div className="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#264868]/60 border border-[#C1A972]/40 text-[#D9C48F] text-xs font-bold uppercase tracking-wider shadow-lg shadow-black/20">
            <Sparkles className="w-3.5 h-3.5 text-[#D9C48F]" />
            <span>Direct Engineering Access</span>
          </div>

          {/* Title */}
          <h1 className="text-3xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
            Get in Touch with Our <br className="hidden sm:inline" />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-[#C1A972] via-[#C1A972] to-[#C1A972]">
              Engineering Team
            </span>
          </h1>

          {/* Subtitle */}
          <p className="text-base sm:text-xl text-[#B4C1CD] max-w-3xl mx-auto leading-relaxed font-normal">
            Have a question or want to discuss a project? The right person on our team will pick it up, usually within a business day — routed directly without front-desk delays.
          </p>

          {/* Key Value Badges */}
          <div className="flex flex-wrap items-center justify-center gap-4 sm:gap-8 pt-4 text-xs sm:text-sm font-semibold text-[#B4C1CD]">
            <div className="flex items-center gap-2 bg-white/5 px-4 py-2 rounded-xl border border-white/10 shadow-sm">
              <CheckCircle2 className="w-4 h-4 text-[#264868]" />
              <span>Under 24h Response SLA</span>
            </div>
            <div className="flex items-center gap-2 bg-white/5 px-4 py-2 rounded-xl border border-white/10 shadow-sm">
              <Lock className="w-4 h-4 text-[#D9C48F]" />
              <span>Mutual NDA Protected</span>
            </div>
            <div className="flex items-center gap-2 bg-white/5 px-4 py-2 rounded-xl border border-white/10 shadow-sm">
              <Users className="w-4 h-4 text-[#264868]" />
              <span>Direct Lead Engineer Route</span>
            </div>
          </div>
        </div>

        {/* 2. MAIN SPLIT SECTION: FORM (LEFT) + DIRECT CHANNELS (RIGHT) */}
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
          
          {/* LEFT: FORM CARD ("Send a message") */}
          <div className="lg:col-span-7 bg-[#0F2334]/90 border border-white/15 rounded-3xl p-6 sm:p-10 shadow-2xl backdrop-blur-xl relative overflow-hidden">
            <div className="absolute top-0 right-0 w-48 h-48 bg-[#C1A972]/10 blur-3xl rounded-full pointer-events-none" />

            <div className="mb-8 space-y-2">
              <div className="flex items-center justify-between">
                <h2 className="text-2xl sm:text-3xl font-extrabold text-white tracking-tight flex items-center gap-3">
                  <Send className="w-6 h-6 text-[#D9C48F]" />
                  <span>Send a message</span>
                </h2>
                <span className="text-xs font-semibold text-[#D9C48F] bg-[#C1A972]/10 border border-[#C1A972]/30 px-3 py-1 rounded-full">
                  Step 1 of 1
                </span>
              </div>
              <p className="text-xs sm:text-sm text-[#B4C1CD]">
                Fill out the details below and we&apos;ll route your request directly to our senior tech architects.
              </p>
            </div>

            {isSubmitted ? (
              <div className="bg-[#153758]/60 border border-[#264868]/40 rounded-2xl p-8 text-center space-y-4 animate-fadeIn">
                <div className="w-16 h-16 bg-[#264868]/20 text-[#264868] rounded-full flex items-center justify-center mx-auto border border-[#264868]/40 shadow-lg shadow-[#153758]/30">
                  <CheckCircle2 className="w-8 h-8" />
                </div>
                <h3 className="text-2xl font-bold text-white">Message Received!</h3>
                <p className="text-sm text-[#FEFEFE] max-w-md mx-auto leading-relaxed">
                  Thank you <strong className="text-[#264868]">{formData.fullName}</strong>. Your inquiry regarding <strong className="text-[#D9C48F]">{formData.topic}</strong> has been assigned to our lead tech architect. We will reach back to <span className="underline text-[#264868]">{formData.workEmail}</span> within 24 hours.
                </p>
                <button
                  onClick={() => {
                    setIsSubmitted(false);
                    setFormData({
                      fullName: '',
                      workEmail: '',
                      company: '',
                      country: 'United States',
                      topic: 'Sales / New Project Inquiry',
                      message: '',
                      agreePrivacy: true,
                    });
                  }}
                  className="mt-4 px-6 py-2.5 bg-white/10 hover:bg-white/20 text-white font-semibold text-xs rounded-xl border border-white/20 transition-all"
                >
                  Send Another Message
                </button>
              </div>
            ) : (
              <form onSubmit={handleSubmit} className="space-y-6">
                
                {/* Name & Email Row */}
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
                  <div className="space-y-2">
                    <label className="text-xs font-bold text-[#FEFEFE] uppercase tracking-wider flex items-center justify-between">
                      <span>Full Name <span className="text-[#D9C48F]">*</span></span>
                    </label>
                    <div className="relative">
                      <User className="w-4 h-4 text-[#B4C1CD] absolute left-3.5 top-3.5" />
                      <input
                        type="text"
                        name="fullName"
                        required
                        value={formData.fullName}
                        onChange={handleInputChange}
                        placeholder="e.g. Alex Morgan"
                        className="w-full bg-white/5 border border-white/15 focus:border-[#C1A972] focus:bg-white/10 text-white rounded-xl pl-10 pr-4 py-3 text-sm transition-all focus:outline-none placeholder-[#5C6B7A]"
                      />
                    </div>
                  </div>

                  <div className="space-y-2">
                    <label className="text-xs font-bold text-[#FEFEFE] uppercase tracking-wider flex items-center justify-between">
                      <span>Work Email <span className="text-[#D9C48F]">*</span></span>
                    </label>
                    <div className="relative">
                      <Mail className="w-4 h-4 text-[#B4C1CD] absolute left-3.5 top-3.5" />
                      <input
                        type="email"
                        name="workEmail"
                        required
                        value={formData.workEmail}
                        onChange={handleInputChange}
                        placeholder="alex@company.com"
                        className="w-full bg-white/5 border border-white/15 focus:border-[#C1A972] focus:bg-white/10 text-white rounded-xl pl-10 pr-4 py-3 text-sm transition-all focus:outline-none placeholder-[#5C6B7A]"
                      />
                    </div>
                  </div>
                </div>

                {/* Company & Country Row */}
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
                  <div className="space-y-2">
                    <label className="text-xs font-bold text-[#FEFEFE] uppercase tracking-wider">
                      Company / Organization <span className="text-[#D9C48F]">*</span>
                    </label>
                    <div className="relative">
                      <Building2 className="w-4 h-4 text-[#B4C1CD] absolute left-3.5 top-3.5" />
                      <input
                        type="text"
                        name="company"
                        required
                        value={formData.company}
                        onChange={handleInputChange}
                        placeholder="e.g. Acme Corp"
                        className="w-full bg-white/5 border border-white/15 focus:border-[#C1A972] focus:bg-white/10 text-white rounded-xl pl-10 pr-4 py-3 text-sm transition-all focus:outline-none placeholder-[#5C6B7A]"
                      />
                    </div>
                  </div>

                  <div className="space-y-2">
                    <label className="text-xs font-bold text-[#FEFEFE] uppercase tracking-wider">
                      Country / Region
                    </label>
                    <div className="relative">
                      <Globe2 className="w-4 h-4 text-[#B4C1CD] absolute left-3.5 top-3.5 pointer-events-none" />
                      <select
                        name="country"
                        aria-label="Country"
                        value={formData.country}
                        onChange={handleInputChange}
                        className="w-full bg-[#153758] border border-white/15 focus:border-[#C1A972] text-white rounded-xl pl-10 pr-8 py-3 text-sm transition-all focus:outline-none appearance-none cursor-pointer"
                      >
                        <option value="United States">United States</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="India">India</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Canada">Canada</option>
                        <option value="Australia">Australia</option>
                        <option value="Germany">Germany</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Other">Other Region</option>
                      </select>
                      <ChevronDown className="w-4 h-4 text-[#B4C1CD] absolute right-3.5 top-3.5 pointer-events-none" />
                    </div>
                  </div>
                </div>

                {/* Topic Dropdown ("What's this about?") */}
                <div className="space-y-2">
                  <label className="text-xs font-bold text-[#FEFEFE] uppercase tracking-wider flex items-center justify-between">
                    <span>What&apos;s this about? <span className="text-[#D9C48F]">*</span></span>
                  </label>
                  <div className="relative">
                    <select
                      name="topic"
                      aria-label="Topic"
                      required
                      value={formData.topic}
                      onChange={handleInputChange}
                      className="w-full bg-[#153758] border border-white/15 focus:border-[#C1A972] text-white rounded-xl px-4 py-3 text-sm transition-all focus:outline-none appearance-none cursor-pointer font-medium"
                    >
                      <option value="Sales / New Project Inquiry">Sales / Demo / New Project Inquiry</option>
                      <option value="Run a pilot">Run a pilot / Proof of Concept (PoC)</option>
                      <option value="Partnership">Strategic Partnership & Vendor Channel</option>
                      <option value="Careers">Careers & Engineering Talent</option>
                      <option value="Press / Analyst">Press, Media & Analyst Inquiry</option>
                      <option value="Existing customer support">Existing Customer Support & SLA Ticket</option>
                      <option value="Something else">Something else</option>
                    </select>
                    <ChevronDown className="w-4 h-4 text-[#B4C1CD] absolute right-3.5 top-3.5 pointer-events-none" />
                  </div>
                </div>

                {/* Message Textarea */}
                <div className="space-y-2">
                  <label className="text-xs font-bold text-[#FEFEFE] uppercase tracking-wider flex items-center justify-between">
                    <span>Tell us a bit more <span className="text-[#D9C48F]">*</span></span>
                    <span className="text-[10px] text-[#B4C1CD] font-normal">Project scope, tech stack, or objectives</span>
                  </label>
                  <textarea
                    name="message"
                    required
                    rows={4}
                    value={formData.message}
                    onChange={handleInputChange}
                    placeholder="Share your technical goals, target timeline, key requirements, or questions..."
                    className="w-full bg-white/5 border border-white/15 focus:border-[#C1A972] focus:bg-white/10 text-white rounded-xl p-4 text-sm transition-all focus:outline-none placeholder-[#5C6B7A] resize-y"
                  />
                </div>

                {/* Privacy Agreement Checkbox */}
                <div className="flex items-start gap-3 pt-1">
                  <input
                    type="checkbox"
                    id="agreePrivacy"
                    name="agreePrivacy"
                    checked={formData.agreePrivacy}
                    onChange={handleInputChange}
                    required
                    className="mt-1 w-4 h-4 rounded border-white/20 bg-white/10 text-[#D9C48F] focus:ring-[#C1A972] cursor-pointer"
                  />
                  <label htmlFor="agreePrivacy" className="text-xs text-[#B4C1CD] leading-relaxed cursor-pointer">
                    I agree to Octavia&apos;s <button type="button" onClick={() => onLinkClick?.('/privacy-policy', 'Privacy Policy')} className="text-[#D9C48F] hover:underline">Privacy Policy</button> and consent to processing my contact information to handle this inquiry.
                  </label>
                </div>

                {/* Submit Button */}
                <button
                  type="submit"
                  disabled={isSubmitting}
                  className="w-full py-4 px-8 bg-gradient-to-r from-[#264868] via-[#153758] to-[#264868] hover:from-[#153758] hover:to-[#264868] border border-[#C1A972]/50 text-white font-extrabold text-sm sm:text-base rounded-2xl transition-all shadow-xl shadow-black/40 flex items-center justify-center gap-3 group relative overflow-hidden"
                >
                  {isSubmitting ? (
                    <>
                      <div className="w-5 h-5 border-2 border-white/30 border-t-white rounded-full animate-spin" />
                      <span>Routing to Engineering Team...</span>
                    </>
                  ) : (
                    <>
                      <span>Send Message</span>
                      <ArrowRight className="w-5 h-5 text-[#D9C48F] group-hover:translate-x-1.5 transition-transform" />
                    </>
                  )}
                </button>

                <p className="text-center text-[11px] text-[#B4C1CD]">
                  ⚡ Average turnaround: 2-4 hours during business days. Mutual NDA signed upon request.
                </p>

              </form>
            )}
          </div>

          {/* RIGHT: "Skip the form" / DIRECT CONTACT CHANNELS & HOTLINES */}
          <div className="lg:col-span-5 space-y-8">
            
            {/* Direct Email Cards ("Skip the form") */}
            <div className="bg-[#0F2334]/90 border border-white/15 rounded-3xl p-6 sm:p-8 backdrop-blur-xl space-y-6 shadow-xl">
              <div className="border-b border-white/10 pb-4">
                <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#C1A972]/10 text-[#D9C48F] text-[11px] font-bold uppercase tracking-wider border border-[#C1A972]/20 mb-2">
                  <span>Direct Communication</span>
                </div>
                <h3 className="text-2xl font-bold text-white">Skip the form</h3>
                <p className="text-xs text-[#B4C1CD] mt-1">
                  Email the specialized department handling your inquiry directly.
                </p>
              </div>

              {/* Channel Cards */}
              <div className="space-y-3">
                {directEmailChannels.map((ch, idx) => {
                  const Icon = ch.icon;
                  const isCopied = copiedEmail === ch.email;
                  return (
                    <div
                      key={idx}
                      className="p-3.5 rounded-2xl bg-white/5 border border-white/10 hover:border-[#C1A972]/40 transition-all flex items-start justify-between gap-3 group"
                    >
                      <div className="flex items-start gap-3">
                        <div className={`p-2.5 rounded-xl bg-gradient-to-br ${ch.color} border shrink-0 mt-0.5`}>
                          <Icon className="w-4 h-4" />
                        </div>
                        <div>
                          <div className="text-xs font-bold text-white group-hover:text-[#D9C48F] transition-colors">
                            {ch.title}
                          </div>
                          <a
                            href={`mailto:${ch.email}`}
                            className="text-xs font-semibold text-[#D9C48F] hover:underline block my-0.5"
                          >
                            {ch.email}
                          </a>
                          <div className="text-[11px] text-[#B4C1CD] leading-tight">
                            {ch.desc}
                          </div>
                        </div>
                      </div>

                      <button
                        onClick={() => handleCopyEmail(ch.email)}
                        className="p-2 text-[#B4C1CD] hover:text-white hover:bg-white/10 rounded-lg transition-colors shrink-0"
                        title="Copy email address"
                      >
                        {isCopied ? (
                          <Check className="w-3.5 h-3.5 text-[#264868]" />
                        ) : (
                          <Copy className="w-3.5 h-3.5" />
                        )}
                      </button>
                    </div>
                  );
                })}
              </div>
            </div>

            {/* Direct Regional Phone Hotlines */}
            <div className="bg-[#0F2334]/90 border border-white/15 rounded-3xl p-6 sm:p-8 backdrop-blur-xl space-y-4 shadow-xl">
              <h3 className="text-lg font-bold text-white flex items-center gap-2 border-b border-white/10 pb-3">
                <Phone className="w-4 h-4 text-[#D9C48F]" />
                <span>Regional Support Lines</span>
              </h3>

              <div className="space-y-3 text-xs">
                <div className="flex items-center justify-between p-3 rounded-xl bg-white/5 border border-white/10">
                  <div className="flex items-center gap-2.5">
                    <span className="text-lg">🇺🇸</span>
                    <div>
                      <span className="font-bold text-white block">United States (Americas)</span>
                      <span className="text-[10px] text-[#B4C1CD]">PST / EST Hours</span>
                    </div>
                  </div>
                  <a
                    href="tel:+16504548668"
                    className="font-bold text-[#D9C48F] hover:underline"
                  >
                    +1 650-454-8668
                  </a>
                </div>

                <div className="flex items-center justify-between p-3 rounded-xl bg-white/5 border border-white/10">
                  <div className="flex items-center gap-2.5">
                    <span className="text-lg">🇦🇪</span>
                    <div>
                      <span className="font-bold text-white block">Dubai, UAE (EMEA)</span>
                      <span className="text-[10px] text-[#B4C1CD]">GST Hours</span>
                    </div>
                  </div>
                  <a
                    href="tel:+97144800000"
                    className="font-bold text-[#D9C48F] hover:underline"
                  >
                    +971 4 480 0000
                  </a>
                </div>

                <div className="flex items-center justify-between p-3 rounded-xl bg-white/5 border border-white/10">
                  <div className="flex items-center gap-2.5">
                    <span className="text-lg">🇮🇳</span>
                    <div>
                      <span className="font-bold text-white block">India (APAC Engine)</span>
                      <span className="text-[10px] text-[#B4C1CD]">IST Hours</span>
                    </div>
                  </div>
                  <a
                    href="tel:+918048123456"
                    className="font-bold text-[#D9C48F] hover:underline"
                  >
                    +91 80 4812 3456
                  </a>
                </div>
              </div>

              <div className="p-3.5 rounded-2xl bg-[#264868]/20 border border-[#264868]/40 text-[#B4C1CD] text-xs flex items-start gap-2.5">
                <ShieldCheck className="w-4 h-4 text-[#264868] shrink-0 mt-0.5" />
                <span>
                  <strong>No automated phone trees:</strong> You will connect directly with an engineering manager or technical client manager.
                </span>
              </div>
            </div>

          </div>

        </div>

        {/* 3. GLOBAL OFFICES SECTION WITH MAP INTERACTIVE TABS */}
        <div className="pt-8 space-y-10">
          
          <div className="text-center max-w-2xl mx-auto space-y-3">
            <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#264868]/40 border border-[#C1A972]/30 text-[#D9C48F] text-xs font-bold uppercase tracking-wider">
              <Globe2 className="w-3.5 h-3.5" />
              <span>International Hubs</span>
            </div>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
              Our Global Offices
            </h2>
            <p className="text-sm sm:text-base text-[#B4C1CD]">
              Operating across three continents to support global enterprises with 24/7 engineering pipelines.
            </p>
          </div>

          {/* Office Selector Tabs */}
          <div className="flex flex-wrap items-center justify-center gap-3">
            {offices.map((office, idx) => (
              <button
                key={office.id}
                onClick={() => setActiveOfficeTab(idx)}
                className={`px-5 py-2.5 rounded-2xl text-xs font-bold transition-all flex items-center gap-2.5 border ${
                  activeOfficeTab === idx
                    ? 'bg-[#264868] text-white border-[#C1A972] shadow-lg shadow-black/30'
                    : 'bg-white/5 text-[#B4C1CD] hover:bg-white/10 border-white/10'
                }`}
              >
                <span className="text-base">{office.flag}</span>
                <span>{office.city}</span>
                <span className="text-[10px] font-normal text-[#B4C1CD]">({office.region})</span>
              </button>
            ))}
          </div>

          {/* Selected Office Card Grid + Interactive Map Box */}
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 bg-[#0F2334]/90 border border-white/15 rounded-3xl p-6 sm:p-10 shadow-2xl backdrop-blur-xl">
            
            {/* Left Detail Info */}
            <div className="lg:col-span-5 space-y-6">
              <div className="space-y-2 border-b border-white/10 pb-4">
                <div className="flex items-center gap-3">
                  <span className="text-3xl">{offices[activeOfficeTab]!.flag}</span>
                  <div>
                    <h3 className="text-2xl font-bold text-white">
                      {offices[activeOfficeTab]!.city}
                    </h3>
                    <span className="text-xs text-[#D9C48F] font-semibold uppercase tracking-wider">
                      {offices[activeOfficeTab]!.region} • {offices[activeOfficeTab]!.country}
                    </span>
                  </div>
                </div>
              </div>

              <div className="space-y-4 text-xs sm:text-sm">
                
                <div className="flex items-start gap-3">
                  <MapPin className="w-5 h-5 text-[#D9C48F] shrink-0 mt-0.5" />
                  <div>
                    <span className="text-[11px] font-bold text-[#B4C1CD] block uppercase">Physical Address</span>
                    <p className="text-[#FEFEFE] font-medium leading-relaxed">
                      {offices[activeOfficeTab]!.address}
                    </p>
                  </div>
                </div>

                <div className="flex items-start gap-3">
                  <Mail className="w-5 h-5 text-[#D9C48F] shrink-0 mt-0.5" />
                  <div>
                    <span className="text-[11px] font-bold text-[#B4C1CD] block uppercase">Office Email</span>
                    <a
                      href={`mailto:${offices[activeOfficeTab]!.email}`}
                      className="text-[#D9C48F] hover:underline font-semibold"
                    >
                      {offices[activeOfficeTab]!.email}
                    </a>
                  </div>
                </div>

                <div className="flex items-start gap-3">
                  <Phone className="w-5 h-5 text-[#D9C48F] shrink-0 mt-0.5" />
                  <div>
                    <span className="text-[11px] font-bold text-[#B4C1CD] block uppercase">Direct Hotline</span>
                    <a
                      href={`tel:${offices[activeOfficeTab]!.phone.replace(/[^0-9+]/g, '')}`}
                      className="text-[#FEFEFE] hover:text-[#D9C48F] font-semibold"
                    >
                      {offices[activeOfficeTab]!.phone}
                    </a>
                  </div>
                </div>

                <div className="grid grid-cols-2 gap-3 pt-2">
                  <div className="p-3 rounded-xl bg-white/5 border border-white/10">
                    <span className="text-[10px] text-[#B4C1CD] font-bold block uppercase">Time Zone</span>
                    <span className="text-xs font-bold text-white flex items-center gap-1.5 mt-0.5">
                      <Clock className="w-3.5 h-3.5 text-[#D9C48F]" />
                      {offices[activeOfficeTab]!.timezone}
                    </span>
                  </div>
                  <div className="p-3 rounded-xl bg-white/5 border border-white/10">
                    <span className="text-[10px] text-[#B4C1CD] font-bold block uppercase">Working Hours</span>
                    <span className="text-xs font-bold text-white mt-0.5 block">
                      {offices[activeOfficeTab]!.hours}
                    </span>
                  </div>
                </div>

              </div>

              <div className="pt-2">
                <a
                  href={`https://maps.google.com/?q=${encodeURIComponent(offices[activeOfficeTab]!.address)}`}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/15 text-xs font-bold text-white transition-all group"
                >
                  <span>Open in Google Maps</span>
                  <ExternalLink className="w-3.5 h-3.5 text-[#D9C48F] group-hover:translate-x-0.5 transition-transform" />
                </a>
              </div>
            </div>

            {/* Right Map Preview Box */}
            <div className="lg:col-span-7 rounded-2xl overflow-hidden border border-white/15 min-h-[300px] relative bg-[#0F2334] shadow-inner">
              <iframe
                title={`Map of ${offices[activeOfficeTab]!.city}`}
                src={offices[activeOfficeTab]!.mapEmbedUrl}
                width="100%"
                height="100%"
                style={{ border: 0, minHeight: '320px' }}
                allowFullScreen={false}
                loading="lazy"
                referrerPolicy="no-referrer-when-downgrade"
                className="w-full h-full grayscale opacity-85 hover:grayscale-0 hover:opacity-100 transition-all duration-300"
              />
            </div>

          </div>

          {/* 3 Office Cards Grid View for Quick Scanning */}
          <div className="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">
            {offices.map((office, idx) => (
              <div
                key={office.id}
                onClick={() => setActiveOfficeTab(idx)}
                className={`p-6 rounded-2xl border transition-all cursor-pointer ${
                  activeOfficeTab === idx
                    ? 'bg-[#264868]/60 border-[#C1A972] shadow-xl'
                    : 'bg-white/5 border-white/10 hover:bg-white/10'
                }`}
              >
                <div className="flex items-center justify-between mb-3">
                  <span className="text-2xl">{office.flag}</span>
                  <span className="text-[10px] font-bold uppercase tracking-wider text-[#D9C48F] bg-[#C1A972]/10 px-2.5 py-1 rounded-full border border-[#C1A972]/20">
                    {office.region}
                  </span>
                </div>
                <h4 className="text-lg font-bold text-white mb-1">{office.city}</h4>
                <p className="text-xs text-[#B4C1CD] line-clamp-2 leading-relaxed mb-4">
                  {office.address}
                </p>
                <div className="text-xs text-[#D9C48F] font-semibold flex items-center gap-1.5">
                  <span>{office.phone}</span>
                </div>
              </div>
            ))}
          </div>

        </div>

        {/* 4. QUARTERLY INSIGHTS / NEWSLETTER SUBSCRIPTION */}
        <div className="bg-gradient-to-r from-[#264868] via-[#153758] to-[#264868] border border-[#C1A972]/40 rounded-3xl p-8 sm:p-12 shadow-2xl relative overflow-hidden">
          <div className="absolute top-0 right-0 w-80 h-80 bg-[#C1A972]/15 blur-3xl rounded-full pointer-events-none" />

          <div className="max-w-3xl mx-auto text-center space-y-6 relative z-10">
            <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#C1A972]/10 text-[#D9C48F] text-xs font-bold uppercase tracking-wider border border-[#C1A972]/20">
              <Sparkles className="w-3.5 h-3.5 text-[#D9C48F]" />
              <span>Quarterly Engineering Journal</span>
            </div>

            <h3 className="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
              Subscribe to Engineering Insights
            </h3>

            <p className="text-xs sm:text-sm text-[#FEFEFE] leading-relaxed max-w-xl mx-auto">
              Quarterly deep-dives into AI agent architectures, zero-trust cloud setups, and microservices performance — delivered every 3 months. <strong className="text-white">Zero marketing fluff.</strong>
            </p>

            {newsletterSuccess ? (
              <div className="p-4 rounded-xl bg-[#264868]/20 border border-[#264868]/40 text-[#264868] text-xs font-bold inline-flex items-center gap-2">
                <CheckCircle2 className="w-4 h-4" />
                <span>Subscribed! You will receive our next quarterly edition.</span>
              </div>
            ) : (
              <form onSubmit={handleNewsletterSubmit} className="flex flex-col sm:flex-row items-center justify-center gap-3 max-w-md mx-auto">
                <input
                  type="email"
                  required
                  value={newsletterEmail}
                  onChange={(e) => setNewsletterEmail(e.target.value)}
                  placeholder="Enter your work email..."
                  className="w-full bg-white/10 border border-white/20 focus:border-[#C1A972] text-white rounded-xl px-4 py-3 text-sm focus:outline-none placeholder-[#B4C1CD]"
                />
                <button
                  type="submit"
                  className="w-full sm:w-auto px-6 py-3 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs sm:text-sm rounded-xl transition-all shrink-0 shadow-lg"
                >
                  Subscribe
                </button>
              </form>
            )}

            <p className="text-[11px] text-[#B4C1CD]">
              🔒 Unsubscribe anytime in 1-click. We respect your privacy.
            </p>
          </div>
        </div>

        {/* 5. FREQUENTLY ASKED QUESTIONS (FAQ) */}
        <div className="pt-8 space-y-8">
          <div className="text-center max-w-2xl mx-auto space-y-3">
            <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/5 border border-white/10 text-xs font-bold uppercase tracking-wider text-[#D9C48F]">
              <HelpCircle className="w-3.5 h-3.5" />
              <span>Contact FAQs</span>
            </div>
            <h2 className="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
              Frequently Asked Questions
            </h2>
            <p className="text-xs sm:text-sm text-[#B4C1CD]">
              Clear answers regarding turnaround SLAs, NDA execution, and technical discovery.
            </p>
          </div>

          <div className="max-w-3xl mx-auto space-y-3">
            {faqs.map((faq, idx) => {
              const isOpen = openFaq === idx;
              return (
                <div
                  key={idx}
                  className="rounded-2xl bg-[#0F2334]/90 border border-white/10 transition-all overflow-hidden"
                >
                  <button
                    onClick={() => setOpenFaq(isOpen ? null : idx)}
                    className="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-sm sm:text-base text-white hover:text-[#D9C48F] transition-colors"
                  >
                    <span>{faq.q}</span>
                    <ChevronDown
                      className={`w-4 h-4 text-[#D9C48F] shrink-0 transition-transform duration-200 ${
                        isOpen ? 'rotate-180' : ''
                      }`}
                    />
                  </button>

                  {isOpen && (
                    <div className="px-5 pb-5 pt-0 text-xs sm:text-sm text-[#B4C1CD] leading-relaxed border-t border-white/5">
                      <p className="pt-3">{faq.a}</p>
                    </div>
                  )}
                </div>
              );
            })}
          </div>
        </div>

        {/* 6. BOTTOM CONSULTATION BANNER */}
        <div className="text-center p-8 bg-white/5 rounded-3xl border border-white/10 max-w-3xl mx-auto space-y-4">
          <h3 className="text-xl font-bold text-white">Prefer a 1-on-1 Live Strategy Session?</h3>
          <p className="text-xs sm:text-sm text-[#B4C1CD] max-w-md mx-auto">
            Book a complimentary 30-minute discovery video call with an Enterprise Architect to discuss your custom project requirements.
          </p>
          <button
            onClick={() => onOpenConsultation?.('Contact Us Page Strategy Call')}
            className="px-8 py-3.5 bg-gradient-to-r from-[#264868] to-[#153758] border border-[#C1A972]/40 text-white font-bold text-xs sm:text-sm rounded-2xl transition-all shadow-xl hover:border-[#C1A972] inline-flex items-center gap-2"
          >
            <Sparkles className="w-4 h-4 text-[#D9C48F]" />
            <span>Book 1-on-1 Discovery Session</span>
          </button>
        </div>

      </div>
    </div>
  );
};
