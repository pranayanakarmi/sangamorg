<template>
  <div class="max-w-6xl px-4 py-8 mx-auto">
    <SuccessStories :stories="stories" :loading-stories="loadingStories" />
  </div>
</template>
<script setup>
import SuccessStories from '@/Components/Pages/SuccessStories.vue';
import { ref, onMounted } from 'vue';

const loadingStories = ref(true);
const stories = ref([]);

const fetchStories = () => {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve([
        {
          id: 1,
          title: 'Empowering Local Entrepreneurs',
          summary: 'How SANGAM helped a local farmer turn his small dairy into a thriving enterprise.',
          image: 'https://picsum.photos/id/26/200/200',
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

onMounted(async () => {
  loadingStories.value = true;
  stories.value = await fetchStories();
  loadingStories.value = false;
});
</script>
