<script setup>
import { route } from '../../../vendor/tightenco/ziggy/src/js';


</script>


<template>
    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-2xl font-bold">My App</h1>
            <nav class="flex items-center gap-5">
                <Link :href="route('home')">Home</Link>
                <Link :href="route('about')">About</Link>
                <Link :href="route('register')">Register</Link>
                <Link :href="route('users')">Users</Link>
            </nav>
        </div>
    </header>

    <main class="h-full">
        <slot></slot>
    </main>

    <footer class="bg-blue-500 text-white p-4">
        <div class="container mx-auto text-center">
            &copy; 2024 All rights reserved.
        </div>
    </footer>
</template>