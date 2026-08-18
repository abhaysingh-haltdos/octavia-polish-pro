import { createFileRoute } from "@tanstack/react-router";
import { PageMain, useSite } from "@/site/SiteChrome";
import { buildMeta, breadcrumbSchema, SITE_NAME } from "@/site/site-config";
import { AboutPage } from "@/site/pages/About/AboutPage";

export const Route = createFileRoute("/company/about")({
  head: () => {
    const base = buildMeta({
      title: `About Us — ${SITE_NAME}`,
      description:
        "Learn about Octavia Tech Solutions, our global technology presence, senior software engineering teams, AI solutions, and enterprise cloud capabilities.",
      path: "/company/about",
    });
    return {
      ...base,
      scripts: [
        breadcrumbSchema([
          { name: "Home", path: "/" },
          { name: "About Us", path: "/company/about" },
        ]),
      ],
    };
  },
  component: CompanyAboutRoute,
});

function CompanyAboutRoute() {
  const { openConsultation, navigateTo } = useSite();
  return (
    <PageMain>
      <AboutPage onOpenConsultation={openConsultation} onLinkClick={navigateTo} />
    </PageMain>
  );
}
