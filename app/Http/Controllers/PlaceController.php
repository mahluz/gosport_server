<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Place;

class PlaceController extends Controller
{
    public function index(){
    	$data['place'] = Service::join('places','services.id','=','places.service_id')->get();
    	return view('place.index',$data);
    }

    public function create(){
    	$data["services"] = Service::get();
    	return view('place.create',$data);
    }

    public function store(Request $request){
    	// dd($request);
    	$db["place"] = Place::create([
    		"service_id"=>$request["service_id"],
    		"place"=>$request["place"]
    	]);

    	return redirect('tempat');
    }

    public function delete(Request $request){
    	$db["place"] = Place::where('id',$request["id"])->delete();

    	return redirect('tempat');
    }
}
