@extends('layouts.app')

@section('title')
    {{ __('My Tasks') }}
@endsection

@section('content')
    <div class="container p-3 bg-black border-1 border-gray-600 rounded">
        <div class="row divide-x divide-gray-600">
            <div class="col col-md-6 rounded">
                <Categories />
            </div>

            <div class="col col-md-6 rounded">
                <Tasks />
            </div>
        </div>
    </div>
@endsection