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
if (isset($proprietario)) {
    $idadePaciente = Carbon\Carbon::createFromDate($proprietario->data_nascimento)->diffInDays(Carbon\Carbon::now(), false);
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
                <div class="card-header bg-success text-white">{{ __('Proprietário') }}</div>

                <div class="card-body">
                    @if(isset($proprietario))
                    <form method="POST" action="{{route('alterarProprietario', $proprietario->id)}}">
                        @else
                        <form method="POST" action="{{route('cadastrarProprietario')}}">
                            @endif
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="id">Código</label>
                                    <input type="text" class="form-control" name="id" id="id" value="@if(isset($proprietario)){{$proprietario->id}}@endif" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="idade">Idade</label>
                                    <input type="text" class="form-control" name="idade" id="idade" value="@if(isset($proprietario)){{Carbon\Carbon::createFromDate($proprietario->data_nascimento)->diff(Carbon\Carbon::now())->format('%yA %mM %dD')}}@endif" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nome_completo">Nome completo</label>
                                    <input type="text" class="form-control @error('nome_completo') is-invalid @enderror" maxlength="255" name="nome_completo" id="nome_completo" placeholder="Nome completo" value="@if(isset($proprietario)){{$proprietario->nome_completo}}@else{{old('nome_completo')}}@endif">
                                    @error('nome_completo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="sus">Cartão SUS</label>
                                    <input type="text" class="form-control" name="sus" id="sus" placeholder="000000000000000" maxlength="20" value="@if(isset($proprietario)){{$proprietario->sus}}@else{{old('sus')}}@endif">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="data_nascimento">Nascimento</label>
                                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" min="1900-01-01" max='{{$dataAtual}}' value="@if(isset($proprietario)){{$proprietario->data_nascimento}}@else{{old('data_nascimento')}}@endif">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" value="@if(isset($proprietario)){{$proprietario->cpf}}@else{{old('cpf')}}@endif">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control tel" id="telefone" name="telefone" maxlength="20" placeholder="(00) 00000-0000" value="@if(isset($proprietario)){{$proprietario->telefone}}@else{{old('telefone')}}@endif">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="telefone_alternativo">Telefone Alternativo</label>
                                    <input type="text" class="form-control tel" id="telefone_alternativo" maxlength="20" name="telefone_alternativo" placeholder="(00) 00000-0000" value="@if(isset($proprietario)){{$proprietario->telefone_alternativo}}@else{{old('telefone_alternativo')}}@endif">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="renda_familiar">Renda Familiar</label>

                                    <select class="form-control" id="renda_familiar" name="renda_familiar">
                                        <option value='' disabled>Selecione</option>
                                        <option value="0 a 2 S.M." @if(isset($proprietario)) @if($proprietario->renda_familiar == "0 a 2 S.M.") selected @endif @endif>Até 2 salários mínimos</option>
                                        <option value="2 a 5 S.M." @if(isset($proprietario)) @if($proprietario->renda_familiar == "2 a 5 S.M.") selected @endif @endif>De 2 a 5 salários mínimos</option>
                                        <option value="5 ou mais S.M." @if(isset($proprietario)) @if($proprietario->renda_familiar == "5 ou mais S.M.") selected @endif @endif>Acima de 5 salários mínimos</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 text-center">
                                    <label for="programa_renda">Programa de Renda</label>
                                    <div class="form-group align-items-center">
                                        <div class="form-check align-items-center">
                                            <input class="form-check-input" type="checkbox" id="programa_renda" name="programa_renda" @if(isset($proprietario)) @if($proprietario->programa_renda == 1) checked @endif @elseif(old('programa_renda')==1 ) checked @endif>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    @if(isset($proprietario))
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