<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller\Api;

class DriverController extends BaseController {

	public function getDeliveries(){
        if(auth()->check()&&$driver = auth()->user()->driver){
            $delivery_array = \Func::get_deliveries($driver);
            return $delivery_array;
        } else {
            throw new \Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException('Hubo un error al encontrar al conductor relacionado a su usuario.');
        }
	}

    public function getUpdateLocation($latitude, $longitude, $accuracy){
        if(auth()->check()&&$driver = auth()->user()->driver){
            // Guardar Ubicación
            $location = new \App\Location;
            $location->driver_id = $driver->id;
            $location->latitude = $latitude;
            $location->longitude = $longitude;
            $location->accuracy = $accuracy;
            $location->save();
            // Devolver Deliveries
            $delivery_array = \Func::get_deliveries($driver);
            return $delivery_array;
        } else {
            throw new \Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException('Hubo un error al encontrar al conductor relacionado a su usuario.');
        }
    }

    public function getDeliveryStatus($delivery_id, $status, $latitude, $longitude){
        if(auth()->check()&&$driver = auth()->user()->driver){
            $delivery = \App\Delivery::find($delivery_id);
            $task_create_array = ['accepted','picked','delivered'];
            if(in_array($status, $task_create_array)){
                if($status=='accepted'){
                    $task = 'pick';
                } else if($status=='picked'){
                    $task = 'deliver';
                } else if($status=='delivered'){
                    $task = 'pay';
                }
                \Func::create_delivery_driver($delivery, $driver, $task, $latitude, $longitude);
            }
            $delivery->status = $status;
            $delivery->save();
            return ['status'=>$status];
        } else {
            throw new \Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException('Hubo un error al encontrar al conductor relacionado a su usuario.');
        }
    }

}
