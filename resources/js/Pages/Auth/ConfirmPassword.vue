<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue'; // Logo
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    password: '',
});

const passwordInput = ref(null);

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => {
            form.reset();

            passwordInput.value.focus();
        },
    });
};
</script>

<template>
    <Head title="Secure Area" />

    <!-- Sfondo globale con design moderno -->
    <div class="relative min-h-screen bg-gradient-to-br from-green-100 via-blue-200 to-green-50 overflow-hidden">
        <!-- Effetto di luce sul background -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-100 via-green-100 to-blue-100 opacity-20"></div>

        <!-- Sezione del titolo con logo -->
        <div class="relative z-10 p-6 lg:p-8 text-center">
            <div class="flex items-center justify-center">
                <h2 class="text-4xl font-extrabold text-green-600 tracking-wide transition duration-300 hover:text-green-500">
                    Secure Area
                </h2>
                <ApplicationMark class="block h-12 w-auto ml-4" />
            </div>
        </div>

        <!-- Form di conferma password -->
        <div class="relative z-10 max-w-4xl mx-auto sm:px-6 lg:px-8 mt-10 bg-white shadow-xl rounded-lg p-6">
            <div class="mb-4 text-sm text-gray-600">
                This is a secure area of the application. Please confirm your password before continuing.
            </div>

            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="password" value="Password" />
                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full shadow-md rounded-md"
                        required
                        autocomplete="current-password"
                        autofocus
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="flex justify-end mt-4">
                    <PrimaryButton class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md shadow transition" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Confirm
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
