<template>
  <div>
    <h3 class="mb-4">Products</h3>

    <div class="row">
      <div class="col-md-3 mb-4" v-for="product in products" :key="product.id">

        <div class="card h-100 shadow-sm">
          <img :src="product.image" class="card-img-top" />

          <div class="card-body">
            <h6 class="card-title">{{ product.name }}</h6>
            <p class="text-muted mb-2">Rs. {{ product.price }}</p>

            <button class="btn btn-primary btn-sm w-100">
              Add to Cart
            </button>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: []
    };
  },
  mounted() {
    // fetch API here
  }
};
</script>