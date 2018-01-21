<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;

class CustomerController extends Controller
{
    public function index(){
    	$data["customer"] = User::join('orders','users.id','=','orders.user_id')->get();
    	// dd($data);
    	return view('customer.index',$data);
    }

    public function delete(Request $request){
    	$db["order"] = Order::where('id',$request["id"])->delete();

    	return redirect('pelanggan');
    }
}
