<script setup>
import { ref, onMounted } from 'vue';

const posts = ref([]);
const fetchPosts = async () => {
    try {
        const response = await fetch('/posts'); 
        if (response.ok) {
            const data = await response.json();
            posts.value = data; 
        } else {
            console.error('Erro ao buscar posts do servidor');
        }
    } catch (error) {
        console.error('Erro de conexão com o backend:', error);
    }
};


onMounted(() => {
    fetchPosts();
});
</script>

<template>
    <div class="container mx-auto p-4">
      <h1 class="text-2xl font-bold mb-4">Lista de Posts</h1>
  
      <div v-if="posts.length > 0">
        <ul>
          <li v-for="post in posts" :key="post.id" class="mb-4 p-4 border rounded-lg">
            <h3 class="font-bold text-lg">{{ post.title }}</h3>
            <p class="text-gray-700">{{ post.content }}</p>
            <div class="text-sm text-gray-500 mt-2">
              <span>Comentários: {{ post.comments_count }}</span>
              <span class="ml-4">Curtidas: {{ post.likes }}</span>
            </div>
          </li>
        </ul>
      </div>
  
      <div v-else>
        <p class="text-gray-500">Nenhum post encontrado.</p>
      </div>
    </div>
  </template>
  