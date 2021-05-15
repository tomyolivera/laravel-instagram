@extends('adminlte::page')

@section('title', "Dashboard")

@section('content')
    <p>Welcome to Admin Panel</p>

    @for ($i = 0; $i < 50; $i++)
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum sapiente itaque aspernatur? Accusamus ratione iure fugiat itaque. Officia adipisci consequatur quia magnam soluta omnis totam itaque explicabo, cupiditate doloribus. Porro!</p>
    @endfor

@endsection