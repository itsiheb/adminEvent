@extends('layouts.main')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h2 mb-0 text-gray-800">Liste des Demandes  </h1>
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
    <table class="table  table-striped" id="demande_table">
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
        <a href="{{ route('demandes.edit',$demande->id)}}"  name="accepter" class="btn-sm btn-info">Accepter</a>
      </th><th>
        <form method="POST" action="{{route('demandes.destroy',$demande->id)}}">
          @csrf
          @method('DELETE')
          <button class="btn-sm btn-primary">Refuser</button>
          </form>
        </th>
      @else
        <th>   <form method="POST" action="{{route('demandes.destroy',$demande->id)}}">
            @csrf
            @method('DELETE')
            <button class="btn-sm btn-danger">Supprimer de l'historique</button>
            </form> </th>
           
      @endif
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
          $('#demande_table tr').each(function()
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