<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable = ["user_id","full_name","birth_date","gender","last_education","profession","skill","cp"];
}
