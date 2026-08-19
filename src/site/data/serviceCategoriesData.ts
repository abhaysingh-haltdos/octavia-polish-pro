import { ServicePageData } from '../types/service';
import { GENERIC_SERVICE_TEMPLATE_DATA } from './serviceTemplateData';
import { WEB_DEVELOPMENT_SUBPAGES } from './webDevelopmentServicesData';
import { SOFTWARE_DEVELOPMENT_SUBPAGES } from './softwareDevelopmentServicesData';
import { MOBILE_APP_DEVELOPMENT_SUBPAGES } from './mobileAppDevelopmentServicesData';
import { AI_AGENTIC_AI_SUBPAGES } from './aiAgenticAiServicesData';
import { PRODUCT_ENGINEERING_SUBPAGES } from './productEngineeringServicesData';
import { CLOUD_DATA_DEVOPS_SUBPAGES } from './cloudDataDevopsServicesData';
import { IT_STAFF_AUGMENTATION_SUBPAGES } from './itStaffAugmentationServicesData';

function formatSlugToTitle(slug: string): string {
  if (!slug || slug === 'generic') return 'Enterprise Technology Services';
  return slug
    .split(/[-_/]+/)
    .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
    .join(' ');
}

// 1. Web Development Specific Page Data
const WEB_DEV_PAGE_DATA: ServicePageData = {
  ...GENERIC_SERVICE_TEMPLATE_DATA,
  id: 'web-development',
  serviceCategory: 'Web Development Services',
  metaTitle: 'Enterprise Web Development & Headless Architecture | Octavia Tech Solutions',
  seo: {
    h1: 'Enterprise Web Development Services',
    metaTitle: 'Enterprise Web Development & Headless Architecture | Octavia Tech Solutions',
    metaDescription: 'Scale your web presence with high-performance Web Applications, Next.js SSR, PWA, and Headless CMS architectures engineered by Octavia Tech Solutions.',
    canonicalUrl: 'https://octaviatechnologies.com/services/web-development',
    breadcrumbs: [
      { name: 'Home', href: '/' },
      { name: 'Services', href: '/services' },
      { name: 'Web Development', href: '/services/web-development' },
    ],
  },
  hero: {
    badge: 'Web Development Engineering',
    title: 'Craft High-Performance Web Applications with',
    titleHighlight: 'Modern Frontend & Headless Architectures',
    description: 'Engineering responsive, lightning-fast web applications, PWA experiences, and scalable enterprise web platforms using React, Next.js, TypeScript, and headless CMS integrations.',
    primaryCtaText: 'Get Free Web Audit',
    secondaryCtaText: 'Request Web Proposal',
    graphicBadge: 'Next.js & SSR Engine',
    graphicTitle: 'Sub-Second Web Performance',
    graphicSubtext: 'Optimized Lighthouse 95+ scores, edge caching, and WCAG AA accessible layouts.',
    tags: ['Next.js & SSR', 'Micro-Frontends', 'Headless CMS', 'PWA & Core Web Vitals'],
  },
  overview: {
    badge: 'Web Architecture Overview',
    heading: 'Engineering Modern, SEO-First Web Applications & Headless Ecosystems',
    leadParagraph: 'We build enterprise web platforms engineered for lightning-fast page loading, zero layout shifts, and seamless user journeys. By decoupling frontend presentation from backend logic, we enable omni-channel publishing and unlimited scaling.',
    secondaryParagraph: 'From complex SaaS portals and multi-region e-commerce hubs to progressive web apps (PWA), our frontend engineers apply modern component architectures and micro-frontend patterns.',
    pillars: [
      { title: 'Sub-Second Loading', description: 'Server-side rendering (SSR), static site generation (SSG), and edge CDN asset distribution.', iconName: 'Zap' },
      { title: 'Headless Flexibility', description: 'Decoupled web architecture using Strapi, Sanity, Contentful, or custom GraphQL APIs.', iconName: 'Layers' },
      { title: 'Universal Accessibility', description: 'Semantic HTML5, ARIA compliance, and cross-browser responsiveness built-in from day one.', iconName: 'Globe' },
      { title: 'SEO & Web Vitals', description: 'Perfect Core Web Vitals (LCP, FID, CLS) optimization for maximum search rankings.', iconName: 'TrendingUp' },
    ],
  },
  challenges: {
    badge: 'Web Performance Bottlenecks',
    heading: 'Solving Critical Enterprise Web Overhead & Sluggish User Conversion',
    subheading: 'Outdated legacy CMS setups and bloated monoliths compromise conversion rates and organic search traffic.',
    challenges: [
      {
        id: 'wc1',
        category: 'Slow Page Speeds',
        issue: 'Heavy JavaScript Bundles & High LCP Latency',
        impact: 'High bounce rates and lower Google Search index rankings.',
        description: 'Unoptimized web bundles and blocking scripts delay interactive load times beyond 3.5 seconds.',
      },
      {
        id: 'wc2',
        category: 'Monolithic CMS Lock-in',
        issue: 'Inflexible Traditional CMS Architecture',
        impact: 'Development delays whenever marketing or content teams request layout modifications.',
        description: 'Hard-coded themes prevent multi-channel content distribution and create security vulnerabilities.',
      },
      {
        id: 'wc3',
        category: 'Mobile Unresponsiveness',
        issue: 'Clunky Mobile Viewports & Poor Touch Interfaces',
        impact: 'Lost mobile conversions and abandoned shopping sessions.',
        description: 'Web apps fail to adapt smoothly across mobile viewports, tablets, and high-DPI displays.',
      },
    ],
  },
  features: {
    badge: 'Web Engineering Features',
    heading: 'Built for Speed, SEO, and Dynamic User Interactions',
    subheading: 'Explore our core frontend and web application capabilities.',
    categories: ['Frontend & Web', 'Headless & CMS', 'Performance & PWA'],
    features: [
      {
        id: 'wf1',
        title: 'Next.js & React SSR/SSG',
        category: 'Frontend & Web',
        iconName: 'Code2',
        badge: 'Core Tech',
        businessBenefit: 'Boosts Organic SEO',
        description: 'Hybrid static rendering and server-side rendering for instant page transitions and search crawler indexability.',
        points: ['Edge Function API Routes', 'Automatic Code Splitting', 'Incremental Static Regeneration (ISR)'],
      },
      {
        id: 'wf2',
        title: 'Headless CMS Integration',
        category: 'Headless & CMS',
        iconName: 'Layers',
        businessBenefit: 'Empowers Marketing Teams',
        description: 'Decoupled content management platforms connected via high-speed GraphQL and REST endpoints.',
        points: ['Sanity / Strapi / Contentful', 'Real-Time Content Preview', 'Multilingual Localization'],
      },
      {
        id: 'wf3',
        title: 'Progressive Web Apps (PWA)',
        category: 'Performance & PWA',
        iconName: 'Smartphone',
        businessBenefit: 'App-Like Native Experience',
        description: 'Offline-ready web applications with service workers, push notifications, and home-screen installation.',
        points: ['Offline Local Caching', 'Push Notifications API', 'App Store / Play Store Web Package'],
      },
    ],
  },
  techStack: {
    badge: 'Web Stack',
    heading: 'Cutting-Edge Frontend & Headless Technologies',
    subheading: 'We leverage standard-setting frameworks for web application development.',
    categories: [
      {
        category: 'Frontend Frameworks',
        technologies: [
          { name: 'React', level: 'Core UI', icon: 'Code2' },
          { name: 'Next.js', level: 'SSR Engine', icon: 'Code2' },
          { name: 'TypeScript', level: 'Type Safety', icon: 'FileCode' },
          { name: 'Tailwind CSS', level: 'Utility Styling', icon: 'Layout' },
          { name: 'Vue.js', level: 'Reactive Web', icon: 'Code2' },
        ],
      },
      {
        category: 'Headless CMS & APIs',
        technologies: [
          { name: 'Sanity', level: 'Headless CMS', icon: 'Layers' },
          { name: 'Strapi', level: 'Open-Source CMS', icon: 'Server' },
          { name: 'GraphQL', level: 'Data Query', icon: 'Network' },
          { name: 'Node.js', level: 'Web Backend', icon: 'Server' },
        ],
      },
      {
        category: 'Hosting & CDN',
        technologies: [
          { name: 'Vercel', level: 'Edge Hosting', icon: 'Cloud' },
          { name: 'AWS CloudFront', level: 'Global CDN', icon: 'Cloud' },
          { name: 'Cloudflare', level: 'WAF & Edge', icon: 'Shield' },
        ],
      },
    ],
  },
  caseStudies: {
    badge: 'Web Success Stories',
    heading: 'Enterprise Web Platform Case Studies',
    subheading: 'Real-world results achieved through modern web engineering.',
    caseStudies: [
      {
        id: 'wcs1',
        industry: 'Global Media Network',
        title: 'Migration from Legacy WordPress to Next.js Headless Web Engine',
        challenge: 'Legacy WordPress portal crashed under 50k concurrent readers with average load times exceeding 4.2 seconds.',
        solution: 'Built Next.js SSG web application backed by Strapi headless CMS and Cloudflare Edge distribution.',
        techTags: ['Next.js', 'React', 'Strapi', 'Tailwind CSS', 'Vercel'],
        businessImpact: 'Reduced average page load time to 0.4s and increased ad impression yield by 64%.',
        kpiHighlight: '0.4s Load Speed',
      },
      {
        id: 'wcs2',
        industry: 'SaaS Platform',
        title: 'Interactive Web Dashboard & Real-Time Analytics Portal',
        challenge: 'Slow canvas rendering and choppy charts degraded user retention for financial analysts.',
        solution: 'Developed a high-frequency React + WebSockets dashboard with virtualized data lists and WebGL charts.',
        techTags: ['React', 'TypeScript', 'WebSockets', 'Tailwind CSS'],
        businessImpact: 'Handled 100,000 live data events/sec with zero UI latency lag.',
        kpiHighlight: '100k Live Events/s',
      },
    ],
  },
  faq: {
    badge: 'Web Development FAQ',
    heading: 'Frequently Asked Questions about Web Development',
    subheading: 'Clear answers about tech stacks, migration, and performance optimization.',
    faqs: [
      { question: 'Why choose Next.js and React over traditional CMS platforms?', answer: 'Next.js provides server-side rendering, top-notch SEO, modular security, and sub-second loading speeds unattainable on legacy monolithic PHP/WordPress themes.' },
      { question: 'Will my existing content be preserved during headless CMS migration?', answer: 'Yes! We write custom automated database scripts to migrate all blog posts, metadata, media assets, and URLs with 301 redirects.' },
      { question: 'How do you guarantee high Google Core Web Vitals score?', answer: 'We enforce strict bundle budgets, next-gen image formats (AVIF/WebP), font subsetting, code splitting, and zero render-blocking scripts.' },
    ],
  },
};

// 2. Mobile App Development Specific Page Data
const MOBILE_DEV_PAGE_DATA: ServicePageData = {
  ...GENERIC_SERVICE_TEMPLATE_DATA,
  id: 'mobile-app-development',
  serviceCategory: 'Mobile App Development',
  metaTitle: 'Native & Cross-Platform Mobile Application Development | Octavia Tech Solutions',
  seo: {
    h1: 'Mobile Application Development Services',
    metaTitle: 'Native & Cross-Platform Mobile Application Development | Octavia Tech Solutions',
    metaDescription: 'Build high-performance iOS and Android mobile apps with React Native, Flutter, and native code, complete with offline sync and secure API backends.',
    canonicalUrl: 'https://octaviatechnologies.com/services/mobile-app-development',
    breadcrumbs: [
      { name: 'Home', href: '/' },
      { name: 'Services', href: '/services' },
      { name: 'Mobile App Development', href: '/services/mobile-app-development' },
    ],
  },
  hero: {
    badge: 'Mobile App Engineering',
    title: 'Deliver Engaging Mobile Experiences across',
    titleHighlight: 'iOS, Android & Hybrid Platforms',
    description: 'Building high-performance native and cross-platform mobile apps with React Native, Flutter, and Swift/Kotlin. Featuring offline synchronization, biometric security, and background tasks.',
    primaryCtaText: 'Discuss Mobile App Idea',
    secondaryCtaText: 'Request Mobile Proposal',
    graphicBadge: 'React Native & Flutter Engine',
    graphicTitle: '60 FPS Smooth Mobile UX',
    graphicSubtext: 'Optimized memory management, native biometrics, and offline SQLite synchronization.',
    tags: ['React Native & Flutter', 'iOS & Android Native', 'Offline Sync', 'Biometric Auth'],
  },
  overview: {
    badge: 'Mobile Architecture',
    heading: 'Creating High-Rating iOS & Android Applications for Enterprise & Consumer Scale',
    leadParagraph: 'Our mobile app development team designs and builds fluid, high-conversion iOS and Android applications. From native Swift/Kotlin solutions to unified cross-platform Flutter and React Native codebases, we ensure 60fps animations and instant response times.',
    secondaryParagraph: 'We handle the complete mobile lifecycle: UX design, native hardware integration (Bluetooth, GPS, Camera, Biometrics), app store compliance, and secure API backends.',
    pillars: [
      { title: 'Cross-Platform Efficiency', description: 'Single codebase for iOS and Android using React Native or Flutter, cutting launch costs by 40%.', iconName: 'Smartphone' },
      { title: 'Offline-First Sync', description: 'Local SQLite/MMKV caching with background queued synchronization when connection resumes.', iconName: 'Zap' },
      { title: 'Hardware Integration', description: 'Deep integration with camera sensors, BLE beacons, GPS tracking, and Apple Pay / Google Wallet.', iconName: 'Cpu' },
      { title: 'Enterprise Mobile Security', description: 'Encrypted local keychains, SSL pinning, biometrics (Face ID/Touch ID), and OWASP mobile standards.', iconName: 'Lock' },
    ],
  },
  challenges: {
    badge: 'Mobile App Challenges',
    heading: 'Overcoming Mobile Fragmentation, App Store Rejections & Battery Drain',
    subheading: 'Mobile users demand instant responsiveness and flawless app store reliability.',
    challenges: [
      {
        id: 'mc1',
        category: 'Cross-Device Fragmentation',
        issue: 'UI Inconsistencies Across Screen Sizes & OS Versions',
        impact: 'Low App Store ratings and negative user reviews.',
        description: 'Varying screen aspect ratios, OS permissions, and device hardware lead to unexpected crashes.',
      },
      {
        id: 'mc2',
        category: 'Poor Offline Support',
        issue: 'App Freezes or Data Loss When Network Drops',
        impact: 'Frustrated field service workers and lost mobile transactions.',
        description: 'Lack of local database caching and async queue managers causes blank screens during network outages.',
      },
    ],
  },
  features: {
    badge: 'Mobile App Features',
    heading: 'Feature-Rich Mobile Applications Built for Speed & Engagement',
    subheading: 'Explore our comprehensive mobile application capabilities.',
    categories: ['Mobile Frameworks', 'Features & Security', 'App Store & Cloud'],
    features: [
      {
        id: 'mf1',
        title: 'React Native & Flutter Apps',
        category: 'Mobile Frameworks',
        iconName: 'Smartphone',
        badge: 'High Demand',
        businessBenefit: '40% Development Cost Savings',
        description: 'Native-performing cross-platform apps with near 100% code sharing between iOS and Android.',
        points: ['60 FPS Native Renderer', 'Hot Reloading & Fast Iteration', 'Custom Native Bridges'],
      },
      {
        id: 'mf2',
        title: 'Biometric & Keychain Security',
        category: 'Features & Security',
        iconName: 'Lock',
        businessBenefit: 'Financial Grade Security',
        description: 'Hardware-backed encryption storing authentication tokens in iOS Secure Enclave & Android Keystore.',
        points: ['Face ID & Touch ID Auth', 'SSL Certificate Pinning', 'AES-256 Storage Encryption'],
      },
      {
        id: 'mf3',
        title: 'Push Notifications & Engagement',
        category: 'App Store & Cloud',
        iconName: 'Zap',
        businessBenefit: 'Increases User Retention',
        description: 'Targeted push messaging powered by Firebase Cloud Messaging (FCM) and Apple Push Notification service (APNs).',
        points: ['Segmented Audience Alerts', 'In-App Rich Messaging', 'Deep Linking to Views'],
      },
    ],
  },
  techStack: {
    badge: 'Mobile Tech Stack',
    heading: 'Modern Cross-Platform & Native Mobile Stacks',
    subheading: 'We engineer mobile applications using industry-leading frameworks.',
    categories: [
      {
        category: 'Mobile Frameworks',
        technologies: [
          { name: 'React Native', level: 'Cross-Platform', icon: 'Smartphone' },
          { name: 'Flutter', level: 'Dart Engine', icon: 'Smartphone' },
          { name: 'Swift', level: 'iOS Native', icon: 'Smartphone' },
          { name: 'Kotlin', level: 'Android Native', icon: 'Smartphone' },
        ],
      },
      {
        category: 'Mobile Backend & DB',
        technologies: [
          { name: 'Firebase', level: 'Cloud & Push', icon: 'Cloud' },
          { name: 'SQLite / WatermelonDB', level: 'Local Sync', icon: 'Database' },
          { name: 'Node.js API', level: 'REST/GraphQL', icon: 'Server' },
        ],
      },
    ],
  },
  caseStudies: {
    badge: 'Mobile Success Stories',
    heading: 'Proven Mobile Application Case Studies',
    subheading: 'See how our mobile solutions transformed business engagement.',
    caseStudies: [
      {
        id: 'mcs1',
        industry: 'Fintech & Banking',
        title: 'Cross-Platform Mobile Wallet & Instant Remittance App',
        challenge: 'Client needed a secure iOS & Android app supporting biometrics and sub-second QR payments.',
        solution: 'Engineered Flutter mobile app with hardware-backed key storage and WebSocket payment confirmations.',
        techTags: ['Flutter', 'Dart', 'Node.js', 'Biometrics', 'AWS'],
        businessImpact: 'Achieved 4.8-star App Store rating with over 500,000 downloads in 6 months.',
        kpiHighlight: '4.8 App Store Rating',
      },
    ],
  },
  faq: {
    badge: 'Mobile App FAQ',
    heading: 'Frequently Asked Questions about Mobile Development',
    subheading: 'Answers about platform selection, app store approval, and maintenance.',
    faqs: [
      { question: 'Should we choose React Native/Flutter or Native iOS/Android?', answer: 'React Native and Flutter deliver near-native performance while saving ~40% in cost by sharing code. Native code is recommended for heavy 3D graphics or deep OS-level driver access.' },
      { question: 'Do you handle Apple App Store and Google Play Store submissions?', answer: 'Yes, we manage the full release pipeline, including developer account setup, screenshot creation, privacy policy compliance, and review feedback.' },
    ],
  },
};

// 3. AI & Chatbots Specific Page Data
const AI_CHATBOTS_PAGE_DATA: ServicePageData = {
  ...GENERIC_SERVICE_TEMPLATE_DATA,
  id: 'ai-chatbots-development',
  serviceCategory: 'AI Chatbot Development Services',
  metaTitle: 'AI Chatbot Development Company | Enterprise Conversational AI Solutions',
  seo: {
    h1: 'Enterprise AI Chatbot Development Services',
    metaTitle: 'AI Chatbot Development Company | Enterprise Conversational AI Solutions',
    metaDescription: 'Build intelligent, context-aware AI chatbots that automate customer support, capture qualified leads 24/7, and integrate seamlessly with your CRM and ERP.',
    canonicalUrl: 'https://octaviatechnologies.com/services/ai-agent-development/ai-chatbots-development',
    breadcrumbs: [
      { name: 'Home', href: '/' },
      { name: 'Services', href: '/services' },
      { name: 'AI Chatbots', href: '/services/ai-agent-development/ai-chatbots-development' },
    ],
  },
  hero: {
    badge: 'AI Chatbot Engineering',
    title: 'Transform Customer Support & Sales with Custom',
    titleHighlight: 'AI Chatbots & Generative AI Agents',
    description: 'Build intelligent, context-aware AI chatbots that automate up to 80% of customer support inquiries, capture qualified leads 24/7, and connect seamlessly with your CRM, ERP, and messaging platforms.',
    primaryCtaText: 'Test Live AI Chatbot Demo',
    secondaryCtaText: 'Request AI Proposal',
    graphicBadge: 'Gemini & OpenAI LLM Engine',
    graphicTitle: 'Sub-300ms Conversational Speed',
    graphicSubtext: 'Enterprise RAG vector database, multi-turn reasoning, and automatic live agent handoff.',
    tags: ['Gemini & GPT-4o LLM', 'RAG Knowledge Graph', 'WhatsApp & Web Widgets', 'CRM & ERP Sync'],
  },
  overview: {
    badge: 'Conversational AI Overview',
    heading: 'Intelligent Enterprise Chatbots Powered by LLMs & RAG Vector Search',
    leadParagraph: 'Our AI Chatbot engineering unit designs and deploys conversational agents that understand customer intent, parse complex documents, and execute real-time backend API transactions.',
    secondaryParagraph: 'Unlike primitive decision-tree bots, our LLM-powered chatbots leverage Retrieval-Augmented Generation (RAG) to ground responses strictly in your company documentation, product catalogs, and knowledge bases.',
    pillars: [
      { title: 'Zero Hallucination Guardrails', description: 'Strict RAG vector searching ensures responses are factual, secure, and compliant with brand guidelines.', iconName: 'Brain' },
      { title: 'Multi-Channel Deployment', description: 'Deploy once across Web Widgets, WhatsApp, Slack, Teams, iOS/Android apps, and SMS.', iconName: 'MessageSquare' },
      { title: 'Automated API Execution', description: 'Chatbots perform real-time actions: check order status, schedule meetings, process refunds, or update CRMs.', iconName: 'Workflow' },
      { title: 'Human-in-the-Loop Handoff', description: 'Seamless live agent transfer with full transcript context when complex edge cases arise.', iconName: 'Users' },
    ],
  },
  challenges: {
    badge: 'Support Bottlenecks',
    heading: 'Overcoming High Support Costs, Agent Burnout & Slow Response Times',
    subheading: 'Modern customers expect sub-minute answers 24 hours a day across all channels.',
    challenges: [
      {
        id: 'ac1',
        category: 'High Support Ticket Overhead',
        issue: 'Support Teams Overwhelmed by Repetitive Tier-1 Tickets',
        impact: 'High payroll expenses and long ticket resolution delays for high-priority accounts.',
        description: 'Up to 75% of customer inquiries are simple repetitive questions about order status, billing, or FAQs.',
      },
      {
        id: 'ac2',
        category: 'Inaccurate Legacy Bots',
        issue: 'Frustrating Rule-Based Bots That Fail Unscripted Queries',
        impact: 'Damaged customer trust and high drop-off during support chats.',
        description: 'Rigid keyword-matching bots fail to comprehend synonyms, typos, or natural human conversation.',
      },
    ],
  },
  features: {
    badge: 'AI Chatbot Features',
    heading: 'Enterprise Conversational Features Built for Scale',
    subheading: 'Discover the advanced capabilities embedded in our AI chatbot solutions.',
    categories: ['Conversational AI', 'Integrations & RAG', 'Analytics & Control'],
    features: [
      {
        id: 'af1',
        title: 'Custom RAG Knowledge Base',
        category: 'Integrations & RAG',
        iconName: 'Database',
        badge: 'Enterprise',
        businessBenefit: 'Instant Accurate Answers',
        description: 'Connect PDFs, Notion, Confluence, Websites, and SQL databases into vector indexes (Pinecone/Weaviate) for hallucination-free answers.',
        points: ['Real-Time Document Ingestion', 'Semantic Vector Search', 'Citation & Source Attribution'],
      },
      {
        id: 'af2',
        title: 'Omnichannel Chat Widget',
        category: 'Conversational AI',
        iconName: 'MessageSquare',
        businessBenefit: 'Unified Customer Touchpoints',
        description: 'Custom-branded web widget with markdown formatting, voice input, file attachments, and instant messaging triggers.',
        points: ['WhatsApp / Telegram / Slack / Teams', 'Custom UI Themes & Animations', 'Voice Speech-to-Text Integration'],
      },
      {
        id: 'af3',
        title: 'Function Calling & Action Execution',
        category: 'Conversational AI',
        iconName: 'Workflow',
        businessBenefit: 'Automates Real Business Tasks',
        description: 'Chatbot triggers backend API endpoints: updates HubSpot CRM leads, creates Zendesk tickets, or schedules Calendly calls.',
        points: ['Salesforce & HubSpot CRM Sync', 'Stripe Payment Processing', 'Automated Calendar Scheduling'],
      },
    ],
  },
  techStack: {
    badge: 'AI Chatbot Stack',
    heading: 'Advanced Generative AI & Vector Search Stack',
    subheading: 'We deploy cutting-edge AI frameworks and large language models.',
    categories: [
      {
        category: 'LLM & AI Models',
        technologies: [
          { name: 'Gemini 1.5 Pro / Flash', level: 'Google AI', icon: 'Brain' },
          { name: 'OpenAI GPT-4o', level: 'Multimodal LLM', icon: 'Brain' },
          { name: 'Claude 3.5 Sonnet', level: 'Reasoning AI', icon: 'Brain' },
          { name: 'LangChain / LlamaIndex', level: 'Agentic Frameworks', icon: 'Workflow' },
        ],
      },
      {
        category: 'Vector Databases',
        technologies: [
          { name: 'Pinecone', level: 'Vector Index', icon: 'Database' },
          { name: 'Weaviate / Qdrant', level: 'Semantic DB', icon: 'Database' },
          { name: 'pgvector', level: 'PostgreSQL Extension', icon: 'Database' },
        ],
      },
    ],
  },
  caseStudies: {
    badge: 'AI Success Stories',
    heading: 'Proven AI Chatbot Impact',
    subheading: 'Real results from automated conversational AI deployments.',
    caseStudies: [
      {
        id: 'acs1',
        industry: 'E-Commerce Platform',
        title: 'Automating 78% of Customer Support Tickets with RAG AI Agent',
        challenge: 'Support team was overwhelmed during holiday peaks with over 15,000 daily order status and return inquiries.',
        solution: 'Deployed custom Gemini LLM chatbot connected to Shopify API and Pinecone vector store.',
        techTags: ['Gemini AI', 'Shopify API', 'Pinecone', 'React', 'Node.js'],
        businessImpact: 'Automated 78% of tier-1 support requests while reducing average response time from 14 mins to 2 seconds.',
        kpiHighlight: '78% Ticket Automation',
      },
    ],
  },
  faq: {
    badge: 'AI Chatbot FAQ',
    heading: 'Frequently Asked Questions about AI Chatbots',
    subheading: 'Get clarity on data privacy, training, and custom integrations.',
    faqs: [
      { question: 'Will our proprietary enterprise data be used to train public LLM models?', answer: 'No! We utilize enterprise API agreements with OpenAI and Google Gemini with strict zero-data retention policies. Your data remains strictly confidential.' },
      { question: 'How long does it take to train and deploy an AI chatbot on our docs?', answer: 'Initial RAG vector index building and prototype testing take only 3 to 5 business days.' },
    ],
  },
};

// 4. Cloud & DevOps Specific Page Data
const CLOUD_DEVOPS_PAGE_DATA: ServicePageData = {
  ...GENERIC_SERVICE_TEMPLATE_DATA,
  id: 'cloud-devops',
  serviceCategory: 'Cloud & DevOps Services',
  metaTitle: 'Cloud Migration, Kubernetes & Infrastructure DevOps | Octavia Tech Solutions',
  seo: {
    h1: 'Cloud Engineering & DevOps Solutions',
    metaTitle: 'Cloud Migration, Kubernetes & Infrastructure DevOps | Octavia Tech Solutions',
    metaDescription: 'Migrate legacy workloads to AWS, GCP, or Azure with automated IaC, Kubernetes containerization, CI/CD pipelines, and 24/7 SRE monitoring.',
    canonicalUrl: 'https://octaviatechnologies.com/services/cloud-devops',
    breadcrumbs: [
      { name: 'Home', href: '/' },
      { name: 'Services', href: '/services' },
      { name: 'Cloud & DevOps', href: '/services/cloud-devops' },
    ],
  },
  hero: {
    badge: 'Cloud & DevOps Engineering',
    title: 'Scale Infrastructure Effortlessly with Automated',
    titleHighlight: 'Cloud Architecture & DevOps Pipelines',
    description: 'Transform your IT operations with Infrastructure as Code (Terraform), Kubernetes orchestration, automated CI/CD deployment pipelines, and zero-downtime cloud migration on AWS, GCP, and Azure.',
    primaryCtaText: 'Request Cloud Audit',
    secondaryCtaText: 'Get DevOps Proposal',
    tags: ['AWS / GCP / Azure', 'Terraform & IaC', 'Kubernetes (EKS/GKE)', 'CI/CD Pipelines'],
  },
};

// Performance Marketing Specific Page Data (Reference: inquisitivedigital.com/services/performance-marketing)
const PERFORMANCE_MARKETING_PAGE_DATA: ServicePageData = {
  ...GENERIC_SERVICE_TEMPLATE_DATA,
  id: 'performance-marketing',
  serviceCategory: 'Performance Marketing Services',
  metaTitle: 'Performance Marketing Agency | Google & Meta Ads Experts | Octavia Tech Solutions',
  seo: {
    h1: 'Performance Marketing Services',
    metaTitle: 'Performance Marketing Agency | Google & Meta Ads Experts | Octavia Tech Solutions',
    metaDescription: 'Scale your business with ROI-focused Performance Marketing Services. Drive qualified traffic, increase conversions, lower acquisition costs, and maximize revenue through data-driven paid media strategies.',
    canonicalUrl: 'https://octaviatechnologies.com/services/performance-marketing',
    breadcrumbs: [
      { name: 'Home', href: '/' },
      { name: 'Services', href: '/services' },
      { name: 'Performance Marketing', href: '/services/performance-marketing' },
    ],
  },
  hero: {
    badge: 'Performance Marketing Services',
    title: 'Scale your business with ROI-focused',
    titleHighlight: 'Performance Marketing Services',
    description: 'Drive qualified traffic, increase conversions, lower acquisition costs, and maximize revenue through data-driven paid media strategies.',
    primaryCtaText: 'Get FREE consultation',
    secondaryCtaText: 'Explore Approach',
    graphicBadge: 'ROI & ROAS Engine',
    graphicTitle: '$2M+ Managed Ad Spend',
    graphicSubtext: 'Data-driven paid advertising campaigns using structured funnels, pixel tracking, and predictive analytics to optimize CAC and ROAS.',
    tags: ['Google Ads & Search', 'Meta & Paid Social', 'LinkedIn & B2B Ads', 'Conversion Rate Optimization'],
  },
  overview: {
    badge: 'WHAT IS PERFORMANCE MARKETING',
    heading: 'Performance Marketing Explained',
    leadParagraph: 'Performance Marketing is a results-driven digital marketing strategy where every campaign, click, lead, and conversion is measured against business outcomes. Unlike traditional advertising, performance marketing focuses on measurable metrics such as revenue, return on ad spend (ROAS), customer acquisition cost (CAC), lead generation, and sales growth.',
    secondaryParagraph: 'A successful performance marketing strategy combines paid media management, audience targeting, conversion tracking, attribution modeling, landing page optimization, creative testing, and continuous campaign improvements. The objective is simple: maximize profitability while scaling growth across digital channels.',
    pillars: [
      { title: 'Measurable Revenue', description: 'Every campaign is tied directly to business outcomes such as leads, sales, and revenue generation.', iconName: 'TrendingUp' },
      { title: 'High-Intent Audiences', description: 'Connect with prospects actively searching for products and services like yours.', iconName: 'Target' },
      { title: 'Lower CAC', description: 'Continuous optimization helps reduce wasted spend and improve efficiency.', iconName: 'DollarSign' },
      { title: 'Scale with Data', description: 'Performance insights allow businesses to identify winning opportunities and expand profitable campaigns.', iconName: 'BarChart3' },
    ],
  },
  challenges: {
    badge: 'WHAT INACTION COSTS YOU',
    heading: 'The Cost of Delayed Growth',
    subheading: 'Without a structured acquisition strategy, scaling becomes difficult, inefficient, and unpredictable.',
    challenges: [
      {
        id: 'pmc1',
        category: 'Market Share Loss',
        issue: 'Losing customers to competitors.',
        impact: 'Competitors investing in performance marketing continue capturing market share.',
        description: 'Prospects actively searching for your services convert on competitor campaigns instead.',
      },
      {
        id: 'pmc2',
        category: 'Budget Inefficiency',
        issue: 'Wasting advertising budget.',
        impact: 'Poor targeting and optimization lead to unnecessary spend and lower returns.',
        description: 'Ad dollars spent without strict tracking and negative keywords drain acquisition budgets.',
      },
      {
        id: 'pmc3',
        category: 'Stagnant Acquisition',
        issue: 'Missing growth opportunities.',
        impact: 'Without a structured acquisition strategy, scaling becomes difficult and unpredictable.',
        description: 'Lack of cross-channel retargeting and creative testing stalls revenue growth.',
      },
    ],
  },
  whyChooseUs: {
    badge: 'WHY IT MATTERS',
    heading: 'Why Performance Marketing Matters for Modern Businesses',
    subheading: 'Marketing budgets should generate measurable returns. Performance marketing removes guesswork by providing complete visibility into campaign performance, customer acquisition, and revenue generation.',
    benefits: [
      {
        title: 'Generate Measurable Revenue Growth',
        description: 'Every campaign is tied directly to business outcomes such as leads, sales, and revenue generation.',
        metric: '$2',
        metricLabel: 'Average revenue generated for every $1 spent on Google Ads',
        iconName: 'TrendingUp',
      },
      {
        title: 'Reach High-Intent Audiences',
        description: 'Connect with prospects actively searching for products and services like yours.',
        metric: '76%',
        metricLabel: 'Of marketers use paid advertising to drive measurable business growth',
        iconName: 'Target',
      },
      {
        title: 'Lower Customer Acquisition Costs',
        description: 'Continuous optimization helps reduce wasted spend and improve efficiency.',
        metric: '-35%',
        metricLabel: 'Average reduction in Customer Acquisition Cost (CAC)',
        iconName: 'DollarSign',
      },
      {
        title: 'Scale Faster with Data',
        description: 'Performance insights allow businesses to identify winning opportunities and expand profitable campaigns.',
        metric: '4.2x',
        metricLabel: 'Average Return on Ad Spend (ROAS) across active campaigns',
        iconName: 'Zap',
      },
      {
        title: 'Maximize Advertising ROI',
        description: 'Strategic media buying ensures every marketing dollar delivers maximum impact.',
        metric: '100%',
        metricLabel: 'Full visibility on click-to-revenue attribution modeling',
        iconName: 'CheckCircle',
      },
      {
        title: 'Outperform Competitors',
        description: 'Gain market share through better targeting, optimization, and customer acquisition strategies.',
        metric: '#1',
        metricLabel: 'Dominated impression share in targeted search auctions',
        iconName: 'Award',
      },
    ],
  },
  features: {
    badge: 'OUR SERVICES',
    heading: 'Everything Included in Our Performance Marketing Service',
    subheading: 'From paid search to social media ads, analytics, and landing page optimization, we deliver full-funnel performance marketing.',
    categories: ['Paid Search & Social', 'Optimization & Analytics'],
    features: [
      {
        id: 'pmf1',
        title: 'Google Ads Management',
        category: 'Paid Search & Social',
        iconName: 'Search',
        badge: 'High Intent',
        businessBenefit: 'Capture Ready-to-Buy Leads',
        description: 'Strategic Search, Shopping, Display, Demand Gen, and Performance Max campaigns designed to generate leads, sales, and revenue.',
        points: ['Google Search Ads', 'Performance Max Campaigns', 'Google Shopping Ads', 'Remarketing Campaigns'],
      },
      {
        id: 'pmf2',
        title: 'Meta Ads Management',
        category: 'Paid Search & Social',
        iconName: 'Share2',
        badge: 'High Scale',
        businessBenefit: 'Build Social Demand',
        description: 'Facebook and Instagram advertising campaigns built to increase reach, engagement, lead generation, and customer acquisition.',
        points: ['Facebook & Instagram Ads', 'Audience Segmentation', 'Creative Testing Framework', 'Retargeting Funnels'],
      },
      {
        id: 'pmf3',
        title: 'LinkedIn Advertising',
        category: 'Paid Search & Social',
        iconName: 'Briefcase',
        badge: 'B2B Growth',
        businessBenefit: 'Target Key Decision Makers',
        description: 'Target decision-makers, executives, and B2B professionals through advanced demographic and firmographic targeting.',
        points: ['Sponsored Content & InMail', 'Account-Based Marketing (ABM)', 'Lead Gen Forms Sync'],
      },
      {
        id: 'pmf4',
        title: 'YouTube Advertising',
        category: 'Paid Search & Social',
        iconName: 'Video',
        badge: 'High Engagement',
        businessBenefit: 'Drive High Video Intent',
        description: 'Drive awareness, engagement, and conversions through strategic in-stream and discovery video advertising campaigns.',
        points: ['In-Stream Video Ads', 'Bumpers & Shorts Campaigns', 'Video Viewer Retargeting'],
      },
      {
        id: 'pmf5',
        title: 'Conversion Rate Optimization (CRO)',
        category: 'Optimization & Analytics',
        iconName: 'Zap',
        badge: 'CRO Engine',
        businessBenefit: 'Boost Landing Page Conversions',
        description: 'Improve landing pages, user journeys, and conversion paths to maximize campaign profitability and lower cost-per-lead.',
        points: ['Landing Page Optimization', 'A/B Variant Testing', 'Friction-Free Form Design'],
      },
      {
        id: 'pmf6',
        title: 'Analytics & Attribution',
        category: 'Optimization & Analytics',
        iconName: 'BarChart3',
        badge: 'Data Integrity',
        businessBenefit: 'Full Revenue Visibility',
        description: 'Track every click, lead, sale, and customer interaction with advanced server-side tracking, GA4, and custom attribution dashboards.',
        points: ['GA4 & CAPI Setup', 'Multi-Touch Attribution', 'Real-Time ROI Dashboards'],
      },
    ],
  },
  process: {
    badge: 'OUR PROCESS',
    heading: 'Our Performance Marketing Process',
    subheading: 'A disciplined, 5-stage growth engineering process engineered to maximize your return on ad spend.',
    steps: [
      {
        stepNumber: '01',
        title: 'Discovery & Strategy',
        phase: 'Phase 1',
        description: 'Understand your business goals, target audience, competitors, and growth opportunities.',
        deliverables: ['Audience Persona Mapping', 'Competitor Ad Benchmark', 'Budget Allocation Model'],
      },
      {
        stepNumber: '02',
        title: 'Tracking & Attribution',
        phase: 'Phase 2',
        description: 'Implement analytics, conversion tracking, Meta CAPI, and custom attribution systems.',
        deliverables: ['Server-Side CAPI Integration', 'Google Tag Manager Setup', 'Goal & Event Mapping'],
      },
      {
        stepNumber: '03',
        title: 'Campaign Launch',
        phase: 'Phase 3',
        description: 'Deploy high-converting campaigns across selected search and social advertising platforms.',
        deliverables: ['Ad Copy & Creative Asset Build', 'Audience Segmentation', 'Live Campaign Launch'],
      },
      {
        stepNumber: '04',
        title: 'Optimization & Testing',
        phase: 'Phase 4',
        description: 'Continuously improve performance through A/B testing, bid adjustment, and creative refinement.',
        deliverables: ['Creative Refresh Cycles', 'Negative Keyword Audits', 'Bid Strategy Tuning'],
      },
      {
        stepNumber: '05',
        title: 'Scale & Growth',
        phase: 'Phase 5',
        description: 'Expand successful campaigns into new channels while maintaining efficiency and profitability.',
        deliverables: ['Channel Expansion Plan', 'Budget Scaling System', 'Monthly Executive Report'],
      },
    ],
  },
  faq: {
    badge: 'COMMON QUESTIONS',
    heading: 'Frequently Asked Questions',
    subheading: 'Everything you need to know about our performance marketing services.',
    faqs: [
      {
        question: 'What is performance marketing?',
        answer: 'Performance marketing is a results-based marketing approach where success is measured through leads, sales, conversions, and revenue. You track exact returns for every dollar invested.',
      },
      {
        question: 'How quickly can I see results?',
        answer: 'Paid search and social campaigns begin generating qualified traffic and leads immediately upon launch. Initial campaign optimization data stabilizes within 14 to 30 days.',
      },
      {
        question: 'Which advertising platforms do you manage?',
        answer: 'We manage Google Ads (Search, Shopping, Display, PMax), Meta Ads (Facebook & Instagram), LinkedIn Ads, YouTube Ads, and Bing/Microsoft Ads.',
      },
      {
        question: 'Do you provide conversion tracking?',
        answer: 'Yes! We implement complete server-side tracking, Meta Conversions API (CAPI), Google Tag Manager, and GA4 attribution to ensure 100% data accuracy.',
      },
      {
        question: 'Can performance marketing help e-commerce businesses?',
        answer: 'Absolutely. We build specialized e-commerce funnels using Google Shopping, Performance Max, Meta Dynamic Product Ads, and retargeting to maximize ROAS.',
      },
      {
        question: 'Do you work with B2B companies?',
        answer: 'Yes, we specialize in high-ticket B2B lead generation using LinkedIn Ads, Google Search, gated content funnels, and account-based marketing (ABM).',
      },
    ],
  },
  cta: {
    badge: 'FREE PERFORMANCE AUDIT',
    heading: 'Ready to Scale Your Business?',
    description: 'Have a project in mind? Fill in your details and our team will get back to you within 24 hours. Identify hidden growth opportunities and get actionable recommendations.',
    primaryCtaText: 'Launch My Growth Strategy',
    secondaryCtaText: 'Request Free Audit',
    trustNotes: ['Zero-Commitment Audit', '24-Hour Turnaround', 'Actionable Growth Roadmap'],
  },
};

export const SERVICE_PAGES_DATA: Record<string, ServicePageData> = {
  'generic': GENERIC_SERVICE_TEMPLATE_DATA,
  'web-development': WEB_DEV_PAGE_DATA,
  ...WEB_DEVELOPMENT_SUBPAGES,
  ...SOFTWARE_DEVELOPMENT_SUBPAGES,
  ...MOBILE_APP_DEVELOPMENT_SUBPAGES,
  ...AI_AGENTIC_AI_SUBPAGES,
  ...PRODUCT_ENGINEERING_SUBPAGES,
  ...CLOUD_DATA_DEVOPS_SUBPAGES,
  ...IT_STAFF_AUGMENTATION_SUBPAGES,
  'software-development': SOFTWARE_DEVELOPMENT_SUBPAGES['software-development']!,
  'mobile-app-development': MOBILE_APP_DEVELOPMENT_SUBPAGES['mobile-app-development']!,
  'ai-agentic-ai': AI_AGENTIC_AI_SUBPAGES['ai-agentic-ai']!,
  'product-engineering': PRODUCT_ENGINEERING_SUBPAGES['product-discovery']!,
  'cloud-data-devops': CLOUD_DATA_DEVOPS_SUBPAGES['cloud-data-devops']!,
  'cloud-devops': CLOUD_DATA_DEVOPS_SUBPAGES['cloud-data-devops']!,
  'it-staff-augmentation': IT_STAFF_AUGMENTATION_SUBPAGES['it-staff-augmentation']!,
  'performance-marketing': PERFORMANCE_MARKETING_PAGE_DATA,
};

// Map subpage aliases directly
Object.keys(WEB_DEVELOPMENT_SUBPAGES).forEach((slug) => {
  SERVICE_PAGES_DATA[`web-development/${slug}`] = WEB_DEVELOPMENT_SUBPAGES[slug]!;
});

Object.keys(SOFTWARE_DEVELOPMENT_SUBPAGES).forEach((slug) => {
  SERVICE_PAGES_DATA[`software-development/${slug}`] = SOFTWARE_DEVELOPMENT_SUBPAGES[slug]!;
});

Object.keys(MOBILE_APP_DEVELOPMENT_SUBPAGES).forEach((slug) => {
  SERVICE_PAGES_DATA[`mobile-app-development/${slug}`] = MOBILE_APP_DEVELOPMENT_SUBPAGES[slug]!;
});

Object.keys(AI_AGENTIC_AI_SUBPAGES).forEach((slug) => {
  SERVICE_PAGES_DATA[`ai-agentic-ai/${slug}`] = AI_AGENTIC_AI_SUBPAGES[slug]!;
});

Object.keys(PRODUCT_ENGINEERING_SUBPAGES).forEach((slug) => {
  SERVICE_PAGES_DATA[`product-engineering/${slug}`] = PRODUCT_ENGINEERING_SUBPAGES[slug]!;
});

Object.keys(CLOUD_DATA_DEVOPS_SUBPAGES).forEach((slug) => {
  SERVICE_PAGES_DATA[`cloud-data-devops/${slug}`] = CLOUD_DATA_DEVOPS_SUBPAGES[slug]!;
  SERVICE_PAGES_DATA[`cloud-devops/${slug}`] = CLOUD_DATA_DEVOPS_SUBPAGES[slug]!;
});

Object.keys(IT_STAFF_AUGMENTATION_SUBPAGES).forEach((slug) => {
  SERVICE_PAGES_DATA[`it-staff-augmentation/${slug}`] = IT_STAFF_AUGMENTATION_SUBPAGES[slug]!;
});

// Map alias paths
SERVICE_PAGES_DATA['ai-agent-development/ai-chatbots-development'] = AI_AGENTIC_AI_SUBPAGES['ai-agent-development'] ?? AI_AGENTIC_AI_SUBPAGES['ai-agentic-ai']!;

/**
 * Dynamic Service Data Generator
 * Ensures that ANY slug/route (even ones not explicitly pre-defined) gets
 * bespoke text, custom titles, targeted challenges, specific tech stack, and distinct FAQs!
 */
export function getServicePageData(pathOrSlug: string): ServicePageData {
  const cleanSlug = (pathOrSlug || '')
    .replace('/services/', '')
    .replace('/services', '')
    .replace(/^\//, '');

  const lastSegment = cleanSlug.split('/').pop() || '';

  // Direct match in dictionary
  if (SERVICE_PAGES_DATA[cleanSlug]) {
    return SERVICE_PAGES_DATA[cleanSlug];
  }
  if (SERVICE_PAGES_DATA[lastSegment]) {
    return SERVICE_PAGES_DATA[lastSegment];
  }

  // Dynamic template generation tailored to the specific requested service category name
  const title = formatSlugToTitle(lastSegment || cleanSlug);

  return {
    ...GENERIC_SERVICE_TEMPLATE_DATA,
    id: cleanSlug || 'service-page',
    serviceCategory: `${title} Services`,
    metaTitle: `${title} Solutions & Engineering | Octavia Tech Solutions`,
    seo: {
      h1: `${title} Solutions & Engineering`,
      metaTitle: `${title} Solutions & Engineering | Octavia Tech Solutions`,
      metaDescription: `Empower your business with tailored ${title} engineered for scale, resilience, and performance by Octavia Tech Solutions.`,
      canonicalUrl: `https://octaviatechnologies.com/services/${cleanSlug}`,
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: title, href: `/services/${cleanSlug}` },
      ],
    },
    hero: {
      ...GENERIC_SERVICE_TEMPLATE_DATA.hero,
      badge: `${title} Solution`,
      title: `Accelerate Enterprise Performance with`,
      titleHighlight: `Custom ${title} Capabilities`,
      description: `Deploy high-impact, secure, and resilient ${title} tailored to your organization's technical strategy. Engineered by senior software architects with 24/7 SLA guarantees.`,
      graphicBadge: `${title} Delivery Engine`,
      graphicTitle: `Enterprise ${title} Platform`,
      graphicSubtext: `Tailored architecture, zero-downtime integration, and automated compliance.`,
      tags: [`${title} Architecture`, 'Zero-Trust Security', 'Agile Engineering', '24/7 SLA Support'],
    },
    overview: {
      badge: `${title} Overview`,
      heading: `Delivering Custom ${title} Architectures for Modern Enterprises`,
      leadParagraph: `Our ${title} practice bridges business objectives with deep domain engineering. We eliminate technical roadblocks, optimize operational workflows, and deliver future-proof digital solutions.`,
      secondaryParagraph: `Whether you require complete platform architecture, migration of existing legacy systems, or specialized technical staffing, Octavia Tech Solutions delivers dedicated engineering excellence.`,
      pillars: [
        { title: 'Architectural Precision', description: `Decoupled, high-availability architecture optimized for ${title}.`, iconName: 'Layers' },
        { title: 'Enterprise Security', description: 'ISO 27001, SOC2, HIPAA, and GDPR compliance standards built-in from day one.', iconName: 'ShieldCheck' },
        { title: 'Intelligent Automation', description: 'Automated testing pipelines and CI/CD workflows to accelerate release cycles.', iconName: 'Workflow' },
        { title: 'Scalable Growth', description: 'Elastic multi-cloud infrastructure engineered to support millions of concurrent users.', iconName: 'TrendingUp' },
      ],
    },
    challenges: {
      badge: `${title} Challenges`,
      heading: `Addressing Common Operational & Technical Obstacles in ${title}`,
      subheading: `Organizations encounter critical friction points when attempting to scale ${title} internally.`,
      challenges: [
        {
          id: `c_${cleanSlug}_1`,
          category: 'Scalability Limitations',
          issue: `Performance Bottlenecks in Current ${title} Setup`,
          impact: 'Slow response times, customer dissatisfaction, and elevated server overhead costs.',
          description: `Existing systems lack the architectural elasticity needed to process surge workloads in ${title}.`,
        },
        {
          id: `c_${cleanSlug}_2`,
          category: 'Integration Complexity',
          issue: `Siloed Data & Incompatible Legacy Systems`,
          impact: 'Manual re-keying of data, duplicate effort, and delayed decision making.',
          description: `Connecting legacy backends to modern ${title} platforms requires robust API middleware and event brokers.`,
        },
      ],
    },
    features: {
      badge: `Key ${title} Features`,
      heading: `Core Capabilities Included in Our ${title} Offerings`,
      subheading: `Discover the specialized engineering features designed for your enterprise platform.`,
      categories: ['Core Capabilities', 'Security & Scale', 'Integrations'],
      features: [
        {
          id: `f_${cleanSlug}_1`,
          title: `Custom ${title} Architecture`,
          category: 'Core Capabilities',
          iconName: 'Layout',
          badge: 'Popular',
          businessBenefit: 'Eliminates Architectural Debt',
          description: `Bespoke solution design engineered specifically around your enterprise rules, compliance guidelines, and performance targets.`,
          points: ['Modular Microservices', 'Elastic Scaling', 'High Availability'],
        },
        {
          id: `f_${cleanSlug}_2`,
          title: 'High-Throughput API Gateways',
          category: 'Integrations',
          iconName: 'Network',
          businessBenefit: 'Sub-Second Data Routing',
          description: 'Secure GraphQL and RESTful endpoint management with automated rate limiting and OAuth2 authentication.',
          points: ['OAuth2 / OIDC Flow', 'DDoS Protection', 'Sub-50ms Latency'],
        },
      ],
    },
    faq: {
      badge: `${title} FAQ`,
      heading: `Frequently Asked Questions about ${title}`,
      subheading: `Clear answers to help you evaluate our ${title} capabilities.`,
      faqs: [
        {
          question: `How quickly can Octavia kick off a ${title} engagement?`,
          answer: `Our engineering team begins technical discovery and architecture blueprinting within 48 hours of alignment.`,
        },
        {
          question: `Do you provide ongoing 24/7 support and maintenance for ${title}?`,
          answer: `Yes! We offer SRE monitoring, security patching, guaranteed response SLAs, and dedicated engineering sprints post-launch.`,
        },
      ],
    },
    cta: {
      ...GENERIC_SERVICE_TEMPLATE_DATA.cta,
      heading: `Ready to Build Your ${title} Solution?`,
      description: `Partner with Octavia Tech Solutions to engineer a high-performance, secure ${title} platform.`,
      primaryCtaText: 'Get Free Consultation',
      secondaryCtaText: 'Request Proposal',
    },
  };
}
