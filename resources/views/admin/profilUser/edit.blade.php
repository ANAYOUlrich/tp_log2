@extends('admin.layouts.app')

@section('titre')
<i class="feather icon-home bg-c-blue"></i>
<div class="d-inline">
    <h5>Tableau de bord</h5>
    <span>Tableau de bord</span>
</div>
@endsection

@section('barre')
<ul class=" breadcrumb breadcrumb-title">
    <li class="breadcrumb-item">
        <a href="/admin"><i class="feather icon-home"></i></a>
    </li>
    <li class="breadcrumb-item">
        <a href="/admin/profilUser">Profile</a>
    </li>
    <li class="breadcrumb-item">
        <a href="#!">Modifier le Profile</a> 
    </li>
</ul>
@endsection

@section('contenu')
<div class="col-sm-12" >
	<span id="entete"></span>
    @include('admin.layouts.alert')
</div>


<div class="col-md-12">
	<div class="card">
        <div class="card-header">
            <h5>Modifier le Profile</h5>
        </div>
        <div class="card-block table-border-style">
        	<div class="col-md-12 p-0">
                    <form action="/admin/profilUser/edit" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nom</label>
                                    <input type="text" class="form-control"  value="{{old('nom')?? Auth::user()->nom ?? '' }}" name="nom" placeholder="" required="">
                                    @if( $errors->has('nom'))
                                        <p class="text-danger">{{ $errors->first('nom') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Prénoms</label>
                                    <input type="text" class="form-control" value="{{old('prenom')?? Auth::user()->prenom ?? '' }}" name="prenom"  placeholder="" required="">
                                    @if( $errors->has('prenom'))
                                        <p class="text-danger">{{ $errors->first('prenom') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="{{old('email')?? Auth::user()->email ?? '' }}" name="email" placeholder="" required="">
                                    @if( $errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Téléphone</label>
                                     <input type="text" class="form-control" value="{{old('telephone')?? Auth::user()->telephone ?? '' }}" name="telephone" placeholder="" required="">
                                    @if( $errors->has('telephone'))
                                        <p class="text-danger">{{ $errors->first('telephone') }}</p>
                                    @endif
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Adresse</label>
                                     <input type="text" class="form-control" value="{{old('adresse')?? Auth::user()->adresse ?? '' }}" name="adresse" placeholder="" required="">
                                    @if( $errors->has('adresse'))
                                        <p class="text-danger">{{ $errors->first('adresse') }}</p>
                                    @endif
                                </div>
                            </div>
                           
                        </div>
                        
                        <button class="btn btn-primary">Soumettre</button>
                    </form>
                </div>
		</div>
@endsection