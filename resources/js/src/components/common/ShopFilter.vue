
<template>
  <div class="filter-panel">

    <h5 class="fw-bold mb-4">
      Filters
    </h5>

    <!-- CATEGORY -->
    <div class="mb-4">

      <h6 class="small text-muted">
        Categories
      </h6>

      <button
        v-for="cat in categories"
        :key="cat.id"
        class="btn btn-filter w-100 mb-2"
        @click="$emit('filter', cat)"
      >
        {{ cat.name }}
      </button>

    </div>

    <!-- PRICE -->
    <div class="mb-4">

      <h6 class="small text-muted">
        Price Range
      </h6>

      <input type="range" class="form-range">

    </div>

  </div>
</template>

<script>
export default {
  props: {
    categories: Array
  }
}
</script>