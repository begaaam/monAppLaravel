<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratoire extends Model
{
     protected $table ='laboratoire';
    public $timestamps = false;
    protected $primaryKey ='id_laboratoire';
    protected $fillable =['id_laboratoire', 'nom_laboratoire', 'chef_vente'];
   
    public function visiteurs(){
        return $this->hasMany('App\Models\Visiteur', 'id_laboratoire','id_laboratoire' );
    }
}
