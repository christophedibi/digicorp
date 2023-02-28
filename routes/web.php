<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EntrepotController;
use App\Http\Controllers\MarqueController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['prefix' => 'client'], function()
{
    Route::get('/',[\App\Http\Controllers\ClientController::class, 'getIndex'])->name('lister-client');
    
    Route::post('/create',[\App\Http\Controllers\ClientController::class, 'postCreate'])->name('creer-client-post');
    Route::get('/create',[\App\Http\Controllers\ClientController::class, 'getCreate'])->name('creer-client');
    
    Route::post('/editer/{client}',[\App\Http\Controllers\ClientController::class, 'postEditer'])->name('editer-client-post');
    Route::get('/editer/{client}',[\App\Http\Controllers\ClientController::class, 'getEditer'])->name('editer-client');
    
    Route::delete('/delete/{id}',[\App\Http\Controllers\ClientController::class, 'postDelete'])->name('supprimer-client');
    
    Route::group(['prefix' => 'entreprise'], function (){
        Route::group(['prefix' => 'contact'], function (){
            Route::get('/', [\App\Http\Controllers\ContactEntrepriseClientController::class, 'getIndex'])->name('lister-contact');
            
            Route::post('/create',[\App\Http\Controllers\ContactEntrepriseClientController::class, 'postCreate'])->name('creer-contact-post');
            Route::get('/create',[\App\Http\Controllers\ContactEntrepriseClientController::class, 'getCreate'])->name('creer-contact');
    
    
            Route::post('/editer/{contact}',[\App\Http\Controllers\ContactEntrepriseClientController::class, 'postEditer'])->name('editer-contact-post');
            Route::get('/editer/{contact}',[\App\Http\Controllers\ContactEntrepriseClientController::class, 'getEditer'])->name('editer-contact');
            
            Route::delete('/delete/{id}',[\App\Http\Controllers\ContactEntrepriseClientController::class, 'postDelete'])->name('supprimer-contact');
        });
    });
}
);

Route::group(['prefix' => 'fournisseur'], function()
{
    Route::get('/',[\App\Http\Controllers\FournisseurController::class, 'getIndex'])->name('lister-fournisseur');
    
    Route::post('/create',[\App\Http\Controllers\FournisseurController::class, 'postCreate'])->name('creer-fournisseur-post');
    Route::get('/create',[\App\Http\Controllers\FournisseurController::class, 'getCreate'])->name('creer-fournisseur');
    
    Route::post('/editer/{fournisseur}',[\App\Http\Controllers\FournisseurController::class, 'postEditer'])->name('editer-fournisseur-post');
    Route::get('/editer/{fournisseur}',[\App\Http\Controllers\FournisseurController::class, 'getEditer'])->name('editer-fournisseur');
    
    Route::delete('/delete/{id}',[\App\Http\Controllers\FournisseurController::class, 'postDelete'])->name('supprimer-fournisseur');
    
    Route::group(['prefix' => 'entreprise'], function (){
        Route::group(['prefix' => 'contact'], function (){
            Route::get('/', [\App\Http\Controllers\ContactEntrepriseFournisseurController::class, 'getIndex'])->name('lister-contact-fournisseur');
            
            Route::post('/create',[\App\Http\Controllers\ContactEntrepriseFournisseurController::class, 'postCreate'])->name('creer-contact-fournisseur-post');
            Route::get('/create',[\App\Http\Controllers\ContactEntrepriseFournisseurController::class, 'getCreate'])->name('creer-contact-fournisseur');
    
    
            Route::post('/editer/{contact}',[\App\Http\Controllers\ContactEntrepriseFournisseurController::class, 'postEditer'])->name('editer-contact-fournisseur-post');
            Route::get('/editer/{contact}',[\App\Http\Controllers\ContactEntrepriseFournisseurController::class, 'getEditer'])->name('editer-contact-fournisseur');
            
            Route::delete('/delete/{id}',[\App\Http\Controllers\ContactEntrepriseFournisseurController::class, 'postDelete'])->name('supprimer-contact-fournisseur');
        });
    });
}
);
Route::group(['prefix' => 'prestataire'], function()
{
    Route::get('/',[\App\Http\Controllers\PrestataireController::class, 'getIndex'])->name('lister-prestataire');
    
    Route::post('/create',[\App\Http\Controllers\PrestataireController::class, 'postCreate'])->name('creer-prestataire-post');
    Route::get('/create',[\App\Http\Controllers\PrestataireController::class, 'getCreate'])->name('creer-prestataire');
    
    Route::post('/editer/{prestataire}',[\App\Http\Controllers\PrestataireController::class, 'postEditer'])->name('editer-prestataire-post');
    Route::get('/editer/{prestataire}',[\App\Http\Controllers\PrestataireController::class, 'getEditer'])->name('editer-prestataire');
    
    Route::delete('/delete/{id}',[\App\Http\Controllers\PrestataireController::class, 'postDelete'])->name('supprimer-prestataire');
    
    Route::group(['prefix' => 'entreprise'], function (){
        Route::group(['prefix' => 'contact'], function (){
            Route::get('/', [\App\Http\Controllers\ContactEntreprisePrestataireController::class, 'getIndex'])->name('lister-contact-prestataire');
            
            Route::post('/create',[\App\Http\Controllers\ContactEntreprisePrestataireController::class, 'postCreate'])->name('creer-contact-prestataire-post');
            Route::get('/create',[\App\Http\Controllers\ContactEntreprisePrestataireController::class, 'getCreate'])->name('creer-contact-prestataire');
    
    
            Route::post('/editer/{contact}',[\App\Http\Controllers\ContactEntreprisePrestataireController::class, 'postEditer'])->name('editer-contact-prestataire-post');
            Route::get('/editer/{contact}',[\App\Http\Controllers\ContactEntreprisePrestataireController::class, 'getEditer'])->name('editer-contact-prestataire');
            
            Route::delete('/delete/{id}',[\App\Http\Controllers\ContactEntreprisePrestataireController::class, 'postDelete'])->name('supprimer-contact-prestataire');
        });
    });
}
);
Route::group(['prefix' => 'produits'], function()
 {
//     Route::get('/',[\App\Http\Controllers\PrestataireController::class, 'index'])->name('lister-prestataire');
    
//     Route::post('/create',[\App\Http\Controllers\PrestataireController::class, 'store'])->name('creer-prestataire-post');
//     Route::get('/create',[\App\Http\Controllers\PrestataireController::class, 'getCreate'])->name('creer-prestataire');
    
//     Route::post('/editer/{prestataire}',[\App\Http\Controllers\PrestataireController::class, 'postEditer'])->name('editer-prestataire-post');
//     Route::get('/editer/{prestataire}',[\App\Http\Controllers\PrestataireController::class, 'getEditer'])->name('editer-prestataire');
    
//     Route::delete('/delete/{id}',[\App\Http\Controllers\PrestataireController::class, 'postDelete'])->name('supprimer-prestataire');
    
        Route::resource('entrepots', EntrepotController::class);
        Route::resource('marques', MarqueController::class);

}
);