<?php

namespace App\Http\Controllers;

use App\universty;
use Illuminate\Http\Request;

class UniverstyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $university = universty::registeredUniversity();

        return view('university', compact('university'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:universties',
            'description' => 'max:100'
        ]);

        $saved = universty::insertUniversity($request);

        return $saved ? back()->with('successMsg', 'Data saved successful') : back()->with('errorMsg', 'Data not saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\universty  $universty
     * @return \Illuminate\Http\Response
     */
    public function show(universty $universty)
    {
        return $universty->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\universty  $universty
     * @return \Illuminate\Http\Response
     */
    public function edit(universty $universty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\universty  $universty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, universty $universty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\universty  $universty
     * @return \Illuminate\Http\Response
     */
    public function destroy(universty $universty)
    {
        //
    }
}
