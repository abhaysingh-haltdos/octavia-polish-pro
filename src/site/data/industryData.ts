export interface IndustryMetric {
  label: string;
  value: string;
  description: string;
}

export interface IndustryFeature {
  title: string;
  description: string;
  iconName: string;
  highlights: string[];
}

export interface IndustryUseCase {
  title: string;
  clientType: string;
  challenge: string;
  solution: string;
  result: string;
}

export interface IndustryFAQ {
  question: string;
  answer: string;
}

export interface IndustryPageData {
  slug: string;
  title: string;
  shortTitle: string;
  tagline: string;
  metaDescription: string;
  category: string;
  metrics: IndustryMetric[];
  overview: {
    heading: string;
    description: string;
    paragraphs: string[];
  };
  features: IndustryFeature[];
  techSpecs?: {
    category: string;
    items: { label: string; value: string }[];
  }[];
  useCases: IndustryUseCase[];
  faqs: IndustryFAQ[];
  relatedIndustries?: string[];
}

export const INDUSTRY_DATA: Record<string, IndustryPageData> = {
  'wholesale-softswitch-billing': {
    slug: 'wholesale-softswitch-billing',
    title: 'Carrier-Grade Wholesale Softswitch & Real-Time Billing Platform',
    shortTitle: 'Wholesale Softswitch Billing',
    tagline: 'High-performance Class 4 VoIP routing, automated rate sheet imports, least-cost routing (LCR), and zero-leakage financial settlement for global carriers.',
    metaDescription: 'Enterprise Class 4 Wholesale Softswitch and Real-Time Billing solution. Features LCR engine, SIP billing, CDR processing, multi-tenant reseller portals, and automated carrier interconnect settlements.',
    category: 'Telecom & Networking',
    metrics: [
      { label: 'CDR Processing', value: '50M+/Day', description: 'Real-time rating and CDR processing with zero latency' },
      { label: 'SLA Availability', value: '99.999%', description: 'Carrier-grade HA active-active geo-redundant cluster' },
      { label: 'Revenue Protection', value: '100%', description: 'Automated credit limits & fraud detection guardrails' },
      { label: 'Settlement Efficiency', value: '95%', description: 'Reduction in manual carrier reconciliation effort' },
    ],
    overview: {
      heading: 'Scalable Class 4 Softswitch & Automated Carrier Interconnect Billing',
      description: 'Engineered specifically for wholesale VoIP providers, Tier-1/2 carriers, MVNOs, and SIP trunking operators requiring sub-millisecond route optimization and flawless financial settlements.',
      paragraphs: [
        'Octavia Tech Solutions presents an enterprise-grade Wholesale Softswitch Billing & Traffic Management platform. Modern telecommunications wholesale environments demand instantaneous rate processing, dynamic Least Cost Routing (LCR), multi-currency invoices, and real-time fraud mitigation.',
        'Our platform unifies high-concurrency SIP signaling (Class 4 softswitch) with a real-time rating engine. By seamlessly managing vendor rate sheet imports (CSV/XLS), dynamic quality/cost routing, and automated bilateral settlements, global carriers eliminate revenue leakage and optimize traffic margins on every call leg.',
      ],
    },
    features: [
      {
        title: 'Real-Time SIP Billing & Rating Engine',
        description: 'Instantaneous per-second call rating for prepaid and postpaid accounts with customizable billing increments, connection fees, and peak/off-peak pricing.',
        iconName: 'Zap',
        highlights: [
          'Prepaid & Postpaid multi-currency account management',
          'Nibble billing with automatic call teardown on balance depletion',
          'Instant balance updates & credit limit alerts',
          'Support for origin-based (OBA) & destination-based rating',
        ],
      },
      {
        title: 'Intelligent Least Cost Routing (LCR)',
        description: 'Dynamic LCR algorithms optimizing route selection based on vendor rates, ASR (Answer-Seizure Ratio), ACD (Average Call Duration), and PDD latency.',
        iconName: 'Compass',
        highlights: [
          'LCR, Quality-based, Percentage, and Priority routing',
          'Real-time failover to secondary vendors in under 15ms',
          'Margin-guard protection preventing negative margin routing',
          'Time-of-day and destination-specific route policies',
        ],
      },
      {
        title: 'Automated Rate Sheet Management',
        description: 'Effortlessly upload and parse complex carrier rate sheets in formats including CSV, XLS, and XML with automated date-activation triggers.',
        iconName: 'FileSpreadsheet',
        highlights: [
          'Automated rate sheet parser supporting millions of codes',
          'Bulk rate increase/decrease conflict checking',
          'Effective date scheduling for seamless rate transitions',
          'Code mapping & breakout translation normalization',
        ],
      },
      {
        title: 'Carrier Interconnect & Bilateral Settlement',
        description: 'Streamline multi-carrier financial settlements, revenue sharing, dispute management, and automated invoice generation.',
        iconName: 'Landmark',
        highlights: [
          'Bilateral traffic netting & statement generation',
          'Dispute resolution center with CDR reconciliation tools',
          'Automated PDF invoice dispatch via email/API',
          'QuickBooks, NetSuite, and SAP ERP integrations',
        ],
      },
      {
        title: 'High-Concurrency CDR Processing',
        description: 'Ultra-low latency CDR ingestion pipeline capable of rating billions of Call Detail Records per month without database bottlenecks.',
        iconName: 'Database',
        highlights: [
          'In-memory Redis rating cache for sub-millisecond evaluation',
          'Full audit log of original SIP headers & disconnect codes',
          'Exportable CDR reports (CSV, JSON, Elastic Search)',
          'Real-time CDR search by Call-ID, ANI, DNIS, and IP',
        ],
      },
      {
        title: 'Multi-Tenant Reseller & MVNO Portal',
        description: 'Empower resellers and wholesale customers with branded self-service web portals for rate lookups, call history, and online payments.',
        iconName: 'Users',
        highlights: [
          'Multi-level white-label reseller hierarchy',
          'Self-service rate sheet downloads & route testing',
          'Integrated payment gateway (Stripe, PayPal, Wire, Credit Card)',
          'Granular role-based access control (RBAC)',
        ],
      },
      {
        title: 'Anti-Fraud Shield & Session Border Control',
        description: 'Proactively detect and block high-risk international traffic, SIP flood attacks, phantom calls, and unauthorized IP interconnects.',
        iconName: 'ShieldAlert',
        highlights: [
          'Real-time suspicious traffic velocity limits',
          'Geo-IP blacklisting & IP ACL enforcement',
          'Automated trunk suspension on abnormal call patterns',
          'Encrypted SIP-TLS / SRTP media protection',
        ],
      },
      {
        title: 'Live Telemetry & Analytics Dashboard',
        description: 'Comprehensive NOC monitoring dashboard with real-time call volume, active channels, concurrent calls (CPS), and margin heatmaps.',
        iconName: 'BarChart3',
        highlights: [
          'Live CPS (Calls Per Second) & active channel gauges',
          'Vendor performance metrics (ASR %, ACD, PDD ms)',
          'Top revenue & top profit destination breakdown',
          'Customizable alert webhooks via Slack, Email, SMS',
        ],
      },
    ],
    techSpecs: [
      {
        category: 'Performance & Capacity',
        items: [
          { label: 'Max Concurrent Calls', value: '100,000+ per cluster' },
          { label: 'CPS (Calls Per Second)', value: '2,000+ CPS' },
          { label: 'CDR Processing Speed', value: '10,000 CDRs/sec' },
          { label: 'Route Lookup Latency', value: '< 2 ms' },
        ],
      },
      {
        category: 'Supported Protocols',
        items: [
          { label: 'Signaling Protocols', value: 'SIP (RFC 3261), SIP-I, SIP-T, SS7' },
          { label: 'Media Protocols', value: 'G.711u/a, G.729, G.722, OPUS' },
          { label: 'Management Interfaces', value: 'REST API, RADIUS, Diameter, SNMP' },
          { label: 'Database & Storage', value: 'PostgreSQL, Redis, Elasticsearch' },
        ],
      },
      {
        category: 'Deployment & High Availability',
        items: [
          { label: 'Architecture', value: 'Docker Containerized / Kubernetes / Bare Metal' },
          { label: 'High Availability', value: 'Active-Active Geo-Redundant Cluster' },
          { label: 'Security', value: 'IPsec, TLS/SRTP, DDoS Rate Limiting' },
          { label: 'Compliance', value: 'ISO 27001, SOC 2 Type II Compliant' },
        ],
      },
    ],
    useCases: [
      {
        title: 'Global Wholesale VoIP Aggregator',
        clientType: 'International Telecom Carrier',
        challenge: 'A global VoIP carrier was losing $120,000/month due to delayed rate sheet processing and manual least-cost routing errors across 80+ interconnect vendors.',
        solution: 'Deployed Octavia Wholesale Softswitch with automated CSV rate parsing and real-time LCR margin enforcement.',
        result: 'Eliminated 100% of negative-margin calls, reduced carrier settlement cycles from 14 days to 2 hours, and boosted gross margin by 22%.',
      },
      {
        title: 'MVNO & SIP Trunking Provider',
        clientType: 'Regional Telecom Service Provider',
        challenge: 'Scaling past 20,000 concurrent calls caused billing system database locks and delayed prepaid customer balance cutoffs.',
        solution: 'Implemented Octavia Redis in-memory rating engine with instant nibble billing and automated SIP teardown.',
        result: 'Achieved 99.999% uptime during peak holidays while processing over 45 million daily CDRs with zero revenue leakage.',
      },
    ],
    faqs: [
      {
        question: 'What is the difference between a Class 4 and Class 5 softswitch in wholesale billing?',
        answer: 'A Class 4 softswitch is optimized for high-volume inter-carrier traffic routing, long-distance call termination, and wholesale financial settlements between telecom operators. A Class 5 softswitch focuses on end-user features like voicemail, call forwarding, and PBX extensions. Our platform is a dedicated Class 4 solution designed specifically for wholesale traffic.',
      },
      {
        question: 'How does the automated Least Cost Routing (LCR) engine handle sudden vendor rate updates?',
        answer: 'When a new rate sheet is uploaded, the platform validates code breakouts, checks effective activation dates, and automatically updates the LCR routing tables in memory. Routes with negative margins are immediately flagged or suppressed, ensuring traffic is only routed through profitable paths.',
      },
      {
        question: 'Can the softswitch integrate with existing accounting systems like QuickBooks or NetSuite?',
        answer: 'Yes. The system includes pre-built REST API connectors for QuickBooks, NetSuite, SAP, and custom ERP systems. Invoices, payment receipts, and bilateral carrier statements sync automatically.',
      },
      {
        question: 'What security measures prevent fraud and SIP flood attacks?',
        answer: 'The system features an integrated Session Border Controller (SBC) security layer with IP Whitelisting, real-time CPS rate limiting, phantom call detection, geo-IP blocking, and automated trunk lockdown if abnormal traffic spikes occur.',
      },
      {
        question: 'How is the platform deployed (Cloud vs. On-Premises)?',
        answer: 'We support flexible deployment options including AWS/Azure/GCP cloud environments, private Kubernetes clusters, or bare-metal on-premises servers depending on your regulatory and latency requirements.',
      },
    ],
    relatedIndustries: ['telecom', 'fintech', 'government', 'manufacturing'],
  },

  'healthcare': {
    slug: 'healthcare',
    title: 'HIPAA-Compliant Healthcare & Life Sciences Software Engineering',
    shortTitle: 'Healthcare & Life Sciences',
    tagline: 'Secure EHR integrations, AI clinical diagnostics, patient portals, and FDA-compliant medical device software.',
    metaDescription: 'Enterprise healthcare software development services. HIPAA compliant EHR integration, clinical AI decision support, telemedicine platforms, and medical IoT solutions.',
    category: 'Healthcare & Life Sciences',
    metrics: [
      { label: 'HIPAA Compliance', value: '100%', description: 'BAA executed with end-to-end encryption' },
      { label: 'Diagnostic Speed', value: '-40%', description: 'Reduction in triage time with AI symptom analysis' },
      { label: 'EHR Integrations', value: '50+', description: 'Epic, Cerner, Allscripts, AthenaHealth FHIR/HL7' },
      { label: 'Patient Adoption', value: '98%', description: 'High satisfaction across mobile patient portals' },
    ],
    overview: {
      heading: 'Transforming Patient Care Through Digital Innovation & Clinical AI',
      description: 'Octavia Tech Solutions designs and deploys secure, scalable healthcare platforms that bridge patient engagement and enterprise hospital operations.',
      paragraphs: [
        'Modern healthcare organizations must balance strict data security (HIPAA, HITECH, GDPR) with seamless clinical workflows and elevated patient experiences. We help hospital networks, biotech firms, and digital health startups build software that saves lives.',
        'From AI-driven clinical decision support and telemedicine portals to HL7/FHIR interoperability and medical IoT device connectivity, our solutions streamline operations while maintaining uncompromised regulatory compliance.',
      ],
    },
    features: [
      {
        title: 'EHR/EMR Integration & Interoperability',
        description: 'Seamless FHIR / HL7 v2/v3 data exchange connecting hospital records with custom patient apps and diagnostic tools.',
        iconName: 'Activity',
        highlights: [
          'Pre-built Epic, Cerner, and AthenaHealth connectors',
          'Bi-directional lab order & results synchronization',
          'Strict audit logging for PHI access control',
        ],
      },
      {
        title: 'Clinical AI & Diagnostic Decision Support',
        description: 'Empower clinicians with machine learning models that analyze medical imaging, lab values, and symptom triage.',
        iconName: 'Cpu',
        highlights: [
          'Medical image DICOM processing & ML segmentation',
          'Automated patient urgency prioritization',
          'Predictive sepsis and readmission risk alerts',
        ],
      },
      {
        title: 'Telehealth & Virtual Care Platforms',
        description: 'WebRTC-powered HD video consultations, integrated e-prescriptions, and automated appointment scheduling.',
        iconName: 'Video',
        highlights: [
          'HIPAA-compliant video & audio calling',
          'Digital intake forms with e-signatures',
          'E-prescribing & pharmacy fulfillment API',
        ],
      },
      {
        title: 'Medical Device & Remote Patient Monitoring (RPM)',
        description: 'Connect wearable sensors and IoT medical equipment for continuous vitals tracking and real-time alerts.',
        iconName: 'HeartPulse',
        highlights: [
          'Bluetooth Low Energy (BLE) sensor sync',
          'Real-time blood pressure & ECG monitoring alerts',
          'FDA SaMD (Software as a Medical Device) readiness',
        ],
      },
    ],
    useCases: [
      {
        title: '50+ Hospital Network Diagnostic Platform',
        clientType: 'Enterprise Healthcare System',
        challenge: 'A major hospital network experienced 3-hour triage delays for urgent specialist consults.',
        solution: 'Built an AI-driven triage assistant integrated directly with Epic EHR via FHIR APIs.',
        result: 'Reduced diagnostic triage time by 40% and improved emergency room throughput by 28%.',
      },
    ],
    faqs: [
      {
        question: 'Are your software development processes HIPAA and HITECH compliant?',
        answer: 'Yes. We sign Business Associate Agreements (BAAs), implement zero-trust access controls, end-to-end AES-256 encryption for data at rest and in transit, and maintain full SOC 2 Type II audit logs.',
      },
    ],
    relatedIndustries: ['fintech', 'government', 'education'],
  },

  'fintech': {
    slug: 'fintech',
    title: 'Enterprise FinTech, Digital Banking & Payment Engineering',
    shortTitle: 'FinTech & Banking',
    tagline: 'Core banking modernization, biometric fraud shields, real-time payment gateways, and PCI-DSS compliant architecture.',
    metaDescription: 'Enterprise FinTech and digital banking software development. Core banking modernization, payment gateway integrations, fraud detection AI, and regulatory compliance.',
    category: 'Financial Services',
    metrics: [
      { label: 'Annual Volume', value: '$12B+', description: 'Processed across digital core banking clients' },
      { label: 'Fraud Reduction', value: '-65%', description: 'With AI behavioral anomaly detection' },
      { label: 'PCI-DSS Compliance', value: 'Level 1', description: 'Highest security certification standard' },
      { label: 'System Uptime', value: '99.999%', description: 'High availability financial transaction engine' },
    ],
    overview: {
      heading: 'Next-Gen Financial Software Engineered for Zero Trust & Scale',
      description: 'Octavia Tech Solutions partners with commercial banks, neo-banks, payment processors, and wealth management firms to build resilient digital finance platforms.',
      paragraphs: [
        'The financial services landscape is evolving rapidly with open banking APIs, real-time payments (FedNow, SEPA, SWIFT), and AI-driven fraud protection. Financial institutions must modernize legacy core systems without interrupting 24/7 client operations.',
        'We deliver bank-grade mobile applications, automated ledger reconciliation tools, cloud-native core banking engines, and algorithmic risk compliance platforms.',
      ],
    },
    features: [
      {
        title: 'Core Banking Modernization',
        description: 'Decouple legacy mainframe systems with microservices architecture for instant account opening and ledger processing.',
        iconName: 'Building2',
        highlights: [
          'Cloud-native event-driven account ledger engine',
          'Open Banking API compliance (PSD2 / FDX)',
          'Real-time transaction settlement',
        ],
      },
      {
        title: 'AI Fraud Detection & Biometric Security',
        description: 'Identify fraudulent transactions in real-time with machine learning models analyzing behavioral telemetry.',
        iconName: 'ShieldCheck',
        highlights: [
          'Sub-10ms transaction anomaly scoring',
          'Biometric facial & liveness KYC verification',
          'Anti-Money Laundering (AML) auto-screening',
        ],
      },
      {
        title: 'QuickBooks & ERP Financial Reconciliation',
        description: 'Automate complex multi-entity ledger reconciliations across ERP systems and bank feeds.',
        iconName: 'FileSpreadsheet',
        highlights: [
          '99.99% automated transaction matching accuracy',
          'Direct QuickBooks, Xero, and NetSuite API sync',
          'Audit trail generation with instant variance alerts',
        ],
      },
    ],
    useCases: [
      {
        title: 'Digital Bank Core Overhaul',
        clientType: 'Regional Commercial Bank',
        challenge: 'Legacy batch processing caused 24-hour delays in mobile account balance updates.',
        solution: 'Engineered an event-driven microservices ledger with real-time push notifications.',
        result: 'Boosted mobile app rating from 3.2 to 4.8 stars and handled $12B+ annual transactions seamlessly.',
      },
    ],
    faqs: [
      {
        question: 'How do you ensure PCI-DSS Level 1 compliance?',
        answer: 'We enforce tokenization, dedicated HSM (Hardware Security Modules) for key management, isolated VPC networks, and continuous vulnerability scanning.',
      },
    ],
    relatedIndustries: ['wholesale-softswitch-billing', 'insurance', 'retail'],
  },

  'retail': {
    slug: 'retail',
    title: 'Headless Global E-Commerce & Omnichannel Retail Technology',
    shortTitle: 'Retail & E-Commerce',
    tagline: 'Headless commerce architecture, AI recommendation engines, real-time inventory sync, and mobile POS systems.',
    metaDescription: 'Enterprise retail and headless e-commerce software development. High-concurrency checkout engines, AI personalized recommendations, and omnichannel POS integration.',
    category: 'Commerce & Retail',
    metrics: [
      { label: 'Revenue Growth', value: '3.2x', description: 'Average client conversion increase post-launch' },
      { label: 'Peak Concurrency', value: '500K+', description: 'Simultaneous shoppers handled during Black Friday' },
      { label: 'Page Load Speed', value: '0.8s', description: 'Global CDN edge rendering speed' },
      { label: 'Cart Abandonment', value: '-30%', description: 'Reduction with 1-click checkout options' },
    ],
    overview: {
      heading: 'Scalable Commerce Systems Built for High-Volume Global Brands',
      description: 'Octavia Tech Solutions crafts high-performance e-commerce engines that unify digital storefronts with physical retail inventory.',
      paragraphs: [
        'Modern retail requires lightning-fast page loads, personalized product recommendations, and unified inventory across online marketplaces, mobile apps, and brick-and-mortar stores.',
        'Our headless commerce solutions decouple the frontend user experience from backend order management, allowing rapid customization, microservices scalability, and seamless integration with global payment providers.',
      ],
    },
    features: [
      {
        title: 'Headless Commerce Architecture',
        description: 'Composable commerce with Next.js/React frontends powered by Shopify Plus, Commercetools, or custom backends.',
        iconName: 'ShoppingBag',
        highlights: [
          'Sub-second page loading speeds worldwide',
          'Flexible CMS content modeling for global storefronts',
          'Seamless localization & multi-currency checkout',
        ],
      },
      {
        title: 'AI Personalization & Recommendation Engine',
        description: 'Boost average order value (AOV) with machine learning models tailoring search results and cross-sell offers.',
        iconName: 'Sparkles',
        highlights: [
          'Real-time user behavior vector search',
          'Dynamic pricing & promotion optimization',
          'Visual search & AI size recommendation tools',
        ],
      },
    ],
    useCases: [
      {
        title: 'Global Retail Brand Digital Storefront',
        clientType: 'Enterprise Fashion Retailer',
        challenge: 'Monolithic legacy platform crashed during major promotional product drops.',
        solution: 'Migrated to headless microservices architecture with edge CDN caching.',
        result: 'Handled 500,000+ concurrent users with zero downtime and tripled mobile sales conversion.',
      },
    ],
    faqs: [
      {
        question: 'Why choose headless commerce over monolithic e-commerce platforms?',
        answer: 'Headless commerce separates the frontend display from backend logic, enabling 3x faster page loads, complete design freedom, multi-channel flexibility, and unconstrained scalability during peak traffic events.',
      },
    ],
    relatedIndustries: ['fintech', 'logistics', 'manufacturing'],
  },

  'manufacturing': {
    slug: 'manufacturing',
    title: 'Smart Factory IoT & Predictive Maintenance Engineering',
    shortTitle: 'Manufacturing & IoT',
    tagline: '5,000+ sensor IoT networks, machine learning failure prediction, digital twins, and supply chain visibility.',
    metaDescription: 'Enterprise IoT and smart manufacturing software engineering. Industrial IoT sensor integration, predictive maintenance ML, MES systems, and supply chain visibility.',
    category: 'Industrial & Manufacturing',
    metrics: [
      { label: 'Downtime Avoided', value: '1,200 hrs', description: 'Unplanned equipment stoppage prevented' },
      { label: 'Prediction Accuracy', value: '94%', description: 'Machine failure predicted 48 hours prior' },
      { label: 'Sensor Capacity', value: '50,000+', description: 'Concurrent IoT data streams ingested' },
      { label: 'OEE Improvement', value: '+18%', description: 'Overall Equipment Effectiveness gain' },
    ],
    overview: {
      heading: 'Industry 4.0 Digital Transformation & Industrial IoT Solutions',
      description: 'Octavia Tech Solutions empowers global manufacturers with real-time shop-floor intelligence, automated quality control, and predictive maintenance.',
      paragraphs: [
        'Unplanned downtime costs manufacturers billions annually. By combining industrial IoT edge gateways with cloud machine learning models, we transform raw sensor data (vibration, temperature, acoustics) into actionable maintenance alerts.',
        'Our smart factory platforms integrate with ERP, MES, and PLM systems to deliver complete operational visibility from raw material intake to final quality assurance.',
      ],
    },
    features: [
      {
        title: 'Predictive Maintenance Engine',
        description: 'Machine learning anomaly detection predicting mechanical wear before catastrophic hardware failure occurs.',
        iconName: 'Factory',
        highlights: [
          '48-hour advance failure warning alerts',
          'Vibration, thermal, and acoustic waveform analysis',
          'Automated work order creation in SAP PM / Maximo',
        ],
      },
      {
        title: 'Industrial IoT Edge Connectivity',
        description: 'Ingest data from Modbus, OPC-UA, MQTT, and Siemens S7 devices into cloud analytics hubs.',
        iconName: 'Radio',
        highlights: [
          'Edge computing for sub-10ms local decision making',
          'End-to-end device hardware encryption',
          'Real-time OEE (Overall Equipment Effectiveness) dashboards',
        ],
      },
    ],
    useCases: [
      {
        title: 'Smart Factory IoT Rollout',
        clientType: 'Tier-1 Automotive Supplier',
        challenge: 'Unscheduled robot arm breakdowns caused $45,000 per hour in assembly line downtime.',
        solution: 'Deployed 5,000+ IoT telemetry sensors with real-time predictive ML models.',
        result: 'Prevented 1,200 hours of downtime in year one and saved $3.8M in emergency repair costs.',
      },
    ],
    faqs: [
      {
        question: 'What industrial protocols do your IoT gateways support?',
        answer: 'Our software supports OPC-UA, Modbus TCP/RTU, MQTT, PROFINET, BACnet, and Siemens S7 communication protocols.',
      },
    ],
    relatedIndustries: ['logistics', 'automotive', 'telecom'],
  },

  'logistics': {
    slug: 'logistics',
    title: 'Supply Chain, Logistics & Fleet Telematics Software',
    shortTitle: 'Logistics & Supply Chain',
    tagline: 'Real-time GPS fleet tracking, AI route optimization, warehouse management (WMS), and cold chain monitoring.',
    metaDescription: 'Enterprise logistics and supply chain software solutions. Real-time fleet tracking, AI route planning, automated WMS, and cold-chain temperature compliance.',
    category: 'Logistics & Supply Chain',
    metrics: [
      { label: 'Fuel Savings', value: '22%', description: 'Achieved through AI dynamic route planning' },
      { label: 'On-Time Delivery', value: '98.5%', description: 'SLA delivery rate across global fleets' },
      { label: 'Fleet Capacity', value: '10,000+', description: 'Active trucks tracked in real time' },
      { label: 'Warehouse Speed', value: '2.5x', description: 'Faster pick and pack order processing' },
    ],
    overview: {
      heading: 'End-to-End Supply Chain Visibility & Smart Route Optimization',
      description: 'Octavia Tech Solutions builds mission-critical freight, logistics, and warehouse management software for global supply chain leaders.',
      paragraphs: [
        'Volatile fuel prices, tight delivery deadlines, and complex cross-border regulations require real-time freight tracking and dynamic route adjustments.',
        'We develop custom Transportation Management Systems (TMS), Warehouse Management Systems (WMS), driver mobile apps, and temperature-controlled IoT cold chain monitors.',
      ],
    },
    features: [
      {
        title: 'AI Fleet Telematics & Dynamic Routing',
        description: 'Optimize multi-stop delivery routes taking live traffic, vehicle load limits, and driver rest breaks into account.',
        iconName: 'Truck',
        highlights: [
          'Sub-second route re-calculation on delay events',
          'Driver behavior telemetry & safety scoring',
          'Automated electronic proof of delivery (ePOD)',
        ],
      },
      {
        title: 'Warehouse Management System (WMS)',
        description: 'Streamline inventory indexing, barcode scanning, RFID tracking, and automated robotic picking.',
        iconName: 'Boxes',
        highlights: [
          '3D digital twin warehouse layout mapping',
          'Real-time inventory level alerts & reorder triggers',
          'Seamless ERP & carrier API integration',
        ],
      },
    ],
    useCases: [
      {
        title: 'Global Logistics Fleet Overhaul',
        clientType: 'Freight & Express Carrier',
        challenge: 'Manual dispatching led to excessive fuel burn and a 14% late delivery rate.',
        solution: 'Implemented Octavia AI Dynamic Route Planning with real-time driver mobile apps.',
        result: 'Cut fuel costs by 22% and elevated on-time delivery SLA to 98.5%.',
      },
    ],
    faqs: [
      {
        question: 'Does your fleet management software integrate with custom hardware GPS OBD-II devices?',
        answer: 'Yes. We support standard J1939/J1708 OBD-II protocols and MQTT/HTTP telematics streams from all major hardware manufacturers.',
      },
    ],
    relatedIndustries: ['manufacturing', 'retail', 'automotive'],
  },
};

export const INDUSTRY_SLUGS = Object.keys(INDUSTRY_DATA);
