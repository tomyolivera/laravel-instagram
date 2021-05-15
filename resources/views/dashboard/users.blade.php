@extends('adminlte::page')

@section('title', "Users")

@section('content')
    <h1>Users</h1>

    <div id="app">

        @if(Auth::user()->hasPermissionTo("edit users"))
            <?php $can_edit = true ?>
        @else
            <?php $can_edit = 0 ?>
        @endif

        @if(Auth::user()->hasPermissionTo("delete users"))
            <?php $can_delete = true ?>
        @else
            <?php $can_delete = 0 ?>
        @endif

        <dashboard-users :can_edit="{{ $can_edit }}" :can_delete="{{ $can_delete }}"/>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/app.js')}}"></script>
@stop