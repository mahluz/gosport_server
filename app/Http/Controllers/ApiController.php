<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use JWTAuth;
use JWTAuthException;
use App\User;
use App\Order;
use App\Service;
use App\Place;
use App\Packet;

class ApiController extends Controller
{
    public function __construct(){
    	$this->user = new User;
    }

    public function login(Request $request){
    	// return "yey";
    	// dd($request);
    	$credentials = $request->only('email','password');
    	$token = null;

    	try{
    		if(!$token = JWTAuth::attempt($credentials)){
    			return Response::json([
    				"response"=>'error',
    				"message"=>'invalid_email_or_password',
    			]);
    		}
    	}catch(JWTAuthException $e){
    		return Response::json([
    			'response'=>'error',
    			"message"=>'failed_to_create_token',
    		]);
    	}

    	return Response::json([
    		"response"=>'success',
    		"result"=>[
    			'token' => $token,
    		]
    	]);
    }

    public function getAuthUser(Request $request){
    	$user = JWTAuth::toUser($request->token);

    	return Response::json([
    		"result"=> $user
    	]);
    }

    public function getServices(){
        $data = Service::get();

        return Response::json([
            "result"=>$data
        ]);
    }

    public function getForm(Request $request){
        $data["packet"] = Packet::where('service_id',$request["service_id"])->get();
        $data["place"] = Place::where('service_id',$request["service_id"])->get();

        return Response::json([
            "result"=>$data
        ]);  
    }

    public function getOrders(Request $request){
        $data = User::join('orders','users.id','=','orders.user_id')->where('orders.user_id',$request["id"])->get();

        return Response::json([
            "result"=>$data
        ]);
    }

    public function request(Request $request){
        // return $request["request"];
        $db = Order::create([
            "user_id"=>$request["user"]["result"]["id"],
            "name"=>$request["user"]["result"]["name"],
            "age"=>$request["request"]["age"],
            "gender"=>$request["request"]["gender"],
            "address"=>$request["request"]["address"],
            "cp"=>$request["request"]["cp"],
            "service"=>$request["request"]["service"],
            "packet"=>$request["request"]["packet"],
            "place"=>$request["request"]["place"],
            "start_date"=>$request["request"]["start_date"],
            "start_time"=>$request["request"]["start_time"]
        ]);

        $data["user"] = User::where('id',$request["user"]["result"]["id"])->update([
            "status"=>"requested"
        ]);

        return Response::json([
            "result"=>$db
        ]);
    }
}
