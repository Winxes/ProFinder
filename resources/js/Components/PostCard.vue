<script setup>
import { ref } from 'vue';
import { PhBookmarks, PhChatCircle, PhHeartStraight } from '@phosphor-icons/vue';
import { EllipsisVertical } from 'lucide-vue-next';
import CommentModal from './CommentModal.vue';
import PostSettingsModal from './PostSettingsModal.vue';

// Definindo props
const props = defineProps({
    authorIcon: {
        type: String,
        required: true,
    },
    projectImage: {
        type: String,
        required: false,
    },
});

const isCommentModalOpen = ref(false);  // controle do modal de "Comentar"
const isSettingsModalOpen = ref(false); // controle do modal de "Configurações de publicação"

// Funções para abrir e fechar os modais
const openCommentModal = () => {
    isCommentModalOpen.value = true;
};

const closeCommentModal = () => {
    isCommentModalOpen.value = false;
};

const openSettingsModal = () => {
    isSettingsModalOpen.value = true;
};

const closeSettingsModal = () => {
    isSettingsModalOpen.value = false;
};

// Variável que controla se o texto está expandido ou não
const isExpanded = ref(false);

// Alterna entre ler mais e ler menos
const toggleExpand = () => {
    isExpanded.value = !isExpanded.value;
};

// Tags padrão
const defaultTags = ref([]);
</script>

<template>
    <!-- box do post -->
    <div class="flex flex-col bg-post border-gray-300 w-4/5 h-auto shadow-shape rounded-xl">
        <div class="flex flex-row mx-4">
            <!-- Slot para o ícone do autor -->
            <slot name="authorIcon">
                <img :src="props.authorIcon" alt="icon" class="rounded-full ml-2 mt-2 w-8 h-8 object-cover mr-4" />
            </slot>
            <!-- Slot para o nome do autor -->
            <h2 class="mt-3 font-normal">
                <slot name="authorName"></slot>
            </h2>
            <!-- Slot para a data do post -->
            <p class="mt-4 px-6 font-normal text-xs">
                <slot name="postDate"></slot>
            </p>
            <!-- Botão de opções -->
            <div class="ml-auto mt-2">
                <button type="button" @click="openSettingsModal"
                    class="items-center mb-3 rounded-md hover:bg-zinc-200 active:bg-zinc-300 focus:outline-none transition ease-in-out duration-150">
                    <slot name="optionsIcon">
                        <EllipsisVertical class="w-6 h-6"></EllipsisVertical>
                    </slot>
                </button>
            </div>
        </div>
        <!-- Título do projeto -->
        <div class="flex flex-row mx-4">
            <h2 class="ml-2 mt-4 font-bold text-md">
                <slot name="projectTitle"></slot>
            </h2>
        </div>
        <!-- Descrição e imagem lado a lado -->
        <div class="flex flex-row mx-4 items-start">
            <!-- Descrição com limite de altura e botão 'ler mais' -->
            <div class="w-3/5">
                <slot name="description">
                    <p class="text-justify mx-4 ml-2" :class="isExpanded ? '' : 'line-clamp-3 overflow-hidden'">
                        Descrição padrão
                    </p>
                </slot>
                <button class="ml-2 text-blue-500 mt-1" @click="toggleExpand">
                    {{ isExpanded ? 'Ler menos' : 'Ler mais' }}
                </button>
            </div>
            <!-- Imagem do projeto -->
            <div class="w-2/5">
                <slot name="projectImage">
                    <img :src="props.projectImage || 'https://example.com/default-image.jpg'" alt="project-image"
                        class="mr-4 w-full h-auto object-cover rounded-xl" />
                </slot>
            </div>
        </div>
        <!-- Tags, like, comentário e salvar -->
        <div class="flex items-center">
            <div class="flex text-center items-center mt-4">
                <slot name="tags">
                    <!-- Conteúdo padrão caso o slot não seja fornecido -->
                    <div class="flex text-center items-center mt-4">
                        <button v-for="(tag, index) in defaultTags" :key="index" type="button"
                            class="ml-2 mb-3 px-3 text-sm shadow-shape rounded-xl hover:bg-zinc-200">
                            {{ tag }}
                        </button>
                    </div>
                </slot>
            </div>
            <div class="flex">
                <!-- Botão de like -->
                <div class="ml-6 mt-4">
                    <button type="button"
                        class="items-center mb-3 rounded-md hover:bg-zinc-200 active:bg-zinc-300 focus:outline-none transition ease-in-out duration-150">
                        <slot name="likeIcon">
                            <PhHeartStraight class="w-6 h-6"></PhHeartStraight>
                        </slot>
                    </button>
                </div>
                <!-- Botão de comentário -->
                <div class="ml-6 mt-4">
                    <button type="button" @click="openCommentModal"
                        class="items-center mb-3 rounded-md hover:bg-zinc-200 active:bg-zinc-300 focus:outline-none transition ease-in-out duration-150">
                        <slot name="commentIcon">
                            <PhChatCircle class="w-6 h-6"></PhChatCircle>
                        </slot>
                    </button>
                </div>
                <!-- Botão de salvar -->
                <div class="ml-6 mt-4 mr-4">
                    <button type="button"
                        class="items-center mb-3 rounded-md hover:bg-zinc-200 active:bg-zinc-300 focus:outline-none transition ease-in-out duration-150">
                        <slot name="saveIcon">
                            <PhBookmarks class="w-6 h-6"></PhBookmarks>
                        </slot>
                    </button>
                </div>
            
                <!-- Modais -->
                <CommentModal :isOpen="isCommentModalOpen" @closeModal="closeCommentModal" />
                <PostSettingsModal :isOpen="isSettingsModalOpen" @closeModal="closeSettingsModal" />

            </div>
        </div>
    </div>
</template>
