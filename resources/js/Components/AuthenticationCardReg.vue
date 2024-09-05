<template>
    <div class="min-h-screen flex flex-col sm:flex-row sm:justify-center items-center pt-0 sm:pt-6 bg-gray-100">
        <!-- Container para o logo -->
        <div class="w-full sm:w-[500px] mt-6 px-6 py-4 bg-[#7C93C3] shadow-md rounded-lg flex flex-col items-center hidden sm:block">
            <slot name="logo" />
            <img :src="'images/login-woman.png'" alt="Company Logo" class="max-w-full h-auto" />
        </div>
        
        <!-- Container para o conteúdo principal -->
        <div class="w-full sm:w-[500px] mt-0 sm:mt-6 px-6 py-4 bg-white shadow-md rounded-lg flex flex-col items-center h-screen sm:h-[610px]">
            <slot />
        </div>
    </div>
</template>
