<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <!-- Layout principale senza sfondi aggiuntivi -->
        <div class="min-h-screen">
            <!-- Navigazione principale -->
            <nav class="bg-transparent border-b border-light-gray shadow-sm">
                <!-- Barra superiore -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-16">
                        <div class="flex items-center">
                            <!-- Logo -->
                            <Link :href="route('dashboard')" class="flex items-center">
                                <ApplicationMark class="block h-10 w-auto" />
                                <span class="ml-2 text-xl font-bold text-yellow-400 transition duration-300 hover:text-yellow-500">STF</span>

                            </Link>
                        </div>

                        <!-- Link di navigazione -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-6 sm:flex">
                            <NavLink :href="route('dashboard')" :active="route().current('dashboard')" class="relative text-primary hover:text-yellow-300 transition duration-300">
                                Dashboard
                            </NavLink>
                            <NavLink :href="route('products.index')" :active="route().current('products.index')" class="relative text-primary hover:text-yellow-300 transition duration-300">
                                Products
                            </NavLink>
                        </div>

                        <!-- User Icon -->
                        <div class="hidden sm:flex sm:items-center">
                            <div class="relative ml-4">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <button class="flex items-center text-gray-600 hover:text-gray-800">
                                            <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                                            <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.show')">Profile</DropdownLink>
                                        <DropdownLink as="button" @click="logout">Log Out</DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Mobile Menu Button -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = !showingNavigationDropdown" class="p-2 rounded-md text-gray-400 hover:text-gray-600 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 focus:text-gray-600">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Menu di navigazione responsive -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': !showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')" class="text-primary hover:text-yellow-300 transition duration-300">
                            Dashboard
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('products.index')" :active="route().current('products.index')" class="text-primary hover:text-yellow-300 transition duration-300">
                            Products
                        </ResponsiveNavLink>
                    </div>

                    <!-- Opzioni per utente responsive -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                            <div class="ml-3">
                                <div class="font-medium text-base text-gray-800">{{ $page.props.auth.user.name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.show')" class="text-primary hover:text-yellow-300">Profile</ResponsiveNavLink>
                            <form method="POST" @submit.prevent="logout">
                                <ResponsiveNavLink as="button" class="text-primary hover:text-yellow-300">Log Out</ResponsiveNavLink>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

        
            <!-- Contenuto della pagina -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>

<style scoped>
/* Palette di colori aggiornati */
.bg-transparent {
    background-color: transparent;
}

.text-primary {
    color: #1e40af;
}

.text-primary-dark:hover {
    color: #1e3a8a;
}

.shadow-sm {
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

.text-gray-600 {
    color: #4b5563;
}

.text-gray-800 {
    color: #1f2937;
}

.hover\\:text-yellow-300:hover {
    color: #fbbf24;
}

.hover\\:bg-gray-200:hover {
    background-color: #e5e7eb;
}

.focus\\:outline-none:focus {
    outline: 2px solid transparent;
    outline-offset: 2px;
}
</style>
