<template>
    <section class="bg-white dark:bg-slate-900 relative pt-16">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12 relative z-10">
            <a href="#" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700" role="alert">
        <span class="text-lg bg-primary-600 rounded-full text-purple-900 px-4 py-1.5 mr-3">Tips:</span>
        <span class="text-sm font-medium">PCNubbies is beginner friendly!</span>
        <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="" clip-rule="evenodd"></path>
        </svg>
      </a>

            <div class="relative rounded-s bg-transparent dark:bg-gray-900 shadow-lg p-2 md:p-10">
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg opacity-80 absolute inset-0"></div>
                <div class="text-center px-8 py-4 relative">
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl text-fuchsia-800">
                        How to get started on building your PC!
                    </h1>
                    <p class="mb-8 text-lg font-normal lg:text-xl sm:px-16 xl:px-48 text-black">
                        We at PC-Nubbies are focusing on beginner friendly and digestible app guide/shop website for building your own computer!
                    </p>
                    <p class="mb-8 text-md font-normal md:text-xl sm:px-16 xl:px-48 text-black">
                       Click below to get started and see guides to build your own computer
                    </p>

                    <a href="guides" class="text-gray-900 bg-gradient-to-r from-purple-400 to-rose-400 hover:bg-gradient-to-l hover:from-purple-400 hover:to-rose-400 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-lg px-8 py-4 text-center mr-2 mb-2">Get Started</a>
                </div>
            </div>
        </div>
        <div class="slideshow-container absolute inset-0 overflow-hidden z-1">
            <div v-for="(slide, index) in slides" :key="index" class="mySlides absolute inset-0 transition-opacity duration-1000" :style="{ 'opacity': index === currentIndex ? 1 : 0 }">
                <img :src="slide.image" alt="Slide Image" class="object-cover w-full h-full">
            </div>
        </div>
    </section>
</template>
<script>
export default {
    data() {
        return {
            slides: [
                { image: 'https://images.pexels.com/photos/3184454/pexels-photo-3184454.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
                { image: 'https://images.pexels.com/photos/2582932/pexels-photo-2582932.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
                { image: 'https://images.pexels.com/photos/6373758/pexels-photo-6373758.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
            ],
            currentIndex: 0,
        };
    },
    created() {
        this.startSlideshow();
    },
    methods: {
        startSlideshow() {
            setInterval(() => {
                this.currentIndex = (this.currentIndex + 1) % this.slides.length;
            }, 10000); // Change slide every 10 seconds (10000ms)
        },
    },
};

</script>
<style scoped>
/* Slideshow container styles */
.slideshow-container {
    position: absolute;
    inset: 0;
    overflow: hidden;
}

/* Fade animation for slides */
.mySlides {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    transition: opacity 1s;
}

.slideshow-container {
    backdrop-filter: blur(5px);
    /* Adjust the blur value as needed */
}

/* Custom CSS for text and other elements */
/* Add your styles here */

</style>
