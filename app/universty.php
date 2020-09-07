<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class universty extends Model
{
    protected $fillable = ['name','description'];

    public static function registeredUniversity()
    {
        $university = self::get();

        return $university;
    }

    public static function insertUniversity($request)
    {
        $save = self::create([
            'name' => $request->name,
            'description'=> $request->description
        ]);

        return $save;
    }

}
