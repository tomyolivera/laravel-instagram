<template>
    <div>
        <h3>
            <a class="hover:text-white text-decoration-none" href="#preferences">
                Preferences
            </a>
        </h3>
        <div class="picture">
            <div class="mb-3 flex justify-between">
                <div>
                    <h5>Dark Mode</h5>
                    <p>Choose between Light Mode and Dark Mode</p>
                </div>
                <div>
                    <span class="badge bg-orange-700">Beta</span>
                </div>
            </div>

            <form @submit.prevent="changeMode()" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="radio" name="mode" id="light" value="light" :checked="!dark_mode">
                    <label for="light">Light</label><br>

                    <input type="radio" name="mode" id="dark" value="dark" :checked="dark_mode">
                    <label for="dark">Dark</label>
                </div>

                <div class="form-group flex align-center">
                    <button class="button button-green btn_save_mode">Save</button>
                    <p id="fast_mode_msg" class="m-2"></p>
                </div>
            </form>
        </div>

    </div>
</template>

<script>
    import Store from "../Store";

    export default {
        props: ['dark_mode'],
        data(){
            return{
                mode: {
                    darkMode: this.dark_mode
                }
            }
        },
        methods:{
            changeMode(){
                Store.methods.showMsg("fast_mode");
                Store.methods.statusBtn("save_mode", "Saving...", false)

                let mode = $('input:radio[name=mode]:checked').val();

                if(mode != "light" && mode != "dark"){
                    Store.methods.showMsg("fast_mode", "Select a valid mode!", false);
                    Store.methods.statusBtn("save_mode", "Save", true)
                    return;
                }

                this.mode.darkMode = mode == "dark";

                try{
                    axios.post('/user/darkMode', this.mode).then((res) => {
                        Store.methods.showMsg("fast_mode", res.data);
                        Store.methods.statusBtn("save_mode", "Save", true)
                        Store.methods.isDark(this.mode.darkMode);
                    });
                }catch(e){}
                
                
            },
        }
    }
</script>