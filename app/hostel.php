<?php

namespace App;

use Image;
use App\room;
use App\fare;
use App\service;
use App\location;
use App\universty;
use App\sliderImage;
use Illuminate\Database\Eloquent\Model;

class hostel extends Model
{
    protected $fillable = ['universty_id','hname','type','profileImage','description'];

    public static function fetchAllHostels(){
        $hostels = self::join('universties', 'hostels.universty_id', '=','universties.id')
            			->select('hostels.*', 'universties.name')->get();

		return $hostels;
    }

    public static function getHostel()
    {
        return self::get();
    }


    public static function processImage($request){
         $image = Image::make($request)
     			->resize(150,150)->save(public_path().'/profileImage/'.$request->getClientOriginalName());
         
         return $image;
    }

    public static function avoidHostelRepetitionInUniversity($request)
    {
        $getHostel = static::getHostel();

        foreach($getHostel as $item){
        $check = self::where($item->hname, '=', $request->hname)->where($item->universty_id, '=', $request->universty_id);

        if ($check) {
            break;
            }
        }

        return $check;
    }

    public static function postHostelData($request, $image){
    $save = self::insertGetId([
        'universty_id' => $request->universty_id,
        'hname'        => $request->hname,
        'type'         => $request->type,
        'profileImage' => $image,
        'description'  => $request->description
    ]);


    return $save;
    }

    public static function insertService($current_id, $request)
    {
        $service = service::insertServiceInfo($current_id, $request);

        return $service;

    }

    public static function fillExtraInfoInHostel($current_id){
        $hostels = self::whereId($current_id)->first();
        return $hostels;
    }

    public static function insertLocation($request)
    {
        $save = location::insertLocationInfo($request);

    return $save;

    }

    public static function insertRoom($request)
    {
        $save = room::insertRoomInfo($request);

    return $save;

    }

    public static function insertFare($room_id, $request)
    {
        $save = fare::insertFareInfo($room_id, $request);

    return $save;

    }

    public static function insertMultipleImage($current_id, $request)
    {
        $save = sliderImage::insertMultipleImageInfo($current_id, $request);

    return $save;
    }

    public static function fetchHostelService($id)
    {
        return $hostelData = service::getHostelService($id);
    }

    public static function fetchHostelLocation($id)
    {
        return $hostelData = location::getHostelLocation($id);
    }


}
