<template>
  <div
    class="group bg-white rounded-[32px] overflow-hidden border border-gray-200/60
           shadow-[0_4px_20px_rgba(0,0,0,0.04)]
           hover:shadow-[0_25px_60px_rgba(0,0,0,0.10)]
           transition-all duration-500 hover:-translate-y-2
           flex flex-col h-full"
  >

    <!-- IMAGE (fixed zone) -->
    <div class="relative bg-[#fafafa] overflow-hidden h-[300px] flex-shrink-0">

      <img
        :src="product.image"
        :alt="product.name"
        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
      />

      <div class="absolute top-4 left-4 px-3 py-1 rounded-full
                  bg-white/80 backdrop-blur-xl text-[11px]
                  font-semibold border border-gray-200">
        {{ product.tag || "BEST SELLER" }}
      </div>

    </div>

    <!-- CONTENT (flex grow zone) -->
    <div class="p-6 flex flex-col flex-1">

      <!-- CATEGORY -->
      <p class="text-[10px] uppercase tracking-[0.25em] text-gray-400 mb-2">
        {{ product.category }}
      </p>

      <!-- TITLE (fixed height) -->
      <h3
        class="text-lg font-semibold text-[#1d1d1f] leading-tight
               line-clamp-2 h-[48px] overflow-hidden"
      >
        {{ product.name }}
      </h3>

      <!-- DESCRIPTION (fixed height too) -->
      <p class="text-sm text-gray-500 mt-2 line-clamp-2 h-[40px] overflow-hidden">
        {{ product.description }}
      </p>

      <!-- PUSH FOOTER DOWN -->
      <div class="mt-auto pt-6 flex items-end justify-between">

        <!-- PRICE -->
        <div class="flex flex-col leading-none">
          <span class="text-[10px] uppercase tracking-[0.2em] text-gray-400">
            Price
          </span>

          <div class="flex items-baseline gap-1 mt-1">
            <span class="text-xs text-gray-500 font-medium">Rs</span>
            <span class="text-2xl font-semibold text-[#1d1d1f]">
              {{ formatPrice(product.price) }}
            </span>
          </div>
        </div>

        <!-- CART BUTTON -->
        <button
          class="group/btn relative w-11 h-11 rounded-full bg-white border border-gray-200
                 flex items-center justify-center overflow-hidden
                 transition-all duration-300 hover:border-[#1d1d1f]
                 active:scale-95"
          @click="$emit('add-to-cart', product)"
        >

          <span class="absolute inset-0 bg-[#1d1d1f] scale-0 group-hover/btn:scale-100
                       transition-transform duration-300 rounded-full"></span>

          <svg
            class="relative z-10 w-5 h-5 text-[#1d1d1f]
                   group-hover/btn:text-white transition-all duration-300"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            viewBox="0 0 24 24"
          >
            <circle cx="9" cy="21" r="1"></circle>
            <circle cx="20" cy="21" r="1"></circle>
            <path d="M1 1h4l2.7 13h10l3-10H6"></path>
          </svg>

        </button>

      </div>

    </div>

  </div>
</template>

<script setup>
import { formatPrice } from "../../utils/format";

// props
defineProps({
  product: {
    type: Object,
    required: true
  }
});
</script>