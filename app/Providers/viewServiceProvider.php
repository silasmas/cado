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
        // View::composer('client.pages.mesCours', function ($view) {

        //     $session=user::with('session')->findOrFail(Auth::user()->id);                         

        //     $Myform=$session->session()->wherePivot('user_id',Auth::user()->id)->get();
           
        //     $Mycouple=session::with(['user','formation'])->where('context','COUPLE')->get();
        //     $Mycouple=session::with(['user','formation'])->where('context','CADO')->get();
            
         
        //      $view->with('Moncoaching',$Mycouple);
        //     $view->with('Myform',$Myform);
        // });
        View::composer('client.pages.*', function ($view) {
            if(!Auth::guest()){
                $userForm=User::with('session')->where("id",Auth::user()->id)->first();
              
                 //dd($userForm->session);
                 $view->with('userForm',$userForm);
            }
        });

        View::composer('client.pages.home', function ($view) {
            $form=session::where('context','CADO')->get();
            $couple=session::where('context','COUPLE')->get();
            $actuelCado=session::where('date_debut','>', now())->get();
           //  dd($form[3]->formateur);
            $view->with('couples',$couple);
            $view->with('allform',$form);
             $view->with('actuelCado',$actuelCado);
        });
    }
}