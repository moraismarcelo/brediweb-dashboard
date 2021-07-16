
@extends('bredicoloradmin::layouts.controle')

@section('content')
    <!-- begin breadcrumb -->
    @component('bredicoloradmin::components.migalha')
        <li class="breadcrumb-item"><a href="{{ route('bredidashboard::controle.permissao.index') }}">Permissões</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
    @endcomponent
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Permissões {{--<small>header small text goes here...</small>--}}</h1>
    <!-- end page-header -->
    <div class="row">
        <div class="col-lg-6">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    </div>
                    <h4 class="panel-title">Permissões</h4>
                </div>
                <div class="panel-body">

                        <fieldset>
                            {{-- <legend class="m-b-15">Quem somos</legend> --}}
                            <div class="form-group">
                                <label for="nome">Grupo de Usuários</label>

                                {!! Form::model($input, ['route' => null, 'method' => 'get']) !!}
                                    {!! Form::select('grupo_usuario_id', ['' => 'Selecione'] + $grupoUsuarios->toArray(), null, ['class' => 'form-control', 'required', 'onchange' => 'this.form.submit()']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="form-group">
                                {!! Form::model(null,['route' => ['bredidashboard::controle.permissao.update', (isset($input['grupo_usuario_id']) ? $input['grupo_usuario_id'] : null)], 'files' => true]) !!}
                                <table class="table">
                                    <tbody>
                                        @forelse($categoriaTransacaos as $categoriaTransacao)
                                        <tr>
                                            <!-- with radio -->
                                            <td rowspan="{{ (count($categoriaTransacao->transacaos) + 1) }}">
                                                <label for="">{{ $categoriaTransacao->nome }}</label>
                                            </td>
                                            @if(count($categoriaTransacao->transacaos) > 0)
                                                @foreach($categoriaTransacao->transacaos as $transacao)
                                                <tr>
                                                    <td class="with-checkbox">
                                                        <div class="checkbox checkbox-css">
                                                            {{--  <input type="checkbox" value="" id="table_checkbox_2" checked="">  --}}
                                                            {{-- {!! Form::checkbox('transacao['.$transacao->categoria_transacao_id .'][]', $transacao->id, (in_array($transacao->id, $permissaos)), ['id' => 'tran-'.$transacao->id]) !!} --}}
                                                            {!! Form::checkbox('transacao[]', $transacao->id, (in_array($transacao->id, $permissaos)), ['id' => 'tran-'.$transacao->id]) !!}
                                                            <label for="tran-{{ $transacao->id }}">{{ $transacao->descricao }}</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                                @can('controle.permissao.update')
                                    @if(isset($input['grupo_usuario_id']))
                                        <button type="submit" class="btn btn-lg btn-primary m-r-5"><i class="fa fa-save"></i> Salvar</button>
                                    @endif
                                @endcan
                                {!! Form::close() !!}
                            </div>


                        </fieldset>

                    <br>

                </div> <!-- panel-body -->

            </div>
            <!-- end panel -->

        </div>
    </div>

@stop
