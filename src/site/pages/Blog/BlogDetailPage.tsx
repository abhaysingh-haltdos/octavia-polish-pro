import React, { useState, useEffect } from 'react';
import {
  Calendar,
  Clock,
  Eye,
  Share2,
  Bookmark,
  Linkedin,
  Twitter,
  Facebook,
  Copy,
  Check,
  ChevronRight,
  ChevronLeft,
  MessageSquare,
  Sparkles,
  ArrowRight,
  BookOpen,
  HelpCircle,
  ChevronDown,
  UserCheck,
  Code2,
  Brain,
  Globe,
  Cloud,
  ExternalLink,
  ShieldCheck,
  List,
} from '@/site/icons';
import { BLOG_ARTICLES } from '../../data/blogData';
import { BlogArticle } from '../../types/blog';
import { BlogSidebar } from './components/BlogSidebar';
import { BlogCommentSection } from './components/BlogCommentSection';

interface BlogDetailPageProps {
  slug: string;
  onNavigateToArticle: (slug: string) => void;
  onNavigateToCategory?: (category: string) => void;
  onOpenConsultation?: (topic?: string) => void;
  onLinkClick?: (href: string, label: string) => void;
}

export const BlogDetailPage: React.FC<BlogDetailPageProps> = ({
  slug,
  onNavigateToArticle,
  onNavigateToCategory,
  onOpenConsultation,
  onLinkClick,
}) => {
  // Find current article by slug
  const article = BLOG_ARTICLES.find((a) => a.slug === slug) || BLOG_ARTICLES[0]!;

  // Reading progress state (0 to 100%)
  const [readingProgress, setReadingProgress] = useState(0);

  // Active section ID for Table of Contents
  const [activeTocId, setActiveTocId] = useState<string>('');

  // Social share copy feedback
  const [copiedLink, setCopiedLink] = useState(false);

  // FAQ open state
  const [openFaq, setOpenFaq] = useState<number | null>(0);

  // Image zoom modal state
  const [zoomImage, setZoomImage] = useState<string | null>(null);

  // Calculate scroll reading progress & active TOC heading
  useEffect(() => {
    const handleScroll = () => {
      // 1. Reading progress
      const totalHeight = document.documentElement.scrollHeight - window.innerHeight;
      if (totalHeight > 0) {
        const currentProgress = (window.scrollY / totalHeight) * 100;
        setReadingProgress(Math.min(100, Math.max(0, currentProgress)));
      }

      // 2. Active TOC heading detection
      if (article?.content?.toc) {
        const headingElements = article.content.toc
          .map((item) => document.getElementById(item.id))
          .filter(Boolean);

        for (let i = headingElements.length - 1; i >= 0; i--) {
          const el = headingElements[i];
          if (el && el.getBoundingClientRect().top <= 140) {
            setActiveTocId(el.id);
            break;
          }
        }
      }
    };

    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, [article]);

  const handleCopyLink = () => {
    navigator.clipboard.writeText(window.location.href);
    setCopiedLink(true);
    setTimeout(() => setCopiedLink(false), 2000);
  };

  // Find previous & next articles
  const currentIndex = BLOG_ARTICLES.findIndex((a) => a.slug === article.slug);
  const prevArticle = currentIndex > 0 ? BLOG_ARTICLES[currentIndex - 1] : null;
  const nextArticle = currentIndex < BLOG_ARTICLES.length - 1 ? BLOG_ARTICLES[currentIndex + 1] : null;

  // Get related articles
  const relatedArticles = BLOG_ARTICLES.filter(
    (a) => a.slug !== article.slug && (a.category === article.category || article.content.relatedSlugs?.includes(a.slug))
  ).slice(0, 2);

  // Helper function for icon resolution
  const renderServiceIcon = (iconName: string) => {
    switch (iconName) {
      case 'UserCheck':
        return <UserCheck className="w-5 h-5 text-[#C1A972]" />;
      case 'Code2':
        return <Code2 className="w-5 h-5 text-[#C1A972]" />;
      case 'Brain':
        return <Brain className="w-5 h-5 text-[#C1A972]" />;
      case 'Globe':
        return <Globe className="w-5 h-5 text-[#C1A972]" />;
      case 'Cloud':
        return <Cloud className="w-5 h-5 text-[#C1A972]" />;
      default:
        return <BookOpen className="w-5 h-5 text-[#C1A972]" />;
    }
  };

  return (
    <div className="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans selection:bg-[#264868] selection:text-white pt-24 pb-20 relative">
      
      {/* 1. FLOATING READING PROGRESS BAR */}
      <div className="fixed top-0 left-0 right-0 h-1.5 bg-[#DDE3E9] z-50">
        <div
          className="h-full bg-gradient-to-r from-[#264868] via-[#C1A972] to-[#264868] transition-all duration-150 ease-out"
          style={{ width: `${readingProgress}%` }}
        />
      </div>

      {/* 2. SEO JSON-LD SCHEMA INJECTION */}
      <script
        type="application/ld+json"
        dangerouslySetInnerHTML={{
          __html: JSON.stringify({
            '@context': 'https://schema.org',
            '@type': 'TechArticle',
            headline: article.title,
            description: article.excerpt,
            image: article.featuredImage,
            datePublished: article.publishDate,
            author: {
              '@type': 'Person',
              name: article.author.name,
              jobTitle: article.author.role,
            },
            publisher: {
              '@type': 'Organization',
              name: 'Octavia Tech Solutions',
              url: 'https://octaviatechnologies.com',
            },
          }),
        }}
      />

      {/* 3. HERO META HEADER */}
      <section className="bg-[#153758] text-white py-12 sm:py-16 px-4 sm:px-6 lg:px-8 border-b border-[#C1A972]/30 relative overflow-hidden">
        <div className="absolute top-0 right-1/4 w-96 h-96 bg-[#C1A972]/10 blur-3xl rounded-full pointer-events-none" />

        <div className="max-w-5xl mx-auto space-y-6 relative z-10">
          
          {/* Breadcrumb Navigation */}
          <nav className="flex flex-wrap items-center gap-2 text-xs text-[#93A3B2] font-medium">
            <button
              onClick={() => onLinkClick?.('/', 'Home')}
              className="hover:text-[#C1A972] transition-colors"
            >
              Home
            </button>
            <span>/</span>
            <button
              onClick={() => onLinkClick?.('/blog', 'Blog')}
              className="hover:text-[#C1A972] transition-colors"
            >
              Blog
            </button>
            <span>/</span>
            <button
              onClick={() => onNavigateToCategory?.(article.category)}
              className="text-[#C1A972] font-bold hover:underline"
            >
              {article.category}
            </button>
          </nav>

          {/* Category Badge & Meta Stats */}
          <div className="flex flex-wrap items-center gap-3 text-xs font-semibold">
            <span className="px-3 py-1 bg-[#264868] text-[#C1A972] border border-[#C1A972]/40 rounded-full uppercase tracking-wider shadow-sm">
              {article.category}
            </span>
            <span className="text-[#93A3B2] flex items-center gap-1">
              <Calendar className="w-3.5 h-3.5 text-[#C1A972]" />
              {article.publishDate}
            </span>
          </div>

          {/* Main Title */}
          <h1 className="text-2xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight leading-tight">
            {article.title}
          </h1>

          {/* Subtitle Excerpt */}
          <p className="text-sm sm:text-lg text-[#FEFEFE] leading-relaxed max-w-4xl font-normal">
            {article.excerpt}
          </p>

          {/* Author Profile Bar & Social Share Links */}
          <div className="pt-6 border-t border-white/10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            
            <div className="flex items-center gap-3">
              <img
                src={article.author.avatar}
                alt={article.author.name}
                className="w-12 h-12 rounded-full object-cover border-2 border-[#C1A972] shadow-md"
              />
              <div>
                <h4 className="text-sm font-bold text-white flex items-center gap-2">
                  <span>{article.author.name}</span>
                  <span className="text-[10px] bg-[#C1A972]/20 text-[#C1A972] px-2 py-0.5 rounded-full border border-[#C1A972]/30">
                    Verified Author
                  </span>
                </h4>
                <p className="text-xs text-[#93A3B2]">{article.author.role}</p>
              </div>
            </div>

            {/* Social Share Sticky Bar */}
            <div className="flex items-center gap-2">
              <span className="text-xs text-[#93A3B2] font-semibold mr-1">Share:</span>
              <a
                href={`https://twitter.com/intent/tweet?text=${encodeURIComponent(article.title)}`}
                target="_blank"
                rel="noopener noreferrer"
                className="p-2 rounded-xl bg-white/10 hover:bg-[#264868] text-white transition-colors"
                title="Share on Twitter"
              >
                <Twitter className="w-4 h-4" />
              </a>
              <a
                href={`https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(window.location.href)}`}
                target="_blank"
                rel="noopener noreferrer"
                className="p-2 rounded-xl bg-white/10 hover:bg-[#264868] text-white transition-colors"
                title="Share on LinkedIn"
              >
                <Linkedin className="w-4 h-4" />
              </a>
              <a
                href={`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(window.location.href)}`}
                target="_blank"
                rel="noopener noreferrer"
                className="p-2 rounded-xl bg-white/10 hover:bg-[#264868] text-white transition-colors"
                title="Share on Facebook"
              >
                <Facebook className="w-4 h-4" />
              </a>
              <button
                onClick={handleCopyLink}
                className="p-2 rounded-xl bg-white/10 hover:bg-[#264868] text-white transition-colors relative"
                title="Copy Link"
              >
                {copiedLink ? <Check className="w-4 h-4 text-[#264868]" /> : <Copy className="w-4 h-4" />}
              </button>
            </div>

          </div>

        </div>
      </section>

      {/* 4. MAIN ARTICLE CONTAINER */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {/* HERO FEATURED IMAGE */}
        <div className="mb-12 rounded-3xl overflow-hidden border border-[#DDE3E9] shadow-xl bg-[#0F2334] group relative">
          <img
            src={article.featuredImage}
            alt={article.title}
            className="w-full h-[320px] sm:h-[480px] object-cover object-center group-hover:scale-102 transition-transform duration-700"
          />
          <div className="p-3 bg-white/90 backdrop-blur-md border-t text-[#5C6B7A] text-xs text-center font-medium">
            📸 Enterprise Architecture Blueprint: {article.title}
          </div>
        </div>

        {/* MAIN ARTICLE CONTENT (CENTERED) */}
        <div className="max-w-4xl mx-auto">
          <main className="space-y-10">
            
            {/* INLINE TABLE OF CONTENTS BOX (MOBILE & QUICK NAV) */}
            {article.content.toc && article.content.toc.length > 0 && (
              <div className="bg-white border border-[#DDE3E9] rounded-2xl p-6 shadow-sm space-y-3">
                <h3 className="text-sm font-extrabold text-[#264868] uppercase tracking-wider flex items-center gap-2">
                  <List className="w-4 h-4 text-[#C1A972]" />
                  <span>Table of Contents</span>
                </h3>
                <nav className="space-y-1 text-xs">
                  {article.content.toc.map((item) => (
                    <a
                      key={item.id}
                      href={`#${item.id}`}
                      onClick={(e) => {
                        e.preventDefault();
                        const el = document.getElementById(item.id);
                        if (el) {
                          el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }
                      }}
                      className={`block py-1.5 px-3 rounded-lg font-medium transition-colors ${
                        activeTocId === item.id
                          ? 'bg-[#264868] text-white font-bold'
                          : 'text-[#5C6B7A] hover:bg-[#FEFEFE] hover:text-[#264868]'
                      }`}
                    >
                      {item.title}
                    </a>
                  ))}
                </nav>
              </div>
            )}

            {/* INTRODUCTION PARAGRAPH */}
            <div className="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 shadow-sm text-base sm:text-lg text-[#153758] leading-relaxed font-normal border-l-4 border-l-[#264868]">
              <p>{article.content.introduction}</p>
            </div>

            {/* ARTICLE SECTIONS */}
            {article.content.sections.map((section) => (
              <section key={section.id} id={section.id} className="space-y-6 pt-2">
                
                {/* Heading */}
                <h2 className="text-2xl sm:text-3xl font-black text-[#264868] tracking-tight leading-snug border-b border-[#DDE3E9] pb-3">
                  {section.heading}
                </h2>

                {section.subheading && (
                  <h3 className="text-base sm:text-lg font-bold text-[#C1A972] uppercase tracking-wider">
                    {section.subheading}
                  </h3>
                )}

                {/* Paragraphs */}
                <div className="space-y-4 text-[#153758] text-base leading-relaxed font-normal">
                  {section.bodyParagraphs.map((para, idx) => (
                    <p key={idx}>{para}</p>
                  ))}
                </div>

                {/* Callout Box */}
                {section.callout && (
                  <div className="p-6 rounded-2xl bg-[#264868]/5 border-l-4 border-l-[#264868] space-y-2">
                    <span className="text-xs font-bold uppercase tracking-wider text-[#264868] block">
                      💡 {section.callout.title}
                    </span>
                    <p className="text-sm text-[#153758] font-medium leading-relaxed">
                      {section.callout.text}
                    </p>
                  </div>
                )}

                {/* Quote Block */}
                {section.quote && (
                  <blockquote className="p-6 rounded-2xl bg-gradient-to-r from-[#153758] to-[#264868] text-white border-l-4 border-l-[#C1A972] space-y-3 shadow-md">
                    <p className="text-base sm:text-lg font-semibold italic leading-relaxed">
                      &ldquo;{section.quote.text}&rdquo;
                    </p>
                    <footer className="text-xs text-[#C1A972] font-bold">
                      — {section.quote.author}, <span className="text-[#93A3B2] font-normal">{section.quote.role}</span>
                    </footer>
                  </blockquote>
                )}

                {/* Bullet List */}
                {section.bulletList && (
                  <ul className="space-y-2.5 pt-2">
                    {section.bulletList.map((item, idx) => (
                      <li key={idx} className="flex items-start gap-3 text-sm text-[#153758] font-medium">
                        <span className="w-2 h-2 rounded-full bg-[#C1A972] mt-2 shrink-0" />
                        <span>{item}</span>
                      </li>
                    ))}
                  </ul>
                )}

                {/* Code Block */}
                {section.codeBlock && (
                  <div className="rounded-2xl overflow-hidden bg-[#0F2334] text-[#FEFEFE] border border-[#153758] shadow-xl my-4">
                    <div className="px-4 py-2.5 bg-[#153758] border-b border-[#153758] flex items-center justify-between text-xs font-mono text-[#93A3B2]">
                      <span>{section.codeBlock.filename || 'Code Snippet'}</span>
                      <span className="uppercase text-[10px] text-[#C1A972] font-bold">{section.codeBlock.language}</span>
                    </div>
                    <pre className="p-4 text-xs font-mono overflow-x-auto leading-relaxed">
                      <code>{section.codeBlock.code}</code>
                    </pre>
                  </div>
                )}

                {/* Table Data */}
                {section.tableData && (
                  <div className="overflow-x-auto rounded-2xl border border-[#DDE3E9] shadow-sm my-4">
                    <table className="w-full text-left text-xs sm:text-sm">
                      <thead className="bg-[#264868] text-white font-bold uppercase text-[11px] tracking-wider">
                        <tr>
                          {section.tableData.headers.map((h, idx) => (
                            <th key={idx} className="p-3.5 border-b border-[#264868]">
                              {h}
                            </th>
                          ))}
                        </tr>
                      </thead>
                      <tbody className="divide-y divide-[#F3F5F7] bg-white">
                        {section.tableData.rows.map((row, rIdx) => (
                          <tr key={rIdx} className="hover:bg-[#FEFEFE]">
                            {row.map((cell, cIdx) => (
                              <td key={cIdx} className="p-3.5 font-medium text-[#153758]">
                                {cell}
                              </td>
                            ))}
                          </tr>
                        ))}
                      </tbody>
                    </table>
                  </div>
                )}

                {/* In-Content Image */}
                {section.image && (
                  <div className="rounded-2xl overflow-hidden border border-[#DDE3E9] shadow-md my-4 bg-[#0F2334]">
                    <img
                      src={section.image.url}
                      alt={section.image.alt}
                      className="w-full h-64 sm:h-80 object-cover"
                    />
                    <div className="p-3 bg-white text-xs text-[#5C6B7A] italic text-center border-t">
                      {section.image.caption}
                    </div>
                  </div>
                )}

                {/* Inline CTA Banner */}
                {section.ctaBanner && (
                  <div className="p-6 sm:p-8 rounded-3xl bg-gradient-to-r from-[#264868] to-[#153758] text-white border border-[#C1A972]/40 shadow-xl my-6 flex flex-col sm:flex-row items-center justify-between gap-6">
                    <div className="space-y-2 text-center sm:text-left">
                      <h4 className="text-xl font-black text-white">{section.ctaBanner.title}</h4>
                      <p className="text-xs sm:text-sm text-[#FEFEFE]">{section.ctaBanner.description}</p>
                    </div>
                    <button
                      onClick={() => onOpenConsultation?.(section.ctaBanner?.topic)}
                      className="px-6 py-3 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs rounded-xl shadow-lg transition-all shrink-0 flex items-center gap-2"
                    >
                      <span>{section.ctaBanner.buttonText}</span>
                      <ArrowRight className="w-4 h-4" />
                    </button>
                  </div>
                )}

              </section>
            ))}

            {/* RELATED SERVICES SECTION */}
            {article.content.relatedServices && article.content.relatedServices.length > 0 && (
              <div className="pt-8 space-y-4">
                <h3 className="text-lg font-bold text-[#264868] flex items-center gap-2">
                  <Sparkles className="w-5 h-5 text-[#C1A972]" />
                  <span>Related Enterprise Services</span>
                </h3>
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  {article.content.relatedServices.map((service, idx) => (
                    <div
                      key={idx}
                      onClick={() => onLinkClick?.(service.href, service.name)}
                      className="p-5 rounded-2xl bg-white border border-[#DDE3E9] hover:border-[#C1A972] transition-all cursor-pointer shadow-sm hover:shadow-md space-y-2 group"
                    >
                      <div className="flex items-center justify-between">
                        <div className="p-2 bg-[#264868]/10 rounded-xl">
                          {renderServiceIcon(service.iconName)}
                        </div>
                        <ArrowRight className="w-4 h-4 text-[#264868] group-hover:translate-x-1 transition-transform" />
                      </div>
                      <h4 className="text-sm font-bold text-[#264868] group-hover:text-[#C1A972] transition-colors">
                        {service.name}
                      </h4>
                      <p className="text-xs text-[#5C6B7A] line-clamp-2">
                        {service.description}
                      </p>
                    </div>
                  ))}
                </div>
              </div>
            )}

            {/* FAQ ACCORDION SECTION */}
            {article.content.faqs && article.content.faqs.length > 0 && (
              <div className="pt-6 space-y-4">
                <h3 className="text-xl font-bold text-[#264868] flex items-center gap-2">
                  <HelpCircle className="w-5 h-5 text-[#C1A972]" />
                  <span>Frequently Asked Questions</span>
                </h3>

                <div className="space-y-3">
                  {article.content.faqs.map((faq, idx) => {
                    const isOpen = openFaq === idx;
                    return (
                      <div
                        key={idx}
                        className="bg-white border border-[#DDE3E9] rounded-2xl overflow-hidden transition-all shadow-sm"
                      >
                        <button
                          onClick={() => setOpenFaq(isOpen ? null : idx)}
                          className="w-full p-4 sm:p-5 text-left flex items-center justify-between gap-4 font-bold text-sm text-[#264868]"
                        >
                          <span>{faq.question}</span>
                          <ChevronDown
                            className={`w-4 h-4 text-[#C1A972] shrink-0 transition-transform ${
                              isOpen ? 'rotate-180' : ''
                            }`}
                          />
                        </button>

                        {isOpen && (
                          <div className="px-5 pb-5 pt-0 text-xs sm:text-sm text-[#5C6B7A] leading-relaxed border-t border-[#F3F5F7]">
                            <p className="pt-3">{faq.answer}</p>
                          </div>
                        )}
                      </div>
                    );
                  })}
                </div>
              </div>
            )}

            {/* PREVIOUS / NEXT ARTICLE NAVIGATION */}
            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4">
              {prevArticle ? (
                <div
                  onClick={() => onNavigateToArticle(prevArticle.slug)}
                  className="p-5 rounded-2xl bg-white border border-[#DDE3E9] hover:border-[#C1A972] transition-all cursor-pointer shadow-sm group"
                >
                  <span className="text-[10px] font-bold text-[#93A3B2] uppercase flex items-center gap-1 mb-1">
                    <ChevronLeft className="w-3.5 h-3.5" /> Previous Article
                  </span>
                  <h5 className="text-xs font-bold text-[#264868] group-hover:text-[#C1A972] line-clamp-2">
                    {prevArticle.title}
                  </h5>
                </div>
              ) : <div />}

              {nextArticle ? (
                <div
                  onClick={() => onNavigateToArticle(nextArticle.slug)}
                  className="p-5 rounded-2xl bg-white border border-[#DDE3E9] hover:border-[#C1A972] transition-all cursor-pointer shadow-sm group text-right"
                >
                  <span className="text-[10px] font-bold text-[#93A3B2] uppercase flex items-center justify-end gap-1 mb-1">
                    Next Article <ChevronRight className="w-3.5 h-3.5" />
                  </span>
                  <h5 className="text-xs font-bold text-[#264868] group-hover:text-[#C1A972] line-clamp-2">
                    {nextArticle.title}
                  </h5>
                </div>
              ) : <div />}
            </div>

          </main>
        </div>

      </div>

    </div>
  );
};
