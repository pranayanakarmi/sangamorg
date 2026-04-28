<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import TopBar from '@/Components/TopBar.vue';
import MainNav from '@/Components/MainNav.vue';
import ImageSlider from '@/Components/ImageSlider.vue';
import AppFooter from '@/Components/AppFooter.vue';
import AboutSection from '@/Components/Site/AboutSection.vue';
import ImpactCounter from '@/Components/Site/ImpactCounter.vue';
import ProgrammesSection from '@/Components/Site/ProgrammesSection.vue';
import SuccessStories from '@/Components/Site/SuccessStories.vue';
import GallerySection from '@/Components/Site/GallerySection.vue';
import LatestNews from '@/Components/Site/LatestNews.vue';
import TestimonialsCarousel from '@/Components/Site/TestimonialsCarousel.vue';
import FaqSection from '@/Components/Site/FaqSection.vue';
import ContactStrip from '@/Components/Site/ContactStrip.vue';
import CtaBanner from '@/Components/Site/CtaBanner.vue';
import SupportSection from '@/Components/Site/SupportSection.vue';
import PartnersSection from '@/Components/Site/PartnersSection.vue';

// Only scroll-to-top logic remains here
const showScrollTop = ref(false);
let scrollTimer = null;
const handleScroll = () => {
  if (scrollTimer) cancelAnimationFrame(scrollTimer);
  scrollTimer = requestAnimationFrame(() => { showScrollTop.value = window.scrollY > 300; });
};
const scrollToTop = () => window.scrollTo({ top: 0, behavior: 'smooth' });

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});
onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
  if (scrollTimer) cancelAnimationFrame(scrollTimer);
});
 </script>

<template>
  <div class="page-root">
    <a href="#main-content" class="skip-link">Skip to main content</a>
    <header class="site-header">
      <TopBar />
      <MainNav />
    </header>

    <!-- Hero Slider -->
    <div class="hero-slider-wrap">
      <ImageSlider />
      <div class="hero-badge">
        <span class="hero-badge__year">Est. 2005</span>
        <span class="hero-badge__divider">·</span>
        <span class="hero-badge__place">Myagdi, Nepal</span>
      </div>
    </div>

    <main id="main-content">
      <!-- Marquee Strip -->
      <div class="marquee-strip" aria-hidden="true">
        <div class="marquee-track">
          <span v-for="n in 6" :key="n">
            Micro-Entrepreneurship &nbsp;✦&nbsp; Community Development &nbsp;✦&nbsp; Myagdi District &nbsp;✦&nbsp; Social Mobilisation &nbsp;✦&nbsp; Empowering Lives &nbsp;✦&nbsp;
          </span>
        </div>
      </div>

      <!-- Section Components Only -->
      <AboutSection />
      <ImpactCounter />
      <ProgrammesSection />
      <SuccessStories />
      <GallerySection />
      <LatestNews />
      <TestimonialsCarousel />
      <FaqSection />
      <ContactStrip />
      <CtaBanner />
      <SupportSection />
      <PartnersSection />
      <AppFooter />
    </main>

    <!-- Scroll to Top -->
    <transition name="fade-up">
      <button v-show="showScrollTop" @click="scrollToTop" class="scroll-top-btn" aria-label="Scroll to top">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
        </svg>
      </button>
    </transition>
  </div>
</template>

