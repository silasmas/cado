<?php

namespace App\Http\Controllers;

use App\Models\session;
use App\Models\formateur;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreformateurRequest;
use App\Http\Requests\UpdateformateurRequest;

class FormateurController extends Controller
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
     * @param  \App\Http\Requests\StoreformateurRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreformateurRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formateur=formateur::with("session")->where("id",$id)->first();
        $session=Auth::user()->session;
        $participant=$session->filter(function ($value, $key) {
            return $value->pivot->etat =="Payer";
        });
        //   dd($formateur->session[0]->description);
        return view('client.pages.formateur',compact("formateur","participant"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function edit(formateur $formateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateformateurRequest  $request
     * @param  \App\Models\formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateformateurRequest $request, formateur $formateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(formateur $formateur)
    {
        //
    }
}
