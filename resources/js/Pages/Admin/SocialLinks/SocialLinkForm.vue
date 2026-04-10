<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    form: Object,
    errors: Object,
    submitLabel: {
        type: String,
        default: 'Save',
    },
});

const emit = defineEmits(['submit']);

const iconPreview = ref(props.form.icon_url ?? null);

function onIconChange(e) {
    const file = e.target.files[0];
    if (file) {
        props.form.icon = file;
        iconPreview.value = URL.createObjectURL(file);
    }
}
</script>

<template>
    <form @submit.prevent="$emit('submit')" enctype="multipart/form-data" class="space-y-6">
        <!-- Name -->
        <div>
            <InputLabel for="name" value="Name" />
            <TextInput
                id="name"
                v-model="form.name"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
            />
            <InputError :message="errors.name" class="mt-2" />
        </div>

        <!-- URL -->
        <div>
            <InputLabel for="url" value="URL" />
            <TextInput
                id="url"
                v-model="form.url"
                type="url"
                class="mt-1 block w-full"
                placeholder="https://twitter.com/yourhandle"
                required
            />
            <InputError :message="errors.url" class="mt-2" />
        </div>

        <!-- Icon Upload -->
        <div>
            <InputLabel value="Icon (PNG, JPG, WebP — max 512 KB)" />
            <div class="mt-1 flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center overflow-hidden rounded-full bg-gray-100">
                    <img
                        v-if="iconPreview"
                        :src="iconPreview"
                        alt="icon preview"
                        class="h-full w-full object-contain"
                    />
                    <svg v-else class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <label class="cursor-pointer rounded-md border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
                    Choose file
                    <input type="file" class="sr-only" accept="image/png,image/jpeg,image/webp" @change="onIconChange" />
                </label>
            </div>
            <InputError :message="errors.icon" class="mt-2" />
        </div>

        <!-- Sort Order -->
        <div>
            <InputLabel for="sort_order" value="Sort Order" />
            <TextInput
                id="sort_order"
                v-model="form.sort_order"
                type="number"
                min="0"
                class="mt-1 block w-32"
            />
            <InputError :message="errors.sort_order" class="mt-2" />
        </div>

        <!-- Active -->
        <div class="flex items-center gap-3">
            <input
                id="is_active"
                v-model="form.is_active"
                type="checkbox"
                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
            />
            <InputLabel for="is_active" value="Active (show in topbar)" class="mb-0" />
            <InputError :message="errors.is_active" class="mt-2" />
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-4">
            <PrimaryButton :disabled="form.processing">{{ submitLabel }}</PrimaryButton>
            <Link :href="route('admin.social-links.index')" class="text-sm text-gray-600 hover:text-gray-900">
                Cancel
            </Link>
        </div>
    </form>
</template>
