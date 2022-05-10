<?php

namespace App\Http\Controllers;

use App\Models\formation;
use App\Http\Requests\StoreformationRequest;
use App\Http\Requests\UpdateformationRequest;
use App\Models\session;
use App\Models\sessionUser;
use Illuminate\Support\Facades\Auth;

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
        $titre="Mon Profil";
        return view('client.pages.profil',compact('titre'));
    }
    public function panier()
    {
       // $session=session::with('formateur')->where('id',$id)->first();
     //  dd($session);
        return view('client.pages.panier');
    }
    public function mesCours()
    {
        
        $titre="Mes formations";
        return view('client.pages.mesCours',compact('titre'));
    }
    public function favorie()
    {
        
        $titre="Mes favories";
        return view('client.pages.favoris',compact('titre'));
    }
    public function historique()
    {
        
        $titre="Mon historique d'achats";
        return view('client.pages.historique',compact('titre'));
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
        $r=sessionUser::where([['user_id',Auth::user()->id],['session_id',$id]])->first();
        if ($r) {
            if ($r->niveau!='En cour') {
                $r->niveau='En cour';
                $r->save();
            }    
        } else {
            sessionUser::updateOrCreate([
                "session_id"=>$id,
                "user_id"=>Auth::user()->id,
                "etat"=>"Payer",
                "reference"=>"free",
                "niveau"=>"En cour",
            ]);          
        }
        
        $chapitre=formation::with('session')->where('session_id',$id)->first();
        $chapitres=formation::whereBelongsTo($chapitre,'session')->get();
         //dd($chapitre);
        return view('client.pages.detailFromation', compact('chapitre','chapitres'));
    }
    public function detailFormation($id)
    { 
        // $detail=session::with('formation')->find($id);
        $detail=formation::with('session')->where('session_id',$id)->first();
        $chapitres=formation::where('session_id',$id)->get();
        $formateur=session::with('formateur')->where('id',$id)->get();
     
            // dd($detail->session->pivot);
        $total = 0;
 
// Loop the data items
foreach( $chapitres as $element):
     
    // Explode by separator :
    $temp = explode(":", $element->nbrHeure);
     
    // Convert the hours into seconds
    // and add to total
    $total+= (int) $temp[0] * 3600;
     
    // Convert the minutes to seconds
    // and add to total
    $total+= (int) $temp[1] * 60;
     
    // Add the seconds to total
    $total+= (int) $temp[2];
    endforeach;
 
// Format the seconds back into HH:MM:SS
    $formatted = sprintf('%02d:%02d:%02d',
                ($total / 3600),
                ($total / 60 % 60),
                $total % 60);

      
        return view('client.pages.detail',compact('detail','chapitres','formatted','formateur'));
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