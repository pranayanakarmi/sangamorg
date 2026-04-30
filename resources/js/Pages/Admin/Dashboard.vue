
<template>
  <div v-if="$page.props.auth.user" class="flex min-h-screen bg-gray-100">
    <AdminSidebar />
    <main class="flex-1 p-8">
      <header class="flex items-center justify-between mb-8">
        <div>
          <h1 class="text-3xl font-bold">Dashboard</h1>
          <p class="text-gray-500">Jun 1 – Aug 31, 2024</p>
        </div>
        <div class="flex gap-8">
          <div class="text-center">
            <div class="text-2xl font-bold">7,052</div>
            <div class="text-gray-500 text-sm">EOI Sent</div>
          </div>
          <div class="text-center">
            <div class="text-2xl font-bold">34</div>
            <div class="text-gray-500 text-sm">New Requests</div>
          </div>
        </div>
      </header>
      <!-- Admin menu quick links -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <MenuCard title="Users" icon="users" link="/admin/users" v-if="isAdmin" />
        <MenuCard title="Profile" icon="profile" link="/admin/profile" />
        <MenuCard title="Roles" icon="roles" link="/admin/roles" v-if="isSuperAdmin" />
        <MenuCard title="Settings" icon="settings" link="/admin/settings" v-if="isAdmin" />
        <MenuCard title="Activity Logs" icon="logs" link="/admin/logs" v-if="isAdmin" />
        <MenuCard title="Support" icon="support" link="/admin/support" v-if="isAdmin" />
      </div>
      <!-- Dashboard widgets go here -->
      <div class="grid grid-cols-2 gap-8">
        <div class="bg-white rounded-3xl shadow p-6">
          <h2 class="font-semibold mb-2">Borrowers by State</h2>
          <!-- Placeholder for chart -->
          <div class="h-40 flex items-center justify-center text-gray-400">[Chart]</div>
        </div>
        <div class="bg-white rounded-3xl shadow p-6">
          <h2 class="font-semibold mb-2">Map Preview</h2>
          <div class="h-40 flex items-center justify-center text-gray-400">[Map]</div>
        </div>
        <div class="bg-white rounded-3xl shadow p-6 col-span-2">
          <h2 class="font-semibold mb-2">Details</h2>
          <div class="h-32 flex items-center justify-center text-gray-400">[Details Chart]</div>
        </div>
        <div class="bg-white rounded-3xl shadow p-6 col-span-2">
          <h2 class="font-semibold mb-2">New Request Trend</h2>
          <div class="h-32 flex items-center justify-center text-gray-400">[Trend Chart]</div>
        </div>
      </div>
    </main>
  </div>
  <div v-else class="flex items-center justify-center min-h-screen">
    <div class="text-center">
      <h2 class="text-2xl font-bold mb-4">Please login to access the admin panel.</h2>
      <a href="/login" class="text-blue-600 underline">Go to Login</a>
    </div>
  </div>
</template>

<script setup>
import AdminSidebar from './AdminSidebar.vue';
import { computed } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';
const user = usePage().props.auth.user;
const isAdmin = computed(() => user && (user.role === 'admin' || user.role === 'super_admin'));
const isSuperAdmin = computed(() => user && user.role === 'super_admin');

const icons = {
  users: `<svg width="32" height="32" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" stroke="#2563eb" stroke-width="2"/><path d="M4 20v-1a4 4 0 014-4h8a4 4 0 014 4v1" stroke="#2563eb" stroke-width="2"/></svg>`,
  profile: `<svg width="32" height="32" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" stroke="#2563eb" stroke-width="2"/><path d="M4 20v-1a4 4 0 014-4h8a4 4 0 014 4v1" stroke="#2563eb" stroke-width="2"/></svg>`,
  roles: `<svg width="32" height="32" fill="none" viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="2" stroke="#2563eb" stroke-width="2"/><path d="M9 9h6v6H9z" fill="#2563eb"/></svg>`,
  settings: `<svg width="32" height="32" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#2563eb" stroke-width="2"/><path d="M12 8v4l3 3" stroke="#2563eb" stroke-width="2"/></svg>`,
  logs: `<svg width="32" height="32" fill="none" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" stroke="#2563eb" stroke-width="2"/><path d="M8 9h8M8 13h6M8 17h4" stroke="#2563eb" stroke-width="2"/></svg>`,
  support: `<svg width="32" height="32" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#2563eb" stroke-width="2"/><path d="M12 16v.01" stroke="#2563eb" stroke-width="2"/><path d="M12 8v4" stroke="#2563eb" stroke-width="2"/></svg>`
};

const MenuCard = defineComponent({
  props: ['title', 'icon', 'link'],
  setup(props) {
    return () => (
      <Link href={props.link} class="bg-white rounded-2xl shadow p-6 flex flex-col items-center justify-center hover:bg-blue-50 transition">
        <span class="mb-2" v-html={icons[props.icon]}></span>
        <span class="font-semibold text-lg text-gray-700">{props.title}</span>
      </Link>
    );
  }
});
</script>
