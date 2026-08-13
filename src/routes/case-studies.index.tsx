import { createFileRoute } from "@tanstack/react-router";

import { PageMain, useSite } from "@/site/SiteChrome";
import { breadcrumbSchema, buildMeta, SITE_NAME } from "@/site/site-config";
import { CaseStudiesListingPage } from "@/site/pages/CaseStudies/CaseStudiesListingPage";

export const Route = createFileRoute("/case-studies/")({
  head: () => {
    const base = buildMeta({
      title: `Client Case Studies & Results | ${SITE_NAME}`,
      description:
        "Measured outcomes from enterprise software, AI and cloud engagements: delivery timelines, cost savings and performance gains across regulated industries.",
      path: "/case-studies",
    });
    return {
      ...base,
      scripts: [
        breadcrumbSchema([
          { name: "Home", path: "/" },
          { name: "Case Studies", path: "/case-studies" },
        ]),
      ],
    };
  },
  component: CaseStudiesIndexRoute,
});

function CaseStudiesIndexRoute() {
  const { openConsultation, navigateTo } = useSite();
  return (
    <PageMain>
      <CaseStudiesListingPage
        onCaseStudyClick={(slug: string) => navigateTo(`/case-studies/${slug}`)}
        onOpenConsultation={openConsultation}
        onLinkClick={navigateTo}
      />
    </PageMain>
  );
}
