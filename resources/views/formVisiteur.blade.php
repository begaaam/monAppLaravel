@extends('layouts.master')
@section('content')
{!! Form::open(['url'=>'validerVisiteur', 'files' => true])!!}
<div class="col-md-12 well well-sm">
    <center><h1>{{$titreVue}}</h1></center>
    <div class="form-horizontal">    
        <div class="form-group">
            <input type="hidden" name="id_visiteur" value="{{$visiteur->id_visiteur}}"/>
            <label class="col-md-3 control-label">Nom : </label>
            <div class="col-md-3">
               <!-- <input type="text" name="nom" 
                    value="{{$visiteur->nom_visiteur}}" class="form-control" required autofocus> -->
                {{Form::text("nom", old("nom") ? old("nom") : (!empty($visiteur) ? $visiteur->nom_visiteur : null),
                            ["class" => "form-control", "placeholder" => "Nom", "required", "autofocus"])
                }}
            </div>
            @error('nom')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
         
        <div class="form-group">
             <label class="col-md-3 control-label">Prenom : </label>
            <div class="col-md-3">
               <!-- <input type="text" name="prenom" 
                    value="{{$visiteur->prenom_visiteur}}" class="form-control" required autofocus> -->
                   {{Form::text("prenom", old("prenom") ? old("prenom") : (!empty($visiteur) ? $visiteur->prenom_visteur : null),
                            ["class" => "form-control", "placeholder" => "Prenom", "required", "autofocus"])
                }} 
            </div>
             @error('prenom')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
         </div>       
        
        <div class="form-group">
            <label class="col-md-3 control-label">Secteur : </label>
            <div class="col-md-3">
               <!-- <select class='form-control' name='cbSecteur' required>
                    <OPTION VALUE=0>Sélectionner un Secteur</option>
                    @foreach ($secteurs as $secteur)
                        selected=""
                        <option  value="{{$secteur->id_secteur}}"
                           @if( $secteur->id_secteur == $visiteur->id_secteur)
                                      selected="selected"
                                  @endif
                        > {{$secteur->lib_secteur}} </option>       
                    @endforeach
                </select> -->
                {{Form::select('cbSecteur', $secteurs->pluck('lib_secteur', 'id_secteur'), $visiteur->id_secteur,
                    ['class' => 'form-control', 'placeholder' => 'Selectionner un secteur']) }}
            </div>
             @error('cbSecteur')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Labo : </label>
            <div class="col-md-3">
               <!-- <select class='form-control' name='cbLaboratoire' required>  
                    <OPTION VALUE=0>Sélectionner un Laboratoire</option>
                    @foreach ($laboratoires as $laboratoire)
                        selected=""
                        <option value="{{$laboratoire->id_laboratoire}}"
                          @if( $laboratoire->id_laboratoire == $visiteur->id_laboratoire)
                                      selected="selected"
                                  @endif
                        >  {{$laboratoire->nom_laboratoire}} </option>
                   @endforeach
                </select> -->
                 {{Form::select('cbLaboratoire', $laboratoires->pluck('nom_laboratoire', 'id_laboratoire'),  $visiteur->id_laboratoire,
                    ['class' => 'form-control', 'placeholder' => 'Selectionner un Laboratoire']) }}

            </div>
             @error('cbLaboratoire')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        
         <div class="form-group">
             <label class="col-md-3 control-label">adresse : </label>
            <div class="col-md-3">
                <!-- <input type="text" name="adresse" 
                    value="{{$visiteur->adresse_visiteur}}" class="form-control" required autofocus> -->
                  {{Form::text("adresse", old("adresse") ? old("adresse") : (!empty($visiteur) ? $visiteur->adresse_visiteur : null),
                            ["class" => "form-control", "placeholder" => "Adresse", "required", "autofocus"])
                }}
            </div>
              @error('adresse')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
             @enderror
         </div>  
        
         <div class="form-group">
             <label class="col-md-3 control-label">Code Postale : </label>
            <div class="col-md-3">
               <!-- <input type="text" name="cp" 
                    value="{{$visiteur->cp_visiteur}}" class="form-control" required autofocus> -->
                 {{Form::text("cp", old("cp") ? old("cp") : (!empty($visiteur) ? $visiteur->cp_visiteur : null),
                            ["class" => "form-control", "placeholder" => "Code postale", "required", "autofocus"])
                }}
            </div>
               @error('cp')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
             @enderror
         </div>  
        
         <div class="form-group">
             <label class="col-md-3 control-label">Ville: </label>
            <div class="col-md-3">
                <!-- <input type="text" name="ville" 
                    value="{{$visiteur->ville_visiteur}}" class="form-control" required autofocus> -->
                      {{Form::text("ville", old("ville") ? old("ville") : (!empty($visiteur) ? $visiteur->ville_visiteur : null),
                            ["class" => "form-control", "placeholder" => "Ville", "required", "autofocus"])
                        }}
            </div>
                @error('ville')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
             @enderror
         </div>  
           <div class="form-group">
             <label class="col-md-3 control-label">Date Embauche : </label>
            <div class="col-md-3">
               <!-- <input type="text" name="dateEmbauche" 
                    value="{{$visiteur->date_embauche}}" class="form-control" required autofocus> -->
                    {{Form::text("dateEmbauche", old("dateEmbauche") ? old("dateEmbauche") : (!empty($visiteur) ? $visiteur->date_embauche : null),
                            ["class" => "form-control", "placeholder" => "Date Embauche", "required", "autofocus"])
                        }}
            </div>
                 @error('dateEmbauche')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
             @enderror
         </div>  
        
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary">
                    <span class="glyphicon glyphicon-ok"></span> Valider
                </button>
                &nbsp;
                <button type="button" class="btn btn-default btn-primary" 
                    onclick="javascript: window.location = '{{ url('/') }}';">
                    <span class="glyphicon glyphicon-remove"></span> Annuler
                </button>
            </div>           
        </div>
        <div class="col-md-6 col-md-offset-3">
            @include('error')
        </div>        
    </div>
       {!!Form::close()!!}
</div>

@stop
