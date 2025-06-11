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
        Schema::create('engangement_details', function (Blueprint $table) {
            $table->id('engangement_id');
            $table->integer('user_id')->index();
            $table->integer('post_id');
            $table->integer('liked')->default(0);
            $table->integer('disliked')->default(0);
            $table->string('comment',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engangement_details');
    }
};
