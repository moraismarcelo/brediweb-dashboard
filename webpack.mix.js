const { mix } = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath( __dirname).mergeManifest();

// mix.js(__dirname + '/Resources/assets/js/app.js', __dirname + '/Public/js/bredicoloradmin.js')
//     .sass( __dirname + '/Resources/assets/sass/app.scss', __dirname + '/Public/css/bredicoloradmin.css');

mix.styles([
    __dirname + '/src/Resources/assets/plugins/jquery-ui/jquery-ui.min.css',
    __dirname + '/src/Resources/assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css',
    __dirname + '/src/Resources/assets/plugins/font-awesome/5.2/css/all.css',
    __dirname + '/src/Resources/assets/plugins/animate/animate.min.css',
    __dirname + '/src/Resources/assets/css/default/style.css',
    __dirname + '/src/Resources/assets/css/default/style-responsive.min.css',
    __dirname + '/src/Resources/assets/css/default/theme/red.css',
    __dirname + '/src/Resources/assets/plugins/summernote/summernote.css',
    
    
], __dirname + '/src/Public/css/vendor.css')

mix.styles([
    __dirname + '/src/Resources/assets/plugins/gritter/css/jquery.gritter.css',
], __dirname + '/src/Public/plugins/gritter/css/gritter.css')

mix.scripts([
    __dirname + '/src/Resources/assets/plugins/pace/pace.min.js',
    __dirname + '/src/Resources/assets/plugins/jquery/jquery-3.3.1.min.js',
    __dirname + '/src/Resources/assets/plugins/jquery-ui/jquery-ui.min.js',
    __dirname + '/src/Resources/assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js',
    __dirname + '/src/Resources/assets/plugins/slimscroll/jquery.slimscroll.min.js',
    __dirname + '/src/Resources/assets/plugins/js-cookie/js.cookie.js',
    __dirname + '/src/Resources/assets/plugins/masked-input/masked-input.min.js',
    __dirname + '/src/Resources/assets/js/theme/default.min.js',
    __dirname + '/src/Resources/assets/js/apps.min.js',
    __dirname + '/src/Resources/assets/plugins/summernote/summernote.js',

], __dirname + '/src/Public/js/vendor.js')


mix.scripts([
    __dirname + '/src/Resources/assets/plugins/gritter/js/jquery.gritter.js',
], __dirname + '/src/Public/plugins/gritter/js/gritter.js')
mix.scripts([
    __dirname + '/src/Resources/assets/plugins/bootstrap-sweetalert/sweetalert.min.js',
], __dirname + '/src/Public/plugins/bootstrap-sweetalert/sweetalert.min.js')

mix.scripts([
    __dirname + '/node_modules/sortablejs/Sortable.js',
], __dirname + '/src/Public/plugins/sortablejs/Sortable.min.js')

mix.scripts([
    __dirname + '/src/Resources/assets/plugins/jquery-smart-wizard/src/js/jquery.smartWizard.js',
], __dirname + '/src/Public/plugins/jquery-smart-wizard/jquery.smartWizard.js')

mix.scripts([
    __dirname + '/src/Resources/assets/js/demo/form-wizards-validation.demo.js',
], __dirname + '/src/Public/plugins/form-wizards-validation/form-wizards-validation.min.js')

mix.scripts([
    __dirname + '/src/Resources/assets/plugins/parsley/dist/parsley.js',
], __dirname + '/src/Public/plugins/parsley/dist/parsley.js')

mix.scripts([
    __dirname + '/node_modules/jquery-maskmoney/dist/jquery.maskMoney.js',
], __dirname + '/src/Public/plugins/jquery-maskmoney/jquery.maskMoney.min.js')

mix.copyDirectory(__dirname + '/src/Resources/assets/plugins/summernote/font', __dirname + '/src/Public/summernote/font');
mix.version();
    
// if (mix.inProduction()) {
//     mix.version();
// }