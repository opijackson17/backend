<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fare extends Model
{
    protected $fillable = ['hostel_id','room_id','fare'];

    public static function insertFareInfo($room_id, $request)
    {
        $save = self::create([
            'hostel_id' => $request->hostel_id,
            'room_id'   => $room_id,
            'fare'      => $request->fare
    ]);

    return $save;

    }


}
