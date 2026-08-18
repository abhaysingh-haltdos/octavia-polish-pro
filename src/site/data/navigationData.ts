import { NavItem } from '../types';

export const SITE_NAV_ITEMS: NavItem[] = [
  {
    id: 'about-us',
    label: 'About Us',
    href: '/about-us',
  },
  {
    id: 'services',
    label: 'Services',
    href: '/services',
    hasMega: true,
    megaConfig: {
      widthClass: 'mega-menu-xl',
      gridTemplateColumns: 'repeat(4, 1fr) 240px',
      columns: [
        {
          title: 'Web Development',
          items: [
            { label: 'Custom Web Development', href: '/services/web-development/custom-web-development' },
            { label: 'Enterprise Web Development', href: '/services/web-development/enterprise-web-development' },
            { label: 'Corporate Website Development', href: '/services/web-development/corporate-website-development' },
            { label: 'Ecommerce Development', href: '/services/web-development/ecommerce-development' },
            { label: 'Web Application Development', href: '/services/web-development/web-application-development' },
            { label: 'Progressive Web App (PWA)', href: '/services/web-development/progressive-web-app-development' },
            { label: 'CMS Development', href: '/services/web-development/cms-development' },
            { label: 'WordPress Development', href: '/services/web-development/wordpress-development' },
            { label: 'React Development', href: '/services/web-development/react-development' },
            { label: 'Next.js Development', href: '/services/web-development/nextjs-development' },
            { label: 'Angular Development', href: '/services/web-development/angular-development' },
            { label: 'Vue.js Development', href: '/services/web-development/vuejs-development' },
            { label: 'Laravel Development', href: '/services/web-development/laravel-development' },
            { label: 'Web Maintenance & Support', href: '/services/web-development/web-maintenance-support' },
          ],
        },
        {
          title: 'Software Development',
          items: [
            { label: 'Custom Software Development', href: '/services/software-development/custom-software-development' },
            { label: 'Enterprise Software Development', href: '/services/software-development/enterprise-software-development' },
            { label: 'Software Product Development', href: '/services/software-development/software-product-development' },
            { label: 'SaaS Development', href: '/services/software-development/saas-development' },
            { label: 'Software Modernization', href: '/services/software-development/software-modernization' },
            { label: 'API Development', href: '/services/software-development/api-development' },
            { label: 'Microservices Development', href: '/services/software-development/microservices-development' },
            { label: 'System Integration', href: '/services/software-development/system-integration' },
            { label: 'Software Maintenance', href: '/services/software-development/software-maintenance' },
          ],
        },
        {
          title: 'Mobile App Development',
          items: [
            { label: 'Android App Development', href: '/services/mobile-app-development/android-app-development' },
            { label: 'iOS App Development', href: '/services/mobile-app-development/ios-app-development' },
            { label: 'Flutter App Development', href: '/services/mobile-app-development/flutter-app-development' },
            { label: 'React Native Development', href: '/services/mobile-app-development/react-native-development' },
            { label: 'Cross-Platform Development', href: '/services/mobile-app-development/cross-platform-development' },
            { label: 'Mobile App Maintenance', href: '/services/mobile-app-development/mobile-app-maintenance' },
          ],
        },
        {
          title: 'AI & Agentic AI',
          items: [
            { label: 'AI Consulting Services', href: '/services/ai-agentic-ai/ai-consulting-services' },
            { label: 'AI Development Services', href: '/services/ai-agentic-ai/ai-development-services' },
            { label: 'Generative AI Development', href: '/services/ai-agentic-ai/generative-ai-development' },
            { label: 'Enterprise AI Development', href: '/services/ai-agentic-ai/enterprise-ai-development' },
            { label: 'AI Agent Development', href: '/services/ai-agentic-ai/ai-agent-development' },
            { label: 'Agentic AI Development', href: '/services/ai-agentic-ai/agentic-ai-development' },
            { label: 'LLM Development', href: '/services/ai-agentic-ai/llm-development' },
            { label: 'RAG Development Services', href: '/services/ai-agentic-ai/rag-development-services' },
            { label: 'AI Chatbot Development', href: '/services/ai-agent-development/ai-chatbots-development' },
            { label: 'Machine Learning Solutions', href: '/services/ai-agentic-ai/machine-learning-solutions' },
            { label: 'AI Automation Solutions', href: '/services/ai-agentic-ai/ai-automation-solutions' },
          ],
        },
        {
          title: 'Product Engineering',
          items: [
            { label: 'Product Discovery', href: '/services/product-engineering/product-discovery' },
            { label: 'MVP Development', href: '/services/product-engineering/mvp-development' },
            { label: 'Product Design', href: '/services/product-engineering/product-design' },
            { label: 'SaaS Development', href: '/services/product-engineering/saas-development' },
            { label: 'Startup Product Development', href: '/services/product-engineering/startup-product-development' },
            { label: 'Product Modernization', href: '/services/product-engineering/product-modernization' },
          ],
        },
        {
          title: 'Cloud, Data & DevOps',
          items: [
            { label: 'Cloud Consulting', href: '/services/cloud-data-devops/cloud-consulting' },
            { label: 'AWS Consulting', href: '/services/cloud-data-devops/aws-consulting' },
            { label: 'Azure Consulting', href: '/services/cloud-data-devops/azure-consulting' },
            { label: 'Google Cloud Consulting', href: '/services/cloud-data-devops/google-cloud-consulting' },
            { label: 'Cloud Migration', href: '/services/cloud-data-devops/cloud-migration' },
            { label: 'DevOps Consulting', href: '/services/cloud-data-devops/devops-consulting' },
            { label: 'Data Engineering', href: '/services/cloud-data-devops/data-engineering' },
            { label: 'Data Analytics', href: '/services/cloud-data-devops/data-analytics' },
          ],
        },
        {
          title: 'IT Staff Augmentation',
          items: [
            { label: 'Hire Dedicated Developers', href: '/services/it-staff-augmentation/hire-dedicated-developers' },
            { label: 'Hire Software Developers', href: '/services/it-staff-augmentation/hire-software-developers' },
            { label: 'Hire Web Developers', href: '/services/it-staff-augmentation/hire-web-developers' },
            { label: 'Hire Mobile App Developers', href: '/services/it-staff-augmentation/hire-mobile-app-developers' },
            { label: 'Hire Frontend Developers', href: '/services/it-staff-augmentation/hire-frontend-developers' },
            { label: 'Hire Backend Developers', href: '/services/it-staff-augmentation/hire-backend-developers' },
            { label: 'Hire Full Stack Developers', href: '/services/it-staff-augmentation/hire-full-stack-developers' },
            { label: 'Hire React Developers', href: '/services/it-staff-augmentation/hire-react-developers' },
            { label: 'Hire Next.js Developers', href: '/services/it-staff-augmentation/hire-nextjs-developers' },
            { label: 'Hire Node.js Developers', href: '/services/it-staff-augmentation/hire-nodejs-developers' },
            { label: 'Hire AI Developers', href: '/services/it-staff-augmentation/hire-ai-developers' },
            { label: 'Hire DevOps Engineers', href: '/services/it-staff-augmentation/hire-devops-engineers' },
            { label: 'Dedicated Development Team', href: '/services/it-staff-augmentation/dedicated-development-team' },
            { label: 'Offshore Development Team', href: '/services/it-staff-augmentation/offshore-development-team' },
            { label: 'Team Extension Services', href: '/services/it-staff-augmentation/team-extension-services' },
          ],
        },
      ],
      cta: {
        title: 'Need Custom Development?',
        description: 'Our engineering experts design, build, and scale custom software solutions.',
        primaryBtnText: 'Talk to an Expert',
        primaryBtnHref: '/company/contact',
        secondaryBtnText: 'View All Services',
        secondaryBtnHref: '/services',
      },
    },
  },
  {
    id: 'industries',
    label: 'Industries',
    href: '/industries',
    hasMega: true,
    megaConfig: {
      widthClass: 'mega-menu-md',
      gridTemplateColumns: 'repeat(3, 1fr) 220px',
      columns: [
        {
          title: 'Financial & Public Sector',
          items: [
            { label: 'Healthcare', href: '/industries/healthcare' },
            { label: 'Fintech', href: '/industries/fintech' },
            { label: 'Banking', href: '/industries/banking' },
            { label: 'Insurance', href: '/industries/insurance' },
            { label: 'Legal', href: '/industries/legal' },
            { label: 'Government', href: '/industries/government' },
          ],
        },
        {
          title: 'Commerce & Industrial',
          items: [
            { label: 'Retail', href: '/industries/retail' },
            { label: 'Ecommerce', href: '/industries/ecommerce' },
            { label: 'Manufacturing', href: '/industries/manufacturing' },
            { label: 'Logistics', href: '/industries/logistics' },
            { label: 'Automotive', href: '/industries/automotive' },
          ],
        },
        {
          title: 'Services & Technology',
          items: [
            { label: 'Education', href: '/industries/education' },
            { label: 'Real Estate', href: '/industries/real-estate' },
            { label: 'Travel', href: '/industries/travel' },
            { label: 'Hospitality', href: '/industries/hospitality' },
          ],
        },
      ],
      cta: {
        title: 'Industry Expertise',
        description: 'Deep domain solutions engineered for specialized compliance & scale.',
        primaryBtnText: 'Explore Industries',
        primaryBtnHref: '/industries',
      },
    },
  },
  {
    id: 'solutions',
    label: 'Solutions',
    href: '/solutions',
    hasMega: true,
    megaConfig: {
      widthClass: 'mega-menu-md',
      gridTemplateColumns: 'repeat(3, 1fr) 220px',
      columns: [
        {
          title: 'Real-Time & AI',
          items: [
            { label: 'WebRTC Development', href: '/solutions/webrtc-development' },
            { label: 'AI Solutions', href: '/solutions/ai-solutions' },
            { label: 'Automation Solutions', href: '/solutions/automation-solutions' },
          ],
        },
        {
          title: 'Cloud & SaaS',
          items: [
            { label: 'SaaS Solutions', href: '/solutions/saas-solutions' },
            { label: 'Cloud Solutions', href: '/solutions/cloud-solutions' },
            { label: 'Startup Solutions', href: '/solutions/startup-solutions' },
          ],
        },
        {
          title: 'Enterprise Software',
          items: [
            { label: 'Enterprise Solutions', href: '/solutions/enterprise-solutions' },
            { label: 'Business Solutions', href: '/solutions/business-solutions' },
          ],
        },
      ],
      cta: {
        title: 'Enterprise Growth',
        description: 'Pre-packaged and modular software frameworks for fast deployment.',
        primaryBtnText: 'View All Solutions',
        primaryBtnHref: '/solutions',
      },
    },
  },
  {
    id: 'case-studies',
    label: 'Case Studies',
    href: '/case-studies',
  },
  {
    id: 'blog',
    label: 'Blog',
    href: '/blog',
  },
];

export const BRAND_ASSETS = {
  logoWhite: 'https://octaviatechnologies.com/assets/white-logo.png',
  logoMain: 'https://octaviatechnologies.com/assets/logo-m.png',
  primaryColor: '#264868',
  primaryDark: '#153758',
  headerHeight: '96px',
};

