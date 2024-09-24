<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

// Stato per il controllo dell'opacità della barra
const isScrolled = ref(false);

// Aggiungiamo un listener per la scroll per cambiare l'opacità della barra
onMounted(() => {
    const handleScroll = () => {
        if (window.scrollY > 50) {
            isScrolled.value = true;
        } else {
            isScrolled.value = false;
        }
    };

    window.addEventListener('scroll', handleScroll);

    // Rimuoviamo l'evento quando il componente è smontato
    onUnmounted(() => {
        window.removeEventListener('scroll', handleScroll);
    });
});
</script>

<template>
    <Head title="Welcome" />

    <!-- Barra superiore con transizione di opacità -->
    <div
        :class="{
            'bg-transparent': !isScrolled,
            'bg-gray-800 bg-opacity-90': isScrolled,
        }"
        class="sticky top-0 z-50 w-full shadow-md transition-all duration-300"
    >
        <div class="relative flex justify-between items-center px-6 py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <img src="/images/logo1.png" alt="Shop Logo" class="h-12 w-12 rounded-full " />
            </div>

            <!-- Testo "SHOP" centrato con effetto hover -->
            <div class="absolute left-1/2 transform -translate-x-1/2 text-center">
                <h1 class="relative text-3xl font-bold text-yellow-400 transition duration-300 hover:text-yellow-500">
                    SaveTheFood
                </h1>
            </div>

            <!-- Bottoni per login/register con effetto hover -->
            <nav v-if="canLogin" class="flex space-x-4">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="relative text-lg font-semibold text-yellow-400 transition duration-300 hover:text-yellow-500"
                >
                    Dashboard
                </Link>
                <template v-else>
                    <Link
                        :href="route('login')"
                        class="relative text-lg font-semibold text-yellow-400 transition duration-300 hover:text-yellow-500"
                    >
                        Log in
                    </Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="relative text-lg font-semibold text-yellow-400 transition duration-300 hover:text-yellow-500"
                    >
                        Register
                    </Link>
                </template>
            </nav>
        </div>
    </div>

    <!-- Contenuto principale con background color -->
    <main class="mt-0 bg-gray-800 bg-opacity-90">
        <!-- Sezione principale con immagine e pulsante "Shop" -->
        <section class="relative flex items-center justify-center h-screen bg-cover bg-center text-white" style="background-image: url('/images/shop-image1.jpg');">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
            <div class="relative z-10 text-center">
                <h1 class="text-6xl font-extrabold mb-6">Eco-Friendly Products</h1>
                <p class="text-lg mb-8">Discover our range of eco-friendly products and reduce food waste today.</p>
                <button class="px-8 py-3 bg-green-500 hover:bg-green-600 text-white font-bold rounded-lg transition duration-300">Shop Now</button>
            </div>
        </section>

        <!-- Sezione con 3 contenitori per i prodotti -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6 p-8 max-w-7xl mx-auto">
            <!-- Primo div con gradiente viola ridotto -->
            <div class="bg-gradient-to-br from-purple-600 via-purple-500 to-purple-700 rounded-xl p-6 text-white text-center shadow-lg hover:scale-105 transition-transform">
                <h2 class="text-2xl font-bold mb-4">Reduce Sirendly Products</h2>
                <p class="mb-6">Shop our range of eco-friendly products.</p>
                <button class="px-6 py-2 bg-white text-purple-700 font-bold rounded-lg transition duration-300">Shop</button>
            </div>

            <!-- Secondo div con gradiente blu ridotto -->
            <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 rounded-xl p-6 text-white text-center shadow-lg hover:scale-105 transition-transform">
                <h2 class="text-2xl font-bold mb-4">Reduce Food</h2>
                <p class="mb-6">Explore how to reduce food waste.</p>
                <button class="px-6 py-2 bg-white text-blue-700 font-bold rounded-lg transition duration-300">Shop</button>
            </div>

            <!-- Terzo div con gradiente verde ridotto -->
            <div class="bg-gradient-to-br from-green-600 via-green-500 to-green-700 rounded-xl p-6 text-white text-center shadow-lg hover:scale-105 transition-transform">
                <h2 class="text-2xl font-bold mb-4">Reduce Food Waste</h2>
                <p class="mb-6">Join our mission to reduce food waste.</p>
                <button class="px-6 py-2 bg-white text-green-700 font-bold rounded-lg transition duration-300">Shop</button>
            </div>
        </section>
    </main>

    <!-- Footer con colore uguale al background principale -->
    <footer class="py-16 text-center text-sm text-gray-300 bg-gray-800 bg-opacity-90">
        Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
    </footer>
</template>

<style scoped>
/* Usando classi di Tailwind CSS per la maggior parte, stili personalizzati minimi */
.bg-black {
    background-color: rgba(0, 0, 0, 0.6);
}

.hover\:scale-105:hover {
    transform: scale(1.05);
}
</style>
