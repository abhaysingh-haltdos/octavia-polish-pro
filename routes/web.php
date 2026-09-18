<?php

use App\Http\Controllers\Admin\AuditLogController as AdminAuditLogController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CaseStudyController as AdminCaseStudyController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LeadController as AdminLeadController;
use App\Http\Controllers\Admin\MediaController as AdminMediaController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\SeoController as AdminSeoController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SolutionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Website Routes (100% Preserved)
|--------------------------------------------------------------------------
*/

// 1. Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. Company & About Us
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/company/about', [PageController::class, 'about']);

// 3. Contact & Lead Generation
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->middleware('throttle:10,1');
Route::post('/api/submit-lead', [ContactController::class, 'submit'])->middleware('throttle:10,1');
Route::get('/api/get-content', [ContentApiController::class, 'getContent'])->middleware('throttle:60,1');

// 3a. XML Sitemap (Eloquent-driven, replaces legacy sitemap.php)
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.xml');


// 4. Enterprise Case Studies (Route Model Binding with strict 404)
Route::get('/case-studies', [CaseStudyController::class, 'index'])->name('case-studies.index');
Route::get('/case-studies/{caseStudy:slug}', [CaseStudyController::class, 'show'])->name('case-studies.show');

// 5. Insights & Blog (Route Model Binding with strict 404)
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// 6. Industries Directory
Route::get('/industries', [IndustryController::class, 'index'])->name('industries.index');
Route::get('/industries/{slug}', [IndustryController::class, 'show'])->name('industries.show');

// 7. Solutions Hub
Route::get('/solutions', [SolutionController::class, 'index'])->name('solutions.index');
Route::get('/solutions/{slug}', [SolutionController::class, 'show'])->name('solutions.show');

// 8. Auxiliary & Legal Pages
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms-of-service', [PageController::class, 'terms'])->name('terms');
Route::get('/cookie-policy', [PageController::class, 'cookie'])->name('cookie');
Route::get('/sitemap', [PageController::class, 'sitemap'])->name('sitemap');
// 8. Careers & Talent Hub
Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
Route::get('/career', [CareerController::class, 'index']);
Route::get('/career/{slug}', [CareerController::class, 'show'])->name('careers.show');
Route::get('/careers/{slug}', [CareerController::class, 'show']);
Route::post('/career/apply', [CareerController::class, 'apply'])->middleware('throttle:10,1')->name('careers.apply');
Route::get('/process', fn() => redirect('/services'));

// 9. Services Catalog & Wildcard Dynamic Subpages
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{path}', [ServiceController::class, 'show'])->where('path', '.*')->name('services.show');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes (Guest Only)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Protected Admin & CMS Routes (Auth & Role-Gated)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['admin.auth'])->group(function () {
    // 1. CMS Dashboard Overview (All authorized roles: super_admin, admin, editor, author)
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // 2. Blog CMS Articles (All authorized roles; authors scoped inside controller)
    Route::resource('posts', AdminPostController::class)->except(['show']);

    // 3. Media Assets Library (All authorized roles)
    Route::get('media', [AdminMediaController::class, 'index'])->name('media.index');
    Route::post('media', [AdminMediaController::class, 'store'])->name('media.store');
    Route::delete('media/{media}', [AdminMediaController::class, 'destroy'])->name('media.destroy');

    // 4. Content Editorial Management (super_admin, admin, editor)
    Route::middleware(['admin.role:super_admin,admin,editor'])->group(function () {
        Route::resource('pages', AdminPageController::class)->except(['show']);
        Route::resource('case-studies', AdminCaseStudyController::class)->except(['show']);
        Route::resource('categories', AdminCategoryController::class)->except(['show', 'create', 'edit']);
        Route::resource('tags', AdminTagController::class)->except(['show', 'create', 'edit']);

        // Menus Manager
        Route::get('menus', [AdminMenuController::class, 'index'])->name('menus.index');
        Route::post('menus/{menu}/items', [AdminMenuController::class, 'storeItem'])->name('menus.items.store');
        Route::put('menus/items/{item}', [AdminMenuController::class, 'updateItem'])->name('menus.items.update');
        Route::delete('menus/items/{item}', [AdminMenuController::class, 'destroyItem'])->name('menus.items.destroy');

        // Centralized SEO Console
        Route::get('seo', [AdminSeoController::class, 'index'])->name('seo.index');
        Route::post('seo/global', [AdminSeoController::class, 'updateGlobal'])->name('seo.global');
    });

    // 5. System Administration & Operations (super_admin, admin)
    Route::middleware(['admin.role:super_admin,admin'])->group(function () {
        // Client Inquiries & Leads
        Route::get('leads', [AdminLeadController::class, 'index'])->name('leads.index');
        Route::get('leads/export', [AdminLeadController::class, 'export'])->name('leads.export');
        Route::get('leads/export-excel', [AdminLeadController::class, 'exportExcel'])->name('leads.export-excel');
        Route::get('leads/{lead}', [AdminLeadController::class, 'show'])->name('leads.show');
        Route::put('leads/{lead}', [AdminLeadController::class, 'update'])->name('leads.update');

        // Users & Roles Management
        Route::resource('users', AdminUserController::class)->except(['show']);

        // System Settings
        Route::get('settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [AdminSettingController::class, 'update'])->name('settings.update');

        // Security & Audit Logs
        Route::get('audit-logs', [AdminAuditLogController::class, 'index'])->name('audit-logs.index');
    });
});

/*
|--------------------------------------------------------------------------
| Fallback: Dynamic 301 Redirect Engine & Strict 404
|--------------------------------------------------------------------------
*/
Route::fallback(function (Request $request) {
    $path = '/' . ltrim($request->path(), '/');
    $redirect = \App\Models\Redirect::where('old_url', $path)->where('is_active', true)->first();
    if ($redirect) {
        return redirect($redirect->new_url, $redirect->status_code ?: 301);
    }

    $slug = ltrim($request->path(), '/');
    $cmsPage = \App\Models\Page::where('slug', $slug)->first();
    if ($cmsPage) {
        if ($cmsPage->status === 'published') {
            return app(\App\Http\Controllers\PageController::class)->showCmsPage($cmsPage);
        }
        abort(404);
    }

    abort(404);
});
