<template>
  <div class="p-8">
    <h1 class="text-2xl font-bold mb-6">Users</h1>
    <div class="bg-white rounded-2xl shadow p-6">
      <div class="flex justify-between mb-4">
        <input type="text" placeholder="Search users..." class="border rounded px-3 py-2 w-1/3" v-model="search" />
        <button class="bg-blue-600 text-white px-4 py-2 rounded" @click="openCreate">Add User</button>
      </div>
      <table class="w-full text-left">
        <thead>
          <tr class="border-b">
            <th class="py-2">Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in filteredUsers" :key="user.id" class="border-b">
            <td class="py-2">{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>
              <span :class="roleClass(user.role)" class="px-2 py-1 rounded text-xs font-semibold">{{ user.role }}</span>
            </td>
            <td>
              <button class="text-blue-600 mr-2" @click="editUser(user)">Edit</button>
              <button class="text-red-600" @click="deleteUser(user)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- User modals would go here -->
  </div>
</template>
<script setup>
import { ref, computed } from 'vue';
const users = ref([
  { id: 1, name: 'Super Admin', email: 'superadmin@example.com', role: 'super_admin' },
  { id: 2, name: 'Admin User', email: 'admin@example.com', role: 'admin' },
  { id: 3, name: 'Normal User', email: 'user@example.com', role: 'user' },
]);
const search = ref('');
const filteredUsers = computed(() => users.value.filter(u => u.name.toLowerCase().includes(search.value.toLowerCase()) || u.email.toLowerCase().includes(search.value.toLowerCase())));
function roleClass(role) {
  if (role === 'super_admin') return 'bg-green-100 text-green-700';
  if (role === 'admin') return 'bg-blue-100 text-blue-700';
  return 'bg-gray-100 text-gray-700';
}
function openCreate() {}
function editUser(user) {}
function deleteUser(user) {}
</script>
