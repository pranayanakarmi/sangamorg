<template>
  <footer class="custom-footer">
    <!-- Curved SVG Top -->
    <div class="footer-curve">
      <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="footer-curve-svg">
        <path d="M0,80 C360,160 1080,0 1440,80 L1440,0 L0,0 Z" fill="#312e81"/>
      </svg>
    </div>
    <div class="footer-main">
      <div class="footer-col footer-brand-col">
        <div class="footer-logo-row">
          <img src="/assets/logo.jpeg" alt="SANGAM Logo" class="footer-logo" />
          <div class="footer-brand-title">
            <div class="footer-name">SANGAM</div>
            <div class="footer-tagline">Empowering Communities Since 2005</div>
          </div>
        </div>
        <div class="footer-theme-desc">
          Micro-Entrepreneurship & Community Development
        </div>
      </div>

      <div class="footer-col footer-links-col">
        <div class="footer-links-title">Quick Links</div>
        <div class="footer-links-grid">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Success Stories</a></li>
          </ul>
          <ul>
            <li><a href="#">Latest News</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Blog</a></li>
          </ul>
        </div>
      </div>

      <div class="footer-col footer-contact-col">
        <div class="footer-links-title">Contact Us</div>
        <div class="footer-contact-row">
          <span class="footer-icon">📍</span> Be. Na. Pa. -07, Beni Bazzar,<br />Myagdi, Nepal
        </div>
        <div class="footer-contact-row">
          <span class="footer-icon">✉️</span>
          <a href="mailto:info@sangam.org.np" class="footer-contact-link">info@sangam.org.np</a>
        </div>
        <div class="footer-contact-row">
          <span class="footer-icon">📞</span>
          <a href="tel:+97769520959" class="footer-contact-link">+977-69520959</a>
        </div>
      </div>

      <div class="footer-col footer-newsletter-col">
        <div class="footer-links-title">Remain Updated</div>
        <form class="footer-newsletter-form" @submit.prevent="handleNewsletterSubmit">
          <input
            type="email"
            v-model="newsletterEmail"
            placeholder="Your email address"
            class="footer-newsletter-input"
            required
            aria-label="Email for newsletter"
          />
          <button type="submit" class="footer-newsletter-btn">Sign up</button>
        </form>
        <div class="footer-social-row" aria-label="Social media links">
          <a href="#" aria-label="Facebook" class="footer-social-icon"><i class="fab fa-facebook-f"></i></a>
          <a href="#" aria-label="Twitter" class="footer-social-icon"><i class="fab fa-twitter"></i></a>
          <a href="#" aria-label="LinkedIn" class="footer-social-icon"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" aria-label="Pinterest" class="footer-social-icon"><i class="fab fa-pinterest-p"></i></a>
          <a href="#" aria-label="Instagram" class="footer-social-icon"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="YouTube" class="footer-social-icon"><i class="fab fa-youtube"></i></a>
          <a href="#" aria-label="Skype" class="footer-social-icon"><i class="fab fa-skype"></i></a>
          <a href="#" aria-label="RSS" class="footer-social-icon"><i class="fas fa-rss"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom-row">
      <div class="footer-copyright">&copy; {{ currentYear }} SANGAM. All rights reserved.</div>
      <div class="footer-designed">Committed to Social Development</div>
    </div>
  </footer>
</template>

<script setup>
import { ref } from 'vue';

const currentYear = new Date().getFullYear();
const newsletterEmail = ref('');

const handleNewsletterSubmit = () => {
  if (newsletterEmail.value) {
    // In a real app, send to API endpoint
    alert(`Thanks for subscribing! (Demo: ${newsletterEmail.value})`);
    newsletterEmail.value = '';
  } else {
    alert('Please enter a valid email address.');
  }
};
</script>

<style scoped>
/* ----- FOOTER STYLES (self-contained) ----- */
.custom-footer {
  background: #323232;
  color: #fff;
  padding: 0;
  margin-top: 4rem;
  font-family: var(--font-ui, 'DM Sans', 'Helvetica Neue', Arial, sans-serif);
  position: relative;
  overflow: hidden;
}

.footer-main {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 2.5rem;
  padding: 5.5rem 2.5rem 2.5rem 2.5rem;
  max-width: 1300px;
  margin: 0 auto;
  position: relative;
  z-index: 3;
}

.footer-curve {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 70px;
  z-index: 2;
  pointer-events: none;
}

.footer-curve-svg {
  display: block;
  width: 100%;
  height: 100%;
}

.footer-col {
  flex: 1 1 220px;
  min-width: 220px;
  max-width: 320px;
}

.footer-brand-col {
  min-width: 260px;
}

.footer-logo-row {
  display: flex;
  align-items: center;
  gap: 1.2rem;
}

.footer-logo {
  width: 54px;
  height: 54px;
  border-radius: 8px;
  object-fit: cover;
  border: 2px solid rgba(255,255,255,0.2);
}

.footer-brand-title {
  display: flex;
  flex-direction: column;
  gap: 0.2rem;
}

.footer-name {
  font-size: 1.25rem;
  font-weight: 700;
  letter-spacing: 0.01em;
}

.footer-tagline {
  font-size: 0.95rem;
  color: #fbbf24;
}

.footer-theme-desc {
  margin-top: 1.2rem;
  color: #bbb;
  font-size: 1rem;
  line-height: 1.4;
}

.footer-links-title {
  font-weight: 700;
  margin-bottom: 1.1rem;
  font-size: 1.08rem;
}

.footer-links-grid {
  display: flex;
  gap: 2.5rem;
}

.footer-links-grid ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links-grid li {
  margin-bottom: 0.7rem;
}

.footer-links-grid a {
  color: #fff;
  text-decoration: none;
  font-size: 1rem;
  transition: color 0.2s;
}

.footer-links-grid a:hover {
  color: #fbbf24;
}

.footer-contact-col {
  font-size: 1rem;
}

.footer-contact-row {
  margin-bottom: 1rem;
  display: flex;
  align-items: flex-start;
  gap: 0.7rem;
  color: #bbb;
  word-break: break-word;
}

.footer-contact-link {
  color: #bbb;
  text-decoration: none;
  transition: color 0.2s;
}

.footer-contact-link:hover {
  color: #fbbf24;
  text-decoration: underline;
}

.footer-icon {
  font-size: 1.1rem;
  margin-top: 0.1rem;
  flex-shrink: 0;
}

.footer-newsletter-col {
  min-width: 260px;
}

.footer-newsletter-form {
  display: flex;
  gap: 0.7rem;
  margin-bottom: 1.2rem;
  flex-wrap: wrap;
}

.footer-newsletter-input {
  flex: 1;
  padding: 0.7rem 1rem;
  border-radius: 4px;
  border: none;
  font-size: 1rem;
  outline: none;
  font-family: inherit;
}

.footer-newsletter-btn {
  background: #fbbf24;
  color: #23272f;
  border: none;
  border-radius: 4px;
  padding: 0.7rem 1.5rem;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.2s;
}

.footer-newsletter-btn:hover {
  background: #fde68a;
}

.footer-social-row {
  display: flex;
  gap: 1.1rem;
  margin-top: 0.7rem;
  flex-wrap: wrap;
}

.footer-social-icon {
  color: #fff;
  font-size: 1.25rem;
  transition: color 0.2s;
}

.footer-social-icon:hover {
  color: #fbbf24;
}

.footer-bottom-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1.2rem 2.5rem 1.2rem 2.5rem;
  background: #232323;
  font-size: 0.9rem;
  color: #bbb;
  flex-wrap: wrap;
  gap: 1rem;
}

.footer-designed {
  font-size: 0.9rem;
  color: #bbb;
}

@media (max-width: 900px) {
  .footer-main {
    flex-direction: column;
    gap: 2.5rem;
    padding: 2.5rem 1.2rem 1.5rem 1.2rem;
  }
  .footer-bottom-row {
    flex-direction: column;
    gap: 0.7rem;
    padding: 1.2rem 1.2rem;
    text-align: center;
  }
  .footer-links-grid {
    gap: 1.8rem;
  }
}
</style>
