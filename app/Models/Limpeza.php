<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Limpeza extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'hora',
        'estado',
        'descricao',
        'duracao_estimada_min',
        'alojamento_id',
        'funcionario_id'
    ];

    public function alojamento()
    {
        return $this->belongsTo(Alojamento::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
