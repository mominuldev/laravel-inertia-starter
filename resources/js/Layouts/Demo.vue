<template>
    <header class="bg-green-500 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-2xl font-bold">My App</h1>
            <nav class="flex items-center gap-5">
                <a href="/">Home</a>
                <a href="/about">About</a>
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