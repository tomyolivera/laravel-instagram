<template>
    <div>
        <span class="badge badge-primary float-right mx-2">{{ formatDate(item.updated_at )}}</span>

        <span class="badge badge-success float-right">{{item.category_id}}</span>

        <p class="h4">{{item.name}}</p>

        <p>{{item.description}}</p>

        <p class="mt-3">
            <button class="btn btn-outline-warning"><i class="material-icons">edit</i></button>
            <button class="btn btn-danger" @click="destroy(item, index)"><i class="material-icons">delete</i></button>
        </p>
    </div>
</template>

<script>
import item from "./Tasks";

export default {
    name: 'Task',
    props: {
        item: item,
        // index: index
        // formatDate: formatDate,
    },
    methods:{
        destroy(item, index){
            this.tasks.splice(index, 1)
            axios.delete(`/tasks/${item.index}`);
        }
    }
}
</script>