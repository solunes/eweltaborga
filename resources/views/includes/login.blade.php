<?php request()->session()->put('url.intended', request()->url()); ?>
<div class="login">
  {!! Form::open(['id'=>'login', 'name'=>'login', 'url'=>'process/login', 'method'=>'post']) !!}
    <p>No tienes una sesión iniciada para poder interactuar. Puedes iniciar sesión aquí y si no tienes una cuenta, puedes registrarte haciendo <a href="{{ url('registrate') }}">click aquí</a>.</p>
        <div class="row">
          {!! Field::form_input(NULL, 'edit', ['name'=>'user', 'type'=>'string', 'required'=>1], [ 'label'=>'Email', 'cols'=>12], ['placeholder'=>'Introduzca el correo electrónico con el que se registró.']) !!}
          {!! Field::form_input(NULL, 'edit', ['name'=>'password', 'type'=>'password', 'label'=>'Contraseña', 'required'=>1], ['cols'=>12]) !!}
    </div>
        <input type="submit" value="Iniciar Sesión" class="btn btn-primary">
  {!! Form::close() !!}
</div>