@extends('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h2 mb-0 text-gray-800">Liste des Demandes  </h1>
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
               <h3 class="h4 mb-0 text-gray-800">  <a class="btn-sm btn-info" href="{{route('members.create') }}" class="float-left"> Ajouter Un Membre </a> </h3>
            </div>

        </div>
        <div class="card-body">
    <table class="table  table-striped ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">email</th>
      <th scope="col">Rejoindre le</th>
     
      
    </tr>
  </thead>
  <tbody>
      @foreach ($members as $member)
    <tr>
      <th scope="row">{{$member->id}}</th>
      <td>{{$member->name}}</td>
      <td>{{$member->surname}}</td>
      <td>{{$member->email}}</td>
      <td>{{$member->created_at}}</td>
      
      <td>
        <a class="btn-sm btn-primary" href="{{route('members.edit',$member->id)}}">Modifier</a> 
        <th>   <form method="POST" action="{{route('members.destroy',$member->id)}}">
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