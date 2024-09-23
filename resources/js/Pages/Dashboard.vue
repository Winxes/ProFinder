<script setup>
import { ref, onMounted } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import SearchInput from '@/Components/SearchInput.vue';
import PostCard from '@/Components/PostCard.vue';
import PostModal from '@/Components/PostModal.vue';
import DashboardFiltersModal from '@/Components/DashboardFiltersModal.vue';
import { PhSlidersHorizontal } from '@phosphor-icons/vue';
import CommentModal from '@/Components/CommentModal.vue';
import PostSettingsModal from '@/Components/PostSettingsModal.vue';


// Controle dos modais
const isPostModalOpen = ref(false);   // Controle do modal de "Fazer uma publicação"
const isFiltersModalOpen = ref(false);   // Controle do modal de "Filtros"

// Funções para abrir e fechar o modal de publicação
const openPostModal = () => {
  isPostModalOpen.value = true;
};

const closePostModal = () => {
  isPostModalOpen.value = false;
};

// Funções para abrir e fechar o modal de filtros
const openFiltersModal = () => {
  isFiltersModalOpen.value = true;
};

const closeFiltersModal = () => {
  isFiltersModalOpen.value = false;
};






const posts = ref([]);
const isCommentModalOpen = ref(false);
const isSettingsModalOpen = ref(false);
const selectedPost = ref(null);

// Function to fetch posts from backend
const fetchPosts = async () => {
    try {
        const response = await fetch('/posts');
        if (response.ok) {
            posts.value = await response.json();
        } else {
            console.error('Erro ao buscar posts do servidor');
        }
    } catch (error) {
        console.error('Erro de conexão com o backend:', error);
    }
};

// Function to handle post like
const handleLike = async (post) => {
    if (post.isLiked) {
        post.like_count--;
    } else {
        post.like_count++;
    }
    post.isLiked = !post.isLiked;

    await (post.isLiked ? sendLikeToBackend(post.id) : removeLikeFromBackend(post.id));
};

// Function to handle comment modal
const openCommentModal = (post) => {
    selectedPost.value = post;
    isCommentModalOpen.value = true;
};

// Function to handle settings modal
const openSettingsModal = (post) => {
    selectedPost.value = post;
    isSettingsModalOpen.value = true;
};

onMounted(() => {
    fetchPosts();
});
</script>

<template>
  <AppLayout title="Dashboard">
    <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg flex flex-col justify-between">
          <div class="flex justify-between items-center">
            <h1 class="font-bold text-2xl my-3 mx-2 text-azulTexto">Tela inicial</h1>
            <!-- Div da search bar -->
            <div class="w-full sm:w-auto mt-4 ml-auto flex">
              <SearchInput />
            </div>
            <!-- Div filtro -->
            <div class="mr-4">
              <button class="items-center flex justify-center mt-3 w-10 h-9 bg-white border border-gray-300 rounded-md font-semibold text-xs
                 text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2
                  focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                type="button" @click="openFiltersModal">
                <PhSlidersHorizontal class="w-6 h-6"></PhSlidersHorizontal>
              </button>
            </div>
          </div>

          <!-- Div fazer post -->
          <div
            class="flex justify-between items-center mt-8 w-4/5 sm:px-6 lg:px-4 md:px-0 bg-gray-100 p-4 rounded-xl shadow-shape mx-auto">
            <div class="flex flex-row w-full mx-6 items-center">
              <img src="https://avatars.githubusercontent.com/u/135720339?v=4" alt="Avatar"
                class="rounded-full w-12 h-12 object-cover mr-4" />
              <!-- Botão para abrir o modal -->
              <button
                class="flex-1 bg-white border border-gray-300 rounded-full py-2 px-4 text-gray-600 text-left hover:bg-zinc-50"
                type="button" @click="openPostModal">Escreva sua publicação</button>
            </div>
          </div>

          <!-- Seção de posts -->
          <div class="flex justify-center items-center mt-20">
            <div class="container mx-auto p-4">
              <h1 class="text-2xl font-bold mb-4">Lista de Posts</h1>
              <div v-if="posts.length > 0">
                <div v-for="post in posts" :key="post.id" class="flex flex-col bg-post border-gray-300 w-4/5 h-auto shadow-shape rounded-xl mb-6 mx-auto">
                  <PostCard :post="post" @like="handleLike" @comment="openCommentModal" @settings="openSettingsModal" />
                </div>
              </div>
              <div v-else>
                <p class="text-gray-500">Nenhum post encontrado.</p>
              </div>
              <CommentModal :isOpen="isCommentModalOpen" @closeModal="isCommentModalOpen = false" />
              <PostSettingsModal :isOpen="isSettingsModalOpen" @closeModal="isSettingsModalOpen = false" />
            </div>
  </div>

          <div>
            <!-- Modal de Publicação -->
            <PostModal :isOpen="isPostModalOpen" @closeModal="closePostModal" />

            <!-- Modal de Filtros -->
            <DashboardFiltersModal :isOpen="isFiltersModalOpen" @closeModal="closeFiltersModal" />
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
