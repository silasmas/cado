<?php

namespace App\Http\Controllers;

use App\Models\formationFormateur;
use App\Http\Requests\StoreformationFormateurRequest;
use App\Http\Requests\UpdateformationFormateurRequest;

class FormationFormateurController extends Controller
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
     * @param  \App\Http\Requests\StoreformationFormateurRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreformationFormateurRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\formationFormateur  $formationFormateur
     * @return \Illuminate\Http\Response
     */
    public function show(formationFormateur $formationFormateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\formationFormateur  $formationFormateur
     * @return \Illuminate\Http\Response
     */
    public function edit(formationFormateur $formationFormateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateformationFormateurRequest  $request
     * @param  \App\Models\formationFormateur  $formationFormateur
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateformationFormateurRequest $request, formationFormateur $formationFormateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\formationFormateur  $formationFormateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(formationFormateur $formationFormateur)
    {
        //
    }
}
