<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import ProfileLayout from '@/Layouts/ProfileLayout.vue';
import Layout from '@/Layouts/MainLayout.vue'

defineProps<{
    mustVerifyEmail?: boolean;
    status?: string;
}>();
</script>

<template>

    <Head title="Редактировать профиль" />

    <Layout>
        <ProfileLayout>
            <h1 class="mb-5 text-2xl font-semibold">
                Список проектов
            </h1>
            <div>
                <div class="w-full space-y-6">
                    <div class="bg-white dark:bg-transparent sm:rounded-lg">
                        <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status"
                            class="max-w-xl" />
                    </div>

                    <div class="bg-white dark:bg-transparent sm:rounded-lg">
                        <UpdatePasswordForm class="max-w-xl" />
                    </div>

                    <div class="bg-white dark:bg-transparent sm:rounded-lg">
                        <DeleteUserForm class="max-w-xl" />
                    </div>
                </div>
            </div>
        </ProfileLayout>
    </Layout>
    <!-- <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Profile
            </h2>
        </template>


</AuthenticatedLayout> -->
</template>
