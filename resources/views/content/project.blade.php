@extends('layouts/master')
@include('helpers.meta')

@section('css')
@endsection

@section('header')
<section class="section paralbackground page-banner hidden-xs" style="background-image:url('{{ asset('assets/img/lapaz3.jpg') }}');" data-img-width="2000" data-img-height="400" data-diff="100">
</section>
@endsection

@section('content')
<section class="section lb">
  <div class="container">
    <div class="row">
      <div id="content" class="col-md-9 col-sm-12 single-blog">

        <div class="row">
          <div class="col-md-5 col-sm-5 col-xs-12">
            <div class="product-images">
              <a data-rel="prettyPhoto" href="{{ Asset::get_image_path('project-image', 'normal', $item->image) }}" title="">
                <img class="img-responsive" src="{{ Asset::get_image_path('project-image', 'thumb', $item->image) }}" alt="" />
              </a>
              <ul class="thumbnail">
                <li> <a data-rel="prettyPhoto[gallery]" href="{{ Asset::get_image_path('project-image', 'normal', $item->image) }}" title=""><img class="img-responsive" src="{{ Asset::get_image_path('project-image', 'thumb', $item->image) }}" alt="" /></a></li>
                <li> <a data-rel="prettyPhoto[gallery]" href="{{ Asset::get_image_path('project-image', 'normal', $item->image) }}" title=""><img class="img-responsive"  src="{{ Asset::get_image_path('project-image', 'thumb', $item->image) }}" alt="" /></a></li>
                <li> <a data-rel="prettyPhoto[gallery]" href="{{ Asset::get_image_path('project-image', 'normal', $item->image) }}" title=""><img class="img-responsive"  src="{{ Asset::get_image_path('project-image', 'thumb', $item->image) }}" alt="" /></a></li>
              </ul>
            </div>
          </div><!-- end col -->
          <div class="col-md-7 col-sm-7 col-xs-12">
            <div class="shop-desc bgw">
              <h3>{{ $item->name }} </h3>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              {!! $item->summary !!}

              <div class="shopmeta">
                <span><strong>Categoría:</strong> {{ $item->tag }}</span>
              </div><!-- end shopmeta -->

            </div><!-- end desc -->
          </div><!-- end col -->
        </div><!-- end row -->

        <hr class="invis">

        <div class="row">
          <div class="col-md-12">
            <div class="tab-style-1">
              <div class="tabbed-widget">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Descripción</a></li>
                  <li><a data-toggle="tab" href="#menu1">Actualizaciones</a></li>
                  <li><a data-toggle="tab" href="#menu2">Aportes Recibidos</a></li>
                  <li><a data-toggle="tab" href="#menu3">Comentarios</a></li>
                </ul>

                <div class="tab-content">
                  <div id="home" class="tab-pane fade in active">
                    {!! $item->content !!}
                  </div>
                  <div id="menu1" class="tab-pane fade in">
                    <div class="panel">
                      <div class="panel-body comments">
                        <ul class="media-list">
                          @foreach($item->project_updates as $comment)
                            <li class="media">
                              <div class="comment">
                                <a href="#" class="pull-left">
                                  <img src="{{ asset('assets/upload/avatar_01.jpg') }}" alt="" class="img-circle">
                                </a>
                                <div class="media-body">
                                  <strong class="text-success">{{ $comment->user->name }}</strong>
                                  <span class="text-muted"><small class="text-muted">6 days ago</small></span>
                                  {!! $comment->content !!}
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div id="menu2" class="tab-pane fade in">
                    <div class="panel">
                      <div class="panel-body comments">
                        <ul class="media-list">
                          @foreach($item->project_supports as $comment)
                            <li class="media">
                              <div class="comment">
                                <a href="#" class="pull-left">
                                  <img src="{{ asset('assets/upload/avatar_01.jpg') }}" alt="" class="img-circle">
                                </a>
                                <div class="media-body">
                                  <strong class="text-success">{{ $comment->user->name }}</strong>
                                  <span class="text-muted"><small class="text-muted">6 days ago</small></span>
                                  <p>{!! $comment->content !!}</p>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                    <div class="contact_form blog-desc">
                      <div class="widget-title">
                        <h4>Aporta al Proyecto</h4>
                        <hr>
                      </div>

                      <div class="contact_form">
                        @if(auth()->check())
                          <p>Escriba en que forma puede aportar, ya sea con dinero, material, tiempo, trabajo o cualquier otra forma. Una vez se reciba el aporte, tu contribución será publicada en esta sección.</p>
                          <form class="row" method="post" action="{{ url('process/project-support') }}">
                            <div class="col-md-12 col-sm-12">
                              <label>Describir Aporte <span class="required">*</span></label>
                              <textarea name="content" class="form-control" placeholder=""></textarea>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <input type="submit" value="Proponer Aporte" class="btn btn-primary" />
                            </div>
                            <input type="hidden" name="project_id" value="{{ $item->id }}">
                          </form>
                        @else
                          @include('includes.login')
                        @endif
                      </div><!-- end commentform -->
                    </div><!-- end postpager -->
                  </div>
                  <div id="menu3" class="tab-pane fade">

                    <div class="panel">
                      <div class="panel-body comments">
                        <ul class="media-list">
                          @foreach($item->project_comments as $comment)
                            <li class="media">
                              <div class="comment">
                                <a href="#" class="pull-left">
                                  <img src="{{ asset('assets/upload/avatar_01.jpg') }}" alt="" class="img-circle">
                                </a>
                                <div class="media-body">
                                  <strong class="text-success">{{ $comment->user->name }}</strong>
                                  <span class="text-muted"><small class="text-muted">6 days ago</small></span>
                                  <p>{!! $comment->content !!}</p>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>

                    <div class="contact_form blog-desc">
                      <div class="widget-title">
                        <h4>Dejar un comentario</h4>
                        <hr>
                      </div>

                      <div class="contact_form">
                        @if(auth()->check())
                          <form class="row" method="post" action="{{ url('process/project-comment') }}">
                            <div class="col-md-12 col-sm-12">
                              <label>Comentario <span class="required">*</span></label>
                              <textarea name="content" class="form-control" placeholder=""></textarea>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <input type="submit" value="Enviar Comentario" class="btn btn-primary" />
                            </div>
                            <input type="hidden" name="project_id" value="{{ $item->id }}">
                          </form>
                        @else
                          @include('includes.login')
                        @endif
                      </div><!-- end commentform -->
                    </div><!-- end postpager -->

                  </div>

                </div><!-- end content -->
              </div>
            </div>
          </div>
          <!-- end tabbed-widget -->
        </div>
        <!-- end service-style-1 -->

      </div><!-- end content -->

      <div id="sidebar" class="col-md-3 col-sm-12">
        <div class="widget clearfix">
          <div class="about-widget">
            <div class="about-desc">
              <h4>Detalles del Proyecto</h4>
              <p>Bs. {{ $item->investment }}</p>
              <small>Inversión Necesaria</small>
              <p>Bs. {{ $item->funded }}</p>
              <small>Contribuciones Recibidas</small>
              <p>30% de avance</p>
              <small>Ejecución de Proyecto</small>
            </div>
          </div>
          <!-- end about-widget -->
        </div>
        <!-- end widget -->

      </div><!-- end sidebar -->
    </div><!-- end row -->
  </div>
</section>
@endsection

@section('script')
@endsection