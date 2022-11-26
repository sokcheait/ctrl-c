<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import { ref, watch, defineProps } from 'vue';


const props = defineProps({
    menus: Object,
    newspapers: Object,
});

const propNewspaper = ref(props.newspapers.data)
const checkmenu = ref('all');
const filterNewspaper = (name) =>{
    if(name==="all"){
        propNewspaper.value = props.newspapers.data;
        checkmenu.value=name;
    }else{
        propNewspaper.value = props.newspapers.data.filter(newspaper =>{
            console.log(newspaper);
            return newspaper.name===name;
        });
        checkmenu.value=name;
    }
}


</script>

<template>
    <div class="w-full bg-gray-300 px-2 py-2">
        <div class="container mx-auto px-2 py-2">
            <div class="grid grid-cols-3 gap-4">
                <div class="text-white font-mono font-bold text-5xl uppercase">
                    <span>Ctrl-C</span>
                </div>
                <div class="w-full relative">
                    <span class="absolute top-3 right-2 z-10 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </span>
                    <input type="text" name="search" 
                            class="flex w-full border-inherit rounded-md py-2 font-mono focus:border-none"
                            placeholder="Search..."
                    >
                </div>
                <div class="justify-self-end">
                    <Link :href="route('login')" class="text-md text-gray-700 dark:text-gray-500 underline px-4">Log in</Link>
                    <Link :href="route('register')" class="ml-4 text-md text-gray-700 dark:text-gray-500 underline">Register</Link>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full">
        <div class="px-3 md:lg:xl:px-40   border-t border-b py-20 bg-opacity-10">
                <div class="grid grid-cols-1 md:lg:xl:grid-cols-2 group bg-white shadow-xl shadow-neutral-100 border ">
                        <div
                            class="p-2 flex flex-col items-center text-center group md:lg:xl:border-r md:lg:xl:border-b hover:bg-slate-50 cursor-pointer">
                                <img src="https://www.veravalonline.com/wp-content/uploads/2022/09/social-media-marketing-strategy-1.png" alt="">
                            <p class="text-xl font-medium text-slate-700 mt-3">Account Social Media</p>
                            <Link :href="route('/account/login')" target='_blank'>
                                <p class="mt-2 text-sm text-white bg-blue-500 px-2 py-2 rounded-lg">
                                    Account sign up && sign in
                                </p>
                            </Link>
                        </div>

                    <div
                        class="flex flex-col items-center text-center group md:lg:xl:border-r md:lg:xl:border-b hover:bg-slate-50 cursor-pointer">
                        <img src="https://www.nazwa.pl/blog/wp-content/uploads/2019/09/W-social-media-postaw-na-autentyczno%C5%9B%C4%87-768x512.png" alt="">
                    </div>

                </div>
        </div>
    </div>
    <div class="w-full bg-slate-500 h-[550px] mt-10">
        <section class="bg-white dark:bg-gray-900">
            <div class="container px-6 py-10 mx-auto">
                <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Contact of Social Media</h1>
                <nav id="header" class="w-full z-30 top-6 py-1 bg-white shadow-lg border-b border-rose-400 mt-16">
                    <div class="w-full flex items-center justify-between mt-0 px-6 py-2">
                        <label for="menu-toggle" class="cursor-pointer md:hidden block">
                            <svg class="fill-current text-rose-600" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                            <title>menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                            </svg>
                        </label>
                        <input class="hidden" type="checkbox" id="menu-toggle">
                        <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
                            <nav>
                            <ul class="md:flex items-center justify-between text-base text-black pt-4 md:pt-0">
                                <li>
                                    <span @click="filterNewspaper('all')"
                                        class="inline-block no-underline
                                                hover:text-rose-500 font-medium text-lg py-2 px-4 lg:-ml-2 cursor-pointer"
                                        :class="[checkmenu=='all'?'text-rose-500':'',]"  
                                    >
                                        All
                                    </span>    
                                </li>
                                <li
                                    v-for="menu in menus" :key="menu.id">
                                    <span @click="filterNewspaper(menu.name)"
                                        class="inline-block no-underline
                                            hover:text-rose-500 font-medium text-lg py-2 px-4 lg:-ml-2 cursor-pointer"
                                        :class="[checkmenu==menu.name?'text-rose-500':'',]"  >
                                        {{ menu.name }}
                                    </span>                
                                </li>
                            </ul>
                            </nav>
                        </div>
                    </div>
                </nav>
                <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                    <div v-for="newspaper in propNewspaper" :key="newspaper.id"
                        class="lg:flex">
                        <img class="object-cover w-full h-56 rounded-lg lg:w-64" 
                            :src="newspaper.image" alt="">

                        <div class="flex flex-col justify-between py-6 lg:mx-6">
                            <Link href="#" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                                {{ newspaper.title }}
                            </Link>
                            <span class="text-md text-gray-100 bg-rose-300 py-2 pl-2 rounded dark:text-gray-300 font-bold">
                                {{ newspaper.name }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>