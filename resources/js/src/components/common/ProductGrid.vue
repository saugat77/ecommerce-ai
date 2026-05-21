<template>
    <div class="container py-4">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="fw-bold mb-1">Products</h3>
                <p class="text-muted mb-0">Discover amazing deals</p>
            </div>

        </div>

        <!-- GRID -->
       <div class="col-xl-3 col-lg-4 col-md-6" v-for="product in products" :key="product.id">

  <div class="product-card h-full flex flex-col">

    <!-- IMAGE (fixed height) -->
    <div class="relative h-[220px] overflow-hidden">

      <img
        :src="product.image"
        class="w-full h-full object-cover transition duration-300 hover:scale-105"
      />

      <span
        class="absolute top-3 left-3 text-xs px-2 py-1 rounded-full text-white"
        :class="tagClass(product.tag)"
      >
        {{ product.tag }}
      </span>

    </div>

    <!-- BODY (fixed structure) -->
    <div class="p-4 flex flex-col flex-1 justify-between">

      <div>

        <h3 class="text-base font-semibold text-gray-900 truncate">
          {{ product.name }}
        </h3>

        <p class="text-sm text-gray-500 mt-1 line-clamp-2">
          {{ product.description }}
        </p>

      </div>

      <!-- PRICE + BUTTON -->
      <div class="flex items-center justify-between mt-4">

        <span class="text-lg font-semibold text-gray-900">
          Rs {{ product.price }}
        </span>

        <button class="px-4 py-1.5 text-sm rounded-full bg-black text-white hover:bg-gray-800">
          Add
        </button>

      </div>

    </div>

  </div>

</div>
    </div>
</template>

<script>
export default {
    name: "ProductGrid",

    props: {
        products: {
            type: Array,
            default: () => []
        }
    },

    methods: {
        tagClass(tag) {
            switch (tag) {
                case "Hot":
                    return "bg-danger";
                case "Popular":
                    return "bg-primary";
                case "Recent":
                    return "bg-success";
                case "On Sale":
                    return "bg-warning text-dark";
                default:
                    return "bg-secondary";
            }
        }
    }
};
</script>

<style scoped>
.product-card {
  background: #fff;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
  transition: 0.25s;
  height: 100%;
}

.product-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 14px 30px rgba(0, 0, 0, 0.12);
}
</style>