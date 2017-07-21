@extends('master::layouts/admin')

@section('content')
  <h3>Filtros</h3>
  {!! Form::open(['url'=>'admin/mapa', 'method'=>'get']) !!}
    <div class="row">
      {!! Field::form_input($i, 'create', ['name'=>'date', 'type'=>'string', 'required'=>true], ['class'=>'datepicker', 'value'=>$date]) !!}
      {!! Field::form_input($i, 'create', ['name'=>'driver_id', 'type'=>'select', 'required'=>true, 'options'=>$drivers], ['value'=>$driver->id]) !!}
    </div>
    <input type="submit" name="send" value="Filtrar" class="btn btn-site" />
  {!! Form::close() !!}
  <h1>Ruta de: {{ $driver->name }}</h1>
  @if(count($items)>0)
    <p>Se encontraron {{ count($items) }} puntos en este día y para este usuario. Recuerde que la ubicación del supervisor puede variar según el margen de error que se identifica en el circulo azul.</p>
    <table class="table">
      <tr><td>Latitud</td><td>Longitud</td><td>Accuracy</td><td>Fecha / Hora</td></tr>
      @foreach($items as $item)
        <tr><td>{{ $item->latitude }}</td><td>{{ $item->longitude }}</td><td>{{ $item->accuracy }}</td><td>{{ $item->created_at }}</td></tr>
      @endforeach
    </table>
    <div id="map" style="height: 800px;"></div>
  @else
    <p>No hay puntos para el día seleccionado.</p>
  @endif
@endsection

@section('script')
  <script>
    var map;
    function initMap() {
      var bounds = new google.maps.LatLngBounds();
      var latlng = new google.maps.LatLng(-16.489689, -68.1192936);
      var mapOptions = {
        center: latlng,
        zoom: 4,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var el=document.getElementById("map");
      map = new google.maps.Map(el, mapOptions);

      var flightPlanCoordinates = [
        @foreach($items as $item)
          {lat: {{ $item->latitude }}, lng: {{ $item->longitude }}, acc: {{ $item->accuracy }}, tit: "{!! '<strong>'.$item->name.'</strong><br>'.$item->date_summary !!}" },
        @endforeach
      ];
      var flightPath = new google.maps.Polyline({
        path: flightPlanCoordinates,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
      });

      flightPath.setMap(map);

      var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      var labelIndex = 0;
      for (var flight in flightPlanCoordinates) {
        var content = flightPlanCoordinates[flight].tit;
        var marker = new google.maps.Marker({
          position: {lat: flightPlanCoordinates[flight].lat, lng: flightPlanCoordinates[flight].lng},
          map: map,
          label: labels[labelIndex++ % labels.length]
        });
        var infowindow = new google.maps.InfoWindow();
        google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
          return function() {
            infowindow.setContent(content);
            infowindow.open(map,marker);
          };
        })(marker,content,infowindow)); 

        // Add the circle for this city to the map.
        var circle = new google.maps.Circle({
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35,
          map: map,
          center: { lat: flightPlanCoordinates[flight].lat, lng: flightPlanCoordinates[flight].lng },
          radius: Math.sqrt(flightPlanCoordinates[flight].acc)
        });
        bounds.extend(circle.center);
      }

      map.fitBounds(bounds);

    }

  </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM9WvJSlDEv4CVMuCABBosg4Z-mcOB7hM&callback=initMap">
  </script>
@endsection