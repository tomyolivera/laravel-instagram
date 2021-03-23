<template>
    <div class="container text-gray-300">

        <div class="flex align-center">
            <NewTask :categories="categories" :task="task" :MIN="MIN" :MAX_DESC="MAX_DESC" :add="add" />
        </div>
        
        <div class="row mt-3">
            <div class="col col-md-3 bg-gray-800 p-3 rounded border-1 border-gray-700 mx-2 mb-3" v-for="(item, id) in tasks" :key="id">
                <Task :id="id" :item="item" :formatDate="formatDate" :destroy="destroy" />
            </div>
        </div>

    </div>
</template>

<script>

export default {
    name: 'Tasks',
    data(){
        return{
            categories: [],
            tasks: [],
            task: {category_id: '', description: ''},
            MIN: 1,
            MAX_DESC: 250,
            MAX_TASKS: 20,
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
        formatDate(date){
            const d = new Date(date);
            return d.getDate() + '/' + (d.getMonth() + 1)  + '/' + d.getFullYear();
        },
        showMsg(field, msg = ""){
            $("#" + field + "_msg").html(msg);
        },
        validFields(){
            let isValidDesc = this.task.description.length >= this.MIN && this.task.description.length <= this.MAX_DESC
            let isValidTasksLength = this.tasks.length <= this.MAX_TASKS;

            isValidDesc
                ? this.showMsg("description")
                : this.showMsg("description", "The field description must contain " + this.MIN + "-" + this.MAX_DESC + " characters");                
                
            isValidTasksLength
                ? this.showMsg("tasks")
                : this.showMsg("tasks", "Max tasks reached: " + this.MAX_TASKS);

            return isValidDesc && isValidTasksLength;
        },
        resetFields(){
            this.task.description = '';
            this.task.category_id = '';
        },
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

            this.closeModal("addTask");
            this.resetFields();
        },
        destroy(item, id){
            if(!confirm("Do you really want to delete it?")) return;

            this.tasks.splice(id, 1)
            axios.delete(`/tasks/${item.id}`);
        }
    }
}
</script>