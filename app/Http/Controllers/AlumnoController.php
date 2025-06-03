<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Http\Requests\StoreAlumnoRequest;
use App\Mail\Bienvenida;
use App\Services\MatriculaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AlumnoController extends Controller
{
    protected $matriculaService;

    function __construct(MatriculaService $matriculaService)
    {
        $this->matriculaService = $matriculaService;
    }

    /**
     * Método que maneja la solicitud de listado de alumnos.
     *
     * @return Response devuevle una lista de alumnos páginada
     */
    function index() {
        return Alumno::orderBy('created_at', 'desc')->with('sede')->paginate(15);
    }

    /**
     * Método que maneja la solicitud para registrar un nuevo alumno
     *
     * @param StoreAlumnoRequest $request
     * @return Response Devuelve un mensaje de éxito o error según sea el caso.
     */
    function create(StoreAlumnoRequest $request)
    {

        $alumno = new Alumno($request->validated());
        $alumno->matricula = $this->matriculaService->generarMatricula();
        if($alumno->save()) {
            Mail::to($alumno->correo_electronico)->send(new Bienvenida($alumno));
            return response()->json([
                'code' => 201,
                'message'=> "Se creó el alumno con matrícula {$alumno->matricula}"
            ], 201);
        } else {
            return response()->json([
                'code' => 500,
                'message' => 'Ocurrio un error al guardar la información del alumno',
            ], 500);
        }
    }

    /**
     * Método que maneja la petición de búsqueda de un alumno por matrícula.
     *
     * @param string $matricula
     * @return Response Devuelde la información del alumno encontrado o un error 404
     */
    function find($matricula) 
    {
        $alumno = Alumno::where('matricula', $matricula)->with('sede')->first();

        if (!$alumno) {
            return response()->json(['status' => 404, 'message' => 'No se encontró la información'], 404);
        }

        return $alumno;
    }
}
