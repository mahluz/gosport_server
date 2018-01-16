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
}
