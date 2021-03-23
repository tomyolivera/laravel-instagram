<template>
    <div>
        <span class="badge text-black mb-3 p-2" :class="'bg-' + item.category_color + '-500'" >{{ item.category_name }}</span>

        <p>{{item.description}}</p>

        <p class="text-gray-500 my-3">{{ formatDate(item.updated_at )}}</p>

        <p class="mt-3">
            <button class="btn btn-outline-warning"><i class="material-icons">edit</i></button>
            <button class="btn btn-danger" @click="destroy(item, id)"><i class="material-icons">delete</i></button>
        </p>
    </div>
</template>

<script>

export default {
    name: 'Task',
    data(){
        return{
            
        }
    },
    props: ['item', 'formatDate', 'id', 'destroy'],
}
</script>