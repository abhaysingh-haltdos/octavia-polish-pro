import { createFileRoute } from "@tanstack/react-router";

import { PageMain } from "@/site/SiteChrome";
import { breadcrumbSchema, buildMeta, faqSchema, serviceSchema } from "@/site/site-config";
import { getServicePageData } from "@/site/data/serviceCategoriesData";
import { SharedServiceDetailPage } from "@/site/pages/Services/SharedServiceDetailPage";

export const Route = createFileRoute("/services/performance-marketing")({
  head: () => {
    const data = getServicePageData("performance-marketing");
    const title = data.seo?.metaTitle || data.metaTitle;
    const description = data.seo?.metaDescription ?? "";
    const path = "/services/performance-marketing";
    const base = buildMeta({ title, description, path });
    return {
      ...base,
      scripts: [
        serviceSchema({ name: data.serviceCategory, description, path }),
        breadcrumbSchema([
          { name: "Home", path: "/" },
          { name: "Services", path: "/services" },
          { name: "Performance Marketing", path },
        ]),
        ...(data.faq?.faqs?.length
          ? [faqSchema(data.faq.faqs.map((f) => ({ question: f.question, answer: f.answer })))]
          : []),
      ],
    };
  },
  component: PerformanceMarketingServicePage,
});

function PerformanceMarketingServicePage() {
  return (
    <PageMain>
      <SharedServiceDetailPage pathOrSlug="performance-marketing" />
    </PageMain>
  );
}
