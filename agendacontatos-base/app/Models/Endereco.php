<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'user_id'
    ];

    protected $table = "endereco";
    public $timestamps = false;

}
