<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datos = [
            array( 
                'apellido' => "Stampa",
                'nombre' =>  "Ignacio",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array( 
                'apellido' => "Rodriguez",
                'nombre' =>  "Yago",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array( 
                'apellido' => "Marina",
                'nombre' =>  "José Antonio",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array( 
                'apellido' => "Serra",
                'nombre' =>  "Clara",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array( 
                'apellido' => "Fisher",
                'nombre' =>  "Mark",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array( 
                'apellido' => "Mendoza",
                'nombre' =>  "Eduardo",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array( 
                'apellido' => "Onega",
                'nombre' =>  "Sonsoles",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array( 
                'apellido' => "Yarros",
                'nombre' =>  "Rebeca",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array( 
                'apellido' => "Vierci",
                'nombre' =>  "Pablo",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array( 
                'apellido' => "Maas",
                'nombre' =>  "Sarah",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            )
        ];

        DB::table('authors')->insert($datos);
    }
}