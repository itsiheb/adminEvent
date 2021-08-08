@extends('layouts.main')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h2 mb-0 text-gray-800">Liste des Evennements  </h1>
    </div>

        <div class="card">
          <form>
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="rechercher une demande ici" aria-label="Search" name="search" id="search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
          <div>
            @if (session()->has('message'))
            <div class="alert alert-info">
              {{  session('message') }}
          </div>
          @endif
          </div>


        </div>
        <div class="card-body">
    <table class="table  table-striped " id="event_table">
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

    <script>
      $(document).ready(function()
      { $('#search').keyup(function(){
          search_table($(this).val());  });
      function search_table(value){
          $('#event_table tr').each(function()
          { var found = 'false';
          $(this).each(function(){
              if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
              { found = 'true';  } });
          if(found == 'true') { $(this).show();  }
          else  { $(this).hide();  }
          });  }
      });
  </script> 

@endsection