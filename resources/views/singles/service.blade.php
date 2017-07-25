<div class="col-md-4">
  <div class="featured-item border-box text-center">
    <div class="icon">
      <i class="icon-{{ $item->icon }}"></i>
    </div>
    <div class="title text-uppercase">
      <h4>{{ $item->name }}</h4>
    </div>
    <div class="desc">
      @foreach($item->services as $service)
        - {{ $service->name }}<br>
      @endforeach
    </div>
  </div>
</div>