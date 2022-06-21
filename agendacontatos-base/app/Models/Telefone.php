<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ddd',
        'telefone',
        'user_id'
    ];

    protected $table = "tel";
    public $timestamps = false;
}
