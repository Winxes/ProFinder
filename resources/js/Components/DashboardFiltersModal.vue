<script setup>
import { defineProps, defineEmits, ref } from 'vue';
import { PhX } from '@phosphor-icons/vue';
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

const csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');

const handlePublish = async () => {
    const payload = {
        scholarshipType: scholarshipType.value,
    };

    if (payload.scholarshipType === '') {
        
        window.location.replace('/dashboard');

    } 
    if (payload.scholarshipType === 'Remunerada') {
        
        window.location.replace('/dashboard/remunerados');

    }
    if (payload.scholarshipType === 'Voluntária') {
        
        window.location.replace('/dashboard/voluntarios');

    }


    // try {
    //     const response = await fetch('/filter-posts', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': csrfToken,
    //         },
    //         body: JSON.stringify(payload),
    //     });

    //     if (response.ok) {
    //         const data = await response.json();
    //         console.log('Filtro aplicado com sucesso:', data);
    //         closeModal();
    //     } else {
    //         console.error('Erro ao aplicar filtro:', response.status);
    //     }
    // } catch (error) {
    //     console.error('Erro ao conectar ao backend:', error);
    // }
};

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
