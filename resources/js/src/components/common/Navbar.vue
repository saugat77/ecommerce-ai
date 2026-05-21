<template>
  <nav class="bg-white shadow px-6 py-4 flex justify-between items-center">

    <div class="font-bold text-whiyte">
      🛒 My Store
    </div>

    <div class="flex gap-6 text-gray-700">
      <a href="/" class="hover:text-blue-500">Home</a>
      <a href="/cart" class="hover:text-blue-500">
        Cart ({{ cartCount }})
      </a>
    </div>

  </nav>
</template>