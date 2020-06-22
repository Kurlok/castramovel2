<?php

use Illuminate\Database\Seeder;

class ResidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('residencias')->insert([
            'logradouro' => 'Rua Jesuíno Marcondes',
            'bairro' => 'Centro',
            'numero' => '1221',
            'complemento' => '',
        ]);

        DB::table('residencias')->insert([
            'logradouro' => 'Rua Gabriel Prestes',
            'bairro' => 'Vila Rosa',
            'numero' => '687',
            'complemento' => 'Apto 302',
        ]);
    }
}
