<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $table = 'usuario';
    public $primaryKey = 'pef_id';
    public $incrementing = true;
    use HasFactory;

    protected $fillable = [
        'pef_rut',
        "pef_nombre",
        'pef_telefono',
        'pef_correo',
        'rol_id',
        'usr_id',
        "cur_id"
    ];

    public function roles(){
        return $this->hasOne(Rol::class, 'rol_id', 'rol_id');
    }

    public function cursos(){
        return $this->hasOne(Curso::class, 'cur_id', 'id');
    }

    public function users(){
        return $this->hasOne(Curso::class, 'usr_id', 'id');
    }
}
