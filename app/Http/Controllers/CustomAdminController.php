<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;

use Validator;
use Asset;
use AdminList;
use AdminItem;
use PDF;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomAdminController extends Controller {

	protected $request;
	protected $url;

	public function __construct(UrlGenerator $url) {
	  $this->middleware('auth');
	  $this->middleware('permission:dashboard');
	  $this->prev = $url->previous();
	  $this->module = 'custom-admin';
	}

	public function getIndex() {
		$array['activities'] = \App\Activity::with('node','user')->orderBy('created_at', 'DESC')->get()->take(20);
		$array['notifications'] = \Auth::user()->notifications->take(20);
      	return view('list.dashboard', $array);
	}
	
	public function getMapa() {
		if(request()->has('driver_id')){
			$driver_id = request()->input('driver_id');
		} else {
			$driver_id = 1;
		}
		if(request()->has('date')){
			$date = request()->input('date');
		} else {
			$date = date('Y-m-d');
		}
		$datetime_initial = $date.' 00:00:00';
		$datetime_final = $date.' 23:59:59';
		$drivers = \App\Driver::get()->lists('name','id')->toArray();
		$driver = \App\Driver::find($driver_id);
		$items = \App\Location::where('driver_id', $driver_id)->where('created_at', '>', $datetime_initial)->where('created_at', '<', $datetime_final)->get();
		$array = ['i'=>NULL, 'driver'=>$driver, 'date'=>$date, 'items'=>$items, 'drivers'=>$drivers];
		return view('content.mapa', $array);
	}

}