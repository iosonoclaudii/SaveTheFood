<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue'; // Logo
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Forgot Password" />

    <!-- Sfondo globale con design moderno -->
    <div class="relative min-h-screen bg-gradient-to-br from-green-100 via-blue-200 to-green-50 overflow-hidden">
        <!-- Effetto di luce sul background -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-100 via-green-100 to-blue-100 opacity-20"></div>

        <!-- Sezione del titolo con logo -->
        <div class="relative z-10 p-6 lg:p-8 text-center">
            <div class="flex items-center justify-center">
                <h2 class="text-4xl font-extrabold text-green-600 tracking-wide transition duration-300 hover:text-green-500">
                    Forgot Password
                </h2>
                <ApplicationMark class="block h-12 w-auto ml-4" />
            </div>
        </div>

        <!-- Form di recupero password -->
        <div class="relative z-10 max-w-4xl mx-auto sm:px-6 lg:px-8 mt-10 bg-white shadow-xl rounded-lg p-6">
            <div class="mb-4 text-sm text-gray-600">
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </div>

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="email" value="Email" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="mt-1 block w-full shadow-md rounded-md"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Email Password Reset Link
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
/* Miglioramento estetico */
.shadow-md {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
</style>
