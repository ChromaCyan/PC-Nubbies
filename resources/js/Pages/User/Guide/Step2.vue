<template>
    <UserLayout>
        <main class="mt-24 pd-24 ">
            <!-- BGM top -->
            <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
                <div class="absolute left-0 bottom-0 w-full h-full z-10" style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                <img src="https://i.ytimg.com/vi/kZ9QHOHhGCg/maxresdefault.jpg" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
                <div class="p-4 absolute bottom-0 left-0 z-10">
                    <a href="#" class="px-4 py-1 bg-purple-500 text-black inline-flex items-center justify-center mb-2">How to put a Motherboard in Case</a>
                    <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                        Motherboard Installation
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
                <p class="pb-6">For instructions on installing the processor, power supply, and putting the motherboard in the case, consult each component’s owner’s manual. The act of installation or assembling parts isn’t complicated, but there is the potential for errors. That’s why it’s best to follow the more detailed step-by-step instructions for each specific part</p>
                <!-- Intro End -->

                    <!-- Video -->
                    <h1 class="text-3xl text-gray-800 font-semibold mb-4 mt-10 text-center">Watch a brief Tutorial on how to install your Motherboard in your Case</h1>
                    <iframe class="w-full h-64 my-10 rounded-lg md:h-80" src="https://www.youtube.com/embed/hrv7_gl4MAQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                    <!-- Video -->

                    <!-- Guides -->
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Installation Process</h2>
                    <p class="mb-4">
                        <ul>
                            <h3 class="mt-16 text-2xl font-extrabold dark:text-gray-400">Step 1: Motherboard</h3>
                            <li class="mb-6">Find the place for motherboard in your case and screw it in!</li>
                            <li class="mb-6">The motherboard is the foundational hardware for any system. As such, should be the first item on your spec list. The motherboard dictates the physical dimensions and size of your PC build, and it also determines what other pieces of hardware the computer can use – a critical point because your motherboard must support the amount of performance you’d like to get out of the rig. It will further indicate what kind of storage (drives) can be installed; both the size of the drive (2.5-inch, mSATA, or m.2) and the type of interface (SATA or PCle).</li>
                            <img class="rounded-lg" src="https://i.ytimg.com/vi/iTkGuioG5RU/sddefault.jpg">
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
import Related from './Components/RelatedStep2.vue';
import UserLayout from '@/Pages/User/Layouts/UserLayouts.vue';

</script>
