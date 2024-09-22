<script setup>
import { ref } from 'vue';
import { PhBookmarks, PhChatCircle, PhHeartStraight, PhShareNetwork } from '@phosphor-icons/vue';
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

// Variáveis de controle dos modais
const isCommentModalOpen = ref(false);
const isSettingsModalOpen = ref(false);

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


const isExpanded = ref(false);

// Alterna o estado do texto
const toggleExpand = () => {
    isExpanded.value = !isExpanded.value;
};


const isLiked = ref(false); 
const likeCount = ref(0); 

// Função para alternar o "like"
const toggleLike = async () => {
    isLiked.value = !isLiked.value;
    
    if (isLiked.value) {
        likeCount.value += 1;
        await sendLikeToBackend();
    } else {
        likeCount.value -= 1;
        await removeLikeFromBackend();
    }
};

// Funções simulando chamadas ao backend
const sendLikeToBackend = async () => {
    console.log('Like enviado para o backend');
};

const removeLikeFromBackend = async () => {
    console.log('Like removido do backend');
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
            <h2 class="mt-3 font-normal">
                <slot name="authorName"></slot>
            </h2>
            <p class="mt-4 px-6 font-normal text-xs">
                <slot name="postDate"></slot>
            </p>
            <div class="ml-auto mt-2">
                <button type="button" @click="openSettingsModal"
                    class="items-center mb-3 rounded-md hover:bg-zinc-200 active:bg-zinc-300 focus:outline-none transition ease-in-out duration-150">
                    <slot name="optionsIcon">
                        <EllipsisVertical class="w-6 h-6"></EllipsisVertical>
                    </slot>
                </button>
            </div>
        </div>
        <div class="flex flex-row mx-4">
            <h2 class="ml-2 mt-4 font-bold text-md">
                <slot name="projectTitle"></slot>
            </h2>
        </div>
        <div class="flex flex-row mx-4 items-start">
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
            <div class="w-2/5">
                <slot name="projectImage">
                    <img :src="props.projectImage || 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgDLFcUCIsxkeQUX1ZTm55Xue9jtpHbFNpWw&s'" alt="project-image"
                        class="mr-4 w-full h-auto object-cover rounded-xl" />
                </slot>
            </div>
        </div>
        <div class="flex items-center">
            <div class="flex text-center items-center mt-4">
                <slot name="tags">
                    <div class="flex text-center items-center mt-4">
                        <button v-for="(tag, index) in defaultTags" :key="index" type="button"
                            class="ml-2 mb-3 px-3 text-sm shadow-shape rounded-xl hover:bg-zinc-200">
                            {{ tag }}
                        </button>
                    </div>
                </slot>
            </div>
            <div class="flex">
                <div class="ml-6 mt-4 flex items-center">
                    <button type="button" @click="toggleLike"
                        :class="isLiked ? 'text-red-500' : 'text-black'"
                        class="items-center mb-3 rounded-md hover:bg-zinc-200 active:bg-zinc-300 focus:outline-none transition ease-in-out duration-150">
                        <slot name="likeIcon">
                            <PhHeartStraight class="w-6 h-6"></PhHeartStraight>
                        </slot>
                    </button>
                    <!-- Exibindo a quantidade de likes -->
                    <span class="ml-2 text-gray-500">{{ likeCount }}</span>
                </div>
                <div class="ml-6 mt-4">
                    <button type="button" @click="openCommentModal"
                        class="items-center mb-3 rounded-md hover:bg-zinc-200 active:bg-zinc-300 focus:outline-none transition ease-in-out duration-150">
                        <slot name="commentIcon">
                            <PhChatCircle class="w-6 h-6"></PhChatCircle>
                        </slot>
                    </button>
                </div>
                <div class="ml-6 mt-4 mr-4">
                    <button type="button"
                        class="items-center mb-3 rounded-md hover:bg-zinc-200 active:bg-zinc-300 focus:outline-none transition ease-in-out duration-150">
                        <slot name="saveIcon">
                            <PhBookmarks class="w-6 h-6"></PhBookmarks>
                        </slot>
                    </button>
                </div>

                <CommentModal :isOpen="isCommentModalOpen" @closeModal="closeCommentModal" />
                <PostSettingsModal :isOpen="isSettingsModalOpen" @closeModal="closeSettingsModal" />
            </div>
        </div>
    </div>
</template>
