<template>
  <div class="min-h-screen bg-[#f5f5f7]">

    <!-- HERO OFFER -->
    <section class="max-w-7xl mx-auto px-6 pt-16 pb-10">

      <div class="bg-black text-white rounded-[40px] overflow-hidden relative">

        <div class="grid lg:grid-cols-2 gap-10 items-center p-10 lg:p-16">

          <!-- TEXT -->
          <div>

            <p class="text-sm uppercase tracking-[0.3em] text-white/60 mb-4">
              Limited Time Offer
            </p>

            <h1 class="text-5xl font-semibold leading-tight">
              Up to 40% Off
              <span class="block text-white/70">Premium Collection</span>
            </h1>

            <p class="mt-6 text-white/60 max-w-md">
              Grab exclusive discounts on top-rated products. Limited stock available — don’t miss out.
            </p>

            <button
              class="mt-8 px-6 py-3 bg-white text-black rounded-full font-medium
                     hover:bg-gray-200 transition active:scale-95"
            >
              Shop Deals
            </button>

          </div>

          <!-- IMAGE -->
          <div class="relative">
            <img
              src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8"
              class="w-full h-[380px] object-cover rounded-[30px]"
            />

            <!-- floating badge -->
            <div
              class="absolute -bottom-6 -left-6 bg-white text-black rounded-2xl px-5 py-3 shadow-xl"
            >
              <p class="text-xs text-gray-500">Starting from</p>
              <p class="text-lg font-semibold">Rs 22,000</p>
            </div>

          </div>

        </div>

      </div>

    </section>

    <!-- OFFERS GRID -->
    <section class="max-w-7xl mx-auto px-6 pb-20">

      <!-- HEADER -->
      <div class="flex items-end justify-between mb-10">

        <div>
          <h2 class="text-3xl font-semibold text-[#1d1d1f]">
            Hot Deals
          </h2>
          <p class="text-gray-500 mt-1">
            Best discounts curated for you
          </p>
        </div>

      </div>

      <!-- GRID -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-7">

        <div
          v-for="product in offers"
          :key="product.id"
          class="group bg-white rounded-[30px] overflow-hidden shadow-sm hover:shadow-xl
                 transition-all duration-300 border border-gray-100"
        >


        </div>

      </div>

    </section>

  </div>
</template>

<script setup>

const offers = [
  {
    id: 1,
    name: "MacBook Air M3",
    description: "Ultra-light performance laptop for professionals",
    price: 220000,
    original_price: 250000,
    discount: 12,
    image: "https://images.unsplash.com/photo-1517336714731-489689fd1ca8"
  },
  {
    id: 2,
    name: "iPhone 15 Pro",
    description: "Titanium design with pro-level performance",
    price: 180000,
    original_price: 200000,
    discount: 10,
    image: "https://images.unsplash.com/photo-1696446706500-3b2f0c6e6f1c"
  },
  {
    id: 3,
    name: "AirPods Pro Max",
    description: "Immersive sound with noise cancellation",
    price: 45000,
    original_price: 55000,
    discount: 18,
    image: "https://images.unsplash.com/photo-1585386959984-a4155224a1ad"
  }
];
</script>