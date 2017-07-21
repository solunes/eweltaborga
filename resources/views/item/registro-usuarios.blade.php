@extends('layouts/master')

@section('header')
<section class="section paralbackground page-banner hidden-xs" style="background-image:url('{{ asset('assets/img/lapaz3.jpg') }}');" data-img-width="2000" data-img-height="400" data-diff="100">
</section>
@endsection

@section('content')
<div class="page-title">
  <div class="container clearfix">
    <div class="title-area pull-left">
      <h2>Regístrate <small>Se parte de nuestra fundación y aporta con lo que puedas</small></h2>
    </div><!-- /.pull-right -->
    <div class="pull-right hidden-xs">
      <div class="bread">
        <ol class="breadcrumb">
          <li><a href="{{ url('') }}">Inicio</a></li>
          <li class="active">Regístrate</li>
        </ol>
      </div><!-- end bread -->
    </div><!-- /.pull-right -->
  </div>
</div><!-- end page-title -->
<section class="section lb no-padding-top">
  <div class="container">
    <?php request()->session()->put('url.intended', request()->url()); ?>
    <p>Si ya cuentas con un perfil de usuario, solo debe siniciar sesión haciendo <a href="{{ url('iniciar-sesion') }}">click aquí</a>.</p>
    <p>Puedes registrarte de manera simple y gratuita como usuario de la Fundación Kalasasaya. Solo llena el siguiente formulario y confirma tu correo electrónico.</p>
    <div class="contact_form">
      {!! Form::open(['id'=>'registro', 'name'=>'login', 'url'=>'process/registrate', 'method'=>'post']) !!}
        <div class="row">
          {!! Field::form_input(NULL, 'create', ['name'=>'name', 'type'=>'string', 'required'=>1], [ 'label'=>'Nombre y Apellido', 'cols'=>12], ['placeholder'=>'Introduzca su nombre y apellido en este campo.']) !!}
          {!! Field::form_input(NULL, 'create', ['name'=>'email', 'type'=>'string', 'required'=>1], [ 'label'=>'Email', 'cols'=>12], ['placeholder'=>'Introduzca el correo electrónico con el que se asociará su cuenta de usuairo.']) !!}
          {!! Field::form_input(NULL, 'create', ['name'=>'password', 'type'=>'password', 'label'=>'Contraseña', 'required'=>1], ['cols'=>12]) !!}
        </div>
        <input type="submit" value="Regístrate" class="btn btn-primary">
      {!! Form::close() !!}
    </div>
  </div>
</section>
@endsection