<template>
    <div>
        <div class="picture container">
            <div class="row">
                <div class="col col-md-5">
                    <Categories />
                </div>

                <div class="col col-md-7">
                    <h3>Tasks</h3>

                    <div class="flex align-center">
                        <NewTask :tasks="tasks" :categories="categories" />
                        <!-- <DeleteAllTasks :tasks="tasks" /> -->
                    </div>

                    <Task :tasks="tasks" />
                </div>
            </div>
        </div>

        <div class="btns">
            <div class="btn1"><i class="fas fa-plus"></i></div>
            <button type="button" class="btn2 hidden" data-bs-toggle="modal" data-bs-target="#addTask"><i class="fas fa-tasks"></i></button>
            <button type="button" class="btn3 hidden" data-bs-toggle="modal" data-bs-target="#addCategory"><i class="fas fa-wallet"></i></button>
        </div>
    </div>
</template>

<script>

import Store from '../Store';
import User from '../user/User';

export default {
    name: 'Tasks',
    data(){
        return{
            categories: [],
            tasks: [],
            user: User.data().user,
        }
    },
    created(){
        this.getTasks();
        User.methods.getUser(this.user);
    },
    methods: {
        getTasks(){
            axios.get("/tasks").then( res => {
                this.tasks = res.data['tasks'];
                this.categories = res.data['categories'];

                for (let i = 0; i < this.tasks.length; i++) {
                    for (let j = 0; j < this.categories.length; j++) {
                        if(this.tasks[i].category_id == this.categories[j].id){
                            this.tasks[i].category_name = this.categories[j].name;
                            this.tasks[i].category_color = this.categories[j].color;
                        }
                    }
                }
            });
        },
    }
}
</script>