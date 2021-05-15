@extends('layouts.app')

@section('title', $user->name)

@section('content')
    <?php $divclass = "col-12 col-md-3 bg-black text-gray-200 text-center p-3 my-3 mr-4 rounded shadow-lg" ?>

    <div class="container <?= $divclass ?>">
        <p>{{ $user->username }}</p>
        <p>{{ $user->name }}</p>
        <p>{{ $user->email }}</p>
    </div>
@endsection