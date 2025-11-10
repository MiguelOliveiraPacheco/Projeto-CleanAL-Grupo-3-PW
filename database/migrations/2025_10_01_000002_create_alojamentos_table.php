<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('alojamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('morada');
            $table->integer('num_quartos');
            $table->foreignId('gestor_id')->constrained('gestores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('alojamentos');
    }
};
