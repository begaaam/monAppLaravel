<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    protected $table ='secteur';
    public $timestamps = false;
    protected $primaryKey ='id_secteur';
    protected $fillable =['id_secteur','lib_secteur'];
   
    public function visiteurs(){
        return $this->hasMany('App\Models\Visiteur', 'id_secteur','id_secteur' );
    }
}
