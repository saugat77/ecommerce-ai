<template>
  <nav :class="[
    'fixed top-0 w-full z-50 backdrop-blur-md border-b border-gray-200 transition-all duration-300',
    isScrolled ? 'bg-white/90 shadow-md h-12' : 'bg-white/80 h-14'
  ]">
    <div class="max-w-7xl mx-auto px-6">

      <div class="grid grid-cols-3 items-center h-14">

        <!-- LEFT -->
        <div class="flex items-center">
          <router-link to="/" class="text-lg font-semibold text-black leading-none">
            🍎 My App
          </router-link>
        </div>

        <!-- CENTER -->
        <div class="hidden md:flex justify-center items-center space-x-8 text-sm font-medium">
          <a href="#" class="text-gray-600 hover:text-black transition">Store</a>
          <a href="#" class="text-gray-600 hover:text-black transition">Mac</a>
          <a href="#" class="text-gray-600 hover:text-black transition">iPhone</a>
          <a href="#" class="text-gray-600 hover:text-black transition">Watch</a>
          <a href="#" class="text-gray-600 hover:text-black transition">Support</a>
        </div>

        <!-- RIGHT -->
        <div class="flex justify-end items-center space-x-3 text-gray-700">

          <!-- LOGIN -->
          <router-link
            v-if="!isLoggedIn"
            to="/login"
            class="px-3 py-1 text-sm rounded-full hover:bg-gray-100 transition"
          >
            Login
          </router-link>

          <!-- CART (only when logged in) -->
          <router-link
            v-if="isLoggedIn"
            to="/cart"
            class="w-9 h-9 flex items-center justify-center rounded-full hover:bg-gray-100 transition relative"
          >
            <i class="fa-solid fa-cart-shopping text-sm"></i>

            <span
              class="absolute -top-1 -right-1 bg-black text-white text-[10px] w-4 h-4 flex items-center justify-center rounded-full"
            >
              {{ cartCount }}
            </span>
          </router-link>

        </div>

      </div>

    </div>
  </nav>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from "vue";

const isScrolled = ref(false);
const cartCount = ref(0);

// 🔐 TEMP auth state (replace with Pinia / API later)
const isLoggedIn = ref(false);

const handleScroll = () => {
  isScrolled.value = window.scrollY > 20;
};

onMounted(() => {
  window.addEventListener("scroll", handleScroll);
});

onBeforeUnmount(() => {
  window.removeEventListener("scroll", handleScroll);
});
</script>