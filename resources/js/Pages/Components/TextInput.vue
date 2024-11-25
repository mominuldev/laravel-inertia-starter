<script setup>

const model = defineModel({
    type: null,
    required: true
})

defineProps({

    name: {
        type: String,
        required: true
    },
    type: {
        type: String,
        default: 'text'
    },
    message: String

})

</script>


<template>
    <div class="mb-4">
        <label :for="name" class="block text-sm font-medium text-gray-700">{{ name }}</label>
        <input
            :type="type"
            :id="name"
            v-model="model"
            :class="[
                'mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm',
                { 'border-red-300': message }
              ]"

        />
        <p class="text-sm text-red-500 mt-1" v-if="message">{{ message }}</p>
    </div>
</template>
