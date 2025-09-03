<template>
    <section class="p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <h1 >Order List</h1>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Order ID</th>
                                <th scope="col" class="px-4 py-3">User</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Items</th>
                                <th scope="col" class="px-4 py-3">Quantity</th>
                                <th scope="col" class="px-4 py-3">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="order in orders" :key="order.id" class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ order.id }}
                                </th>
                                <td class="px-4 py-3">{{ order.createBy.name }}</td>
                                <td class="px-4 py-3">{{ order.status }}</td>
                                <td class="px-4 py-3">
                                    <div v-for="item in order.order_items" :key="item.id">
                                        {{ item.product.title }}
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div v-for="item in order.order_items" :key="item.id">
                                        {{ item.quantity }}
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div v-for="item in order.order_items" :key="item.id">
                                        ${{ item.product.price }}
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

<script setup>
defineProps({
    orders: Array
})
</script>
