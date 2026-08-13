import { SITE_NAV_ITEMS } from "./navigationData";
import { BLOG_ARTICLES } from "./blogData";
import { CASE_STUDIES } from "./caseStudiesData";
import { INDUSTRY_SLUGS } from "./industryData";
import { SOLUTION_SLUGS } from "./solutionData";

/** Every internal path reachable from the mega menu / primary navigation. */
export function collectNavPaths(): string[] {
  const paths = new Set<string>();

  const add = (href?: string) => {
    if (!href) return;
    if (!href.startsWith("/")) return;
    if (href === "/") return;
    paths.add(href.replace(/\/+$/, ""));
  };

  for (const item of SITE_NAV_ITEMS) {
    add(item.href);
    for (const column of item.megaConfig?.columns ?? []) {
      for (const link of column.items) add(link.href);
    }
    add(item.megaConfig?.cta.primaryBtnHref);
    add(item.megaConfig?.cta.secondaryBtnHref);
  }

  return [...paths];
}

/** Full list of indexable paths for the sitemap. */
export function collectSitePaths(): string[] {
  const paths = new Set<string>(["/", "/services", "/solutions", "/industries", "/blog", "/case-studies", "/contact"]);

  for (const path of collectNavPaths()) paths.add(path);
  for (const article of BLOG_ARTICLES) paths.add(`/blog/${article.slug}`);
  for (const study of CASE_STUDIES) paths.add(`/case-studies/${study.slug}`);
  for (const slug of INDUSTRY_SLUGS) paths.add(`/industries/${slug}`);
  for (const slug of SOLUTION_SLUGS) paths.add(`/solutions/${slug}`);

  return [...paths].sort();
}
