<template>
  <div>
    <!-- Hero Section -->
    <div class="relative h-screen">
      <div class="absolute inset-0">
        <div
          v-for="(image, index) in images"
          :key="index"
          :class="`absolute inset-0 transition-opacity duration-1000 ${
            index === currentImage ? 'opacity-100' : 'opacity-0'
          }`"
        >
          <img :src="image" alt="Slide" class="w-full h-full object-cover" />
        </div>
        <div class="absolute inset-0 bg-black opacity-50"></div>
      </div>
      <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
        <h1 class="text-6xl font-bold text-white mb-4">Welcome to PCNubbies Shop</h1>
        <p class="text-2xl text-white mb-8">Your one-stop shop for computer peripherals</p>
        <a v-if="canRegister" href="/register" class="font-semibold inline-block rounded-md bg-pink-500 text-white px-6 py-4 transition-colors duration-200 ease-in-out hover:bg-pink-700 hover:text-white ms-4">Register</a>
      </div>
    </div>

    <!-- Guide Section -->
    <div class="container mx-auto py-12">
      <h2 class="text-2xl font-semibold mb-4">Guide Section</h2>
      <p class="text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada urna et feugiat accumsan.</p>
      <!-- Placeholder content for guide section -->
    </div>

    <!-- Shop Section -->
    <div class="container mx-auto py-12">
      <h2 class="text-2xl font-semibold mb-4">Shop Section</h2>
      <p class="text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada urna et feugiat accumsan.</p>
      <!-- Placeholder content for shop section -->
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const images = [
  'https://images.pexels.com/photos/3184454/pexels-photo-3184454.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
  'https://images.pexels.com/photos/2225616/pexels-photo-2225616.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
  'https://images.pexels.com/photos/6373758/pexels-photo-6373758.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
];
const currentImage = ref(0);

const nextSlide = () => {
  currentImage.value = (currentImage.value + 1) % images.length;
};

onMounted(() => {
  setInterval(nextSlide, 5000);
});
</script>

<style scoped>
/* Set hero section to cover the whole screen */
.hero {
  height: 100vh;
}
</style>
