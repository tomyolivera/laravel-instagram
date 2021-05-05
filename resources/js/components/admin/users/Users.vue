<template>
    <div>
        <h1>Users</h1>

        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Dark Mode</th>
                    <th>Verified</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th>Github or Google</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user, index) in users" :key="index">
                    <td>{{ user.id }}</td>
                    <td>
                        <a class="hover:text-blue-500" target="_blank" :href="'/profile/' + user.username">
                            {{ user.username == "" ? '-' : user.username }}
                        </a>
                    </td>
                    <td>{{ user.name}}</td>
                    <td>{{ user.email}}</td>
                    <td>{{ user.dark_mode ? 'Dark' : 'Light' }}</td>
                    <td>{{ user.verified ? 'True' : '-' }}</td>
                    <td>{{ formatDate(user.created_at) }}</td>
                    <td>
                        <div class="flex align-center" :class="'text-' + [user.status == 0 ? 'gray' : user.status == 1 ? 'green' : 'orange'] + '-500'">
                            <i class="mt-1 fas fa-circle"></i>
                            <span class="ml-2">{{ user.status == 0 ? 'Offline' : user.status == 1 ? 'Online' : 'Busy' }}</span>
                        </div>
                    </td>
                    <td>{{ user.github_id == null && user.google_id == null ? '-' : 'True' }}</td>
                    <td>{{ splitString(user.role_name) }}</td>
                    <td>
                        <form v-if="permissions.delete" method="POST" @submit.prevent="deleteUser(user.id, index)">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>

                        <button v-if="permissions.edit" data-bs-toggle="modal" :data-bs-target="'#editUser_' + user.id" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                        <admin-users-edit :user="user" :id_modal="'editUser_' + user.id" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import Store from '../../Store';

    export default {
        name: 'AdminUsers',
        data(){
            return {
                permissions: {
                    edit: false,
                    delete: false,
                },
                users: [],
                msg: ''
            }
        },
        async created(){
            this.permissions.edit = await Store.methods.hasPermission("edit");
            this.permissions.delete = await Store.methods.hasPermission("delete");
        },
        mounted(){
            this.getUsers();
            // setInterval(() => {
            //      this.getUsers();
            // }, 2000);
        },
        methods: {
            getUsers(){
                axios.get('/admin/users').then((res) => {
                    this.users = res.data;
                });
            },
            userIsAllowedToByRole(role){
                axios.get(`/user/userIsAllowedToByRole/${role}`).then((res) => {
                    // console.log(res.data);
                });
            },
            deleteUser(id, index){
                if(!confirm("Are you sure you want to delete this user? Id: " + id)) return;

                axios.post(`/admin/users/delete`, {id: id}).then((res) => {
                    this.users.splice(index, 1)
                });
            },
            formatDate(date){
                return Store.methods.formatDate(date);
            },
            splitString(string){
                return Store.methods.splitString(string);
            }
        }
    }
</script>