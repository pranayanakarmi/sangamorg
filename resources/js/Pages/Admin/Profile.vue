<template>
  <div class="p-8 max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">My Profile</h1>
    <div class="bg-white rounded-2xl shadow p-6">
      <form @submit.prevent="saveProfile">
        <div class="mb-4">
          <label class="block mb-1">Name</label>
          <input v-model="form.name" type="text" class="border rounded px-3 py-2 w-full" />
        </div>
        <div class="mb-4">
          <label class="block mb-1">Email</label>
          <input v-model="form.email" type="email" class="border rounded px-3 py-2 w-full" />
        </div>
        <div class="mb-4">
          <label class="block mb-1">Password</label>
          <input v-model="form.password" type="password" class="border rounded px-3 py-2 w-full" placeholder="Leave blank to keep current" />
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
      </form>
    </div>
  </div>
</template>
<script setup>
import { ref } from 'vue';
const form = ref({ name: 'John Doe', email: 'john@example.com', password: '' });
function saveProfile() {
  // Save logic here
}
</script>
