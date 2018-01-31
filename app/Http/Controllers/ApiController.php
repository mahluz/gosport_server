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
use App\Biodata;

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
            "user_id"=>$request["user"]["id"],
            "service_id"=>$request["service"]["item"],
            "name"=>$request["user"]["name"],
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

        $data["user"] = User::where('id',$request["user"]["id"])->update([
            "status"=>"requested"
        ]);

        return Response::json([
            "result"=>$request
        ]);
    }

    public function getRequest(Request $request){
        $data=User::join('orders','orders.technician','=','users.id')->where('user_id',$request["user_id"])->where('description',"requested")->orWhere('description','on process')->get();
        return Response::json([
            "result"=>$data
        ]);
    }

    public function getBiodata(Request $request){
        $data["biodata"] = User::join('biodatas','users.id','=','biodatas.user_id')->where('user_id',$request["user_id"])->first();

        return Response::json($data);
    }

    public function cancelOrder(Request $request){
        $db = Order::where('id',$request["order_id"])->delete();

        return Response::json([
            "result"=>$db
        ]);
    }

    public function finishOrder(Request $request){
        $data = Order::where('id',$request["order_id"])->first();

        if($data["description"] == "on process"){
            $db = Order::where('id',$request["order_id"])->update([
                "description"=>"finished"
            ]);

            $technician = User::where("id",$data["technician"])->update([
                "status"=>"free"
            ]);
        } else {
            $db = "gagal";
        }

        return Response::json([
            "result"=>$db
        ]);

    }

    public function detailOrder(Request $request){
        $data["order"] = Order::join('services','services.id','=','orders.service_id')->join('places','orders.place','=','places.place')->where('orders.id',$request["order_id"])->first();

        $data["technician"] = User::join('biodatas','users.id','=','biodatas.user_id')->where('users.id',$data["order"]->technician)->first();

        return Response::json($data);

    }

    public function signup(Request $request){
        $db["user"] = User::create([
            "name"=>$request["name"],
            "email"=>$request["email"],
            "role_id"=>2,
            "password"=>bcrypt($request["password"])
        ]);

        $db["biodata"] = Biodata::create([
            "user_id"=>$db["user"]->id,
            "birth_date"=>$request["birth_date"],
            "gender"=>$request["gender"],
            "cp"=>$request["cp"]
        ]);

        return Response::json($db);
    }

    public function history(Request $request){
        $data["order"] = Order::join('users','users.id','=','orders.technician')->where('orders.user_id',$request["user_id"])->where('orders.description',"finished")->get();

        return Response::json($data);
    }

}
