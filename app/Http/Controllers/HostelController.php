<?php

namespace App\Http\Controllers;

use App\hostel;
use App\universty;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $university = universty::registeredUniversity();

        return view('hostel', compact('university'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hostels = hostel::fetchAllHostels();
        return view('showHostel', compact('hostels'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        global $imageName, $save;

        $request->validate([
            'universty_id'  => 'required',
            'hname'         => 'required|unique:hostels,hname,NULL,id,universty_id,'.$request->universty_id,
            'type'          => 'required',
            'description'   => 'max:200'
        ]);

        // $check = hostel::avoidHostelRepetitionInUniversity($request);

        if ($request->file('profileImage')) {
            $imageName = $request->file('profileImage')->getClientOriginalName();
            hostel::processImage($request->file('profileImage'));
        }

        $save = hostel::postHostelData($request, $imageName);
        hostel::insertService($save, $request);
        hostel::insertMultipleImage($save, $request);


        $data = hostel::fillExtraInfoInHostel($save);

        return $data ? view('fillContactsRoom')->with(['successMsg'=> 'Data saved successful','hostels' => $data]) : back()->with(['errorMsg'=> 'Data not saved because '.$error. ' in that University']);

    }


    public function storeLocation(Request $request)
    {
        $request->validate([
            'location'  => 'required',
            'mobile'    => 'required',
            'email'     => 'required|email'
        ]);

        $store = hostel::insertLocation($request);
        $data = hostel::fillExtraInfoInHostel($request->hostel_id);

        return $store ? view('fillContactsRoom')->with(['successMsg'=> 'Data saved successful','hostels'=>$data, 'disabled'=>'disabled']): view('fillContactsRoom')->with(['errorMsg'=> 'Data not saved','hostels'=>$data]);
    }

    public function storeRoom(Request $request)
    {
        $request->validate([
            'room'          => 'required',
            'description'   => 'required|max:100',
            'fare'          => 'required|integer'

        ]);

        $store = hostel::insertRoom($request);

        $saveFare = hostel::insertFare($store, $request);
        $data = hostel::fillExtraInfoInHostel($request->hostel_id);

        return $saveFare ? view('fillContactsRoom')->with(['successMsg'=> 'Data saved successful','hostels'=>$data]) : view('fillContactsRoom')->with(['errorMsg'=> 'Data not saved','hostels'=>$data]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function show(hostel $hostel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function edit(hostel $hostel, $id)
    {
        $serviceData = hostel::fetchHostelService($id);
        $locationData = hostel::fetchHostelLocation($id);

        $hostelData = $hostel->whereId($id)->first(['hname','type','description']);

        $overallData = array_merge($hostelData->toArray(), $serviceData->toArray(), $locationData->toArray());

        return view('displayUpdateForm', compact(['hostelData','locationData', 'serviceData']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hostel $hostel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function destroy(hostel $hostel)
    {
        //
    }
}
