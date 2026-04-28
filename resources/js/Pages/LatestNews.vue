<template>
  <div class="max-w-6xl px-4 py-8 mx-auto">
    <LatestNews :news-items="newsItems" :loading-news="loadingNews" />
  </div>
</template>
<script setup>
import LatestNews from '@/Components/Pages/LatestNews.vue';
import { ref, onMounted } from 'vue';

const loadingNews = ref(true);
const newsItems = ref([]);

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

onMounted(async () => {
  loadingNews.value = true;
  newsItems.value = await fetchNews();
  loadingNews.value = false;
});
</script>
