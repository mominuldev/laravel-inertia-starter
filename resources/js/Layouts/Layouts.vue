<script setup>
import {route} from '../../../vendor/tightenco/ziggy/src/js';


</script>


<template>
    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-2xl font-bold">My App</h1>
            <nav class="flex items-center gap-5">
                <Link
                    :href="route('home')"
                    :class="['px-3 py-2 rounded', {'bg-blue-400' : $page.component === 'Home'}]">
                    Home
                </Link>
                <Link :href="route('about')"
                      :class="['px-3 py-2 rounded', {'bg-blue-400' : $page.component === 'About'}]">
                    About
                </Link>

                <div v-if="$page.props.auth.user" class="flex gap-5 items-center">
                    <Link :href="route('dashboard')"
                          :class="['px-3 py-2 rounded', {'bg-blue-400' : $page.component === 'Dashboard'}]">Dashboard
                    </Link>
                    <Link :href="route('users')"
                          :class="['px-3 py-2 rounded', {'bg-blue-400' : $page.component === 'Users'}]">Users
                    </Link>
                    <Link :href="route('logout')"
                          method="post"
                          as="button"
                          type="button">
                        Logout
                    </Link>
                </div>
                <div v-else class="flex gap-5 items-center">
                    <Link :href="route('login')"
                          :class="['px-3 py-2 rounded', {'bg-blue-400' : $page.component === 'Auth/Login'}]">Login
                    </Link>
                    <Link :href="route('register')"
                          :class="['px-3 py-2 rounded', {'bg-blue-400' : $page.component === 'Auth/Register'}]">Register
                    </Link>
                </div>
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
