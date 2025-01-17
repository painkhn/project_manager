<script setup lang="ts">
import Header from '@/Components/Main/Header.vue'
</script>

<template>
    <Header class="mb-5" />
    <div class="max-w-7xl w-full mx-auto">
        <slot />
    </div>
</template>