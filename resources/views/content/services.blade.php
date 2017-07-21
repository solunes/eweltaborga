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
  <div class="container">
    <div class="row">

      <div class="heading-title-alt border-short-bottom text-center ">
        <h3 class="text-uppercase">nuestros servicios</h3>
        <div class="half-txt">A continuación le listamos los servicios en los que contamos con una basta experiencia</div>
      </div>

      @foreach($nodes['services'] as $item)
        @include('singles.service')
      @endforeach

    </div>

  </div>
</div>
<!--feature -->
@endsection

@section('script')

@endsection