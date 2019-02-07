<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->('UsruariosTableSeeder');
        //$this->call(RolesTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
        //$this->call(ServiciosTableSeeder::class);
        //$this->call(PrevisionesTableSeeder::class);
        //$this->call(EstadosTableSeeder::class);
    }
}
