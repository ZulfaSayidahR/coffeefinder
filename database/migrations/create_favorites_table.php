<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('coffee_shop_id')
                ->constrained('coffee_shops')
                ->onDelete('cascade');

            $table->timestamps();

            // supaya tidak double favorit
            $table->unique(['user_id', 'coffee_shop_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};