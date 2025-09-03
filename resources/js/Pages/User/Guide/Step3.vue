<template>
    <UserLayout>
        <main class="mt-24 pd-24 ">
            <!-- BGM top -->
            <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
                <div class="absolute left-0 bottom-0 w-full h-full z-10" style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                <img src="https://img.freepik.com/premium-photo/close-up-person-installing-cpu-motherboard_23-2148419154.jpg" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
                <div class="p-4 absolute bottom-0 left-0 z-10">
                    <a href="#" class="px-4 py-1 bg-purple-500 text-black inline-flex items-center justify-center mb-2">How to put a CPU in Motherboard</a>
                    <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                        CPU Installation
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
                <p class="pb-6">The processor might be the single most important component you choose for your build. Memory and storage fuel the processor which controls every data transaction within the PC. When you’re determining which CPU to install, pay attention to the gigahertz (GHz) – the higher the GHz, the faster the processor. This is important if you’re overclocking because the amount of GHz you use will rise. Overclocking is speeding up the clock cycles of the CPU to process more data transactions faster than certified by the manufacturer. It also puts an added importance on finding a proper heatsink for the processor so the higher temperatures don’t affect system health.</p>
                <!-- Intro End -->

                    <!-- Video -->
                    <h1 class="text-3xl text-gray-800 font-semibold mb-4 mt-10 text-center">Watch a brief Tutorial on how to install your CPU in your Motherboard</h1>
                    <iframe class="w-full h-64 my-10 rounded-lg md:h-80" src="https://www.youtube.com/embed/_zojIW-2DD8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>


                    <!-- Video -->

                    <!-- Guides -->
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Installation Process</h2>
                    <p class="mb-4">
                        <ul>
                            <h3 class="mt-16 text-2xl font-extrabold dark:text-gray-400">Step 1: CPU</h3>
                            <li class="mb-6">Remove the CPU from its packaging, do not touch the gold pins on the bottom. Install your processor onto the motherboard by pressing firmly and following the manufacturers recommendations. Apply a pea sized amount of thermal paste if installing a heatsink. Secure the heatsink over the CPU with the 4 screws.</li>
                            <img class="rounded-lg" src="https://content.instructables.com/FL6/RCQ7/KKCKYV03/FL6RCQ7KKCKYV03.jpg?auto=webp&fit=bounds&frame=1&height=1024&width=1024auto=webp&frame=1&height=150">
                            <h3 class="mt-16 text-2xl font-extrabold dark:text-gray-400">Step 2: Apply Thermal Paste</h3>
                            <li class="mb-6">Apply a pea sized amount of thermal paste if installing a heatsink.</li>
                            <img class="rounded-lg" src="https://beebom.com/wp-content/uploads/2022/12/thermal-paste-on-cpu.jpg?w=640">
                            <h3 class="mt-16 text-2xl font-extrabold dark:text-gray-400">Step 2: Secure the heatsink</h3>
                            <li class="mb-6">Secure the heatsink over the CPU with the 4 screws.</li>
                            <img class="rounded-lg" src="https://static1.xdaimages.com/wordpress/wp-content/uploads/wm/2024/01/stock-amd-cooler-being-screwed-to-the-motherboard-using-a-screwdriver.jpg">
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
