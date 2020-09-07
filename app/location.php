<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    
    protected $fillable = ['hostel_id','location','mobile','email'];

    public static function insertLocationInfo($request)
    {
        $save = self::create([
            'hostel_id'    => $request->hostel_id,
            'location'     => $request->location,
            'mobile'       => $request->mobile,
            'email'        => $request->email
    ]);

    return $save;

    }

    public static function getHostelLocation($id)
    {
        return $hostelData = self::whereHostel_id($id)->first(['location', 'mobile', 'email']);

    }


}
