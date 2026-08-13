import { createFileRoute } from "@tanstack/react-router";
import type {} from "@tanstack/react-start";

import { SITE_URL } from "@/site/site-config";
import { collectSitePaths } from "@/site/data/sitePaths";

function priorityFor(path: string): string {
  if (path === "/") return "1.0";
  const depth = path.split("/").filter(Boolean).length;
  if (depth === 1) return "0.9";
  if (depth === 2) return "0.7";
  return "0.6";
}

function changefreqFor(path: string): string {
  if (path === "/" || path === "/blog") return "weekly";
  return "monthly";
}

export const Route = createFileRoute("/sitemap.xml")({
  server: {
    handlers: {
      GET: async () => {
        const urls = collectSitePaths().map((path) =>
          [
            "  <url>",
            `    <loc>${SITE_URL}${path === "/" ? "/" : path}</loc>`,
            `    <changefreq>${changefreqFor(path)}</changefreq>`,
            `    <priority>${priorityFor(path)}</priority>`,
            "  </url>",
          ].join("\n"),
        );

        const xml = [
          '<?xml version="1.0" encoding="UTF-8"?>',
          '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">',
          ...urls,
          "</urlset>",
        ].join("\n");

        return new Response(xml, {
          headers: {
            "Content-Type": "application/xml",
            "Cache-Control": "public, max-age=3600",
          },
        });
      },
    },
  },
});
