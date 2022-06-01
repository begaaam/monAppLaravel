@extends('layouts.master')
@section('content')
<div class="col-md-12 well well-sm">
    <center><h1>Choix d'un Nom</h1></center>
     {!!Form::open(['url' => 'afficheVisiteurNom'])!!}     
    <div class="form-horizontal">    
        <div class="form-group">
            <label class="col-md-3 control-label">Nom : </label>
            <div class="col-md-3">
                <select class='form-control' name='cbNom' required>
                    <OPTION VALUE=0>Sélectionner un Nom</option>
                   @foreach ($visiteurs as $visiteur)
                    <option value="{{$visiteur->nom_visiteur}}"> {{$visiteur->nom_visiteur}} </option>       
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span> Valider</button>
                &nbsp;
                <button type="button" class="btn btn-default btn-primary" 
                        onclick="javascript: window.location = '{{ url('/') }}';">
                    <span class="glyphicon glyphicon-remove"></span> 
                    Annuler
                </button>
            </div>           
        </div>
        <div class="col-md-6 col-md-offset-3">
             @include('error')
        </div>
    </div>
       {!! Form::close()!!}
</div>
@stop
