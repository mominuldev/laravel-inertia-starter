<script setup>
import demo from '../../Layouts/AdminLayout.vue';

defineOptions({
    layout: demo,
})
</script>

<template>
    <Head title="Dashboard" />
    <section class="py-[100px]">
        <div class="container mx-auto">
            <div class="bg-green-300 text-green-500 p-5" v-if="$page.props.flash.message">
                {{ $page.props.flash.message }}
            </div>

            <h1 class="text-2xl font-bold">Dashboard</h1>

            <h2 class="text-xl font-bold mt-5">Welcome, {{ $page.props.auth.user.name }}</h2>
        </div>
    </section>
</template>
