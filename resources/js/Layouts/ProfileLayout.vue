<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { Calendar, Edit, LayoutDashboard, List, PanelLeft } from 'lucide-vue-next';
</script>

<template>
    <div class="dark:bg-zinc-900 bg-white p-10 shadow rounded-md flex">
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
                    <Link :href="route('profile.index')" class="text-lg font-semibold flex items-center gap-2">
                    <LayoutDashboard />
                    Панель управления
                    </Link>
                </li>
                <li>
                    <Link :href="route('profile.projects')" class="text-lg font-semibold flex items-center gap-2">
                    <List />
                    Список проектов
                    </Link>
                </li>
                <li>
                    <Link :href="route('profile.schedule')" class="text-lg font-semibold flex items-center gap-2">
                    <Calendar />
                    Расписание
                    </Link>
                </li>
                <li>
                    <Link :href="route('profile.edit')" class="text-lg font-semibold flex items-center gap-2">
                    <Edit />
                    Редактировать
                    </Link>
                </li>
            </ul>
        </div>
        <div class="w-3/4 pl-10">
            <slot />
        </div>
    </div>
</template>