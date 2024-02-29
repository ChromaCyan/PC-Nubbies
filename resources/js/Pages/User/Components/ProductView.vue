<template>
  <UserLayouts>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-2xl mx-auto">
        <!-- Product images carousel -->
        <div class="mb-8">
          <div class="swiper-container">
            <div class="swiper-wrapper">
              <div v-for="(image, index) in product.images" :key="index" class="swiper-slide">
                <img :src="image.src" :alt="image.alt" class="w-full h-80 object-cover" />
              </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <!-- Product details -->
        <div>
          <h1 class="text-2xl font-bold tracking-tight text-gray-900">{{ product.name }}</h1>
          <p class="text-2xl font-bold text-gray-900">{{ product.price }}</p>
          <p class="text-sm text-gray-500">{{ product.description }}</p>
          <div class="flex items-center mt-4">
            <label for="quantity" class="mr-2">Quantity:</label>
            <input id="quantity" type="number" v-model="quantity" class="w-20 border border-gray-300 rounded-md p-1 text-center" />
          </div>
          <button @click="addToCart(product)" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Add to Cart</button>
        </div>
      </div>
    </div>
  </UserLayouts>
</template>

<script setup>
import { defineProps } from 'vue';
import UserLayouts from '@/Pages/User/Layouts/UserLayouts.vue';
import Swiper from 'swiper';

defineProps({
  product: Object
});

const quantity = ref(1);

const addToCart = (product) => {
  console.log(product);
  // Implement your addToCart logic here
};

onMounted(() => {
  new Swiper('.swiper-container', {
    pagination: {
      el: '.swiper-pagination',
    },
  });
});
</script>

<style scoped>
/* Add your custom styles here */
.swiper-container {
  margin-left: auto;
  margin-right: auto;
  width: 100%;
  height: 400px;
}

.swiper-slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
</style>
