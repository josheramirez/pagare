<?php

use App\Prevision;
use Illuminate\Database\Seeder;

class PrevisionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prevision::create(['nombre' => 'FONASA A']);
        Prevision::create(['nombre' => 'FONASA B']);
        Prevision::create(['nombre' => 'FONASA C']);
        Prevision::create(['nombre' => 'FONASA D']);
        Prevision::create(['nombre' => 'ISAPRE CRUZ BLANCA']);
        Prevision::create(['nombre' => 'ISAPRE NUEVA MAS VIDA']);
        Prevision::create(['nombre' => 'ISAPRE BANMEDICA']);
        Prevision::create(['nombre' => 'ISAPRE CONSALUD']);
        Prevision::create(['nombre' => 'ISAPRE COLMENA']);
        Prevision::create(['nombre' => 'ISAPRE VIDA TRES']);
        Prevision::create(['nombre' => 'ISAPRE FUNDACION']);
        Prevision::create(['nombre' => 'ISAPRE RIO BLANCO']);
        Prevision::create(['nombre' => 'ISAPRE FUSAT']);
        Prevision::create(['nombre' => 'ISAPRE FERRO SALUD']);
        Prevision::create(['nombre' => 'ISAPRE SAN LORENZO']);
        Prevision::create(['nombre' => 'ISAPRE ALMIRANTE NEFF']);
        Prevision::create(['nombre' => 'DIPRECA']);
        Prevision::create(['nombre' => 'CAPREDENA']);
        Prevision::create(['nombre' => 'SIN PREVISION']);
        Prevision::create(['nombre' => 'OTRA']);
        Prevision::create(['nombre' => 'MODALIDAD INSIITUCIONAL']);
        Prevision::create(['nombre' => 'MODALIDAD LIBRE ELECCION']);
    }
}
