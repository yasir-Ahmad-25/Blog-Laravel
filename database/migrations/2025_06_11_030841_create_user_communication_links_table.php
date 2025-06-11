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
        Schema::create('user_communication_links', function (Blueprint $table) {
            $table->id('communication_id');
            $table->integer('user_id')->index();
            $table->string('facebook_link',255)->nullable();
            $table->string('x_link',255)->nullable();
            $table->string('github_link',255)->nullable();
            $table->string('linkedin_link',255)->nullable();
            $table->string('youtube_link',255)->nullable();
            $table->string('instagram_link',255)->nullable();
            $table->string('tiktok_link',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_communication_links');
    }
};
