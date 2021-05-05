<template>
    <div class="container">
        <h1 class="mb-4">Roles and Permission</h1>

        <div class="row mt-3">
            <div class="col-sm-12 col-md-3 mb-3">
                <div class="list-group sticky-top z-0">
                    <a class="list-group-item list-group-item-dark-mod list-group-item-action active" data-bs-toggle="list" href="#list-roles">Roles</a>
                    <a class="list-group-item list-group-item-dark-mod list-group-item-action" data-bs-toggle="list" href="#list-permissions">Permissions</a>
                    <a class="list-group-item list-group-item-dark-mod list-group-item-action" data-bs-toggle="list" href="#list-role_and_permissions">Role and Permission</a>
                </div>
            </div>

            <div class="col-sm-12 col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="list-roles"><Role :roles="roles" /></div>
                    <div class="tab-pane fade" id="list-permissions"> <Permissions :permissions="permissions" /> </div>
                    <div class="tab-pane fade" id="list-role_and_permissions"> <role-has-permissions :role_and_permissions="role_and_permissions" /> </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Store from '../../Store';
    import User from '../../user/User';

    export default {
        name: 'Roles',
        data(){
            return {
                roles: {},
                permissions: {},
                role_has_permissions: {},
                role_and_permissions: [],
                user: User.data().user,
            }
        },
        created(){
            this.getRoles();
            User.methods.setUser(this.user);
        },
        methods: {
            getRoles(){
                axios.get('/admin/roles').then((res) => {
                    this.roles = res.data['roles'];
                    this.permissions = res.data['permissions'];

                    this.role_has_permissions = res.data['role_has_permissions'];
                    this.role_and_permissions = Object.values(this.role_has_permissions);
                });
            },
        }
    }
</script>