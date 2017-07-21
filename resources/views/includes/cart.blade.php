@if(auth()->check())
    <li><a href="{{ url('process/logout') }}">Salir</a></li>
@else
    <li><a href="{{ url('iniciar-sesion') }}">Ingresar</a></li>
    <li><a href="{{ url('registrate') }}">Registrarse</a></li>
@endif
@foreach($social as $social_network)
  <li class="hidden-sm hidden-xs"><a href="{{ $social_network->url }}" data-tooltip="tooltip" data-placement="bottom" title="{{ strtoupper($social_network->code) }}"><i class="fa fa-{{ $social_network->code }}"></i></a></li>
@endforeach
<li class="dropdown searchdropdown hasmenu hidden-sm">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
  <ul class="dropdown-menu show-right">
    <li>
      <div id="custom-search-input">
        <div class="input-group col-md-12">
          <input type="text" class="form-control input-lg" placeholder="Buscar aquí..." />
          <span class="input-group-btn">
            <button class="button button--aylen btn btn-lg" type="button">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </li>
  </ul>
</li>