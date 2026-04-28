<template>
  <section class="stories-shell" aria-labelledby="stories-heading">
    <div class="stories-inner">
      <header class="section-header section-header--center">
        <div class="section-eyebrow">From the Field</div>
        <h2 id="stories-heading" class="section-title section-title--large">Success Stories</h2>
      </header>
      <div v-if="loadingStories" class="spinner-wrap" aria-live="polite">
        <span class="spinner"></span>
        <span class="visually-hidden">Loading success stories...</span>
      </div>
      <div v-else-if="storiesError" class="error-message" role="alert">
        <span>⚠️ Unable to load stories. Please try again later.</span>
        <button @click="retryFetchStories" class="error-retry">Retry</button>
      </div>
      <div v-else class="stories-grid">
        <article v-for="(story, i) in stories" :key="story.id" class="story-card" :style="`--i:${i}`">
          <div class="story-card__img-wrap">
            <img :src="story.image" :alt="story.title" class="story-card__img" loading="lazy" />
            <div class="story-card__img-overlay"></div>
          </div>
          <div class="story-card__body">
            <div class="story-card__cat">{{ story.category }}</div>
            <h3 class="story-card__title">{{ story.title }}</h3>
            <p class="story-card__text">{{ story.summary }}</p>
            <a href="#" class="story-link">Full story <span aria-hidden="true">→</span></a>
          </div>
        </article>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue';
const loadingStories = ref(true);
const storiesError   = ref(false);
const stories        = ref([]);

const fetchStories = async () => {
  await new Promise(r => setTimeout(r, 900));
  return [
    { id: 1, category: 'Enterprise', title: 'Empowering Local Entrepreneurs', summary: 'How SANGAM helped a local farmer turn his small dairy into a thriving enterprise.',             image: 'https://picsum.photos/id/26/400/300'  },
    { id: 2, category: 'Women',      title: 'Women in Business',              summary: 'A women-led tailoring cooperative now supplies uniforms to three schools in the district.', image: 'https://picsum.photos/id/29/400/300'  },
    { id: 3, category: 'Tourism',    title: 'Sustainable Tourism Initiative', summary: 'Community homestay programme boosts local economy and preserves culture.',                     image: 'https://picsum.photos/id/15/400/300'  },
  ];
};

const retryFetchStories = async () => {
  storiesError.value = false; loadingStories.value = true;
  try { stories.value = await fetchStories(); } catch { storiesError.value = true; } finally { loadingStories.value = false; }
};

// Fetch stories on mount
fetchStories().then(s => { stories.value = s; loadingStories.value = false; }).catch(() => { storiesError.value = true; loadingStories.value = false; });
</script>
