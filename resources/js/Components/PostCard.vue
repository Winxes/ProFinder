<script setup>
// import { computed } from 'vue';
// import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    iconSrc: {
        type: String,
        required: true,
    },
    projectImageSrc: {
        type: String,
        required: false,
    },
});
</script>

<template>
    <div class="flex flex-col bg-post border-gray-300 w-4/5 h-auto shadow-shape rounded-xl">

        <div class="flex flex-row mx-4">
            <!-- Imagem do ícone -->
            <img :src="iconSrc" alt="icon" class="rounded-full ml-2 mt-2 w-8 h-8 object-cover mr-4" />

            <!-- Título do projeto -->
            <div class="flex flex-row mx-4">
                <h2 class="ml-2 mt-4 font-bold text-md">
                    <slot name="project-title"></slot>
                </h2>
            </div>

            <!-- Slot para a descrição -->
            <p class="mt-4 px-6 font-normal text-xs">
                <slot name="description"></slot>
            </p>
        </div>



        <!-- Descrição e imagem lado a lado -->
        <div class="flex flex-row mx-4 items-start">
            <!-- Descrição do projeto -->
            <div class="w-3/5">
                <p class="ml-2">
                    <slot name="project-description"></slot>
                </p>
            </div>

            <!-- Imagem do projeto (se fornecida) -->
            <div v-if="projectImageSrc" class="w-2/5">
                <img :src="projectImageSrc" alt="project image" class="mr-4 w-full h-auto object-cover rounded-xl" />
            </div>
        </div>

        <!-- Tags usando slots -->
        <div class="flex">
            <p class="ml-2 mb-3 px-3 text-sm shadow-shape rounded-xl">
                <slot name="tag1"></slot>
            </p>
            <p class="ml-4 mb-3 px-3 text-sm shadow-shape rounded-xl">
                <slot name="tag2"></slot>
            </p>
        </div>
    </div>
</template>
