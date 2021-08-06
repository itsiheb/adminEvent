@extends('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h2 mb-0 text-gray-800">Liste des Categories </h1>
    </div>

        <div class="card">
            <div class="card-header">
               <h3 class="h4 mb-0 text-gray-800">  <a class="btn-sm btn-info" href="{{route('categories.create') }}" class="float-left"> Ajouter Une Categorie </a> </h4>
            </div>

        </div>
        <div class="card-body">
    <table class="table  table-striped ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col">Created_at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->description}}</td>
      <td>{{$category->created_at}}</td>
      <td>
          <a class="btn-sm btn-primary" href="#">Modifier</a>
          <a class="btn-sm btn-danger" href="#">Supprimer</a>
        
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>  
    </div>



@endsection