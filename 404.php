<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Page Not Found | Gray Tile & Remodeling';
$pageDescription = 'The page you are looking for cannot be found. Return to Gray Tile & Remodeling to explore our remodeling and tile services in Bowdon, GA.';
$canonicalUrl    = $siteUrl . '/404';
$currentPage     = '404';
$noindex         = true;

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        [
            '@type'    => 'ListItem',
            'position' => 1,
            'name'     => 'Home',
            'item'     => $siteUrl . '/',
        ],
        [
            '@type'    => 'ListItem',
            'position' => 2,
            'name'     => '404 — Page Not Found',
            'item'     => $siteUrl . '/404',
        ],
    ],
], JSON_UNESCAPED_SLASHES);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ── 404 Page Styles ─────────────────────────────── */

.error-page {
  min-height: calc(100vh - var(--navbar-height));
  display: flex;
  align-items: center;
  justify-content: center;
  padding: var(--space-4xl) var(--space-lg);
  background: var(--color-bg);
  position: relative;
  overflow: hidden;
}

.error-page::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(
    ellipse 80% 60% at 50% 0%,
    rgba(var(--color-primary-rgb), 0.06) 0%,
    transparent 70%
  );
  pointer-events: none;
}

.error-page__inner {
  text-align: center;
  max-width: 640px;
  margin-inline: auto;
  position: relative;
  z-index: 1;
}

.error-number {
  font-family: var(--font-heading);
  font-size: clamp(4rem, 15vw, 10rem);
  font-weight: 800;
  line-height: 1;
  color: var(--color-accent);
  letter-spacing: -0.04em;
  margin-bottom: var(--space-md);
  display: block;
  text-shadow: 0 4px 24px rgba(var(--color-accent-rgb), 0.25);
}

.error-page h1 {
  font-family: var(--font-heading);
  font-size: clamp(1.5rem, 4vw, 2.4rem);
  font-weight: 700;
  color: var(--color-primary);
  text-wrap: balance;
  line-height: 1.2;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-md);
}

.error-page p {
  font-family: var(--font-body);
  font-size: 1.05rem;
  line-height: 1.65;
  color: var(--color-text-light);
  max-width: 52ch;
  margin-inline: auto;
  margin-bottom: var(--space-2xl);
}

.error-divider {
  width: 48px;
  height: 3px;
  background: var(--color-accent);
  border-radius: 2px;
  margin: var(--space-lg) auto;
}

/* Quick-link cards */
.error-links {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-md);
  margin-bottom: var(--space-2xl);
}

@media (max-width: 600px) {
  .error-links {
    grid-template-columns: 1fr;
    max-width: 320px;
    margin-inline: auto;
    margin-bottom: var(--space-2xl);
  }
}

.error-link-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: var(--space-sm);
  padding: var(--space-lg) var(--space-md);
  background: var(--color-bg-alt);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-md);
  text-decoration: none;
  color: var(--color-primary);
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 600;
  letter-spacing: 0.02em;
  transition: transform var(--transition-base), box-shadow var(--transition-base), border-color var(--transition-base);
}

.error-link-card:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-md);
  border-color: var(--color-accent);
  color: var(--color-accent);
}

.error-link-card svg {
  width: 28px;
  height: 28px;
  color: var(--color-accent);
  flex-shrink: 0;
  transition: transform var(--transition-base);
}

.error-link-card:hover svg {
  transform: scale(1.15) rotate(-5deg);
}

.error-cta {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  padding: 14px var(--space-xl);
  background: var(--color-primary);
  color: var(--color-white);
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  border-radius: var(--radius-md);
  text-decoration: none;
  box-shadow: 0 4px 0 var(--color-primary-dark), var(--shadow-md);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
  overflow: hidden;
  position: relative;
}

.error-cta:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 0 var(--color-primary-dark), var(--shadow-lg);
  color: var(--color-white);
}

.error-cta:active {
  transform: translateY(2px);
  box-shadow: 0 2px 0 var(--color-primary-dark), var(--shadow-md);
}
</style>

<section class="error-page" aria-labelledby="error-heading">
  <div class="error-page__inner">

    <span class="error-number" aria-hidden="true">404</span>
    <div class="error-divider" aria-hidden="true"></div>

    <h1 id="error-heading">This page has moved or doesn't exist</h1>
    <p>You might be looking for one of our remodeling services. Let us help you find what you need in Bowdon, GA.</p>

    <nav class="error-links" aria-label="Quick navigation links">

      <a href="/" class="error-link-card">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        Home
      </a>

      <a href="/services/" class="error-link-card">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
        Services
      </a>

      <a href="/contact/" class="error-link-card">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        Contact
      </a>

    </nav>

    <a href="/contact/" class="error-cta">
      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
      Get a Free Estimate
    </a>

  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
