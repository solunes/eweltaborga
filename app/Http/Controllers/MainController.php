<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Segment;

class MainController extends Controller {

	public function __construct() {

  	}

	public function showIndex() {
	    $locale = \App::getLocale();
	    $page = \Solunes\Master\App\Page::where('customized_name', 'home')->first();
	    return redirect($page->translate($locale)->slug);
	}
  
  	public function showPage($slug) {
	    if($page_translation = \Solunes\Master\App\PageTranslation::findBySlug($slug)){
	      $page = $page_translation->page;
	      if($page->type!='blank'&&$page->type!='external'&&$page_translation->locale!=\App::getLocale()){
	        return redirect('change-locale/'.$page_translation->locale.'/'.$page_translation->slug);
	      }
	      $array = ['page'=>$page, 'i'=>NULL, 'dt'=>false];
	      if($page->type=='blank'||$page->type=='external'){
	        return abort(404);
	      } 
	      $slug = $page_translation->slug;
	      if($page->type=='customized') {
	        $array = \CustomFunc::get_custom_node_array($array, $page, false);
	        return view('content.'.$page->customized_name, $array);
	      } else {
	        $array = \CustomFunc::get_node_array($array, $page, false);
	        return view('content.page', $array);
	      }
	    } else {
	      return abort(404);
	    }
  	}

	public function findProject($slug) {
	    $item = \App\Project::findBySlug($slug);
	    $page = \Solunes\Master\App\Page::find(3);
	    return view('content.project', ['item'=>$item, 'page'=>$page]);
	}

}