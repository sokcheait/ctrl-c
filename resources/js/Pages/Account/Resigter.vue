<script setup>
import { Head,Link,useForm } from '@inertiajs/inertia-vue3';
import Multiselect from '@suadelabs/vue3-multiselect'

const props = defineProps({
    socials: Object,
});

const form = useForm({
    social_id: [],
    name: '',
    email: '',
    password: '',
    image: null,
    status: true,
});
function accountResigter() {
    form.post(route('social_media.store'))
}

</script>

<template>
    <section class="h-screen">
        <div class="container px-6 py-12 h-full">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-0">
                <img
                src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                class="w-full"
                alt="Phone image"
                />
            </div>
            <div class="md:w-8/12 lg:w-5/12 lg:ml-20 relative">
                <span class="text-gray-400 font-bold text-6xl absolute -top-40">Resigter</span>
                <form @submit.prevent="accountResigter">
                <div class="mb-6">
                    <input
                    type="text"
                    name="name"
                    v-model="form.name"
                    class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="User Name"
                    required=""
                    />
                </div> 

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
                <div class="mb-6">
                    <!-- <select name="social_id[]" v-model="form.social_id" required=""
                            class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        <option value="">---select social---</option>
                        <option v-for="social in socials" :key="social.id" :value="social.id">
                            {{ social.name }}
                        </option>
                    </select> -->
                    <Multiselect v-model="form.social_id" name="social_id[]" :options="socials.map(type => type.name)" :multiple="true">
                    
                    </Multiselect>
                </div>

                <div class="flex justify-between items-center mb-6">
                    <Link
                    :href="route('/account/login')"
                    class="text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 duration-200 transition ease-in-out"
                    >Forget to Login</Link>
                </div>

                <button
                    type="submit"
                    class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
                    data-mdb-ripple="true"
                    data-mdb-ripple-color="light"
                >
                    Resigter
                </button>
                </form>
            </div>
            </div>
        </div>
    </section>
</template>
<style src="@suadelabs/vue3-multiselect/dist/vue3-multiselect.css"></style>