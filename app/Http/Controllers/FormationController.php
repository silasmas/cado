<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\session;
use App\Models\formation;
use App\Rules\PhoneNumber;
use App\Models\sessionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\StoreformationRequest;
use App\Http\Requests\UpdateformationRequest;

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
        $titre = "Mon Profil";
        return view('client.pages.profil', compact('titre'));
    }
    public function panier()
    {
        // $session=session::with('formateur')->where('id',$id)->first();
        //  dd($session);
        return view('client.pages.panier');
    }
    public function mesCours()
    {

        $titre = "Mes formations";
        return view('client.pages.mesCours', compact('titre'));
    }
    public function favorie()
    {

        $titre = "Mes favories";
        return view('client.pages.favoris', compact('titre'));
    }
    public function historique()
    {

        $titre = "Mon historique d'achats";
        return view('client.pages.historique', compact('titre'));
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
    public function editProfil(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'sexe' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'pays' => ['required', 'string', 'max:255'],
            'phone' => ['required', new PhoneNumber],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        $u = User::where("id", Auth::user()->id)->first();
        // dd($u);
        $u->name = $request->name;
        $u->prenom = $request->prenom;
        $u->sexe = $request->sexe;
        $u->ville = $request->ville;
        $u->phone = $request->phone;
        $u->pays = $request->pays;
        // $u->email= $request->email;

        $u->save();
        if ($u) {
            event(new Registered($u));

            Auth::login($u);
            return back()->with('message', "Profil mis à jour avec succès");
        } else {
            return back()->with('message', "Erreur");
        }
    }
    public function viewChapitre($id_chap)
    {
        $active = formation::where("sous_titre", "active")->first();
        //  dd($active===null?"vide":"oui");
        if ($active===null) {
            $fini = formation::where("sous_titre", "fini")->get();
            //  dd($active===null?"vide":"oui");
            if ($fini===null) {
                $chap = formation::find($id_chap);
                $chap->sous_titre = "active";
                $chap->save();
                $chapitre = formation::with('session')->where('id', $chap->id)->first();
                $chapitres = formation::with('session')->where('session_id',$chapitre->session_id)->get();
                // $chapitres = formation::with('session')->whereBelongsTo($chapitre->session_id, 'session')->get();
                return view('client.pages.lecturForm', compact('chapitre', 'chapitres'));
            } else {   
               // dd($fini->pluck('id')->contains($id_chap));
                if($fini->pluck('id')->contains($id_chap)){
                    $chapitre = formation::with('session')->where('id', $id_chap)->first();
                    $chapitres = formation::with('session')->where('session_id',$chapitre->session_id)->get();
    
                    return view('client.pages.lecturForm', compact('chapitre', 'chapitres'));
                }else{
                    $chap = formation::find($id_chap);
                    $chap->sous_titre = "active";
                    $chap->save();
                    $chapitre = formation::with('session')->where('id', $chap->id)->first();
                    $chapitres = formation::with('session')->where('session_id',$chapitre->session_id)->get();
                    // $chapitres = formation::with('session')->whereBelongsTo($chapitre->session_id, 'session')->get();
                    return view('client.pages.lecturForm', compact('chapitre', 'chapitres'));
                }           
            }
        } else {            
            if ($active->id == $id_chap || $active->sous_titre=="fini") {
                   
                    $chap = formation::find($id_chap);
                    $chap->sous_titre = "active";
                    $chap->save();
                    $chapitre = formation::with('session')->where('id', $id_chap)->first();
                    $chapitres = formation::with('session')->where('session_id',$chapitre->session_id)->get();
    
                    return view('client.pages.lecturForm', compact('chapitre', 'chapitres'));
                
            } else { 
                $chap = formation::find($id_chap);
                if ($active->sous_titre=="fini") {

                    $chapitre = formation::with('session')->where('id', $id_chap)->first();
                    $chapitres = formation::with('session')->where('session_id',$chapitre->session_id)->get();
    
                    return view('client.pages.lecturForm', compact('chapitre', 'chapitres'));
                
                } else {
                  $active->sous_titre = "";
                    $active->save();
                        $chap = formation::find($id_chap);
                        $chap->sous_titre = "active";
                        $chap->save();
                        // dd($chap);
                        $chapitre = formation::with('session')->where('id', $id_chap)->first();
                        $chapitres = formation::with('session')->where('session_id',$chapitre->session_id)->get();
        
                        return view('client.pages.lecturForm', compact('chapitre', 'chapitres'));
                    
                }               
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $r = sessionUser::where([['user_id', Auth::user()->id], ['session_id', $id]])->first();
        if ($r) {
            if ($r->niveau != 'En cour') {
                $r->niveau = 'En cour';
                $r->sous_titre = 'active';
                $r->save();
            }
        } else {
            sessionUser::updateOrCreate([
                "session_id" => $id,
                "user_id" => Auth::user()->id,
                "etat" => "Payer",
                "sous_titre" => "active",
                "reference" => "free",
                "niveau" => "En cour",
            ]);
        }

        $chapitre = formation::with('session')->where('session_id', $id)->first();
        $chapitres = formation::with('session')->whereBelongsTo($chapitre, 'session')->get();
        //  dd($chapitres->sortBy('titre'));
        return view('client.pages.lecturForm', compact('chapitre', 'chapitres'));
    }
    public function detailFormation($id)
    {
        // $detail=session::with('formation')->find($id);
        $detail = formation::with('session')->where('session_id', $id)->first();
        $chapitres = formation::where('session_id', $id)->get();
        $formateur = session::with('formateur')->where('id', $id)->get();

        // dd($detail->session->pivot);
        $total = 0;

        // Loop the data items
        foreach ($chapitres as $element) :

            // Explode by separator :
            $temp = explode(":", $element->nbrHeure);

            // Convert the hours into seconds
            // and add to total
            $total += (int) $temp[0] * 3600;

            // Convert the minutes to seconds
            // and add to total
            $total += (int) $temp[1] * 60;

            // Add the seconds to total
            $total += (int) $temp[2];
        endforeach;

        // Format the seconds back into HH:MM:SS
        $formatted = sprintf(
            '%02d:%02d:%02d',
            ($total / 3600),
            ($total / 60 % 60),
            $total % 60
        );


        return view('client.pages.detail', compact('detail', 'chapitres', 'formatted', 'formateur'));
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
