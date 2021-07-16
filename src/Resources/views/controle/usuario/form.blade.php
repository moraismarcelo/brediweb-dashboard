@extends('bredicoloradmin::layouts.controle')

@section('content')
    <!-- begin breadcrumb -->
    @component('bredicoloradmin::components.migalha')
        <li class="breadcrumb-item"><a href="{{ route('bredidashboard::controle.usuario.index') }}">Usuários</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
    @endcomponent
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">
        Usuários 
        {{--  <small>header small text goes here...</small>  --}}
    </h1>
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
                    <h4 class="panel-title">Usuário</h4>
                </div>
                <!-- end panel-heading -->

                <!-- begin panel-body -->
                <div class="panel-body">
                    {{--  <form action="/" method="POST">  --}}
                    {!! Form::model(isset($user) ? $user : null,['route' => (isset($user->id) ? ['bredidashboard::controle.usuario.update', $user->id] : 'bredidashboard::controle.usuario.store'),'files' => true ]) !!}
                        <fieldset>
                            {{--  <legend class="m-b-15">Legend</legend>  --}}
                            <div class="form-group">
                                <label>Grupo de Usuários</label>
                                {!! Form::select('grupo_usuario_id', ['' => 'Selecione'] + $grupoUsuarios->toArray(), null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                
                                <label>Foto</label>
                                @if(!empty($user->imagem))
                                <div>
                                    <img src="{{ route('imagem.render', 'user/p/' . $user->imagem) }}" alt="" class="img-fluid">
                                </div>
                                @endif
                                {!! Form::file('imagem', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Nome</label>
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Senha</label>
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
                            @can((isset($user->id)) ? 'controle.usuario.update' : 'controle.usuario.store')
                                <button type="submit" class="btn btn-sm btn-primary m-r-5">Salvar</button>
                            @endcan
                            <a href="{{ route('bredidashboard::controle.usuario.index') }}" class="btn btn-sm btn-default">Cancelar</a>
                        </fieldset>
                    {!! Form::close() !!}
                </div>
                <!-- end panel-body -->
            </div>
            <!-- end panel -->
        </div>
    </div>

@stop