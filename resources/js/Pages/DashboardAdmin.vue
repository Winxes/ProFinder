<script setup>
import {inertia} from '@inertiajs/inertia';

const props = defineProps({
    userCount: Number,
    postCount: Number,
    users: Array
});

console.log(props.users);
</script>

<template>
    <div class="antialiased bg-black w-full min-h-screen text-slate-300 relative py-4">
        <div class="grid grid-cols-12 mx-auto gap-2 sm:gap-4 md:gap-6 lg:gap-10 xl:gap-14 max-w-7xl my-10 px-2">
            <div id="menu" class="bg-white/10 col-span-3 rounded-lg p-4 ">
                <h1
                    class="font-bold text-lg lg:text-3xl bg-gradient-to-br from-white via-white/50 to-transparent bg-clip-text text-transparent">
                    Dashboard Admin<span class="text-indigo-400">.</span></h1>
                <p class="text-slate-400 text-sm mb-2">Bem vindo de volta,</p>
                <a href="#"
                    class="flex flex-col space-y-2 md:space-y-0 md:flex-row mb-5 items-center md:space-x-2 hover:bg-white/10 group transition duration-150 ease-linear rounded-lg group w-full py-3 px-2">
                    <div>
                        <img class="rounded-full w-10 h-10 relative object-cover" src="https://preview.redd.it/n2ie4cgf76f71.jpg?width=640&crop=smart&auto=webp&s=844ee6f54d1a2ab71a532c2377df884927889b2b" alt="">
                    </div>
                    <div>
                        <p class="font-medium group-hover:text-indigo-400 leading-4">Saddam Hussein</p>
                        <span class="text-xs text-slate-400">Profinder Admin</span>
                    </div>
                </a>
                <hr class="my-2 border-slate-700">
                <div id="menu" class="flex flex-col space-y-2 my-5">
                    <a href="/dashboard-admin"
                        class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                        <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:text-indigo-400">
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                    Dashboard</p>
                                <p class="text-slate-400 text-sm hidden md:block">Geral</p>
                            </div>
                        </div>
                    </a>
                    <a href="#"
                        class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                        <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:text-indigo-400">
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                    Usuários</p>
                                <p class="text-slate-400 text-sm hidden md:block">Gerenciar usuários</p>
                            </div>
                        </div>
                    </a>
                </div>
                <p class="text-sm text-center text-gray-600">v1.0.0.0 | &copy; 2024 Tartaruga Niggers</p>
            </div>
            <div id="content" class="bg-white/10 col-span-9 rounded-lg p-6">
                <div id="24h">
                    <h1 class="font-bold py-4 uppercase">Estatísticas</h1>
                    <div id="stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-black/60 to-white/5 p-6 rounded-lg">
                            <div class="flex flex-row space-x-4 items-center">
                                <div id="stats-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v2h14V3M5 10v2h14v-2M5 17v2h14v-2M3 3v18a2 2 0 002 2h14a2 2 0 002-2V3M5 10h14M5 17h14" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-indigo-300 text-sm font-medium uppercase leading-4">Users</p>
                                    <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                        <span>{{ userCount }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-black/60 p-6 rounded-lg">
                            <div class="flex flex-row space-x-4 items-center">
                                <div id="stats-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-blue-300 text-sm font-medium uppercase leading-4">Posts Totais</p>
                                    <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                        <span>{{ postCount }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="last-users">
                    <h1 class="font-bold py-4 uppercase">Usuários</h1>
                    <div class="overflow-x-scroll">
                        <table class="w-full whitespace-nowrap">
                            <thead class="bg-black/60">
                                <th class="text-left py-3 px-2 rounded-l-lg">Nome</th>
                                <th class="text-left py-3 px-2">Email</th>
                                <th class="text-left py-3 px-2">Tipo</th>
                                <th class="text-left py-3 px-2">Posts</th>
                                <th class="text-left py-3 px-2 rounded-r-lg">Actions</th>
                            </thead>
                            <tbody>
                                <tr v-for="user in props.users" :key="user.id" class="border-b border-gray-700">
                                    <td class="py-3 px-2 font-bold">
                                        <div class="inline-flex space-x-3 items-center">
                                            <span><img class="rounded-full w-8 h-8" :src="user.avatar" alt=""></span>
                                            <span>{{ user.name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-2">{{ user.email }}</td>
                                    <td class="py-3 px-2">{{ user.role }}</td>
                                    <td class="py-3 px-2">{{ user.posts_count }}</td>       
                                    <td class="py-3 px-2">
                                        <div class="inline-flex items-center space-x-3">
                                            <a href="instagram.co" title="Edit User" class="hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232a4.5 4.5 0 00-6.364 0L3 11.5V21h9.5l5.868-5.868a4.5 4.5 0 000-6.364l-2.176-2.176z" />
                                                </svg>
                                            </a>
                                            <a :href="`/delete-user/${user.id}`" title="Delete User" class="hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
