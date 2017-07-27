@extends('layouts/master')
@include('helpers.meta')

@section('css')

@endsection
@section('header')
<!--hero section-->
<div id="fullscreen-banner" class="full-banner text-center vertical-align banner-07">
  <div class="container-mid">
    <div class="container">
      <div class="banner-title light-txt">
        <h1 class="text-uppercase">think smarter</h1>
        <h3 class="text-uppercase">we are massive for corporate </h3>
        <div class="m-top-50">
          <a href="#" class="btn btn-medium btn-theme-border-color "> Discover Massive</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--hero section-->
@endsection

@section('content')
<!--intro-->
<div class="page-content">
  <div class="title_home">
    <div class="container">
      <div class="row">
        <div class="m-bot-50 inline-block">
          <!--title-->
          <div class="heading-title-alt text-center">
            <div class="m-bot-30">
              <img src="assets/img/logomini.png" alt="" />
            </div>
            <div class="title_bg">
              <h3 class="text-uppercase">Its Hello World</h3>
              <div class="half-txt p-top-30">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus. Nam libero tempore</div>
            </div>
          </div>
          <!--title-->
        </div>
      </div>
    </div>
  </div>
</div>
<!--intro-->

<hr/>

<!--about-us-->
<div class="page-content tab-parallax-alt">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--tabs square start-->
        <section class="square-tabs icon-tabs light text-center ">
          <ul class="nav nav-pills">
            <li class="active">
              <a data-toggle="tab" href="#tab-20">
                <i class="icon-tools_measurement"> </i>
                Honestidad
              </a>
            </li>
            <li class="">
              <a data-toggle="tab" href="#tab-21">
                <i class="icon-ink_feather"> </i>
                Integridad
              </a>
            </li>
            <li class="">
              <a data-toggle="tab" href="#tab-22">
                <i class="icon-sound_recorder"> </i>
                Responsabilidad
              </a>
            </li>
            <li class="">
              <a data-toggle="tab" href="#tab-23">
                <i class="icon-tools_measurement"> </i>
                Innovación
              </a>
            </li>
            <li class="">
              <a data-toggle="tab" href="#tab-24">
                <i class="icon-ink_feather"> </i>
                Eficiencia
              </a>
            </li>

          </ul>
          
          <div class="panel-body">
            <div class="tab-content">
              <div id="tab-20" class="tab-pane active">
                <div class="row text-left">
                  <div class="col-md-6">
                    <h3 class="light-txt text-uppercase">We have a great ideology</h3>
                  </div>
                  <div class="col-md-6">
                    <p class="light-txt">Todas nuestras acciones, están enmarcadas en la transparencia y apego a la verdad.</p>
                  </div>
                </div>
              </div>
              <div id="tab-21" class="tab-pane">
                <div class="row text-left">
                  <div class="col-md-6">
                    <h3 class="light-txt text-uppercase">We have a great ideology</h3>
                  </div>
                  <div class="col-md-6">
                    <p class="light-txt">Actuamos de manera ecuánime, transmitiendo información auténtica, veraz y técnicamente sustentada.</p>
                  </div>
                </div>
              </div>
              <div id="tab-22" class="tab-pane">
                <div class="row text-left">
                  <div class="col-md-6">
                    <h3 class="light-txt text-uppercase">We have a great ideology</h3>
                  </div>
                  <div class="col-md-6">
                    <p class="light-txt">Actuamos en todo momento acorde a las funciones asignadas, respetando la normativa vigente.</p>
                  </div>
                </div>
              </div>
              <div id="tab-23" class="tab-pane">
                <div class="row text-left">
                  <div class="col-md-6">
                    <h3 class="light-txt text-uppercase">We have a great ideology</h3>
                  </div>
                  <div class="col-md-6">
                    <p class="light-txt">Creamos ideas y soluciones que simplifiquen la vida de nuestros clientes, acudiendo a la tecnología de vanguardia para lograr nuestros objetivos.</p>
                  </div>
                </div>
              </div>
              <div id="tab-24" class="tab-pane">
                <div class="row text-left">
                  <div class="col-md-6">
                    <h3 class="light-txt text-uppercase">We have a great ideology</h3>
                  </div>
                  <div class="col-md-6">
                    <p class="light-txt">Utilizamos de manera óptima los bienes y recursos que contamos para el desarrollo de nuestras actividades.</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>
                  <!--tabs square end-->
      </div>
    </div>
  </div>
</div>  
          

<!--feature -->
<div class="page-content">
  <div class="container">
    <div class="row">

      <div class="heading-title-alt border-short-bottom text-center ">
        <h3 class="text-uppercase">nuestros servicios</h3>
        <div class="half-txt">A continuación le listamos los servicios en los que contamos con una basta experiencia</div>
      </div>

        @foreach($nodes['services'] as $key => $item)
          @include('singles.service')
        @endforeach

    </div>

  </div>
</div>

<hr/>

<div class="page-content">
  <div class="container">
    <div class="row">

      <div class="heading-title-alt border-short-bottom text-center ">
        <h3 class="text-uppercase">nuestro equipo</h3>
        <div class="half-txt">La empresa se compone por dos socios con una basta experiencia en seguros</div>
      </div>

      @foreach($nodes['members'] as $key => $item)
        @include('singles.member')
      @endforeach

    </div>
  </div>
</div>
<!--feature -->
@endsection

@section('script')

@endsection