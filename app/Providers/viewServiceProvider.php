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
        
        // Using closure based composers...
        View::composer('client.pages.mesCours', function ($view) {

            $session=user::with('session')->findOrFail(Auth::user()->id);                         

            $Myform=$session->session()->wherePivot('user_id',Auth::user()->id)->get();
           // $session=session::with('user')->get();
            // $us=Auth::user();
            // $Myforme= $Myform->groupBy('user', function ($query) use ($us) {
            //     $query->where('context','CADO')
            //           ->where('session_users.user_id', '=', $us->id);
            // })->all();
            // // 
            $Mycouple=session::with(['user','formation'])->where('context','COUPLE')->get();
            $Mycouple=session::with(['user','formation'])->where('context','CADO')->get();
            // dd($Myform[2]->user[0]->pivot);
        // dd($Myform);
         
             $view->with('Moncoaching',$Mycouple);
            $view->with('Myform',$Myform);
        });
        View::composer('client.pages.*', function ($view) {
            if(!Auth::guest()){
                $userForm=User::find(Auth::user()->id)->load('session')->session()->first();
                $userFavorie=User::find(Auth::user()->id)->load('favorie')->favorie()->get();
                //dd($userFavorie[0]->formation[0]->formateur);
               // dd($userForm->pivot->session_id);
                 $view->with('userForm',$userForm);
                 $view->with('userFavorie',$userFavorie);
            }
        });
        View::composer('client.pages.home', function ($view) {
            $form=session::with(['user','formation'])->where('context','CADO')->get();
            $couple=session::with(['user','formation'])->where('context','COUPLE')->get();
            $actuelCado=session::where('date_debut','>', now())->get();
            $view->with('couples',$couple);
            $view->with('allform',$form);
             $view->with('actuelCado',$actuelCado);
        });
    }
}