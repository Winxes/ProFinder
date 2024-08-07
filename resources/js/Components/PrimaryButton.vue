<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center justify-center bg-[#939CCE] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
        <slot />
    </button>
</template>