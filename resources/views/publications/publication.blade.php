@extends('layouts.app')

@section('title', 'Home')

@section('css')
    <link href="{{ asset('css/btn_float.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="container mt-5">

        @foreach ($publications as $publication)
            <div class="row bg-white rounded divide-x divide-gray-400 p-0 m-0 shadow-lg">
                <div class="col col-md-6 p-0">
                    <div class="card">
                        {{-- DATA OF THE CREATOR --}}
                        <div class="card-header">
                            @include('publications.user_data')
                        </div>

                        {{-- IMAGE OF THE CREATOR --}}
                        <div class="card-body p-0">
                            @include('publications.image')
                        </div>

                        {{-- Back to all publications --}}
                        <div class="card-footer">
                            <a href="{{ route('publications') }}" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                </div>

                <div class="col col-md-6 p-0">
                    <div class="card">
                        <div class="card-header py-3">
                            {{-- DATA OF THE IMAGE --}}
                            @include('publications.data')
                        </div>

                        <div class="p-2">
                            {{-- COMMENTS OF THE IMAGE --}}
                            @include('publications.comments_detail')
                        </div>
                    </div>
                </div>
        @endforeach

                {{-- <div class="card position-relative" style="height: 100%">

                    <div class="card-header">
                        <a href="{{ route('user', $publication->user->username) }}" class="flex align-center text-decoration-none">
                            <img class="w-10 h-10 rounded-full" src="{{ route('user.photo', ['filename' => $publication->user->photo]) }}" />
                            <span class="my-2 mx-3">{{ $publication->user->name }}</span>
                        </a>
                    </div>
    
                    <div class="card-body">
                        @if ($publication->description)
                            <div class="flex align-center my-2" style="font-size: 14px">
                                <div>
                                    <a href="#" class="text-black font-weight-bold text-decoration-none flex align-center">
                                        <img class="w-8 h-8 rounded-full" src="{{ route('user.photo', ['filename' => $publication->user->photo]) }}" />
                                        <span class="ml-2 mt-1">{{ __('@') }}{{ $publication->user->username }}:</span>
                                    </a>
                                </div>
                                <span class="text-black ml-2 mt-1">{{ $publication->description }}</span>
                            </div>
                        @endif
                        
                        <div style="overflow:auto;">
                            @foreach ($publication->comments as $comment)
                                <div class="flex align-center my-2" style="font-size: 14px">
                                    <div>
                                        <a href="#" class="text-black font-weight-bold text-decoration-none flex align-center">
                                            <img class="w-8 h-8 rounded-full" src="{{ route('user.photo', ['filename' => $comment->user->photo]) }}" />
                                            <span class="ml-2 mt-1">{{ __('@') }}{{ $comment->user->username }}:</span>
                                        </a>
                                    </div>
                                    <div>
                                        <div class="text-black ml-2 mt-1">
                                            <span>{{ $comment->description }}</span>
                                            <span class="text-gray-600">{{ \FormatTime::LongTimeFilter($comment->created_at) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    
                    <div class="py-2 position-absolute bottom-0 w-full">
                        <hr>
                        <div>
                            <div class="flex justify-between align-center" style="font-size: 16px">
                                <div>
                                    <i class="far fa-heart">@if (count($publication->likes) > 0) {{ count($publication->likes) }}  @endif</i>
                                    <i class="far fa-comment"> {{ count($publication->comments) }}</i>
                                </div>
                                <div>
                                    <i class="far fa-clock"> <span class="ml-2 text-gray-600" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">{{ \FormatTime::LongTimeFilter($publication->created_at) }}</span></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>

    </div>
@endsection
