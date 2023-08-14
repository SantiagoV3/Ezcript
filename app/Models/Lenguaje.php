<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lenguaje extends Model
{
    public $table = "lenguaje";
    protected $primaryKey = 'id';
    public $incrementing = true;

    use HasFactory;

    public $fillable = ['lgj_nombre','lgj_descripcion']; //Los campos que pueden ser llenados
}
