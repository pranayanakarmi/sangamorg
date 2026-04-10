<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    socialLinks: Array,
});

function destroy(id) {
    if (confirm('Delete this social link?')) {
        router.delete(route('admin.social-links.destroy', id));
    }
}
</script>

<template>
    <Head title="Social Links" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Social Links
                </h2>
                <Link
                    :href="route('admin.social-links.create')"
                    class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    + Add Link
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
                <!-- Flash message -->
                <div
                    v-if="$page.props.status"
                    class="mb-4 rounded-md bg-green-50 p-4 text-sm text-green-700"
                >
                    {{ $page.props.status }}
                </div>

                <div class="overflow-hidden rounded-lg bg-white shadow">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Icon</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">URL</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Order</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Active</th>
                                <th class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-if="socialLinks.length === 0">
                                <td colspan="6" class="px-6 py-8 text-center text-sm text-gray-400">
                                    No social links yet. <Link :href="route('admin.social-links.create')" class="text-indigo-600 hover:underline">Add one.</Link>
                                </td>
                            </tr>
                            <tr v-for="link in socialLinks" :key="link.id">
                                <td class="px-6 py-4">
                                    <img
                                        v-if="link.icon_url"
                                        :src="link.icon_url"
                                        :alt="link.name"
                                        class="h-8 w-8 rounded-full object-contain"
                                    />
                                    <span v-else class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-200 text-xs font-semibold text-gray-500">
                                        {{ link.name.charAt(0).toUpperCase() }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ link.name }}</td>
                                <td class="max-w-xs truncate px-6 py-4 text-sm text-gray-500">
                                    <a :href="link.url" target="_blank" rel="noopener noreferrer" class="text-indigo-600 hover:underline">
                                        {{ link.url }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ link.sort_order }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span :class="link.is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500'" class="rounded-full px-2 py-0.5 text-xs font-medium">
                                        {{ link.is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="space-x-3 px-6 py-4 text-right text-sm font-medium">
                                    <Link
                                        :href="route('admin.social-links.edit', link.id)"
                                        class="text-indigo-600 hover:text-indigo-900"
                                    >Edit</Link>
                                    <button
                                        @click="destroy(link.id)"
                                        class="text-red-600 hover:text-red-900"
                                    >Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
