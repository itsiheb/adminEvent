@extends('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h2 mb-0 text-gray-800">Liste des Categories </h1>
    </div>

        <div class="card">

          <div>
            @if (session()->has('message'))
            <div class="alert alert-info">
              {{  session('message') }}
          </div>
          @endif
          </div>

            <div class="card-header">
               <h3 class="h4 mb-0 text-gray-800">  <a class="btn-sm btn-info" href="{{route('categories.create') }}" class="float-left"> Ajouter Une Categorie </a> </h3>
            </div>

        </div>
        <div class="card-body">
    <table class="table  table-striped ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col">Ajouter le </th>
      
    </tr>
  </thead>
  <tbody>
      @foreach ($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->description}}</td>
      <td>{{$category->created_at}}</td>
      <td>
        <a class="btn-sm btn-primary" href="{{route('categories.edit',$category->id)}}">Modifier</a> 
        <th>   <form method="POST" action="{{route('categories.destroy',$category->id)}}">
            @csrf
            @method('DELETE')
            <button class="btn-sm btn-danger">Supprimer</button>
            </form> </th>
      </td>
      
    </tr>
    @endforeach
  </tbody>
</table>
</div>  
    </div>



@endsection