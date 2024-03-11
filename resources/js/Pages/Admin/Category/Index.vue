<template>
    <AdminLayout>
        <CategoryList :categories = "categories" ></CategoryList>
    </AdminLayout>
</template>

<script setup>
defineProps({
    categories:Array
})
import AdminLayout from '../Components/AdminLayout.vue'
import CategoryList from './CategoryList.vue'

</script>