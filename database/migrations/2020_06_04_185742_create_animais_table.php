<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animais', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->string('especie');
            $table->string('genero');
            $table->integer('idade');
            $table->float('peso');
            $table->string('porte');
            $table->text('outras_informacoes')->nullable();
            $table->string('fonte_agua');
            $table->string('alimentacao');
            $table->boolean('acesso_supervisionado_rua');
            $table->text('historico_viagens')->nullable();
            $table->string('cidade_natal')->nullable();
            $table->string('animais_predados')->nullable();
            $table->boolean('sinais_agressao_fisica');
            $table->boolean('alimentacao_inadequada');
            $table->boolean('restricao_espaco');
            $table->boolean('acumulo_animais');
            $table->boolean('ma_higiene');
            $table->boolean('escore_corporal_inadequado');
            $table->boolean('ambiente_permanencia_insalubre');
            $table->boolean('veterinario_regular');
            $table->boolean('agressao_psicologica');
            $table->boolean('membro_familiar');
            $table->boolean('violento_animais');
            $table->boolean('contato_silvestres');
            $table->boolean('mordeduras_humanos');
            $table->boolean('contato_animais_rua');
            $table->boolean('acesso_interior_residencia');
            $table->boolean('acesso_horta');
            $table->boolean('contato_criancas');
            $table->boolean('acesso_terreno_baldio');
            $table->boolean('acesso_matas');
            $table->boolean('vacinacao_regular');
            $table->boolean('controle_endoparasitas');
            $table->boolean('controle_ectoparasitas');
            $table->boolean('coleira_repelente');
            $table->boolean('presenca_ectoparasitas');
            $table->boolean('presenca_endoparasitas');
            $table->boolean('presenca_zoonose');
            $table->boolean('controle_zoonose');
            $table->boolean('automedicacao');
            $table->boolean('funcao_especifica');

            $table->unsignedBigInteger('proprietario_id')->nullable();
            $table->unsignedBigInteger('residencia_id')->nullable();
            $table->foreign('proprietario_id')->references('id')->on('proprietarios');
            $table->foreign('residencia_id')->references('id')->on('residencias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animais');
    }
}
