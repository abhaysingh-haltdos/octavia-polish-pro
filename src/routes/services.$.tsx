import { createFileRoute } from "@tanstack/react-router";

import { PageMain } from "@/site/SiteChrome";
import { breadcrumbSchema, buildMeta, faqSchema, serviceSchema } from "@/site/site-config";
import { getServicePageData } from "@/site/data/serviceCategoriesData";
import { SharedServiceDetailPage } from "@/site/pages/Services/SharedServiceDetailPage";

function titleize(segment: string) {
  return segment
    .split("-")
    .filter(Boolean)
    .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
    .join(" ");
}

export const Route = createFileRoute("/services/$")({
  head: ({ params }) => {
    const splat = params._splat ?? "";
    const path = `/services/${splat}`;
    const data = getServicePageData(path);
    const title = data.seo?.metaTitle || data.metaTitle;
    const description = data.seo?.metaDescription ?? "";
    const segments = splat.split("/").filter(Boolean);

    const crumbs = [
      { name: "Home", path: "/" },
      { name: "Services", path: "/services" },
      ...segments.map((segment, index) => ({
        name: titleize(segment),
        path: `/services/${segments.slice(0, index + 1).join("/")}`,
      })),
    ];

    const base = buildMeta({ title, description, path });
    return {
      ...base,
      scripts: [
        serviceSchema({ name: data.serviceCategory, description, path }),
        breadcrumbSchema(crumbs),
        ...(data.faq?.faqs?.length
          ? [faqSchema(data.faq.faqs.map((f) => ({ question: f.question, answer: f.answer })))]
          : []),
      ],
    };
  },
  component: ServiceDetailRoute,
});

function ServiceDetailRoute() {
  const { _splat } = Route.useParams();

  return (
    <PageMain>
      <SharedServiceDetailPage
        pathOrSlug={_splat ?? ""}
      />
    </PageMain>
  );
}
