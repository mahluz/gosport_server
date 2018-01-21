<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TechnicianController extends Controller
{
    public function index(){
    	$data["technician"]=User::where('role_id',3)->get();
    	return view('technician.index',$data);
    }

    public function create(){

    	return view('technician.create');
    }

    public function store(Request $request){
    	// dd($request);
    	$db["technician"] = User::create([
    		"role_id"=>3,
    		"name"=>$request["name"],
    		"email"=>$request["email"],
    		"password"=>bcrypt($request["password"]),
    		"status"=>"free"
    	]);

    	return redirect('teknisi');
    }

    public function delete(Request $request){

    	$db["technician"] = User::where('id',$request["id"])->delete();

    	return redirect('teknisi');
    }
}
