@extends('layouts.app')

@section('title')
    {{ __('My Tasks') }}
@endsection

@section('content')
    <div class="container">
        <p class="h3 text-light">My tasks</p>

        <button class="btn btn-primary my-3"><i class="material-icons">add</i></button>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span class="rounded bg-red-500 text-light px-2">Historia Judia</span></td>
                    <td>Capitulo 8</td>
                    <td>Actividades 1,2, 3</td>
                    <td>Borrar | Editar</td>
                </tr>

                <tr>
                    <td><span class="rounded bg-green-500 text-light px-2">Lengua</span></td>
                    <td>Boca Juniors</td>
                    <td>Actividades 1, 2</td>
                    <td>Borrar | Editar</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection