<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        // Add slug columns
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'slug')) {
                $table->string('slug')->nullable()->after('name');
            }
        });

        Schema::table('experiences', function (Blueprint $table) {
            if (!Schema::hasColumn('experiences', 'slug')) {
                $table->string('slug')->nullable()->after('title');
            }
        });

        Schema::table('certificates', function (Blueprint $table) {
            if (!Schema::hasColumn('certificates', 'slug')) {
                $table->string('slug')->nullable()->after('name');
            }
        });

        // Generate slugs for existing records
        DB::table('projects')->get()->each(function ($project) {
            DB::table('projects')
                ->where('id', $project->id)
                ->update(['slug' => Str::slug($project->name . '-' . $project->id)]);
        });

        DB::table('experiences')->get()->each(function ($experience) {
            DB::table('experiences')
                ->where('id', $experience->id)
                ->update(['slug' => Str::slug($experience->title . '-' . $experience->id)]);
        });

        DB::table('certificates')->get()->each(function ($certificate) {
            DB::table('certificates')
                ->where('id', $certificate->id)
                ->update(['slug' => Str::slug($certificate->name . '-' . $certificate->id)]);
        });

        // Make slug unique after populating
        Schema::table('projects', function (Blueprint $table) {
            $table->unique('slug');
        });

        Schema::table('experiences', function (Blueprint $table) {
            $table->unique('slug');
        });

        Schema::table('certificates', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });

        Schema::table('experiences', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });

        Schema::table('certificates', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};
