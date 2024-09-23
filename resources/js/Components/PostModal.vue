<script setup>
import { defineProps, defineEmits, ref } from 'vue';
import { PhX } from '@phosphor-icons/vue';
import VueMultiselect from 'vue-multiselect';
import 'vue-multiselect/dist/vue-multiselect.css';

const props = defineProps({
    isOpen: Boolean
});

const emit = defineEmits(['closeModal']);

const closeModal = () => {
    emit('closeModal');
};

const csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');

const handlePublish = () => {
    console.log('Título:', title.value);
    console.log('Conteúdo:', content.value);
    console.log('Tipo de Bolsa:', scholarshipType.value);
    console.log('Áreas de interesse:', selected.value);
    console.log('Arquivos de mídia:', mediaFiles.value);

    const formData = new FormData();
    formData.append('title', title.value);
    formData.append('content', content.value);
    formData.append('scholarship', scholarshipType.value);
    formData.append('selected', JSON.stringify(selected.value));

    if (mediaFiles.value.length > 0) {
        mediaFiles.value.forEach((file, index) => {
            formData.append(`mediaFiles[${index}]`, file);
        });
    }

    fetch('/posts', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        }
    })
        .then(window.location.reload())
};

const title = ref('');
const content = ref('');
const selected = ref([]);
const options = ref([
    { name: 'Desenvolvimento' },
    { name: 'Design' },
    { name: 'IA' },
    { name: 'Administração' },
    { name: 'Engenharia' }
]);

const scholarshipType = ref('');
const mediaFiles = ref([]);

const openFileSelector = () => {
    document.getElementById('mediaInput').click();
};

const handleMediaChange = (event) => {
    mediaFiles.value = Array.from(event.target.files);
    console.log('Arquivos selecionados:', mediaFiles.value);
};

// Função para remover um arquivo de mídia
const removeMedia = (index) => {
    mediaFiles.value.splice(index, 1);
};
</script>

<template>
    <div v-if="isOpen" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
        <div class="bg-white shadow-lg rounded-xl w-11/12 sm:w-9/12 md:w-7/12 lg:w-5/12 xl:w-4/12 p-4 sm:px-6 lg:px-8">
            <form @submit.prevent="handlePublish">
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
                            v-model="title"
                            class="w-full bg-white border border-gray-300 rounded-xl py-2 px-4 text-gray-600 focus:outline-none focus:ring-2 focus:ring-zinc-100"
                            type="text" id="title" placeholder="Escreva o título da sua publicação" required />
                    </div>
                    <div class="mt-6">
                        <label for="content" class="text-md font-medium">Descrição</label>
                        <textarea
                            v-model="content"
                            class="w-full resize-none h-32 bg-white border border-gray-300 rounded-xl py-2 px-4 text-gray-600 focus:outline-none focus:ring-2 focus:ring-zinc-100"
                            id="content" placeholder="Descreva o seu projeto..." required></textarea>
                    </div>
                    <div class="mt-6">
                        <label class="block font-medium mb-2">Tipo de Bolsa</label>
                        <div class="flex space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio" value="Remunerada" v-model="scholarshipType" required />
                                <span class="ml-2">Remunerada</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio" value="Voluntária" v-model="scholarshipType" required />
                                <span class="ml-2">Voluntária</span>
                            </label>
                        </div>
                    </div>
                    <div class="mt-6">
                        <label class="block font-medium mb-2">Selecione a área de interesse</label>
                        <VueMultiselect v-model="selected" :options="options" :multiple="true" label="name"
                            track-by="name" placeholder="Selecione suas habilidades" required />
                    </div>
                </div>
                <div class="flex justify-start mt-6 space-x-4">
                    <button type="button" @click="openFileSelector" class="flex items-center focus:outline-none hover:bg-gray-100">
                        <img src="images/Images.png" alt="Mídia" class="w-6 h-6 mr-2" /> Mídia
                    </button>
                    <input type="file" id="mediaInput" class="hidden" multiple @change="handleMediaChange" accept="image/*,video/*" />
                </div>
                <div class="mt-6">
                    <h2 class="font-medium">Arquivos Selecionados:</h2>
                    <ul class="mt-2">
                        <li v-for="(file, index) in mediaFiles" :key="index" class="flex justify-between items-center">
                            <span>{{ file.name }}</span>
                            <button @click="removeMedia(index)" class="text-red-600 hover:underline">Remover</button>
                        </li>
                    </ul>
                </div>
                <div class="flex justify-between mt-6">
                    <div class="flex space-x-4 ml-auto">
                        <button type="submit"
                            class="bg-button text-white rounded-lg px-4 py-2 hover:bg-[#9F214E]">Publicar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
