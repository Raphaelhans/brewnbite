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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('id_category')->constrained('categories')->onDelete('cascade');
            $table->foreignId('id_subcategory')->constrained('subcategories')->onDelete('cascade');
            $table->integer('price');
            $table->integer('stock');
            $table->decimal('rating', 3, 2)->default(0);
            $table->text('description')->nullable();
            $table->string('weather')->nullable();
            $table->string('img_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
