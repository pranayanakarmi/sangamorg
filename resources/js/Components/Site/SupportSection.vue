<template>
  <section class="support-shell" aria-labelledby="support-heading">
    <div class="support-inner">
      <header class="section-header section-header--center">
        <div class="section-eyebrow">Get Involved</div>
        <h2 id="support-heading" class="section-title section-title--large">How You Can Support</h2>
      </header>
      <ul class="support-list">
        <li class="support-item" v-for="(s, i) in supportItems" :key="i" :style="`--i:${i}`">
          <div class="support-item__icon-wrap"><span class="support-icon">{{ s.icon }}</span></div>
          <div class="support-item__body">
            <strong class="support-item__title">{{ s.title }}</strong>
            <span class="support-item__desc">{{ s.desc }}</span>
          </div>
        </li>
      </ul>
    </div>
  </section>
</template>

<script setup>
const supportItems = [
  { icon: '🤝', title: 'Partner with us',         desc: 'Collaborate on community development projects and initiatives.' },
  { icon: '🎓', title: 'Volunteer',                desc: 'Share your expertise, skills, or simply your time.' },
  { icon: '💡', title: 'Share ideas',              desc: 'Help us shape programmes by contributing local knowledge.' },
  { icon: '💸', title: 'Donate',                   desc: 'Financial contributions directly fund training and enterprise support.' },
];
</script>
