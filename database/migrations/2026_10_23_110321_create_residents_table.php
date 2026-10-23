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
        Schema::create('family_cards', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk', 16)->unique();
            $table->text('address');
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->string('village', 100);
            $table->string('district', 100);
            $table->string('regency', 100);
            $table->string('province', 100);
            $table->string('kk_path')->nullable();
            $table->timestamps();
        });

        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();

            $table->foreignId('family_card_id')
                ->constrained('family_cards')
                ->restrictOnDelete();

            $table->string('name', 200);
            $table->string('place_of_birth', 100);
            $table->date('date_of_birth');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->enum('blood_type', ['A', 'B', 'AB', 'O'])->nullable();
            $table->string('religion', 50);
            $table->enum('marital_status', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->string('occupation', 50);
            $table->string('ktp_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
        Schema::dropIfExists('family_cards');
    }
};
