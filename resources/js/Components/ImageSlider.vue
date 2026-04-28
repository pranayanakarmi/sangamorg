<template>
  <section class="slider" @mouseenter="pause" @mouseleave="resume">
    <!-- Background Images -->
    <div class="slider__track">
      <div
        v-for="(slide, idx) in slides"
        :key="slide.src"
        class="slider__slide"
        :class="{ 'is-active': idx === current, 'is-prev': idx === prev_idx }"
      >
        <img :src="slide.src" :alt="slide.alt" class="slider__img" />
      </div>
    </div>

    <!-- Layered Overlays -->
    <div class="slider__overlay slider__overlay--dark" />
    <div class="slider__overlay slider__overlay--gradient" />
    <div class="slider__overlay slider__overlay--vignette" />

    <!-- Decorative corner marks -->
    <span class="slider__corner slider__corner--tl" />
    <span class="slider__corner slider__corner--br" />

    <!-- Slide number -->
    <div class="slider__counter">
      <span class="slider__counter-current">{{ String(current + 1).padStart(2, '0') }}</span>
      <span class="slider__counter-sep" />
      <span class="slider__counter-total">{{ String(slides.length).padStart(2, '0') }}</span>
    </div>

    <!-- Main Content -->
    <div class="slider__content">
      <Transition name="caption" mode="out-in">
        <div :key="current" class="slider__caption">
          <p class="slider__eyebrow">
            <span class="slider__eyebrow-dot" />
            Myagdi, Nepal
          </p>
          <h1 class="slider__title">
            {{ slides[current].title }}
          </h1>
          <p class="slider__desc">{{ slides[current].desc }}</p>
          <div class="slider__actions">
            <a href="/about" class="slider__btn-primary">
              Discover More
              <svg viewBox="0 0 20 20" fill="none">
                <path d="M4 10h12M11 5l5 5-5 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
            <a href="/contact" class="slider__btn-ghost">Get in Touch</a>
          </div>
        </div>
      </Transition>
    </div>

    <!-- Bottom bar: progress + nav -->
    <div class="slider__bar">
      <!-- Progress pills -->
      <div class="slider__progress">
        <button
          v-for="(slide, idx) in slides"
          :key="'dot-' + idx"
          class="slider__pill"
          :class="{ 'is-active': idx === current }"
          @click="go(idx)"
          :aria-label="'Go to slide ' + (idx + 1)"
        >
          <span class="slider__pill-fill" :style="idx === current ? { animationDuration: autoDelay + 'ms' } : {}" />
        </button>
      </div>

      <!-- Prev / Next -->
      <div class="slider__nav">
        <button class="slider__nav-btn" @click="goPrev" aria-label="Previous slide">
          <svg viewBox="0 0 20 20" fill="none">
            <path d="M13 4l-6 6 6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <button class="slider__nav-btn" @click="goNext" aria-label="Next slide">
          <svg viewBox="0 0 20 20" fill="none">
            <path d="M7 4l6 6-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const autoDelay = 6000;

const slides = [
  {
    src: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1400&q=80',
    alt: 'Nepal mountains at sunrise',
    title: 'Empowering Communities',
    desc: 'Supporting microentrepreneurs and families across Myagdi district since our founding.',
  },
  {
    src: 'https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=1400&q=80',
    alt: 'Nepal prayer flags',
    title: 'Rooted in Culture',
    desc: 'Our programmes honour the traditions and resilience of the people of Nepal.',
  },
  {
    src: 'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=1400&q=80',
    alt: 'Children smiling in community',
    title: 'Building Futures',
    desc: 'Every child deserves opportunity — our education initiatives make that vision real.',
  },
  {
    src: 'https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=1400&q=80',
    alt: 'Women empowerment, teamwork',
    title: 'Women at the Centre',
    desc: 'Gender equity drives everything we do — from loans to leadership training.',
  },
  {
    src: 'https://images.unsplash.com/photo-1502082553048-f009c37129b9?auto=format&fit=crop&w=1400&q=80',
    alt: 'Volunteers and helping hands',
    title: 'Together We Rise',
    desc: 'A network of volunteers, donors, and partners united behind one purpose.',
  },
];

const current = ref(0);
const prev_idx = ref(slides.length - 1);
let timer = null;
let paused = false;

function go(idx) {
  prev_idx.value = current.value;
  current.value = idx;
  restart();
}

function goNext() {
  go((current.value + 1) % slides.length);
}

function goPrev() {
  go((current.value - 1 + slides.length) % slides.length);
}

function restart() {
  clearInterval(timer);
  if (!paused) timer = setInterval(goNext, autoDelay);
}

function pause() {
  paused = true;
  clearInterval(timer);
}

function resume() {
  paused = false;
  timer = setInterval(goNext, autoDelay);
}

onMounted(() => { timer = setInterval(goNext, autoDelay); });
onUnmounted(() => clearInterval(timer));
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=DM+Sans:ital,wght@0,400;0,500;0,600;1,400&display=swap');

/* ── Shell ── */
.slider {
  position: relative;
  width: 100%;
  height: clamp(460px, 70vh, 680px);
  overflow: hidden;
  background: #0c0a30;
  font-family: 'DM Sans', sans-serif;
}

/* ── Track & Slides ── */
.slider__track {
  position: absolute;
  inset: 0;
}

.slider__slide {
  position: absolute;
  inset: 0;
  opacity: 0;
  transition: opacity 1.1s ease;
  z-index: 1;
}

.slider__slide.is-active {
  opacity: 1;
  z-index: 2;
}

.slider__img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  transform: scale(1.08);
  animation: none;
}

.slider__slide.is-active .slider__img {
  animation: kenburns 7s ease-out forwards;
}

@keyframes kenburns {
  from { transform: scale(1.08); }
  to   { transform: scale(1.0); }
}

/* ── Overlays ── */
.slider__overlay {
  position: absolute;
  inset: 0;
  pointer-events: none;
}

.slider__overlay--dark {
  background: rgba(10, 8, 42, 0.45);
  z-index: 3;
}

.slider__overlay--gradient {
  background: linear-gradient(
    105deg,
    rgba(18, 14, 72, 0.88) 0%,
    rgba(18, 14, 72, 0.55) 45%,
    rgba(18, 14, 72, 0.1) 100%
  );
  z-index: 4;
}

.slider__overlay--vignette {
  background: radial-gradient(ellipse at center, transparent 50%, rgba(5, 4, 20, 0.65) 100%);
  z-index: 5;
}

/* ── Decorative Corners ── */
.slider__corner {
  position: absolute;
  width: 48px;
  height: 48px;
  z-index: 8;
  pointer-events: none;
}

.slider__corner--tl {
  top: 24px;
  left: 24px;
  border-top: 1.5px solid rgba(251, 191, 36, 0.5);
  border-left: 1.5px solid rgba(251, 191, 36, 0.5);
}

.slider__corner--br {
  bottom: 64px;
  right: 24px;
  border-bottom: 1.5px solid rgba(251, 191, 36, 0.3);
  border-right: 1.5px solid rgba(251, 191, 36, 0.3);
}

/* ── Counter ── */
.slider__counter {
  position: absolute;
  top: 28px;
  right: 30px;
  z-index: 9;
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.7rem;
  font-weight: 600;
  letter-spacing: 0.12em;
}

.slider__counter-current {
  color: #fbbf24;
  font-family: 'Cinzel', serif;
  font-size: 1.05rem;
}

.slider__counter-sep {
  width: 20px;
  height: 1px;
  background: rgba(251, 191, 36, 0.4);
}

.slider__counter-total {
  color: rgba(203, 213, 225, 0.45);
  font-family: 'Cinzel', serif;
  font-size: 0.78rem;
}

/* ── Content ── */
.slider__content {
  position: absolute;
  inset: 0;
  z-index: 9;
  display: flex;
  align-items: center;
  padding: 0 clamp(1.5rem, 7vw, 6rem);
  padding-bottom: 90px;
}

.slider__caption {
  max-width: 600px;
}

/* ── Eyebrow ── */
.slider__eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.72rem;
  font-weight: 600;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: rgba(251, 191, 36, 0.8);
  margin-bottom: 1rem;
}

.slider__eyebrow-dot {
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background: #fbbf24;
  flex-shrink: 0;
  box-shadow: 0 0 8px #fbbf24;
  animation: pulse-dot 2s ease-in-out infinite;
}

@keyframes pulse-dot {
  0%, 100% { opacity: 1; transform: scale(1); }
  50%       { opacity: 0.5; transform: scale(0.7); }
}

/* ── Title ── */
.slider__title {
  font-family: 'Cinzel', serif;
  font-size: clamp(2rem, 5vw, 3.4rem);
  font-weight: 700;
  line-height: 1.15;
  color: #fff;
  margin: 0 0 1.1rem;
  letter-spacing: 0.01em;
  text-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
}

/* ── Description ── */
.slider__desc {
  font-size: clamp(0.9rem, 1.8vw, 1.1rem);
  font-weight: 400;
  line-height: 1.7;
  color: rgba(226, 232, 240, 0.78);
  margin: 0 0 2rem;
  max-width: 480px;
}

/* ── Actions ── */
.slider__actions {
  display: flex;
  align-items: center;
  gap: 1rem;
  flex-wrap: wrap;
}

.slider__btn-primary {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.75rem 1.6rem;
  background: linear-gradient(135deg, #fbbf24, #f59e0b);
  color: #1a1650;
  font-size: 0.82rem;
  font-weight: 700;
  letter-spacing: 0.07em;
  text-transform: uppercase;
  text-decoration: none;
  border-radius: 100px;
  transition: transform 0.2s, box-shadow 0.2s;
  box-shadow: 0 4px 24px rgba(251, 191, 36, 0.4);
  white-space: nowrap;
}

.slider__btn-primary svg {
  width: 16px;
  height: 16px;
  transition: transform 0.2s;
}

.slider__btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 32px rgba(251, 191, 36, 0.5);
}

.slider__btn-primary:hover svg {
  transform: translateX(3px);
}

.slider__btn-ghost {
  display: inline-flex;
  align-items: center;
  padding: 0.73rem 1.5rem;
  border: 1.5px solid rgba(255, 255, 255, 0.3);
  color: rgba(255, 255, 255, 0.85);
  font-size: 0.82rem;
  font-weight: 600;
  letter-spacing: 0.07em;
  text-transform: uppercase;
  text-decoration: none;
  border-radius: 100px;
  transition: border-color 0.2s, color 0.2s, background 0.2s;
  white-space: nowrap;
}

.slider__btn-ghost:hover {
  border-color: rgba(251, 191, 36, 0.6);
  color: #fbbf24;
  background: rgba(251, 191, 36, 0.07);
}

/* ── Bottom Bar ── */
.slider__bar {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 10;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 clamp(1.5rem, 5vw, 3.5rem);
  height: 64px;
  background: linear-gradient(to top, rgba(10, 8, 42, 0.75) 0%, transparent 100%);
  border-top: 1px solid rgba(251, 191, 36, 0.1);
}

/* ── Progress Pills ── */
.slider__progress {
  display: flex;
  align-items: center;
  gap: 6px;
}

.slider__pill {
  position: relative;
  height: 3px;
  width: 28px;
  background: rgba(255, 255, 255, 0.18);
  border: none;
  border-radius: 2px;
  cursor: pointer;
  padding: 0;
  overflow: hidden;
  transition: width 0.3s ease;
}

.slider__pill.is-active {
  width: 52px;
}

.slider__pill-fill {
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 0;
  background: #fbbf24;
  border-radius: 2px;
}

.slider__pill.is-active .slider__pill-fill {
  animation: fill-progress linear forwards;
  animation-duration: inherit;
}

@keyframes fill-progress {
  from { width: 0; }
  to   { width: 100%; }
}

/* ── Nav Arrows ── */
.slider__nav {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.slider__nav-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 38px;
  height: 38px;
  border-radius: 50%;
  border: 1.5px solid rgba(255, 255, 255, 0.2);
  background: rgba(255, 255, 255, 0.06);
  color: rgba(255, 255, 255, 0.7);
  cursor: pointer;
  transition: border-color 0.2s, color 0.2s, background 0.2s, transform 0.2s;
  backdrop-filter: blur(4px);
}

.slider__nav-btn svg {
  width: 16px;
  height: 16px;
}

.slider__nav-btn:hover {
  border-color: #fbbf24;
  color: #fbbf24;
  background: rgba(251, 191, 36, 0.1);
  transform: scale(1.08);
}

/* ── Caption Transition ── */
.caption-enter-active {
  transition: opacity 0.6s ease 0.2s, transform 0.6s ease 0.2s;
}
.caption-leave-active {
  transition: opacity 0.3s ease, transform 0.3s ease;
}
.caption-enter-from {
  opacity: 0;
  transform: translateY(24px);
}
.caption-leave-to {
  opacity: 0;
  transform: translateY(-12px);
}

/* ── Mobile ── */
@media (max-width: 640px) {
  .slider {
    height: clamp(500px, 85vh, 600px);
  }

  .slider__content {
    padding: 0 1.25rem;
    padding-bottom: 80px;
    align-items: flex-end;
  }

  .slider__counter { display: none; }
  .slider__corner  { display: none; }

  .slider__actions {
    flex-direction: column;
    align-items: flex-start;
    gap: 0.75rem;
  }

  .slider__btn-primary,
  .slider__btn-ghost {
    width: 100%;
    justify-content: center;
  }
}
</style>
