<script setup lang="ts">
import Layout from '@/Layouts/MainLayout.vue'
import ProfileLayout from '@/Layouts/ProfileLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { DefineProps } from 'vue';
import { Project, User } from '@/types';
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/Components/ui/table'
import { Edit, Ellipsis, Trash } from 'lucide-vue-next';

import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from '@/Components/ui/popover'
import Button from '@/Components/ui/button/Button.vue';

const props = defineProps<{
    projects?: Project[] | null
    user: User
}>()

</script>

<template>

    <Head title="Список проектов" />
    <Layout>
        <ProfileLayout :user="props.user">
            <h1 class="mb-5 text-2xl font-semibold">
                Список проектов
            </h1>
            <Table>
                <TableCaption>A list of your recent invoices.</TableCaption>
                <TableHeader>
                    <TableRow>
                        <TableHead class="w-[50%]">
                            Название проекта
                        </TableHead>
                        <TableHead class="ml-auto w-[30%] text-right">Начало проекта</TableHead>
                        <TableHead class="w-full text-right">Окончание проекта</TableHead>
                        <!-- <TableHead class="text-right">
                            
                        </TableHead> -->
                    </TableRow>
                </TableHeader>
                <TableBody v-if="(props.projects as Project[])?.length > 0">
                    <TableRow v-for="project in projects" :key="project.id">
                        <TableCell class="font-medium overflow-hidden line-clamp-1">
                            <Link :href="route('project.index', { id: project.id })" class="block leading-[25px]">
                            {{ project.title }}
                            </Link>
                        </TableCell>
                        <TableCell class="text-right">{{ project.start_date }}</TableCell>
                        <TableCell class="text-right">{{ project.end_date }}</TableCell>
                        <TableCell class="text-right">
                            <Popover>
                                <PopoverTrigger>
                                    <Ellipsis class="inline" />
                                </PopoverTrigger>
                                <PopoverContent class="w-14 text-right">
                                    <div class="space-y-4">
                                        <button>
                                            <Edit
                                                class="text-blue-400 hover:text-blue-500 dark:hover:text-blue-300 transition-all" />
                                        </button>
                                        <button>
                                            <Trash
                                                class="text-red-400 hover:text-red-500 dark:hover:text-red-300 transition-all" />
                                        </button>
                                    </div>
                                </PopoverContent>
                            </Popover>
                        </TableCell>
                    </TableRow>
                </TableBody>
                <TableBody v-else>
                    <TableRow>
                        <TableCell class="font-medium overflow-hidden">
                            Не найдено ни одного проекта
                        </TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        </ProfileLayout>
    </Layout>
</template>