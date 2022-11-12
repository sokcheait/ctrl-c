<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head,Link } from '@inertiajs/inertia-vue3';
import { ref, watch, defineProps } from 'vue';
import Pagination from '../../Components/Pagination.vue';

const props = defineProps({
    socialmedias: Object,
});
const search = ref("");

</script>

<template>
    <AppLayout title="Menus">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Social Media
            </h2>
        </template>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="w-full bg-gray-100 pt-10">
                        <div class="container mx-auto">
                            <div role="list" aria-label="Behind the scenes People " class="lg:flex md:flex sm:flex items-center xl:justify-between flex-wrap md:justify-around sm:justify-around lg:justify-around">
                                <div v-for="item in socialmedias" :key="item.id"
                                    role="listitem" 
                                    class="xl:w-1/3 sm:w-3/4 md:w-2/5 relative mt-16 mb-32 sm:mb-24 xl:max-w-sm lg:w-2/5">
                                    <div class="rounded overflow-hidden shadow-md bg-white">
                                        <div class="absolute -mt-20 w-full flex justify-center">
                                            <div class="h-32 w-32">
                                                <img src="icon.png" alt="Display Picture of Andres Berlin" role="img" class="rounded-full object-cover h-full w-full shadow-md" />
                                            </div>
                                        </div>
                                        <div class="px-6 mt-16">
                                            <h1 class="font-bold text-3xl text-center mb-1">{{ item.name }}</h1>
                                            <p class="text-gray-800 text-sm text-center">{{ item.email }}</p>
                                            <p class="text-center text-gray-600 text-base pt-3 font-normal">The CEO's role in raising a company's corporate IQ is to establish an atmosphere that promotes knowledge sharing and collaboration.</p>
                                            <div class="w-full flex justify-center pt-5 pb-5">
                                                <button @submit.prevent="update()" type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" v-show="editMode" @click="update(form)">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>