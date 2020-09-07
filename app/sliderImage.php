<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;

class sliderImage extends Model
{
    protected $fillable = ['hostel_id','slideImage'];

    public static function insertMultipleImageInfo($current_id, $request)
    {
      // if (!isEmpty($request->file('slideImage'))) {
           
        foreach ($request->file('slideImage') as $file) {
        	Image::make($file)->resize(1200,600)->save(public_path().'/slideImage/'.$file->getClientOriginalName());
        	$imageName = $file->getClientOriginalName();

        	$slideImage = self::create([
        		'hostel_id'		=>	$current_id,
        		'slideImage'	=>	$imageName
        	   ]);

            }

        return $slideImage;
        // }
    }


}
