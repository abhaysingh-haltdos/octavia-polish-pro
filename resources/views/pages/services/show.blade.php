@extends('layouts.app')

@section('content')
@php
    $isFlutter = str_contains($path ?? '', 'flutter');

    // 1. Hero Content
    $heroBadge = $isFlutter ? "Flutter App Development Company" : ($service['hero']['badge'] ?? ($service['serviceCategory'] ?? 'Enterprise Service'));
    $heroTitle = $isFlutter ? "Flutter App Development Services Built for Speed," : ($service['hero']['title'] ?? 'Enterprise Engineering Services Built for');
    $heroTitleHighlight = $isFlutter ? "Scale, and Growth" : ($service['hero']['titleHighlight'] ?? 'Scale & Growth');
    $heroDescription = $isFlutter ? "Build reliable, high-performing mobile applications with Flutter. We design and develop custom iOS and Android apps from a single, scalable codebase—helping startups and established businesses launch faster, improve user experiences, and reduce the complexity of maintaining multiple platforms." : ($service['hero']['description'] ?? 'Deploy resilient, high-converting digital platforms engineered with modern frameworks, cloud elasticity, and enterprise security.');
    $primaryCtaText = $isFlutter ? "Start Your Flutter App Project" : ($service['hero']['primaryCtaText'] ?? 'Get Free Consultation');
    $secondaryCtaText = $isFlutter ? "Explore Our Services" : ($service['hero']['secondaryCtaText'] ?? 'Explore Capabilities');
    
    $heroTrustPoints = $isFlutter ? [
        "Custom Flutter Application Development",
        "iOS & Android App Development",
        "UI/UX Design & Development",
        "API & Backend Integration",
        "App Modernization & Migration",
        "Ongoing Support & Maintenance"
    ] : (!empty($service['hero']['tags']) ? $service['hero']['tags'] : ["Tailored Architecture", "Enterprise Security & SLA", "Sub-Second Loading", "Cloud-Native Infrastructure", "Automated CI/CD", "Dedicated Support"]);

    // 2. Performance & Overview Content
    $overviewHeading = $isFlutter ? "Optimize Performance With Flutter App Development" : ($service['overview']['heading'] ?? 'Engineering Modern Digital Infrastructure');
    $overviewLead = $isFlutter ? "Your mobile app needs to do more than look good. It needs to load quickly, respond smoothly, remain stable under growing traffic, and give users a consistent experience across devices." : ($service['overview']['leadParagraph'] ?? 'Modern enterprise platforms require continuous uptime, rapid response cycles, and scalable cloud architectures that accommodate explosive user growth.');
    $overviewSecondary = $isFlutter ? "Our Flutter development team builds applications with performance, scalability, and maintainability in mind from the beginning. From architecture and interface design to API integration and deployment, we focus on creating apps that are ready for real users and real business demands." : ($service['overview']['secondaryParagraph'] ?? 'Our engineering practice unites seasoned architects and developers to build performant, maintainable, and highly secure digital solutions.');
    $overviewPoints = $isFlutter ? [
        ['title' => "Fast, Responsive Experiences", 'desc' => "We build smooth interfaces and efficient application flows that help reduce unnecessary loading and improve everyday usability."],
        ['title' => "One Codebase, Multiple Platforms", 'desc' => "Flutter allows businesses to develop for iOS and Android efficiently while maintaining a consistent product experience."],
        ['title' => "Built to Grow & Scale", 'desc' => "Our architecture is designed around your future needs, making it easier to add features, users, integrations, and new business requirements."]
    ] : [
        ['title' => "Sub-Second Response Latency", 'desc' => "Direct hardware and server-side optimizations deliver ultra-low latency experiences across global endpoints."],
        ['title' => "Cross-System Interoperability", 'desc' => "Engineered to integrate seamlessly with existing enterprise CRMs, ERPs, and cloud storage providers."],
        ['title' => "Elastic Cloud Scalability", 'desc' => "Architected for effortless horizontal scaling during high-concurrency traffic spikes."]
    ];

    // 3. Services / Core Capabilities Grid (6 Cards)
    $capabilitiesHeading = $isFlutter ? "Check Out Our Offerings in Flutter App Development Services" : ($service['features']['heading'] ?? 'Comprehensive Engineering & Development Capabilities');
    $capabilitiesSubheading = $isFlutter ? "From your first product idea to long-term application maintenance, we provide end-to-end Flutter development services tailored to your business goals." : ($service['features']['subheading'] ?? 'End-to-end technical capabilities spanning strategy, architecture, deployment, and ongoing system optimization.');
    $capabilities = $isFlutter ? [
        [
            'title' => "Custom Flutter App Development",
            'desc' => "Turn your business idea into a production-ready mobile application. We develop custom Flutter apps around your users, workflows, business model, and long-term product strategy.",
            'icon' => 'code'
        ],
        [
            'title' => "iOS & Android App Development",
            'desc' => "Launch on both major mobile platforms without managing two separate development teams. We deliver consistent, native-like mobile apps optimized for performance on iOS and Android devices.",
            'icon' => 'device'
        ],
        [
            'title' => "Flutter UI/UX Design & Development",
            'desc' => "Create mobile experiences that are simple to understand and enjoyable to use. Our designers and developers work together to transform interfaces into responsive, intuitive Flutter applications.",
            'icon' => 'paint'
        ],
        [
            'title' => "Flutter API & Backend Integration",
            'desc' => "Connect your mobile application with the tools and systems your business relies on. We integrate REST APIs, payment gateways, authentication systems, cloud platforms, and third-party services.",
            'icon' => 'cloud'
        ],
        [
            'title' => "App Modernization & Migration",
            'desc' => "Upgrade your existing application architecture or migrate legacy mobile apps to Flutter for improved maintainability, faster update cycles, and a better user experience.",
            'icon' => 'refresh'
        ],
        [
            'title' => "Flutter Support & Maintenance",
            'desc' => "Keep your application secure, stable, and compatible with the latest OS versions. Our support covers performance improvements, bug fixes, routine updates, and feature enhancements.",
            'icon' => 'shield'
        ],
    ] : (!empty($service['features']['features']) ? array_map(function($f, $i) {
        $icons = ['code', 'device', 'paint', 'cloud', 'refresh', 'shield'];
        return [
            'title' => $f['title'] ?? 'Enterprise Solution',
            'desc' => $f['description'] ?? $f['desc'] ?? 'Bespoke engineering designed around your exact business requirements.',
            'icon' => $icons[$i % count($icons)]
        ];
    }, $service['features']['features'], array_keys($service['features']['features'])) : [
        ['title' => "Custom Enterprise Architecture", 'desc' => "Bespoke engineering designed around your exact operational and data workflows.", 'icon' => 'code'],
        ['title' => "Cross-Platform Engineering", 'desc' => "Unified web and mobile solutions engineered for seamless omni-channel experiences.", 'icon' => 'device'],
        ['title' => "UI/UX & Design Systems", 'desc' => "High-fidelity, accessible interface components built with Tailwind and modern design tokens.", 'icon' => 'paint'],
        ['title' => "API & Microservice Integration", 'desc' => "Resilient middleware and API gateways connecting core databases and external platforms.", 'icon' => 'cloud'],
        ['title' => "Legacy Modernization", 'desc' => "Gradual strangler-fig migration of monolithic backends to agile cloud microservices.", 'icon' => 'refresh'],
        ['title' => "24/7 Managed SLA Support", 'desc' => "Uptime guarantees, proactive security monitoring, and rapid patch deployments.", 'icon' => 'shield'],
    ]);

    // 4. Key Benefits / Value Proposition (4 Cards)
    $benefitsHeading = $isFlutter ? "Why Businesses Choose Flutter for Mobile App Development" : "Why Industry Leaders Choose Our Engineering";
    $benefitsSubheading = $isFlutter ? "Choosing the right mobile development framework impacts your budget, development speed, and long-term maintenance costs." : "Strategic technology investments engineered to drive measurable ROI, user engagement, and operational velocity.";
    $benefits = $isFlutter ? [
        [
            'metric' => "40%+",
            'badge' => "Efficiency",
            'title' => "Single Codebase Efficiency",
            'desc' => "Write once and deploy across iOS and Android, reducing duplicate effort and keeping feature releases aligned across both ecosystems."
        ],
        [
            'metric' => "60-120 FPS",
            'badge' => "Performance",
            'title' => "Native-Like Performance",
            'desc' => "Flutter compiles directly to ARM/x86 machine code via Impeller & Skia, delivering fluid animations and zero JavaScript bridge latency."
        ],
        [
            'metric' => "2x Faster",
            'badge' => "Speed to Market",
            'title' => "Faster Time to Market",
            'desc' => "Hot reload, comprehensive widget libraries, and streamlined testing workflows help you launch your MVP and iterate rapidly."
        ],
        [
            'metric' => "50% Less",
            'badge' => "Cost Savings",
            'title' => "Reduced Maintenance Overhead",
            'desc' => "Maintain one clean repository instead of two separate platform codebases, simplifying QA cycles, bug fixes, and continuous upgrades."
        ]
    ] : [
        ['metric' => "99.99%", 'badge' => "Reliability", 'title' => "Enterprise-Grade Reliability", 'desc' => "High-availability architectures engineered for 24/7 mission-critical operations."],
        ['metric' => "<0.5s", 'badge' => "Speed", 'title' => "Blazing Fast Execution", 'desc' => "Optimized server responses and minimal asset payloads ensure instant page loads."],
        ['metric' => "3x ROI", 'badge' => "Value", 'title' => "Maximized Digital ROI", 'desc' => "Modernized technology infrastructure reduces cloud costs while lifting user conversion."],
        ['metric' => "Zero", 'badge' => "Security", 'title' => "Zero-Trust Security Model", 'desc' => "OWASP-compliant data encryption, automated vulnerability scans, and strict RBAC."]
    ];

    // 5. Tech Stack (4 Categories)
    $techCategories = $isFlutter ? [
        [
            'category' => "Framework & Languages",
            'icon' => 'code',
            'skills' => ["Flutter 3.x", "Dart 3.x", "Null Safety", "C++ Engine Bindings", "Swift / Kotlin Bridge"]
        ],
        [
            'category' => "State Management & Architecture",
            'icon' => 'layer',
            'skills' => ["Bloc Pattern", "Riverpod", "Provider", "Clean Architecture", "GetX", "Repository Pattern"]
        ],
        [
            'category' => "Backend & Cloud Ecosystem",
            'icon' => 'cloud',
            'skills' => ["Firebase & Supabase", "AWS Amplify & Lambda", "Laravel REST / GraphQL", "Node.js Microservices", "PostgreSQL & SQLite", "Hive & ObjectBox"]
        ],
        [
            'category' => "Testing, CI/CD & Delivery",
            'icon' => 'terminal',
            'skills' => ["Flutter Test & Mocktail", "GitHub Actions CI/CD", "Fastlane Automation", "Codemagic & Bitrise", "App Store Connect", "Google Play Console"]
        ]
    ] : [
        [
            'category' => "Frontend Technologies",
            'icon' => 'code',
            'skills' => ["Blade / Tailwind CSS", "Alpine.js / Vue.js", "TypeScript", "Responsive UI", "WCAG 2.1 AA"]
        ],
        [
            'category' => "Backend & Application Core",
            'icon' => 'layer',
            'skills' => ["Laravel 12 / PHP 8.3+", "RESTful APIs", "GraphQL Gateways", "Event-Driven Queues", "Redis Caching"]
        ],
        [
            'category' => "Data & Cloud Infrastructure",
            'icon' => 'cloud',
            'skills' => ["MySQL 8 / PostgreSQL", "AWS EC2 / S3", "Docker Containers", "Elasticsearch", "Cloudflare CDN"]
        ],
        [
            'category' => "DevOps, Security & QA",
            'icon' => 'terminal',
            'skills' => ["PHPUnit & Pest", "GitHub Actions CI/CD", "OWASP Hardening", "SSL / TLS 1.3", "Automated Backups"]
        ]
    ];

    // 6. Process Steps (6 Steps)
    $processSteps = $isFlutter ? [
        ['step' => "01", 'title' => "Discovery & Planning", 'desc' => "We analyze your product vision, target audience, core features, and technical constraints to construct a roadmap."],
        ['step' => "02", 'title' => "UI/UX Prototyping", 'desc' => "We craft wireframes, interactive user journeys, and component design tokens tailored to mobile gestures and conventions."],
        ['step' => "03", 'title' => "Agile Flutter Development", 'desc' => "Our team builds clean, modular Dart code organized by feature layers, conducting bi-weekly sprint reviews."],
        ['step' => "04", 'title' => "Testing & Quality Assurance", 'desc' => "Comprehensive device matrix testing covering iOS, Android, diverse resolutions, offline caching, and load spikes."],
        ['step' => "05", 'title' => "Store Deployment & Launch", 'desc' => "We manage signing keys, App Store & Google Play metadata, compliance approvals, and zero-downtime release rollout."],
        ['step' => "06", 'title' => "Support & Optimization", 'desc' => "Continuous monitoring, crash analytics, OS update compatibility, and iterative new feature enhancements."]
    ] : [
        ['step' => "01", 'title' => "Technical Discovery", 'desc' => "Deep dive into business requirements, existing system dependencies, and user persona goals."],
        ['step' => "02", 'title' => "System Architecture & UX", 'desc' => "Drafting database schemas, API contracts, and high-conversion wireframes."],
        ['step' => "03", 'title' => "Sprint Development", 'desc' => "Agile development sprints with continuous integration and weekly demo milestones."],
        ['step' => "04", 'title' => "Security & Load Audits", 'desc' => "Rigorous penetration tests, performance stress-testing, and cross-browser QA."],
        ['step' => "05", 'title' => "Zero-Downtime Launch", 'desc' => "Staged DNS switchover, cache warming, and production monitoring."],
        ['step' => "06", 'title' => "24/7 Ongoing SLA", 'desc' => "Guaranteed uptime tracking, security patch deployment, and feature scaling."]
    ];

    // 7. Why Choose Octavia (6 Differentiators)
    $whyChoose = $isFlutter ? [
        ['title' => "Experienced Flutter Engineers", 'desc' => "Senior engineers with in-depth mastery of Dart, custom render objects, native channel plugins, and memory profiling.", 'icon' => 'academic-cap'],
        ['title' => "End-to-End Product Delivery", 'desc' => "Comprehensive project ownership from initial product strategy, UI design, backend integration to store approvals.", 'icon' => 'check-badge'],
        ['title' => "Performance-First Mindset", 'desc' => "We build lightweight, responsive applications optimized for 60/120 FPS rendering, rapid startup, and battery efficiency.", 'icon' => 'bolt'],
        ['title' => "Clean, Scalable Architecture", 'desc' => "Modular code organization utilizing BLoC and Clean Architecture patterns for straightforward team expansion.", 'icon' => 'cube-transparent'],
        ['title' => "Transparent Collaboration", 'desc' => "Direct Slack/Teams access, clear Jira/Linear task visibility, and weekly milestone demos keep you in full control.", 'icon' => 'user-group'],
        ['title' => "Focus on Business Outcomes", 'desc' => "Every architectural and design decision is aligned with user retention, conversion funnels, and your growth roadmap.", 'icon' => 'arrow-trending-up']
    ] : [
        ['title' => "Proven Senior Architects", 'desc' => "Battle-tested engineers with deep enterprise full-stack and cloud architectural experience.", 'icon' => 'academic-cap'],
        ['title' => "Full System Ownership", 'desc' => "From requirements gathering and design to production deployment and 24/7 SLA maintenance.", 'icon' => 'check-badge'],
        ['title' => "Performance Benchmarks", 'desc' => "Sub-second response targets, optimized queries, and global edge CDN distribution.", 'icon' => 'bolt'],
        ['title' => "No Technical Debt", 'desc' => "Clean code, 100% type safety, modular micro-components, and automated testing suites.", 'icon' => 'cube-transparent'],
        ['title' => "Transparent Sprints", 'desc' => "Direct access to code repositories, staging environments, and weekly sprint progress reports.", 'icon' => 'user-group'],
        ['title' => "Predictable Business ROI", 'desc' => "Engineered to minimize operational overhead and directly accelerate digital conversion.", 'icon' => 'arrow-trending-up']
    ];

    // 8. Industry Solutions (6 Cards)
    $industries = $isFlutter ? [
        ['title' => "E-Commerce & Retail", 'desc' => "Fast-loading mobile storefronts, personalized shopping feeds, secure one-click checkout, and loyalty integrations.", 'icon' => 'shopping-bag'],
        ['title' => "FinTech & Financial Services", 'desc' => "Biometric authentication, real-time transaction tracking, digital wallets, and regulatory-compliant encryption.", 'icon' => 'banknotes'],
        ['title' => "Healthcare & Wellness", 'desc' => "Telehealth consultations, appointment scheduling, patient health records, and HIPAA-compliant communication.", 'icon' => 'heart'],
        ['title' => "Logistics & On-Demand", 'desc' => "Live GPS driver tracking, automated dispatching, inventory barcodes, and real-time push notification workflows.", 'icon' => 'truck'],
        ['title' => "Travel & Hospitality", 'desc' => "Seamless booking engines, interactive trip itineraries, offline maps, digital keys, and automated check-ins.", 'icon' => 'globe-alt'],
        ['title' => "EdTech & E-Learning", 'desc' => "Interactive gamified modules, video streaming, live quiz assessments, and offline course sync.", 'icon' => 'book-open']
    ] : [
        ['title' => "E-Commerce & D2C", 'desc' => "High-conversion headless checkout, inventory sync, and multi-currency global stores.", 'icon' => 'shopping-bag'],
        ['title' => "FinTech & Banking", 'desc' => "Secure financial portals, KYC verification workflows, and automated ledger reporting.", 'icon' => 'banknotes'],
        ['title' => "Healthcare & Life Sciences", 'desc' => "Secure patient management systems, HIPAA-compliant portals, and clinical data tools.", 'icon' => 'heart'],
        ['title' => "Logistics & Supply Chain", 'desc' => "Fleet tracking dashboards, warehouse management systems, and automated ERP sync.", 'icon' => 'truck'],
        ['title' => "Real Estate & PropTech", 'desc' => "Virtual property tours, interactive floor plans, CRM integration, and lead pipelines.", 'icon' => 'globe-alt'],
        ['title' => "SaaS & Enterprise Platforms", 'desc' => "Multi-tenant cloud platforms, subscription billing, and robust developer APIs.", 'icon' => 'book-open']
    ];

    // 9. Client Impact / Testimonials
    $testimonials = [
        [
            'quote' => "Octavia helped us launch our iOS and Android apps simultaneously 3 months ahead of schedule. The single codebase approach saved us substantial engineering capital while maintaining 60 FPS performance.",
            'author' => "Chief Technology Officer",
            'company' => "FinTech Scaleup",
            'metric' => "100k+ Downloads",
            'metricLabel' => "First 90 Days"
        ],
        [
            'quote' => "Migrating our legacy native applications to Flutter streamlined our release cycles from 6 weeks to bi-weekly sprints with zero regression issues. Their engineering standards are top-tier.",
            'author' => "VP of Engineering",
            'company' => "E-Commerce Enterprise",
            'metric' => "65% Faster",
            'metricLabel' => "Release Cycles"
        ],
        [
            'quote' => "The app is incredibly responsive, animations are fluid across every device we tested, and our user app-store rating increased from 3.8 to 4.8 stars within two months.",
            'author' => "Product Director",
            'company' => "HealthTech Network",
            'metric' => "4.8 ★",
            'metricLabel' => "App Store Rating"
        ]
    ];

    // 10. FAQs
    $faqs = $isFlutter ? [
        ['question' => "What is Flutter app development?", 'answer' => "Flutter app development is the process of creating mobile applications using Google's Flutter framework and Dart programming language. It allows teams to build applications for iOS and Android from a single shared codebase while delivering native performance and a consistent user experience."],
        ['question' => "Why should businesses choose Flutter over separate native development?", 'answer' => "Flutter significantly reduces development and maintenance costs by consolidating iOS and Android engineering into one unified codebase. It accelerates time-to-market with Hot Reload, offers pixel-perfect custom UI widgets, and compiles to native machine code for smooth 60–120 FPS performance."],
        ['question' => "How much does Flutter app development cost?", 'answer' => "The cost depends on the application's complexity, custom features, third-party integrations, backend infrastructure, and design requirements. A streamlined MVP typically requires less investment than a complex enterprise application with custom microservices. We provide detailed, transparent milestone estimates during discovery."],
        ['question' => "How long does it take to build a Flutter mobile app?", 'answer' => "A focused MVP can be built and deployed in 6 to 10 weeks, while a comprehensive enterprise mobile solution typically spans 3 to 6 months depending on backend readiness and feature scope. Our agile sprints ensure continuous feature previews throughout."],
        ['question' => "Can you migrate an existing iOS/Android app to Flutter?", 'answer' => "Yes! We specialize in migrating existing native iOS (Swift/Objective-C) and Android (Kotlin/Java) apps or React Native codebases to Flutter. We employ modular migration strategies to ensure zero data loss and uninterrupted service for your existing users."],
        ['question' => "Do you provide ongoing post-launch maintenance and support?", 'answer' => "Yes. We offer flexible post-launch SLA support packages covering proactive performance monitoring, OS compatibility updates (new iOS & Android releases), security patches, bug fixes, and continuous feature expansion."]
    ] : (!empty($service['faq']['faqs']) ? $service['faq']['faqs'] : [
        ['question' => "What is included in " . ($service['serviceCategory'] ?? 'this service') . "?", 'answer' => "We provide complete end-to-end delivery including architectural design, custom development, security hardening, automated QA, cloud deployment, and 24/7 ongoing SLA support."],
        ['question' => "How quickly can our project kick off?", 'answer' => "Following our initial technical discovery call, we prepare a detailed architecture proposal within 48 hours and can begin sprint zero within 1 week."],
        ['question' => "How do you handle project IP and code ownership?", 'answer' => "You retain 100% ownership of all source code, design assets, and intellectual property. Everything is transferred to your private repositories throughout development."]
    ]);
@endphp

<div class="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans selection:bg-[#264868] selection:text-white" x-data="{ openFaq: 0, leadSubmitted: false, captchaNum1: 3, captchaNum2: 5, captchaInput: '' }">
    
    <!-- ==========================================
         SECTION 1: HERO SECTION (Heroicons v2 Outline Vectors)
         ========================================== -->
    <section class="bg-gradient-to-b from-[#0F2334] via-[#153758] to-[#264868] text-white pt-36 pb-24 px-6 relative overflow-hidden border-b border-[#153758]">
        <!-- Decorative Vector Mesh Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <defs>
                    <pattern id="hero-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="#C1A972" stroke-width="0.75" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#hero-grid)" />
            </svg>
        </div>

        <div class="absolute top-1/3 left-1/4 -translate-x-1/2 w-[600px] h-[350px] bg-[#C1A972]/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-10 right-10 w-[400px] h-[300px] bg-[#264868]/40 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left: Text & CTA -->
                <div class="lg:col-span-7 space-y-6 text-left">
                    <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-[#C1A972]/15 border border-[#C1A972]/35 text-[#C1A972] text-xs font-extrabold uppercase tracking-widest">
                        <!-- Heroicons v2: device-phone-mobile -->
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="14" height="20" x="5" y="2" rx="2" ry="2"/>
                            <path d="M12 18h.01"/>
                        </svg>
                        <span>{{ $heroBadge }}</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-[1.12]">
                        {{ $heroTitle }}
                        <span class="text-[#C1A972] block mt-1">{{ $heroTitleHighlight }}</span>
                    </h1>

                    <p class="text-[#DDE3E9] text-sm sm:text-base lg:text-lg leading-relaxed max-w-2xl">
                        {{ $heroDescription }}
                    </p>

                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-2">
                        <button
                            @click="consultationTopic = 'Service Inquiry: {{ addslashes($service['serviceCategory'] ?? 'Flutter App Development') }}'; consultationOpen = true"
                            class="px-8 py-4 bg-[#C1A972] hover:bg-[#C1A972]/90 text-[#153758] font-extrabold text-xs sm:text-sm uppercase tracking-wider rounded-xl transition-all shadow-xl shadow-[#C1A972]/20 flex items-center justify-center gap-2 cursor-pointer hover:scale-[1.02]"
                        >
                            <span>{{ $primaryCtaText }}</span>
                            <!-- Heroicons v2: arrow-right -->
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                            </svg>
                        </button>
                        <a
                            href="#capabilities"
                            class="px-7 py-4 bg-white/10 hover:bg-white/20 text-white font-bold text-xs sm:text-sm rounded-xl border border-white/20 transition-all text-center flex items-center justify-center gap-2"
                        >
                            <span>{{ $secondaryCtaText }}</span>
                            <!-- Heroicons v2: chevron-down -->
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right: Vector Visual Trust Matrix Card -->
                <div class="lg:col-span-5">
                    <div class="bg-[#0F2334]/85 backdrop-blur-md border border-[#C1A972]/30 rounded-3xl p-6 sm:p-8 shadow-2xl relative overflow-hidden">
                        <!-- Top Header in Card -->
                        <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-6">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-[#264868] border border-[#C1A972]/40 flex items-center justify-center text-[#C1A972]">
                                    <!-- Heroicons v2: sparkles -->
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-white">Full-Lifecycle Delivery</h3>
                                    <span class="text-[11px] text-[#C1A972]">Enterprise Mobile Standards</span>
                                </div>
                            </div>
                            <span class="px-2.5 py-1 rounded-full bg-[#C1A972]/20 text-[#C1A972] text-[10px] font-black uppercase tracking-wider">
                                iOS + Android
                            </span>
                        </div>

                        <!-- 6 Trust Feature Points -->
                        <div class="space-y-3">
                            @foreach ($heroTrustPoints as $point)
                                <div class="flex items-center gap-3 p-3 rounded-xl bg-[#153758]/60 hover:bg-[#153758] border border-white/5 transition-all">
                                    <div class="w-6 h-6 rounded-lg bg-[#C1A972]/20 text-[#C1A972] flex items-center justify-center shrink-0">
                                        <!-- Heroicons v2: check -->
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m4.5 12.75 6 6 9-13.5"/>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-semibold text-[#DDE3E9]">{{ $point }}</span>
                                </div>
                            @endforeach
                        </div>

                        <!-- Bottom Stats Strip -->
                        <div class="mt-6 pt-4 border-t border-white/10 grid grid-cols-2 gap-4 text-center">
                            <div>
                                <span class="text-xl font-black text-[#C1A972]">1 Codebase</span>
                                <p class="text-[10px] uppercase tracking-wider text-[#93A3B2] mt-0.5">iOS &amp; Android</p>
                            </div>
                            <div>
                                <span class="text-xl font-black text-white">60-120 FPS</span>
                                <p class="text-[10px] uppercase tracking-wider text-[#93A3B2] mt-0.5">Native Rendering</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 2: PERFORMANCE & OVERVIEW SECTION
         ========================================== -->
    <section class="max-w-7xl mx-auto px-6 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left: Overview Narrative -->
            <div class="lg:col-span-6 space-y-6">
                <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                    PERFORMANCE &amp; OVERVIEW
                </span>
                
                <h2 class="text-2xl sm:text-4xl font-black text-[#264868] tracking-tight leading-tight">
                    {{ $overviewHeading }}
                </h2>

                <p class="text-sm sm:text-base font-bold text-[#153758] leading-relaxed">
                    {{ $overviewLead }}
                </p>

                <p class="text-xs sm:text-sm text-[#5C6B7A] leading-relaxed">
                    {{ $overviewSecondary }}
                </p>

                <!-- Value highlights -->
                <div class="space-y-4 pt-2">
                    @foreach ($overviewPoints as $pt)
                        <div class="flex items-start gap-4 p-4 rounded-2xl bg-[#F3F5F7] border border-[#DDE3E9]">
                            <div class="w-8 h-8 rounded-xl bg-[#153758] text-[#C1A972] flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                                <!-- Heroicons v2: bolt -->
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-[#264868] uppercase tracking-wide mb-1">{{ $pt['title'] }}</h4>
                                <p class="text-xs text-[#5C6B7A] leading-relaxed">{{ $pt['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right: Vector Architecture Flow Graphic -->
            <div class="lg:col-span-6">
                <div class="bg-gradient-to-br from-[#153758] to-[#0F2334] rounded-3xl p-8 text-white border border-[#264868] shadow-2xl relative overflow-hidden">
                    <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-6">
                        <span class="text-xs font-bold text-[#C1A972] tracking-wider uppercase">Architecture Benchmark</span>
                        <span class="text-xs text-[#93A3B2]">Dart Native Runtime</span>
                    </div>

                    <!-- Flow Diagram Vector -->
                    <div class="space-y-4">
                        <div class="p-4 rounded-2xl bg-[#264868]/60 border border-white/10 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-[#C1A972]/20 text-[#C1A972] flex items-center justify-center">
                                    <!-- Heroicons v2: code-bracket -->
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5"/>
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-xs font-bold text-white block">Single Dart Codebase</span>
                                    <span class="text-[10px] text-[#93A3B2]">Null Safety &amp; Hot Reload</span>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-[#C1A972]">Source</span>
                        </div>

                        <div class="flex justify-center">
                            <!-- Heroicons v2: arrow-down -->
                            <svg class="w-6 h-6 text-[#C1A972] animate-bounce" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3"/>
                            </svg>
                        </div>

                        <div class="p-4 rounded-2xl bg-[#0F2334] border border-[#C1A972]/40 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-[#C1A972] text-[#153758] flex items-center justify-center font-bold">
                                    <!-- Heroicons v2: cpu-chip -->
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z"/>
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-xs font-bold text-white block">Impeller &amp; Skia GPU Rendering</span>
                                    <span class="text-[10px] text-[#C1A972]">Direct Machine Compilation</span>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-[#C1A972]">60-120 FPS</span>
                        </div>

                        <div class="flex justify-center">
                            <!-- Heroicons v2: arrow-down -->
                            <svg class="w-6 h-6 text-[#C1A972] animate-bounce" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3"/>
                            </svg>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 rounded-2xl bg-[#264868]/60 border border-white/10 text-center">
                                <span class="text-xs font-bold text-white block">Apple iOS</span>
                                <span class="text-[10px] text-[#93A3B2]">Swift Bridge &amp; App Store</span>
                            </div>
                            <div class="p-4 rounded-2xl bg-[#264868]/60 border border-white/10 text-center">
                                <span class="text-xs font-bold text-white block">Google Android</span>
                                <span class="text-[10px] text-[#93A3B2]">Kotlin Bridge &amp; Play Store</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 3: SERVICES & CORE CAPABILITIES GRID (Heroicons v2)
         ========================================== -->
    <section id="capabilities" class="bg-[#F3F5F7] py-20 px-6 border-t border-b border-[#DDE3E9]">
        <div class="max-w-7xl mx-auto space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                    CORE CAPABILITIES
                </span>
                <h2 class="text-2xl sm:text-4xl font-black text-[#264868]">
                    {{ $capabilitiesHeading }}
                </h2>
                <p class="text-[#5C6B7A] text-xs sm:text-sm leading-relaxed">
                    {{ $capabilitiesSubheading }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($capabilities as $idx => $cap)
                    <div class="bg-white border border-[#DDE3E9] hover:border-[#C1A972] rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1">
                        <div class="space-y-4">
                            <div class="w-12 h-12 rounded-2xl bg-[#264868] text-[#C1A972] group-hover:bg-[#C1A972] group-hover:text-[#153758] transition-colors flex items-center justify-center font-bold shadow-md">
                                @if ($cap['icon'] === 'code')
                                    <!-- Heroicons v2: code-bracket -->
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5"/>
                                    </svg>
                                @elseif ($cap['icon'] === 'device')
                                    <!-- Heroicons v2: device-phone-mobile -->
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="14" height="20" x="5" y="2" rx="2" ry="2"/>
                                        <path d="M12 18h.01"/>
                                    </svg>
                                @elseif ($cap['icon'] === 'paint')
                                    <!-- Heroicons v2: paint-brush -->
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9.53 16.122a3 3 0 0 0-5.78 1.128 2.25 2.25 0 0 1-2.4 2.245 4.5 4.5 0 0 0 8.4-2.245c0-.399-.078-.78-.22-1.128Zm0 0 2.499-2.499m5.632-4.417a2.25 2.25 0 0 0-3.182-3.182l-5.45 5.45c-.27.27-.472.607-.585.98l-.75 2.498 2.499-.75a2.25 2.25 0 0 0 .98-.585l5.488-5.411Z"/>
                                    </svg>
                                @elseif ($cap['icon'] === 'cloud')
                                    <!-- Heroicons v2: cloud-arrow-up -->
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z"/>
                                    </svg>
                                @elseif ($cap['icon'] === 'refresh')
                                    <!-- Heroicons v2: arrow-path -->
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"/>
                                    </svg>
                                @else
                                    <!-- Heroicons v2: shield-check -->
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-lg font-bold text-[#264868] group-hover:text-[#153758] transition-colors">
                                {{ $cap['title'] }}
                            </h3>
                            <p class="text-xs text-[#5C6B7A] leading-relaxed">
                                {{ $cap['desc'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 4: KEY BENEFITS / VALUE PROPOSITION (4 Cards)
         ========================================== -->
    <section class="max-w-7xl mx-auto px-6 py-20">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                VALUE PROPOSITION
            </span>
            <h2 class="text-2xl sm:text-4xl font-black text-[#264868]">
                {{ $benefitsHeading }}
            </h2>
            <p class="text-[#5C6B7A] text-xs sm:text-sm leading-relaxed">
                {{ $benefitsSubheading }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($benefits as $ben)
                <div class="bg-white border border-[#DDE3E9] rounded-3xl p-6 shadow-sm flex flex-col justify-between hover:border-[#C1A972] transition-all group">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-3xl font-black text-[#264868] tracking-tight group-hover:text-[#C1A972] transition-colors">
                                {{ $ben['metric'] }}
                            </span>
                            <span class="text-[10px] font-bold uppercase tracking-wider bg-[#264868]/10 text-[#264868] px-2.5 py-1 rounded-md">
                                {{ $ben['badge'] }}
                            </span>
                        </div>
                        <h3 class="text-sm font-bold text-[#153758] mb-2">{{ $ben['title'] }}</h3>
                        <p class="text-xs text-[#5C6B7A] leading-relaxed">{{ $ben['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ==========================================
         SECTION 5: TECHNOLOGY STACK (Heroicons v2)
         ========================================== -->
    <section class="bg-[#153758] text-white py-20 px-6 border-t border-b border-[#153758]">
        <div class="max-w-7xl mx-auto space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <span class="text-xs font-bold uppercase tracking-widest text-[#C1A972]">
                    TECHNOLOGY ECOSYSTEM
                </span>
                <h2 class="text-2xl sm:text-4xl font-black text-white">
                    {{ $isFlutter ? "Technologies We Use in Flutter App Development" : "Enterprise Technology Stack" }}
                </h2>
                <p class="text-[#93A3B2] text-xs sm:text-sm">
                    {{ $isFlutter ? "We use modern tools, frameworks, and backend technologies to build scalable, reliable Flutter applications." : "Modern frameworks, cloud platforms, and security standards powering our engineering." }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($techCategories as $cat)
                    <div class="bg-[#0F2334]/80 border border-white/10 hover:border-[#C1A972]/60 rounded-3xl p-6 transition-all space-y-4 flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-xl bg-[#264868] text-[#C1A972] flex items-center justify-center font-bold mb-4 border border-[#C1A972]/30">
                                @if ($cat['icon'] === 'code')
                                    <!-- Heroicons v2: code-bracket-square -->
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14.25 9.75 16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z"/>
                                    </svg>
                                @elseif ($cat['icon'] === 'layer')
                                    <!-- Heroicons v2: square-3-stack-3d -->
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3"/>
                                    </svg>
                                @elseif ($cat['icon'] === 'cloud')
                                    <!-- Heroicons v2: server-stack -->
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5.25 14.25h13.5m-13.5 0a3 3 0 0 1-3-3m3 3a3 3 0 1 0 0 6h13.5a3 3 0 1 0 0-6m-16.5-3a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3m-19.5 0a4.5 4.5 0 0 1 .9-2.7L5.75 5.1a3 3 0 0 1 2.4-1.35h7.7a3 3 0 0 1 2.4 1.35l1.6 2.4a4.5 4.5 0 0 1 .9 2.7m0 0a3 3 0 0 1-3 3m3-3v6a3 3 0 0 1-3 3M6.75 10.5a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm0 6a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"/>
                                    </svg>
                                @else
                                    <!-- Heroicons v2: command-line -->
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m6.75 7.5 3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0 0 21 18V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v12a2.25 2.25 0 0 0 2.25 2.25Z"/>
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-sm font-bold text-white mb-4">{{ $cat['category'] }}</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($cat['skills'] as $skill)
                                    <span class="text-[11px] font-medium px-2.5 py-1 rounded-lg bg-[#153758] border border-[#264868] text-[#DDE3E9]">
                                        {{ $skill }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 6: 6-STEP DEVELOPMENT PROCESS
         ========================================== -->
    <section class="max-w-7xl mx-auto px-6 py-20">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                ROADMAP &amp; PROCESS
            </span>
            <h2 class="text-2xl sm:text-4xl font-black text-[#264868]">
                {{ $isFlutter ? "Our Step-by-Step Flutter App Development Process" : "Our Structured Engineering Process" }}
            </h2>
            <p class="text-[#5C6B7A] text-xs sm:text-sm leading-relaxed">
                {{ $isFlutter ? "We follow a structured, collaborative development process to turn requirements into a polished mobile application." : "Iterative delivery sprints backed by rigorous quality assurance and zero-downtime deployment." }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($processSteps as $step)
                <div class="bg-white border border-[#DDE3E9] rounded-3xl p-6 shadow-sm flex flex-col justify-between hover:border-[#C1A972] transition-all">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-2xl bg-[#264868] text-[#C1A972] font-black flex items-center justify-center text-sm border border-[#C1A972]/30">
                                {{ $step['step'] }}
                            </span>
                            <span class="text-[10px] font-bold text-[#5C6B7A] uppercase tracking-wider">Phase {{ $step['step'] }}</span>
                        </div>
                        <h3 class="text-sm font-bold text-[#264868]">{{ $step['title'] }}</h3>
                        <p class="text-xs text-[#5C6B7A] leading-relaxed">{{ $step['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ==========================================
         SECTION 7: WHY CHOOSE OCTAVIA (Heroicons v2)
         ========================================== -->
    <section class="bg-[#F3F5F7] py-20 px-6 border-t border-b border-[#DDE3E9]">
        <div class="max-w-7xl mx-auto space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                    WHY CHOOSE US
                </span>
                <h2 class="text-2xl sm:text-4xl font-black text-[#264868]">
                    {{ $isFlutter ? "Why Choose Octavia for Flutter App Development" : "Why Leading Brands Partner with Octavia" }}
                </h2>
                <p class="text-[#5C6B7A] text-xs sm:text-sm leading-relaxed">
                    {{ $isFlutter ? "We combine technical engineering, product design, and clear communication to deliver mobile apps that support your business objectives." : "Proven engineering principles, transparent delivery cycles, and relentless commitment to quality." }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($whyChoose as $item)
                    <div class="bg-white border border-[#DDE3E9] hover:border-[#C1A972] rounded-3xl p-6 shadow-sm hover:shadow-md transition-all space-y-3">
                        <div class="w-10 h-10 rounded-2xl bg-[#153758] text-[#C1A972] flex items-center justify-center font-bold">
                            @if ($item['icon'] === 'academic-cap')
                                <!-- Heroicons v2: academic-cap -->
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-5.25 6.557c.78.36 1.62.678 2.505.95"/>
                                </svg>
                            @elseif ($item['icon'] === 'check-badge')
                                <!-- Heroicons v2: check-badge -->
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/>
                                </svg>
                            @elseif ($item['icon'] === 'bolt')
                                <!-- Heroicons v2: bolt -->
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z"/>
                                </svg>
                            @elseif ($item['icon'] === 'cube-transparent')
                                <!-- Heroicons v2: cube-transparent -->
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/>
                                </svg>
                            @elseif ($item['icon'] === 'user-group')
                                <!-- Heroicons v2: user-group -->
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/>
                                </svg>
                            @else
                                <!-- Heroicons v2: arrow-trending-up -->
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941"/>
                                </svg>
                            @endif
                        </div>
                        <h3 class="text-sm font-bold text-[#264868]">{{ $item['title'] }}</h3>
                        <p class="text-xs text-[#5C6B7A] leading-relaxed">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 8: INDUSTRY SOLUTIONS (Heroicons v2)
         ========================================== -->
    <section class="max-w-7xl mx-auto px-6 py-20">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                INDUSTRY DOMAINS
            </span>
            <h2 class="text-2xl sm:text-4xl font-black text-[#264868]">
                {{ $isFlutter ? "Flutter Mobile App Solutions Across Industries" : "Tailored Solutions Across Industries" }}
            </h2>
            <p class="text-[#5C6B7A] text-xs sm:text-sm leading-relaxed">
                {{ $isFlutter ? "We build custom Flutter applications tailored to the specific workflows, compliance needs, and user behaviors of different industries." : "Domain-specialized architectures crafted for regulated industries and high-volume digital commerce." }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($industries as $ind)
                <div class="bg-white border border-[#DDE3E9] hover:border-[#C1A972] rounded-3xl p-6 shadow-sm hover:shadow-md transition-all space-y-3">
                    <div class="w-10 h-10 rounded-2xl bg-[#264868] text-[#C1A972] flex items-center justify-center font-bold">
                        @if ($ind['icon'] === 'shopping-bag')
                            <!-- Heroicons v2: shopping-bag -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>
                            </svg>
                        @elseif ($ind['icon'] === 'banknotes')
                            <!-- Heroicons v2: banknotes -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6H2.25m0 0v10.5c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125V6a1.125 1.125 0 0 0-1.125-1.125H3.375A1.125 1.125 0 0 0 2.25 6ZM12 12.75a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Zm-6.75-2.25h.008v.008H5.25V10.5Zm13.5 0h.008v.008h-.008V10.5Z"/>
                            </svg>
                        @elseif ($ind['icon'] === 'heart')
                            <!-- Heroicons v2: heart -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
                            </svg>
                        @elseif ($ind['icon'] === 'truck')
                            <!-- Heroicons v2: truck -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.25V4.875A1.125 1.125 0 0 0 13.125 3.75H3.375A1.125 1.125 0 0 0 2.25 4.875v9.375m12-6.75h3.375c.621 0 1.125.504 1.125 1.125v3.375m-4.5-4.5v4.5m0 0h4.5"/>
                            </svg>
                        @elseif ($ind['icon'] === 'globe-alt')
                            <!-- Heroicons v2: globe-alt -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418"/>
                            </svg>
                        @else
                            <!-- Heroicons v2: book-open -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"/>
                            </svg>
                        @endif
                    </div>
                    <h3 class="text-sm font-bold text-[#264868]">{{ $ind['title'] }}</h3>
                    <p class="text-xs text-[#5C6B7A] leading-relaxed">{{ $ind['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ==========================================
         SECTION 9: CLIENT IMPACT & TESTIMONIALS
         ========================================== -->
    <section class="bg-[#F3F5F7] py-20 px-6 border-t border-b border-[#DDE3E9]">
        <div class="max-w-7xl mx-auto space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                    CLIENT IMPACT
                </span>
                <h2 class="text-2xl sm:text-4xl font-black text-[#264868]">
                    Delivering Real Value for Growing Businesses
                </h2>
                <p class="text-[#5C6B7A] text-xs sm:text-sm leading-relaxed">
                    Here is how our engineering and development approach helps clients turn product concepts into successful mobile applications.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($testimonials as $t)
                    <div class="bg-white border border-[#DDE3E9] rounded-3xl p-8 shadow-sm flex flex-col justify-between space-y-6 hover:border-[#C1A972] transition-all">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-black text-[#264868]">{{ $t['metric'] }}</span>
                                <span class="text-[10px] uppercase font-bold text-[#C1A972] tracking-wider bg-[#264868] px-2.5 py-1 rounded-md">
                                    {{ $t['metricLabel'] }}
                                </span>
                            </div>
                            <p class="text-xs text-[#5C6B7A] leading-relaxed italic">
                                "{{ $t['quote'] }}"
                            </p>
                        </div>
                        <div class="border-t border-[#F3F5F7] pt-4">
                            <h4 class="text-xs font-bold text-[#153758]">{{ $t['author'] }}</h4>
                            <span class="text-[11px] text-[#93A3B2]">{{ $t['company'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 10: FREQUENTLY ASKED QUESTIONS (Alpine Accordion + Heroicons)
         ========================================== -->
    <section class="max-w-4xl mx-auto px-6 py-20">
        <div class="text-center space-y-3 mb-12">
            <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                FREQUENTLY ASKED QUESTIONS
            </span>
            <h2 class="text-2xl sm:text-4xl font-black text-[#264868]">
                {{ $isFlutter ? "Frequently Asked Questions About Flutter App Development" : "Technical & Commercial FAQ" }}
            </h2>
            <p class="text-[#5C6B7A] text-xs sm:text-sm">
                {{ $isFlutter ? "Have questions about building mobile apps with Flutter? Here are answers to common questions businesses ask." : "Common questions regarding technical timelines, architectures, and SLAs." }}
            </p>
        </div>

        <div class="space-y-4">
            @foreach ($faqs as $idx => $faq)
                <div class="bg-white border border-[#DDE3E9] rounded-2xl overflow-hidden transition-all shadow-sm">
                    <button
                        @click="openFaq = (openFaq === {{ $idx }} ? null : {{ $idx }})"
                        class="w-full p-6 text-left font-bold text-sm sm:text-base text-[#264868] flex items-center justify-between gap-4 hover:bg-[#F3F5F7] transition-colors cursor-pointer"
                    >
                        <span>{{ $faq['question'] }}</span>
                        <!-- Heroicons v2: chevron-down -->
                        <svg
                            :class="openFaq === {{ $idx }} ? 'rotate-180 text-[#C1A972]' : 'text-[#5C6B7A]'"
                            class="w-5 h-5 shrink-0 transition-transform duration-200"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                        >
                            <path d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>

                    <div x-show="openFaq === {{ $idx }}" x-cloak class="px-6 pb-6 text-xs sm:text-sm text-[#5C6B7A] leading-relaxed border-t border-[#F3F5F7] pt-4">
                        {{ $faq['answer'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ==========================================
         SECTION 11: FINAL CTA BANNER & LEAD CAPTURE (Heroicons v2)
         ========================================== -->
    <section id="contact-banner" class="max-w-7xl mx-auto px-6 py-20">
        <div class="bg-gradient-to-r from-[#0F2334] via-[#153758] to-[#264868] rounded-3xl p-8 sm:p-12 text-[#FEFEFE] shadow-2xl relative overflow-hidden border border-[#C1A972]/30">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <!-- Left: CTA Narrative & Trust Points -->
                <div class="lg:col-span-6 space-y-6">
                    <span class="text-[11px] font-bold text-[#C1A972] uppercase bg-[#0F2334] px-3.5 py-1.5 rounded-full border border-[#C1A972]/30 inline-block">
                        START YOUR PROJECT
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-black text-white leading-tight">
                        {{ $isFlutter ? "Ready to Build Your Flutter Mobile App?" : "Ready to Scale Your Digital Infrastructure?" }}
                    </h2>
                    <p class="text-sm text-[#DDE3E9] leading-relaxed">
                        {{ $isFlutter ? "Let's discuss your product idea, target platforms, timeline, and budget. Our team will help you evaluate Flutter and plan a clear roadmap for development." : "Schedule a complimentary technical discovery session with our lead architects to review your roadmap and engineering requirements." }}
                    </p>

                    <div class="space-y-3 pt-2">
                        <div class="flex items-center gap-3 bg-[#0F2334]/60 p-3.5 rounded-xl border border-white/5">
                            <!-- Heroicons v2: shield-check -->
                            <svg class="w-4 h-4 text-[#C1A972] shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>
                            </svg>
                            <span class="text-xs text-[#DDE3E9] font-medium">Non-Disclosure Agreement (NDA) Protected Consultation</span>
                        </div>
                        <div class="flex items-center gap-3 bg-[#0F2334]/60 p-3.5 rounded-xl border border-white/5">
                            <!-- Heroicons v2: user-circle -->
                            <svg class="w-4 h-4 text-[#C1A972] shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                            <span class="text-xs text-[#DDE3E9] font-medium">Direct Senior Tech Architect &amp; Engineering Review</span>
                        </div>
                        <div class="flex items-center gap-3 bg-[#0F2334]/60 p-3.5 rounded-xl border border-white/5">
                            <!-- Heroicons v2: clock -->
                            <svg class="w-4 h-4 text-[#C1A972] shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <span class="text-xs text-[#DDE3E9] font-medium">Detailed Technical Roadmap &amp; Scope Estimate in 24–48 Hours</span>
                        </div>
                    </div>
                </div>

                <!-- Right: High-Converting Interactive Lead Form -->
                <div class="lg:col-span-6">
                    <div class="bg-[#0F2334]/95 rounded-2xl p-6 sm:p-8 border border-[#C1A972]/30 shadow-2xl">
                        <template x-if="leadSubmitted">
                            <div class="text-center py-8 space-y-4">
                                <div class="w-14 h-14 rounded-full bg-[#C1A972]/20 text-[#C1A972] flex items-center justify-center mx-auto">
                                    <!-- Heroicons v2: check-circle -->
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white">Project Inquiry Received!</h3>
                                <p class="text-xs text-[#93A3B2] max-w-sm mx-auto">Our senior mobile architect will review your requirements and reach out within 24 hours.</p>
                            </div>
                        </template>

                        <template x-if="!leadSubmitted">
                            <form
                                @submit.prevent="if (parseInt(captchaInput) === (captchaNum1 + captchaNum2)) { leadSubmitted = true; } else { alert('Incorrect security calculation'); }"
                                class="space-y-4"
                            >
                                <div class="text-center mb-4">
                                    <h3 class="text-white text-base font-extrabold tracking-wide">Request a Technical Consultation</h3>
                                    <p class="text-[11px] text-[#93A3B2] mt-1">Get an expert estimate tailored to your app idea</p>
                                </div>

                                <input
                                    type="text"
                                    required
                                    placeholder="Full Name *"
                                    class="w-full bg-[#153758] border border-[#264868] rounded-xl px-4 py-3 text-xs text-white placeholder-[#93A3B2] focus:border-[#C1A972] focus:outline-none transition-colors"
                                />
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <input
                                        type="email"
                                        required
                                        placeholder="Business Email *"
                                        class="w-full bg-[#153758] border border-[#264868] rounded-xl px-4 py-3 text-xs text-white placeholder-[#93A3B2] focus:border-[#C1A972] focus:outline-none transition-colors"
                                    />
                                    <input
                                        type="tel"
                                        required
                                        placeholder="Phone Number *"
                                        class="w-full bg-[#153758] border border-[#264868] rounded-xl px-4 py-3 text-xs text-white placeholder-[#93A3B2] focus:border-[#C1A972] focus:outline-none transition-colors"
                                    />
                                </div>
                                <textarea
                                    rows="3"
                                    placeholder="Tell us about your app vision, target platforms & timelines..."
                                    class="w-full bg-[#153758] border border-[#264868] rounded-xl px-4 py-3 text-xs text-white placeholder-[#93A3B2] focus:border-[#C1A972] focus:outline-none resize-none transition-colors"
                                ></textarea>

                                <!-- Security Math Captcha -->
                                <div class="p-3 rounded-xl bg-[#153758] border border-[#264868] flex items-center justify-between text-xs">
                                    <span class="text-white font-bold">Security Check: <span x-text="captchaNum1"></span> + <span x-text="captchaNum2"></span> = ?</span>
                                    <input
                                        type="number"
                                        required
                                        x-model="captchaInput"
                                        placeholder="Ans"
                                        class="w-16 px-2 py-1 rounded bg-[#0F2334] border border-[#264868] text-white text-center font-bold"
                                    />
                                </div>

                                <button
                                    type="submit"
                                    class="w-full bg-[#C1A972] hover:bg-[#C1A972]/90 text-[#153758] font-extrabold text-xs uppercase tracking-wider py-4 rounded-xl transition-all shadow-xl cursor-pointer flex items-center justify-center gap-2 hover:scale-[1.01]"
                                >
                                    <span>SUBMIT PROJECT REQUEST</span>
                                    <!-- Heroicons v2: arrow-right -->
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                                    </svg>
                                </button>
                            </form>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection