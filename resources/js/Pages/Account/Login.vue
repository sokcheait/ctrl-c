<script setup>
import { Head,Link,useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    email: '',
    password: '',
});
function accountlogin() {
    form.post(route('/social_media/login'))
}

</script>

<template>
    <section class="h-screen">
        <div class="container px-6 py-12 h-full">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-0">
                <img
                src="https://www.bharatgeneric.com/login/svg/admin-img.svg"
                class="w-full"
                alt="Phone image"
                />
            </div>
            <div class="md:w-8/12 lg:w-5/12 lg:ml-20 relative">
                <span class="text-gray-400 font-bold text-6xl absolute -top-40"> Login</span>
                <form @submit.prevent="accountlogin">
                    <div class="mb-6">
                    <input
                    type="email"
                    name="email"
                    v-model="form.email"
                    class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Email address"
                    required=""
                    />
                </div>

                <div class="mb-6">
                    <input
                    type="password"
                    name="password"
                    v-model="form.password"
                    class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Password"
                    required=""
                    />
                </div>

                <div class="flex justify-between items-center mb-6">
                    <Link
                    :href="route('/account/resigter')"
                    class="text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 duration-200 transition ease-in-out"
                    >Forget to Resigter</Link
                    >
                </div>

                <button
                    type="submit"
                    class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
                    data-mdb-ripple="true"
                    data-mdb-ripple-color="light"
                >
                    Login
                </button>
                </form>
            </div>
            </div>
        </div>
    </section>
</template>