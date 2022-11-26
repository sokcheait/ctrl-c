<script setup>
import { Head,Link } from '@inertiajs/inertia-vue3';
import { ref, watch, defineProps } from 'vue';

const props = defineProps({
    socialmedia: Object,
});
const toggle = ref(false);

</script>

<template>
    <div class="w-full bg-gray-50 shadow-md fixed z-10">
        <div class="container mx-auto">
            <div class="grid grid-cols-4 gap-4">
                <div>
                    <ul class="list-none m-0 p-0">
                        <li class="float-left px-2 py-3">
                            <span class="text-white text-base font-bold">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2048px-2021_Facebook_icon.svg.png" alt="" class="w-10">
                            </span>
                        </li>
                        <li class="float-left">
                            <span class="relative">
                                <span class="absolute text-gray-400 top-1 left-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </span>
                                <input type="text" name="search" id="search" placeholder="Search Facebook"
                                    class="font-serif px-10 py-2 mt-[12px] border-none focus:border-gray-300 rounded-2xl bg-gray-200"
                                >
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-span-2">
                    <ul class="list-none">
                        <li class="float-left border-b-2 border-b-indigo-500 px-8 py-[18px] cursor-pointer mr-4">
                            <span class="text-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
                                </svg>
                            </span>
                        </li>
                        <li class="float-left px-8 py-[18px] cursor-pointer mr-4">
                            <span class="text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-play-btn" viewBox="0 0 16 16">
                                    <path d="M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                </svg>
                            </span>
                        </li>
                        <li class="float-left px-8 py-[18px] cursor-pointer mr-4">
                            <span class="text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
                                    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </span>
                        </li>
                        <li class="float-left px-8 py-[18px] cursor-pointer mr-4">
                            <span class="text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                                </svg>
                            </span>
                        </li>
                        <li class="float-left px-8 py-[18px] cursor-pointer mr-4">
                            <span class="text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-grid-1x2" viewBox="0 0 16 16">
                                    <path d="M6 1H1v14h5V1zm9 0h-5v5h5V1zm0 9v5h-5v-5h5zM0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V1zm1 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1h-5z"/>
                                </svg>
                            </span>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="list-none">
                        <li class="float-left px-4 cursor-pointer">
                            <span class="float-left w-[50px] h-[50px] bg-gray-300 rounded-full text-gray-800 pt-2 pl-[10px] mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                </svg>
                            </span>
                        </li>
                        <li class="float-left px-2 cursor-pointer">
                            <span class="float-left w-[50px] h-[50px] bg-gray-300 rounded-full text-gray-800 pt-[6px] pl-[7.5px] mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </span>
                        </li>
                        <li class="float-left px-2 cursor-pointer">
                            <span class="float-left w-[50px] h-[50px] bg-gray-300 rounded-full text-gray-800 pt-[10px] pl-[11px] mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-messenger" viewBox="0 0 16 16">
                                    <path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76zm5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z"/>
                                </svg>
                            </span>
                        </li>
                        <li class="float-left px-2 cursor-pointer">
                            <span class="float-left w-[50px] h-[50px] bg-gray-300 rounded-full text-gray-800 pt-[10px] pl-[12px] mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                </svg>
                            </span>
                        </li>
                        <li class="float-left px-2 cursor-pointer">
                            <span class="float-left w-[50px] h-[50px] bg-gray-300 rounded-full text-gray-800 pt-[12px] pl-[12px] mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                </svg>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full h-full fixed top-[80px]">
        <div class="container mx-auto">
            <div class="grid grid-cols-4 gap-4">
                <div class="w-full h-screen flex flex-col">
                    <div class="h-full flex-grow-0 overflow-y-auto scrollbar-hide bg-gray-200">
                        <div class="flex flex-col">
                            <div class="h-14 my-1 flex pl-2 border-b-2 border-gray-300">
                                <div class="w-12 h-12 rounded-full bg-white bg-cover bg-center" 
                                    style="background-image: url('https://image-service.usw2.wp-prod-us.cultureamp-cdn.com/aiLVHY8BzrtyZsL-5eE9vMGy2hE=/1440x0/cultureampcom/production/c98/824/b6b/c98824b6b6504b7c3e7dbfff/blog-5-reasons-to-measure-employee-performance.png');"
                                >
                                </div>
                                <div class="text-gray-500 font-serif ml-2 mt-3 font-bold">
                                    Dara kim
                                </div>
                            </div>
                            <div class="h-12 my-1 flex">
                                <div class="w-16 h-12">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-blue-500 mt-3 ml-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 20.25h12m-7.5-3v3m3-3v3m-10.125-3h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125z" />
                                    </svg>
                                </div>
                                <div class="text-gray-500 font-serif ml-0 mt-4 font-bold">
                                    Watch
                                </div>
                            </div>
                            <div class="h-12 my-1 flex">
                                <div class="w-16 h-12">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-rose-500 mt-3 ml-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>

                                </div>
                                <div class="text-gray-500 font-serif ml-0 mt-4 font-bold">
                                    Events
                                </div>
                            </div>
                            <div class="h-12 my-1 flex">
                                <div class="w-16 h-12">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mt-3 ml-3 text-green-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                    </svg>
                                </div>
                                <div class="text-gray-500 font-serif ml-0 mt-4 font-bold">
                                    Friends
                                </div>
                            </div>
                            <div class="h-12 my-1 flex">
                                <div class="w-16 h-12">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-pink-500 mt-3 ml-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="text-gray-500 font-serif ml-0 mt-4 font-bold">
                                    Memories 
                                </div>
                            </div>
                            <div class="h-12 my-1 flex cursor-pointer" @click="toggle = !toggle">
                                <div class="w-8 h-8 bg-gray-400 rounded-full ml-3 mt-3" v-if="!toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-200 ml-1 mt-1 font-bold">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                </div>
                                <div class="w-8 h-8 bg-gray-400 rounded-full ml-3 mt-3" v-else>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-200 ml-1 mt-1 font-bold">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </div>
                                <div class="text-gray-500 font-serif ml-4 mt-4 font-bold">
                                    See More 
                                </div>
                            </div>
                            <Transition>
                                <div  class="bg-rose-100 border-t-2 border-t-gray-300 h-screen" v-show='toggle'>
                                    <div class="py-2">
                                        <p class="text-gray-400 ml-2">shortcuts</p>
                                    </div>
                                    <div class="h-12 flex px-2 my-2">
                                        <div class="w-12 h-12 rounded-md bg-white bg-cover bg-center" 
                                        style="background-image: url('https://image-service.usw2.wp-prod-us.cultureamp-cdn.com/aiLVHY8BzrtyZsL-5eE9vMGy2hE=/1440x0/cultureampcom/production/c98/824/b6b/c98824b6b6504b7c3e7dbfff/blog-5-reasons-to-measure-employee-performance.png');"
                                        >
                                        </div>
                                        <div class="text-gray-500 font-serif ml-3 mt-4 font-bold">
                                            Trips
                                        </div>
                                    </div>
                                    <div class="h-12 flex px-2 my-2">
                                        <div class="w-12 h-12 rounded-md bg-white bg-cover bg-center" 
                                        style="background-image: url('https://www.incimages.com/uploaded_files/image/1920x1080/getty_690028746_284206.jpg');"
                                        >
                                        </div>
                                        <div class="text-gray-500 font-serif ml-3 mt-4 font-bold">
                                            Talk Group
                                        </div>
                                    </div>
                                    <div class="h-12 flex px-2 my-2">
                                        <div class="w-12 h-12 rounded-md bg-white bg-cover bg-center" 
                                        style="background-image: url('https://iveybusinessjournal.com/wp-content/uploads/2006/03/iStock_000012204568_Large.jpg');"
                                        >
                                        </div>
                                        <div class="text-gray-500 font-serif ml-3 mt-4 font-bold">
                                            Sport
                                        </div>
                                    </div>
                                    <div class="h-12 flex px-2 my-2">
                                        <div class="w-12 h-12 rounded-md bg-white bg-cover bg-center" 
                                        style="background-image: url('https://strawberryseed.com.au/wp-content/uploads/2020/05/iStock-1184331589.jpg');"
                                        >
                                        </div>
                                        <div class="text-gray-500 font-serif ml-3 mt-4 font-bold">
                                            Technology
                                        </div>
                                    </div>
                                    <div class="h-12 flex px-2 my-2">
                                        <div class="w-12 h-12 rounded-md bg-white bg-cover bg-center" 
                                        style="background-image: url('https://elearningindustry.com/wp-content/uploads/2019/03/employee-or-employer-who-is-responsible-for-improving-employee-performance-and-how.jpeg');"
                                        >
                                        </div>
                                        <div class="text-gray-500 font-serif ml-3 mt-4 font-bold">
                                            Developer
                                        </div>
                                    </div>
                                    <div class="h-12 flex px-2 my-2">
                                        <div class="w-12 h-12 rounded-md bg-white bg-cover bg-center" 
                                        style="background-image: url('https://cdn.autonomous.ai/static/upload/images/common/upload/20210724/What-Tools-Business-Need-for-Hybrid-Office_2c87f152548.jpg');"
                                        >
                                        </div>
                                        <div class="text-gray-500 font-serif ml-3 mt-4 font-bold">
                                            Programming
                                        </div>
                                    </div>
                                </div>
                            </Transition>
                        </div>
                    </div>
                </div>

                <div class="col-span-2 h-screen bg-black flex flex-col">
                    <div class="bg-white h-full flex-grow-0 overflow-y-auto scrollbar-hide">
                        <div class="flex flex-col">
                            <div class="my-2">
                                <div class="col-span-2">
                                    <div class="w-full h-[160px] bg-slate-100">
                                        <div class="w-full h-full flex overflow-x-auto space-x-3 scrollbar-hide">
                                            <section class="flex-shrink-0 w-[100px] rounded relative bg-gray-200 shadow-md">
                                                <div class="bg-cover bg-center h-3/5" style="background-image: url('https://www.dlojavirtual.com/wp-content/uploads/2019/12/businesswoman-in-cafe-1-scaled.jpg')"></div>
                                                <div class="absolute w-[35px] h-[35px] rounded-full bg-white left-1/2 -translate-x-1/2 top-1/2">
                                                    <div class="absolute left-[5px] top-[5px] w-[25px] h-[25px] rounded-full bg-blue-500 text-center font-bold text-white">
                                                        +
                                                    </div>
                                                </div>
                                                <span class="float-left text-lg text-center mt-3">create a story</span>
                                            </section>
                                            <section class="flex-shrink-0 w-[100px] rounded relative bg-white shadow-md">
                                                <div class="bg-cover bg-center h-full rounded-sm opacity-90" style="background-image: url('https://business.dtac.co.th/hubfs/dtacbusiness_Blog_Feb22_%231%20below.jpg')"></div>
                                                <div class="absolute w-[40px] h-[40px] rounded-full bg-blue-500 left-[10px] top-[8px]">
                                                    <div class="bg-cover bg-center w-[30px] h-[30px] ml-[5px] mt-[5px] rounded-full" style="background-image: url('https://images.herzindagi.info/image/2022/Sep/business-idea-for-home.jpg')"></div>
                                                </div>
                                                <div class="absolute bottom-0 left-1 text-white font-serif z-10">
                                                    Visal
                                                </div>
                                            </section>
                                            <section class="flex-shrink-0 w-[100px] rounded relative bg-white shadow-md">
                                                <div class="bg-cover bg-center h-full rounded-sm opacity-90" style="background-image: url('https://www.forbes.com/advisor/wp-content/uploads/2022/06/business_adminstration.jpeg-900x510.jpg')"></div>
                                                <div class="absolute w-[40px] h-[40px] rounded-full bg-blue-500 left-[10px] top-[8px]">
                                                    <div class="bg-cover bg-center w-[30px] h-[30px] ml-[5px] mt-[5px] rounded-full" style="background-image: url('https://www.uagc.edu/sites/default/files/styles/paid_hero_header_899x600/public/2021-09/business-administration-ba-1-1235804195.jpg?h=36c22dd1&itok=8-DCGRkG')"></div>
                                                </div>
                                                <div class="absolute bottom-0 left-1 text-white font-serif z-10">
                                                    Chantha
                                                </div>
                                            </section>
                                            <section class="flex-shrink-0 w-[100px] rounded relative bg-white shadow-md">
                                                <div class="bg-cover bg-center h-full rounded-sm opacity-90" style="background-image: url('https://www.exploreinsiders.com/wp-content/uploads/2022/05/business-management-vs-business-administration.jpg')"></div>
                                                <div class="absolute w-[40px] h-[40px] rounded-full bg-blue-500 left-[10px] top-[8px]">
                                                    <div class="bg-cover bg-center w-[30px] h-[30px] ml-[5px] mt-[5px] rounded-full" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6m7wyJqfBVdV2l9FIgenszGTqVfwadhxOzl2_Wu9FVuYIn-8vIT7aFOV9C2o73rwdC70&usqp=CAU')"></div>
                                                </div>
                                                <div class="absolute bottom-0 left-1 text-white font-serif z-10">
                                                    Sovann
                                                </div>
                                            </section>
                                            <section class="flex-shrink-0 w-[100px] rounded relative bg-white shadow-md">
                                                <div class="bg-cover bg-center h-full rounded-sm opacity-90" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQb4NuXXYiZ14PXgHibTVJLl4CLYYHrTGO6r5Uh41LJnLNAmGH72J4cUmbRbs1V4t1yEos&usqp=CAU')"></div>
                                                <div class="absolute w-[40px] h-[40px] rounded-full bg-blue-500 left-[10px] top-[8px]">
                                                    <div class="bg-cover bg-center w-[30px] h-[30px] ml-[5px] mt-[5px] rounded-full" style="background-image: url('https://a9p9n2x2.stackpathcdn.com/wp-content/blogs.dir/1/files/2019/06/iStock-518185032-e1560181491785.jpg')"></div>
                                                </div>
                                                <div class="absolute bottom-0 left-1 text-white font-serif z-10">
                                                    Daven
                                                </div>
                                            </section>
                                            <section class="flex-shrink-0 w-[100px] rounded relative bg-white shadow-md">
                                                <div class="bg-cover bg-center h-full rounded-sm opacity-90" style="background-image: url('https://terverbendega.com/wp-content/uploads/2020/10/managing-up-the-beginners-guide-to-managing-your-manager.jpg')"></div>
                                                <div class="absolute w-[40px] h-[40px] rounded-full bg-blue-500 left-[10px] top-[8px]">
                                                    <div class="bg-cover bg-center w-[30px] h-[30px] ml-[5px] mt-[5px] rounded-full" style="background-image: url('https://ichef.bbci.co.uk/news/976/cpsprodpb/108BF/production/_104957776_workers_getty.jpg')"></div>
                                                </div>
                                                <div class="absolute bottom-0 left-1 text-white font-serif z-10">
                                                    Daline
                                                </div>
                                            </section>
                                            <section class="flex-shrink-0 w-[100px] rounded relative bg-white shadow-md">
                                                <div class="bg-cover bg-center h-full rounded-sm opacity-90" style="background-image: url('https://imageio.forbes.com/specials-images/imageserve/5f6cecbae6b05187088c9e9f/Two-diverse-businesspeople-chatting-sitting-behind-laptop-in-office/960x0.jpg?format=jpg&width=960')"></div>
                                                <div class="absolute w-[40px] h-[40px] rounded-full bg-blue-500 left-[10px] top-[8px]">
                                                    <div class="bg-cover bg-center w-[30px] h-[30px] ml-[5px] mt-[5px] rounded-full" style="background-image: url('https://media.northwesternmutual.com/images/957-man-and-woman-at-table-manager-holding-you-back-641199918.jpg')"></div>
                                                </div>
                                                <div class="absolute bottom-0 left-1 text-white font-serif z-10">
                                                    Srey Roth
                                                </div>
                                            </section>
                                            <section class="flex-shrink-0 w-[100px] rounded relative bg-white shadow-md">
                                                <div class="bg-cover bg-center h-full rounded-sm opacity-90" style="background-image: url('https://static.toiimg.com/photo/81511008.cms')"></div>
                                                <div class="absolute w-[40px] h-[40px] rounded-full bg-blue-500 left-[10px] top-[8px]">
                                                    <div class="bg-cover bg-center w-[30px] h-[30px] ml-[5px] mt-[5px] rounded-full" style="background-image: url('https://s3.amazonaws.com/media.greatplacetowork.com/images/photos/1044709.jpg')"></div>
                                                </div>
                                                <div class="absolute bottom-0 left-1 text-white font-serif z-10">
                                                    Daven
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-2">
                                <div class="w-full h-[150px] p-4 bg-gray-100 shadow-lg shadow-slate-50 rounded-md">
                                    <div class="w-full h-full">
                                        <div class="h-1/2 flex">
                                            <div class="w-[60px] h-full rounded-full shadow-md bg-cover bg-center"
                                            style="background-image: url('https://image-service.usw2.wp-prod-us.cultureamp-cdn.com/aiLVHY8BzrtyZsL-5eE9vMGy2hE=/1440x0/cultureampcom/production/c98/824/b6b/c98824b6b6504b7c3e7dbfff/blog-5-reasons-to-measure-employee-performance.png');"
                                            >
                                            </div>
                                            <div class="">
                                                <input type="text" name="txt-search" id="txt-search"
                                                    class="px-6 py-2 rounded-2xl bg-gray-200 focus:border-gray-300 mx-4 my-2 w-[620px]"
                                                    placeholder="What`s on your dara kim"
                                                >
                                            </div>
                                        </div>
                                        <div class="border-t-2 border-t-gray-300 mt-4">
                                            <ul class="list-none">
                                                <li class="float-left my-4 w-[220px]">
                                                    <div class="w-full">
                                                        <div class="flex justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-rose-500">
                                                                <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                                            </svg>
                                                            <span class="ml-2">Live</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="float-left my-4 w-[220px]">
                                                    <div class="w-full">
                                                        <div class="flex justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-400">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                            </svg>
                                                            <span class="ml-2">Photo/video</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="float-left my-4 w-[220px]">
                                                    <div class="w-full">
                                                        <div class="flex justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-300">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                                                            </svg>
                                                            <span class="ml-2">Feeling/Activity</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-16 bg-black my-2"></div>
                            <div class="h-16 bg-black my-2"></div>
                            <div class="h-16 bg-black my-2"></div>
                            <div class="h-16 bg-black my-2"></div>
                            <div class="h-16 bg-black my-2"></div>
                            <div class="h-16 bg-black my-2"></div>
                            <div class="h-16 bg-black my-2"></div>
                            <div class="h-16 bg-black my-2"></div>
                            <div class="h-16 bg-black my-2"></div>
                            <div class="h-16 bg-black my-2"></div>
                            <div class="h-16 bg-black my-2"></div>
                            <div class="h-16 bg-black my-2"></div>
                            <div class="h-16 bg-black my-2"></div>
                            <div class="h-16 bg-black my-2"></div>
                        </div>
                    </div>
                </div>

                <div class="">
                    Messsage
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>