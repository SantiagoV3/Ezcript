<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    public $table = "nivel";
    protected $primaryKey = 'id';
    public $incrementing = true;

    use HasFactory;

    public $fillable = ['niv_nombre','niv_activo']; 
}
