<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packet;
use App\Service;

class PacketController extends Controller
{
    public function index(){
    	$data['packet'] = Service::join('packets','services.id','=','packets.service_id')->get();
    	return view('packet.index',$data);
    }

    public function create(){
    	$data["services"] = Service::get();
    	return view('packet.create',$data);
    }

    public function store(Request $request){
    	// dd($request);
    	$db["packet"] = Packet::create([
    		"service_id"=>$request["service_id"],
    		"packet"=>$request["packet"]
    	]);

    	return redirect('paket');
    }

    public function delete(Request $request){
        $db["packet"] = Packet::where('id',$request["id"])->delete();

        return redirect('paket');
    }
}
