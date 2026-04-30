
<template>
    <div v-if="$page.props.auth.user" class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Admin Settings</h1>
        <form @submit.prevent="saveSettings">
            <div class="mb-4">
                <label for="site_name" class="block text-gray-700">Site Name</label>
                <input
                    v-model="form.site_name"
                    type="text"
                    id="site_name"
                    name="site_name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                />
            </div>
            <!-- Add more settings fields here -->
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Save Settings
            </button>
        </form>
    </div>
    <div v-else class="flex items-center justify-center min-h-screen">
        <div class="text-center">
            <h2 class="text-2xl font-bold mb-4">Please login to access the admin panel.</h2>
            <a href="/login" class="text-blue-600 underline">Go to Login</a>
        </div>
    </div>
</template>

<script setup>
import { reactive } from "vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    site_name: "",
    // Add more fields as needed
});

function saveSettings() {
    // TODO: Implement save logic (POST to backend)
    // Example: form.post(route('admin.settings.save'));
    alert("Settings saved (not yet implemented)");
}
</script>
