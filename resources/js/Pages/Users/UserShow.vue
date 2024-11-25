<script setup>
    defineProps({
        user: {
            type: Object
        }
    })


    
</script>

<template>
    <Head :title="user.name" />
    <section class="py-[100px]">
        <div class="max-w-[600px] mx-auto border border-gray-300 rounded-lg px-6 py-6">
            <h1 class="text-2xl font-bold mb-4 text-center">User Details</h1>

            <!-- <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Avatar
                </label>
                <img :src="user.avatar" alt="avatar">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <p>{{ user.name }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Email
                </label>
                <p>{{ user.email }}</p>
            </div> -->
           
        </div>
    </section>
</template>