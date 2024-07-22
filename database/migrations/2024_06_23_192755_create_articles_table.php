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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 8, 2)->nullable();
            $table->json('colores')->nullable();
            $table->json('tallas')->nullable();
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('seccion_id')->onDelete('cascade');
            $table->timestamps();

            $table->foreign('seccion_id')->references('id')->on('secciones')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
