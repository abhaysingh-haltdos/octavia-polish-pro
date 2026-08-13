import { createFileRoute } from "@tanstack/react-router";

import { PageMain, useSite } from "@/site/SiteChrome";
import { buildMeta, SITE_DESCRIPTION, SITE_NAME, SITE_TAGLINE } from "@/site/site-config";

import { HeroSection } from "@/site/pages/Home/HeroSection";
import { TrustBar } from "@/site/pages/Home/TrustBar";
import { StatsSection } from "@/site/pages/Home/StatsSection";
import { ServicesSection } from "@/site/pages/Services/ServicesSection";
import { SolutionsSection } from "@/site/pages/Solutions/SolutionsSection";
import { IndustriesSection } from "@/site/pages/Industries/IndustriesSection";
import { WhyUsSection } from "@/site/pages/Home/WhyUsSection";
import { CaseStudiesSection } from "@/site/pages/CaseStudies/CaseStudiesSection";
import { TechStackSection } from "@/site/pages/Home/TechStackSection";
import { TestimonialsSection } from "@/site/pages/Home/TestimonialsSection";
import { InsightsSection } from "@/site/pages/Resources/InsightsSection";
import { GlobalPresenceSection } from "@/site/pages/About/GlobalPresenceSection";
import { CtaContactSection } from "@/site/pages/Contact/CtaContactSection";

export const Route = createFileRoute("/")({
  head: () =>
    buildMeta({
      title: `${SITE_NAME} — ${SITE_TAGLINE}`,
      description: SITE_DESCRIPTION,
      path: "/",
    }),
  component: Index,
});

function Index() {
  const { openConsultation, navigateTo } = useSite();

  return (
    <>
      <HeroSection onOpenConsultation={() => openConsultation("Get a Free Consultation")} />

      <PageMain>
        <h1 className="sr-only">
          {SITE_NAME} — {SITE_TAGLINE}
        </h1>
        <TrustBar />
        <StatsSection />
        <ServicesSection onOpenConsultation={openConsultation} />
        <SolutionsSection onOpenConsultation={openConsultation} onLinkClick={navigateTo} />
        <IndustriesSection onOpenConsultation={openConsultation} onLinkClick={navigateTo} />
        <WhyUsSection />
        <CaseStudiesSection onOpenConsultation={openConsultation} />
        <TechStackSection />
        <TestimonialsSection />
        <InsightsSection onOpenConsultation={openConsultation} />
        <GlobalPresenceSection />
        <CtaContactSection onOpenConsultation={openConsultation} />
      </PageMain>
    </>
  );
}
