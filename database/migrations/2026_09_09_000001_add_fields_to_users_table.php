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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->unique()->after('id');
            $table->string('role')->default('author')->after('email');
            $table->string('status')->default('active')->after('role');
            $table->string('avatar')->nullable()->after('status');
            $table->text('bio')->nullable()->after('avatar');
            $table->string('designation')->nullable()->after('bio');
            $table->timestamp('last_login_at')->nullable()->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']);
            $table->dropColumn(['username', 'role', 'status', 'avatar', 'bio', 'designation', 'last_login_at']);
        });
    }
};
