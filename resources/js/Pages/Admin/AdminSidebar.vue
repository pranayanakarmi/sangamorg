
<template>
  <aside v-if="user" class="bg-white h-screen w-20 flex flex-col items-center py-6 shadow-lg rounded-r-3xl">
    <div class="mb-8">
      <!-- Logo/Icon -->
      <svg width="32" height="32" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" fill="#2563eb"/></svg>
    </div>
    <nav class="flex flex-col gap-6 flex-1">
      <!-- Dashboard: all roles -->
      <a href="/admin/dashboard" class="hover:bg-blue-100 p-2 rounded-lg flex items-center justify-center" title="Dashboard">
        <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" fill="#64748b"/></svg>
      </a>
      <!-- Users: admin and super_admin only -->
      <a v-if="isAdmin" href="/admin/users" class="hover:bg-blue-100 p-2 rounded-lg flex items-center justify-center" title="Users">
        <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" stroke="#64748b" stroke-width="2"/><path d="M4 20v-1a4 4 0 014-4h8a4 4 0 014 4v1" stroke="#64748b" stroke-width="2"/></svg>
      </a>
      <!-- Profile: all roles -->
      <a href="/admin/profile" class="hover:bg-blue-100 p-2 rounded-lg flex items-center justify-center" title="Profile">
        <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" stroke="#64748b" stroke-width="2"/><path d="M4 20v-1a4 4 0 014-4h8a4 4 0 014 4v1" stroke="#64748b" stroke-width="2"/></svg>
      </a>
      <!-- Roles: super_admin only -->
      <a v-if="isSuperAdmin" href="/admin/roles" class="hover:bg-blue-100 p-2 rounded-lg flex items-center justify-center" title="Roles">
        <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="2" stroke="#64748b" stroke-width="2"/><path d="M9 9h6v6H9z" fill="#64748b"/></svg>
      </a>
      <!-- Settings: admin and super_admin only -->
      <a v-if="isAdmin" href="/admin/settings" class="hover:bg-blue-100 p-2 rounded-lg flex items-center justify-center" title="Settings">
        <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#64748b" stroke-width="2"/><path d="M12 8v4l3 3" stroke="#64748b" stroke-width="2"/></svg>
      </a>
      <!-- Activity Logs: admin and super_admin only -->
      <a v-if="isAdmin" href="/admin/logs" class="hover:bg-blue-100 p-2 rounded-lg flex items-center justify-center" title="Activity Logs">
        <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" stroke="#64748b" stroke-width="2"/><path d="M8 9h8M8 13h6M8 17h4" stroke="#64748b" stroke-width="2"/></svg>
      </a>
      <!-- Support: admin and super_admin only -->
      <a v-if="isAdmin" href="/admin/support" class="hover:bg-blue-100 p-2 rounded-lg flex items-center justify-center" title="Support">
        <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#64748b" stroke-width="2"/><path d="M12 16v.01" stroke="#64748b" stroke-width="2"/><path d="M12 8v4" stroke="#64748b" stroke-width="2"/></svg>
      </a>
      <!-- Logout: all roles -->
      <a href="/logout" class="hover:bg-blue-100 p-2 rounded-lg flex items-center justify-center" title="Logout">
        <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><path d="M16 17l5-5-5-5M21 12H9" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 4v16" stroke="#64748b" stroke-width="2"/></svg>
      </a>
    </nav>
    <div class="mt-auto">
      <!-- User avatar -->
      <img :src="user.avatar || 'https://randomuser.me/api/portraits/men/32.jpg'" alt="User" class="w-10 h-10 rounded-full border-2 border-blue-500" />
    </div>
  </aside>
</template>

<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
const user = usePage().props.auth.user;
const isAdmin = computed(() => user && (user.role === 'admin' || user.role === 'super_admin'));
const isSuperAdmin = computed(() => user && user.role === 'super_admin');
</script>
