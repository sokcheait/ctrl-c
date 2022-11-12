<script setup>

defineProps({
    socialmedia: Object,
})
</script>

<template>
    <div>
        <h1 v-if="socialmedia.id">Login {{ socialmedia }}successfully</h1>
    </div>
</template>