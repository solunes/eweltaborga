<div class="col-md-6">
    <div class="featured-item feature-outline m-bot-100">
        <div class="icon theme-color">
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