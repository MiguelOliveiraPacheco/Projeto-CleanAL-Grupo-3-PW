<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alojamento extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'morada', 'num_quartos', 'gestor_id'];

    public function gestor()
    {
        return $this->belongsTo(Gestor::class);
    }

    public function limpezas()
    {
        return $this->hasMany(Limpeza::class);
    }
}
