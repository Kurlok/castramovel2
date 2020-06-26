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
if (isset($animal)) {
    $idadePaciente = Carbon\Carbon::createFromDate($animal->data_nascimento)->diffInDays(Carbon\Carbon::now(), false);
}
?>

@section('content')
@section('content')
<div class="container">
    @if(session()->has('mensagemSucesso'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class=" alert alert-success">
                {{ session()->get('mensagemSucesso') }}
            </div>
        </div>
    </div>
    @endif
    @if (session()->has('mensagemErro'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class=" alert alert-danger">
                {{ session()->get('mensagemErro') }}
            </div>
        </div>
    </div>
    @endif
    @if ($errors->any())
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class=" alert alert-danger">
                Houve um erro, por favor confira se preencheu todos os dados corretamente.
            </div>
        </div>
    </div>
    @endif
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">

                <div class="card">
                    <div class="card-header bg-success text-white">{{ __('Animal') }}</div>

                    <div class="card-body">
                        @if(isset($animal))
                        <form method="POST" action="{{route('alterarAnimal', $animal->id)}}">
                            @else
                            <form method="POST" action="{{route('cadastrarAnimal')}}">
                                @endif
                                @csrf

                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="id">Código</label>
                                        <input type="text" class="form-control" name="id" id="id" value="@if(isset($animal)){{$animal->id}}@endif" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="idade">Idade</label>
                                        <input type="text" class="form-control" name="idade" id="idade" value="@if(isset($animal)){{Carbon\Carbon::createFromDate($animal->data_nascimento)->diff(Carbon\Carbon::now())->format('%yA %mM %dD')}}@endif" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control @error('nome') is-invalid @enderror" maxlength="255" name="nome" id="nome" placeholder="Nome" value="@if(isset($animal)){{$animal->nome}}@else{{old('nome')}}@endif">
                                        @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="especie">Espécie</label>
                                        <div class="form-group">
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" required name="especie" id="canino" value="Canino" @if(isset($animal)) @if($animal->especie ==='Canino') checked @endif @elseif(old('especie')=='Canino') checked @endif>
                                                <label class="form-check-label" for="canino">Canino</label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="especie" id="felino" value="Felino" @if(isset($animal)) @if($animal->especie ==='Felino') checked @endif @elseif(old('especie')=='Felino') checked @endif>
                                                <label class="form-check-label" for="felino">Felino</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="genero">Gênero</label>
                                        <div class="form-group">
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" required name="genero" id="macho" value="Macho" @if(isset($animal)) @if($animal->genero ==='Macho') checked @endif @elseif(old('genero')=='Macho') checked @endif>
                                                <label class="form-check-label" for="macho">Macho</label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="genero" id="femea" value="Fêmea" @if(isset($animal)) @if($animal->genero ==='Fêmea') checked @endif @elseif(old('genero')=='Fêmea') checked @endif>
                                                <label class="form-check-label" for="femea">Fêmea</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="data_nascimento">Nascimento</label>
                                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" min="1900-01-01" max='{{$dataAtual}}' value="@if(isset($animal)){{$animal->data_nascimento}}@else{{old('data_nascimento')}}@endif">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="cidade_natal">Cidade Natal</label>
                                        <input type="text" class="form-control" id="cidade_natal" name="cidade_natal" value="@if(isset($animal)){{$animal->cidade_natal}}@else{{old('cidade_natal')}}@endif">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="historico_viagens">Viagens</label>
                                        <input type="text" class="form-control" id="historico_viagens" name="historico_viagens" value="@if(isset($animal)){{$animal->historico_viagens}}@else{{old('historico_viagens')}}@endif">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="outras_informacoes">Outras informações</label>
                                    <textarea class="form-control" id="outras_informacoes" name="outras_informacoes" maxlength="65000" rows="4">@if(isset($animal)){{$animal->outras_informacoes}}@else{{old('outras_informacoes')}}@endif</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="proprietario">Proprietário</label>
                                    <select class="form-control" id="proprietario" name="proprietario">
                                        <option value='' disabled>Selecione</option>
                                        <option value='' @if(isset($animal)) @if($animal->proprietario_id == NULL) selected @endif @endif>Sem proprietário</option>
                                        @foreach($listaProprietarios as $proprietario)
                                        <option value="{{$proprietario->id}}" @if(isset($proprietario)) @if(isset($animal) && $animal->proprietario_id == $proprietario->id) selected @endif @endif >{{$proprietario->nome}} ({{$proprietario->cpf}}) - Cód: {{$proprietario->id}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="residencia">Residência</label>
                                    <select class="form-control" id="residencia" name="residencia">
                                        <option value='' disabled>Selecione</option>
                                        <option value='' @if(isset($animal)) @if($animal->residencia_id == NULL) selected @endif @endif>Sem domicílio</option>
                                        @foreach($listaResidencias as $residencia)
                                        <option value="{{$residencia->id}}" @if(isset($residencia)) @if(isset($animal) && $animal->residencia_id == $residencia->id) selected @endif @endif >{{$residencia->bairro}} - {{$residencia->logradouro}}, {{$residencia->numero}} - {{$residencia->complemento}} - Cód: {{$residencia->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        @if(isset($animal))
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