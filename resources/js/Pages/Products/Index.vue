<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ApplicationMark from '@/Components/ApplicationMark.vue'; // Importiamo il logo
</script>

<template>
  <AppLayout title="Products">
    <div class="relative min-h-screen bg-gradient-to-br from-green-100 via-blue-200 to-green-50 overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-r from-blue-100 via-green-100 to-blue-100 opacity-20"></div>

      <!-- Sezione del titolo con logo -->
      <div class="relative z-10 p-6 lg:p-8 text-center">
        <div class="flex items-center justify-center">
          <h2 class="ml-4 text-4xl font-extrabold text-green-600 tracking-wide transition duration-300 hover:text-green-500">
            Products List
          </h2>
          <ApplicationMark class="block h-12 w-auto" />
        </div>
        <div class="mt-6 max-w-2xl mx-auto flex justify-between items-center">
          <a :href="route('products.create')" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Product</a>

          <input v-model="searchQuery" type="text" placeholder="Search products..." class="border rounded-md p-2 ml-4 shadow focus:ring focus:ring-blue-200" />
        </div>
      </div>

      <!-- Layout desktop e mobile -->
      <div class="relative z-10 max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10 bg-white shadow-xl rounded-lg p-6">
        <!-- Layout per desktop (tabella tradizionale) -->
        <table class="hidden sm:table min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="text-left text-gray-700">Select</th>
              <th class="text-left text-gray-700">Name</th>
              <th class="text-left text-gray-700">Special Price</th>
              <th class="text-left text-gray-700">City</th>
              <th class="text-left text-gray-700">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr 
              v-for="product in filteredProducts" 
              :key="product.id" 
              @click="toggleSelectProduct(product)"
              class="cursor-pointer hover:bg-gray-100"
            >
              <td><input type="checkbox" v-model="selectedProducts" :value="product" /></td>
              <td>{{ product.name }}</td>
              <td>{{ formatPrice(product.discounted_price) }}</td>
              <td>{{ product.city || '-' }}</td>
              <td class="flex space-x-2" @click.stop>
                <a :href="route('products.show', product.id)" class="text-blue-600 hover:text-blue-800 transition">
                  <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 3.5C7.5 3.5 3.5 6.8 2 12c1.5 5.2 5.5 8.5 10 8.5s8.5-3.3 10-8.5C20.5 6.8 16.5 3.5 12 3.5z"/>
                    <circle cx="12" cy="12" r="3"/>
                  </svg>
                </a>
                <a :href="route('products.edit', product.id)" class="text-green-600 hover:text-green-800 transition">
                  <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M4 16v3h3l10-10-3-3L4 16zm12.7-12.7c.39-.39 1.02-.39 1.41 0l2.29 2.29c.39.39.39 1.02 0 1.41l-1.88 1.88-3.7-3.7L16.7 3.3z"/>
                  </svg>
                </a>
                <button @click="deleteProduct(product.id)" class="text-red-600 hover:text-red-800 transition">
                  <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3 6h18v2H3zm2 4h14v10H5zm3-6h4v2H8zm2 2V5h4v2zM8 18h8v2H8z"/>
                  </svg>
                </button>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- Layout per mobile (schede) -->
        <div class="grid grid-cols-1 gap-6 sm:hidden">
          <div v-for="product in filteredProducts" :key="product.id" class="bg-white p-4 rounded-lg shadow-md">
            <div class="flex items-center justify-between mb-4">
              <div class="text-lg font-semibold text-green-600">{{ product.name }}</div>
              <input type="checkbox" v-model="selectedProducts" :value="product" class="rounded" />
            </div>
            <div class="mb-2">
              <span class="font-bold text-gray-700">Special Price:</span> {{ formatPrice(product.discounted_price) }}
            </div>
            <div class="mb-2">
              <span class="font-bold text-gray-700">City:</span> {{ product.city || '-' }}
            </div>
            <div class="flex justify-between mt-4">
              <a :href="route('products.show', product.id)" class="text-blue-600 hover:text-blue-800 transition">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 3.5C7.5 3.5 3.5 6.8 2 12c1.5 5.2 5.5 8.5 10 8.5s8.5-3.3 10-8.5C20.5 6.8 16.5 3.5 12 3.5z"/>
                  <circle cx="12" cy="12" r="3"/>
                </svg>
              </a>
              <a :href="route('products.edit', product.id)" class="text-green-600 hover:text-green-800 transition">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M4 16v3h3l10-10-3-3L4 16zm12.7-12.7c.39-.39 1.02-.39 1.41 0l2.29 2.29c.39.39.39 1.02 0 1.41l-1.88 1.88-3.7-3.7L16.7 3.3z"/>
                </svg>
              </a>
              <button @click="deleteProduct(product.id)" class="text-red-600 hover:text-red-800 transition">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M3 6h18v2H3zm2 4h14v10H5zm3-6h4v2H8zm2 2V5h4v2zM8 18h8v2H8z"/>
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Pulsante di conferma dell'acquisto -->
        <div class="mt-4 flex justify-between items-center">
          <!-- Totale selezionato spostato a sinistra -->
          <strong class="text-left">Total Selected Products Special Price: {{ totalSelectedPrice }}</strong>
          
          <!-- Pulsante di conferma acquisto -->
          <button @click="confirmPurchase" class="bg-green-500 text-white px-4 py-2 rounded-md shadow hover:bg-green-600 transition">
            Confirm Purchase
          </button>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
  props: {
    products: Array
  },
  data() {
    return {
      selectedProducts: [],
      searchQuery: ''
    };
  },
  computed: {
    filteredProducts() {
      if (this.searchQuery.trim()) {
        return this.products.filter((product) =>
          product.name.toLowerCase().includes(this.searchQuery.toLowerCase())
        );
      }
      return this.products;
    },
    totalSelectedPrice() {
      return this.selectedProducts.reduce((sum, product) => {
        let discountedPrice = parseFloat(product.discounted_price || 0);
        return sum + (isNaN(discountedPrice) ? 0 : discountedPrice);
      }, 0).toFixed(2).replace('.', ',');
    }
  },
  methods: {
    formatPrice(value) {
      let number = parseFloat(value);
      return isNaN(number) ? '-' : number.toFixed(2).replace('.', ',');
    },
    toggleSelectProduct(product) {
      const index = this.selectedProducts.indexOf(product);
      if (index === -1) {
        this.selectedProducts.push(product);
      } else {
        this.selectedProducts.splice(index, 1);
      }
    },
    confirmPurchase() {
      // Verifica se sono stati selezionati prodotti
      if (this.selectedProducts.length === 0) {
        alert('You have not selected any products.');
      } else if (confirm('Are you sure you want to proceed with the purchase?')) {
        alert('Thanks for confirming your purchase');
      }
    },
    deleteProduct(id) {
      if (confirm('Are you sure?')) {
        Inertia.delete(this.route('products.destroy', id));
      }
    }
  }
};
</script>
