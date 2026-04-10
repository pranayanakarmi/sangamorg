<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import SocialLinkForm from './SocialLinkForm.vue';

const form = useForm({
    name: '',
    url: '',
    icon: null,
    sort_order: 0,
    is_active: true,
});

function submit() {
    form.post(route('admin.social-links.store'), {
        forceFormData: true,
    });
}
</script>

<template>
    <Head title="Add Social Link" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Add Social Link
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-xl px-4 sm:px-6 lg:px-8">
                <div class="rounded-lg bg-white p-6 shadow">
                    <SocialLinkForm
                        :form="form"
                        :errors="form.errors"
                        submit-label="Create"
                        @submit="submit"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
