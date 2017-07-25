@extends('layouts/master')
@include('helpers.meta')

@section('css')

@endsection
@section('header')
<section class="page-title background-title dark banner-sb1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <h3 class="text-uppercase">{{ $page->name }} </h3>
        <ol class="breadcrumb box">
          <li><a href="{{ url('') }}">Inicio</a></li>
          <li class="active">{{ $page->name }}</li>
        </ol>
      </div>
    </div>
  </div>
</section>
@endsection
@section('content')
<!--feature -->
<div class="page-content">
  <div class="container services">
    <div class="row">

      <div class="heading-title-alt border-short-bottom text-center ">
        <h3 class="text-uppercase">nuestros servicios</h3>
        <div class="half-txt">A continuación le listamos los servicios en los que contamos con una basta experiencia</div>
      </div>

    </div>

    <div class="row">
      <div class="feature-box-grid">

        <div class="col-md-4">
          <div class="featured-item border-box text-center">
            <div class="icon">
              <i class="icon-lightbulb"></i>
            </div>
            <div class="title text-uppercase">
              <h4>ASESORÍA EN GESTIÓN DE RIESGOS</h4>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="featured-item border-box text-center">
            <div class="icon">
              <i class=" icon-browser2"></i>
            </div>
            <div class="title text-uppercase">
              <h4>DESARROLLO DE PRODUCTOS</h4>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="featured-item border-box text-center">
            <div class="icon">
              <i class=" icon-laptop2"></i>
            </div>
            <div class="title text-uppercase">
              <h4>ASESORÍA EN ESTRUCTURACIÓN DE PROGRAMAS DE SEGURO/REASEGURO</h4>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="featured-item border-box text-center">
            <div class="icon">
              <i class="icon-basic_pencil_ruler"></i>
            </div>
            <div class="title text-uppercase">
              <h4>SINIESTROS</h4>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="featured-item border-box text-center">
            <div class="icon">
              <i class="icon-basic_gear"></i>
            </div>
            <div class="title text-uppercase">
              <h4>OTROS</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class= "sub_services">

      <div class="service_each">
        <div class="post-list-aside">
          <div class="post-single">
            <div class="col-md-6">
              <div class="post-img title-img">
                <img src="assets/img/service.jpg" alt="">
                <div class="info">ASESORÍA EN GESTIÓN DE RIESGOS</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="post-desk p-top-0">

                <dl class="accordion time-line">
                  <dt>
                    <a href=""> Asesoría en Gestión de Riesgos</a>
                  </dt>
                  <dd>
                    Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
                  </dd>
                  <dt>
                    <a href="">Asesoría en Seguridad y Seguridad Industrial</a>
                  </dt>
                  <dd>
                    Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. leo quam aliquet diam, congue laoreet elit metus eget diam.
                  </dd>
                  <dt>
                    <a href="">Informes de Riesgo</a>
                  </dt>
                  <dd>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Proin ac metus diam.
                  </dd>
                </dl>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="service_each">
        <div class="post-list-aside">
          <div class="post-single">
            <div class="col-md-6">
              <div class="post-desk p-top-0">

                <dl class="accordion time-line">
                  <dt>
                    <a href="">Asesoría en desarrollo de productos de Seguros</a>
                  </dt>
                  <dd>
                    Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
                  </dd>
                  <dt>
                    <a href="">Creación de Pólizas/Productos de Seguros</a>
                  </dt>
                  <dd>
                    Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. leo quam aliquet diam, congue laoreet elit metus eget diam.
                  </dd>
                  <dt>
                    <a href="">Elaboración/Revisión de Condicionados de Pólizas</a>
                  </dt>
                  <dd>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Proin ac metus diam.
                  </dd>
                  <dt>
                    <a href="">Análisis/Cálculo de Primas de Seguros</a>
                  </dt>
                  <dd>
                    Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. leo quam aliquet diam, congue laoreet elit metus eget diam.
                  </dd>
                  <dt>
                    <a href="">Desarrollo/Comercialización de productos de Valor Agregado</a>
                  </dt>
                  <dd>
                    Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. leo quam aliquet diam, congue laoreet elit metus eget diam.
                  </dd>
                </dl>

              </div>
            </div>

            <div class="col-md-6">
              <div class="post-img title-img">
                <img src="assets/img/service.jpg" alt="">
                <div class="info">DESARROLLO DE PRODUCTOS</div>
              </div>
            </div>

          </div>
        </div>
      </div>   

    </div>

  </div>
</div>
<!--feature -->
@endsection

@section('script')

@endsection