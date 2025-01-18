<script setup lang="ts">
import Input from '@/Components/ui/input/Input.vue';
import Label from '@/Components/ui/label/Label.vue';
import Textarea from '@/Components/ui/textarea/Textarea.vue';
import Layout from '@/Layouts/MainLayout.vue'
import { Head, useForm } from '@inertiajs/vue3';

import { useToast } from '@/Components/ui/toast/use-toast'
const { toast } = useToast()
import { Toaster } from '@/Components/ui/toast'

import type { DateRange } from 'radix-vue'
import { Button } from '@/Components/ui/button'

// import { Popover, PopoverContent, PopoverTrigger } from '@/Components/ui/popover'
import Popover from '@/Components/ui/popover/Popover.vue';
import PopoverContent from '@/Components/ui/popover/PopoverContent.vue';
import PopoverTrigger from '@/Components/ui/popover/PopoverTrigger.vue';
// import { RangeCalendar } from '@/Components/ui/range-calendar'
import RangeCalendar from '@/Components/ui/range-calendar/RangeCalendar.vue';
import { cn } from '@/lib/utils'
import {
    CalendarDate,
    DateFormatter,
    getLocalTimeZone,
    today
} from '@internationalized/date'
import { Calendar as CalendarIcon } from 'lucide-vue-next'
import { type Ref, ref, watch } from 'vue'

const df = new DateFormatter('en-US', {
    dateStyle: 'medium',
})

const minValue = today(getLocalTimeZone());

const value = ref({
    start: minValue,
    end: minValue.add({ days: 1 }),
}) as Ref<DateRange>

const form = useForm({
    title: '',
    description: '',
    start_date: '',
    end_date: '',
})

watch(value, (newValue) => {
    if (newValue.start) {
        form.start_date = newValue.start.toDate(getLocalTimeZone()).toISOString().split('T')[0];
    }
    if (newValue.end) {
        form.end_date = newValue.end.toDate(getLocalTimeZone()).toISOString().split('T')[0];
    }
}, { deep: true });

const submit = () => {
    form.post(route('project.store'), {
        onFinish: () => {
            console.log('success')
            form.reset()
            toast({
                description: 'Проект успешно создан',
            });
        },
        onError: () => {
            console.log('error')
            toast({
                description: 'Не удалось создать проект',
            });
        }
    })
}

const reset = () => {
    form.reset()
}
</script>

<template>

    <Head title="Создать проект" />
    <Layout>
        <Toaster />
        <div class="w-full p-5 dark:bg-zinc-900 shadow border rounded-md">
            <form class="space-y-6" @submit.prevent="submit">
                <div class="space-y-2">
                    <Label>Название проекта</Label>
                    <Input id="title" name="title" type="text" v-model="form.title" />
                </div>
                <div class="space-y-2">
                    <Label>Описание проекта</Label>
                    <Textarea class="h-20" id="description" name="description" type="text" v-model="form.description" />
                </div>
                <div class="flex flex-col space-y-2">
                    <Label>Дедлайн проекта</Label>
                    <Popover>
                        <PopoverTrigger as-child>
                            <Button variant="outline" :class="cn(
                                'w-full justify-start text-left font-normal bg-transparent',
                                !value && 'text-muted-foreground',
                            )">
                                <CalendarIcon class="mr-2 h-4 w-4" />
                                <template v-if="value.start">
                                    <template v-if="value.end">
                                        {{ df.format(value.start.toDate(getLocalTimeZone())) }} - {{
                                        df.format(value.end.toDate(getLocalTimeZone())) }}
                                    </template>

                                    <template v-else>
                                        {{ df.format(value.start.toDate(getLocalTimeZone())) }}
                                    </template>
                                </template>
                                <template v-else>
                                    Pick a date
                                </template>
                            </Button>
                        </PopoverTrigger>
                        <PopoverContent class="w-auto p-0">
                            <RangeCalendar v-model="value" initial-focus :number-of-months="2"
                                @update:start-value="(startDate) => value.start = startDate" :min-value="minValue" />
                        </PopoverContent>
                    </Popover>
                </div>
                <div class="flex justify-end gap-4">
                    <Button type="button" variant="secondary" @click="() => {
                        reset();
                        toast({
                            description: 'Форма успешно очищена',
                        });
                    }">Очистить</Button>
                    <Button type="submit">Создать проект</Button>
                </div>
            </form>
        </div>
    </Layout>
</template>