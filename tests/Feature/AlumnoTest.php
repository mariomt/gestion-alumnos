<?php

namespace Tests\Feature;

use App\Alumno;
use App\ConsecutivoMatricula;
use App\Mail\Bienvenida;
use App\Services\MatriculaService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AlumnoTest extends TestCase
{
    
    protected $matriculaService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->matriculaService = new MatriculaService();

        Mail::fake();
    }

    /**
     * Test que revisa que el endpoint que lista los alumnos funcione
     *
     * @return void
     */
    public function testListaAlumnos()
    {
        $response = $this->get('/api/alumnos');

        $response->assertJsonStructure([
            'current_page',
            'data',
            'first_page_url',
            'from',
            'last_page',
            'last_page_url',
            'next_page_url',
            'path',
            'per_page',
            'prev_page_url',
            'to',
            'total'
        ])->assertStatus(200);
    }

    /**
     * Test que valida que el endpoint para generar alumnos funcione
     *
     * @return void
     */
    public function testPuedeCrearAlumno()
    {
        $correo = 'gilbertomurillo@outlook.es';

        $response = $this->postJson('/api/alumnos', [
            'nombre' => 'Mario',
            'apellido' => 'Murillo',
            'correo_electronico' => $correo,
            'sede_id' => 1,
        ]);

        $response->assertStatus(201)->assertJsonStructure(['code', 'message']);
        Mail::assertSent(Bienvenida::class, function($mail) use($correo) {
            return $mail->hasTo($correo);
        });
        $this->assertDatabaseHas('alumnos', ['correo_electronico' => $correo]);

        $alumno = Alumno::where('correo_electronico', $correo);
        $alumno->delete();
    }

    /**
     * Test que valida que el generador de mátriculas funcione correctamente
     *
     * @return void
     */
    public function testGeneraMatriculaParaUnAlumno()
    {
        $anio = 2020;
        Carbon::setTestNow(Carbon::create($anio, 10, 9, 12, 0, 0));

        $matricula = $this->matriculaService->generarMatricula();

        $this->assertEquals('UNI20201', $matricula);

        $this->assertDatabaseHas('consecutivos_matriculas', [
            'anio' => $anio,
            'consecutivo' => 1,
        ]);

        Carbon::setTestNow();
        $consecutivo = ConsecutivoMatricula::where('anio', $anio);
        if ($consecutivo) {
            $consecutivo->delete();
        }
    }

    /**
     * Test que valida que el endpoint para buscar un alumno por matricula funcione
     *
     * @return void
     */
    public function testBuscaAlAlumnoPorMatricula()
    {
        $alumno = Alumno::all()->first();
        $creado = false;

        if(!$alumno) {
            $creado = true;
            $alumno = new Alumno([
                'matricula' => $this->matriculaService->generarMatricula(),
                'nombre' => 'Mario',
                'apellido' => 'Murillo',
                'correo_electronico' => 'example@test.com',
                'sede_id' => 3,
            ]);
            $alumno->save();
        }

        $response = $this->get("/api/alumnos/{$alumno->matricula}");
        $response->assertJsonStructure([
            'id',
            'matricula',
            'nombre',
            'apellido',
            'apellido_materno',
            'correo_electronico',
            'sede_id',
            'created_at',
            'updated_at',
            'sede',
        ])->assertStatus(200);

        if ($creado) {
            $alumno->delete();
        }
    }
}
