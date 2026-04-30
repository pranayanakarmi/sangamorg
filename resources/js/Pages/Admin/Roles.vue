<template>
  <div class="p-8">
    <h1 class="text-2xl font-bold mb-6">Roles & Permissions</h1>
    <div class="bg-white rounded-2xl shadow p-6">
      <table class="w-full text-left">
        <thead>
          <tr class="border-b">
            <th class="py-2">Role</th>
            <th>Permissions</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="role in roles" :key="role.name" class="border-b">
            <td class="py-2 font-semibold">{{ role.name }}</td>
            <td>{{ role.permissions.join(', ') }}</td>
            <td>
              <button class="text-blue-600 mr-2" @click="editRole(role)">Edit</button>
              <button class="text-red-600" @click="deleteRole(role)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- Role modals would go here -->
  </div>
</template>
<script setup>
import { ref } from 'vue';
const roles = ref([
  { name: 'super_admin', permissions: ['all'] },
  { name: 'admin', permissions: ['manage users', 'view logs', 'settings'] },
  { name: 'user', permissions: ['profile'] },
]);
function editRole(role) {}
function deleteRole(role) {}
</script>
