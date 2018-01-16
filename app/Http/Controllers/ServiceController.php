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
}
