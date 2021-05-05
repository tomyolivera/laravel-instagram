<template>
    <div>
        <h3>Permissions</h3>
        
        <div class="picture data">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <!-- <th v-if="userCan('delete')">Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(permission, index) in permissions" :key="index">
                        <td>{{ firstLetterUpper(permission.name) }}</td>
                        <!-- <td v-if="userCan('delete')">
                            <button class="btn btn-danger flex"><i class="fas fa-trash"></i></button>
                        </td> -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import Store from '../../Store';

    export default {
        name: 'Permissions',
        props: ['permissions'],
        methods: {
            firstLetterUpper(string){
                return Store.methods.firstLetterUpper(string);
            },
        }
    }
</script>