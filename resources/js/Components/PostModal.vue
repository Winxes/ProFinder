<script setup>
import { defineProps, defineEmits, ref } from 'vue';
import { PhX } from '@phosphor-icons/vue';
import VueMultiselect from 'vue-multiselect';
import 'vue-multiselect/dist/vue-multiselect.css';

// Recebendo a prop isOpen do componente pai
const props = defineProps({
    isOpen: Boolean
});

// Event para o fechamento do modal
const emit = defineEmits(['closeModal']);

// Função de fechamento do modal
const closeModal = () => {
    emit('closeModal');
};

// Função de publicar (e atualizar a página)
const handlePublish = () => {
    // API depois
    window.location.reload(); // Recarrega a página após a publicação
};

// Dados para o VueMultiselect
const selected = ref([]);
const options = ref([
    { name: 'Desenvolvimento' },
    { name: 'Design' },
    { name: 'IA' },
    { name: 'Administração' },
    { name: 'Engenharia' }
]);

// Controlar a seleção entre "Remunerada" ou "Voluntária"
const scholarshipType = ref('');
</script>

<template>
    <div v-if="isOpen" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
        <div class="bg-white shadow-lg rounded-xl w-11/12 sm:w-9/12 md:w-7/12 lg:w-5/12 xl:w-4/12 p-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-lg">Fazer uma publicação</h1>
                <button @click="closeModal" class="focus:outline-none">
                    <PhX class="w-6 h-6 hover:bg-zinc-100" />
                </button>
            </div>
            <div class="mt-6">
                <div>
                    <label for="title" class="text-md font-medium">Título</label>
                    <input
                        class="w-full bg-white border border-gray-300 rounded-xl py-2 px-4 text-gray-600 focus:outline-none focus:ring-2 focus:ring-zinc-100"
                        type="text" id="title" placeholder="Escreva o título da sua publicação" />
                </div>
                <div class="mt-6">
                    <label for="content" class="text-md font-medium">Descrição</label>
                    <textarea
                        class="w-full resize-none h-32 bg-white border border-gray-300 rounded-xl py-2 px-4 text-gray-600 focus:outline-none focus:ring-2 focus:ring-zinc-100"
                        id="content" placeholder="Descreva o seu projeto..."></textarea>
                </div>
                <div class="mt-6">
                    <label class="block font-medium mb-2">Tipo de Bolsa</label>
                    <div class="flex space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" value="Remunerada" v-model="scholarshipType" />
                            <span class="ml-2">Remunerada</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" value="Voluntária" v-model="scholarshipType" />
                            <span class="ml-2">Voluntária</span>
                        </label>
                    </div>
                    <!-- Seção dropdown -->
                    <div class="mt-6">
                        <label class="block font-medium mb-2">Selecione a área de interesse</label>
                        <VueMultiselect v-model="selected" :options="options" :multiple="true" label="name"
                            track-by="name" placeholder="Selecione suas habilidades" />
                    </div>
                </div>
            </div>
            <div class="flex justify-start mt-6 space-x-4">
                <button class="flex items-center focus:outline-none hover:bg-gray-100">
                    <img src="images/Images.png" alt="Mídia" class="w-6 h-6 mr-2" /> Mídia
                </button>
                <button class="flex items-center focus:outline-none rounded-md hover:bg-gray-100">
                    <img src="images/FilePlus.png" alt="Documentos" class="w-6 h-6 mr-2 ml-4" /> Documentos
                </button>
            </div>
            <div class="flex justify-between mt-6">
                <div class="flex space-x-4 ml-auto">
                    <button @click="handlePublish"
                        class="bg-button text-white rounded-lg px-4 py-2 hover:bg-[#9F214E]">Publicar</button>
                </div>
            </div>
        </div>
    </div>
</template>



<!-- para git clone/pull lembrem de instalar as dependências:
 npm install lucide-vue-next
 npm install @phosphor-icons/vue
 npm install vue-multiselect
  -->