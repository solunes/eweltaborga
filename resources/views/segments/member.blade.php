@if(count($items)>0)
  <div class="row">

    <div class="heading-title-alt border-short-bottom text-center ">
      <h3 class="text-uppercase">nuestro equipo</h3>
      <div class="half-txt">La empresa se compone por dos socios con una basta experiencia en seguros</div>
    </div>

    @foreach($items as $key => $item)
      @include('singles.member')
    @endforeach

  </div>
  <div class="parallax-inner parallax-8">
    <div class="container ">
      <div class="row">
        <div class="heading-title-alt text-center m-bot-0 inline-block">
          <span class="heading-sub-title text-uppercase theme-color">Hellen keller</span>
          <h1 class="light-txt">"Solos podemos hacer poco, juntos podemos hacer mucho"</h1>
        </div>
      </div>
    </div>
  </div>
@else
  <p>Actualmente no hay miembros de equipo en esta sección.</p>
@endif