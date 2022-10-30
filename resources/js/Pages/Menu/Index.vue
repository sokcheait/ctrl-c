<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';

defineProps({
    menus: Object,
})

</script>

<template>
    <AppLayout title="Menus">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Menus
            </h2>
            <div class="flex justify-end">
                <Link :href="route('menus.create')" class="py-2 px-2 bg-blue-500 text-white rounded">Add New</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-center">Status</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr v-for="menu in menus.data" :key="menu.id"
                            class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-10 h-10 rounded-full" :src="menu.image"/>
                                        </div>
                                        <span class="font-medium">{{ menu.name }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span v-if="menu.status==true"
                                        class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{ menu.status }}</span>
                                    <span v-else
                                        class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">{{ menu.status }}</span>    
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <Link :href="route('menus.edit',menu.id)">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                        </Link>
                                        <Link :href="route('menus.destroy',menu.id)" method="delete" as="button" type="button">
                                            <div class="w-4 mr-2 transform hover:text-red-600 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                        </Link>
                                    </div>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>