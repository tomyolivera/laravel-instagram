<template>
    <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTask">Add Task</button>

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
                                <span v-if="categories.length <= 0" class="text-red-500">You do not have any category! Create one</span>
                                <select name="category_id" class="input" required autocomplete="off" v-model="task.category_id">
                                    <option v-for="(category, id) in categories" :key="id" :value="category.id" :class="'text-' + category.color + '-500'">
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
    </div>
</template>

<script>
    export default { props: ['categories', 'task', 'MIN', 'MAX_DESC', 'add'] }
</script>