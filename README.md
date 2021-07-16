## Este pacote é um Dashboard para versões Laravel >=5.8
**Obs:**
1. Use migrations
2. Use o git
3. Faça códigos limpos
## Instalando o Dashboard
1 - no arquivo composer.json do Laravel, coloque:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://gitlab.com/pacotes-bredi/bredi-dashboard"
    }
]
```

2 - na linha de comando digite
`composer require bredi/dashboard`

coloque seu login e senha do gitlab para poder baixar o pacote

3 - exportando os assets do template:
`php artisan vendor:publish --tag=public-assets`

4 - com seu banco de dados criado configurado, digite o comando:
`php artisan migrate`

5 - Você já pode acessar o controle pelo endereço http://localhost:8000/controle.

Login: contato@bredi.com.br

Senha: 123456 (Altere a senha em produção)

## Editor de texto HTML
###### exportando os assets do editor de texto:
- para usar o **inyMCE** <textarea name="nome_do_campo" class="tinymce" />
`php artisan vendor:publish --tag=editor-tinymce`
- para usar o **Summernote** <textarea name="nome_do_campo" class="summernote" />
`php artisan vendor:publish --tag=editor-summernote`
> Definindo a altura do editor de texto **TinyMCE** com **data-editor-size="valor"**
<textarea name="nome_do_campo" class="tinymce" data-editor-size="300" />

## Criando novas gerencias:
**1 - Rotas**
Em seu arquivo de rotas( pasta routes na raiz do Laravel), coloque as novas rotas dentro do grupo de rotas para autenticação:
### *Nova função
- **rotasControle(function, ['middleware'], 'prefix_name');**
- **middleware** pode ser uma string ('api', 'auth') ou um arquivo Middleware (App\Http\Middleware\ExampleMiddleware::class)

```php
    // Coloque a função em um arquivo de rotas
rotasControle(
    function () {
	Route::get('example', ['uses' => 'Controle\ExampleController@index', 'permissao' => 'controle.teste.index'])->name('controle.teste.index');
	Route::get('example/create', ['uses' => 'Controle\ExampleController@create', 'permissao' => 'controle.teste.create'])->name('controle.teste.create');
	Route::get('example/edit/{id}', ['uses' => 'Controle\ExampleController@edit', 'permissao' => 'controle.teste.edit'])->name('controle.teste.edit');
	Route::post('example/store', ['uses' => 'Controle\ExampleController@store', 'permissao' => 'controle.teste.store'])->name('controle.teste.store');
	Route::post('example/update/{id}', ['uses' => 'Controle\ExampleController@update', 'permissao' => 'controle.teste.update'])->name('controle.teste.update');
	Route::get('example/delete/{id}', ['uses' => 'Controle\ExampleController@destroy', 'permissao' => 'controle.teste.destroy'])->name('controle.teste.destroy');
	//[....] 
	//outras rotas
    });
```

#### Exemplo completo
```php
// Parâmetros opcionais
rotasControle(function(){
      Route::get('example', ['uses' => 'ExampleController@index', 'permissao' => 'controle.teste.index'])->name('.teste.index');   
    },
    [
      // Middleware adicional. Por padrão, já está ligado ao Middleware 'auth' e 'ValidaPermissao.php'
      'api', 'meumiddleware', App\Http\Middleware\ExampleMiddleware::class
    ],
    'controle' //*Opcional. Prefixo para os nomes das rotas. padrão NULL
);
```

**2 - Views**

Modelo do template esta em https://seantheme.com/color-admin-v4.3/admin/html/index_v2.html

    @extends('bredicoloradmin::layouts.controle')
    
    @section('content')
        <!-- begin breadcrumb -->
        @component('bredicoloradmin::components.migalha')
            <li class="breadcrumb-item"><a href="{{ route('bredibanner::controle.banner.index') }}">Banners</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
        @endcomponent
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Banners <small>header small text goes here...</small></h1>
        <!-- end page-header -->
    
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                        @can('controle.banner.create')
                        <a href="{{ route('bredibanner::controle.banner.create') }}" class="btn btn-xs btn-circle2 btn-success"><i class="fa fa-plus"></i> Novo Registro</a>
                        @endcan
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
                <h4 class="panel-title">Banners</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped m-b-0">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Titulo</th>
                            <th>Link</th>
                            <th>Publicado</th>
                            <th width="1%">Opções</th>
                        </tr>
                    </thead>
                    <tbody>...</tbody>
                </table>
            </div>
        </div>
        <!-- end panel -->
    @stop

**Form:**

    @extends('bredicoloradmin::layouts.controle')
    
    @section('content')
        <!-- begin breadcrumb -->
        @component('bredicoloradmin::components.migalha')
            <li class="breadcrumb-item"><a href="{{ route('bredibanner::controle.banner.index') }}">Banners</a></li>
        @endcomponent
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Banners <small>header small text goes here...</small></h1>
        <!-- end page-header -->
        <div class="row">
            <div class="col-lg-6">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        </div>
                        <h4 class="panel-title">Banners</h4>
                    </div>
                    <div class="panel-body">
                        {!! Form::model(isset($banner) ? $banner : null,['route' => (isset($banner->id) ? ['bredibanner::controle.banner.update', $banner->id] : 'bredibanner::controle.banner.store'), 'files' => true]) !!}
                            <fieldset>
                                <legend class="m-b-15">Banner</legend>
                                <div class="form-group">
                                    <label for="titulo">Titulo</label>
                                    {!! Form::text('titulo', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    <label for="imagem">Imagem</label>
                                    @if(!empty($banner->imagem))
                                        <img src="{{ route('imagem.render', 'banner/p/' . $banner->imagem) }}" class="img-rounded height-30">
                                    @endif
                                    {!! Form::file('imagem', ['class' => 'form-control']) !!}
                                </div>
                                <div class="checkbox checkbox-css m-b-20">
                                    <div class="form-check m-r-10">
                                        {!! Form::checkbox('ativo', 1, null, ['class' => 'form-check-input', 'id' => 'ativo']) !!}
                                        <label class="form-check-label" for="ativo">Publicar</label>
                                    </div>
    
                                </div>
                                @can((isset($banner->id)) ? 'bredibanner::controle.banner.update' : 'bredibanner::controle.banner.store')
                                    <button type="submit" class="btn btn-sm btn-primary m-r-5">Salvar</button>
                                @endcan
                                <a href="{{ route('bredibanner::controle.banner.index') }}" class="btn btn-sm btn-default">Cancelar</a>
                            </fieldset>
                        {!! Form::close() !!}
    
                    </div> <!-- panel-body -->
                </div>
                <!-- end panel -->
    
            </div>
        </div>
        
    @stop

**Exportar views**
Exporte o menu para colocar suas novas rotas
`php artisan vendor:publish --tag=dashboard-menu`

Exporta as views SE for necessário.
`php artisan vendor:publish --tag=dashboard-views`

Exporta arquivo config.
`php artisan vendor:publish --tag=bredidashboard-config`

### Exemplo para deixar o menu ativo:
```
// coloque as iniciais da rota na função activeMenu().
// Coloque um array para ativar um menu co submenu e uma string para apenas uma rota
<li class="has-sub {{ activeMenu(['bredidashboard::controle.grupo-usuario', 'bredidashboard::controle.usuario', 'bredidashboard::controle.permissao']) }}">
    <a href="javascript:;">
      <b class="caret"></b>
      <i class="fa fa-th-large"></i>
      <span>Controle de Acesso</span>
    </a>
    <ul class="sub-menu">
        @can('controle.grupo-usuario.index')
            <li class="{{ activeMenu('bredidashboard::controle.grupo-usuario') }}">
                <a href="{{ route('bredidashboard::controle.grupo-usuario.index') }}">Grupo de Usuários</a>
            </li>
        @endcan
        @can('controle.usuario.index')
            <li class="{{ activeMenu('bredidashboard::controle.usuario') }}">
                <a href="{{ route('bredidashboard::controle.usuario.index') }}">Usuários</a>
            </li>
        @endcan
        @can('controle.permissao.edit')
            <li class="{{ activeMenu('bredidashboard::controle.permissao') }}">
                <a href="{{ route('bredidashboard::controle.permissao.edit') }}">Permissões</a>
            </li>
        @endcan
    </ul>
</li>
```
