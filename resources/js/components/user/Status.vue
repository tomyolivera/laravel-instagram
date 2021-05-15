<template>
    <div>
        <div v-if="status == 0" class="flex align-center text-secondary">
            <i class="fas fa-circle"></i>
            <span>Offline</span>
        </div>

        <div v-else-if="status == 1" class="flex align-center text-success">
            <i class="fas fa-circle"></i>
            <span>Online</span>
        </div>

        <div v-else class="flex align-center text-warning">
            <i class="fas fa-circle"></i>
            <span>Busy</span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['status']
    }
</script>