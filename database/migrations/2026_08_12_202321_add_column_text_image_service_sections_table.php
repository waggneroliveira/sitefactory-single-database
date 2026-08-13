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
        Schema::table('service_sections', function (Blueprint $table) {
            $table->string('btn_title')->nullable();
            $table->string('link')->nullable();
            $table->string('title_first_image')->nullable();
            $table->text('description_first_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_sections', function (Blueprint $table) {
            //
        });
    }
};
