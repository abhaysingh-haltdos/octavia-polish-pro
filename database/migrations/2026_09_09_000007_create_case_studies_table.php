<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->index();
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->string('client_name');
            $table->string('client_location')->nullable();
            $table->string('industry')->index();
            $table->string('service_category')->index();
            $table->string('solution_category')->nullable();
            $table->json('technologies')->nullable();
            $table->string('project_duration')->nullable();
            $table->string('team_size')->nullable();
            $table->string('engagement_model')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('hero_banner_image')->nullable();
            $table->boolean('is_featured')->default(false)->index();
            $table->boolean('is_latest')->default(false);
            $table->text('short_challenge')->nullable();
            $table->text('result_highlight')->nullable();
            $table->longText('business_overview')->nullable();
            $table->json('client_challenges')->nullable();
            $table->json('business_goals')->nullable();
            $table->json('project_objectives')->nullable();
            $table->longText('our_approach')->nullable();
            $table->json('discovery_process')->nullable();
            $table->json('solution_architecture')->nullable();
            $table->json('implementation_process')->nullable();
            $table->json('key_features')->nullable();
            $table->json('kpis')->nullable();
            $table->json('metrics')->nullable();
            $table->json('testimonial')->nullable();
            $table->string('status')->default('published')->index();
            $table->timestamp('published_at')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
