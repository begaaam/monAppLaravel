<?php

namespace App\Http\Controllers;

use App\Models\Laboratoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaboratoireController extends Controller
{
     /**
     * Afficher le secteur dans une liste deroulate
     * @return Vue fromSecteur
     */
   public function getLaboratoire($erreur =""){
        $user =Auth::user();
        $laboratoires=Laboratoire::all();
        return view('formLaboratoire', compact('laboratoires','erreur','user'));
    }
    }

