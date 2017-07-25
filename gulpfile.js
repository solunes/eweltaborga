var elixir = require('laravel-elixir');
var htmlmin = require('gulp-htmlmin');
var gulp = require('gulp');

require('laravel-elixir-sass-compass');

var paths = {
    'jquery': '../../bower_components/jquery/',
    'bootstrap': '../../bower_components/bootstrap-sass-official/assets/',
    'fontawesome': '../../bower_components/fontawesome/',
    'perfectscrollbar': '../../bower_components/perfect-scrollbar/min/',
    'animatecss': '../../bower_components/animate.css/',
    'wysiwygeditor': '../../bower_components/wysiwyg-editor/',
    'navbarmenu': '../../bower_plugins/MegaNavbar/assets/',
    'elasicslider': '../../bower_plugins/elasic-slider/',
    'iconmoon': '../../bower_plugins/iconmoon/',
    'menuzord': '../../bower_plugins/menuzord/',
    'parallax': '../../bower_plugins/parallax-js/',
    'sticky': '../../bower_plugins/sticky/',
    'magnificpopup': '../../bower_plugins/magnific-popup/',
    'flexslider': '../../bower_components/FlexSlider/',
    'wow': '../../bower_components/wow/dist/',
    'owl': '../../bower_components/OwlCarousel2/dist/',
    'isotope': '../../bower_components/isotope/dist/',
    'imagesloaded': '../../bower_components/imagesloaded/',
    'excanvas': '../../bower_components/ExplorerCanvas/',
    'respondjs': '../../node_modules/respond.js/dest/',
    'angularcode': 'resources/assets/ng/',
    'legacycss': 'resources/assets/legacy/css/',
    'legacyjs': 'resources/assets/legacy/js/',
}
var public_directory = 'public';

elixir.config.publicDir = public_directory;
elixir.config.publicPath  = public_directory;
elixir(function(mix) {
    mix.cssOuput = public_directory + '/assets/css';
    mix.jsOuput = public_directory + '/assets/js';
    mix
        /*.copy(paths.bootstrap + 'stylesheets/**', 'resources/assets/sass/bootstrap')
        .copy(paths.bootstrap + 'fonts/bootstrap/**', public_directory + '/assets/fonts/bootstrap')
        .copy(paths.fontawesome + 'scss/**', 'resources/assets/sass/fontawesome')
        .copy(paths.fontawesome + 'fonts/**', public_directory + '/assets/fonts/fontawesome')
        .copy(paths.iconmoon + 'fonts/**', public_directory + '/assets/fonts/iconmoon')
        .sass("resources/assets/sass/vendor.scss", public_directory + '/assets/css/vendor.css')
        .sass("resources/assets/sass/template/style.scss", public_directory + '/assets/css/template.css')*/
        .compass("main.scss", public_directory + '/assets/css', {
            config_file: "config/compass.rb",
            style: "nested",
            comments: false,
            sass: "resources/assets/main"
        })
        /*.styles([
            paths.wysiwygeditor + "css/froala_style.min.css",
            paths.animatecss + "animate.min.css",
            paths.elasicslider + "elastic.css",
            paths.iconmoon + "linea-icon.css",
            paths.owl + "assets/owl.carousel.css",
            paths.owl + "assets/owl.theme.css"
        ], public_directory + '/assets/css/plugins.css', './')
        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js"
        ], public_directory + '/assets/js/vendor.js', './')
        .scripts([
            paths.isotope + "isotope.pkgd.min.js",
            paths.imagesloaded + "imagesloaded.pkgd.min.js",
            paths.elasicslider + "jquery.eislideshow.js",
            paths.menuzord + "menuzord.js",
            paths.owl + "owl.carousel.min.js",
            paths.parallax + "parallax.min.js",
            paths.sticky + "jquery.sticky.min.js",
            paths.magnificpopup + "jquery.magnific-popup.min.js",
            paths.flexslider + "jquery.flexslider-min.js",
            paths.wow + "wow.min.js"
        ], public_directory + '/assets/js/plugins.js', './')
        .scripts([
            paths.legacyjs + "scripts.min.js"
        ], public_directory + '/assets/js/template.js', './')
        .scripts([
            paths.respondjs + "respond.min.js",
            paths.excanvas + "excanvas.js"
        ], public_directory + '/assets/js/ie8.js', './')*/
        .version([
            'assets/css/vendor.css',
            'assets/css/plugins.css',
            'assets/css/template.css',
            'assets/css/main.css',
            'assets/js/vendor.js',
            'assets/js/plugins.js',
            'assets/js/template.js',
            'assets/js/ie8.js'
        ]);
});

gulp.task('compress', function() {
    var opts = {
        collapseWhitespace:    true,
        removeAttributeQuotes: true,
        removeComments:        true,
        minifyJS:              true
    };

    return gulp.src('./storage/framework/views/**/*')
        .pipe(htmlmin(opts))
        .pipe(gulp.dest('./storage/framework/views/'));
});