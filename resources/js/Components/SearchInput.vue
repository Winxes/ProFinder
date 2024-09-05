<script setup>
import { PhMagnifyingGlass } from '@phosphor-icons/vue';


</script>

<template>
  <form class="px-4 sm:px-8 md:px-12 lg:px-24">
    <label for="default-search" class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white">Search</label>
    <div class="relative">
      <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
      </div>
      <input type="search" id="default-search" class="h-2 md:w-[442px] rounded-full
     bg-gray-100 p-4 ps-10 text-sm focus:border-blue-500 focus:ring-blue-500
      dark:border-gray-600 dark:text-black dark:placeholder-gray-400
       dark:focus:border-blue-500 dark:focus:ring-primaria" 
       placeholder="Pesquisar" 
       required />
    </div>
  </form>
</template>



<!-- <div className="relative px-4 sm:px-8 md:px-12 lg:px-24 flex justify-between">
    <PhMagnifyingGlass className="size-5"></PhMagnifyingGlass>
    <input class = "ml-auto mb-2 my-3 rounded-xl 
    w-full md:w-[442px] focus:outline-none 
    focus:ring-2 focus:ring-primaria" 
    type="text" 
    icon={PhMagnifyingGlass}
    placeholder="Pesquisar">
</input>
</div> -->
