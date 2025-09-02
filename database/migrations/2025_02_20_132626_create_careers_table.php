<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title'); // Job Title
            $table->string('slug')->unique(); // Unique Slug
            $table->text('description'); // About this Role
            $table->text('short_description')->nullable(); // Short Description
            $table->text('qualification')->nullable(); // Qualification
            $table->text('skills_requirements')->nullable(); // Skills & Requirements
            $table->text('education_experience')->nullable(); // Education & Experience
            $table->text('compensation')->nullable(); // Compensation
            $table->timestamps(); // created_at & updated_at
            $table->softDeletes(); // deleted_at (for soft delete)
            $table->char('created_by', 36)->nullable(); // Created By (UUID)
            $table->char('updated_by', 36)->nullable(); // Updated By (UUID)
            $table->char('deleted_by', 36)->nullable(); // Deleted By (UUID)
        });
    }

    public function down()
    {
        Schema::dropIfExists('careers');
    }
};
