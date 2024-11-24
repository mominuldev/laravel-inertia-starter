<script setup>
 
    defineProps({
        title: String,
    })
</script>


<template>

    <Head title="About" />

    <section class="py-[100px]">

        <div class="container mx-auto">
            <h1 class="text-4xl text-center font-bold">{{ title }}</h1>
        </div>
    </section>

</template>