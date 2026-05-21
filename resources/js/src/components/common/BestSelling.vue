<template>
  <div class="min-h-screen bg-[#f5f5f7] py-12">

    <div class="max-w-7xl mx-auto px-5">

      <!-- HEADER -->
      <div class="flex items-end justify-between mb-12">

        <div>
          <p class="text-sm text-gray-500 uppercase mb-2">
            Premium Collection
          </p>

          <h1 class="text-5xl font-semibold tracking-tight text-[#1d1d1f]">
            Best Sellers
          </h1>
        </div>

      </div>

      <!-- SWIPER -->
      <Swiper
        :modules="[Autoplay]"
        :slides-per-view="4"
        :space-between="24"
        :breakpoints="breakpoints"
        :loop="true"
        :grab-cursor="true"
        :autoplay="{
          delay: 1000,
          disableOnInteraction: false
        }"
        class="w-full"
      >

        <SwiperSlide
          v-for="product in products"
          :key="product.id"
        >
          <ProductCard
            :product="product"
            @add-to-cart="addToCart"
          />
        </SwiperSlide>

      </Swiper>

    </div>

  </div>
</template>

<script setup>
import { ref } from "vue";
import ProductCard from "../product/ProductCard.vue";
import { useCartStore } from "../../../stores/cart.store";

import { Autoplay } from "swiper/modules";
import "swiper/css";

// cart
const cart = useCartStore();

// products
const products = ref([
  {
    id: 1,
    name: "AirPods Pro Max",
    category: "Audio",
    price: 45000,
    description: "High-fidelity audio with noise cancellation.",
    image: "https://images.unsplash.com/photo-1585386959984-a4155224a1ad"
  },
  {
    id: 2,
    name: "iPhone 15 Pro",
    category: "Smartphone",
    price: 180000,
    description: "Titanium design with A17 Pro chip.",
    image: "https://images.unsplash.com/photo-1696446706500-3b2f0c6e6f1c"
  },
  {
    id: 3,
    name: "MacBook Air M3",
    category: "Laptop",
    price: 220000,
    description: "Ultra-light performance laptop.",
    image: "https://images.unsplash.com/photo-1517336714731-489689fd1ca8"
  },
  {
    id: 4,
    name: "Apple Watch Series 9",
    category: "Wearable",
    price: 65000,
    description: "Advanced health tracking.",
    image: "https://images.unsplash.com/photo-1434494878577-86c23bcb06b9"
  },
  {
    id: 4,
    name: "Apple Watch Series 9",
    category: "Wearable",
    price: 65000,
    description: "Advanced health tracking.",
    image: "https://images.unsplash.com/photo-1434494878577-86c23bcb06b9"
  }
]);

// breakpoints
const breakpoints = {
  320: { slidesPerView: 1.2 },
  640: { slidesPerView: 2 },
  1024: { slidesPerView: 3 },
  1280: { slidesPerView: 4 }
};

// add to cart
const addToCart = async (product) => {
  await cart.addToCart(product.id);
};
</script>