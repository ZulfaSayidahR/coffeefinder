<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coffee_shops', function (Blueprint $table) {

            $table->id();

            // DATA UTAMA
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('alamat');

            // HARGA
            $table->integer('harga_min');
            $table->integer('harga_max');

            // KATEGORI
            $table->string('kategori');
            $table->string('suasana');

            // FOTO
            $table->string('foto')->nullable();

            // LINK MENU GOOGLE DRIVE
            $table->string('menu_link')->nullable();

            // INSTAGRAM
            $table->string('sosmed_instagram')->nullable();

            // KOORDINAT MAP
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffee_shops');
    }
};