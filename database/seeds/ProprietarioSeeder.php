<?php

use Illuminate\Database\Seeder;

class ProprietarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proprietarios')->insert(
            [
                'nome' => 'Felipe Augusto Barcelos',
                'sus' => '1234567890123',
                'data_nascimento' => '1990-02-16',
                'cpf' => '052.068.439-70',
                'telefone' => '(42) 93242-4213',
                'telefone_alternativo' => '(41) 99999-9999',
                'renda_familiar' => 'Até 2',
                'programa_renda' => true
            ]
        );

        DB::table('proprietarios')->insert(
            [
                'nome' => 'Alexandre dos Santos',
                'sus' => '3333333333333',
                'data_nascimento' => '1995-03-12',
                'cpf' => '333.555.777-99',
                'telefone' => '(42) 99922-4225',
                'telefone_alternativo' => '(41) 98297-9259',
                'renda_familiar' => 'Até 2',
                'programa_renda' => true
            ]
        );
    }
}
