@extends('layouts.main')

@section('content')

        <div class="card">
        </div>
        <div class="card-body">
            
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Creation de L evennement') }}</div>
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('events.store') }}">
                                    @csrf
            
                                    <div class="form-group row">
                                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$demande->title }}" required autocomplete="title" autofocus>
            
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="member" class="col-md-4 col-form-label text-md-right">{{ __('Membre') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="member" type="text" class="form-control @error('member') is-invalid @enderror" name="member" value="{{$demande->member->name }}" required autocomplete="member" autofocus>
            
                                            @error('member')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$demande->description }}" required autocomplete="description" autofocus>
            
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('category_id') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="category_id" value="{{$demande->category->description }}" required autocomplete="category_id" autofocus>
            
                                            @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nbr_place" class="col-md-4 col-form-label text-md-right">{{ __('Nombres de participants') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="nbr_place" type="text" class="form-control @error('nbr_place') is-invalid @enderror" name="nbr_place" value="{{$demande->nbr_place}}" required autocomplete="nbr_place" autofocus>
            
                                            @error('nbr_place')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="location_id" class="col-md-4 col-form-label text-md-right">{{ __('Locale') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="location_id" type="text" class="form-control @error('location_id') is-invalid @enderror" name="location_id" value="{{$demande->location->description }}" required autocomplete="location_id" autofocus>
            
                                            @error('location_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                  
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Creer l evennement') }}
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