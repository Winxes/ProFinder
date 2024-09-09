<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Nav from '@/Shared/Nav.vue';

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
    <Head title="Welcome" />
    <Nav /> 
    <div class="bg-gray-50 text-black/50 w-full"> 
        <div class="relative min-h-screen grid grid-rows-[auto_1fr] grid-cols-1 items-center justify-center selection:bg-[#FF2D20] selection:text-white px-4 md:px-6 lg:px-8">
            <div class="relative w-full max-w-2xl mx-auto">
                <main class="w-full mt-6 text-center">
                    <h1 class="text-3xl md:text-5xl font-semibold text-black">Facilitando conexões acadêmicas para transformar ideias em realidade</h1>
                    <p class="text-lg md:text-2xl mt-4">Conecte pessoas e conhecimentos para potencializar suas iniciativas acadêmicas</p>
                </main>

                <footer class="py-8 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>

                <div class="relative w-full bg-[#7C93C3] py-8">
                    <h1 class="text-2xl md:text-4xl text-bold text-white text-center mb-6">O que o nosso sistema oferece?</h1>

                    <div class="w-full flex flex-wrap justify-between gap-4 px-4 md:px-0">
                        <div class="flex flex-col items-center bg-[#516BA3] rounded-lg p-6 max-w-xs w-full text-center">
                            <svg class="w-12 h-12 mb-2" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.5 5.87499H9.79167C8.7529 5.87499 7.75668 6.28763 7.02216 7.02215C6.28765 7.75667 5.875 8.75289 5.875 9.79165V37.2083C5.875 38.2471 6.28765 39.2433 7.02216 39.9778C7.75668 40.7123 8.7529 41.125 9.79167 41.125H37.2083C38.2471 41.125 39.2433 40.7123 39.9778 39.9778C40.7124 39.2433 41.125 38.2471 41.125 37.2083V23.5M35.9844 5.14061C36.7634 4.36154 37.8201 3.92386 38.9219 3.92386C40.0237 3.92386 41.0803 4.36154 41.8594 5.14061C42.6384 5.91968 43.0761 6.97633 43.0761 8.07811C43.0761 9.17989 42.6384 10.2365 41.8594 11.0156L24.2089 28.668C23.7439 29.1326 23.1694 29.4727 22.5385 29.657L16.9122 31.302C16.7437 31.3511 16.565 31.3541 16.395 31.3105C16.2249 31.267 16.0697 31.1785 15.9456 31.0544C15.8215 30.9302 15.733 30.775 15.6895 30.605C15.6459 30.435 15.6489 30.2563 15.698 30.0878L17.343 24.4615C17.5281 23.831 17.8689 23.2573 18.3339 22.793L35.9844 5.14061Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <h1 class="text-lg text-white">Compartilhe seus projetos</h1>
                        </div>

                        <div class="flex flex-col items-center bg-[#516BA3] rounded-lg p-6 max-w-xs w-full text-center">
                            <svg class="w-12 h-12 mb-2" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.4998 23.5H23.5194M31.3332 11.75V7.83332C31.3332 6.79456 30.9205 5.79834 30.186 5.06382C29.4515 4.3293 28.4553 3.91666 27.4165 3.91666H19.5832C18.5444 3.91666 17.5482 4.3293 16.8137 5.06382C16.0792 5.79834 15.6665 6.79456 15.6665 7.83332V11.75M43.0832 25.4583C37.2724 29.2947 30.4628 31.3398 23.4998 31.3398C16.5369 31.3398 9.72729 29.2947 3.9165 25.4583M7.83317 11.75H39.1665C41.3296 11.75 43.0832 13.5035 43.0832 15.6667V35.25C43.0832 37.4131 41.3296 39.1667 39.1665 39.1667H7.83317C5.67006 39.1667 3.9165 37.4131 3.9165 35.25V15.6667C3.9165 13.5035 5.67006 11.75 7.83317 11.75Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <h1 class="text-lg text-white">Compartilhe seus projetos</h1>
                        </div>

                        <div class="flex flex-col items-center bg-[#516BA3] rounded-lg p-6 max-w-xs w-full text-center">
                            <svg class="w-12 h-12 mb-2" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.3723 25.6252C20.9981 25.2517 20.552 24.9577 20.0611 24.7612L4.53153 18.5337C4.34611 18.4593 4.18788 18.3299 4.07809 18.163C3.9683 17.9961 3.9122 17.7996 3.91731 17.5999C3.92243 17.4001 3.98852 17.2067 4.10671 17.0457C4.2249 16.8846 4.38954 16.7635 4.57853 16.6987L41.7869 3.96954C41.9604 3.90687 42.1482 3.8949 42.3282 3.93506C42.5083 3.97521 42.6732 4.06581 42.8037 4.19627C42.9341 4.32673 43.0247 4.49164 43.0649 4.67171C43.105 4.85178 43.0931 5.03956 43.0304 5.21308L30.3012 42.4214C30.2364 42.6104 30.1154 42.775 29.9543 42.8932C29.7932 43.0114 29.5998 43.0775 29.4001 43.0826C29.2004 43.0877 29.0039 43.0316 28.8369 42.9218C28.67 42.8121 28.5407 42.6538 28.4663 42.4684L22.2388 26.9349C22.0413 26.4443 21.7466 25.9988 21.3723 25.6252ZM21.3723 25.6252L42.7974 4.20454" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <h1 class="text-lg text-white">Compartilhe seus projetos</h1>
                        </div>

                        <div class="flex flex-col items-center bg-[#516BA3] rounded-lg p-6 max-w-xs w-full text-center">
                            <svg class="w-12 h-12 mb-2" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M41.125 41.125L32.7042 32.7042M37.2083 21.5417C37.2083 30.1941 30.1941 37.2083 21.5417 37.2083C12.8892 37.2083 5.875 30.1941 5.875 21.5417C5.875 12.8892 12.8892 5.875 21.5417 5.875C30.1941 5.875 37.2083 12.8892 37.2083 21.5417Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <h1 class="text-lg text-white">Compartilhe seus projetos</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
