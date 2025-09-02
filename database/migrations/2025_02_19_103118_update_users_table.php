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
            $table->char('id', 36)->change(); // Change ID to CHAR(36)
            $table->string('username', 50)->nullable()->after('id');
            $table->tinyInteger('email_verified')->default(0)->after('email');
            $table->string('country_code', 10)->nullable()->after('email_verified_at');
            $table->string('phone', 255)->nullable()->after('country_code');
            $table->tinyInteger('phone_verified')->default(0)->after('phone');
            $table->timestamp('phone_verified_at')->nullable()->after('phone_verified');
            $table->tinyInteger('user_type')->default(1)->after('password')->comment('1: Super Admin, 2: Admin, 3: Institute, 4: Student');
            $table->timestamp('last_login')->nullable()->after('user_type');
            $table->char('created_by', 36)->nullable()->after('created_at');
            $table->char('updated_by', 36)->nullable()->after('updated_at');
            $table->timestamp('deleted_at')->nullable()->after('updated_by');
            $table->char('deleted_by', 36)->nullable()->after('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'email_verified',
                'country_code',
                'phone',
                'phone_verified',
                'phone_verified_at',
                'user_type',
                'last_login',
                'created_by',
                'updated_by',
                'deleted_at',
                'deleted_by',
            ]);
        });
    }
};
