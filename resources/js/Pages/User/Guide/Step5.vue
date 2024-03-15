<template>
    <UserLayout>
        <main class="mt-24 pd-24 ">
            <!-- BGM top -->
            <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
                <div class="absolute left-0 bottom-0 w-full h-full z-10" style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                <img src="https://assetsio.gnwcdn.com/AMD-Radeon-RX-7900-XTX-and-RX-7900-XT-vs-RTX-4080.JPG?width=1200&height=1200&fit=bounds&quality=70&format=jpg&auto=webp" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
                <div class="p-4 absolute bottom-0 left-0 z-10">
                    <a href="#" class="px-4 py-1 bg-purple-500 text-black inline-flex items-center justify-center mb-2">How to put a Graphics Card in Computer</a>
                    <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                        Graphics Card Installation
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
                <p class="pb-6">When you expect more output from your computer, you need to reinforce your system with the resources it needs to realize those expectations. Creating ultra-sharp graphics requires more memory to process all the fine details that jump off the screen –more GBs of RAM equals more graphical horsepower.

GPUs have an extremely wide price range, which could seriously inflate your expenses for the build. If you crave razor-sharp visuals that a high-priced GPU offers, be sure to give it the assets it needs to do its job: a powerful processor and plenty of RAM.</p>
                <!-- Intro End -->

                    <!-- Video -->
                    <iframe class="w-full h-64 my-10 rounded-lg md:h-80" src="https://www.youtube.com/embed/YVbjl69z3HE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                    <!-- Video -->

                    <!-- Guides -->
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Installation Process</h2>
                    <p class="mb-4">
                        <ul>
                            <h3 class="mt-16 text-2xl font-extrabold dark:text-gray-400">Step 1: Graphics Card</h3>
                            <li class="mb-6">Slide your GPU into its slot and press until it clicks, secure with any included screws.</li>
                            <img class="rounded-lg" src="https://support.cyberpowerpc.com/hc/article_attachments/360027236494/GPU_Insert.jpg">
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
import Related from './Components/RelatedStep3.vue';
import UserLayout from '@/Pages/User/Layouts/UserLayouts.vue';

</script>
