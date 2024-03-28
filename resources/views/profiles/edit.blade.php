@extends('layouts.app')

@section('content')
    {{-- Edit {{ $user->id }} --}}
    <div class="container">
        <form action="/p" enctype="multipart/form-data" method="POST">
            @csrf
            @method("PATCH")
            <div class="row">
                <div class="col-8 offset-2">
                    
                    <div class="row">
                        <h1>Add New Post</h1>
                    </div>
                    
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">Post Title</label>
        
                        <input  id="title" 
                                type="text" 
                                class="form-control{{ $errors->has('title') ? 'is-invalid' : ''}}"
                                name="title" 
                                title="title" value="{{ old('title') ?? $user->profile->title }}" autofocus>
        
                        @if ($errors->has('title'))
                                <strong>{{ $errors->first('title') }}</strong>    
                        @endif
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">Post description</label>
        
                        <input  id="description" 
                                type="text" 
                                class="form-control{{ $errors->has('description') ? 'is-invalid' : ''}}"
                                name="description" 
                                description="description" value="{{ old('description') ?? $user->profile->description }}" autofocus>
        
                        @if ($errors->has('description'))
                                <strong>{{ $errors->first('description') }}</strong>    
                        @endif
                    </div>

                    <div class="form-group row">
                        <label for="url" class="col-md-4 col-form-label">Post url</label>
        
                        <input  id="url" 
                                type="text" 
                                class="form-control{{ $errors->has('url') ? 'is-invalid' : ''}}"
                                name="url" 
                                url="url" value="{{ old('url') ?? $user->profile->url }}" autofocus>
        
                        @if ($errors->has('url'))
                                <strong>{{ $errors->first('url') }}</strong>    
                        @endif
                    </div>
    
                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Profile Image</label>
    
                        <input type="file" class="form-control-file" id="image" name="image">
    
                        @if ($errors->has('image'))
                                <strong>{{ $errors->first('image') }}</strong>
                        @endif
                    </div>
    
                    <div class="row pt-4">
                        <button class="btn btn-primary">Save Profile</button>
                    </div>
        
                </div>
            </div>
        </form>
    </div>
@endsection
