<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import TopBar from '@/Components/TopBar.vue';
import MainNav from '@/Components/MainNav.vue';
</script>
<template>
    <div class="page-root">
    <a href="#main-content" class="skip-link">Skip to main content</a>
    <header class="site-header">
      <TopBar />
      <MainNav />
    </header>

<!-- Marquee Strip -->
      <div class="marquee-strip" aria-hidden="true">
        <div class="marquee-track">
          <span v-for="n in 6" :key="n">
            Micro-Entrepreneurship &nbsp;✦&nbsp; Community Development &nbsp;✦&nbsp; Myagdi District &nbsp;✦&nbsp; Social Mobilisation &nbsp;✦&nbsp; Empowering Lives &nbsp;✦&nbsp;
          </span>
        </div>
      </div>

      
  <div class="flex flex-col min-h-screen">
    <main class="flex-1 fade-in">
      <section class="max-w-6xl px-4 py-8 mx-auto">
        <h1 class="mb-4 text-3xl font-bold text-blue-700">About Us</h1>
        <div class="p-6 bg-white shadow rounded-xl">
          <p class="mb-4">
            With the financial and technical assistance of MEDEP, the experienced and socially motivated group organised, established and registered SANGAM in the year 2005.
          </p>
          <p class="mb-4">
            SANGAM is registered in District Administration Office. This is a unique organisation working for the promotion and development of microentrepreneurs in Myagdi and neighbouring districts. SANGAM is also registered in Social Welfare Council and actively participating in the social mobilisation and social development programmes along with the entrepreneurship development.
          </p>
        </div>
      </section>
    </main>
  </div>
</div>
</template>

