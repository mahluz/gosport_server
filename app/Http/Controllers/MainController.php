<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\User;
use App\Order;
use App\Biodata;

// array object
class orderDate{
	public $senin = 0;
	public $selasa = 0;
	public $rabu = 0;
	public $kamis = 0;
	public $jumat = 0;
	public $sabtu = 0;
	public $minggu = 0;
}
// end array object

class MainController extends Controller
{
    public function index(){
    	$firstDate = Order::where('description','finished')->orderBy('created_at','asc')->first();
    	$lastDate = Order::where('description','finished')->orderBy('created_at','desc')->first();
    	$data['report'] = Order::select(DB::raw('count(id) as `data`'),DB::raw("CONCAT_WS('-',YEAR(created_at),MONTH(created_at)) as monthyear"))
               ->groupby('monthyear')
               ->get();

        // dd($data);
    	return view('main.index',$data);
    }

    public function getData(Request $request){
    	
    	$data["orderDate"] = new orderDate();
    	$data["order"] = Order::whereMonth('created_at',date("m",strtotime($request["date"])))
    							->whereYear('created_at',date("Y",strtotime($request["date"])))->get();

  		foreach($data["order"] as $index => $ini){
  			if(date('D',strtotime($ini->created_at)) == "Mon"){
  				$data["orderDate"]->senin = $data["orderDate"]->senin+1;
  			} elseif(date('D',strtotime($ini->created_at)) == "Tue"){
  				$data["orderDate"]->selasa = $data["orderDate"]->selasa+1;
  			} elseif(date('D',strtotime($ini->created_at)) == "Wed"){
  				$data["orderDate"]->rabu = $data["orderDate"]->rabu+1;
  			} elseif(date('D',strtotime($ini->created_at)) == "Thu"){
  				$data["orderDate"]->kamis = $data["orderDate"]->kamis+1;
  			} elseif(date('D',strtotime($ini->created_at)) == "Fri"){
  				$data["orderDate"]->jumat = $data["orderDate"]->jumat+1;
  			} elseif(date('D',strtotime($ini->created_at)) == "Sat"){
  				$data["orderDate"]->sabtu = $data["orderDate"]->sabtu+1;
  			} elseif(date('D',strtotime($ini->created_at)) == "Sun"){
  				$data["orderDate"]->minggu = $data["orderDate"]->minggu+1;
  			}
  		}

    	return Response::json($data);
    }
}
