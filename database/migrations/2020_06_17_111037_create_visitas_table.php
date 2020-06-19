<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('entrevistador');

            $table->string('residencia_responsavel');
            $table->string('residencia_classificacao_area');
            $table->integer('residencia_qtd_pessoas');
            $table->integer('residencia_qtd_criancas');
            $table->integer('residencia_idade_maior');
            $table->integer('residencia_idade_menor');
            $table->string('residencia_profissoes');
            $table->string('residencia_alfabetizados');
            $table->string('residencia_familiar_deficiencia')->nullable();
            $table->string('residencia_material');
            $table->boolean('residencia_barreira');
            $table->boolean('residencia_entorno_via_pavimentada');
            $table->boolean('residencia_entorno_alagavel');
            $table->boolean('residencia_entorno_baldio_residuos');
            $table->boolean('residencia_entorno_esgoto_aberto');
            $table->boolean('residencia_entorno_rios_riachos');
            $table->boolean('residencia_entorno_mata');
            $table->boolean('residencia_entorno_cultivo_alimentos');
            $table->boolean('residencia_entorno_areia');
            $table->boolean('residencia_entorno_animais_comunitarios');
            $table->boolean('residencia_entorno_animais_carga');
            $table->boolean('residencia_entorno_animais_producao');
            $table->boolean('residencia_entorno_industria');
            $table->boolean('residencia_condicoes_abastecimento_agua');
            $table->boolean('residencia_condicoes_coleta_esgoto');
            $table->boolean('residencia_condicoes_fossa_ativa');
            $table->boolean('residencia_condicoes_esgoto_aberto');
            $table->boolean('residencia_condicoes_esgoto_rio');
            $table->boolean('residencia_condicoes_coleta_organico');
            $table->boolean('residencia_condicoes_coleta_seletiva');
            $table->boolean('residencia_condicoes_caixa_agua');
            $table->boolean('residencia_condicoes_higienizacao_caixa_agua');
            $table->boolean('residencia_condicoes_horta');
            $table->boolean('residencia_condicoes_grama');
            $table->boolean('residencia_condicoes_terra');
            $table->boolean('residencia_condicoes_roedores');
            $table->boolean('residencia_condicoes_sinantropicos');
            $table->boolean('residencia_condicoes_insetos_vetores');
            $table->boolean('residencia_condicoes_aedes');
            $table->boolean('residencia_condicoes_organica_acumulada');
            $table->boolean('residencia_condicoes_mato_alto');
            $table->boolean('residencia_condicoes_residuos_acumulados');
            $table->boolean('residencia_condicoes_entulho');
            $table->boolean('residencia_condicoes_peconhentos');
            $table->boolean('residencia_condicoes_carrapatos');
            $table->boolean('residencia_fonte_agua_rede_publica');
            $table->boolean('residencia_fonte_agua_filtrada');
            $table->boolean('residencia_fonte_agua_fervida');
            $table->boolean('residencia_fonte_agua_mineral');
            $table->boolean('residencia_fonte_agua_poco');
            $table->boolean('residencia_fonte_agua_chuva');
            $table->boolean('residencia_fonte_agua_rio');
            $table->boolean('residencia_criacao_frango_corte');
            $table->boolean('residencia_criacao_galinha_poedeira');
            $table->boolean('residencia_criacao_bovino_corte');
            $table->boolean('residencia_criacao_bovino_leite');
            $table->boolean('residencia_criacao_suinos');
            $table->boolean('residencia_criacao_ovinos_caprinos');
            $table->boolean('residencia_criacao_codornas');
            $table->boolean('residencia_criacao_patos_marrecos');

            $table->float('animal_peso')->nullable();
            $table->string('animal_porte');
            $table->string('animal_fonte_agua')->nullable();
            $table->string('animal_alimentacao')->nullable();
            $table->boolean('animal_acesso_supervisionado_rua');
            $table->text('animal_historico_viagens')->nullable();
            $table->string('animal_animais_predados')->nullable();
            $table->boolean('animal_sinais_agressao_fisica');
            $table->boolean('animal_alimentacao_inadequada');
            $table->boolean('animal_restricao_espaco');
            $table->boolean('animal_acumulo_animais');
            $table->boolean('animal_ma_higiene');
            $table->boolean('animal_escore_corporal_inadequado');
            $table->boolean('animal_ambiente_permanencia_insalubre');
            $table->boolean('animal_veterinario_regular');
            $table->boolean('animal_agressao_psicologica');
            $table->boolean('animal_membro_familiar');
            $table->boolean('animal_violento_animais');
            $table->boolean('animal_contato_silvestres');
            $table->boolean('animal_mordeduras_humanos');
            $table->boolean('animal_contato_animais_rua');
            $table->boolean('animal_acesso_interior_residencia');
            $table->boolean('animal_acesso_horta');
            $table->boolean('animal_contato_criancas');
            $table->boolean('animal_acesso_terreno_baldio');
            $table->boolean('animal_acesso_matas');
            $table->boolean('animal_vacinacao_regular');
            $table->boolean('animal_controle_endoparasitas');
            $table->boolean('animal_controle_ectoparasitas');
            $table->boolean('animal_coleira_repelente');
            $table->boolean('animal_presenca_ectoparasitas');
            $table->boolean('animal_presenca_endoparasitas');
            $table->boolean('animal_presenca_zoonose');
            $table->boolean('animal_controle_zoonose');
            $table->boolean('animal_automedicacao');
            $table->boolean('animal_funcao_especifica');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitas');
    }
}
