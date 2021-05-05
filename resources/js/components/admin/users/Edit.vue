<template>
    <div>
        <div class="modal fade" :id="id_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit user</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <form @submit.prevent="edit(user)">
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input id="id" type="text" v-model="user.id" disabled class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" v-model="user.name" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" v-model="user.email" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" v-model="user.username" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="verified">Verified</label>
                                <input id="verified" type="number" v-model="user.verified" class="form-control">
                            </div>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Store from '../../Store';

    export default {
        name: 'AdminUsers',
        props: ['user', 'id_modal'],
        data(){
            return {
                editUser: {
                    name: '',
                    username: '',
                    email: '',
                    verified: '',
                }
            }
        },
        created(){
            // console.log(this.user);
        },
        methods: {
            edit(user){
                

                Store.methods.closeModal("editUser");
            }
        }
    }
</script>