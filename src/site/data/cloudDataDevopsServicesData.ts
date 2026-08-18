import { ServicePageData } from '../types/service';

export const CLOUD_DATA_DEVOPS_SUBPAGES: Record<string, ServicePageData> = {
  // Main Cloud Category
  'cloud-data-devops': {
    id: 'cloud-data-devops',
    serviceCategory: 'Cloud, Data & DevOps Services',
    metaTitle: 'Cloud Engineering, Data & DevOps Consulting Services | Octavia Tech Solutions',
    seo: {
      h1: 'Cloud Engineering, Data & DevOps Services',
      metaTitle: 'Cloud Engineering, Data & DevOps Consulting Services | Octavia Tech Solutions',
      metaDescription: 'Scale your enterprise infrastructure with AWS, Azure, and GCP cloud migration, Terraform IaC, Kubernetes container orchestration, CI/CD pipelines, and data engineering.',
      canonicalUrl: 'https://octaviatechnologies.com/services/cloud-data-devops',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Cloud & DevOps', href: '/services/cloud-data-devops' },
      ],
    },
    hero: {
      badge: 'Cloud & DevOps Engineering',
      title: 'Enterprise Cloud, Data & DevOps',
      titleHighlight: 'Services',
      description: 'Transform IT operations with multi-cloud infrastructure, automated CI/CD pipelines, Infrastructure as Code (Terraform), Kubernetes containerization, and enterprise data engineering.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore Cloud Specs',
      tags: ['AWS / Azure / GCP', 'Terraform & IaC', 'Kubernetes (EKS/GKE)', 'Data Engineering & Pipelines'],
    },
    overview: {
      badge: 'WHAT IS CLOUD & DEVOPS',
      heading: 'Cloud-Native Infrastructure & Data Architecture',
      leadParagraph: 'Cloud, Data & DevOps encompasses the engineering disciplines required to provision, secure, automate, and scale modern multi-cloud software environments.',
      secondaryParagraph: 'Octavia Tech Solutions partners with companies to optimize cloud spend (FinOps), automate deployment pipelines (CI/CD), and build scalable data warehouses (Snowflake/BigQuery).',
      pillars: [
        { title: 'Multi-Cloud Architecture', description: 'Certified cloud engineering across Amazon Web Services (AWS), Microsoft Azure, and Google Cloud Platform (GCP).', iconName: 'Cloud' },
        { title: 'Infrastructure as Code (IaC)', description: 'Automated infrastructure provisioning using Terraform, Pulumi, and CloudFormation.', iconName: 'Code2' },
        { title: 'Continuous Integration / Delivery', description: 'GitHub Actions and GitLab CI pipelines releasing updates with zero downtime.', iconName: 'RefreshCw' },
        { title: 'Data Warehousing & Analytics', description: 'Building scalable ETL pipelines feeding Snowflake, Databricks, and BigQuery.', iconName: 'Database' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Enterprise Cloud & DevOps Matters',
      subheading: 'Manual cloud deployments create security vulnerabilities, unexpected cloud bill spikes, and slow release cycles.',
      challenges: [
        {
          id: 'cddc1',
          category: 'Cloud Cost Control',
          issue: 'Slash Wasted AWS / Azure / GCP Cloud Spend by Up to 40%',
          impact: 'Eliminate over-provisioned servers and optimize cloud reservations.',
          description: 'FinOps audits identify idle cloud resources and implement auto-scaling rules.',
        },
        {
          id: 'cddc2',
          category: 'Deployment Speed',
          issue: 'Release Software Updates Daily Instead of Quarterly',
          impact: 'Accelerate feature delivery with zero manual deployment errors.',
          description: 'Automated CI/CD testing pipelines catch bugs before production releases.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Everything Included in Our Cloud, Data & DevOps Services',
      subheading: 'End-to-end cloud infrastructure and data engineering solutions.',
      categories: ['Cloud Architecture', 'DevOps & CI/CD', 'Data Engineering'],
      features: [
        {
          id: 'cddf1',
          title: 'Infrastructure as Code (IaC) & Terraform',
          category: 'Cloud Architecture',
          iconName: 'Cloud',
          badge: 'Cloud Native',
          businessBenefit: 'Automates Server Provisioning',
          description: 'Declarative infrastructure templates in Terraform ensuring 100% reproducible environments.',
          points: ['Terraform & Pulumi Modules', 'Multi-Region Replication', 'Automated Disaster Recovery'],
        },
        {
          id: 'cddf2',
          title: 'Data Engineering & ETL Pipelines',
          category: 'Data Engineering',
          iconName: 'Database',
          badge: 'High Speed',
          businessBenefit: 'Real-Time Enterprise Analytics',
          description: 'Building Airflow data pipelines and dbt transformations feeding BigQuery, Snowflake, and Redshift.',
          points: ['Apache Airflow & dbt', 'Snowflake & BigQuery Warehouses', 'Real-Time Event Streaming'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'Cloud & DevOps FAQ',
      subheading: 'Answers about multi-cloud migration, FinOps, and CI/CD pipelines.',
      faqs: [
        {
          question: 'How quickly can your DevOps team set up automated CI/CD pipelines for our project?',
          answer: 'We set up production GitHub Actions or GitLab CI/CD pipelines with automated testing and staging environments in 3 to 5 business days.',
        },
      ],
    },
    cta: {
      badge: 'CLOUD AUDIT',
      heading: 'Ready to Optimize Your Cloud Infrastructure & Data Pipelines?',
      description: 'Consult with our senior cloud architects to evaluate your AWS, Azure, or GCP environment.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore Cloud Specs',
    },
  },

  // 1. Cloud Consulting
  'cloud-consulting': {
    id: 'cloud-consulting',
    serviceCategory: 'Cloud Consulting Services',
    metaTitle: 'Cloud Consulting & Architecture Services | Octavia Tech Solutions',
    seo: {
      h1: 'Cloud Consulting & Architecture Services',
      metaTitle: 'Cloud Consulting & Architecture Services | Octavia Tech Solutions',
      metaDescription: 'Strategic cloud architecture planning, FinOps cost optimization, multi-cloud strategy (AWS, GCP, Azure), and cloud security audits by certified cloud architects.',
      canonicalUrl: 'https://octaviatechnologies.com/services/cloud-data-devops/cloud-consulting',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Cloud & DevOps', href: '/services/cloud-data-devops' },
        { name: 'Cloud Consulting', href: '/services/cloud-data-devops/cloud-consulting' },
      ],
    },
    hero: {
      badge: 'Cloud Strategy',
      title: 'Cloud Consulting Services',
      titleHighlight: 'Services',
      description: 'Optimize your cloud infrastructure. We partner with technology leaders to design well-architected cloud environments, cut cloud bill spend (FinOps), and enforce zero-trust security.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore Cloud Audit',
      tags: ['FinOps Cloud Savings', 'AWS Well-Architected Framework', 'Multi-Cloud Strategy', 'Zero-Trust Security'],
    },
    overview: {
      badge: 'WHAT IS CLOUD CONSULTING',
      heading: 'Strategic Cloud Architecture & FinOps Advisory',
      leadParagraph: 'Cloud Consulting helps organizations evaluate cloud readiness, select optimal provider services (AWS vs Azure vs GCP), and eliminate architectural inefficiency.',
      secondaryParagraph: 'Octavia Tech Solutions conducts Well-Architected reviews to ensure your cloud workloads achieve high availability, operational excellence, and cost optimization.',
      pillars: [
        { title: 'FinOps Cost Optimization', description: 'Identifying idle resources and right-sizing instances to reduce cloud bills by 30%+', iconName: 'TrendingUp' },
        { title: 'Well-Architected Review', description: 'Auditing cloud security, reliability, performance, and operational excellence.', iconName: 'ShieldCheck' },
        { title: 'Multi-Cloud Strategy', description: 'Designing redundant multi-cloud setups across AWS, Azure, and Google Cloud.', iconName: 'Cloud' },
        { title: 'Disaster Recovery Blueprinting', description: 'Establishing automated backup policies with low RTO and RPO targets.', iconName: 'RefreshCw' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Enterprise Cloud Consulting Matters',
      subheading: 'Unmonitored cloud usage leads to unexpected monthly billing shocks.',
      challenges: [
        {
          id: 'cc1',
          category: 'Cost Control',
          issue: 'Stop Unexpected AWS & Azure Monthly Bill Shocks',
          impact: 'Cut monthly cloud hosting spend by 30% to 40%.',
          description: 'FinOps recommendations right-size workloads and utilize reserved instances.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our Cloud Consulting Service',
      subheading: 'Comprehensive cloud architecture and FinOps advisory.',
      categories: ['FinOps', 'Architecture', 'Security Audit'],
      features: [
        {
          id: 'ccf1',
          title: 'FinOps Cloud Cost Optimization Audit',
          category: 'FinOps',
          iconName: 'TrendingUp',
          badge: 'Saves 30%+',
          businessBenefit: 'Direct Monthly Bill Reduction',
          description: 'Deep audit of AWS/Azure/GCP billing metrics, reserved instance recommendations, and idle server removal.',
          points: ['Detailed Cloud Cost Report', 'Right-Sizing Specifications', 'Reserved Instance Blueprint'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'Cloud Consulting FAQ',
      subheading: 'Answers about FinOps audits and cloud provider selection.',
      faqs: [
        {
          question: 'How much money can a FinOps cloud cost optimization audit save our company?',
          answer: 'Our FinOps audits typically uncover 30% to 40% in monthly cloud savings by terminating unattached volumes, right-sizing compute, and purchasing savings plans.',
        },
      ],
    },
    cta: {
      badge: 'CLOUD AUDIT',
      heading: 'Ready to Audit & Optimize Your Cloud Infrastructure?',
      description: 'Schedule a cloud architecture review with our certified AWS/Azure/GCP architects.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore Cloud Audit',
    },
  },

  // 2. AWS Consulting
  'aws-consulting': {
    id: 'aws-consulting',
    serviceCategory: 'AWS Consulting Services',
    metaTitle: 'AWS Consulting Services | Certified AWS Solutions Architects | Octavia Tech Solutions',
    seo: {
      h1: 'Amazon Web Services (AWS) Consulting',
      metaTitle: 'AWS Consulting Services | Certified AWS Solutions Architects | Octavia Tech Solutions',
      metaDescription: 'Certified AWS Solutions Architects engineering Amazon EC2, EKS, Serverless Lambda, RDS, S3, and CloudFront infrastructure with 99.99% availability.',
      canonicalUrl: 'https://octaviatechnologies.com/services/cloud-data-devops/aws-consulting',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Cloud & DevOps', href: '/services/cloud-data-devops' },
        { name: 'AWS Consulting', href: '/services/cloud-data-devops/aws-consulting' },
      ],
    },
    hero: {
      badge: 'AWS Certified Partners',
      title: 'AWS Consulting Services',
      titleHighlight: 'Services',
      description: 'Build fast, secure, and resilient infrastructure on Amazon Web Services. Our certified AWS architects design serverless Lambda architectures, EKS Kubernetes clusters, and RDS multi-region databases.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore AWS Specs',
      tags: ['AWS EC2 & EKS', 'Serverless Lambda & API Gateway', 'Amazon RDS & Aurora', 'CloudFront & S3 CDN'],
    },
    overview: {
      badge: 'WHAT IS AWS CONSULTING',
      heading: 'Certified Amazon Web Services Architecture',
      leadParagraph: 'AWS Consulting involves designing, migrating, and optimizing enterprise applications on Amazon Web Services using AWS Well-Architected Framework guidelines.',
      secondaryParagraph: 'Octavia Tech Solutions provisions AWS infrastructure using Terraform IaC templates, ensuring high availability, IAM security controls, and auto-scaling.',
      pillars: [
        { title: 'Serverless Lambda Architecture', description: 'Event-driven compute executing code without managing underlying EC2 servers.', iconName: 'Zap' },
        { title: 'Amazon EKS Kubernetes', description: 'Managed Kubernetes clusters containerizing microservices for elastic scaling.', iconName: 'Server' },
        { title: 'Aurora Multi-Region DB', description: 'Sub-10ms global database replication with automated failover handling.', iconName: 'Database' },
        { title: 'AWS IAM & KMS Security', description: 'Zero-trust identity governance, encryption keys, and AWS GuardDuty threat monitoring.', iconName: 'ShieldCheck' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Certified AWS Consulting Matters',
      subheading: 'Improperly configured AWS environments cause security breaches and massive bill overruns.',
      challenges: [
        {
          id: 'aws1',
          category: 'AWS Optimization',
          issue: 'Maximize AWS Performance & Security Controls',
          impact: 'Ensure 99.99% uptime with zero security misconfigurations.',
          description: 'Certified AWS architects design infrastructure according to official AWS best practices.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our AWS Engineering Service',
      subheading: 'End-to-end AWS cloud architecture and management.',
      categories: ['AWS Serverless', 'EKS & Containers', 'RDS & Storage'],
      features: [
        {
          id: 'awsf1',
          title: 'AWS Serverless & Kubernetes Architecture',
          category: 'AWS Serverless',
          iconName: 'Cloud',
          badge: 'AWS Certified',
          businessBenefit: 'Zero Server Management Overhead',
          description: 'Building serverless API workflows with Lambda, DynamoDB, S3, and API Gateway.',
          points: ['AWS Lambda & DynamoDB', 'Amazon EKS Clusters', 'CloudFront CDN & WAF'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'AWS Consulting FAQ',
      subheading: 'Answers about AWS certifications and serverless architecture.',
      faqs: [
        {
          question: 'Are your cloud engineers certified AWS Solutions Architects?',
          answer: 'Yes! Our cloud team holds official AWS Certified Solutions Architect Professional and AWS Certified DevOps Engineer credentials.',
        },
      ],
    },
    cta: {
      badge: 'AWS AUDIT',
      heading: 'Need Certified AWS Architecture Built for Your App?',
      description: 'Consult with our certified AWS architects to review your infrastructure specs.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore AWS Specs',
    },
  },

  // 3. Azure Consulting
  'azure-consulting': {
    id: 'azure-consulting',
    serviceCategory: 'Azure Consulting Services',
    metaTitle: 'Microsoft Azure Consulting Services | Octavia Tech Solutions',
    seo: {
      h1: 'Microsoft Azure Cloud Consulting',
      metaTitle: 'Microsoft Azure Consulting Services | Octavia Tech Solutions',
      metaDescription: 'Enterprise Microsoft Azure cloud engineering. Azure Kubernetes Service (AKS), Azure Active Directory (Entra ID), Azure SQL, and Azure OpenAI VPC setups.',
      canonicalUrl: 'https://octaviatechnologies.com/services/cloud-data-devops/azure-consulting',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Cloud & DevOps', href: '/services/cloud-data-devops' },
        { name: 'Azure Consulting', href: '/services/cloud-data-devops/azure-consulting' },
      ],
    },
    hero: {
      badge: 'Microsoft Azure Experts',
      title: 'Microsoft Azure Consulting',
      titleHighlight: 'Services',
      description: 'Scale your enterprise workloads on Microsoft Azure. We specialize in Azure Kubernetes Service (AKS), Entra ID (Azure AD) identity, Azure SQL databases, and private Azure OpenAI deployments.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore Azure Specs',
      tags: ['Azure Kubernetes (AKS)', 'Microsoft Entra ID (Azure AD)', 'Azure SQL & Cosmos DB', 'Azure OpenAI Private VPC'],
    },
    overview: {
      badge: 'WHAT IS AZURE CONSULTING',
      heading: 'Microsoft Azure Enterprise Architecture',
      leadParagraph: 'Azure Consulting focuses on engineering hybrid and public cloud infrastructure on Microsoft Azure, seamlessly integrating with Microsoft 365, Active Directory, and .NET ecosystems.',
      secondaryParagraph: 'Octavia Tech Solutions provisions Azure infrastructure with Bicep and Terraform IaC scripts, ensuring seamless enterprise security compliance.',
      pillars: [
        { title: 'Azure Kubernetes Service (AKS)', description: 'Deploying containerized enterprise applications with automated scaling.', iconName: 'Server' },
        { title: 'Microsoft Entra ID (Azure AD)', description: 'Centralized identity, MFA, and SSO governance across enterprise applications.', iconName: 'ShieldCheck' },
        { title: 'Azure SQL & Cosmos DB', description: 'Global multi-region database setups with sub-10ms response latency.', iconName: 'Database' },
        { title: 'Azure OpenAI Private Service', description: 'Deploying GPT-4o models inside secure private Azure Virtual Networks (VNet).', iconName: 'Lock' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Microsoft Azure Consulting Matters',
      subheading: 'Enterprise Microsoft shops need native Azure integration forActive Directory and Windows workloads.',
      challenges: [
        {
          id: 'az1',
          category: 'Enterprise Integration',
          issue: 'Seamlessly Connect On-Premise Active Directory to Azure',
          impact: 'Unify corporate user access control across on-premise and cloud systems.',
          description: 'Azure Hybrid Benefit and Entra Connect sync enterprise user directories securely.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our Azure Engineering Service',
      subheading: 'End-to-end Microsoft Azure cloud infrastructure and AI setups.',
      categories: ['Azure AKS', 'Entra ID & Security', 'Azure OpenAI'],
      features: [
        {
          id: 'azf1',
          title: 'Azure AKS & Entra ID Infrastructure',
          category: 'Azure AKS',
          iconName: 'Cloud',
          badge: 'Microsoft Tech',
          businessBenefit: 'Seamless Enterprise Integration',
          description: 'Building secure Azure cloud setups integrated with Entra ID and Azure DevOps pipelines.',
          points: ['Azure AKS Clusters', 'Microsoft Entra ID (Azure AD)', 'Azure SQL & Cosmos DB'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'Azure Consulting FAQ',
      subheading: 'Answers about Azure hybrid setups and Microsoft licensing.',
      faqs: [
        {
          question: 'Do you help migrate on-premise Windows Server and SQL Server workloads to Azure?',
          answer: 'Yes! We leverage Azure Migrate tools and Azure Hybrid Benefit to migrate legacy Windows and SQL workloads with zero data loss and maximum license savings.',
        },
      ],
    },
    cta: {
      badge: 'AZURE AUDIT',
      heading: 'Need Microsoft Azure Infrastructure Built for Your Enterprise?',
      description: 'Consult with our Azure cloud architects to review your infrastructure specifications.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore Azure Specs',
    },
  },

  // 4. Google Cloud Consulting
  'google-cloud-consulting': {
    id: 'google-cloud-consulting',
    serviceCategory: 'Google Cloud Consulting Services',
    metaTitle: 'Google Cloud (GCP) Consulting Services | Octavia Tech Solutions',
    seo: {
      h1: 'Google Cloud Platform (GCP) Consulting',
      metaTitle: 'Google Cloud (GCP) Consulting Services | Octavia Tech Solutions',
      metaDescription: 'Engineered Google Cloud Platform (GCP) infrastructure. Google Kubernetes Engine (GKE), BigQuery data warehousing, Vertex AI, and Cloud Run serverless apps.',
      canonicalUrl: 'https://octaviatechnologies.com/services/cloud-data-devops/google-cloud-consulting',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Cloud & DevOps', href: '/services/cloud-data-devops' },
        { name: 'Google Cloud Consulting', href: '/services/cloud-data-devops/google-cloud-consulting' },
      ],
    },
    hero: {
      badge: 'Google Cloud Partners',
      title: 'Google Cloud Consulting',
      titleHighlight: 'Services',
      description: 'Harness the data and AI power of Google Cloud Platform. We build containerized GKE clusters, high-speed BigQuery data warehouses, Cloud Run serverless backends, and Vertex AI deployments.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore GCP Specs',
      tags: ['Google Kubernetes Engine (GKE)', 'BigQuery Data Warehouse', 'Vertex AI & Gemini', 'Cloud Run & App Engine'],
    },
    overview: {
      badge: 'WHAT IS GCP CONSULTING',
      heading: 'Google Cloud Platform Enterprise Architecture',
      leadParagraph: 'GCP Consulting involves designing and deploying cloud-native applications on Google Cloud Platform, maximizing speed for data analytics, containerization, and AI workloads.',
      secondaryParagraph: 'Octavia Tech Solutions provisions GCP environments using Terraform IaC scripts with Google Cloud IAM zero-trust security controls.',
      pillars: [
        { title: 'Google Kubernetes Engine (GKE)', description: 'The industry-standard managed Kubernetes platform with Autopilot scaling.', iconName: 'Server' },
        { title: 'BigQuery Data Warehouse', description: 'Serverless, highly scalable multi-cloud data warehouse querying petabytes in seconds.', iconName: 'Database' },
        { title: 'Vertex AI & Gemini Models', description: 'Deploying custom Machine Learning and LLM models on Google’s AI infrastructure.', iconName: 'Brain' },
        { title: 'Cloud Run Serverless', description: 'Deploying containerized microservices that auto-scale down to zero when idle.', iconName: 'Zap' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Google Cloud Platform Matters for Data & AI',
      subheading: 'GCP provides unmatched infrastructure speed for Big Data analytics and Machine Learning.',
      challenges: [
        {
          id: 'gcp1',
          category: 'Big Data Speed',
          issue: 'Query Petabytes of Business Data in Seconds',
          impact: 'Unlock real-time operational analytics with Google BigQuery.',
          description: 'BigQuery serverless architecture executes complex SQL queries over petabytes instantly.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our GCP Engineering Service',
      subheading: 'End-to-end Google Cloud infrastructure, data, and AI setups.',
      categories: ['GKE & Containers', 'BigQuery Analytics', 'Vertex AI'],
      features: [
        {
          id: 'gcpf1',
          title: 'Google GKE & BigQuery Architecture',
          category: 'GKE & Containers',
          iconName: 'Cloud',
          badge: 'Google Tech',
          businessBenefit: 'Petabyte Data & AI Speed',
          description: 'Building containerized GKE Autopilot clusters and serverless BigQuery data warehouses.',
          points: ['GKE Autopilot Clusters', 'BigQuery SQL Data Warehouse', 'Vertex AI & Gemini Models'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'GCP Consulting FAQ',
      subheading: 'Answers about BigQuery cost management and GKE Autopilot.',
      faqs: [
        {
          question: 'Why choose Google Cloud (GCP) for data warehousing and AI?',
          answer: 'GCP offers industry-leading performance for big data analytics (BigQuery) and native integration with Google’s Gemini AI models via Vertex AI.',
        },
      ],
    },
    cta: {
      badge: 'GCP AUDIT',
      heading: 'Need Google Cloud Infrastructure or BigQuery Built for Your App?',
      description: 'Consult with our GCP cloud architects to review your infrastructure specifications.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore GCP Specs',
    },
  },

  // 5. Cloud Migration
  'cloud-migration': {
    id: 'cloud-migration',
    serviceCategory: 'Cloud Migration Services',
    metaTitle: 'Cloud Migration Services | On-Premise to AWS/Azure/GCP | Octavia Tech Solutions',
    seo: {
      h1: 'Cloud Migration Services & Strategy',
      metaTitle: 'Cloud Migration Services | On-Premise to AWS/Azure/GCP | Octavia Tech Solutions',
      metaDescription: 'Migrate on-premise servers and legacy databases to AWS, Azure, or GCP with zero downtime. Re-host, re-platform, or re-architect applications safely.',
      canonicalUrl: 'https://octaviatechnologies.com/services/cloud-data-devops/cloud-migration',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Cloud & DevOps', href: '/services/cloud-data-devops' },
        { name: 'Cloud Migration', href: '/services/cloud-data-devops/cloud-migration' },
      ],
    },
    hero: {
      badge: 'Cloud Migration Engineering',
      title: 'Cloud Migration Services',
      titleHighlight: 'Services',
      description: 'Migrate your legacy data center or cloud workloads seamlessly. We execute zero-downtime cloud migrations to AWS, Azure, and GCP using proven 6Rs methodologies.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore Migration Plan',
      tags: ['Zero Downtime Migration', 'AWS / Azure / GCP Target', 'Database Replication', '6Rs Migration Framework'],
    },
    overview: {
      badge: 'WHAT IS CLOUD MIGRATION',
      heading: 'Enterprise Cloud Migration Strategy Explained',
      leadParagraph: 'Cloud Migration is the process of moving digital assets, services, databases, and IT resources into a public or private cloud computing environment.',
      secondaryParagraph: 'Octavia Tech Solutions uses continuous database replication and parallel staging environments to ensure 100% data integrity and zero business interruption.',
      pillars: [
        { title: '6Rs Strategy Framework', description: 'Re-host (Lift & Shift), Re-platform, or Re-architect based on business goals.', iconName: 'Layers' },
        { title: 'Zero-Downtime Data Sync', description: 'Continuous database CDC replication ensuring zero data loss during cutover.', iconName: 'Database' },
        { title: 'Security & Compliance Migration', description: 'Preserving firewalls, access controls, and encryption standards in the cloud.', iconName: 'ShieldCheck' },
        { title: 'Post-Migration Optimization', description: 'Right-sizing cloud instances immediately post-migration to control costs.', iconName: 'TrendingUp' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Professional Cloud Migration Matters',
      subheading: 'Unplanned migration cutovers cause data corruption and extended business outages.',
      challenges: [
        {
          id: 'cm1',
          category: 'Business Continuity',
          issue: 'Execute Seamless Cloud Cutovers Without Downtime',
          impact: 'Protect enterprise operations and customer access throughout migration.',
          description: 'Parallel cutover testing ensures new cloud environments are 100% verified before DNS switch.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our Cloud Migration Service',
      subheading: 'Safe, structured cloud migration methodologies.',
      categories: ['6Rs Planning', 'Data Sync', 'Cutover'],
      features: [
        {
          id: 'cmf1',
          title: 'Zero-Downtime Database & App Cloud Migration',
          category: 'Data Sync',
          iconName: 'Cloud',
          badge: 'Zero Downtime',
          businessBenefit: '100% Data Integrity Guaranteed',
          description: 'Migrating on-premise SQL/Oracle databases and web apps to AWS, Azure, or GCP.',
          points: ['AWS DMS & Azure Migrate', 'CDC Database Replication', 'DNS Blue-Green Cutover'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'Cloud Migration FAQ',
      subheading: 'Answers about migration risks and downtime prevention.',
      faqs: [
        {
          question: 'How do you guarantee zero data loss during database cloud migration?',
          answer: 'We set up Change Data Capture (CDC) replication to continuously mirror live database updates to the target cloud database until the final cutover moment.',
        },
      ],
    },
    cta: {
      badge: 'MIGRATION AUDIT',
      heading: 'Planning a Cloud Migration to AWS, Azure, or GCP?',
      description: 'Schedule a cloud migration assessment with our senior migration engineers.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore Migration Plan',
    },
  },

  // 6. DevOps Consulting
  'devops-consulting': {
    id: 'devops-consulting',
    serviceCategory: 'DevOps Consulting Services',
    metaTitle: 'DevOps Consulting Services | CI/CD & Kubernetes | Octavia Tech Solutions',
    seo: {
      h1: 'DevOps Consulting & CI/CD Services',
      metaTitle: 'DevOps Consulting Services | CI/CD & Kubernetes | Octavia Tech Solutions',
      metaDescription: 'Automate software deployments with DevOps consulting. GitHub Actions CI/CD pipelines, Kubernetes container orchestration, Terraform IaC, and 24/7 SRE monitoring.',
      canonicalUrl: 'https://octaviatechnologies.com/services/cloud-data-devops/devops-consulting',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Cloud & DevOps', href: '/services/cloud-data-devops' },
        { name: 'DevOps Consulting', href: '/services/cloud-data-devops/devops-consulting' },
      ],
    },
    hero: {
      badge: 'DevOps Engineering',
      title: 'DevOps Consulting Services',
      titleHighlight: 'Services',
      description: 'Accelerate software release velocity. We automate deployment pipelines, implement Infrastructure as Code (Terraform), orchestrate Kubernetes clusters, and establish 24/7 SRE monitoring.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore DevOps Specs',
      tags: ['GitHub Actions CI/CD', 'Terraform IaC', 'Kubernetes Orchestration', '24/7 SRE Monitoring'],
    },
    overview: {
      badge: 'WHAT IS DEVOPS CONSULTING',
      heading: 'Automated DevOps & Site Reliability Engineering (SRE)',
      leadParagraph: 'DevOps Consulting bridges software development and IT operations by building automated continuous integration and continuous deployment (CI/CD) pipelines.',
      secondaryParagraph: 'Octavia Tech Solutions eliminates manual deployment errors by implementing Infrastructure as Code (IaC) and automated integration testing.',
      pillars: [
        { title: 'Automated CI/CD Pipelines', description: 'Building GitHub Actions or GitLab CI workflows that build and test code automatically.', iconName: 'RefreshCw' },
        { title: 'Infrastructure as Code (IaC)', description: 'Managing cloud infrastructure declaratively with Terraform and Ansible.', iconName: 'Code2' },
        { title: 'Kubernetes Container Orchestration', description: 'Automating deployment, scaling, and management of containerized apps.', iconName: 'Server' },
        { title: '24/7 SRE Observability', description: 'Prometheus, Grafana, Datadog, and PagerDuty monitoring for sub-15min incident alerts.', iconName: 'Clock' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Professional DevOps Consulting Matters',
      subheading: 'Manual software deployments lead to broken releases and slow feature updates.',
      challenges: [
        {
          id: 'doc1',
          category: 'Release Speed',
          issue: 'Release Software Features Daily with Zero Errors',
          impact: 'Accelerate time-to-market and outpace competitor release cycles.',
          description: 'Automated CI/CD testing pipelines catch bugs before production deployments.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our DevOps Engineering Service',
      subheading: 'End-to-end DevOps automation and SRE observability.',
      categories: ['CI/CD Pipelines', 'IaC & Terraform', 'SRE Monitoring'],
      features: [
        {
          id: 'docf1',
          title: 'Automated CI/CD Pipeline & IaC Setup',
          category: 'CI/CD Pipelines',
          iconName: 'RefreshCw',
          badge: 'High Automation',
          businessBenefit: 'Accelerates Release Velocity by 5x',
          description: 'Developing automated build, test, and release pipelines connected to Kubernetes clusters.',
          points: ['GitHub Actions / GitLab CI', 'Terraform Cloud Provisioning', 'Datadog & Grafana Alerts'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'DevOps Consulting FAQ',
      subheading: 'Answers about CI/CD tools and Kubernetes orchestration.',
      faqs: [
        {
          question: 'Which CI/CD tools do you recommend for enterprise deployment pipelines?',
          answer: 'We specialize in GitHub Actions, GitLab CI/CD, ArgoCD (GitOps for Kubernetes), and Jenkins based on your existing workflow preferences.',
        },
      ],
    },
    cta: {
      badge: 'DEVOPS AUDIT',
      heading: 'Ready to Automate Your Software Deployment Pipelines?',
      description: 'Consult with our senior DevOps and SRE engineers to review your pipeline specifications.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore DevOps Specs',
    },
  },

  // 7. Data Engineering
  'data-engineering': {
    id: 'data-engineering',
    serviceCategory: 'Data Engineering Services',
    metaTitle: 'Data Engineering Services | Pipelines & Warehousing | Octavia Tech Solutions',
    seo: {
      h1: 'Data Engineering & Pipeline Services',
      metaTitle: 'Data Engineering Services | Pipelines & Warehousing | Octavia Tech Solutions',
      metaDescription: 'Build scalable data pipelines, ETL workflows (Airflow/dbt), and enterprise data warehouses in Snowflake, BigQuery, and Databricks.',
      canonicalUrl: 'https://octaviatechnologies.com/services/cloud-data-devops/data-engineering',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Cloud & DevOps', href: '/services/cloud-data-devops' },
        { name: 'Data Engineering', href: '/services/cloud-data-devops/data-engineering' },
      ],
    },
    hero: {
      badge: 'Data Infrastructure',
      title: 'Data Engineering Services',
      titleHighlight: 'Services',
      description: 'Turn fragmented company data into unified analytics. We build automated ETL data pipelines, real-time event streaming, and cloud data warehouses in Snowflake, BigQuery, and Databricks.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore Data Specs',
      tags: ['Snowflake & BigQuery', 'Apache Airflow & dbt', 'Real-Time Kafka Streaming', 'Automated ETL Pipelines'],
    },
    overview: {
      badge: 'WHAT IS DATA ENGINEERING',
      heading: 'Enterprise Data Architecture & ETL Pipelines Explained',
      leadParagraph: 'Data Engineering is the software discipline of building scalable data architectures, ingestion pipelines, and cloud warehouses that consolidate enterprise data for analytics.',
      secondaryParagraph: 'Octavia Tech Solutions designs modern data stacks (MDS) using dbt, Apache Airflow, Kafka, and Snowflake to ensure clean, reliable data delivery.',
      pillars: [
        { title: 'Modern Data Stack (MDS)', description: 'Leveraging dbt, Fivetran, Airflow, and Snowflake for automated data transformations.', iconName: 'Database' },
        { title: 'Real-Time Event Streaming', description: 'Apache Kafka and AWS Kinesis pipelines ingesting millions of data events per second.', iconName: 'Zap' },
        { title: 'Data Quality & Validation', description: 'Great Expectations assertions preventing bad data from corrupting BI reports.', iconName: 'ShieldCheck' },
        { title: 'Data Lakehouse Architecture', description: 'Combining structured SQL warehousing with flexible object store data lakes.', iconName: 'Server' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Enterprise Data Engineering Matters',
      subheading: 'Siloed and unverified company data leads to inaccurate executive reporting.',
      challenges: [
        {
          id: 'de1',
          category: 'Data Reliability',
          issue: 'Consolidate Siloed Databases into a Single Source of Truth',
          impact: 'Power real-time executive dashboards with verified business metrics.',
          description: 'Automated ETL pipelines sync CRM, ERP, and payment databases into Snowflake or BigQuery.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our Data Engineering Service',
      subheading: 'End-to-end data pipeline and data warehouse engineering.',
      categories: ['ETL Pipelines', 'Data Warehousing', 'Real-Time Sync'],
      features: [
        {
          id: 'def1',
          title: 'Snowflake & BigQuery Data Warehouse Architecture',
          category: 'Data Warehousing',
          iconName: 'Database',
          badge: 'Modern Stack',
          businessBenefit: 'Real-Time Executive Intelligence',
          description: 'Building automated dbt transformations and Airflow DAGs feeding cloud data warehouses.',
          points: ['Snowflake & BigQuery Setup', 'dbt Data Transformations', 'Apache Airflow Orchestration'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'Data Engineering FAQ',
      subheading: 'Answers about Snowflake, BigQuery, and ETL transformations.',
      faqs: [
        {
          question: 'How do you prevent broken data pipelines from corrupting downstream BI dashboards?',
          answer: 'We write automated data quality assertions using dbt tests and Great Expectations to catch schema changes and bad data before loading into production tables.',
        },
      ],
    },
    cta: {
      badge: 'DATA AUDIT',
      heading: 'Ready to Build a Unified Enterprise Data Warehouse?',
      description: 'Consult with our data engineers to review your pipeline architecture.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore Data Specs',
    },
  },

  // 8. Data Analytics
  'data-analytics': {
    id: 'data-analytics',
    serviceCategory: 'Data Analytics Services',
    metaTitle: 'Data Analytics & Business Intelligence Services | Octavia Tech Solutions',
    seo: {
      h1: 'Data Analytics & BI Engineering Services',
      metaTitle: 'Data Analytics & Business Intelligence Services | Octavia Tech Solutions',
      metaDescription: 'Turn data into actionable business insights with interactive Power BI, Tableau, and Looker dashboards, predictive modeling, and executive KPI reporting.',
      canonicalUrl: 'https://octaviatechnologies.com/services/cloud-data-devops/data-analytics',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Cloud & DevOps', href: '/services/cloud-data-devops' },
        { name: 'Data Analytics', href: '/services/cloud-data-devops/data-analytics' },
      ],
    },
    hero: {
      badge: 'Business Intelligence',
      title: 'Data Analytics & BI Services',
      titleHighlight: 'Services',
      description: 'Transform complex datasets into interactive visual dashboards. We design custom Power BI, Tableau, and Looker Studio dashboards that track real-time KPIs and drive data-backed decisions.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore Analytics Specs',
      tags: ['Power BI & Tableau', 'Looker Studio Dashboards', 'Real-Time KPI Tracking', 'Predictive Business Insights'],
    },
    overview: {
      badge: 'WHAT IS DATA ANALYTICS',
      heading: 'Business Intelligence & Data Visualization Explained',
      leadParagraph: 'Data Analytics and Business Intelligence (BI) involve analyzing raw business data to discover trends, answer strategic questions, and power real-time executive decision dashboards.',
      secondaryParagraph: 'Octavia Tech Solutions connects your cloud data warehouse directly to custom-branded Power BI, Tableau, or Looker dashboards with automated data refresh schedules.',
      pillars: [
        { title: 'Interactive BI Dashboards', description: 'Custom Power BI and Tableau dashboards visualizing revenue, churn, and conversion KPIs.', iconName: 'BarChart3' },
        { title: 'Real-Time Executive Alerts', description: 'Automated Slack/Email alerts triggered when key metrics cross critical thresholds.', iconName: 'Zap' },
        { title: 'Self-Service Analytics', description: 'Empowering business teams to query data using simple drag-and-drop interfaces.', iconName: 'Users' },
        { title: 'Customer Lifetime Value (LTV) Modeling', description: 'Cohort analysis measuring customer retention, CAC, and long-term profitability.', iconName: 'TrendingUp' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Business Intelligence & Analytics Matters',
      subheading: 'Operating without real-time BI dashboards leads to delayed reactions to market changes.',
      challenges: [
        {
          id: 'da1',
          category: 'Decision Speed',
          issue: 'Make Real-Time Business Decisions with Live Dashboards',
          impact: 'Identify revenue opportunities and cost leakage instantly.',
          description: 'Live BI dashboards replace slow static spreadsheets with real-time data.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our Data Analytics Service',
      subheading: 'End-to-end visual dashboard and Business Intelligence setup.',
      categories: ['BI Dashboards', 'KPI Tracking', 'Customer LTV'],
      features: [
        {
          id: 'daf1',
          title: 'Power BI, Tableau & Looker Dashboard Design',
          category: 'BI Dashboards',
          iconName: 'BarChart3',
          badge: 'Visual BI',
          businessBenefit: 'Instant Executive Decision Support',
          description: 'Designing custom interactive dashboards connected live to Snowflake, BigQuery, or SQL databases.',
          points: ['Power BI & Tableau Setup', 'Looker Studio Dashboards', 'Automated Daily Data Refresh'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'Data Analytics FAQ',
      subheading: 'Answers about dashboard tools and data security.',
      faqs: [
        {
          question: 'Which Business Intelligence (BI) tool do you recommend: Power BI, Tableau, or Looker?',
          answer: 'We recommend Power BI for Microsoft enterprise environments, Looker for Google Cloud BigQuery users, and Tableau for complex data visualization needs.',
        },
      ],
    },
    cta: {
      badge: 'ANALYTICS AUDIT',
      heading: 'Ready to Build Live Executive BI Dashboards for Your Business?',
      description: 'Consult with our Business Intelligence analysts to review your KPI reporting.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore Analytics Specs',
    },
  },
};
