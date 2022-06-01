<?php

namespace App\Http\Controllers;

use App\Models\Secteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecteurController extends Controller
{
    /**
     * Afficher le secteur dans une liste deroulate
     * @return Vue fromSecteur
     */
    public function getSecteur($erreur=""){
        $user =Auth::user();
        $secteurs=Secteur::all();
        return view('formSecteur', compact('secteurs','erreur','user'));
    }
}
