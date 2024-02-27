<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datos = [
            array( 
                'descripcion' =>  "disponible"
            ),
            array( 
                'descripcion' =>  "prestado"
            ),
            array( 
                'descripcion' =>  "reservado"
            ),
        ];

        DB::table('states')->insert($datos);
    }
}