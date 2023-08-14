<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{   protected $table = 'periodo';
    protected $primaryKey = 'id';
    public $incrementing = true;

    use HasFactory;

    protected $fillable = [
        'per_anio',
        'per_semestre'
        
    ];

    public function cursos(){
        return $this->hasMany(Curso::class, 'per_id', 'id');
    }

  
}