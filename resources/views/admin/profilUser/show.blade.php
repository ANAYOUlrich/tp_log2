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
        <a href="#!">Profile</a> 
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
            <h5>Profil d'Utilisateur</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nom</td>
                            <td><span class="text-uppercase">{{Auth::user()->nom}}</span></td>
                        </tr>
                        <tr>
                        	<td>Prénom</td>
                        	<td>{{Auth::user()->prenom}}</td>
                        </tr>
                        <tr>
                        	<td>Téléphone</td>
                        	<td>{{Auth::user()->telephone}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{Auth::user()->email}}</td>
                        </tr>
                        <tr>
                        	<td>Adresse</td>
                        	<td>{{Auth::user()->adresse}}</td>
                        </tr>
                        <tr>
                        	<td>Type</td>
                        	<td>@if(Auth::user()->level==0)
			        			<span class="pcoded-badge label label-danger">
			        				Désactiver
			        			</span>
			        			
			        			@elseif(Auth::user()->level==1)
			        			<span class="pcoded-badge label label-primary">
			        				Utilisateur simple
			        			</span>
			        			@else
			        			<span class="pcoded-badge label label-success">
			        				Administrateur
			        			</span>
			        			
			        			@endif</td>
			        		</tr>
			        	</table>
			        </div>
			        <a href="/admin/profilUser/edit" class="btn btn-primary m-b-0">Modifier</a>
                    <a href="/admin/profilUser/delete" class="btn btn-danger m-b-0">Supprimer</a>
			    </div>
			</div>
		</div>
@endsection