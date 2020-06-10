@extends('layouts.app')

@section('content')
<div class="container">
    <div id="top" class="row">
        <div class="col-md-3">
            <h2><i class="fas fa-address-book"></i> Proprietários</h2>
        </div>
        <div class="col-md-6 ">
            <form action="/proprietarios/busca" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input name="q" class="form-control" id="search" type="text" placeholder="Pesquisar">
                    <span class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-md-3 ">
            <a href="{{ route('telaCadastroProprietario') }}" class="btn btn-primary pull-right h2"><i class="fas fa-plus"></i> Novo Proprietário</a>
        </div>
    </div>

    <div id="list" class="row">
        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Data de Nascimento</th>
                        <th>Telefone</th>
                        <th>Telefone 2</th>

                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($listaProprietarios))
                    @foreach ($listaProprietarios as $proprietario)
                    <tr>
                        <td>{{$proprietario->id}}</td>
                        <td>{{$proprietario->nome}}</td>
                        <td>{{$proprietario->cpf}}</td>
                        <td>{{date('d/m/Y', strtotime($proprietario->data_nascimento))}}</td>
                        <td>{{$proprietario->telefone}}</td>
                        <td>{{$proprietario->telefone_alternativo}}</td>

                        <td class="actions">

                            <a class="btn btn-success btn-xs" href="{{ route('proprietarioId', $proprietario->id) }}"><i class="far fa-eye"></i> Visualizar</a>

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExclusaoProprietario{{$proprietario->id}}">
                                <i class="fas fa-trash"></i> Excluir
                            </button>

                            <div class="modal fade" id="modalExclusaoProprietario{{$proprietario->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Exclusão de usuário</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Confirma a exclusão de {{$proprietario->name}} (código: {{$proprietario->id}})??
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('deletarProprietario', $proprietario->id) }}" method="post">
                                                {{csrf_field()}}
                                                <button type="submit" class="btn btn-danger btn-xs" value="Excluir">
                                                    Excluir
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
    @if(isset($listaProprietarios))
    {{ $listaProprietarios->links() }}
    @endif
</div>
@endsection