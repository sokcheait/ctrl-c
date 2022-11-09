<script setup>

defineProps({
    socials: Object,
    socialmedia: Object
})
</script>

<template>
    <div>
        <h1 v-if="socialmedia.social_id">Login {{ socialmedia.social_id }}successfully</h1>
    </div>
</template>