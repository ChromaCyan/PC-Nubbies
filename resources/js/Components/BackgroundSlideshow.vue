<template>
 <div class="background-slideshow">
    <div v-for="(image, index) in images" :key="index" class="slideshow-image" :style="{ backgroundImage: `url(${image})` }"></div>
 </div>
</template>

<script>
export default {
 data() {
    return {
      images: [
        'https://images.pexels.com/photos/3184454/pexels-photo-3184454.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        'https://images.pexels.com/photos/2582932/pexels-photo-2582932.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        'https://images.pexels.com/photos/6373758/pexels-photo-6373758.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
      ],
    };
 },
};
</script>

<style scoped>
.background-slideshow {
 position: fixed;
 top: 0;
 left: 0;
 width: 100%;
 height: 100%;
 z-index: -1;
 overflow: hidden;
}

.slideshow-image {
 position: absolute;
 top: 0;
 left: 0;
 width: 100%;
 height: 100%;
 background-size: cover;
 background-position: center;
 opacity: 0;
 transition: opacity 1s ease-in-out;
}

.slideshow-image:nth-child(1) {
 animation: slideshow 18s infinite;
}

@keyframes slideshow {
  0% { opacity: 0; }
  20% { opacity: 1; }
  40% { opacity: 1; }
  60% { opacity: 0; }
  100% { opacity: 0; }
}
</style>
