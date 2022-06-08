<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('projects', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('theme');
            $table->foreignId('discipline_id')->constrained('disciplines');
            $table->foreignId('user_id')->constrained('users');
            $table->string('external_id');
            $table->foreignId('preview_id')->nullable()->constrained('files');
            $table->date('publish_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
        Storage::disk('public')->deleteDirectory(Project::PREVIEW_DIRECTORY);
        Storage::deleteDirectory(Project::FILES_DIRECTORY);
    }
};
