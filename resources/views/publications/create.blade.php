@extends('layouts.app')

@section('title', 'Create publication')

@section('content')
    <div class="container picture mt-5 p-3">
        <h4>Create Publication</h4>
        
        <form method="POST" action="{{ route('publications.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="input @error('photo') is-invalid @enderror" />

                @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="input @error('description') is-invalid @enderror" style="min-height: 120px; max-height: 120px"></textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
@endsection