<?php

use App\Servicio;
use Illuminate\Database\Seeder;

class ServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicio::create(['nombre' => 'CIRUGIA']);
        Servicio::create(['nombre' => 'CIRUGIA MAXILO FACIAL']);
        Servicio::create(['nombre' => 'DENTAL']);
        Servicio::create(['nombre' => 'GINECOLOGIA']);
        Servicio::create(['nombre' => 'MEDICINA']);
        Servicio::create(['nombre' => 'NEONATOLOGIA']);
        Servicio::create(['nombre' => 'NEUROCIRUGIA']);
        Servicio::create(['nombre' => 'OBSTETRICIA']);
        Servicio::create(['nombre' => 'OFTALMOLOGIA']);
        Servicio::create(['nombre' => 'OTORRINOLARINGOLOGIA']);
        Servicio::create(['nombre' => 'PEDIATRIA']);
        Servicio::create(['nombre' => 'PENSIONADO']);
        Servicio::create(['nombre' => 'PSIQUIATRIA ADULTO']);
        Servicio::create(['nombre' => 'PSIQUIATRIA INFANTIL']);
        Servicio::create(['nombre' => 'TRAUMATOLOGIA']);
        Servicio::create(['nombre' => 'UNIDAD DE CUIDADO ESPECIALES (UCE)']);
        Servicio::create(['nombre' => 'UNIDAD DE CUIDADO INTENSIVO (UCI)']);
        Servicio::create(['nombre' => 'UNIDAD DE TRATAMIENTO INTERMEDIO (UTI)']);
        Servicio::create(['nombre' => 'UNIDAD DE CUIDADO PREFERENCIALES PEDIATRICOS (UCPP)']);
        Servicio::create(['nombre' => 'UNIDAD DE TRATAMIENTO INTERMEDIO NEONATOLOGIA']);
        Servicio::create(['nombre' => 'UROLOGIA']);
        Servicio::create(['nombre' => 'URGENCIA']);
        Servicio::create(['nombre' => 'INMUNOLOGIA']);
        Servicio::create(['nombre' => 'SALUD MENTAL']);
        Servicio::create(['nombre' => 'DERMATOLOGIA']);
    }
}
