@extends('layouts.main')

@section('content')



        <div class="card">
        </div>
        <div class="card-body">
            
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Modifier Locale') }} <a href="{{route('locations.index')}}" class="float-right">Retour</a></div>
                            
                            <div class="card-body">
                                <form method="POST" action="{{ route('locations.update',$location->id) }}">
                                   @csrf
                                   @method('PUT')
            
                                    <div class="form-group row">
                                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description',$location->description) }}" required autocomplete="description" autofocus>
            
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nbr_place" class="col-md-4 col-form-label text-md-right">{{ __('Nombres des places') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="nbr_place" type="text" class="form-control @error('nbr_place') is-invalid @enderror" name="nbr_place" value="{{ old('nbr_place',$location->nbr_place) }}" required autocomplete="nbr_place" autofocus>
            
                                            @error('nbr_place')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                  
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Modifier') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>  
    </div>



@endsection