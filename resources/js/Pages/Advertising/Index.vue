<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head,Link } from '@inertiajs/inertia-vue3';
import { ref, watch, defineProps } from 'vue';
import Pagination from '../../Components/Pagination.vue';

const props = defineProps({
    advertisings: Object,
});
const search = ref("");

watch(search, (value)=>{
    Inertia.get('/advertisings',{ search:value },{
        preserveState: true,
        replace: true,
    });
})

</script>

<template>
    <AppLayout title="Newspapers">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Advertising
            </h2>
            <div class="flex justify-end">
                <Link :href="route('advertisings.create')" class="py-2 px-2 bg-blue-500 text-white rounded">Add New</Link>
            </div>
        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="grid grid-cols-2 gap-6">
                <div class="">Filter</div>
                <div class="flex justify-end relative">
                    <span class="absolute right-2 top-2 z-10 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </span>
                    <input type="text" v-model="search"
                        name="search" id="search" 
                        class="px-2 py-1 border-gray-400 font-serif rounded-lg focus:border-gray-400 focus:ring-0" placeholder="Search...">
                </div>
            </div>
        </div>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Ads_url</th>
                                <th class="py-3 px-6 text-left">Photo</th>
                                <th class="py-3 px-6 text-left">Location</th>
                                <th class="py-3 px-6 text-center">Status</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr v-for="advertising in advertisings.data" :key="advertising.id"
                                class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ advertising.ads_url }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-10 h-10" :src="advertising.image"/>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ advertising.location }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span v-if="advertising.status==true"
                                        class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{ advertising.status }}</span>
                                    <span v-else
                                        class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">{{ advertising.status }}</span>    
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-yellow-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <Link :href="route('advertisings.edit',advertising.id)">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                        </Link>
                                        <Link :href="route('advertisings.destroy',advertising.id)" method="delete" as="button" type="button">
                                            <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="flex justify-end">
                <Pagination :advertisings="advertisings" />
            </div>
        </div>
    </AppLayout>
</template>