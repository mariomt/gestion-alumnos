<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsecutivoMatricula extends Model
{
    protected $table = 'consecutivos_matriculas';
    protected $fillable = ['anio', 'consecutivo'];
}
