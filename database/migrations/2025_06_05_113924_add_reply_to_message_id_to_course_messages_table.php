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
        Schema::table('course_messages', function (Blueprint $table) {
         $table->unsignedBigInteger('reply_to_message_id')->nullable()->after('message');

        // إذا حابب تعمل مفتاح أجنبي يربط الرسائل نفسها
        $table->foreign('reply_to_message_id')->references('id')->on('course_messages')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_messages', function (Blueprint $table) {
            //
             $table->dropForeign(['reply_to_message_id']);
        $table->dropColumn('reply_to_message_id');
        });
    }
};
