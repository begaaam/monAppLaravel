@extends('layouts.master')
@section('content')
<div class="col-md-12 well well-sm">
    <center><h1>Choix d'un Secteur</h1></center>
    {!!Form::open(['url' => 'listerVisiteurSecteur'])!!} 
    <div class="form-horizontal">    
        <div class="form-group">
            <label class="col-md-3 control-label">Secteur : </label>
            <div class="col-md-3">
                <select class='form-control' name='cbScteur' required>
                    <OPTION VALUE=0>Sélectionner un Secteur</option>
                        @foreach ($secteurs as $secteur)
                    <option value="{{$secteur->id_secteur}}"> {{$secteur->lib_secteur}} </option>       
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