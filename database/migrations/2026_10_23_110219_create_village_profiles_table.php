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
        Schema::create('village_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('code', 30)->nullable();
            $table->string('village', 100);
            $table->string('district', 100);
            $table->string('regency', 100);
            $table->string('province', 100);
            $table->text('address');
            $table->string('postal_code', 5);
            $table->string('phone', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('youtube', 100)->nullable();
            $table->string('tiktok', 100)->nullable();
            $table->string('instagram', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('logo_path')->nullable();
            $table->text('description');
            $table->longText('history');
            $table->text('vision');
            $table->text('mission');
            $table->timestamps();
        });

        Schema::create('village_officials', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('photo_path')->nullable();
            $table->string('position', 100);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_profiles');
        Schema::dropIfExists('village_officials');
    }
};
