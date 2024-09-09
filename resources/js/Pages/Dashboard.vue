<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import SearchInput from '@/Components/SearchInput.vue';
import PostCard from '@/Components/PostCard.vue';
import PostModal from '@/Components/PostModal.vue';
import { PhSlidersHorizontal } from '@phosphor-icons/vue';

// controle dos modais
const isPostModalOpen = ref(false);   // controle do modal de "Fazer uma publicação"
const isSettingsModalOpen = ref(false); // controle do modal de "Configurações de publicação"

// funções para abrir e fechar o modal de publicação
const openPostModal = () => {
  isPostModalOpen.value = true;
};

const closePostModal = () => {
  isPostModalOpen.value = false;
  isSettingsModalOpen.value = false;  // fecha o modal de configurações também
};

// funções para abrir e fechar o modal de configurações
const openSettingsModal = () => {
  if (isPostModalOpen.value) {
    isSettingsModalOpen.value = true;  // só abre o segundo modal se o primeiro estiver aberto
  }
};

const closeSettingsModal = () => {
  isSettingsModalOpen.value = false;
};
</script>

<template>
  <AppLayout title="Dashboard">
    <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg flex flex-col justify-between">
          <div class="flex justify-between items-center">
            <h1 class="font-bold text-2xl my-3 mx-2 text-azulTexto">Tela inicial</h1>
            <!-- div da search bar -->
            <div class="w-full sm:w-auto mt-4 ml-auto flex">
              <SearchInput />
            </div>
            <!-- div filtro -->
            <div class="mr-4">
              <button
                class="items-center flex justify-center mt-3 w-10 h-9 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                <PhSlidersHorizontal class=" w-6 h-6"></PhSlidersHorizontal>
              </button>
            </div>
          </div>

          <!-- div fazer post -->
          <div
            class="flex justify-between items-center mt-8 w-4/5 sm:px-6 lg:px-4 md:px-0 bg-gray-100 p-4 rounded-xl shadow-shape mx-auto">
            <!-- icon -->
            <div class="flex flex-row w-full mx-6">
              <img src="https://avatars.githubusercontent.com/u/135720339?v=4" alt="Avatar"
                class="rounded-full w-12 h-12 object-cover mr-4" />

              <!-- input para abrir o modal -->
              <input
                class="flex-grow w-4/5 bg-white border border-gray-300 rounded-full py-2 px-4 text-gray-600 focus:outline-none focus:ring-2 focus:ring-primaria"
                type="text" placeholder="Crie uma nova publicação" @click="openPostModal" />
            </div>
          </div>

          <!-- seção de posts -->
          <div>
            <div class="flex justify-center items-center mt-20">
              <PostCard />
            </div>
          </div>

          <div>
            <!-- Modal de Publicação -->
            <PostModal :isOpen="isPostModalOpen" @closeModal="closePostModal">
            </PostModal>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>


<!-- para git clone/pull lembrem de instalar as dependências:
 npm install lucide-vue-next
 npm install @phosphor-icons/vue
 npm install vue-multiselect
  -->