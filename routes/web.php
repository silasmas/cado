<?php

use App\Http\Controllers\FavorieController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\SessionUserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('client.pages.loginnew');
    // return view('auth.login');
});

Route::get('/registerUser', function () {
    return view('client.pages.registerUser');
})->name('registerUser');
// Route::get('/registerUser', function () {
//     return view('client.pages.registerUser');
// })->name('registerUser');

Route::get('/retour',[FormationController::class,'panier'])->name('retour');
Route::post('/retour', [SessionUserController::class,'retour'])->name('retour');
Route::post('/notify', [SessionUserController::class,'notify'])->name('notify');

Route::middleware(['auth'])->group( function (){
    // Route::get('/dashboard', [EtudiantController::class,'index'])->name('dashboard');
    Route::get('mesCours', [FormationController::class,'mesCours'])->name('mesCours');
    Route::get('favorie', [FormationController::class,'favorie'])->name('favorie');
    Route::get('couple', [FormationController::class,'couple'])->name('couple');
    Route::get('homes', [FormationController::class,'index'])->name('homes');
    Route::get('historique', [FormationController::class,'historique'])->name('historique');


    Route::get('profil', [FormationController::class,'profil'])->name('profil');
    Route::get('compte', [FormationController::class,'compte'])->name('compte');
    Route::get('photo', [FormationController::class,'photo'])->name('photo');
    Route::get('panier', [FormationController::class,'panier'])->name('panier');

    Route::get('formationBy/{id}', [FormationController::class,'show'])->name('formationBy');
    Route::get('viewChapitre/{id}', [FormationController::class,'viewChapitre'])->name('viewChapitre');
    Route::get('detailFormation/{id}', [FormationController::class,'detailFormation'])->name('detailFormation');
   
    Route::get('viewLive/{id}', [FormationController::class,'viewLive'])->name('viewLive');
   
    
    Route::get('finiChapitre/{id}', [FavorieController::class,'finiChapitre'])->name('finiChapitre');
    Route::get('confirmPlace/{id}', [FavorieController::class,'confirmPlace'])->name('confirmPlace');
    Route::get('addFavori/{id}', [FavorieController::class,'addFavori'])->name('addFavori');
    Route::get('removeCard/{id}', [FavorieController::class,'removeCard'])->name('removeCard');
    Route::get('addCard/{id}', [FavorieController::class,'addCard'])->name('addCard');
    Route::get('deleteFavorie/{id}', [FavorieController::class,'deleteFavorie'])->name('deleteFavorie');

    Route::get('/inscription', function () {
        return view('pages/welcome');
    })->name('inscription');

    Route::get('/allFormation', function () {
        return view('pages/allFormation');
    })->name('allFormation');
  

    Route::get('teststatus', [SessionUserController::class,'status'])->name('teststatus');

    Route::get('dashboard', [FormationController::class,'index'])->name('dashboard');
    Route::get('listelives', [FormationController::class,'lives'])->name('listelives');

    Route::post('payerForm', [SessionUserController::class,'store'])->name('payerForm');
    Route::post('/paie', [SessionUserController::class,'store'])->name('paie');

    Route::post('/editProfil', [FormationController::class,'editProfil'])->name('editProfil');
    Route::post('/editCompte', [FormationController::class,'editCompte'])->name('editCompte');
    Route::post('/photo', [FormationController::class,'editphoto'])->name('photo');

    // Route::get('/retour',[FormationController::class,'panier'])->name('retour');
    // Route::post('/retour', [SessionUserController::class,'retour'])->name('retour');
    // Route::post('/notify', [SessionUserController::class,'notify'])->name('notify');
    //Route::get('/retour',[FormationController::class,'panier'])->name('retour');

});
require __DIR__.'/auth.php';
