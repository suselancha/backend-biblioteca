<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datos = [
            array( 
                'isbn' =>  "9789504976752",
                'titulo' => 'La felicidad',
                'portada' => 'portaja.jpg',
                'author_id' => 1,
                'editorial_id' => 1,
                'state_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array( 
                'isbn' =>  "9788418556173",
                'titulo' => 'Entrena el cerebro emocional',
                'portada' => 'portaja.jpg',
                'author_id' => 2,
                'editorial_id' => 2,
                'state_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array( 
                'isbn' =>  "9789501206029",
                'titulo' => 'Programa leer para comprender',
                'portada' => 'portaja.jpg',
                'author_id' => 3,
                'editorial_id' => 3,
                'state_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array( 
                'isbn' =>  "9789871524587",
                'titulo' => 'Amor o adiccion',
                'portada' => 'portaja.jpg',
                'author_id' => 4,
                'editorial_id' => 4,
                'state_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array( 
                'isbn' =>  "9789501205701",
                'titulo' => 'Respuesta de lo real',
                'portada' => 'portaja.jpg',
                'author_id' => 5,
                'editorial_id' => 5,
                'state_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array( 
                'isbn' =>  "9789878941905",
                'titulo' => 'Monólogo compartido con la locura',
                'portada' => 'portaja.jpg',
                'author_id' => 6,
                'editorial_id' => 6,
                'state_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array( 
                'isbn' =>  "9789878941912",
                'titulo' => 'Desafios del deseo',
                'portada' => 'portaja.jpg',
                'author_id' => 7,
                'editorial_id' => 7,
                'state_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            )
        ];

        DB::table('books')->insert($datos);
    }
}