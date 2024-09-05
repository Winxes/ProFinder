<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    user: '',
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    department: '',
    phone: '',
    habilidades: [],
    terms: true,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit" class="space-y-4 sm:space-y-6">
            <div class="pt-12 sm:pt-16 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen pb-8">
                <div class="flex flex-col md:grid md:grid-cols-2 gap-4">
                    <!-- Nome -->
                    <div class="flex flex-col">
                        <InputLabel for="name" value="Nome" />
                        <TextInput
                            id="name"
                            v-model="form.name"
                            type="text"
                            class="mt-1 block w-full"
                            required
                            autofocus
                            autocomplete="name"
                        />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <!-- Email -->
                    <div class="flex flex-col">
                        <InputLabel for="email" value="Email" />
                        <TextInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="mt-1 block w-full"
                            required
                            autocomplete="username"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <!-- Senha -->
                    <div class="flex flex-col">
                        <InputLabel for="password" value="Senha" />
                        <TextInput
                            id="password"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-full"
                            required
                            autocomplete="new-password"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <!-- Confirme a Senha -->
                    <div class="flex flex-col">
                        <InputLabel for="password_confirmation" value="Confirme a senha" />
                        <TextInput
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            type="password"
                            class="mt-1 block w-full"
                            required
                            autocomplete="new-password"
                        />
                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>

                    <!-- Departamento -->
                    <div class="flex flex-col">
                        <InputLabel for="department" value="Departamento" />
                        <TextInput
                            id="department"
                            v-model="form.department"
                            type="text"
                            class="mt-1 block w-full"
                            required
                            autocomplete="department"
                        />
                        <InputError class="mt-2" :message="form.errors.department" />
                    </div>

                    <!-- Celular -->
                    <div class="flex flex-col">
                        <InputLabel for="phone" value="Celular" />
                        <TextInput
                            id="phone"
                            v-model="form.phone"
                            type="tel"
                            class="mt-1 block w-full"
                            required
                            autocomplete="tel"
                        />
                        <InputError class="mt-2" :message="form.errors.phone" />
                    </div>

                    <!-- Habilidades -->
                    <div class="flex flex-col md:col-span-2">
                        <InputLabel for="habilidades" value="Habilidades" />
                        <select
                            id="habilidades"
                            v-model="form.habilidades"
                            
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            required
                        >
                            <option value="programacao">Programação</option>
                            <option value="design">Design</option>
                            <option value="marketing">Marketing</option>
                            <option value="gestao">Gestão</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.habilidades" />
                    </div>

                    <!-- Termos e Política de Privacidade -->
                    <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                        <InputLabel for="terms">
                            <div class="flex items-start">
                                <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />
                                <div class="ml-2 text-sm">
                                    I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-gray-600 hover:text-gray-900">Privacy Policy</a>
                                </div>
                            </div>
                            <InputError class="mt-2" :message="form.errors.terms" />
                        </InputLabel>
                    </div>

                    <!-- Botão de Cadastro -->
                    <div class="flex flex-col items-center justify-between mt-6 md:flex-row">
                        <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Já está cadastrado?
                        </Link>

                        <PrimaryButton class="mt-4 md:mt-0 md:ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Cadastrar
                        </PrimaryButton>
                    </div>
                </div>
            </div>
        </form>
    </AuthenticationCard>
</template>
