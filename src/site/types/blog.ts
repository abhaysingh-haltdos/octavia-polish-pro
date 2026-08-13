export interface BlogAuthor {
  name: string;
  role: string;
  avatar: string;
  bio: string;
  linkedin?: string;
  twitter?: string;
}

export interface CalloutBox {
  type: 'tip' | 'warning' | 'key-takeaway' | 'stat';
  title: string;
  text: string;
}

export interface QuoteBlock {
  text: string;
  author: string;
  role: string;
}

export interface CodeBlock {
  language: string;
  filename?: string;
  code: string;
}

export interface TableData {
  headers: string[];
  rows: string[][];
}

export interface ContentImage {
  url: string;
  caption: string;
  alt: string;
}

export interface InlineCTABanner {
  title: string;
  description: string;
  buttonText: string;
  topic: string;
}

export interface ArticleSection {
  id: string;
  heading: string;
  subheading?: string;
  bodyParagraphs: string[];
  callout?: CalloutBox;
  quote?: QuoteBlock;
  codeBlock?: CodeBlock;
  bulletList?: string[];
  numberedList?: string[];
  tableData?: TableData;
  image?: ContentImage;
  ctaBanner?: InlineCTABanner;
}

export interface ArticleFAQ {
  question: string;
  answer: string;
}

export interface RelatedServiceLink {
  name: string;
  href: string;
  description: string;
  iconName: string;
}

export interface BlogArticle {
  id: string;
  slug: string;
  title: string;
  excerpt: string;
  category: string;
  tags: string[];
  featuredImage: string;
  publishDate: string;
  readTime: string;
  isFeatured?: boolean;
  isTrending?: boolean;
  isPopular?: boolean;
  views: number;
  author: BlogAuthor;
  seo: {
    metaTitle: string;
    metaDescription: string;
    keywords: string[];
  };
  content: {
    introduction: string;
    toc: Array<{ id: string; title: string; level: number }>;
    sections: ArticleSection[];
    faqs?: ArticleFAQ[];
    relatedServices?: RelatedServiceLink[];
    relatedSlugs?: string[];
  };
}

export interface BlogComment {
  id: string;
  authorName: string;
  authorEmail?: string;
  avatar?: string;
  date: string;
  content: string;
  likes: number;
}
