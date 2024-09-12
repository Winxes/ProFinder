<script setup>
import { defineProps, defineEmits } from 'vue';
import { PhX, PhShareNetwork, PhFlag } from '@phosphor-icons/vue';

// Recebendo a prop isOpen do componente pai
const props = defineProps({
    isOpen: Boolean
});

// Evento para o fechamento do modal
const emit = defineEmits(['closeModal']);

// Função de fechamento do modal
const closeModal = () => {
    emit('closeModal');
};
</script>

<template>
    <div v-if="isOpen" class="absolute inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
        <div class="bg-white shadow-lg rounded-xl w-4/12 sm:w-9/12 md:w-7/12 lg:w-4/12 xl:w-2/12 p-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-lg">Opções</h1>
                <button @click="closeModal" class="focus:outline-none">
                    <PhX class="w-6 h-6 hover:bg-zinc-100" />
                </button>
            </div>
            <div class="mt-6 flex items-center hover:bg-zinc-100 p-2 cursor-pointer rounded-lg">
                <PhShareNetwork class="w-6 h-6"></PhShareNetwork>
                <p class="font-medium ml-4">Compartilhar</p>
            </div>
            <div class="mt-6 flex items-center hover:bg-zinc-100 p-2 cursor-pointer rounded-lg">
                <PhFlag class="w-6 h-6"></PhFlag>
                <p class="font-medium ml-4">Denunciar publicação</p>
            </div>
        </div>
    </div>
</template>
