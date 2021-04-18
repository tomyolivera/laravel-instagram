<template>
    <div class="container">
        <h1 class="mb-4">My Profile</h1>
        
        <div class="picture sm:w-full md:w-full lg:w-3/4 xl:w-1/2 flex justify-between">
            <div>
                <h3>{{ user.name }}</h3>
                <div>
                    <p>{{ user.email }}</p>
                    <p class="mt-2">Created at {{ user.created_at }}</p>
                    <user-status :status="user.status" />
                </div>
            </div>

            <div>
                <img class="rounded-full h-20 w-20" :src="user.photo" />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12 col-md-4 mb-3">
                <div class="list-group sticky-top z-0">
                    <a class="list-group-item list-group-item-dark-mod list-group-item-action active" data-bs-toggle="list" href="#list-general">General</a>
                    <a class="list-group-item list-group-item-dark-mod list-group-item-action" data-bs-toggle="list" href="#list-edit">Edit</a>
                    <a class="list-group-item list-group-item-dark-mod list-group-item-action" data-bs-toggle="list" href="#list-security">Security</a>
                </div>
            </div>

            <div class="col-sm-12 col-md-8">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="list-general"> <user-data :user="user" /> </div>
                    <div class="tab-pane fade" id="list-edit"> <form-edit-user :user="user" /> </div>
                    <div class="tab-pane fade" id="list-security">  </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Store from '../Store';

    export default {
        name: 'User',
        data(){
            return {
                user: {
                    photo: '',
                    name: '',
                    username: '',
                    email: '',
                    created_at: 0,
                    status: 0,
                    dark_mode: false
                }
            }
        },
        created(){
            this.setUser(this.user);
        },
        methods: {
            setUser(user){
                axios.get('/user').then((res) => {
                    user.photo = Store.methods.getPhoto(res.data.user.photo, user);
                    user.name = res.data.user.name;
                    user.username = res.data.user.username;
                    user.created_at = res.data.user.created_at;
                    user.email = res.data.user.email;
                    user.status = res.data.user.status;
                    user.dark_mode = res.data.user.dark_mode;
                    Store.methods.isDark(user.dark_mode);
                });
            }
        }
    }
</script>