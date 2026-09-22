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
        Schema::table('announcements', function (Blueprint $table) {
            $table->foreignId('tenant_id')
                ->nullable()
                ->change();

            if (!Schema::hasColumn('announcements', 'display_location')) {
                $table->enum('display_location', ['web', 'panel', 'both'])
                    ->default('web');
            }

            if (!Schema::hasColumn('announcements', 'type')) {
                $table->string('type')->default('general');
            }

            if (!Schema::hasColumn('announcements', 'starts_at')) {
                $table->dateTime('starts_at')->nullable();
            }

            if (!Schema::hasColumn('announcements', 'ends_at')) {
                $table->dateTime('ends_at')->nullable();
            }

            if (!Schema::hasColumn('announcements', 'text')) {
                $table->text('text')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            //
        });
    }
};
