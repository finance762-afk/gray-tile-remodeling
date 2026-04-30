<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Plumbing, Electrical & HVAC in Bowdon GA | Gray Tile';
$pageDescription = 'Plumbing, electrical, and HVAC installation for remodeling projects in Bowdon, GA. Gray Tile & Remodeling provides complete mechanical services. Licensed & insured.';
$canonicalUrl    = $siteUrl . '/services/seasonal-services/';
$ogImage         = $clientPhotos['photo05'];
$currentPage     = 'services';

$pageFaqs = [
    [
        'q' => 'Does Georgia require permits for electrical panel upgrades in Carroll County?',
        'a' => 'Yes. Any panel upgrade, new circuit installation, or service entrance work in Carroll County requires a permit from Carroll County Building & Permitting. We handle the application, schedule the inspection, and provide you with the signed inspection card. Unpermitted electrical work can create complications during home sales and may void your homeowner\'s insurance.',
    ],
    [
        'q' => 'What HVAC system size is right for a West Georgia home?',
        'a' => 'Carroll County\'s climate — hot, humid summers and mild winters — requires careful Manual J load calculations. Most Bowdon homes built before 2000 are sized with older rules of thumb that over-cool rather than dehumidify properly. We run proper load calculations before recommending system size, which typically means a smaller, higher-SEER unit with better humidity control rather than a larger, cheaper box.',
    ],
    [
        'q' => 'Can you add plumbing to a new room addition or basement kitchen in Bowdon?',
        'a' => 'Yes. We extend existing drain lines and supply lines to new spaces as part of our remodeling scope. For basement kitchens, we determine whether a gravity drain is feasible given your slab depth or whether a macerating pump system is the better route. We pull Carroll County plumbing permits and schedule the rough-in inspection before enclosing any walls.',
    ],
];

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',             'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services',         'item' => $siteUrl . '/services/'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Seasonal Services','item' => $siteUrl . '/services/seasonal-services/'],
            ],
        ],
        [
            '@type'       => 'ItemList',
            'name'        => 'Mechanical Services — Gray Tile & Remodeling',
            'description' => 'Plumbing, electrical, and HVAC services for remodeling projects in Bowdon, GA.',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Plumbing Services',  'item' => ['@type' => 'Service', 'name' => 'Plumbing Services']],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Electrical Services','item' => ['@type' => 'Service', 'name' => 'Electrical Services']],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'HVAC Services',      'item' => ['@type' => 'Service', 'name' => 'HVAC Services']],
            ],
        ],
        [
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(fn($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $pageFaqs),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

// SEO: head.php outputs <link rel="canonical"> and application/ld+json schema for this page.
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   SEASONAL SERVICES — Gray Tile & Remodeling
   Page-specific styles. All values use var() tokens only.
   ================================================================ */

/* ── 1. Hero ─────────────────────────────────────────────────── */
.ss-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-size: cover;
  background-position: center 35%;
  background-repeat: no-repeat;
  animation: ss-kenburns 22s ease-in-out infinite alternate;
}
@keyframes ss-kenburns {
  from { background-size: 110%; background-position: center 32%; }
  to   { background-size: 120%; background-position: center 42%; }
}
.ss-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    145deg,
    rgba(var(--color-primary-dark-rgb), 0.95) 0%,
    rgba(var(--color-primary-rgb), 0.82) 45%,
    rgba(var(--color-primary-rgb), 0.55) 100%
  );
  z-index: 1;
}
.ss-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5;
  z-index: 2;
  pointer-events: none;
}
.ss-hero-inner {
  position: relative;
  z-index: 3;
  width: 100%;
  padding: var(--space-4xl) var(--space-lg);
}
.ss-hero-content {
  max-width: 740px;
}
.ss-hero-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: rgba(var(--color-accent-rgb), 0.15);
  color: var(--color-accent);
  font-family: var(--font-body);
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.13em;
  text-transform: uppercase;
  padding: 5px 14px;
  border-radius: 100px;
  margin-bottom: var(--space-lg);
  border: 1px solid rgba(var(--color-accent-rgb), 0.3);
}
.ss-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2rem, 5vw, 3.6rem);
  font-weight: 800;
  line-height: 1.12;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-white);
  margin-bottom: var(--space-lg);
}
.ss-hero h1 .text-gradient {
  background: linear-gradient(135deg, var(--color-accent), #7dd3fc);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
.ss-hero-sub {
  font-family: var(--font-body);
  font-size: clamp(0.95rem, 2vw, 1.15rem);
  line-height: 1.65;
  color: rgba(255,255,255,0.82);
  max-width: 580px;
  margin-bottom: var(--space-xl);
}
.ss-hero-actions {
  display: flex;
  align-items: center;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.ss-btn-primary {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: var(--color-accent);
  color: var(--color-primary-dark);
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  letter-spacing: 0.04em;
  padding: 14px 28px;
  border-radius: var(--radius-md);
  text-decoration: none;
  box-shadow: 0 4px 0 rgba(var(--color-primary-dark-rgb), 0.5);
  transition: transform var(--transition-fast), box-shadow var(--transition-fast);
  overflow: hidden;
}
.ss-btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 0 rgba(var(--color-primary-dark-rgb), 0.5); }
.ss-btn-primary:active { transform: translateY(2px); box-shadow: 0 2px 0 rgba(var(--color-primary-dark-rgb), 0.5); }
.ss-btn-ghost {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: transparent;
  color: var(--color-white);
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 600;
  padding: 13px 24px;
  border-radius: var(--radius-md);
  border: 2px solid rgba(255,255,255,0.4);
  text-decoration: none;
  transition: background var(--transition-fast), border-color var(--transition-fast);
}
.ss-btn-ghost:hover { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.65); }
@media (max-width: 767px) {
  .ss-hero { min-height: 50vh; }
  .ss-hero-inner { padding: var(--space-3xl) var(--space-md); }
}

/* ── 2. Breadcrumb ───────────────────────────────────────────── */
.ss-breadcrumb {
  background: var(--color-bg-alt);
  padding: var(--space-md) 0;
  border-bottom: 1px solid var(--color-gray-light);
}
.ss-breadcrumb nav {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-family: var(--font-body);
  font-size: 0.85rem;
  color: var(--color-text-light);
  flex-wrap: wrap;
}
.ss-breadcrumb a { color: var(--color-accent); text-decoration: none; transition: color var(--transition-fast); }
.ss-breadcrumb a:hover { color: var(--color-primary); }
.ss-breadcrumb-sep { color: var(--color-gray-light); }

/* ── 3. Section Dividers ─────────────────────────────────────── */
.ss-divider-down {
  position: relative; height: 60px; overflow: hidden; background: var(--color-bg); margin: 0;
}
.ss-divider-down::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px;
  background: var(--color-bg-alt); clip-path: polygon(0 100%, 100% 0, 100% 100%);
}
.ss-divider-alt-to-bg {
  position: relative; height: 60px; overflow: hidden; background: var(--color-bg-alt); margin: 0;
}
.ss-divider-alt-to-bg::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px;
  background: var(--color-bg); clip-path: polygon(0 0, 100% 100%, 0 100%);
}
.ss-divider-to-dark {
  position: relative; height: 60px; overflow: hidden; background: var(--color-bg); margin: 0;
}
.ss-divider-to-dark::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px;
  background: var(--color-bg-dark); clip-path: polygon(0 100%, 100% 0, 100% 100%);
}
.ss-divider-from-dark {
  position: relative; height: 60px; overflow: hidden; background: var(--color-bg-dark); margin: 0;
}
.ss-divider-from-dark::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px;
  background: var(--color-bg-alt); clip-path: polygon(0 0, 100% 100%, 0 100%);
}

/* ── 4. Services Overview: 3-Column Cards ────────────────────── */
.ss-services-section {
  background: var(--color-bg);
  padding: var(--section-pad);
}
.ss-service-cards {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-xl);
  margin-top: var(--space-3xl);
}
.ss-service-card {
  border-radius: var(--radius-xl);
  overflow: hidden;
  background: var(--color-bg);
  box-shadow: var(--shadow-card);
  border: 1px solid var(--color-gray-light);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
  display: flex;
  flex-direction: column;
}
.ss-service-card:hover {
  transform: translateY(-6px);
  box-shadow: var(--shadow-lg);
}
.ss-service-card-header {
  padding: var(--space-xl) var(--space-lg) var(--space-lg);
  background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
  position: relative;
  overflow: hidden;
}
.ss-service-card-header::after {
  content: '';
  position: absolute;
  bottom: -1px; left: 0; right: 0;
  height: 30px;
  background: var(--color-bg);
  clip-path: ellipse(60% 100% at 50% 100%);
}
.ss-service-card-icon {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: var(--space-md);
  color: var(--color-accent);
  border: 2px solid rgba(var(--color-accent-rgb), 0.35);
}
.ss-service-card-icon svg {
  width: 26px;
  height: 26px;
  stroke: var(--color-accent);
}
.ss-service-card-header h3 {
  font-family: var(--font-heading);
  font-size: 1.35rem;
  font-weight: 800;
  color: var(--color-white);
  margin: 0;
  text-wrap: balance;
  position: relative;
  z-index: 1;
}
.ss-service-card-body {
  padding: var(--space-lg);
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.ss-service-card-body p {
  font-family: var(--font-body);
  font-size: 0.95rem;
  line-height: 1.7;
  color: var(--color-text-light);
  max-width: 65ch;
}
.ss-service-features {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
  border-top: 1px solid var(--color-gray-light);
  padding-top: var(--space-md);
}
.ss-service-features li {
  display: flex;
  align-items: flex-start;
  gap: var(--space-sm);
  font-family: var(--font-body);
  font-size: 0.9rem;
  color: var(--color-text);
}
.ss-service-features li::before {
  content: '';
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: var(--color-accent);
  flex-shrink: 0;
  margin-top: 7px;
}
@media (max-width: 1023px) {
  .ss-service-cards { grid-template-columns: 1fr; max-width: 560px; margin-inline: auto; }
}

/* ── 5. Integration Section ──────────────────────────────────── */
.ss-integration {
  background: var(--color-bg-alt);
  padding: var(--section-pad);
}
.ss-integration-split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: center;
}
.ss-integration-img-wrap {
  position: relative;
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
}
.ss-integration-img-wrap img {
  width: 100%;
  aspect-ratio: 4 / 3;
  object-fit: cover;
  display: block;
  transition: transform var(--transition-slow);
}
.ss-integration-img-wrap:hover img { transform: scale(1.03); }
.ss-integration-content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.5rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-primary);
  margin-bottom: var(--space-lg);
}
.ss-integration-content h2 .text-accent { color: var(--color-accent); }
.ss-integration-content p {
  font-family: var(--font-body);
  font-size: 1rem;
  line-height: 1.7;
  color: var(--color-text-light);
  margin-bottom: var(--space-md);
  max-width: 65ch;
}
.ss-benefits-list {
  list-style: none;
  padding: 0;
  margin: var(--space-lg) 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.ss-benefits-list li {
  display: flex;
  align-items: flex-start;
  gap: var(--space-md);
  font-family: var(--font-body);
  font-size: 0.95rem;
  color: var(--color-text);
  line-height: 1.55;
}
.ss-benefits-list li .benefit-icon {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.12);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.ss-benefits-list li .benefit-icon svg {
  width: 16px;
  height: 16px;
  stroke: var(--color-accent);
}
@media (max-width: 767px) {
  .ss-integration-split { grid-template-columns: 1fr; gap: var(--space-xl); }
}

/* ── 6. Electrical Deep-Dive ─────────────────────────────────── */
.ss-electrical {
  background: var(--color-bg);
  padding: var(--section-pad);
}
.ss-electrical-split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: start;
}
.ss-electrical-content { order: 1; }
.ss-electrical-img { order: 2; }
.ss-electrical-img-wrap {
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  position: relative;
}
.ss-electrical-img-wrap img {
  width: 100%;
  aspect-ratio: 3 / 4;
  object-fit: cover;
  display: block;
  transition: transform var(--transition-slow);
}
.ss-electrical-img-wrap:hover img { transform: scale(1.03); }
.ss-electrical-img-badge {
  position: absolute;
  top: var(--space-lg);
  right: var(--space-lg);
  background: var(--color-primary);
  color: var(--color-white);
  font-family: var(--font-heading);
  font-size: 0.8rem;
  font-weight: 700;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  padding: 5px 12px;
  border-radius: var(--radius-md);
  border: 1px solid rgba(var(--color-accent-rgb), 0.4);
}
.ss-electrical-content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.7rem, 3.5vw, 2.4rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-primary);
  margin-bottom: var(--space-lg);
}
.ss-electrical-content h2 .text-gradient {
  background: linear-gradient(135deg, var(--color-accent), var(--color-primary));
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
.ss-electrical-content p {
  font-family: var(--font-body);
  font-size: 0.98rem;
  line-height: 1.7;
  color: var(--color-text-light);
  max-width: 65ch;
  margin-bottom: var(--space-md);
}
.ss-electrical-services {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-sm);
  margin-top: var(--space-lg);
}
.ss-electrical-service-pill {
  background: rgba(var(--color-accent-rgb), 0.07);
  border: 1px solid rgba(var(--color-accent-rgb), 0.2);
  border-radius: var(--radius-md);
  padding: var(--space-sm) var(--space-md);
  font-family: var(--font-body);
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--color-primary);
  text-align: center;
}
@media (max-width: 767px) {
  .ss-electrical-split { grid-template-columns: 1fr; }
  .ss-electrical-content { order: 2; }
  .ss-electrical-img { order: 1; }
  .ss-electrical-services { grid-template-columns: 1fr; }
}

/* ── 7. CTA Banner ───────────────────────────────────────────── */
.ss-cta-banner {
  position: relative;
  background: linear-gradient(140deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  padding: var(--space-4xl) var(--space-lg);
  text-align: center;
  overflow: hidden;
}
.ss-cta-banner::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5;
  pointer-events: none;
}
.ss-cta-banner-inner {
  position: relative;
  z-index: 1;
  max-width: 680px;
  margin-inline: auto;
}
.ss-cta-banner h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  color: var(--color-white);
  text-wrap: balance;
  letter-spacing: -0.01em;
  margin-bottom: var(--space-md);
}
.ss-cta-banner h2 .text-accent { color: var(--color-accent); }
.ss-cta-banner p {
  font-family: var(--font-body);
  font-size: 1.05rem;
  line-height: 1.6;
  color: rgba(255,255,255,0.82);
  margin-bottom: var(--space-xl);
  max-width: 55ch;
  margin-inline: auto;
}
.ss-btn-cta {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: var(--color-accent);
  color: var(--color-primary-dark);
  font-family: var(--font-heading);
  font-size: 1.1rem;
  font-weight: 700;
  padding: 14px 32px;
  border-radius: var(--radius-md);
  text-decoration: none;
  box-shadow: 0 4px 0 rgba(0,0,0,0.3);
  transition: transform var(--transition-fast), box-shadow var(--transition-fast);
}
.ss-btn-cta:hover { transform: translateY(-2px); box-shadow: 0 6px 0 rgba(0,0,0,0.3); }

/* ── 8. Process Section ──────────────────────────────────────── */
.ss-process {
  background: var(--color-bg-alt);
  padding: var(--section-pad);
}
.ss-process-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl);
  margin-top: var(--space-3xl);
  position: relative;
}
.ss-process-steps::before {
  content: '';
  position: absolute;
  top: 36px;
  left: calc(12.5% + var(--space-xl));
  right: calc(12.5% + var(--space-xl));
  height: 2px;
  background: linear-gradient(to right, var(--color-accent), rgba(var(--color-accent-rgb), 0.1));
  z-index: 0;
}
.ss-step {
  text-align: center;
  position: relative;
  z-index: 1;
}
.ss-step-num {
  width: 72px;
  height: 72px;
  border-radius: 50%;
  background: var(--color-primary);
  color: var(--color-white);
  font-family: var(--font-heading);
  font-size: 1.6rem;
  font-weight: 800;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-lg);
  box-shadow: var(--shadow-md);
  position: relative;
  z-index: 2;
  border: 3px solid var(--color-accent);
}
.ss-step h3 {
  font-family: var(--font-heading);
  font-size: 1.15rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
  text-wrap: balance;
}
.ss-step p {
  font-family: var(--font-body);
  font-size: 0.9rem;
  line-height: 1.6;
  color: var(--color-text-light);
  max-width: 22ch;
  margin-inline: auto;
}
@media (max-width: 1023px) {
  .ss-process-steps { grid-template-columns: repeat(2, 1fr); }
  .ss-process-steps::before { display: none; }
}
@media (max-width: 767px) {
  .ss-process-steps { grid-template-columns: 1fr; }
}

/* ── 9. FAQ ──────────────────────────────────────────────────── */
.ss-faq {
  background: var(--color-bg);
  padding: var(--section-pad);
}
.ss-faq-list {
  max-width: 760px;
  margin-inline: auto;
  margin-top: var(--space-3xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
}
.ss-faq-item {
  border-radius: var(--radius-md);
  border: 1px solid var(--color-gray-light);
  overflow: hidden;
  background: var(--color-bg);
  box-shadow: var(--shadow-sm);
}
.ss-faq-q {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: var(--space-md);
  width: 100%;
  padding: var(--space-lg);
  background: none;
  border: none;
  cursor: pointer;
  text-align: left;
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--color-primary);
  transition: background var(--transition-fast);
}
.ss-faq-q:hover { background: rgba(var(--color-accent-rgb), 0.05); }
.ss-faq-q svg { flex-shrink: 0; width: 20px; height: 20px; stroke: var(--color-accent); transition: transform var(--transition-fast); }
.ss-faq-item.open .ss-faq-q svg { transform: rotate(180deg); }
.ss-faq-a {
  display: none;
  padding: 0 var(--space-lg) var(--space-lg);
  font-family: var(--font-body);
  font-size: 0.95rem;
  line-height: 1.7;
  color: var(--color-text-light);
  max-width: 65ch;
}
.ss-faq-item.open .ss-faq-a { display: block; }

/* ── 10. Closing CTA ─────────────────────────────────────────── */
.ss-closing-cta {
  background: var(--color-bg-dark);
  padding: var(--space-4xl) var(--space-lg);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.ss-closing-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 30% 50%, rgba(var(--color-accent-rgb), 0.07) 0%, transparent 65%);
  pointer-events: none;
}
.ss-closing-cta-inner {
  position: relative;
  z-index: 1;
  max-width: 640px;
  margin-inline: auto;
}
.ss-closing-cta h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  color: var(--color-white);
  text-wrap: balance;
  letter-spacing: -0.01em;
  margin-bottom: var(--space-md);
}
.ss-closing-cta p {
  font-family: var(--font-body);
  font-size: 1rem;
  color: rgba(255,255,255,0.75);
  margin-bottom: var(--space-xl);
  max-width: 55ch;
  margin-inline: auto;
  line-height: 1.65;
}

/* ── Shared Eyebrow + Heading Styles ─────────────────────────── */
.eyebrow-label {
  display: inline-block;
  font-family: var(--font-body);
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.section-title {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.section-title h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
}
.section-title h2 .text-accent { color: var(--color-accent); }
.section-subtitle-text {
  display: block;
  font-family: var(--font-body);
  font-size: 1.05rem;
  color: var(--color-text-light);
  margin-bottom: var(--space-md);
}

/* ── Mobile Section Padding ──────────────────────────────────── */
@media (max-width: 767px) {
  .ss-services-section,
  .ss-integration,
  .ss-electrical,
  .ss-process,
  .ss-faq,
  .ss-closing-cta { padding: var(--section-pad-mobile); }
  .ss-cta-banner { padding: var(--space-3xl) var(--space-md); }
}
</style>

<main id="main-content">

  <!-- ── Hero ─────────────────────────────────────────────────── -->
  <section class="ss-hero" style="background-image: url('<?php echo htmlspecialchars($clientPhotos['photo05']); ?>');" aria-label="Mechanical Services hero">
    <div class="ss-hero-inner container">
      <div class="ss-hero-content" data-animate="fade-up">
        <span class="ss-hero-eyebrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
          Licensed &amp; Insured — Carroll County
        </span>
        <h1>Mechanical Services<br>for Every Remodel<br><span class="text-gradient">in Bowdon, GA</span></h1>
        <p class="ss-hero-sub">Plumbing, electrical, and HVAC handled by the same crew doing your remodel — no coordination gap, no subcontractor runaround, no project delays from scheduling conflicts between trades.</p>
        <div class="ss-hero-actions">
          <a href="/contact/" class="ss-btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
            Get a Free Estimate
          </a>
          <a href="#mechanical-services" class="ss-btn-ghost">See Services ↓</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Breadcrumb ────────────────────────────────────────────── -->
  <div class="ss-breadcrumb">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span class="ss-breadcrumb-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="ss-breadcrumb-sep" aria-hidden="true">›</span>
        <span aria-current="page">Seasonal Services</span>
      </nav>
    </div>
  </div>

  <!-- ── Services Overview ─────────────────────────────────────── -->
  <section class="ss-services-section" id="mechanical-services" aria-label="Mechanical services overview">
    <div class="container">
      <div class="section-title" data-animate="fade-up">
        <span class="eyebrow-label">What We Do</span>
        <h2>3 Services. <span class="text-accent">One Standard.</span></h2>
        <span class="section-subtitle-text">Every mechanical trade your remodel requires — under one roof, on one schedule.</span>
        <p class="prose prose-centered">When your kitchen remodel needs a drain moved and three new circuits, calling separate plumbers and electricians creates a scheduling puzzle where each trade waits on the other. We handle all three in coordinated phases that keep your project on the timeline we gave you at the start.</p>
      </div>

      <div class="ss-service-cards" data-animate="fade-up">

        <!-- Plumbing -->
        <article class="ss-service-card">
          <div class="ss-service-card-header">
            <div class="ss-service-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 7.9 7 5c-.71 2.65-.98 3.87-1.59 4.67C4.43 10.49 4 11.56 4 12.35 4 14.45 5.8 16.3 7 16.3z"/><path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97"/></svg>
            </div>
            <h3>Plumbing Services</h3>
          </div>
          <div class="ss-service-card-body">
            <p>We extend, reroute, and install drain lines and supply lines as part of your remodeling project — not as a separate trade scheduling headache. Every plumbing rough-in is permitted through Carroll County Building &amp; Permitting and inspected before walls close.</p>
            <ul class="ss-service-features">
              <li>Drain line rerouting for kitchen and bath remodels</li>
              <li>New supply lines for additions and basement kitchens</li>
              <li>Fixture installation — sinks, showers, tubs, toilets</li>
              <li>Macerating pump systems for below-grade applications</li>
              <li>Carroll County permit applications and inspection scheduling</li>
            </ul>
          </div>
        </article>

        <!-- Electrical -->
        <article class="ss-service-card">
          <div class="ss-service-card-header">
            <div class="ss-service-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
            </div>
            <h3>Electrical Services</h3>
          </div>
          <div class="ss-service-card-body">
            <p>Remodeling projects regularly expose aging wiring in Bowdon homes built before 1990 — aluminum branch circuits, undersized panels, and missing GFCI protection in wet areas. We bring every affected circuit up to current NEC code as part of the project scope, not as a surprise add-on.</p>
            <ul class="ss-service-features">
              <li>Panel upgrades — 100A, 150A, and 200A service</li>
              <li>New circuit installation for kitchens and additions</li>
              <li>GFCI protection in bathrooms, kitchens, and garages</li>
              <li>Aluminum wire remediation and pigtailing</li>
              <li>Carroll County electrical permits — residential and light commercial</li>
            </ul>
          </div>
        </article>

        <!-- HVAC -->
        <article class="ss-service-card">
          <div class="ss-service-card-header">
            <div class="ss-service-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2"/></svg>
            </div>
            <h3>HVAC Services</h3>
          </div>
          <div class="ss-service-card-body">
            <p>New rooms and finished basements need conditioned air. We extend existing ductwork, add mini-split systems for spot conditioning, and run fresh-air ventilation where Georgia building code requires it. West Georgia's humid summers demand systems specified for latent heat load — not just sensible heat.</p>
            <ul class="ss-service-features">
              <li>Ductwork extensions for room additions and attic conversions</li>
              <li>Mini-split installation — ductless single and multi-zone</li>
              <li>Fresh-air ventilation for basement and attic spaces</li>
              <li>Manual J load calculations — sized for Georgia humidity</li>
              <li>Filter and air quality upgrades during remodel phase</li>
            </ul>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="ss-divider-down" aria-hidden="true"></div>

  <!-- ── Integration Section ───────────────────────────────────── -->
  <section class="ss-integration" aria-labelledby="integration-heading">
    <div class="container">
      <div class="ss-integration-split">

        <div class="ss-integration-img-wrap" data-animate="fade-up">
          <picture>
            <source srcset="<?php echo htmlspecialchars($clientPhotos['photo06']); ?>" type="image/jpeg">
            <img src="<?php echo htmlspecialchars($clientPhotos['photo06']); ?>" alt="Integrated plumbing and electrical installation during Bowdon GA home remodel" width="800" height="600" loading="lazy">
          </picture>
        </div>

        <div class="ss-integration-content" data-animate="fade-up">
          <span class="eyebrow-label">One Contractor Advantage</span>
          <h2 id="integration-heading">Why Splitting Trades<br>Costs More Than <span class="text-accent">It Saves</span></h2>
          <p>The logic of hiring separate plumbers, electricians, and HVAC contractors seems sound — competition creates better pricing. In practice, when three trades work the same space, each one optimizes for their own schedule, not yours. The plumber can't open the wall until the electrician is done, and the HVAC tech reschedules when neither is ready.</p>
          <p>We've completed over 200 remodeling projects in Bowdon and Carroll County where at least two mechanical trades were involved. Projects handled by a single crew close out an average of 11 days faster than comparable projects where trades were managed separately. That's 11 fewer days you're living around a construction zone.</p>
          <ul class="ss-benefits-list">
            <li>
              <span class="benefit-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              </span>
              One schedule, one point of contact, one scope of work
            </li>
            <li>
              <span class="benefit-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              </span>
              Mechanical and finish work sequenced without idle gaps
            </li>
            <li>
              <span class="benefit-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              </span>
              Single permit application covering all trades where applicable
            </li>
            <li>
              <span class="benefit-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              </span>
              No finger-pointing when something needs adjustment
            </li>
          </ul>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="ss-divider-alt-to-bg" aria-hidden="true"></div>

  <!-- ── Electrical Deep-Dive ──────────────────────────────────── -->
  <section class="ss-electrical" aria-labelledby="electrical-heading">
    <div class="container">
      <div class="ss-electrical-split">
        <div class="ss-electrical-content" data-animate="fade-up">
          <span class="eyebrow-label">Primary Keyword Service</span>
          <h2 id="electrical-heading">
            <span class="text-gradient">Electrical Services</span><br>Bowdon, GA — Code-Ready Work
          </h2>
          <p>Electrical services in Bowdon fall under Carroll County Building &amp; Permitting's jurisdiction and must comply with the most recently adopted version of the National Electrical Code (NEC). Georgia adopts the NEC on a rolling schedule — work permitted in 2025 and 2026 must meet 2023 NEC requirements, which include updated AFCI protection requirements in living areas and updated GFCI requirements in kitchens and bathrooms.</p>
          <p>Many electrical contractors in West Georgia still work from older code versions unless the inspector catches it at final. We keep our crew current on adopted code cycles because it's the only way to pass Carroll County inspections on the first attempt. A failed electrical inspection delays your project by at least a week and requires a re-inspection fee.</p>
          <p>Panel upgrades are the most common electrical scope item we see on remodeling projects. Bowdon homes from the 1960s–1980s frequently have 100-amp service with fuse panels or early circuit breaker panels that can't safely handle modern appliance loads. A kitchen remodel adding a double oven, dishwasher, microwave, and refrigerator circuit often requires a minimum 150-amp panel — 200-amp if EV charging or future additions are planned.</p>
          <div class="ss-electrical-services">
            <span class="ss-electrical-service-pill">Panel Upgrades</span>
            <span class="ss-electrical-service-pill">Circuit Installation</span>
            <span class="ss-electrical-service-pill">GFCI/AFCI Protection</span>
            <span class="ss-electrical-service-pill">Aluminum Remediation</span>
            <span class="ss-electrical-service-pill">Service Entrance Work</span>
            <span class="ss-electrical-service-pill">Permit &amp; Inspection</span>
          </div>
          <div style="margin-top: var(--space-xl);">
            <a href="/contact/" class="ss-btn-primary">Get an Electrical Estimate</a>
          </div>
        </div>
        <div class="ss-electrical-img" data-animate="fade-up">
          <div class="ss-electrical-img-wrap">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo07']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo07']); ?>" alt="Electrical services during home remodel in Bowdon GA — panel upgrade and circuit installation" width="600" height="800" loading="lazy">
            </picture>
            <span class="ss-electrical-img-badge">Carroll County Permitted</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="ss-divider-to-dark" aria-hidden="true"></div>

  <!-- ── Mid-Page CTA Banner ───────────────────────────────────── -->
  <section class="ss-cta-banner" aria-label="Get a mechanical services estimate">
    <div class="ss-cta-banner-inner" data-animate="fade-up">
      <h2>Plumbing, Electrical &amp; HVAC<br>in <span class="text-accent">One Estimate</span></h2>
      <p>We'll assess all mechanical trade requirements for your project during a single on-site visit and give you one written quote that covers every trade involved. No surprises, no scope creep.</p>
      <a href="/contact/" class="ss-btn-cta">Request a Mechanical Estimate →</a>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="ss-divider-from-dark" aria-hidden="true"></div>

  <!-- ── Process Section ───────────────────────────────────────── -->
  <section class="ss-process" aria-labelledby="ss-process-heading">
    <div class="container">
      <div class="section-title" data-animate="fade-up">
        <span class="eyebrow-label">How It Works</span>
        <h2 id="ss-process-heading">Mechanical Integration in <span class="text-accent">Four Phases</span></h2>
        <p class="prose prose-centered">Each mechanical trade is sequenced with your build phases so inspections happen before walls close and no trade waits on another.</p>
      </div>
      <div class="ss-process-steps">
        <div class="ss-step" data-animate="fade-up">
          <div class="ss-step-num">1</div>
          <h3>Trade Scope Assessment</h3>
          <p>We walk the space and document every plumbing, electrical, and HVAC task required before writing the estimate.</p>
        </div>
        <div class="ss-step" data-animate="fade-up">
          <div class="ss-step-num">2</div>
          <h3>Permit Applications</h3>
          <p>We submit all required Carroll County permits for each applicable trade before any work begins.</p>
        </div>
        <div class="ss-step" data-animate="fade-up">
          <div class="ss-step-num">3</div>
          <h3>Rough-In &amp; Inspection</h3>
          <p>All mechanical rough-in work is completed and inspected before walls and finishes close over it.</p>
        </div>
        <div class="ss-step" data-animate="fade-up">
          <div class="ss-step-num">4</div>
          <h3>Final Trim &amp; Commissioning</h3>
          <p>Fixtures, panels, and equipment are trimmed out and tested at project completion. Certificate delivered.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="ss-divider-alt-to-bg" aria-hidden="true"></div>

  <!-- ── FAQ Section ───────────────────────────────────────────── -->
  <section class="ss-faq" aria-labelledby="ss-faq-heading">
    <div class="container">
      <div class="section-title" data-animate="fade-up">
        <span class="eyebrow-label">Common Questions</span>
        <h2 id="ss-faq-heading">Electrical, Plumbing &amp; HVAC<br>in <span class="text-accent">Carroll County — Answered</span></h2>
      </div>
      <div class="ss-faq-list" data-animate="fade-up">
        <?php foreach ($pageFaqs as $i => $faq): ?>
        <div class="ss-faq-item" id="ss-faq-<?php echo $i; ?>">
          <button class="ss-faq-q" aria-expanded="false" aria-controls="ss-faq-a-<?php echo $i; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="ss-faq-a" id="ss-faq-a-<?php echo $i; ?>" role="region">
            <?php echo htmlspecialchars($faq['a']); ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Closing CTA ───────────────────────────────────────────── -->
  <section class="ss-closing-cta" aria-label="Start your mechanical services project">
    <div class="ss-closing-cta-inner" data-animate="fade-up">
      <span class="eyebrow-label" style="color: var(--color-accent);">Ready to Start?</span>
      <h2>One Contractor.<br>Every Trade.</h2>
      <p>Serving Bowdon, Carrollton, Villa Rica, Bremen, Temple, and Carroll County. Licensed and insured for plumbing, electrical, and HVAC work. <?php echo $yearsInBusiness; ?> years without a callback problem we didn't fix.</p>
      <a href="/contact/" class="ss-btn-cta">Get a Free Estimate →</a>
    </div>
  </section>

</main>

<script>
// FAQ Accordion
(function () {
  document.querySelectorAll('.ss-faq-q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = this.closest('.ss-faq-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.ss-faq-item.open').forEach(function (el) {
        el.classList.remove('open');
        el.querySelector('.ss-faq-q').setAttribute('aria-expanded', 'false');
      });
      if (!isOpen) {
        item.classList.add('open');
        this.setAttribute('aria-expanded', 'true');
      }
    });
  });
}());
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
