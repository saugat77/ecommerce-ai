<template>
  <div class="w-full py-12">

    <!-- HEADER -->
    <div class="flex items-end justify-between mb-10">

      <div>
        <h2 class="text-3xl font-semibold text-gray-900 tracking-tight">
          Trending Collection
        </h2>
        <p class="text-sm text-gray-500 mt-1">
          Premium picks curated for you
        </p>
      </div>

      <!-- subtle tabs -->
      <div class="flex gap-5 text-sm text-gray-500">
        <button v-for="tab in tabs" :key="tab.key" @click="activeTab = tab.key" class="relative pb-1 transition"
          :class="activeTab === tab.key ? 'text-black' : 'hover:text-black'">
          {{ tab.label }}

          <span v-if="activeTab === tab.key" class="absolute left-0 -bottom-1 w-full h-[2px] bg-black rounded-full" />
        </button>
      </div>

    </div>

    <!-- SLIDER -->
    <Swiper :modules="[Autoplay]" :slides-per-view="4" :space-between="24" :breakpoints="breakpoints"
      class="w-full min-h-[400px]" :grab-cursor="true" :loop="true" :autoplay="{
        delay: 1500,
        disableOnInteraction: false
      }">

      <SwiperSlide v-for="product in filteredProducts" :key="product.id">
        <ProductCard :product="product" @add-to-cart="addToCart" />
      </SwiperSlide>

    </Swiper>

  </div>
</template>

<script setup>
import { ref, computed } from "vue";
import ProductCard from "../product/ProductCard.vue";
import { useCartStore } from "../../../stores/cart.store";
import { Autoplay } from "swiper/modules";

// state
const activeTab = ref("hot");

const tabs = [
  { label: "Hot", key: "hot" },
  { label: "Recent", key: "recent" },
  { label: "Popular", key: "popular" }
];

// props
const props = defineProps({
  products: {
    type: Object,
    default: () => ({
      hot: [],
      recent: [],
      popular: []
    })
  }
});

// pinia
const cart = useCartStore();

// computed
const filteredProducts = computed(() => {
  return props.products?.[activeTab.value] || [];
});

// actions
const addToCart = async (product) => {
  await cart.addToCart(product.id);
};

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
const modules = [];
</script>