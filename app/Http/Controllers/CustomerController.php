<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;

class CustomerController extends Controller
{
    public function index(){
    	$data["customers"] = User::join('orders','users.id','=','orders.user_id')->get();
    	$data["technicians"] = User::where('role_id',3)->get();
    	// dd($data);
    	return view('customer.index',$data);
    }

    public function delete(Request $request){
    	$db["order"] = Order::where('id',$request["id"])->delete();

    	return redirect('pelanggan');
    }

    public function setTechnician(Request $request){
    	// dd($request);
    	$db["order"] = Order::where('id',$request["id"])->update([
    		"technician"=>$request["technician_id"],
    		"description"=>"on process"
    	]);

    	$db["technician"] = User::where('id',$request["technician_id"])->update([
    		"status"=>"on work"
    	]);

    	return redirect('pelanggan');
    }

    public function technicianDetail(){

    	return view('customer.technicianDetail');
    }
}
