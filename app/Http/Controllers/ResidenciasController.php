<?php

namespace App\Http\Controllers;

use App\Residencia;
use Illuminate\Http\Request;

class ResidenciasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $listaResidencias = Residencia::paginate(15);
        //  $listaResidencias = DB::table('residencias')->paginate(15);

        return view(
            'residencias/residencias',
            [
                'listaResidencias' => $listaResidencias,
            ],
        );
    }

    public function telaCadastroResidencia()
    {
        return view(
            'residencias/cadastro'
        );
    }

    public function cadastrarResidencia(Request $request)
    {
        $validatedData = $request->validate([
            'logradouro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:255'],
            'bairro' => ['required', 'string', 'max:255'],
            'responsavel' => ['required', 'string', 'max:255'],
            'classificacao_area' => ['required', 'string', 'max:255'],

        ]);

        //Trabalhando com os checkboxes
        // if ($request->barreira == 'on') $barreira = 1;
        // else  $barreira = 0;
        // if ($request->entorno_via_pavimentada == 'on') $entorno_via_pavimentada = 1;
        // else  $entorno_via_pavimentada = 0;
        // if ($request->entorno_alagavel == 'on') $entorno_alagavel = 1;
        // else  $entorno_alagavel = 0;
        // if ($request->entorno_baldio_residuos == 'on') $entorno_baldio_residuos = 1;
        // else  $entorno_baldio_residuos = 0;
        // if ($request->entorno_esgoto_aberto == 'on') $entorno_esgoto_aberto = 1;
        // else  $entorno_esgoto_aberto = 0;
        // if ($request->entorno_rios_riachos == 'on') $entorno_rios_riachos = 1;
        // else  $entorno_rios_riachos = 0;
        // if ($request->entorno_mata == 'on') $entorno_mata = 1;
        // else  $entorno_mata = 0;
        // if ($request->entorno_cultivo_alimentos == 'on') $entorno_cultivo_alimentos = 1;
        // else  $entorno_cultivo_alimentos = 0;
        // if ($request->entorno_areia == 'on') $entorno_areia = 1;
        // else  $entorno_areia = 0;
        // if ($request->entorno_animais_comunitarios == 'on') $entorno_animais_comunitarios = 1;
        // else  $entorno_animais_comunitarios = 0;
        // if ($request->entorno_animais_carga == 'on') $entorno_animais_carga = 1;
        // else  $entorno_animais_carga = 0;
        // if ($request->entorno_animais_producao == 'on') $entorno_animais_producao = 1;
        // else  $entorno_animais_producao = 0;
        // if ($request->entorno_industria == 'on') $entorno_industria = 1;
        // else  $entorno_industria = 0;
        // if ($request->condicoes_abastecimento_agua == 'on') $condicoes_abastecimento_agua = 1;
        // else  $condicoes_abastecimento_agua = 0;
        // if ($request->condicoes_coleta_esgoto == 'on') $condicoes_coleta_esgoto = 1;
        // else  $condicoes_coleta_esgoto = 0;
        // if ($request->condicoes_fossa_ativa == 'on') $condicoes_fossa_ativa = 1;
        // else  $condicoes_fossa_ativa = 0;
        // if ($request->condicoes_esgoto_aberto == 'on') $condicoes_esgoto_aberto = 1;
        // else  $condicoes_esgoto_aberto = 0;
        // if ($request->condicoes_esgoto_rio == 'on') $condicoes_esgoto_rio = 1;
        // else  $condicoes_esgoto_rio = 0;
        // if ($request->condicoes_coleta_organico == 'on') $condicoes_coleta_organico = 1;
        // else  $condicoes_coleta_organico = 0;
        // if ($request->condicoes_coleta_seletiva == 'on') $condicoes_coleta_seletiva = 1;
        // else  $condicoes_coleta_seletiva = 0;
        // if ($request->condicoes_caixa_agua == 'on') $condicoes_caixa_agua = 1;
        // else  $condicoes_caixa_agua = 0;
        // if ($request->condicoes_higienizacao_caixa_agua == 'on') $condicoes_higienizacao_caixa_agua = 1;
        // else  $condicoes_higienizacao_caixa_agua = 0;
        // if ($request->condicoes_horta == 'on') $condicoes_horta = 1;
        // else  $condicoes_horta = 0;
        // if ($request->condicoes_grama == 'on') $condicoes_grama = 1;
        // else  $condicoes_grama = 0;
        // if ($request->condicoes_terra == 'on') $condicoes_terra = 1;
        // else  $condicoes_terra = 0;
        // if ($request->condicoes_roedores == 'on') $condicoes_roedores = 1;
        // else  $condicoes_roedores = 0;
        // if ($request->condicoes_sinantropicos == 'on') $condicoes_sinantropicos = 1;
        // else  $condicoes_sinantropicos = 0;
        // if ($request->condicoes_insetos_vetores == 'on') $condicoes_insetos_vetores = 1;
        // else  $condicoes_insetos_vetores = 0;
        // if ($request->condicoes_aedes == 'on') $condicoes_aedes = 1;
        // else  $condicoes_aedes = 0;
        // if ($request->condicoes_organica_acumulada == 'on') $condicoes_organica_acumulada = 1;
        // else  $condicoes_organica_acumulada = 0;
        // if ($request->condicoes_mato_alto == 'on') $condicoes_mato_alto = 1;
        // else  $condicoes_mato_alto = 0;
        // if ($request->condicoes_residuos_acumulados == 'on') $condicoes_residuos_acumulados = 1;
        // else  $condicoes_residuos_acumulados = 0;
        // if ($request->condicoes_entulho == 'on') $condicoes_entulho = 1;
        // else  $condicoes_entulho = 0;
        // if ($request->condicoes_peconhentos == 'on') $condicoes_peconhentos = 1;
        // else  $condicoes_peconhentos = 0;
        // if ($request->condicoes_carrapatos == 'on') $condicoes_carrapatos = 1;
        // else  $condicoes_carrapatos = 0;
        // if ($request->fonte_agua_rede_publica == 'on') $fonte_agua_rede_publica = 1;
        // else  $fonte_agua_rede_publica = 0;
        // if ($request->fonte_agua_filtrada == 'on') $fonte_agua_filtrada = 1;
        // else  $fonte_agua_filtrada = 0;
        // if ($request->fonte_agua_fervida == 'on') $fonte_agua_fervida = 1;
        // else  $fonte_agua_fervida = 0;
        // if ($request->fonte_agua_mineral == 'on') $fonte_agua_mineral = 1;
        // else  $fonte_agua_mineral = 0;
        // if ($request->fonte_agua_poco == 'on') $fonte_agua_poco = 1;
        // else  $fonte_agua_poco = 0;
        // if ($request->fonte_agua_chuva == 'on') $fonte_agua_chuva = 1;
        // else  $fonte_agua_chuva = 0;
        // if ($request->fonte_agua_rio == 'on') $fonte_agua_rio = 1;
        // else  $fonte_agua_rio = 0;
        // if ($request->criacao_frango_corte == 'on') $criacao_frango_corte = 1;
        // else  $criacao_frango_corte = 0;
        // if ($request->criacao_galinha_poedeira == 'on') $criacao_galinha_poedeira = 1;
        // else  $criacao_galinha_poedeira = 0;
        // if ($request->criacao_bovino_corte == 'on') $criacao_bovino_corte = 1;
        // else  $criacao_bovino_corte = 0;
        // if ($request->criacao_bovino_leite == 'on') $criacao_bovino_leite = 1;
        // else  $criacao_bovino_leite = 0;
        // if ($request->criacao_suinos == 'on') $criacao_suinos = 1;
        // else  $criacao_suinos = 0;
        // if ($request->criacao_ovinos_caprinos == 'on') $criacao_ovinos_caprinos = 1;
        // else  $criacao_ovinos_caprinos = 0;
        // if ($request->criacao_codornas == 'on') $criacao_codornas = 1;
        // else  $criacao_codornas = 0;
        // if ($request->criacao_patos_marrecos == 'on') $criacao_patos_marrecos = 1;
        // else  $criacao_patos_marrecos = 0;

        $residencia = new Residencia();
        $residencia->classificacao_area = $request->classificacao_area;
        $residencia->responsavel = $request->responsavel;
        $residencia->logradouro = $request->logradouro;
        $residencia->bairro = $request->bairro;
        $residencia->numero = $request->numero;
        $residencia->complemento = $request->complemento;
        $residencia->qtd_pessoas = $request->qtd_pessoas;
        $residencia->qtd_criancas = $request->qtd_criancas;
        $residencia->idade_maior = $request->idade_maior;
        $residencia->idade_menor = $request->idade_menor;
        $residencia->profissoes = $request->profissoes;
        $residencia->alfabetizados = $request->alfabetizados;
        $residencia->familiar_deficiencia = $request->familiar_deficiencia;
        $residencia->material = $request->material;
        $residencia->barreira = $barreira;
        // $residencia->entorno_via_pavimentada = $entorno_via_pavimentada;
        // $residencia->entorno_alagavel = $entorno_alagavel;
        // $residencia->entorno_baldio_residuos = $entorno_baldio_residuos;
        // $residencia->entorno_esgoto_aberto = $entorno_esgoto_aberto;
        // $residencia->entorno_rios_riachos = $entorno_rios_riachos;
        // $residencia->entorno_mata = $entorno_mata;
        // $residencia->entorno_cultivo_alimentos = $entorno_cultivo_alimentos;
        // $residencia->entorno_areia = $entorno_areia;
        // $residencia->entorno_animais_comunitarios = $entorno_animais_comunitarios;
        // $residencia->entorno_animais_carga = $entorno_animais_carga;
        // $residencia->entorno_animais_producao = $entorno_animais_producao;
        // $residencia->entorno_industria = $entorno_industria;
        // $residencia->condicoes_abastecimento_agua = $condicoes_abastecimento_agua;
        // $residencia->condicoes_coleta_esgoto = $condicoes_coleta_esgoto;
        // $residencia->condicoes_fossa_ativa = $condicoes_fossa_ativa;
        // $residencia->condicoes_esgoto_aberto = $condicoes_esgoto_aberto;
        // $residencia->condicoes_esgoto_rio = $condicoes_esgoto_rio;
        // $residencia->condicoes_coleta_organico = $condicoes_coleta_organico;
        // $residencia->condicoes_coleta_seletiva = $condicoes_coleta_seletiva;
        // $residencia->condicoes_caixa_agua = $condicoes_caixa_agua;
        // $residencia->condicoes_higienizacao_caixa_agua = $condicoes_higienizacao_caixa_agua;
        // $residencia->condicoes_horta = $condicoes_horta;
        // $residencia->condicoes_grama = $condicoes_grama;
        // $residencia->condicoes_terra = $condicoes_terra;
        // $residencia->condicoes_roedores = $condicoes_roedores;
        // $residencia->condicoes_sinantropicos = $condicoes_sinantropicos;
        // $residencia->condicoes_insetos_vetores = $condicoes_insetos_vetores;
        // $residencia->condicoes_aedes = $condicoes_aedes;
        // $residencia->condicoes_organica_acumulada = $condicoes_organica_acumulada;
        // $residencia->condicoes_mato_alto = $condicoes_mato_alto;
        // $residencia->condicoes_residuos_acumulados = $condicoes_residuos_acumulados;
        // $residencia->condicoes_entulho = $condicoes_entulho;
        // $residencia->condicoes_peconhentos = $condicoes_peconhentos;
        // $residencia->condicoes_carrapatos = $condicoes_carrapatos;
        // $residencia->fonte_agua_rede_publica = $fonte_agua_rede_publica;
        // $residencia->fonte_agua_filtrada = $fonte_agua_filtrada;
        // $residencia->fonte_agua_fervida = $fonte_agua_fervida;
        // $residencia->fonte_agua_mineral = $fonte_agua_mineral;
        // $residencia->fonte_agua_poco = $fonte_agua_poco;
        // $residencia->fonte_agua_chuva = $fonte_agua_chuva;
        // $residencia->fonte_agua_rio = $fonte_agua_rio;
        // $residencia->criacao_frango_corte = $criacao_frango_corte;
        // $residencia->criacao_galinha_poedeira = $criacao_galinha_poedeira;
        // $residencia->criacao_bovino_corte = $criacao_bovino_corte;
        // $residencia->criacao_bovino_leite = $criacao_bovino_leite;
        // $residencia->criacao_suinos = $criacao_suinos;
        // $residencia->criacao_ovinos_caprinos = $criacao_ovinos_caprinos;
        // $residencia->criacao_codornas = $criacao_codornas;
        // $residencia->criacao_patos_marrecos = $criacao_patos_marrecos;

        $residencia->save();

        return redirect()->route('residencias');
    }
    
    public function alterarProprietario(Request $request, int $id)
    {
        try {
        $validatedData = $request->validate([
            'logradouro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:255'],
            'bairro' => ['required', 'string', 'max:255'],
            'responsavel' => ['required', 'string', 'max:255'],
            'classificacao_area' => ['required', 'string', 'max:255'],

        ]);

        //Trabalhando com os checkboxes
        // if ($request->barreira == 'on') $barreira = 1;
        // else  $barreira = 0;
        // if ($request->entorno_via_pavimentada == 'on') $entorno_via_pavimentada = 1;
        // else  $entorno_via_pavimentada = 0;
        // if ($request->entorno_alagavel == 'on') $entorno_alagavel = 1;
        // else  $entorno_alagavel = 0;
        // if ($request->entorno_baldio_residuos == 'on') $entorno_baldio_residuos = 1;
        // else  $entorno_baldio_residuos = 0;
        // if ($request->entorno_esgoto_aberto == 'on') $entorno_esgoto_aberto = 1;
        // else  $entorno_esgoto_aberto = 0;
        // if ($request->entorno_rios_riachos == 'on') $entorno_rios_riachos = 1;
        // else  $entorno_rios_riachos = 0;
        // if ($request->entorno_mata == 'on') $entorno_mata = 1;
        // else  $entorno_mata = 0;
        // if ($request->entorno_cultivo_alimentos == 'on') $entorno_cultivo_alimentos = 1;
        // else  $entorno_cultivo_alimentos = 0;
        // if ($request->entorno_areia == 'on') $entorno_areia = 1;
        // else  $entorno_areia = 0;
        // if ($request->entorno_animais_comunitarios == 'on') $entorno_animais_comunitarios = 1;
        // else  $entorno_animais_comunitarios = 0;
        // if ($request->entorno_animais_carga == 'on') $entorno_animais_carga = 1;
        // else  $entorno_animais_carga = 0;
        // if ($request->entorno_animais_producao == 'on') $entorno_animais_producao = 1;
        // else  $entorno_animais_producao = 0;
        // if ($request->entorno_industria == 'on') $entorno_industria = 1;
        // else  $entorno_industria = 0;
        // if ($request->condicoes_abastecimento_agua == 'on') $condicoes_abastecimento_agua = 1;
        // else  $condicoes_abastecimento_agua = 0;
        // if ($request->condicoes_coleta_esgoto == 'on') $condicoes_coleta_esgoto = 1;
        // else  $condicoes_coleta_esgoto = 0;
        // if ($request->condicoes_fossa_ativa == 'on') $condicoes_fossa_ativa = 1;
        // else  $condicoes_fossa_ativa = 0;
        // if ($request->condicoes_esgoto_aberto == 'on') $condicoes_esgoto_aberto = 1;
        // else  $condicoes_esgoto_aberto = 0;
        // if ($request->condicoes_esgoto_rio == 'on') $condicoes_esgoto_rio = 1;
        // else  $condicoes_esgoto_rio = 0;
        // if ($request->condicoes_coleta_organico == 'on') $condicoes_coleta_organico = 1;
        // else  $condicoes_coleta_organico = 0;
        // if ($request->condicoes_coleta_seletiva == 'on') $condicoes_coleta_seletiva = 1;
        // else  $condicoes_coleta_seletiva = 0;
        // if ($request->condicoes_caixa_agua == 'on') $condicoes_caixa_agua = 1;
        // else  $condicoes_caixa_agua = 0;
        // if ($request->condicoes_higienizacao_caixa_agua == 'on') $condicoes_higienizacao_caixa_agua = 1;
        // else  $condicoes_higienizacao_caixa_agua = 0;
        // if ($request->condicoes_horta == 'on') $condicoes_horta = 1;
        // else  $condicoes_horta = 0;
        // if ($request->condicoes_grama == 'on') $condicoes_grama = 1;
        // else  $condicoes_grama = 0;
        // if ($request->condicoes_terra == 'on') $condicoes_terra = 1;
        // else  $condicoes_terra = 0;
        // if ($request->condicoes_roedores == 'on') $condicoes_roedores = 1;
        // else  $condicoes_roedores = 0;
        // if ($request->condicoes_sinantropicos == 'on') $condicoes_sinantropicos = 1;
        // else  $condicoes_sinantropicos = 0;
        // if ($request->condicoes_insetos_vetores == 'on') $condicoes_insetos_vetores = 1;
        // else  $condicoes_insetos_vetores = 0;
        // if ($request->condicoes_aedes == 'on') $condicoes_aedes = 1;
        // else  $condicoes_aedes = 0;
        // if ($request->condicoes_organica_acumulada == 'on') $condicoes_organica_acumulada = 1;
        // else  $condicoes_organica_acumulada = 0;
        // if ($request->condicoes_mato_alto == 'on') $condicoes_mato_alto = 1;
        // else  $condicoes_mato_alto = 0;
        // if ($request->condicoes_residuos_acumulados == 'on') $condicoes_residuos_acumulados = 1;
        // else  $condicoes_residuos_acumulados = 0;
        // if ($request->condicoes_entulho == 'on') $condicoes_entulho = 1;
        // else  $condicoes_entulho = 0;
        // if ($request->condicoes_peconhentos == 'on') $condicoes_peconhentos = 1;
        // else  $condicoes_peconhentos = 0;
        // if ($request->condicoes_carrapatos == 'on') $condicoes_carrapatos = 1;
        // else  $condicoes_carrapatos = 0;
        // if ($request->fonte_agua_rede_publica == 'on') $fonte_agua_rede_publica = 1;
        // else  $fonte_agua_rede_publica = 0;
        // if ($request->fonte_agua_filtrada == 'on') $fonte_agua_filtrada = 1;
        // else  $fonte_agua_filtrada = 0;
        // if ($request->fonte_agua_fervida == 'on') $fonte_agua_fervida = 1;
        // else  $fonte_agua_fervida = 0;
        // if ($request->fonte_agua_mineral == 'on') $fonte_agua_mineral = 1;
        // else  $fonte_agua_mineral = 0;
        // if ($request->fonte_agua_poco == 'on') $fonte_agua_poco = 1;
        // else  $fonte_agua_poco = 0;
        // if ($request->fonte_agua_chuva == 'on') $fonte_agua_chuva = 1;
        // else  $fonte_agua_chuva = 0;
        // if ($request->fonte_agua_rio == 'on') $fonte_agua_rio = 1;
        // else  $fonte_agua_rio = 0;
        // if ($request->criacao_frango_corte == 'on') $criacao_frango_corte = 1;
        // else  $criacao_frango_corte = 0;
        // if ($request->criacao_galinha_poedeira == 'on') $criacao_galinha_poedeira = 1;
        // else  $criacao_galinha_poedeira = 0;
        // if ($request->criacao_bovino_corte == 'on') $criacao_bovino_corte = 1;
        // else  $criacao_bovino_corte = 0;
        // if ($request->criacao_bovino_leite == 'on') $criacao_bovino_leite = 1;
        // else  $criacao_bovino_leite = 0;
        // if ($request->criacao_suinos == 'on') $criacao_suinos = 1;
        // else  $criacao_suinos = 0;
        // if ($request->criacao_ovinos_caprinos == 'on') $criacao_ovinos_caprinos = 1;
        // else  $criacao_ovinos_caprinos = 0;
        // if ($request->criacao_codornas == 'on') $criacao_codornas = 1;
        // else  $criacao_codornas = 0;
        // if ($request->criacao_patos_marrecos == 'on') $criacao_patos_marrecos = 1;
        // else  $criacao_patos_marrecos = 0;

        $residencia = Residencia::find($id);
        $residencia->classificacao_area = $request->classificacao_area;
        $residencia->responsavel = $request->responsavel;
        $residencia->logradouro = $request->logradouro;
        $residencia->bairro = $request->bairro;
        $residencia->numero = $request->numero;
        $residencia->complemento = $request->complemento;
        $residencia->qtd_pessoas = $request->qtd_pessoas;
        $residencia->qtd_criancas = $request->qtd_criancas;
        $residencia->idade_maior = $request->idade_maior;
        $residencia->idade_menor = $request->idade_menor;
        $residencia->profissoes = $request->profissoes;
        $residencia->alfabetizados = $request->alfabetizados;
        $residencia->familiar_deficiencia = $request->familiar_deficiencia;
        $residencia->material = $request->material;
        $residencia->barreira = $barreira;
        // $residencia->entorno_via_pavimentada = $entorno_via_pavimentada;
        // $residencia->entorno_alagavel = $entorno_alagavel;
        // $residencia->entorno_baldio_residuos = $entorno_baldio_residuos;
        // $residencia->entorno_esgoto_aberto = $entorno_esgoto_aberto;
        // $residencia->entorno_rios_riachos = $entorno_rios_riachos;
        // $residencia->entorno_mata = $entorno_mata;
        // $residencia->entorno_cultivo_alimentos = $entorno_cultivo_alimentos;
        // $residencia->entorno_areia = $entorno_areia;
        // $residencia->entorno_animais_comunitarios = $entorno_animais_comunitarios;
        // $residencia->entorno_animais_carga = $entorno_animais_carga;
        // $residencia->entorno_animais_producao = $entorno_animais_producao;
        // $residencia->entorno_industria = $entorno_industria;
        // $residencia->condicoes_abastecimento_agua = $condicoes_abastecimento_agua;
        // $residencia->condicoes_coleta_esgoto = $condicoes_coleta_esgoto;
        // $residencia->condicoes_fossa_ativa = $condicoes_fossa_ativa;
        // $residencia->condicoes_esgoto_aberto = $condicoes_esgoto_aberto;
        // $residencia->condicoes_esgoto_rio = $condicoes_esgoto_rio;
        // $residencia->condicoes_coleta_organico = $condicoes_coleta_organico;
        // $residencia->condicoes_coleta_seletiva = $condicoes_coleta_seletiva;
        // $residencia->condicoes_caixa_agua = $condicoes_caixa_agua;
        // $residencia->condicoes_higienizacao_caixa_agua = $condicoes_higienizacao_caixa_agua;
        // $residencia->condicoes_horta = $condicoes_horta;
        // $residencia->condicoes_grama = $condicoes_grama;
        // $residencia->condicoes_terra = $condicoes_terra;
        // $residencia->condicoes_roedores = $condicoes_roedores;
        // $residencia->condicoes_sinantropicos = $condicoes_sinantropicos;
        // $residencia->condicoes_insetos_vetores = $condicoes_insetos_vetores;
        // $residencia->condicoes_aedes = $condicoes_aedes;
        // $residencia->condicoes_organica_acumulada = $condicoes_organica_acumulada;
        // $residencia->condicoes_mato_alto = $condicoes_mato_alto;
        // $residencia->condicoes_residuos_acumulados = $condicoes_residuos_acumulados;
        // $residencia->condicoes_entulho = $condicoes_entulho;
        // $residencia->condicoes_peconhentos = $condicoes_peconhentos;
        // $residencia->condicoes_carrapatos = $condicoes_carrapatos;
        // $residencia->fonte_agua_rede_publica = $fonte_agua_rede_publica;
        // $residencia->fonte_agua_filtrada = $fonte_agua_filtrada;
        // $residencia->fonte_agua_fervida = $fonte_agua_fervida;
        // $residencia->fonte_agua_mineral = $fonte_agua_mineral;
        // $residencia->fonte_agua_poco = $fonte_agua_poco;
        // $residencia->fonte_agua_chuva = $fonte_agua_chuva;
        // $residencia->fonte_agua_rio = $fonte_agua_rio;
        // $residencia->criacao_frango_corte = $criacao_frango_corte;
        // $residencia->criacao_galinha_poedeira = $criacao_galinha_poedeira;
        // $residencia->criacao_bovino_corte = $criacao_bovino_corte;
        // $residencia->criacao_bovino_leite = $criacao_bovino_leite;
        // $residencia->criacao_suinos = $criacao_suinos;
        // $residencia->criacao_ovinos_caprinos = $criacao_ovinos_caprinos;
        // $residencia->criacao_codornas = $criacao_codornas;
        // $residencia->criacao_patos_marrecos = $criacao_patos_marrecos;

        $residencia->save();

        return redirect()->route('residencias');
            return back()->with('mensagemSucesso', "Alteração realizada com sucesso.");
        } catch (Exception $ex) {
            return back()->with('mensagemErro', "Ocorreu um erro (" + $ex + ").");
        }
    }

    public function deletarResidencia(int $id)
    {
        $residencia = Residencia::find($id);
        $residencia->delete();

        return redirect()->route('residencia');
    }

}
