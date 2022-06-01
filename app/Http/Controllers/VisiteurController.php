<?php

namespace App\Http\Controllers;
use Request;
//use Illuminate\Http\Request;
use Session;
use Validator;
use App\Models\Secteur;
use App\Models\Visiteur;
use App\Models\Laboratoire;
use Illuminate\Support\Facades\Auth;

class VisiteurController extends Controller
{
    /**
     * Affiche la liste de tous les visiteurs
     * @returrn Vue listeVisiteurs
     */
    public function getVisiteurs(){
         //---------------variable Session---------------
         $erreur =Session::get('erreur');
         $user =Auth::user();
         Session::forget('erreur');
        //On récupère la liste de tous les mangas 
        $visiteurs = Visiteur::all();
        $titreVue ="Liste de visteur ";
        //On affiche la liste de ces visiteurs
        return view('listeVisiteurs', compact('visiteurs','user','titreVue'));
    }
    /**
     *  Afficher la liste d'un Visteur d'un Nom, si on a selectionné un nom, on récupère le visiteur
     * si on a pas sélectionné un nom, on construit un message d'erreur et on rélance le formulaire
     * @param int $id_visiteur  du visteur
     * @return Vue listeVisiteurs
     */
    public function getVisiteurNom(){
        //---------------variable Session---------------
         $erreur =Session::get('erreur');
         $user =Auth::user();
         Session::forget('erreur');
        //On récupère le nom seléctionné 
        $nom_visiteur=Request::input('cbNom');
       // dump($nom_visiteur);
        //Si on a un nom de visiteur
        if($nom_visiteur){
        //On récupère le nom visiteur choisi
        $visiteurs = Visiteur::where('nom_visiteur',$nom_visiteur)->get();
        $titreVue ="Liste de visteur par Nom";
        //On affiche le visiteur choisi
        return view('listeVisiteurs', compact('visiteurs','erreur','user','titreVue'));
        }else{
            $erreur ="Il faut sélectionner un nom";
            return redirect('/listerNom/'.$erreur);
        }
    }
     /**
     *  Afficher la liste d'un Visteur par secteur
     * Afficher la liste de tous les visiteur
     * @param int $id_Secteur  du Secteur
     * @return 
    */
    public function  getVisiteurSecteur(){
        $erreur ="";
        $user =Auth::user();
        //on récuèpre l'id du genre séléctionné
        $id_secteur =Request::input('cbScteur');
        //si on récupère un id de genre 
        if($id_secteur){
            //on récupère la iste de tous les visiteurs du secteur choisi
            $visiteurs =Visiteur::where('id_secteur', $id_secteur)->get();
            $titreVue ="Liste de visteur par Secteur";
        return view('listeVisiteurs', compact('visiteurs','erreur','user','titreVue'));
    }else{
       $erreur ="Il faut sélectionner un secteur !";
       return redirect('/formSecteur','erreur','user');
    }
 }
 /**
     *  Afficher la liste d'un Visteur par Laboratoire
     * Afficher la liste de tous les visiteur
     * @param int $id_laboratoire  du Laboratoire
     * @return 
    */
 public function getVisiteurLaboratoire(){
    $erreur ="";
    $user =Auth::user();
    //on récuèpre l'id du genre séléctionné
    $id_laboratoire =Request::input('cbLaboratoire');
    //si on récupère un id de genre 
    if($id_laboratoire){
        //on récupère la iste de tous les visiteurs du secteur choisi
        $visiteurs =Visiteur::where('id_laboratoire', $id_laboratoire)->get();
        $titreVue ="Liste de visteur par Laboratoire";
    return view('listeVisiteurs', compact('visiteurs','erreur','user','titreVue'));
}else{
   $erreur ="Il faut sélectionner un Laboratoire !";
   return redirect('/formLaboratoire','erreur','user');
}
 }
 /**
  * Formulaire de modification d'un Visiteur, initialise tous les champs, lit le visiteur à modifier 
  * @param int $id Id du visteur à modifier, @param string $erreur message d'erreur(paramettre optionnel)
  * @return Vue FormVisiteur
  */
    public function updateVisiteur($id){
        //---------------variable Session---------------
         $erreur =Session::get('erreur');
         $user =Auth::user();
         Session::forget('erreur');
        $visiteur = Visiteur::find($id);
        $secteurs = Secteur::all();
        $laboratoires = Laboratoire::all();
        $titreVue ="Modification d'un visiteur";
        //Affiche le formulaire en lui fournissant les données à afficher
        return view('formVisiteur', compact('visiteur','secteurs','laboratoires','titreVue','erreur','user'));
    }
    //validate methode 
    public function validateVisiteur(){
        //Récupération des valeurs saisies
        $id_visiteur = Request::input('id_visiteur'); // id dans le champs caché
        
        //Liste des champs à vérifier
        $regles = array(
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'cp' => 'required',
            'ville' => 'required',
            'dateEmbauche' => 'required |date',
            'cbSecteur'  => 'required',
            'cbLaboratoire' => 'required'
        );
        //Messages d'erreur personnalisés
        $message = array(
          'nom.required' => 'Il faut saisir un nom',
          'prenom.required' => 'Il faut sélectionner un prénom',
           'adresse.required' => 'il faut saisir une adresse',
           'cp.required' => 'il faut saisir un code postale',
            'ville.required' => 'il faut saisir une ville',
              'dateEmbauche.required'=> 'il saisir une date',
                'cbSecteur.required' => 'il faut saisir un secteur',
                'cbLaboratoire.required'=> 'il faut saisir un labo'
        );
        //Validation des chams 
        $validator = Validator::make(Request::all(), $regles,$message);
        //On retourne au formul ire s'il y a un problème
            if($validator->fails()){
                if($id_visiteur > 0){
                    return redirect('modifierVisiteur/' . $id_visiteur)
                            ->withErrors($validator)
                            ->withInput();
                }else{
                    return redirect('ajouterVisiteur/')
                    ->withErrors($validator)
                            ->withInput();
                }
            }
        $id_secteur = Request::input('cbSecteur');  //Liste déroulante
        $id_laboratoire = Request::input('cbLaboratoire');  //Liste déroulante
        $nom = Request::input('nom'); 
        $prenom = Request::input('prenom'); 
        $adresse = Request::input('adresse'); 
        $cp = Request::input('cp'); 
        $ville = Request::input('ville'); 
        $dateEmbauche = Request::input('dateEmbauche'); 
         
        //Si id_visteur est > 0 il faut lire le Visiteur existant
        //sinon il faut créer une instance de Visiteur
        if($id_visiteur > 0){
            $visiteur = Visiteur::find($id_visiteur);
        }else{
            $visiteur = new Visiteur();
        }
        
        //$visiteur = Visiteur::find($id_visiteur);
        $visiteur->nom_visiteur =$nom;
        $visiteur ->prenom_visiteur = $prenom;
        $visiteur ->adresse_visiteur = $adresse;
        $visiteur ->cp_visiteur = $cp;
        $visiteur ->ville_visiteur = $ville;
        $visiteur ->date_embauche = $dateEmbauche;
        $visiteur ->id_laboratoire =  $id_laboratoire;
        $visiteur ->id_secteur =   $id_secteur;
       
        $erreur ="";
        try{
            $visiteur ->save();
        } catch (Exception $ex) {
             //------------varisables de Session-------------
                $erreur = $ex->getMessage();
                Session::put('erreur', $erreur);
               return redirect('/modifierVisiteur/'.$id_visiteur."/".$erreur);      
        }
        //On réaffiche la liste des visiteurs
        return redirect('/listerVisiteurs');
         
    }
     /**
      * Formulaire d'un Visiteur, Initialise toute listes déroulantes et place le formulaire formVisiteur en mode Ajout
      * @param string $erreur message d'erreur (paramètre optionnel)
      * @return Vue formVisiteur
      */
    public function addVisiteur(){
         //---------------variable Session---------------
         $erreur =Session::get('erreur');
         $user=Auth::user();
         Session::forget('erreur');
        $visiteur = new Visiteur();
        $secteurs = Secteur::all();
        $laboratoires = Laboratoire::all();
        $titreVue ="Ajout d'un Visiteur";
        //Affiche le formulaire en lui fournissant les données à afficher
        return view('formVisiteur', compact('visiteur','secteurs','laboratoires','titreVue','user','erreur'));
    }
     /**
      * Suppression d'un Visisteur
      */
    public function deleteVisisteur($id){
        // $erreur = Session::get('erreur');
       // Session::forget('erreur'); 
        
        $erreur ="";
        try {
           // $user = Auth::user();
          $visiteur = Visiteur::find($id);
//            if(!$user->can('supprimer', $manga)){
//                $erreur ='Vous ne disposez pas des droits pour supprimer ce Manga !';
//                Session::put('erreur', $erreur);
//                return $this->getMangas();
//            }
            $visiteur->delete();
            return redirect('/listerVisiteurs');
        } catch (Exception $ex) {
           // Session::put('erreur', $ex->getMessage());
            return redirect('/listerVisiteurs');
          }
 
    }
   
}
