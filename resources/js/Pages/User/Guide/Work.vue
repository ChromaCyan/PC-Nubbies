<template>
  <UserLayout>
 <div class="flex flex-col md:flex-row justify-between px-4 mx-auto max-w-screen-xl mt-24">
    <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert mt-16 mb-16">
      <header class="mb-4 lg:mb-6 not-format">
        <address class="flex items-center mb-6 not-italic">
          <div class="inline-flex mr-3 text-sm text-gray-900 dark:text-white">
            <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
            <div>
              <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">Jese Leos</a>
              <p class="text-base text-gray-500 dark:text-gray-400">Graphic Designer, educator & CEO Flowbite</p>
              <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
            </div>
          </div>
        </address>
        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">Best practices for successful prototypes</h1>
      </header>
      <p class="lead">Flowbite is an open-source library of UI components built with the utility-first
          classes from Tailwind CSS. It also includes interactive elements such as dropdowns, modals,
          datepickers.</p>
      <p>Before going digital, you might benefit from scribbling down some ideas in a sketchbook. This way,
          you can think things through before committing to an actual design project.</p>
      <p>But then I found a <a href="https://flowbite.com">component library based on Tailwind CSS called
              Flowbite</a>. It comes with the most commonly used UI components, such as buttons, navigation
              bars, cards, form elements, and more which are conveniently built with the utility classes from
              Tailwind CSS.</p>
      <figure><img src="https://flowbite.s3.amazonaws.com/typography-plugin/typography-image-1.png" alt="">
          <figcaption>Digital art by Anonymous</figcaption>
      </figure>
      <h2>Getting started with Flowbite</h2>
      <p>First of all you need to understand how Flowbite works. This library is not another framework.
          Rather, it is a set of components based on Tailwind CSS that you can just copy-paste from the
          documentation.</p>
      <p>It also includes a JavaScript file that enables interactive components, such as modals, dropdowns,
          and datepickers which you can optionally include into your project via CDN or NPM.</p>
      <p>You can check out the <a href="https://flowbite.com/docs/getting-started/quickstart/">quickstart
              guide</a> to explore the elements by including the CDN files into your project. But if you want
              to build a project with Flowbite I recommend you to follow the build tools steps so that you can
              purge and minify the generated CSS.</p>
      <p>You'll also receive a lot of useful application UI, marketing UI, and e-commerce pages that can help
          you get started with your projects even faster. You can check out this <a
              href="https://flowbite.com/docs/components/tables/">comparison table</a> to better understand
          the differences between the open-source and pro version of Flowbite.</p>
      <!-- Additional content continues here -->
    </article>
 </div>

    <Related></Related>
  </UserLayout>
</template>
<script setup>
import Related from './Components/RelatedCasual.vue';
import UserLayout from '@/Pages/User/Layouts/UserLayouts.vue';

</script>
