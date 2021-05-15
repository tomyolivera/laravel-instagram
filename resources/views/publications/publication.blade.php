@extends('layouts.app')

@section('title', 'Publication')

@section('content')
    <div class="container mt-5">
        @foreach ($publications as $publication)
            <div class="row p-0 m-0">
                <div class="col col-md-5 p-0">
                    <div class="card">
                        {{-- Publication user data --}}
                        <div class="card-header">
                            @include('publications.user_data')
                        </div>
                    
                        {{-- Publication image --}}
                        <div class="w-full">
                            <div class="card-body p-0">
                                @include('publications.image')
                            </div>
                        </div>
                    
                        {{-- Back to all publications --}}
                        @include('publications.data')
                    </div>
                </div>

                <div class="col col-md-6 p-0 ml-2">
                    <div class="card">
                        <div class="card-header">
                            {{-- Back, delete, etc --}}
                            @include('publications.actions')
                        </div>

                        <div class="p-2">
                            {{-- Publication comments --}}
                            @include('publications.comments_detail')
                        </div>

                        <div class="card-footer">
                            {{-- Add comment --}}
                            @include('publications.create_comment')
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
@endsection
