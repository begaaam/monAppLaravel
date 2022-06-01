<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    protected $table ='visiteur';
    public $timestamps = false;
    protected $primaryKey ='id_visiteur';
    protected $fillable =['id_visiteur','id_secteur','id_laboratoire','nom_visiteur','prenom_visiteur','adresse_visiteur','cp_visiteur','ville_visiteur','date_embauche'];
    
    public function secteur(){
        return $this->belongsTo('App\Models\Secteur', 'id_secteur', 'id_secteur');
    }
    public function laboratoire(){
        return $this->belongsTo('App\Models\Laboratoire', 'id_laboratoire', 'id_laboratoire');
    }
}
