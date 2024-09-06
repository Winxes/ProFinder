<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

defineProps({

});

</script>


<template> 
    <div class="flex flex-col bg-post border-gray-300 w-4/5 h-auto shadow-shape rounded-xl">


        <div class="flex flex-row mx-4">
        <img src="https://avatars.githubusercontent.com/u/135720339?v=4" alt="icon"
            class="rounded-full ml-2 mt-2 w-8 h-8 object-cover mr-4" />
        <h2 class="mt-3 font-normal"><slot /> </h2>
        <p class="mt-4 px-6 font-normal text-xs ">2 dias atrás</p>
        </div>
        <!-- titulo do projeto -->
        <div class="flex flex-row mx-4">
        <h2 class="ml-2 mt-4 font-bold text-md ">Projeto Hovet</h2>
        </div>
        <!-- div principal da descrição e imagem lado a lado -->
        <div class="flex flex-row mx-4 items-start">
        <!-- Descrição -->
        <div class="w-3/5">
            <p class="ml-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pulvinar aliquet
            purus ac egestas.
            Phasellus vitae interdum turpis. Nam a sodales sem, eget porttitor neque. Lorem ipsum dolor sit
            amet, consectetur adipiscing elit. Nunc pulvinar aliquet purus ac egestas.
            Phasellus vitae interdum turpis. Nam a sodales sem, eget porttitor neque.
            </p>
        </div>
        <!-- Imagem -->
        <div class="w-2/5">
            <img
            src="https://www.shopveterinario.com.br/blog/wp-content/uploads/2021/03/medico-veterinario-bem-sucedido-artigo.jpg"
            alt="icon" class="mr-4 w-full h-auto object-cover rounded-xl" />
        </div>
        </div>
        <!-- tags e salvar -->
        <div class="flex">
        <p class="ml-2 mb-3 px-3 text-sm shadow-shape rounded-xl">Front-End</p>
        <p class="ml-4 mb-3 px-3 text-sm shadow-shape rounded-xl">Back-End</p>
        </div>
    </div>
</template>
