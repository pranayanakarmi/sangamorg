<template>
  <div class="p-8">
    <h1 class="text-2xl font-bold mb-6">Support</h1>
    <div class="bg-white rounded-2xl shadow p-6">
      <table class="w-full text-left">
        <thead>
          <tr class="border-b">
            <th class="py-2">Ticket</th>
            <th>User</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="ticket in tickets" :key="ticket.id" class="border-b">
            <td class="py-2">#{{ ticket.id }}</td>
            <td>{{ ticket.user }}</td>
            <td>
              <span :class="statusClass(ticket.status)" class="px-2 py-1 rounded text-xs font-semibold">{{ ticket.status }}</span>
            </td>
            <td>{{ ticket.date }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script setup>
import { ref } from 'vue';
const tickets = ref([
  { id: 101, user: 'Normal User', status: 'open', date: '2026-04-30' },
  { id: 102, user: 'Admin User', status: 'closed', date: '2026-04-29' },
]);
function statusClass(status) {
  if (status === 'open') return 'bg-green-100 text-green-700';
  if (status === 'closed') return 'bg-gray-100 text-gray-700';
  return 'bg-yellow-100 text-yellow-700';
}
</script>
