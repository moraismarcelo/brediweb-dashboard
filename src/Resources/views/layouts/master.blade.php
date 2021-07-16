
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>{{ (!empty($config->nome) ? $config->nome : 'Área administrativa') }}</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <link href="/coloradmin/css/vendor.css" rel="stylesheet" />
    <link href="/plugins/gritter/css/gritter.css" rel="stylesheet" />

    <!-- ================== END BASE CSS STYLE ================== -->
    @yield('styles')
    <!-- ================== BEGIN BASE JS ================== -->
    {{-- <script src="/assets/plugins/pace/pace.min.js"></script> --}}
    <!-- ================== END BASE JS ================== -->
</head>
<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <!-- end #page-loader -->

	<!-- begin login-cover -->
	<div class="login-cover">
		<div class="login-cover-image" style="background-image: url({{ (isset($config) and !empty($config->background)) ? $config->background : '' }} )" data-id="login-cover-image"></div>
		<div class="login-cover-bg"></div>
	</div>
	<!-- end login-cover -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        @yield('content')
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    {{-- <script src="/assets/plugins/jquery/jquery-3.3.1.min.js"></script> --}}
    {{-- <script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script> --}}
    {{-- <script src="/assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script> --}}
    {{-- falta fazer aqui IE9 --}}
    <!--[if lt IE 9]>
        <script src="/assets/crossbrowserjs/html5shiv.js"></script>
        <script src="/assets/crossbrowserjs/respond.min.js"></script>
        <script src="/assets/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <!-- ================== END BASE JS ================== -->

    <script src="/coloradmin/js/vendor.js"></script>
    <script src="/plugins/gritter/js/gritter.js"></script>
    <script src="/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>

    <script>
        $(document).ready(function(){

            @if (session()->has('msg'))
            var unique_id = $.gritter.add({login-cover
                title: '{{ (!empty(session('error'))) ? 'Erro' : 'Sucesso' }}!',
                text: "<span style='color:#FFF;font-size:13px'>{{ session('msg') }}</span>",
                image: '/coloradmin/images/{{ (!empty(session('error'))) ? 'error' : 'success' }}.png',
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: {{ (session('error')) ? "true" : "false" }},
                // (int | optional) the time you want it to be alive for before fading out
                time: 15000,
                close: 'fechar'
            });
            @endif

            @if (isset($errors) and count($errors))
            var unique_id = $.gritter.add({
                title: 'Erro!',
                text: "{!! implode('<br>', $errors->all()) !!}",
                image: '/coloradmin/images/error.png',
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: true
            });
            @endif

             // Exibe o modal de exclusão de registro
            $('.atencao').on('click', function (event) {
                event.preventDefault();
                var url = $(this).attr('data-url');

                swal({
                    title: "Atenção!",
                    text: "Deseja continuar com esta operação?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    buttons: {
                        cancel: "Cancelar",
                        catch: {
                          text: "Confirmar",
                          value: "excluir",
                        },
                        defeat: false,
                      }
                }).then((value) => {
                    if (value == "excluir") {
                        window.location.href = url
                    }
                })

            });
        })
        </script>

    @yield('scripts')

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
</body>
</html>
