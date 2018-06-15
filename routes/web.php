<?php

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


Auth::routes();
/* => contenu du groupe ci-dessus
   Route::group(['middleware' => ['web']], function() {

// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});
*/
// routes pour le login + mdp oublié

Route::post('/', 'Auth\LoginController@authenticate')->name('login2');
Route::get('password/reset', 'Auth\ForgotPasswordController@showForm')->name('forgot.pass');
Route::post('password/reset', 'Auth\ForgotPasswordController@sendPasswordResetToken')->name('reset.pass');
Route::get('reset/password/{token?}', 'Auth\ForgotPasswordController@showPasswordResetForm');
Route::post('reset/password/{token?}', 'Auth\ForgotPasswordController@resetPassword')->name('request.pass');

Route::get('/', 'HomeController@index')->name('Accueil');
//redirect page reinitialisation mdp non trouvée
Route::get('/home', 'HomeController@index');

Route::post('/login', 'LogPseudoController@authentificate');

// Test de routes sécurisées avec le controller HomeController
// (Donc non accessibles si non connecté)

Route::get('/utilisateurs', 'HomeController@utilisateurs')->name('Utilisateurs');

Route::get('/historique', 'HomeController@historique')->name('Historique');

// accueil pour lister tous les badges
Route::get('/badges', 'HomeController@badges')->name('Badges');
// route formulaire pour ajouter un badge et le sauvegarder dans la bdd
Route::get('/badges/create', function(){return view('badgesCreate');})->name('BadgesNew');
Route::post('/badges/create', 'CreateController@badges');
// route pour editer un badge et le sauvegarder dans la bdd
Route::get('/badges/edit/{n?}', 'EditController@badges')->where('n', '[0-9]+')->name('BadgesEdit');
Route::post('/badges/edit/{n?}', 'UpdateController@badges')->where('n', '[0-9]+')->name('BadgesUpdate');
// route pour la suppression d'un badge dans la bdd
Route::get('/badges/delete/{n?}', 'DeleteController@badges')->middleware('authControl')->where('n', '[0-9]+')->name('BadgesDelete');


// Routes partie zones
Route::get('/infrastructure/zones', 'HomeController@zones')->middleware('authControl')->name('Zones');
// Edition zones
Route::get('/infrastructure/zones/edit/{n?}', 'EditController@zones')->middleware('authControl')->where('n', '[0-9]+')->name('ZonesEdit');
Route::post('/infrastructure/zones/edit/{n?}', 'UpdateController@zones')->middleware('authControl')->where('n', '[0-9]+')->name('ZonesUpdate');
// Création zones
Route::get('/infrastructure/zones/create', function(){return view('zonesCreate');})->name('ZonesNew');
Route::post('/infrastructure/zones/create', 'CreateController@zones')
;

// Routes partie portes
Route::get('/infrastructure/portes', 'HomeController@portes')->middleware('authControl')->name('Portes');
// Edition portes
Route::get('/infrastructure/portes/edit/{n?}', 'EditController@portes')->middleware('authControl')->where('n', '[0-9]+')->name('PortesEdit');
Route::post('/infrastructure/portes/edit/{n?}', 'UpdateController@portes')->middleware('authControl')->where('n', '[0-9]+')->name('PortesUpdate');
// Création portes
Route::get('/infrastructure/portes/create', 'EditController@porteNew')->name('PortesNew');
Route::post('/infrastructure/portes/create', 'CreateController@portes');

// Routes partie salles
Route::get('/infrastructure/salles', 'HomeController@salles')->middleware('authControl')->name('Salles');
// Edition salles
Route::get('/infrastructure/salles/edit/{n?}', 'EditController@salles')->middleware('authControl')->where('n', '[0-9]+')->name('SallesEdit');
Route::post('/infrastructure/salles/edit/{n?}', 'UpdateController@salles')->middleware('authControl')->where('n', '[0-9]+')->name('SallesUpdate');
// Création salles
Route::get('/infrastructure/salles/create', 'EditController@salleNew')->name('SallesNew');
Route::post('/infrastructure/salles/create', 'CreateController@salles');

// Routes partie gaches
Route::get('/infrastructure/gaches', 'HomeController@gaches')->middleware('authControl')->name('Gâches');
// Edition gaches
Route::get('/infrastructure/gaches/edit/{n?}', 'EditController@gaches')->middleware('authControl')->where('n', '[0-9]+')->name('GâchesEdit');
Route::post('/infrastructure/gaches/edit/{n?}', 'UpdateController@gaches')->middleware('authControl')->where('n', '[0-9]+')->name('GâchesUpdate');
// Création gaches
Route::get('/infrastructure/gaches/create', function(){return view('gachesCreate');})->name('GâchesNew');
Route::post('/infrastructure/gaches/create', 'CreateController@gaches');

// Routes partie lecteurs
Route::get('/infrastructure/lecteurs', 'HomeController@lecteurs')->middleware('authControl')->name('Lecteurs');
// Edition lecteurs
Route::get('/infrastructure/lecteurs/edit/{n?}', 'EditController@lecteurs')->middleware('authControl')->where('n', '[0-9]+')->name('LecteursEdit');
Route::post('/infrastructure/lecteurs/edit/{n?}', 'UpdateController@lecteurs')->middleware('authControl')->where('n', '[0-9]+')->name('LecteursUpdate');
// Création lecteurs
Route::get('/infrastructure/lecteurs/create', 'EditController@lecteurNew')->name('LecteursNew');
Route::post('/infrastructure/lecteurs/create', 'CreateController@lecteurs');