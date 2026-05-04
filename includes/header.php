<?php
/**
 * header.php — Gray Tile & Remodeling
 * Outputs the skip-to-content link, fixed glassmorphism navbar, and opens <main>.
 *
 * Requires: $siteName, $currentPage, $phone, $serviceGroups, $services (from config.php)
 * Requires: isActivePage(), formatPhone() (from functions.php)
 */
if (!isset($siteName)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
}
if (!function_exists('isActivePage')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
}
?>

<a href="#main-content" class="skip-link">Skip to main content</a>

<header class="site-header" data-header>
  <nav class="navbar" aria-label="Main navigation">
    <div class="navbar-inner container">

      <!-- ─── Logo ─── -->
      <a href="/" class="navbar-logo" aria-label="<?php echo htmlspecialchars($siteName); ?> — Return to homepage">
        <img
          src="<?php echo htmlspecialchars($clientPhotos['logo']); ?>"
          alt="<?php echo htmlspecialchars($siteName); ?> logo"
          width="160" height="44"
          loading="eager"
          fetchpriority="high">
      </a>

      <!-- ─── Desktop Navigation Links ─── -->
      <ul class="navbar-links" role="list">

        <li>
          <a href="/"
             <?php if (isActivePage('home')): ?>aria-current="page" class="active"<?php endif; ?>>
            Home
          </a>
        </li>

        <!-- Services with mega dropdown -->
        <li class="has-dropdown">
          <a href="/services/"
             id="services-nav-btn"
             aria-haspopup="true"
             aria-expanded="false"
             <?php if (isActivePage('services')): ?>aria-current="page" class="active"<?php endif; ?>>
            Services
            <svg class="nav-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
          </a>

          <!-- Mega Dropdown (CSS :hover triggered) -->
          <div class="mega-dropdown" role="region" aria-labelledby="services-nav-btn">
            <div class="mega-dropdown-inner">
              <?php foreach ($serviceGroups as $group): ?>
              <div class="mega-col">
                <a href="/services/<?php echo htmlspecialchars($group['slug']); ?>/" class="mega-col-title">
                  <?php echo htmlspecialchars($group['name']); ?>
                </a>
                <?php if (empty($group['solo'])): ?>
                <ul class="mega-service-list" role="list">
                  <?php
                  $shown = 0;
                  $total = 0;
                  foreach ($services as $svc) {
                      if (in_array($svc['name'], $group['services'], true)) {
                          $total++;
                          if ($shown < 4) {
                              echo '<li><a href="/services/' . htmlspecialchars($svc['slug']) . '/">' . htmlspecialchars($svc['name']) . '</a></li>' . "\n";
                              $shown++;
                          }
                      }
                  }
                  if ($total > 4) {
                      echo '<li class="mega-more"><a href="/services/' . htmlspecialchars($group['slug']) . '/">+' . ($total - 4) . ' more →</a></li>' . "\n";
                  }
                  ?>
                </ul>
                <?php endif; ?>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </li>

        <li>
          <a href="/service-area/"
             <?php if (isActivePage('service-area')): ?>aria-current="page" class="active"<?php endif; ?>>
            Service Area
          </a>
        </li>

        <li>
          <a href="/about/"
             <?php if (isActivePage('about')): ?>aria-current="page" class="active"<?php endif; ?>>
            About
          </a>
        </li>

        <li>
          <a href="/contact/"
             <?php if (isActivePage('contact')): ?>aria-current="page" class="active"<?php endif; ?>>
            Contact
          </a>
        </li>

      </ul>

      <!-- ─── Desktop CTA ─── -->
      <div class="navbar-cta">
        <?php if ($phone): ?>
        <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="navbar-phone" aria-label="Call us at <?php echo htmlspecialchars(formatPhone($phone)); ?>">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.65 3.39 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.59a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          <?php echo htmlspecialchars(formatPhone($phone)); ?>
        </a>
        <?php endif; ?>
        <a href="/contact/" class="btn btn-accent btn-sm">Free Estimate</a>
      </div>

      <!-- ─── Mobile Hamburger ─── -->
      <button class="hamburger"
              id="hamburger-btn"
              aria-label="Open navigation menu"
              aria-expanded="false"
              aria-controls="mobile-menu">
        <span class="hamburger-line" aria-hidden="true"></span>
        <span class="hamburger-line" aria-hidden="true"></span>
        <span class="hamburger-line" aria-hidden="true"></span>
      </button>

    </div><!-- /.navbar-inner -->
  </nav>
</header>


<!-- ─── Mobile Full-Screen Menu ─── -->
<div class="mobile-menu"
     id="mobile-menu"
     aria-hidden="true"
     role="dialog"
     aria-modal="true"
     aria-label="Navigation menu">

  <button class="mobile-menu-close"
          id="mobile-menu-close"
          aria-label="Close navigation menu">
    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
  </button>

  <div class="mobile-menu-inner">

    <nav aria-label="Mobile navigation">
      <ul class="mobile-nav-links" role="list">

        <li>
          <a href="/" <?php if (isActivePage('home')): ?>aria-current="page"<?php endif; ?>>
            Home
          </a>
        </li>

        <!-- Services accordion -->
        <li class="mobile-has-submenu">
          <button class="mobile-submenu-toggle" aria-expanded="false">
            Services
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <ul class="mobile-submenu" role="list">
            <?php foreach ($serviceGroups as $group): ?>
            <li>
              <a href="/services/<?php echo htmlspecialchars($group['slug']); ?>/">
                <?php echo htmlspecialchars($group['name']); ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </li>

        <li>
          <a href="/service-area/" <?php if (isActivePage('service-area')): ?>aria-current="page"<?php endif; ?>>
            Service Area
          </a>
        </li>

        <li>
          <a href="/about/" <?php if (isActivePage('about')): ?>aria-current="page"<?php endif; ?>>
            About
          </a>
        </li>

        <li>
          <a href="/contact/" <?php if (isActivePage('contact')): ?>aria-current="page"<?php endif; ?>>
            Contact
          </a>
        </li>

      </ul>
    </nav>

    <div class="mobile-menu-cta">
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="btn btn-outline-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.65 3.39 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.59a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <?php echo htmlspecialchars(formatPhone($phone)); ?>
      </a>
      <?php endif; ?>
      <a href="/contact/" class="btn btn-accent">Get Free Estimate</a>
    </div>

  </div><!-- /.mobile-menu-inner -->
</div><!-- /.mobile-menu -->

<!-- Overlay behind mobile menu -->
<div class="mobile-menu-overlay" id="mobile-menu-overlay" aria-hidden="true"></div>


<!-- ─── Main Content Opens Here ─── -->
<main id="main-content">
