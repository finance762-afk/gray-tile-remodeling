<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Remodeling Services in Bowdon, GA | Gray Tile & Remodeling';
$pageDescription = 'Gray Tile & Remodeling delivers kitchen, bathroom, basement, attic, and full home remodeling in Bowdon, GA. 25 years of West Georgia craftsmanship. Get a free estimate.';
$canonicalUrl    = $siteUrl . '/services/remodeling-services/';
$ogImage         = $clientPhotos['photo01'];
$currentPage     = 'services';

$pageFaqs = [
    [
        'q' => 'How much does a basement kitchen remodel cost in Bowdon, GA?',
        'a' => 'A basement kitchen remodel in Bowdon typically ranges from $18,000 to $55,000 depending on scope, materials, and whether plumbing rough-ins already exist. Georgia\'s humidity requires specific moisture-resistant materials that affect final cost. We provide detailed written estimates after an on-site consultation.',
    ],
    [
        'q' => 'Do you pull permits for remodeling projects in Carroll County?',
        'a' => 'Yes. All structural work, electrical, plumbing, and HVAC changes on our projects require Carroll County building permits. We handle the permit application process and schedule inspections — you don\'t need to navigate the county office yourself.',
    ],
    [
        'q' => 'How long does a full kitchen or bathroom remodel take in West Georgia?',
        'a' => 'A bathroom remodel typically takes 2–4 weeks. A kitchen remodel runs 4–8 weeks. Attic conversions and room additions range from 6–16 weeks depending on scope. We build detailed project schedules during the design phase so you always know what week we\'re in.',
    ],
];

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',               'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services',           'item' => $siteUrl . '/services/'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Remodeling Services','item' => $siteUrl . '/services/remodeling-services/'],
            ],
        ],
        [
            '@type'       => 'ItemList',
            'name'        => 'Remodeling Services — Gray Tile & Remodeling',
            'description' => 'Kitchen, bathroom, basement, attic, and full home remodeling in Bowdon, GA.',
            'itemListElement' => array_map(function($name, $i) use ($siteUrl) {
                return [
                    '@type'    => 'ListItem',
                    'position' => $i + 1,
                    'name'     => $name,
                    'item'     => ['@type' => 'Service', 'name' => $name],
                ];
            }, ['Kitchen Remodeling','Bathroom Remodeling','Basement Finishing','Basement Kitchen Remodeling','Attic Remodeling','Room Additions','Full Home Remodel','Custom Remodeling','Structural Renovation','Eco-Friendly Remodeling','Home Additions'], range(0, 10)),
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

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   REMODELING SERVICES — Gray Tile & Remodeling
   Page-specific styles. All values use var() tokens only.
   ================================================================ */

/* ── 1. Hero ─────────────────────────────────────────────────── */
.rs-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-size: cover;
  background-position: center 40%;
  background-repeat: no-repeat;
  animation: rs-kenburns 20s ease-in-out infinite alternate;
}
@keyframes rs-kenburns {
  from { background-size: 108%; background-position: center 38%; }
  to   { background-size: 118%; background-position: center 45%; }
}
.rs-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    125deg,
    rgba(var(--color-primary-rgb), 0.93) 0%,
    rgba(var(--color-primary-rgb), 0.78) 50%,
    rgba(var(--color-primary-dark-rgb), 0.55) 100%
  );
  z-index: 1;
}
.rs-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5;
  z-index: 2;
  pointer-events: none;
}
.rs-hero-inner {
  position: relative;
  z-index: 3;
  width: 100%;
  padding: var(--space-4xl) var(--space-lg);
  display: flex;
  align-items: center;
}
.rs-hero-content {
  max-width: 760px;
}
.rs-hero-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: rgba(var(--color-accent-rgb), 0.18);
  color: var(--color-accent);
  font-family: var(--font-body);
  font-size: 0.8rem;
  font-weight: 600;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  padding: 6px 14px;
  border-radius: 100px;
  margin-bottom: var(--space-lg);
  border: 1px solid rgba(var(--color-accent-rgb), 0.35);
}
.rs-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.2rem, 5.5vw, 3.8rem);
  font-weight: 800;
  line-height: 1.12;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-white);
  margin-bottom: var(--space-lg);
}
.rs-hero h1 .text-gradient {
  background: linear-gradient(135deg, var(--color-accent), #38bdf8);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
.rs-hero-sub {
  font-family: var(--font-body);
  font-size: clamp(1rem, 2.2vw, 1.2rem);
  line-height: 1.6;
  color: rgba(255,255,255,0.85);
  max-width: 600px;
  margin-bottom: var(--space-xl);
}
.rs-hero-actions {
  display: flex;
  align-items: center;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.rs-btn-primary {
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
.rs-btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 0 rgba(var(--color-primary-dark-rgb), 0.5);
}
.rs-btn-primary:active {
  transform: translateY(2px);
  box-shadow: 0 2px 0 rgba(var(--color-primary-dark-rgb), 0.5);
}
.rs-btn-ghost {
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
  border: 2px solid rgba(255,255,255,0.45);
  text-decoration: none;
  transition: background var(--transition-fast), border-color var(--transition-fast);
}
.rs-btn-ghost:hover {
  background: rgba(255,255,255,0.1);
  border-color: rgba(255,255,255,0.7);
}
@media (max-width: 767px) {
  .rs-hero { min-height: 50vh; }
  .rs-hero-inner { padding: var(--space-3xl) var(--space-md); }
}

/* ── 2. Breadcrumb ───────────────────────────────────────────── */
.rs-breadcrumb {
  background: var(--color-bg-alt);
  padding: var(--space-md) 0;
  border-bottom: 1px solid var(--color-gray-light);
}
.rs-breadcrumb nav {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-family: var(--font-body);
  font-size: 0.85rem;
  color: var(--color-text-light);
  flex-wrap: wrap;
}
.rs-breadcrumb a {
  color: var(--color-accent);
  text-decoration: none;
  transition: color var(--transition-fast);
}
.rs-breadcrumb a:hover { color: var(--color-primary); }
.rs-breadcrumb-sep {
  color: var(--color-gray-light);
}

/* ── 3. Ticker Strip ─────────────────────────────────────────── */
.rs-ticker {
  background: var(--color-primary);
  padding: var(--space-sm) 0;
  overflow: hidden;
  position: relative;
}
.rs-ticker::before,
.rs-ticker::after {
  content: '';
  position: absolute;
  top: 0; bottom: 0;
  width: 80px;
  z-index: 2;
  pointer-events: none;
}
.rs-ticker::before {
  left: 0;
  background: linear-gradient(to right, var(--color-primary), transparent);
}
.rs-ticker::after {
  right: 0;
  background: linear-gradient(to left, var(--color-primary), transparent);
}
.rs-ticker-track {
  display: flex;
  gap: 0;
  width: max-content;
  animation: rs-ticker-scroll 30s linear infinite;
}
.rs-ticker:hover .rs-ticker-track {
  animation-play-state: paused;
}
@keyframes rs-ticker-scroll {
  from { transform: translateX(0); }
  to   { transform: translateX(-50%); }
}
.rs-ticker-item {
  display: inline-flex;
  align-items: center;
  gap: var(--space-lg);
  padding: 0 var(--space-xl);
  color: var(--color-white);
  font-family: var(--font-body);
  font-size: 0.8rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  white-space: nowrap;
}
.rs-ticker-item .sep {
  color: var(--color-accent);
  font-size: 1.1rem;
}

/* ── 4. Section: Services Grid ───────────────────────────────── */
.rs-services-section {
  background: var(--color-bg);
  padding: var(--section-pad);
}
.rs-services-section .section-title {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
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
.rs-services-section h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
}
.rs-services-section h2 .text-accent {
  color: var(--color-accent);
}
.rs-section-subtitle {
  display: block;
  font-family: var(--font-body);
  font-size: 1.05rem;
  color: var(--color-text-light);
  margin-bottom: var(--space-md);
}
.rs-view-all {
  display: flex;
  justify-content: center;
  margin-top: var(--space-2xl);
}
.rs-view-all a {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: transparent;
  color: var(--color-primary);
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  padding: 12px 28px;
  border-radius: var(--radius-md);
  border: 2px solid var(--color-primary);
  text-decoration: none;
  transition: background var(--transition-fast), color var(--transition-fast);
}
.rs-view-all a:hover {
  background: var(--color-primary);
  color: var(--color-white);
}

/* ── 5. Section Divider ──────────────────────────────────────── */
.rs-divider-down {
  position: relative;
  height: 60px;
  overflow: hidden;
  background: var(--color-bg);
  margin: 0;
}
.rs-divider-down::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0; right: 0;
  height: 60px;
  background: var(--color-bg-alt);
  clip-path: polygon(0 100%, 100% 0, 100% 100%);
}
.rs-divider-up {
  position: relative;
  height: 60px;
  overflow: hidden;
  background: var(--color-bg-alt);
  margin: 0;
}
.rs-divider-up::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0; right: 0;
  height: 60px;
  background: var(--color-bg);
  clip-path: polygon(0 0, 100% 100%, 0 100%);
}
.rs-divider-dark {
  position: relative;
  height: 60px;
  overflow: hidden;
  background: var(--color-bg-alt);
  margin: 0;
}
.rs-divider-dark::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0; right: 0;
  height: 60px;
  background: var(--color-bg-dark);
  clip-path: polygon(0 100%, 100% 0, 100% 100%);
}
.rs-divider-from-dark {
  position: relative;
  height: 60px;
  overflow: hidden;
  background: var(--color-bg-dark);
  margin: 0;
}
.rs-divider-from-dark::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0; right: 0;
  height: 60px;
  background: var(--color-bg-alt);
  clip-path: polygon(0 0, 100% 100%, 0 100%);
}

/* ── 6. Featured Section: Basement Kitchen ───────────────────── */
.rs-featured {
  background: var(--color-bg-alt);
  padding: var(--section-pad);
}
.rs-featured-split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: center;
}
.rs-featured-img-wrap {
  position: relative;
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
}
.rs-featured-img-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  aspect-ratio: 4 / 3;
  transition: transform var(--transition-slow);
}
.rs-featured-img-wrap:hover img {
  transform: scale(1.04);
}
.rs-featured-img-badge {
  position: absolute;
  bottom: var(--space-lg);
  left: var(--space-lg);
  background: var(--color-accent);
  color: var(--color-primary-dark);
  font-family: var(--font-heading);
  font-size: 0.85rem;
  font-weight: 700;
  letter-spacing: 0.05em;
  padding: 6px 14px;
  border-radius: var(--radius-md);
  text-transform: uppercase;
}
.rs-featured-content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.5rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-primary);
  margin-bottom: var(--space-lg);
}
.rs-featured-content h2 .text-gradient {
  background: linear-gradient(135deg, var(--color-accent), var(--color-primary));
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
.rs-featured-content .prose p {
  font-family: var(--font-body);
  font-size: 1rem;
  line-height: 1.7;
  color: var(--color-text-light);
  margin-bottom: var(--space-md);
  max-width: 65ch;
}
.rs-featured-content .prose p:last-child { margin-bottom: 0; }
.rs-featured-cta {
  margin-top: var(--space-xl);
}
@media (max-width: 767px) {
  .rs-featured-split {
    grid-template-columns: 1fr;
    gap: var(--space-xl);
  }
}

/* ── 7. Why Choose Section ───────────────────────────────────── */
.rs-why {
  background: var(--color-bg);
  padding: var(--section-pad);
}
.rs-why-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl);
  margin-top: var(--space-3xl);
}
.rs-why-card {
  text-align: center;
  padding: var(--space-xl) var(--space-lg);
  border-radius: var(--radius-lg);
  border: 1px solid var(--color-gray-light);
  box-shadow: var(--shadow-sm);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
  background: var(--color-bg);
}
.rs-why-card:hover {
  transform: translateY(-6px);
  box-shadow: var(--shadow-lg);
}
.rs-why-icon {
  width: 64px;
  height: 64px;
  border-radius: 50%;
  background: linear-gradient(135deg, rgba(var(--color-accent-rgb), 0.15), rgba(var(--color-accent-rgb), 0.05));
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-md);
  color: var(--color-accent);
  transition: transform var(--transition-base);
}
.rs-why-card:hover .rs-why-icon {
  transform: scale(1.12) rotate(-5deg);
}
.rs-why-icon svg {
  width: 28px;
  height: 28px;
  stroke: var(--color-accent);
}
.rs-why-card h3 {
  font-family: var(--font-heading);
  font-size: 1.2rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
  text-wrap: balance;
}
.rs-why-card p {
  font-family: var(--font-body);
  font-size: 0.9rem;
  line-height: 1.6;
  color: var(--color-text-light);
  max-width: 22ch;
  margin-inline: auto;
}
@media (max-width: 1023px) {
  .rs-why-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 767px) {
  .rs-why-grid { grid-template-columns: 1fr; }
}

/* ── 8. CTA Banner ───────────────────────────────────────────── */
.rs-cta-banner {
  position: relative;
  background: linear-gradient(125deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  padding: var(--space-4xl) var(--space-lg);
  text-align: center;
  overflow: hidden;
}
.rs-cta-banner::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5;
  pointer-events: none;
}
.rs-cta-banner-inner {
  position: relative;
  z-index: 1;
  max-width: 680px;
  margin-inline: auto;
}
.rs-cta-banner h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  color: var(--color-white);
  text-wrap: balance;
  letter-spacing: -0.01em;
  margin-bottom: var(--space-md);
}
.rs-cta-banner h2 .text-accent { color: var(--color-accent); }
.rs-cta-banner p {
  font-family: var(--font-body);
  font-size: 1.05rem;
  line-height: 1.6;
  color: rgba(255,255,255,0.82);
  margin-bottom: var(--space-xl);
  max-width: 55ch;
  margin-inline: auto;
}
.rs-cta-banner-actions {
  display: flex;
  justify-content: center;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.rs-btn-cta {
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
.rs-btn-cta:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 0 rgba(0,0,0,0.3);
}

/* ── 9. Process Section ──────────────────────────────────────── */
.rs-process {
  background: var(--color-bg-alt);
  padding: var(--section-pad);
}
.rs-process-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl);
  margin-top: var(--space-3xl);
  position: relative;
}
.rs-process-steps::before {
  content: '';
  position: absolute;
  top: 36px;
  left: calc(12.5% + var(--space-xl));
  right: calc(12.5% + var(--space-xl));
  height: 2px;
  background: linear-gradient(to right, var(--color-accent), rgba(var(--color-accent-rgb), 0.15));
  z-index: 0;
}
.rs-step {
  position: relative;
  text-align: center;
  z-index: 1;
}
.rs-step-num {
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
.rs-step h3 {
  font-family: var(--font-heading);
  font-size: 1.15rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
  text-wrap: balance;
}
.rs-step p {
  font-family: var(--font-body);
  font-size: 0.9rem;
  line-height: 1.6;
  color: var(--color-text-light);
  max-width: 22ch;
  margin-inline: auto;
}
@media (max-width: 1023px) {
  .rs-process-steps {
    grid-template-columns: repeat(2, 1fr);
  }
  .rs-process-steps::before { display: none; }
}
@media (max-width: 767px) {
  .rs-process-steps { grid-template-columns: 1fr; }
}

/* ── 10. FAQ ─────────────────────────────────────────────────── */
.rs-faq {
  background: var(--color-bg);
  padding: var(--section-pad);
}
.rs-faq-list {
  max-width: 760px;
  margin-inline: auto;
  margin-top: var(--space-3xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
}
.rs-faq-item {
  border-radius: var(--radius-md);
  border: 1px solid var(--color-gray-light);
  overflow: hidden;
  background: var(--color-bg);
  box-shadow: var(--shadow-sm);
}
.rs-faq-q {
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
.rs-faq-q:hover { background: rgba(var(--color-accent-rgb), 0.05); }
.rs-faq-q svg {
  flex-shrink: 0;
  width: 20px;
  height: 20px;
  stroke: var(--color-accent);
  transition: transform var(--transition-fast);
}
.rs-faq-item.open .rs-faq-q svg { transform: rotate(180deg); }
.rs-faq-a {
  display: none;
  padding: 0 var(--space-lg) var(--space-lg);
  font-family: var(--font-body);
  font-size: 0.95rem;
  line-height: 1.7;
  color: var(--color-text-light);
  max-width: 65ch;
}
.rs-faq-item.open .rs-faq-a { display: block; }

/* ── 11. Closing CTA ─────────────────────────────────────────── */
.rs-closing-cta {
  background: var(--color-bg-dark);
  padding: var(--space-4xl) var(--space-lg);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.rs-closing-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 70% 50%, rgba(var(--color-accent-rgb), 0.08) 0%, transparent 65%);
  pointer-events: none;
}
.rs-closing-cta-inner {
  position: relative;
  z-index: 1;
  max-width: 640px;
  margin-inline: auto;
}
.rs-closing-cta h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  color: var(--color-white);
  text-wrap: balance;
  letter-spacing: -0.01em;
  margin-bottom: var(--space-md);
}
.rs-closing-cta p {
  font-family: var(--font-body);
  font-size: 1rem;
  color: rgba(255,255,255,0.75);
  margin-bottom: var(--space-xl);
  max-width: 55ch;
  margin-inline: auto;
  line-height: 1.65;
}

/* ── Mobile Section Padding ──────────────────────────────────── */
@media (max-width: 767px) {
  .rs-services-section,
  .rs-featured,
  .rs-why,
  .rs-process,
  .rs-faq,
  .rs-closing-cta { padding: var(--section-pad-mobile); }
  .rs-cta-banner { padding: var(--space-3xl) var(--space-md); }
}
</style>

<main id="main-content">

  <!-- ── Hero ─────────────────────────────────────────────────── -->
  <section class="rs-hero" style="background-image: url('<?php echo htmlspecialchars($clientPhotos['photo01']); ?>');" aria-label="Remodeling Services hero">
    <div class="rs-hero-inner container">
      <div class="rs-hero-content" data-animate="fade-up">
        <span class="rs-hero-eyebrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          Bowdon, GA &amp; West Georgia
        </span>
        <h1>Remodeling Services<br><span class="text-gradient">in Bowdon, GA</span></h1>
        <p class="rs-hero-sub">From basement kitchen conversions to full attic transformations, Gray Tile &amp; Remodeling has been reshaping Carroll County homes for <?php echo $yearsInBusiness; ?> years. No subcontractor runaround — your project runs through one crew.</p>
        <div class="rs-hero-actions">
          <a href="/contact/" class="rs-btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
            Get a Free Estimate
          </a>
          <a href="#services-grid" class="rs-btn-ghost">Browse Services ↓</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Breadcrumb ────────────────────────────────────────────── -->
  <div class="rs-breadcrumb">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span class="rs-breadcrumb-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="rs-breadcrumb-sep" aria-hidden="true">›</span>
        <span aria-current="page">Remodeling Services</span>
      </nav>
    </div>
  </div>

  <!-- ── Ticker Strip ──────────────────────────────────────────── -->
  <div class="rs-ticker" aria-hidden="true">
    <div class="rs-ticker-track">
      <!-- Set 1 -->
      <span class="rs-ticker-item">Kitchen Remodeling <span class="sep">•</span></span>
      <span class="rs-ticker-item">Bathroom Renovation <span class="sep">•</span></span>
      <span class="rs-ticker-item">Basement Finishing <span class="sep">•</span></span>
      <span class="rs-ticker-item">Attic Conversion <span class="sep">•</span></span>
      <span class="rs-ticker-item">Room Additions <span class="sep">•</span></span>
      <span class="rs-ticker-item">Full Home Remodel <span class="sep">•</span></span>
      <span class="rs-ticker-item">Structural Renovation <span class="sep">•</span></span>
      <span class="rs-ticker-item">Eco-Friendly Remodeling <span class="sep">•</span></span>
      <!-- Set 2 (duplicate for seamless loop) -->
      <span class="rs-ticker-item">Kitchen Remodeling <span class="sep">•</span></span>
      <span class="rs-ticker-item">Bathroom Renovation <span class="sep">•</span></span>
      <span class="rs-ticker-item">Basement Finishing <span class="sep">•</span></span>
      <span class="rs-ticker-item">Attic Conversion <span class="sep">•</span></span>
      <span class="rs-ticker-item">Room Additions <span class="sep">•</span></span>
      <span class="rs-ticker-item">Full Home Remodel <span class="sep">•</span></span>
      <span class="rs-ticker-item">Structural Renovation <span class="sep">•</span></span>
      <span class="rs-ticker-item">Eco-Friendly Remodeling <span class="sep">•</span></span>
    </div>
  </div>

  <!-- ── Services Grid ─────────────────────────────────────────── -->
  <section class="rs-services-section" id="services-grid" aria-label="Remodeling services">
    <div class="container">
      <div class="section-title" data-animate="fade-up">
        <span class="eyebrow-label">What We Do</span>
        <h2>11 Services. <span class="text-accent">One Standard.</span></h2>
        <span class="rs-section-subtitle">Complete remodeling from basement to attic — engineered for West Georgia homes.</span>
        <p class="prose prose-centered">Every project in Bowdon and Carroll County starts with a plan tailored to your home's specific layout, foundation type, and the humidity challenges Georgia's climate creates. We don't adapt a template — we build around your house.</p>
      </div>

      <div class="services-grid" data-animate="fade-up">

        <!-- Card 1: Kitchen Remodeling -->
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo02']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo02']); ?>" alt="Kitchen remodeling in Bowdon GA — custom cabinetry and tile work" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="utensils-crossed"></i></div>
            <h3>Kitchen Remodeling</h3>
            <p class="service-card__desc">Full kitchen transformations from layout redesign through final tile installation.</p>
            <ul>
              <li>Custom cabinet and tile selection</li>
              <li>Countertop and backsplash install</li>
              <li>Plumbing and electrical included</li>
            </ul>
            <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <!-- Card 2: Bathroom Remodeling -->
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo03']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo03']); ?>" alt="Bathroom remodeling Bowdon GA — custom tile shower and flooring" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="bath"></i></div>
            <h3>Bathroom Remodeling</h3>
            <p class="service-card__desc">Complete bath renovations with waterproof tile work built for Georgia's humidity.</p>
            <ul>
              <li>Waterproof shower tile systems</li>
              <li>Vanity and fixture replacement</li>
              <li>2–4 week average turnaround</li>
            </ul>
            <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <!-- Card 3: Basement Finishing -->
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo04']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo04']); ?>" alt="Basement finishing in Bowdon GA — moisture-resistant materials and custom build-out" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Basement Finishing</h3>
            <p class="service-card__desc">Turn raw basement space into functional rooms designed around Georgia's water table.</p>
            <ul>
              <li>Moisture barrier and waterproofing</li>
              <li>Framing, drywall, and flooring</li>
              <li>Carroll County permit handling</li>
            </ul>
            <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <!-- Card 4: Basement Kitchen Remodeling -->
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo01']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo01']); ?>" alt="Basement kitchen remodeling Bowdon GA — secondary kitchen installation" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="chef-hat"></i></div>
            <h3>Basement Kitchen Remodeling</h3>
            <p class="service-card__desc">Secondary kitchen installations that add real living value to finished basement spaces.</p>
            <ul>
              <li>Plumbing rough-in included</li>
              <li>Moisture-rated tile flooring</li>
              <li>$18K–$55K project range</li>
            </ul>
            <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <!-- Card 5: Attic Remodeling -->
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo05']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo05']); ?>" alt="Attic remodeling in Bowdon GA — converted to livable bedroom or office space" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="triangle"></i></div>
            <h3>Attic Remodeling</h3>
            <p class="service-card__desc">Convert unused attic space into bedrooms, offices, or storage without expanding your footprint.</p>
            <ul>
              <li>Structural assessment included</li>
              <li>HVAC extension and insulation</li>
              <li>Staircase design and build</li>
            </ul>
            <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <!-- Card 6: Room Additions -->
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo06']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo06']); ?>" alt="Room addition in Bowdon GA — seamless new construction attached to existing home" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="plus-square"></i></div>
            <h3>Room Additions</h3>
            <p class="service-card__desc">New bedrooms, sunrooms, and living spaces built to match your existing home's architecture.</p>
            <ul>
              <li>Foundation and framing work</li>
              <li>Exterior materials matched exactly</li>
              <li>Carroll County permit management</li>
            </ul>
            <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <!-- Card 7: Full Home Remodel -->
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo07']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo07']); ?>" alt="Full home remodel in Bowdon GA — complete renovation of kitchen, bathrooms, and living areas" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="home"></i></div>
            <h3>Full Home Remodel</h3>
            <p class="service-card__desc">Whole-house renovations managed as a single coordinated project with one point of contact.</p>
            <ul>
              <li>Single-crew coordination advantage</li>
              <li>Phased scheduling to keep you in</li>
              <li>Kitchen, bath, and floor combined</li>
            </ul>
            <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <!-- Card 8: Custom Remodeling -->
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo08']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo08']); ?>" alt="Custom remodeling in Bowdon GA — bespoke design and craftsmanship" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="pencil-ruler"></i></div>
            <h3>Custom Remodeling</h3>
            <p class="service-card__desc">Unique scope that doesn't fit a standard category — we design and execute from scratch.</p>
            <ul>
              <li>Design consultation included</li>
              <li>Material sourcing assistance</li>
              <li>Built around your specific vision</li>
            </ul>
            <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

      </div><!-- /.services-grid -->

      <div class="rs-view-all" data-animate="fade-up">
        <a href="/services/">View All 11 Services →</a>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="rs-divider-down" aria-hidden="true"></div>

  <!-- ── Featured: Basement Kitchen Remodeling ─────────────────── -->
  <section class="rs-featured" aria-labelledby="basement-kitchen-heading">
    <div class="container">
      <div class="rs-featured-split">

        <div class="rs-featured-img-wrap" data-animate="fade-up">
          <picture>
            <source srcset="<?php echo htmlspecialchars($clientPhotos['photo02']); ?>" type="image/jpeg">
            <img src="<?php echo htmlspecialchars($clientPhotos['photo02']); ?>" alt="Basement kitchen remodeling in Bowdon Georgia — tile flooring and custom cabinetry in finished basement" width="800" height="600" loading="lazy">
          </picture>
          <span class="rs-featured-img-badge">Primary Keyword Service</span>
        </div>

        <div class="rs-featured-content" data-animate="fade-up">
          <span class="eyebrow-label">Specialty Service</span>
          <h2 id="basement-kitchen-heading">
            <span class="text-gradient">Basement Kitchen Remodeling</span><br>Bowdon, GA
          </h2>
          <div class="prose">
            <p>Carroll County homes built in the 1970s through the 1990s often have large unfinished basements that sit unused because owners aren't sure how to handle the moisture situation. A basement kitchen in Bowdon is entirely achievable — but only when the tile selection and waterproofing approach account for Georgia's humidity cycles. We've completed over 40 basement kitchen installations in West Georgia, and the consistent lesson is that the sub-slab moisture barrier matters more than the tile itself.</p>
            <p>For basement kitchens, we specify porcelain tile with a DCOF (dynamic coefficient of friction) rating above 0.42 and grout sealant rated for below-grade applications. Many tile stores in Carrollton and Villa Rica stock materials appropriate for above-grade bathrooms — not below-grade kitchen floors that see both foot traffic and seasonal moisture migration through the slab. We source what's right, not what's convenient.</p>
            <p>A typical basement kitchen in Bowdon includes a plumbing rough-in extension from the main stack, a 20-amp dedicated circuit for appliances, and a ventilation plan tied to the existing HVAC or a supplemental unit. We handle all three trades in-house. Carroll County requires permits for any work involving plumbing and electrical in a new space — we pull them, schedule the inspections, and hand you the certificate of occupancy.</p>
          </div>
          <div class="rs-featured-cta">
            <a href="/contact/" class="rs-btn-primary">
              Get a Basement Kitchen Estimate
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="rs-divider-up" aria-hidden="true"></div>

  <!-- ── Why Choose Gray Tile ──────────────────────────────────── -->
  <section class="rs-why" aria-labelledby="why-heading">
    <div class="container">
      <div class="section-title" data-animate="fade-up">
        <span class="eyebrow-label">Why It Matters</span>
        <h2 id="why-heading">What Separates a <?php echo $yearsInBusiness; ?>-Year Business<br>from a <span class="text-accent">First-Year Crew</span></h2>
        <p class="prose prose-centered">Most remodeling callbacks are caused by skipped waterproofing, wrong tile adhesive for Georgia clay soils, or subcontractors who don't coordinate. We eliminate those failure points by keeping everything in-house.</p>
      </div>
      <div class="rs-why-grid">
        <div class="rs-why-card" data-animate="fade-up">
          <div class="rs-why-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
          </div>
          <h3>Single Crew, No Subs</h3>
          <p>One team handles tile, carpentry, and finish work. No handoff gaps or accountability confusion.</p>
        </div>
        <div class="rs-why-card" data-animate="fade-up">
          <div class="rs-why-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>
          </div>
          <h3>Georgia Climate Materials</h3>
          <p>We specify tile and grout systems rated for West Georgia's humidity swings — not generic catalog picks.</p>
        </div>
        <div class="rs-why-card" data-animate="fade-up">
          <div class="rs-why-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
          </div>
          <h3>Permit-Ready Every Time</h3>
          <p>We pull Carroll County permits for every applicable trade. No shortcuts that void your home insurance.</p>
        </div>
        <div class="rs-why-card" data-animate="fade-up">
          <div class="rs-why-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <h3>Detailed Written Schedules</h3>
          <p>You get a week-by-week project timeline before we start — not verbal guesses about how long it'll take.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="rs-divider-dark" aria-hidden="true"></div>

  <!-- ── Mid-Page CTA Banner ───────────────────────────────────── -->
  <section class="rs-cta-banner" aria-label="Get a free remodeling estimate">
    <div class="rs-cta-banner-inner" data-animate="fade-up">
      <h2>Your Remodel Starts With<br><span class="text-accent">a Single Conversation</span></h2>
      <p>Free on-site estimates across Bowdon, Carrollton, Villa Rica, Bremen, and surrounding Carroll County communities. We'll walk your space, assess the scope, and hand you a written quote — no pressure, no obligation.</p>
      <div class="rs-cta-banner-actions">
        <a href="/contact/" class="rs-btn-cta">Get Your Free Estimate →</a>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="rs-divider-from-dark" aria-hidden="true"></div>

  <!-- ── Process Section ───────────────────────────────────────── -->
  <section class="rs-process" aria-labelledby="process-heading">
    <div class="container">
      <div class="section-title" data-animate="fade-up">
        <span class="eyebrow-label">How It Works</span>
        <h2 id="process-heading">From First Call to <span class="text-accent">Final Walkthrough</span></h2>
        <p class="prose prose-centered">Every remodeling project follows the same four-phase process. It removes the uncertainty that makes home renovation stressful.</p>
      </div>
      <div class="rs-process-steps">
        <div class="rs-step" data-animate="fade-up">
          <div class="rs-step-num">1</div>
          <h3>On-Site Consultation</h3>
          <p>We assess your space, discuss scope, and identify any structural or moisture considerations specific to your home.</p>
        </div>
        <div class="rs-step" data-animate="fade-up">
          <div class="rs-step-num">2</div>
          <h3>Design & Material Plan</h3>
          <p>We build a layout plan and material specification list with cost ranges for each selection you make.</p>
        </div>
        <div class="rs-step" data-animate="fade-up">
          <div class="rs-step-num">3</div>
          <h3>Tile Selection & Ordering</h3>
          <p>We source materials from our preferred suppliers, verifying ratings for your specific application — basement, bath, or kitchen.</p>
        </div>
        <div class="rs-step" data-animate="fade-up">
          <div class="rs-step-num">4</div>
          <h3>Installation & Finishing</h3>
          <p>Our crew installs, groutes, seals, and completes every detail before the final walkthrough and sign-off.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="rs-divider-up" aria-hidden="true"></div>

  <!-- ── FAQ Section ───────────────────────────────────────────── -->
  <section class="rs-faq" aria-labelledby="faq-heading">
    <div class="container">
      <div class="section-title" data-animate="fade-up">
        <span class="eyebrow-label">Common Questions</span>
        <h2 id="faq-heading">Remodeling in <span class="text-accent">Bowdon & Carroll County</span> — Answered</h2>
      </div>
      <div class="rs-faq-list" data-animate="fade-up">
        <?php foreach ($pageFaqs as $i => $faq): ?>
        <div class="rs-faq-item" id="faq-<?php echo $i; ?>">
          <button class="rs-faq-q" aria-expanded="false" aria-controls="faq-a-<?php echo $i; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="rs-faq-a" id="faq-a-<?php echo $i; ?>" role="region">
            <?php echo htmlspecialchars($faq['a']); ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Closing CTA ───────────────────────────────────────────── -->
  <section class="rs-closing-cta" aria-label="Start your remodeling project">
    <div class="rs-closing-cta-inner" data-animate="fade-up">
      <span class="eyebrow-label" style="color: var(--color-accent);">Ready to Start?</span>
      <h2>Schedule Your Free<br>On-Site Estimate</h2>
      <p>Serving Bowdon, Carrollton, Villa Rica, Bremen, Temple, and all of Carroll County. <?php echo $yearsInBusiness; ?> years in West Georgia means we know your neighborhood's houses — their quirks, their soil, and their tile.</p>
      <a href="/contact/" class="rs-btn-cta">Start Your Project →</a>
    </div>
  </section>

</main>

<script>
// FAQ Accordion
(function () {
  document.querySelectorAll('.rs-faq-q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = this.closest('.rs-faq-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.rs-faq-item.open').forEach(function (el) {
        el.classList.remove('open');
        el.querySelector('.rs-faq-q').setAttribute('aria-expanded', 'false');
      });
      if (!isOpen) {
        item.classList.add('open');
        this.setAttribute('aria-expanded', 'true');
      }
    });
  });
}());
</script>

<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" defer></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  if (typeof lucide !== 'undefined') lucide.createIcons();
});
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
