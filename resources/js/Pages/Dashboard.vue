<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import SearchInput from '@/Components/SearchInput.vue';
import PostCard from '@/Components/PostCard.vue';
import { PhBookmarks, PhChatCentered, PhChatCircle, PhChatTeardrop, PhHeartStraight, PhSlidersHorizontal } from '@phosphor-icons/vue';
import { EllipsisVertical } from 'lucide-vue-next';



// Variável que controla se o texto está expandido ou não
const isExpanded = ref(false);

// Função para alternar entre expandido e colapsado
const toggleExpand = () => {
  isExpanded.value = !isExpanded.value;
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
              <button :type="type"
                class="items-center flex justify-center mt-3 w-10 h-9 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                <slot />
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

              <!-- input -->
              <input
                class="flex-grow w-4/5 bg-white border border-gray-300 rounded-full py-2 px-4 text-gray-600 focus:outline-none focus:ring-2 focus:ring-primaria"
                type="text" placeholder="Crie uma nova publicação" />
            </div>
          </div>
          <!-- seção de posts -->
          <div>
            <div class="flex justify-center items-center mt-20">
              <!-- box do post -->
              <div class="flex flex-col bg-post border-gray-300 w-4/5 h-auto shadow-shape rounded-xl">
                <div class="flex flex-row mx-4">
                  <img src="https://avatars.githubusercontent.com/u/135720339?v=4" alt="icon"
                    class="rounded-full ml-2 mt-2 w-8 h-8 object-cover mr-4" />
                  <h2 class="mt-3 font-normal">Lorem Ipsum</h2>
                  <p class="mt-4 px-6 font-normal text-xs ">2 dias atrás</p>
                  <!-- botão de opções -->
                  <div class="ml-auto mt-2">
                    <button :type="type"
                      class="items-center mb-3 rounded-md hover:bg-zinc-200 active:bg-zinc-300 focus:outline-none transition ease-in-out duration-150">
                      <slot />
                      <EllipsisVertical class=" w-6 h-6"></EllipsisVertical>
                    </button>
                  </div>
                </div>
                <!-- titulo do projeto -->
                <div class="flex flex-row mx-4">
                  <h2 class="ml-2 mt-4 font-bold text-md ">Projeto Hovet</h2>
                </div>
                <!-- div principal da descrição e imagem lado a lado -->
                <div class="flex flex-row mx-4 items-start">
                  <!-- Descrição com limite de altura e botão 'ler mais' -->
                  <div class="w-3/5">
                    <p class="ml-2" :class="isExpanded ? '' : 'line-clamp-3 overflow-hidden'">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pulvinar aliquet purus ac egestas.
                      Phasellus vitae interdum turpis. Nam a sodales sem, eget porttitor neque. Lorem ipsum dolor sit
                      amet, consectetur adipiscing elit. Nunc pulvinar aliquet purus ac egestas.
                      Phasellus vitae interdum turpis. Nam a sodales sem, eget porttitor neque. Lorem ipsum dolor sit
                      amet, consectetur adipiscing elit. Nunc pulvinar aliquet purus ac egestas.
                      Phasellus vitae interdum turpis. Nam a sodales sem, eget porttitor neque. Lorem ipsum dolor sit
                      amet, consectetur adipiscing elit. Nunc pulvinar aliquet purus ac egestas.
                      Phasellus vitae interdum turpis. Nam a sodales sem, eget porttitor neque.
                    </p>
                    <button class="ml-2 text-blue-500 mt-1" @click="toggleExpand">
                      {{ isExpanded ? 'Ler menos' : 'Ler mais' }}
                    </button>
                  </div>
                  <!-- Imagem -->
                  <div class="w-2/5">
                    <img
                      src="https://www.shopveterinario.com.br/blog/wp-content/uploads/2021/03/medico-veterinario-bem-sucedido-artigo.jpg"
                      alt="icon" class="mr-4 w-full h-auto object-cover rounded-xl" />
                  </div>
                </div>
                <!-- tags, like, comentario e salvar -->
                <div class="flex items-center">
                  <div class="flex text-center items-center mt-4">
                    <button :type="type"
                      class="ml-2 mb-3 px-3 text-sm shadow-shape rounded-xl hover:bg-zinc-200">Front-End</button>
                    <button :type="type"
                      class="ml-4 mb-3 px-3 text-sm shadow-shape rounded-xl hover:bg-zinc-200">Back-End</button>
                  </div>
                  <div class="flex">
                    <!-- botão de like -->
                    <div class="ml-6 mt-4">
                      <button :type="type"
                        class="items-center mb-3 rounded-md hover:bg-zinc-200 active:bg-zinc-300 focus:outline-none transition ease-in-out duration-150">
                        <slot />
                        <PhHeartStraight class="w-6 h-6"></PhHeartStraight>
                      </button>
                    </div>
                    <!-- botão de comentário -->
                    <div class="ml-6 mt-4">
                      <button :type="type"
                        class="items-center mb-3 rounded-md hover:bg-zinc-200 active:bg-zinc-300 focus:outline-none transition ease-in-out duration-150">
                        <slot />
                        <PhChatCircle class="w-6 h-6"></PhChatCircle>
                      </button>
                    </div>
                    <!-- botão de salvar -->
                    <div class="ml-6 mt-4 mr-4">
                      <button :type="type"
                        class="items-center mb-3 rounded-md hover:bg-zinc-200 active:bg-zinc-300 focus:outline-none transition ease-in-out duration-150">
                        <slot />
                        <PhBookmarks class="w-6 h-6"></PhBookmarks>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
