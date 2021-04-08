<template>
    <div>
        <p class="text-black text-center h3">Categories</p>
        <NewCategory />

        <div class="row mt-3 flex align-center justify-center">
            <div class="col col-md-4 bg-gray-300 p-3 rounded mx-2 mb-3 shadow-md" v-for="(category, id) in categories" :key="id">
                <p class="h6 p-2 rounded text-black bg-gradient-to-r text-center" 
                :class="'from-' + category.color + '-400 to-'  + category.color + '-600' " >
                    {{ category.name }}
                </p>

                <p class="mt-3 flex justify-center align-center">
                    <button class="btn btn-warning flex align-center"><i class="material-icons">edit</i></button>
                    <button class="btn btn-danger flex align-center mx-2" @click="destroy(category, id)"><i class="material-icons">delete</i></button>
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