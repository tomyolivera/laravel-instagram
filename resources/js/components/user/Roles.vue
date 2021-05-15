<template>
    <div>
        <div v-for="(role, index) in roles" :key="index">
            <div style="cursor: pointer;user-select:none;" @click="showOrHideRoles(id)" v-if="index == roles.length - 1" :class="'bg-' + roles[index].color" class="d-flex justify-content-between px-2 text-uppercase text-center text-bold mb-2 rounded">
                {{ roles[index].name }}
                <span v-if="roles.length > 1"><i :class="'icon_'+id" class="fas fa-plus"></i></span>
            </div>
        </div>

        <div :id="'all_roles_'+id" class="d-none border border-secondary text-light p-3 rounded" style="background:#333;position:fixed; z-index:10000;">
            <div v-for="role in roles" :key="role.id">
                <div :class="'bg-' + role.color" class="text-uppercase text-center text-bold user-select-none mb-2 rounded">
                    {{ role.name }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['roles', 'id'],
        methods: {
            showOrHideRoles(id){
                if($("#all_roles_"+id).hasClass("d-none")){
                    $("#all_roles_"+id).removeClass("d-none");
                    $(".icon_"+id).addClass("fa-times").removeClass("fa-plus");
                }else{
                    $("#all_roles_"+id).addClass("d-none");
                    $(".icon_"+id).addClass("fa-plus").removeClass("fa-times");
                }
            },
        }
    }
</script>