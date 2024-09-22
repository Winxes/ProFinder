<script setup>
import { defineProps, defineEmits } from 'vue';
import { PhX } from '@phosphor-icons/vue'; 

// Recebendo a prop isOpen do componente pai
const props = defineProps({
    isOpen: Boolean
});

// Event para o fechamento do modal
const emit = defineEmits(['closeCommentModal']);

// Função de fechamento do modal
const closeModal = () => {
    emit('closeModal');
};

const handlePublish = () => {
    // API depois
    window.location.reload(); // Recarrega a página após a publicação
    //criar bd de comentários

    // form.post(route("comment.store"), {
    //     onFinish: () => form.reset("comment"),
    // });
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
                        <label for="title" class="text-md font-medium"></label>
                        <textarea
                            class="resize-none w-full h-40 bg-white border border-gray-300 rounded-xl py-2 px-4 text-gray-600 focus:outline-none focus:ring-2 focus:ring-zinc-100"
                            type="text" id="comment" placeholder="Escreva um comentário"></textarea>
                    </div>
                </div>
                <div class="flex justify-between mt-6">
                    <div class="flex space-x-4 ml-auto">
                        <button type="submit" class="bg-button text-white rounded-lg px-4 py-2 hover:bg-[#9F214E]">
                            Publicar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
