<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head,Link } from '@inertiajs/inertia-vue3';
import { ref, watch, defineProps } from 'vue';
import Pagination from '../../Components/Pagination.vue';

const props = defineProps({
    settings: Object,
});
const search = ref("");

</script>

<template>
    <AppLayout title="Menus">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Setting
            </h2>
            <div class="flex justify-end">
                <Link :href="route('settings.create')" class="py-2 px-2 bg-blue-500 text-white rounded">Add New</Link>
            </div>
        </template>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    hello
                </div>
            </div>
        </div>
    </AppLayout>
</template>