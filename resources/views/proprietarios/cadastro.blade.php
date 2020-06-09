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

@section('content')
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
                                <div class="form-group col-md-12">
                                    <label for="name">{{ __('Nome Completo') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@if(isset($proprietario)){{$proprietario->name}}@else {{ old('name') }}@endif " maxlength="255" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label for="email">E-mail</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@if(isset($proprietario)){{$proprietario->email}}@else{{old('email')}}@endif" required autocomplete="email" @if(isset($proprietario)) disabled @endif>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                {{--
                                <div class="form-group col-md-4">
                                    <label for="permissao">Permissão</label>
                                    <select class="form-control @error('permissao') is-invalid @enderror" maxlength="50" required id="permissao" name="permissao">
                                        <option value="Administrador" @if(isset($proprietario)) @if($proprietario->permissao == 'Administrador') selected @endif @endif>Administrador</option>
                                        <option value="Comum" @if(isset($proprietario)) @if($proprietario->permissao == 'Comum') selected @endif @else selected @endif > Comum</option>
                                        <option value="Visualização" @if(isset($proprietario)) @if($proprietario->permissao == 'Visualização') selected @endif @else selected @endif > Visualização</option>
                                    </select>
                                    @error('permissao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            --}}
                </div>


                @if(!isset($proprietario))
                <div class="row">
                    <div class="col">

                        <p class="text-justify small"><span class="text-danger">Atenção:</span> A senha padrão utilizada na criação de um novo usuário é "123456".</p>
                    </div>
                </div>
                @endif
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
</div>
@endsection