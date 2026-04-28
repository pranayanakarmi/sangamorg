<template>
  <section class="impact-shell" aria-labelledby="impact-heading">
    <div class="impact-inner">
      <div class="impact-text">
        <div class="section-eyebrow impact-eyebrow">Our Impact</div>
        <h2 id="impact-heading" class="impact-heading">Two decades of real, measurable change</h2>
        <p class="impact-desc">From small villages to district-level programmes, SANGAM's reach continues to grow every year.</p>
      </div>
      <div class="impact-grid">
        <div class="impact-card" v-for="(item, i) in impactStats" :key="i" :style="`--i:${i}`">
          <div class="impact-card__icon">{{ item.icon }}</div>
          <div class="impact-card__num">{{ item.num }}</div>
          <div class="impact-card__label">{{ item.label }}</div>
          <div class="impact-card__desc">{{ item.desc }}</div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
const impactStats = [
  { icon: '🏘️', num: '120+',  label: 'Villages Reached',       desc: 'Across Myagdi and neighbouring districts' },
  { icon: '💼', num: '500+',  label: 'Entrepreneurs Supported', desc: 'Micro-businesses launched and sustained'  },
  { icon: '🎓', num: '2,400+',label: 'People Trained',          desc: 'Skills and vocational training graduates' },
  { icon: '🤝', num: '15+',   label: 'Partner Organisations',   desc: 'Local, national, and international bodies'},
];
</script>
