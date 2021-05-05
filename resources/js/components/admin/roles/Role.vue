<template>
    <div>
        <h3>Roles</h3>

        <div class="row">
            <div class="col-md-3 picture mr-4" v-for="(role, index) in roles" :key="index">
                <p class="mt-2">
                    <strong class="rounded py-2 px-3 user-select-none bg-gradient-to-br" 
                            :class="['text-' + role.color + '-200', 
                                    'from-' + role.color + '-500',
                                    'to-' + role.color + '-800',
                                    ]">
                        {{ firstLetterUpper(role.name) }}
                    </strong>
                </p>

                <!-- Actions -->
                <p class="mb-3">
                    <div class="flex align-center">
                        <div v-if="permissions.edit">
                            <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                        </div>

                        <div class="mx-2" v-if="permissions.delete">
                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    import Store from '../../Store';

    export default {
        name: 'Role',
        props: ['roles'],
        data(){
            return {
                permissions: {
                    edit: false,
                    delete: false,
                },
            }
        },
        async created(){
            this.permissions.edit = await Store.methods.hasPermission("edit");
            this.permissions.delete = await Store.methods.hasPermission("delete");
        },
        methods: {
            firstLetterUpper(string){
                return Store.methods.firstLetterUpper(string);
            },
            deleteRole(){

            },
        }
    }
</script>