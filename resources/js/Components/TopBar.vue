<template>
  <div class="topbar">
    <!-- Left: Contact Info -->
    <div class="topbar__contact">
      <a href="tel:+97769520959" class="topbar__item">
        <span class="topbar__item-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5.5A1.5 1.5 0 014.5 4h1a1.5 1.5 0 011.5 1.5v1A1.5 1.5 0 015.5 8H5a2 2 0 000 4h.5A1.5 1.5 0 017 13.5v1A1.5 1.5 0 015.5 16h-1A1.5 1.5 0 013 14.5v-9z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 4h6a2 2 0 012 2v12a2 2 0 01-2 2H9a2 2 0 01-2-2V6a2 2 0 012-2z"/>
          </svg>
        </span>
        <span>+977-69520959</span>
      </a>

      <span class="topbar__divider" />

      <a href="mailto:info@sangam.org.np" class="topbar__item">
        <span class="topbar__item-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
          </svg>
        </span>
        <span>info@sangam.org.np</span>
      </a>
    </div>

    <!-- Right: Social Icons -->
    <div class="topbar__social">
      <span class="topbar__social-label">Follow us</span>
      <span class="topbar__social-sep" />
      <a href="#" aria-label="Facebook" class="topbar__social-btn">
        <svg viewBox="0 0 24 24" fill="currentColor">
          <path d="M22.675 0h-21.35C.595 0 0 .592 0 1.326v21.348C0 23.408.595 24 1.325 24h11.495v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.797.143v3.24l-1.918.001c-1.504 0-1.797.715-1.797 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.406 24 24 23.408 24 22.674V1.326C24 .592 23.406 0 22.675 0"/>
        </svg>
      </a>
      <a href="#" aria-label="Twitter / X" class="topbar__social-btn">
        <svg viewBox="0 0 24 24" fill="currentColor">
          <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.747l7.73-8.835L1.254 2.25H8.08l4.259 5.63 5.905-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
        </svg>
      </a>
      <a href="#" aria-label="YouTube" class="topbar__social-btn">
        <svg viewBox="0 0 24 24" fill="currentColor">
          <path d="M23.498 6.186a2.994 2.994 0 00-2.107-2.12C19.163 3.5 12 3.5 12 3.5s-7.163 0-9.391.566A2.994 2.994 0 00.502 6.186C0 8.413 0 12 0 12s0 3.587.502 5.814a2.994 2.994 0 002.107 2.12C4.837 20.5 12 20.5 12 20.5s7.163 0 9.391-.566a2.994 2.994 0 002.107-2.12C24 15.587 24 12 24 12s0-3.587-.502-5.814zM9.545 15.568V8.432l6.545 3.568-6.545 3.568z"/>
        </svg>
      </a>
    </div>
  </div>
</template>

<script setup>
defineProps({});
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap');

.topbar {
  width: 100%;
  background: #0f0d3a;
  border-bottom: 1px solid rgba(251, 191, 36, 0.18);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 1.5rem;
  height: 40px;
  font-family: 'DM Sans', sans-serif;
  box-sizing: border-box;
  z-index: 101;
  position: relative;
}

/* subtle noise texture */
.topbar::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
  pointer-events: none;
  opacity: 0.5;
}

/* ── Contact ── */
.topbar__contact {
  display: flex;
  align-items: center;
  gap: 0.25rem;
}

.topbar__item {
  display: inline-flex;
  align-items: center;
  gap: 0.45rem;
  font-size: 0.74rem;
  font-weight: 500;
  color: rgba(203, 213, 225, 0.72);
  text-decoration: none;
  padding: 0.2rem 0.6rem;
  border-radius: 4px;
  letter-spacing: 0.01em;
  transition: color 0.2s, background 0.2s;
  white-space: nowrap;
}

.topbar__item:hover {
  color: #fbbf24;
  background: rgba(251, 191, 36, 0.07);
}

.topbar__item-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  color: rgba(251, 191, 36, 0.5);
  transition: color 0.2s;
}

.topbar__item:hover .topbar__item-icon {
  color: #fbbf24;
}

.topbar__item-icon svg {
  width: 13px;
  height: 13px;
}

.topbar__divider {
  width: 1px;
  height: 14px;
  background: rgba(251, 191, 36, 0.2);
  margin: 0 0.15rem;
  flex-shrink: 0;
}

/* ── Social ── */
.topbar__social {
  display: flex;
  align-items: center;
  gap: 0.15rem;
}

.topbar__social-label {
  font-size: 0.68rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: rgba(148, 163, 184, 0.5);
  margin-right: 0.35rem;
}

.topbar__social-sep {
  width: 1px;
  height: 14px;
  background: rgba(251, 191, 36, 0.2);
  margin: 0 0.35rem;
  flex-shrink: 0;
}

.topbar__social-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 26px;
  height: 26px;
  border-radius: 6px;
  color: rgba(203, 213, 225, 0.5);
  background: transparent;
  transition: color 0.2s, background 0.2s, transform 0.2s;
  text-decoration: none;
}

.topbar__social-btn svg {
  width: 13px;
  height: 13px;
}

.topbar__social-btn:hover {
  color: #fbbf24;
  background: rgba(251, 191, 36, 0.1);
  transform: translateY(-1px);
}

/* ── Mobile ── */
@media (max-width: 640px) {
  .topbar {
    padding: 0 0.85rem;
    height: 36px;
  }

  .topbar__social-label,
  .topbar__social-sep {
    display: none;
  }

  .topbar__item span:last-child {
    display: none;
  }

  .topbar__item {
    padding: 0.2rem 0.4rem;
  }

  .topbar__item-icon svg {
    width: 15px;
    height: 15px;
  }

  .topbar__divider {
    margin: 0;
  }
}
</style>
