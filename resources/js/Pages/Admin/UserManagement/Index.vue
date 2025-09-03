<template>
    <AdminLayout>
        <UserList :users="users"></UserList>
    </AdminLayout>
</template>

<script setup>
import { defineProps } from 'vue';
defineProps({
    users: Array
})
import AdminLayout from '../Components/AdminLayout.vue'
import UserList from './UserList.vue'
</script>
