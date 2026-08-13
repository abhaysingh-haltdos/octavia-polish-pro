import { createFileRoute } from "@tanstack/react-router";

import { PageMain, useSite } from "@/site/SiteChrome";
import { buildMeta, breadcrumbSchema, SITE_NAME } from "@/site/site-config";
import { ContactPage } from "@/site/pages/Contact/ContactPage";

export const Route = createFileRoute("/contact")({
  head: () => {
    const base = buildMeta({
      title: `Contact ${SITE_NAME} — Talk to an Engineering Consultant`,
      description:
        "Speak with our solution architects about your software, AI, cloud or data platform initiative. Global offices and a response within one business day.",
      path: "/contact",
    });
    return {
      ...base,
      scripts: [
        breadcrumbSchema([
          { name: "Home", path: "/" },
          { name: "Contact", path: "/contact" },
        ]),
      ],
    };
  },
  component: ContactRoute,
});

function ContactRoute() {
  const { openConsultation, navigateTo } = useSite();
  return (
    <PageMain>
      <ContactPage onOpenConsultation={openConsultation} onLinkClick={navigateTo} />
    </PageMain>
  );
}
