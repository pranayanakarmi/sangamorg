<template>
  <div class="flex flex-col min-h-screen">
    <!-- Skip to main content link for accessibility -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-50 focus:p-2 focus:bg-white focus:text-blue-700 focus:rounded focus:shadow-md">
      Skip to main content
    </a>

    <!-- Top Bar (always at the top) -->
    <TopBar />

    <!-- Main Navigation (below top bar) -->
    <MainNav />

    <!-- Image Slider (below nav, not overlapped) -->
    <ImageSlider />


    <main id="main-content" class="flex-1 fade-in">
      <section class="max-w-6xl px-4 py-8 mx-auto">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
          <!-- News Section as Component -->
          <LatestNews :news-items="newsItems" :loading-news="loadingNews" />

          <!-- Sidebar: Important Links & Contact as Components -->
          <aside class="flex flex-col gap-8">
            <ImportantLinks />
            <ContactInfo />
          </aside>
        </div>
      </section>

      <!-- Stories Section as Component -->
      <SuccessStories :stories="stories" :loading-stories="loadingStories" />

      <!-- About Section as Component -->
      <AboutSection />

      <!-- Footer -->
      <FooterLayout />
    </main>

    <!-- Scroll to Top Button -->
    <button
      v-show="showScrollTop"
      @click="scrollToTop"
      class="fixed z-40 p-3 text-white transition-colors bg-blue-700 rounded-full shadow-lg bottom-8 right-8 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400"
      aria-label="Scroll to top"
    >
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <title>Scroll to top</title>
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
      </svg>
    </button>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import TopBar from '@/Components/TopBar.vue';
import MainNav from '@/Components/MainNav.vue';
import ImageSlider from '@/Components/ImageSlider.vue';
import LatestNews from '@/Components/Pages/LatestNews.vue';
import ImportantLinks from '@/Components/Pages/ImportantLinks.vue';
import ContactInfo from '@/Components/Pages/ContactInfo.vue';
import SuccessStories from '@/Components/Pages/SuccessStories.vue';
import AboutSection from '@/Components/Site/AboutSection.vue';
import FooterLayout from '@/Components/FooterLayout.vue';

// ---------- Dynamic Data ----------
const loadingNews = ref(true);
const loadingStories = ref(true);

const newsItems = ref([]);
const stories = ref([]);

// Simulate async data fetching
const fetchNews = () => {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve([
        {
          id: 1,
          title: 'सामुदायिक विकास परियोजनाको सिलबन्दी दरभाउपत्र आव्हानको सूचना',
          date: '2026-04-15',
          summary: 'आवेदन पेश गर्ने अन्तिम मिति: २०८६/०४/३०। थप जानकारीको लागि कार्यालय सम्पर्क गर्नुहोला।',
        },
        {
          id: 2,
          title: 'गरिवि निवारणका लागि लघु उद्यम विकास (MEDPA) कार्यक्रम अन्तर्गत सिपमुलक तालिमहरु',
          date: '2026-04-10',
          summary: 'तालिममा सहभागी हुन इच्छुक व्यक्तिहरूले फाराम भर्न सक्नुहुनेछ।',
        },
        {
          id: 3,
          title: 'नयाँ उद्यमशीलता विकास कार्यशाला सम्पन्न',
          date: '2026-04-05',
          summary: 'म्याग्दीका ५० भन्दा बढी युवाहरूले सहभागिता जनाए।',
        },
      ]);
    }, 800);
  });
};

const fetchStories = () => {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve([
        {
          id: 1,
          title: 'Empowering Local Entrepreneurs',
          summary: 'How SANGAM helped a local farmer turn his small dairy into a thriving enterprise.',
          image: 'https://picsum.photos/id/26/200/200', // placeholder with nature theme
        },
        {
          id: 2,
          title: 'Women in Business',
          summary: 'A women-led tailoring cooperative now supplies uniforms to three schools in the district.',
          image: 'https://picsum.photos/id/29/200/200',
        },
        {
          id: 3,
          title: 'Sustainable Tourism Initiative',
          summary: 'Community homestay programme boosts local economy and preserves culture.',
          image: 'https://picsum.photos/id/15/200/200',
        },
      ]);
    }, 800);
  });
};

// Load data on mount
onMounted(async () => {
  loadingNews.value = true;
  loadingStories.value = true;
  try {
    const [newsData, storiesData] = await Promise.all([fetchNews(), fetchStories()]);
    newsItems.value = newsData;
    stories.value = storiesData;
  } catch (error) {
    console.error('Failed to load data:', error);
  } finally {
    loadingNews.value = false;
    loadingStories.value = false;
  }
});

// ---------- Scroll to Top ----------
const showScrollTop = ref(false);

const scrollToTop = () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
};

const handleScroll = () => {
  showScrollTop.value = window.scrollY > 200;
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});

// ---------- Helper Functions (used by parent components) ----------
const scrollToContact = () => {
  const el = document.getElementById('contact');
  if (el) {
    el.scrollIntoView({ behavior: 'smooth' });
    el.focus({ preventScroll: true });
  }
};

// Expose if needed by parent (optional)
defineExpose({ scrollToContact });

// ---------- Dynamic Year ----------
const currentYear = new Date().getFullYear();
</script>

<style scoped>
.container {
  max-width: 1200px;
}

/* Fade-in animation for sections */
.fade-in {
  opacity: 0;
  transform: translateY(30px);
  animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) 0.1s forwards;
}
@keyframes fadeInUp {
  to {
    opacity: 1;
    transform: none;
  }
}
</style>
