<?php

namespace App\Services;

use App\ConsecutivoMatricula;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MatriculaService
{
    /**
     * Método que genera una nueva matrícula.
     * 
     * Este método genera una nueva matrícula para el alumno y bloquea la tabla para evitar que se duplique la matrícula.
     */
    public function generarMatricula() {
        $prefijo = 'UNI';
        $anioActual = Carbon::now()->year;
        try
        {
            $consecutivoAnual = DB::transaction(function () use ($anioActual) {
                $consecutivo = ConsecutivoMatricula::lockForUpdate()
                ->where('anio', $anioActual)
                ->first();

                if (!$consecutivo) {
                    $consecutivo = ConsecutivoMatricula::create(['anio' => $anioActual, 'consecutivo' => 1]);
                    return 1;
                }
                $consecutivo->increment('consecutivo');
                return $consecutivo->consecutivo;
            });

            return "{$prefijo}{$anioActual}{$consecutivoAnual}";
        }
        catch (\Exception $ex)
        {
            Log::error($ex);
            return null;
        }
    }
}