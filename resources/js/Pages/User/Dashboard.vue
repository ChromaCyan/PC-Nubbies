<<<<<<< HEAD
=======
<template>
    <UserLayouts>
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12 mt-24">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <h1>Your Order List</h1>
                    </div>
                </div>
                <div class="overflow-x-auto">
            <table v-show="orders.length > 0" v-for="order in orders" :key="order.id"
                class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-5">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 bg-white dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Successful Order {{ order.id }}
                        </th>
                                <th scope="col" class="px-4 py-3">Brand</th>
                                <th scope="col" class="px-4 py-3">Category</th>
                                <th scope="col" class="px-4 py-3">Quantity</th>
                                <th scope="col" class="px-4 py-3">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in order.order_items" :key="item.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{ item.product.title }}
                        </th>
                        <td class="px-6 py-4">
                           {{ item.product.brand.name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ item.product.category.name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ item.quantity }}
                        </td>
                        <td class="px-6 py-4">
                            ${{ item.product.price }}
                        </td>
                    </tr>
                </tbody>
            </table>
                </div>
            </div>
        </div>
    </UserLayouts>
</template>

>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
<script setup>
import UserLayouts from './Layouts/UserLayouts.vue'

defineProps({
    orders: Array
})
</script>
<<<<<<< HEAD
<template>
    <UserLayouts>

        <div class="relative  max-w-screen-xl py-24 mx-auto overflow-x-auto">
            <table v-show="order.order_items.length > 0" v-for="order in orders" :key="order.id"
                class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-5">
                <thead class="text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Order ID # {{ order.id }}
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in order.order_items" :key="item.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{item.product.title}}
                        </th>
                        <td class="px-6 py-4">
                           {{item.product.brand.name}}
                        </td>
                        <td class="px-6 py-4">
                            {{item.product.category.name}}
                        </td>
                        <td class="px-6 py-4">
                            ${{item.product.price}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </UserLayouts></template>
=======
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
