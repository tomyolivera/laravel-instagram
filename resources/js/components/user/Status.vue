<template>
    <div>
        <div v-if="status == 0" class="flex align-center text-gray-500">
            <i class="fas fa-circle"></i>
            <span class="ml-2">Offline</span>
        </div>

        <div v-if="status == 1" class="flex align-center text-green-500">
            <i class="fas fa-circle"></i>
            <span class="ml-2">Online</span>
        </div>

        <div v-if="status == 2" class="flex align-center text-orange-500">
            <i class="fas fa-circle"></i>
            <span class="ml-2">Busy</span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['status']
    }
</script>