<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'matricula',
        'nombre',
        'apellido',
        'apellido_materno',
        'correo_electronico',
        'sede_id'
    ];
    
    public function sede() {
        return $this->belongsTo(Sede::class);
    }
}
