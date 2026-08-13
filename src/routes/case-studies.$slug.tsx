import { createFileRoute, notFound } from "@tanstack/react-router";

import { PageMain, useSite } from "@/site/SiteChrome";
import { breadcrumbSchema, buildMeta, SITE_NAME } from "@/site/site-config";
import { CASE_STUDIES } from "@/site/data/caseStudiesData";
import { CaseStudyDetailPage } from "@/site/pages/CaseStudies/CaseStudyDetailPage";

export const Route = createFileRoute("/case-studies/$slug")({
  loader: ({ params }) => {
    const caseStudy = CASE_STUDIES.find((cs) => cs.slug === params.slug);
    if (!caseStudy) throw notFound();
    return { caseStudy };
  },
  head: ({ params, loaderData }) => {
    if (!loaderData) {
      return {
        meta: [{ title: `Case study unavailable | ${SITE_NAME}` }, { name: "robots", content: "noindex" }],
      };
    }
    const { caseStudy } = loaderData;
    const path = `/case-studies/${params.slug}`;
    const base = buildMeta({
      title: caseStudy.seo?.metaTitle || `${caseStudy.title} | ${SITE_NAME}`,
      description: caseStudy.seo?.metaDescription || caseStudy.subtitle,
      path,
      type: "article",
      ...(caseStudy.heroBannerImage ? { image: caseStudy.heroBannerImage } : {}),
    });
    return {
      ...base,
      scripts: [
        breadcrumbSchema([
          { name: "Home", path: "/" },
          { name: "Case Studies", path: "/case-studies" },
          { name: caseStudy.title, path },
        ]),
      ],
    };
  },
  component: CaseStudyDetailRoute,
});

function CaseStudyDetailRoute() {
  const { slug } = Route.useParams();
  const { openConsultation, navigateTo } = useSite();

  return (
    <PageMain>
      <CaseStudyDetailPage
        slug={slug}
        onNavigateToCaseStudy={(next: string) => navigateTo(`/case-studies/${next}`)}
        onOpenConsultation={openConsultation}
        onLinkClick={navigateTo}
      />
    </PageMain>
  );
}
