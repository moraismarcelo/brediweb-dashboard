@extends('bredicoloradmin::layouts.controle')

@section('content')
    <!-- begin breadcrumb -->
    @component('bredicoloradmin::components.migalha')
        <li class="breadcrumb-item"><a href="{{ route('bredidashboard::controle.grupo-usuario.index') }}">Grupo de usuários</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
    @endcomponent
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Grupo de Usuários {{--<small>header small text goes here...</small>--}}</h1>
    <!-- end page-header -->

    <div class="row">
        <div class="col-lg-6">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-9">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    </div>
                    <h4 class="panel-title">Grupo de Usuários</h4>
                </div>
                <!-- end panel-heading -->

                <!-- begin panel-body -->
                <div class="panel-body">
                    {{--  <form action="/" method="POST">  --}}
                    {!! Form::model(isset($grupoUsuario) ? $grupoUsuario : null,['route' => (isset($grupoUsuario->id) ? ['bredidashboard::controle.grupo-usuario.update', $grupoUsuario->id] : 'bredidashboard::controle.grupo-usuario.store') ]) !!}
                        <fieldset>
                            {{-- <legend class="m-b-15">Legend</legend> --}}
                            <div class="form-group">
                                <label>Nome</label>
                                {!! Form::text('nome', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        
                            @can((isset($grupoUsuario->id)) ? 'controle.grupo-usuario.update' : 'controle.grupo-usuario.store')
                                <button type="submit" class="btn btn-sm btn-primary m-r-5">Salvar</button>
                            @endcan
                            <a href="{{ route('bredidashboard::controle.grupo-usuario.index') }}" class="btn btn-sm btn-default">Cancelar</a>
                        </fieldset>
                    {!! Form::close() !!}
                </div>
                <!-- end panel-body -->
            </div>
            <!-- end panel -->
        </div>
    </div>

@stop