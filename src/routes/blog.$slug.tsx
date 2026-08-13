import { createFileRoute, notFound } from "@tanstack/react-router";

import { PageMain, useSite } from "@/site/SiteChrome";
import { articleSchema, breadcrumbSchema, buildMeta, faqSchema, SITE_NAME } from "@/site/site-config";
import { BLOG_ARTICLES } from "@/site/data/blogData";
import { BlogDetailPage } from "@/site/pages/Blog/BlogDetailPage";

export const Route = createFileRoute("/blog/$slug")({
  loader: ({ params }) => {
    const article = BLOG_ARTICLES.find((a) => a.slug === params.slug);
    if (!article) throw notFound();
    return { article };
  },
  head: ({ params, loaderData }) => {
    if (!loaderData) {
      return {
        meta: [{ title: `Article unavailable | ${SITE_NAME}` }, { name: "robots", content: "noindex" }],
      };
    }
    const { article } = loaderData;
    const path = `/blog/${params.slug}`;
    const base = buildMeta({
      title: article.seo.metaTitle || `${article.title} | ${SITE_NAME}`,
      description: article.seo.metaDescription || article.excerpt,
      path,
      type: "article",
      image: article.featuredImage,
      publishedTime: article.publishDate,
    });
    return {
      ...base,
      scripts: [
        articleSchema({
          headline: article.title,
          description: article.excerpt,
          path,
          image: article.featuredImage,
          author: article.author.name,
          datePublished: article.publishDate,
        }),
        breadcrumbSchema([
          { name: "Home", path: "/" },
          { name: "Blog", path: "/blog" },
          { name: article.title, path },
        ]),
        ...(article.content.faqs?.length
          ? [faqSchema(article.content.faqs.map((f) => ({ question: f.question, answer: f.answer })))]
          : []),
      ],
    };
  },
  component: BlogDetailRoute,
});

function BlogDetailRoute() {
  const { slug } = Route.useParams();
  const { openConsultation, navigateTo } = useSite();

  return (
    <PageMain>
      <BlogDetailPage
        slug={slug}
        onNavigateToArticle={(next: string) => navigateTo(`/blog/${next}`)}
        onNavigateToCategory={() => navigateTo("/blog")}
        onOpenConsultation={openConsultation}
        onLinkClick={navigateTo}
      />
    </PageMain>
  );
}
