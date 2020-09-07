<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $fillable = ['hostel_id','service'];


    public static function insertServiceInfo($hostel_id, $request)
    {
    	$store = self::create([
            'hostel_id' =>  $hostel_id,
            'service'   =>  $request->service
        ]);

    	return $store;
    }


    public static function getHostelService($id)
    {
    	return $hostelData = self::whereHostel_id($id)->first(['service']);

    }
}
