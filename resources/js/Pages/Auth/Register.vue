<script setup>

import { useForm } from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import TextInput from "../Components/TextInput.vue";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
})

const register = () => {
    form.post(route('register'), {
        onError: () => form.reset('password', 'password_confirmation'),
    });
}

</script>



<template>
    <section class="py-[100px]">
        <div class="max-w-[600px] mx-auto border border-gray-300 rounded-lg px-6 py-6">
            <h1 class="text-2xl font-bold mb-4 text-center">Register</h1>

            <form @submit.prevent="register">

                <TextInput name="Name" v-model="form.name" :message="form.errors.name" />

                <TextInput name="Email" v-model="form.email" :message="form.errors.email" />

                <TextInput name="Password" type="password" v-model="form.password" :message="form.errors.password" />

                <TextInput name="Confirm Password" type="password" v-model="form.password_confirmation" :message="form.errors.password_confirmation" />

                <p class="mb-2">Already have account? <Link :href="route('login')" class="text-blue-600 font-medium">Login</Link></p>

                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600" :disabled="form.processing">Register</button>
                </div>
            </form>
        </div>
    </section>
</template>
