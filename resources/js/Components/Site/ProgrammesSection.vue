<template>
  <section class="programs-shell" aria-labelledby="programs-heading">
    <div class="programs-inner">
      <header class="section-header section-header--center">
        <div class="section-eyebrow">What We Do</div>
        <h2 id="programs-heading" class="section-title section-title--large">Our Programmes</h2>
        <p class="programs-sub">Structured initiatives designed to empower individuals and communities at every level.</p>
      </header>
      <div class="programs-grid">
        <div class="program-card" v-for="(prog, i) in programmes" :key="i" :style="`--i:${i}`">
          <div class="program-card__icon-wrap" :style="`--acc:${prog.color}`">
            <span class="program-card__icon">{{ prog.icon }}</span>
          </div>
          <h3 class="program-card__title">{{ prog.title }}</h3>
          <p class="program-card__desc">{{ prog.desc }}</p>
          <a href="#" class="program-card__link">Explore →</a>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
const programmes = [
  { icon: '💡', color: '#fbbf24', title: 'Micro-Enterprise Development', desc: 'End-to-end support for aspiring entrepreneurs — from ideation and business planning to market access and financing.' },
  { icon: '👩', color: '#a7f3d0', title: 'Women Empowerment',            desc: 'Dedicated programmes that build confidence, skills, and leadership capacity for women across the region.' },
  { icon: '🌱', color: '#6ee7b7', title: 'Sustainable Livelihoods',       desc: 'Agriculture, tourism, and natural-resource enterprises that balance income generation with environmental stewardship.' },
  { icon: '📚', color: '#818cf8', title: 'Skills & Vocational Training',  desc: 'Practical, market-relevant skills training in tailoring, construction, IT, food processing, and more.' },
  { icon: '🏥', color: '#f9a8d4', title: 'Community Health Outreach',     desc: 'Partnering with local health posts to run awareness campaigns and connect communities to health services.' },
  { icon: '🔗', color: '#fde68a', title: 'Social Mobilisation',           desc: 'Facilitating community groups, cooperatives, and networks that drive collective action and shared development.' },
];
</script>
