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

// Função para copiar o link da página atual para a área de transferência
const copyLink = async () => {
    try {
        await navigator.clipboard.writeText(window.location.href);
        alert('Link copiado para a área de transferência!');
    } catch (err) {
        console.error('Falha ao copiar o link', err);
        alert('Erro ao copiar o link');
    }
};

// Função para atualizar a página
const reloadPage = () => {
    location.reload();
};
</script>

<template>
    <!-- Modal -->
    <div v-if="isOpen" class="fixed inset-0 z-50 flex items-center justify-center">
        <!-- Fundo desfocado -->
        <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-md"></div>
        <!-- Conteúdo do modal -->
        <div class="relative bg-white shadow-lg rounded-xl w-11/12 sm:w-9/12 md:w-6/12 lg:w-4/12 xl:w-3/12 p-4 sm:px-6 lg:px-8 z-10">
            <!-- Cabeçalho do modal -->
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-lg">Opções</h1>
                <button @click="closeModal" class="focus:outline-none">
                    <PhX class="w-6 h-6 hover:bg-zinc-100" />
                </button>
            </div>
            <!-- Opções do modal -->
            <div class="mt-6 flex items-center hover:bg-zinc-100 p-2 cursor-pointer rounded-lg" @click="copyLink">
                <PhShareNetwork class="w-6 h-6"></PhShareNetwork>
                <p class="font-medium ml-4">Compartilhar</p>
            </div>
            <div class="mt-6 flex items-center hover:bg-zinc-100 p-2 cursor-pointer rounded-lg" @click="reloadPage">
                <PhFlag class="w-6 h-6"></PhFlag>
                <p class="font-medium ml-4">Denunciar publicação</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Definição do efeito blur */
.backdrop-blur-md {
  backdrop-filter: blur(8px);
}
</style>
