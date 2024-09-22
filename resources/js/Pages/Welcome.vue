<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Nav from '@/Shared/Nav.vue';
import { SquarePen, BriefcaseBusiness, Send, Search } from 'lucide-vue-next';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Nav /> 
    <div class="min-h-screen w-full bg-gray-50 flex flex-col md:flex-row justify-between items-center px-6 md:px-12 lg:px-24 py-12">
        <div class="text-center md:text-left md:w-1/2 space-y-6">
            <h1 class="text-4xl md:text-6xl font-semibold text-black text-center">
                Facilitando <span class="text-[#7C93C3]">conexões acadêmicas</span> para transformar ideias em realidade
            </h1>
            <p class="text-xl text-gray-600 text-center italic">
                Conecte pessoas e conhecimentos para potencializar suas iniciativas acadêmicas.
            </p>
        </div>
        <div class="md:w-1/2 md:mt-0">
            <img src="images/home-image.png" alt="Conexões acadêmicas" class="mb-10 w-full h-auto">
        </div>
    </div>

    <!-- Seção infos sobre o sistema -->
    <div class="bg-[#7C93C3] py-16">
        <h2 class="text-3xl md:text-4xl text-white text-center font-bold mb-10">O que o nosso sistema oferece?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto px-6">
            <div class="bg-[#516BA3] p-6 rounded-lg text-center">
                
                <div class="text-white flex justify-center text-center">
                    <SquarePen class="w-8 h-8 mb-4 mx-auto "></SquarePen>
                </div>
                <h3 class="text-lg text-white font-semibold flex justify-center text-center">Compartilhe Seus Projetos</h3>
                <p class="text-white mt-2">Encontre pessoas que pensam como você e têm as habilidades que você precisa para concretizar seu projeto acadêmico.</p>
            </div>
            <div class="bg-[#516BA3] p-6 rounded-lg text-center">
                <div class="text-white flex justify-center text-center">
                    <BriefcaseBusiness class="w-8 h-8 mb-4 mx-auto "></BriefcaseBusiness>
                </div>
                <h3 class="text-lg font-semibold text-white">Habilidades</h3>
                <p class="text-white mt-2">Encontre pessoas com as habilidades perfeitas para o seu projeto. Veja perfis detalhados e escolha os melhores candidatos com base nas suas competências.</p>
            </div>
            <div class="bg-[#516BA3] p-6 rounded-lg text-center">
                <div class="text-white flex justify-center text-center">
                    <Send class="w-8 h-8 mb-4 mx-auto "></Send>
                </div>
                <h3 class="text-lg font-semibold text-white">Converse com Facilidade</h3>
                <p class="text-white mt-2">Utilize nosso sistema de chat integrado para se comunicar diretamente e mantenha o fluxo de informações e decisões de maneira ágil e centralizada.</p>
            </div>
            <div class="bg-[#516BA3] p-6 rounded-lg text-center">
                <div class="text-white flex justify-center text-center">
                    <Search class="w-8 h-8 mb-4 mx-auto "></Search>
                </div>
                <h3 class="text-lg font-semibold text-white">Filtrar Projetos</h3>
                <p class="text-white mt-2">Use nossos filtros para encontrar projetos que se encaixem no que você procura. Descubra oportunidades que combinam com seu perfil acadêmico e profissional.</p>
            </div>
        </div>
    </div>
</template>
