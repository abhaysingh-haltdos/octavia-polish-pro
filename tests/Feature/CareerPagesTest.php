<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CareerPagesTest extends TestCase
{
    /**
     * Test career listing page loads with 200
     */
    public function test_careers_listing_page_loads_successfully(): void
    {
        $response = $this->get('/careers');
        $response->assertStatus(200);
        $response->assertSee('Discover Open Roles');
        $response->assertSee('Chat Support Executive');
        $response->assertSee('DevOps Engineer');
    }

    /**
     * Test /career alias route loads with 200
     */
    public function test_career_alias_route_loads_successfully(): void
    {
        $response = $this->get('/career');
        $response->assertStatus(200);
        $response->assertSee('Discover Open Roles');
    }

    /**
     * Test single career profile detail page loads with 200
     */
    public function test_career_detail_profile_loads_successfully(): void
    {
        $response = $this->get('/career/chat-support-profile');
        $response->assertStatus(200);
        $response->assertSee('Chat Support Executive');
        $response->assertSee('Key Responsibilities');
        $response->assertSee('Experience & Qualifications', false);
    }

    /**
     * Test invalid career slug returns 404
     */
    public function test_invalid_career_slug_returns_404(): void
    {
        $response = $this->get('/career/non-existent-role-xyz');
        $response->assertStatus(404);
    }

    /**
     * Test application validation fails without required fields
     */
    public function test_career_application_validation_requires_fields(): void
    {
        $response = $this->postJson('/career/apply', []);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['full_name', 'email', 'phone', 'experience', 'current_ctc', 'expected_ctc', 'job_slug']);
    }

    /**
     * Test application fails with invalid captcha
     */
    public function test_career_application_fails_with_wrong_captcha(): void
    {
        $response = $this->postJson('/career/apply', [
            'full_name' => 'Jane Candidate',
            'email' => 'jane@example.com',
            'phone' => '+1 555 123 4567',
            'experience' => '3 Years',
            'current_ctc' => '$60,000',
            'expected_ctc' => '$80,000',
            'job_slug' => 'chat-support-profile',
            'userCaptchaAnswer' => 10,
            'expectedCaptchaAnswer' => 15,
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'Incorrect security check answer. Please verify and try again.',
        ]);
    }

    /**
     * Test application successfully submits and creates lead record
     */
    public function test_career_application_submits_successfully(): void
    {
        $response = $this->postJson('/career/apply', [
            'full_name' => 'Jane Candidate',
            'email' => 'jane@example.com',
            'phone' => '+1 555 123 4567',
            'experience' => '3 Years',
            'current_ctc' => '$60,000',
            'expected_ctc' => '$80,000',
            'notice_period' => '15 Days',
            'job_slug' => 'chat-support-profile',
            'job_title' => 'Chat Support Executive',
            'userCaptchaAnswer' => 12,
            'expectedCaptchaAnswer' => 12,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'dbSaved' => true,
        ]);

        $this->assertDatabaseHas('leads', [
            'email' => 'jane@example.com',
            'full_name' => 'Jane Candidate',
            'service_category' => 'Careers - Chat Support Executive',
        ]);

        // Cleanup
        Lead::where('email', 'jane@example.com')->delete();
    }
}