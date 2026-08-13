import { createFileRoute } from "@tanstack/react-router";

import { PageMain, useSite } from "@/site/SiteChrome";
import { breadcrumbSchema, buildMeta, SITE_NAME } from "@/site/site-config";
import { IndustriesListingPage } from "@/site/pages/Industries/IndustriesListingPage";

export const Route = createFileRoute("/industries/")({
  head: () => {
    const base = buildMeta({
      title: `Industries We Serve | ${SITE_NAME}`,
      description:
        "Domain-specific engineering for telecom, fintech, healthcare, logistics, retail and public sector organisations, built around each industry's compliance needs.",
      path: "/industries",
    });
    return {
      ...base,
      scripts: [
        breadcrumbSchema([
          { name: "Home", path: "/" },
          { name: "Industries", path: "/industries" },
        ]),
      ],
    };
  },
  component: IndustriesIndexRoute,
});

function IndustriesIndexRoute() {
  const { openConsultation, navigateTo } = useSite();
  return (
    <PageMain>
      <IndustriesListingPage
        onIndustryClick={(slug: string) => navigateTo(`/industries/${slug}`)}
        onOpenConsultation={openConsultation}
        onLinkClick={navigateTo}
      />
    </PageMain>
  );
}
