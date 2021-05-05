<template>
    <div>
        <h3>Roles and Permissions</h3>

        <div class="row g-2">
            <div class="col col-md-3 picture mx-2 p-3" v-for="(role_permissions, index) in role_and_permissions" :key="index">
                <div class="flex-column">
                    <p>
                        <strong class="rounded py-2 px-3 user-select-none bg-gradient-to-br" 
                                :class="['text-' + role_permissions.color + '-200', 
                                        'from-' + role_permissions.color + '-500',
                                        'to-' + role_permissions.color + '-800',
                                        ]">
                            {{ firstLetterUpper(role_permissions.role) }}
                        </strong>
                    </p>

                    <p class="mt-3">
                        <strong>
                            {{ splitString(role_permissions.permissions) }}
                        </strong>
                    </p>
                </div>

                <!-- Actions -->
                <div class="flex align-center mt-3">
                    <div v-if="permissions.edit">
                        <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                    </div>

                    <div class="mx-2" v-if="permissions.delete">
                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import Store from '../../Store';

    export default {
        name: 'RoleHasPermissions',
        props: ['role_and_permissions'],
        data(){
            return {
                permissions: {
                    edit: false,
                    delete: false,
                },
            }
        },
        async created(){
            this.permissions.delete = await Store.methods.hasPermission("delete");
            this.permissions.edit = await Store.methods.hasPermission("edit");
        },
        methods: {
            splitString(string){
                return Store.methods.splitString(string);
            },
            firstLetterUpper(string){
                return Store.methods.firstLetterUpper(string);
            }
        }
    }
</script>