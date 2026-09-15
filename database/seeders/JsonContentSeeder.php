<?php

namespace Database\Seeders;

use App\Models\CaseStudy;
use App\Models\Category;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Post;
use App\Models\SeoMeta;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class JsonContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Starting JSON content import into Eloquent database...');

        $this->seedSettings();
        $this->seedDefaultAdmin();
        $this->seedBlogContent();
        $this->seedCaseStudies();
        $this->seedNavigation();

        $this->command->info('JSON content import completed successfully!');
    }

    /**
     * Seed initial system settings
     */
    protected function seedSettings(): void
    {
        $settings = [
            'site_name' => 'Octavia Tech Solutions',
            'site_logo' => '/assets/octavia-logo.png',
            'favicon' => '/favicon.ico',
            'contact_email' => 'contact@octaviatechnologies.com',
            'contact_phone' => '+1 (555) 123-4567',
            'address' => '100 Enterprise Way, Suite 400, Tech City',
            'social_linkedin' => 'https://linkedin.com/company/octavia-tech',
            'social_twitter' => 'https://twitter.com/octavia_tech',
            'analytics_ga_id' => 'G-XXXXXXX',
            'default_meta_title' => 'Octavia Tech Solutions | Enterprise IT & AI Engineering',
            'default_meta_description' => 'Leading enterprise IT staff augmentation, custom software, and cloud engineering.',
            'admin_notification_email' => 'sales@octaviatechnologies.com',
            'smtp_enabled' => '0',
            'bot_protection_enabled' => '1',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'group' => 'general']
            );
        }

        $this->command->info('Default settings seeded.');
    }

    /**
     * Seed default administrator
     */
    protected function seedDefaultAdmin(): User
    {
        return User::updateOrCreate(
            ['email' => 'admin@octaviatechnologies.com'],
            [
                'name' => 'Octavia Administrator',
                'username' => 'octavia_admin',
                'password' => Hash::make('Admin@12345!'),
                'role' => 'super_admin',
                'status' => 'active',
                'designation' => 'Principal System Architect',
            ]
        );
    }

    /**
     * Seed blog articles, categories, and tags from storage/app/blog.json
     */
    protected function seedBlogContent(): void
    {
        $path = storage_path('app/blog.json');
        if (!File::exists($path)) {
            $this->command->warn("blog.json not found at {$path}");
            return;
        }

        $data = json_decode(File::get($path), true);
        if (!$data) {
            $this->command->error("Failed to parse blog.json");
            return;
        }

        // 1. Categories
        $categoriesMap = [];
        foreach ($data['categories'] ?? [] as $catName) {
            if ($catName === 'All') continue;
            $cat = Category::updateOrCreate(
                ['slug' => Str::slug($catName)],
                ['name' => $catName]
            );
            $categoriesMap[$catName] = $cat;
        }

        // 2. Tags
        $tagsMap = [];
        foreach ($data['popularTags'] ?? [] as $tagName) {
            $tag = Tag::updateOrCreate(
                ['slug' => Str::slug($tagName)],
                ['name' => $tagName]
            );
            $tagsMap[$tagName] = $tag;
        }

        // 3. Articles
        $articles = $data['articles'] ?? $data['posts'] ?? [];
        foreach ($articles as $art) {
            $catName = $art['category'] ?? 'Engineering';
            $category = $categoriesMap[$catName] ?? Category::firstOrCreate(
                ['slug' => Str::slug($catName)],
                ['name' => $catName]
            );

            // Create author user if needed
            $authorData = $art['author'] ?? [];
            $authorName = $authorData['name'] ?? 'Octavia Engineering Team';
            $authorEmail = Str::slug($authorName) . '@octaviatechnologies.com';

            $author = User::firstOrCreate(
                ['email' => $authorEmail],
                [
                    'name' => $authorName,
                    'username' => Str::slug($authorName, '_'),
                    'password' => Hash::make(Str::random(16)),
                    'role' => 'author',
                    'status' => 'active',
                    'avatar' => $authorData['avatar'] ?? null,
                    'bio' => $authorData['bio'] ?? null,
                    'designation' => $authorData['role'] ?? 'Senior Software Engineer',
                ]
            );

            $post = Post::updateOrCreate(
                ['slug' => $art['slug']],
                [
                    'title' => $art['title'],
                    'category_id' => $category->id,
                    'category_name' => $catName,
                    'author_id' => $author->id,
                    'author_name' => $authorName,
                    'author_role' => $authorData['role'] ?? 'Senior Solutions Architect',
                    'author_avatar' => $authorData['avatar'] ?? null,
                    'author_bio' => $authorData['bio'] ?? null,
                    'author_socials' => [
                        'linkedin' => $authorData['linkedin'] ?? 'https://linkedin.com',
                        'twitter' => $authorData['twitter'] ?? 'https://twitter.com',
                    ],
                    'read_time' => $art['readTime'] ?? '5 min read',
                    'excerpt' => $art['excerpt'] ?? null,
                    'summary' => $art['excerpt'] ?? null,
                    'content' => $art['content'] ?? [],
                    'featured_image' => $art['featuredImage'] ?? null,
                    'is_featured' => !empty($art['isFeatured']),
                    'is_trending' => !empty($art['isTrending']),
                    'is_popular' => !empty($art['isPopular']),
                    'views' => $art['views'] ?? 100,
                    'status' => 'published',
                    'published_at' => !empty($art['publishDate']) ? date('Y-m-d H:i:s', strtotime($art['publishDate'])) : now(),
                ]
            );

            // Sync tags
            $tagIds = [];
            foreach ($art['tags'] ?? [] as $tName) {
                $tagModel = $tagsMap[$tName] ?? Tag::firstOrCreate(
                    ['slug' => Str::slug($tName)],
                    ['name' => $tName]
                );
                $tagIds[] = $tagModel->id;
            }
            $post->tags()->sync($tagIds);

            // Create or update polymorphic SEO Meta
            $seo = $art['seo'] ?? [];
            SeoMeta::updateOrCreate(
                [
                    'seoable_type' => Post::class,
                    'seoable_id' => $post->id,
                ],
                [
                    'meta_title' => $seo['metaTitle'] ?? $post->title,
                    'meta_description' => $seo['metaDescription'] ?? $post->excerpt,
                    'canonical_url' => url('/blog/' . $post->slug),
                    'keywords' => $seo['keywords'] ?? [],
                    'robots_index' => true,
                    'robots_follow' => true,
                    'og_title' => $seo['metaTitle'] ?? $post->title,
                    'og_description' => $seo['metaDescription'] ?? $post->excerpt,
                    'og_image' => $post->featured_image,
                    'twitter_title' => $seo['metaTitle'] ?? $post->title,
                    'twitter_description' => $seo['metaDescription'] ?? $post->excerpt,
                    'twitter_image' => $post->featured_image,
                    'schema_type' => 'Article',
                ]
            );
        }

        $this->command->info(count($articles) . ' blog articles imported.');
    }

    /**
     * Seed enterprise case studies from storage/app/case-studies.json
     */
    protected function seedCaseStudies(): void
    {
        $path = storage_path('app/case-studies.json');
        if (!File::exists($path)) {
            $this->command->warn("case-studies.json not found at {$path}");
            return;
        }

        $data = json_decode(File::get($path), true);
        $studies = $data['studies'] ?? [];

        foreach ($studies as $cs) {
            $caseStudy = CaseStudy::updateOrCreate(
                ['slug' => $cs['slug']],
                [
                    'title' => $cs['title'],
                    'subtitle' => $cs['subtitle'] ?? null,
                    'client_name' => $cs['clientName'] ?? 'Enterprise Client',
                    'client_location' => $cs['clientLocation'] ?? null,
                    'industry' => $cs['industry'] ?? 'General',
                    'service_category' => $cs['serviceCategory'] ?? 'Engineering',
                    'solution_category' => $cs['solutionCategory'] ?? null,
                    'technologies' => $cs['technologies'] ?? [],
                    'project_duration' => $cs['projectDuration'] ?? null,
                    'team_size' => $cs['teamSize'] ?? null,
                    'engagement_model' => $cs['engagementModel'] ?? null,
                    'featured_image' => $cs['featuredImage'] ?? null,
                    'hero_banner_image' => $cs['heroBannerImage'] ?? null,
                    'is_featured' => !empty($cs['isFeatured']),
                    'is_latest' => !empty($cs['isLatest']),
                    'short_challenge' => $cs['shortChallenge'] ?? null,
                    'result_highlight' => $cs['resultHighlight'] ?? null,
                    'business_overview' => $cs['businessOverview'] ?? null,
                    'client_challenges' => $cs['clientChallenges'] ?? [],
                    'business_goals' => $cs['businessGoals'] ?? [],
                    'project_objectives' => $cs['projectObjectives'] ?? [],
                    'our_approach' => $cs['ourApproach'] ?? null,
                    'discovery_process' => $cs['discoveryProcess'] ?? [],
                    'solution_architecture' => $cs['solutionArchitecture'] ?? [],
                    'implementation_process' => $cs['implementationProcess'] ?? [],
                    'key_features' => $cs['keyFeatures'] ?? [],
                    'kpis' => $cs['kpis'] ?? [],
                    'metrics' => $cs['metrics'] ?? [],
                    'testimonial' => $cs['testimonial'] ?? [],
                    'status' => 'published',
                    'published_at' => !empty($cs['publishDate']) ? date('Y-m-d H:i:s', strtotime($cs['publishDate'])) : now(),
                ]
            );

            // Create or update polymorphic SEO Meta
            SeoMeta::updateOrCreate(
                [
                    'seoable_type' => CaseStudy::class,
                    'seoable_id' => $caseStudy->id,
                ],
                [
                    'meta_title' => $caseStudy->title . ' | Octavia Tech Solutions',
                    'meta_description' => $caseStudy->subtitle ?: Str::limit($caseStudy->short_challenge, 155),
                    'canonical_url' => url('/case-studies/' . $caseStudy->slug),
                    'keywords' => $caseStudy->technologies ?? [],
                    'robots_index' => true,
                    'robots_follow' => true,
                    'og_title' => $caseStudy->title,
                    'og_description' => $caseStudy->subtitle ?: Str::limit($caseStudy->short_challenge, 155),
                    'og_image' => $caseStudy->featured_image ?: $caseStudy->hero_banner_image,
                    'schema_type' => 'CaseStudy',
                ]
            );
        }

        $this->command->info(count($studies) . ' case studies imported.');
    }

    /**
     * Seed navigation menus from storage/app/navigation.json
     */
    protected function seedNavigation(): void
    {
        $path = storage_path('app/navigation.json');
        if (!File::exists($path)) {
            return;
        }

        $navData = json_decode(File::get($path), true);
        if (!is_array($navData)) return;

        $menu = Menu::updateOrCreate(
            ['location' => 'primary'],
            ['name' => 'Primary Navigation']
        );

        foreach ($navData as $order => $item) {
            $menuItem = MenuItem::updateOrCreate(
                [
                    'menu_id' => $menu->id,
                    'url' => $item['href'] ?? '#',
                    'title' => $item['label'] ?? 'Link',
                ],
                [
                    'order' => $order,
                    'type' => Str::startsWith($item['href'] ?? '', 'http') ? 'external' : 'internal',
                    'meta' => $item['megaConfig'] ?? null,
                ]
            );
        }

        $this->command->info('Primary navigation menus imported.');
    }
}
