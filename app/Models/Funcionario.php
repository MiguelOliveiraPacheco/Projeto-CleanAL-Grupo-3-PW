<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'password',
        'telefone',
        'morada',
        'anos_exp',
        'preco_hora',
        'gestor_id'
    ];

    public function gestor()
    {
        return $this->belongsTo(Gestor::class);
    }

    public function limpezas()
    {
        return $this->hasMany(Limpeza::class);
    }
}
