@push('scripts')
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.mask.js') }}"></script>

<script>
    //Input mask
    $(document).ready(function($) {
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('#cep').mask('00000-000');
        $('#rg').mask('000000000000000');

        $('.phone').mask('0000-0000');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.tel').mask('(00) 00000-0000');
        $('.phone_us').mask('(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');
        $('.cpf').mask('000.000.000-00', {
            reverse: true
        });
        $('#cpf').mask('000.000.000-00', {
            reverse: true
        });
        $('.cnpj').mask('00.000.000/0000-00', {
            reverse: true
        });
        $('.money').mask('000.000.000.000.000,00', {
            reverse: true
        });
        $('.money2').mask("#.##0,00", {
            reverse: true
        });
        $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            }
        });
        $('.ip_address').mask('099.099.099.099');
        $('.percent').mask('##0,00%', {
            reverse: true
        });
        $('.clear-if-not-match').mask("00/00/0000", {
            clearIfNotMatch: true
        });
        $('.placeholder').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('.fallback').mask("00r00r0000", {
            translation: {
                'r': {
                    pattern: /[\/]/,
                    fallback: '/'
                },
                placeholder: "__/__/____"
            }
        });
        $('.selectonfocus').mask("00/00/0000", {
            selectOnFocus: true
        });
    });
</script>
@endpush

@extends('layouts.app')
<?php
$usuarioLogado = Illuminate\Support\Facades\Auth::user();
//$dataAtual = Carbon\Carbon::now()->toDateString();
$dataAtual = Carbon\Carbon::now();
if (isset($residencia)) {
    $idadePaciente = Carbon\Carbon::createFromDate($residencia->data_nascimento)->diffInDays(Carbon\Carbon::now(), false);
}
?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success text-white">{{ __('Residência') }}</div>

                <div class="card-body">
                    @if(isset($residencia))
                    <form method="POST" action="{{route('alterarResidencia', $residencia->id)}}">
                        @else
                        <form method="POST" action="{{route('cadastrarResidencia')}}">
                            @endif
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="id">Código</label>
                                    <input type="text" class="form-control" name="id" id="id" value="@if(isset($residencia)){{$residencia->id}}@endif" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="responsavel">Responsável</label>
                                    <input type="text" class="form-control @error('responsavel') is-invalid @enderror" maxlength="255" name="responsavel" id="responsavel" placeholder="Responsável" value="@if(isset($residencia)){{$residencia->responsavel}}@else{{old('responsavel')}}@endif">
                                    @error('responsavel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="classicacao_area">Classificação da Área</label>
                                    <select class="form-control" id="classicacao_area" name="classicacao_area">
                                        <option value='' disabled>Selecione</option>
                                        <option value="Área Urbana" @if(isset($residencia)) @if($residencia->classicacao_area == "Área Urbana") selected @endif @endif>Área Urbana</option>
                                        <option value="Área Periurbana" @if(isset($residencia)) @if($residencia->classicacao_area == "Área Periurbana") selected @endif @endif>Área Periurbana</option>
                                        <option value="Área Rural" @if(isset($residencia)) @if($residencia->classicacao_area == "Área Rural") selected @endif @endif>Área Rural</option>
                                        <option value="Área de Invasão" @if(isset($residencia)) @if($residencia->classicacao_area == "Área de Invasão") selected @endif @endif>Área de Invasão</option>
                                        <option value="Comunidade Índigena" @if(isset($residencia)) @if($residencia->classicacao_area == "Comunidade Índigena") selected @endif @endif>Comunidade Índigena</option>
                                        <option value="Comunidade Quilombola" @if(isset($residencia)) @if($residencia->classicacao_area == "Comunidade Quilombola") selected @endif @endif>Comunidade Quilombola</option>
                                        <option value="Morador de Rua" @if(isset($residencia)) @if($residencia->classicacao_area == "Morador de Rua") selected @endif @endif>Morador de Rua</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="logradouro">Logradouro</label>
                                    <input type="text" class="form-control @error('logradouro') is-invalid @enderror" maxlength="255" name="logradouro" id="logradouro" placeholder="Logradouro" value="@if(isset($residencia)){{$residencia->logradouro}}@else{{old('logradouro')}}@endif">
                                    @error('logradouro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" class="form-control @error('bairro') is-invalid @enderror" maxlength="255" name="bairro" id="bairro" placeholder="Bairro" value="@if(isset($residencia)){{$residencia->bairro}}@else{{old('bairro')}}@endif">
                                    @error('bairro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="numero">Número</label>
                                    <input type="text" class="form-control @error('numero') is-invalid @enderror" maxlength="255" name="numero" id="numero" placeholder="Número" value="@if(isset($residencia)){{$residencia->numero}}@else{{old('numero')}}@endif">
                                    @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" class="form-control @error('complemento') is-invalid @enderror" maxlength="255" name="complemento" id="complemento" placeholder="Complemento" value="@if(isset($residencia)){{$residencia->complemento}}@else{{old('complemento')}}@endif">
                                    @error('complemento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="qtd_pessoas">Nº de Pessoas</label>
                                    <input type="number" class="form-control @error('qtd_pessoas') is-invalid @enderror" maxlength="255" name="qtd_pessoas" id="qtd_pessoas" placeholder="Nº. Pessoas" value="@if(isset($residencia)){{$residencia->qtd_pessoas}}@else{{old('qtd_pessoas')}}@endif">
                                    @error('qtd_pessoas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="qtd_criancas">Nº de Crianças</label>
                                    <input type="number" class="form-control @error('qtd_criancas') is-invalid @enderror" maxlength="255" name="qtd_criancas" id="qtd_criancas" placeholder="Nº. Crianças" value="@if(isset($residencia)){{$residencia->qtd_pessoas}}@else{{old('qtd_pessoas')}}@endif">
                                    @error('qtd_criancas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="idade_menor">Menor Idade</label>
                                    <input type="number" class="form-control @error('idade_menor') is-invalid @enderror" maxlength="255" name="idade_menor" id="idade_menor" placeholder="Menor Idade" value="@if(isset($residencia)){{$residencia->idade_menor}}@else{{old('idade_menor')}}@endif">
                                    @error('qtd_pessoas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="idade_maior">Maior Idade</label>
                                    <input type="number" class="form-control @error('idade_maior') is-invalid @enderror" maxlength="255" name="idade_maior" id="idade_maior" placeholder="Maior Idade" value="@if(isset($residencia)){{$residencia->idade_maior}}@else{{old('idade_maior')}}@endif">
                                    @error('idade_maior')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="profissoes">Profissões dos moradores economicamente ativos</label>
                                    <input type="text" class="form-control @error('profissoes') is-invalid @enderror" maxlength="255" name="profissoes" id="profissoes" placeholder="Profissões" value="@if(isset($residencia)){{$residencia->profissoes}}@else{{old('profissoes')}}@endif">
                                    @error('profissoes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="alfabetizados">Moradores Alfabetizados</label>
                                    <input type="text" class="form-control @error('alfabetizados') is-invalid @enderror" maxlength="255" name="alfabetizados" id="alfabetizados" placeholder="Alfabetizados" value="@if(isset($residencia)){{$residencia->alfabetizados}}@else{{old('alfabetizados')}}@endif">
                                    @error('alfabetizados')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="familiar_deficiencia">Deficiências</label>
                                    <input type="text" class="form-control @error('familiar_deficiencia') is-invalid @enderror" maxlength="255" name="familiar_deficiencia" id="familiar_deficiencia" placeholder="Familiar com deficiência" value="@if(isset($residencia)){{$residencia->familiar_deficiencia}}@else{{old('familiar_deficiencia')}}@endif">
                                    @error('familiar_deficiencia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="material">Material da Residência</label>
                                    <select class="form-control" id="material" name="material">
                                        <option value='' disabled>Selecione</option>
                                        <option value="Alvenaria" @if(isset($residencia)) @if($residencia->classicacao_area == "Alvenaria") selected @endif @endif>Alvenaria</option>
                                        <option value="Madeira" @if(isset($residencia)) @if($residencia->classicacao_area == "Madeira") selected @endif @endif>Madeira</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 text-center">
                                    <label for="barreira">Barreira Física</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="barreira" name="barreira" @if(isset($residencia)) @if($residencia->barreira == 1) checked @endif @elseif(old('barreira')==1 ) checked @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="card-header bg-success text-white">{{ __('Condições do entorno da residência') }}</div>
                <div class="card-body">
                    <div class="form-group form-row">
                        <div class="form-group col-md-3 text-center">
                            <label for="entorno_via_pavimentada">Via pública pavimentada</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="entorno_via_pavimentada" name="entorno_via_pavimentada" @if(isset($residencia)) @if($residencia->entorno_via_pavimentada == 1) checked @endif @elseif(old('entorno_via_pavimentada')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="entorno_alagavel">Área alagável</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="entorno_alagavel" name="entorno_alagavel" @if(isset($residencia)) @if($residencia->entorno_alagavel == 1) checked @endif @elseif(old('entorno_alagavel')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="entorno_baldio_residuos">Terreno baldio com acúmulo de resíduos</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="entorno_baldio_residuos" name="entorno_baldio_residuos" @if(isset($residencia)) @if($residencia->entorno_baldio_residuos == 1) checked @endif @elseif(old('entorno_baldio_residuos')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="entorno_esgoto_aberto">Esgoto a céu aberto</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="entorno_esgoto_aberto" name="entorno_esgoto_aberto" @if(isset($residencia)) @if($residencia->entorno_esgoto_aberto == 1) checked @endif @elseif(old('entorno_esgoto_aberto')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="form-group col-md-3 text-center">
                            <label for="entorno_rios_riachos">Rios, riachos, coleções de água</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="entorno_rios_riachos" name="entorno_rios_riachos" @if(isset($residencia)) @if($residencia->entorno_rios_riachos == 1) checked @endif @elseif(old('entorno_rios_riachos')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="entorno_mata">Área de mata</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="entorno_mata" name="entorno_mata" @if(isset($residencia)) @if($residencia->entorno_mata == 1) checked @endif @elseif(old('entorno_mata')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="entorno_cultivo_alimentos">Área de cultivo de alimentos/grãos</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="entorno_cultivo_alimentos" name="entorno_cultivo_alimentos" @if(isset($residencia)) @if($residencia->entorno_cultivo_alimentos == 1) checked @endif @elseif(old('entorno_cultivo_alimentos')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="entorno_areia">Acúmulo de areia</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="entorno_areia" name="entorno_areia" @if(isset($residencia)) @if($residencia->entorno_areia == 1) checked @endif @elseif(old('entorno_areia')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="form-group col-md-3 text-center">
                            <label for="entorno_animais_comunitarios">Presença de cães comunitários/semidomiciliados na via pública</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="entorno_animais_comunitarios" name="entorno_animais_comunitarios" @if(isset($residencia)) @if($residencia->entorno_animais_comunitarios == 1) checked @endif @elseif(old('entorno_animais_comunitarios')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="entorno_animais_carga">Presença de animais de carga</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="entorno_animais_carga" name="entorno_animais_carga" @if(isset($residencia)) @if($residencia->entorno_animais_carga == 1) checked @endif @elseif(old('entorno_animais_carga')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="entorno_animais_producao">Presença de animais de produção</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="entorno_animais_producao" name="entorno_animais_producao" @if(isset($residencia)) @if($residencia->entorno_animais_producao == 1) checked @endif @elseif(old('entorno_animais_comunitarios')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="entorno_industria">Presença de indústria</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="entorno_animais_comunitarios" name="entorno_animais_comunitarios" @if(isset($residencia)) @if($residencia->entorno_animais_comunitarios == 1) checked @endif @elseif(old('entorno_animais_comunitarios')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header bg-success text-white">{{ __('Condições na residência') }}</div>
                <div class="card-body">
                    <div class="form-group form-row">
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_abastecimento_agua">Abastecimento de água</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_abastecimento_agua" name="condicoes_abastecimento_agua" @if(isset($residencia)) @if($residencia->condicoes_abastecimento_agua == 1) checked @endif @elseif(old('condicoes_abastecimento_agua')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_coleta_esgoto">Coleta de esgoto</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_coleta_esgoto" name="condicoes_coleta_esgoto" @if(isset($residencia)) @if($residencia->condicoes_coleta_esgoto == 1) checked @endif @elseif(old('condicoes_coleta_esgoto')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_fossa_ativa">Fossa asséptica ativa</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_fossa_ativa" name="condicoes_fossa_ativa" @if(isset($residencia)) @if($residencia->condicoes_fossa_ativa == 1) checked @endif @elseif(old('condicoes_fossa_ativa')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_esgoto_aberto">Despejo de esgoto a céu aberto</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_esgoto_aberto" name="condicoes_esgoto_aberto" @if(isset($residencia)) @if($residencia->condicoes_esgoto_aberto == 1) checked @endif @elseif(old('condicoes_esgoto_aberto')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_esgoto_rio">Despejo de esgoto no rio</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_esgoto_rio" name="condicoes_esgoto_rio" @if(isset($residencia)) @if($residencia->condicoes_esgoto_rio == 1) checked @endif @elseif(old('condicoes_esgoto_rio')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_coleta_organico">Coleta de lixo orgânico</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_coleta_organico" name="condicoes_coleta_organico" @if(isset($residencia)) @if($residencia->condicoes_coleta_organico == 1) checked @endif @elseif(old('condicoes_coleta_organico')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_coleta_seletiva">Coleta seletiva de lixo</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_coleta_seletiva" name="entorno_cultivo_alimentos" @if(isset($residencia)) @if($residencia->condicoes_coleta_seletiva == 1) checked @endif @elseif(old('condicoes_coleta_seletiva')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_caixa_agua">Presença de caixa d' água</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_caixa_agua" name="condicoes_caixa_agua" @if(isset($residencia)) @if($residencia->condicoes_caixa_agua == 1) checked @endif @elseif(old('condicoes_caixa_agua')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_higienizacao_caixa_agua">Higienização da caixa d' água</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_higienizacao_caixa_agua" name="condicoes_higienizacao_caixa_agua" @if(isset($residencia)) @if($residencia->condicoes_higienizacao_caixa_agua == 1) checked @endif @elseif(old('condicoes_higienizacao_caixa_agua')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_horta">Presença de horta</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_horta" name="condicoes_horta" @if(isset($residencia)) @if($residencia->condicoes_horta == 1) checked @endif @elseif(old('condicoes_horta')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_grama">Presença de áreas com grama</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_grama" name="condicoes_grama" @if(isset($residencia)) @if($residencia->condicoes_grama == 1) checked @endif @elseif(old('condicoes_grama')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_terra">Presença de áreas com terra</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_terra" name="condicoes_terra" @if(isset($residencia)) @if($residencia->condicoes_terra == 1) checked @endif @elseif(old('condicoes_terra')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_roedores">Sinais de infestação de roedores</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_roedores" name="condicoes_roedores" @if(isset($residencia)) @if($residencia->condicoes_roedores == 1) checked @endif @elseif(old('condicoes_roedores')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_sinantropicos">Presença de outros animais sinantrópicos</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_sinantropicos" name="condicoes_sinantropicos" @if(isset($residencia)) @if($residencia->condicoes_sinantropicos == 1) checked @endif @elseif(old('condicoes_sinantropicos')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_insetos_vetores">Presença de insetos vetores</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_insetos_vetores" name="condicoes_insetos_vetores" @if(isset($residencia)) @if($residencia->condicoes_insetos_vetores == 1) checked @endif @elseif(old('condicoes_insetos_vetores')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_aedes">Presença de criatórios potenciais para Aedes aegypti</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_aedes" name="condicoes_aedes" @if(isset($residencia)) @if($residencia->condicoes_aedes == 1) checked @endif @elseif(old('condicoes_aedes')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_organica_acumulada">Presença de matéria orgânica acumulada</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_organica_acumulada" name="condicoes_organica_acumulada" @if(isset($residencia)) @if($residencia->condicoes_organica_acumulada == 1) checked @endif @elseif(old('condicoes_organica_acumulada')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_mato_alto">Presença de mato alto</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_mato_alto" name="condicoes_mato_alto" @if(isset($residencia)) @if($residencia->condicoes_mato_alto == 1) checked @endif @elseif(old('condicoes_mato_alto')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_residuos_acumulados">Presença de acúmulo de resíduos de forma inadequada</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_residuos_acumulados" name="condicoes_residuos_acumulados" @if(isset($residencia)) @if($residencia->condicoes_residuos_acumulados == 1) checked @endif @elseif(old('condicoes_residuos_acumulados')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_entulho">Acúmulo de entulho</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_entulho" name="condicoes_entulho" @if(isset($residencia)) @if($residencia->condicoes_entulho == 1) checked @endif @elseif(old('condicoes_entulho')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_peconhentos">Presença de animais peçonhentos/venenosos</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_peconhentos" name="condicoes_peconhentos" @if(isset($residencia)) @if($residencia->condicoes_peconhentos == 1) checked @endif @elseif(old('condicoes_peconhentos')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="condicoes_carrapatos">Infestação de carrapatos</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="condicoes_carrapatos" name="condicoes_carrapatos" @if(isset($residencia)) @if($residencia->condicoes_mato_alto == 1) checked @endif @elseif(old('condicoes_carrapatos')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header bg-success text-white">{{ __('Fonte de água para consumo') }}</div>
                <div class="card-body">
                    <div class="form-group form-row">
                        <div class="form-group col-md-3 text-center">
                            <label for="fonte_agua_rede_publica">Rede pública (torneira)</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="fonte_agua_rede_publica" name="fonte_agua_rede_publica" @if(isset($residencia)) @if($residencia->fonte_agua_rede_publica == 1) checked @endif @elseif(old('fonte_agua_rede_publica')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="fonte_agua_filtrada">Área filtrada</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="fonte_agua_filtrada" name="fonte_agua_filtrada" @if(isset($residencia)) @if($residencia->fonte_agua_filtrada == 1) checked @endif @elseif(old('fonte_agua_filtrada')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="fonte_agua_fervida">Água fervida</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="fonte_agua_fervida" name="fonte_agua_fervida" @if(isset($residencia)) @if($residencia->fonte_agua_fervida == 1) checked @endif @elseif(old('fonte_agua_fervida')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="fonte_agua_mineral">Água mineral</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="fonte_agua_mineral" name="fonte_agua_mineral" @if(isset($residencia)) @if($residencia->fonte_agua_mineral == 1) checked @endif @elseif(old('fonte_agua_mineral')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="form-group col-md-3 text-center">
                            <label for="fonte_agua_poco">Água de poço</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="fonte_agua_poco" name="fonte_agua_poco" @if(isset($residencia)) @if($residencia->fonte_agua_poco == 1) checked @endif @elseif(old('fonte_agua_poco')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="fonte_agua_chuva">Água da chuva</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="fonte_agua_chuva" name="fonte_agua_chuva" @if(isset($residencia)) @if($residencia->fonte_agua_chuva == 1) checked @endif @elseif(old('fonte_agua_chuva')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="fonte_agua_rio">Água do rio</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="fonte_agua_rio" name="fonte_agua_rio" @if(isset($residencia)) @if($residencia->fonte_agua_rio == 1) checked @endif @elseif(old('fonte_agua_rio')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header bg-success text-white">{{ __('Criação de animais de produção') }}</div>
                <div class="card-body">
                    <div class="form-group form-row">
                        <div class="form-group col-md-3 text-center">
                            <label for="criacao_frango_corte">Frango de corte</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="criacao_frango_corte" name="criacao_frango_corte" @if(isset($residencia)) @if($residencia->criacao_frango_corte == 1) checked @endif @elseif(old('criacao_frango_corte')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="criacao_galinha_poedeira">Criação de galinha poedeira</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="criacao_galinha_poedeira" name="criacao_galinha_poedeira" @if(isset($residencia)) @if($residencia->criacao_galinha_poedeira == 1) checked @endif @elseif(old('criacao_galinha_poedeira')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="criacao_bovino_corte">Criação de bovino de corte</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="criacao_bovino_corte" name="criacao_bovino_corte" @if(isset($residencia)) @if($residencia->criacao_bovino_corte == 1) checked @endif @elseif(old('criacao_bovino_corte')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="criacao_bovino_leite">Criação de bovino de leite</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="criacao_bovino_leite" name="criacao_bovino_leite" @if(isset($residencia)) @if($residencia->criacao_bovino_leite == 1) checked @endif @elseif(old('criacao_bovino_leite')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="form-group col-md-3 text-center">
                            <label for="criacao_ovinos_caprinos">Criação de ovinos/caprinos</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="criacao_ovinos_caprinos" name="criacao_ovinos_caprinos" @if(isset($residencia)) @if($residencia->criacao_ovinos_caprinos == 1) checked @endif @elseif(old('criacao_ovinos_caprinos')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="criacao_codornas">Criação de codornas</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="criacao_codornas" name="criacao_codornas" @if(isset($residencia)) @if($residencia->criacao_codornas == 1) checked @endif @elseif(old('criacao_codornas')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="criacao_patos_marrecos">Criação de patos/marrecos</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="criacao_patos_marrecos" name="criacao_patos_marrecos" @if(isset($residencia)) @if($residencia->criacao_patos_marrecos == 1) checked @endif @elseif(old('criacao_patos_marrecos')==1 ) checked @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            @if(isset($residencia))
                            <button type="submit" class="btn btn-primary">Alterar</button>
                            @else
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            @endif
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection