@extends('admin.layouts.app')

@section('titre')
<i class="feather icon-home bg-c-blue"></i>
<div class="d-inline">
    @isset($user)
        <h5>Modifier Utilisateur</h5>
        <span>Modifier l'utilisateur : {{$user->nom}}</span>
    @else
        <h5>Nouveau Utilisateur</h5>
        <span>Enregistrer un nouveau utilisateur</span>
    @endif
</div>
@endsection

@section('barre')
<ul class=" breadcrumb breadcrumb-title">
    <li class="breadcrumb-item">
        <a href="/admin"><i class="feather icon-home"></i></a>
    </li>
    @isset($user)
        <li class="breadcrumb-item">
            <a href="/admin/user/index">Liste Utilisateur</a> 
        </li>
        <li class="breadcrumb-item">
            <a href="#!">Modifer Utilisateur</a> 
        </li>
        
    @else
        <li class="breadcrumb-item">
            <a href="#!">Nouveau Utilisateur</a> 
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
            @isset($user)
                <form method="POST" action="/admin/user/update/{{$user->id}}">
            @else
                <form method="POST" action="/admin/user/store">
            @endif
            
                <!-- Nom -->
                {{csrf_field()}}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nom" value="{{old('nom')?? $user->nom ?? '' }}" required="">
                        @if( $errors->has('nom'))
                            <label class="col-sm-12 col-form-label text-danger">{{ $errors->first('nom') }}</label>
                        @endif
                    </div>
                </div>
                <!-- Prenom -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Prenoms</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="prenom" value="{{old('prenom')?? $user->prenom ?? '' }}" required="">
                        @if( $errors->has('prenom'))
                            <label class="col-sm-12 col-form-label text-danger">{{ $errors->first('prenom') }}</label>
                        @endif
                    </div>
                </div>
                <!-- Telephone -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Telephone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="telephone" value="{{old('telephone')?? $user->telephone ?? '' }}" required="">
                        @if( $errors->has('telephone'))
                            <label class="col-sm-12 col-form-label text-danger">{{ $errors->first('telephone') }}</label>
                        @endif
                    </div>
                </div>
                <!-- Email -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="{{old('email')?? $user->email ?? '' }}" required="">
                        @if( $errors->has('email'))
                            <label class="col-sm-12 col-form-label text-danger">{{ $errors->first('email') }}</label>
                        @endif
                    </div>
                </div>
                <!-- Adresse -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Adresse</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="adresse" value="{{old('adresse')?? $user->adresse ?? '' }}">
                        @if( $errors->has('adresse'))
                            <label class="col-sm-12 col-form-label text-danger">{{ $errors->first('adresse') }}</label>
                        @endif
                    </div>
                </div>
                <!-- Type utilisateur -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Type de utilisateur</label>
                    <div class="col-sm-10">

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input 
                                            @if(old('level')==0) checked="" @endif
                                            @isset($user->level) @if($user->level==0) checked="" @endif  @else checked="" @endif 

                                            class="form-check-input" type="radio" name="level" value="0"> Désactiver
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input 
                                            @if(old('level')==1) checked="" @endif
                                            @isset($user->level) @if($user->level==1) checked="" @endif  @else checked="" @endif 

                                            class="form-check-input" type="radio" name="level" value="1"> Utilisatteur simple
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                          <input 
                                            @if(old('level')==2) checked="" @endif
                                            @isset($user->level) @if($user->level==2) checked="" @endif @endif
                                          class="form-check-input" type="radio" name="level" value="2">Administrateur
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                          <input 
                                            @if(old('level')==3) checked="" @endif
                                            @isset($user->level) @if($user->level==3) checked="" @endif @endif
                                          class="form-check-input" type="radio" name="level" value="3">Super Administrateur
                                        </label>
                                    </div>

                        @if( $errors->has('level'))
                            <br>
                            <label class="col-sm-12 col-form-label text-danger">{{ $errors->first('level') }}</label>
                        @endif
                    </div>
                </div>
                @if(!isset($user))
                    <!-- Mot de passe -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mot de passe</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" value="{{old('password')?? $user->password ?? '' }}">
                            @if( $errors->has('password'))
                                <label class="col-sm-12 col-form-label text-danger">{{ $errors->first('password') }}</label>
                            @endif
                        </div>
                    </div>
                    <!-- Confirmer mot de passe -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Comfirmer </label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')?? $user->password ?? '' }}">
                            @if( $errors->has('password_confirmation'))
                                <label class="col-sm-12 col-form-label text-danger">{{ $errors->first('password_confirmation')}}</label>
                            @endif
                        </div>
                    </div>
                @endif
                <!-- Button -->
                <div class="form-group row">
                    <label class="col-sm-2"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary m-b-0">Soumettre</button>
                        <button type="reset" class="btn btn-danger m-b-0">Réinitialiser</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

@endsection