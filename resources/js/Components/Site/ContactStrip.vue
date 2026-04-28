<template>
  <section class="contact-strip-shell" id="contact" aria-labelledby="contact-strip-heading">
    <div class="contact-strip-inner">
      <div class="contact-strip-col contact-strip-col--info">
        <div class="section-eyebrow">Get In Touch</div>
        <h2 id="contact-strip-heading" class="section-title section-title--large">We'd love to hear from you</h2>
        <address class="contact-block">
          <div class="contact-row">
            <span class="contact-icon">📍</span>
            <span>Be. Na. Pa. -07, Beni Bazzar, Myagdi, Nepal</span>
          </div>
          <div class="contact-row">
            <span class="contact-icon">✉️</span>
            <a href="mailto:info@sangam.org.np" class="contact-link">info@sangam.org.np</a>
          </div>
          <div class="contact-row">
            <span class="contact-icon">📞</span>
            <a href="tel:+97769520959" class="contact-link">+977-69520959</a>
          </div>
        </address>
      </div>
      <div class="contact-strip-col contact-strip-col--links">
        <h3 class="contact-strip-links-title">Important Links</h3>
        <ul class="link-list">
          <li v-for="link in importantLinks" :key="link.href">
            <a :href="link.href" target="_blank" rel="noopener noreferrer" class="ext-link">
              <span class="ext-link__icon">↗</span> {{ link.label }}
            </a>
          </li>
        </ul>
      </div>
      <div class="contact-strip-col contact-strip-col--newsletter">
        <h3 class="contact-strip-links-title">Stay Updated</h3>
        <p class="newsletter-desc">Get news and updates from SANGAM directly in your inbox.</p>
        <div class="newsletter-form">
          <input v-model="newsletterEmail" type="email" placeholder="Your email address" class="newsletter-input" aria-label="Email for newsletter" />
          <button class="newsletter-btn" @click="subscribeNewsletter">Subscribe</button>
        </div>
        <p v-if="newsletterSuccess" class="newsletter-success">✓ Thank you for subscribing!</p>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue';
const importantLinks = [
  { href: 'https://medep.org.np/',          label: 'MEDEP'      },
  { href: 'https://nedcn.org.np/',          label: 'NEDC/N'     },
  { href: 'https://www.undp.org.np/',       label: 'UNDP Nepal' },
  { href: 'https://www.pafnepal.org.np/',   label: 'PAF Nepal'  },
  { href: 'https://www.goodneighbors.org/', label: 'GNI Nepal'  },
];
const newsletterEmail   = ref('');
const newsletterSuccess = ref(false);
const subscribeNewsletter = () => {
  if (newsletterEmail.value && newsletterEmail.value.includes('@')) {
    newsletterSuccess.value = true;
    newsletterEmail.value = '';
    setTimeout(() => { newsletterSuccess.value = false; }, 4000);
  }
};
</script>
