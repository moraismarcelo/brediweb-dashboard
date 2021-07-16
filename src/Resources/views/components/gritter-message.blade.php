@section('scripts')
<link href="/plugins/gritter/css/gritter.css" rel="stylesheet" />
<script src="/plugins/gritter/js/gritter.js"></script>
<script>

$(document).ready(function(){
    @if (session()->has('msg'))
    var unique_id = $.gritter.add({
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
});
</script>
@endsection
