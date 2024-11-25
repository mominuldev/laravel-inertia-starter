<script setup>

import { useForm } from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import TextInput from "../Components/TextInput.vue";

const form = useForm({
    email: null,
    password: null,
    remember: null,
})

const register = () => {
    form.post(route('login'), {
        onError: () => form.reset('password'),
    });
}

</script>



<template>
    <section class="py-[100px]">
        <div class="max-w-[600px] mx-auto border border-gray-300 rounded-lg px-6 py-6">
            <h1 class="text-2xl font-bold mb-4 text-center">Login</h1>

            <form @submit.prevent="register">

                <TextInput name="Email" v-model="form.email" :message="form.errors.email" />

                <TextInput name="Password" type="password" v-model="form.password" :message="form.errors.password" />

                <div class="mb-4 flex justify-between items-center">
                    <label for="remember" class="flex items-center">
                        <input type="checkbox" id="remember" v-model="form.remember" class="mr-2">
                        <span>Remember me</span>
                    </label>

                    <p>Need an account? <Link :href="route('register')" class="text-blue-600 font-medium">Register</Link></p>
                </div>

                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Login</button>
                </div>
            </form>
        </div>
    </section>
</template>
