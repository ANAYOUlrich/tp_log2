@extends('admin.layouts.app')

@section('titre')
<i class="feather icon-home bg-c-blue"></i>
<div class="d-inline">
    <h5>Liste Des Utilisateurs</h5>
    <span>Liste des utilisateurs</span>
</div>
@endsection

@section('barre')
<ul class=" breadcrumb breadcrumb-title">
    <li class="breadcrumb-item">
        <a href="/admin"><i class="feather icon-home"></i></a>
    </li>
    <li class="breadcrumb-item">
       	<a href="#!">Liste Utilisateur</a> 
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
        	<h5>Liste des utilisateurs : {{count($users)}}</h5>
        </div>
        <div class="card-block">
        	<div class="dt-responsive table-responsive">
        		<table id="lang-dt" class="table table-striped table-bordered nowrap">
			        <thead>
			        	<tr>
			                <th>Nom et Prénoms</th>
			                <th>Télephones</th>
			                <th>Email</th>
			                <th>Type</th>
			                <th>Adresse</th>
			                <th>Actions</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($users as $user)
			        	<tr id="tr-{{$user->id}}">
			        		<td>
			        			<span class="text-uppercase">{{$user->nom}} </span>{{$user->prenom}}
			        		</td>
			        		<td>{{$user->telephone}}</td>
			        		<td>{{$user->email}}</td>
			        		<td>
			        			@if($user->level==0)
			        			<span class="pcoded-badge label label-danger">
			        				Utilisateur bloquer
			        			</span>
			        			
			        			@elseif($user->level==1)
			        			<span class="pcoded-badge label label-success">
			        				Utilisateur activer
			        			</span>
			        			@endif
			        		</td>
			        		<td>{{$user->adresse}}</td>
			        		<td>
			        			<a title="Modifier l'utilisateur" href="/admin/user/edit/{{$user->id}}" class="btn waves-effect waves-light btn-success"><i class="fa fa-edit" style="margin-right: 0px;"></i></a>
			        			<button title="Supprimer l'utilisateur" class="btn waves-effect waves-light btn-danger" data-toggle="modal" data-target="#supprimeruser{{$user->id}}"><i class="fa fa-trash" style="margin-right: 0px;"></i></button>
			        		</td>
			        	</tr>
			        	@endforeach
			    	</tbody>
			    	<tfoot>
			    		<tr>
			                <th>Nom et Prénoms</th>
			                <th>Télephones</th>
			                <th>Email</th>
			                <th>Type</th>
			                <th>Adresse</th>
			                <th>Actions</th>
			            </tr>
			    	</tfoot>
			    </table>
			</div>
		</div>
	</div>
</div>


@foreach($users as $user)
<!-- Modal -->
<div class="modal fade" id="supprimeruser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer Utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Etes vous sure de vouloir supprimer l'utilisateur <span class="text-uppercase">{{$user->nom}}</span> {{$user->prenom}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Non</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleteUser({{$user->id}})">Oui</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection

@section('script')
<script type="text/javascript">

            function deleteUser(id){
                $('.alert').remove();
                $.ajax({
                    method:'get',
                    url: '/admin/user/delete/'+id,
                    type: 'json',
                }).done(function (data) {
                    console.log(data);
                    if(data.success){$("#tr-"+id).remove();}
                    @include('admin.layouts.alertjs')
                   
                });
            };
</script>
@endsection