<section class="top-banner" @if($page->image) style="background-image: url({{ Asset::get_image_path('page-image','normal',$page->image)  }});" @endif >
	<h1>{{ $page->name }}</h1>
</section>