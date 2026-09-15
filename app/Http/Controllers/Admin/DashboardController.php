<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\CaseStudy;
use App\Models\Lead;
use App\Models\Media;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the CMS overview dashboard with real database aggregates.
     */
    public function index(): View
    {
        $user = Auth::user();

        $stats = [
            'totalPages' => Page::count(),
            'totalPosts' => Post::count(),
            'publishedPosts' => Post::where('status', 'published')->count(),
            'draftPosts' => Post::where('status', 'draft')->count(),
            'totalCaseStudies' => CaseStudy::count(),
            'totalMedia' => Media::count(),
            'totalLeads' => Lead::count(),
            'newLeads' => Lead::where('status', 'new')->count(),
        ];

        // Recent content queries
        $recentPosts = Post::with(['category', 'authorUser'])
            ->orderByDesc('id')
            ->limit(5)
            ->get();

        $recentLeads = in_array($user->role, ['super_admin', 'admin'])
            ? Lead::orderByDesc('id')->limit(5)->get()
            : collect();

        $recentLogs = in_array($user->role, ['super_admin', 'admin'])
            ? AuditLog::with('user')->orderByDesc('id')->limit(8)->get()
            : collect();

        return view('admin.dashboard', compact('stats', 'recentPosts', 'recentLeads', 'recentLogs'));
    }
}
