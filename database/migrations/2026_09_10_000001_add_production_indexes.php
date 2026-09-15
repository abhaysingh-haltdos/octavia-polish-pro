<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add production indexes for performance on frequently-queried columns.
     *
     * Indexes already confirmed to exist from Phase 1 migrations (no duplicates needed):
     *   - posts.slug (unique), posts.status, posts.is_featured, posts.published_at
     *   - case_studies.slug (unique), case_studies.status, case_studies.is_featured, case_studies.published_at
     *   - case_studies.industry, case_studies.service_category
     *   - leads.submission_id (unique), leads.email, leads.status
     *
     * New indexes added here:
     *   - pages.status, pages.slug
     *   - redirects.old_url, redirects.is_active
     *   - audit_logs.created_at, audit_logs.user_id
     *   - settings.key
     *   - categories.slug
     *   - tags.slug
     */
    public function up(): void
    {
        // pages table
        if (Schema::hasTable('pages')) {
            Schema::table('pages', function (Blueprint $table) {
                if (!Schema::hasIndex('pages', 'pages_status_index')) {
                    $table->index('status', 'pages_status_index');
                }
                if (!Schema::hasIndex('pages', 'pages_slug_index')) {
                    $table->index('slug', 'pages_slug_index');
                }
            });
        }

        // redirects table — old_url is queried on EVERY request via fallback route
        if (Schema::hasTable('redirects')) {
            Schema::table('redirects', function (Blueprint $table) {
                if (!Schema::hasIndex('redirects', 'redirects_old_url_index')) {
                    $table->index('old_url', 'redirects_old_url_index');
                }
                if (!Schema::hasIndex('redirects', 'redirects_is_active_index')) {
                    $table->index('is_active', 'redirects_is_active_index');
                }
            });
        }

        // audit_logs table — queried by user_id and created_at in admin panel
        if (Schema::hasTable('audit_logs')) {
            Schema::table('audit_logs', function (Blueprint $table) {
                if (!Schema::hasIndex('audit_logs', 'audit_logs_user_id_index')) {
                    $table->index('user_id', 'audit_logs_user_id_index');
                }
                if (!Schema::hasIndex('audit_logs', 'audit_logs_created_at_index')) {
                    $table->index('created_at', 'audit_logs_created_at_index');
                }
            });
        }

        // settings table — always looked up by key
        if (Schema::hasTable('settings')) {
            Schema::table('settings', function (Blueprint $table) {
                if (!Schema::hasIndex('settings', 'settings_key_index')) {
                    $table->index('key', 'settings_key_index');
                }
            });
        }

        // categories table
        if (Schema::hasTable('categories')) {
            Schema::table('categories', function (Blueprint $table) {
                if (!Schema::hasIndex('categories', 'categories_slug_index')) {
                    $table->index('slug', 'categories_slug_index');
                }
            });
        }

        // tags table
        if (Schema::hasTable('tags')) {
            Schema::table('tags', function (Blueprint $table) {
                if (!Schema::hasIndex('tags', 'tags_slug_index')) {
                    $table->index('slug', 'tags_slug_index');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('pages')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->dropIndexIfExists('pages_status_index');
                $table->dropIndexIfExists('pages_slug_index');
            });
        }

        if (Schema::hasTable('redirects')) {
            Schema::table('redirects', function (Blueprint $table) {
                $table->dropIndexIfExists('redirects_old_url_index');
                $table->dropIndexIfExists('redirects_is_active_index');
            });
        }

        if (Schema::hasTable('audit_logs')) {
            Schema::table('audit_logs', function (Blueprint $table) {
                $table->dropIndexIfExists('audit_logs_user_id_index');
                $table->dropIndexIfExists('audit_logs_created_at_index');
            });
        }

        if (Schema::hasTable('settings')) {
            Schema::table('settings', function (Blueprint $table) {
                $table->dropIndexIfExists('settings_key_index');
            });
        }

        if (Schema::hasTable('categories')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->dropIndexIfExists('categories_slug_index');
            });
        }

        if (Schema::hasTable('tags')) {
            Schema::table('tags', function (Blueprint $table) {
                $table->dropIndexIfExists('tags_slug_index');
            });
        }
    }
};
