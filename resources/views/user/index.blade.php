@extends('layouts.app')

@section('title')
    {{ __('My Profile') }}
@endsection

@section('content')
    <?php $divclass = "col-xs-12 col-sm-12 col-md-3 bg-black text-gray-200 p-0 rounded mr-4 shadow-xl text-center my-3" ?>

    <div class="fixed" style="z-index: 100000">
        @if (session('success'))
            <div class="alert alert-success d-flex justify-between">
                <strong> {{ session('success') }} </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row">

            {{-- Profile --}}
            {{-- <div class="{{ $divclass }}"> --}}
                @include('user.profile')
            {{-- </div> --}}

            @if (Route::has('edit'))
                {{-- Edit --}}
                
                {{-- Extras --}}
                <div class="{{ $divclass }}">
                    {{-- @include('user.extras') --}}
                </div>
                
                {{-- Change password --}}
                <div class="{{ $divclass }}">
                    {{-- @include('user.change_password') --}}
                </div>
            @endif
            
            {{-- Images --}}
            <div>
                {{-- @include('user.publications') --}}
            </div>
        </div>
    </div>

    <user-component />
@endsection