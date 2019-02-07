<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    $pass="1234";
 		
 		User::create([
        	'nombre' => 'Patricia Elizabeth',
            'paterno' => 'Araya',
            'materno' => 'Fuentes', 
            'full_nombre' => "Patricia Elizabeth Araya Fuentes",
            'rut' => '10.223.922',
            'username' => 'paraya',
            'password' => $pass,
            'rol_id' => '2',
            'remember_token' => str_random(10),
        ]);

 		User::create([
        	'nombre' => 'Paulette Carolina',
            'paterno' => 'Madrid',
            'materno' => 'Madrid', 
            'full_nombre' => "Paulette Carolina Madrid Madrid",
            'rut' => '15.610.535',
            'username' => 'pmadrid',
            'password' => $pass,
            'rol_id' => '2',
            'remember_token' => str_random(10),
        ]);

 		User::create([
        	'nombre' => 'Ximena del Carmen',
            'paterno' => 'Sepúlveda',
            'materno' => 'Villegas', 
            'full_nombre' => "Ximena del Carmen Sepúlveda Villegas",
            'rut' => '18.940.785',
            'username' => 'xsepulveda',
            'password' => $pass,
            'rol_id' => '2',
            'remember_token' => str_random(10),
        ]);

 		User::create([
        	'nombre' => 'Andrea Isabel',
            'paterno' => 'Pizarro',
            'materno' => 'López', 
            'full_nombre' => "Andrea Isabel Pizarro López",
            'rut' => '13.873.926',
            'username' => 'apizarro',
            'password' => $pass,
            'rol_id' => '2',
            'remember_token' => str_random(10),
        ]);


        User::create([
        	'nombre' => 'Nadia Alejandra',
            'paterno' => 'Escobar',
            'materno' => 'Pérez', 
            'full_nombre' => "Nadia Alejandra Escobar Pérez",
            'rut' => '13.222.839',
            'username' => 'nescobar',
            'password' => $pass,
            'rol_id' => '2',
            'remember_token' => str_random(10),
        ]);

 		
 		User::create([
        	'nombre' => 'Paula Andrea',
            'paterno' => 'Araya',
            'materno' => 'Alvarez', 
            'full_nombre' => "Paula Andrea Araya Alvarez",
            'rut' => '13.744.947',
            'username' => 'parayaa',
            'password' => $pass,
            'rol_id' => '3',
            'remember_token' => str_random(10),
        ]);    

		User::create([
        	'nombre' => 'Sandra Katherine',
            'paterno' => 'Vega',
            'materno' => 'Díaz', 
            'full_nombre' => "Sandra Katherine Vega Díaz",
            'rut' => '13.422.362',
            'username' => 'svega',
            'password' => $pass,
            'rol_id' => '3',
            'remember_token' => str_random(10),
        ]);

    }
}
