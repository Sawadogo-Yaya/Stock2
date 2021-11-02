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
              <li class="breadcrumb-item active">Liste des catégorie</li>
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
                <h5 class="card-title">Liste des catégories</h5><br>
               <a href="{{route('categories.create')}}" class="btn btn-sm btn-primary" > 
               <i class="fa fa-plus"></i>
                Ajouter catègorie
               </a><br><br>
               <table class="table table-bordered datatable" >
                   <thead>
                        <tr>
                              <th>#Sl</th>
                              <th>Nom</th>
                              <th>Action</th>
                        </tr>
                   </thead>
                   <tbody>
                          @if('categories')
                          @foreach($categories as $key=> $Categorie)
                          <tr>
                               <td>{{++$key}}</td>
                               <td>{{$Categorie->nom ?? ''}}</td>
                                <td>
                                <a href="{{route('categories.edit', $Categorie->id)}}" class="btn btn-sm btn-info">
                               <i class="fa fa-edit"></i> Modifier
                                </a>
                               <a href="javascipt:;" class="btn btn-sm btn-danger sa-delete" data-form-id="categorie-delete-{{$Categorie->id}}">
                               <i class="fa fa-trash"></i> Supprimer
                                </a>
                                <form id="categorie-delete-{{$Categorie->id}}" action="{{route('categories.destroy', $Categorie->id)}}" method='post'>
                                @csrf
                                @method('DELETE')
                                </form>
                                </td>
                          </tr>
                          @endforeach
                          @endif
                   </tbody>
               </table>
                
              </div>
            </div>
          </div>
         
         
        </div>
        
      </div>
    </div>
@endsection