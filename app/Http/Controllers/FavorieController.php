<?php

namespace App\Http\Controllers;

use App\Models\favorie;
use App\Http\Requests\StorefavorieRequest;
use App\Http\Requests\UpdatefavorieRequest;

class FavorieController extends Controller
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
     * @param  \App\Http\Requests\StorefavorieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefavorieRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\favorie  $favorie
     * @return \Illuminate\Http\Response
     */
    public function show(favorie $favorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\favorie  $favorie
     * @return \Illuminate\Http\Response
     */
    public function edit(favorie $favorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefavorieRequest  $request
     * @param  \App\Models\favorie  $favorie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatefavorieRequest $request, favorie $favorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\favorie  $favorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(favorie $favorie)
    {
        //
    }
}
