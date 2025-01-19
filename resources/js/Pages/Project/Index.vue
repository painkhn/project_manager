<script setup lang="ts">
import Layout from '@/Layouts/MainLayout.vue'
import { Head, Link } from '@inertiajs/vue3';
import { DefineProps, onMounted } from 'vue';
import { User, Project, Task } from '@/types'

import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/Components/ui/dialog'
import Button from '@/Components/ui/button/Button.vue';
import Label from '@/Components/ui/label/Label.vue';
import Input from '@/Components/ui/input/Input.vue';
import Textarea from '@/Components/ui/textarea/Textarea.vue';

import {
    Command,
    CommandEmpty,
    CommandGroup,
    CommandInput,
    CommandItem,
    CommandList
} from '@/Components/ui/command'
import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from '@/Components/ui/popover'
import { cn } from '@/lib/utils'
import { Check, ChevronsUpDown } from 'lucide-vue-next'
import { ref } from 'vue'

const frameworks = [
    { value: 'next.js', label: 'Next.js' },
    { value: 'sveltekit', label: 'SvelteKit' },
    { value: 'nuxt', label: 'Nuxt' },
    { value: 'remix', label: 'Remix' },
    { value: 'astro', label: 'Astro' },
]

const open = ref(false)
const value = ref('')

const props = defineProps<{
    project: Project
    tasks?: Task[] | null
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
            <div class="mt-4 space-y-2">
                <h2 class="text-2xl font-semibold">Задачи</h2>
                <Dialog>
                    <DialogTrigger>
                        <Button>
                            Добавить задачу
                        </Button>
                    </DialogTrigger>
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Введите нужные данные и добавьте задачу</DialogTitle>
                            <DialogDescription></DialogDescription>
                        </DialogHeader>
                        <form class="space-y-4">
                            <div class="space-y-2">
                                <Label>Название задачи</Label>
                                <Input />
                            </div>
                            <div class="space-y-2">
                                <Label>Описание задачи</Label>
                                <Textarea />
                            </div>
                            <div class="space-y-2 flex flex-col">
                                <Label>Ответственный за выполнение</Label>
                                <Popover v-model:open="open">
                                    <PopoverTrigger as-child>
                                        <Button variant="outline" role="combobox" :aria-expanded="open"
                                            class="w-full justify-between">
                                            {{ value ? frameworks.find((framework) => framework.value === value)?.label
                                            : 'Выберите пользователя...' }}

                                            <ChevronsUpDown class="ml-2 h-4 w-4 shrink-0 opacity-50" />
                                        </Button>
                                    </PopoverTrigger>
                                    <PopoverContent class="w-[200px] p-0">
                                        <Command v-model="value">
                                            <CommandInput placeholder="Search framework..." />
                                            <CommandEmpty>No framework found.</CommandEmpty>
                                            <CommandList>
                                                <CommandGroup>
                                                    <CommandItem v-for="framework in frameworks" :key="framework.value"
                                                        :value="framework.value" @select="open = false">
                                                        <Check :class="cn(
                                                            'mr-2 h-4 w-4',
                                                            value === framework.value ? 'opacity-100' : 'opacity-0',
                                                        )" />
                                                        {{ framework.label }}
                                                    </CommandItem>
                                                </CommandGroup>
                                            </CommandList>
                                        </Command>
                                    </PopoverContent>
                                </Popover>
                            </div>
                            <Button as="button" type="button" class="block ml-auto">Добавить задачу</Button>
                        </form>
                    </DialogContent>
                </Dialog>
                <div v-if="props.tasks?.length === 0">
                    <p>
                        Не найдено ни одной задачи
                    </p>
                </div>
            </div>
        </div>
    </Layout>
</template>