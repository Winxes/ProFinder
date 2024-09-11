<script setup>
import { defineProps, defineEmits } from 'vue';
import { PhX } from '@phosphor-icons/vue';

// Recebendo a prop isOpen do componente pai
const props = defineProps({
    isOpen: Boolean
});

// Event para o fechamento do modal
const emit = defineEmits(['closeModal']);

// Função de fechamento do modal
const closeModal = () => {
    emit('closeModal');
};
</script>

<template>
    <div v-if="props.isOpen" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
        <div class="bg-white shadow-lg rounded-xl w-11/12 sm:w-9/12 md:w-7/12 lg:w-5/12 xl:w-4/12 p-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-lg">Opções</h1>
                <button @click="closeModal" class="focus:outline-none">
                    <PhX class="w-6 h-6 hover:bg-zinc-100" />
                </button>
            </div>
            </div>
        </div>
</template>
