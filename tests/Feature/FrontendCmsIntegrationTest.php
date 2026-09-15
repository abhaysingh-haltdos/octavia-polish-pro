<?php

namespace Tests\Feature;

use App\Models\CaseStudy;
use App\Models\Category;
use App\Models\Lead;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Page;
use App\Models\Post;
use App\Models\Redirect;
use App\Models\SeoMeta;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class FrontendCmsIntegrationTest extends TestCase
{
    protected function getSuperAdmin(): User
    {
        return User::firstOrCreate(
            ['email' => 'admin@octaviatechnologies.com'],
            [
                'name' => 'Octavia Super Administrator',
                'username' => 'octavia_admin',
                'password' => Hash::make('Admin@12345!'),
                'role' => 'super_admin',
                'status' => 'active',
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | 1. Public Frontend Route Status Tests
    |--------------------------------------------------------------------------
    */

    public function test_public_home_page_renders_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Octavia');
    }

    public function test_public_about_page_renders_successfully(): void
    {
        $response = $this->get('/about-us');
        $response->assertStatus(200);
        $response->assertSee('About Us');
    }

    public function test_public_contact_page_renders_successfully(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('Contact Us');
    }

    public function test_public_blog_index_renders_successfully(): void
    {
        $response = $this->get('/blog');
        $response->assertStatus(200);
        $response->assertSee('Insights');
    }

    public function test_public_blog_valid_slug_renders_successfully(): void
    {
        $post = Post::where('status', 'published')->first();
        $this->assertNotNull($post, 'At least one published post must exist');

        $response = $this->get('/blog/' . $post->slug);
        $response->assertStatus(200);
        $response->assertSee($post->title);
    }

    public function test_public_case_studies_index_renders_successfully(): void
    {
        $response = $this->get('/case-studies');
        $response->assertStatus(200);
        $response->assertSee('Case Studies');
    }

    public function test_public_case_study_valid_slug_renders_successfully(): void
    {
        $study = CaseStudy::where('status', 'published')->first();
        $this->assertNotNull($study, 'At least one published case study must exist');

        $response = $this->get('/case-studies/' . $study->slug);
        $response->assertStatus(200);
        $response->assertSee($study->title);
    }

    public function test_public_services_index_renders_successfully(): void
    {
        $response = $this->get('/services');
        $response->assertStatus(200);
    }

    public function test_public_solutions_index_renders_successfully(): void
    {
        $response = $this->get('/solutions');
        $response->assertStatus(200);
    }

    public function test_public_industries_index_renders_successfully(): void
    {
        $response = $this->get('/industries');
        $response->assertStatus(200);
    }

    /*
    |--------------------------------------------------------------------------
    | 2. Strict 404 Routing Tests
    |--------------------------------------------------------------------------
    */

    public function test_invalid_blog_slug_returns_404(): void
    {
        $response = $this->get('/blog/non-existent-blog-slug-' . strtolower(Str::random(10)));
        $response->assertStatus(404);
    }

    public function test_draft_blog_slug_returns_404(): void
    {
        $admin = $this->getSuperAdmin();
        $category = Category::first();
        $slug = 'secret-draft-post-' . strtolower(Str::random(8));

        $draftPost = Post::create([
            'title' => 'Secret Unpublished Draft Post ' . $slug,
            'slug' => $slug,
            'excerpt' => 'Draft excerpt',
            'content' => 'Draft content here',
            'status' => 'draft',
            'author_id' => $admin->id,
            'category_id' => $category?->id,
        ]);

        $response = $this->get('/blog/' . $draftPost->slug);
        $response->assertStatus(404);

        $draftPost->delete();
    }

    public function test_invalid_case_study_slug_returns_404(): void
    {
        $response = $this->get('/case-studies/non-existent-case-study-' . strtolower(Str::random(10)));
        $response->assertStatus(404);
    }

    public function test_draft_case_study_slug_returns_404(): void
    {
        $slug = 'draft-case-study-' . strtolower(Str::random(8));

        $draftStudy = CaseStudy::create([
            'title' => 'Unpublished Case Study ' . $slug,
            'slug' => $slug,
            'client_name' => 'Draft Client Entity',
            'industry' => 'FinTech',
            'service_category' => 'Cloud Architecture',
            'subtitle' => 'Draft study subtitle',
            'status' => 'draft',
        ]);

        $response = $this->get('/case-studies/' . $draftStudy->slug);
        $response->assertStatus(404);

        $draftStudy->delete();
    }

    public function test_invalid_service_slug_returns_strict_404(): void
    {
        $response = $this->get('/services/non-existent-example');
        $response->assertStatus(404);
    }

    public function test_invalid_solution_slug_returns_404(): void
    {
        $response = $this->get('/solutions/non-existent-solution-' . strtolower(Str::random(8)));
        $response->assertStatus(404);
    }

    public function test_invalid_industry_slug_returns_404(): void
    {
        $response = $this->get('/industries/non-existent-industry-' . strtolower(Str::random(8)));
        $response->assertStatus(404);
    }

    /*
    |--------------------------------------------------------------------------
    | 3. CMS -> Frontend Workflow Tests
    |--------------------------------------------------------------------------
    */

    public function test_create_and_edit_blog_post_in_admin_and_verify_public_output(): void
    {
        $admin = $this->getSuperAdmin();
        $category = Category::first();
        $uniqueSlug = 'automated-test-article-' . strtolower(Str::random(8));

        // 1. Create post via admin
        $createResponse = $this->actingAs($admin)->post('/admin/posts', [
            'title' => 'Automated Test Article Title',
            'slug' => $uniqueSlug,
            'excerpt' => 'This is a test article excerpt verifying CMS to frontend sync.',
            'content_body' => '<p>Rich test article body paragraph.</p>',
            'status' => 'published',
            'category_id' => $category?->id,
            'author_id' => $admin->id,
            'read_time' => '4 min read',
            'meta_title' => 'Automated SEO Title | Octavia Tech',
            'meta_description' => 'Automated SEO description testing.',
        ]);

        $createResponse->assertRedirect('/admin/posts');

        $post = Post::where('slug', $uniqueSlug)->first();
        $this->assertNotNull($post);

        // 2. Verify public view sees the new post
        $publicResponse = $this->get('/blog/' . $uniqueSlug);
        $publicResponse->assertStatus(200);
        $publicResponse->assertSee('Automated Test Article Title');
        $publicResponse->assertSee('Rich test article body paragraph.');

        // 3. Edit post via admin
        $editResponse = $this->actingAs($admin)->put('/admin/posts/' . $post->id, [
            'title' => 'Updated Test Article Title V2',
            'slug' => $uniqueSlug,
            'excerpt' => 'Updated excerpt for article.',
            'content_body' => '<p>Updated paragraph content.</p>',
            'status' => 'published',
            'category_id' => $category?->id,
            'author_id' => $admin->id,
            'read_time' => '5 min read',
        ]);

        $editResponse->assertRedirect('/admin/posts');

        // 4. Verify public view reflects update
        $publicUpdatedResponse = $this->get('/blog/' . $uniqueSlug);
        $publicUpdatedResponse->assertStatus(200);
        $publicUpdatedResponse->assertSee('Updated Test Article Title V2');
        $publicUpdatedResponse->assertSee('Updated paragraph content.');

        // Clean up test post
        $post->seoMeta()->delete();
        $post->delete();
    }

    public function test_publish_and_unpublish_blog_post_and_verify_visibility(): void
    {
        $admin = $this->getSuperAdmin();
        $category = Category::first();
        $uniqueSlug = 'toggle-visibility-post-' . strtolower(Str::random(8));

        // Create published
        $createResponse = $this->actingAs($admin)->post('/admin/posts', [
            'title' => 'Toggle Visibility Post',
            'slug' => $uniqueSlug,
            'excerpt' => 'Toggle visibility excerpt.',
            'content_body' => '<p>Visible when published.</p>',
            'status' => 'published',
            'category_id' => $category?->id,
            'author_id' => $admin->id,
        ]);

        $createResponse->assertRedirect('/admin/posts');

        $post = Post::where('slug', $uniqueSlug)->firstOrFail();

        // Verify public is 200
        $this->get('/blog/' . $uniqueSlug)->assertStatus(200)->assertSee('Toggle Visibility Post');

        // Unpublish (switch to draft)
        $this->actingAs($admin)->put('/admin/posts/' . $post->id, [
            'title' => 'Toggle Visibility Post',
            'slug' => $uniqueSlug,
            'excerpt' => 'Toggle visibility excerpt.',
            'content_body' => '<p>Visible when published.</p>',
            'status' => 'draft',
            'category_id' => $category?->id,
            'author_id' => $admin->id,
        ]);

        // Verify public is now 404
        $this->get('/blog/' . $uniqueSlug)->assertStatus(404);

        // Re-publish
        $this->actingAs($admin)->put('/admin/posts/' . $post->id, [
            'title' => 'Toggle Visibility Post',
            'slug' => $uniqueSlug,
            'excerpt' => 'Toggle visibility excerpt.',
            'content_body' => '<p>Visible when published.</p>',
            'status' => 'published',
            'category_id' => $category?->id,
            'author_id' => $admin->id,
        ]);

        // Verify public is 200 again
        $this->get('/blog/' . $uniqueSlug)->assertStatus(200);

        // Clean up
        $post->seoMeta()->delete();
        $post->delete();
    }

    public function test_create_and_edit_case_study_and_verify_public_output(): void
    {
        $admin = $this->getSuperAdmin();
        $uniqueSlug = 'test-fintech-case-study-' . strtolower(Str::random(8));

        // Create case study
        $createResponse = $this->actingAs($admin)->post('/admin/case-studies', [
            'title' => 'High-Velocity FinTech Pipeline Platform',
            'slug' => $uniqueSlug,
            'subtitle' => 'Sub-second real-time ledger settlement architecture.',
            'industry' => 'FinTech',
            'service_category' => 'Cloud Architecture',
            'status' => 'published',
            'client_name' => 'Apex Financial Global',
            'short_challenge' => 'Processing bottlenecks during market opens.',
            'business_overview' => 'Global payment processor needed resilient streaming.',
        ]);

        $createResponse->assertRedirect('/admin/case-studies');

        $study = CaseStudy::where('slug', $uniqueSlug)->firstOrFail();

        // Verify public detail view
        $publicResponse = $this->get('/case-studies/' . $uniqueSlug);
        $publicResponse->assertStatus(200);
        $publicResponse->assertSee('High-Velocity FinTech Pipeline Platform');
        $publicResponse->assertSee('Apex Financial Global');

        // Edit case study
        $this->actingAs($admin)->put('/admin/case-studies/' . $study->id, [
            'title' => 'High-Velocity FinTech Pipeline Platform [Updated]',
            'slug' => $uniqueSlug,
            'subtitle' => 'Sub-second real-time ledger settlement architecture.',
            'industry' => 'FinTech',
            'service_category' => 'Cloud Architecture',
            'status' => 'published',
            'client_name' => 'Apex Financial Worldwide',
        ]);

        // Verify public reflects update
        $this->get('/case-studies/' . $uniqueSlug)
            ->assertStatus(200)
            ->assertSee('High-Velocity FinTech Pipeline Platform [Updated]')
            ->assertSee('Apex Financial Worldwide');

        // Clean up
        $study->seoMeta()->delete();
        $study->delete();
    }

    public function test_create_publish_cms_page_verify_public_url_and_unpublish_404(): void
    {
        $admin = $this->getSuperAdmin();
        $uniqueSlug = 'custom-partner-program-' . strtolower(Str::random(8));

        // 1. Create published CMS page
        $createResponse = $this->actingAs($admin)->post('/admin/pages', [
            'title' => 'Global Partner Network',
            'slug' => $uniqueSlug,
            'content' => '<p>Join Octavia Global Partner Network with tier-1 rewards and architecture support.</p>',
            'status' => 'published',
            'meta_title' => 'Partner Network | Octavia Tech',
        ]);

        $createResponse->assertRedirect('/admin/pages');

        $page = Page::where('slug', $uniqueSlug)->firstOrFail();

        // 2. Verify public URL renders
        $publicResponse = $this->get('/' . $uniqueSlug);
        $publicResponse->assertStatus(200);
        $publicResponse->assertSee('Global Partner Network');
        $publicResponse->assertSee('Join Octavia Global Partner Network');

        // 3. Unpublish CMS page (change to draft)
        $this->actingAs($admin)->put('/admin/pages/' . $page->id, [
            'title' => 'Global Partner Network',
            'slug' => $uniqueSlug,
            'content' => '<p>Join Octavia Global Partner Network.</p>',
            'status' => 'draft',
        ]);

        // 4. Verify 404 when draft
        $this->get('/' . $uniqueSlug)->assertStatus(404);

        // Clean up
        $page->seoMeta()->delete();
        $page->delete();
    }

    public function test_change_published_page_slug_and_verify_301_redirect(): void
    {
        $admin = $this->getSuperAdmin();
        $oldSlug = 'enterprise-consulting-old-' . strtolower(Str::random(6));
        $newSlug = 'enterprise-consulting-new-' . strtolower(Str::random(6));

        // 1. Create page with initial slug
        $this->actingAs($admin)->post('/admin/pages', [
            'title' => 'Enterprise Consulting Services',
            'slug' => $oldSlug,
            'content' => '<p>Strategic technology consulting services.</p>',
            'status' => 'published',
        ]);

        $page = Page::where('slug', $oldSlug)->firstOrFail();

        // Verify initial page renders at old URL
        $this->get('/' . $oldSlug)->assertStatus(200);

        // 2. Change slug in admin
        $this->actingAs($admin)->put('/admin/pages/' . $page->id, [
            'title' => 'Enterprise Consulting Services',
            'slug' => $newSlug,
            'content' => '<p>Strategic technology consulting services.</p>',
            'status' => 'published',
        ]);

        // 3. Verify old URL redirects with 301 to new URL
        $redirectResponse = $this->get('/' . $oldSlug);
        $redirectResponse->assertStatus(301);
        $redirectResponse->assertRedirect('/' . $newSlug);

        // 4. Follow redirect to verify new URL is 200
        $this->get('/' . $newSlug)->assertStatus(200)->assertSee('Enterprise Consulting Services');

        // Clean up
        Redirect::where('old_url', '/' . $oldSlug)->delete();
        $page->seoMeta()->delete();
        $page->delete();
    }

    public function test_modify_navigation_item_and_verify_public_header(): void
    {
        $admin = $this->getSuperAdmin();
        $menu = Menu::where('location', 'primary')->firstOrFail();
        $uniqueLabel = 'Innovation Lab ' . strtolower(Str::random(4));

        // Add new menu item
        $this->actingAs($admin)->post('/admin/menus/' . $menu->id . '/items', [
            'title' => $uniqueLabel,
            'url' => '/about-us#innovation',
            'type' => 'internal',
            'target' => '_self',
        ]);

        $item = MenuItem::where('title', $uniqueLabel)->firstOrFail();

        // Verify public header contains the new menu item
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee($uniqueLabel);

        // Clean up
        $item->delete();
    }

    public function test_modify_seo_fields_and_inspect_actual_html_head(): void
    {
        $admin = $this->getSuperAdmin();
        $category = Category::first();
        $slug = 'seo-head-inspection-' . strtolower(Str::random(8));

        $customTitle = 'Custom Architectural Blueprint 2026';
        $customDesc = 'Deep-dive architectural patterns for distributed event-driven systems.';

        $postResponse = $this->actingAs($admin)->post('/admin/posts', [
            'title' => 'SEO Inspection Article',
            'slug' => $slug,
            'excerpt' => 'Article excerpt for SEO verification.',
            'content_body' => '<p>Body content.</p>',
            'status' => 'published',
            'category_id' => $category?->id,
            'seo' => [
                'meta_title' => $customTitle,
                'meta_description' => $customDesc,
                'canonical_url' => url('/blog/' . $slug),
                'og_title' => $customTitle . ' | OG',
                'og_description' => $customDesc . ' | OG',
                'robots_index' => '1',
                'robots_follow' => '1',
            ],
        ]);

        $postResponse->assertSessionHasNoErrors();
        $postResponse->assertRedirect('/admin/posts');

        $post = Post::where('slug', $slug)->firstOrFail();

        // Inspect public page HTML
        $response = $this->get('/blog/' . $slug);
        $response->assertStatus(200);

        // Assert <title> contains the custom title
        $response->assertSee('<title>' . $customTitle . '</title>', false);

        // Assert meta description tag
        $response->assertSee('<meta name="description" content="' . $customDesc . '">', false);

        // Assert canonical link
        $response->assertSee('<link rel="canonical" href="' . url('/blog/' . $slug) . '">', false);

        // Assert Open Graph tags
        $response->assertSee('<meta property="og:title" content="' . $customTitle . ' | OG">', false);
        $response->assertSee('<meta property="og:description" content="' . $customDesc . ' | OG">', false);

        // Clean up
        $post->seoMeta()->delete();
        $post->delete();
    }

    public function test_submit_contact_form_stores_exactly_one_lead(): void
    {
        $initialCount = Lead::count();
        $uniqueEmail = 'lead-verify-' . strtolower(Str::random(8)) . '@enterprise-client.com';

        $payload = [
            'fullName' => 'Director John Doe',
            'email' => $uniqueEmail,
            'phone' => '+1 (555) 987-6543',
            'company' => 'Apex Cloud Enterprises',
            'serviceCategory' => 'Cloud DevOps & Architecture',
            'message' => 'Need full technical assessment and architectural proposal within 48 hours.',
            'sourceForm' => 'Public Contact Page',
            'sourceUrl' => '/contact',
        ];

        $response = $this->postJson('/contact', $payload);
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'dbSaved' => true,
        ]);

        // Verify exactly one lead was added
        $this->assertEquals($initialCount + 1, Lead::count());

        $lead = Lead::where('email', $uniqueEmail)->first();
        $this->assertNotNull($lead);
        $this->assertEquals('Director John Doe', $lead->full_name);
        $this->assertEquals('Apex Cloud Enterprises', $lead->company);
        $this->assertEquals('Cloud DevOps & Architecture', $lead->service_category);
        $this->assertEquals('new', $lead->status);

        // Clean up
        $lead->delete();
    }
}
