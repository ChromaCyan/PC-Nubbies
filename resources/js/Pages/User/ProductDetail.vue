<script setup>
import UserLayouts from './Layouts/UserLayouts.vue'
import ProductsView from '../User/Components/ProductsView.vue'
import { ref } from 'vue';

</script>
<template>
    <UserLayouts>
    	<ProductsView></ProductsView>

        <div class="relative  max-w-screen-xl py-24 mx-auto overflow-x-auto">
        </div>

    </UserLayouts>
</template>