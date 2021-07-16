@extends('bredicoloradmin::layouts.controle')

@section('content')
    <!-- begin breadcrumb -->
    @component('bredicoloradmin::components.migalha')
        <li class="breadcrumb-item"><a href="{{ route('bredidashboard::controle.grupo-usuario.index') }}">Grupo de usuários</a></li>
    @endcomponent
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Grupo de Usuários {{--<small>header small text goes here...</small>--}}</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                @can('controle.grupo-usuario.create')
                <a href="{{ route('bredidashboard::controle.grupo-usuario.create') }}" class="btn btn-xs btn-circle2 btn-success"><i class="fa fa-plus"></i> Novo Registro</a>
                @endcan
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">Grupo de Usuários </h4>
        </div>
        <div class="panel-body">
            <table class="table table-striped m-b-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Criação</th>
                        <th width="1%"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($grupoUsuarios))
                        @forelse($grupoUsuarios as $grupoUsuario)
                            <tr>
                                <td>{{ (isset($grupoUsuario->id)) ? $grupoUsuario->id : '' }}</td>
                                <td>{{ (isset($grupoUsuario->nome)) ? $grupoUsuario->nome : '' }}</td>
                                <td>{{ $grupoUsuario->created_at->format('d/m/Y H:i:s') }}</td>
                                <td class="with-btn" nowrap="">
                                    @can('controle.grupo-usuario.edit')
                                    <a href="{{ route('bredidashboard::controle.grupo-usuario.edit', $grupoUsuario->id) }}" class="btn btn-sm btn-primary width-60 m-r-2">Editar</a>
                                    @endcan
                                    @can('controle.grupo-usuario.destroy')
                                    <a href="javascript:void(0)" class="btn btn-sm btn-white width-60 atencao" data-url="{{ route('bredidashboard::controle.grupo-usuario.destroy', $grupoUsuario->id) }}">Deletar</a>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>
    <!-- end panel -->
@stop
