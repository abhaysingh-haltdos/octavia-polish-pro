import { createFileRoute, notFound } from "@tanstack/react-router";

import { PageMain, useSite } from "@/site/SiteChrome";
import { breadcrumbSchema, buildMeta, faqSchema, serviceSchema, SITE_NAME } from "@/site/site-config";
import { SOLUTION_DATA } from "@/site/data/solutionData";
import { SolutionDetailPage } from "@/site/pages/Solutions/SolutionDetailPage";

export const Route = createFileRoute("/solutions/$slug")({
  loader: ({ params }) => {
    const solution = SOLUTION_DATA[params.slug];
    if (!solution) throw notFound();
    return { solution };
  },
  head: ({ params, loaderData }) => {
    if (!loaderData) {
      return {
        meta: [{ title: `Solution unavailable | ${SITE_NAME}` }, { name: "robots", content: "noindex" }],
      };
    }
    const { solution } = loaderData;
    const path = `/solutions/${params.slug}`;
    const title = `${solution.title} | ${SITE_NAME}`;
    const description = solution.metaDescription || solution.tagline;
    const base = buildMeta({ title, description, path });
    return {
      ...base,
      scripts: [
        serviceSchema({ name: solution.title, description, path }),
        breadcrumbSchema([
          { name: "Home", path: "/" },
          { name: "Solutions", path: "/solutions" },
          { name: solution.title, path },
        ]),
        ...(solution.faqs?.length
          ? [faqSchema(solution.faqs.map((f) => ({ question: f.question, answer: f.answer })))]
          : []),
      ],
    };
  },
  component: SolutionDetailRoute,
});

function SolutionDetailRoute() {
  const { slug } = Route.useParams();
  const { openConsultation, navigateTo } = useSite();

  return (
    <PageMain>
      <SolutionDetailPage
        slug={slug}
        onNavigateToSolution={(next: string) => navigateTo(`/solutions/${next}`)}
        onOpenConsultation={openConsultation}
        onLinkClick={navigateTo}
      />
    </PageMain>
  );
}
