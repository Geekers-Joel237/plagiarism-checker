<?php

namespace App\Http\Controllers;

use App\Models\PointParPoint;
use Illuminate\Http\Request;

class PointParPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('PointParPoint.PointParPoint');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PointParPoint  $pointParPoint
     * @return \Illuminate\Http\Response
     */
    public function show(PointParPoint $pointParPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PointParPoint  $pointParPoint
     * @return \Illuminate\Http\Response
     */
    public function edit(PointParPoint $pointParPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PointParPoint  $pointParPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PointParPoint $pointParPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PointParPoint  $pointParPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(PointParPoint $pointParPoint)
    {
        //
    }
}