<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue'; // Logo
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <!-- Sfondo globale con design moderno -->
    <div class="relative min-h-screen bg-gradient-to-br from-green-100 via-blue-200 to-green-50 overflow-hidden">
        <!-- Effetto di luce sul background -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-100 via-green-100 to-blue-100 opacity-20"></div>

        <!-- Sezione del titolo con logo -->
        <div class="relative z-10 p-6 lg:p-8 text-center">
            <div class="flex items-center justify-center">
                <h2 class="text-4xl font-extrabold text-green-600 tracking-wide transition duration-300 hover:text-green-500">
                    Register
                </h2>
                <ApplicationMark class="block h-12 w-auto ml-4" />
            </div>
        </div>

        <!-- Form di registrazione -->
        <div class="relative z-10 max-w-4xl mx-auto sm:px-6 lg:px-8 mt-10 bg-white shadow-xl rounded-lg p-6">
            <form @submit.prevent="submit">
                <div class="mt-4">
                    <InputLabel for="name" value="Name" />
                    <TextInput
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="mt-1 block w-full shadow-md rounded-md"
                        required
                        autofocus
                        autocomplete="name"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Email" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="mt-1 block w-full shadow-md rounded-md"
                        required
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password" />
                    <TextInput
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full shadow-md rounded-md"
                        required
                        autocomplete="new-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password_confirmation" value="Confirm Password" />
                    <TextInput
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        type="password"
                        class="mt-1 block w-full shadow-md rounded-md"
                        required
                        autocomplete="new-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                    <InputLabel for="terms">
                        <div class="flex items-center">
                            <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                            <div class="ms-2">
                                I agree to the 
                                <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Terms of Service
                                </a> 
                                and 
                                <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Privacy Policy
                                </a>.
                            </div>
                        </div>
                        <InputError class="mt-2" :message="form.errors.terms" />
                    </InputLabel>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Already registered?
                    </Link>

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Register
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
