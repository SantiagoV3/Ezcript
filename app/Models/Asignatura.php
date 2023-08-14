<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{   protected $table = 'asignatura';
    protected $primaryKey = 'id';
    public $incrementing = true;

    use HasFactory;

    protected $fillable = [
        'asg_nombre',
        
    ];

    public function cursos(){
        return $this->hasMany(Curso::class, 'asg_id', 'id');
    }

  
}
