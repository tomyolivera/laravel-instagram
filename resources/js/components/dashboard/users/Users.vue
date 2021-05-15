<template>
    <div class="bg-dark p-3 rounded text-light">
        <table id="table_users" class="table table-responsive-sm table-responsive-md">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Roles</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.username }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        <user-status :status="user.status" />
                    </td>
                    <td>
                        <user-roles :roles="user.roles" :id="user.id" />
                    </td>
                    <td>
                        <div class="flex">
                            <button :disabled="can_edit != true" class="btn btn-warning mr-2"><i class="fas fa-edit"></i></button>
                            <button :disabled="can_delete != true" @click="deleteUser(user.id)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import Store from '../../Store';
    import Swal from 'sweetalert2'
    import datatable from 'datatables.net-bs4';
    require('datatables.net-buttons/js/dataTables.buttons');
    require('datatables.net-buttons/js/buttons.html5');
    import print from 'datatables.net-buttons/js/buttons.print';
    import jszip from 'jszip/dist/jszip';
    import pdfMake from 'pdfmake/build/pdfmake';
    import pdfFonts from 'pdfmake/build/vfs_fonts';
    pdfMake.vfs = pdfFonts.pdfMake.vfs;
    window.JSZip = jszip

    export default {
        props: ["can_edit", "can_delete"],
        data(){
            return {
                users: []
            }
        },
        created(){
            this.getUsers();
        },
        methods: {
            drawTable(){
                this.$nextTick(() => {
                    Store.methods.drawTable("users");
                });
            },
            getUsers(){
                axios.get('/dashboard/users').then(res => {
                    this.users = res.data;
                    this.drawTable();
                })
            },
            deleteUser(id){
                if(this.can_delete != true) return;

                Swal.fire({
                    title: 'Are you sure you want to delete this user?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'The user has been deleted successfully.',
                            'success',
                        );
                        axios.get("/dashboard/users/delete/" + id).then(() => {
                            this.getUsers();
                        });
                    }
                });
            },
        }
    }
</script>