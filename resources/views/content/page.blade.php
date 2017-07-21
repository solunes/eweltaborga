@extends('layouts/master')
@include('helpers.meta')

@section('css')
  @include('helpers.page-css',['page'=>$page])
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
<section class="page-content">
  <div class="container">
    @if(count($nodes)>0)
      <div class="content-page">
        @foreach($nodes as $node_name => $node)
          <div class="content-segment content-{{ $node['node']->name }} page-{{ $node['node']->id }}">
            @if($node['node']->folder=='form')
                @include('segments.form', $node['subarray'])
            @else
              @include('segments.'.$node['node']->name, $node['subarray'])
            @endif
          </div>
        @endforeach
      </div>
    @endif
    <p><br><br><br></p>
  </div>
</section>
@endsection

@section('script')
  @include('helpers.page-script',['page'=>$page])
@endsection