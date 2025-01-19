<script setup lang="ts">
import Layout from '@/Layouts/MainLayout.vue'
import { Head, Link } from '@inertiajs/vue3';
import { Calendar, Edit, LayoutDashboard, List, PanelLeft } from 'lucide-vue-next';
import ProfileLayout from '@/Layouts/ProfileLayout.vue';
import { Project, User } from '@/types';
import { onMounted } from 'vue';

const props = defineProps<{
    projects: Project[] | null
    user: User
}>()

onMounted(() => {
    // console.log(props.projects);
})
</script>

<template>

    <Head title="Профиль" />
    <Layout>
        <ProfileLayout :user="props.user">
            <h1 class="mb-5 text-2xl font-semibold">
                Панель управления
            </h1>
            <div class="grid grid-cols-3">
                <Link :href="route('profile.projects', { id: props.user.id })"
                    class="w-full h-[150px] overflow-hidden p-5 dark:bg-zinc-800 border dark:border-0 rounded-2xl relative transition-all hover:scale-105">
                    <h2 class="text-2xl font-semibold mb-2.5">
                        Всего проектов: {{ props.projects?.length }}
                    </h2>
                    <ul class="flex flex-col gap-1 list-disc pl-5">
                        <li v-for="(project, index) in props.projects" :key="index">
                            <p class="line-clamp-1">
                                {{ project.title }}
                            </p>
                        </li>
                    </ul>
                    <div
                        class="absolute bottom-0 left-0 w-full h-5 rounded-b-2xl bg-gradient-to-t dark:from-black/35 from-black/10 to-transparent z-20">
                    </div>
                </Link>
            </div>
        </ProfileLayout>
    </Layout>
</template>