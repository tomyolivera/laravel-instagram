@extends('layouts.app')

@section('title', 'Home')

@section('css')
    <link href="{{ asset('css/btn_float.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col col-md-6">

                @foreach ($publications as $publication)
                    <div class="card mb-3">
                        {{-- DATA OF THE CREATOR --}}
                        <div class="card-header">
                            @include('publications.user_data')
                        </div>

                        {{-- IMAGE OF THE CREATOR --}}
                        <div class="card-body p-0">
                            @include('publications.image')
                        </div>

                        <div class="card-footer">
                            {{-- DATA OF THE IMAGE --}}
                            @include('publications.data')

                            {{-- COMMENTS OF THE IMAGE --}}
                            @include('publications.comments')
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="col col-md-6 justify-center">
                {{-- Side Menu --}}
                {{-- <div class="fixed pic">
                    <h3>Hola</h3>
                </div> --}}
            </div>
        </div>

        <div class="btns">
            <a href="{{ route('publications.create') }}" class="btn1 text-center text-white text-decoration-none"><i class="fas fa-plus"></i></a>
        </div>
    

    </div>
@endsection
