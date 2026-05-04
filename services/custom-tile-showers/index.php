<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Custom Tile Showers in Bowdon, GA | Gray Tile & Remodeling';
$pageDescription = 'Custom tile shower installation in Bowdon, GA — walk-ins, tub surrounds, steam showers. 3–5 day installs, waterproof systems for Georgia humidity. Free estimate.';
$canonicalUrl    = $siteUrl . '/services/custom-tile-showers/';
$ogImage         = $clientPhotos['photo05'];
$heroPreloadImage = $clientPhotos['photo05'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'custom-tile-showers') { $currentService = $svc; break; }
}

$pageFaqs = [
    [
        'q' => 'How much does a custom tile shower cost in Bowdon, GA?',
        'a' => 'A custom tile shower in Bowdon typically runs $3,500–$8,500 installed, depending on shower size, tile material, and features like built-in niches or frameless glass. Walk-in showers average $4,500–$7,000. Steam shower systems add $1,200–$2,500 on top of the base tile work.',
    ],
    [
        'q' => 'How long does a tile shower installation take?',
        'a' => 'Most custom tile showers complete in 3–5 business days. That includes demolition, waterproofing, tile setting, grouting, and final seal. Larger projects with custom mosaic work or steam systems may run 5–7 days. We give you a firm timeline before work begins.',
    ],
    [
        'q' => 'What waterproofing do you use in Georgia\'s humid climate?',
        'a' => 'We use a full waterproofing membrane system — either Schluter Kerdi or RedGard applied to every surface before tile goes down. Georgia\'s heat-and-humidity cycles are hard on adhesives, so we never skip the membrane step. Grout is sealed with a penetrating sealer, and all joints use 100% silicone caulk instead of grout at corners and changes of plane.',
    ],
    [
        'q' => 'What tile types work best in showers — porcelain vs natural stone?',
        'a' => 'Porcelain is the stronger choice for Georgia showers: it\'s dense, absorbs almost zero moisture, and won\'t stain if grout sealant wears thin. Natural stone (marble, travertine) looks premium but requires more maintenance — resealing every 6–12 months in humid bathrooms. We install both; we just make sure you understand the maintenance difference before you choose.',
    ],
    [
        'q' => 'How do I maintain grout in a humid Georgia bathroom?',
        'a' => 'Seal your grout lines once a year with a penetrating sealer, run exhaust fans during and for 15 minutes after every shower, and wipe down glass or tile walls after use. In Carroll County\'s humid summers, unsealed grout absorbs moisture and grows mildew fast. We apply a premium sealer at project completion and include written care instructions with every job.',
    ],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   CUSTOM TILE SHOWERS — /services/custom-tile-showers/index.php
   Page-specific styles. All values use var() tokens only.
   CSS prefix: .cts-
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.cts-hero {
  position: relative;
  min-height: 90vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo05']; ?>');
  background-size: cover;
  background-position: center 30%;
  background-repeat: no-repeat;
  animation: cts-kenburns 20s ease-in-out infinite alternate;
}
@keyframes cts-kenburns {
  from { background-size: 110%; background-position: center top; }
  to   { background-size: 120%; background-position: center bottom; }
}
.cts-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    120deg,
    rgba(var(--color-primary-rgb), 0.90) 0%,
    rgba(var(--color-primary-dark-rgb), 0.65) 55%,
    rgba(var(--color-accent-rgb), 0.20) 100%
  );
  z-index: 1;
}
.cts-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04;
  z-index: 2;
  pointer-events: none;
}
.cts-hero .cts-hero-inner {
  position: relative;
  z-index: 3;
  padding: var(--space-4xl) 0 var(--space-3xl);
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: center;
}
@media (max-width: 767px) {
  .cts-hero { min-height: 70vh; animation: none; }
  .cts-hero .cts-hero-inner {
    grid-template-columns: 1fr;
    padding: var(--space-3xl) 0 var(--space-2xl);
  }
}
.cts-hero-copy h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.9) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.cts-hero-copy .hero-lead {
  color: rgba(255,255,255,0.88);
  font-size: clamp(1rem, 2vw, 1.2rem);
  line-height: 1.65;
  margin-bottom: var(--space-2xl);
  max-width: 52ch;
}
.cts-hero-copy .hero-cta-row {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.cts-hero-stat-card {
  background: rgba(255,255,255,0.08);
  border: 1px solid rgba(255,255,255,0.15);
  border-radius: var(--radius-lg);
  padding: var(--space-2xl);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  text-align: center;
  display: flex;
  flex-direction: column;
  gap: var(--space-lg);
}
.cts-hero-stat-card .stat-num {
  font-family: var(--font-heading);
  font-size: clamp(2.8rem, 5vw, 4rem);
  font-weight: 700;
  color: var(--color-accent);
  line-height: 1;
}
.cts-hero-stat-card .stat-label {
  color: rgba(255,255,255,0.82);
  font-size: 0.95rem;
  line-height: 1.45;
}
.cts-hero-stat-card .stat-divider {
  width: 40px;
  height: 2px;
  background: var(--color-accent);
  margin: 0 auto;
}
@media (max-width: 767px) {
  .cts-hero-stat-card { display: none; }
}

/* ── Breadcrumb ───────────────────────────────────────────────── */
.cts-breadcrumb {
  background: var(--color-bg-alt);
  padding: var(--space-md) 0;
  border-bottom: 1px solid rgba(var(--color-primary-rgb), 0.08);
}
.cts-breadcrumb nav {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: 0.875rem;
  color: var(--color-text-light);
  flex-wrap: wrap;
}
.cts-breadcrumb nav a {
  color: var(--color-accent);
  font-weight: 500;
  transition: color var(--transition-fast);
}
.cts-breadcrumb nav a:hover { color: var(--color-primary); }
.cts-breadcrumb .bc-sep { color: var(--color-text-light); }
.cts-breadcrumb .bc-current { color: var(--color-text); font-weight: 600; }

/* ── Intro Split ──────────────────────────────────────────────── */
.cts-intro {
  padding: var(--section-pad);
  background: var(--color-bg);
}
@media (max-width: 767px) { .cts-intro { padding: var(--section-pad-mobile); } }
.cts-intro-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: center;
}
@media (max-width: 767px) { .cts-intro-grid { grid-template-columns: 1fr; } }
.cts-intro-copy .eyebrow-label {
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
.cts-intro-copy h2 {
  text-wrap: balance;
  margin-bottom: var(--space-lg);
  color: var(--color-primary);
}
.cts-intro-copy .text-accent {
  color: var(--color-accent);
  -webkit-text-fill-color: var(--color-accent);
}
.cts-intro-copy p {
  color: var(--color-text);
  line-height: 1.7;
  margin-bottom: var(--space-md);
  max-width: 60ch;
}
.cts-intro-meta {
  display: flex;
  gap: var(--space-lg);
  margin-top: var(--space-xl);
  flex-wrap: wrap;
}
.cts-intro-meta-item {
  display: flex;
  flex-direction: column;
  gap: var(--space-xs);
}
.cts-intro-meta-item .meta-val {
  font-family: var(--font-heading);
  font-size: 1.4rem;
  font-weight: 700;
  color: var(--color-accent);
}
.cts-intro-meta-item .meta-desc {
  font-size: 0.85rem;
  color: var(--color-text-light);
}
.cts-intro-image {
  position: relative;
}
.cts-intro-image-wrap {
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  aspect-ratio: 4 / 3;
}
.cts-intro-image-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.cts-intro-image-badge {
  position: absolute;
  bottom: calc(-1 * var(--space-lg));
  left: calc(-1 * var(--space-lg));
  background: var(--color-accent);
  color: var(--color-white);
  border-radius: var(--radius-md);
  padding: var(--space-md) var(--space-lg);
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  box-shadow: var(--shadow-lg);
  z-index: 2;
}
@media (max-width: 767px) {
  .cts-intro-image-badge { bottom: var(--space-md); left: var(--space-md); }
}

/* ── Dividers ─────────────────────────────────────────────────── */
.cts-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.cts-divider svg { display: block; width: 100%; height: 60px; }

/* ── Shower Types Featured Section ───────────────────────────── */
.cts-types {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
@media (max-width: 767px) { .cts-types { padding: var(--section-pad-mobile); } }
.cts-types-header {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.cts-types-header h2 {
  text-wrap: balance;
  color: var(--color-primary);
  margin-bottom: var(--space-md);
}
.cts-types-header .section-subtitle {
  color: var(--color-text-light);
  font-size: 1.05rem;
  max-width: 55ch;
  margin: 0 auto;
}
.cts-types-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-lg);
}
@media (max-width: 1023px) { .cts-types-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px)  { .cts-types-grid { grid-template-columns: 1fr; } }
.cts-type-card {
  background: var(--color-bg);
  border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg);
  box-shadow: var(--shadow-card);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
  position: relative;
  border-top: 3px solid transparent;
}
.cts-type-card:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-lg);
  border-top-color: var(--color-accent);
}
.cts-type-card-icon {
  width: 52px;
  height: 52px;
  border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.12);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
  margin-bottom: var(--space-lg);
}
.cts-type-card h3 {
  font-family: var(--font-heading);
  font-size: 1.15rem;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
  text-wrap: balance;
}
.cts-type-card .card-price {
  font-family: var(--font-heading);
  font-size: 0.9rem;
  font-weight: 700;
  color: var(--color-accent);
  margin-bottom: var(--space-md);
  text-transform: uppercase;
  letter-spacing: 0.04em;
}
.cts-type-card p {
  font-size: 0.93rem;
  color: var(--color-text-light);
  line-height: 1.6;
  margin: 0;
}
.cts-type-card ul {
  list-style: none;
  padding: 0;
  margin: var(--space-md) 0 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-xs);
}
.cts-type-card ul li {
  font-size: 0.875rem;
  color: var(--color-text);
  padding-left: var(--space-lg);
  position: relative;
}
.cts-type-card ul li::before {
  content: '✓';
  position: absolute;
  left: 0;
  color: var(--color-accent);
  font-weight: 700;
}

/* ── Process Section ──────────────────────────────────────────── */
.cts-process {
  padding: var(--section-pad);
  background: var(--color-bg);
}
@media (max-width: 767px) { .cts-process { padding: var(--section-pad-mobile); } }
.cts-process-header {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.cts-process-header h2 { text-wrap: balance; color: var(--color-primary); margin-bottom: var(--space-md); }
.cts-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl);
  position: relative;
}
.cts-steps::before {
  content: '';
  position: absolute;
  top: 28px;
  left: 10%;
  right: 10%;
  height: 2px;
  background: linear-gradient(90deg, var(--color-accent), rgba(var(--color-accent-rgb), 0.3));
  z-index: 0;
}
@media (max-width: 767px) {
  .cts-steps { grid-template-columns: 1fr; }
  .cts-steps::before { display: none; }
}
@media (min-width: 768px) and (max-width: 1023px) {
  .cts-steps { grid-template-columns: repeat(2, 1fr); }
  .cts-steps::before { display: none; }
}
.cts-step {
  text-align: center;
  position: relative;
  z-index: 1;
}
.cts-step-num {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  background: var(--color-accent);
  color: var(--color-white);
  font-family: var(--font-heading);
  font-size: 1.3rem;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-lg);
  box-shadow: var(--shadow-md);
}
.cts-step h3 {
  font-family: var(--font-heading);
  font-size: 1.05rem;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
  text-wrap: balance;
}
.cts-step p {
  font-size: 0.9rem;
  color: var(--color-text-light);
  line-height: 1.6;
  max-width: 26ch;
  margin: 0 auto;
}

/* ── Mid-page CTA Banner ──────────────────────────────────────── */
.cts-cta-banner {
  padding: var(--space-4xl) var(--space-xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative;
  overflow: hidden;
  text-align: center;
}
.cts-cta-banner::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06;
  pointer-events: none;
}
.cts-cta-banner .container { position: relative; z-index: 1; }
.cts-cta-banner h2 { color: var(--color-white); text-wrap: balance; margin-bottom: var(--space-md); }
.cts-cta-banner p { color: rgba(255,255,255,0.8); max-width: 52ch; margin: 0 auto var(--space-xl); }
.cts-cta-phone {
  display: block;
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 3vw, 2.5rem);
  font-weight: 700;
  color: var(--color-accent);
  margin-bottom: var(--space-xl);
  letter-spacing: 0.02em;
  text-decoration: none;
}
.cts-cta-phone:hover { color: var(--color-white); }
.cts-cta-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ Section ──────────────────────────────────────────────── */
.cts-faq {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
@media (max-width: 767px) { .cts-faq { padding: var(--section-pad-mobile); } }
.cts-faq-header { text-align: center; margin-bottom: var(--space-3xl); }
.cts-faq-header h2 { text-wrap: balance; color: var(--color-primary); margin-bottom: var(--space-md); }
.cts-faq-list {
  max-width: 820px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.cts-faq-item {
  border: 1px solid rgba(var(--color-primary-rgb), 0.12);
  border-radius: var(--radius-md);
  overflow: hidden;
  background: var(--color-bg);
  transition: box-shadow var(--transition-base);
}
.cts-faq-item:hover { box-shadow: var(--shadow-md); }
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
  width: 22px;
  height: 22px;
  border-radius: 50%;
  border: 2px solid currentColor;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform var(--transition-base);
  font-size: 1rem;
  line-height: 1;
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
.cts-related {
  padding: var(--section-pad);
  background: var(--color-bg);
}
@media (max-width: 767px) { .cts-related { padding: var(--section-pad-mobile); } }
.cts-related-header { text-align: center; margin-bottom: var(--space-3xl); }
.cts-related-header h2 { text-wrap: balance; color: var(--color-primary); }

/* ── Closing CTA ──────────────────────────────────────────────── */
.cts-closing {
  padding: var(--section-pad);
  background: var(--color-bg-dark);
  position: relative;
  overflow: hidden;
  text-align: center;
}
@media (max-width: 767px) { .cts-closing { padding: var(--section-pad-mobile); } }
.cts-closing::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.05;
  pointer-events: none;
}
.cts-closing .container { position: relative; z-index: 1; }
.cts-closing h2 { color: var(--color-white); text-wrap: balance; margin-bottom: var(--space-md); }
.cts-closing p { color: rgba(255,255,255,0.78); max-width: 55ch; margin: 0 auto var(--space-2xl); }
.cts-closing .eyebrow-label {
  display: inline-block;
  font-family: var(--font-heading);
  font-size: 0.78rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.12em;
  color: var(--color-accent);
  background: rgba(var(--color-accent-rgb), 0.15);
  padding: var(--space-xs) var(--space-md);
  border-radius: var(--radius-full);
  margin-bottom: var(--space-md);
}
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="cts-hero" aria-label="Custom tile showers hero">
    <div class="cts-hero-inner container">
      <div class="cts-hero-copy" data-animate="fade-up">
        <h1>Custom Tile Showers in Bowdon, GA</h1>
        <p class="hero-lead prose">
          Installed in 3–5 days. Walk-ins from $3,500, tub surrounds from $2,200 — fully waterproofed for Georgia's humidity. Gray Tile has been building custom showers in Carroll County for 25 years.
        </p>
        <div class="hero-cta-row">
          <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Estimate</a>
          <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="btn btn-outline-white btn-lg"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
        </div>
      </div>
      <div class="cts-hero-stat-card" data-animate="fade-up">
        <div>
          <div class="stat-num">3–5</div>
          <div class="stat-label">Day average install<br>start to final seal</div>
        </div>
        <div class="stat-divider"></div>
        <div>
          <div class="stat-num">25</div>
          <div class="stat-label">Years of shower installs<br>in Carroll County</div>
        </div>
        <div class="stat-divider"></div>
        <div>
          <div class="stat-num">100%</div>
          <div class="stat-label">Waterproofed with<br>full membrane system</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="cts-breadcrumb">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span class="bc-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="bc-sep" aria-hidden="true">›</span>
        <span class="bc-current" aria-current="page">Custom Tile Showers</span>
      </nav>
    </div>
  </div>

  <!-- ══ INTRO SPLIT ═══════════════════════════════════════════ -->
  <section class="cts-intro" aria-label="About our custom tile shower service">
    <div class="container">
      <div class="cts-intro-grid">
        <div class="cts-intro-copy" data-animate="fade-up">
          <span class="eyebrow-label">Tile Shower Specialists</span>
          <h2>Built for Georgia's Climate. <span class="text-accent">Finished to Last.</span></h2>
          <p class="prose">
            A custom tile shower in a Bowdon home faces real challenges: 100-degree summers, high humidity from June through September, and the freeze-thaw cycles West Georgia gets in January. We build every shower to handle all of it — waterproofing membrane, premium-grade grout, 100% silicone at every joint change. No shortcuts in the layers you can't see.
          </p>
          <p class="prose">
            Materials, design, and labor are all in-house. You deal with one person from estimate to final walkthrough — no subcontractors, no miscommunication. Most walk-in showers are complete in 3–5 business days, tub surrounds in 2–3 days.
          </p>
          <p class="prose" style="font-size:0.85rem;color:var(--color-text-light);">Last updated: April 2026</p>
          <div class="cts-intro-meta">
            <div class="cts-intro-meta-item">
              <span class="meta-val">$3,500+</span>
              <span class="meta-desc">Walk-in showers installed</span>
            </div>
            <div class="cts-intro-meta-item">
              <span class="meta-val">3–5 Days</span>
              <span class="meta-desc">Average install timeline</span>
            </div>
            <div class="cts-intro-meta-item">
              <span class="meta-val">25 Yrs</span>
              <span class="meta-desc">Serving Carroll County</span>
            </div>
          </div>
        </div>
        <div class="cts-intro-image" data-animate="fade-up">
          <div class="cts-intro-image-wrap">
            <img
              src="<?php echo $clientPhotos['gallery01']; ?>"
              alt="Custom tile shower installation with large format porcelain tile in Bowdon GA bathroom"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="cts-intro-image-badge">3–5 Day Install</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="cts-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ SHOWER TYPES FEATURED SECTION ════════════════════════ -->
  <section class="cts-types" aria-label="Shower types we install">
    <div class="container">
      <div class="cts-types-header" data-animate="fade-up">
        <span class="eyebrow-label">What We Build</span>
        <h2>Four Shower Types. <span class="text-accent">Every Spec Covered.</span></h2>
        <p class="section-subtitle prose-centered">From a simple tub surround refresh to a full walk-in steam system — here's what each type costs and what's included.</p>
      </div>
      <div class="cts-types-grid">

        <div class="cts-type-card" data-animate="fade-up">
          <div class="cts-type-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12H2a10 10 0 0 0 20 0h-3"/><path d="M12 2v4"/><path d="M12 18v4"/><path d="M4.93 4.93l2.83 2.83"/><path d="M16.24 16.24l2.83 2.83"/></svg>
          </div>
          <h3>Walk-In Shower</h3>
          <div class="card-price">From $3,500 installed</div>
          <p>The most requested upgrade in Bowdon. No threshold, frameless glass optional, bench or niche built in during the tile phase.</p>
          <ul>
            <li>Full waterproofing membrane</li>
            <li>Large-format tile options</li>
            <li>Built-in niche rough-in</li>
            <li>Frameless glass door ready</li>
          </ul>
        </div>

        <div class="cts-type-card" data-animate="fade-up">
          <div class="cts-type-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 6 6.5 3.5a1.5 1.5 0 0 0-1-.5C4.683 3 4 3.683 4 4.5V17a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"/><polyline points="14 2 18 6 10 14"/></svg>
          </div>
          <h3>Tub Surround</h3>
          <div class="card-price">From $2,200 installed</div>
          <p>Replace damaged or outdated tub walls with durable tile — same waterproofing standards, faster install. Subway, large-format, or mosaic.</p>
          <ul>
            <li>3-wall or 4-wall coverage</li>
            <li>RedGard or Kerdi membrane</li>
            <li>Grout color matched to your bath</li>
            <li>Complete in 2–3 days</li>
          </ul>
        </div>

        <div class="cts-type-card" data-animate="fade-up">
          <div class="cts-type-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="M12 8v4l3 3"/></svg>
          </div>
          <h3>Steam Shower</h3>
          <div class="card-price">From $5,800 installed</div>
          <p>A sealed steam enclosure requires airtight tile installation and a ceiling sloped to prevent drip. We coordinate the steam generator and plumbing rough-in as one package.</p>
          <ul>
            <li>Airtight tile enclosure</li>
            <li>Sloped ceiling (no cold drip)</li>
            <li>Steam generator plumbing</li>
            <li>Bench and niche standard</li>
          </ul>
        </div>

        <div class="cts-type-card" data-animate="fade-up">
          <div class="cts-type-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="9" y1="3" x2="9" y2="21"/></svg>
          </div>
          <h3>Frameless Glass Door</h3>
          <div class="card-price">Add $900–$2,200</div>
          <p>Frameless glass is the single upgrade that changes how a bathroom feels most. We handle the tile opening prep and coordinate glass installation so the reveal is flush.</p>
          <ul>
            <li>Opening sized to spec</li>
            <li>Curb or curbless options</li>
            <li>3/8" or 1/2" glass available</li>
            <li>Coordinated with tile phase</li>
          </ul>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="cts-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,30 C300,60 900,0 1200,30 L1200,60 L0,60 Z" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ PROCESS ════════════════════════════════════════════════ -->
  <section class="cts-process" aria-label="Our installation process">
    <div class="container">
      <div class="cts-process-header" data-animate="fade-up">
        <span class="eyebrow-label" style="display:inline-block;font-family:var(--font-heading);font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:var(--color-accent);background:rgba(var(--color-accent-rgb),0.1);padding:var(--space-xs) var(--space-md);border-radius:var(--radius-full);margin-bottom:var(--space-md);">How We Work</span>
        <h2>From Demo to Done — <span class="text-accent">4 Steps</span></h2>
        <p class="prose-centered" style="color:var(--color-text-light);">A clear process means no surprises mid-project. Here's exactly what happens from the day we start to the day we hand you the keys.</p>
      </div>
      <div class="cts-steps">
        <div class="cts-step" data-animate="fade-up">
          <div class="cts-step-num">1</div>
          <h3>Demo &amp; Waterproof</h3>
          <p>Old surround removed, substrate inspected for rot or mold, waterproofing membrane installed on walls and floor pan.</p>
        </div>
        <div class="cts-step" data-animate="fade-up">
          <div class="cts-step-num">2</div>
          <h3>Tile Setting</h3>
          <p>Walls tiled from centerline out, floor sloped toward drain, all movement joints filled with silicone — not grout.</p>
        </div>
        <div class="cts-step" data-animate="fade-up">
          <div class="cts-step-num">3</div>
          <h3>Grouting &amp; Sealing</h3>
          <p>Grout mixed and applied, joints tooled clean, then sealed with a penetrating sealer within 24 hours of cure.</p>
        </div>
        <div class="cts-step" data-animate="fade-up">
          <div class="cts-step-num">4</div>
          <h3>Final Walkthrough</h3>
          <p>You inspect every inch with us before we leave. Written care instructions included. No outstanding punch list items at close.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="cts-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,60 1200,0 1200,60" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,60" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ══════════════════════════════════════════ -->
  <section class="cts-cta-banner" aria-label="Request a shower estimate">
    <div class="container">
      <h2 data-animate="fade-up">Your New Shower Could Be Done by Next Week</h2>
      <p class="prose-centered" data-animate="fade-up">
        Most Bowdon homeowners get a free on-site estimate within 48 hours. Call now or fill out our contact form — we'll confirm your timeline before we ask for anything else.
      </p>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="cts-cta-phone" data-animate="fade-up">
        <?php echo htmlspecialchars(formatPhone($phone)); ?>
      </a>
      <div class="cts-cta-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get Your Free Estimate</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="cts-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="cts-faq" aria-labelledby="cts-faq-heading">
    <div class="container">
      <div class="cts-faq-header" data-animate="fade-up">
        <span class="eyebrow-label" style="display:inline-block;font-family:var(--font-heading);font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:var(--color-accent);background:rgba(var(--color-accent-rgb),0.1);padding:var(--space-xs) var(--space-md);border-radius:var(--radius-full);margin-bottom:var(--space-md);">Common Questions</span>
        <h2 id="cts-faq-heading">Shower Questions — <span class="text-accent">Answered Directly</span></h2>
      </div>
      <div class="cts-faq-list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="cts-faq-item">
          <button class="faq-question" aria-expanded="false" aria-controls="cts-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="cts-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="cts-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,30 C300,0 900,60 1200,30 L1200,60 L0,60 Z" fill="var(--color-bg-alt)"/>
      <path d="M0,30 C300,0 900,60 1200,30 L1200,0 L0,0 Z" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ══════════════════════════════════════ -->
  <section class="cts-related" aria-label="Related services">
    <div class="container">
      <div class="cts-related-header" data-animate="fade-up">
        <span class="eyebrow-label" style="display:inline-block;font-family:var(--font-heading);font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:var(--color-accent);background:rgba(var(--color-accent-rgb),0.1);padding:var(--space-xs) var(--space-md);border-radius:var(--radius-full);margin-bottom:var(--space-md);">Keep Going</span>
        <h2>Other Services You May Need</h2>
      </div>
      <div class="services-grid">

        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo02']; ?>" alt="Bathroom remodeling in Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="bath"></i></div>
            <h3>Bathroom Remodeling</h3>
            <p class="service-card__desc">Complete bathroom renovations — layout, tile, fixtures, and finishes from start to finish.</p>
            <ul>
              <li>Full demo and rebuild</li>
              <li>Fixture and vanity upgrade</li>
              <li>Same team, one timeline</li>
            </ul>
            <a href="/services/bathroom-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo06']; ?>" alt="Flooring installation service Bowdon Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Flooring Installation</h3>
            <p class="service-card__desc">All flooring materials installed — tile, LVP, hardwood, and engineered for Georgia homes.</p>
            <ul>
              <li>All material types installed</li>
              <li>Subfloor prep included</li>
              <li>Bathroom and living areas</li>
            </ul>
            <a href="/services/flooring-installation/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo12']; ?>" alt="Flooring services overview Gray Tile Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="grid-3x3"></i></div>
            <h3>Flooring Services</h3>
            <p class="service-card__desc">Full flooring service group — tile, LVP, refinishing, and subfloor work under one roof.</p>
            <ul>
              <li>6 flooring service types</li>
              <li>Consultation and selection help</li>
              <li>Carroll County coverage</li>
            </ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="cts-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg-dark)"/>
    </svg>
  </div>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="cts-closing" aria-label="Closing call to action">
    <div class="container">
      <div data-animate="fade-up">
        <span class="eyebrow-label">Ready to Start?</span>
        <h2>A Custom Tile Shower Starts with a Free Estimate</h2>
        <p class="prose-centered">
          We come to your Bowdon home, measure your space, walk through your tile options, and give you a written quote — no pressure, no obligation. Most homeowners have a number in hand within 48 hours.
        </p>
        <div class="cts-cta-btn-group">
          <a href="/contact/" class="btn btn-accent btn-lg">Schedule Your Free Estimate</a>
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
