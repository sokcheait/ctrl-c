<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head,Link } from '@inertiajs/inertia-vue3';
import { ref, watch, defineProps } from 'vue';

const props = defineProps({
    newspapers: Object,
    menus: Object,
    advertisings: Object,
});

</script>

<template>
    <div v-if="props.newspapers">
        <nav v-for="(value,key) in newspapers.meta.links" :key="key"
            class="isolate inline-flex -space-x-px rounded-md shadow-sm">
            <Link :href="value.url" v-html="value.label"
            :class="{'border-indigo-500 bg-indigo-50 text-sm font-medium text-indigo-600':value.active}"
            class="relative items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex"
            />
        </nav>
    </div>
    <div v-if="props.menus">
        <nav v-for="(value,key) in menus.meta.links" :key="key"
            class="isolate inline-flex -space-x-px rounded-md shadow-sm">
            <Link :href="value.url" v-html="value.label"
            :class="{'border-indigo-500 bg-indigo-50 text-sm font-medium text-indigo-600':value.active}"
            class="relative items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex"
            />
        </nav>
    </div>
    <div v-if="props.advertisings">
        <nav v-for="(value,key) in advertisings.meta.links" :key="key"
            class="isolate inline-flex -space-x-px rounded-md shadow-sm">
            <Link :href="value.url" v-html="value.label"
            :class="{'border-indigo-500 bg-indigo-50 text-sm font-medium text-indigo-600':value.active}"
            class="relative items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex"
            />
        </nav>
    </div>
</template>
