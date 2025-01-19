<script setup lang="ts">
import { User } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Calendar, Edit, LayoutDashboard, List, PanelLeft } from 'lucide-vue-next';
import { DefineProps, onMounted } from 'vue';

const props = defineProps<{
    user: User
}>()

onMounted(() => {
    // console.log(props.user)
})
</script>

<template>
    <div class="dark:bg-zinc-900 bg-white p-10 shadow rounded-md flex">
        <div class="w-1/4 border-r dark:border-white border-zinc-400 pr-10 flex flex-col items-center gap-12">
            <img src="/img/avatar_default.jpg" alt="" class="rounded-full w-40">
            <div class="flex flex-col gap-2 items-center">
                <p class="font-semibold text-2xl">
                    {{ props.user.name }}
                </p>
                <p class="font-semibold text-lg">
                    {{ props.user.email }}
                </p>
            </div>
            <ul class="flex flex-col gap-4 items-start">
                <li>
                    <Link :href="route('profile.index', { id: props.user.id })" class="text-lg font-semibold flex items-center gap-2">
                    <LayoutDashboard />
                    Панель управления
                    </Link>
                </li>
                <li>
                    <Link :href="route('profile.projects', { id: props.user.id })" class="text-lg font-semibold flex items-center gap-2">
                    <List />
                    Список проектов
                    </Link>
                </li>
                <li>
                    <Link :href="route('profile.schedule', { id: props.user.id })" class="text-lg font-semibold flex items-center gap-2">
                    <Calendar />
                    Расписание
                    </Link>
                </li>
                <li>
                    <Link :href="route('profile.edit', { id: props.user.id })" class="text-lg font-semibold flex items-center gap-2">
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