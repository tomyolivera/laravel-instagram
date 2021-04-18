<template>
    <div>
        <div class="row mt-3">
            <div class="col col-sm-12 col-md-2 bg-gray-300 p-3 mr-2 mb-2 rounded shadow-md" v-for="(item, id) in tasks" :key="id">
                <span class="badge text-black mb-3 p-2 bg-gradient-to-r" 
                :class="'from-' + item.category_color + '-400 to-'  + item.category_color + '-600' " >
                    {{ item.category_name }}
                </span>

                <p class="break-words h-24 overflow-auto text-black desc">{{item.description}}</p>

                <div class="my-3">
                    <p class="text-black">
                        For: <span class="text-gray-600">{{ formatDate(item.for_)}}</span>
                    </p>
                </div>

                <p class="mt-3 flex align-center">
                    <button class="btn btn-warning flex align-center"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger flex align-center mx-2" @click="destroy(item, id)"><i class="fas fa-trash"></i></button>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Task',
        props: ['tasks'],
        methods: {
            formatDate(date){
                const d = new Date(date);
                return (d.getDate() + 1) + '/' + (d.getMonth() + 1)  + '/' + d.getFullYear();
            },
            destroy(item, id){
                if(!confirm("Do you really want to delete it?")) return;

                this.tasks.splice(id, 1)
                axios.delete(`/tasks/${item.id}`);
            }
        }
    }
</script>