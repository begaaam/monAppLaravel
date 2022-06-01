@extends('layouts.master')
@section('content')
<div class="container">
    <div class="blanc">
        <h1>{{$titreVue}}</h1>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Code Postale</th>
                <th>Ville</th>
                <th>Date Embauche</th>
               
                <th style="width: 50px;">Modifier</th>
                <th style="width: 50px;">Supprimer</th>
              
            </tr>
        </thead>
        @foreach($visiteurs as $visiteur)
        <tr>   
            <td>{{$visiteur->nom_visiteur}} </td>
            <td> {{$visiteur->prenom_visiteur}} </td>
            <td> {{$visiteur->adresse_visiteur}} </td>
            <td> {{$visiteur->cp_visiteur}} </td>
             <td> {{$visiteur->ville_visiteur}} </td>
             <td> {{$visiteur->date_embauche}} </td>  
             
            <td style="text-align:center;"><a href="{{url('/modifierVisiteur')}}/{{$visiteur->id_visiteur}}">
                <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"></span></a>
            </td>
            <td style="text-align:center;">
                <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" href="#"
                    onclick="javascript:if (confirm('Suppression confirmée ?'))
                        { window.location='{{url('/supprimerVisiteur')}}/{{$visiteur->id_visiteur}}';}">
                </a>
            </td> 
                      
        </tr>
        @endforeach
        <BR> <BR>
    </table>
</div>
@stop