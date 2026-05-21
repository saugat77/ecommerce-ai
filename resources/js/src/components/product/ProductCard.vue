<template>
  <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4">

    <div class="h-32 bg-gray-100 rounded mb-3"></div>

    <h3 class="font-semibold text-lg">
      {{ product.name }}
    </h3>

    <p class="text-green-600 font-bold">
      Rs {{ product.price }}
    </p>

    <p class="text-sm text-gray-500">
      Stock: {{ product.stock }}
    </p>

    <button
      class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg"
    >
      Add to Cart
    </button>

  </div>
</template>

<script setup>
defineProps({
  product: Object
});
</script>