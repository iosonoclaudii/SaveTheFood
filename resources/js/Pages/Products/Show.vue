<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
  product: Object
});

const formatPrice = (price) => {
  return price ? parseFloat(price).toFixed(2).replace('.', ',') : '-';
};
</script>

<template>
  <AppLayout title="Product Details">
    <div class="relative min-h-screen bg-gradient-to-br from-green-100 via-blue-200 to-green-50 overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-r from-blue-100 via-green-100 to-blue-100 opacity-20"></div>

      <div class="relative z-10 p-6 lg:p-8 text-center">
        <h1 class="text-5xl font-extrabold text-green-600 tracking-wide transition duration-300 hover:text-green-500">
          Product Details
        </h1>
      </div>

      <div class="relative z-10 max-w-4xl mx-auto bg-white shadow-xl rounded-lg p-8 mt-10">
        <div class="mb-6">
          <strong class="block text-lg font-semibold text-gray-700">Name:</strong>
          <p>{{ product.name }}</p>
        </div>

        <div class="mb-6">
          <strong class="block text-lg font-semibold text-gray-700">Type:</strong>
          <p>{{ product.type }}</p>
        </div>

        <div class="mb-6">
          <strong class="block text-lg font-semibold text-gray-700">Price:</strong>
          <p>{{ formatPrice(product.price) }}</p>
        </div>

        <div class="mb-6">
          <strong class="block text-lg font-semibold text-gray-700">Discounted Price:</strong>
          <p>{{ formatPrice(product.discounted_price) }}</p>
        </div>

        <div class="mb-6">
          <strong class="block text-lg font-semibold text-gray-700">Store:</strong>
          <p>{{ product.store }}</p>
        </div>

        <div class="mb-6">
          <strong class="block text-lg font-semibold text-gray-700">City:</strong>
          <p>{{ product.city }}</p>
        </div>

        <div class="flex justify-between items-center mt-8">
          <a :href="route('products.index')" class="bg-blue-500 text-white px-6 py-3 rounded-md shadow hover:bg-blue-600 transition">Back to Products</a>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
