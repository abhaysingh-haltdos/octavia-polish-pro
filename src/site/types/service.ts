export interface ServiceHeroData {
  badge: string;
  title: string;
  titleHighlight: string;
  description: string;
  primaryCtaText: string;
  secondaryCtaText: string;
  graphicBadge?: string;
  graphicTitle?: string;
  graphicSubtext?: string;
  tags?: string[];
  metrics?: { label: string; value: string }[];
}

export interface ServiceOverviewPillar {
  title: string;
  description: string;
  iconName: string;
}

export interface ServiceOverviewData {
  badge: string;
  heading: string;
  leadParagraph: string;
  secondaryParagraph: string;
  pillars: ServiceOverviewPillar[];
}

export interface ServiceChallengeItem {
  id: string;
  issue: string;
  impact: string;
  description: string;
  category: string;
}

export interface ServiceChallengesData {
  badge: string;
  heading: string;
  subheading: string;
  challenges: ServiceChallengeItem[];
}

export interface ServiceSolutionFeature {
  title: string;
  description: string;
  tag: string;
}

export interface ServiceSolutionItem {
  title: string;
  description: string;
  points: string[];
  mockupType?: 'dashboard' | 'code' | 'pipeline' | 'analytics';
  badge?: string;
}

export interface ServiceSolutionData {
  badge: string;
  heading: string;
  description: string;
  highlights: ServiceSolutionFeature[];
  architecturalPillars: { title: string; desc: string; icon: string }[];
  solutionBlocks?: ServiceSolutionItem[];
}

export interface ServiceFeatureItem {
  id: string;
  title: string;
  description: string;
  category: string;
  iconName: string;
  badge?: string;
  businessBenefit: string;
  points: string[];
}

export interface ServiceFeaturesData {
  badge: string;
  heading: string;
  subheading: string;
  categories: string[];
  features: ServiceFeatureItem[];
}

export interface ServiceBenefitItem {
  title: string;
  description: string;
  metric: string;
  metricLabel: string;
  iconName: string;
}

export interface ServiceBenefitsData {
  badge: string;
  heading: string;
  subheading: string;
  benefits: ServiceBenefitItem[];
}

export interface ServiceProcessStep {
  stepNumber: string;
  title: string;
  phase: string;
  description: string;
  deliverables: string[];
  duration?: string;
}

export interface ServiceProcessData {
  badge: string;
  heading: string;
  subheading: string;
  steps: ServiceProcessStep[];
}

export interface ServiceTechCategory {
  category: string;
  technologies: { name: string; level?: string; icon?: string; description?: string }[];
}

export interface ServiceTechStackData {
  badge: string;
  heading: string;
  subheading: string;
  categories: ServiceTechCategory[];
}

export interface ServiceIndustryItem {
  name: string;
  description: string;
  iconName: string;
  useCase: string;
  kpi: string;
}

export interface ServiceIndustriesData {
  badge: string;
  heading: string;
  subheading: string;
  industries: ServiceIndustryItem[];
}

export interface ServiceCaseStudyItem {
  id: string;
  industry: string;
  clientName?: string;
  title: string;
  challenge: string;
  solution: string;
  techTags: string[];
  businessImpact: string;
  kpiHighlight: string;
}

export interface ServiceCaseStudiesData {
  badge: string;
  heading: string;
  subheading: string;
  caseStudies: ServiceCaseStudyItem[];
}

export interface ServiceOutcomeItem {
  metric: string;
  label: string;
  description: string;
  trend: 'up' | 'down';
}

export interface ServiceOutcomesData {
  badge: string;
  heading: string;
  subheading: string;
  outcomes: ServiceOutcomeItem[];
}

export interface ServiceComparisonCriterion {
  feature: string;
  octavia: string;
  traditionalAgency: string;
  freelancers: string;
  inHouseTeam: string;
}

export interface ServiceComparisonData {
  badge: string;
  heading: string;
  subheading: string;
  criteria: ServiceComparisonCriterion[];
}

export interface ServiceTestimonialItem {
  name: string;
  role: string;
  company: string;
  avatar: string;
  review: string;
  rating: number;
}

export interface ServiceTestimonialsData {
  badge: string;
  heading: string;
  subheading: string;
  testimonials: ServiceTestimonialItem[];
}

export interface ServiceFaqItem {
  question: string;
  answer: string;
  category?: string;
}

export interface ServiceFaqData {
  badge: string;
  heading: string;
  subheading: string;
  faqs: ServiceFaqItem[];
}

export interface ServiceRelatedLink {
  title: string;
  category: string;
  href: string;
  description: string;
}

export interface ServiceRelatedData {
  badge: string;
  heading: string;
  subheading: string;
  links: ServiceRelatedLink[];
}

export interface ServiceCtaData {
  badge: string;
  heading: string;
  description: string;
  primaryCtaText: string;
  secondaryCtaText: string;
  trustNotes: string[];
}

export interface ServiceSeoData {
  h1: string;
  metaTitle: string;
  metaDescription: string;
  canonicalUrl: string;
  breadcrumbs: { name: string; href: string }[];
}

export interface ServicePageData {
  id: string;
  serviceCategory: string;
  metaTitle: string;
  seo?: ServiceSeoData;
  hero: ServiceHeroData;
  overview: ServiceOverviewData;
  challenges: ServiceChallengesData;
  solution: ServiceSolutionData;
  whyChooseUs: ServiceBenefitsData;
  features: ServiceFeaturesData;
  process: ServiceProcessData;
  techStack: ServiceTechStackData;
  industries: ServiceIndustriesData;
  caseStudies: ServiceCaseStudiesData;
  outcomes: ServiceOutcomesData;
  comparison: ServiceComparisonData;
  testimonials: ServiceTestimonialsData;
  faq: ServiceFaqData;
  relatedServices: ServiceRelatedData;
  cta: ServiceCtaData;
}
