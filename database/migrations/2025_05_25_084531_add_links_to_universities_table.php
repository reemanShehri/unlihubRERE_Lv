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
        Schema::table('universities', function (Blueprint $table) {
            //
            $table->string('official_website')->nullable();
            $table->string('student_portal')->nullable();
            $table->string('moodle_link')->nullable();
            $table->string('facebook_page')->nullable();
            $table->string('telegram_group')->nullable();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('universities', function (Blueprint $table) {
            //
        });
    }
};
