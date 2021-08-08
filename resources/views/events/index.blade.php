@extends('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h2 mb-0 text-gray-800">Liste des Evennements  </h1>
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
      <th scope="col">Nombre de place</th>
      <th scope="col">Locale</th>
      <th scope="col">approuvé le</th>
     
      
    </tr>
  </thead>
  <tbody>
      @foreach ($events as $event)
    <tr>
      <th scope="row">{{$event->id}}</th>
      <td>{{$event->title}}</td>
      <td>{{$event->member->name}}  {{$event->member->surname}} </td>
      <td>{{$event->description}}</td>
      <td>{{$event->category->description}}</td>
      <td>{{$event->nbr_place}}</td>
      <td>{{$event->location->description}}</td>
      <td>{{$event->created_at}}</td>
      
      <th>
        <a class="btn-sm btn-primary" href="{{route('events.edit',$event->id)}}">Modifier</a> 
      </th>
        <th>   <form method="POST" action="{{route('events.destroy',$event->id)}}">
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