@extends('layouts.master')
@section('contenu')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Les catégories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active">Modification des catégories</li>
            </ol>
          </div>
        </div>
    </div>
</div> 
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Modifier catégories</h5><br>
                <form role="form" action="{{route('categories.update', $categorie->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nom</label>
                    
                    <input name="nom" type="text"  class="form-control" placeholder="Entrer le nom de la catégorie" value="{{$categorie->nom}}">

                     @if ($errors->has('nom'))
                       <span class="text-danger">{{$errors->first('nom')}}</span>
                     
                       @endif
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Valider</button>
                </div>
              </form>
                
              </div>
            </div>
          </div>
         
         
        </div>
        
      </div>
    </div>
@endsection