<template>
  <UserLayout>

    <div class="mt-16 text-center pt-16">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl text-fuchsia-800">
            How to get started on building your PC!
        </h1>
    </div>

  

    <section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
      <div class="max-w-screen-md mb-8 lg:mb-16">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Introduction for PC Casuals</h2>
          <p class="text-gray-500 sm:text-xl dark:text-gray-400">Here are what you will need to take note of for starting your PC journey as a newbie. Check out the 3 Essentials below.</p>
      </div>
      <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
          <div>
              <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                 <v-icon left>mdi mdi-magnify</v-icon>
              </div>
              <h3 class="mb-2 text-xl font-bold dark:text-white">Compatibility</h3>
              <p class="text-gray-500 dark:text-gray-400"> 
When choosing PC parts, ensure compatibility by checking motherboard support for the CPU, RAM, and GPU, along with power supply and case fit. This prevents compatibility issues, ensuring a smooth build process.</p>
          </div>
          <div>
              <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                <v-icon left>mdi-cash-multiple</v-icon>  
              </div>
              <h3 class="mb-2 text-xl font-bold dark:text-white">Budgeting</h3>
              <p class="text-gray-500 dark:text-gray-400">Determine your budget and prioritize components accordingly. Allocate a larger portion to essential components like the CPU and GPU.</p>
          </div>
          <div>
              <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                <v-icon left>mdi-tools</v-icon>                
              </div>
              <h3 class="mb-2 text-xl font-bold dark:text-white">Compatibility</h3>
              <p class="text-gray-500 dark:text-gray-400"> Ensure compatibility between components, especially the CPU and motherboard socket type, RAM compatibility with the motherboard, and the physical size of components fitting within the case.</p>
          </div>
      </div>
  </div>
</section>

<div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12 relative z-10">
            <div class="relative rounded-s bg-transparent dark:bg-gray-900 shadow-lg p-2 md:p-10 flex items-center justify-center">
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg opacity-80 absolute inset-0"></div>
                <div class="px-8 py-4 relative">
                  <iframe width="1000" height="515" src="https://www.youtube.com/embed/ExxFxD4OSZ0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>


<section class="bg-white dark:bg-gray-900">

  <div class="mt-16 text-center pt-16">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl text-fuchsia-800">
            Here are some of the popular computer builds atm
        </h1>
    </div>
  
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
      <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Mid Range PC Build around 650$.</h2>
            <p class="mb-4"><ul>
              <li>CPU: Intel Core i5-7500 </li>
              <li>Cooler: Cooler Master Hyper 212 Evo</li>
              <li>Graphics card: MSI GeForce GTX 1070</li>
              <li>Motherboard: Asus Prime H270-Pro</li>
              <LI>RAM: G.SKILL Aegis 16GB (2x8GB) DDR4 clocked at 2133MHz</LI>
              <LI>SSD: SanDisk SD8SBAT-256G-1122 Z400s 256GB SSD</LI>
              <li>HDD: Seagate Desktop HDD ST2000DM001 2TB</li>
              <li>Case: Fractal Design Define R5</li>
              <li>PSU: EVGA SuperNOVA 550 G2</li>
            </ul></p>
            <p></p>
        </div>
        <div class="grid grid-cols-1 gap-4 mt-8">
            <img class="mt-4 w-full lg:mt-10 rounded-lg" src="https://www.gamespot.com/a/uploads/scale_super/1568/15683559/3148018-fractal%20design%20define%20r5.jpg" alt="office content 2">
        </div>
    </div>
   
</section>

    <Related></Related>
  </UserLayout>
</template>
<script setup>
import Related from './Components/RelatedCasual.vue';
import UserLayout from '@/Pages/User/Layouts/UserLayouts.vue';

</script>
