<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class SettingController extends Controller
{
    public function index(){
    	$data['user'] = Role::join('users','roles.id','=','users.role_id')->get();
    	// dd($data['user']);
    	return view('setting.index',$data);
    }
}
