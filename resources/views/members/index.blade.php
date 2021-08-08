@extends('layouts.main')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h2 mb-0 text-gray-800">Liste des membres </h1>
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
               <h3 class="h4 mb-0 text-gray-800">  <a class="btn-sm btn-info" href="{{route('members.create') }}" class="float-left"> Ajouter Un Membre </a> </h3>
            </div>

        </div>
        <div class="card-body">
    <table class="table  table-striped " id="member_table">
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

    <script>
      $(document).ready(function()
      { $('#search').keyup(function(){
          search_table($(this).val());  });
      function search_table(value){
          $('#member_table tr').each(function()
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