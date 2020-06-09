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
                'cpf' => '05206843970',
                'telefone' => '(42) 93242-4213',
                'telefone_alternativo' => '(41) 99999-9999',
            ]
        );
    }
}
