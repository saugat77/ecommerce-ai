<template>
  <div class="shop-page">

    <div class="shop-container">

      <div class="row g-4">

        <!-- LEFT FILTER -->
        <div class="col-lg-3">

          <ShopFilter
            :categories="categories"
            @filter="applyFilter"
          />

        </div>

        <!-- RIGHT PRODUCTS -->
        <div class="col-lg-9">

          <!-- TOP BAR -->
          <div class="shop-topbar">

            <h5 class="mb-0">
              Shop Products
            </h5>

            <select class="form-select w-auto">
              <option>Newest</option>
              <option>Popular</option>
              <option>Price Low → High</option>
            </select>

          </div>

          <!-- OPTIONAL SMALL TRENDING -->
          <TrendingSlider compact />

          <!-- PRODUCT GRID -->
          <ProductGrid
            :products="products"
          />

          <!-- PAGINATION -->
          <div class="d-flex justify-content-center mt-4">
            <ul class="pagination">
              <li class="page-item active">
                <button class="page-link">1</button>
              </li>
            </ul>
          </div>

        </div>

      </div>

    </div>

  </div>
</template>

<script>
import ShopFilter from '@/components/ShopFilter.vue'
import ProductGrid from '@/components/ProductGrid.vue'
import TrendingSlider from '@/components/TrendingSlider.vue'

export default {
  components: {
    ShopFilter,
    ProductGrid,
    TrendingSlider
  },

  data() {
    return {
      categories: [],
      products: []
    }
  },

  methods: {
    applyFilter(data) {
      console.log(data)
    }
  }
}
</script>