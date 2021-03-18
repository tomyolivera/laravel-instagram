<template>
    <div class="container text-gray-300">

        <div class="mb-3">
            <CategoryTask />
        </div>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTask">Add task</button>

        <div class="modal fade" id="addTask">
            <div class="modal-dialog">
                <div class="modal-content bg-gray-800">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form @submit.prevent="add()">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="input" required autocomplete="off" v-model="task.category_id">
                                    <option v-for="(category, id) in categories" :key="id" :value="category.id">
                                        {{ category.name }}
                                    </option>
                                </select>
                                <span class="my-2 text-red-500" id="category_msg"></span>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="input" v-model="task.description" autocomplete="off" :minlength="MIN" :maxlength="MAX_DESC" required>
                                <span class="my-2 text-red-500" id="description_msg"></span>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block mt-3" id="btn_add">Add</button>
                                <span class="my-2 text-red-500" id="tasks_msg"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-3 flex justify-center">
            <div class="col col-md-3 bg-gray-800 p-3 rounded border-1 border-gray-700 mx-2 mb-3" v-for="(item, id) in tasks" :key="id">
                <div>
                    <span class="badge badge-primary float-right mx-2">{{ formatDate(item.updated_at )}}</span>

                    <h4 class="h4" :class="'text-' + categories[0].color + '-500'">{{ categories[0].name }}</h4>

                    <p>{{item.description}}</p>

                    <p class="mt-3">
                        <button class="btn btn-outline-warning"><i class="material-icons">edit</i></button>
                        <button class="btn btn-danger" @click="destroy(item, id)"><i class="material-icons">delete</i></button>
                    </p>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

import formatDate from "Store";
import showMsg from "Store";

export default {
    name: 'Tasks',
    data(){
        return{
            categories: [],
            tasks: [],
            task: {category_id: '', description: ''},
            MIN: 1,
            MAX_NAME: 50,
            MAX_DESC: 250,
            MAX_TASKS: 20,
        }
    },
    created(){
        this.get();
    },
    methods: {
        // formatDate(date){
        //     const d = new Date(date);
        //     return d.getDate() + '/' + (d.getMonth() + 1)  + '/' + d.getFullYear();
        // },
        // showMsg(field, msg = ""){
        //     $("#" + field + "_msg").html(msg);
        // },
        validFields(){
            // let isValidName = this.task.name.length >= this.MIN && this.task.name.length <= this.MAX_NAME;
            let isValidDesc = this.task.description.length >= this.MIN && this.task.description.length <= this.MAX_DESC;
            // let isValidCategory = this.task.category >= this.MIN;
            let isValidTasksLength = this.tasks.length <= this.MAX_TASKS;

            // isValidName
            //     ? this.showMsg("name")
            //     : this.showMsg("name", "The field name must contain " + this.MIN + "-" + this.MAX_NAME + " characters");

            isValidDesc
                ? showMsg("description")
                : showMsg("description", "The field description must contain " + this.MIN + "-" + this.MAX_DESC + " characters");                

            // isValidCategory
            //     ? this.showMsg("category")
            //     : this.showMsg("category", "The field category must contain " + this.MIN + " character");
                
            isValidTasksLength
                ? showMsg("tasks")
                : showMsg("tasks", "Max tasks reached: " + this.MAX_TASKS);

            return isValidDesc && isValidTasksLength;
        },
        resetFields(){
            // this.task.name = '';
            this.task.description = '';
            this.task.category_id = '';
        },
        get(){
            axios.get("/tasks").then( res => {
                console.log(res.data);

                this.tasks = res.data['tasks'];
                this.categories = res.data['categories'];

                console.log(this.tasks[0].category_id);
                console.log(this.categories[0].id);
            });
        },
        add(){
            if(!this.validFields()) return;

            $("#btn_add").html("Saving...").attr({disabled: true});

            const data = {
                description: this.task.description,
                category_id: this.task.category_id,
            }

            axios.post('/tasks', data).then( () => {
                this.get();
                $("#btn_add").html("Add").attr({disabled: false});
            });

            this.resetFields();
        },
        destroy(item, id){
            this.tasks.splice(id, 1)
            axios.delete(`/tasks/${item.id}`);
        }
    }
}
</script>