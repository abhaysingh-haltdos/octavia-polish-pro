export interface SolutionMetric {
  label: string;
  value: string;
  description: string;
}

export interface SolutionFeature {
  title: string;
  description: string;
  iconName: string;
  highlights: string[];
}

export interface SolutionUseCase {
  title: string;
  clientType: string;
  challenge: string;
  solution: string;
  result: string;
}

export interface SolutionFAQ {
  question: string;
  answer: string;
}

export interface SolutionPageData {
  slug: string;
  title: string;
  shortTitle: string;
  tagline: string;
  metaDescription: string;
  category: string;
  badge: string;
  metrics: SolutionMetric[];
  overview: {
    heading: string;
    description: string;
    paragraphs: string[];
  };
  features: SolutionFeature[];
  techSpecs?: {
    category: string;
    items: { label: string; value: string }[];
  }[];
  useCases: SolutionUseCase[];
  faqs: SolutionFAQ[];
  relatedSolutions?: string[];
}

export const SOLUTION_DATA: Record<string, SolutionPageData> = {
  'webrtc-development': {
    slug: 'webrtc-development',
    title: 'Enterprise WebRTC Engineering & Real-Time Media Streaming',
    shortTitle: 'WebRTC Development Services',
    tagline: 'Ultra-low latency audio/video streaming, scalable SFU/MCU media servers, custom signaling, and WebRTC SDK integrations for global enterprise applications.',
    metaDescription: 'Custom WebRTC development services. High-concurrency SFU/MCU architectures, STUN/TURN server configuration, custom WebRTC audio/video SDKs, and end-to-end SRTP encryption.',
    category: 'Real-Time Communications',
    badge: 'SUB-150MS LATENCY',
    metrics: [
      { label: 'Sub-150ms Latency', value: '< 150ms', description: 'Ultra-fast global glass-to-glass media delivery' },
      { label: 'Concurrent Streams', value: '100K+', description: 'Active video streams managed across distributed SFU clusters' },
      { label: 'Media Reliability', value: '99.999%', description: 'Carrier-grade uptime with adaptive bitrate switching (Simulcast/SVC)' },
      { label: 'Security & Privacy', value: '100%', description: 'End-to-end DTLS-SRTP encryption compliant with HIPAA & GDPR' },
    ],
    overview: {
      heading: 'High-Performance Real-Time Audio, Video & Interactive Media Pipelines',
      description: 'Octavia Tech Solutions engineers custom WebRTC applications, video conferencing engines, tele-health portals, and live broadcasting platforms designed for massive scale and flawless media quality.',
      paragraphs: [
        'WebRTC (Web Real-Time Communication) has revolutionized browser-to-browser and app-to-app communication without requiring third-party plugins. However, achieving enterprise reliability across varying network conditions, restrictive enterprise firewalls, and tens of thousands of concurrent streams requires specialized media server engineering.',
        'Our WebRTC architects design tailored SFU (Selective Forwarding Unit), MCU (Multipoint Control Unit), and hybrid Mesh topologies. We handle everything from custom signaling server protocols (WebSocket/gRPC) and STUN/TURN ICE candidate gathering to adaptive bitrate optimization (Simulcast/AV1/VP9) and AI-driven background noise cancellation.',
      ],
    },
    features: [
      {
        title: 'Scalable SFU & MCU Media Server Architecture',
        description: 'Deploy high-concurrency Selective Forwarding Units (SFU) like Mediasoup, Janus, LiveKit, and Kurento for multi-party video conferencing with low CPU overhead.',
        iconName: 'Video',
        highlights: [
          'Selective Forwarding (SFU) for 100+ multi-party participant grid layouts',
          'Multipoint Control Unit (MCU) server-side mixing for composite video recording',
          'Dynamic Simulcast and Scalable Video Coding (SVC) adaptation',
          'Automated media server auto-scaling across AWS, GCP, and Hetzner bare-metal',
        ],
      },
      {
        title: 'Custom Signaling & Connection Handling',
        description: 'High-throughput signaling infrastructure for session negotiation (SDP exchange), candidate gathering, and instant call setup.',
        iconName: 'Zap',
        highlights: [
          'WebSocket, Socket.io, and gRPC bidirectional signaling gateways',
          'Session Description Protocol (SDP) offer/answer optimization',
          'Re-negotiation handlers for dynamic track addition and network switching',
          'Distributed Redis pub/sub signaling cluster for multi-region failover',
        ],
      },
      {
        title: 'STUN / TURN (coturn) Global Relay Infrastructure',
        description: 'Bypass restrictive NATs, corporate firewalls, and symmetrical proxy networks with high-capacity globally distributed TURN relays.',
        iconName: 'Globe',
        highlights: [
          'Geo-DNS routed coturn TURN/STUN cluster deployment',
          'TURN over TLS (TURNS) on port 443 for maximum firewall traversal',
          'Interactive Connectivity Establishment (ICE) fallback mechanism',
          'Bandwidth consumption throttling and credential authentication APIs',
        ],
      },
      {
        title: 'Live Recording, HLS Broadcasting & Transcoding',
        description: 'Record interactive video calls and transcode streams in real-time into HLS/DASH for low-cost mass distribution to millions of viewers.',
        iconName: 'Radio',
        highlights: [
          'Server-side cloud recording to AWS S3 with instant MP4 muxing',
          'Ultra-low latency HLS (LL-HLS) / WebRTC-to-RTMP ingest for YouTube/Twitch',
          'FFmpeg GPU hardware acceleration (NVENC) for real-time 4K transcoding',
          'Encrypted archival storage with automated compliance retention policies',
        ],
      },
      {
        title: 'AI Live Transcription & Spatial Audio',
        description: 'Integrate real-time AI speech-to-text models, background noise removal, and immersive 3D spatial audio into WebRTC streams.',
        iconName: 'Sparkles',
        highlights: [
          'Real-time automated closed captions via Whisper & Deepgram APIs',
          'Deep learning background noise suppression (RNNoise / WebAudio DSP)',
          'Spatial audio positioning for virtual metaverse and classroom spaces',
          'In-stream sentiment analysis and speaker diarization',
        ],
      },
      {
        title: 'Cross-Platform Mobile & Web WebRTC SDKs',
        description: 'Build native iOS, Android, Electron, and React Native mobile applications using custom C++ / React WebRTC bindings.',
        iconName: 'Cpu',
        highlights: [
          'Custom React Native, Flutter, Swift, and Kotlin WebRTC wrappers',
          'Hardware-accelerated H.264, VP8, VP9, and AV1 codec integration',
          'Low-power battery consumption optimization for mobile background audio',
          'Screen sharing with audio capture across desktop and mobile OS',
        ],
      },
    ],
    techSpecs: [
      {
        category: 'Media Codecs & Protocols',
        items: [
          { label: 'Video Codecs', value: 'VP8, VP9, H.264, AV1 (Hardware Encoded)' },
          { label: 'Audio Codecs', value: 'Opus (48kHz Stereo), ISAC, G.711' },
          { label: 'Encryption Standard', value: 'DTLS-SRTP (AES-128 & AES-256)' },
          { label: 'Signaling Protocols', value: 'WebSockets, WSS, gRPC, MQTT' },
        ],
      },
      {
        category: 'Media Server Frameworks',
        items: [
          { label: 'Supported Media Servers', value: 'Mediasoup, Janus WebRTC, LiveKit, Kurento, Pion' },
          { label: 'Cloud CPaaS APIs', value: 'Twilio Programmable Video, Agora, Daily.co, AWS Chime' },
          { label: 'Network Traversal', value: 'STUN, TURN, TURNS (TCP/UDP Port 443)' },
          { label: 'Latency Benchmark', value: '80ms - 150ms Glass-to-Glass' },
        ],
      },
      {
        category: 'Scaling & Infrastructure',
        items: [
          { label: 'Clustering Architecture', value: 'Kubernetes Auto-scaling SFU Nodes' },
          { label: 'Max Concurrency', value: '100,000+ Active Streams per Cluster' },
          { label: 'Quality Control', value: 'Simulcast, SVC, BWE (Bandwidth Estimation)' },
          { label: 'Compliance', value: 'HIPAA, GDPR, SOC 2 Type II Compliant' },
        ],
      },
    ],
    useCases: [
      {
        title: 'Global Telehealth Video Consult Platform',
        clientType: 'Enterprise Digital Health Network',
        challenge: 'A major telehealth provider experienced video lag and dropped calls behind hospital firewall proxies during specialist consultations.',
        solution: 'Engineered a custom Mediasoup SFU with TURNS over port 443 and end-to-end DTLS-SRTP encryption.',
        result: 'Reduced connection drop rates by 94%, lowered latency to 110ms, and achieved full HIPAA BAA compliance across 50,000 monthly patient consultations.',
      },
      {
        title: 'Virtual Event & Classroom Broadcasting Engine',
        clientType: 'EdTech & Live Streaming Brand',
        challenge: 'Scaling beyond 500 interactive video participants crashed legacy WebRTC mesh networks.',
        solution: 'Built a distributed Mediasoup SFU cluster with WebRTC-to-LL-HLS fallback for 50,000 passive viewers.',
        result: 'Cut media infrastructure costs by 45% while delivering sub-second interactive video to thousands of concurrent students.',
      },
    ],
    faqs: [
      {
        question: 'What is the difference between Mesh, SFU, and MCU WebRTC architectures?',
        answer: 'In Mesh (Peer-to-Peer), each participant sends media directly to every other participant, which works well for 2-4 users but consumes massive bandwidth as group size grows. An SFU (Selective Forwarding Unit) receives a single stream from each user and routes it to others without re-encoding, offering high scalability for groups up to hundreds. An MCU (Multipoint Control Unit) decodes, mixes, and re-encodes all streams into a single composite stream, saving client CPU but requiring high server processing power. We recommend SFU for most interactive video applications.',
      },
      {
        question: 'Why are STUN and TURN servers mandatory for enterprise WebRTC applications?',
        answer: 'STUN (Session Traversal Utilities for NAT) allows peers to discover their public IP address. However, when users are behind strict corporate firewalls or symmetric NATs, direct P2P connections fail. A TURN (Traversal Using Relays around NAT) server acts as a secure media relay to guarantee 100% call connection success under any network constraint.',
      },
      {
        question: 'Can WebRTC support end-to-end encryption (E2EE)?',
        answer: 'Yes. Standard WebRTC enforces DTLS-SRTP encryption between clients and media servers. For maximum privacy, we implement WebRTC Insertable Streams (Frame Crypto API) allowing end-to-end encryption where media payload is encrypted on the sender device and decrypted only by target recipients, preventing even the SFU server from inspecting media content.',
      },
      {
        question: 'Do you build custom WebRTC applications or use commercial CPaaS like Twilio/Agora?',
        answer: 'We offer both. For clients seeking low operating costs and zero vendor lock-in, we build custom open-source media server clusters (Mediasoup, LiveKit, Janus). For rapid time-to-market, we integrate CPaaS APIs like Twilio, Agora, or Daily.co while customizing signaling and UI wrappers.',
      },
    ],
    relatedSolutions: ['ai-solutions', 'cloud-solutions', 'saas-solutions', 'enterprise-solutions'],
  },

  'ai-solutions': {
    slug: 'ai-solutions',
    title: 'Enterprise Generative AI, Agentic Workflows & LLM Engineering',
    shortTitle: 'AI Solutions',
    tagline: 'Custom Large Language Model (LLM) fine-tuning, Retrieval-Augmented Generation (RAG), autonomous AI agents, and computer vision integration for enterprise automation.',
    metaDescription: 'Enterprise AI solutions engineering. Custom LLM fine-tuning, RAG enterprise knowledge search, agentic workflow automation, and secure AI governance.',
    category: 'Artificial Intelligence',
    badge: 'AGENTIC WORKFLOWS',
    metrics: [
      { label: 'Process Automation', value: '70%', description: 'Reduction in manual enterprise back-office workflows' },
      { label: 'Response Latency', value: '< 400ms', description: 'Real-time streaming LLM inference speed' },
      { label: 'Hallucination Rate', value: '< 0.1%', description: 'Achieved through strict vector RAG guardrails' },
      { label: 'Data Privacy', value: '100%', description: 'Private VPC LLM hosting with zero third-party training data exposure' },
    ],
    overview: {
      heading: 'Transforming Business Operations with Secure Enterprise AI Systems',
      description: 'Octavia Tech Solutions builds production-ready Generative AI platforms, autonomous agentic multi-agent systems, and domain-specific LLM pipelines.',
      paragraphs: [
        'Artificial Intelligence is shifting from simple chatbot experiments to mission-critical operational tools. Enterprises require specialized AI models trained on proprietary domain knowledge, governed by strict data privacy policies, and integrated directly with core databases and ERPs.',
        'We engineer end-to-end AI solutions—from high-precision Vector Search (RAG) and private model fine-tuning (Llama, Mistral, Gemini) to autonomous agent swarms that execute multi-step workflows with human-in-the-loop validation.',
      ],
    },
    features: [
      {
        title: 'Retrieval-Augmented Generation (RAG) Architecture',
        description: 'Connect internal knowledge bases, PDFs, and SQL databases to LLMs for accurate, hallucination-free enterprise intelligence.',
        iconName: 'Sparkles',
        highlights: [
          'Milvus, Qdrant, and Pinecone vector database integration',
          'Hybrid semantic + keyword search with re-ranking algorithms',
          'Document parsing for complex PDFs, tables, and CAD blueprints',
          'Role-based access control (RBAC) enforced on vector search queries',
        ],
      },
      {
        title: 'Autonomous Multi-Agent Swarms',
        description: 'Deploy multi-agent systems that autonomously collaborate to analyze data, write code, process invoices, and execute API calls.',
        iconName: 'Cpu',
        highlights: [
          'LangChain, AutoGen, and CrewAI framework orchestration',
          'Tool-calling capabilities with real-time API execution',
          'Human-in-the-loop approval workflows for critical decisions',
          'Audit trail logging of AI reasoning steps and tool outputs',
        ],
      },
      {
        title: 'Private VPC Model Fine-Tuning & Hosting',
        description: 'Fine-tune open-weights models (Llama 3, Mistral, Qwen) on proprietary data hosted securely within your private cloud.',
        iconName: 'ShieldCheck',
        highlights: [
          'LoRA / QLoRA parameter-efficient fine-tuning pipelines',
          'vLLM and TGI inference server deployment with GPU auto-scaling',
          'SOC 2 and HIPAA compliant AI deployment models',
          'Zero data sharing with external LLM vendor endpoints',
        ],
      },
    ],
    useCases: [
      {
        title: 'Automated Legal Document Analysis Platform',
        clientType: 'Global Enterprise Law Firm',
        challenge: 'Reviewing thousands of multi-page commercial contracts required 40+ hours per case.',
        solution: 'Deployed a private RAG pipeline with clause extraction and automated compliance anomaly scoring.',
        result: 'Reduced document review time by 75% while achieving 99.4% accuracy in risk identification.',
      },
    ],
    faqs: [
      {
        question: 'How do you prevent data leaks when using Large Language Models?',
        answer: 'We host models within your private VPC (AWS Bedrock, Azure OpenAI, or self-hosted vLLM on private GPU instances), ensuring no proprietary data ever leaves your security boundary or is used for model re-training.',
      },
    ],
    relatedSolutions: ['webrtc-development', 'saas-solutions', 'cloud-solutions'],
  },

  'saas-solutions': {
    slug: 'saas-solutions',
    title: 'Multi-Tenant Cloud SaaS Product Engineering',
    shortTitle: 'SaaS Solutions',
    tagline: 'Build, scale, and monetize multi-tenant cloud software with automated billing, tenant isolation, dynamicRBAC, and high-concurrency microservices.',
    metaDescription: 'Enterprise SaaS product engineering services. Multi-tenant database isolation, Stripe billing integration, tenant onboarding automation, and API gateway design.',
    category: 'Product Engineering',
    badge: 'MULTI-TENANT ARCHITECTURE',
    metrics: [
      { label: 'Time-to-Market', value: '12 Weeks', description: 'From architectural design to production SaaS launch' },
      { label: 'Tenant Onboarding', value: '< 30s', description: 'Automated workspace provisioning' },
      { label: 'System Uptime', value: '99.99%', description: 'High-availability multi-tenant cloud cluster' },
      { label: 'Cost Efficiency', value: '40%', description: 'Reduction in infrastructure cost with shared tenant pools' },
    ],
    overview: {
      heading: 'Scalable Software-as-a-Service Architecture Built for Enterprise Growth',
      description: 'Octavia Tech Solutions designs and builds high-scale multi-tenant SaaS platforms that convert product vision into recurring revenue engines.',
      paragraphs: [
        'Building a successful B2B SaaS platform requires more than a clean frontend. It demands robust multi-tenant data isolation, automated subscriber lifecycle management, flexible tier-based permissions, and seamlessly integrated metering & billing engines.',
        'We engineer secure SaaS products using modern microservices, Next.js/React, GraphQL/REST APIs, and scalable PostgreSQL/Firestore database architectures.',
      ],
    },
    features: [
      {
        title: 'Multi-Tenant Data Isolation',
        description: 'Choose between siloed, pooled, or hybrid database strategies depending on compliance and performance requirements.',
        iconName: 'Building2',
        highlights: [
          'Row-level security (RLS) PostgreSQL tenant isolation',
          'Dynamic schema-per-tenant or database-per-tenant support',
          'Automated database migration triggers across tenant pools',
        ],
      },
      {
        title: 'Subscription & Usage-Based Billing',
        description: 'Implement complex recurring, per-seat, usage-based, or tiered pricing models with automated invoicing.',
        iconName: 'Zap',
        highlights: [
          'Stripe, Chargebee, and Paddle billing SDK integrations',
          'Metered usage tracking with real-time quota alerts',
          'Automated dunning management & failed payment recovery',
        ],
      },
    ],
    useCases: [
      {
        title: 'B2B Enterprise Workflow SaaS Launch',
        clientType: 'Global Supply Chain Startup',
        challenge: 'Inability to isolate large enterprise customer data caused security audit delays during sales cycles.',
        solution: 'Engineered a hybrid multi-tenant architecture with dedicated VPC databases for enterprise tiers.',
        result: 'Passed enterprise SOC 2 audits in record time and closed $2.4M in annual recurring revenue in year one.',
      },
    ],
    faqs: [
      {
        question: 'Which multi-tenant architecture is best for B2B SaaS applications?',
        answer: 'We evaluate tenant data size, compliance rules, and budget. Pooled multi-tenancy with Row-Level Security (RLS) is most cost-effective for standard tiers, while dedicated database schemas or isolated VPC databases are reserved for high-compliance enterprise tiers.',
      },
    ],
    relatedSolutions: ['ai-solutions', 'cloud-solutions', 'startup-solutions'],
  },

  'cloud-solutions': {
    slug: 'cloud-solutions',
    title: 'Multi-Cloud Infrastructure, Kubernetes & DevOps Engineering',
    shortTitle: 'Cloud Solutions',
    tagline: 'Modernize IT infrastructure with Kubernetes container orchestration, Infrastructure as Code (Terraform), zero-downtime CI/CD pipelines, and FinOps cloud cost optimization.',
    metaDescription: 'Multi-cloud infrastructure and DevOps engineering services. AWS, GCP, Azure cloud migration, Kubernetes container orchestration, and Terraform automation.',
    category: 'Cloud & Infrastructure',
    badge: 'KUBERNETES & FINOPS',
    metrics: [
      { label: 'Cloud Cost Saved', value: '35%', description: 'Average AWS/GCP spend reduction post-FinOps optimization' },
      { label: 'Deployment Frequency', value: '20x/Day', description: 'Zero-downtime automated CI/CD releases' },
      { label: 'Disaster Recovery', value: '< 15min', description: 'RTO / RPO failover across multi-region clusters' },
      { label: 'Security Score', value: '100%', description: 'Zero Trust network policy enforcement' },
    ],
    overview: {
      heading: 'Resilient Multi-Cloud Architecture Engineered for Enterprise Agility',
      description: 'Octavia Tech Solutions designs and manages cloud-native infrastructure that eliminates server downtime, accelerates software delivery, and lowers cloud operational costs.',
      paragraphs: [
        'Modern businesses cannot afford infrastructure outages, slow deployment pipelines, or bloated cloud bills. We help enterprise teams transition from monolithic legacy servers to containerized, auto-scaling multi-cloud environments.',
        'Using Infrastructure as Code (IaC), GitOps, and Kubernetes, we build automated, self-healing cloud ecosystems that scale seamlessly with demand while enforcing strict zero-trust security controls.',
      ],
    },
    features: [
      {
        title: 'Kubernetes & Container Orchestration',
        description: 'Deploy auto-scaling EKS, GKE, or AKS clusters with automated ingress routing, service mesh, and canary deployments.',
        iconName: 'Globe',
        highlights: [
          'Istio & Linkerd service mesh mTLS traffic encryption',
          'Horizontal Pod Autoscaling (HPA) driven by real-time metrics',
          'ArgoCD GitOps declarative application delivery',
        ],
      },
      {
        title: 'Infrastructure as Code (IaC) & Terraform',
        description: 'Codify cloud infrastructure for 100% reproducible environments across AWS, Google Cloud, and Microsoft Azure.',
        iconName: 'Cpu',
        highlights: [
          'Modular Terraform / OpenTofu deployment templates',
          'Automated drift detection and security compliance scans',
          'Multi-region active-active failover automation',
        ],
      },
    ],
    useCases: [
      {
        title: 'FinTech Cloud Infrastructure Overhaul',
        clientType: 'High-Volume Payment Gateway',
        challenge: 'Manual cloud deployments caused frequent system downtime and skyrocketing monthly AWS bills.',
        solution: 'Migrated infrastructure to automated EKS Kubernetes clusters with Terraform IaC and spot instance optimization.',
        result: 'Achieved 99.999% uptime during peak holiday sales and reduced monthly AWS cloud expenditure by 38%.',
      },
    ],
    faqs: [
      {
        question: 'How do you ensure zero-downtime software deployments?',
        answer: 'We implement blue/green and canary deployment strategies using Kubernetes and Istio. Traffic is shifted gradually to new code versions while health checks monitor system metrics, triggering automated instant rollback if any anomalies occur.',
      },
    ],
    relatedSolutions: ['webrtc-development', 'saas-solutions', 'automation-solutions'],
  },

  'automation-solutions': {
    slug: 'automation-solutions',
    title: 'Intelligent Enterprise Process Automation & Integration',
    shortTitle: 'Automation Solutions',
    tagline: 'Streamline operational workflows with AI-driven Robotic Process Automation (RPA), enterprise API integration, and automated document processing.',
    metaDescription: 'Intelligent process automation services. RPA, enterprise API integrations, automated invoice parsing, and workflow orchestration.',
    category: 'Enterprise Automation',
    badge: 'AI-POWERED RPA',
    metrics: [
      { label: 'Efficiency Gain', value: '85%', description: 'Reduction in manual data entry processing hours' },
      { label: 'Error Rate', value: '0.00%', description: 'Elimination of manual human transcript errors' },
      { label: 'ROI Timeline', value: '3 Months', description: 'Average timeframe to achieve full automation ROI' },
      { label: 'API Integrations', value: '200+', description: 'Pre-built ERP, CRM, and banking connectors' },
    ],
    overview: {
      heading: 'Eliminate Operational Friction with Smart End-to-End Automation',
      description: 'Octavia Tech Solutions transforms manual enterprise processes into intelligent, automated digital workflows.',
      paragraphs: [
        'Manual data entry, fragmented system handoffs, and disconnected legacy software slow down enterprise growth and inflate operational expenses. We combine AI OCR models, enterprise service buses, and robotic process automation to connect disparate business systems.',
        'From invoice processing and employee onboarding to inventory synchronization and automated compliance reporting, our automation engines work 24/7 with zero human error.',
      ],
    },
    features: [
      {
        title: 'Document Processing & Intelligent OCR',
        description: 'Automatically extract structured data from unstructured invoices, receipts, contracts, and shipping bills.',
        iconName: 'Sparkles',
        highlights: [
          '99.5%+ extraction accuracy across multi-page document formats',
          'Direct integration into SAP, NetSuite, and QuickBooks ERPs',
          'Automated exception queue handling for manual approval',
        ],
      },
    ],
    useCases: [
      {
        title: 'Global Supply Chain Invoice Automation',
        clientType: 'Logistics Enterprise',
        challenge: 'Processing 15,000 monthly vendor invoices manually required a team of 25 full-time clerks.',
        solution: 'Built an AI intelligent OCR ingestion pipeline with automated ERP matching and payment scheduling.',
        result: 'Reduced processing time per invoice from 15 minutes to 4 seconds and saved $850,000 annually.',
      },
    ],
    faqs: [
      {
        question: 'Can process automation connect with legacy desktop software without APIs?',
        answer: 'Yes. We utilize Robotic Process Automation (RPA) screen-scraping bots capable of navigating legacy desktop software windows, clicking controls, and submitting forms exactly like a human operator.',
      },
    ],
    relatedSolutions: ['ai-solutions', 'saas-solutions', 'enterprise-solutions'],
  },

  'enterprise-solutions': {
    slug: 'enterprise-solutions',
    title: 'Legacy Core Modernization & High-Concurrency Systems',
    shortTitle: 'Enterprise Solutions',
    tagline: 'Modernize legacy enterprise mainframes into agile microservices, enforce Zero Trust cybersecurity, and handle millions of concurrent user transactions.',
    metaDescription: 'Enterprise software modernization and core system transformation. Legacy mainframe decoupling, Zero Trust architecture, and high-concurrency microservices.',
    category: 'Enterprise Engineering',
    badge: 'ZERO TRUST SECURITY',
    metrics: [
      { label: 'System Capacity', value: '1M+ TPS', description: 'Transactions per second handled during peak load' },
      { label: 'Security Defense', value: '100%', description: 'Zero Trust identity access & data encryption' },
      { label: 'Code Modernization', value: '10M+ Lines', description: 'Refactored from legacy COBOL/Java monoliths' },
      { label: 'Maintenance Cost', value: '-50%', description: 'Saved on legacy system licenses and maintenance' },
    ],
    overview: {
      heading: 'De-risk Legacy Infrastructure with Proven Enterprise Modernization',
      description: 'Octavia Tech Solutions partners with Fortune 500 enterprises and government bodies to refactor legacy monoliths into cloud-native microservices.',
      paragraphs: [
        'Aging legacy systems pose immense security risks, consume massive maintenance budgets, and prevent rapid innovation. Modernizing these core systems requires surgical precision to prevent business interruption.',
        'We specialize in strangler-fig migration patterns, event-driven microservices architecture, automated database refactoring, and Zero Trust security implementation.',
      ],
    },
    features: [
      {
        title: 'Strangler-Fig System Decoupling',
        description: 'Incrementally replace legacy monolith components with independent microservices without breaking running systems.',
        iconName: 'Building2',
        highlights: [
          'Zero downtime migration strategy with real-time shadow traffic validation',
          'Event-driven Kafka messaging backbone for asynchronous processing',
          'Backward-compatible API wrappers for legacy mainframes',
        ],
      },
    ],
    useCases: [
      {
        title: 'Tier-1 Telecom Core System Modernization',
        clientType: 'Global Telecom Operator',
        challenge: 'A 20-year-old monolithic billing engine crashed whenever subscriber load exceeded 100,000 concurrent calls.',
        solution: 'Engineered an event-driven Go/Rust microservices billing cluster with Redis in-memory rating.',
        result: 'Scales to 1,000,000+ concurrent subscriber sessions with zero system lockups.',
      },
    ],
    faqs: [
      {
        question: 'How do you prevent data loss during legacy enterprise migrations?',
        answer: 'We utilize dual-write shadow pipelines and CDC (Change Data Capture) tools like Debezium. Changes in the legacy database are replicated instantly to the new cloud database, allowing full audit validation before final cutover.',
      },
    ],
    relatedSolutions: ['webrtc-development', 'cloud-solutions', 'automation-solutions'],
  },

  'startup-solutions': {
    slug: 'startup-solutions',
    title: 'Rapid MVP Product Engineering for High-Growth Startups',
    shortTitle: 'Startup Solutions',
    tagline: 'Go from concept to market-ready MVP in 6 to 8 weeks with scalable cloud architecture, product design, and investor-ready technical foundations.',
    metaDescription: 'Startup MVP product development services. Rapid prototyping, investor-ready cloud architecture, and agile product development sprints.',
    category: 'Product Engineering',
    badge: 'RAPID MVP (6-8 WEEKS)',
    metrics: [
      { label: 'Time to MVP', value: '6 Weeks', description: 'Average timeline to launch fully functional product' },
      { label: 'Capital Raised', value: '$150M+', description: 'Raised by client startups post-MVP launch' },
      { label: 'User Retention', value: '4.8 Stars', description: 'Average app store rating post-launch' },
      { label: 'Scale Capability', value: '100x', description: 'Infrastructure built to handle rapid user spikes' },
    ],
    overview: {
      heading: 'Launch Faster with Battle-Tested Startup Development Frameworks',
      description: 'Octavia Tech Solutions helps tech founders build, launch, and scale market-validated software products in record time.',
      paragraphs: [
        'Speed to market is everything for high-growth startups. However, rushing an MVP with messy code creates technical debt that breaks down when user acquisition accelerates.',
        'We pair experienced product architects, UX designers, and senior full-stack developers to build clean, modular MVPs that delight early adopters and satisfy rigorous venture capital due diligence.',
      ],
    },
    features: [
      {
        title: '6-Week Agile MVP Development Sprints',
        description: 'Rapid product design, prototyping, frontend building, backend API integration, and cloud launch.',
        iconName: 'Zap',
        highlights: [
          'Figma interactive click-through UX/UI design wireframes',
          'Scalable React/Next.js frontend with mobile-first responsiveness',
          'Serverless Node.js / PostgreSQL backend architecture',
        ],
      },
    ],
    useCases: [
      {
        title: 'FinTech Startup Seed-to-Series A Launch',
        clientType: 'Y-Combinator Backed Startup',
        challenge: 'Needed a fully compliant mobile payment application built in 6 weeks for seed investor demos.',
        solution: 'Built a cross-platform React Native mobile app with secure Plaid and Stripe API integrations.',
        result: 'Launched on schedule, acquired 25,000 active users in month one, and secured $4.5M in Series A funding.',
      },
    ],
    faqs: [
      {
        question: 'Who owns the intellectual property (IP) and code created during development?',
        answer: 'You own 100% of the intellectual property, source code, design assets, and cloud deployment scripts. We execute strict IP assignment and non-disclosure agreements (NDAs) prior to starting.',
      },
    ],
    relatedSolutions: ['saas-solutions', 'ai-solutions', 'cloud-solutions'],
  },

  'business-solutions': {
    slug: 'business-solutions',
    title: 'Custom ERP, CRM & Business Intelligence Platforms',
    shortTitle: 'Business Solutions',
    tagline: 'Tailor-made internal business software, unified executive dashboards, custom ERP/CRM platforms, and real-time operational analytics.',
    metaDescription: 'Custom business software development. Enterprise ERP, CRM customization, business intelligence dashboards, and workflow tools.',
    category: 'Enterprise Engineering',
    badge: 'CUSTOM ERP & BI',
    metrics: [
      { label: 'Operational Speed', value: '3x', description: 'Faster internal workflow execution' },
      { label: 'Data Visibility', value: '100%', description: 'Real-time executive decision dashboards' },
      { label: 'ERP ROI', value: '250%', description: 'Return on investment within first year of rollout' },
      { label: 'System Adoption', value: '96%', description: 'Employee satisfaction across custom interfaces' },
    ],
    overview: {
      heading: 'Software Tailored to Your Unique Business Workflows',
      description: 'Octavia Tech Solutions builds bespoke ERP, CRM, and executive analytics tools designed around your exact business processes.',
      paragraphs: [
        'Off-the-shelf software often forces companies to change their operating model to fit rigid software constraints. Custom business applications empower teams to work faster, make informed data-driven decisions, and maintain proprietary competitive advantages.',
        'We build intuitive web portals, automated inventory managers, client CRMs, and real-time executive dashboards that integrate seamlessly with your existing technology stack.',
      ],
    },
    features: [
      {
        title: 'Custom ERP & CRM Platform Engineering',
        description: 'Bespoke business operating systems designed around your proprietary sales, fulfillment, and accounting workflows.',
        iconName: 'Building2',
        highlights: [
          'Tailored customer relationship pipelines and lead scoring',
          'Automated inventory control and order fulfillment tools',
          'Role-based staff permissions with granular data access controls',
        ],
      },
    ],
    useCases: [
      {
        title: 'Global Distributor Custom ERP Rollout',
        clientType: 'Commercial Wholesale Distributor',
        challenge: 'Legacy off-the-shelf ERP required 12 manual button clicks to process a single purchase order.',
        solution: 'Engineered a streamlined custom web ERP with automated 1-click supplier order dispatch.',
        result: 'Saved 2,000 staff hours per month and boosted warehouse order fulfillment capacity by 300%.',
      },
    ],
    faqs: [
      {
        question: 'Why build a custom ERP instead of buying Salesforce or SAP?',
        answer: 'Off-the-shelf ERPs carry expensive per-user monthly license fees and costly custom plugin maintenance. A custom ERP is owned outright by your company, matches your exact workflows, and eliminates recurring seat costs as your team scales.',
      },
    ],
    relatedSolutions: ['automation-solutions', 'enterprise-solutions', 'saas-solutions'],
  },
};

export const SOLUTION_SLUGS = Object.keys(SOLUTION_DATA);
