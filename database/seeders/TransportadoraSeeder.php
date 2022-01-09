<?php

namespace Database\Seeders;

use App\Models\Acesso;
use App\Models\Transportadora;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TransportadoraSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Transportadora::create(array('nome'=>'Leva Já'));
        Transportadora::create(array('nome'=>'Transportadora Expresso'));
        Transportadora::create(array('nome'=>'Max Transportadora'));
        Transportadora::create(array('nome'=>'Leve Já Transportes'));
        Transportadora::create(array('nome'=>'Entrega Já'));
        Transportadora::create(array('nome'=>'Entrega Rápida'));
        Transportadora::create(array('nome'=>'Transporte Bem'));
        Transportadora::create(array('nome'=>'Super Express'));
        Transportadora::create(array('nome'=>'Expresso Real'));
        Transportadora::create(array('nome'=>'Transporte Real'));
    }
}





















