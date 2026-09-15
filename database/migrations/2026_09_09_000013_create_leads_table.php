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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('submission_id', 40)->unique()->index();
            $table->string('source_form')->default('Website Inquiry');
            $table->text('source_url')->nullable();
            $table->string('full_name');
            $table->string('email')->index();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('service_category')->nullable();
            $table->text('message')->nullable();
            $table->text('admin_notes')->nullable();
            $table->string('status')->default('new')->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
