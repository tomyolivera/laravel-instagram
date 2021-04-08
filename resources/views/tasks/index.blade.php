@extends('layouts.app')

@section('title')
    {{ __('My Tasks') }}
@endsection

@section('css')
    <link href="{{ asset('css/btn_float.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="p-4 rounded border-1 border-gray-500">
        <div class="row divide-x divide-gray-500">
            <div class="col col-md-5">
                <Categories />
            </div>

            <div class="col col-md-7">
                <Tasks />
            </div>
        </div>
    </div>

    <div class="btns">
        <div class="btn1"><i>add</i></div>
        <button type="button" class="btn2 hidden" data-bs-toggle="modal" data-bs-target="#addTask">Task</button>
        <button type="button" class="btn3 hidden" data-bs-toggle="modal" data-bs-target="#addCategory">Category</button>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/task.js') }}"></script>
@stop