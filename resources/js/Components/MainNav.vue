<template>
  <nav
    ref="navRef"
    class="navbar"
    :class="{ 'navbar--scrolled': scrolled }"
  >
    <div class="navbar__inner">
      <!-- Brand -->
      <a href="/" class="navbar__brand">
        <div class="navbar__logo-wrap">
          <img src="/assets/logo.jpeg" alt="SANGAM Logo" class="navbar__logo" />
          <span class="navbar__logo-ring" />
        </div>
        <div class="navbar__brand-text">
          <span class="navbar__brand-name">SANGAM</span>
          <span class="navbar__brand-sub">Society</span>
        </div>
      </a>

      <!-- Desktop Links -->
      <ul class="navbar__links">
        <li>
          <inertia-link href="/" class="nav-link">Home</inertia-link>
        </li>

        <!-- About Dropdown -->
        <li
          class="nav-dropdown"
          @mouseenter="aboutOpen = true"
          @mouseleave="aboutOpen = false"
        >
          <button class="nav-link nav-link--dropdown" :class="{ 'is-open': aboutOpen }">
            About
            <svg class="nav-chevron" viewBox="0 0 20 20" fill="none">
              <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
          <Transition name="dropdown">
            <ul v-if="aboutOpen" class="nav-dropdown__menu">
              <li>
                <inertia-link href="/about" class="nav-dropdown__item">
                  <span class="nav-dropdown__icon">◈</span>
                  About Us
                </inertia-link>
              </li>
              <li>
                <inertia-link href="/human-resources" class="nav-dropdown__item">
                  <span class="nav-dropdown__icon">◈</span>
                  Human Resources
                </inertia-link>
              </li>
            </ul>
          </Transition>
        </li>

        <li><inertia-link href="/programmes" class="nav-link">Programmes</inertia-link></li>
        <li><inertia-link href="/publication" class="nav-link">Publication</inertia-link></li>
        <li><inertia-link href="/notice-board" class="nav-link">Notice Board</inertia-link></li>
        <li><inertia-link href="/gallery" class="nav-link">Gallery</inertia-link></li>
        <li><inertia-link href="/events-and-news" class="nav-link">Events & News</inertia-link></li>

        <li>
          <inertia-link href="/contact" class="nav-cta">
            Contact Us
            <svg viewBox="0 0 16 16" fill="none" class="nav-cta__arrow">
              <path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </inertia-link>
        </li>
      </ul>

      <!-- Mobile Toggle -->
      <button
        class="navbar__burger"
        :class="{ 'is-open': mobileOpen }"
        @click="mobileOpen = !mobileOpen"
        :aria-label="mobileOpen ? 'Close menu' : 'Open menu'"
      >
        <span /><span /><span />
      </button>
    </div>

    <!-- Mobile Drawer -->
    <Transition name="drawer">
      <div v-if="mobileOpen" class="mobile-drawer">
        <ul class="mobile-drawer__list">
          <li v-for="(item, i) in mobileLinks" :key="item.href" :style="{ '--i': i }">
            <inertia-link :href="item.href" class="mobile-drawer__link" @click="mobileOpen = false">
              {{ item.label }}
            </inertia-link>
          </li>
          <li :style="{ '--i': mobileLinks.length }">
            <inertia-link href="/contact" class="mobile-drawer__cta" @click="mobileOpen = false">
              Contact Us →
            </inertia-link>
          </li>
        </ul>
      </div>
    </Transition>
  </nav>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { Link as InertiaLink } from '@inertiajs/vue3';

const scrolled = ref(false);
const mobileOpen = ref(false);
const aboutOpen = ref(false);
const navRef = ref(null);

const mobileLinks = [
  { href: '/', label: 'Home' },
  { href: '/about', label: 'About Us' },
  { href: '/human-resources', label: 'Human Resources' },
  { href: '/programmes', label: 'Programmes' },
  { href: '/publication', label: 'Publication' },
  { href: '/notice-board', label: 'Notice Board' },
  { href: '/gallery', label: 'Gallery' },
  { href: '/events-and-news', label: 'Events & News' },
];

const handleScroll = () => {
  scrolled.value = window.scrollY > 24;
};

onMounted(() => window.addEventListener('scroll', handleScroll, { passive: true }));
onUnmounted(() => window.removeEventListener('scroll', handleScroll));
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=DM+Sans:wght@400;500;600&display=swap');

/* ── Base ── */
.navbar {
  position: sticky;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 100;
  background: #1a1650;
  border-bottom: 1px solid rgba(251, 191, 36, 0.15);
  transition: background 0.35s ease, box-shadow 0.35s ease, padding 0.3s ease;
  font-family: 'DM Sans', sans-serif;
}

.navbar--scrolled {
  background: rgba(20, 18, 64, 0.92);
  backdrop-filter: blur(18px) saturate(1.4);
  -webkit-backdrop-filter: blur(18px) saturate(1.4);
  box-shadow: 0 4px 40px rgba(0, 0, 0, 0.45);
}

.navbar__inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 1280px;
  margin: 0 auto;
  padding: 0.7rem 1.5rem;
}

/* ── Brand ── */
.navbar__brand {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  text-decoration: none;
}

.navbar__logo-wrap {
  position: relative;
  width: 44px;
  height: 44px;
  flex-shrink: 0;
}

.navbar__logo {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid rgba(251, 191, 36, 0.5);
  display: block;
  position: relative;
  z-index: 1;
}

.navbar__logo-ring {
  position: absolute;
  inset: -4px;
  border-radius: 50%;
  border: 1.5px solid rgba(251, 191, 36, 0.3);
  animation: spin 12s linear infinite;
  border-top-color: #fbbf24;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}

.navbar__brand-text {
  display: flex;
  flex-direction: column;
  line-height: 1;
}

.navbar__brand-name {
  font-family: 'Cinzel', serif;
  font-size: 1.25rem;
  font-weight: 700;
  color: #fbbf24;
  letter-spacing: 0.12em;
}

.navbar__brand-sub {
  font-size: 0.62rem;
  font-weight: 500;
  color: rgba(251, 191, 36, 0.55);
  letter-spacing: 0.22em;
  text-transform: uppercase;
  margin-top: 2px;
}

/* ── Desktop Nav Links ── */
.navbar__links {
  display: none;
  list-style: none;
  margin: 0;
  padding: 0;
  align-items: center;
  gap: 0.1rem;
}

@media (min-width: 1024px) {
  .navbar__links {
    display: flex;
  }
}

.nav-link {
  display: inline-flex;
  align-items: center;
  gap: 0.25rem;
  padding: 0.5rem 0.8rem;
  font-size: 0.78rem;
  font-weight: 600;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: rgba(226, 232, 240, 0.78);
  text-decoration: none;
  border-radius: 6px;
  transition: color 0.2s, background 0.2s;
  white-space: nowrap;
  background: transparent;
  border: none;
  cursor: pointer;
  font-family: 'DM Sans', sans-serif;
}

.nav-link:hover,
.nav-link:focus-visible {
  color: #fbbf24;
  background: rgba(251, 191, 36, 0.08);
  outline: none;
}

/* ── Dropdown ── */
.nav-dropdown {
  position: relative;
}

.nav-link--dropdown.is-open {
  color: #fbbf24;
  background: rgba(251, 191, 36, 0.08);
}

.nav-chevron {
  width: 14px;
  height: 14px;
  transition: transform 0.25s;
  flex-shrink: 0;
}

.nav-link--dropdown.is-open .nav-chevron {
  transform: rotate(180deg);
}

.nav-dropdown__menu {
  position: absolute;
  top: calc(100% + 10px);
  left: 0;
  min-width: 196px;
  background: #1e1b5e;
  border: 1px solid rgba(251, 191, 36, 0.2);
  border-radius: 10px;
  list-style: none;
  padding: 0.4rem;
  margin: 0;
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.55), 0 0 0 1px rgba(255,255,255,0.03);
}

.nav-dropdown__item {
  display: flex;
  align-items: center;
  gap: 0.55rem;
  padding: 0.62rem 1rem;
  font-size: 0.82rem;
  font-weight: 500;
  color: rgba(226, 232, 240, 0.8);
  text-decoration: none;
  border-radius: 6px;
  transition: background 0.18s, color 0.18s;
  white-space: nowrap;
}

.nav-dropdown__item:hover {
  background: rgba(251, 191, 36, 0.1);
  color: #fbbf24;
}

.nav-dropdown__icon {
  font-size: 0.6rem;
  color: rgba(251, 191, 36, 0.4);
  transition: color 0.18s;
}

.nav-dropdown__item:hover .nav-dropdown__icon {
  color: #fbbf24;
}

/* Dropdown transition */
.dropdown-enter-active,
.dropdown-leave-active {
  transition: opacity 0.2s ease, transform 0.2s ease;
}
.dropdown-enter-from,
.dropdown-leave-to {
  opacity: 0;
  transform: translateY(-6px);
}

/* ── CTA Button ── */
.nav-cta {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  padding: 0.5rem 1.1rem;
  background: linear-gradient(135deg, #fbbf24, #f59e0b);
  color: #1a1650;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  text-decoration: none;
  border-radius: 100px;
  transition: transform 0.2s, box-shadow 0.2s, background 0.2s;
  box-shadow: 0 2px 16px rgba(251, 191, 36, 0.35);
  white-space: nowrap;
  margin-left: 0.5rem;
}

.nav-cta:hover {
  background: linear-gradient(135deg, #fde68a, #fbbf24);
  transform: translateY(-1px);
  box-shadow: 0 6px 24px rgba(251, 191, 36, 0.45);
}

.nav-cta__arrow {
  width: 14px;
  height: 14px;
  transition: transform 0.2s;
}

.nav-cta:hover .nav-cta__arrow {
  transform: translateX(2px);
}

/* ── Mobile Burger ── */
.navbar__burger {
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 5px;
  width: 36px;
  height: 36px;
  padding: 0;
  background: none;
  border: none;
  cursor: pointer;
}

@media (min-width: 1024px) {
  .navbar__burger { display: none; }
}

.navbar__burger span {
  display: block;
  height: 2px;
  background: #fbbf24;
  border-radius: 2px;
  transition: transform 0.3s ease, opacity 0.3s ease, width 0.3s ease;
  transform-origin: center;
}

.navbar__burger span:nth-child(1) { width: 24px; }
.navbar__burger span:nth-child(2) { width: 18px; }
.navbar__burger span:nth-child(3) { width: 24px; }

.navbar__burger.is-open span:nth-child(1) {
  width: 24px;
  transform: translateY(7px) rotate(45deg);
}
.navbar__burger.is-open span:nth-child(2) {
  opacity: 0;
  transform: scaleX(0);
}
.navbar__burger.is-open span:nth-child(3) {
  width: 24px;
  transform: translateY(-7px) rotate(-45deg);
}

/* ── Mobile Drawer ── */
.mobile-drawer {
  background: #13114a;
  border-top: 1px solid rgba(251, 191, 36, 0.12);
  padding: 1.25rem 1.5rem 1.75rem;
}

.mobile-drawer__list {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  gap: 0.2rem;
}

.mobile-drawer__list li {
  animation: slideIn 0.3s ease both;
  animation-delay: calc(var(--i) * 0.04s);
}

@keyframes slideIn {
  from { opacity: 0; transform: translateX(-12px); }
  to   { opacity: 1; transform: translateX(0); }
}

.mobile-drawer__link {
  display: block;
  padding: 0.75rem 1rem;
  font-size: 0.9rem;
  font-weight: 600;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: rgba(226, 232, 240, 0.75);
  text-decoration: none;
  border-radius: 8px;
  transition: background 0.18s, color 0.18s;
}

.mobile-drawer__link:hover {
  background: rgba(251, 191, 36, 0.08);
  color: #fbbf24;
}

.mobile-drawer__cta {
  display: block;
  margin-top: 0.75rem;
  padding: 0.85rem 1.25rem;
  background: linear-gradient(135deg, #fbbf24, #f59e0b);
  color: #1a1650;
  font-size: 0.9rem;
  font-weight: 700;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  text-decoration: none;
  border-radius: 10px;
  text-align: center;
  transition: opacity 0.2s;
}

.mobile-drawer__cta:hover { opacity: 0.9; }

/* Drawer slide transition */
.drawer-enter-active,
.drawer-leave-active {
  transition: max-height 0.35s ease, opacity 0.3s ease;
  overflow: hidden;
  max-height: 600px;
}
.drawer-enter-from,
.drawer-leave-to {
  max-height: 0;
  opacity: 0;
}
</style>
