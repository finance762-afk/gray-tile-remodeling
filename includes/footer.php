<?php
/**
 * footer.php — Gray Tile & Remodeling
 * Closes </main>, outputs the full site footer, back-to-top button,
 * mobile floating CTA bar, and all deferred scripts.
 *
 * OPTIONAL page-level flags (set before including footer.php):
 *   $useSwiper       — bool true → loads Swiper JS from CDN
 *   $useVanillaTilt  — bool true → loads VanillaTilt JS from CDN
 */
if (!isset($siteName)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
}
if (!function_exists('formatPhone')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
}
// Ensure phone is always set (fallback for NAP compliance)
if (empty($phone)) { $phone = '(770) 555-0000'; }
?>

</main><!-- /#main-content -->


<footer class="site-footer" role="contentinfo">

  <!-- ─── Footer Top: 4-Column Grid ─── -->
  <div class="footer-top">
    <div class="container">
      <div class="footer-grid">

        <!-- Col 1 — Brand, tagline, description, trust badges -->
        <div class="footer-col footer-brand">
          <a href="/" class="footer-logo-link" aria-label="<?php echo htmlspecialchars($siteName); ?> — Home">
            <img
              src="<?php echo htmlspecialchars($clientPhotos['logo']); ?>"
              alt="<?php echo htmlspecialchars($siteName); ?> logo"
              width="160" height="44"
              loading="lazy">
          </a>
          <p class="footer-tagline"><?php echo htmlspecialchars($tagline); ?></p>
          <p class="footer-desc prose"><?php echo htmlspecialchars($businessDescription); ?></p>

          <!-- Social links (shown only if profiles are provided) -->
          <?php $hasSocial = array_filter(array_values($socialLinks)); ?>
          <?php if ($hasSocial): ?>
          <div class="footer-social" style="display:flex;gap:var(--space-sm);margin-bottom:var(--space-md);">
            <?php if ($socialLinks['facebook']): ?>
            <a href="<?php echo htmlspecialchars($socialLinks['facebook']); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo htmlspecialchars($siteName); ?> on Facebook" class="footer-social-link">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            </a>
            <?php endif; ?>
            <?php if ($socialLinks['instagram']): ?>
            <a href="<?php echo htmlspecialchars($socialLinks['instagram']); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo htmlspecialchars($siteName); ?> on Instagram" class="footer-social-link">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
            </a>
            <?php endif; ?>
            <?php if ($socialLinks['google']): ?>
            <a href="<?php echo htmlspecialchars($socialLinks['google']); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo htmlspecialchars($siteName); ?> on Google" class="footer-social-link">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
            </a>
            <?php endif; ?>
          </div>
          <?php endif; ?>

          <div class="footer-trust">
            <span class="trust-badge">
              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
              Licensed &amp; Insured
            </span>
            <span class="trust-badge">
              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              <?php echo $yearsInBusiness; ?> Years Experience
            </span>
            <span class="trust-badge">
              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>
              Free Estimates
            </span>
          </div>
        </div>

        <!-- Col 2 — Service groups (first 4) -->
        <div class="footer-col">
          <h4>Our Services</h4>
          <ul>
            <?php foreach (array_slice($serviceGroups, 0, 4) as $group): ?>
            <li>
              <a href="/services/<?php echo htmlspecialchars($group['slug']); ?>/">
                <?php echo htmlspecialchars($group['name']); ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- Col 3 — Service groups (remaining) + Company pages -->
        <div class="footer-col">
          <h4>More Services</h4>
          <ul>
            <?php foreach (array_slice($serviceGroups, 4) as $group): ?>
            <li>
              <a href="/services/<?php echo htmlspecialchars($group['slug']); ?>/">
                <?php echo htmlspecialchars($group['name']); ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
          <h4>Company</h4>
          <ul>
            <li><a href="/about/">About Us</a></li>
            <li><a href="/service-area/">Service Area</a></li>
            <li><a href="/contact/">Contact</a></li>
          </ul>
        </div>

        <!-- Col 4 — Contact info + CTA -->
        <div class="footer-col footer-contact">
          <h4>Contact Us</h4>
          <address>
            <?php if ($phone): ?>
            <div class="contact-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.65 3.39 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.59a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
              <a href="tel:<?php echo htmlspecialchars($phone); ?>"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
            </div>
            <?php endif; ?>

            <?php if ($email): ?>
            <div class="contact-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a>
            </div>
            <?php endif; ?>

            <div class="contact-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
              <span>
                <?php echo htmlspecialchars($address['street']); ?><br>
                <?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?>&nbsp;<?php echo htmlspecialchars($address['zip']); ?>
              </span>
            </div>

            <div class="contact-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              <span>Mon–Fri 8am–6pm<br>Sat 9am–2pm</span>
            </div>
          </address>

          <a href="/contact/" class="btn btn-accent" style="margin-top:var(--space-lg);display:inline-flex;align-items:center;gap:var(--space-xs);">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
            Get Free Estimate
          </a>
        </div>

      </div><!-- /.footer-grid -->
    </div><!-- /.container -->
  </div><!-- /.footer-top -->


  <!-- ─── AEO Entity Block ─── -->
  <div class="footer-entity"
       itemscope
       itemtype="https://schema.org/HomeAndConstructionBusiness">
    <div class="container">
      <meta itemprop="name"      content="<?php echo htmlspecialchars($siteName); ?>">
      <meta itemprop="url"       content="<?php echo htmlspecialchars($siteUrl); ?>">
      <?php if ($phone): ?><meta itemprop="telephone" content="<?php echo htmlspecialchars($phone); ?>"><?php endif; ?>
      <meta itemprop="address"   content="<?php echo htmlspecialchars($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']); ?>">
      <p>
        <?php echo htmlspecialchars($siteName); ?> is a tile installation and home remodeling company based in <?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?>, serving Bowdon, Carrollton, Villa Rica, Bremen, Temple, and communities throughout Carroll County and West Georgia. Founded in <?php echo $yearEstablished; ?> with <?php echo $yearsInBusiness; ?> years of experience, <?php echo htmlspecialchars($siteName); ?> specializes in kitchen remodeling, bathroom remodeling, custom tile showers, and flooring installation.<?php if ($phone): ?> Contact: <a href="tel:<?php echo htmlspecialchars($phone); ?>"><?php echo htmlspecialchars(formatPhone($phone)); ?></a><?php if ($email): ?> |<?php endif; ?><?php endif; ?><?php if ($email): ?> <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a><?php endif; ?><?php if ($phone || $email): ?> |<?php endif; ?> <a href="<?php echo htmlspecialchars($siteUrl); ?>"><?php echo htmlspecialchars($siteUrl); ?></a>. Licensed and insured.
      </p>
    </div>
  </div>


  <!-- ─── Footer Bottom Bar ─── -->
  <div class="footer-bottom-bar">
    <div class="container">

      <!-- Legal Row (TCPA/CCPA compliance — required on every page) -->
      <div class="footer-legal-row">
        <a href="/privacy-policy/">Privacy Policy</a>
        <span class="divider">|</span>
        <a href="/terms/">Terms of Service</a>
        <span class="divider">|</span>
        <a href="/cookie-policy/">Cookie Policy</a>
        <span class="divider">|</span>
        <a href="/accessibility/">Accessibility</a>
        <span class="divider">|</span>
        <a href="/privacy-policy/#ccpa-rights">Do Not Sell or Share My Personal Information</a>
        <span class="divider">|</span>
        <a href="/sitemap.xml">Sitemap</a>
      </div>

      <!-- Copyright + Dofollow Credit -->
      <div class="footer-copyright-row">
        <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($siteName); ?>. All rights reserved.</p>
        <p class="footer-credit">
          <a href="https://pageoneinsights.com" rel="dofollow" target="_blank">Web Design &amp; Hosting by Page One Insights, LLC</a>
        </p>
      </div>

    </div>
  </div>

</footer>


<!-- ─── Back to Top Button ─── -->
<button class="back-to-top"
        id="back-to-top"
        aria-label="Scroll back to top of page">
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="18 15 12 9 6 15"/></svg>
</button>


<!-- ─── Mobile Floating CTA Bar (<768px only) ─── -->
<div class="mobile-cta-bar" role="complementary" aria-label="Quick contact actions">
  <div class="mobile-cta-inner">
    <?php if ($phone): ?>
    <a href="tel:<?php echo htmlspecialchars($phone); ?>"
       class="btn btn-outline-white"
       aria-label="Call <?php echo htmlspecialchars($siteName); ?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.65 3.39 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.59a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
      Call Now
    </a>
    <?php else: ?>
    <a href="/contact/"
       class="btn btn-outline-white"
       aria-label="Contact <?php echo htmlspecialchars($siteName); ?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
      Contact
    </a>
    <?php endif; ?>
    <a href="/contact/"
       class="btn btn-accent"
       aria-label="Get a free estimate from <?php echo htmlspecialchars($siteName); ?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
      Free Estimate
    </a>
  </div>
</div>


<!-- ─── Scripts ─── -->

<!-- Core JS (animations, effects, mobile menu, back-to-top) -->
<script src="/assets/js/main.js" defer></script>
<script src="/assets/js/animations.js" defer></script>
<script src="/assets/js/effects.js" defer></script>

<?php if (isset($useSwiper) && $useSwiper): ?>
<!-- Swiper JS (conditional — only on pages with carousels) -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
<?php endif; ?>

<?php if (isset($useVanillaTilt) && $useVanillaTilt): ?>
<!-- VanillaTilt (conditional — only on pages with tilt cards) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js" defer></script>
<?php endif; ?>

<!-- Inline: Back-to-top + Header scroll + Mobile menu -->
<script>
(function () {
  'use strict';

  // ── Back to Top ──────────────────────────────────
  var btt = document.getElementById('back-to-top');
  if (btt) {
    window.addEventListener('scroll', function () {
      btt.classList.toggle('visible', window.scrollY > 300);
    }, { passive: true });
    btt.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // ── Header Scroll Behaviour ──────────────────────
  var header = document.querySelector('[data-header]');
  if (header) {
    window.addEventListener('scroll', function () {
      header.classList.toggle('scrolled', window.scrollY > 80);
    }, { passive: true });
  }

  // ── Mobile Menu ──────────────────────────────────
  var hamburger   = document.getElementById('hamburger-btn');
  var mobileMenu  = document.getElementById('mobile-menu');
  var overlay     = document.getElementById('mobile-menu-overlay');
  var closeBtn    = document.getElementById('mobile-menu-close');

  function openMenu() {
    if (!hamburger || !mobileMenu) return;
    hamburger.setAttribute('aria-expanded', 'true');
    hamburger.setAttribute('aria-label', 'Close navigation menu');
    hamburger.classList.add('active');
    mobileMenu.setAttribute('aria-hidden', 'false');
    mobileMenu.classList.add('is-open');
    if (overlay) overlay.classList.add('is-visible');
    document.body.style.overflow = 'hidden';
  }

  function closeMenu() {
    if (!hamburger || !mobileMenu) return;
    hamburger.setAttribute('aria-expanded', 'false');
    hamburger.setAttribute('aria-label', 'Open navigation menu');
    hamburger.classList.remove('active');
    mobileMenu.setAttribute('aria-hidden', 'true');
    mobileMenu.classList.remove('is-open');
    if (overlay) overlay.classList.remove('is-visible');
    document.body.style.overflow = '';
  }

  if (hamburger)  hamburger.addEventListener('click', openMenu);
  if (closeBtn)   closeBtn.addEventListener('click', closeMenu);
  if (overlay)    overlay.addEventListener('click', closeMenu);

  // Close on Escape key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && mobileMenu && mobileMenu.classList.contains('is-open')) {
      closeMenu();
      hamburger && hamburger.focus();
    }
  });

  // Close when tapping a link inside the menu
  document.querySelectorAll('.mobile-nav-links a, .mobile-submenu a').forEach(function (link) {
    link.addEventListener('click', closeMenu);
  });

  // ── Mobile Submenu Accordion ─────────────────────
  document.querySelectorAll('.mobile-submenu-toggle').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var expanded = this.getAttribute('aria-expanded') === 'true';
      this.setAttribute('aria-expanded', String(!expanded));
      var submenu = this.nextElementSibling;
      if (submenu) submenu.classList.toggle('is-open', !expanded);
    });
  });

  // ── Scroll Reveal (IntersectionObserver) ─────────
  // Handled by animations.js — this is a safety fallback
  if (!window.IntersectionObserver) {
    document.querySelectorAll('[data-animate]').forEach(function (el) {
      el.classList.add('animated');
    });
  }

}());
</script>

