import React, { useState } from 'react';
import {
  Code,
  Smartphone,
  Shield,
  Cloud,
  Network,
  Cpu,
  Bot,
  BarChart3,
  Globe,
  Database,
  Layers,
  Sparkles,
  ArrowRight,
  Stethoscope,
  CheckCircle2,
  Users,
  Building,
  Zap,
  Lock,
  Boxes,
} from '@/site/icons';

interface ServiceItem {
  id: string;
  title: string;
  category: 'dev' | 'cloud' | 'ai' | 'health';
  description: string;
  highlights: string[];
  metrics: { value: string; label: string }[];
  ctaText: string;
  icon: React.ElementType;
}

const SERVICES_DATA: ServiceItem[] = [
  // Development
  {
    id: 'web-dev',
    title: 'Web Development',
    category: 'dev',
    description:
      'Build high-performance, scalable web applications that drive business growth and deliver measurable results across every platform.',
    highlights: [
      'Custom React, Next.js & Vue Architecture',
      'Microservices & Serverless Backends',
      'High-Concurrency Architecture & Optimization',
    ],
    metrics: [
      { value: '300+', label: 'Web Apps Built' },
      { value: '99.9%', label: 'Uptime SLA' },
      { value: '50ms', label: 'Avg Response' },
    ],
    ctaText: 'Discuss Web Development',
    icon: Code,
  },
  {
    id: 'mobile-apps',
    title: 'Mobile Apps',
    category: 'dev',
    description:
      'Intuitive mobile experiences built natively and cross-platform, from concept to app store, designed for performance and delight.',
    highlights: [
      'iOS (Swift) & Android (Kotlin) Native',
      'React Native & Flutter Cross-Platform',
      'Biometric Auth & Offline Data Sync',
    ],
    metrics: [
      { value: '150+', label: 'Apps Published' },
      { value: '4.8★', label: 'Avg Store Rating' },
      { value: '50M+', label: 'Active End Users' },
    ],
    ctaText: 'Build Your App',
    icon: Smartphone,
  },
  {
    id: 'saas-dev',
    title: 'SaaS Development',
    category: 'dev',
    description:
      'End-to-end multi-tenant SaaS engineering with automated billing, user management, and API orchestration for high growth.',
    highlights: [
      'Multi-Tenant Tenant Isolation',
      'Stripe / Subscription Engine Integration',
      'SOC 2 Compliant Infrastructure',
    ],
    metrics: [
      { value: '40+', label: 'SaaS Products Launched' },
      { value: '10x', label: 'Scalability Factor' },
      { value: 'Zero', label: 'Data Leakage Incidents' },
    ],
    ctaText: 'Launch Your SaaS',
    icon: Boxes,
  },
  {
    id: 'ui-ux',
    title: 'UI/UX Design',
    category: 'dev',
    description:
      'User-centered design systems, design tokens, interactive prototypes, and accessible UI engineering that converts.',
    highlights: [
      'Figma Design Systems & Tokens',
      'WCAG 2.1 AA Accessibility Standards',
      'Usability Testing & User Research',
    ],
    metrics: [
      { value: '85%', label: 'User Retention Boost' },
      { value: '2.5x', label: 'Conversion Lift' },
      { value: '100+', label: 'Design Systems' },
    ],
    ctaText: 'Design Your Experience',
    icon: Layers,
  },

  // Cloud & Security
  {
    id: 'cyber-security',
    title: 'Cyber Security',
    category: 'cloud',
    description:
      'Enterprise-grade security from threat detection to compliance, protecting your digital assets against evolving cyber threats.',
    highlights: [
      'Zero-Trust Architecture & IAM',
      'Penetration Testing & Vulnerability Audits',
      '24/7 SOC Threat Monitoring',
    ],
    metrics: [
      { value: '99.97%', label: 'Threat Detection' },
      { value: '200+', label: 'Security Audits' },
      { value: '24/7', label: 'SOC Monitoring' },
    ],
    ctaText: 'Secure Your Business',
    icon: Shield,
  },
  {
    id: 'cloud-devops',
    title: 'Cloud & DevOps',
    category: 'cloud',
    description:
      'Seamless migration, CI/CD automation, and optimization across AWS, Azure, and GCP for cost-efficient, high-availability infrastructure.',
    highlights: [
      'AWS, Azure & Google Cloud Certified',
      'Kubernetes & Terraform Infrastructure as Code',
      'Cost Optimization & FinOps Controls',
    ],
    metrics: [
      { value: '45%', label: 'Cloud Cost Savings' },
      { value: '99.99%', label: 'High Availability' },
      { value: '10x', label: 'Faster Deployments' },
    ],
    ctaText: 'Modernize Your Infra',
    icon: Cloud,
  },
  {
    id: 'networking',
    title: 'Networking & SD-WAN',
    category: 'cloud',
    description:
      'Enterprise networking solutions, SD-WAN deployment, and unified communications designed for distributed workforces.',
    highlights: [
      'Cisco & Fortinet Enterprise Routing',
      'VPN & Zero Trust Network Access (ZTNA)',
      'Multi-site Network Telephony',
    ],
    metrics: [
      { value: '100+', label: 'Networks Deployed' },
      { value: '<1ms', label: 'Internal Latency' },
      { value: '99.99%', label: 'Network SLA' },
    ],
    ctaText: 'Upgrade Your Network',
    icon: Network,
  },

  // AI & Data
  {
    id: 'ai-ml',
    title: 'AI & Machine Learning',
    category: 'ai',
    description:
      'Custom AI models, Generative AI integration, NLP, and predictive analytics that transform operations and unlock intelligence.',
    highlights: [
      'LLM Fine-Tuning & RAG Pipelines',
      'Computer Vision & Object Detection',
      'Predictive Maintenance & Forecasting',
    ],
    metrics: [
      { value: '80+', label: 'AI Models Deployed' },
      { value: '3x', label: 'Efficiency Gain' },
      { value: '98%', label: 'Model Accuracy' },
    ],
    ctaText: 'Explore AI Solutions',
    icon: Bot,
  },
  {
    id: 'data-analytics',
    title: 'Data & Analytics',
    category: 'ai',
    description:
      'Turn raw enterprise data into real-time actionable insights with modern data lakes, ETL pipelines, and BI dashboards.',
    highlights: [
      'Snowflake, BigQuery & Databricks',
      'Real-time Event Streaming (Kafka)',
      'PowerBI & Tableau Executive Dashboards',
    ],
    metrics: [
      { value: '10PB+', label: 'Data Processed' },
      { value: 'Real-Time', label: 'Insights Pipeline' },
      { value: '100%', label: 'Data Governance' },
    ],
    ctaText: 'Unlock Your Data',
    icon: BarChart3,
  },
  {
    id: 'iot-solutions',
    title: 'IoT Solutions',
    category: 'ai',
    description:
      'Connect devices, sensors, and industrial equipment to secure cloud gateways for real-time telemetry and edge computing.',
    highlights: [
      'MQTT / Modbus Edge Gateways',
      'Industrial IoT (IIoT) Sensor Networks',
      'Real-time Anomaly Alerting',
    ],
    metrics: [
      { value: '100k+', label: 'Connected Devices' },
      { value: '99.95%', label: 'Gateway Uptime' },
      { value: '48hr', label: 'Predictive Warning' },
    ],
    ctaText: 'Connect Your Devices',
    icon: Cpu,
  },

  // Healthcare
  {
    id: 'health-tech',
    title: 'Healthcare Technology',
    category: 'health',
    description:
      'HIPAA & GDPR-compliant medical software, clinical AI tools, hospital management ERPs, and biomedical asset management.',
    highlights: [
      'HL7 / FHIR Interoperability Protocols',
      'HIPAA & HITECH Security Compliance',
      'Biomedical Facilities & Equipment Repair',
    ],
    metrics: [
      { value: '50+', label: 'Hospitals Served' },
      { value: '100%', label: 'HIPAA Compliant' },
      { value: '2M+', label: 'Patients Managed' },
    ],
    ctaText: 'Transform Healthcare IT',
    icon: Stethoscope,
  },
];

export const ServicesSection: React.FC<{
  onOpenConsultation: (topic: string) => void;
}> = ({ onOpenConsultation }) => {
  const [activeCategory, setActiveCategory] = useState<'dev' | 'cloud' | 'ai' | 'health'>('dev');
  const [selectedServiceId, setSelectedServiceId] = useState<string>('web-dev');

  const categories = [
    { id: 'dev', label: 'Development & Engineering', icon: Code },
    { id: 'cloud', label: 'Cloud & Security', icon: Cloud },
    { id: 'ai', label: 'AI, Data & Automation', icon: Bot },
    { id: 'health', label: 'Healthcare Technology', icon: Stethoscope },
  ];

  const filteredServices = SERVICES_DATA.filter((s) => s.category === activeCategory);
  const activeService =
    SERVICES_DATA.find((s) => s.id === selectedServiceId && s.category === activeCategory) ||
    filteredServices[0] ||
    SERVICES_DATA[0]!;

  return (
    <section className="py-24 bg-[#FEFEFE] text-[#153758]" id="services">
      <div className="max-w-7xl mx-auto px-6">
        {/* Section Header */}
        <div className="text-center max-w-3xl mx-auto mb-16 space-y-4">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#264868]/10 text-[#264868] text-xs font-bold uppercase tracking-wider">
            <Sparkles className="w-4 h-4 text-[#C1A972]" />
            <span>End-to-End Capabilities</span>
          </div>
          <h2 className="text-3xl sm:text-5xl font-black text-[#153758] tracking-tight">
            Enterprise-Grade Technology Services
          </h2>
          <p className="text-[#5C6B7A] text-base sm:text-lg">
            Comprehensive technology solutions engineered for scale, zero-trust security, and continuous innovation.
          </p>
        </div>

        {/* Category Selector Tabs */}
        <div className="flex flex-wrap items-center justify-center gap-3 mb-12">
          {categories.map((cat) => {
            const Icon = cat.icon;
            const isActive = activeCategory === cat.id;
            return (
              <button
                key={cat.id}
                onClick={() => {
                  setActiveCategory(cat.id as any);
                  const first = SERVICES_DATA.find((s) => s.category === cat.id);
                  if (first) setSelectedServiceId(first.id);
                }}
                className={`flex items-center gap-2.5 px-6 py-3 rounded-2xl text-sm font-bold transition-all duration-300 ${
                  isActive
                    ? 'bg-[#264868] text-white shadow-xl shadow-black/20 scale-105'
                    : 'bg-white text-[#153758] hover:bg-[#F3F5F7] border border-[#DDE3E9]'
                }`}
              >
                <Icon className={`w-4 h-4 ${isActive ? 'text-[#C1A972]' : 'text-[#264868]'}`} />
                <span>{cat.label}</span>
              </button>
            );
          })}
        </div>

        {/* Main Service Interactive Showcase */}
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
          {/* Left Service Menu List */}
          <div className="lg:col-span-5 space-y-3">
            {filteredServices.map((service) => {
              const Icon = service.icon;
              const isSelected = activeService.id === service.id;
              return (
                <div
                  key={service.id}
                  onClick={() => setSelectedServiceId(service.id)}
                  className={`p-5 rounded-2xl cursor-pointer transition-all duration-200 border ${
                    isSelected
                      ? 'bg-white border-[#264868] shadow-lg shadow-black/10 ring-2 ring-[#264868]/20'
                      : 'bg-white/80 border-[#DDE3E9]/80 hover:bg-white hover:border-[#C1A972]'
                  }`}
                >
                  <div className="flex items-start gap-4">
                    <div
                      className={`w-10 h-10 rounded-xl flex items-center justify-center shrink-0 transition-colors ${
                        isSelected ? 'bg-[#264868] text-[#C1A972]' : 'bg-[#264868]/10 text-[#264868]'
                      }`}
                    >
                      <Icon className="w-5 h-5" />
                    </div>
                    <div className="flex-1 min-w-0">
                      <div className="flex items-center justify-between gap-2">
                        <h4
                          className={`font-bold text-base transition-colors ${
                            isSelected ? 'text-[#264868]' : 'text-[#153758]'
                          }`}
                        >
                          {service.title}
                        </h4>
                        <ArrowRight
                          className={`w-4 h-4 transition-transform ${
                            isSelected ? 'translate-x-1 text-[#264868]' : 'text-[#93A3B2]'
                          }`}
                        />
                      </div>
                      <p className="text-xs text-[#5C6B7A] line-clamp-2 mt-1">
                        {service.description}
                      </p>
                    </div>
                  </div>
                </div>
              );
            })}
          </div>

          {/* Right Active Service Detailed Spotlight */}
          <div className="lg:col-span-7 bg-white rounded-3xl p-8 sm:p-10 border border-[#DDE3E9] shadow-xl shadow-black/5 relative overflow-hidden">
            <div className="absolute top-0 right-0 w-64 h-64 bg-[#C1A972]/10 rounded-full blur-3xl pointer-events-none -mr-20 -mt-20" />

            <div className="relative z-10 space-y-8">
              <div className="flex items-center gap-3">
                <div className="w-12 h-12 rounded-2xl bg-[#264868] text-[#C1A972] flex items-center justify-center shadow-md">
                  <activeService.icon className="w-6 h-6" />
                </div>
                <div>
                  <span className="text-xs font-bold text-[#264868] uppercase tracking-wider">
                    Featured Capability
                  </span>
                  <h3 className="text-2xl sm:text-3xl font-black text-[#153758]">
                    {activeService.title}
                  </h3>
                </div>
              </div>

              <p className="text-[#5C6B7A] text-base leading-relaxed">
                {activeService.description}
              </p>

              {/* Highlights Checklist */}
              <div className="space-y-3">
                <h4 className="text-xs font-bold text-[#5C6B7A] uppercase tracking-widest">
                  Key Technical Deliverables
                </h4>
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                  {activeService.highlights.map((item, idx) => (
                    <div
                      key={idx}
                      className="flex items-center gap-2.5 p-3 rounded-xl bg-[#FEFEFE] text-xs font-semibold text-[#153758] border border-[#DDE3E9]"
                    >
                      <CheckCircle2 className="w-4 h-4 text-[#C1A972] shrink-0" />
                      <span>{item}</span>
                    </div>
                  ))}
                </div>
              </div>

              {/* Metrics Grid */}
              <div className="grid grid-cols-3 gap-4 pt-4 border-t border-[#F3F5F7]">
                {activeService.metrics.map((m, idx) => (
                  <div key={idx} className="p-3.5 rounded-2xl bg-[#FEFEFE] text-center border border-[#F3F5F7]">
                    <div className="text-2xl font-black text-[#264868]">{m.value}</div>
                    <div className="text-[11px] font-semibold text-[#5C6B7A] mt-0.5">{m.label}</div>
                  </div>
                ))}
              </div>

              {/* Action Button */}
              <div className="pt-2 flex flex-col sm:flex-row gap-4">
                <button
                  onClick={() => onOpenConsultation(activeService.title)}
                  className="px-8 py-4 bg-[#264868] hover:bg-[#153758] text-white font-bold rounded-2xl transition-all shadow-xl shadow-black/20 flex items-center justify-center gap-2 group"
                >
                  <span>{activeService.ctaText}</span>
                  <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform text-[#C1A972]" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};
