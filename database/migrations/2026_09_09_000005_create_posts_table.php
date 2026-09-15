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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->index();
            $table->string('title');
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('category_name')->default('Engineering');
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('author_name')->default('Octavia Engineering Team');
            $table->string('author_role')->nullable();
            $table->string('author_avatar')->nullable();
            $table->text('author_bio')->nullable();
            $table->json('author_socials')->nullable();
            $table->string('read_time')->default('5 min read');
            $table->text('excerpt')->nullable();
            $table->text('summary')->nullable();
            $table->json('content')->nullable();
            $table->string('featured_image')->nullable();
            $table->boolean('is_featured')->default(false)->index();
            $table->boolean('is_trending')->default(false);
            $table->boolean('is_popular')->default(false);
            $table->unsignedBigInteger('views')->default(0);
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
        Schema::dropIfExists('posts');
    }
};
