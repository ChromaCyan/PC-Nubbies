<template>
    <AdminLayout>
        <BrandList :products = "products" ></BrandList>
    </AdminLayout>
</template>

<script setup>
defineProps({
    products:Array
})
import AdminLayout from '../Components/AdminLayout.vue'
import BrandList from './BrandList.vue'
</script>