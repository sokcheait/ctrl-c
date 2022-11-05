<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Head,Link } from '@inertiajs/inertia-vue3';
import { ref, watch, defineProps } from 'vue';

const props = defineProps({
    newspapers: Object,
});

const search = ref("");

</script>
<template>
    <input type="text"
            name="search" id="search" 
            class="px-2 py-1 border-gray-400 font-serif rounded-lg focus:border-gray-400 focus:ring-0" placeholder="Search...">
</template>
