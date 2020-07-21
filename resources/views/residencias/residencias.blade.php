@extends('layouts.app')

@section('content')
<div class="container">
    <div id="top" class="row">
        <div class="col-md-3">
            <h2><i class="fas fa-home"></i> Residências</h2>
        </div>
        <div class="col-md-6 ">
            <form action="/residencias/busca" method="POST" role="search">
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
            <a href="{{ route('telaCadastroResidencia') }}" class="btn btn-primary pull-right h2"><i class="fas fa-plus"></i> Novo Residência</a>
        </div>
    </div>

    <div id="list" class="row">
        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Bairro</th>
                        <th>Logradouro</th>
                        <th>Número</th>
                        <th>Complemento</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($listaResidencias))
                    @foreach ($listaResidencias as $residencia)
                    <tr>
                        <td>{{$residencia->id}}</td>
                        <td>{{$residencia->bairro}}</td>
                        <td>{{$residencia->logradouro}}</td>
                        <td>{{$residencia->numero}}</td>
                        <td>{{$residencia->complemento}}</td>

                        <td class="actions">

                            <a class="btn btn-success btn-xs" href="{{ route('residenciaId', $residencia->id) }}"><i class="far fa-eye"></i> Visualizar</a>

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExclusaoResidencia{{$residencia->id}}">
                                <i class="fas fa-trash"></i> Excluir
                            </button>

                            <div class="modal fade" id="modalExclusaoResidencia{{$residencia->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Exclusão de usuário</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Confirma a exclusão de {{$residencia->name}} (código: {{$residencia->id}})??
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('deletarResidencia', $residencia->id) }}" method="post">
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
    @if(isset($listaResidencias))
    {{ $listaResidencias->links() }}
    @endif
</div>
@endsection