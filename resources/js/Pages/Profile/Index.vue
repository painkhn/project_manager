<script setup lang="ts">
import Layout from '@/Layouts/MainLayout.vue'
import { Head, Link } from '@inertiajs/vue3';
import { Edit, LayoutDashboard, PanelLeft } from 'lucide-vue-next';
</script>

<template>

    <Head title="Профиль" />
    <Layout>
        <div class="dark:bg-zinc-950 bg-white p-10 shadow">
            <div class="w-1/4 border-r dark:border-white border-zinc-400 pr-10 flex flex-col items-center gap-5">
                <img src="/img/avatar_default.jpg" alt="" class="rounded-full w-40">
                <div class="flex flex-col gap-2 items-center">
                    <p class="font-semibold text-2xl">
                        {{ $page.props.auth.user.name }}
                    </p>
                    <p class="font-semibold text-lg">
                        {{ $page.props.auth.user.email }}
                    </p>
                </div>
                <ul class="flex flex-col gap-2 items-start">
                    <li>
                        <Link href="#!" class="text-lg font-semibold flex items-center gap-2">
                        <LayoutDashboard />
                        Панель управления
                        </Link>
                    </li>
                    <li>
                        <Link href="#!" class="text-lg font-semibold flex items-center gap-2">
                        <LayoutDashboard />
                        Панель управления
                        </Link>
                    </li>
                    <li>
                        <Link href="#!" class="text-lg font-semibold flex items-center gap-2">
                        <LayoutDashboard />
                        Панель управления
                        </Link>
                    </li>
                    <li>
                        <Link href="#!" class="text-lg font-semibold flex items-center gap-2">
                        <Edit />
                        Редактировать
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </Layout>
</template>