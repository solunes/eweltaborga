{{ header('X-UA-Compatible: IE=edge,chrome=1') }}
<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $site->name }} | @yield('title', $site->title)</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="@yield('description', $site->description)" />
  <meta name="keywords" content="{{ $site->keywords }}" />
  <meta name="google-site-verification" content="{{ $site->google_verification }}" />
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/images/favicon/favicon-57.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/images/favicon/favicon-72.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/images/favicon/favicon-114.png') }}">
  <link rel="stylesheet" href="{{ url(elixir("assets/css/vendor.css")) }}">
  <link rel="stylesheet" href="{{ url(elixir("assets/css/plugins.css")) }}">
  <link rel="stylesheet" href="{{ url(elixir("assets/css/template.css")) }}">
  <!--<link rel="stylesheet" href="{{ asset('assets/admin/css/master.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">-->
  <link rel="stylesheet" href="{{ url(elixir("assets/css/main.css")) }}">

  @yield('css')
  <!--[if lt IE 9]>
    <script src="{{ url(elixir("assets/js/ie8.js")) }}"></script> 
  <![endif]-->
</head>
<body class="main-site">

  <!--  preloader start -->
  <div id="tb-preloader">
      <div class="tb-preloader-wave"></div>
  </div>
  <!-- preloader end -->

  <div class="wrapper">

    <!--header start-->
    <header class="l-header l-header_overlay">

      <div class="l-navbar l-navbar_expand l-navbar_t-dark-trans">
        <div class="container-fluid">
          <nav class="menuzord js-primary-navigation" role="navigation" aria-label="Primary Navigation">

            <!--logo start-->
            <a class="navbar-brand" href="{{ url('') }}">
              <img src="{{ asset('assets/img/logo2.png') }}" alt="">
            </a>
            <!--logo end-->

            <!--mega menu start-->
            <ul class="menuzord-menu menuzord-right c-nav_s-standard">
              @include('includes.menu', ['items'=> $menu_main->roots()])
            </ul>
            <!--mega menu end-->

          </nav>
        </div>
      </div>

    </header>
    <!--header end-->
    @yield('header')

    <section class="body-content">
      @if(Session::has('message_error'))
        <div class="container"><div class="alert alert-danger center">{{ Session::get('message_error') }}</div></div>
      @elseif (Session::has('message_success'))
        <div class="container"><div class="alert alert-success center">{{ Session::get('message_success') }}</div></div>
      @endif
      @yield('content')
    </section>

    <!--footer 1 start -->
    <footer id="footer" class="dark">

      <div class="secondary-footer">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <span class="m-top-10">{!! $footer_name.' | '.$footer_rights !!}</span>
            </div>
            <div class="col-md-6">
              <div class="social-link circle pull-right">
                @foreach($social as $social_network)
                  <a target="_blank" href="{{ $social_network->url }}"><i class="fa fa-{{ $social_network->code }}"></i></a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!--footer 1 end-->

  </div>

  <!-- Scripts -->
  <script src="{{ url(elixir("assets/js/vendor.js")) }}"></script>
  <script src="{{ url(elixir("assets/js/plugins.js")) }}"></script>
  <script src="{{ url(elixir("assets/js/template.js")) }}"></script>
  @yield('script')

</body>
</html>