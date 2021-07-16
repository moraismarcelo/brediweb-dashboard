
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
        {{-- {!! \Collective\Html\FormFacade::email('email', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'E-mail', 'required']) !!} --}}
        {{-- <form action="index.html" method="GET" class="margin-bottom-0"> --}}
        {!! \Collective\Html\FormFacade::open(['route' => 'login', 'class' => 'margin-bottom-0']) !!}
            <div class="form-group m-b-20">
                {{-- <input type="text" class="form-control form-control-lg" placeholder="Email Address" required /> --}}
                {!! \Collective\Html\FormFacade::email('email', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'E-mail', 'required']) !!}
            </div>
            <div class="form-group m-b-20">
                {{-- <input type="password" class="form-control form-control-lg" placeholder="Password" required /> --}}
                {!! \Collective\Html\FormFacade::password('password', ['class' => 'form-control form-control-lg', 'placeholder' => 'Senha', 'required']) !!}
            </div>
            <div class="checkbox checkbox-css m-b-20">
                {{-- <input type="checkbox" id="remember_checkbox" /> --}}
                {!! \Collective\Html\FormFacade::checkbox('remember', 1, false, ['id' => 'remember']) !!}
                <label for="remember">
                    Lembrar-me
                </label>
            </div>
            <div class="login-buttons">
                <button type="submit" class="btn btn-success btn-block btn-lg">Login</button>
            </div>
            <div class="m-t-20">
                <a href="{{ route('bredidashboard::password.form') }}">Esqueci minha senha</a>
            </div>
        {!! \Collective\Html\FormFacade::close() !!}
    </div>
    <!-- end login-content -->
</div>
@endsection
