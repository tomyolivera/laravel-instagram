<template>
    <div>
        <div class="modal fade" id="addTask">
            <div class="modal-dialog">
                <div class="modal-content modal_add">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form @submit.prevent="add()">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <span v-if="categories.length <= 0" class="text-red-500">You do not have any category! Create one</span>
                                <select name="category_id" class="input" required autocomplete="off" v-model="task.category_id" :disabled="categories.length <= 0">
                                    <option class="bg-gray-800" v-for="(category, id) in categories" :key="id" :value="category.id" :class="'text-' + category.color + '-500'">
                                        {{ category.name }}
                                    </option>
                                </select>
                                <span class="my-2 text-red-500" id="category_msg"></span>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="input" style="min-height:180px;max-height:180px;" v-model="task.description" autocomplete="off" :minlength="MIN" :maxlength="MAX_DESC" required :disabled="categories.length <= 0"></textarea>
                                <span class="my-2 text-red-500" id="description_msg"></span>
                            </div>

                            <div class="form-group">
                                <label for="for">For</label>
                                <input type="date" name="for" class="input" v-model="task.for" autocomplete="off" required :disabled="categories.length <= 0">
                                <span class="my-2 text-red-500" id="for_msg"></span>
                            </div>

                            <div class="form-group">
                                <button class="btn_save_task btn btn-block mt-3" :class="areValids() ? 'btn-success' : 'btn-danger'" id="btn_add" :disabled="!areValids()">
                                    {{ areValids() ? 'Add' : 'Complete the fields!' }}
                                </button>
                                <span class="my-2 text-red-500" id="tasks_msg"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Store from '../Store';
    import Tasks from './Tasks';

    export default {
        data(){
            return{
                allTasks: Tasks.data().tasks,
                task: {category_id: '', description: '', for: ''},
                MIN: 1,
                MAX_DESC: 800,
                MAX_TASKS: 35,
            }
        },
        created(){

        },
        props: ['tasks', 'categories'],
        methods: {
            areValids(){
                return this.categories.length > 0 && this.task.category_id != "" && this.task.description != "" && this.task.for != "";
            },
            validFields(){
                let isValidDesc = this.task.description.length >= this.MIN && this.task.description.length <= this.MAX_DESC
                let isValidTasksLength = this.tasks.length <= this.MAX_TASKS;
                let isValidCategory = this.task.category_id != "";
                let isValidFor = this.task.for != "";

                isValidDesc
                    ? Store.methods.showMsg("description")
                    : Store.methods.showMsg("description", "The field description must contain " + this.MIN + "-" + this.MAX_DESC + " characters");                
                    
                isValidTasksLength
                    ? Store.methods.showMsg("tasks")
                    : Store.methods.showMsg("tasks", "Max tasks reached: " + this.MAX_TASKS);

                return isValidDesc && isValidTasksLength && isValidCategory && isValidFor;
            },
            resetFields(){
                this.task.category_id = '';
                this.task.description = '';
                this.task.for = '';
            },
            add(){
                if(!this.validFields()) return;

                Store.methods.statusBtn('save_task', 'Saving...', false);

                axios.post('/tasks', this.task).then(() => {
                    Store.methods.statusBtn('save_task', 'Add', true)
                });

                Store.methods.closeModal("addTask");
                this.resetFields();
            },
        }
    }
</script>