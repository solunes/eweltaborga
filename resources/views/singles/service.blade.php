<div class="service_each">
  <div class="post-list-aside">
    <div class="post-single">

      @if (($key % 2) == 1)
        <div class="col-md-6">
          <div class="post-img title-img">
            <img src="assets/img/service.jpg" alt="">
            <div class="info">{{ $item->name }}</div>
          </div>
        </div>
      @endif

      <div class="col-md-6">
        <div class="post-desk p-top-0">
          <dl class="accordion time-line">
            @foreach($item->services as $service)
              <dt>
                <a href="">{{ $service->name }}</a>
              </dt>
              <dd>
                Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
              </dd>
            @endforeach
          </dl>
        </div>
      </div>

      @if (($key % 2) == 0)
        <div class="col-md-6">
          <div class="post-img title-img">
            <img src="assets/img/service.jpg" alt="">
            <div class="info">{{ $item->name }}</div>
          </div>
        </div>
      @endif

    </div>
  </div>
</div>
