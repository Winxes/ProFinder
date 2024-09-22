<script setup>
import { defineProps, defineEmits, ref } from 'vue';
import { PhX } from '@phosphor-icons/vue';
import VueMultiselect from 'vue-multiselect';
import 'vue-multiselect/dist/vue-multiselect.css';

// Recebendo a prop isOpen do componente pai
const props = defineProps({
    isOpen: Boolean
});

// Evento para o fechamento do modal
const emit = defineEmits(['closeModal']);

// Função de fechamento do modal
const closeModal = () => {
    emit('closeModal');
};

// Função de publicar (e atualizar a página)
const handlePublish = () => {
    // Adicione a lógica para aplicar filtros ou fazer a publicação
    console.log('Filtro aplicado:', { scholarshipType: scholarshipType.value, selected: selected.value });
    closeModal(); // Fechar o modal após aplicar filtros
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

const scholarshipType = ref('');
</script>

<template>
    <div v-if="props.isOpen" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
        <div class="bg-white shadow-lg rounded-xl w-11/12 sm:w-9/12 md:w-7/12 lg:w-5/12 xl:w-4/12 p-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-lg">Filtrar por:</h1>
                <button @click="closeModal" class="focus:outline-none">
                    <PhX class="w-6 h-6 hover:bg-zinc-100" />
                </button>
            </div>
            <form @submit.prevent="handlePublish">
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
                        <label class="block font-medium mb-2">Área de interesse</label>
                        <VueMultiselect v-model="selected" :options="options" :multiple="true" label="name"
                            track-by="name" placeholder="Escolha os filtros" />
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="bg-button text-white rounded-lg px-4 py-2 hover:bg-[#9F214E]">
                        Aplicar
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
