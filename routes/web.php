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
//Route::get('/', function () {return view('home');});
Route::get('/', 'HomeController@index');
//Afficher la liste de tous les Visiteur
Route::get('/listerVisiteurs', 'VisiteurController@getVisiteurs');
//Afficher un visiteur selectionné
Route::get('/afficheVisiteurNom/{id_visiteur}', 'VisiteurController@getVisiteurNom');
//Afficher la liste déroulante des noms
Route::get('/listerNom', 'NomController@getNom');
//Lister tous les Visiteurs d'un nom sélectionné
Route::post('/afficheVisiteurNom', 'VisiteurController@getVisiteurNom');
//Afficher les secteurs 
Route::get('/listerScteur/{erreur?}','SecteurController@getSecteur');
//AfficherVisiteurSecteur
Route::post('/listerVisiteurSecteur', 'VisiteurController@getVisiteurSecteur');
//Afficher les laboratoires 
Route::get('/listerLaboratoire/{erreur?}','LaboratoireController@getLaboratoire');
//AfficherVisiteurLaborateur
Route::post('/listerVisiteurLaboratoire', 'VisiteurController@getVisiteurLaboratoire');
//Afficher un Visiteur pour pouvoir éventuellement le modifier
Route::get('/modifierVisiteur/{id}', 'VisiteurController@updateVisiteur');
//Enregistrer la mise à jour d'un Visiteur
Route::post('/validerVisiteur', 'VisiteurController@validateVisiteur');
//Ajout d'un Visiteur
Route::get('/ajouterVisiteur', 'VisiteurController@addVisiteur');
//Suppression d'un Visteur
Route::get('/supprimerVisiteur/{id?}','VisiteurController@deleteVisisteur');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
