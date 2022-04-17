<?php
 
namespace App\Providers;

use App\Models\session;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
 
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