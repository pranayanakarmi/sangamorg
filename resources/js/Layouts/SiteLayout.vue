
<template>
  <div class="flex flex-col min-h-screen text-[#23272f] bg-[#f8fafc]">
    <TopBar />
    <MainNav />
    <main class="container flex-1 py-8 mx-auto">
      <slot />
    </main>
    <AppFooter />
  </div>
</template>

<script setup>
import TopBar from '@/Components/TopBar.vue';
import MainNav from '@/Components/MainNav.vue';
import AppFooter from '@/Components/AppFooter.vue';
</script>
