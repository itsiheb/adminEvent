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


        </div>
        <div class="card-body">
    <table class="table  table-striped ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">proposé par</th>
      <th scope="col">description</th>
      <th scope="col">categorie</th>
      <th scope="col">&#8470; </th>
      <th scope="col">Locale demandé</th>
      <th scope="col">etat</th>
      <th scope="col">creer le</th>
     
      
    </tr>
  </thead>
  <tbody>
      @foreach ($demandes as $demande)
    <tr>
      <th scope="row">{{$demande->id}}</th>
      <td>{{$demande->title}}</td>
      <td>{{$demande->member->name}}  {{$demande->member->surname}} </td>
      <td>{{$demande->description}}</td>
      <td>{{$demande->category->description}}</td>
      <td>{{$demande->nbr_place}}</td>
      <td>{{$demande->location->description}}</td>
      @if($demande->state ==0)  
      <td>Demande Refuser</td> 
      @elseif($demande->state ==1)  
      <td>Demande Accepter</td> 
      @else  
      <td>pas encore traiter</td> 
      @endif
      <td>{{$demande->created_at}}</td>
      
      <th>
        @if($demande->state ==2) 
        <a class="btn-sm btn-primary" href="{{route('demandes.edit',$demande->id)}}">Accepter</a> 
      </th>
      <th><a class="btn-sm btn-secondary" href="{{route('demandes.index',$demande->id)}}">Refuser</a></th>
      @endif
        <th>   <form method="POST" action="{{route('demandes.destroy',$demande->id)}}">
            @csrf
            @method('DELETE')
            <button class="btn-sm btn-danger">Supprimer</button>
            </form> </th>
           
      
    </tr>
    @endforeach
  </tbody>
</table>
</div>  
    </div>



@endsection