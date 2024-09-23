<script setup>
import { defineProps, defineEmits, ref } from 'vue';
import { PhX } from '@phosphor-icons/vue'; 

// Recebendo a prop isOpen do componente pai
const props = defineProps({
    isOpen: Boolean
});

// Emitindo evento para fechar o modal
const emit = defineEmits(['closeModal']);

// Estado do comentário
const comment = ref('');
const isSubmitting = ref(false); // Para controlar o estado do botão de envio
const errorMessage = ref(''); // Para exibir mensagens de erro

// Função para fechar o modal
const closeModal = () => {
    emit('closeModal');
};

// Função para publicar o comentário
const handlePublish = async () => {
    // Limpar mensagens de erro
    errorMessage.value = '';

    // Verifica se o comentário não está vazio
    if (comment.value.trim()) {
        isSubmitting.value = true; // Desabilita o botão durante o envio

        try {
            const response = await fetch('', { // URL da API
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    comment: comment.value, 
                }),
            });

            if (response.ok) {
                comment.value = ''; 
                closeModal(); 
            } else {
                const data = await response.json();
                errorMessage.value = data.message || 'Erro ao publicar comentário.';
            }
        } catch (error) {
            errorMessage.value = 'Erro na conexão com o servidor. Tente novamente mais tarde.';
            console.error('Erro na requisição:', error);
        } finally {
            isSubmitting.value = false; 
        }
    } else {
        errorMessage.value = 'O comentário não pode estar vazio!';
    }
};
</script>

<template>
    <div v-if="props.isOpen" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
        <div class="bg-white shadow-lg rounded-xl w-11/12 sm:w-9/12 md:w-7/12 lg:w-5/12 xl:w-4/12 p-4 sm:px-6 lg:px-8">
            <form @submit.prevent="handlePublish">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-lg">Faça um comentário</h1>
                    <button @click="closeModal" class="focus:outline-none">
                        <PhX class="w-6 h-6 hover:bg-zinc-100" />
                    </button>
                </div>
                <div class="mt-6 flex">
                    <div class="flex flex-row">
                        <img src="https://avatars.githubusercontent.com/u/135720339?v=4" alt="Avatar"
                            class="rounded-full w-10 h-10 object-cover mr-4" />
                    </div>
                    <div class="w-full">
                        <label for="comment" class="text-md font-medium"></label>
                        <textarea
                            v-model="comment"
                            class="resize-none w-full h-40 bg-white border border-gray-300 rounded-xl py-2 px-4 text-gray-600 focus:outline-none focus:ring-2 focus:ring-zinc-100"
                            id="comment" placeholder="Escreva um comentário"></textarea>
                    </div>
                </div>
                <div class="flex justify-between mt-6">
                    <div v-if="errorMessage" class="text-red-500 text-sm">{{ errorMessage }}</div>
                    
                    <div class="flex space-x-4 ml-auto">
                        <button type="submit" 
                            :disabled="isSubmitting" 
                            class="bg-button text-white rounded-lg px-4 py-2 hover:bg-[#9F214E] disabled:bg-gray-300">
                            <span v-if="isSubmitting">Publicando...</span>
                            <span v-else>Publicar</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
