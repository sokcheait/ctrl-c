<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head,Link,useForm } from '@inertiajs/inertia-vue3';
import { ref, watch, defineProps } from 'vue';
import Pagination from '../../Components/Pagination.vue';

const props = defineProps({
    socialmedias: Object,
});
const form = useForm({
    status: false,
});

const update = (data) =>{
    Inertia.post(`/social_media/${data.id}`, {
        _method: 'put',
        status: data.status
    });
};



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
                                <div v-for="item in socialmedias.data" :key="item.id"
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
                                                <label class="inline-flex relative items-center cursor-pointer">
                                                    <input type="checkbox" id="status" class="sr-only peer" name="status" :value="item.id" v-model="item.status" @change="update(item)">
                                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-green-700 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Off/On Account</span>
                                                    </label>
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