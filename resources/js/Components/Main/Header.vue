<script setup lang="ts">
import DarkModeToggle from '@/Components/Main/DarkModeToggle.vue'
import Logo from '@/Components/Main/Logo.vue'
import { Link } from '@inertiajs/vue3';

import {
    NavigationMenu,
    NavigationMenuContent,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
    NavigationMenuTrigger,
    navigationMenuTriggerStyle,
} from '@/Components/ui/navigation-menu'

const components: { title: string, href: string, description: string }[] = [
    {
        title: 'Alert Dialog',
        href: '/docs/components/alert-dialog',
        description:
            'A modal dialog that interrupts the user with important content and expects a response.',
    },
    {
        title: 'Hover Card',
        href: '/docs/components/hover-card',
        description:
            'For sighted users to preview content available behind a link.',
    },
    {
        title: 'Progress',
        href: '/docs/components/progress',
        description:
            'Displays an indicator showing the completion progress of a task, typically displayed as a progress bar.',
    },
    {
        title: 'Scroll-area',
        href: '/docs/components/scroll-area',
        description: 'Visually or semantically separates content.',
    },
    {
        title: 'Tabs',
        href: '/docs/components/tabs',
        description:
            'A set of layered sections of content—known as tab panels—that are displayed one at a time.',
    },
    {
        title: 'Tooltip',
        href: '/docs/components/tooltip',
        description:
            'A popup that displays information related to an element when the element receives keyboard focus or the mouse hovers over it.',
    },
]
</script>

<template>
    <header class="w-full h-auto shadow bg-white dark:bg-zinc-900">
        <div class="max-w-7xl w-full py-5 mx-auto my-0">
            <div class="flex justify-between items-center">
                <div class="flex gap-5">
                    <Logo />
                    <NavigationMenu>
                        <NavigationMenuList>
                            <NavigationMenuItem>
                                <NavigationMenuLink class="bg-transparent" :href="route('project.create')"
                                    :class="navigationMenuTriggerStyle()">
                                    Создать проект
                                </NavigationMenuLink>
                            </NavigationMenuItem>
                            <NavigationMenuItem>
                                <NavigationMenuLink class="bg-transparent" href="/docs/introduction"
                                    :class="navigationMenuTriggerStyle()">
                                    Documentation
                                </NavigationMenuLink>
                            </NavigationMenuItem>
                            <NavigationMenuItem>
                                <NavigationMenuLink class="bg-transparent" href="/docs/introduction"
                                    :class="navigationMenuTriggerStyle()">
                                    Documentation
                                </NavigationMenuLink>
                            </NavigationMenuItem>
                        </NavigationMenuList>
                    </NavigationMenu>
                </div>
                <div class="flex gap-5 items-center">
                    <div v-if="!$page.props.auth.user">
                        <Link :href="route('login')"
                            class="px-4 py-2 rounded-md hover:dark:bg-white/10 hover:bg-black/10 font-semibold transition-all">
                        Войти в аккаунт
                        </Link>
                    </div>
                    <div v-else>
                        <Link :href="route('profile.index')"
                            class="px-4 py-2 rounded-md hover:dark:bg-white/10 hover:bg-black/10 font-semibold transition-all">
                        {{ $page.props.auth.user.name }}
                        </Link>
                    </div>
                    <DarkModeToggle />
                </div>
            </div>
        </div>
    </header>
</template>