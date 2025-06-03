<?php

use App\Sede;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Sede::create([
            'name' => 'Rectoria',
        ]);

        Sede::create([
            'name' => 'Zapopan',
        ]);

        Sede::create([
            'name' => 'Orizaba',
        ]);
    }
}
