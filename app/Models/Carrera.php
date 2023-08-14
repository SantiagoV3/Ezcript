<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{   protected $table = 'carrera';
    protected $primaryKey = 'id';
    public $incrementing = true;

    use HasFactory;

    protected $fillable = [
        'car_nombre',
        
    ];

    public function cursos(){
        return $this->hasMany(Curso::class, 'car_id', 'id');
    }

  
}