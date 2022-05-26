<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hotel extends Model
{
    public function allData(){
        $results = DB::table('hotels')->get();
        return $results;
    }
}
