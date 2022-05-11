<?php

namespace App\Http\Controllers;

use App\Models\favorie;
use App\Http\Requests\StorefavorieRequest;
use App\Http\Requests\UpdatefavorieRequest;
use App\Models\sessionUser;
use Illuminate\Support\Facades\Auth;

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
    public function addCard($id)
    {
        $active=sessionUser::where([['session_id',$id],['user_id',Auth::user()->id]])->first();
        if($active){         
            return response()->json(['reponse' => false,'msg' =>'Cette formation est déjà dans vos Panier!!']);          
        }else{
            $rap =sessionUser::create([
                'session_id'=>$id,
                'user_id'=>Auth::user()->id
            ]);
            if($rap){
                return response()->json(['reponse' => true,'msg' =>"Formation ajouter dans votre panier avec succès."]);
            }else{
                return response()->json(['reponse' => false,'msg' => "erreur !!"]);
            }
        }
    }
    public function removeCard($id)
    {
        $formCard=sessionUser::where([['session_id',$id],['user_id',Auth::user()->id]])->first();
        if($formCard){          
           
            $rap =$formCard->delete();
            if($rap){
                return response()->json(['reponse' => true,'msg' =>"Formation supprimer de votre panier."]);
            }else{
                return response()->json(['reponse' => false,'msg' => "erreur !!"]);
            }
        }
    }
    public function addFavori($id)
    {
        $active=favorie::where([['session_id',$id],['user_id',Auth::user()->id]])->first();
        if($active){         
            return response()->json(['reponse' => false,'msg' =>'Cette formation est déjà dans vos favories!!']);          
        }else{
            $rap =favorie::updateOrCreate([
                'session_id'=>$id,
                'user_id'=>Auth::user()->id
            ]);
            if($rap){
                return response()->json(['reponse' => true,'msg' =>"Session ajouter dans vos favories avec succès."]);
            }else{
                return response()->json(['reponse' => false,'msg' => "erreur !!"]);
            }
        }
    }
    public function deleteFavorie($id)
    {
        $active=favorie::where([['user_id',Auth::user()->id],['session_id',$id]])->first();
        if($active){   
            $active->delete();        
            return response()->json(['reponse' => true,'msg' =>'Cette formation est supprimée de vos favories!!']);          
        }else{
                return response()->json(['reponse' => false,'msg' => "erreur !!"]);
        }
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
