<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    public $table = "alumnos";
    protected $primaryKey = 'alu_id';
    public $incrementing = true;

    use HasFactory;

    public $fillable = [
            'alu_rut',
            'alu_nombre',
            'alu_apellido_paterno',
            'alu_apellido_materno',
            'alu_correo',
            'alu_foto',
            'alu_pagina_web',
            'alu_descripcion',
            'alu_contrasena'
        ];

    public function roles(){
        return $this->hasOne(Rol::class, 'alu_id', 'rol_id');
    }

    public function cursos(){
        return $this->hasOne(Curso::class, 'alu_id', 'cur_id');
    }
}
