<template>
  <section class="news-section-shell" aria-labelledby="news-section-heading">
    <div class="news-section-inner">
      <header class="section-header">
        <div>
          <div class="section-eyebrow">Stay Informed</div>
          <h2 id="news-section-heading" class="section-title section-title--large">Latest News</h2>
        </div>
        <a href="#" class="view-all-btn">View all news →</a>
      </header>
      <div v-if="loadingNews" class="spinner-wrap" aria-live="polite">
        <span class="spinner"></span>
        <span class="visually-hidden">Loading news...</span>
      </div>
      <div v-else-if="newsError" class="error-message" role="alert">
        <span>⚠️ Unable to load news. Please try again later.</span>
        <button @click="retryFetchNews" class="error-retry">Retry</button>
      </div>
      <div v-else class="news-section-grid">
        <!-- Featured first article -->
        <article v-if="newsItems[0]" class="news-featured-card">
          <div class="news-featured-img-wrap">
            <img :src="newsItems[0].image" :alt="newsItems[0].title" class="news-featured-img" loading="lazy" />
            <span class="news-featured-tag">Featured</span>
          </div>
          <div class="news-featured-body">
            <h3 class="news-featured-title">{{ newsItems[0].title }}</h3>
            <p class="news-featured-summary">{{ newsItems[0].summary }}</p>
            <a href="#" class="news-featured-link">Read full article →</a>
          </div>
        </article>
        <!-- Secondary articles -->
        <div class="news-secondary-list">
          <article v-for="item in newsItems.slice(1)" :key="item.id" class="news-secondary-card">
            <div class="news-secondary-img-wrap">
              <img :src="item.image" :alt="item.title" class="news-secondary-img" loading="lazy" />
            </div>
            <div class="news-secondary-body">
              <time class="news-card__date">{{ formatDate(item.date) }}</time>
              <h3 class="news-secondary-title">{{ item.title }}</h3>
              <p class="news-secondary-summary">{{ item.summary }}</p>
              <a href="#" class="read-more">Read more →</a>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue';
const loadingNews    = ref(true);
const newsError      = ref(false);
const newsItems      = ref([]);

const formatDate = (dateStr) => {
  if (!dateStr) return '';
  try { return new Date(dateStr).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' }); }
  catch { return ''; }
};

const fetchNews = async () => {
  await new Promise(r => setTimeout(r, 800));
  return [
    { id: 1, title: 'सामुदायिक विकास परियोजनाको सिलबन्दी दरभाउपत्र आव्हानको सूचना', date: '2026-04-15', summary: 'आवेदन पेश गर्ने अन्तिम मिति: २०८६/०४/३०। थप जानकारीको लागि कार्यालय सम्पर्क गर्नुहोला।', image: 'https://picsum.photos/id/1011/400/250' },
    { id: 2, title: 'लघु उद्यम विकास (MEDPA) कार्यक्रम अन्तर्गत सिपमुलक तालिमहरु',   date: '2026-04-10', summary: 'तालिममा सहभागी हुन इच्छुक व्यक्तिहरूले फाराम भर्न सक्नुहुनेछ।',               image: 'https://picsum.photos/id/1012/400/250' },
    { id: 3, title: 'नयाँ उद्यमशीलता विकास कार्यशाला सम्पन्न',                          date: '2026-04-05', summary: 'म्याग्दीका ५० भन्दा बढी युवाहरूले सहभागिता जनाए।',                             image: 'https://picsum.photos/id/1013/400/250' },
  ];
};

const retryFetchNews = async () => {
  newsError.value = false; loadingNews.value = true;
  try { newsItems.value = await fetchNews(); } catch { newsError.value = true; } finally { loadingNews.value = false; }
};

// Fetch news on mount
fetchNews().then(n => { newsItems.value = n; loadingNews.value = false; }).catch(() => { newsError.value = true; loadingNews.value = false; });
</script>
