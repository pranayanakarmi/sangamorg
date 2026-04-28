<template>
  <footer class="site-footer custom-footer">
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
        <div class="footer-theme-desc">Empowering Communities, Myagdi, Nepal</div>
      </div>
      <div class="footer-col footer-links-col">
        <div class="footer-links-title">Quick Links</div>
        <div class="footer-links-grid">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Blog</a></li>
          </ul>
          <ul>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-col footer-contact-col">
        <div class="footer-links-title">Contact Us</div>
        <div class="footer-contact-row"><span class="footer-icon">📍</span> Be. Na. Pa. -07, Beni Bazzar,<br />Myagdi, Nepal</div>
        <div class="footer-contact-row"><span class="footer-icon">📞</span> +977-69520959</div>
        <div class="footer-contact-row"><span class="footer-icon">✉️</span> info@sangam.org.np</div>
      </div>
      <div class="footer-col footer-newsletter-col">
        <div class="footer-links-title">Remain Updated</div>
        <form class="footer-newsletter-form" @submit.prevent>
          <input type="email" placeholder="Your email address" class="footer-newsletter-input" />
          <button type="submit" class="footer-newsletter-btn">Sign up</button>
        </form>
        <div class="footer-social-row">
          <a href="#" aria-label="Facebook" class="footer-social-icon"><span>🌐</span></a>
          <a href="#" aria-label="Twitter" class="footer-social-icon"><span>🐦</span></a>
          <a href="#" aria-label="LinkedIn" class="footer-social-icon"><span>💼</span></a>
          <a href="#" aria-label="Instagram" class="footer-social-icon"><span>📸</span></a>
          <a href="#" aria-label="YouTube" class="footer-social-icon"><span>▶️</span></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom-row">
      <div class="footer-copyright">&copy; {{ new Date().getFullYear() }} SANGAM. All rights reserved.</div>
      <div class="footer-designed">Designed by SANGAM Team</div>
    </div>
  </footer>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap');
.custom-footer {
  background: #312e81;
  color: #fff;
  padding: 0;
  margin-top: 4rem;
  font-family: 'DM Sans', Arial, sans-serif;
}
.footer-main {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 2.5rem;
  padding: 3.5rem 2.5rem 2.5rem 2.5rem;
  max-width: 1300px;
  margin: 0 auto;
}
.footer-col {
  flex: 1 1 220px;
  min-width: 220px;
  max-width: 320px;
}
.footer-brand-col {
  position: relative;
  overflow: hidden;
  min-width: 260px;
}
.footer-logo-row {
  display: flex;
  align-items: center;
  gap: 1.2rem;
  padding: 5.5rem 2.5rem 2.5rem 2.5rem; /* Add top padding for curve */
.footer-logo {
  width: 54px;
  position: relative;
  z-index: 3;
  height: 54px;
  border-radius: 8px;
  object-fit: cover;
  border: 2px solid #fff2;
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
}
.footer-icon {
  font-size: 1.1rem;
  margin-top: 0.1rem;
}
.footer-newsletter-col {
  min-width: 260px;
}
.footer-newsletter-form {
  display: flex;
  gap: 0.7rem;
  margin-bottom: 1.2rem;
}
.footer-newsletter-input {
  flex: 1;
  padding: 0.7rem 1rem;
  border-radius: 4px;
  border: none;
  font-size: 1rem;
  outline: none;
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
  font-size: 1rem;
  color: #bbb;
}
.footer-designed {
  font-size: 1rem;
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
    font-size: 0.98rem;
  }
}
</style>
