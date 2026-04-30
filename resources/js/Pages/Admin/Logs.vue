<template>
  <div class="p-8">
    <h1 class="text-2xl font-bold mb-6">Activity Logs</h1>
    <div class="bg-white rounded-2xl shadow p-6">
      <table class="w-full text-left">
        <thead>
          <tr class="border-b">
            <th class="py-2">User</th>
            <th>Action</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="log in logs" :key="log.id" class="border-b">
            <td class="py-2">{{ log.user }}</td>
            <td>{{ log.action }}</td>
            <td>{{ log.date }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script setup>
import { ref } from 'vue';
const logs = ref([
  { id: 1, user: 'Super Admin', action: 'Created a user', date: '2026-04-30' },
  { id: 2, user: 'Admin User', action: 'Updated settings', date: '2026-04-29' },
]);
</script>
