@extends('layouts.app')

@section('title')
    {{ __('My Tasks') }}
@endsection

@section('content')
  <div class="container">
    <p class="h3 text-light">My tasks</p>
    
    <div class="bg-black p-3 rounded">
      {{-- <button class="btn btn-primary my-3 flex align-center"><i>add</i></button> --}}
      @include('tasks.add')

      <div class="row flex justify-center">
        @include('tasks.task')
        @include('tasks.task')
        @include('tasks.task')
        @include('tasks.task')
        @include('tasks.task')
        @include('tasks.task')
        @include('tasks.task')
        @include('tasks.task')
        @include('tasks.task')
        @include('tasks.task')
        @include('tasks.task')
        @include('tasks.task')
        @include('tasks.task')
      </div>
    </div>
  </div>
@endsection