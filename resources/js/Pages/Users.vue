<script setup>
import { Link } from '@inertiajs/vue3';
import AdminLayout from '../Layouts/AdminLayout.vue';
import Pagination from './Components/Pagination.vue';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';
import { throttle } from 'lodash';
import { debounce } from 'lodash';


const props = defineProps({
    users: Object,
    searchTeam: String,
})

const search = ref(props.searchTeam);
const orderBy = ref('id');

watch(search, debounce(
    (q) => router.get('/users', { search: q }, { preserveState: true }),
    1000
));

watch(orderBy, (e) => router.get('/users', { orderBy: e }, { preserveState: true }));

defineOptions({
    layout: AdminLayout,
})

const getDateFormat = (date) => {
    return new Date(date).toLocaleDateString("en-US", {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });
}
</script>

<template>
    <Head title="All User" />
    <section class="py-[100px]">
        <div class="container mx-auto">
            <div class="bg-green-300 text-green-700 p-5 rounded-lg mb-5" v-if="$page.props.flash.success">
                {{ $page.props.flash.success }}
            </div>
            <div class="flex justify-between mb-5 items-center">
                <h1 class="text-2xl font-bold">All Users</h1>

                <Link :href="route('users.create')" class="bg-blue-500 text-white py-2 px-6 rounded-lg">Create User</Link>
            </div>

          
            <div>
                <select v-model="orderBy" class="border border-gray-300 p-2 w-1/4 rounded-lg px-4 focus:outline-none focus:border-blue-500 transition ease-in-out duration-300">
                    <option value="id">ID</option>
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                    <option value="created_at">Registration Date</option>
                </select>
            </div>

            <div class="flex justify-end mb-5">
                <input type="search" v-model="search" class="border border-gray-300 p-2 w-1/4 rounded-lg px-4 focus:outline-none focus:border-blue-500 transition ease-in-out duration-300" placeholder="Search User">
            </div>

            <table class="w-full border-collapse border border-gray-300" v-if="users.data.length">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Avatar</th>
                        <th class="border border-gray-300 p-2">Name</th>
                        <th class="border border-gray-300 p-2">Email</th>
                        <th class="border border-gray-300 p-2">Registration Date</th>
                        <th class="border border-gray-300 p-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users.data" :key="user.id">
                        <td class="border border-gray-300 p-2">{{ user.id }}</td>
                        <td class="border border-gray-300 p-2"><img class="w-10" :src="user.avatar ? user.avatar : ('storage/uploads/user/avatar.svg')" alt=""></td>
                        <td class="border border-gray-300 p-2">{{ user.name }}</td>
                        <td class="border border-gray-300 p-2">{{ user.email }}</td>
                        <td class="border border-gray-300 p-2">{{ getDateFormat(user.created_at) }}</td>
                        <td class="border border-gray-300 p-2 flex gap-2 items-center justify-center">
                            <Link :href="route('users.show', user.id)" class="bg-blue-500 text-white py-1 px-3 rounded-lg">View</Link>
                            <Link :href="route('users.edit', user.id)" class="bg-yellow-500 text-white py-1 px-3 rounded-lg">Edit</Link>
                            <Link :href="route('users.delete', user.id)" method="delete" as="button" type="button" class="bg-red-500 text-white py-1 px-3 rounded-lg">Delete</Link>
                        </td>
                    </tr>
                </tbody>
            </table>

            

            <p v-else class="text-center text-xl mt-10">Sorry No users found</p>
            

            <Pagination :paginator="users" />
        </div>

    </section>
</template>
