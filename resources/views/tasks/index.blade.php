@extends('layouts.app')

@section('title', 'My Tasks')

@section('css')
    <link href="{{ asset('css/btn_float.css') }}" rel="stylesheet">
@stop

@section('content')
    <Tasks />
@endsection

@section('js')
    <script src="{{ asset('js/task.js') }}"></script>
@stop