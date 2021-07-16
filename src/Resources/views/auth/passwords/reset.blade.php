
@extends('bredicoloradmin::layouts.master')

@section('content')
<!-- begin login -->
<div class="login login-v2" data-pageload-addclass="animated fadeIn">
    <!-- begin brand -->
    <div class="login-header">
        <div class="brand">
            @if(isset($config->logo) and !empty($config->logo))
                <img src="{{ $config->logo }}" alt="">
            @else
                <span class="logo"></span>
            @endif
            {{--  <span class="logo"></span> {{ env('APP_NAME') }}
            <small>responsive bootstrap 3 admin template</small>  --}}
        </div>
        <div class="icon">
            <i class="fa fa-lock"></i>
        </div>
    </div>
    <!-- end brand -->
    <!-- begin login-content -->

    <div class="login-content">
        {!! \Collective\Html\FormFacade::open(['route' => 'bredidashboard::password.update', 'class' => 'margin-bottom-0']) !!}
            {!! \Collective\Html\FormFacade::hidden('token', $token) !!}
            <div class="form-group m-b-20">
                {!! \Collective\Html\FormFacade::email('email', $email, ['class' => 'form-control form-control-lg', 'placeholder' => 'Seu E-mail', 'required']) !!}
            </div>
            <div class="form-group m-b-20">
                {!! \Collective\Html\FormFacade::password('password', ['class' => 'form-control form-control-lg', 'placeholder' => 'Nova senha', 'required']) !!}
            </div>
            <div class="form-group m-b-20">
                {!! \Collective\Html\FormFacade::password('password_confirmation', ['class' => 'form-control form-control-lg', 'placeholder' => 'Confirmar senha', 'required']) !!}
            </div>
            <div class="login-buttons">
                <button type="submit" class="btn btn-success btn-block btn-lg">Atualizar senha</button>
            </div>
            <div class="m-t-20">
                <a href="{{ route('bredidashboard::login') }}">Voltar para login</a>
            </div>
        {!! \Collective\Html\FormFacade::close() !!}
    </div>
    <!-- end login-content -->
</div>
@endsection
