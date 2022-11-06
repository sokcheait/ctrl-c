<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head,Link,useForm } from '@inertiajs/inertia-vue3';
import { ref, watch, defineProps } from 'vue';
import Pagination from '../../Components/Pagination.vue';
import Notification from '@/Components/Notification.vue';

export default {
        components: {
            AppLayout,
            Notification,
        },
        props: {
                socials: Array,
                errors: Object,
            },
        data() {
            return {
                editMode: false,
                isOpen: false,
                form: {
                    name: null,
                    image: null,
                },
            }
        },
        methods: {
            openModal() {
                this.isOpen = true;
            },
            closeModal() {
                this.isOpen = false;
                this.reset();
                this.editMode=false;
            },
            reset() {
                this.form = {
                    name: null,
                    image: null,
                }
            },
            save(socials) {
                this.$inertia.post('/socials', socials)
                if(this.form.name !=null && this.form.image !=null){
                    this.closeModal();
                    this.reset();
                }
                this.editMode = false;
            },
            edit(social) {
                this.form = Object.assign({}, social);
                this.editMode = true;
                this.openModal();
            },
            update(social) {
                social._method = 'PATCH';
                this.$inertia.post('/socials/' + social.id, social)
                this.reset();
                this.closeModal();
            },
            deleteRow(social) {
                if (!confirm('Are you sure want to remove?')) return;
                social._method = 'DELETE';
                this.$inertia.post('/socials/' + social.id, social)
                this.reset();
                this.closeModal();
            },
        },
    }

</script>

<template>
        <button @click="openModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New</button>
        <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                <form> 
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                            <input type="text"
                                v-model="form.name"
                                name="name" 
                                class="shadow appearance-none border 
                                        rounded w-full py-2 px-3 
                                        text-gray-700 leading-tight 
                                        focus:outline-none focus:shadow-outline" 
                                        placeholder="Enter Name" required />

                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                            <input type="file"
                                    @input="form.image = $event.target.files[0]" 
                                    class="shadow appearance-none border rounded 
                                            w-full py-2 px-3 text-gray-700 leading-tight 
                                            focus:outline-none focus:shadow-outline" 
                                    required />
                        </div>
                </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <button @submit.prevent="store()" type="submit" 
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" v-show="!editMode" @click="save(form)">
                    Save
                    </button>
                </span>
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <button @submit.prevent="store()" type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" v-show="editMode" @click="update(form)">
                    Update
                    </button>
                </span>
                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                    
                    <button @click="closeModal()" type="submit" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Cancel
                    </button>
                </span>
                </div>
                </form>

            </div>
            </div>
        </div>
</template>