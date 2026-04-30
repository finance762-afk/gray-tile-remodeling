<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Remodeling Services in Bowdon, GA | Gray Tile & Remodeling';
$pageDescription = 'Browse all tile installation and remodeling services from Gray Tile & Remodeling in Bowdon, GA — kitchen, bathroom, flooring, basement, and more.';
$canonicalUrl    = $siteUrl . '/services/';
$ogImage         = $clientPhotos['gallery01'];
$currentPage     = 'services';

// BreadcrumbList + ItemList schema
$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'           => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services/'],
            ],
        ],
        [
            '@type'           => 'ItemList',
            'name'            => 'Gray Tile & Remodeling Service Groups',
            'numberOfItems'   => count($serviceGroups),
            'itemListElement' => array_map(function($group, $idx) use ($siteUrl) {
                return [
                    '@type'    => 'ListItem',
                    'position' => $idx + 1,
                    'name'     => $group['name'],
                    'url'      => $siteUrl . '/services/' . $group['slug'] . '/',
                ];
            }, $serviceGroups, array_keys($serviceGroups)),
        ],
        [
            '@type'           => 'HomeAndConstructionBusiness',
            'name'            => $siteName,
            'url'             => $siteUrl,
            'aggregateRating' => getAggregateRatingSchema(),
        ],
        [
            '@type'      => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name'  => 'What remodeling services does Gray Tile offer in Bowdon, GA?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Gray Tile & Remodeling offers 25 services across kitchen remodeling, bathroom remodeling, flooring installation, basement finishing, garage conversion, framing, home restoration, and design-build project management throughout Bowdon and Carroll County.'],
                ],
                [
                    '@type' => 'Question',
                    'name'  => 'Do you handle both tile work and full remodeling projects?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. Gray Tile specializes in tile installation — showers, floors, backsplashes — and offers complete remodeling services including structural framing, flooring, and full design-build project management so homeowners work with one team from start to finish.'],
                ],
                [
                    '@type' => 'Question',
                    'name'  => 'How far from Bowdon do you serve?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'We serve Bowdon and surrounding Carroll County communities including Carrollton, Villa Rica, Bremen, and Temple, as well as areas throughout West Georgia within approximately 50 miles of our Bowdon location.'],
                ],
            ],
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   SERVICES/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.svc-index-hero {
  position: relative;
  min-height: 50vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['gallery01']; ?>');
  background-size: cover;
  background-position: center 35%;
  background-repeat: no-repeat;
}
.svc-index-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    135deg,
    rgba(var(--color-primary-rgb), 0.88) 0%,
    rgba(var(--color-primary-dark-rgb), 0.72) 60%,
    rgba(var(--color-accent-rgb), 0.18) 100%
  );
  z-index: 1;
}
.svc-index-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04;
  z-index: 2;
  pointer-events: none;
}
.svc-index-hero .hero-content {
  position: relative;
  z-index: 3;
  padding: var(--space-4xl) 0 var(--space-3xl);
  text-align: center;
}
.svc-index-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.9) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.svc-index-hero .hero-subhead {
  color: rgba(255,255,255,0.88);
  font-size: clamp(1rem, 2vw, 1.25rem);
  max-width: 60ch;
  margin: 0 auto var(--space-2xl);
  font-family: var(--font-body);
  line-height: 1.6;
}
.svc-index-hero .hero-cta-group {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── Breadcrumb ───────────────────────────────────────────────── */
.breadcrumb-bar {
  background: var(--color-bg-alt);
  padding: var(--space-md) 0;
  border-bottom: 1px solid var(--color-gray-light);
}
.breadcrumb-nav {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: 0.875rem;
  color: var(--color-text-light);
  flex-wrap: wrap;
}
.breadcrumb-nav a {
  color: var(--color-accent);
  font-weight: 500;
}
.breadcrumb-nav a:hover {
  color: var(--color-primary);
}
.breadcrumb-sep {
  color: var(--color-gray);
  font-size: 0.75rem;
}
.breadcrumb-current {
  color: var(--color-text);
  font-weight: 600;
}

/* ── Section Divider: Diagonal Down ──────────────────────────── */
.divider-diagonal-down {
  width: 100%;
  overflow: hidden;
  line-height: 0;
  margin-bottom: -1px;
}
.divider-diagonal-down svg {
  display: block;
  width: 100%;
  height: 60px;
}

/* ── Section Divider: Wave ────────────────────────────────────── */
.divider-wave {
  width: 100%;
  overflow: hidden;
  line-height: 0;
  margin-bottom: -1px;
}
.divider-wave svg {
  display: block;
  width: 100%;
  height: 60px;
}

/* ── Section Divider: Diagonal Up ────────────────────────────── */
.divider-diagonal-up {
  width: 100%;
  overflow: hidden;
  line-height: 0;
  margin-bottom: -1px;
}
.divider-diagonal-up svg {
  display: block;
  width: 100%;
  height: 60px;
}

/* ── Service Groups Grid (index page) ────────────────────────── */
.svc-groups-section {
  padding: var(--section-pad);
  background: var(--color-bg);
}
@media (max-width: 767px) {
  .svc-groups-section { padding: var(--section-pad-mobile); }
}
.section-header-centered {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.eyebrow-label {
  display: inline-block;
  font-family: var(--font-heading);
  font-size: 0.78rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.12em;
  color: var(--color-accent);
  background: rgba(var(--color-accent-rgb), 0.1);
  padding: var(--space-xs) var(--space-md);
  border-radius: var(--radius-full);
  margin-bottom: var(--space-md);
}
.section-title-text {
  font-family: var(--font-heading);
  margin-bottom: var(--space-md);
  text-wrap: balance;
}
.text-accent {
  color: var(--color-accent);
  -webkit-text-fill-color: var(--color-accent);
}
.section-subtitle-text {
  color: var(--color-text-light);
  font-size: 1.05rem;
  max-width: 55ch;
  margin: 0 auto;
}

/* ── Complete Services Editorial Listing ─────────────────────── */
.all-services-section {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
@media (max-width: 767px) {
  .all-services-section { padding: var(--section-pad-mobile); }
}
.all-services-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-2xl);
  margin-top: var(--space-2xl);
}
@media (max-width: 1023px) {
  .all-services-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 599px) {
  .all-services-grid { grid-template-columns: 1fr; }
}
.service-category-block {
  background: var(--color-bg);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  box-shadow: var(--shadow-card);
  border-top: 3px solid var(--color-accent);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.service-category-block:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}
.service-category-block h3 {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  color: var(--color-primary);
  margin-bottom: var(--space-md);
  padding-bottom: var(--space-sm);
  border-bottom: 1px solid var(--color-gray-light);
}
.service-category-block ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-xs);
}
.service-category-block li {
  font-size: 0.93rem;
  color: var(--color-text);
}
.service-category-block li a {
  color: var(--color-text);
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  padding: var(--space-xs) 0;
  transition: color var(--transition-fast), padding-left var(--transition-fast);
}
.service-category-block li a::before {
  content: '→';
  color: var(--color-accent);
  font-size: 0.8rem;
  flex-shrink: 0;
  transition: transform var(--transition-fast);
}
.service-category-block li a:hover {
  color: var(--color-accent);
  padding-left: var(--space-xs);
}
.service-category-block li a:hover::before {
  transform: translateX(3px);
}
.service-category-block .view-all-link {
  display: inline-flex;
  align-items: center;
  gap: var(--space-xs);
  margin-top: var(--space-md);
  font-size: 0.85rem;
  font-weight: 700;
  font-family: var(--font-heading);
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--color-accent);
  padding-top: var(--space-sm);
  border-top: 1px solid var(--color-gray-light);
  width: 100%;
}
.service-category-block .view-all-link:hover {
  color: var(--color-primary);
}

/* ── Why Gray Tile Section ─────────────────────────────────────── */
.why-gray-tile-section {
  padding: var(--section-pad);
  background: var(--color-primary);
  position: relative;
  overflow: hidden;
}
@media (max-width: 767px) {
  .why-gray-tile-section { padding: var(--section-pad-mobile); }
}
.why-gray-tile-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06;
  pointer-events: none;
}
.why-gray-tile-section .eyebrow-label {
  background: rgba(var(--color-accent-rgb), 0.2);
  color: var(--color-accent);
}
.why-gray-tile-section h2 {
  color: var(--color-white);
}
.why-gray-tile-section .section-subtitle-text {
  color: rgba(255,255,255,0.75);
}
.differentiators-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl);
  margin-top: var(--space-2xl);
}
@media (max-width: 1023px) {
  .differentiators-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 599px) {
  .differentiators-grid { grid-template-columns: 1fr; }
}
.diff-card {
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg);
  text-align: center;
  transition: background var(--transition-base), transform var(--transition-base);
  position: relative;
}
.diff-card:hover {
  background: rgba(255,255,255,0.1);
  transform: translateY(-4px);
}
.diff-card-icon {
  width: 60px;
  height: 60px;
  background: rgba(var(--color-accent-rgb), 0.18);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-lg);
  color: var(--color-accent);
}
.diff-card h3 {
  color: var(--color-white);
  font-size: 1.1rem;
  margin-bottom: var(--space-sm);
  text-wrap: balance;
}
.diff-card p {
  color: rgba(255,255,255,0.72);
  font-size: 0.93rem;
  line-height: 1.55;
  margin: 0;
}

/* ── Mid-page CTA Banner ──────────────────────────────────────── */
.cta-banner-section {
  padding: var(--space-4xl) var(--space-xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative;
  overflow: hidden;
  text-align: center;
}
.cta-banner-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06;
  pointer-events: none;
}
.cta-banner-section .container {
  position: relative;
  z-index: 1;
}
.cta-banner-section h2 {
  color: var(--color-white);
  margin-bottom: var(--space-md);
  text-wrap: balance;
}
.cta-banner-section p {
  color: rgba(255,255,255,0.8);
  font-size: 1.1rem;
  max-width: 55ch;
  margin: 0 auto var(--space-2xl);
}
.cta-banner-phone {
  display: block;
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 3vw, 2.4rem);
  font-weight: 700;
  color: var(--color-accent);
  margin-bottom: var(--space-xl);
  letter-spacing: 0.02em;
  text-decoration: none;
}
.cta-banner-phone:hover {
  color: var(--color-white);
}
.cta-btn-group {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── FAQ Section ──────────────────────────────────────────────── */
.faq-section {
  padding: var(--section-pad);
  background: var(--color-bg);
}
@media (max-width: 767px) {
  .faq-section { padding: var(--section-pad-mobile); }
}
.faq-list {
  max-width: 800px;
  margin: var(--space-2xl) auto 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.faq-item {
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-md);
  overflow: hidden;
  transition: box-shadow var(--transition-base);
}
.faq-item:hover {
  box-shadow: var(--shadow-md);
}
.faq-question {
  width: 100%;
  background: var(--color-bg);
  border: none;
  text-align: left;
  padding: var(--space-lg) var(--space-xl);
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--color-primary);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: var(--space-md);
  transition: background var(--transition-fast), color var(--transition-fast);
}
.faq-question:hover {
  background: var(--color-bg-alt);
  color: var(--color-accent);
}
.faq-question[aria-expanded="true"] {
  background: var(--color-primary);
  color: var(--color-white);
}
.faq-icon {
  flex-shrink: 0;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  border: 2px solid currentColor;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform var(--transition-base);
  font-size: 1rem;
  line-height: 1;
}
.faq-question[aria-expanded="true"] .faq-icon {
  transform: rotate(45deg);
}
.faq-answer {
  display: none;
  padding: 0 var(--space-xl) var(--space-lg);
  background: var(--color-bg);
  color: var(--color-text);
  font-size: 0.97rem;
  line-height: 1.7;
  border-top: 1px solid var(--color-gray-light);
}
.faq-answer.is-open {
  display: block;
}

/* ── Closing CTA ──────────────────────────────────────────────── */
.closing-cta-section {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
  text-align: center;
}
@media (max-width: 767px) {
  .closing-cta-section { padding: var(--section-pad-mobile); }
}
.closing-cta-section h2 {
  color: var(--color-primary);
  margin-bottom: var(--space-md);
  text-wrap: balance;
}
.closing-cta-section p {
  color: var(--color-text-light);
  max-width: 55ch;
  margin: 0 auto var(--space-2xl);
}
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="svc-index-hero" aria-label="Services overview hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">All Remodeling Services in Bowdon, GA</h1>
      <p class="hero-subhead prose-centered" data-animate="fade-up">
        25 years of West Georgia craftsmanship. One team that handles tile installation,
        complete remodels, structural framing, and everything between — so your project
        never stalls waiting on the next subcontractor.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Estimate</a>
        <a href="#service-groups" class="btn btn-outline-white btn-lg">Browse All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="breadcrumb-bar" aria-label="Breadcrumb navigation">
    <div class="container">
      <nav class="breadcrumb-nav" aria-label="You are here">
        <a href="/">Home</a>
        <span class="breadcrumb-sep" aria-hidden="true">›</span>
        <span class="breadcrumb-current" aria-current="page">Services</span>
      </nav>
    </div>
  </div>

  <!-- ══ SERVICE GROUPS GRID ═══════════════════════════════════ -->
  <section class="svc-groups-section" id="service-groups" aria-label="Service groups">
    <div class="container">
      <div class="section-header-centered" data-animate="fade-up">
        <span class="eyebrow-label">What We Do</span>
        <h2 class="section-title-text">8 Service Groups. <span class="text-accent">One Standard.</span></h2>
        <p class="section-subtitle-text prose-centered">
          From targeted tile upgrades to whole-home transformations — every project in
          Carroll County and West Georgia gets the same level of detail and care.
        </p>
      </div>

      <div class="services-grid">

        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1" data-animate="fade-up">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['gallery01']; ?>" alt="Kitchen and bathroom remodeling services in Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hammer"></i></div>
            <h3>Remodeling Services</h3>
            <p class="service-card__desc">Full-scope kitchen, bathroom, attic, and basement remodeling throughout Carroll County.</p>
            <ul>
              <li>Kitchens &amp; bathrooms</li>
              <li>Attic &amp; basement finishing</li>
              <li>Eco-friendly options available</li>
            </ul>
            <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2" data-animate="fade-up">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['gallery02']; ?>" alt="Custom tile showers and flooring installation Bowdon Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Flooring Services</h3>
            <p class="service-card__desc">Custom tile showers, LVP, hardwood sanding, and subfloor repair from the ground up.</p>
            <ul>
              <li>Custom tile showers</li>
              <li>LVP &amp; hardwood refinishing</li>
              <li>Subfloor replacement</li>
            </ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3" data-animate="fade-up">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['gallery03']; ?>" alt="Seasonal plumbing electrical and HVAC services West Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="wrench"></i></div>
            <h3>Seasonal Services</h3>
            <p class="service-card__desc">Plumbing, electrical, and HVAC work coordinated alongside your remodeling project.</p>
            <ul>
              <li>Plumbing installation</li>
              <li>Electrical rough-in &amp; finish</li>
              <li>HVAC system integration</li>
            </ul>
            <a href="/services/seasonal-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1" data-animate="fade-up">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['gallery04']; ?>" alt="Design-build remodeling single team Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="pencil-ruler"></i></div>
            <h3>Design-Build Remodeling</h3>
            <p class="service-card__desc">One team manages design and construction — no miscommunication, no scheduling gaps.</p>
            <ul>
              <li>Concept through completion</li>
              <li>Fixed-scope estimates</li>
              <li>Faster project timelines</li>
            </ul>
            <a href="/services/design-build-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2" data-animate="fade-up">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo12']; ?>" alt="Historic home restoration Carroll County Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="home"></i></div>
            <h3>Home Restoration</h3>
            <p class="service-card__desc">Bringing Bowdon's older homes back to life — matching original character with modern standards.</p>
            <ul>
              <li>Historic material matching</li>
              <li>Water damage remediation</li>
              <li>Structural updates</li>
            </ul>
            <a href="/services/home-restoration/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3" data-animate="fade-up">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo14']; ?>" alt="Garage conversion to living space Bowdon Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="door-open"></i></div>
            <h3>Garage Conversion</h3>
            <p class="service-card__desc">Convert your garage into a bedroom, office, or living space — cost-effective square footage.</p>
            <ul>
              <li>Full insulation &amp; framing</li>
              <li>Flooring &amp; electrical</li>
              <li>Permit-ready documentation</li>
            </ul>
            <a href="/services/garage-conversion/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1" data-animate="fade-up">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo05']; ?>" alt="Targeted home upgrades tile backsplash and flooring Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="sparkles"></i></div>
            <h3>Home Upgrades</h3>
            <p class="service-card__desc">Targeted updates that transform a room — tile backsplashes, flooring, fixtures in 3–7 days.</p>
            <ul>
              <li>Tile backsplashes &amp; floors</li>
              <li>Countertop replacement</li>
              <li>Most upgrades in under a week</li>
            </ul>
            <a href="/services/home-upgrades/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2" data-animate="fade-up">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo07']; ?>" alt="Residential framing contractor Carroll County West Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hard-hat"></i></div>
            <h3>Framing Contractor</h3>
            <p class="service-card__desc">Structural framing for additions, remodels, and new construction throughout Bowdon and Carroll County.</p>
            <ul>
              <li>Load-bearing wall work</li>
              <li>Room additions &amp; new construction</li>
              <li>Code-compliant rough-ins</li>
            </ul>
            <a href="/services/framing-contractor/" class="service-card__cta">Learn more</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="divider-diagonal-down" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ ALL SERVICES EDITORIAL LISTING ════════════════════════ -->
  <section class="all-services-section" aria-label="Complete services listing">
    <div class="container">
      <div class="section-header-centered" data-animate="fade-up">
        <span class="eyebrow-label">Full Catalog</span>
        <h2 class="section-title-text">All 25 Services — <span class="text-accent">Organized by Category</span></h2>
        <p class="section-subtitle-text prose-centered">
          Every service Gray Tile offers in Bowdon, Carroll County, and surrounding West Georgia communities.
        </p>
      </div>

      <div class="all-services-grid">

        <div class="service-category-block" data-animate="fade-up">
          <h3>Remodeling</h3>
          <ul>
            <li><a href="/services/remodeling-services/">Kitchen Remodeling</a></li>
            <li><a href="/services/remodeling-services/">Bathroom Remodeling</a></li>
            <li><a href="/services/remodeling-services/">Basement Finishing</a></li>
            <li><a href="/services/remodeling-services/">Basement Kitchen Remodeling</a></li>
            <li><a href="/services/remodeling-services/">Attic Remodeling</a></li>
            <li><a href="/services/remodeling-services/">Full Home Remodel</a></li>
          </ul>
          <a href="/services/remodeling-services/" class="view-all-link">See all remodeling →</a>
        </div>

        <div class="service-category-block" data-animate="fade-up">
          <h3>Flooring</h3>
          <ul>
            <li><a href="/services/flooring-services/">Custom Tile Showers</a></li>
            <li><a href="/services/flooring-services/">Flooring Installation</a></li>
            <li><a href="/services/flooring-services/">LVP Flooring</a></li>
            <li><a href="/services/flooring-services/">Sanded Finish Flooring</a></li>
            <li><a href="/services/flooring-services/">Open Floor Plan Remodeling</a></li>
            <li><a href="/services/flooring-services/">Subfloor Replacement</a></li>
          </ul>
          <a href="/services/flooring-services/" class="view-all-link">See all flooring →</a>
        </div>

        <div class="service-category-block" data-animate="fade-up">
          <h3>Systems &amp; Seasonal</h3>
          <ul>
            <li><a href="/services/seasonal-services/">Plumbing Services</a></li>
            <li><a href="/services/seasonal-services/">Electrical Services</a></li>
            <li><a href="/services/seasonal-services/">HVAC Services</a></li>
          </ul>
          <h3 style="margin-top:var(--space-lg);">Additions &amp; Expansions</h3>
          <ul>
            <li><a href="/services/remodeling-services/">Room Additions</a></li>
            <li><a href="/services/remodeling-services/">Home Additions</a></li>
            <li><a href="/services/remodeling-services/">Custom Remodeling</a></li>
          </ul>
        </div>

        <div class="service-category-block" data-animate="fade-up">
          <h3>Specialized Services</h3>
          <ul>
            <li><a href="/services/design-build-remodeling/">Design-Build Remodeling</a></li>
            <li><a href="/services/home-restoration/">Home Restoration</a></li>
            <li><a href="/services/garage-conversion/">Garage Conversion</a></li>
            <li><a href="/services/home-upgrades/">Home Upgrades</a></li>
            <li><a href="/services/framing-contractor/">Framing Contractor</a></li>
            <li><a href="/services/remodeling-services/">Structural Renovation</a></li>
            <li><a href="/services/remodeling-services/">Eco-Friendly Remodeling</a></li>
          </ul>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="divider-wave" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,30 C300,60 900,0 1200,30 L1200,60 L0,60 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ WHY GRAY TILE ══════════════════════════════════════════ -->
  <section class="why-gray-tile-section" aria-label="Why choose Gray Tile">
    <div class="container">
      <div class="section-header-centered" data-animate="fade-up">
        <span class="eyebrow-label">The Difference</span>
        <h2 class="section-title-text">Why Bowdon Homeowners <span class="text-accent">Choose Gray Tile</span></h2>
        <p class="section-subtitle-text prose-centered">
          25 years in West Georgia teaches you what works — and what local homeowners
          actually need from a remodeling contractor.
        </p>
      </div>

      <div class="differentiators-grid">
        <div class="diff-card" data-animate="fade-up">
          <div class="diff-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
          </div>
          <h3>25 Years in Carroll County</h3>
          <p>We know Bowdon homes — the age of the construction, local building codes, and what materials hold up in West Georgia's climate.</p>
        </div>

        <div class="diff-card" data-animate="fade-up">
          <div class="diff-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <h3>Honest Project Timelines</h3>
          <p>You get a realistic schedule before work begins — not an optimistic number that slips two weeks in. Most tile upgrades complete in 3–7 days.</p>
        </div>

        <div class="diff-card" data-animate="fade-up">
          <div class="diff-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          </div>
          <h3>Fixed-Scope Estimates</h3>
          <p>Your estimate outlines exactly what's included. No surprise line items at completion. If scope changes, we talk first — always.</p>
        </div>

        <div class="diff-card" data-animate="fade-up">
          <div class="diff-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <h3>One Point of Contact</h3>
          <p>From first call to final walkthrough, you work with the same team — no handoffs, no gaps in communication mid-project.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="divider-diagonal-up" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,60 1200,0 1200,60" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,60" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA BANNER ════════════════════════════════════ -->
  <section class="cta-banner-section" aria-label="Request a free estimate">
    <div class="container">
      <h2 data-animate="fade-up">Not Sure Which Service You Need?</h2>
      <p class="prose-centered" data-animate="fade-up">
        Describe what you want to change — kitchen, bathroom, floors, structural, or something else.
        We'll come out to Bowdon, look at your space, and give you a clear estimate at no charge.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="cta-banner-phone" data-animate="fade-up">
        <?php echo htmlspecialchars(formatPhone($phone)); ?>
      </a>
      <?php endif; ?>
      <div class="cta-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Schedule Free Estimate</a>
        <a href="/about/" class="btn btn-outline-white btn-lg">Meet the Team</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="faq-section" aria-labelledby="faq-heading">
    <div class="container">
      <div class="section-header-centered" data-animate="fade-up">
        <span class="eyebrow-label">Common Questions</span>
        <h2 class="section-title-text" id="faq-heading">Answers About Our <span class="text-accent">Services</span></h2>
      </div>

      <div class="faq-list" role="list">

        <div class="faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-1">
            What remodeling services does Gray Tile offer in Bowdon, GA?
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="faq-answer-1" role="region">
            <p>Gray Tile offers 25 services across kitchen remodeling, bathroom remodeling, flooring installation, basement finishing, garage conversion, framing, home restoration, and design-build project management. Every service is available throughout Bowdon, Carroll County, and surrounding West Georgia communities.</p>
          </div>
        </div>

        <div class="faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-2">
            Do you handle both tile work and full remodeling projects?
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="faq-answer-2" role="region">
            <p>Yes. Gray Tile specializes in tile installation — custom showers, floors, backsplashes, and accent walls — and offers complete remodeling services including structural framing, LVP and hardwood flooring, and full design-build project management. You work with one team from concept through final walkthrough.</p>
          </div>
        </div>

        <div class="faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-3">
            How far from Bowdon do you serve?
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="faq-answer-3" role="region">
            <p>We serve Bowdon and surrounding Carroll County communities — Carrollton, Villa Rica, Bremen, Temple, and Whitesburg — as well as areas throughout West Georgia within approximately 50 miles. Contact us to confirm availability for your specific location.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="divider-diagonal-down" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="closing-cta-section" aria-label="Closing call to action">
    <div class="container">
      <div data-animate="fade-up">
        <span class="eyebrow-label">Start Your Project</span>
        <h2>Ready to Get Started in Bowdon?</h2>
        <p class="prose-centered">
          Free estimates, honest scopes, and a team that shows up when they say they will.
          Serving Bowdon and Carroll County for 25 years.
        </p>
        <div class="cta-btn-group">
          <a href="/contact/" class="btn btn-primary btn-lg">Get Your Free Estimate</a>
          <a href="/about/" class="btn btn-accent btn-lg">About Gray Tile</a>
        </div>
      </div>
    </div>
  </section>

</main>

<script>
// FAQ Accordion
document.querySelectorAll('.faq-question').forEach(function(btn) {
  btn.addEventListener('click', function() {
    var expanded = this.getAttribute('aria-expanded') === 'true';
    var answerId = this.getAttribute('aria-controls');
    var answer   = document.getElementById(answerId);
    this.setAttribute('aria-expanded', String(!expanded));
    if (answer) answer.classList.toggle('is-open', !expanded);
  });
});
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
