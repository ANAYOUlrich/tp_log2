@extends('admin.layouts.app')

@section('titre')
<i class="feather icon-home bg-c-blue"></i>
<div class="d-inline">
    @isset($projet)
        <h5>Modifier Log</h5>
        <span>Modifier l'Log : {{$projet->libelle}}</span>
    @else
        <h5>Nouveau Log</h5>
        <span>Enregistrer un nouveau Log</span>
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
            <a href="/admin/projet/index">Liste Log</a> 
        </li>
        <li class="breadcrumb-item">
            <a href="#!">Modifer Log</a> 
        </li>
        
    @else
        <li class="breadcrumb-item">
            <a href="#!">Nouveau Log</a> 
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
                <form method="POST" action="/admin/log/update/{{$log->id}}">
            @else
                <form method="POST" action="/admin/log/store">
            @endif
            
                <!-- libelle -->
                {{csrf_field()}}
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="col-sm-12 col-form-label">Log</label>
                        <div class="col-sm-12">

                            <select name="projet_id" id="projet" class="form-control" value={{old('projet_id')?? $profile->projet_id ?? '' }}"">
                                @foreach($projets as $projet)
                                <option  value="{{$projet->id}}"
                                    @if($projet->id==old('projet_id'))
                                        selected=""
                                    @endif

                                    @isset($log->projet_id)
                                        @if($projet->id==$log->projet_id)
                                            selected=""
                                        @endif
                                    @endif
                                    >{{$projet->libelle}}</option>
                                @endforeach
                            </select>

                            @if( $errors->has('projet_id'))
                                <label class="col-sm-12 col-form-label text-danger">{{ $errors->first('projet_id') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-sm-12 col-form-label">Type</label>
                        <div class="col-sm-12">
                            <select name="type" class="form-control">
                                <option value="Info"  
                                @if(old('type')=='Info') selected=""  @endif
                                @isset($log) @if($log->type=='Info') selected=""  @endif @endif
                                >Info</option>

                                <option value="Erreur"
                                @if(old('type')=='Erreur') selected=""  @endif
                                @isset($log) @if($log->type=='Erreur') selected=""  @endif @endif
                                >Erreur</option>

                                <option value="Warning"
                                @if(old('type')=='Warning') selected=""  @endif
                                @isset($log) @if($log->type=='Warning') selected=""  @endif @endif
                                >Warning</option>
                            </select>
                            @if( $errors->has('type'))
                                <label class="col-sm-12 col-form-label text-danger">{{ $errors->first('type') }}</label>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-sm-12 col-form-label">Date </label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" name="date" value="{{old('date')?? explode(' ',$log->date_heure)[0] ?? '' }}" required="">
                            @if( $errors->has('date'))
                                <label class="col-sm-12 col-form-label text-danger">{{ $errors->first('date') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-sm-12 col-form-label">Heure {{$log->date_heure}}</label>
                        <div class="col-sm-12">
                            <input type="time" class="form-control" name="time" value="{{old('time')?? explode(' ',$log->date_heure)[1] ?? '' }}" required="">
                            @if( $errors->has('time'))
                                <label class="col-sm-12 col-form-label text-danger">{{ $errors->first('time') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="col-sm-12 col-form-label">Message</label>
                        <div class="col-sm-12">
                            <textarea  class="form-control" name="message" rows="5">{{old('message')?? $log->message ?? '' }}</textarea>
                            @if( $errors->has('message'))
                                <label class="col-sm-12 col-form-label text-danger">{{ $errors->first('message') }}</label>
                            @endif
                        </div>
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