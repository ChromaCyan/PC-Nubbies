<template>
    <AdminLayout>
        <OrderList :products = "products" ></OrderList>
    </AdminLayout>
</template>

<script setup>
defineProps({
    products:Array
})
import AdminLayout from '../Components/AdminLayout.vue'
import OrderList from './OrderList.vue'
</script>