<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->string('qualification_card', 1000)->nullable()->after('qualification');
        });
    }

    public function down()
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->dropColumn('qualification_card');
        });
    }
};
