<!-- <script setup>
import { defineProps } from 'vue';

const props = defineProps({
  post: Object
});
</script>

<template>
  <h3 class="font-bold text-lg">{{ post.title }}</h3>
  <p class="text-gray-700">{{ post.content }}</p>
  <div class="text-sm text-gray-500 mt-2">
    <span>Comentários: {{ post.comments_count }}</span>
    <span class="ml-4">Curtidas: {{ post.likes }}</span>
  </div>  
</template> -->

<script setup>
import { defineProps, ref } from 'vue';
import { PhHeartStraight, PhChatCircle, PhBookmarks } from '@phosphor-icons/vue';
import { EllipsisVertical } from 'lucide-vue-next';

const props = defineProps({
  post: Object
});

const isLiked = ref(props.post.isLiked);

// Emit events for like, comment, and settings modals
const toggleLike = () => {
  isLiked.value = !isLiked.value;
  // Emit an event to the parent
  props.post.like_count += isLiked.value ? 1 : -1;
  // Emit the like event to the parent so it can handle the backend logic
  emit('like', props.post);
};

const openCommentModal = () => {
  emit('comment', props.post);
};

const openSettingsModal = () => {
  emit('settings', props.post);
};
</script>

<template>
  <div class="flex flex-col bg-post border-gray-300 w-full h-auto shadow-shape rounded-xl mb-6">
    <!-- Post Header -->
    <div class="flex flex-row mx-4">
      <img :src="post.user?.avatar || 'default-avatar.png'" alt="icon"
        class="rounded-full ml-2 mt-2 w-8 h-8 object-cover mr-4" />
      <h2 class="mt-3 font-normal">{{ post.user?.name }}</h2>
      <p class="mt-4 px-6 font-normal text-xs">{{ post.created_at }}</p>
      <div class="ml-auto mt-2">
        <button type="button" @click="openSettingsModal"
            class="items-center mb-3 rounded-md hover:bg-zinc-200 active:bg-zinc-300 focus:outline-none transition ease-in-out duration-150">
            <EllipsisVertical class="w-6 h-6"></EllipsisVertical>
        </button>
      </div>
    </div>

    <!-- Post Body -->
    <div class="mx-4">
      <h3 class="mt-4 font-bold text-md">{{ post.title }}</h3>
      <p class="text-justify ml-2 line-clamp-3 overflow-hidden">{{ post.content }}</p>
      <button class="ml-2 text-blue-500 mt-1">Ler mais</button>
    </div>

    <!-- Post Footer -->
    <div class="flex items-center mt-4 mx-4 justify-start mb-4">
      <button type="button" @click="toggleLike" :class="isLiked ? 'text-red-500' : 'text-black'">
        <PhHeartStraight class="w-6 h-6"></PhHeartStraight>
      </button>
      <span>{{ post.like_count }}</span>

      <button type="button" @click="openCommentModal">
        <PhChatCircle class="w-6 h-6"></PhChatCircle>
      </button>

      <button type="button">
        <PhBookmarks class="w-6 h-6"></PhBookmarks>
      </button>
    </div>
  </div>
</template>
