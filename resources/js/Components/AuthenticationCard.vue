<template>
    <div class="min-h-screen flex flex-row sm:flex-row sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-[#7C93C3] shadow-md overflow-hidden sm:justify-center items-center sm:rounded-lg flex flex-col items-center flex-1">
            <slot  name="logo" />
            <img :src="'images/login-woman.png'" alt="Company Logo">
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg h-128">
            <slot />
        </div>
    </div>
</template>
