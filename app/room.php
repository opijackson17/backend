<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    
    protected $fillable = ['hostel_id','room'];

    public static function insertRoomInfo($request)
    {
        $save = self::insertGetId([
            'hostel_id'     => $request->hostel_id,
            'room'          => $request->room,
            'description'   => $request->description
    ]);

    return $save;

    }


}
