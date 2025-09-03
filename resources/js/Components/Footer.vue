<template>
  <footer class="bg-purple-500 text-white py-12">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
      <div class="text-center md:text-left mb-4 md:mb-0">
        <h3 class="text-lg font-semibold">Contact Us</h3>
        <p class="mt-2">123 Street Name, City, Country</p>
        <p>+1 234 567 890</p>
        <p>info@example.com</p>
      </div>
      <div class="text-center md:text-left mb-4 md:mb-0">
        <h3 class="text-lg font-semibold">Follow Us</h3>
        <div class="flex justify-center md:justify-start mt-2">
          <a href="#" class="text-white hover:text-gray-200 mr-4"><i class="fab fa-facebook"></i></a>
          <a href="#" class="text-white hover:text-gray-200"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
      <div class="text-center md:text-left">
        <h3 class="text-lg font-semibold">About Us</h3>
        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eget quam vitae leo consequat pharetra vel nec nisi.</p>
      </div>
    </div>
    <div class="mt-8 text-center text-gray-200">&copy; 2024 PCNubbies. All rights reserved.</div>
  </footer>
</template>

<style scoped>
/* Footer styling */
footer {
  background-color: #673AB7;
  color: #FFFFFF;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

footer a {
  transition: color 0.3s ease;
}

footer a:hover {
  color: #CCCCCC;
}

footer i {
  font-size: 1.5rem;
  margin-right: 8px;
}

@media (min-width: 768px) {
  footer {
    padding-top: 48px;
    padding-bottom: 48px;
  }
}

@media (min-width: 1024px) {
  footer {
    padding-top: 64px;
    padding-bottom: 64px;
  }
}
</style>
