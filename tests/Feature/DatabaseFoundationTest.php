<?php

namespace Tests\Feature;

use App\Models\CaseStudy;
use App\Models\Lead;
use App\Models\Post;
use Tests\TestCase;

class DatabaseFoundationTest extends TestCase
{
    public function test_home_page_renders_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_blog_index_renders_with_database_posts(): void
    {
        $response = $this->get('/blog');
        $response->assertStatus(200);
        $response->assertViewHas('data');
        $data = $response->viewData('data');
        $this->assertNotEmpty($data['posts']);
        $this->assertCount(4, $data['posts']);
    }

    public function test_blog_detail_renders_for_valid_slug(): void
    {
        $post = Post::first();
        $this->assertNotNull($post);

        $response = $this->get('/blog/' . $post->slug);
        $response->assertStatus(200);
        $response->assertSee($post->title);
    }

    public function test_blog_detail_returns_strict_404_for_invalid_slug(): void
    {
        $response = $this->get('/blog/completely-invalid-non-existent-slug-404');
        $response->assertStatus(404);
    }

    public function test_case_studies_index_renders_with_database_studies(): void
    {
        $response = $this->get('/case-studies');
        $response->assertStatus(200);
        $response->assertViewHas('data');
        $data = $response->viewData('data');
        $this->assertNotEmpty($data['studies']);
        $this->assertCount(8, $data['studies']);
    }

    public function test_case_study_detail_renders_for_valid_slug(): void
    {
        $study = CaseStudy::first();
        $this->assertNotNull($study);

        $response = $this->get('/case-studies/' . $study->slug);
        $response->assertStatus(200);
        $response->assertSee($study->title);
    }

    public function test_case_study_detail_returns_strict_404_for_invalid_slug(): void
    {
        $response = $this->get('/case-studies/completely-invalid-non-existent-case-study-404');
        $response->assertStatus(404);
    }

    public function test_industry_detail_returns_strict_404_for_unknown_slug(): void
    {
        $response = $this->get('/industries/completely-invalid-industry-slug-404');
        $response->assertStatus(404);
    }

    public function test_solution_detail_returns_strict_404_for_unknown_slug(): void
    {
        $response = $this->get('/solutions/completely-invalid-solution-slug-404');
        $response->assertStatus(404);
    }

    public function test_services_catalog_and_subpages_render(): void
    {
        $response = $this->get('/services');
        $response->assertStatus(200);

        $subpageResponse = $this->get('/services/web-development/custom-web-development');
        $subpageResponse->assertStatus(200);
    }

    public function test_static_and_legal_pages_render(): void
    {
        $this->get('/about-us')->assertStatus(200);
        $this->get('/contact')->assertStatus(200);
        $this->get('/privacy-policy')->assertStatus(200);
        $this->get('/terms-of-service')->assertStatus(200);
        $this->get('/cookie-policy')->assertStatus(200);
        $this->get('/sitemap')->assertStatus(200);
    }

    public function test_lead_submission_stores_lead_in_database(): void
    {
        $uniqueEmail = 'prospect_' . uniqid() . '@enterprise-corp.com';
        $payload = [
            'fullName' => 'Enterprise Prospect',
            'email' => $uniqueEmail,
            'phone' => '+1 555-987-6543',
            'company' => 'Enterprise Corp',
            'serviceCategory' => 'Cloud & DevOps Engineering',
            'message' => 'Need 4 dedicated Kubernetes & Terraform engineers.',
            'sourceForm' => 'Contact Modal',
            'sourceUrl' => 'https://octaviatechnologies.com/contact',
        ];

        $response = $this->postJson('/api/submit-lead', $payload);
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'dbSaved' => true,
        ]);

        $this->assertDatabaseHas('leads', [
            'email' => $uniqueEmail,
            'company' => 'Enterprise Corp',
        ]);
    }

    public function test_api_get_content_returns_json(): void
    {
        $response = $this->getJson('/api/get-content?type=blogs');
        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $responseCs = $this->getJson('/api/get-content?type=case_studies');
        $responseCs->assertStatus(200);
        $responseCs->assertJson(['success' => true]);
    }
}
