import { createFileRoute, notFound } from "@tanstack/react-router";

import { PageMain, useSite } from "@/site/SiteChrome";
import { breadcrumbSchema, buildMeta, faqSchema, serviceSchema, SITE_NAME } from "@/site/site-config";
import { INDUSTRY_DATA } from "@/site/data/industryData";
import { IndustryDetailPage } from "@/site/pages/Industries/IndustryDetailPage";

export const Route = createFileRoute("/industries/$slug")({
  loader: ({ params }) => {
    const industry = INDUSTRY_DATA[params.slug];
    if (!industry) throw notFound();
    return { industry };
  },
  head: ({ params, loaderData }) => {
    if (!loaderData) {
      return {
        meta: [{ title: `Industry unavailable | ${SITE_NAME}` }, { name: "robots", content: "noindex" }],
      };
    }
    const { industry } = loaderData;
    const path = `/industries/${params.slug}`;
    const title = `${industry.title} | ${SITE_NAME}`;
    const description = industry.metaDescription || industry.tagline;
    const base = buildMeta({ title, description, path });
    return {
      ...base,
      scripts: [
        serviceSchema({ name: industry.title, description, path }),
        breadcrumbSchema([
          { name: "Home", path: "/" },
          { name: "Industries", path: "/industries" },
          { name: industry.title, path },
        ]),
        ...(industry.faqs?.length
          ? [faqSchema(industry.faqs.map((f) => ({ question: f.question, answer: f.answer })))]
          : []),
      ],
    };
  },
  component: IndustryDetailRoute,
});

function IndustryDetailRoute() {
  const { slug } = Route.useParams();
  const { openConsultation, navigateTo } = useSite();

  return (
    <PageMain>
      <IndustryDetailPage
        slug={slug}
        onNavigateToIndustry={(next: string) => navigateTo(`/industries/${next}`)}
        onOpenConsultation={openConsultation}
        onLinkClick={navigateTo}
      />
    </PageMain>
  );
}
