<script setup>
import { ref, onMounted } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import axios from 'axios';
import {inertia} from '@inertiajs/inertia';

// Variáveis para armazenar os dados dinâmicos
const user = ref({
    name: '',
    title: '',
    avatar: '',
    skills: [],
    experience: [],
    about: ''
});

const props = defineProps({
    user: Object
});

console.log(props.user);

</script>

<template>
    <AppLayout title="Perfil">
        <div class="bg-gray-100">
            <div class="container mx-auto py-8">
                <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                    <!-- Coluna de perfil -->
                    <div class="col-span-4 sm:col-span-3">
                        <div class="bg-white shadow rounded-lg p-6">
                            <div class="flex flex-col items-center">
                                <img :src="user.avatar" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">
                                <h1 class="text-xl font-bold">{{ props.user.name }}</h1>
                                <p class="text-gray-700">{{ props.user.title }}</p>
                                <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                    <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Contato</a>
                                    <a href="#" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">Chat</a>
                                </div>
                            </div>
                            <hr class="my-6 border-t border-gray-300">
                            <!-- Skills -->
                            <div class="flex flex-col">
                                <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Skills</span>
                                <ul>
                                    <li v-for="(skill, index) in props.user.skills" :key="index" class="mb-2">{{ skill }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Coluna de conteúdo -->
                    <div class="col-span-4 sm:col-span-9">
                        <div class="bg-white shadow rounded-lg p-6">
                            <!-- Sobre mim -->
                            <h2 class="text-xl font-bold mb-4">Sobre mim</h2>
                            <p class="text-gray-700">{{ props.user.about }}</p>

                            <!-- Experiência -->
                            <h2 class="text-xl font-bold mt-6 mb-4">Experiência</h2>
                            <div v-for="(exp, index) in props.user.experience" :key="index" class="mb-6">
                                <div class="flex justify-between flex-wrap gap-2 w-full">
                                    <span class="text-gray-700 font-bold">{{ exp.position }}</span>
                                    <p>
                                        <span class="text-gray-700 mr-2">{{ exp.company }}</span>
                                        <span class="text-gray-700">{{ exp.period }}</span>
                                    </p>
                                </div>
                                <p class="mt-2">
                                    {{ exp.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
