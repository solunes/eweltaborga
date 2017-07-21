<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
      .pdf-header { font-size: 15px; line-height: 25px; font-family: Helvetica; }
      .pdf-header p { font-size: 15px; }
      p.image { text-align: center; margin-bottom: 0; }
      p.image img { width: 300px; height: auto;  }
      h3 { color: #337ab7; text-align: center; font-size: 14px; margin-top: 0; }
    </style>
</head>
<body style="margin:0; padding:0;">
  <div class="pdf-header">
    <p class="image"><img src="{{ asset('assets/img/logo.jpg') }}" /></p>
    <h3>La Paz, Bolivia. 2 - 6 de Mayo del 2017</h3>
    <p>&nbsp;</p>
    <p>Siguientes pasos:</p>
    <ul>
      <li>Imprimir esta página</li>
      <li>Hacer el pago de inscripción únicamente durante el martes 02 de mayo del 2017 de 15:00 a 18:00 en las oficinas del MUSEF (Calle Ingavi N° 916)</li>
    </ul>
    <p>&nbsp;</p>
  </div>
  <div class="pdf-header">
    <h2>Datos de Inscripción</h2>
    <p><strong>Nombre:</strong> {{ $item->name }}<br>
    <strong>Apellido:</strong> {{ $item->last_name }}<br>
    <strong>Carrera o Profesión:</strong> {{ $item->career }}<br>
    <strong>Universidad:</strong> {{ $item->university }}<br>
    <strong>País:</strong> {{ $item->country }}<br>
    <strong>Ciudad:</strong> {{ $item->city }}<br>
    <strong>Email:</strong> {{ $item->email }}<br>
    <strong>Teléfonos:</strong> {{ $item->phones }}<br>
    <strong>Interés en:</strong> {{ trans('master::admin.'.$item->interest) }}</p>
  </div>
</body>
</html>