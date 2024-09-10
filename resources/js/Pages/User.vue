




<script setup>
    import { Link } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue'


    import { defineComponent } from 'vue'
    defineComponent({
        components: {
            Link,
            Nav
        },
        props: {
            canLogin: {
                type: Boolean,
                default: true,
            },
            canRegister: {
                type: Boolean,
                default: true,
            },
            laravelVersion: {
                type: String,
                required: true,
            },
            phpVersion: {
                type: String,
                required: true,
            },
        },
    })

</script>
<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                </div>
            </div>
        </div>
    </AppLayout>
</template>