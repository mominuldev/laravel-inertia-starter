<script setup>
defineProps({
    paginator: {
        type: Object,
        required: true
    }
})


const makeLabel = (label) => {
    if (label.includes('Previous')) {
        return 'Prev'
    }

    if (label.includes('Next')) {
        return 'Next 1'
    }

    return label;
}

</script>

<template>
    <div class="flex justify-between items-center mt-5">
        <p class="text-xl">Showing {{ paginator.from }} to {{ paginator.to }} of {{ paginator.total }} entries</p>
        <div>
            <component v-for="link in paginator.links" 
            :is="link.url ? 'Link' : 'span'"
            :key="link.url" 
            :href="link.url" 
            v-html="makeLabel(link.label)"
            class="mt-5 px-4 py-2 inline-block mx-1"
            :class="[
                {'bg-blue-500 text-white': link.active, 'bg-gray-200': !link.active},
                {'!bg-slate-100 text-slate-400': !link.url}
            ]"
        />
        </div>
    </div>
</template>

