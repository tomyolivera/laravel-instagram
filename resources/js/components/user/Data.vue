<template>
    <div>
        <div class="picture">
            <div>
                <h5>Profile</h5>
                <p>Your personal information</p>
            </div>

            <table class="my-3 table">
                <tbody>
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

                    <tr>
                        <td>Mode:</td>
                        <td>{{ user.dark_mode ? 'Dark' : 'Light' }}</td>
                    </tr>
                </tbody>
            </table>

            <p id="copy_msg" class="m-2"></p>
        </div>

        <div class="picture">
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
                photo: '',
            }
        },
        methods: {
            copy(id){
                Store.methods.copyToClipBoard(id);
                Store.methods.showMsg("copy", "The data was copied to the clipboard!");
            }
        }
    }
</script>

<style>

</style>