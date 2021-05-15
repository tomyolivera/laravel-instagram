@for ($i = 0; $i < count($roles); $i++)
    @if ($i == count($roles) - 1)
        <div class="d-flex justify-content-between px-2 text-uppercase text-center text-bold mb-2 rounded bg-{{ $roles[$i]->color }}">
            <span>{{ $roles[$i]->name }}</span>

            @if (count($roles) > 1)    
                <span onclick="showOrHideRoles({{ $id }})" style="cursor: pointer"><i class="showHideRoles_{{ $id }} fas fa-plus"></i></span>
            @endif
        </div>
        <div id="all_roles_{{ $id }}" class="user-select-none d-none bg-dark text-white p-3 rounded" style="position:fixed; z-index:10000;">
            <h3>All roles</h3>
            @foreach ($roles as $role)
                <div class="text-uppercase text-center text-bold user-select-none mb-2 rounded bg-{{ $role->color }}">
                    {{ $role->name }}
                </div>
            @endforeach
        </div>
    @endif
@endfor


@section('js')
    @parent

    <script>
        function showOrHideRoles(id){
            if($("#all_roles_"+id).hasClass("d-none")){
                $("#all_roles_"+id).removeClass("d-none");
                $(".showHideRoles_"+id).addClass("fa-times").removeClass("fa-plus");
            }else{
                $("#all_roles_"+id).addClass("d-none");
                $(".showHideRoles_"+id).addClass("fa-plus").removeClass("fa-times");
            }
        }
    </script>
@stop