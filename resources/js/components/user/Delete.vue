<template>
    <div>
        <h3>
            <a class="hover:text-white text-decoration-none" href="#dangerzone">
                Danger Zone
            </a>
        </h3>
        <div class="picture">
            <div class="mb-3">
                <h5 class="text-red-500">Delete account</h5>
                <p>This action will delete the account and is irreversible!</p>
            </div>

            <button type="button" class="button button-red" data-bs-toggle="modal" data-bs-target="#deleteUser">Delete account</button>

            <div class="modal fade" id="deleteUser">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete User</h5>
                        </div>

                        <div class="modal-body">
                            <h6 class="text-red-500 mb-3">This action will delete the account and is irreversible!</h6>

                            <form method="post" @submit.prevent="deleteAccount()">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input @keyup="validFields()" v-model="username_delete" type="text" id="username_delete" name="username_delete" class="input" />
                                    <span class="text-gray-500"></span>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input @keyup="validFields()" v-model="password_delete" type="password" id="password_delete" name="password_delete" class="input" />
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-danger" :class="valid ? '' : 'disabled'" :disabled="!valid">Delete account</button>
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Store from '../Store';
    import User from './User';

    export default {
        name: 'Userdelete',
        // props: ['user'],
        data(){
            return {
                valid: false,
                username_delete: '',
                password_delete: '',
                user: {},
            }
        },
        created(){
            User.methods.setUser(this.user);
        },
        methods: {
            validFields(){
                this.valid = this.username_delete == this.user.username &&
                             this.password_delete.length >= 8
            },
            deleteAccount(){
                if(!confirm("Are you sure you want to delete this account?")) return;

                axios.delete('/user/delete').then(window.location = "/login");
            }
        }
    }
</script>