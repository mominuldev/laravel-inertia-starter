<script setup>

import { useForm } from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import TextInput from "../Components/TextInput.vue";



const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    avatar: null
})

const change = (e) => {
    form.avatar = e.target.files[0];
}

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
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Avatar
                    </label>
                    <input type="file" name="avatar" id="avatar" @input="change" class="w-full border border-gray-300 p-2 rounded-md" />
                    <img src="" alt="">
                    <p class="text-xs text-gray-500">Upload your profile picture</p>

                    
                    <p class="text-red-500 text-xs italic" v-if="form.errors.avatar">{{ form.errors.avatar }}</p>
                </div>

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
