<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ["user_id","service_id","name","age","gender","address","cp","service","packet","place","start_date","start_time"];
}
