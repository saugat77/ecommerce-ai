<template>
  <div class="min-h-screen bg-[#f5f5f7] py-10">

    <div class="max-w-7xl mx-auto px-4">

      <!-- HEADER -->
      <div class="flex items-center justify-between mb-10">

        <div>
          <h1 class="text-4xl font-semibold tracking-tight text-black">
            Products
          </h1>

          <p class="text-gray-500 mt-2 text-sm">
            Discover amazing deals
          </p>
        </div>

      </div>

      <!-- SWIPER -->
      <Swiper :modules="[Autoplay]" :slides-per-view="4" :space-between="24" :breakpoints="breakpoints"
        class="w-full min-h-[400px]" :grab-cursor="true" :loop="true" :autoplay="{
          delay: 1500,
          disableOnInteraction: false
        }">

        <SwiperSlide v-for="product in products" :key="product.id" class="pb-4">
          <ProductCard :product="product" @add-to-cart="addToCart" />
        </SwiperSlide>

      </Swiper>

    </div>

  </div>
</template>

<script setup>
import ProductCard from "../product/ProductCard.vue";
import { useCartStore } from "../../../stores/cart.store";
import { Autoplay } from "swiper/modules";

// props
defineProps({
  products: {
    type: Array,
    default: () => []
  }
});

// cart store
const cart = useCartStore();

// add to cart
const addToCart = async (product) => {
  await cart.addToCart(product.id);
};

// responsive breakpoints
const breakpoints = {
  320: {
    slidesPerView: 1.2
  },

  640: {
    slidesPerView: 2
  },

  1024: {
    slidesPerView: 3
  },

  1280: {
    slidesPerView: 4
  }
};
</script>