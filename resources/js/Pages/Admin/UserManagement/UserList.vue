<script setup>
    import { router, usePage } from '@inertiajs/vue3';
import { ref } from 'vue'
import { Plus } from '@element-plus/icons-vue'
import { computed } from 'vue';

const users = usePage().props.users;
const searchQuery = ref('');

const isAddUser = ref(false);
const editMode = ref(false);
const dialogVisible = ref(false);

const id = ref('');
const name = ref('');
const email = ref('');
const gender = ref(false);
const ageRange = ref(false);
const password = ref('');
const passwordConfirmation = ref('');

const openEditModal = (user, index) => {
    id.value = user.id;
    name.value = user.name;
    email.value = user.email;
    gender.value = user.gender;
    ageRange.value = user.age_range;

    editMode.value = true;
    isAddUser.value = false;
    dialogVisible.value = true;
};

const openAddModal = () => {
    isAddUser.value = true;
    dialogVisible.value = true;
    editMode.value = false;
};

const addUser = async () => {
    const formData = new FormData();
    formData.append('name', name.value);
    formData.append('email', email.value);
    formData.append('gender', gender.value);
    formData.append('age_range', ageRange.value);
    formData.append('password', password.value);
    formData.append('password_confirmation', passwordConfirmation.value);

    try {
        await router.post('users/store', formData, {
            onSuccess: page => {
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    position: 'top-end',
                    showConfirmButton: false,
                    title: page.props.flash.success
                });
                dialogVisible.value = false;
                resetFormData();
            },
        });
    } catch (err) {
        console.log(err);
    }
};

const updateUser = async () => {
    const formData = new FormData();
    formData.append('name', name.value);
    formData.append('email', email.value);
    formData.append('gender', gender.value);
    formData.append('age_range', ageRange.value);
    formData.append("_method", 'PUT');

    try {
        await router.post('users/update/' + id.value, formData, {
            onSuccess: (page) => {
                dialogVisible.value = false;
                resetFormData();
                Swal.fire({
                    toast: true,
                    icon: "success",
                    position: "top-end",
                    showConfirmButton: false,
                    title: page.props.flash.success
                });
            }
        });
    } catch (err) {
        console.log(err);
    }
};

const resetFormData = () => {
    id.value = '';
    name.value = '';
    email.value = '';
    gender.value = false;
    ageRange.value = false;
};

const deleteUser = (user, index) => {
    Swal.fire({
        title: 'Remove this User?',
        text: "This Action Can't be Undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Yes, Delete this User.'
    }).then((result) => {
        if (result.isConfirmed) {
            try {
                router.delete('users/destroy/' + user.id, {
                    onSuccess: (page) => {
                        Swal.fire({
                            toast: true,
                            icon: "success",
                            position: "top-end",
                            showConfirmButton: false,
                            title: page.props.flash.success
                        });
                    }
                });
            } catch (err) {
                console.log(err);
            }
        }
    });
};

//Search products (an attempt for me)
const searchUsers = () => {
    const url = new URL(window.location.href);
    url.searchParams.set('query', searchQuery.value);
    window.location.href = url.toString();
};

const clearSearch = () => {
    const url = new URL(window.location.href);
    url.searchParams.delete('query');
    window.location.href = url.toString();
};

const filteredUsers = computed(() => {
    if (!searchQuery.value) {
        return users.value;
    }
    const query = searchQuery.value.toLowerCase();
    return users.value.filter(user =>
        user.name.toLowerCase().includes(query) ||
        user.email.toLowerCase().includes(query)
    );
});

</script>
<template>
    <section class="p-3 sm:p-5">
        <!-- Dialog for adding or editing a user -->
        <el-dialog v-model="dialogVisible" :title="editMode ? 'User Profile' : 'Add User'" width="30%" :before-close="handleClose">
            <!-- Form start -->
            <form @submit.prevent="editMode ? updateUser() : addUser()">
                <div class="relative z-0 w-full mb-6 group">
                    <input v-model="name" type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input v-model="email" type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <select v-model="gender" name="gender" id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                    </select>
                    <label for="gender" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Gender</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <select v-model="ageRange" name="ageRange" id="ageRange" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0">Under 18</option>
                        <option value="1">18-24</option>
                        <option value="2">25-34</option>
                        <option value="3">35-44</option>
                        <option value="4">45-54</option>
                        <option value="5">55-64</option>
                        <option value="6">65+</option>
                    </select>
                    <label for="ageRange" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Age Range</label>
                </div>
                <button v-if="!editMode" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>
            </form>
            <!-- End form -->
        </el-dialog>
        <!-- User list and actions -->
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center" @submit.prevent="searchUsers">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <input type="text" id="simple-search" v-model="searchQuery" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                                <button type="submit" class="absolute inset-y-0 right-0 flex items-center px-4 font-bold text-white bg-blue-700 rounded-r-lg">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button @click="clearSearch" class="flex items-center justify-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Clear Search
                        </button>
                        <button type="button" @click="openAddModal" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Add User
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Name</th>
                                <th scope="col" class="px-4 py-3">Email</th>
                                <th scope="col" class="px-4 py-3">Gender</th>
                                <th scope="col" class="px-4 py-3">Age Range</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users" :key="user.id" class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ user.name }}</th>
                                <td class="px-4 py-3">{{ user.email }}</td>
                                <td class="px-4 py-3">{{ user.gender ? 'Female' : 'Male' }}</td>
                                <td class="px-4 py-3">{{ ['Under 18', '18-24', '25-34', '35-44', '45-54', '55-64', '65+'][user.age_range] }}</td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button :id="`${user.id}-button`" :data-dropdown-toggle="`${user.id}`" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0  0  20  20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6  10a2  2  0  11-4  0  2  2  0  014  0zM12  10a2  2  0  11-4  0  2  2  0  014  0zM16  12a2  2  0  100-4  2  2  0  000  4z" />
                                        </svg>
                                    </button>
                                    <div :id="`${user.id}`" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" :aria-labelledby="`${user.id}-button`">
                                            <li>
                                                <a href="#" @click="openEditModal(user)" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View Profile</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <a href="#" @click="deleteUser(user, index)" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</template>
