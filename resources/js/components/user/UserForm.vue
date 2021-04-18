<template>
    <div>
        <div class="picture">
            <div class="mb-3">
                <h5>Profile</h5>
                <p>Your personal information</p>
            </div>

            <form @submit.prevent="update()" enctype="multipart/form-data">
                <!-- Name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input  type="text" 
                            id="name"
                            name="name"
                            v-model="user_edit.name"
                            class="input"
                            autocomplete="off"
                            :minlength="valid.MIN_NAME"
                            :maxlength="valid.MAX_NAME"
                            required />
                </div>
                
                <!-- Username -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input  type="text" 
                            id="username"
                            name="username"
                            v-model="user_edit.username"
                            class="input"
                            autocomplete="off"
                            :minlength="valid.MIN_USERNAME"
                            :maxlength="valid.MAX_USERNAME"
                            required />
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input  type="email" 
                            id="email"
                            name="email"
                            v-model="user_edit.email"
                            class="input"
                            autocomplete="off"
                            required />
                </div>
                
                <!-- Status -->
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status"
                            id="status"
                            class="input"
                            v-model="user_edit.status"
                            required >
                        <option value="0">Offline</option>
                        <option value="1">Online</option>
                        <option value="2">Busy</option>
                    </select>
                </div>

                <div class="form-group flex align-center">
                    <button class="button button-green btn_save_data">Save</button>
                    <p id="fast_data_msg" class="m-2"></p>
                </div>
            </form>
        </div>

        <div class="picture">
            <div class="mb-3">
                <h5>Photo</h5>
                <p>Update your photo</p>
            </div>

            <form @submit.prevent="updatePhoto()" enctype="multipart/form-data">
                <!-- Photo -->
                <div class="form-group">
                    <div v-if="actual_photo != ''">
                        <img :src="actual_photo" class="rounded-full h-12 w-12">
                    </div>
                    <label for="photo">Avatar</label>
                    <input  type="file"
                            class="input"
                            @change="getImage" />
                </div>

                <div class="form-group flex align-center">
                    <button class="button button-green btn_save_photo">Save</button>
                    <p id="fast_photo_msg" class="m-2"></p>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import Store from '../Store';
    import User from './User';

    export default {
        name: 'Userform',
        props: ['user'],
        data(){
            return {
                actual_photo: '',
                user_edit: {
                    name: '',
                    username: '',
                    email: '',
                    created_at: 0,
                    status: 0,
                    dark_mode: false
                },
                valid: {
                    MIN_NAME: 3,
                    MAX_NAME: 30,
                    MIN_USERNAME: 6,
                    MAX_USERNAME: 35,
                }
            }
        },
        created(){
            User.methods.setUser(this.user_edit);
        },
        methods: {
            getImage(e){
                let file = e.target.files[0];
                this.user_edit.photo = file;
                if(!Store.methods.isImage(file.type)){
                    Store.methods.showMsg("fast_photo", "Select an image!", false)
                    Store.methods.statusBtn("save_photo", "Select an image!", false)
                    return;
                }
                Store.methods.statusBtn("save_photo", "Save", true)
                Store.methods.showMsg("fast_photo", "", false)
                this.loadImage(file);
            },
            loadImage(file){
                let reader = new FileReader();

                reader.onload = (e) => {
                    this.actual_photo = e.target.result;
                }

                reader.readAsDataURL(file);
            },
            validFields(){
                return  this.user.name.length > this.valid.MIN_NAME &&
                        this.user.name.length < this.valid.MAX_NAME &&
                        this.user.username.length > this.valid.MIN_USERNAME &&
                        this.user.username.length < this.valid.MAX_USERNAME
            },
            update(){
                Store.methods.statusBtn('save_data', 'Saving...', false);
                Store.methods.showMsg("fast_data");

                axios.post('/user/update', this.user_edit).then((res) => {
                    console.log(res);
                    Store.methods.statusBtn('save_data', 'Save', true);
                    Store.methods.showMsg("fast_data", res.data);

                    this.user.name = this.user_edit.name;
                    this.user.username = this.user_edit.username;
                    this.user.email = this.user_edit.email;
                    this.user.status = this.user_edit.status;
                });
            },
            updatePhoto(){
                Store.methods.statusBtn('save_photo', 'Saving...', false);
                let formData = new FormData();
                formData.append('photo', this.user_edit.photo);

                axios.post('/user/updatePhoto', formData).then((res) => {
                    Store.methods.statusBtn('save_photo', 'Save', true);
                    Store.methods.showMsg("fast_photo", res.data["msg"]);
                    Store.methods.getPhoto(res.data["photo_name"], this.user);
                    this.actual_photo = "";
                })
            }
        }
    }
</script>