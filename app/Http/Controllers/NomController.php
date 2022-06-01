<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Visiteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NomController extends Controller
{
    /**
     * Afficher les noms dans une Liste déroulante
     * @return Vue formNom
     */
    public function getNom(){
         //---------------variable Session---------------
         $user =Auth::user();
         $erreur =Session::get('erreur');
         Session::forget('erreur');
        $visiteurs = Visiteur::all();
        return view('formNom', compact('visiteurs', 'erreur','user'));
    }
}
