<template>
    <UserLayout>
        <main class="mt-24 pd-24 ">
            <!-- BGM top -->
            <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
                <div class="absolute left-0 bottom-0 w-full h-full z-10" style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                <img src="https://res.cloudinary.com/corsair-pwa/image/upload/f_auto,q_auto/v1/akamai/landing/pc-builder/images/bg-plan-specs.jpg" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
                <div class="p-4 absolute bottom-0 left-0 z-10">
                    <a href="#" class="px-4 py-1 bg-purple-500 text-black inline-flex items-center justify-center mb-2">Introduction for PC Building</a>
                    <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                        Brief Introductions for beginner/casual users
                    </h2>
                    <div class="flex mt-3">
                        <img src="https://scontent.fbag1-2.fna.fbcdn.net/v/t1.6435-1/50428361_663986754017291_8249036698344751104_n.jpg?stp=c0.35.320.320a_dst-jpg_p320x320&_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeHMI3Fy28AQq09ZCKmRLARh03WpF0OgYurTdakXQ6Bi6lvOi1J-plXu-d4MYEb-5IUnSRHWmsgj3GrFqMaDmzjM&_nc_ohc=Az884ExjcA0AX_4xk5d&_nc_ht=scontent.fbag1-2.fna&oh=00_AfBYQkgWkiJ4aZjGnKFt9EUQWjlwOhLKCRFr2tYDphxjbA&oe=661AAD72" class="h-10 w-10 rounded-full mr-2 object-cover" />
                        <div>
                            <p class="font-semibold text-gray-200 text-sm"> Josh Brian Bugarin </p>
                            <p class="font-semibold text-gray-400 text-xs"> 14 March </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top end -->


            <div class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
                <!-- Intro -->
                <h1 class="text-3xl text-gray-800 font-semibold mb-4 mt-4">Introduction</h1>
                <p class="pb-6">Building your own computer may seem like a daunting project, especially for a first timer. You might be worried it’s too complex, too expensive, or too time-consuming, but it doesn’t have to be!</p>
                <p class="pb-6">In this guide, we’ll explain how to build a PC step by step, starting with understanding your PC needs, exploring the different parts of a computer, and guiding you through the PC build process.</p>
                <img class="mt-4 w-full lg:mt-10 rounded-lg" src="https://as2.ftcdn.net/v2/jpg/00/74/04/19/1000_F_74041923_Mhk9MftLIwunVLHmkK9rVZhpMbimYxlk.jpg" alt="office content 2">
                <!-- Intro End -->

                    <!-- Video -->
                    <h1 class="text-3xl text-gray-800 font-semibold mb-4 mt-4 text-center">Watch a brief introduction to different computer parts needed</h1>
                    <iframe class="w-full h-64 my-10 rounded-lg md:h-80" src="https://www.youtube.com/embed/ExxFxD4OSZ0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    <!-- Video -->

                    <!-- Guides -->
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Brief overview</h2>
                    <p class="mb-4">
                        <ul>
                            <h3 class="mt-16 text-2xl font-extrabold dark:text-gray-400">Motherboard</h3>
                            <li class="mb-6">The motherboard is the circuit board that connects everything together. Your hardware, the power supply and the graphics cards. So it’s the first component you'll want to choose. The motherboard also determines what other pieces of hardware the computer can use. In other words, not all components are compatible with all motherboards.</li>
                            <img class="rounded-lg" src="https://www.digitaltrends.com/wp-content/uploads/2023/05/Asus-RTX-4070-hidden-connectors-6.jpg?fit=720%2C720&p=1">
            
                        </ul>
                    </p>
                    <p></p>
                    <!-- Guides End -->
            <!-- PC Sample -->
        </div>
        </main>
        <Related></Related>
    </UserLayout>
</template>
<script setup>
import Related from './Components/RelatedCasual.vue';
import UserLayout from '@/Pages/User/Layouts/UserLayouts.vue';

</script>
