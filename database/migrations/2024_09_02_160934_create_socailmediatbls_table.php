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
        Schema::create('socailmediatbls', function (Blueprint $socailmedia) {
            $socailmedia->id();
            $socailmedia->string('facebook_url');
            $socailmedia->string('instagram_url');
            $socailmedia->string('tiktok_url');
            $socailmedia->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socailmediatbls');
    }
};
