<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Flooring Installation in Bowdon, GA | Gray Tile & Remodeling';
$pageDescription = 'Professional flooring installation in Bowdon, GA — tile, LVP, hardwood, engineered hardwood. All material types, subfloor prep included. Free estimate, Carroll County.';
$canonicalUrl    = $siteUrl . '/services/flooring-installation/';
$ogImage         = $clientPhotos['photo06'];
$heroPreloadImage = $clientPhotos['photo06'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'flooring-installation') { $currentService = $svc; break; }
}

$pageFaqs = [
    [
        'q' => 'How much does flooring installation cost per square foot in Georgia?',
        'a' => 'In Bowdon and Carroll County, flooring installation runs $3–$6/sq ft for LVP, $5–$10/sq ft for porcelain or ceramic tile, and $7–$14/sq ft for solid hardwood installed. Those numbers include labor and basic subfloor prep. Subfloor replacement or leveling is quoted separately after inspection.',
    ],
    [
        'q' => 'What flooring material works best in Georgia\'s humidity?',
        'a' => 'LVP (luxury vinyl plank) handles Georgia humidity best — it\'s dimensionally stable, 100% waterproof, and won\'t cup or gap through summer-to-winter moisture swings. Porcelain tile is an equally solid choice for bathrooms and kitchens. Solid hardwood is beautiful but requires careful acclimation and HVAC control; engineered hardwood is more forgiving but still needs stable humidity.',
    ],
    [
        'q' => 'How long does floor installation take?',
        'a' => 'A 400–600 sq ft LVP or tile installation typically takes 2–3 days including prep and cleanup. Larger spaces, complex patterns, or rooms with significant subfloor work can extend to 4–5 days. We confirm the timeline in writing before we begin — not an estimate that extends after materials are on site.',
    ],
    [
        'q' => 'Do you move furniture before flooring installation?',
        'a' => 'We can move standard furniture (couches, beds, dressers) as part of the project. We do not move pianos, large appliances, or gym equipment — you\'ll need to arrange that ahead of time. We document everything we move and return it to its original position after install.',
    ],
    [
        'q' => 'What subfloor do I need for tile installation?',
        'a' => 'Tile requires a rigid, deflection-free substrate. On wood framing, we typically install 1/4" cement backer board over existing plywood before tiling. Concrete slabs need to be level (within 3/16" over 10 feet) and dry. We check moisture levels with a meter on all concrete substrates — in Georgia, vapor from slabs is a common tile failure cause that most contractors skip.',
    ],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   FLOORING INSTALLATION — /services/flooring-installation/index.php
   Page-specific styles. All values use var() tokens only.
   CSS prefix: .flri-
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.flri-hero {
  position: relative;
  min-height: 90vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo06']; ?>');
  background-size: cover;
  background-position: center 40%;
  background-repeat: no-repeat;
  animation: flri-kenburns 22s ease-in-out infinite alternate;
}
@keyframes flri-kenburns {
  from { background-size: 108%; background-position: center 35%; }
  to   { background-size: 118%; background-position: center 60%; }
}
.flri-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    150deg,
    rgba(var(--color-primary-dark-rgb), 0.92) 0%,
    rgba(var(--color-primary-rgb), 0.70) 50%,
    rgba(var(--color-accent-rgb), 0.15) 100%
  );
  z-index: 1;
}
.flri-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04;
  z-index: 2;
  pointer-events: none;
}
.flri-hero .flri-hero-inner {
  position: relative;
  z-index: 3;
  padding: var(--space-4xl) 0 var(--space-3xl);
  max-width: 720px;
}
@media (max-width: 767px) {
  .flri-hero { min-height: 70vh; animation: none; }
  .flri-hero .flri-hero-inner { padding: var(--space-3xl) 0 var(--space-2xl); }
}
.flri-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.88) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.flri-hero .hero-lead {
  color: rgba(255,255,255,0.88);
  font-size: clamp(1rem, 2vw, 1.2rem);
  line-height: 1.65;
  margin-bottom: var(--space-xl);
  max-width: 55ch;
}
.flri-hero .hero-badge-row {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
  margin-bottom: var(--space-2xl);
}
.flri-hero .hero-badge {
  background: rgba(var(--color-accent-rgb), 0.2);
  border: 1px solid rgba(var(--color-accent-rgb), 0.4);
  color: rgba(255,255,255,0.9);
  font-size: 0.82rem;
  font-family: var(--font-heading);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  padding: var(--space-xs) var(--space-md);
  border-radius: var(--radius-full);
}
.flri-hero .hero-cta-row {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}

/* ── Breadcrumb ───────────────────────────────────────────────── */
.flri-breadcrumb {
  background: var(--color-bg-alt);
  padding: var(--space-md) 0;
  border-bottom: 1px solid rgba(var(--color-primary-rgb), 0.08);
}
.flri-breadcrumb nav {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: 0.875rem;
  color: var(--color-text-light);
  flex-wrap: wrap;
}
.flri-breadcrumb nav a { color: var(--color-accent); font-weight: 500; transition: color var(--transition-fast); }
.flri-breadcrumb nav a:hover { color: var(--color-primary); }
.flri-breadcrumb .bc-sep { color: var(--color-text-light); }
.flri-breadcrumb .bc-current { color: var(--color-text); font-weight: 600; }

/* ── Shared eyebrow ───────────────────────────────────────────── */
.flri-eyebrow {
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

/* ── Intro Split ──────────────────────────────────────────────── */
.flri-intro {
  padding: var(--section-pad);
  background: var(--color-bg);
}
@media (max-width: 767px) { .flri-intro { padding: var(--section-pad-mobile); } }
.flri-intro-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: center;
}
@media (max-width: 767px) { .flri-intro-grid { grid-template-columns: 1fr; } }
.flri-intro-copy h2 { text-wrap: balance; margin-bottom: var(--space-lg); color: var(--color-primary); }
.flri-intro-copy .text-accent { color: var(--color-accent); -webkit-text-fill-color: var(--color-accent); }
.flri-intro-copy p { color: var(--color-text); line-height: 1.7; margin-bottom: var(--space-md); max-width: 60ch; }
.flri-intro-stats {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
  margin-top: var(--space-xl);
  padding-top: var(--space-xl);
  border-top: 1px solid rgba(var(--color-primary-rgb), 0.08);
}
.flri-stat { text-align: center; }
.flri-stat .stat-num {
  font-family: var(--font-heading);
  font-size: 1.8rem;
  font-weight: 700;
  color: var(--color-accent);
  display: block;
}
.flri-stat .stat-desc {
  font-size: 0.82rem;
  color: var(--color-text-light);
  line-height: 1.4;
}
.flri-intro-image-wrap {
  position: relative;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  aspect-ratio: 4 / 3;
}
.flri-intro-image-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.flri-intro-badge {
  position: absolute;
  top: var(--space-lg);
  right: calc(-1 * var(--space-md));
  background: var(--color-primary);
  color: var(--color-white);
  border-radius: var(--radius-md) 0 0 var(--radius-md);
  padding: var(--space-sm) var(--space-xl) var(--space-sm) var(--space-lg);
  font-family: var(--font-heading);
  font-size: 0.9rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  box-shadow: var(--shadow-md);
}
@media (max-width: 767px) {
  .flri-intro-badge { right: var(--space-md); border-radius: var(--radius-md); }
}

/* ── Dividers ─────────────────────────────────────────────────── */
.flri-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.flri-divider svg { display: block; width: 100%; height: 60px; }

/* ── Materials Comparison Section ────────────────────────────── */
.flri-materials {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
@media (max-width: 767px) { .flri-materials { padding: var(--section-pad-mobile); } }
.flri-materials-header {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.flri-materials-header h2 { text-wrap: balance; color: var(--color-primary); margin-bottom: var(--space-md); }
.flri-materials-header p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto; }
.flri-compare-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-lg);
}
@media (max-width: 1023px) { .flri-compare-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px)  { .flri-compare-grid { grid-template-columns: 1fr; } }
.flri-compare-card {
  background: var(--color-bg);
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-card);
  display: flex;
  flex-direction: column;
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.flri-compare-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}
.flri-compare-card-head {
  background: var(--color-primary);
  padding: var(--space-lg);
  text-align: center;
}
.flri-compare-card:nth-child(2) .flri-compare-card-head { background: var(--color-accent); }
.flri-compare-card-head h3 {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  color: var(--color-white);
  margin: 0;
  text-wrap: balance;
}
.flri-compare-card-head .price-range {
  font-size: 0.85rem;
  color: rgba(255,255,255,0.78);
  margin-top: var(--space-xs);
}
.flri-compare-card-body {
  padding: var(--space-lg);
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.flri-compare-row {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  font-size: 0.875rem;
  padding-bottom: var(--space-sm);
  border-bottom: 1px solid rgba(var(--color-primary-rgb), 0.07);
  gap: var(--space-sm);
}
.flri-compare-row:last-child { border-bottom: none; padding-bottom: 0; }
.flri-compare-row .row-label { color: var(--color-text-light); font-weight: 500; flex-shrink: 0; }
.flri-compare-row .row-val { color: var(--color-text); font-weight: 600; text-align: right; }
.flri-compare-row .row-val.good { color: #2d7d46; }
.flri-compare-row .row-val.caution { color: #a06000; }
.flri-compare-row .row-val.poor { color: #b94040; }

/* ── Process Steps ────────────────────────────────────────────── */
.flri-process {
  padding: var(--section-pad);
  background: var(--color-bg);
}
@media (max-width: 767px) { .flri-process { padding: var(--section-pad-mobile); } }
.flri-process-header { text-align: center; margin-bottom: var(--space-3xl); }
.flri-process-header h2 { text-wrap: balance; color: var(--color-primary); margin-bottom: var(--space-md); }
.flri-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl);
  position: relative;
}
.flri-steps::before {
  content: '';
  position: absolute;
  top: 28px;
  left: 10%;
  right: 10%;
  height: 2px;
  background: linear-gradient(90deg, var(--color-accent), rgba(var(--color-accent-rgb), 0.25));
  z-index: 0;
}
@media (max-width: 767px) {
  .flri-steps { grid-template-columns: 1fr; }
  .flri-steps::before { display: none; }
}
@media (min-width: 768px) and (max-width: 1023px) {
  .flri-steps { grid-template-columns: repeat(2, 1fr); }
  .flri-steps::before { display: none; }
}
.flri-step { text-align: center; position: relative; z-index: 1; }
.flri-step-num {
  width: 56px; height: 56px;
  border-radius: 50%;
  background: var(--color-primary);
  color: var(--color-white);
  font-family: var(--font-heading);
  font-size: 1.3rem;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-lg);
  box-shadow: var(--shadow-md);
  border: 3px solid var(--color-accent);
}
.flri-step h3 { font-family: var(--font-heading); font-size: 1.05rem; color: var(--color-primary); margin-bottom: var(--space-sm); text-wrap: balance; }
.flri-step p { font-size: 0.9rem; color: var(--color-text-light); line-height: 1.6; max-width: 26ch; margin: 0 auto; }

/* ── Mid-page CTA Banner ──────────────────────────────────────── */
.flri-cta-banner {
  padding: var(--space-4xl) var(--space-xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative;
  overflow: hidden;
  text-align: center;
}
.flri-cta-banner::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06;
  pointer-events: none;
}
.flri-cta-banner .container { position: relative; z-index: 1; }
.flri-cta-banner h2 { color: var(--color-white); text-wrap: balance; margin-bottom: var(--space-md); }
.flri-cta-banner p { color: rgba(255,255,255,0.8); max-width: 52ch; margin: 0 auto var(--space-xl); }
.flri-cta-phone {
  display: block;
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 3vw, 2.5rem);
  font-weight: 700;
  color: var(--color-accent);
  margin-bottom: var(--space-xl);
  letter-spacing: 0.02em;
  text-decoration: none;
}
.flri-cta-phone:hover { color: var(--color-white); }
.flri-cta-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.flri-faq {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
@media (max-width: 767px) { .flri-faq { padding: var(--section-pad-mobile); } }
.flri-faq-header { text-align: center; margin-bottom: var(--space-3xl); }
.flri-faq-header h2 { text-wrap: balance; color: var(--color-primary); margin-bottom: var(--space-md); }
.flri-faq-list {
  max-width: 820px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.flri-faq-item {
  border: 1px solid rgba(var(--color-primary-rgb), 0.12);
  border-radius: var(--radius-md);
  overflow: hidden;
  background: var(--color-bg);
  transition: box-shadow var(--transition-base);
}
.flri-faq-item:hover { box-shadow: var(--shadow-md); }
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
.faq-question:hover { background: rgba(var(--color-accent-rgb), 0.05); color: var(--color-accent); }
.faq-question[aria-expanded="true"] { background: var(--color-primary); color: var(--color-white); }
.faq-icon {
  flex-shrink: 0;
  width: 22px; height: 22px;
  border-radius: 50%;
  border: 2px solid currentColor;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform var(--transition-base);
  font-size: 1rem; line-height: 1;
}
.faq-question[aria-expanded="true"] .faq-icon { transform: rotate(45deg); }
.faq-answer {
  display: none;
  padding: 0 var(--space-xl) var(--space-lg);
  background: var(--color-bg);
  color: var(--color-text);
  font-size: 0.97rem;
  line-height: 1.7;
  border-top: 1px solid rgba(var(--color-primary-rgb), 0.08);
}
.faq-answer.is-open { display: block; }

/* ── Related Services ─────────────────────────────────────────── */
.flri-related { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .flri-related { padding: var(--section-pad-mobile); } }
.flri-related-header { text-align: center; margin-bottom: var(--space-3xl); }
.flri-related-header h2 { text-wrap: balance; color: var(--color-primary); }

/* ── Closing CTA ──────────────────────────────────────────────── */
.flri-closing {
  padding: var(--section-pad);
  background: var(--color-bg-dark);
  position: relative;
  overflow: hidden;
  text-align: center;
}
@media (max-width: 767px) { .flri-closing { padding: var(--section-pad-mobile); } }
.flri-closing::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.05;
  pointer-events: none;
}
.flri-closing .container { position: relative; z-index: 1; }
.flri-closing h2 { color: var(--color-white); text-wrap: balance; margin-bottom: var(--space-md); }
.flri-closing p { color: rgba(255,255,255,0.78); max-width: 55ch; margin: 0 auto var(--space-2xl); }
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="flri-hero" aria-label="Flooring installation hero">
    <div class="flri-hero-inner container">
      <div data-animate="fade-up">
        <h1>Flooring Installation in Bowdon, GA</h1>
        <p class="hero-lead prose">
          From $3/sq ft for LVP to $14/sq ft for solid hardwood installed — tile, LVP, engineered, and hardwood flooring for Carroll County homes. Subfloor inspection included at every estimate.
        </p>
        <div class="hero-badge-row">
          <span class="hero-badge">All Material Types</span>
          <span class="hero-badge">Subfloor Prep Included</span>
          <span class="hero-badge">25 Yrs Carroll County</span>
        </div>
        <div class="hero-cta-row">
          <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Estimate</a>
          <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="btn btn-outline-white btn-lg"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="flri-breadcrumb">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span class="bc-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="bc-sep" aria-hidden="true">›</span>
        <span class="bc-current" aria-current="page">Flooring Installation</span>
      </nav>
    </div>
  </div>

  <!-- ══ INTRO SPLIT ═══════════════════════════════════════════ -->
  <section class="flri-intro" aria-label="About our flooring installation service">
    <div class="container">
      <div class="flri-intro-grid">
        <div class="flri-intro-copy" data-animate="fade-up">
          <span class="flri-eyebrow">Flooring Installation</span>
          <h2>The Right Floor for <span class="text-accent">Georgia's Climate</span></h2>
          <p class="prose">
            Georgia floors take a beating: 90% summer humidity, air-conditioned winters, slab foundations in most Bowdon homes that draw moisture year-round. The wrong flooring choice in West Georgia shows up as warped boards, cracked tile, or popping adhesive within 2 years. We've seen every failure mode.
          </p>
          <p class="prose">
            We install tile, LVP, solid hardwood, and engineered hardwood — and we tell you upfront which one actually makes sense for your specific subfloor and room. No upselling. If LVP is the right answer for your situation, that's what we'll recommend even though hardwood costs more.
          </p>
          <p class="prose" style="font-size:0.85rem;color:var(--color-text-light);">Last updated: April 2026</p>
          <div class="flri-intro-stats">
            <div class="flri-stat">
              <span class="stat-num">$3–$14</span>
              <span class="stat-desc">Per sq ft installed by material</span>
            </div>
            <div class="flri-stat">
              <span class="stat-num">2–5</span>
              <span class="stat-desc">Day average project timeline</span>
            </div>
            <div class="flri-stat">
              <span class="stat-num">4</span>
              <span class="stat-desc">Flooring types we install</span>
            </div>
          </div>
        </div>
        <div data-animate="fade-up" style="position:relative;">
          <div class="flri-intro-image-wrap">
            <img
              src="<?php echo $clientPhotos['gallery02']; ?>"
              alt="New flooring installation in progress in Bowdon GA living room"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="flri-intro-badge">All Material Types</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="flri-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ MATERIALS COMPARISON ══════════════════════════════════ -->
  <section class="flri-materials" aria-label="Flooring materials comparison">
    <div class="container">
      <div class="flri-materials-header" data-animate="fade-up">
        <span class="flri-eyebrow">Material Comparison</span>
        <h2>Four Materials. <span class="text-accent">Which One Fits Georgia?</span></h2>
        <p class="prose-centered">Every material has a best use case. Here's how each performs in Carroll County's humidity, heat, and slab-heavy construction.</p>
      </div>
      <div class="flri-compare-grid">

        <div class="flri-compare-card" data-animate="fade-up">
          <div class="flri-compare-card-head">
            <h3>Porcelain / Ceramic Tile</h3>
            <div class="price-range">$5–$10 / sq ft installed</div>
          </div>
          <div class="flri-compare-card-body">
            <div class="flri-compare-row">
              <span class="row-label">Humidity</span>
              <span class="row-val good">Excellent</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Durability</span>
              <span class="row-val good">25–50 years</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Concrete slab</span>
              <span class="row-val good">Ideal</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Best rooms</span>
              <span class="row-val">Bath, kitchen, entry</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Maintenance</span>
              <span class="row-val good">Low — seal grout annually</span>
            </div>
          </div>
        </div>

        <div class="flri-compare-card" data-animate="fade-up">
          <div class="flri-compare-card-head">
            <h3>LVP (Luxury Vinyl Plank)</h3>
            <div class="price-range">$3–$6 / sq ft installed</div>
          </div>
          <div class="flri-compare-card-body">
            <div class="flri-compare-row">
              <span class="row-label">Humidity</span>
              <span class="row-val good">Excellent — 100% waterproof</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Durability</span>
              <span class="row-val good">15–25 years</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Concrete slab</span>
              <span class="row-val good">Yes — floats over</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Best rooms</span>
              <span class="row-val">Any room in the house</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Maintenance</span>
              <span class="row-val good">Very low</span>
            </div>
          </div>
        </div>

        <div class="flri-compare-card" data-animate="fade-up">
          <div class="flri-compare-card-head">
            <h3>Engineered Hardwood</h3>
            <div class="price-range">$6–$11 / sq ft installed</div>
          </div>
          <div class="flri-compare-card-body">
            <div class="flri-compare-row">
              <span class="row-label">Humidity</span>
              <span class="row-val caution">Good — more stable than solid</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Durability</span>
              <span class="row-val good">20–30 years</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Concrete slab</span>
              <span class="row-val caution">With moisture barrier</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Best rooms</span>
              <span class="row-val">Living, dining, bedroom</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Maintenance</span>
              <span class="row-val caution">Medium — can refinish once</span>
            </div>
          </div>
        </div>

        <div class="flri-compare-card" data-animate="fade-up">
          <div class="flri-compare-card-head">
            <h3>Solid Hardwood</h3>
            <div class="price-range">$7–$14 / sq ft installed</div>
          </div>
          <div class="flri-compare-card-body">
            <div class="flri-compare-row">
              <span class="row-label">Humidity</span>
              <span class="row-val caution">Requires HVAC control</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Durability</span>
              <span class="row-val good">50–100 years if maintained</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Concrete slab</span>
              <span class="row-val poor">Not recommended</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Best rooms</span>
              <span class="row-val">Living, dining (wood subfloor)</span>
            </div>
            <div class="flri-compare-row">
              <span class="row-label">Maintenance</span>
              <span class="row-val caution">Medium — refinish every 10–15 yrs</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="flri-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,30 C300,60 900,0 1200,30 L1200,60 L0,60 Z" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ PROCESS ════════════════════════════════════════════════ -->
  <section class="flri-process" aria-label="Installation process steps">
    <div class="container">
      <div class="flri-process-header" data-animate="fade-up">
        <span class="flri-eyebrow">How We Work</span>
        <h2>Four Steps from <span class="text-accent">Subfloor to Finished Floor</span></h2>
        <p class="prose-centered" style="color:var(--color-text-light);">Every installation — tile, LVP, or hardwood — follows the same disciplined process. The prep work is what makes the finish last.</p>
      </div>
      <div class="flri-steps">
        <div class="flri-step" data-animate="fade-up">
          <div class="flri-step-num">1</div>
          <h3>Subfloor Inspection</h3>
          <p>Moisture metered, level checked to within 3/16" over 10 ft, soft spots noted. No surprises after demo.</p>
        </div>
        <div class="flri-step" data-animate="fade-up">
          <div class="flri-step-num">2</div>
          <h3>Surface Prep</h3>
          <p>Backer board for tile, leveling compound where needed, moisture barrier for concrete slab installs.</p>
        </div>
        <div class="flri-step" data-animate="fade-up">
          <div class="flri-step-num">3</div>
          <h3>Installation</h3>
          <p>Material acclimated to your home, installed from center out or longest wall, transitions and thresholds fitted clean.</p>
        </div>
        <div class="flri-step" data-animate="fade-up">
          <div class="flri-step-num">4</div>
          <h3>Finish &amp; Cleanup</h3>
          <p>Baseboards reset or replaced, debris hauled, floors cleaned. You walk back in to a finished room.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="flri-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,60 1200,0 1200,60" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,60" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ══════════════════════════════════════════ -->
  <section class="flri-cta-banner" aria-label="Request a flooring estimate">
    <div class="container">
      <h2 data-animate="fade-up">Not Sure Which Floor Is Right for Your Bowdon Home?</h2>
      <p class="prose-centered" data-animate="fade-up">
        We come out, check your subfloor, measure the space, and give you a material recommendation backed by 25 years of Carroll County installs — then a written quote. Same-week appointments usually available.
      </p>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="flri-cta-phone" data-animate="fade-up">
        <?php echo htmlspecialchars(formatPhone($phone)); ?>
      </a>
      <div class="flri-cta-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Schedule Free Estimate</a>
        <a href="/services/flooring-services/" class="btn btn-outline-white btn-lg">All Flooring Services</a>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="flri-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="flri-faq" aria-labelledby="flri-faq-heading">
    <div class="container">
      <div class="flri-faq-header" data-animate="fade-up">
        <span class="flri-eyebrow">Common Questions</span>
        <h2 id="flri-faq-heading">Flooring Questions — <span class="text-accent">Straight Answers</span></h2>
      </div>
      <div class="flri-faq-list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="flri-faq-item">
          <button class="faq-question" aria-expanded="false" aria-controls="flri-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="flri-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="flri-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,30 C300,0 900,60 1200,30 L1200,60 L0,60 Z" fill="var(--color-bg-alt)"/>
      <path d="M0,30 C300,0 900,60 1200,30 L1200,0 L0,0 Z" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ══════════════════════════════════════ -->
  <section class="flri-related" aria-label="Related services">
    <div class="container">
      <div class="flri-related-header" data-animate="fade-up">
        <span class="flri-eyebrow">Keep Going</span>
        <h2>Other Services You May Need</h2>
      </div>
      <div class="services-grid">

        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo05']; ?>" alt="Custom tile shower installation Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="droplets"></i></div>
            <h3>Custom Tile Showers</h3>
            <p class="service-card__desc">Walk-in, tub surround, and steam showers — tile installed with full waterproofing.</p>
            <ul>
              <li>3–5 day installs</li>
              <li>Full membrane waterproofing</li>
              <li>From $3,500 installed</li>
            </ul>
            <a href="/services/custom-tile-showers/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo08']; ?>" alt="LVP luxury vinyl plank flooring installed in Bowdon Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>LVP Flooring</h3>
            <p class="service-card__desc">Luxury vinyl plank — the most humidity-resistant option for Georgia homes.</p>
            <ul>
              <li>$3–$8 per sq ft installed</li>
              <li>100% waterproof construction</li>
              <li>Works over concrete slabs</li>
            </ul>
            <a href="/services/lvp-flooring/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo09']; ?>" alt="Subfloor replacement service Carroll County Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hammer"></i></div>
            <h3>Subfloor Replacement</h3>
            <p class="service-card__desc">Damaged subfloor fixed before new flooring goes down — the right foundation matters.</p>
            <ul>
              <li>Rot and moisture damage repair</li>
              <li>Level surface guaranteed</li>
              <li>Tile and LVP ready after</li>
            </ul>
            <a href="/services/subfloor-replacement/" class="service-card__cta">Learn more</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="flri-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg-dark)"/>
    </svg>
  </div>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="flri-closing" aria-label="Closing call to action">
    <div class="container">
      <div data-animate="fade-up">
        <span class="flri-eyebrow" style="background:rgba(var(--color-accent-rgb),0.15);">Get Started</span>
        <h2>New Floors Start with a Free Walk-Through</h2>
        <p class="prose-centered">
          We check your subfloor, confirm your material choice, and give you a per-room written quote. No pressure, no deposit to get started. Serving Bowdon and all of Carroll County.
        </p>
        <div class="flri-cta-btn-group">
          <a href="/contact/" class="btn btn-accent btn-lg">Get Your Free Estimate</a>
          <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="btn btn-outline-white btn-lg">Call <?php echo htmlspecialchars(formatPhone($phone)); ?></a>
        </div>
      </div>
    </div>
  </section>

</main>

<script>
document.querySelectorAll('.faq-question').forEach(function(btn) {
  btn.addEventListener('click', function() {
    var expanded = this.getAttribute('aria-expanded') === 'true';
    var answer = document.getElementById(this.getAttribute('aria-controls'));
    this.setAttribute('aria-expanded', String(!expanded));
    if (answer) answer.classList.toggle('is-open', !expanded);
  });
});
if (typeof lucide !== 'undefined') lucide.createIcons();
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
