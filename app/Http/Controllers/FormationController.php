<?php

namespace App\Http\Controllers;

use App\Models\formation;
use App\Http\Requests\StoreformationRequest;
use App\Http\Requests\UpdateformationRequest;
use App\Models\session;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        // $allform=session::all();
        // dd($allform);
        return view('client.pages.home');
    }
    public function profil()
    {
        return view('client.pages.profil');
    }
    public function panier()
    {
        return view('client.pages.panier');
    }
    public function mesCours()
    {
        return view('client.pages.mesCours');
    }
    public function favorie()
    {
        return view('client.pages.favoris');
    }
    public function couple()
    {
        return view('client.pages.couple');
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
     * @param  \App\Http\Requests\StoreformationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreformationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('client.pages.detailFromation');
    }
    public function detailFormation($id)
    {
        // $detail=session::with('formation')->find($id);
        $detail=formation::with(['formateur','session'])->where('session_id',$id)->first();
        $chapitres=formation::where('session_id',$id)->get();
        // dd($detail);
      
        return view('client.pages.detail',compact('detail','chapitres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(formation $formation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateformationRequest  $request
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateformationRequest $request, formation $formation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(formation $formation)
    {
        //
    }
}
