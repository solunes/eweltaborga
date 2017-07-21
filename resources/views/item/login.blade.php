@extends('layouts/master')

@section('header')
<section class="section paralbackground page-banner hidden-xs" style="background-image:url('{{ asset('assets/img/lapaz3.jpg') }}');" data-img-width="2000" data-img-height="400" data-diff="100">
</section>
@endsection

@section('content')
<div class="page-title">
  <div class="container clearfix">
    <div class="title-area pull-left">
      <h2>Iniciar Sesión <small>Se parte de nuestra fundación y aporta con lo que puedas</small></h2>
    </div><!-- /.pull-right -->
    <div class="pull-right hidden-xs">
      <div class="bread">
        <ol class="breadcrumb">
          <li><a href="{{ url('') }}">Inicio</a></li>
          <li class="active">Iniciar Sesión</li>
        </ol>
      </div><!-- end bread -->
    </div><!-- /.pull-right -->
  </div>
</div><!-- end page-title -->
<section class="section lb no-padding-top">
  <div class="container">
    <p>Si aún no cuentas con un usuario, puedes registrarte haciendo <a href="{{ url('registrate') }}">click aquí</a>.</p>
    <div class="contact_form">
      {!! Form::open(['id'=>'registro', 'name'=>'login', 'url'=>'process/login', 'method'=>'post']) !!}
        <div class="row">
          {!! Field::form_input(NULL, 'create', ['name'=>'user', 'type'=>'string', 'required'=>1], [ 'label'=>'Correo Electrónico', 'cols'=>12], ['placeholder'=>'Introduzca su correo electrónico con el que se registró.']) !!}
          {!! Field::form_input(NULL, 'create', ['name'=>'password', 'type'=>'password', 'label'=>'Contraseña', 'required'=>1], ['cols'=>12]) !!}
        </div>
        <input type="submit" value="Iniciar Sesión" class="btn btn-primary">
      {!! Form::close() !!}
    </div>
  </div>
</section>
@endsection