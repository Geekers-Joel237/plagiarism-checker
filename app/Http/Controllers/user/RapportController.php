<?php

namespace App\Http\Controllers\user;

use App\Http\controllers\Controller;
use App\Models\Rapport;
use Illuminate\Http\Request;


class RapportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('user.rapport');

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
     * @param  \App\Models\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function show(Rapport $rapport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function edit(Rapport $rapport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rapport $rapport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rapport $rapport)
    {
        //
    }
}
