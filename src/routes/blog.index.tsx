import { createFileRoute } from "@tanstack/react-router";

import { PageMain, useSite } from "@/site/SiteChrome";
import { buildMeta, breadcrumbSchema, SITE_NAME } from "@/site/site-config";
import { BlogListingPage } from "@/site/pages/Blog/BlogListingPage";

export const Route = createFileRoute("/blog/")({
  head: () => {
    const base = buildMeta({
      title: `Insights & Engineering Blog | ${SITE_NAME}`,
      description:
        "Practical engineering insights on AI, cloud architecture, data platforms and enterprise software delivery from the Octavia Tech Solutions team.",
      path: "/blog",
    });
    return {
      ...base,
      scripts: [
        breadcrumbSchema([
          { name: "Home", path: "/" },
          { name: "Blog", path: "/blog" },
        ]),
      ],
    };
  },
  component: BlogIndexRoute,
});

function BlogIndexRoute() {
  const { openConsultation, navigateTo } = useSite();
  return (
    <PageMain>
      <BlogListingPage
        onArticleClick={(slug: string) => navigateTo(`/blog/${slug}`)}
        onOpenConsultation={openConsultation}
        onLinkClick={navigateTo}
      />
    </PageMain>
  );
}
