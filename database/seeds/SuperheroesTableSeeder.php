<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SuperheroesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('superheroes')->insert([
            [
                'nombre'=>'Superman',
                'poder'=>'vuela',
                'creador'=>'salma',
                'villano'=>'Josefina',
                'created_at'=> now(),
                'updated_at'=> now()

            ],
            [
                'nombre'=>'Batman',
                'poder'=>'Desaparece',
                'creador'=>'María',
                'villano'=>'Salma',
                'created_at'=> now(),
                'updated_at'=> now()

            ],
            [
                'nombre'=>'Tiburon',
                'poder'=>'Desaparece',
                'creador'=>'Guadalupe',
                'villano'=>'Ana',
                'created_at'=> now(),
                'updated_at'=> now()

            ],


       ]);  
      }
}
