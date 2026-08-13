import { createFileRoute } from "@tanstack/react-router";

import { PageMain, useSite } from "@/site/SiteChrome";
import { breadcrumbSchema, buildMeta, SITE_NAME } from "@/site/site-config";
import { SolutionsListingPage } from "@/site/pages/Solutions/SolutionsListingPage";

export const Route = createFileRoute("/solutions/")({
  head: () => {
    const base = buildMeta({
      title: `Enterprise Solutions & Platforms | ${SITE_NAME}`,
      description:
        "Ready-to-extend platform solutions — real-time communications, automation, analytics and integration — engineered for enterprise scale and compliance.",
      path: "/solutions",
    });
    return {
      ...base,
      scripts: [
        breadcrumbSchema([
          { name: "Home", path: "/" },
          { name: "Solutions", path: "/solutions" },
        ]),
      ],
    };
  },
  component: SolutionsIndexRoute,
});

function SolutionsIndexRoute() {
  const { openConsultation, navigateTo } = useSite();
  return (
    <PageMain>
      <SolutionsListingPage
        onSolutionClick={(slug: string) => navigateTo(`/solutions/${slug}`)}
        onOpenConsultation={openConsultation}
        onLinkClick={navigateTo}
      />
    </PageMain>
  );
}
