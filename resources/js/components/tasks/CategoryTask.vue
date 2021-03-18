<template>
  <div>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">Add Category</button>

        <div class="modal fade" id="addCategory">
            <div class="modal-dialog">
                <div class="modal-content bg-gray-800">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form @submit.prevent="add()">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="input" v-model="categorie.name" autocomplete="off" :minlength="MIN" :maxlength="MAX_DESC" required>
                                <span class="my-2 text-red-500" id="name_msg"></span>
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
    export default {
        name: 'CategoryTask',
        data(){
            return{
                categories: [],
                categorie: {
                    name: '', 
                    color: '', 
                },

            }
        },
    }
</script>