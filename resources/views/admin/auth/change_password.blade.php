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
        <a href="#!">Modifier le Mot de passe</a> 
    </li>
</ul>
@endsection

@section('contenu')
<div class="col-sm-12" >
	<span id="entete"></span>
    @include('admin.layouts.alert')
</div>

<div class="col-md-3 "></div>
<div class="col-md-6">
	<div class="card">
        <div class="card-header">
            <h5>Modifier le Mot de passe</h5>
        </div>
        <div class="card-block table-border-style">
            
        	<div class="col-md-12 p-0">
                    <form action="/admin/auth/change-password" method="post">
                        {{csrf_field()}}
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="password">Mot de passe :</label>
                                            <input type="password" class="form-control" id="password" placeholder="" name="oldpassword" value="{{old('oldpassword')??'' }}" required="">
                                            @if( $errors->has('oldpassword'))
                                                <p class="text-danger">{{ $errors->first('oldpassword') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="password">Nouveau mot de passe :</label>
                                            <input type="password" class="form-control" id="password" placeholder="" name="password" value="{{old('password')??'' }}" required="">
                                            @if( $errors->has('password'))
                                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="password_confirmation">Confirmer le nouveau mot de passe :</label>
                                            <input type="password" class="form-control" id="password_confirmation" placeholder="" name="password_confirmation" value="{{old('password_confirmation')??'' }}" required="">
                                            @if( $errors->has('password_confirmation'))
                                                <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                                            @endif
                                        </div>
                                    </div>
                        </div>
                        
                        <button class="btn btn-primary">Soumettre</button>
                    </form>
            </div>
		</div>
    </div>
</div>
<div class="col-md-3 "></div>
@endsection