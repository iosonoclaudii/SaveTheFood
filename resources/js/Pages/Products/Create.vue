<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const form = ref({
  name: '',
  type: '',
  price: '',
  discounted_price: '',
  store: '',
  city: ''
});

const submit = () => {
  Inertia.post(route('products.store'), form.value);
};
</script>

<template>
  <AppLayout title="Create Product">
    <div class="relative min-h-screen bg-gradient-to-br from-green-100 via-blue-200 to-green-50 overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-r from-blue-100 via-green-100 to-blue-100 opacity-20"></div>

      <div class="relative z-10 p-6 lg:p-8 text-center">
        <h1 class="text-5xl font-extrabold text-green-600 tracking-wide transition duration-300 hover:text-green-500">
          Create Product
        </h1>
      </div>

      <div class="relative z-10 max-w-4xl mx-auto bg-white shadow-xl rounded-lg p-8 mt-10">
        <form @submit.prevent="submit">
          <div class="mb-6">
            <label class="block text-lg font-semibold text-gray-700">Name</label>
            <input v-model="form.name" type="text" required class="mt-2 w-full border rounded-md p-3 focus:ring focus:ring-blue-200 shadow" />
          </div>

          <div class="mb-6">
            <label class="block text-lg font-semibold text-gray-700">Type</label>
            <select v-model="form.type" required class="mt-2 w-full border rounded-md p-3 focus:ring focus:ring-blue-200 shadow">
              <option value="vegetable">Vegetable</option>
              <option value="fruit">Fruit</option>
            </select>
          </div>

          <div class="mb-6">
            <label class="block text-lg font-semibold text-gray-700">Price</label>
            <input v-model="form.price" type="number" step="0.01" required class="mt-2 w-full border rounded-md p-3 focus:ring focus:ring-blue-200 shadow" />
          </div>

          <div class="mb-6">
            <label class="block text-lg font-semibold text-gray-700">Discounted Price</label>
            <input v-model="form.discounted_price" type="number" step="0.01" class="mt-2 w-full border rounded-md p-3 focus:ring focus:ring-blue-200 shadow" />
          </div>

          <div class="mb-6">
            <label class="block text-lg font-semibold text-gray-700">Store</label>
            <input v-model="form.store" type="text" class="mt-2 w-full border rounded-md p-3 focus:ring focus:ring-blue-200 shadow" />
          </div>

          <div class="mb-6">
            <label class="block text-lg font-semibold text-gray-700">City</label>
            <input v-model="form.city" type="text" class="mt-2 w-full border rounded-md p-3 focus:ring focus:ring-blue-200 shadow" />
          </div>

          <div class="flex justify-between items-center mt-8">
            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md shadow hover:bg-blue-600 transition">Create</button>
            <a :href="route('products.index')" class="bg-gray-500 text-white px-6 py-3 rounded-md shadow hover:bg-gray-600 transition">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </AppLayout>
</template>
