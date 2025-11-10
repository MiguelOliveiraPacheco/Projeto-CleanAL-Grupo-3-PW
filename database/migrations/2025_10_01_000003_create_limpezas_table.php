<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('limpezas', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->time('hora');
            $table->enum('estado', ['agendada', 'em_progresso', 'concluida', 'cancelada'])->default('agendada');
            $table->string('descricao')->nullable();
            $table->integer('duracao_estimada_min')->nullable();
            $table->foreignId('alojamento_id')->constrained('alojamentos')->onDelete('cascade');
            $table->foreignId('funcionario_id')->nullable()->constrained('funcionarios')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('limpezas');
    }
};
