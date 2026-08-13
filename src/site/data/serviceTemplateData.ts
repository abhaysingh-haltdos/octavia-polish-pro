import { ServicePageData } from '../types/service';

export const GENERIC_SERVICE_TEMPLATE_DATA: ServicePageData = {
  id: 'generic-service-template',
  serviceCategory: 'Enterprise Services',
  metaTitle: 'Enterprise Digital Engineering & Solutions | Octavia Tech Solutions',
  
  seo: {
    h1: 'Enterprise Software & Digital Engineering Solutions',
    metaTitle: 'Enterprise Software & Digital Engineering Solutions | Octavia Tech Solutions',
    metaDescription: 'Scale your business with enterprise-grade digital engineering, AI automation, cloud architecture, and software development from Octavia Tech Solutions.',
    canonicalUrl: 'https://octaviatechnologies.com/services',
    breadcrumbs: [
      { name: 'Home', href: '/' },
      { name: 'Services', href: '/services' },
      { name: 'Enterprise Solutions', href: '/services/enterprise-solutions' },
    ],
  },

  // 1. Hero Section
  hero: {
    badge: 'Enterprise Service Solution',
    title: 'Transform Business Capabilities with',
    titleHighlight: 'Scalable Engineering & AI Excellence',
    description:
      'Empower your business with enterprise-grade solutions designed for performance, resilience, and business growth. From architectural discovery to continuous deployment, we engineer mission-critical systems tailored to your technical goals.',
    primaryCtaText: 'Get Free Consultation',
    secondaryCtaText: 'Request Proposal',
    graphicBadge: 'Architecture & Delivery Engine',
    graphicTitle: 'Enterprise-Ready Solution Framework',
    graphicSubtext: 'Built for high reliability, automated compliance, and seamless multi-system integration.',
    tags: ['Cloud-Native Architecture', 'Zero-Trust Security', 'Agile Delivery', '24/7 SLA Support'],
  },

  // 2. Service Overview
  overview: {
    badge: 'Service Overview',
    heading: 'Engineering Modern Digital Infrastructure & Custom Enterprise Capabilities',
    leadParagraph:
      'Our comprehensive service framework bridges business strategy and deep engineering expertise. We partner with forward-thinking organizations to accelerate digital transformation, eliminate legacy bottlenecks, and build resilient architectures that scale with market demand.',
    secondaryParagraph:
      'Whether you require end-to-end custom application development, cloud modernization, automated AI intelligence, or team extension, our cross-functional delivery units apply battle-tested practices to deliver measurable ROI.',
    pillars: [
      {
        title: 'Architectural Excellence',
        description: 'Decoupled, modular systems designed for high availability, zero latency bottlenecks, and seamless maintenance.',
        iconName: 'Layers',
      },
      {
        title: 'Enterprise Security & Compliance',
        description: 'Built-in security governance adhering to ISO 27001, SOC2, HIPAA, and GDPR global compliance standards.',
        iconName: 'ShieldCheck',
      },
      {
        title: 'Intelligent Automation',
        description: 'Leveraging AI agents, automated workflows, and CI/CD pipelines to minimize operational overhead.',
        iconName: 'Cpu',
      },
      {
        title: 'Scalable Growth',
        description: 'Elastic cloud infrastructure and resilient codebases built to accommodate millions of concurrent users.',
        iconName: 'TrendingUp',
      },
    ],
  },

  // 3. Customer Challenges / Problems
  challenges: {
    badge: 'Business Challenges',
    heading: 'Navigating Complex Operational & Engineering Friction Points',
    subheading: 'Modern enterprises face systemic hurdles when scaling technology platforms. Our service directly targets and resolves key structural bottlenecks.',
    challenges: [
      {
        id: 'c1',
        category: 'Legacy Technical Debt',
        issue: 'Monolithic Codebases & High Maintenance Overhead',
        impact: 'Slower deployment cycles and increased vulnerability to unexpected system outages.',
        description: 'Fragile architectures hinder agility, preventing rapid adoption of new features and market adaptations.',
      },
      {
        id: 'c2',
        category: 'Scalability Constraints',
        issue: 'Performance Degradation Under Peak Loads',
        impact: 'Degraded user experiences, lost revenue during demand spikes, and inefficient server resource utilization.',
        description: 'Infrastructure lacks auto-scaling mechanisms and optimized query patterns required for heavy enterprise workloads.',
      },
      {
        id: 'c3',
        category: 'Integration Complexity',
        issue: 'Siloed Systems & Fragmented Data Flow',
        impact: 'High manual data reconciliation effort, duplicate workflows, and delayed business insights.',
        description: 'Disparate SaaS platforms, legacy ERPs, and third-party APIs lack robust middle layers and real-time synchronization.',
      },
      {
        id: 'c4',
        category: 'Security Vulnerabilities',
        issue: 'Exposed Endpoints & Non-Compliant Data Handling',
        impact: 'Risk of costly regulatory penalties, security breaches, and loss of customer enterprise trust.',
        description: 'Lack of automated security scanning, centralized identity management, and fine-grained role-based access controls.',
      },
    ],
  },

  // 4. Our Solution
  solution: {
    badge: 'Our Solution',
    heading: 'A Modern, End-to-End Managed Delivery Framework',
    description: 'We deliver a complete end-to-end service ecosystem—combining expert technical advisory, custom engineering, automated security testing, and continuous optimization into a single unified partnership.',
    highlights: [
      {
        title: 'Cloud-Native Microservices',
        description: 'Modular micro-frontends and microservices engineered for independent deployment and zero-downtime releases.',
        tag: 'Architecture',
      },
      {
        title: 'Automated CI/CD & Infrastructure as Code',
        description: 'Repeatable deployment scripts and automated testing suites ensuring release confidence in minutes, not days.',
        tag: 'DevOps',
      },
      {
        title: 'Unified API & Event-Driven Bus',
        description: 'High-throughput Kafka and REST/GraphQL event bridges for seamless real-time data streaming across all business units.',
        tag: 'Integration',
      },
      {
        title: 'Proactive Monitoring & AI Telemetry',
        description: 'Real-time observational dashboards, automated anomaly detection, and instant incident response routing.',
        tag: 'Operations',
      },
    ],
    architecturalPillars: [
      { title: 'Discovery & Audit', desc: 'Thorough system profiling, code evaluation, and performance benchmarking.', icon: 'Search' },
      { title: 'Agile Co-Creation', desc: 'Dedicated engineering sprints with continuous code reviews and feedback loops.', icon: 'Code2' },
      { title: 'Zero-Downtime Rollout', desc: 'Blue/Green deployment strategies backed by instant rollback mechanisms.', icon: 'Rocket' },
      { title: 'Continuous Governance', desc: '24/7 telemetry monitoring, security patching, and capacity planning.', icon: 'Activity' },
    ],
  },

  // 5. Why Choose Us (Benefits / Value Drivers)
  whyChooseUs: {
    badge: 'Why Choose Octavia',
    heading: 'Quantifiable Impact for Engineering & Business Leaders',
    subheading: 'Our service delivery produces tangible improvements in velocity, platform uptime, cost efficiency, and developer productivity.',
    benefits: [
      {
        title: 'Accelerated Time-to-Market',
        description: 'Standardized CI/CD templates and pre-built architectural modules reduce release cycles from months to weeks.',
        metric: '3.5x',
        metricLabel: 'Faster Feature Deployment',
        iconName: 'Clock',
      },
      {
        title: 'Uncompromised Platform Uptime',
        description: 'Multi-region redundancy and self-healing infrastructure keep your platform online through peak traffic spikes.',
        metric: '99.99%',
        metricLabel: 'Guaranteed Availability',
        iconName: 'Shield',
      },
      {
        title: 'Cost & Resource Efficiency',
        description: 'Optimized cloud resource allocation, containerized deployments, and serverless compute reduce cloud spend.',
        metric: '35%',
        metricLabel: 'Infrastructure Cost Reduction',
        iconName: 'DollarSign',
      },
      {
        title: 'Enhanced Security Stance',
        description: 'Continuous security audits, zero-trust policies, and automated compliance tracking guard against threats.',
        metric: '100%',
        metricLabel: 'Audit & Compliance Alignment',
        iconName: 'Lock',
      },
      {
        title: 'Elastic Engineering Scale',
        description: 'Scale engineering capacity on demand with senior software architects and domain-specific engineers.',
        metric: '48h',
        metricLabel: 'Rapid Team Onboarding',
        iconName: 'Users',
      },
      {
        title: 'Full Intellectual Property Ownership',
        description: 'Complete transfer of all source code, system architectures, documentation, and IP assets.',
        metric: '100%',
        metricLabel: 'Code & IP Ownership',
        iconName: 'Award',
      },
    ],
  },

  // 6. Features
  features: {
    badge: 'Key Service Features',
    heading: 'Engineered for Performance, Precision, and Control',
    subheading: 'Discover the core capabilities included within this service offering to accelerate your enterprise technology goals.',
    categories: ['Core Engineering', 'Security & Resilience', 'Data & Integration', 'Managed Support'],
    features: [
      {
        id: 'f1',
        title: 'Custom Architecture Design',
        category: 'Core Engineering',
        iconName: 'Layout',
        badge: 'Popular',
        businessBenefit: 'Reduces Architectural Debt',
        description: 'Bespoke software and cloud architecture engineered specifically for your domain rules, security standards, and load requirements.',
        points: ['Domain-Driven Design (DDD)', 'Fault-Tolerant Microservices', 'Elastic Multi-Region Setup'],
      },
      {
        id: 'f2',
        title: 'High-Throughput API Gateway',
        category: 'Core Engineering',
        iconName: 'Network',
        businessBenefit: 'Handles Peak Workloads',
        description: 'Centralized traffic control, rate limiting, token bucket throttling, and authorization layer for high-volume enterprise traffic.',
        points: ['OAuth2 / OIDC Auth Flow', 'Rate Limiting & DDoS Prevention', 'GraphQL & REST API Proxies'],
      },
      {
        id: 'f3',
        title: 'Zero-Trust Security Layer',
        category: 'Security & Resilience',
        iconName: 'Lock',
        badge: 'Enterprise',
        businessBenefit: 'Protects Sensitive Data',
        description: 'End-to-end encryption in transit and at rest, automated vulnerability scanning, and strict role-based access management.',
        points: ['AES-256 Data Encryption', 'WAF & Bot Protection', 'Compliance Ready (SOC2 / HIPAA)'],
      },
      {
        id: 'f4',
        title: 'Real-Time Event Streaming',
        category: 'Data & Integration',
        iconName: 'Zap',
        businessBenefit: 'Instant Data Processing',
        description: 'Event-driven message queues and pub/sub systems enabling sub-second synchronization across mobile, web, and backend components.',
        points: ['Apache Kafka / RabbitMQ', 'WebSockets & Server-Sent Events', 'Low-Latency Message Brokers'],
      },
      {
        id: 'f5',
        title: 'Automated Testing & QA Suites',
        category: 'Core Engineering',
        iconName: 'CheckCircle2',
        businessBenefit: 'Zero-Bug Production Releases',
        description: 'Comprehensive unit, integration, end-to-end, and load testing pipelines embedded directly into your deployment workflows.',
        points: ['Playwright / Cypress E2E', 'Automated Regression Testing', 'K6 / Locust Load Simulation'],
      },
      {
        id: 'f6',
        title: '24/7 Managed Operations & SLA',
        category: 'Managed Support',
        iconName: 'Headphones',
        badge: '24/7 SLA',
        businessBenefit: 'Continuous Peace of Mind',
        description: 'Dedicated site reliability engineers (SREs) monitoring platform health round the clock with guaranteed uptime response SLAs.',
        points: ['15-Minute Critical Incident SLA', 'Proactive Log Aggregation', 'Monthly Technical Health Audits'],
      },
    ],
  },

  // 7. Development Process
  process: {
    badge: 'Development Process',
    heading: 'Our Proven 6-Step Engineering Roadmap',
    subheading: 'A transparent, structured, and agile engagement model ensuring complete clarity from initial scope definition to post-launch optimization.',
    steps: [
      {
        stepNumber: '01',
        title: 'Discovery & Strategic Alignment',
        phase: 'Phase 1',
        duration: 'Week 1-2',
        description: 'In-depth workshops with your technical leads and stakeholders to audit existing tech stacks, define functional requirements, and establish KPIs.',
        deliverables: ['System Architecture Blueprint', 'Technical Requirements Document', 'Risk Mitigation Plan'],
      },
      {
        stepNumber: '02',
        title: 'Architecture & UX Specification',
        phase: 'Phase 2',
        duration: 'Week 2-3',
        description: 'Designing high-level software blueprints, database models, security frameworks, and interactive prototypes tailored to your user workflows.',
        deliverables: ['Database Schema & API Specs', 'Interactive UI Prototypes', 'Security & Compliance Matrix'],
      },
      {
        stepNumber: '03',
        title: 'Agile Sprint Engineering',
        phase: 'Phase 3',
        duration: 'Week 4-10',
        description: 'Iterative sprint cycles with bi-weekly demonstrations, continuous integration, code reviews, and transparent sprint reporting.',
        deliverables: ['Clean Modular Codebase', 'Bi-Weekly Demo Builds', 'Automated Test Suites'],
      },
      {
        stepNumber: '04',
        title: 'Rigorous QA & Security Audit',
        phase: 'Phase 4',
        duration: 'Week 10-11',
        description: 'Comprehensive load testing, penetration testing, cross-platform validation, and accessibility verification under extreme simulated conditions.',
        deliverables: ['Pen-Test Security Report', 'Performance Benchmark Audit', 'User Acceptance Sign-Off'],
      },
      {
        stepNumber: '05',
        title: 'Production Deployment',
        phase: 'Phase 5',
        duration: 'Week 12',
        description: 'Controlled production rollout utilizing canary or blue/green deployment strategies with real-time observability monitoring.',
        deliverables: ['Zero-Downtime Live Launch', 'Telemetry & Log Dashboards', 'DevOps Runbook Documentation'],
      },
      {
        stepNumber: '06',
        title: 'Continuous Optimization & SLA Support',
        phase: 'Phase 6',
        duration: 'Ongoing',
        description: 'Post-launch SRE monitoring, proactive performance tuning, feature upgrades, and guaranteed 24/7 technical support SLAs.',
        deliverables: ['24/7 Monitoring & Hotfixes', 'Quarterly Architecture Reviews', 'Ongoing Feature Sprints'],
      },
    ],
  },

  // 8. Technology Stack
  techStack: {
    badge: 'Technology Stack',
    heading: 'Modern, High-Performance Tech Stack',
    subheading: 'We utilize battle-tested frameworks, cloud infrastructure, and AI tooling to build resilient enterprise systems.',
    categories: [
      {
        category: 'Frontend & Web',
        technologies: [
          { name: 'React', level: 'Core Framework' },
          { name: 'Next.js', level: 'SSR & Jamstack' },
          { name: 'TypeScript', level: 'Type-Safe' },
          { name: 'Tailwind CSS', level: 'Styling' },
          { name: 'Vue.js', level: 'Reactive' },
          { name: 'Angular', level: 'Enterprise' },
        ],
      },
      {
        category: 'Backend & APIs',
        technologies: [
          { name: 'Node.js', level: 'Async Runtime' },
          { name: 'Python / FastAPI', level: 'AI & Backend' },
          { name: 'Java / Spring', level: 'Enterprise Core' },
          { name: 'Go (Golang)', level: 'Microservices' },
          { name: 'GraphQL', level: 'Query API' },
          { name: 'RESTful APIs', level: 'Standard API' },
        ],
      },
      {
        category: 'Cloud & DevOps',
        technologies: [
          { name: 'AWS', level: 'Hyperscale Cloud' },
          { name: 'Google Cloud', level: 'Cloud & AI' },
          { name: 'Microsoft Azure', level: 'Enterprise Cloud' },
          { name: 'Kubernetes', level: 'Orchestration' },
          { name: 'Docker', level: 'Containerization' },
          { name: 'Terraform', level: 'IaC Infrastructure' },
        ],
      },
      {
        category: 'AI & Data Platforms',
        technologies: [
          { name: 'OpenAI / Gemini', level: 'LLM Engines' },
          { name: 'LangChain / LlamaIndex', level: 'Agentic Frameworks' },
          { name: 'PostgreSQL', level: 'Relational DB' },
          { name: 'MongoDB / Redis', level: 'NoSQL & In-Memory' },
          { name: 'Apache Kafka', level: 'Event Streaming' },
          { name: 'Pinecone / Weaviate', level: 'Vector Storage' },
        ],
      },
    ],
  },

  // 9. Industries Served
  industries: {
    badge: 'Industries Served',
    heading: 'Tailored Solutions for High-Growth Sectors',
    subheading: 'Our engineering models adapt seamlessly to compliance requirements, security regulations, and operational needs across industries.',
    industries: [
      {
        name: 'Healthcare & Life Sciences',
        iconName: 'healthcare',
        description: 'HIPAA-compliant telemedicine, EHR integrations, and patient data analytics platforms.',
        useCase: 'Interoperable Patient Portal & FHIR Data Pipeline',
        kpi: '100% HIPAA Compliant',
      },
      {
        name: 'Finance & Banking',
        iconName: 'finance',
        description: 'PCI-DSS secured core payment processing, real-time fraud scoring, and wealth management tools.',
        useCase: 'Sub-20ms High-Throughput Transaction Engine',
        kpi: '50M+ Daily API Calls',
      },
      {
        name: 'Retail & E-Commerce',
        iconName: 'retail',
        description: 'Headless commerce storefronts, omnichannel inventory synchronization, and personalized recommendations.',
        useCase: 'Auto-Scaling Flash Sale E-Commerce Architecture',
        kpi: '0 Downtime During Spikes',
      },
      {
        name: 'Logistics & Supply Chain',
        iconName: 'logistics',
        description: 'IoT telemetry broker, real-time fleet tracking, geofenced route optimization, and warehouse automation.',
        useCase: 'Real-Time Fleet & Warehouse Telemetry Engine',
        kpi: '42% Faster Delivery',
      },
      {
        name: 'Real Estate & Property',
        iconName: 'realestate',
        description: 'PropTech platforms, virtual tours, automated tenant screening, and contract management portals.',
        useCase: 'Property Listing Aggregator & Virtual Tours',
        kpi: '3.2x Lead Conversions',
      },
      {
        name: 'Education & EdTech',
        iconName: 'education',
        description: 'Virtual classrooms, LMS platforms, adaptive AI learning paths, and student record databases.',
        useCase: 'Interactive Collaborative Online Learning Campus',
        kpi: '500k+ Active Students',
      },
    ],
  },

  // 10. Case Studies
  caseStudies: {
    badge: 'Success Stories',
    heading: 'Proven Enterprise Transformations',
    subheading: 'Explore how Octavia Tech Solutions delivers measurable engineering value and business results for industry leaders.',
    caseStudies: [
      {
        id: 'cs1',
        industry: 'Fintech Enterprise',
        title: 'Modernizing Core Payment Gateway & Fraud Detection',
        challenge: 'Legacy transaction pipeline suffered from 450ms latency spikes and frequent checkout timeouts during peak market hours.',
        solution: 'Re-architected monolithic backend into decoupled Go microservices backed by Apache Kafka and real-time AI fraud scoring.',
        techTags: ['Go', 'Apache Kafka', 'PostgreSQL', 'AWS'],
        businessImpact: 'Reduced API response times by 82% while scaling transaction throughput 4x.',
        kpiHighlight: '82% Faster API Speed',
      },
      {
        id: 'cs2',
        industry: 'Healthcare Platform',
        title: 'HIPAA-Compliant AI Telehealth & EHR Integration',
        challenge: 'Physicians spent 3+ hours daily manually re-entering patient records across 5 disconnected hospital EHR systems.',
        solution: 'Engineered a unified HL7/FHIR compliant data bridge with automated AI note summarization and encrypted cloud storage.',
        techTags: ['TypeScript', 'FastAPI', 'Gemini AI', 'FHIR Protocol'],
        businessImpact: 'Eliminated 2.5 hours of daily paperwork per doctor and achieved zero security audit flags.',
        kpiHighlight: '2.5 Hours Saved Daily',
      },
      {
        id: 'cs3',
        industry: 'Global E-Commerce Brand',
        title: 'Headless Multi-Tenant E-Commerce Platform',
        challenge: 'Monolithic storefront crashed during major sales events, causing over $1.2M in lost revenue annually.',
        solution: 'Migrated to Next.js micro-frontends with Redis caching layers and automated elastic Kubernetes deployment.',
        techTags: ['Next.js', 'React', 'Redis', 'Kubernetes'],
        businessImpact: 'Maintained 100% uptime during Black Friday with 3.2x higher conversion speeds.',
        kpiHighlight: '99.999% Peak Uptime',
      },
    ],
  },

  // 11. Business Outcomes
  outcomes: {
    badge: 'Business Outcomes',
    heading: 'Measurable Business & Engineering ROI',
    subheading: 'Every engagement is architected to achieve concrete financial and operational key performance indicators.',
    outcomes: [
      {
        metric: '40%',
        label: 'Faster Operational Cycles',
        description: 'Automated workflows and streamlined architectures eliminate manual overhead.',
        trend: 'up',
      },
      {
        metric: '65%',
        label: 'Lower Infrastructure Costs',
        description: 'Optimized serverless compute and containerization reduce unnecessary cloud spend.',
        trend: 'down',
      },
      {
        metric: '3x',
        label: 'Scalability Increase',
        description: 'Elastic cloud infrastructure accommodates surge traffic without performance bottlenecks.',
        trend: 'up',
      },
      {
        metric: '99.99%',
        label: 'Guaranteed System Uptime',
        description: 'Self-healing microservices and multi-region redundancy keep platforms online 24/7.',
        trend: 'up',
      },
      {
        metric: '50%',
        label: 'Faster Deployment Velocity',
        description: 'Automated CI/CD pipelines allow engineers to ship code safely in minutes.',
        trend: 'up',
      },
    ],
  },

  // 12. Comparison Section
  comparison: {
    badge: 'Comparative Analysis',
    heading: 'Why Octavia Beats Alternative Delivery Models',
    subheading: 'Compare Octavia Tech Solutions against traditional development agencies, freelancers, and in-house hiring.',
    criteria: [
      {
        feature: 'Cost Efficiency',
        octavia: 'Predictable pricing & zero hiring overhead',
        traditionalAgency: 'High bloated billing rates & hidden fees',
        freelancers: 'Unpredictable scope creep costs',
        inHouseTeam: 'High salaries, benefits, & onboarding costs',
      },
      {
        feature: 'Delivery Speed & Time-to-Market',
        octavia: '48h onboarding with pre-built modules',
        traditionalAgency: 'Slow 2-3 month discovery delays',
        freelancers: 'Inconsistent velocity & delays',
        inHouseTeam: 'Months to recruit & train developers',
      },
      {
        feature: 'Code Quality & Security',
        octavia: 'ISO 27001, SOC2 & automated SAST QA',
        traditionalAgency: 'Variable QA & legacy coding habits',
        freelancers: 'Minimal testing & security risks',
        inHouseTeam: 'Depends on internal talent depth',
      },
      {
        feature: 'Scalability & Flexibility',
        octavia: 'Instantly scale up/down engineering units',
        traditionalAgency: 'Rigid long-term contract lock-ins',
        freelancers: 'Single point of failure risks',
        inHouseTeam: 'Hard to scale down during slowdowns',
      },
      {
        feature: '24/7 SLA & Maintenance Support',
        octavia: 'Guaranteed 15-min incident response SLA',
        traditionalAgency: 'Extra expensive maintenance add-ons',
        freelancers: 'Unreliable availability post-launch',
        inHouseTeam: 'Requires costly 24/7 on-call rotation',
      },
      {
        feature: 'AI Innovation Capabilities',
        octavia: 'Native LLM, RAG & Agentic AI expertise',
        traditionalAgency: 'Superficial AI wrappers',
        freelancers: 'Limited deep AI specialization',
        inHouseTeam: 'Requires hiring rare AI specialists',
      },
      {
        feature: 'IP & Code Ownership',
        octavia: '100% full legal IP transfer from day 1',
        traditionalAgency: 'Proprietary framework lock-in',
        freelancers: 'Vague IP contract clauses',
        inHouseTeam: 'Full ownership',
      },
    ],
  },

  // 13. Testimonials
  testimonials: {
    badge: 'Client Testimonials',
    heading: 'Trusted by Leaders at High-Growth Enterprises',
    subheading: 'Discover why CTOs, CIOs, and Founders choose Octavia Tech Solutions as their primary digital engineering partner.',
    testimonials: [
      {
        name: 'Sarah Jenkins',
        role: 'Chief Technology Officer',
        company: 'FinSphere Payments',
        avatar: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=200',
        review: 'Octavia Tech Solutions transformed our transaction processing platform. Their senior engineers delivered a sub-20ms microservices architecture in record time while guaranteeing full SOC2 compliance. They operate like a true extension of our leadership team.',
        rating: 5,
      },
      {
        name: 'Marcus Vance',
        role: 'VP of Product Engineering',
        company: 'HealthPulse Global',
        avatar: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=200',
        review: 'The AI integration and HIPAA-compliant data pipeline created by Octavia cut our clinical administrative workload by over 60%. Their attention to security, performance, and clean code documentation is unmatched.',
        rating: 5,
      },
      {
        name: 'Elena Rostova',
        role: 'Founder & CEO',
        company: 'OmniCart Commerce',
        avatar: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&q=80&w=200',
        review: 'Scaling for Black Friday used to keep our team up at night. Octavia re-architected our storefront into a headless cloud platform that effortlessly handled 4x peak traffic without a single glitch. Essential partner for any enterprise.',
        rating: 5,
      },
    ],
  },

  // 14. FAQ Section
  faq: {
    badge: 'Frequently Asked Questions',
    heading: 'Frequently Asked Questions',
    subheading: 'Find clear answers to common questions about our service delivery, engagement models, and technical processes.',
    faqs: [
      {
        question: 'How quickly can Octavia initiate a new engineering engagement?',
        answer:
          'Typically, our team initiates technical discovery within 48 hours of scope alignment. Full engineering team onboarding and sprint kick-off usually take between 3 to 5 business days.',
        category: 'Engagement',
      },
      {
        question: 'Who retains the intellectual property and code rights?',
        answer:
          'You retain 100% full ownership of all code, custom architectures, design assets, and intellectual property created during the engagement. Comprehensive legal IP transfers are executed before development begins.',
        category: 'Legal & IP',
      },
      {
        question: 'Can you integrate with our existing in-house development team?',
        answer:
          'Yes! We offer collaborative staff augmentation and team extension models where our senior developers, architects, and QA engineers integrate directly into your Jira, Slack, CI/CD pipelines, and Scrum ceremonies.',
        category: 'Team Integration',
      },
      {
        question: 'What security standards and compliance frameworks do you follow?',
        answer:
          'Our engineering workflows strictly adhere to ISO 27001, SOC2 Type II, HIPAA, and GDPR standards. All code undergoes automated SAST/DAST security scanning, dependency vulnerability checks, and strict peer code reviews.',
        category: 'Security',
      },
      {
        question: 'How do you guarantee project delivery speed and quality?',
        answer:
          'We operate in 2-week agile sprints with bi-weekly live demos, transparent Jira velocity reporting, and automated CI/CD testing suites that prevent regression bugs before code hits production.',
        category: 'Quality Assurance',
      },
      {
        question: 'What pricing structures do you offer for enterprise projects?',
        answer:
          'We offer flexible engagement pricing customized to your requirements: Fixed-Price milestone delivery for defined project scopes, Time & Materials for evolving software initiatives, or Dedicated Monthly Engineering contracts.',
        category: 'Pricing',
      },
    ],
  },

  // 15. Related Services
  relatedServices: {
    badge: 'Related Capabilities',
    heading: 'Explore Complementary Enterprise Solutions',
    subheading: 'Discover related services engineered to support your end-to-end digital transformation journey.',
    links: [
      {
        title: 'Agentic AI & LLM Engineering',
        category: 'Artificial Intelligence',
        href: '/services/ai-agent-development/ai-chatbots-development',
        description: 'Build autonomous AI agents, custom RAG pipelines, and conversational intelligence for enterprise automation.',
      },
      {
        title: 'Cloud Modernization & DevOps',
        category: 'Cloud Infrastructure',
        href: '/services/cloud-devops/cloud-migration',
        description: 'Migrate legacy workloads to cloud-native microservices with automated CI/CD pipelines and 24/7 SRE monitoring.',
      },
      {
        title: 'Dedicated Engineering Staffing',
        category: 'Staff Augmentation',
        href: '/services/staff-augmentation',
        description: 'Scale your internal software teams within 48 hours with pre-vetted senior software engineers and architects.',
      },
    ],
  },

  // 16. Final CTA
  cta: {
    badge: 'Ready to Transform Your Business?',
    heading: 'Build Your Next Enterprise Solution with Octavia',
    description: 'Partner with our senior engineering team to design, build, and scale custom enterprise solutions that drive competitive market advantage.',
    primaryCtaText: 'Get Free Consultation',
    secondaryCtaText: 'Request Proposal',
    trustNotes: ['100% Confidential NDA', 'Custom Technical Proposal in 48h', 'No Long-Term Lock-in Required'],
  },
};
