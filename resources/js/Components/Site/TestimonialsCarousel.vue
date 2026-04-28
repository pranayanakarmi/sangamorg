<template>
  <section class="testimonials-shell" aria-labelledby="testimonials-heading">
    <div class="testimonials-bg-deco" aria-hidden="true"></div>
    <div class="testimonials-inner">
      <header class="section-header section-header--center">
        <div class="section-eyebrow">What People Say</div>
        <h2 id="testimonials-heading" class="section-title section-title--large">Voices from the Community</h2>
      </header>
      <div class="testi-carousel" role="region" aria-label="Testimonials carousel">
        <div class="testi-track-wrap">
          <div class="testi-track" :style="`transform: translateX(-${activeTestimonial * 100}%)`">
            <div class="testi-slide" v-for="(t, i) in testimonials" :key="i">
              <blockquote class="testi-card">
                <div class="testi-card__quote-icon" aria-hidden="true">"</div>
                <p class="testi-card__text">{{ t.quote }}</p>
                <footer class="testi-card__footer">
                  <div class="testi-card__avatar">
                    <img :src="t.avatar" :alt="t.name" class="testi-avatar-img" loading="lazy" />
                  </div>
                  <div class="testi-card__info">
                    <div class="testi-card__stars">
                      <span v-for="s in 5" :key="s" class="testi-star">★</span>
                    </div>
                    <span class="testi-card__name">{{ t.name }}</span>
                    <span class="testi-card__role">{{ t.role }}</span>
                  </div>
                </footer>
              </blockquote>
            </div>
          </div>
        </div>
        <!-- Controls -->
        <div class="testi-controls">
          <button class="testi-arrow testi-arrow--prev" @click="prevTesti" :disabled="activeTestimonial === 0" aria-label="Previous testimonial">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 18l-6-6 6-6"/></svg>
          </button>
          <div class="testi-dots">
            <button
              v-for="(t, i) in testimonials" :key="i"
              :class="['testi-dot', { 'testi-dot--active': i === activeTestimonial } ]"
              @click="activeTestimonial = i"
              :aria-label="`Go to testimonial ${i + 1}`"
            ></button>
          </div>
          <button class="testi-arrow testi-arrow--next" @click="nextTesti" :disabled="activeTestimonial === testimonials.length - 1" aria-label="Next testimonial">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
          </button>
        </div>
      </div>
      <!-- Partners bar inside testimonials -->
      <div class="testi-partners">
        <p class="testi-partners__label">Trusted by partners across Nepal</p>
        <div class="testi-partners__logos">
          <img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/UNDP_logo.svg" alt="UNDP/MEDEP" />
          <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/Flag_of_Nepal.svg" alt="NEDC/N" />
          <img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/UNDP_logo.svg" alt="UNDP Nepal" />
          <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/Flag_of_Nepal.svg" alt="PAF Nepal" />
          <img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Good_Neighbors_International_logo.svg" alt="GNI Nepal" />
          <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Food_and_Agriculture_Organization_logo.svg" alt="FAO" />
          <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/World_Bank_logo.svg" alt="World Bank" />
          <img src="https://upload.wikimedia.org/wikipedia/commons/8/8e/Logo_of_UN_Women.svg" alt="UN Women" />
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue';
const activeTestimonial = ref(0);
const testimonials = [
  { quote: "SANGAM's support changed my life. With their guidance I started my own dairy business and now I employ four people from my village. I never imagined this was possible.",       name: 'Maya Pun',        role: 'Dairy Entrepreneur, Myagdi',      avatar: 'https://i.pravatar.cc/80?img=47' },
  { quote: 'The training programs are practical and deeply empowering. I gained not just skills but the confidence to take my tailoring shop to the next level and supply schools.',        name: 'Kamala Shrestha', role: 'Tailoring Business Owner, Beni',  avatar: 'https://i.pravatar.cc/80?img=45' },
  { quote: 'SANGAM is a reliable, visionary partner in community development. Their approach to social mobilisation genuinely transforms how communities organise and advocate for themselves.', name: 'Sita Gurung',     role: 'Ward Official, Myagdi',           avatar: 'https://i.pravatar.cc/80?img=44' },
  { quote: 'I attended the vocational training programme with very little hope. Today I run a successful food-processing unit and supply local markets. SANGAM made this journey possible.',  name: 'Ramesh Thapa',    role: 'Food Processing Unit Owner',      avatar: 'https://i.pravatar.cc/80?img=12' },
];
const prevTesti = () => { if (activeTestimonial.value > 0) activeTestimonial.value--; };
const nextTesti = () => { if (activeTestimonial.value < testimonials.length - 1) activeTestimonial.value++; };
</script>
