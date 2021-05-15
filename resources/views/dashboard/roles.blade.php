@extends('adminlte::page')

@section('title', "Roles")

@section('content')
    <table id="table_roles" class="table table-dark w-100 table-responsive-sm table-responsive-md">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                {{-- <th>Color</th> --}}
                <th>Permission</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr class="text-uppercase">
                    <td>{{ $role->id }}</td>
                    <td>
                        <p class="text-center text-bold rounded px-2 bg-{{ $role->color }} text-{{ $role->color }}">
                            {{ $role->r_name }}
                        </p>
                    </td>
                    {{-- <td>{{ $role->color }}</td> --}}
                    <td>{{ $role->p_name }}</td>
                    <td>
                        <div class="flex">
                            @can('edit users')
                                <button class="btn btn-warning mr-2"><i class="fas fa-edit"></i></button>
                            @endcan
                            @can('delete users')
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('js')
    @parent    

    <script>
        $("#table_roles").DataTable({
            lengthMenu: [[10, 20, -1], [10, 20, "All"]]
        });
    </script>
@stop