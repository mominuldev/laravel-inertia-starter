<script setup>

defineProps({
    users: {
        type: Array
    }
})


</script>

<template>
    <Head title="All User" />
    <section class="py-[100px]">
        <div class="max-w-[800px] mx-auto">
            <div class="flex justify-between mb-5 items-center">
                <h1 class="text-2xl font-bold">All Users</h1>

                <Link :href="route('register')" class="bg-blue-500 text-white py-2 px-6 rounded-lg">Create User</Link>
            </div>

            <table class="w-full border-collapse border border-gray-300" v-if="users.length">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Name</th>
                        <th class="border border-gray-300 p-2">Email</th>
                        <th class="border border-gray-300 p-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td class="border border-gray-300 p-2">{{ user.id }}</td>
                        <td class="border border-gray-300 p-2">{{ user.name }}</td>
                        <td class="border border-gray-300 p-2">{{ user.email }}</td>
                        <td class="border border-gray-300 p-2">
                            <!-- <Link :href="route('users.show', user.id)" class="bg-blue-500 text-white py-1 px-3 rounded-lg">View</Link>
                            <Link :href="route('users.edit', user.id)" class="bg-yellow-500 text-white py-1 px-3 rounded-lg">Edit</Link>
                            <form action="" method="post" class="inline">
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-lg">Delete</button>
                            </form> -->
                        </td>
                    </tr>
                </tbody>
            </table>

            <p v-else class="text-center text-xl mt-10">Sorry No users found</p>
        </div>

    </section>
</template>
