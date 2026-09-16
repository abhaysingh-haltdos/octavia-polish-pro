<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display services catalog page
     */
    public function index(): View
    {
        return view('pages.services.index');
    }

    /**
     * Display specific service details by path/slug
     */
    public function show(string $path): View|\Illuminate\Http\RedirectResponse
    {
        $servicesPath = storage_path('app/services.json');
        $servicesData = File::exists($servicesPath) ? json_decode(File::get($servicesPath), true) : [];

        $cleanSlug = trim(str_replace(['/services/', '/services'], '', $path), '/');
        $segments = explode('/', $cleanSlug);
        $lastSegment = end($segments);

        if (!empty($servicesData[$cleanSlug])) {
            $service = $servicesData[$cleanSlug];
            $canonicalSlug = $cleanSlug;
        } elseif (!empty($servicesData[$lastSegment])) {
            // Find canonical full key in servicesData that matches lastSegment
            $canonicalSlug = null;
            foreach (array_keys($servicesData) as $k) {
                if ($k === $lastSegment || str_ends_with($k, '/' . $lastSegment)) {
                    $canonicalSlug = $k;
                    break;
                }
            }
            $canonicalSlug = $canonicalSlug ?: $lastSegment;

            // Enforce 301 permanent redirect if accessed via irregular/duplicate path prefix
            if ($cleanSlug !== $canonicalSlug) {
                return redirect('/services/' . $canonicalSlug, 301);
            }
            $service = $servicesData[$lastSegment];
        } else {
            abort(404);
        }

        // Fetch up to 3 published case studies from the database for proof
        $recentCaseStudies = CaseStudy::where('status', 'published')
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        // Adjacent related services for cross-navigation
        $adjacentServices = [
            [
                'title' => 'Custom Web Engineering',
                'category' => 'Web & SaaS',
                'description' => 'High-performance React & Next.js architectures with sub-second page rendering and headless CMS.',
                'url' => '/services/web-development/custom-web-development',
                'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'
            ],
            [
                'title' => 'Autonomous AI Agents',
                'category' => 'AI & LLM',
                'description' => 'Production Generative AI workflows, fine-tuned LLMs, and custom RAG retrieval vector pipelines.',
                'url' => '/services/ai-agentic-ai/ai-agent-development',
                'icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z'
            ],
            [
                'title' => 'Cloud & DevSecOps',
                'category' => 'Infrastructure',
                'description' => 'Kubernetes orchestration, automated CI/CD pipelines, and 24/7 site reliability engineering.',
                'url' => '/services/cloud-data-devops/devops-consulting-services',
                'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9'
            ],
            [
                'title' => 'Mobile App Engineering',
                'category' => 'iOS & Android',
                'description' => 'Cross-platform Flutter & React Native native mobile apps built for offline-first resilience.',
                'url' => '/services/mobile-app-development/flutter-app-development',
                'icon' => 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z'
            ],
            [
                'title' => 'IT Staff Augmentation',
                'category' => 'Dedicated Squads',
                'description' => 'Deploy pre-vetted senior software engineers and technical leads within 48 hours.',
                'url' => '/services/it-staff-augmentation/hire-react-developers',
                'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'
            ],
            [
                'title' => 'Enterprise Modernization',
                'category' => 'Legacy Modernization',
                'description' => 'Refactor legacy codebases into secure, high-concurrency cloud microservices.',
                'url' => '/services/software-development/enterprise-software-development',
                'icon' => 'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z'
            ],
        ];

        return view('pages.services.show', [
            'service' => $service,
            'path' => $cleanSlug,
            'recentCaseStudies' => $recentCaseStudies,
            'adjacentServices' => $adjacentServices,
        ]);
    }
}

