@extends('bredicoloradmin::layouts.controle')

@section('content')
    <!-- begin breadcrumb -->
    @component('bredicoloradmin::components.migalha')
        <li class="breadcrumb-item"><a href="{{ route('bredidashboard::controle.usuario.index') }}">Usuários</a></li>
    @endcomponent
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">
        Usuários 
        {{--  <small>header small text goes here...</small>  --}}
    </h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                @can('controle.usuario.create')
                <a href="{{ route('bredidashboard::controle.usuario.create') }}" class="btn btn-xs btn-circle2 btn-success"><i class="fa fa-plus"></i> Novo Registro</a>
                @endcan
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">Usuários</h4>
        </div>
        <div class="panel-body">
            <table class="table table-striped m-b-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuário</th>
                        <th>Grupo</th>
                        <th>Email Address</th>
                        <th width="1%"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($users))
                        @forelse($users as $user)
                            <tr>
                                <td class="with-img">
                                    @if(!empty($user->imagem))
                                    <img src="{{ route('imagem.render', 'user/p/' . $user->imagem) }}" class="img-rounded height-30">
                                    @endif
                                </td>
                                <td>{{ (!empty($user->name)) ? $user->name : '' }}</td>
                                <td>{{ (!empty($user->grupoUsuario->nome)) ? $user->grupoUsuario->nome : '' }}</td>
                                <td>{{ (!empty($user->email)) ? $user->email : '' }}</td>
                                <td class="with-btn" nowrap="">
                                    @can('controle.usuario.edit')
                                    <a href="{{ route('bredidashboard::controle.usuario.edit', $user->id) }}" class="btn btn-sm btn-primary width-60 m-r-2">Editar</a>
                                    @endcan
                                    @can('controle.usuario.destroy')
                                    <a href="javascript:void(0)" class="btn btn-sm btn-white width-60 atencao" data-url="{{ route('bredidashboard::controle.usuario.destroy', $user->id) }}">Deletar</a>
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
