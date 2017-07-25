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
  <div class="container">
    <div class="row">
      <div class="m-bot-50 inline-block">
        <!--title-->
        <div class="heading-title-alt text-center">
          <div class="m-bot-30">
            <img src="assets/img/logomini.png" alt="" />
          </div>
          <h3 class="text-uppercase">Its Hello World</h3>
          <div class="half-txt p-top-30">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus. Nam libero tempore</div>
          <div class="m-top-50 inline-block">
            <a href="#" class="btn btn-medium btn-dark-solid  "> purchase now</a>
          </div>
        </div>
        <!--title-->
      </div>
      <div class="col-md-12">
        <div class="responsive-img text-center ">
          <img src="assets/images/lap-2.png" alt="" />
        </div>
      </div>
    </div>
  </div>
</div>
<!--intro-->

<hr/>

<!--feature -->
<div class="page-content">
  <div class="container">
    <div class="row">

      <div class="heading-title-alt border-short-bottom text-center ">
        <h3 class="text-uppercase">nuestros servicios</h3>
        <div class="half-txt">A continuación le listamos los servicios en los que contamos con una basta experiencia</div>
      </div>

      <div class="feature-box-grid">

        @foreach($nodes['services'] as $item)
          @include('singles.service')
        @endforeach

      </div>

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