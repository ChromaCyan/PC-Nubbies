<template>
    <nav class="bg-purple-500 text-white py-4">
        <div class="container mx-auto flex items-center justify-between">
            <div>
                <a href="/" class="text-4xl font-bold text-white hover:text-gray-200">PCNubbies</a>
            </div>
            <div class="ml-auto">
                <a v-if="$page.props.auth.user" href="/dashboard" class="font-semibold inline-block rounded-md bg-purple-700 text-white px-6 py-4 transition-colors duration-200 ease-in-out hover:bg-purple-800 hover:text-white">Dashboard</a>
                <template v-else>
                    <a href="/login" class="font-semibold inline-block rounded-md bg-blue-500 text-white px-6 py-4 transition-colors duration-200 ease-in-out hover:bg-blue-700 hover:text-white">Log in</a>
                    <a v-if="canRegister" href="/register" class="font-semibold inline-block rounded-md bg-pink-500 text-white px-6 py-4 transition-colors duration-200 ease-in-out hover:bg-pink-700 hover:text-white ms-4">Register</a>
                </template>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { defineProps } from 'vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<style scoped>
/* Add your custom styles here */
</style>
