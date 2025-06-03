<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    public function alumnos() {
        return $this->hasMany(Alumno::class);
    }
}
