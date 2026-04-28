
<template>
  <section class="gallery-shell" aria-labelledby="gallery-heading">
    <div class="gallery-heading-block">
      <div class="gallery-eyebrow">What's Trending</div>
      <h2 id="gallery-heading" class="gallery-title-main"><span>ON SOCIALS</span></h2>
    </div>
    <!-- Fan Stack -->
    <div class="gallery-fan-stack" aria-hidden="true">
      <div
        v-for="(img, i) in galleryFanImages" :key="img.src"
        :class="['gallery-fan-card', `gallery-fan-card--${i}`, { 'gallery-fan-center': i === 2 }]"
        @click="goToAlbumPage(i)"
      >
        <img :src="img.src" :alt="img.alt" class="gallery-fan-img" loading="lazy" />
        <div class="gallery-fan-overlay">
          <span class="gallery-fan-tag">Album</span>
          <span class="gallery-fan-caption">{{ img.caption }}</span>
        </div>
      </div>
    </div>
    <!-- Infinite Scroll Strip -->
    <div class="gallery-strip-wrap" aria-label="Gallery preview strip">
      <div class="gallery-strip-track">
        <div
          v-for="(img, i) in galleryTrackImages" :key="`track-${i}`"
          class="gallery-strip-card" @click="goToAlbumPage(i % galleryImages.length)"
        >
          <img :src="img.src" :alt="img.alt" class="gallery-strip-img" loading="lazy" />
          <div class="gallery-strip-overlay">
            <span class="gallery-strip-caption">{{ img.caption }}</span>
          </div>
        </div>
      </div>
    </div>
    <!-- Social Footer -->
    <div class="gallery-socials-footer">
      <div class="gallery-socials-follow">Follow SANGAM</div>
      <div class="gallery-socials-links">
        <a href="#" class="gallery-social-link">YouTube</a>
        <a href="#" class="gallery-social-link">Instagram</a>
        <a href="#" class="gallery-social-link">Twitter</a>
      </div>
    </div>
  </section>
</template>

<script setup>
import { computed } from 'vue';
const galleryImages = [
  { src: 'https://picsum.photos/id/1015/400/300', alt: 'Community Event',       caption: 'Community Event 2025'  },
  { src: 'https://picsum.photos/id/1025/400/300', alt: 'Entrepreneur Workshop', caption: 'Entrepreneur Workshop' },
  { src: 'https://picsum.photos/id/1035/400/300', alt: 'Field Visit',           caption: 'Field Visit'           },
  { src: 'https://picsum.photos/id/1045/400/300', alt: 'Training Session',      caption: 'Training Session'      },
  { src: 'https://picsum.photos/id/1055/400/300', alt: 'Women Entrepreneurs',   caption: 'Women Entrepreneurs'   },
  { src: 'https://picsum.photos/id/1065/400/300', alt: 'Local Market',          caption: 'Local Market'          },
];
const galleryFanImages   = computed(() => galleryImages.slice(0, 5));
const galleryTrackImages = computed(() => [...galleryImages, ...galleryImages, ...galleryImages]);
const goToAlbumPage = () => { window.location.href = '/album'; };
</script>
