<?php

namespace Tests\Feature;

use App\Models\CaseStudy;
use App\Models\Lead;
use App\Models\Page;
use App\Models\Post;
use App\Models\Redirect;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminCmsTest extends TestCase
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

    protected function getAuthorUser(): User
    {
        return User::where('role', 'author')->first() ?: User::create([
            'name' => 'Test Author Staff',
            'username' => 'test_author',
            'email' => 'author_test@octaviatechnologies.com',
            'password' => Hash::make('Password@123'),
            'role' => 'author',
            'status' => 'active',
        ]);
    }

    public function test_unauthenticated_user_redirected_to_admin_login(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/admin/login');

        $response2 = $this->get('/admin/posts');
        $response2->assertRedirect('/admin/login');
    }

    public function test_admin_login_page_renders_successfully(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
        $response->assertSee('Octavia Control Panel');
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $user = $this->getSuperAdmin();

        $response = $this->post('/admin/login', [
            'login' => $user->email,
            'password' => 'Admin@12345!',
        ]);

        $response->assertRedirect('/admin');
        $this->assertAuthenticatedAs($user);
    }

    public function test_admin_login_fails_with_invalid_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'login' => 'admin@octaviatechnologies.com',
            'password' => 'WrongPassword123!',
        ]);

        $response->assertSessionHas('error');
        $this->assertGuest();
    }

    public function test_super_admin_can_access_all_modules(): void
    {
        $superAdmin = $this->getSuperAdmin();

        $routes = [
            '/admin',
            '/admin/pages',
            '/admin/posts',
            '/admin/categories',
            '/admin/tags',
            '/admin/case-studies',
            '/admin/media',
            '/admin/menus',
            '/admin/seo',
            '/admin/leads',
            '/admin/users',
            '/admin/settings',
            '/admin/audit-logs',
        ];

        foreach ($routes as $route) {
            $response = $this->actingAs($superAdmin)->get($route);
            $response->assertStatus(200);
        }
    }

    public function test_author_cannot_access_restricted_modules_returns_403(): void
    {
        $author = $this->getAuthorUser();

        // Author CAN access dashboard, posts, media
        $this->actingAs($author)->get('/admin')->assertStatus(200);
        $this->actingAs($author)->get('/admin/posts')->assertStatus(200);
        $this->actingAs($author)->get('/admin/media')->assertStatus(200);

        // Author CANNOT access pages, case studies, menus, seo, leads, users, settings, audit logs
        $forbiddenRoutes = [
            '/admin/pages',
            '/admin/case-studies',
            '/admin/categories',
            '/admin/tags',
            '/admin/menus',
            '/admin/seo',
            '/admin/leads',
            '/admin/users',
            '/admin/settings',
            '/admin/audit-logs',
        ];

        foreach ($forbiddenRoutes as $route) {
            $response = $this->actingAs($author)->get($route);
            $response->assertStatus(403);
        }
    }

    public function test_last_super_admin_cannot_be_deleted_or_demoted(): void
    {
        $superAdmin = $this->getSuperAdmin();

        // Ensure there is only 1 active super_admin for this test
        User::where('role', 'super_admin')->where('id', '!=', $superAdmin->id)->delete();

        // Attempt to demote role to author
        $response = $this->actingAs($superAdmin)->put("/admin/users/{$superAdmin->id}", [
            'name' => $superAdmin->name,
            'email' => $superAdmin->email,
            'role' => 'author',
            'status' => 'active',
        ]);

        $response->assertSessionHas('error');
        $this->assertEquals('super_admin', $superAdmin->fresh()->role);

        // Attempt to delete own account
        $deleteResponse = $this->actingAs($superAdmin)->delete("/admin/users/{$superAdmin->id}");
        $deleteResponse->assertSessionHas('error');
        $this->assertDatabaseHas('users', ['id' => $superAdmin->id]);
    }

    public function test_page_slug_change_creates_automatic_301_redirect(): void
    {
        $superAdmin = $this->getSuperAdmin();
        $id = uniqid();
        $oldSlug = "test-legacy-page-{$id}";
        $newSlug = "test-new-modern-page-{$id}";

        $page = Page::create([
            'title' => 'Test Legacy Page ' . $id,
            'slug' => $oldSlug,
            'content' => '<p>Legacy content</p>',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $response = $this->actingAs($superAdmin)->put("/admin/pages/{$page->id}", [
            'title' => 'Test Legacy Page Updated ' . $id,
            'slug' => $newSlug,
            'content' => '<p>Updated modern content</p>',
            'status' => 'published',
        ]);

        $response->assertRedirect('/admin/pages');

        // Verify 301 record was created in redirects table
        $this->assertDatabaseHas('redirects', [
            'old_url' => '/' . $oldSlug,
            'new_url' => '/' . $newSlug,
            'status_code' => 301,
            'is_active' => true,
        ]);

        $page->seoMeta()->delete();
        $page->delete();
        Redirect::where('old_url', '/' . $oldSlug)->delete();
    }

    public function test_fallback_route_redirects_for_active_redirect_and_returns_404_otherwise(): void
    {
        $uniqueLegacy = '/legacy-test-url-' . uniqid();
        Redirect::create([
            'old_url' => $uniqueLegacy,
            'new_url' => '/about-us',
            'status_code' => 301,
            'is_active' => true,
        ]);

        $redirectResponse = $this->get($uniqueLegacy);
        $redirectResponse->assertStatus(301);
        $redirectResponse->assertRedirect('/about-us');

        $notFoundResponse = $this->get('/completely-non-existent-wildcard-path-404');
        $notFoundResponse->assertStatus(404);

        Redirect::where('old_url', $uniqueLegacy)->delete();
    }

    public function test_lead_status_and_notes_can_be_updated(): void
    {
        $superAdmin = $this->getSuperAdmin();

        $lead = Lead::create([
            'submission_id' => 'TEST-' . time(),
            'full_name' => 'Corporate Buyer',
            'email' => 'buyer@enterprise.com',
            'message' => 'Need 10 cloud engineers.',
            'status' => 'new',
        ]);

        $response = $this->actingAs($superAdmin)->put("/admin/leads/{$lead->id}", [
            'status' => 'qualified',
            'admin_notes' => 'Spoke with VP of Tech. Budget approved.',
        ]);

        $response->assertRedirect("/admin/leads/{$lead->id}");
        $this->assertEquals('qualified', $lead->fresh()->status);
        $this->assertEquals('Spoke with VP of Tech. Budget approved.', $lead->fresh()->admin_notes);

        $lead->delete();
    }

    public function test_leads_can_be_exported_to_csv(): void
    {
        $superAdmin = $this->getSuperAdmin();

        $response = $this->actingAs($superAdmin)->get('/admin/leads/export');
        $response->assertStatus(200);
        $this->assertStringContainsString('text/csv', $response->headers->get('Content-Type'));
    }

    public function test_media_store_blocks_executable_file_uploads(): void
    {
        $superAdmin = $this->getSuperAdmin();

        $dangerousFile = UploadedFile::fake()->create('malicious.php', 100, 'application/x-php');

        $response = $this->actingAs($superAdmin)->post('/admin/media', [
            'file' => $dangerousFile,
        ]);

        // Validation fails because mime type and extension are not permitted
        $response->assertSessionHasErrors('file');
    }

    public function test_public_website_regression_is_preserved(): void
    {
        $publicRoutes = [
            '/',
            '/about-us',
            '/contact',
            '/blog',
            '/case-studies',
            '/industries',
            '/solutions',
            '/privacy-policy',
            '/terms-of-service',
        ];

        foreach ($publicRoutes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }
}
