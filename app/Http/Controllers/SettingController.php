<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class SettingController extends Controller
{
    public function index(){
    	$data['user'] = Role::join('users','roles.id','=','users.role_id')->where('role_id',1)->get();
    	// dd($data['user']);
    	return view('setting.index',$data);
    }

    public function create(){

    	return view('setting.create');
    }

    public function store(Request $request){
    	// dd($request);
    	$db["user"] = User::create([
    		"role_id"=>1,
    		"name"=>$request["name"],
    		"email"=>$request["email"],
    		"password"=>bcrypt($request["password"]),
    		"status"=>"free"
    	]);	

    	return redirect('setting');
    }

    public function delete(Request $request){
    	// dd($request);
    	$db["user"]= User::where("id",$request["id"])->delete();
    	return redirect('setting');
    }
}
