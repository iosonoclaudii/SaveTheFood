<script setup>
import ApplicationMark from '@/Components/ApplicationMark.vue';
</script>

<template>
    <!-- Background globale con design moderno -->
    <div class="relative min-h-screen bg-gradient-to-br from-green-100 via-blue-200 to-green-50 overflow-hidden">
        <!-- Effetto di luce sul background -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-100 via-green-100 to-blue-100 opacity-20"></div>

        <!-- Sezione Header con logo e benvenuto -->
        <div class="relative z-10 p-6 lg:p-8 text-center">
            <div class="flex items-center justify-center space-x-4"> 
                
                <!-- Titolo -->
                <h1 class="text-5xl font-extrabold text-green-600 tracking-wide transition duration-300 hover:text-green-500">
                    Welcome to Your Sustainable Shop!
                </h1>
                <!-- Logo -->
                <ApplicationMark class="block h-16 w-auto" />
            </div>
            <p class="mt-6 text-lg text-gray-700 max-w-2xl mx-auto">
                We are committed to reducing food waste. Discover our eco-friendly products and support our mission for a greener future.
            </p>
        </div>

        <!-- Step Section senza animazioni sugli step -->
        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto">
            <!-- Step 1 -->
            <div class="flex flex-col items-center text-center">
                <div class="h-16 w-16 rounded-full bg-green-600 text-white flex items-center justify-center text-2xl font-bold mb-4">
                    1
                </div>
                <h3 class="text-2xl font-bold text-green-600 mb-2">Choose Your Items</h3>
                <p class="text-gray-600">
                    Browse through a wide variety of fresh fruits and vegetables that you want to save.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="flex flex-col items-center text-center">
                <div class="h-16 w-16 rounded-full bg-green-600 text-white flex items-center justify-center text-2xl font-bold mb-4">
                    2
                </div>
                <h3 class="text-2xl font-bold text-green-600 mb-2">Pick Up Your Order</h3>
                <p class="text-gray-600">
                    Once your order is placed, pick it up at your preferred location.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="flex flex-col items-center text-center">
                <div class="h-16 w-16 rounded-full bg-green-600 text-white flex items-center justify-center text-2xl font-bold mb-4">
                    3
                </div>
                <h3 class="text-2xl font-bold text-green-600 mb-2">Make a Positive Impact</h3>
                <p class="text-gray-600">
                    Enjoy your food while knowing you've helped reduce waste and supported sustainability.
                </p>
            </div>
        </div>

        <!-- Griglia di immagini dinamiche -->
        <div class="relative z-10 mt-10 mb-12 px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-7xl mx-auto">
            <div class="h-64 w-full relative group">
                <img src="/images/welcome1.jpg" alt="Eco-friendly Products" class="object-cover h-full w-full rounded-lg shadow-lg transform transition-transform duration-500 hover:scale-110 hover:shadow-2xl">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h2 class="text-2xl font-bold text-yellow-300">Eco-Friendly Products</h2>
                </div>
            </div>
            <div class="h-64 w-full relative group">
                <img src="/images/welcome2.jpg" alt="Sustainable Living" class="object-cover h-full w-full rounded-lg shadow-lg transform transition-transform duration-500 hover:scale-110 hover:shadow-2xl">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h2 class="text-2xl font-bold text-yellow-300">Sustainable Living</h2>
                </div>
            </div>
            <div class="h-64 w-full relative group">
                <img src="/images/welcome3.jpg" alt="Save the Planet" class="object-cover h-full w-full rounded-lg shadow-lg transform transition-transform duration-500 hover:scale-110 hover:shadow-2xl">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h2 class="text-2xl font-bold text-yellow-300">Save the Planet</h2>
                </div>
            </div>
        </div>

        <!-- Sezioni unite: Our Mission, Benefits e Advantages senza distanziamento -->
        <div class="relative z-10">
            <!-- Our Mission Section -->
            <div class="p-8 lg:p-12 bg-gray-900 border-b border-gray-700 shadow-lg">
                <h2 class="text-4xl font-semibold text-yellow-400 text-center">Our Mission</h2>
                <p class="mt-6 text-lg text-gray-300 leading-relaxed text-center max-w-3xl mx-auto">
                    Our platform connects you with stores that prioritize sustainability. These stores carefully curate products that might otherwise go to waste. By purchasing these discounted items, you contribute to reducing food waste and enjoy quality products at lower prices.
                </p>
            </div>

            <!-- Benefits Section (nessuno spazio tra le sezioni) -->
            <div class="p-8 lg:p-12 bg-gray-900 border-b border-gray-700 shadow-lg">
                <h2 class="text-4xl font-semibold text-yellow-400 text-center">Benefits for You</h2>
                <p class="mt-6 text-lg text-gray-300 leading-relaxed text-center max-w-3xl mx-auto">
                    By shopping with us, you not only save money but also support local businesses that are committed to reducing waste. Every purchase helps prevent good food from being discarded, promoting a sustainable and responsible way of living.
                </p>
            </div>

            <!-- Advantages Section (nessuno spazio tra le sezioni) -->
            <div class="p-8 lg:p-12 bg-gray-900 border-b border-gray-700 shadow-lg">
                <h2 class="text-4xl font-semibold text-yellow-400 text-center">Advantages of Sustainable Shopping</h2>
                <p class="mt-6 text-lg text-gray-300 leading-relaxed text-center max-w-3xl mx-auto">
                    Sustainable shopping allows you to access fresh products that are still good for consumption but might have minor imperfections. These products are offered at a discounted rate, providing you with the opportunity to enjoy high-quality food while also contributing to the reduction of food waste.
                </p>
            </div>
        </div>
        
        <!-- Footer con funzionalità aggiuntive -->
        <div class="relative z-10 bg-gray-800 bg-opacity-70 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 p-8">
            <!-- Aggiungere qui contenuti aggiuntivi -->
        </div>
    </div>
</template>

<style scoped>
/* Miglioramento dell'effetto hover per un look pulito */
.group:hover .group-hover\:opacity-100 {
    opacity: 1;
}
.group:hover .hover\:scale-110:hover {
    transform: scale(1.05);
}

/* Animazione leggera del background */
@keyframes pulse {
    0%, 100% {
        opacity: 0.4;
    }
    50% {
        opacity: 1;
    }
}
</style>
