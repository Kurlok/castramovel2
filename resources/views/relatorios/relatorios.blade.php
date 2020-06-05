@extends('layouts.app')

@section('content')
<?php
$dataAtual = Carbon\Carbon::now()->toDateString();
?>
<div class="container">
    <div id="top" class="row">
        <div class="col-md-3">
            <h2><i class="fas fa-file-export"></i> Relatórios</a></h2>
        </div>
    </div>
    <div class="card">
        <form method="get" action="relatorios/pacientes/todos" name="formTodas" id="formTodas">
            <div class="card-header bg-success text-white">Todos os dados</div>
            <div class="card-body border-secondary">
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <select class="form-control" id="comboTodas" name="comboTodas">
                            <option value="todosPacientes" selected>Todos os pacientes</option>
                            <option value="todasUnidades">Todas as unidades</option>
                            <option value="todosUsuarios">Todos os usuários</option>
                            <option value="todasVacinas">Todas as vacinas</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <button type="submit" class="btn btn-primary btn-xs">
                            <i class="far fa-file-excel"></i> Excel
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div class="card-header bg-success text-white">Pacientes</div>
        <div class="card-body">
            <form method="get" name="formPacientes" id="formPacientes" action="{{ route('relatorioPacienteNascimento') }}">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="nascimentoInicial">Data de Nascimento Inicial</label>
                        <input type="date" class="form-control" id="nascimentoInicial" name="nascimentoInicial" min="1900-01-01" max='{{$dataAtual}}'>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="nascimentoFinal">Data de Nascimento Final</label>
                        <input type="date" class="form-control" id="nascimentoFinal" name="nascimentoFinal" max='{{$dataAtual}}'>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="buttonPacientes" style="visibility: hidden;">Exportação para arquivo</label>
                        <button type="submit" class="btn btn-primary btn-xs" name="buttonPacientes" id="buttonPacientes">
                            <i class="far fa-file-excel"></i> Excel
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-header bg-success text-white">Vacinas</div>
        <div class="card-body">
            <form method="get" name="formVacinas" id="formVacinas" action="{{ route('relatorioVacinaEspecifica') }}">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="vacina">Vacina</label>
                        <select class="form-control" id="vacina" name="vacina">
                            <option value="todas">Todas</option>
                            @foreach($listaVacinas as $vacina)
                            <option value="{{$vacina->id}}">{{$vacina->vacina}} - {{$vacina->dose}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="unidade">Unidade</label>
                        <select class="form-control" id="unidade" name="unidade">
                            <option value="todas">Todas</option>
                            @foreach($listaUnidades as $unidade)
                            <option value="{{$unidade->id}}">{{$unidade->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="usuario">Usuário</label>
                        <select class="form-control" id="usuario" name="usuario">
                            <option value="todos">Todos</option>
                            @foreach($listaUsuarios as $usuario)
                            <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="aplicacaoInicial">Aplicação Inicial</label>
                        <input type="date" class="form-control" id="aplicacaoInicial" name="aplicacaoInicial" required min="1900-01-01" max='{{$dataAtual}}'>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="aplicacaoFinal">Aplicação Final</label>
                        <input type="date" class="form-control" id="aplicacaoFinal" name="aplicacaoFinal" required max='{{$dataAtual}}'>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="buttonVacinas" style="visibility: hidden;">Exportação para arquivo</label>
                        <button type="submit" class="btn btn-primary btn-xs">
                            <i class="far fa-file-excel"></i> Excel
                        </button>
                    </div>
                </div>

        </div>
        </form>
        <form method="get" name="formVacinasPendentes" id="formVacinasPendentes" action="{{ route('relatorioVacinaPendente') }}">
            <div class="card-header">Pendentes</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="vacina">Vacina</label>
                        <select class="form-control" id="vacina" name="vacina">
                            @foreach($listaVacinas as $vacina)
                            <option value="{{$vacina->id}}">{{$vacina->vacina}} - {{$vacina->dose}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="periodoInicial">Período Inicial</label>
                        <input type="date" class="form-control" id="periodoInicial" name="periodoInicial" required min="1900-01-01">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="periodoFinal">Período Final</label>
                        <input type="date" class="form-control" id="periodoFinal" name="periodoFinal" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="buttonVacinas" style="visibility: hidden;">Exportação para arquivo</label>
                        <button type="submit" class="btn btn-primary btn-xs">
                            <i class="far fa-file-excel"></i> Excel
                        </button>
                    </div>
                </div>
            </div>
    </div>
</div>
<script>
    comboTodas = document.getElementById('comboTodas');
    formTodas = document.getElementById('formTodas');
    comboTodas.onchange = function(e) {
        if (comboTodas.value == 'todosPacientes') {
            formTodas.action = "relatorios/pacientes/todos";
        } else if (comboTodas.value == 'todasUnidades') {
            formTodas.action = "relatorios/unidades/todas";
        } else if (comboTodas.value == 'todosUsuarios') {
            formTodas.action = "relatorios/usuarios/todos";
        } else if (comboTodas.value == 'todasVacinas') {
            formTodas.action = "relatorios/vacinas/todas";
        }
    }
</script>
</div>
@endsection