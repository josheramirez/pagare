<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'nombre' => 'Marcelo',
            'paterno' => 'Esquivel',
            'materno' => 'Tapia',
            'full_nombre' => "Marcelo Esquivel Tapia",
            'rut' => '16189578',
            'username' => 'admin',
            'password' => 'secret',
            'rol_id' => '1',
            'remember_token' => str_random(10),
        ]);

        factory(User::class)->create([
            'nombre' => 'Prueba',
            'paterno' => 'Prueba',
            'materno' => 'Prueba',
            'full_nombre' => "Prueba Prueba Prueba",
            'rut' => '22222222',
            'username' => 'prueba',
            'password' => 'prueba',
            'rol_id' => '2',
            'remember_token' => str_random(10),
        ]);

        factory(User::class)->create([
            'nombre' => 'supervisor',
            'paterno' => 'supervisor',
            'materno' => 'supervisor',
            'full_nombre' => "supervisor supervisor supervisor",
            'rut' => '33333333',
            'username' => 'supervisor',
            'password' => 'supervisor',
            'rol_id' => '3',
            'remember_token' => str_random(10),
        ]);

        /*factory(User::class)->create([
            'nombre' => 'Jonathan',
            'paterno' => 'Rojas',
            'materno' => 'Rojas',
            'full_nombre' => "Jonathan Rojas Rojas",
            'rut' => '22222222',
            'username' => 'jonathan',
            'password' => 'secret',
            'rol_id' => '2',
            'remember_token' => str_random(10),
        ]);

        factory(User::class)->create([
            'nombre' => 'Gonzalo',
            'paterno' => 'Esquivel',
            'materno' => 'Tapia',
            'full_nombre' => "Gonzalo Esquivel Tapia",
            'rut' => '33333333',
            'username' => 'gonzalo',
            'password' => 'secret',
            'rol_id' => '3',
            'remember_token' => str_random(10),
        ]);*/

        //factory(User::class)->times(20)->create();
    }
}
