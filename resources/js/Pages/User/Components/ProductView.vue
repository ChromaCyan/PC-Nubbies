<template>
  <UserLayouts>
    
  </UserLayouts>
</template>

<script setup>
import { defineProps } from 'vue';
import { ref } from 'vue';
import UserLayouts from '@/Pages/User/Layouts/UserLayouts.vue';

defineProps({
  product: Object
});

const quantity = ref(1);

const addToCart = (product) => {
  console.log(product);

};
</script>

<style scoped>
.bg-white {
  margin: 0 auto; /* Center the product view */
  max-width: 1200px; /* Set a max width for the product view */
  padding: 0 20px; /* Add padding to the sides */
}
</style>