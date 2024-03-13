<script setup>
    import { router, usePage } from '@inertiajs/vue3';
    import { ref } from 'vue';
    import Swal from 'sweetalert2';

    const categories = usePage().props.categories;
    const searchQuery = ref('');

    const isAddCategory = ref(false);
    const editMode = ref(false);
    const dialogVisible = ref(false);

    const id = ref('');
    const name = ref('');
    const description = ref('');

    const openEditModal = (category, index) => {
        id.value = category.id;
        name.value = category.name;
        description.value = category.description;

        editMode.value = true;
        isAddCategory.value = false;
        dialogVisible.value = true;
    };

    const openAddModal = () => {
        isAddCategory.value = true;
        dialogVisible.value = true;
        editMode.value = false;
    };

    const addCategory = async () => {
        const formData = new FormData();
        formData.append('name', name.value);
        formData.append('description', description.value);

        try {
            await router.post('categories/store', formData, {
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

    const updateCategory = async () => {
        const formData = new FormData();
        formData.append('name', name.value);
        formData.append('description', description.value);
        formData.append("_method", 'PUT');

        try {
            await router.post(`categories/update/${id.value}`, formData, {
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

    const deleteCategory = (category, index) => {
        Swal.fire({
            title: 'Remove this Category?',
            text: "This Action Can't be Undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, Delete this Category.'
        }).then((result) => {
            if (result.isConfirmed) {
                try {
                    router.delete(`categories/destroy/${category.id}`, {
                        onSuccess: (page) => {
                            if (page.props.flash.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: page.props.flash.error,
                            });
                        } else {
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                position: "top-end",
                                showConfirmButton: false,
                                title: page.props.flash.success
                            });
                        }
                    }
                });
            } catch (err) {
                console.log(err);
            }
        }
    });
};

    const resetFormData = () => {
        id.value = '';
        name.value = '';
        description.value = '';
    };

    const searchCategories = () => {
        const url = new URL(window.location.href);
        url.searchParams.set('query', searchQuery.value);
        window.location.href = url.toString();
    };

    const clearSearch = () => {
        const url = new URL(window.location.href);
        url.searchParams.delete('query');
        window.location.href = url.toString();
    };

    const filteredCategories = ref(categories);

</script>

<template>
    <section class="p-3 sm:p-5">
        <!-- Dialog for adding or editing category -->
        <el-dialog v-model="dialogVisible" :title="editMode ? 'Edit Category' : 'Add Category'" width="30%" :before-close="handleClose">
            <!-- Form start -->
            <form @submit.prevent="editMode ? updateCategory() : addCategory()">
                <div class="relative z-0 w-full mb-6 group">
                    <input v-model="name" type="text" name="category_name" id="category_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="category_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Category Name</label>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
            <!-- End -->
        </el-dialog>
        <!-- End -->
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button" @click="openAddModal" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Add Category
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Category Name</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(category, index) in categories" :key="category.id" class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ category.name }}</th>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button :id="`${category.id}-button`" :data-dropdown-toggle="`${category.id}`" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div :id="`${category.id}`" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" :aria-labelledby="`${category.id}-button`">
                                            <li>
                                                <a href="#" @click="openEditModal(category, index)" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <a href="#" @click="deleteCategory(category, index)" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
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
