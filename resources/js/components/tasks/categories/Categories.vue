<template>
    <div>
        <h3 class="text-center">Categories</h3>
        <NewCategory />

        <div class="row mt-3 flex align-center justify-center">
            <div class="col col-md-4 mx-2 picture task" v-for="(category, id) in categories" :key="id">
                <h6 class="text-center p-2 rounded bg-gradient-to-r" 
                :class="'from-' + category.color + '-400 to-'  + category.color + '-600' " >
                    {{ category.name }}
                </h6>

                <p class="mt-3 flex justify-center align-center">
                    <button class="btn btn-warning flex align-center"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger flex align-center mx-2" @click="destroy(category, id)"><i class="fas fa-trash"></i></button>
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
        this.getCategory();
    },
    methods: {
        getCategory(){
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