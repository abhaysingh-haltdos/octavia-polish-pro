export interface CaseStudyKPI {
  label: string;
  value: string;
  change: string;
  trend: 'up' | 'down';
  description: string;
}

export interface BeforeAfterItem {
  metric: string;
  before: string;
  after: string;
  impact: string;
}

export interface CaseStudy {
  id: string;
  slug: string;
  title: string;
  subtitle: string;
  clientName: string;
  clientLocation: string;
  industry: string; // e.g. "FinTech & Banking", "Healthcare & Life Sciences", "Retail & E-Commerce", "Manufacturing", "Government", "Telecom"
  serviceCategory: string; // e.g. "Custom Enterprise Software", "AI & Machine Learning", "Cloud & DevSecOps", "IT Staff Augmentation", "System Integration"
  solutionCategory: string; // e.g. "Automated Reconciliation", "AI Diagnostic Assistant", "Core Banking Modernization", "Predictive Maintenance"
  technologies: string[];
  projectDuration: string;
  teamSize: string;
  engagementModel: string; // e.g. "Dedicated Managed Team", "Augmented Staffing", "End-to-End Delivery"
  featuredImage: string;
  heroBannerImage: string;
  isFeatured?: boolean;
  isLatest?: boolean;
  publishDate: string;
  
  // High level cards summary
  shortChallenge: string;
  resultHighlight: string;
  
  // Executive Overview & Objectives
  businessOverview: string;
  clientChallenges: string[];
  businessGoals: string[];
  projectObjectives: string[];
  
  // Approach & Architecture
  ourApproach: string;
  discoveryProcess: string[];
  solutionArchitecture: {
    summary: string;
    diagramDescription: string;
    components: { name: string; description: string; tech: string }[];
  };
  
  // Timeline & Features
  implementationProcess: { phase: string; duration: string; summary: string }[];
  keyFeaturesDelivered: { title: string; description: string; iconName?: string }[];
  
  // Results & KPIs
  kpis: CaseStudyKPI[];
  beforeAfter: BeforeAfterItem[];
  
  // Social Proof & Testimonial
  testimonial?: {
    quote: string;
    authorName: string;
    authorRole: string;
    company: string;
    avatar: string;
  };
  
  businessImpact: string[];
  lessonsLearned: string[];
  futureRoadmap: string[];
  
  // SEO Schema & Meta
  seo: {
    metaTitle: string;
    metaDescription: string;
    keywords: string[];
  };

  // Cross-links
  relatedServices: { title: string; href: string }[];
  relatedSolutions: { title: string; href: string }[];
  relatedBlogs: { title: string; slug: string }[];
}

export const CASE_STUDIES_INDUSTRIES = [
  'All',
  'FinTech & Banking',
  'Healthcare & Life Sciences',
  'Retail & E-Commerce',
  'Manufacturing & IoT',
  'Government & Public Sector',
  'Telecom & Media',
  'Logistics & Supply Chain',
];

export const CASE_STUDIES_SERVICES = [
  'All',
  'Custom Enterprise Software',
  'AI & Machine Learning',
  'Cloud & DevSecOps',
  'IT Staff Augmentation',
  'System Integration',
];

export const CASE_STUDIES_TECHNOLOGIES = [
  'All',
  'Next.js / React',
  'Python / PyTorch',
  'QuickBooks API',
  'AWS / Cloud Native',
  'Kubernetes & Docker',
  'Node.js & TypeScript',
  'PostgreSQL / Redis',
  'IoT / Edge Gateway',
];

export const CASE_STUDIES_SOLUTIONS = [
  'All',
  'Automated Reconciliation',
  'AI Diagnostic Assistant',
  'Core Banking Modernization',
  'Predictive Maintenance',
  'Headless Commerce',
  'Citizen Identity Portal',
];

export const CASE_STUDIES: CaseStudy[] = [
  {
    id: 'cs-1',
    slug: 'fixing-reconciliation-accuracy-with-quickbooks-integration',
    title: 'Automated Financial Reconciliation & Enterprise ERP Sync with QuickBooks API',
    subtitle: 'Eliminating $2.4M in annual ledger discrepancies while reducing monthly accounting close time from 14 days to 45 minutes.',
    clientName: 'Apex Financial Solutions',
    clientLocation: 'New York, USA',
    industry: 'FinTech & Banking',
    serviceCategory: 'System Integration',
    solutionCategory: 'Automated Reconciliation',
    technologies: ['QuickBooks API', 'Node.js & TypeScript', 'PostgreSQL / Redis', 'AWS / Cloud Native'],
    projectDuration: '5 Months',
    teamSize: '8 Senior Engineers',
    engagementModel: 'End-to-End Delivery',
    featuredImage: 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=1200&q=80',
    heroBannerImage: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1600&q=80',
    isFeatured: true,
    isLatest: true,
    publishDate: '2026-06-15',
    shortChallenge: 'Manual multi-currency transaction matching across QuickBooks caused 14% error rates and delayed financial audits.',
    resultHighlight: '99.99% reconciliation accuracy, 14 days down to 45 mins close cycle, $2.4M saved in audit overhead.',
    
    businessOverview: 'Apex Financial Solutions manages multi-entity accounting pipelines processing over $850M in annual transactions. Before engaging Octavia Tech Solutions, financial controllers were burdened with fragmented accounting ledgers across regional offices, leading to human entry errors and delayed month-end reporting.',
    clientChallenges: [
      'High error rates in multi-currency transaction matching across 18 regional subsidiary QuickBooks ledgers.',
      'Manual CSV uploads resulting in duplicate records, untracked bank fees, and compliance friction.',
      'Month-end financial close taking up to 14 business days, hindering real-time executive decision-making.',
      'Lack of automated SOC2 audit trails and real-time transaction reconciliation monitoring.',
    ],
    businessGoals: [
      'Achieve 100% automated daily transaction reconciliation with zero data loss.',
      'Reduce monthly accounting closure timeline from weeks to under an hour.',
      'Establish a resilient, SOC2 Type II compliant sync pipeline with QuickBooks Online & Enterprise.',
    ],
    projectObjectives: [
      'Architect a microservices-based middleware for bidirectional QuickBooks API data synchronization.',
      'Build an intelligent fuzzy-matching engine to reconcile invoice payouts, credit memos, and bank statements.',
      'Deploy real-time anomaly detection alerts via Slack and Microsoft Teams for unmatched ledger items.',
    ],
    ourApproach: 'Octavia Tech Solutions deployed a dedicated team of Senior Solutions Architects and Integration Engineers. We conducted an intensive 3-week discovery phase mapping 140+ custom transaction flows, followed by an agile 4-sprint build of a event-driven reconciliation engine using Node.js, Webhooks, Redis streams, and AWS Fargate.',
    discoveryProcess: [
      'Comprehensive audit of legacy ledger schema and accounting workflow bottlenecks.',
      'Webhook resilience mapping to handle QuickBooks API rate limits and token renewals gracefully.',
      'Security posture review ensuring bank-grade AES-256 encryption at rest and in transit.',
    ],
    solutionArchitecture: {
      summary: 'Event-driven, serverless pipeline leveraging QuickBooks API webhooks, Redis Pub/Sub, and an automated rule engine for instant ledger reconciliation.',
      diagramDescription: 'QuickBooks Webhook Event -> AWS API Gateway -> SQS Queue -> Reconciliation Worker Engine (Fargate) -> PostgreSQL Ledger -> Executive Dashboard.',
      components: [
        { name: 'API Gateway & Webhook Receiver', description: 'Handles high-concurrency ledger events with cryptographic verification.', tech: 'AWS API Gateway' },
        { name: 'Fuzzy Matching Rules Engine', description: 'Algorithms matching transaction amounts, dates, reference codes, and conversion rates.', tech: 'Node.js & Redis' },
        { name: 'Resilient Sync Engine', description: 'Manages OAuth 2.0 token refreshes and retry queues for network hiccups.', tech: 'QuickBooks API SDK' },
      ],
    },
    implementationProcess: [
      { phase: 'Phase 1: Architecture & OAuth Integration', duration: 'Weeks 1 - 4', summary: 'Designed SOC2 compliant middleware architecture and secure OAuth 2.0 token management.' },
      { phase: 'Phase 2: Reconciliation Rules Engine', duration: 'Weeks 5 - 12', summary: 'Built fuzzy matching logic supporting 14 currencies and automated error handling.' },
      { phase: 'Phase 3: Sandbox Verification & Pilot', duration: 'Weeks 13 - 16', summary: 'Ran parallel automated reconciliation alongside manual processes to verify 100% accuracy.' },
      { phase: 'Phase 4: Global Enterprise Rollout', duration: 'Weeks 17 - 20', summary: 'Deployed to 18 subsidiaries with live monitoring dashboard and automated daily audit logs.' },
    ],
    keyFeaturesDelivered: [
      { title: 'Real-Time QuickBooks Webhook Sync', description: 'Instant bidirectional synchronization of invoices, purchase orders, and payment logs.' },
      { title: 'Intelligent Fuzzy Matching Engine', description: 'Automatically reconciles 98.4% of transactions without human intervention.' },
      { title: 'Interactive Anomaly Resolution Center', description: 'Unified UI for finance teams to review, flag, or approve edge-case discrepancies in 1 click.' },
      { title: 'Automated Executive Audit Dashboard', description: 'Exportable GAAP & IFRS compliant reports with verifiable ledger provenance.' },
    ],
    kpis: [
      { label: 'Reconciliation Speed', value: '45 Mins', change: '-99.2%', trend: 'down', description: 'Month-end close reduced from 14 days' },
      { label: 'Reconciliation Accuracy', value: '99.99%', change: '+14.2%', trend: 'up', description: 'Eliminated manual entry human errors' },
      { label: 'Annual Audit Savings', value: '$2.4M', change: '+100%', trend: 'up', description: 'Drastic reduction in external auditor hours' },
      { label: 'Processed Volume', value: '$850M+', change: '100% Sync', trend: 'up', description: 'Zero dropped ledger events since launch' },
    ],
    beforeAfter: [
      { metric: 'Month-End Financial Close', before: '14 Business Days', after: '45 Minutes', impact: 'Real-time visibility for executive decisions' },
      { metric: 'Ledger Entry Discrepancy Rate', before: '14.1% Error Rate', after: '0.01% Error Rate', impact: 'Near-zero manual intervention needed' },
      { metric: 'Transaction Processing Time', before: '4 Hours per batch', after: '12 Seconds', impact: 'Instant webhook event reconciliation' },
      { metric: 'Annual Compliance Audit Cost', before: '$3.1M', after: '$700K', impact: '77% reduction in compliance overhead' },
    ],
    testimonial: {
      quote: 'Octavia Tech Solutions transformed our financial backend completely. What used to take two weeks of painful spreadsheet wrangling now happens automatically while we sleep. Their QuickBooks integration expertise is unmatched in the industry.',
      authorName: 'Marcus Vance',
      authorRole: 'Chief Financial Officer',
      company: 'Apex Financial Solutions',
      avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80',
    },
    businessImpact: [
      'Freed up 2,400+ hours annually for senior accounting staff to focus on strategic financial planning.',
      'Passed SOC2 Type II audit with zero findings on ledger integrity and data privacy controls.',
      'Scaled system to support 3x transaction growth without adding administrative headcount.',
    ],
    lessonsLearned: [
      'Proactive handling of OAuth token refreshes and QuickBooks API rate limits is critical for enterprise reliability.',
      'Involving end-user accountants during rule design ensured immediate adoption and trust in automated matching.',
    ],
    futureRoadmap: [
      'Phase 2 expansion: Integrating SAP S/4HANA & NetSuite connector modules.',
      'Machine learning model training for predictive cashflow forecasting.',
    ],
    seo: {
      metaTitle: 'Automated Financial Reconciliation Case Study | Octavia Tech Solutions',
      metaDescription: 'How Octavia Tech Solutions engineered a QuickBooks integration that reduced financial close times from 14 days to 45 minutes with 99.99% accuracy.',
      keywords: ['QuickBooks Integration', 'Automated Reconciliation', 'FinTech ERP Sync', 'Node.js Cloud Architecture'],
    },
    relatedServices: [
      { title: 'System Integration Services', href: '/services/system-integration' },
      { title: 'Custom Enterprise Software', href: '/services/custom-software' },
    ],
    relatedSolutions: [
      { title: 'FinTech ERP Automation', href: '/solutions' },
      { title: 'Cloud Data Pipelines', href: '/solutions' },
    ],
    relatedBlogs: [
      { title: 'Building High-Concurrency Financial Middleware with Node.js', slug: 'building-ai-agent-workflows-langchain-rag' },
      { title: 'Enterprise DevSecOps for SOC2 Financial Compliance', slug: 'cloud-cost-optimization-aws-kubernetes' },
    ],
  },
  {
    id: 'cs-2',
    slug: 'ai-powered-healthcare-diagnostic-platform',
    title: 'HIPAA-Compliant AI Diagnostic Platform & NLP Symptom Engine',
    subtitle: 'Enabling 50+ hospital networks to triage clinical cases 40% faster while ensuring 99.99% patient data security.',
    clientName: 'HealthPulse Global',
    clientLocation: 'Boston, USA',
    industry: 'Healthcare & Life Sciences',
    serviceCategory: 'AI & Machine Learning',
    solutionCategory: 'AI Diagnostic Assistant',
    technologies: ['Python / PyTorch', 'AWS / Cloud Native', 'Kubernetes & Docker', 'Next.js / React'],
    projectDuration: '7 Months',
    teamSize: '12 AI Specialists',
    engagementModel: 'Dedicated Managed Team',
    featuredImage: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=80',
    heroBannerImage: 'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=1600&q=80',
    isFeatured: true,
    isLatest: true,
    publishDate: '2026-05-20',
    shortChallenge: 'Overcrowded ERs faced 4-hour patient triage delays due to manual medical history recording and unstructured EHR intake.',
    resultHighlight: '40% diagnostic time reduction, 50+ hospital networks onboarded, zero HIPAA compliance incidents.',
    
    businessOverview: 'HealthPulse Global operates clinical management networks across the United States. They partnered with Octavia Tech Solutions to engineer an AI clinical assistant capable of parsing multi-modal EHR records and presenting urgency-prioritized insights to attending physicians.',
    clientChallenges: [
      'Long patient intake queues causing delays in acute condition diagnosis.',
      'Unstructured clinical notes trapped across disparate legacy EHR systems.',
      'Strict HIPAA, HITECH, and FDA medical software compliance mandates.',
    ],
    businessGoals: [
      'Automate preliminary symptom analysis with high medical precision.',
      'Deploy an ultra-low latency inference engine on HIPAA-certified cloud infrastructure.',
    ],
    projectObjectives: [
      'Train fine-tuned BioBERT & LLaMA clinical models on de-identified diagnostic data.',
      'Design a web-based clinical dashboard providing real-time triage scoring.',
    ],
    ourApproach: 'We assembled a specialized cross-functional team including Senior ML Engineers, Healthcare Compliance Officers, and Full-Stack Architects to deliver a zero-trust, microservices-driven clinical platform.',
    discoveryProcess: [
      'HIPAA security threat modeling and penetration testing framework setup.',
      'Doctor UX co-design workshops to minimize click fatigue during critical care shifts.',
    ],
    solutionArchitecture: {
      summary: 'Zero-trust HIPAA microservices architecture with encrypted HL7/FHIR data ingestion, GPU acceleration nodes, and React clinical frontend.',
      diagramDescription: 'FHIR EHR Stream -> Encrypted Kafka Pipeline -> Triton Inference Server (PyTorch) -> Clinical Decision Engine -> Physician Dashboard.',
      components: [
        { name: 'FHIR Data Gateway', description: 'Real-time medical record normalization and HL7 parsing.', tech: 'Python & FastHealth' },
        { name: 'Inference Microservice', description: 'Sub-300ms LLM symptom scoring and risk stratification.', tech: 'Triton & PyTorch' },
        { name: 'Physician Portal', description: 'High-contrast, accessible emergency triage interface.', tech: 'Next.js & Tailwind' },
      ],
    },
    implementationProcess: [
      { phase: 'Phase 1: Compliance & Data Pipeline', duration: 'Months 1 - 2', summary: 'HIPAA cloud architecture deployment and FHIR integration.' },
      { phase: 'Phase 2: ML Model Training & Fine-Tuning', duration: 'Months 3 - 4', summary: 'Trained clinical triage models with 96.8% diagnostic validation.' },
      { phase: 'Phase 3: Hospital Network Integration', duration: 'Months 5 - 6', summary: 'Pilot rollout across 8 emergency departments.' },
      { phase: 'Phase 4: Scaled Production Deployment', duration: 'Month 7', summary: 'Full launch to 50+ hospital networks.' },
    ],
    keyFeaturesDelivered: [
      { title: 'NLP Clinical Note Summarization', description: 'Converts long patient histories into concise 10-second summaries.' },
      { title: 'Urgency Triage Scoring', description: 'Flags critical cardiovascular and respiratory indicators automatically.' },
      { title: 'FHIR / HL7 Interoperability', description: 'Seamless bidirectional sync with Epic, Cerner, and Allscripts EHRs.' },
    ],
    kpis: [
      { label: 'Diagnostic Time', value: '-40%', change: '-40%', trend: 'down', description: 'Reduction in triage wait times' },
      { label: 'Hospitals Served', value: '50+', change: '+500%', trend: 'up', description: 'Across US healthcare networks' },
      { label: 'Patient Uptime', value: '99.99%', change: 'High SLA', trend: 'up', description: 'Zero unplanned downtime' },
      { label: 'Triage Accuracy', value: '96.8%', change: '+18%', trend: 'up', description: 'Validated by clinical trials' },
    ],
    beforeAfter: [
      { metric: 'Emergency Triage Duration', before: '45 Minutes', after: '12 Minutes', impact: 'Accelerated critical care delivery' },
      { metric: 'EHR Intake Data Entry Time', before: '25 Mins per patient', after: '3 Mins per patient', impact: 'Saved 3.5 hours per nurse shift' },
      { metric: 'System Availability SLA', before: '98.5%', after: '99.99%', impact: 'High-availability mission critical cloud' },
      { metric: 'HIPAA Compliance Findings', before: 'Multiple audit risks', after: 'Zero audit findings', impact: 'Complete regulatory safety' },
    ],
    testimonial: {
      quote: 'The AI platform developed by Octavia Tech Solutions has saved lives in our emergency rooms. The symptom prioritization is accurate, instant, and completely integrated with our Epic EHR system.',
      authorName: 'Dr. Sarah Jenkins',
      authorRole: 'Chief Medical Information Officer',
      company: 'HealthPulse Global',
      avatar: 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=300&q=80',
    },
    businessImpact: [
      'Processed over 1.2 million patient triage interactions in the first year of operation.',
      'Reduced ER patient walkout rates by 34% due to dramatically shorter initial wait times.',
    ],
    lessonsLearned: [
      'Close collaboration with attending physicians during UI design was essential for clinical trust.',
    ],
    futureRoadmap: [
      'Integrating medical imaging AI for automated X-Ray and CT scan preliminary reads.',
    ],
    seo: {
      metaTitle: 'AI Healthcare Diagnostic Platform Case Study | Octavia Tech Solutions',
      metaDescription: 'Discover how Octavia Tech Solutions engineered a HIPAA-compliant AI diagnostic assistant reducing clinical triage time by 40% for 50+ hospital networks.',
      keywords: ['AI Healthcare', 'HIPAA Cloud Architecture', 'PyTorch Medical AI', 'FHIR Integration'],
    },
    relatedServices: [
      { title: 'AI & Machine Learning Services', href: '/services/ai-ml' },
      { title: 'Custom Enterprise Software', href: '/services/custom-software' },
    ],
    relatedSolutions: [
      { title: 'Healthcare Triage Automation', href: '/solutions' },
    ],
    relatedBlogs: [
      { title: 'Building HIPAA-Compliant AI Pipelines on AWS', slug: 'building-ai-agent-workflows-langchain-rag' },
    ],
  },
  {
    id: 'cs-3',
    slug: 'digital-banking-core-modernization-and-biometrics',
    title: 'Cloud-Native Core Banking Platform & Real-Time Biometric Fraud Shield',
    subtitle: 'Modernizing legacy core infrastructure to process $12B+ in secure annual digital transactions with sub-second response times.',
    clientName: 'Meridian Capital Bank',
    clientLocation: 'London, UK',
    industry: 'FinTech & Banking',
    serviceCategory: 'Custom Enterprise Software',
    solutionCategory: 'Core Banking Modernization',
    technologies: ['Node.js & TypeScript', 'AWS / Cloud Native', 'Kubernetes & Docker', 'Next.js / React'],
    projectDuration: '10 Months',
    teamSize: '16 Engineers',
    engagementModel: 'End-to-End Delivery',
    featuredImage: 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=1200&q=80',
    heroBannerImage: 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=1600&q=80',
    isFeatured: false,
    isLatest: true,
    publishDate: '2026-04-10',
    shortChallenge: 'Monolithic legacy mainframes struggled with mobile app traffic spikes and high fraud vulnerability.',
    resultHighlight: '$12B+ processed annually, 4.8★ app store rating, 82% reduction in fraudulent transfer attempts.',
    
    businessOverview: 'Meridian Capital Bank is a premier European retail and commercial institution. They hired Octavia Tech Solutions to architect a modern cloud-native digital banking core capable of serving 3.5 million active mobile users.',
    clientChallenges: [
      'Legacy mainframe bottlenecks causing 8-second account balance load times.',
      'Inability to launch new digital banking features quickly due to rigid monolithic codebase.',
      'Surging account takeover fraud attempts targeting mobile payment rails.',
    ],
    businessGoals: [
      'Decompose legacy core into resilient event-driven microservices on Kubernetes.',
      'Implement real-time biometric step-up authentication and ML fraud risk scoring.',
    ],
    projectObjectives: [
      'Engineered an ultra-secure REST & GraphQL API gateway for mobile banking apps.',
      'Deploy multi-region cloud active-active database replication with zero data loss.',
    ],
    ourApproach: 'We executed a strangler-fig migration strategy, incrementally replacing legacy mainframe APIs with high-throughput TypeScript microservices running on EKS.',
    discoveryProcess: [
      'In-depth PCI-DSS Level 1 audit and open banking UK PSD2 compliance review.',
    ],
    solutionArchitecture: {
      summary: 'Kubernetes cloud-native banking microservices with Apache Kafka event bus, Redis cache cluster, and multi-region Aurora PostgreSQL.',
      diagramDescription: 'Mobile Client -> Cloudflare WAF -> Kong API Gateway -> Fraud ML Service -> Core Transaction Microservice -> Kafka -> Ledger DB.',
      components: [
        { name: 'Kong API Gateway', description: 'Handles rate limiting, mTLS security, and JWT verification.', tech: 'Kong & Redis' },
        { name: 'Biometric Fraud Engine', description: 'Evaluates 120 behavioral signals in under 40 milliseconds.', tech: 'Python & XGBoost' },
        { name: 'Core Transaction Service', description: 'ACID-compliant transaction ledger with double-entry validation.', tech: 'Node.js & PostgreSQL' },
      ],
    },
    implementationProcess: [
      { phase: 'Phase 1: Security & API Gateway', duration: 'Months 1 - 3', summary: 'Established zero-trust network perimeter and API gateway.' },
      { phase: 'Phase 2: Microservices & Fraud Engine', duration: 'Months 4 - 6', summary: 'Migrated account management and deployed ML fraud shield.' },
      { phase: 'Phase 3: Mobile App & Core Integration', duration: 'Months 7 - 8', summary: 'Released new React Native mobile app powered by Next.js backend.' },
      { phase: 'Phase 4: Full Traffic Cutover', duration: 'Months 9 - 10', summary: 'Seamlessly migrated 3.5 million active accounts to cloud core.' },
    ],
    keyFeaturesDelivered: [
      { title: 'Sub-Second Account Sync', description: 'Instant balance updates and real-time push notifications.' },
      { title: 'Biometric Step-Up Security', description: 'FIDO2 / WebAuthn biometric verification for high-value wire transfers.' },
      { title: 'Open Banking API Portal', description: 'PSD2 compliant third-party integration APIs for FinTech ecosystem.' },
    ],
    kpis: [
      { label: 'Annual Volume', value: '$12B+', change: '100% Cloud', trend: 'up', description: 'Processed through new core' },
      { label: 'Fraud Reduction', value: '-82%', change: '-82%', trend: 'down', description: 'Attempted fraud blocked' },
      { label: 'Mobile App Rating', value: '4.8★', change: 'from 3.1★', trend: 'up', description: 'App Store & Google Play' },
      { label: 'API Response Time', value: '85ms', change: '-98%', trend: 'down', description: 'Reduced from 8 seconds' },
    ],
    beforeAfter: [
      { metric: 'Account Balance Fetch Time', before: '8.2 Seconds', after: '85 Milliseconds', impact: 'Instant responsive mobile user experience' },
      { metric: 'Account Takeover Fraud', before: '$4.2M annual loss', after: '$180K annual loss', impact: '82% decrease in fraud write-offs' },
      { metric: 'Deployment Frequency', before: 'Once every 3 months', after: '45 deployments per week', impact: 'Agile feature releases for digital users' },
      { metric: 'Peak Load Capacity', before: '1,200 TPS max', after: '25,000 TPS verified', impact: 'Seamless Black Friday & payday traffic' },
    ],
    testimonial: {
      quote: 'Octavia Tech Solutions delivered our digital banking transformation ahead of schedule and with zero customer interruption. Our mobile app ratings shot up to 4.8 stars immediately.',
      authorName: 'David Sterling',
      authorRole: 'Chief Technology Officer',
      company: 'Meridian Capital Bank',
      avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=300&q=80',
    },
    businessImpact: [
      'Enabled Meridian Capital Bank to launch 6 new credit product lines within 90 days.',
      'Achieved PCI-DSS Level 1 certification with highest audit accolades.',
    ],
    lessonsLearned: [
      'Event-driven Kafka streaming simplified real-time fraud monitoring across distributed channels.',
    ],
    futureRoadmap: [
      'Integrating GenAI conversational assistant for automated customer support.',
    ],
    seo: {
      metaTitle: 'Core Banking Modernization Case Study | Octavia Tech Solutions',
      metaDescription: 'Read how Octavia Tech Solutions built a cloud-native banking platform processing $12B+ with sub-second performance and 82% fraud reduction.',
      keywords: ['Core Banking Modernization', 'FinTech Cloud Infrastructure', 'Node.js Banking API', 'Fraud Prevention Engine'],
    },
    relatedServices: [
      { title: 'Custom Enterprise Software', href: '/services/custom-software' },
      { title: 'Cloud & DevSecOps Services', href: '/services/cloud-devops' },
    ],
    relatedSolutions: [
      { title: 'Digital Banking Core', href: '/solutions' },
    ],
    relatedBlogs: [
      { title: 'Cloud-Native Security Best Practices for Enterprise Banks', slug: 'cloud-cost-optimization-aws-kubernetes' },
    ],
  },
  {
    id: 'cs-4',
    slug: 'headless-ecommerce-and-ai-recommendation-engine',
    title: 'Headless Global E-Commerce Architecture & AI Recommendation Engine',
    subtitle: 'Scaling luxury retail digital infrastructure to handle 500K+ peak concurrent shoppers with 3.2x revenue growth.',
    clientName: 'LuxeLiving International',
    clientLocation: 'Paris, France',
    industry: 'Retail & E-Commerce',
    serviceCategory: 'Custom Enterprise Software',
    solutionCategory: 'Headless Commerce',
    technologies: ['Next.js / React', 'Node.js & TypeScript', 'AWS / Cloud Native', 'PostgreSQL / Redis'],
    projectDuration: '6 Months',
    teamSize: '10 Engineers',
    engagementModel: 'End-to-End Delivery',
    featuredImage: 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1200&q=80',
    heroBannerImage: 'https://images.unsplash.com/photo-1472851294608-062f824d29cc?auto=format&fit=crop&w=1600&q=80',
    isFeatured: false,
    isLatest: false,
    publishDate: '2026-03-01',
    shortChallenge: 'Monolithic e-commerce platform suffered site crashes during high-traffic flash sales and poor search relevance.',
    resultHighlight: '3.2x digital revenue surge, 500K peak concurrency handled, 1.4s global page load time.',
    
    businessOverview: 'LuxeLiving is an international high-end home decor and fashion retailer operating in 22 countries. They selected Octavia Tech Solutions to re-architect their global digital storefront into a headless, ultra-fast Next.js architecture.',
    clientChallenges: [
      'Frequent site outages during holiday promotional campaigns.',
      'Slow mobile page loading times (4.8 seconds average).',
      'Low cross-sell conversion due to static product recommendation grids.',
    ],
    businessGoals: [
      'Migrate to a headless storefront with localized currency, tax, and inventory routing.',
      'Deploy an AI personalization engine boosting average order value (AOV).',
    ],
    projectObjectives: [
      'Build Next.js web application utilizing edge server-side rendering (SSR).',
      'Integrate Shopify Plus GraphQL APIs with custom microservices middleware.',
    ],
    ourApproach: 'We implemented a composable commerce stack decoupling the frontend UX from backend commerce services, powered by Next.js App Router and Vercel Edge Network.',
    discoveryProcess: [
      'Global CDN edge latency mapping across Europe, North America, and Asia-Pacific regions.',
    ],
    solutionArchitecture: {
      summary: 'Headless Next.js e-commerce application powered by GraphQL middleware, Algolia search, and personalized AI recommendation services.',
      diagramDescription: 'Browser -> Vercel Edge Network -> Next.js SSR Storefront -> GraphQL Layer -> Shopify Plus & Vector AI Engine.',
      components: [
        { name: 'Next.js Edge Storefront', description: 'Sub-second page renders with localized internationalization.', tech: 'Next.js & React' },
        { name: 'Personalization ML API', description: 'Real-time vector search matching user browse history to visual items.', tech: 'Python & Qdrant' },
        { name: 'Global Inventory Router', description: 'Real-time stock reservation across 45 regional fulfillment hubs.', tech: 'Node.js & Redis' },
      ],
    },
    implementationProcess: [
      { phase: 'Phase 1: Architecture & UX Design', duration: 'Months 1 - 2', summary: 'Designed luxury mobile-first UI and headless API integration.' },
      { phase: 'Phase 2: Storefront & AI Personalization', duration: 'Months 3 - 4', summary: 'Built Next.js components and integrated real-time recommendation vector models.' },
      { phase: 'Phase 3: High-Load Stress Testing', duration: 'Month 5', summary: 'Simulated 750,000 concurrent users with zero latency degradation.' },
      { phase: 'Phase 4: Global Multi-Region Launch', duration: 'Month 6', summary: 'Rolled out across 22 country domains.' },
    ],
    keyFeaturesDelivered: [
      { title: 'Sub-Second Page Load Speed', description: 'Edge-rendered product pages loading in 1.4 seconds worldwide.' },
      { title: 'Visual AI Recommendation Grid', description: 'Dynamic "Shop the Look" machine learning suggestions.' },
      { title: 'Instant Multi-Currency Checkout', description: 'Local payment gateway routing with Apple Pay and local credit rails.' },
    ],
    kpis: [
      { label: 'Revenue Growth', value: '3.2x', change: '+220%', trend: 'up', description: 'Year-over-year digital sales surge' },
      { label: 'Peak Concurrency', value: '500K+', change: 'Zero crashes', trend: 'up', description: 'During Black Friday flash sale' },
      { label: 'Page Load Speed', value: '1.4s', change: '-70%', trend: 'down', description: 'Global average across all devices' },
      { label: 'AOV Increase', value: '+38%', change: '+38%', trend: 'up', description: 'Driven by AI recommendation engine' },
    ],
    beforeAfter: [
      { metric: 'Global Average Page Load Time', before: '4.8 Seconds', after: '1.4 Seconds', impact: 'Drastic reduction in cart bounce rate' },
      { metric: 'Cart Conversion Rate', before: '1.8%', after: '4.2%', impact: '133% increase in checkout completions' },
      { metric: 'Flash Sale Max Concurrency', before: '45,000 users (crashed)', after: '500,000+ users (smooth)', impact: '100% uptime during peak holiday sales' },
      { metric: 'Mobile Traffic Revenue Share', before: '32%', after: '68%', impact: 'Mobile-first UX driving revenue majority' },
    ],
    testimonial: {
      quote: 'The headless e-commerce architecture built by Octavia Tech Solutions completely revolutionized our global business. We handled our biggest Black Friday in company history with zero slowdowns and record-breaking revenues.',
      authorName: 'Claire Laurent',
      authorRole: 'Global VP of Digital Commerce',
      company: 'LuxeLiving International',
      avatar: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300&q=80',
    },
    businessImpact: [
      'Drove $140M in additional digital revenue in the first 12 months following launch.',
      'Reduced cloud infrastructure server costs by 42% through edge caching.',
    ],
    lessonsLearned: [
      'Next.js Incremental Static Regeneration (ISR) provided the ideal balance between instant page loads and live stock updates.',
    ],
    futureRoadmap: [
      'AR virtual try-on module for mobile shoppers.',
    ],
    seo: {
      metaTitle: 'Headless E-Commerce Case Study | Octavia Tech Solutions',
      metaDescription: 'Learn how Octavia Tech Solutions built a Next.js headless e-commerce platform that boosted global sales by 3.2x for luxury retailer LuxeLiving.',
      keywords: ['Headless Commerce', 'Next.js E-Commerce', 'Shopify GraphQL', 'Personalization AI'],
    },
    relatedServices: [
      { title: 'Custom Enterprise Software', href: '/services/custom-software' },
      { title: 'System Integration Services', href: '/services/system-integration' },
    ],
    relatedSolutions: [
      { title: 'Headless Retail Architecture', href: '/solutions' },
    ],
    relatedBlogs: [
      { title: 'Optimizing Next.js Web Vitals for High-Volume E-Commerce', slug: 'optimizing-nextjs-15-enterprise-performance' },
    ],
  },
  {
    id: 'cs-5',
    slug: 'smart-factory-iot-predictive-maintenance',
    title: 'Smart Factory Industry 4.0 IoT & Machine Learning Predictive Engine',
    subtitle: 'Connecting 5,000+ industrial sensors to predict equipment failures 48 hours in advance, avoiding $6.8M in unplanned downtime.',
    clientName: 'Vanguard Industrial Dynamics',
    clientLocation: 'Munich, Germany',
    industry: 'Manufacturing & IoT',
    serviceCategory: 'AI & Machine Learning',
    solutionCategory: 'Predictive Maintenance',
    technologies: ['IoT / Edge Gateway', 'Python / PyTorch', 'AWS / Cloud Native', 'Kubernetes & Docker'],
    projectDuration: '8 Months',
    teamSize: '14 Engineers',
    engagementModel: 'End-to-End Delivery',
    featuredImage: 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1200&q=80',
    heroBannerImage: 'https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=1600&q=80',
    isFeatured: false,
    isLatest: false,
    publishDate: '2026-02-14',
    shortChallenge: 'Unplanned robotic arm and CNC machine breakdowns cost $85,000 per hour in idle assembly line losses.',
    resultHighlight: '94% failure prediction accuracy, 1,200 downtime hours avoided, $6.8M saved annually.',
    
    businessOverview: 'Vanguard Industrial Dynamics operates automotive manufacturing plants across Central Europe. They engaged Octavia Tech Solutions to deploy a unified IoT telematics platform monitoring temperature, vibration, and power draw across 5,000 heavy industrial machines.',
    clientChallenges: [
      'Sudden bearing overheating causing catastrophic CNC spindle destruction.',
      'Manual technician floor rounds missing early acoustic anomaly indicators.',
      'Data isolation between legacy SCADA systems and corporate ERP software.',
    ],
    businessGoals: [
      'Build edge-computing telemetry gateway processing 100,000 sensor telemetry metrics per second.',
      'Train anomaly detection ML models predicting mechanical fatigue 48 hours prior to breakdown.',
    ],
    projectObjectives: [
      'Deploy Dockerized MQTT edge gateways on Siemens and Allen-Bradley hardware.',
      'Develop real-time maintenance dispatch dashboard integrated with SAP PM.',
    ],
    ourApproach: 'Octavia Tech Solutions engineered an MQTT edge-to-cloud telemetry ingestion pipeline powered by AWS IoT Greengrass, Apache Flink real-time stream processing, and PyTorch time-series anomaly detection models.',
    discoveryProcess: [
      'On-site signal analysis and vibration sensor calibration across 4 assembly plants.',
    ],
    solutionArchitecture: {
      summary: 'Edge-cloud hybrid telemetry platform streaming sensor data via MQTT to time-series machine learning models with automated SAP work order creation.',
      diagramDescription: 'Factory Sensors -> MQTT Edge Gateway -> AWS IoT Core -> Kinesis Stream -> PyTorch ML Predictor -> SAP Work Order API.',
      components: [
        { name: 'MQTT Edge Gateway', description: 'Filters noise and buffers telemetry locally during network drops.', tech: 'AWS Greengrass & Docker' },
        { name: 'Time-Series ML Pipeline', description: 'LSTM neural network analyzing frequency spectrum for micro-cracks.', tech: 'Python & PyTorch' },
        { name: 'Plant Dispatch Web Portal', description: 'Interactive 3D factory floor map highlighting machine health status.', tech: 'React & Three.js' },
      ],
    },
    implementationProcess: [
      { phase: 'Phase 1: Edge Telemetry Setup', duration: 'Months 1 - 2', summary: 'Installed sensor gateways and MQTT telemetry broker.' },
      { phase: 'Phase 2: ML Model Training', duration: 'Months 3 - 5', summary: 'Trained LSTM model on 18 months of historical failure telemetry logs.' },
      { phase: 'Phase 3: SAP PM Automated Workflows', duration: 'Months 6 - 7', summary: 'Automated technician work order dispatch upon anomaly detection.' },
      { phase: 'Phase 4: Multi-Plant Rollout', duration: 'Month 8', summary: 'Deployed across 4 manufacturing facilities.' },
    ],
    keyFeaturesDelivered: [
      { title: '48-Hour Failure Advance Alert', description: 'Notifies floor supervisors before mechanical breakdown occurs.' },
      { title: 'Interactive 3D Plant Floor Map', description: 'Real-time color-coded health status for all 5,000 industrial assets.' },
      { title: 'Automated SAP Parts Ordering', description: 'Triggers replacement component shipment automatically when wear reaches threshold.' },
    ],
    kpis: [
      { label: 'Predictive Accuracy', value: '94%', change: 'High Precision', trend: 'up', description: 'Validated breakdown alerts' },
      { label: 'Downtime Avoided', value: '1,200 Hrs', change: '1,200 hrs', trend: 'down', description: 'Prevented line stops' },
      { label: 'Annual Cost Savings', value: '$6.8M', change: '+$6.8M', trend: 'up', description: 'In repair and lost productivity' },
      { label: 'Sensors Connected', value: '5,000+', change: '100k msg/sec', trend: 'up', description: 'Real-time MQTT telemetry' },
    ],
    beforeAfter: [
      { metric: 'Unplanned Machinery Breakdown', before: '148 Hours per month', after: '8 Hours per month', impact: '94% reduction in assembly line halts' },
      { metric: 'Mean Time To Repair (MTTR)', before: '18.5 Hours', after: '3.2 Hours', impact: 'Parts pre-staged before technicians arrive' },
      { metric: 'Maintenance Operating Expense', before: '$12.4M per year', after: '$5.6M per year', impact: '54% operational cost savings' },
      { metric: 'Equipment Useful Life', before: '5 Years average', after: '7.5 Years average', impact: '50% capital expenditure extension' },
    ],
    testimonial: {
      quote: 'The predictive maintenance system created by Octavia Tech Solutions paid for itself within the first 60 days. Identifying a turbine failure two days before it occurred saved us over $1.2M in a single afternoon.',
      authorName: 'Hans Weber',
      authorRole: 'VP of Manufacturing Operations',
      company: 'Vanguard Industrial Dynamics',
      avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=300&q=80',
    },
    businessImpact: [
      'Avoided $6.8M in emergency repair costs and lost product inventory during year one.',
      'Improved overall equipment effectiveness (OEE) score from 68% to 89%.',
    ],
    lessonsLearned: [
      'Edge data filtering was essential to prevent cloud bandwidth congestion from raw high-frequency vibration streams.',
    ],
    futureRoadmap: [
      'Deploying AR smart glasses guidance for field repair technicians.',
    ],
    seo: {
      metaTitle: 'Smart Factory IoT & Predictive Maintenance Case Study | Octavia Tech Solutions',
      metaDescription: 'See how Octavia Tech Solutions engineered an Industry 4.0 IoT platform predicting machine failures 48 hours in advance for Vanguard Industrial.',
      keywords: ['Predictive Maintenance', 'IoT Factory Telemetry', 'PyTorch Anomaly Detection', 'Industry 4.0'],
    },
    relatedServices: [
      { title: 'AI & Machine Learning Services', href: '/services/ai-ml' },
      { title: 'System Integration Services', href: '/services/system-integration' },
    ],
    relatedSolutions: [
      { title: 'IoT Telematics Platform', href: '/solutions' },
    ],
    relatedBlogs: [
      { title: 'Building Real-Time IoT Data Pipelines with Python & Kafka', slug: 'building-ai-agent-workflows-langchain-rag' },
    ],
  },
  {
    id: 'cs-6',
    slug: 'omnichannel-telecom-cx-genai-automation',
    title: 'GenAI Telecom Customer Experience Platform & Automated Support Workflow',
    subtitle: 'Resolving 60% of routine subscriber support requests automatically while cutting support costs by 45%.',
    clientName: 'TelcoOne Communications',
    clientLocation: 'Toronto, Canada',
    industry: 'Telecom & Media',
    serviceCategory: 'AI & Machine Learning',
    solutionCategory: 'Automated Support Workflow',
    technologies: ['Python / PyTorch', 'Next.js / React', 'Node.js & TypeScript', 'AWS / Cloud Native'],
    projectDuration: '5 Months',
    teamSize: '9 AI Engineers',
    engagementModel: 'Augmented Staffing',
    featuredImage: 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1200&q=80',
    heroBannerImage: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1600&q=80',
    isFeatured: false,
    isLatest: false,
    publishDate: '2026-01-28',
    shortChallenge: 'Call center queues averaged 22-minute wait times during network maintenance or billing cycles.',
    resultHighlight: '60% autonomous resolution, 45% support cost reduction, CSAT increased to 88%.',
    
    businessOverview: 'TelcoOne Communications serves over 6 million mobile and fiber internet subscribers in North America. They partnered with Octavia Tech Solutions to deploy a multi-channel GenAI assistant across Web, iOS, Android, and WhatsApp channels.',
    clientChallenges: [
      'High call volume overwhelming human support agents with repetitive billing queries.',
      'Frustrated customers experiencing long call wait times.',
      'Siloed subscriber management systems delaying account changes.',
    ],
    businessGoals: [
      'Automate 50%+ of tier-1 support interactions using conversational LLM workflows.',
      'Enable instant SIM swap, plan upgrade, and router troubleshooting self-service.',
    ],
    projectObjectives: [
      'Deploy custom RAG pipeline connected to TelcoOne knowledge base and CRM APIs.',
    ],
    ourApproach: 'We deployed a high-speed GenAI agent framework utilizing Gemini Flash models, vector search, and secure back-office system connectors.',
    discoveryProcess: [
      'Audited 50,000 anonymized call transcripts to identify top automated resolution journeys.',
    ],
    solutionArchitecture: {
      summary: 'Omnichannel conversational platform leveraging Gemini Flash LLMs, Pinecone vector search, and REST middleware to Amdocs billing systems.',
      diagramDescription: 'User (WhatsApp/Web) -> WebSocket Gateway -> RAG Router -> Gemini Flash Model -> Telco Billing API -> Instant Response.',
      components: [
        { name: 'Omnichannel Adapter', description: 'Unified messaging handler for WhatsApp, SMS, and Web.', tech: 'Node.js & WebSockets' },
        { name: 'Telco RAG Engine', description: 'Matches subscriber intent to official KB articles and live account state.', tech: 'Python & Pinecone' },
        { name: 'Self-Service Execution Worker', description: 'Executes account changes with strict biometric step-up checks.', tech: 'TypeScript & Express' },
      ],
    },
    implementationProcess: [
      { phase: 'Phase 1: Intent Mapping & Knowledge Graph', duration: 'Weeks 1 - 4', summary: 'Structured telecom KB articles and account APIs.' },
      { phase: 'Phase 2: RAG Pipeline & Safety Guardrails', duration: 'Weeks 5 - 12', summary: 'Built GenAI conversational flows with strict PII masking.' },
      { phase: 'Phase 3: Omnichannel Deployment', duration: 'Weeks 13 - 16', summary: 'Integrated WhatsApp, mobile app, and web widget.' },
      { phase: 'Phase 4: Production Scale', duration: 'Weeks 17 - 20', summary: 'Expanded to full 6M subscriber base.' },
    ],
    keyFeaturesDelivered: [
      { title: 'Instant Router Diagnostic Workflow', description: 'Guides fiber customers through automated line reset and Wi-Fi optimization.' },
      { title: 'Self-Service Plan Change', description: 'Upgrades data plans and activates eSIMs in under 30 seconds.' },
      { title: 'PII Sanitization Shield', description: 'Redacts credit cards and passwords before LLM context injection.' },
    ],
    kpis: [
      { label: 'Autonomous Resolution', value: '60%', change: '+60%', trend: 'up', description: 'Tier-1 tickets resolved without human' },
      { label: 'Support Cost Reduction', value: '-45%', change: '-45%', trend: 'down', description: 'Call center overhead savings' },
      { label: 'CSAT Score', value: '88%', change: 'from 54%', trend: 'up', description: 'Post-interaction subscriber rating' },
      { label: 'Average Handle Time', value: '45 sec', change: '-92%', trend: 'down', description: 'Reduced from 12 minutes' },
    ],
    beforeAfter: [
      { metric: 'Support Call Queue Wait Time', before: '22 Minutes', after: '0 Seconds (Instant)', impact: 'Immediate customer response across channels' },
      { metric: 'Cost Per Support Ticket', before: '$8.50', after: '$0.85', impact: '90% decrease in per-ticket resolution cost' },
      { metric: 'First Contact Resolution (FCR)', before: '48%', after: '84%', impact: 'Drastic decrease in repeat support calls' },
      { metric: 'Monthly Agent Turnover', before: '14%', after: '3.5%', impact: 'Reduced agent burnout from repetitive tasks' },
    ],
    testimonial: {
      quote: 'Octavia Tech Solutions transformed our customer experience. Their GenAI solution resolved millions of tickets seamlessly, driving our customer satisfaction score to an all-time high of 88%.',
      authorName: 'Michael Chang',
      authorRole: 'Chief Operations Officer',
      company: 'TelcoOne Communications',
      avatar: 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=300&q=80',
    },
    businessImpact: [
      'Saved $14.2M in annual call center operating costs.',
      'Handled 4.8 million customer queries autonomously during winter storm network disruptions.',
    ],
    lessonsLearned: [
      'Strict input/output sanitization guardrails built customer trust in AI resolutions.',
    ],
    futureRoadmap: [
      'Adding real-time voice-to-voice GenAI phone support agent.',
    ],
    seo: {
      metaTitle: 'Telecom GenAI CX Case Study | Octavia Tech Solutions',
      metaDescription: 'Read how Octavia Tech Solutions built an omnichannel GenAI support platform for TelcoOne, resolving 60% of tickets automatically with 45% cost savings.',
      keywords: ['Telecom GenAI', 'RAG Customer Service', 'Gemini AI Integration', 'CX Automation'],
    },
    relatedServices: [
      { title: 'AI & Machine Learning Services', href: '/services/ai-ml' },
      { title: 'Custom Enterprise Software', href: '/services/custom-software' },
    ],
    relatedSolutions: [
      { title: 'GenAI Support Automation', href: '/solutions' },
    ],
    relatedBlogs: [
      { title: 'Building AI Agent Workflows with LangChain and RAG', slug: 'building-ai-agent-workflows-langchain-rag' },
    ],
  },
];
