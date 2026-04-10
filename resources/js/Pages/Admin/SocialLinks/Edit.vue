<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import SocialLinkForm from './SocialLinkForm.vue';

const props = defineProps({
    socialLink: Object,
});

const form = useForm({
    name: props.socialLink.name,
    url: props.socialLink.url,
    icon: null,
    icon_url: props.socialLink.icon_url,
    sort_order: props.socialLink.sort_order,
    is_active: props.socialLink.is_active,
});

function submit() {
    form.post(route('admin.social-links.update', props.socialLink.id), {
        forceFormData: true,
        // Inertia uses POST + _method for spoofed PATCH via multipart
        data: { ...form.data(), _method: 'patch' },
    });
}
</script>

<template>
    <Head title="Edit Social Link" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit Social Link
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-xl px-4 sm:px-6 lg:px-8">
                <div class="rounded-lg bg-white p-6 shadow">
                    <SocialLinkForm
                        :form="form"
                        :errors="form.errors"
                        submit-label="Update"
                        @submit="submit"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
