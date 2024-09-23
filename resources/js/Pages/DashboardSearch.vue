<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import SearchInput from '@/Components/SearchInput.vue';
import PostCard from '@/Components/PostCard.vue';
import PostModal from '@/Components/PostModal.vue';
import DashboardFiltersModal from '@/Components/DashboardFiltersModal.vue';
import { PhSlidersHorizontal } from '@phosphor-icons/vue';
import { inertia } from '@inertiajs/inertia';

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

const formatDateTime = (dateString) => {
    const date = new Date(dateString);
    
    const day = String(date.getDate()).padStart(2, '0'); // Dia
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Mês (0-11)
    const year = date.getFullYear(); // Ano
    const hours = String(date.getHours()).padStart(2, '0'); // Horas
    const minutes = String(date.getMinutes()).padStart(2, '0'); // Minutos
    
    return `${day}/${month}/${year} ${hours}:${minutes}`;
};

const props = defineProps({
    posts: Array,
});
console.log(props.posts);

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
              <img src="https://t4.ftcdn.net/jpg/03/49/49/79/360_F_349497933_Ly4im8BDmHLaLzgyKg2f2yZOvJjBtlw5.webp"
                alt="Avatar" class="rounded-full w-12 h-12 object-cover mr-4" />
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
                <div v-for="post in posts" :key="post.id"
                  class="flex flex-col bg-post border-gray-300 w-4/5 h-auto shadow-shape rounded-xl mb-6 mx-auto">
                  <div class="flex flex-row mx-4">
                    <img
                      :src="post.user?.avatar || 'https://t4.ftcdn.net/jpg/03/49/49/79/360_F_349497933_Ly4im8BDmHLaLzgyKg2f2yZOvJjBtlw5.webp'"
                      alt="icon" class="rounded-full ml-2 mt-2 w-8 h-8 object-cover mr-4" />
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
                    <div class="w-2/5" >
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
