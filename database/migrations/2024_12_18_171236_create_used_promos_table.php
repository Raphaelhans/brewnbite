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
        Schema::create('used_promos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_promo')->constrained('promos')->onDelete('cascade');
            $table->foreignId('id_htrans')->constrained('htrans')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('used_promos');
    }
};
