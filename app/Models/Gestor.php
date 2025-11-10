<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestor extends Model
{
    use HasFactory;
    protected $table = 'gestores';


    protected $fillable = ['nome', 'nif', 'telefone'];

    public function alojamentos()
    {
        return $this->hasMany(Alojamento::class);
    }

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }
}
