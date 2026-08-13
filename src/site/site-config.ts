export const SITE_URL = "https://octaviatechnologies.com";
export const SITE_NAME = "Octavia Tech Solutions";
export const SITE_TAGLINE = "Enterprise Software, AI & Cloud Engineering";
export const SITE_DESCRIPTION =
  "Octavia Tech Solutions engineers enterprise software, AI, cloud and data platforms for regulated, high-growth organisations worldwide.";

/** Absolute URL helper for canonical / og:url tags. */
export function absoluteUrl(path: string): string {
  if (!path || path === "/") return `${SITE_URL}/`;
  return `${SITE_URL}${path.startsWith("/") ? path : `/${path}`}`;
}

interface MetaInput {
  title: string;
  description: string;
  path: string;
  type?: "website" | "article";
  image?: string;
  publishedTime?: string;
  noindex?: boolean;
}

/** Builds a complete, self-referencing head() payload for a route. */
export function buildMeta({
  title,
  description,
  path,
  type = "website",
  image,
  publishedTime,
  noindex,
}: MetaInput) {
  const url = absoluteUrl(path);
  const meta: Array<Record<string, string>> = [
    { title },
    { name: "description", content: description },
    { property: "og:title", content: title },
    { property: "og:description", content: description },
    { property: "og:type", content: type },
    { property: "og:url", content: url },
    { property: "og:site_name", content: SITE_NAME },
    { name: "twitter:card", content: "summary_large_image" },
    { name: "twitter:title", content: title },
    { name: "twitter:description", content: description },
  ];

  if (image) {
    meta.push({ property: "og:image", content: image });
    meta.push({ name: "twitter:image", content: image });
  }
  if (publishedTime) {
    meta.push({ property: "article:published_time", content: publishedTime });
  }
  if (noindex) {
    meta.push({ name: "robots", content: "noindex, follow" });
  }

  return {
    meta,
    links: [{ rel: "canonical", href: url }],
  };
}

export interface Crumb {
  name: string;
  path: string;
}

/** BreadcrumbList JSON-LD for nested routes. */
export function breadcrumbSchema(crumbs: Crumb[]) {
  return {
    type: "application/ld+json",
    children: JSON.stringify({
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      itemListElement: crumbs.map((crumb, index) => ({
        "@type": "ListItem",
        position: index + 1,
        name: crumb.name,
        item: absoluteUrl(crumb.path),
      })),
    }),
  };
}

/** FAQPage JSON-LD. */
export function faqSchema(faqs: Array<{ question: string; answer: string }>) {
  return {
    type: "application/ld+json",
    children: JSON.stringify({
      "@context": "https://schema.org",
      "@type": "FAQPage",
      mainEntity: faqs.map((faq) => ({
        "@type": "Question",
        name: faq.question,
        acceptedAnswer: { "@type": "Answer", text: faq.answer },
      })),
    }),
  };
}

/** Service JSON-LD. */
export function serviceSchema({
  name,
  description,
  path,
}: {
  name: string;
  description: string;
  path: string;
}) {
  return {
    type: "application/ld+json",
    children: JSON.stringify({
      "@context": "https://schema.org",
      "@type": "Service",
      name,
      description,
      url: absoluteUrl(path),
      provider: {
        "@type": "Organization",
        name: SITE_NAME,
        url: SITE_URL,
      },
      areaServed: "Worldwide",
    }),
  };
}

/** Article JSON-LD for blog posts. */
export function articleSchema({
  headline,
  description,
  path,
  image,
  author,
  datePublished,
}: {
  headline: string;
  description: string;
  path: string;
  image?: string;
  author?: string;
  datePublished?: string;
}) {
  return {
    type: "application/ld+json",
    children: JSON.stringify({
      "@context": "https://schema.org",
      "@type": "Article",
      headline,
      description,
      url: absoluteUrl(path),
      ...(image ? { image } : {}),
      ...(datePublished ? { datePublished } : {}),
      author: { "@type": author ? "Person" : "Organization", name: author ?? SITE_NAME },
      publisher: { "@type": "Organization", name: SITE_NAME, url: SITE_URL },
      mainEntityOfPage: absoluteUrl(path),
    }),
  };
}
