import { createFileRoute } from "@tanstack/react-router";
import { PageMain, useSite } from "@/site/SiteChrome";
import { buildMeta, breadcrumbSchema, SITE_NAME } from "@/site/site-config";
import { AboutPage } from "@/site/pages/About/AboutPage";

export const Route = createFileRoute("/about-us")({
  head: () => {
    const base = buildMeta({
      title: `About Us — ${SITE_NAME}`,
      description:
        "Learn about Octavia Tech Solutions, our global technology presence, senior software engineering teams, AI solutions, and enterprise cloud capabilities.",
      path: "/about-us",
    });
    return {
      ...base,
      scripts: [
        breadcrumbSchema([
          { name: "Home", path: "/" },
          { name: "About Us", path: "/about-us" },
        ]),
      ],
    };
  },
  component: AboutUsRoute,
});

function AboutUsRoute() {
  const { openConsultation, navigateTo } = useSite();
  return (
    <PageMain>
      <AboutPage onOpenConsultation={openConsultation} onLinkClick={navigateTo} />
    </PageMain>
  );
}
