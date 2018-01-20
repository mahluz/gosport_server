<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function index(){
    	$data['service'] = Service::get();
    	// dd($data);
    	return view('service.index',$data);
    }

    public function create(){

    	return view('service.create');
    }

    public function store(Request $request){
    	// dd($request);
    	$db["service"] = Service::create([
    		"service" => $request['jasa'],
    		"description" => $request["description"]
    	]);

    	return redirect('jasa');
    }

    public function delete(Request $request){
    	// dd($request);
    	$db["service"] = Service::where('id',$request["id"])->delete();

    	return redirect('jasa');
    }
}
