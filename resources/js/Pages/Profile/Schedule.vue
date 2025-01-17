<script setup lang="ts">
import Layout from '@/Layouts/MainLayout.vue'
import ProfileLayout from '@/Layouts/ProfileLayout.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Расписание" />
    <Layout>
        <ProfileLayout>
            <h1 class="mb-5 text-2xl font-semibold">
                Расписание
            </h1>
        </ProfileLayout>
    </Layout>
</template>