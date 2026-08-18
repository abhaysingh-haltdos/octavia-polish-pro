import { ServicePageData } from '../types/service';

export const MOBILE_APP_DEVELOPMENT_SUBPAGES: Record<string, ServicePageData> = {
  // Main Mobile App Development Category Page
  'mobile-app-development': {
    id: 'mobile-app-development',
    serviceCategory: 'Mobile App Development Services',
    metaTitle: 'Mobile App Development Company | Native & Cross-Platform Apps | Octavia Tech Solutions',
    seo: {
      h1: 'Mobile Application Development Services',
      metaTitle: 'Mobile App Development Company | Native & Cross-Platform Apps | Octavia Tech Solutions',
      metaDescription: 'Engineer high-performance iOS and Android mobile applications using React Native, Flutter, Swift, and Kotlin. Featuring offline sync, biometric security, and 60 FPS UX.',
      canonicalUrl: 'https://octaviatechnologies.com/services/mobile-app-development',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Mobile App Development', href: '/services/mobile-app-development' },
      ],
    },
    hero: {
      badge: 'Mobile App Engineering',
      title: 'Enterprise Mobile App Development',
      titleHighlight: 'Services',
      description: 'Build fast, intuitive, and secure mobile applications for iOS and Android. From cross-platform Flutter/React Native solutions to native Swift & Kotlin apps, we engineer mobile experiences that users love.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore Mobile Specs',
      graphicBadge: 'React Native & Flutter Engine',
      graphicTitle: '60 FPS Native UX',
      graphicSubtext: 'Optimized memory management, hardware keychains, and offline SQLite synchronization.',
      tags: ['Android & iOS Apps', 'React Native & Flutter', 'Offline Sync & SQLite', 'Biometric Auth'],
    },
    overview: {
      badge: 'WHAT IS MOBILE APP DEVELOPMENT',
      heading: 'Mobile Engineering Explained',
      leadParagraph: 'Mobile App Development is the specialized discipline of designing, coding, testing, and deploying high-performance applications for smartphones, tablets, and wearable devices.',
      secondaryParagraph: 'At Octavia Tech Solutions, our mobile engineering team builds native and hybrid applications designed for smooth 60 FPS rendering, hardware security integration, offline data caching, and app store compliance.',
      pillars: [
        { title: 'Cross-Platform Efficiency', description: 'Unified codebases using React Native and Flutter cut mobile launch costs by 40%.', iconName: 'Smartphone' },
        { title: 'Hardware Integration', description: 'Deep access to BLE beacons, GPS tracking, camera sensors, and Apple Pay/Google Wallet.', iconName: 'Zap' },
        { title: 'Offline Data Sync', description: 'Local SQLite/MMKV database caching with background sync when network connectivity returns.', iconName: 'Database' },
        { title: 'Enterprise Mobile Security', description: 'Hardware-backed encryption storing keys in iOS Secure Enclave & Android Keystore.', iconName: 'Lock' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Enterprise Mobile Engineering Matters',
      subheading: 'Poor mobile performance, app store rejections, and clunky interfaces destroy mobile user retention.',
      challenges: [
        {
          id: 'madc1',
          category: 'User Retention',
          issue: 'Deliver Smooth 60 FPS Mobile Interfaces',
          impact: 'Increase daily active users (DAU) and app store ratings.',
          description: 'Optimized render trees and native bridge code prevent frame drops and sluggish scrolling.',
        },
        {
          id: 'madc2',
          category: 'Offline Usability',
          issue: 'Prevent App Freezes When Network Connection Drops',
          impact: 'Ensure field personnel and customers can work uninterrupted anywhere.',
          description: 'Local database caching syncs background queues automatically once connection is restored.',
        },
        {
          id: 'madc3',
          category: 'Security Compliance',
          issue: 'Protect Mobile Auth Tokens & User Privacy',
          impact: 'Comply with strict Apple App Store and Google Play privacy guidelines.',
          description: 'Biometric Face ID / Touch ID authentication backed by hardware-level key storage.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Everything Included in Our Mobile App Development Services',
      subheading: 'End-to-end mobile development across platforms and hardware features.',
      categories: ['Cross-Platform', 'Native Apps', 'Maintenance & Support'],
      features: [
        {
          id: 'madf1',
          title: 'Cross-Platform App Development',
          category: 'Cross-Platform',
          iconName: 'Smartphone',
          badge: 'Popular',
          businessBenefit: 'Single Codebase for iOS & Android',
          description: 'React Native and Flutter applications delivering near 100% code sharing between platforms.',
          points: ['60 FPS Native Graphics', 'Hot Reloading Iterations', 'Custom Native C++ Bridges'],
        },
        {
          id: 'madf2',
          title: 'Native Android & iOS Engineering',
          category: 'Native Apps',
          iconName: 'Smartphone',
          badge: 'Max Speed',
          businessBenefit: 'Full Access to OS Features',
          description: 'Native Swift and Kotlin codebases engineered for maximum device performance and complex hardware access.',
          points: ['Swift & SwiftUI for iOS', 'Kotlin & Jetpack Compose', 'Hardware Sensor APIs'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'Mobile App FAQ',
      subheading: 'Answers about platform selection, app store approval, and code ownership.',
      faqs: [
        {
          question: 'Do you assist with Apple App Store and Google Play Store submission?',
          answer: 'Yes! We manage the complete deployment process, including app store compliance, developer accounts, screenshot assets, and review guidelines.',
        },
        {
          question: 'Should we choose React Native, Flutter, or Native iOS/Android?',
          answer: 'React Native and Flutter deliver near-native performance while saving 40% in cost. Native Swift/Kotlin is ideal for deep hardware-level control.',
        },
      ],
    },
    cta: {
      badge: 'MOBILE CONSULTATION',
      heading: 'Have a Mobile App Idea to Engineer?',
      description: 'Consult with our mobile architects to plan your iOS and Android app strategy.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore Mobile Specs',
    },
  },

  // 1. Android App Development
  'android-app-development': {
    id: 'android-app-development',
    serviceCategory: 'Android App Development Services',
    metaTitle: 'Android App Development Services | Kotlin & Jetpack Compose | Octavia Tech Solutions',
    seo: {
      h1: 'Android App Development Services',
      metaTitle: 'Android App Development Services | Kotlin & Jetpack Compose | Octavia Tech Solutions',
      metaDescription: 'Engineered high-performance Android applications using Kotlin, Jetpack Compose, and Android SDK. Scale engagement across millions of Android smartphones and tablets.',
      canonicalUrl: 'https://octaviatechnologies.com/services/mobile-app-development/android-app-development',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Mobile App Development', href: '/services/mobile-app-development' },
        { name: 'Android App Development', href: '/services/mobile-app-development/android-app-development' },
      ],
    },
    hero: {
      badge: 'Android Engineering',
      title: 'Android App Development',
      titleHighlight: 'Services',
      description: 'Build fast, native Android applications tailored to modern Android smartphones, foldables, and tablets. We write clean Kotlin code using Jetpack Compose for fluid UI and enterprise stability.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore Android Specs',
      tags: ['Kotlin & Jetpack Compose', 'Android Keystore Auth', 'Google Play Compliance', 'Multi-Screen Support'],
    },
    overview: {
      badge: 'WHAT IS ANDROID DEVELOPMENT',
      heading: 'Native Android Engineering Explained',
      leadParagraph: 'Android App Development focuses on building native applications designed explicitly for the Android ecosystem utilizing Kotlin, Material Design 3, and Android Architecture Components.',
      secondaryParagraph: 'Octavia Tech Solutions engineers Android apps that handle vast device fragmentation, background battery optimization, and seamless integration with Google Play Services.',
      pillars: [
        { title: 'Kotlin & Jetpack Compose', description: 'Declarative, modern Android UI framework delivering smooth 60 FPS rendering.', iconName: 'Smartphone' },
        { title: 'Google Play Compliance', description: 'Full adherence to Google Play policies, target SDK guidelines, and app bundle optimizations.', iconName: 'ShieldCheck' },
        { title: 'Android Keystore Security', description: 'Hardware-backed encryption protecting user credentials and sensitive tokens.', iconName: 'Lock' },
        { title: 'Background Processing', description: 'WorkManager and Coroutines for background sync without draining battery life.', iconName: 'Zap' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Native Android Development Matters',
      subheading: 'Managing Android device fragmentation requires specialized native Kotlin architecture.',
      challenges: [
        {
          id: 'aad1',
          category: 'Device Compatibility',
          issue: 'Flawless Operation Across Thousands of Android Models',
          impact: 'Eliminate device-specific crashes and negative Play Store reviews.',
          description: 'Comprehensive testing on virtual and physical device labs ensures universal UI stability.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our Android App Engineering Service',
      subheading: 'Native Android features engineered for performance and scalability.',
      categories: ['UI & Kotlin', 'Security & Push', 'Play Store'],
      features: [
        {
          id: 'aadf1',
          title: 'Kotlin & Jetpack Compose Development',
          category: 'UI & Kotlin',
          iconName: 'Smartphone',
          badge: 'Native Tech',
          businessBenefit: 'Smooth 60 FPS Native UX',
          description: 'Modern Android codebases written in 100% Kotlin with Clean Architecture and Coroutines.',
          points: ['Declarative Jetpack Compose UI', 'Kotlin Coroutines & Flows', 'Retrofit & Room DB'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'Android App FAQ',
      subheading: 'Answers about Kotlin development and Google Play deployment.',
      faqs: [
        {
          question: 'Do you use Kotlin for native Android development?',
          answer: 'Yes! Kotlin is our primary native language for Android, paired with Jetpack Compose for modern UI layouts.',
        },
      ],
    },
    cta: {
      badge: 'ANDROID AUDIT',
      heading: 'Need a Custom Native Android App Built?',
      description: 'Consult with our Android engineers to discuss your app requirements.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore Android Specs',
    },
  },

  // 2. iOS App Development
  'ios-app-development': {
    id: 'ios-app-development',
    serviceCategory: 'iOS App Development Services',
    metaTitle: 'iOS App Development Services | Swift & SwiftUI | Octavia Tech Solutions',
    seo: {
      h1: 'iOS App Development Services',
      metaTitle: 'iOS App Development Services | Swift & SwiftUI | Octavia Tech Solutions',
      metaDescription: 'Engineered premium native iOS applications for iPhone, iPad, and Apple Watch using Swift, SwiftUI, and Xcode. Top-rated Apple App Store compliance.',
      canonicalUrl: 'https://octaviatechnologies.com/services/mobile-app-development/ios-app-development',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Mobile App Development', href: '/services/mobile-app-development' },
        { name: 'iOS App Development', href: '/services/mobile-app-development/ios-app-development' },
      ],
    },
    hero: {
      badge: 'iOS Engineering',
      title: 'iOS App Development',
      titleHighlight: 'Services',
      description: 'Build elegant, high-conversion native iOS applications for iPhone, iPad, and Apple Watch. We write modern Swift code using SwiftUI to deliver world-class mobile experiences.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore iOS Specs',
      tags: ['Swift & SwiftUI', 'Face ID & Touch ID', 'Apple App Store Guidelines', 'Human Interface Guidelines'],
    },
    overview: {
      badge: 'WHAT IS IOS DEVELOPMENT',
      heading: 'Native iOS Engineering Explained',
      leadParagraph: 'iOS App Development focuses on crafting native applications designed exclusively for Apple devices using Swift, SwiftUI, Combine, and Apple Human Interface Guidelines.',
      secondaryParagraph: 'Octavia Tech Solutions builds iOS apps that leverage Apple’s hardware capabilities—from Secure Enclave biometrics to Metal graphics and CoreML artificial intelligence.',
      pillars: [
        { title: 'Swift & SwiftUI UI', description: 'Declarative, ultra-fast iOS layouts following Apple Human Interface Guidelines.', iconName: 'Smartphone' },
        { title: 'Secure Enclave Biometrics', description: 'Face ID and Touch ID authentication storing keys inside Apple’s dedicated security chip.', iconName: 'Lock' },
        { title: 'Apple Ecosystem Sync', description: 'Universal app support across iPhone, iPad, Mac (Mac Catalyst), and Apple Watch.', iconName: 'Zap' },
        { title: 'App Store Guidelines', description: '100% compliance with Apple App Review guidelines for guaranteed approval.', iconName: 'ShieldCheck' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Native iOS Development Matters',
      subheading: 'iOS users demand polished, high-performing apps that adhere to strict Apple design standards.',
      challenges: [
        {
          id: 'iad1',
          category: 'App Store Approval',
          issue: 'Prevent Costly Apple App Store Rejections',
          impact: 'Ensure timely marketing launches without review delays.',
          description: 'Rigorous pre-submission testing guarantees adherence to Apple App Store Safety and Privacy rules.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our iOS App Engineering Service',
      subheading: 'Premium native iOS capabilities engineered for Apple devices.',
      categories: ['Swift & SwiftUI', 'Security & Keychain', 'App Store'],
      features: [
        {
          id: 'iadf1',
          title: 'SwiftUI & Combine Application Engineering',
          category: 'Swift & SwiftUI',
          iconName: 'Smartphone',
          badge: 'Apple Tech',
          businessBenefit: 'Fluid Apple Native Experience',
          description: 'Modern native iOS codebases engineered in 100% Swift using SwiftUI and Combine reactive state.',
          points: ['SwiftUI & Combine Framework', 'CoreData & SwiftData Local Storage', 'Async/Await Swift Concurrency'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'iOS App FAQ',
      subheading: 'Answers about SwiftUI, Xcode, and Apple App Store review.',
      faqs: [
        {
          question: 'Do you use SwiftUI for native iOS app development?',
          answer: 'Yes! SwiftUI is our default framework for building responsive, modern native iOS user interfaces.',
        },
      ],
    },
    cta: {
      badge: 'IOS AUDIT',
      heading: 'Ready to Engineer a Premium Native iOS Application?',
      description: 'Consult with our iOS architects to review your application specifications.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore iOS Specs',
    },
  },

  // 3. Flutter App Development
  'flutter-app-development': {
    id: 'flutter-app-development',
    serviceCategory: 'Flutter App Development Services',
    metaTitle: 'Flutter App Development Services | Cross-Platform Solutions | Octavia Tech Solutions',
    seo: {
      h1: 'Flutter App Development Services',
      metaTitle: 'Flutter App Development Services | Cross-Platform Solutions | Octavia Tech Solutions',
      metaDescription: 'Engineered cross-platform mobile apps using Google Flutter and Dart. Build iOS and Android apps with 100% shared code and 60 FPS graphics.',
      canonicalUrl: 'https://octaviatechnologies.com/services/mobile-app-development/flutter-app-development',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Mobile App Development', href: '/services/mobile-app-development' },
        { name: 'Flutter App Development', href: '/services/mobile-app-development/flutter-app-development' },
      ],
    },
    hero: {
      badge: 'Flutter Engineering',
      title: 'Flutter App Development',
      titleHighlight: 'Services',
      description: 'Build high-performance cross-platform apps for iOS and Android from a single Dart codebase. We engineer custom Flutter widgets, state management (BLoC/Provider), and native C++ integrations.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore Flutter Specs',
      tags: ['Single Dart Codebase', 'Google Skia Graphics Engine', '60 FPS UI Rendering', 'BLoC State Management'],
    },
    overview: {
      badge: 'WHAT IS FLUTTER DEVELOPMENT',
      heading: 'Google Flutter Framework Explained',
      leadParagraph: 'Flutter is Google’s open-source UI software development kit (SDK) used to compile native apps for mobile, web, and desktop from a single Dart codebase.',
      secondaryParagraph: 'Octavia Tech Solutions leverages Flutter’s built-in Skia/Impeller graphics engine to render custom pixel-perfect UI widgets across iOS and Android with zero performance overhead.',
      pillars: [
        { title: 'Single Codebase for iOS & Android', description: 'Write once, deploy everywhere. Reduces development costs by up to 45%.', iconName: 'Smartphone' },
        { title: 'Impeller 60 FPS Engine', description: 'Direct hardware rendering with zero JavaScript bridge latency.', iconName: 'Zap' },
        { title: 'Pixel-Perfect Custom UI', description: 'Bespoke Flutter widgets that match your brand identity across all screen sizes.', iconName: 'Layout' },
        { title: 'BLoC & Riverpod State', description: 'Enterprise reactive state management ensuring rock-solid code maintainability.', iconName: 'Code2' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Flutter App Development Matters',
      subheading: 'Building separate iOS and Android apps doubles cost and delays time-to-market.',
      challenges: [
        {
          id: 'fad1',
          category: 'Development Speed',
          issue: 'Launch Cross-Platform Apps in Half the Time',
          impact: 'Cut mobile development budget by 40% without compromising native UX.',
          description: 'Single Dart codebase speeds up feature rollouts on both App Store and Google Play.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our Flutter Engineering Service',
      subheading: 'High-performance Flutter development backed by Google technology.',
      categories: ['Flutter & Dart', 'State Management', 'Native Integration'],
      features: [
        {
          id: 'fadf1',
          title: 'Cross-Platform Flutter & Dart Development',
          category: 'Flutter & Dart',
          iconName: 'Smartphone',
          badge: 'Google Tech',
          businessBenefit: '40% Cost Savings',
          description: 'End-to-end Flutter app development featuring clean architecture, BLoC state, and custom channels.',
          points: ['Dart 3 Null Safety', 'BLoC / Riverpod State', 'Native Method Channels'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'Flutter App FAQ',
      subheading: 'Answers about Dart compilation and native performance.',
      faqs: [
        {
          question: 'Does Flutter perform as fast as native Swift and Kotlin?',
          answer: 'Yes! Flutter compiles directly to ARM native machine code and uses its own Impeller rendering engine to deliver consistent 60 FPS performance.',
        },
      ],
    },
    cta: {
      badge: 'FLUTTER AUDIT',
      heading: 'Ready to Build a Fast Cross-Platform App with Flutter?',
      description: 'Discuss your mobile app project with our Flutter specialists.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore Flutter Specs',
    },
  },

  // 4. React Native Development
  'react-native-development': {
    id: 'react-native-development',
    serviceCategory: 'React Native Development Services',
    metaTitle: 'React Native Development Services | iOS & Android | Octavia Tech Solutions',
    seo: {
      h1: 'React Native Development Services',
      metaTitle: 'React Native Development Services | iOS & Android | Octavia Tech Solutions',
      metaDescription: 'Build native iOS and Android apps using React Native, TypeScript, and Expo. Shared JavaScript logic, 60 FPS native components, and fast feature deployment.',
      canonicalUrl: 'https://octaviatechnologies.com/services/mobile-app-development/react-native-development',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Mobile App Development', href: '/services/mobile-app-development' },
        { name: 'React Native Development', href: '/services/mobile-app-development/react-native-development' },
      ],
    },
    hero: {
      badge: 'React Native Architecture',
      title: 'React Native Development',
      titleHighlight: 'Services',
      description: 'Engineered cross-platform mobile apps using React and TypeScript. We build React Native applications featuring native platform components, TurboModules, Expo integration, and Redux Toolkit.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore React Native Specs',
      tags: ['TypeScript & React', 'Expo Architecture', 'New Architecture & Hermes', 'Native Modules'],
    },
    overview: {
      badge: 'WHAT IS REACT NATIVE',
      heading: 'Meta React Native Framework Explained',
      leadParagraph: 'React Native is an open-source framework created by Meta that allows software engineers to build native mobile apps for iOS and Android using React and JavaScript.',
      secondaryParagraph: 'Octavia Tech Solutions uses React Native’s New Architecture (Hermes JS Engine, Fabric Renderer, TurboModules) to deliver native UI responsiveness.',
      pillars: [
        { title: 'Shared React Logic', description: 'Re-use web React state and business logic across mobile platforms.', iconName: 'Code2' },
        { title: 'Hermes Engine Speed', description: 'High-performance JavaScript engine optimized for fast app startup times.', iconName: 'Zap' },
        { title: 'Expo Framework Ecosystem', description: 'Rapid mobile iterations, Over-The-Air (OTA) updates, and streamlined builds.', iconName: 'RefreshCw' },
        { title: 'Native TurboModules', description: 'Direct C++ access to hardware APIs without bridge serialization overhead.', iconName: 'Server' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why React Native App Development Matters',
      subheading: 'Re-using web React code on mobile speeds up enterprise product launches.',
      challenges: [
        {
          id: 'rnad1',
          category: 'Web-to-Mobile Sharing',
          issue: 'Share Code Between React Web and React Native Mobile Apps',
          impact: 'Accelerate enterprise engineering workflows and lower total cost of ownership.',
          description: 'Share TypeScript types, API calls, and Redux state stores across web and mobile repositories.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our React Native Engineering Service',
      subheading: 'Enterprise React Native development backed by Meta technology.',
      categories: ['React & Expo', 'Architecture', 'OTA Updates'],
      features: [
        {
          id: 'rnadf1',
          title: 'React Native & Expo Application Engineering',
          category: 'React & Expo',
          iconName: 'Smartphone',
          badge: 'Meta Tech',
          businessBenefit: 'Rapid Web & Mobile Alignment',
          description: 'Full-stack React Native app development featuring TypeScript, Expo EAS, and Hermes engine.',
          points: ['TypeScript & React Hooks', 'Hermes Engine Optimization', 'Over-The-Air (OTA) Code Updates'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'React Native FAQ',
      subheading: 'Answers about Hermes engine and code sharing.',
      faqs: [
        {
          question: 'Can we share code between our React web app and React Native mobile app?',
          answer: 'Yes! We structure monorepos where business logic, API endpoints, and validation schemas are shared 100% between web and mobile.',
        },
      ],
    },
    cta: {
      badge: 'REACT NATIVE AUDIT',
      heading: 'Ready to Engineer a Fast Mobile App with React Native?',
      description: 'Consult with our React Native specialists to review your application specifications.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore React Native Specs',
    },
  },

  // 5. Cross-Platform Development
  'cross-platform-development': {
    id: 'cross-platform-development',
    serviceCategory: 'Cross-Platform Development Services',
    metaTitle: 'Cross-Platform Mobile App Development | Octavia Tech Solutions',
    seo: {
      h1: 'Cross-Platform Mobile Development Services',
      metaTitle: 'Cross-Platform Mobile App Development | Octavia Tech Solutions',
      metaDescription: 'Build high-performance cross-platform mobile apps for iOS and Android. Save 40% on engineering costs with single-codebase Flutter and React Native architectures.',
      canonicalUrl: 'https://octaviatechnologies.com/services/mobile-app-development/cross-platform-development',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Mobile App Development', href: '/services/mobile-app-development' },
        { name: 'Cross-Platform Development', href: '/services/mobile-app-development/cross-platform-development' },
      ],
    },
    hero: {
      badge: 'Hybrid Mobile Solutions',
      title: 'Cross-Platform Mobile Development',
      titleHighlight: 'Services',
      description: 'Launch your mobile app on iOS and Android simultaneously. We engineer cross-platform mobile solutions using Flutter and React Native that cut launch costs by 40% while preserving native performance.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore Hybrid Strategy',
      tags: ['Simultaneous iOS & Android Launch', '40% Cost Savings', 'Shared API Logic', 'Native Platform Feel'],
    },
    overview: {
      badge: 'WHAT IS CROSS-PLATFORM',
      heading: 'Cross-Platform Engineering Strategy Explained',
      leadParagraph: 'Cross-Platform Development enables software engineers to write a single application codebase that compiles natively for both Apple iOS and Google Android platforms.',
      secondaryParagraph: 'Octavia Tech Solutions helps companies maximize ROI by deploying cross-platform architectures that eliminate duplicate iOS and Android development teams.',
      pillars: [
        { title: 'Unified Single Codebase', description: 'Single engineering effort serving both App Store and Google Play platforms.', iconName: 'Smartphone' },
        { title: '40% Budget Reduction', description: 'Lower ongoing maintenance and feature development costs across the product lifecycle.', iconName: 'Zap' },
        { title: 'Native UI Fidelity', description: 'Adheres to iOS Human Interface Guidelines and Android Material Design automatically.', iconName: 'Layout' },
        { title: 'Unified API Integration', description: 'One backend API integration serving all mobile client applications.', iconName: 'Network' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Cross-Platform Engineering Matters',
      subheading: 'Dual native development teams increase payroll costs and cause feature parity delays.',
      challenges: [
        {
          id: 'cpd1',
          category: 'Feature Parity',
          issue: 'Ensure Equal Features on iOS and Android Simultaneously',
          impact: 'Eliminate delays where one mobile platform lags behind the other.',
          description: 'Cross-platform codebases ship new features to all users on the exact same day.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our Cross-Platform Development Service',
      subheading: 'Strategic hybrid engineering tailored to your product roadmap.',
      categories: ['Cross-Platform', 'Architecture', 'App Store Setup'],
      features: [
        {
          id: 'cpdf1',
          title: 'Cross-Platform Mobile Platform Strategy',
          category: 'Cross-Platform',
          iconName: 'Smartphone',
          badge: 'High Value',
          businessBenefit: 'Faster Time-to-Market',
          description: 'Expert selection and engineering in Flutter or React Native based on your business requirements.',
          points: ['Shared Business Logic', 'Native Device Feature Access', 'Unified Analytics & Testing'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'Cross-Platform FAQ',
      subheading: 'Answers about platform selection and native feature access.',
      faqs: [
        {
          question: 'Can cross-platform apps access device features like camera, GPS, and Bluetooth?',
          answer: 'Yes! Both Flutter and React Native provide native plugin bridges for full access to GPS, camera, Bluetooth, and biometric sensors.',
        },
      ],
    },
    cta: {
      badge: 'HYBRID AUDIT',
      heading: 'Want to Launch on iOS and Android Simultaneously?',
      description: 'Schedule a cross-platform architectural consultation with our mobile team.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore Hybrid Strategy',
    },
  },

  // 6. Mobile App Maintenance
  'mobile-app-maintenance': {
    id: 'mobile-app-maintenance',
    serviceCategory: 'Mobile App Maintenance Services',
    metaTitle: 'Mobile App Maintenance & Support Services | 24/7 SLA | Octavia Tech Solutions',
    seo: {
      h1: 'Mobile App Maintenance & Support Services',
      metaTitle: 'Mobile App Maintenance & Support Services | 24/7 SLA | Octavia Tech Solutions',
      metaDescription: 'Keep iOS and Android mobile apps updated, secure, and bug-free with 24/7 technical support, iOS/Android OS version upgrades, and App Store SLA compliance.',
      canonicalUrl: 'https://octaviatechnologies.com/services/mobile-app-development/mobile-app-maintenance',
      breadcrumbs: [
        { name: 'Home', href: '/' },
        { name: 'Services', href: '/services' },
        { name: 'Mobile App Development', href: '/services/mobile-app-development' },
        { name: 'Mobile App Maintenance', href: '/services/mobile-app-development/mobile-app-maintenance' },
      ],
    },
    hero: {
      badge: 'Mobile SLA & Support',
      title: 'Mobile App Maintenance & Support',
      titleHighlight: 'Services',
      description: 'Ensure 24/7 availability, iOS/Android OS compatibility, and peak performance for your mobile applications. We deliver continuous OS updates, security patching, and bug fixes under guaranteed response SLAs.',
      primaryCtaText: 'Get FREE consultation',
      secondaryCtaText: 'Explore Support Plans',
      tags: ['iOS & Android OS Updates', 'App Store Compliance', '24/7 Crash Monitoring', 'Guaranteed Response SLA'],
    },
    overview: {
      badge: 'WHAT IS MOBILE MAINTENANCE',
      heading: 'Mobile App Maintenance & Support Explained',
      leadParagraph: 'Mobile App Maintenance encompasses continuous technical monitoring, OS version compatibility updates, crash log resolution, and security patching to keep mobile apps running smoothly.',
      secondaryParagraph: 'Apple and Google release new iOS and Android OS updates annually. Unmaintained mobile apps quickly experience crashes, broken UI layouts, and potential removal from the App Store.',
      pillars: [
        { title: 'Annual OS Compatibility', description: 'Updating mobile SDKs for new iOS and Android OS versions ahead of public releases.', iconName: 'Smartphone' },
        { title: 'Crash Analytics Monitoring', description: 'Real-time crash logging (Firebase Crashlytics / Sentry) catching bugs instantly.', iconName: 'AlertTriangle' },
        { title: 'App Store Compliance', description: 'Ensuring continuous compliance with changing Apple App Store and Google Play policies.', iconName: 'ShieldCheck' },
        { title: 'Dedicated SLA Response', description: 'Sub-15min guaranteed response for critical priority-1 mobile crashes.', iconName: 'Clock' },
      ],
    },
    challenges: {
      badge: 'WHY IT MATTERS',
      heading: 'Why Proactive Mobile App Maintenance Matters',
      subheading: 'Unmaintained mobile apps risk removal from app stores when OS versions upgrade.',
      challenges: [
        {
          id: 'mam1',
          category: 'OS Upgrades',
          issue: 'Prevent Mobile App Crashes on New iOS & Android Versions',
          impact: 'Protect App Store ratings and maintain continuous user access.',
          description: 'Proactive SDK updates ensure full compatibility when users upgrade their phone OS.',
        },
      ],
    },
    features: {
      badge: 'OUR CAPABILITIES',
      heading: 'Included in Our Mobile App Maintenance Service',
      subheading: 'Comprehensive support packages tailored for native and cross-platform apps.',
      categories: ['Crash Monitoring', 'OS Upgrades', 'App Store Policy'],
      features: [
        {
          id: 'mamf1',
          title: '24/7 Mobile Crash Monitoring & SLA Support',
          category: 'Crash Monitoring',
          iconName: 'Clock',
          badge: '24/7 SLA',
          businessBenefit: 'Zero Unhandled Mobile Crashes',
          description: 'Real-time Crashlytics logging with rapid hotfix deployments.',
          points: ['Sub-15 Min SLA Response', 'Firebase Crashlytics Integration', 'OS SDK Version Upgrades'],
        },
      ],
    },
    faq: {
      badge: 'Frequently Asked Questions',
      heading: 'Mobile App Maintenance FAQ',
      subheading: 'Answers about iOS/Android OS updates and SLAs.',
      faqs: [
        {
          question: 'What happens when Apple or Google releases a major new iOS or Android version?',
          answer: 'Under our maintenance plans, we test your app on beta OS builds 60 days before public release to ensure day-one compatibility.',
        },
      ],
    },
    cta: {
      badge: 'SUPPORT AUDIT',
      heading: 'Need Reliable Support & Maintenance for Your Mobile Apps?',
      description: 'Get a mobile app health assessment and review our support plan tiers.',
      primaryCtaText: 'CONTACT US →',
      secondaryCtaText: 'Explore Support Plans',
    },
  },
};
