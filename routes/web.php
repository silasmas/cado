<?php

use App\Http\Controllers\FormationController;
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

Route::middleware(['auth'])->group( function (){
    // Route::get('/dashboard', [EtudiantController::class,'index'])->name('dashboard');
    Route::get('mesCours', [FormationController::class,'mesCours'])->name('mesCours');
    Route::get('favorie', [FormationController::class,'favorie'])->name('favorie');
    Route::get('couple', [FormationController::class,'couple'])->name('couple');
    Route::get('homes', [FormationController::class,'index'])->name('homes');


    Route::get('profil', [FormationController::class,'profil'])->name('profil');
    Route::get('panier/{id}', [FormationController::class,'panier'])->name('panier');

    Route::get('formationBy/{id}', [FormationController::class,'show'])->name('formationBy');
    Route::get('detailFormation/{id}', [FormationController::class,'detailFormation'])->name('detailFormation');

    Route::get('/inscription', function () {
        return view('pages/welcome');
    })->name('inscription');

    Route::get('/allFormation', function () {
        return view('pages/allFormation');
    })->name('allFormation');
    Route::get('/detail', function () {
        return view('pages/detailFromation');
    })->name('detail');

    Route::get('dashboard', [FormationController::class,'index'])->name('dashboard');

});
require __DIR__.'/auth.php';
