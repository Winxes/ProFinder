<script setup>
import { ref } from 'vue';
</script>

<template>
  <h3 class="font-bold text-lg">{{ post.title }}</h3>
  <p class="text-gray-700">{{ post.content }}</p>
  <div class="text-sm text-gray-500 mt-2">
    <span>Comentários: {{ post.comments_count }}</span>
    <span class="ml-4">Curtidas: {{ post.likes }}</span>
  </div>  
</template>
  