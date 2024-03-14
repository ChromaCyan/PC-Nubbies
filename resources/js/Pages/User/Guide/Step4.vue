<template>
    <UserLayout>
        <main class="mt-24 pd-24 ">
            <!-- BGM top -->
            <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
                <div class="absolute left-0 bottom-0 w-full h-full z-10" style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                <img src="https://www.pcworld.com/wp-content/uploads/2023/04/corsair-dominator-memory-100884308-orig-1.jpg?quality=50&strip=all" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
                <div class="p-4 absolute bottom-0 left-0 z-10">
                    <a href="#" class="px-4 py-1 bg-purple-500 text-black inline-flex items-center justify-center mb-2">How to put a RAM in Motherboard</a>
                    <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                        RAM Installation
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
                <p class="pb-6">Memory, or RAM, gives your processor and graphics processing unit the resources they need to perform. More gigabytes of memory equal more assets they can turn into faster system speed, seamless responsiveness, and higher framerates. Adding memory is one of the fastest, easiest, and most affordable ways to amplify the performance of any gaming rig. No matter the size of your budget, maxing out the RAM is an essential part of building a gaming PC. If you don’t already have your memory, see how much RAM you’ll need to hit your performance objectives..</p>
                <!-- Intro End -->

                    <!-- Video -->
                    <iframe class="w-full h-64 my-10 rounded-lg md:h-80" src="https://www.youtube.com/embed/kRMJwiXhrEU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>



                    <!-- Video -->

                    <!-- Guides -->
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Installation Process</h2>
                    <p class="mb-4">
                        <ul>
                            <h3 class="mt-16 text-2xl font-extrabold dark:text-gray-400">Step 1: RAM</h3>
                            <li class="mb-6">RAM is the easiest hardware to install when you’re building a PC. Locate the memory slots on the motherboard. Hold your memory modules on the side to avoid touching the gold pins. If your memory doesn’t have a heat spreader, also avoid touching the chips on the module. Align the notches on the module with the ridge in the slot then firmly press the module in until it clicks. As you’re pressing, note that it takes about 30 pounds of pressure to fully install a module.</li>
                            <img class="rounded-lg" src="https://media.istockphoto.com/id/473474370/photo/installing-ram-memory-chip.jpg?s=612x612&w=0&k=20&c=m0WRbTaw-2seK9QkFzGdVUY3mr-5qUiLguMy5l_iqE4=">
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
