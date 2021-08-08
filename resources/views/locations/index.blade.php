@extends('layouts.main')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h2 mb-0 text-gray-800">Liste des Locales </h1>
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

            <div class="card-header">
               <h3 class="h4 mb-0 text-gray-800">  <a class="btn-sm btn-info" href="{{route('locations.create') }}" class="float-left"> Ajouter Un Locale </a> </h3>
            </div>

        </div>
        <div class="card-body">
    <table class="table  table-striped " id="location_table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col">Nombres des places disponibles</th>
      <th scope="col">Disponibilité</th>
      <th scope="col">Ajouter le</th>
     
      
    </tr>
  </thead>
  <tbody>
      @foreach ($locations as $location)
    <tr>
      <th scope="row">{{$location->id}}</th>
      <td>{{$location->description}}</td>
      <td>{{$location->nbr_place}}</td>
      @if($location->reserved ==0)  
      <td>locale est disponible a reserver</td> 
      @else
      <td>locale est deja reserver</td> 
      @endif
      <td>{{$location->created_at}}</td>
      
      <td>
        <a class="btn-sm btn-primary" href="{{route('locations.edit',$location->id)}}">Modifier</a> 
        <th>   <form method="POST" action="{{route('locations.destroy',$location->id)}}">
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


    <script>
      $(document).ready(function()
      { $('#search').keyup(function(){
          search_table($(this).val());  });
      function search_table(value){
          $('#location_table tr').each(function()
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