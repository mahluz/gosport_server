<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class PlaceController extends Controller
{
    public function index(){
    	$data['place'] = Service::join('places','services.id','=','places.service_id')->get();
    	return view('place.index',$data);
    }
}
