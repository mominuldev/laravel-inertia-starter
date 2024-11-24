<script setup>

import { useForm } from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';

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
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" v-model="form.name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    <p class="text-sm text-red-500" v-if="form.errors.name">{{ form.errors.name }}</p>
                </div> 

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" v-model="form.email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    <p class="text-sm text-red-500" v-if="form.errors.email">{{ form.errors.email }}</p>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" v-model="form.password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    <p class="text-sm text-red-500" v-if="form.errors.password">{{ form.errors.password }}</p>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" v-model="form.password_confirmation" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    <p class="text-sm text-red-500" v-if="form.errors.password_confirmation">{{ form.errors.password_confirmation }}</p>
                </div>

                <p class="mb-2">Already have account? <Link href="#" class="text-blue-600 font-medium">Login</Link></p>

                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600" :disabled="form.processing">Register</button>
                </div>
            </form>
        </div>
    </section>
</template>