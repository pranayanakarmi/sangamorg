<template>
  <section class="faq-shell" aria-labelledby="faq-heading">
    <div class="faq-inner">
      <div class="faq-left">
        <div class="section-eyebrow">Common Questions</div>
        <h2 id="faq-heading" class="section-title section-title--large">Frequently Asked Questions</h2>
        <p class="faq-desc">Can't find what you're looking for? <a href="#contact" class="faq-contact-link">Contact us directly.</a></p>
      </div>
      <div class="faq-right">
        <div
          v-for="(faq, i) in faqs" :key="i"
          :class="['faq-item', { 'faq-item--open': openFaq === i }]"
        >
          <button class="faq-question" @click="openFaq = openFaq === i ? null : i" :aria-expanded="openFaq === i">
            <span>{{ faq.q }}</span>
            <span class="faq-chevron" aria-hidden="true">{{ openFaq === i ? '−' : '+' }}</span>
          </button>
          <div class="faq-answer" v-show="openFaq === i">
            <p>{{ faq.a }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue';
const openFaq = ref(null);
const faqs = [
  { q: "How can I apply for SANGAM's entrepreneurship support?",       a: "You can apply by visiting our office in Beni Bazzar, Myagdi, or by contacting us via email or phone. We have intake periods throughout the year and will guide you through the process." },
  { q: "What kinds of training programmes does SANGAM offer?",          a: "We offer vocational training in tailoring, construction skills, IT literacy, food processing, agro-enterprise management, and more — all designed around market demand in the region." },
  { q: "Is SANGAM open to organisations wishing to partner with us?",   a: "Absolutely. We welcome partnerships with local, national, and international organisations aligned with our mission. Please reach out to us to discuss collaboration opportunities." },
  { q: "How is SANGAM funded and how is funding used?",                  a: "SANGAM receives support from international development partners including UNDP/MEDEP and domestic sources. All funds are directed to programme delivery, training, and community outreach." },
  { q: "Does SANGAM work only in Myagdi district?",                     a: "While Myagdi is our primary area, our programmes extend into several neighbouring districts. We continuously expand our reach based on community need and available resources." },
];
</script>
