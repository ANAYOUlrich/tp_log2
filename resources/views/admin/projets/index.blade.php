@extends('admin.layouts.app')

@section('titre')
<i class="feather icon-home bg-c-blue"></i>
<div class="d-inline">
    <h5>Liste Des Projet</h5>
    <span>Liste des Projet</span>
</div>
@endsection

@section('barre')
<ul class=" breadcrumb breadcrumb-title">
    <li class="breadcrumb-item">
        <a href="/admin"><i class="feather icon-home"></i></a>
    </li>
    <li class="breadcrumb-item">
       	<a href="#!">Liste Projet</a> 
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
        	<h5>Liste des Projet : {{count($projets)}}</h5>
        </div>
        <div class="card-block">
        	<div class="dt-responsive table-responsive">
        		<table id="lang-dt" class="table table-striped table-bordered nowrap">
			        <thead>
			        	<tr>
							<th>N</th>
							<th>Creer</th>
							<th>Modifier</th>
			                <th>Libelle & Description</th>
			                <th>Actions</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($projets as $projet)
						<tr id="tr-{{$projet->id}}">
							<td>{{$projet->id}}</td>
							<td>
								@isset($projet->createdBy->nom )
								{{$projet->created_at}} <br>
								Par {{$projet->createdBy->nom ?? ''}}
								@else
								 -
								@endif
							</td>
							<td>
								@isset($projet->updateBy->nom )
								{{$projet->updated_at}} <br>
								Par {{$projet->updateBy->nom ?? ''}}
								@else
								 -
								@endif
							</td>
							<td>
								<strong><b>{{$projet->libelle}}</b><strong><br>
								<p>{{$projet->description}}</p>
							</td>
			        		
			        		<td>
								<button title="Voir les logs" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#logsprojet{{$projet->id}}"><i class="fa fa-eye" style="margin-right: 0px;"></i></button>
			        			<a title="Modifier le projet" href="/admin/projet/edit/{{$projet->id}}" class="btn waves-effect waves-light btn-warning"><i class="fa fa-edit" style="margin-right: 0px;"></i></a>
								<button title="Supprimer le projet" class="btn waves-effect waves-light btn-danger" onclick="deleteprojet({{$projet->id}})"><i class="fa fa-trash" style="margin-right: 0px;"></i></button>
			        		</td>
			        	</tr>
			        	@endforeach
			    	</tbody>
			    	<tfoot>
			    		<tr>
			                <th>N</th>
							<th>Creer</th>
							<th>Modifier</th>
			                <th>Libelle & Description</th>
			                <th>Actions</th>
			            </tr>
			    	</tfoot>
			    </table>
			</div>
		</div>
	</div>
</div>


@foreach($projets as $projet)
<!-- Modal -->
<div class="modal fade" id="logsprojet{{$projet->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Les logs du projet {{$projet->libelle}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table ">
			        <thead>
			        	<tr>
							<th>N</th>
			                <th>Date</th>
							<th>Type</th>
			            </tr>
					</thead>
					<tbody>
			        	@foreach($projet->logs as $log)
						<tr id="tr-{{$log->id}}">
							<td>{{$log->id}}</td>
							<td>
								<strong>{{$log->date_heure}}<strong>
							</td>
							
							<td>
								{{$log->type}}
							</td>
			        
			        	</tr>
			        	@endforeach
			    	</tbody>
			    	
			    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" >OK</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection

@section('script')
<script type="text/javascript">

            function deleteprojet(id){
				if(confirm("Etes vous sure de vouloir supprimer l'utilisateur")){
                $('.alert').remove();
                $.ajax({
                    method:'get',
                    url: '/admin/projet/delete/'+id,
                    type: 'json',
                }).done(function (data) {
                    console.log(data);
                    if(data.success){$("#tr-"+id).remove();}
                    @include('admin.layouts.alertjs')
                   
                });
				}
            };
</script>
@endsection