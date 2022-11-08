<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head,Link, useForm } from '@inertiajs/inertia-vue3';
import { ref, watch, defineProps } from 'vue';
import Pagination from '../../Components/Pagination.vue';

const props = defineProps({
    settings: Object,
});

const form = useForm({
    id: '',
    address: '',
    about: '',
    phone_number: '',
    image: null,
});

const isOpen = ref(false);
const editMode = ref(false);

const reset = () =>{
    useForm({
        id: form.id='',
        address: form.address='',
        about: form.about='',
        phone_number: form.phone_number='',
        image: form.image='',
    });
};

const openModal = () =>{
    isOpen.value = true;

};
const closeModal = () =>{
    isOpen.value = false;
    reset();
    editMode.value = false;
};

const save = () =>{
    form.post(route('settings.store'));
    if(form.address !='' && form.about !='' && form.phone_number !='' && form.image !=null){
        closeModal();
        reset();
    }
    editMode.value = false;
};
const edit = (data) =>{
    form.id = data.id;
    form.address = data.address;
    form.about = data.about;
    form.phone_number= data.phone_number;
    form.image = data.image;
    isOpen.value = true;
    editMode.value = true;
};

const update = (data) =>{
    if(data.id){
        let url = '/settings/'+data.id;
        data._method = 'PATCH';
        Inertia.post(url, data);
    }
    if(data.address !='' && data.about !='' && data.phone_number !=''){
        closeModal();
        reset();
    }

};
const deleteRow = (data) =>{
    if (!confirm('Are you sure want to remove?')) return;
    data._method = 'DELETE';
    let url = '/settings/'+data.id;
    Inertia.post(url, data);
    reset();
}
</script>

<template>
    <AppLayout title="Menus">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Setting
            </h2>
            <div class="flex justify-end">
                <div @click="openModal()"
                    class="py-2 px-2 bg-blue-500 text-white rounded cursor-pointer"
                >
                Add New
                </div>
            </div>
        </template>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2">Address</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in settings" :key="row.id">
                                <td class="border px-4 py-2">{{ row.id }}</td>
                                <td class="border px-4 py-2">{{ row.address }}</td>
                                <td class="border px-4 py-2">
                                    <button @click="edit(row)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                    <button @click="deleteRow(row)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">
                      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        
                        <div class="fixed inset-0 transition-opacity">
                          <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                          <form>
                          <div class="bg-gray-200 text-gray-400 text-xl px-2 py-2">
                            <span v-if="editMode">Form Edit</span>
                            <span v-else>Form Create</span>
                          </div>
                          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="">
                                <div class="mb-4">
                                    <!-- <input type="text" v-model="form.id"> -->
                                    <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address:</label>
                                    <input type="text"
                                        v-model="form.address"
                                        name="address" 
                                        class="shadow appearance-none border 
                                                rounded w-full py-2 px-3 
                                                text-gray-700 leading-tight 
                                                focus:outline-none focus:shadow-outline" 
                                                placeholder="Enter Address" required />
                                </div>
                                <div class="mb-4">
                                    <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">PhoneNumber:</label>
                                    <input type="text"
                                        v-model="form.phone_number"
                                        name="phone_number" 
                                        class="shadow appearance-none border 
                                                rounded w-full py-2 px-3 
                                                text-gray-700 leading-tight 
                                                focus:outline-none focus:shadow-outline" 
                                                placeholder="Enter PhoneNumber" required />
                                </div>
                                <div class="mb-4">
                                    <label for="about" class="block text-gray-700 text-sm font-bold mb-2">About:</label>
                                    <textarea name="about" id="about" cols="30" rows="10"
                                        class="shadow appearance-none border 
                                                    rounded w-full py-2 px-3 
                                                    text-gray-700 leading-tight 
                                                    focus:outline-none focus:shadow-outline"
                                        v-model="form.about" required>

                                    </textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                                    <input type="file"
                                            @input="form.image = $event.target.files[0]" 
                                            class="shadow appearance-none border rounded 
                                                    w-full py-2 px-3 text-gray-700 leading-tight 
                                                    focus:outline-none focus:shadow-outline" 
                                            required        
                                    />
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
                              <button @submit.prevent="update()" type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" v-show="editMode" @click="update(form)">
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
                </div>
            </div>
        </div>
    </AppLayout>
</template>