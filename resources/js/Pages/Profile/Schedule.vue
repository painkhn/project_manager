<script setup lang="ts">
import Layout from '@/Layouts/MainLayout.vue'
import ProfileLayout from '@/Layouts/ProfileLayout.vue';
import { Project, User } from '@/types';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{
    projects: Project[] | null
    user: User
}>()
</script>

<template>
    <Head title="Расписание" />
    <Layout>
        <ProfileLayout :user="props.user" :projects="props.projects">
            <h1 class="mb-5 text-2xl font-semibold">
                Расписание
            </h1>
        </ProfileLayout>
    </Layout>
</template>