<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hotel extends Model
{
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'regency', 'phone', 'website', 'image', 'latitude', 'longitude'
    ];

    public function allData()
    {
        $results = DB::table('hotels')->get();
        return $results;
    }
}
