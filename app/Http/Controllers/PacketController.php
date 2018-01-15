<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacketController extends Controller
{
    public function index(){

    	return view('packet.index');
    }
}
