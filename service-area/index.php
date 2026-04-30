<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Service Area | Tile & Remodeling Near Bowdon GA | Gray Tile';
$pageDescription = 'Gray Tile & Remodeling serves Bowdon, Carrollton, Villa Rica, Bremen, Temple, and communities throughout Carroll County and West Georgia. Get a free estimate near you.';
$canonicalUrl    = $siteUrl . '/service-area/';
$ogImage         = $clientPhotos['photo02'];
$currentPage     = 'service-area';

$areaFaqs = [
    [
        'q' => 'Do you charge a travel fee for jobs outside Bowdon?',
        'a' => 'We do not charge a travel fee for projects within our standard service area, which covers Carroll County and communities within approximately 50 miles of Bowdon. For jobs at the outer edge of our range — Cedartown, Dallas, or Hiram — we may discuss a small travel supplement for large projects, but this is rare and always disclosed upfront.',
    ],
    [
        'q' => 'Do you serve Atlanta suburbs like Marietta or Smyrna?',
        'a' => 'Our core service area is West Georgia and Carroll County — approximately 50 miles from our Bowdon base. Marietta and Smyrna are approximately 45–55 miles from Bowdon but are well east of our primary footprint. We focus on communities where we can provide timely, responsive service without extended drive times that add cost to every project.',
    ],
    [
        'q' => 'How do I know if you serve my city or neighborhood?',
        'a' => 'The best way is to call or submit an estimate request with your address. We\'ll confirm availability immediately. We serve most of Carroll County and the surrounding West Georgia communities without hesitation — if your address is within range, we\'ll tell you right away and get a visit scheduled.',
    ],
];

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',         'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Service Area', 'item' => $siteUrl . '/service-area/'],
            ],
        ],
        [
            '@type'       => 'HomeAndConstructionBusiness',
            'name'        => $siteName,
            'url'         => $siteUrl,
            'areaServed'  => [
                ['@type' => 'City', 'name' => 'Bowdon',       'addressRegion' => 'GA'],
                ['@type' => 'City', 'name' => 'Carrollton',   'addressRegion' => 'GA'],
                ['@type' => 'City', 'name' => 'Villa Rica',   'addressRegion' => 'GA'],
                ['@type' => 'City', 'name' => 'Bremen',        'addressRegion' => 'GA'],
                ['@type' => 'City', 'name' => 'Temple',        'addressRegion' => 'GA'],
                ['@type' => 'City', 'name' => 'Whitesburg',   'addressRegion' => 'GA'],
                ['@type' => 'City', 'name' => 'Roopville',    'addressRegion' => 'GA'],
                ['@type' => 'City', 'name' => 'Tallapoosa',   'addressRegion' => 'GA'],
                ['@type' => 'City', 'name' => 'Cedartown',    'addressRegion' => 'GA'],
                ['@type' => 'City', 'name' => 'Dallas',        'addressRegion' => 'GA'],
                ['@type' => 'City', 'name' => 'Hiram',         'addressRegion' => 'GA'],
                ['@type' => 'County', 'name' => 'Carroll County', 'addressRegion' => 'GA'],
            ],
        ],
        [
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(fn($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $areaFaqs),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

// SEO: head.php outputs <link rel="canonical"> and application/ld+json schema for this page.
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   SERVICE-AREA/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles. All values use var() tokens only.
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.area-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: flex-end;
  padding-bottom: var(--space-4xl);
  background-image: url('<?php echo htmlspecialchars($clientPhotos['photo02']); ?>');
  background-size: cover;
  background-position: center 40%;
  background-repeat: no-repeat;
  overflow: hidden;
}
.area-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    155deg,
    rgba(var(--color-primary-dark-rgb), 0.9) 0%,
    rgba(var(--color-primary-rgb), 0.6) 50%,
    rgba(var(--color-primary-dark-rgb), 0.4) 100%
  );
  z-index: 1;
}
.area-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04;
  z-index: 2;
  pointer-events: none;
}
.area-hero-content {
  position: relative;
  z-index: 3;
  width: 100%;
}
.area-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.4rem, 5.5vw, 4rem);
  font-weight: 800;
  line-height: 1.12;
  letter-spacing: -0.02em;
  text-wrap: balance;
  color: var(--color-white);
  margin-bottom: var(--space-md);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.9) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.area-hero-sub {
  font-size: clamp(1rem, 2vw, 1.18rem);
  color: rgba(255,255,255,0.85);
  max-width: 54ch;
  line-height: 1.65;
  margin-bottom: var(--space-xl);
}
.area-hero-pill-row {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-sm);
}
.area-hero-pill {
  display: inline-flex;
  align-items: center;
  gap: var(--space-xs);
  background: rgba(255,255,255,0.1);
  border: 1px solid rgba(255,255,255,0.2);
  border-radius: 100px;
  padding: 5px var(--space-md);
  font-size: 0.8rem;
  font-weight: 600;
  color: rgba(255,255,255,0.92);
  letter-spacing: 0.03em;
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
}
.area-hero-pill .dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: var(--color-accent);
  flex-shrink: 0;
}

/* ── Breadcrumb ───────────────────────────────────────────────── */
.breadcrumb-bar {
  background: var(--color-bg-alt);
  border-bottom: 1px solid var(--color-gray-light);
  padding: var(--space-sm) 0;
}
.breadcrumb {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
  font-size: 0.85rem;
  color: var(--color-text-light);
  list-style: none;
  padding: 0;
  margin: 0;
}
.breadcrumb li + li::before {
  content: '/';
  color: var(--color-text-light);
  margin-right: var(--space-xs);
  opacity: 0.5;
}
.breadcrumb a {
  color: var(--color-accent);
  text-decoration: none;
  transition: color var(--transition-base);
}
.breadcrumb a:hover { color: var(--color-primary); }
.breadcrumb [aria-current="page"] { color: var(--color-text); font-weight: 600; }

/* ── Intro Answer-First Section ───────────────────────────────── */
.area-intro-section {
  padding: var(--section-pad);
  background: var(--color-bg);
}
.area-intro-inner {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: var(--space-3xl);
  align-items: center;
}
.area-intro-text .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.area-intro-text h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-primary);
  text-wrap: balance;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-lg);
}
.area-intro-text h2 .text-accent { color: var(--color-accent); }
.area-intro-text p.prose {
  max-width: 58ch;
  line-height: 1.75;
  color: var(--color-text);
  margin-bottom: var(--space-md);
  font-size: 1.02rem;
}
.area-intro-img {
  border-radius: var(--radius-xl);
  overflow: hidden;
  aspect-ratio: 4 / 3;
  box-shadow: var(--shadow-xl);
  position: relative;
}
.area-intro-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform var(--transition-slow);
}
.area-intro-img:hover img { transform: scale(1.04); }
.area-intro-badge {
  position: absolute;
  bottom: var(--space-lg);
  right: var(--space-lg);
  background: rgba(var(--color-primary-dark-rgb), 0.88);
  border: 1px solid rgba(255,255,255,0.12);
  border-radius: var(--radius-md);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  padding: var(--space-md) var(--space-lg);
  color: var(--color-white);
  font-family: var(--font-heading);
  font-size: 0.8rem;
  font-weight: 600;
  text-align: center;
  letter-spacing: 0.04em;
}
.area-intro-badge strong {
  font-size: 1.8rem;
  color: var(--color-accent);
  display: block;
  line-height: 1;
  margin-bottom: var(--space-xs);
}

/* ── Section Divider ──────────────────────────────────────────── */
.divider-diagonal-down {
  background: var(--color-bg);
  clip-path: polygon(0 0, 100% 0, 100% 100%, 0 60%);
  height: 60px;
  margin-bottom: -2px;
}
.divider-diagonal-dark {
  background: var(--color-bg-dark);
  clip-path: polygon(0 0, 100% 40%, 100% 100%, 0 100%);
  height: 60px;
  margin-top: -2px;
  margin-bottom: -2px;
}

/* ── Primary Area (Bowdon Feature) ───────────────────────────── */
.bowdon-section {
  padding: var(--section-pad);
  background: var(--color-bg-dark);
  position: relative;
  overflow: hidden;
}
.bowdon-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse 60% 70% at 20% 50%, rgba(var(--color-accent-rgb), 0.07) 0%, transparent 70%);
  pointer-events: none;
}
.bowdon-split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: center;
}
.bowdon-img-wrap {
  position: relative;
}
.bowdon-img-frame {
  border-radius: var(--radius-xl);
  overflow: hidden;
  aspect-ratio: 3 / 4;
  box-shadow: var(--shadow-xl);
}
.bowdon-img-frame img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.bowdon-img-tag {
  position: absolute;
  top: var(--space-lg);
  left: calc(-1 * var(--space-xl));
  background: var(--color-accent);
  color: var(--color-primary);
  border-radius: var(--radius-md);
  padding: var(--space-sm) var(--space-lg);
  font-family: var(--font-heading);
  font-size: 0.82rem;
  font-weight: 800;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  box-shadow: var(--shadow-lg);
}
.bowdon-content .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.bowdon-content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-white);
  text-wrap: balance;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-lg);
}
.bowdon-content p.prose-dark {
  max-width: 55ch;
  line-height: 1.75;
  color: rgba(255,255,255,0.8);
  margin-bottom: var(--space-md);
  font-size: 1.01rem;
}
.bowdon-features {
  list-style: none;
  padding: 0;
  margin: var(--space-lg) 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
}
.bowdon-features li {
  display: flex;
  align-items: center;
  gap: var(--space-md);
  font-size: 0.95rem;
  color: rgba(255,255,255,0.9);
}
.bowdon-features li::before {
  content: '';
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: var(--color-accent);
  flex-shrink: 0;
}

/* ── Service Area Cards Grid ──────────────────────────────────── */
.areas-grid-section {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
.areas-grid-section .section-heading-group {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.areas-grid-section .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.areas-grid-section h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-primary);
  text-wrap: balance;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-sm);
}
.areas-grid-section .section-sub {
  max-width: 52ch;
  margin: 0 auto;
  color: var(--color-text-light);
  line-height: 1.65;
}
.area-cards-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-md);
}
.area-card {
  background: var(--color-bg);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg);
  transition: transform var(--transition-base), box-shadow var(--transition-base), border-color var(--transition-base);
  position: relative;
  overflow: hidden;
}
.area-card::before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
  transform: scaleX(0);
  transform-origin: left;
  transition: transform var(--transition-base);
}
.area-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
  border-color: rgba(var(--color-accent-rgb), 0.3);
}
.area-card:hover::before { transform: scaleX(1); }
.area-card-location {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  margin-bottom: var(--space-sm);
}
.area-card-dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: var(--color-accent);
  flex-shrink: 0;
}
.area-card h3 {
  font-family: var(--font-heading);
  font-size: 1.2rem;
  font-weight: 700;
  color: var(--color-primary);
  letter-spacing: -0.01em;
  text-wrap: balance;
}
.area-card-county {
  font-size: 0.78rem;
  font-weight: 600;
  color: var(--color-accent);
  letter-spacing: 0.08em;
  text-transform: uppercase;
  margin-bottom: var(--space-sm);
}
.area-card-desc {
  font-size: 0.9rem;
  color: var(--color-text-light);
  line-height: 1.6;
}
.area-card-cta {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  margin-top: var(--space-md);
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--color-accent);
  text-decoration: none;
  transition: color var(--transition-base);
}
.area-card-cta:hover { color: var(--color-primary); }

/* ── Map Placeholder ──────────────────────────────────────────── */
.area-map-section {
  padding: var(--space-4xl) var(--space-lg);
  background: var(--color-bg);
}
.map-styled-placeholder {
  height: 300px;
  background: var(--color-bg-alt);
  border: 2px dashed var(--color-gray-light);
  border-radius: var(--radius-xl);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: var(--space-md);
  color: var(--color-text-light);
  text-align: center;
  padding: var(--space-2xl);
  position: relative;
  overflow: hidden;
}
.map-styled-placeholder::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at 40% 50%, rgba(var(--color-accent-rgb), 0.04) 0%, transparent 60%);
  pointer-events: none;
}
.map-styled-placeholder svg {
  width: 48px;
  height: 48px;
  stroke: var(--color-accent);
  opacity: 0.35;
}
.map-styled-placeholder h3 {
  font-family: var(--font-heading);
  font-size: 1.2rem;
  font-weight: 700;
  color: var(--color-primary);
  text-wrap: balance;
}
.map-styled-placeholder p {
  font-size: 0.9rem;
  color: var(--color-text-light);
  max-width: 44ch;
  line-height: 1.6;
}

/* ── Mid-Page CTA Banner ──────────────────────────────────────── */
.area-cta-banner {
  position: relative;
  padding: var(--space-4xl) var(--space-lg);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  overflow: hidden;
  text-align: center;
  clip-path: polygon(0 8%, 100% 0, 100% 92%, 0 100%);
  padding-top: calc(var(--space-4xl) + 40px);
  padding-bottom: calc(var(--space-4xl) + 40px);
}
.area-cta-banner::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.05;
  pointer-events: none;
}
.area-cta-banner::after {
  content: '';
  position: absolute;
  bottom: -20%;
  left: -5%;
  width: 400px;
  height: 400px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(var(--color-accent-rgb), 0.1) 0%, transparent 70%);
  pointer-events: none;
}
.area-cta-banner .eyebrow-label {
  display: inline-block;
  position: relative;
  z-index: 1;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-md);
}
.area-cta-banner h2 {
  position: relative;
  z-index: 1;
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.8rem);
  font-weight: 800;
  color: var(--color-white);
  text-wrap: balance;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-md);
}
.area-cta-banner p {
  position: relative;
  z-index: 1;
  color: rgba(255,255,255,0.82);
  max-width: 52ch;
  margin: 0 auto var(--space-xl);
  line-height: 1.65;
  font-size: 1.05rem;
}
.area-cta-banner .btn-group {
  position: relative;
  z-index: 1;
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── Buttons ──────────────────────────────────────────────────── */
.btn-cta-primary {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: var(--color-accent);
  color: var(--color-primary);
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  padding: var(--space-md) var(--space-xl);
  border-radius: var(--radius-md);
  box-shadow: 0 4px 0 rgba(var(--color-primary-dark-rgb), 0.4);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
  text-decoration: none;
}
.btn-cta-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 0 rgba(var(--color-primary-dark-rgb), 0.4);
}
.btn-cta-primary:active {
  transform: translateY(2px);
  box-shadow: 0 2px 0 rgba(var(--color-primary-dark-rgb), 0.4);
}
.btn-cta-secondary {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: transparent;
  color: var(--color-white);
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  padding: var(--space-md) var(--space-xl);
  border-radius: var(--radius-md);
  border: 2px solid rgba(255,255,255,0.35);
  transition: border-color var(--transition-base), background var(--transition-base);
  text-decoration: none;
}
.btn-cta-secondary:hover {
  border-color: rgba(255,255,255,0.7);
  background: rgba(255,255,255,0.06);
}

/* ── Why Local Matters ────────────────────────────────────────── */
.local-matters-section {
  padding: var(--section-pad);
  background: var(--color-bg);
}
.local-matters-inner {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: start;
}
.local-matters-text .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.local-matters-text h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-primary);
  text-wrap: balance;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-lg);
}
.local-matters-text p.prose {
  max-width: 58ch;
  line-height: 1.75;
  color: var(--color-text);
  margin-bottom: var(--space-md);
  font-size: 1.01rem;
}
.local-advantages {
  display: flex;
  flex-direction: column;
  gap: var(--space-lg);
}
.local-advantage-item {
  display: flex;
  gap: var(--space-md);
  align-items: flex-start;
}
.local-advantage-num {
  flex-shrink: 0;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: var(--color-primary);
  color: var(--color-accent);
  font-family: var(--font-heading);
  font-size: 1.1rem;
  font-weight: 800;
  display: flex;
  align-items: center;
  justify-content: center;
}
.local-advantage-item h3 {
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--color-primary);
  text-wrap: balance;
  margin-bottom: var(--space-xs);
}
.local-advantage-item p {
  font-size: 0.9rem;
  color: var(--color-text-light);
  line-height: 1.65;
  max-width: 38ch;
}

/* ── FAQ Section ──────────────────────────────────────────────── */
.area-faq-section {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
.area-faq-section .section-heading-group {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.area-faq-section .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.area-faq-section h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-primary);
  text-wrap: balance;
  letter-spacing: -0.02em;
}
.faq-list {
  max-width: 780px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.faq-item {
  background: var(--color-bg);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-md);
  overflow: hidden;
}
.faq-question {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: var(--space-lg) var(--space-xl);
  cursor: pointer;
  font-family: var(--font-heading);
  font-size: 1.08rem;
  font-weight: 700;
  color: var(--color-primary);
  transition: color var(--transition-base);
  list-style: none;
  gap: var(--space-lg);
}
.faq-question:hover { color: var(--color-accent); }
.faq-question::after {
  content: '+';
  flex-shrink: 0;
  font-size: 1.4rem;
  color: var(--color-accent);
  font-weight: 400;
  transition: transform var(--transition-base);
}
details[open] .faq-question::after {
  transform: rotate(45deg);
}
.faq-answer {
  padding: 0 var(--space-xl) var(--space-lg);
  font-size: 0.96rem;
  color: var(--color-text-light);
  line-height: 1.7;
  max-width: 65ch;
}

/* ── Closing CTA ──────────────────────────────────────────────── */
.area-closing-cta {
  padding: var(--section-pad);
  background: var(--color-bg-dark);
  position: relative;
  overflow: hidden;
  text-align: center;
  clip-path: polygon(0 6%, 100% 0, 100% 100%, 0 100%);
  padding-top: calc(var(--space-4xl) + 40px);
}
.area-closing-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse 60% 70% at 60% 50%, rgba(var(--color-accent-rgb), 0.07) 0%, transparent 70%);
  pointer-events: none;
}
.area-closing-cta .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-md);
  position: relative;
  z-index: 1;
}
.area-closing-cta h2 {
  position: relative;
  z-index: 1;
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.8rem);
  font-weight: 800;
  color: var(--color-white);
  text-wrap: balance;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-md);
}
.area-closing-cta p {
  position: relative;
  z-index: 1;
  color: rgba(255,255,255,0.75);
  max-width: 52ch;
  margin: 0 auto var(--space-xl);
  line-height: 1.65;
}
.area-closing-cta .btn-group {
  position: relative;
  z-index: 1;
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── Responsive ───────────────────────────────────────────────── */
@media (max-width: 1023px) {
  .area-intro-inner { grid-template-columns: 1fr; gap: var(--space-2xl); }
  .bowdon-split { grid-template-columns: 1fr; gap: var(--space-2xl); }
  .bowdon-img-tag { left: var(--space-md); }
  .area-cards-grid { grid-template-columns: repeat(2, 1fr); }
  .local-matters-inner { grid-template-columns: 1fr; gap: var(--space-2xl); }
}
@media (max-width: 767px) {
  .area-hero { min-height: 70vh; }
  .area-hero::before { padding-bottom: var(--space-2xl); }
  .area-cards-grid { grid-template-columns: 1fr; }
  .area-cta-banner { clip-path: none; padding: var(--section-pad-mobile); }
  .area-closing-cta { clip-path: none; padding: var(--section-pad-mobile); }
  .bowdon-section { padding: var(--section-pad-mobile); }
}
</style>

<!-- ═══════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════ -->
<section class="area-hero" aria-label="Service area hero">
  <div class="area-hero-content container">
    <h1 data-animate="fade-up">Tile &amp; Remodeling Services<br>Near Bowdon, GA</h1>
    <p class="area-hero-sub" data-animate="fade-up">
      Serving Carroll County and West Georgia since <?php echo $yearEstablished; ?>. Free estimates with no travel fees for most primary service areas.
    </p>
    <div class="area-hero-pill-row" data-animate="fade-up">
      <?php
      $heroAreaCities = ['Bowdon','Carrollton','Villa Rica','Bremen','Temple','Whitesburg','Roopville'];
      foreach ($heroAreaCities as $city): ?>
      <span class="area-hero-pill"><span class="dot" aria-hidden="true"></span><?php echo htmlspecialchars($city); ?>, GA</span>
      <?php endforeach; ?>
      <span class="area-hero-pill"><span class="dot" aria-hidden="true"></span>+ More</span>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     BREADCRUMB
═══════════════════════════════════════════════════════════ -->
<nav class="breadcrumb-bar" aria-label="Breadcrumb navigation">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li><span aria-current="page">Service Area</span></li>
    </ol>
  </div>
</nav>

<!-- ═══════════════════════════════════════════════════════════
     INTRO — Answer First
═══════════════════════════════════════════════════════════ -->
<section class="area-intro-section" aria-labelledby="area-intro-heading">
  <div class="container">
    <div class="area-intro-inner">

      <div class="area-intro-text" data-animate="fade-up">
        <span class="eyebrow-label">Our Coverage</span>
        <h2 id="area-intro-heading">~50 Miles From Bowdon.<br><span class="text-accent">All of Carroll County Covered.</span></h2>
        <p class="prose">
          Gray Tile &amp; Remodeling serves homeowners within approximately 50 miles of Bowdon, GA — covering Carroll County and the wider West Georgia region including Carrollton, Villa Rica, Bremen, Temple, Whitesburg, Roopville, Tallapoosa, Cedartown, Dallas, and Hiram. If you're in the area and searching for tile installation or remodeling near me, we are almost certainly able to help.
        </p>
        <p class="prose">
          Our base in Bowdon lets us reach most Carroll County locations in under 20 minutes, which means we can respond quickly to project questions, schedule consultations without long lead times, and start installations faster than contractors driving from Atlanta. For homeowners in our primary footprint, there is no travel surcharge on estimates or project pricing.
        </p>
        <a href="/contact/" class="btn-cta-primary" style="display:inline-flex;margin-top:var(--space-lg);">Check Availability in Your Area</a>
      </div>

      <!-- Image with badge overlay -->
      <div class="area-intro-img" data-animate="fade-up">
        <picture>
          <source srcset="<?php echo htmlspecialchars($clientPhotos['gallery02']); ?>" type="image/jpeg">
          <img
            src="<?php echo htmlspecialchars($clientPhotos['gallery02']); ?>"
            alt="Tile and remodeling work completed in Carroll County Georgia home"
            width="600" height="450"
            loading="lazy">
        </picture>
        <div class="area-intro-badge" aria-label="25 years serving West Georgia">
          <strong><?php echo $yearsInBusiness; ?></strong>
          YEARS<br>WEST GEORGIA
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     BOWDON — PRIMARY AREA FEATURE (dark full-bleed)
═══════════════════════════════════════════════════════════ -->
<section class="bowdon-section" aria-labelledby="bowdon-heading">
  <div class="container">
    <div class="bowdon-split">

      <!-- Image -->
      <div class="bowdon-img-wrap" data-animate="fade-up">
        <div class="bowdon-img-frame">
          <picture>
            <source srcset="<?php echo htmlspecialchars($clientPhotos['photo05']); ?>" type="image/jpeg">
            <img
              src="<?php echo htmlspecialchars($clientPhotos['photo05']); ?>"
              alt="Completed tile remodel in a Bowdon Georgia residential home"
              width="500" height="667"
              loading="lazy">
          </picture>
        </div>
        <div class="bowdon-img-tag">Primary Service Area</div>
      </div>

      <!-- Content -->
      <div class="bowdon-content" data-animate="fade-up">
        <span class="eyebrow-label">Hometown Base</span>
        <h2 id="bowdon-heading">Bowdon, Georgia —<br>Where We Call Home</h2>
        <p class="prose-dark">
          Bowdon sits roughly 60 miles west of Atlanta in Carroll County — a small, tight-knit community that's grown steadily as Atlantans look for more space and lower costs. The housing stock ranges from older mid-century ranch-style homes to newer construction in growing subdivisions. We've worked on nearly all of them.
        </p>
        <p class="prose-dark">
          What makes Bowdon's older homes particularly interesting from a remodeling standpoint is that many were built before modern moisture-barrier standards were established. Bathrooms and kitchens in homes from the 1960s through the early 1990s often have tile set over materials that were never designed to hold up against water long-term. We've seen it all — and we know exactly how to properly remediate, re-substrate, and re-tile these spaces so the next installation lasts for decades rather than years.
        </p>
        <p class="prose-dark">
          Because Bowdon is our home, we're available quickly, we don't mark up for proximity, and we take our reputation here seriously. Every completed project in town is a visible endorsement.
        </p>
        <ul class="bowdon-features">
          <li>No travel fee for Bowdon and immediate surrounding area</li>
          <li>Typically available for site visits within same week</li>
          <li>Familiar with local Carroll County building codes</li>
          <li>Relationships with local suppliers = faster material sourcing</li>
        </ul>
        <a href="/contact/" class="btn-cta-primary" style="display:inline-flex;">Schedule a Free Estimate in Bowdon</a>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     SERVICE AREA CARDS GRID
═══════════════════════════════════════════════════════════ -->
<section class="areas-grid-section" aria-labelledby="areas-grid-heading">
  <div class="container">
    <div class="section-heading-group" data-animate="fade-up">
      <span class="eyebrow-label">Where We Serve</span>
      <h2 id="areas-grid-heading">West Georgia Communities We Cover</h2>
      <p class="section-sub">Our service extends beyond Bowdon to the full Carroll County region and surrounding West Georgia communities.</p>
    </div>

    <div class="area-cards-grid">
      <?php
      $areaCities = [
          [
              'city'    => 'Carrollton',
              'county'  => 'Carroll County',
              'desc'    => "The county seat and largest city in Carroll County. Carrollton homeowners are among our most frequent clients — the city's mix of older bungalows and newer developments means constant demand for tile and remodeling work.",
          ],
          [
              'city'    => 'Villa Rica',
              'county'  => 'Carroll &amp; Douglas County',
              'desc'    => "One of the fastest-growing areas in West Georgia, Villa Rica has seen substantial residential development. Homeowners here choose Gray Tile for kitchen and bathroom upgrades that match the area's rising home values.",
          ],
          [
              'city'    => 'Bremen',
              'county'  => 'Carroll &amp; Haralson County',
              'desc'    => 'A quiet Carroll County community with a strong base of established single-family homes. Bremen clients typically call us for bathroom renovations and custom tile shower installations.',
          ],
          [
              'city'    => 'Temple',
              'county'  => 'Carroll County',
              'desc'    => 'Growing alongside the I-20 corridor, Temple has seen new construction as well as renovation activity in older neighborhoods. We handle both new builds and full-gut remodels here.',
          ],
          [
              'city'    => 'Whitesburg',
              'county'  => 'Carroll County',
              'desc'    => 'A smaller Carroll County community with a mix of rural properties and residential neighborhoods. Homeowners here choose us for the same expertise they\'d find in Carrollton, without the big-city pricing.',
          ],
          [
              'city'    => 'Roopville',
              'county'  => 'Carroll County',
              'desc'    => 'On the southwest edge of Carroll County, Roopville homeowners appreciate our willingness to serve rural properties without travel surcharges for projects within our standard service footprint.',
          ],
          [
              'city'    => 'Tallapoosa',
              'county'  => 'Haralson County',
              'desc'    => 'Just over the Carroll County line in Haralson County, Tallapoosa is within our service range. Residents call us when they want Carroll County craftsmanship without driving to find it.',
          ],
          [
              'city'    => 'Cedartown',
              'county'  => 'Polk County',
              'desc'    => 'Located northwest of Bowdon in Polk County, Cedartown clients reach out for tile and remodeling work that requires a specialist rather than a general handyman.',
          ],
          [
              'city'    => 'Dallas',
              'county'  => 'Paulding County',
              'desc'    => "As Paulding County's growth has pushed into West Georgia, Dallas homeowners have discovered Gray Tile through neighbor referrals. We serve this area regularly for bathroom and kitchen work.",
          ],
          [
              'city'    => 'Hiram',
              'county'  => 'Paulding County',
              'desc'    => 'At the eastern edge of our service area, Hiram projects are assessed on a case-by-case basis for travel. Most tile and remodeling projects qualify — contact us to confirm availability.',
          ],
      ];
      foreach ($areaCities as $i => $area):
      ?>
      <article class="area-card" data-animate="fade-up">
        <div class="area-card-location">
          <span class="area-card-dot" aria-hidden="true"></span>
          <h3><?php echo htmlspecialchars($area['city']); ?>, GA</h3>
        </div>
        <div class="area-card-county"><?php echo $area['county']; ?></div>
        <p class="area-card-desc"><?php echo htmlspecialchars($area['desc']); ?></p>
        <a href="/contact/" class="area-card-cta">Get a free estimate →</a>
      </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     MAP PLACEHOLDER
═══════════════════════════════════════════════════════════ -->
<section class="area-map-section" aria-labelledby="map-label">
  <div class="container">
    <div class="map-styled-placeholder" role="img" aria-label="Service area map — Carroll County and West Georgia">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11l19-9-9 19-2-8-8-2z"/></svg>
      <h3 id="map-label">Serving Carroll County &amp; Surrounding Communities</h3>
      <p>Call for availability in your area. Most projects within ~50 miles of Bowdon, GA qualify for our standard service with no travel surcharge.</p>
      <a href="/contact/" style="color:var(--color-accent);font-size:0.88rem;font-weight:600;text-decoration:underline;text-underline-offset:2px;position:relative;z-index:1;">Confirm availability for your address →</a>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     MID-PAGE CTA BANNER (CTA #2)
═══════════════════════════════════════════════════════════ -->
<section class="area-cta-banner" aria-labelledby="area-mid-cta-heading">
  <div class="container">
    <span class="eyebrow-label" data-animate="fade-up">Available Throughout West Georgia</span>
    <h2 id="area-mid-cta-heading" data-animate="fade-up">In Our Service Area?<br>Let's Schedule Your Free Estimate.</h2>
    <p data-animate="fade-up">We visit your home, assess the project, and deliver a written estimate — all at no charge. Most Carroll County clients get a site visit within the same week they reach out.</p>
    <div class="btn-group" data-animate="fade-up">
      <a href="/contact/" class="btn-cta-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
        Request a Free Estimate
      </a>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="btn-cta-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.65 3.39 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.59a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <?php echo htmlspecialchars(formatPhone($phone)); ?>
      </a>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     WHY LOCAL MATTERS
═══════════════════════════════════════════════════════════ -->
<section class="local-matters-section" aria-labelledby="local-matters-heading">
  <div class="container">
    <div class="local-matters-inner">

      <div class="local-matters-text" data-animate="fade-up">
        <span class="eyebrow-label">The Local Difference</span>
        <h2 id="local-matters-heading">Why a Local Carroll County Contractor Outperforms a Larger Firm</h2>
        <p class="prose">
          Large regional contractors cover Atlanta and its suburbs by dispatching crews from a central hub — often adding 45–90 minutes of windshield time each way to a project in Bowdon or Carrollton. That travel time doesn't disappear. It shows up in your bid as a travel premium, in delayed response times when issues arise, and in the difference between a supervisor who's driven 60 miles to check your project versus one who lives in the same community.
        </p>
        <p class="prose">
          Carroll County homeowners are better served by contractors who know the county's building inspection process, have established accounts with local tile and material suppliers, and whose work is visible in the community every day. When a neighbor asks who did your bathroom, you want to be able to give them a name that means something locally — not a regional franchise that services 12 counties.
        </p>
      </div>

      <div class="local-advantages" data-animate="fade-up">
        <div class="local-advantage-item">
          <div class="local-advantage-num" aria-hidden="true">1</div>
          <div>
            <h3>Familiar with Carroll County Codes</h3>
            <p>We know the local inspection process and what inspectors look for — no surprises at permit time, no rework from code oversights.</p>
          </div>
        </div>
        <div class="local-advantage-item">
          <div class="local-advantage-num" aria-hidden="true">2</div>
          <div>
            <h3>Local Supplier Relationships</h3>
            <p>We source materials from suppliers who know us, which means faster order fulfillment, better pricing, and ability to source specialty items on short notice.</p>
          </div>
        </div>
        <div class="local-advantage-item">
          <div class="local-advantage-num" aria-hidden="true">3</div>
          <div>
            <h3>Rapid Response to Issues</h3>
            <p>If something needs attention after installation, we're 20 minutes away — not 60. Our warranty is backed by proximity, not just a policy document.</p>
          </div>
        </div>
        <div class="local-advantage-item">
          <div class="local-advantage-num" aria-hidden="true">4</div>
          <div>
            <h3>No Travel Surcharges in Our Primary Zone</h3>
            <p>Most Carroll County projects carry zero travel premium. You pay for the work, not for the commute to reach your front door.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     FAQ
═══════════════════════════════════════════════════════════ -->
<section class="area-faq-section" aria-labelledby="area-faq-heading">
  <div class="container">
    <div class="section-heading-group" data-animate="fade-up">
      <span class="eyebrow-label">Common Questions</span>
      <h2 id="area-faq-heading">About Our Service Coverage</h2>
    </div>

    <div class="faq-list" data-animate="fade-up">
      <?php foreach ($areaFaqs as $faq): ?>
      <details class="faq-item">
        <summary class="faq-question"><?php echo htmlspecialchars($faq['q']); ?></summary>
        <div class="faq-answer">
          <p><?php echo htmlspecialchars($faq['a']); ?></p>
        </div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     CLOSING CTA (CTA #3)
═══════════════════════════════════════════════════════════ -->
<section class="area-closing-cta" aria-labelledby="area-closing-heading">
  <div class="container">
    <span class="eyebrow-label" data-animate="fade-up">Your Neighborhood. Our Craft.</span>
    <h2 id="area-closing-heading" data-animate="fade-up">Ready to Start a Project<br>in West Georgia?</h2>
    <p data-animate="fade-up">
      Gray Tile &amp; Remodeling has served Carroll County and surrounding communities for <?php echo $yearsInBusiness; ?> years. Free estimates, same-week visits for most areas, no travel surprises.
    </p>
    <div class="btn-group" data-animate="fade-up">
      <a href="/contact/" class="btn-cta-primary">Get a Free Estimate</a>
      <a href="/about/" class="btn-cta-secondary">Learn About Our Team →</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
