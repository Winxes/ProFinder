<script setup>
import { ref, onMounted } from 'vue';
import { PhBookmarks, PhChatCircle, PhHeartStraight } from '@phosphor-icons/vue';
import { EllipsisVertical } from 'lucide-vue-next';
import CommentModal from './CommentModal.vue';
import PostSettingsModal from './PostSettingsModal.vue';

// Estado dos posts
const posts = ref([]);

// Função para buscar os posts do backend
const fetchPosts = async () => {
    try {
        const response = await fetch('/posts'); 
        if (response.ok) {
            const data = await response.json();
            posts.value = data.map(post => ({
                ...post,
                like_count: post.like_count || 0, // Iniciar contador de likes com valor do backend ou 0
            }));
        } else {
            console.error('Erro ao buscar posts do servidor');
        }
    } catch (error) {
        console.error('Erro de conexão com o backend:', error);
    }
};

onMounted(() => {
    fetchPosts();
});

const isCommentModalOpen = ref(false);
const isSettingsModalOpen = ref(false);

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

const formatDateTime = (dateString) => {
    const date = new Date(dateString);
    
    const day = String(date.getDate()).padStart(2, '0'); // Dia
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Mês (0-11)
    const year = date.getFullYear(); // Ano
    const hours = String(date.getHours()).padStart(2, '0'); // Horas
    const minutes = String(date.getMinutes()).padStart(2, '0'); // Minutos
    
    return `${day}/${month}/${year} ${hours}:${minutes}`;
};

// Função para alternar o "like"
const toggleLike = async (post) => {
    post.isLiked = !post.isLiked;

    // Atualizar o contador de likes
    if (post.isLiked) {
        post.like_count += 1;
        await sendLikeToBackend(post.id);
    } else {
        post.like_count -= 1;
        await removeLikeFromBackend(post.id);
    }
};

// Funções simulando chamadas ao backend
const sendLikeToBackend = async (postId) => {
    console.log(`Like enviado para o post ${postId}`);
};

const removeLikeFromBackend = async (postId) => {
    console.log(`Like removido do post ${postId}`);
};
</script>

<template>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Lista de Posts</h1>

        <div v-if="posts.length > 0">
            <div v-for="post in posts" :key="post.id" class="flex flex-col bg-post border-gray-300 w-4/5 h-auto shadow-shape rounded-xl mb-6 mx-auto">
                <div class="flex flex-row mx-4">
                    <img :src="post.user?.avatar || 'https://t4.ftcdn.net/jpg/03/49/49/79/360_F_349497933_Ly4im8BDmHLaLzgyKg2f2yZOvJjBtlw5.webp'" alt="icon"
                         class="rounded-full ml-2 mt-2 w-8 h-8 object-cover mr-4" />
                    <h2 class="mt-3 font-normal">{{ post.user?.name }}</h2>
                    <p class="mt-4 px-6 font-normal text-xs">{{ formatDateTime(post.created_at) }}</p>


                    <div class="ml-auto mt-2">
                        <button type="button" @click="openSettingsModal"
                            class="items-center mb-3 rounded-md hover:bg-zinc-200 active:bg-zinc-300 focus:outline-none transition ease-in-out duration-150">
                            <EllipsisVertical class="w-6 h-6"></EllipsisVertical>
                        </button>
                    </div>
                </div>

                <div class="flex flex-row mx-4">
                    <h2 class="ml-2 mt-4 font-bold text-md">{{ post.title }}</h2>
                </div>

                <div class="flex flex-row mx-4 items-start">
                    <div class="w-3/5">
                        <p class="text-justify mx-4 ml-2 line-clamp-3 overflow-hidden">
                            {{ post.content }}
                        </p>
                        <button class="ml-2 text-blue-500 mt-1">Ler mais</button>
                    </div>
                    <div class="w-2/5">
                        <img src="https://ajuda.ufrpe.br/images/footer/ufrpe-uni.png" alt="project-image"
                             class="mr-4 w-full h-auto object-cover rounded-xl" />
                    </div>
                </div>

                <div class="flex items-center mt-4 mx-4 justify-start mb-4">
                    <div class="flex space-x-6">
                        <button type="button" @click="toggleLike(post)"
                            :class="post.isLiked ? 'text-red-500' : 'text-black'">
                            <PhHeartStraight class="w-6 h-6"></PhHeartStraight>
                        </button>
                        <span>{{ post.like_count }}</span>

                        <button type="button" @click="openCommentModal">
                            <PhChatCircle class="w-6 h-6"></PhChatCircle>
                        </button>

                        <button type="button">
                            <PhBookmarks class="w-6 h-6"></PhBookmarks>
                        </button>
                    </div>

                    <CommentModal :isOpen="isCommentModalOpen" @closeModal="closeCommentModal" />
                    <PostSettingsModal :isOpen="isSettingsModalOpen" @closeModal="closeSettingsModal" />
                </div>
            </div>
        </div>

        <div v-else>
            <p class="text-gray-500">Nenhum post encontrado.</p>
        </div>
    </div>
</template>
