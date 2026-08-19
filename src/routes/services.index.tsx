import { createFileRoute } from "@tanstack/react-router";

import { PageMain, useSite } from "@/site/SiteChrome";
import { breadcrumbSchema, buildMeta, serviceSchema } from "@/site/site-config";
import { getServicePageData } from "@/site/data/serviceCategoriesData";
import { SharedServiceDetailPage } from "@/site/pages/Services/SharedServiceDetailPage";

export const Route = createFileRoute("/services/")({
  head: () => {
    const data = getServicePageData("/services");
    const title = data.seo?.metaTitle || data.metaTitle;
    const description = data.seo?.metaDescription ?? "";
    const base = buildMeta({ title, description, path: "/services" });
    return {
      ...base,
      scripts: [
        serviceSchema({ name: data.serviceCategory, description, path: "/services" }),
        breadcrumbSchema([
          { name: "Home", path: "/" },
          { name: "Services", path: "/services" },
        ]),
      ],
    };
  },
  component: ServicesIndexRoute,
});

function ServicesIndexRoute() {
  return (
    <PageMain>
      <SharedServiceDetailPage pathOrSlug="web-development" />
    </PageMain>
  );
}
