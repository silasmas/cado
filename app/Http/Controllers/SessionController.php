<?php

namespace App\Http\Controllers;

use App\Models\session;
use App\Http\Requests\StoresessionRequest;
use App\Http\Requests\UpdatesessionRequest;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoresessionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresessionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesessionRequest  $request
     * @param  \App\Models\session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesessionRequest $request, session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(session $session)
    {
        //
    }
}
