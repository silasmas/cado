<?php

namespace App\Http\Controllers;

use App\Models\sessionUser;
use App\Http\Requests\StoresessionUserRequest;
use App\Http\Requests\UpdatesessionUserRequest;

class SessionUserController extends Controller
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
     * @param  \App\Http\Requests\StoresessionUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresessionUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sessionUser  $sessionUser
     * @return \Illuminate\Http\Response
     */
    public function show(sessionUser $sessionUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sessionUser  $sessionUser
     * @return \Illuminate\Http\Response
     */
    public function edit(sessionUser $sessionUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesessionUserRequest  $request
     * @param  \App\Models\sessionUser  $sessionUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesessionUserRequest $request, sessionUser $sessionUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sessionUser  $sessionUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(sessionUser $sessionUser)
    {
        //
    }
}
