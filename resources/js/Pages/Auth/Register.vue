<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

import Button from '@/Components/ui/button/Button.vue'
import Input from '@/Components/ui/input/Input.vue'
import Label from '@/Components/ui/label/Label.vue'

import Layout from '@/Layouts/LoginLayout.vue'

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};
</script>

<template>
    <Layout>

        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <Label for="name">Имя</Label>

                <Input id="name" type="text" v-model="form.name" required autofocus autocomplete="username" />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <Label for="email">Электронная почта</Label>

                <Input id="email" type="email" v-model="form.email" required autofocus autocomplete="username" />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <Label for="password">Пароль</Label>

                <Input id="password" type="password" v-model="form.password" required autofocus
                    autocomplete="username" />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <Label for="password_confirmation">Подтвердите пароль</Label>

                <Input id="password_confirmation" type="password" v-model="form.password_confirmation" required
                    autofocus autocomplete="username" />


                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <Link :href="route('login')"
                    class="rounded-md text-sm text-gray-600 dark:text-white/90 underline hover:text-gray-900 hover:dark:text-white/70 transition-all focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Войти в аккаунт
                </Link>
                
                <Button class="ml-5" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Регистрация
                </Button>
            </div>
        </form>
    </Layout>
</template>
