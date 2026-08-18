import { ServicePageData } from '../types/service';

export const PRODUCT_ENGINEERING_SUBPAGES: Record<string, ServicePageData> = {
  // 1. Product Discovery
  'product-discovery': {
    id: 'product-discovery',
    serviceCategory: 'Product Discovery Services',
    metaTitle: 'Product Discovery Services | UX & Architecture Blueprint | Octavia Tech Solutions',
    seo: {
      h1: 'Product Discovery & Architecture Blueprinting',
      metaTitle: 'Product Discovery Services | UX & Architecture Blueprint | Octavia Tech Solutions',
      metaDescription: 'De-risk software engineering with 1-to-2 week Product Discovery workshops. Define user personas, wireframes, technical architecture, and MVP backlogs.',
      canonicalUrl: 'https://octaviatechnologies.com/services/product-engineering/product-discovery',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Product Engineering', href: '/services/product-engineering' },
        { name: 'Product Discovery', href: '/services/product-engineering/product-discovery' },
      ],
    },
    hero: {
      badge: 'Product Discovery',
      title: 'Product Discovery & Architecture',
      titleHighlight: 'Services',
      description: 'De-risk your digital product investments before writing code. We run structured Product Discovery sprints to define user journeys, wireframes, cloud architecture, and prioritized feature roadmaps.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore Discovery Sprint',
      tags: ['User Research & Personas', 'Interactive Figma Prototypes', 'Technical Architecture Blueprint', 'Prioritized MVP Backlog'],
    },
    overview: {
      badge: 'WHAT IS PRODUCT DISCOVERY',
      heading: 'Product Discovery Methodology Explained',
      leadParagraph: 'Product Discovery is the strategic phase of software development focused on validating user demand, refining product concepts, and mapping technical feasibility before full-scale engineering.',
      secondaryParagraph: 'Octavia Tech Solutions conducts collaborative 1-to-2 week Discovery workshops uniting product strategists, UX designers, and system architects to eliminate costly guesswork.',
      pillars: [
        { title: 'Market & User Research', description: 'Validating target customer pain points through structured interviews and competitor analysis.', iconName: 'Target' },
        { title: 'Interactive UX Wireframing', description: 'Designing clickable Figma prototypes to test user flows before coding.', iconName: 'Layout' },
        { title: 'Technical Feasibility Blueprint', description: 'Selecting optimal cloud stacks, API integrations, and database schemas.', iconName: 'Layers' },
        { title: 'Scoped MVP Feature Backlog', description: 'Creating clear Jira backlogs with precise cost and timeline estimates.', iconName: 'FileText' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Product Discovery Matters',
      subheading: 'Building software without clear discovery leads to expensive re-writes and feature bloat.',
      challenges: [
        {
          id: 'pd1',
          category: 'Risk Mitigation',
          issue: 'De-Risk Product Development Before Investing Capital',
          impact: 'Save up to 50% in development re-works by defining specs upfront.',
          description: 'Validating concepts early ensures every built feature directly serves user needs.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our Product Discovery Service',
      subheading: 'Structured discovery deliverables designed for product teams.',
      categories: ['UX Wireframes', 'Tech Blueprint', 'MVP Scope'],
      features: [
        {
          id: 'pdf1',
          title: '1-Week Discovery Workshop & Prototype',
          category: 'UX Wireframes',
          iconName: 'Layout',
          badge: 'High Value',
          businessBenefit: 'Clear 90-Day Execution Roadmap',
          description: 'Collaborative workshop resulting in interactive Figma prototypes and technical architecture documents.',
          points: ['Figma Prototype', 'System Architecture Diagram', 'MVP Cost & Timeline Report'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'Product Discovery FAQ',
      subheading: 'Answers about discovery duration and workshop deliverables.',
      faqs: [
        {
          question: 'What deliverables do we receive at the end of a Product Discovery sprint?',
          answer: 'You receive clickable Figma prototypes, a detailed technical architecture blueprint, user story backlogs, and fixed-price development proposals.',
        },
      ],
    },
    cta: {
      badge: 'DISCOVERY AUDIT',
      heading: 'Ready to Validate & Blueprint Your Software Concept?',
      description: 'Book a Product Discovery sprint with our product managers and architects.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore Discovery Sprint',
    },
  },

  // 2. MVP Development
  'mvp-development': {
    id: 'mvp-development',
    serviceCategory: 'MVP Development Services',
    metaTitle: 'MVP Development Services for Startups & Enterprises | Octavia Tech Solutions',
    seo: {
      h1: 'MVP Development Services',
      metaTitle: 'MVP Development Services for Startups & Enterprises | Octavia Tech Solutions',
      metaDescription: 'Build and launch functional Minimum Viable Products (MVPs) in 8 to 12 weeks. Validate market demand, attract investor funding, and scale your product.',
      canonicalUrl: 'https://octaviatechnologies.com/services/product-engineering/mvp-development',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Product Engineering', href: '/services/product-engineering' },
        { name: 'MVP Development', href: '/services/product-engineering/mvp-development' },
      ],
    },
    hero: {
      badge: 'MVP Engineering',
      title: 'MVP Development Services',
      titleHighlight: 'Services',
      description: 'Launch your digital product concept to market in 8 to 12 weeks. We build production-ready Minimum Viable Products (MVPs) engineered to validate customer demand and secure investor backing.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore MVP Specs',
      tags: ['8-12 Week Delivery', 'Investor-Ready Code', 'Scalable React/Node Stack', 'Analytics Integration'],
    },
    overview: {
      badge: 'WHAT IS MVP DEVELOPMENT',
      heading: 'Minimum Viable Product Engineering Explained',
      leadParagraph: 'MVP Development focuses on engineering a core version of a new product with enough essential features to satisfy early adopters and gather market validation feedback.',
      secondaryParagraph: 'Octavia Tech Solutions balances rapid time-to-market with production-grade code quality, ensuring your MVP can scale smoothly without requiring a complete rewrite post-launch.',
      pillars: [
        { title: '8-12 Week Delivery', description: 'Agile 2-week sprints focused strictly on core revenue-generating features.', iconName: 'Zap' },
        { title: 'Production-Grade Architecture', description: 'Built on clean React/Next.js and Node/Python stacks capable of scaling to 100k users.', iconName: 'Server' },
        { title: 'Investor-Ready Demo', description: 'Polished UI/UX design engineered to impress pitch decks and venture capital partners.', iconName: 'Target' },
        { title: 'Built-in Product Analytics', description: 'PostHog and Amplitude tracking embedded to analyze real user behavioral funnels.', iconName: 'BarChart3' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why MVP Engineering Matters for Startups & Innovators',
      subheading: 'Spending 12 months building in isolation risks launching a product nobody wants.',
      challenges: [
        {
          id: 'mvp1',
          category: 'Time-to-Market',
          issue: 'Launch Before Market Window Closes',
          impact: 'Validate product hypotheses with real paying users fast.',
          description: 'Focused MVP engineering avoids feature bloat and gets core tools to users quickly.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our MVP Development Service',
      subheading: 'Rapid software engineering tailored for early-stage products.',
      categories: ['Rapid Coding', 'Scalable Tech Stack', 'Analytics Setup'],
      features: [
        {
          id: 'mvpf1',
          title: 'Full-Stack MVP Product Engineering',
          category: 'Rapid Coding',
          iconName: 'Zap',
          badge: 'Fast Launch',
          businessBenefit: 'Market Ready in 8-12 Weeks',
          description: 'Developing core product capabilities using modern React/Next.js and cloud-native databases.',
          points: ['8-12 Week Delivery Window', 'Stripe Billing & Auth', 'Analytics & User Funnels'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'MVP Development FAQ',
      subheading: 'Answers about MVP development timelines and code quality.',
      faqs: [
        {
          question: 'Can the MVP codebase be scaled into a full commercial platform later?',
          answer: 'Yes! We write clean, modular TypeScript and React code using microservices design so your MVP scales cleanly as user traffic grows.',
        },
      ],
    },
    cta: {
      badge: 'MVP AUDIT',
      heading: 'Ready to Build & Launch Your MVP in 8-12 Weeks?',
      description: 'Consult with our startup product team to review your feature roadmap.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore MVP Specs',
    },
  },

  // 3. Product Design
  'product-design': {
    id: 'product-design',
    serviceCategory: 'Product Design Services',
    metaTitle: 'Product Design & UI/UX Services | Figma Design Systems | Octavia Tech Solutions',
    seo: {
      h1: 'Product Design & UI/UX Services',
      metaTitle: 'Product Design & UI/UX Services | Figma Design Systems | Octavia Tech Solutions',
      metaDescription: 'User-centric UI/UX design, interactive Figma prototypes, design systems, and usability testing engineered to maximize user engagement and conversion.',
      canonicalUrl: 'https://octaviatechnologies.com/services/product-engineering/product-design',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Product Engineering', href: '/services/product-engineering' },
        { name: 'Product Design', href: '/services/product-engineering/product-design' },
      ],
    },
    hero: {
      badge: 'UI/UX Design',
      title: 'Product Design & UI/UX',
      titleHighlight: 'Services',
      description: 'Craft intuitive, accessible, and delight-inducing digital product experiences. We design user interfaces (UI) and user experiences (UX) backed by user research and scalable Figma design systems.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore Design Specs',
      tags: ['Figma Design Systems', 'User Research & Personas', 'WCAG AA Accessibility', 'Interactive Prototypes'],
    },
    overview: {
      badge: 'WHAT IS PRODUCT DESIGN',
      heading: 'User Experience (UX) & Interface (UI) Design Explained',
      leadParagraph: 'Product Design is the holistic process of research, wireframing, visual styling, and interaction prototyping that ensures digital software is easy and enjoyable to use.',
      secondaryParagraph: 'Octavia Tech Solutions creates atomic Figma design systems that bridge product design and frontend code, speeding up engineering handoff.',
      pillars: [
        { title: 'User Research & Usability Testing', description: 'Testing design concepts with real users to eliminate friction before coding.', iconName: 'Target' },
        { title: 'Figma Atomic Design Systems', description: 'Reusable UI component libraries ensuring visual consistency across web and mobile.', iconName: 'Layout' },
        { title: 'WCAG AA Accessibility', description: 'Designing high-contrast, screen-reader accessible layouts for all users.', iconName: 'Eye' },
        { title: 'Seamless Developer Handoff', description: 'Exporting design tokens and Tailwind CSS values directly for engineering teams.', iconName: 'Code2' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Professional UI/UX Product Design Matters',
      subheading: 'Clunky UI design frustrates users and leads to immediate churn.',
      challenges: [
        {
          id: 'pd_c1',
          category: 'Conversion Rate',
          issue: 'Boost User Onboarding & Conversion Rates',
          impact: 'Increase customer trial-to-paid conversion rates by simplifying workflows.',
          description: 'Intuitive UX flow guides users directly to value realization without friction.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our Product Design Service',
      subheading: 'End-to-end UI/UX design deliverables built in Figma.',
      categories: ['UI/UX Design', 'Design Systems', 'Usability Testing'],
      features: [
        {
          id: 'pdf1_d',
          title: 'Full-Service UI/UX & Figma Design System',
          category: 'UI/UX Design',
          iconName: 'Layout',
          badge: 'Design System',
          businessBenefit: 'Increases User Retention',
          description: 'Creating visual design assets, interactive wireframes, and scalable component design systems.',
          points: ['Figma Design Component Specs', 'Desktop & Mobile Layouts', 'Dark/Light Theme Modes'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'Product Design FAQ',
      subheading: 'Answers about Figma deliverables and design token handoff.',
      faqs: [
        {
          question: 'Do you provide full access to Figma files and design component libraries?',
          answer: 'Yes! You receive complete ownership of all Figma design files, component libraries, typography scale, and design tokens.',
        },
      ],
    },
    cta: {
      badge: 'DESIGN AUDIT',
      heading: 'Need World-Class UI/UX Designed for Your Product?',
      description: 'Schedule a design review session with our lead UI/UX product designers.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore Design Specs',
    },
  },

  // 4. Startup Product Development
  'startup-product-development': {
    id: 'startup-product-development',
    serviceCategory: 'Startup Product Development Services',
    metaTitle: 'Startup Software Product Development | Octavia Tech Solutions',
    seo: {
      h1: 'Startup Software Product Engineering',
      metaTitle: 'Startup Software Product Development | Octavia Tech Solutions',
      metaDescription: 'Partner with senior product engineers to build, launch, and scale your startup software product. Agile sprints, technical co-founder expertise, and investor demos.',
      canonicalUrl: 'https://octaviatechnologies.com/services/product-engineering/startup-product-development',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Product Engineering', href: '/services/product-engineering' },
        { name: 'Startup Product Development', href: '/services/product-engineering/startup-product-development' },
      ],
    },
    hero: {
      badge: 'Startup Technology Partner',
      title: 'Startup Product Development',
      titleHighlight: 'Services',
      description: 'Act as your dedicated technical engineering partner. We help ambitious founders turn ideas into scalable digital products, offering technical CTO advisory, rapid sprints, and investor pitch demos.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore Startup Offer',
      tags: ['Technical CTO Advisory', 'Rapid Agile Sprints', 'Scalable Cloud Architecture', 'Investor Pitch Demos'],
    },
    overview: {
      badge: 'WHAT IS STARTUP PRODUCT DEV',
      heading: 'Dedicated Technology Partnership for Founders',
      leadParagraph: 'Startup Product Development provides early-stage founders with an elite engineering team that acts as a virtual Fractional CTO and core tech team.',
      secondaryParagraph: 'Octavia Tech Solutions helps startups balance rapid execution with sound technical architecture, ensuring your product is ready for venture capital due diligence.',
      pillars: [
        { title: 'Fractional CTO Guidance', description: 'Strategic tech stack selection, infrastructure budget planning, and investor pitch support.', iconName: 'Target' },
        { title: 'Rapid Agile Execution', description: 'Shipping new product features every 2 weeks using flexible engineering teams.', iconName: 'Zap' },
        { title: 'Capital-Efficient Scaling', description: 'Optimizing cloud infrastructure costs to stretch seed and Series A runway.', iconName: 'TrendingUp' },
        { title: 'Investor Due-Diligence Ready', description: 'Clean TypeScript/React codebases, security audit docs, and technical IP transfer.', iconName: 'ShieldCheck' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Specialized Startup Product Engineering Matters',
      subheading: 'Hiring full-time engineers before product-market fit burns through seed capital fast.',
      challenges: [
        {
          id: 'spd_c1',
          category: 'Capital Efficiency',
          issue: 'Stretch Seed Runway with Flexible Engineering Teams',
          impact: 'Scale engineering team up or down based on funding milestones.',
          description: 'Flexible startup engineering contracts avoid heavy permanent payroll overhead.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our Startup Product Service',
      subheading: 'End-to-end technology co-founding capabilities for startups.',
      categories: ['Fractional CTO', 'Agile Sprints', 'Investor Pitch'],
      features: [
        {
          id: 'spdf1_s',
          title: 'Dedicated Startup Technology Engineering Team',
          category: 'Agile Sprints',
          iconName: 'Zap',
          badge: 'Founder Ready',
          businessBenefit: 'Stretches Seed Runway',
          description: 'Full-stack engineering pod (Frontend, Backend, UI/UX, DevOps) executing 2-week product sprints.',
          points: ['Fractional CTO Advisory', '2-Week Sprint Deliveries', 'Full IP Transfer'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'Startup Product FAQ',
      subheading: 'Answers about IP ownership, sprint velocity, and technical co-founding.',
      faqs: [
        {
          question: 'Do founders retain 100% ownership of source code and intellectual property?',
          answer: 'Yes! 100% of all intellectual property, source code repositories, and credentials belong entirely to your company from day one.',
        },
      ],
    },
    cta: {
      badge: 'STARTUP AUDIT',
      heading: 'Need an Elite Engineering Team to Build Your Startup Product?',
      description: 'Schedule a founder strategy call with our fractional CTOs and engineers.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore Startup Offer',
    },
  },

  // 5. Product Modernization
  'product-modernization': {
    id: 'product-modernization',
    serviceCategory: 'Product Modernization Services',
    metaTitle: 'Product Modernization Services | Codebase Refactoring | Octavia Tech Solutions',
    seo: {
      h1: 'Product Refactoring & Modernization Services',
      metaTitle: 'Product Modernization Services | Codebase Refactoring | Octavia Tech Solutions',
      metaDescription: 'Upgrade aging digital products to modern web/mobile stacks. Eliminate technical debt, improve user retention, and accelerate feature velocity.',
      canonicalUrl: 'https://octaviatechnologies.com/services/product-engineering/product-modernization',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Product Engineering', href: '/services/product-engineering' },
        { name: 'Product Modernization', href: '/services/product-engineering/product-modernization' },
      ],
    },
    hero: {
      badge: 'Product Refactoring',
      title: 'Product Modernization',
      titleHighlight: 'Services',
      description: 'Breathe new life into aging digital products. We refactor legacy codebases, modernize UI/UX interfaces, upgrade database schemas, and accelerate release cycles with zero downtime.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore Modernization Specs',
      tags: ['Codebase Refactoring', 'Modern UI/UX Overhaul', 'Database Optimization', 'Zero User Downtime'],
    },
    overview: {
      badge: 'WHAT IS PRODUCT MODERNIZATION',
      heading: 'Product Refactoring & Stack Upgrades Explained',
      leadParagraph: 'Product Modernization is the systematic process of upgrading a digital product’s frontend, backend, and cloud infrastructure to modern standards.',
      secondaryParagraph: 'Octavia Tech Solutions modernizes existing software products by replacing slow legacy libraries with modern React/Next.js components and microservice APIs.',
      pillars: [
        { title: 'Codebase Refactoring', description: 'Cleaning technical debt and updating outdated dependencies to current LTS versions.', iconName: 'Code2' },
        { title: 'UI/UX Redesign', description: 'Refreshing outdated user interfaces to modern visual standards.', iconName: 'Layout' },
        { title: 'Database Schema Tuning', description: 'Optimizing slow database queries and indexing for sub-second page loads.', iconName: 'Database' },
        { title: 'CI/CD Pipeline Setup', description: 'Automating deployment testing so new features release daily instead of quarterly.', iconName: 'RefreshCw' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Product Modernization Matters',
      subheading: 'Aging software products lose active users to sleeker modern competitors.',
      challenges: [
        {
          id: 'pm_c1',
          category: 'Competitive Edge',
          issue: 'Stop Losing Active Product Users to Modern Competitors',
          impact: 'Restore user retention and modern brand perception.',
          description: 'Modern UI/UX redesigns paired with fast page speeds keep users engaged.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our Product Modernization Service',
      subheading: 'End-to-end product codebase refactoring and visual upgrades.',
      categories: ['Refactoring', 'UI Redesign', 'CI/CD Setup'],
      features: [
        {
          id: 'pmdf1',
          title: 'Full Product Codebase & UI/UX Modernization',
          category: 'Refactoring',
          iconName: 'RefreshCw',
          badge: 'High Value',
          businessBenefit: 'Restores User Retention & Speed',
          description: 'Upgrading frontend stacks to React/Next.js and backend endpoints to cloud microservices.',
          points: ['Frontend React/Next.js Upgrade', 'Database Query Optimization', 'Automated Integration Testing'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'Product Modernization FAQ',
      subheading: 'Answers about user migration and feature preservation.',
      faqs: [
        {
          question: 'Will our active users experience downtime during product modernization?',
          answer: 'No! We use parallel environments and blue-green deployment strategies to ensure zero user downtime during release cutovers.',
        },
      ],
    },
    cta: {
      badge: 'MODERNIZATION AUDIT',
      heading: 'Is Technical Debt Holding Your Product Back?',
      description: 'Schedule a technical audit session with our product modernization engineers.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore Modernization Specs',
    },
  },
};
