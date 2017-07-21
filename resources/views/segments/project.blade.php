<section class="section">
  <div class="container">

    <div class="row">
      @foreach($items as $item)
        @include('singles.project')
      @endforeach
    </div><!-- end row -->

  </div><!-- end container -->
</section><!-- end section -->