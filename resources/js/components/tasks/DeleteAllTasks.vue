<template>
    <button type="button" class="btn btn-danger ml-2" v-if="tasks.length > 0">Delete all</button>
</template>

<script>
    export default {
        props: ['tasks']
    }
</script>