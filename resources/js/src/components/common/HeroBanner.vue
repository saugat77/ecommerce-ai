<template>
  <section class="bg-[#f5f5f7]">

    <Swiper
      :modules="[Autoplay, EffectFade]"
      effect="fade"
      :fadeEffect="{ crossFade: true }"
      :loop="true"
      :autoplay="{
        delay: 4000,
        disableOnInteraction: false
      }"
      class="w-full"
    >

      <SwiperSlide
        v-for="(item, index) in slides"
        :key="index"
      >
        <div class="max-w-7xl mx-auto px-6 py-24 grid lg:grid-cols-2 items-center gap-16">

          <!-- TEXT -->
          <div class="space-y-6">

            <p class="text-sm uppercase tracking-[0.35em] text-gray-500 animate-fadeIn">
              {{ item.tag }}
            </p>

            <h1 class="text-5xl md:text-6xl font-semibold text-[#1d1d1f] leading-tight animate-slideUp">
              {{ item.title }}
              <span class="block text-gray-400">
                {{ item.subtitle }}
              </span>
            </h1>

            <p class="text-gray-500 text-lg max-w-xl animate-fadeIn delay-200">
              {{ item.description }}
            </p>

            <!-- CTA -->
            <div class="flex gap-4 pt-4 animate-slideUp delay-300">

              <button
                class="px-6 py-3 rounded-full bg-[#1d1d1f] text-white
                       hover:bg-black transition-all duration-300 active:scale-95"
              >
                Buy Now
              </button>

              <button
                class="px-6 py-3 rounded-full border border-gray-300
                       text-[#1d1d1f] hover:border-black transition"
              >
                Learn More
              </button>

            </div>

            <!-- STATS -->
            <div class="flex gap-10 pt-8 text-sm text-gray-500 animate-fadeIn delay-500">

              <div>
                <p class="text-2xl font-semibold text-[#1d1d1f]">4.9★</p>
                <p>Rating</p>
              </div>

              <div>
                <p class="text-2xl font-semibold text-[#1d1d1f]">10K+</p>
                <p>Users</p>
              </div>

              <div>
                <p class="text-2xl font-semibold text-[#1d1d1f]">1 Year</p>
                <p>Warranty</p>
              </div>

            </div>

          </div>

          <!-- IMAGE -->
          <div class="relative">

            <div class="rounded-[40px] overflow-hidden shadow-[0_40px_100px_rgba(0,0,0,0.15)]">

              <img
                :src="item.image"
                class="w-full h-[520px] object-cover scale-105 hover:scale-110 transition duration-700"
              />

              <!-- soft overlay -->
              <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>

            </div>

            <!-- floating badge -->
            <div
              class="absolute -bottom-6 -left-6 bg-white rounded-2xl shadow-xl px-5 py-3"
            >
              <p class="text-xs text-gray-500">Starting from</p>
              <p class="text-lg font-semibold text-[#1d1d1f]">
                Rs {{ formatPrice(item.price) }}
              </p>
            </div>

          </div>

        </div>
      </SwiperSlide>

    </Swiper>

  </section>
</template>

<script setup>
import { Swiper, SwiperSlide } from "swiper/vue";
import { Autoplay, EffectFade } from "swiper/modules";
import { formatPrice } from "../../utils/format";

import "swiper/css";
import "swiper/css/effect-fade";

const slides = [
  {
    tag: "New Arrival",
    title: "AirPods Pro Max",
    subtitle: "Immersive Sound Experience",
    description: "Adaptive noise cancellation with spatial audio and premium comfort.",
    price: 45000,
    image: "https://images.unsplash.com/photo-1585386959984-a4155224a1ad"
  },
  {
    tag: "Flagship Device",
    title: "iPhone 15 Pro",
    subtitle: "Titanium. Power. Pro.",
    description: "A17 Pro chip with next-generation performance and pro camera system.",
    price: 180000,
    image: "https://images.unsplash.com/photo-1517336714731-489689fd1ca8"
  },
  {
    tag: "Productivity",
    title: "MacBook Air M3",
    subtitle: "Light. Fast. Silent.",
    description: "Ultra-thin design powered by Apple Silicon for extreme efficiency.",
    price: 220000,
    image: "https://images.unsplash.com/photo-1517336714731-489689fd1ca8"
  }
];
</script>

<style>
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slideUp {
  from { transform: translateY(20px); opacity: 0; }
  to { transform: translateY(0); opacity: 1; }
}

.animate-fadeIn {
  animation: fadeIn 0.8s ease forwards;
}

.animate-slideUp {
  animation: slideUp 0.8s ease forwards;
}

.delay-200 { animation-delay: 0.2s; }
.delay-300 { animation-delay: 0.3s; }
.delay-500 { animation-delay: 0.5s; }
</style>