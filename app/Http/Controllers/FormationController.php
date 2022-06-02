<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\session;
use App\Models\formation;
use App\Rules\PhoneNumber;
use App\Models\sessionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateformationRequest;
use Illuminate\Validation\Rules;
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
        return view('client.pages.templateProfil', compact('titre'));
    }
    public function compte()
    {
        $titre = "Mon Compte";
        return view('client.pages.templateProfil', compact('titre'));
    }
    public function photo()
    {
        $titre = "Ma Photo";
        return view('client.pages.templateProfil', compact('titre'));
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
        $historique = User::with('session')
            ->selectRaw('session_users.etat,session_users.operateur,
    session_users.updated_at as date,paiements.*,sessions.titre,sessions.cover')
            ->join('session_users', 'session_users.user_id', 'users.id')
            ->join('sessions', 'sessions.id', 'session_users.session_id')
            ->join('paiements', 'paiements.user_id', 'users.id')
            ->where([['session_users.etat', 'Payer'], ['users.id', Auth::user()->id]])
            ->get();
        //  dd($historique);
        return view('client.pages.historique', compact('historique', "titre"));
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
    public function lives()
    {
        return view('client.pages.listeLive');
    }
    public function editphoto(Request $request)
    {
        $por = Validator::make($request->all(),[
            'photo' => 'required|sometimes|image',
        ]);
        if($por->passes()){

            $file = $request->file('photo');

            $filenameImg = time() . '.' . $file->getClientOriginalName();
           $file->move('storage/profil', $filenameImg);
            if ($request->photo) {
                $user=User::find(Auth::user()->id);
                $user->photo=$filenameImg;
                $user->save();
                event(new Registered($user));
                $msg = ["msg" => "La photo est mis à jour avec succès", "type" => "success"];
                return back()->with('message',$msg);
            } else {
                $msg = ["msg" => "Erreur mis à jour avec succès", "type" => "danger"];
                return response()->json('message',$msg);
            }
    
        }else{
            return back()->with(['message'=>$por->errors()->first()]);
          }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreformationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function editCompte(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'oldpassword' => ['required', Rules\Password::defaults()],
        ]);
        // dd($valid);
        if (!$valid->fails()) {
            $u = User::where("id", Auth::user()->id)->first();
            if (Hash::check($request->oldpassword, $u->password)) {
                $u->email = $request->email;
                $u->password = Hash::make($request->password);
                $u->save();
                if ($u) {
                    return response()->json(['reponse' => true, 'msg' => "Compte mis à jour avec succès"]);
                } else {
                    return response()->json(['reponse' => false, 'msg' => "Erreur de mis à jour"]);
                }
            } else {
                return response()->json(['reponse' => false, 'msg' => "Ancien mot de passe incorrect"]);
            }
        } else {
            return response()->json(['reponse' => false, 'type' => "velidate", 'msg' => $valid->errors()->all()]);
        }
    }
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
            $msg = ["msg" => "Profil mis à jour avec succès", "type" => "success"];
            return back()->with('message', $msg);
        } else {
            $msg = ["msg" => "Erreur de mise à jour du profil", "type" => "danger"];
            return back()->with('message', $msg);
        }
    }
    public function viewChapitre($id_chap)
    {
        $active = formation::where("sous_titre", "active")->first();
        //  dd($active===null?"vide":"oui");
        if ($active === null) {
            $fini = formation::where("sous_titre", "fini")->get();
            //  dd($active===null?"vide":"oui");
            if ($fini === null) {
                $chap = formation::find($id_chap);
                $chap->sous_titre = "active";
                $chap->save();
                $chapitre = formation::with('session')->where('id', $chap->id)->first();
                $chapitres = formation::with('session')->where('session_id', $chapitre->session_id)->get();
                // $chapitres = formation::with('session')->whereBelongsTo($chapitre->session_id, 'session')->get();
                return view('client.pages.lecturForm', compact('chapitre', 'chapitres'));
            } else {
                // dd($fini->pluck('id')->contains($id_chap));
                if ($fini->pluck('id')->contains($id_chap)) {
                    $chapitre = formation::with('session')->where('id', $id_chap)->first();
                    $chapitres = formation::with('session')->where('session_id', $chapitre->session_id)->get();

                    return view('client.pages.lecturForm', compact('chapitre', 'chapitres'));
                } else {
                    $chap = formation::find($id_chap);
                    $chap->sous_titre = "active";
                    $chap->save();
                    $chapitre = formation::with('session')->where('id', $chap->id)->first();
                    $chapitres = formation::with('session')->where('session_id', $chapitre->session_id)->get();
                    // $chapitres = formation::with('session')->whereBelongsTo($chapitre->session_id, 'session')->get();
                    return view('client.pages.lecturForm', compact('chapitre', 'chapitres'));
                }
            }
        } else {
            if ($active->id == $id_chap || $active->sous_titre == "fini") {

                $chap = formation::find($id_chap);
                $chap->sous_titre = "active";
                $chap->save();
                $chapitre = formation::with('session')->where('id', $id_chap)->first();
                $chapitres = formation::with('session')->where('session_id', $chapitre->session_id)->get();

                return view('client.pages.lecturForm', compact('chapitre', 'chapitres'));
            } else {
                $chap = formation::find($id_chap);
                if ($active->sous_titre == "fini") {

                    $chapitre = formation::with('session')->where('id', $id_chap)->first();
                    $chapitres = formation::with('session')->where('session_id', $chapitre->session_id)->get();

                    return view('client.pages.lecturForm', compact('chapitre', 'chapitres'));
                } else {
                    $active->sous_titre = "";
                    $active->save();
                    $chap = formation::find($id_chap);
                    $chap->sous_titre = "active";
                    $chap->save();
                    // dd($chap);
                    $chapitre = formation::with('session')->where('id', $id_chap)->first();
                    $chapitres = formation::with('session')->where('session_id', $chapitre->session_id)->get();

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
                $r->save();
            }
        } else {
            sessionUser::updateOrCreate([
                "session_id" => $id,
                "user_id" => Auth::user()->id,
                "etat" => "Payer",
                "reference" => "free",
                "niveau" => "En cour",
            ]);
        }

        $chapitre = formation::with('session')->where('session_id', $id)->orderBy('titre', "asc")->first();
        $chapitre->sous_titre = 'active';
        $chapitre->save();
        $chapitres = formation::with('session')->where('session_id', $chapitre->session_id)->get();
        // $chapitres = formation::with('session')->whereBelongsTo($chapitre, 'session')->get();
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
    public function viewLive($id)
    {
        // $detail=session::with('formation')->find($id);
        $detail = formation::with('session')->where('session_id', $id)->first();
        $chapitres = formation::where('session_id', $id)->get();
        $formateur = session::with('formateur')->where('id', $id)->get();
        // dd($detail);

        return view('client.pages.confirmLive', compact('detail', 'chapitres', 'formateur'));
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
