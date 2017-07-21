<div class="heading-title-alt border-short-bottom text-center ">
  <h3 class="text-uppercase">Siéntete libre para contactarnos</h3>
  <div class="half-txt">Si tiene cualquier duda o consulta acerca de nuestra empresa, no dude en contactarnos por los siguientes medios.</div>
</div>
@foreach($items as $item)
  <div class="row page-content">
    <div class="col-md-4">
      <div class="featured-item text-center">
        <div class="icon">
          <i class="icon-map"></i>
        </div>
        <div class="title text-uppercase">
          <h4>Oficina</h4>
        </div>
        <div class="desc">
          {{ $item->location_1 }}
          <br/>{{ $item->location_2 }}
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="featured-item text-center">
        <div class="icon">
          <i class="icon-mobile"></i>
        </div>
        <div class="title text-uppercase">
          <h4>Teléfono</h4>
        </div>
        <div class="desc">
          {{ $item->phone_1 }}
          <br/>{{ $item->phone_2 }}
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="featured-item text-center">
        <div class="icon">
          <i class="icon-envelope"></i>
        </div>
        <div class="title text-uppercase">
          <h4>Correo</h4>
        </div>
        <div class="desc">
          {{ $item->email_1 }}
          <br/>{{ $item->email_2 }}
        </div>
      </div>
    </div>
  </div>
@endforeach