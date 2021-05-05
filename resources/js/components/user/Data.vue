<template>
    <div>
        <h3>
            <a class="hover:text-white text-decoration-none" href="#personalinformation">
                Personal Information
            </a>
        </h3>
        <div class="picture data" :class="edit ? 'hidden' : user.dark_mode ? 'dark' : ''">
            <div>
                <h5>Profile</h5>
                <p>Your personal information</p>
            </div>

            <table class="my-3 table">
                <tbody>
                    <tr>
                        <td>Avatar:</td>
                        <td>
                            <img class="rounded-full h-10 w-10" :src="user.photo">
                        </td>
                    </tr>

                    <tr>
                        <td>Name:</td>
                        <td>
                            <p  class="cursor-pointer"
                                title="Click to copy to clipboard"
                                @click="copy('name_data')" id="name_data">
                                {{ user.name }}
                            </p>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Username:</td>
                        <td>
                            <p  class="cursor-pointer"
                                title="Click to copy to clipboard"
                                @click="copy('username_data')" id="username_data">
                                {{ user.username }}
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td>Email:</td>
                        <td>
                            <p  class="cursor-pointer"
                                title="Click to copy to clipboard"
                                @click="copy('email_data')" id="email_data">
                                {{ user.email }}
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <button class="button button-green-light" @click="edit = true">Edit</button>

            <p id="copy_msg" class="m-2"></p>
        </div>

        <div :class="edit ? '' : 'hidden'">
            <form-edit-user :user="user" :edit="edit" :changeEdit="changeEdit" />
        </div>

        <div>
            <user-preferences :dark_mode="user.dark_mode" />
        </div>
    </div>
</template>

<script>
    import Store from '../Store';
    
    export default {
        props: ['user'],
        data(){
            return {
                edit: false
            }
        },
        methods: {
            changeEdit(){
                this.edit = false;
            },
            copy(id){
                Store.methods.copyToClipBoard(id);
                Store.methods.showMsg("copy", "The data was copied to the clipboard!");
            },
        }
    }
</script>