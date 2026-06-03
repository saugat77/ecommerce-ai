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
import { ProductAPI } from "../../../api/product.api.js";
import { Autoplay } from "swiper/modules";
import { onMounted } from "vue";
import "swiper/css";

// cart
const cart = useCartStore();

// products
const loadProducts = async (params = {}) => {
    const res = await ProductAPI.list(params);
    products.value = res.data.data;
};
const products = ref([]);

onMounted(() => {
    loadProducts({ type: 'best-selling' });
});
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