<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <div class="flex flex-col w-full min-h-screen items-center justify-center gap-5">
        <div class="max-w-2xl w-full h-auto p-5 mx-auto border rounded-md">
            <slot />
        </div>
        <Link :href="route('home')" class="text-black dark:text-white transition-all hover:opacity-80 font-semibold">На главную</Link>
    </div>
</template>