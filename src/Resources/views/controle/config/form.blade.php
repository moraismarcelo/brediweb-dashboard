
@extends('bredicoloradmin::layouts.controle')

@section('content')
    <!-- begin breadcrumb -->
    @component('bredicoloradmin::components.migalha')
        <li class="breadcrumb-item"><a href="{{ route('bredidashboard::controle.config.edit') }}">Configurações</a></li>
    @endcomponent
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Configurações <small>header small text goes here...</small></h1>
    <!-- end page-header -->
    <div class="row">
        <div class="col-lg-6">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    </div>
                    <h4 class="panel-title">Configurações</h4>
                </div>
                <div class="panel-body">
                    {!! Form::model($config,['route' => 'bredidashboard::controle.config.update', 'files' => true]) !!}
                        <fieldset>
                            {{-- <legend class="m-b-15">Quem somos</legend> --}}
                            <div class="form-group">
                                <label for="nome">Nome do projeto</label>
                                {!! Form::text('nome', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo da empresa</label>
                                @if(isset($config->config['layout']['logo']))
                                <div class="col-sm-4">
                                    <img src="{{ route('imagem.render', config('bredidashboard.logo')['destino'] . "p/". $config->config['layout']['logo']) }}" alt="" class="img-fluid">
                                </div>
                                @endif
                                {!! Form::file("logo", ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="background_image">Background Login</label>
                                @if(isset($config->config['layout']['background_image']))
                                <div class="col-sm-4">
                                    <img src="{{ route('imagem.render', config('bredidashboard.background_image')['destino'] . $config->config['layout']['background_image']) }}" alt="" class="img-fluid">
                                </div>
                                @endif
                                {!! Form::file("background_image", ['class' => 'form-control']) !!}
                            </div>
                            
                            @can('controle.config.update')
                                <button type="submit" class="btn btn-lg btn-primary m-r-5"><i class="fa fa-save"></i> Salvar</button>
                            @endcan
                        </fieldset>
                    {!! Form::close() !!}
                    <br>

                </div> <!-- panel-body -->
                
            </div>
            <!-- end panel -->

        </div>
    </div>
    
@stop
