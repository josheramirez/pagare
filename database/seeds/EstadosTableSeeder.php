<?php

use App\Estado;
use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create(['tipo' => 'Abierto']);
        Estado::create(['tipo' => 'Cerrado']);
        Estado::create(['tipo' => 'Anulado']);
    }
}
