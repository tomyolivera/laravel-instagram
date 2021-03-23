<template>
    <div>
        <NewCategory />

        <div class="row mt-3">
            <div class="col col-md-3 bg-gray-800 p-3 rounded border-1 border-gray-700 mx-2 mb-3" v-for="(category, id) in categories" :key="id">
                <p class="h6 p-2 rounded text-black" :class="'bg-' + category.color + '-500'">{{ category.name }}</p>

                <p class="mt-3">
                    <button class="btn btn-outline-warning"><i class="material-icons">edit</i></button>
                    <button class="btn btn-danger" @click="destroy(category, id)"><i class="material-icons">delete</i></button>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            categories: []
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
                this.categories = res.data['categories'];
            });
        },
        destroy(category, id){
            if(!confirm("Do you really want to delete it?")) return;

            this.categories.splice(id, 1)
            axios.delete(`/categorytasks/${category.id}`);
        }
    }
}
</script>

<style>

</style>