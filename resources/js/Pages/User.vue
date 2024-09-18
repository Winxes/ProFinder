<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Perfil">
        <div class="mother-box grid">
            <div class="dad-box grid-rows-1 px-8 py-4">
                <div class="mb-6 flex items-center space-x-4">
                    <h1 class="font-semibold text-2xl text-center">Perfil</h1>
                    <div class="flex-grow flex justify-end">
                        <label for="input" class="block mb-2 text-sm font-medium"></label>
                        <input type="text" id="large-input" class="block w-full sm:w-40 h-11 p-4 border border-gray-300 rounded-lg bg-gray-50 text-base">
                    </div>
                </div>
            </div>
            <div class="dad2-box grid-rows-2 px-8 py-4">
                <div class="div-cape-image">
                    <img :src="'images/capa-teste.jpeg'" alt="teste-capa" class="max-w-full h-auto"/>
                </div>

                <div class="div-profile flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-4 text-center">
                    <svg height="120" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M5.38846 12.7023C3.98522 12.1237 3 10.7636 3 9.17807C3 7.42863 4.3 5.8125 6.25 5.5C6.86168 4.0617 8.30934 3 9.9978 3C12.1607 3 13.9285 4.65893 14.05 6.75C14.8721 7.10549 15.5169 7.83126 15.8166 8.69914M5.38846 12.7023C4.50928 13.5938 4 14.7867 4 16.0315C4 18.7755 6.28335 21 9.1 21L16.75 21C19.0972 21 21 19.1279 21 16.8185C21 15.1039 19.951 13.5202 18.45 12.875C18.3457 11.0905 17.3135 9.5483 15.8166 8.69914M5.38846 12.7023C6.11557 11.9651 7.0957 11.4339 8.25 11.25C9.04989 9.3802 10.943 8 13.151 8C14.1227 8 15.0333 8.25474 15.8166 8.69914" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    <div class="flex flex-col items-center space-y-2">
                        <div class="flex flex-col items-center space-y-1">
                            <h1 class="text-xl font-semibold">Gabriel Verme</h1>
                            <p>@Belt</p>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <h2>GABRIEL CISNEIROS OLIVEIRA DA SILVA | AGEPLAYER</h2>
                            <p>AISJDHBASIDUBSIDUSD@protonmail.me</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
