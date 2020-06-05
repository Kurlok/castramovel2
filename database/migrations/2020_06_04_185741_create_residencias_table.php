<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residencias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('data_visita');
            $table->string('entrevistador');
            $table->string('classificacao_area');
            $table->string('responsavel');
            $table->integer('qtd_pessoas');
            $table->integer('qtd_criancas');
            $table->integer('idade_maior');
            $table->integer('idade_menor');
            $table->string('profissoes');
            $table->string('alfabetizados');
            $table->string('renda_familiar');
            $table->boolean('programa_renda');
            $table->string('familiar_deficiencia');
            $table->string('material');
            $table->boolean('barreira');
            $table->string('rua');
            $table->string('bairro');
            $table->string('numero');
            $table->boolean('entorno_via_pavimentada');
            $table->boolean('entorno_alagavel');
            $table->boolean('entorno_baldio_residuos');
            $table->boolean('entorno_esgoto_aberto');
            $table->boolean('entorno_rios_riachos');
            $table->boolean('entorno_mata');
            $table->boolean('entorno_cultivo_alimentos');
            $table->boolean('entorno_areia');
            $table->boolean('entorno_animais_comunitarios');
            $table->boolean('entorno_animais_carga');
            $table->boolean('entorno_animais_producao');
            $table->boolean('entorno_industria');
            $table->boolean('condicoes_abastecimento_agua');
            $table->boolean('condicoes_coleta_esgoto');
            $table->boolean('condicoes_fossa_ativa');
            $table->boolean('condicoes_esgoto_aberto');
            $table->boolean('condicoes_esgoto_rio');
            $table->boolean('condicoes_coleta_organico');
            $table->boolean('condicoes_coleta_seletiva');
            $table->boolean('condicoes_caixa_agua');
            $table->boolean('condicoes_higienizacao_caixa_agua');
            $table->boolean('condicoes_horta');
            $table->boolean('condicoes_grama');
            $table->boolean('condicoes_terra');
            $table->boolean('condicoes_roedores');
            $table->boolean('condicoes_sinantropicos');
            $table->boolean('condicoes_insetos_vetores');
            $table->boolean('condicoes_aedes');
            $table->boolean('condicoes_organica_acumulada');
            $table->boolean('condicoes_mato_alto');
            $table->boolean('condicoes_residuos_acumulados');
            $table->boolean('condicoes_entulho');
            $table->boolean('condicoes_peconhentos');
            $table->boolean('condicoes_carrapatos');
            $table->boolean('fonte_agua_rede_publica');
            $table->boolean('fonte_agua_filtrada');
            $table->boolean('fonte_agua_fervida');
            $table->boolean('fonte_agua_mineral');
            $table->boolean('fonte_agua_poco');
            $table->boolean('fonte_agua_chuva');
            $table->boolean('fonte_agua_rio');
            $table->boolean('criacao_frango_corte');
            $table->boolean('criacao_galinha_poedeira');
            $table->boolean('criacao_bovino_corte');
            $table->boolean('criacao_bovino_leite');
            $table->boolean('criacao_suinos');
            $table->boolean('criacao_ovinos_caprinos');
            $table->boolean('criacao_codornas');
            $table->boolean('criacao_patos_marrecos');

            $table->unsignedBigInteger('proprietario_id')->nullable();

            $table->foreign('proprietario_id')->references('id')->on('proprietarios');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residencias');
    }
}
