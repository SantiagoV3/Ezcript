<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    
    public $table = "curso";
    protected $primaryKey = 'id';
    public $incrementing = true;

    use HasFactory;

    public $fillable = [
        'cur_nombre',
        'cur_profesor',
        'cur_descripcion']; //Los campos que pueden ser llenados

    public function alumnos(){
        return $this->hasMany(Usuario::class, 'id', 'cur_id');
    }
}
