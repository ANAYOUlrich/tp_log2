@extends('admin.layouts.app')

@section('titre')
<i class="feather icon-home bg-c-blue"></i>
<div class="d-inline">
    @isset($projet)
        <h5>Modifier Projet</h5>
        <span>Modifier l'Projet : {{$projet->libelle}}</span>
    @else
        <h5>Nouveau Projet</h5>
        <span>Enregistrer un nouveau Projet</span>
    @endif
</div>
@endsection

@section('barre')
<ul class=" breadcrumb breadcrumb-title">
    <li class="breadcrumb-item">
        <a href="/admin"><i class="feather icon-home"></i></a>
    </li>
    @isset($projet)
        <li class="breadcrumb-item">
            <a href="/admin/projet/index">Liste Projet</a> 
        </li>
        <li class="breadcrumb-item">
            <a href="#!">Modifer Projet</a> 
        </li>
        
    @else
        <li class="breadcrumb-item">
            <a href="#!">Nouveau Projet</a> 
        </li>
    @endif
    
</ul>
@endsection

@section('contenu')
<div class="col-sm-12">
    @include('admin.layouts.alert')
</div>


<div class="col-sm-12">
    <!-- Basic Form Inputs card start -->
    <div class="card">
        <div class="card-header">
            <h5>Renseigner les informations</h5>
        </div>
        <div class="card-block">
            @isset($projet)
                <form method="POST" action="/admin/projet/update/{{$projet->id}}">
            @else
                <form method="POST" action="/admin/projet/store">
            @endif
            
                <!-- libelle -->
                {{csrf_field()}}
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Libelle </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="libelle" value="{{old('libelle')?? $projet->libelle ?? '' }}" required="">
                        @if( $errors->has('libelle'))
                            <label class="col-sm-12 col-form-label text-danger">{{ $errors->first('libelle') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Description </label>
                    <div class="col-sm-12">
                        <textarea  class="form-control" name="description" rows="5">{{old('description')?? $projet->description ?? '' }}</textarea>
                        @if( $errors->has('description'))
                            <label class="col-sm-12 col-form-label text-danger">{{ $errors->first('description') }}</label>
                        @endif
                    </div>
                </div>
                
                <!-- Button -->
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="reset" class="btn btn-danger m-b-0 ml-1 float-right">Réinitialiser</button>
                        <button type="submit" class="btn btn-primary m-b-0 ml-1 float-right">Soumettre</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

@endsection