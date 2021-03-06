@extends('admin.layouts.app')

@section('titre')
<i class="feather icon-home bg-c-blue"></i>
<div class="d-inline">
    <h5>Liste Des Log</h5>
    <span>Liste des Log</span>
</div>
@endsection

@section('barre')
<ul class=" breadcrumb breadcrumb-title">
    <li class="breadcrumb-item">
        <a href="/admin"><i class="feather icon-home"></i></a>
    </li>
    <li class="breadcrumb-item">
       	<a href="#!">Liste Log</a> 
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
        	<h5>Liste des Log : {{count($logs)}}</h5>
        </div>
        <div class="card-block">
        	<div class="dt-responsive table-responsive">
        		<table id="lang-dt" class="table table-striped table-bordered nowrap">
			        <thead>
			        	<tr>
							<th>N</th>
							<th>Projet</th>
							<th>Type</th>
							<th>Date et heure</th>
							<th>Message</th>
			                <th>Actions</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($logs as $log)
						<tr id="tr-{{$log->id}}">
							<td>{{$log->id}}</td>
							<td>
								{{$log->projet->libelle ?? '-'}}
							</td>
							<td>
								@if($log->type=="Info")
			        			<span class="pcoded-badge label label-info">
			        				{{$log->type ?? '-'}}
			        			</span>
			        			@elseif($log->type=="Erreur")
			        			<span class="pcoded-badge label label-danger">
			        				{{$log->type ?? '-'}}
			        			</span>
			        			@elseif($log->type=="Warning")
			        			<span class="pcoded-badge label label-warning">
			        				{{$log->type ?? '-'}}
								</span>
								@else
								-
			        			@endif
							</td>
							<td>
								{{$log->date_heure ?? '-'}}
							</td>
			        		<td>
								{{$log->message ?? '-'}}
							</td>
			        		<td>
			        			<a title="Modifier le log" href="/admin/log/edit/{{$log->id}}" class="btn waves-effect waves-light btn-warning"><i class="fa fa-edit" style="margin-right: 0px;"></i></a>
								<button title="Supprimer le log" class="btn waves-effect waves-light btn-danger" onclick="deletelog({{$log->id}})"><i class="fa fa-trash" style="margin-right: 0px;"></i></button>
			        		</td>
			        	</tr>
			        	@endforeach
			    	</tbody>
			    	<tfoot>
			    		<tr>
			                <th>N</th>
							<th>Projet</th>
							<th>Type</th>
							<th>Date et heure</th>
							<th>Message</th>
			                <th>Actions</th>
			            </tr>
			    	</tfoot>
			    </table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">

            function deletelog(id){
				if(confirm("Etes vous sure de vouloir supprimer l'utilisateur")){
                $('.alert').remove();
                $.ajax({
                    method:'get',
                    url: '/admin/log/delete/'+id,
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