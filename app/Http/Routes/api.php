<?php

//Route::post('api/authenticate', 'Auth\AuthenticateController@authenticate');
Route::group(['prefix' => 'api-auth'], function(){
    Route::post('authenticate', 'Auth\AuthenticateController@authenticate');
});

app('api.router')->group(['version'=>'v1', 'namespace'=>'App\\Http\\Controllers\\Api'], function($api){
	$api->get('deliveries', 'DriverController@getDeliveries');
	$api->get('update-location/{latitude}/{longitude}/{accuracy}', 'DriverController@getUpdateLocation');
	$api->get('delivery-status/{delivery_id}/{status}/{latitude}/{longitude}', 'DriverController@getDeliveryStatus');
});