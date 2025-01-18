<script setup lang="ts">
import Layout from '@/Layouts/MainLayout.vue'
import ProfileLayout from '@/Layouts/ProfileLayout.vue';
import { Head } from '@inertiajs/vue3';
import { DefineProps } from 'vue';
import { Project } from '@/types';
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/Components/ui/table'
import { Ellipsis } from 'lucide-vue-next';

const props = defineProps<{
    projects: Project[] | null
}>()

</script>

<template>

    <Head title="Список проектов" />
    <Layout>
        <ProfileLayout>
            <h1 class="mb-5 text-2xl font-semibold">
                Список проектов
            </h1>
            <Table>
                <TableCaption>A list of your recent invoices.</TableCaption>
                <TableHeader>
                    <TableRow>
                        <TableHead class="w-[150px]">
                            Название проекта
                        </TableHead>
                        <TableHead class="text-right">Начало проекта</TableHead>
                        <TableHead class="text-right">Окончание проекта</TableHead>
                        <TableHead class="text-right">
                            Amount
                        </TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow v-for="project in projects" :key="project.id">
                        <TableCell class="font-medium">
                            {{ project.title }}
                        </TableCell>
                        <TableCell class="text-right">{{ project.start_date }}</TableCell>
                        <TableCell class="text-right">{{ project.end_date }}</TableCell>
                        <TableCell class="text-right">
                            <Ellipsis class="inline" />
                        </TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        </ProfileLayout>
    </Layout>
</template>