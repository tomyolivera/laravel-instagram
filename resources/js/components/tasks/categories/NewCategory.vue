<template>
    <div class="text-white">
        <div class="modal fade" id="addCategory">
            <div class="modal-dialog">
                <div class="modal-content modal_add">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form @submit.prevent="add()">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="input" v-model="category.name" autocomplete="off" :minlength="MIN" :maxlength="MAX_NAME" required>
                                <span class="my-2 text-red-600" id="name_msg"></span>
                                <span class="my-2 text-red-600" id="tasks_msg"></span>
                            </div>

                            <div class="form-group">
                                <label for="color">Color</label>
                                <select name="color" id="color" v-model="category.color" class="input">
                                    <option class="bg-gray-800" v-for="(color, id) in colors" :key="id" :class="'text-' + color.toLowerCase() + '-500'" :value="color">
                                        {{ color }}
                                    </option>
                                </select>
                                <span class="my-2 text-red-600" id="color_msg"></span>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block mt-3" id="btn_add" :disabled="!areValids()">
                                    {{ areValids() ? 'Add' : 'Complete the fields!' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'CategoryTask',
        data(){
            return{
                categories: [],
                category: {
                    name: '',
                    color: '',
                },
                colors: [
                    "Red", "Green", "Blue", "Yellow", "Pink", "Purple", "Indigo" , "Gray", "Teal"
                ],
                MIN: 1,
                MAX_NAME: 50,
            }
        },
        created(){
            this.get();

            setInterval(() => {
                this.get();
            }, 1000);
        },
        methods: {
            closeModal(modal){
                $('#' + modal).modal('toggle');
            },
            showMsg(field, msg = ""){
                $("#" + field + "_msg").html(msg);
            },
            isValidName(){
                return this.category.name.length >= this.MIN && this.category.name.length <= this.MAX_NAME
            },
            isValidColor(){
                let isValid = false;

                let i = 0;
                while (!isValid && i < this.colors.length) {
                    if(this.colors[i] == this.category.color) return true;

                    i++;
                }

                return false;
            },
            areValids(){
                return this.isValidName() && this.isValidColor();
            },
            validFields(){
                let isValidName = this.isValidName();
                let isValidColor = this.isValidColor(), isValidCategory = false
                
                let i = 0;
                while (!isValidCategory && i < this.categories.length) {
                    this.categories[i].name = this.categories[i].name.toUpperCase();
                    this.category.name = this.category.name.toUpperCase();

                    isValidCategory = this.categories[i].name == this.category.name;
                    i++;
                }

                isValidName
                    ? this.showMsg("name")
                    : this.showMsg("name", "The field name must contain " + this.MIN + "-" + this.MAX_NAME + " characters");

                if(isValidColor){
                    this.showMsg("color")

                }else{
                    this.showMsg("color", "Select a valid color");
                    $("#color").focus().removeClass("border-gray-800 focus:border-gray-800").addClass("border-red-600 focus:border-red-600");
                }

                if(!isValidCategory){
                    this.showMsg("tasks")
                }else{
                    this.showMsg("tasks", "The name is already used");
                    $("#name").focus().removeClass("border-gray-800 focus:border-gray-800").addClass("border-red-600 focus:border-red-600");
                }

                return isValidName && isValidColor && !isValidCategory;
            },
            resetFields(){
                this.category.name = '';
                this.category.color = '';
            },
            get(){
                axios.get("/categorytasks").then( res => {
                    this.categories = res.data;
                });
            },
            add(){
                if(!this.validFields()) return;

                $("#btn_add").html("Saving...").attr({disabled: true});

                this.category.color = this.category.color.toLowerCase();
                this.category.name = this.category.name.toUpperCase();

                const data = {
                    name: this.category.name,
                    color: this.category.color
                }

                axios.post('/categorytasks', data).then( () => {
                    this.get();
                    $("#btn_add").html("Add").attr({disabled: false}) 
                });

                this.closeModal("addCategory");
                this.resetFields();
            },
            destroy(id){
                const data = {
                    id: id
                }

                axios.delete('categorytask/destroy', data).then(res => {
                    console.log(res);
                })
            }
        }
    }
</script>