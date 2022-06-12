<?php
 
namespace App\Providers;

use App\Models\session;
use App\Models\User;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
 
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
 
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    
        View::composer('client.pages.*', function ($view) {
            if(!Auth::guest()){
                $userForm=User::with('session')->where("id",Auth::user()->id)->first();
              $panier=User::with('session')->selectRaw('session_users.etat,session_users.operateur,
              session_users.niveau,sessions.*')
              ->join('session_users','session_users.user_id','users.id')
              ->join('sessions','sessions.id','session_users.session_id')                      
              ->where([['session_users.etat','En attente'],['users.id',Auth::user()->id]])
              ->get();
              $p=Auth::user()->session;
             $pr=$p->filter(function ($value, $key) {
                return $value->pivot->etat == "En attente";
            });
            //  dd($pr);
              $panierPaie=User::with('session')->selectRaw('session_users.etat,session_users.operateur,
              session_users.niveau,session_users.updated_at as date,sessions.*')
              ->join('session_users','session_users.user_id','users.id')
              ->join('sessions','sessions.id','session_users.session_id')              
              ->where([['session_users.etat','Payer'],['users.id',Auth::user()->id]])
              ->get();
              $livePaie=User::with('session')->selectRaw('session_users.etat,session_users.operateur,
              session_users.niveau,session_users.updated_at as date,sessions.*')
              ->join('session_users','session_users.user_id','users.id')
              ->join('sessions','sessions.id','session_users.session_id')              
              ->where([['sessions.live',true],['session_users.etat','Payer'],['users.id',Auth::user()->id]])
              ->get();
           
              $live=session::with('formateur')->where([['live',true],['isform',false]])->get();
             
                 $view->with('live',$live);
                 $view->with('livep',$livePaie);
                 $view->with('userForm',$userForm);
                 $view->with('panier',$panier);
                 $view->with('paie',$panierPaie);
                 $view->with('pr',$pr);
                 $view->with('mesformations',$userForm->session);
            }
        }); 

        View::composer('client.pages.home', function ($view) {
            $form=session::where([['context','CADO'],['isform',true]])->get();
            $couple=session::where([['context','COUPLE'],['isform',true]])->get();
            $actuelCado=session::where([['date_debut','>', now()],['live',true],['isform',false]])->get();
            //   dd($form);
            $view->with('couples',$couple);
            $view->with('allform',$form);
             $view->with('actuelCado',$actuelCado);
        });
        View::composer('client.pages.allform', function ($view) {
            $forms=session::with('formateur',"user")->get();
            $form=session::get();
              $f=$form->countBy(function($i){
                  return $i->context;
              });
              $ff=$form->countBy(function($i){
                  return $i->live;
              });
              $fff=$form->countBy(function($i){
                  return $i->type;
              });
              $fo=$form->countBy(function($i){
                  return $i->isform;
              });
        //   dd($f);
            $view->with('allforms',$forms);
            $view->with('count',$f);
            $view->with('count2',$ff);
            $view->with('count3',$fff);
            $view->with('for',$fo);
        });
    }
}