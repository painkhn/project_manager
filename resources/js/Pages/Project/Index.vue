<script setup lang="ts">
import Layout from '@/Layouts/MainLayout.vue'
import { Head, Link } from '@inertiajs/vue3';
import { DefineProps, onMounted } from 'vue';
import { User, Project } from '@/types'

const props = defineProps<{
    project: Project
}>()

onMounted(() => {
    // console.log(props.project);    
})
</script>

<template>

    <Head title="Проект" />
    <Layout>
        <div class="w-full h-auto p-10 dark:bg-zinc-900 shadow border dark:border-0 rounded-md">
            <div class="space-y-2 mb-4">
                <h1 class="text-2xl font-semibold">{{ props.project.title }}</h1>
                <p>
                    {{ props.project.description }}
                </p>
                <p class="opacity-80">
                    {{ props.project.start_date }}
                    <span class="mx-2">
                        -
                    </span>
                    {{ props.project.end_date }}
                </p>
            </div>
            <Link :href="route('profile.index', { id: props.project.user.id })" class="pb-4 block">
                {{ props.project.user.name }}
            </Link>
            <hr>
            <div class="mt-4">
                <h2 class="text-2xl font-semibold">Задачи</h2>
            </div>
        </div>
    </Layout>
</template>