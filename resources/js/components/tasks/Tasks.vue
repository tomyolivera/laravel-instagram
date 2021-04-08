<template>
    <div class="container text-gray-300">
        <p class="text-black h3">Tasks</p>

        <div class="flex align-center">
            <NewTask :tasks="tasks" :categories="categories" />
            <!-- <DeleteAllTasks :tasks="tasks" /> -->
        </div>

        <Task :tasks="tasks" />

    </div>
</template>

<script>
import Task from './Task.vue';

export default {
  components: { Task },
    name: 'Tasks',
    data(){
        return{
            categories: [],
            tasks: [],
        }
    },
    created(){
        this.get();

        setInterval(() => {
            this.get();
        }, 1000);
    },
    methods: {
        get(){
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