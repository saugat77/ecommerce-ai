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
        <button
          v-for="tab in tabs"
          :key="tab.key"
          @click="activeTab = tab.key"
          class="relative pb-1 transition"
          :class="activeTab === tab.key ? 'text-black' : 'hover:text-black'"
        >
          {{ tab.label }}

          <span
            v-if="activeTab === tab.key"
            class="absolute left-0 -bottom-1 w-full h-[2px] bg-black rounded-full"
          />
        </button>
      </div>

    </div>

    <!-- SLIDER -->
    <Splide
      :options="{
        perPage: 4,
        gap: '2rem',
        arrows: false,
        pagination: false,
        breakpoints: {
          1024: { perPage: 3 },
          768: { perPage: 2 },
          480: { perPage: 1.2 }
        }
      }"
    >

      <SplideSlide
        v-for="product in filteredProducts"
        :key="product.id"
      >

        <!-- LUXURY CARD -->
        <div class="group relative">

          <!-- GLASS CARD -->
          <div class="relative overflow-hidden rounded-3xl bg-white/70 backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-white/40 transition-all duration-300 group-hover:-translate-y-2 group-hover:shadow-[0_20px_60px_rgba(0,0,0,0.12)]">

            <!-- IMAGE -->
            <div class="relative overflow-hidden">
              <img
                :src="product.image"
                class="w-full h-56 object-cover transition duration-700 group-hover:scale-110"
              />

              <!-- soft gradient overlay -->
              <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>

              <!-- tag -->
              <span class="absolute top-4 left-4 px-3 py-1 text-xs bg-white/80 backdrop-blur-md text-gray-800 rounded-full">
                {{ product.tag }}
              </span>
            </div>

            <!-- CONTENT -->
            <div class="p-5">

              <h3 class="text-base font-semibold text-gray-900 truncate">
                {{ product.name }}
              </h3>

             <p class="text-sm text-gray-500 mt-1 overflow-hidden text-ellipsis line-clamp-fallback">
                {{ product.description }}
                </p>

              <div class="flex items-center justify-between mt-5">

                <span class="text-lg font-semibold text-gray-900">
                  Rs {{ product.price }}
                </span>

                <button
                  class="px-4 py-1.5 text-sm rounded-full bg-black text-white hover:bg-gray-800 transition"
                >
                  Add to bag
                </button>

              </div>

            </div>

          </div>

        </div>

      </SplideSlide>

    </Splide>

  </div>
</template>

<script>
export default {
  props: {
    products: {
      type: Object,
      default: () => ({
        hot: [],
        recent: [],
        popular: []
      })
    }
  },

  data() {
    return {
      activeTab: 'hot',

      tabs: [
        { label: 'Hot', key: 'hot' },
        { label: 'Recent', key: 'recent' },
        { label: 'Popular', key: 'popular' }
      ]
    }
  },

  computed: {
    filteredProducts() {
      return this.products?.[this.activeTab] || []
    }
  }
}
</script>