<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'LVP Flooring Installation in Bowdon, GA | Gray Tile & Remodeling';
$pageDescription = 'LVP flooring installed in Bowdon, GA — $3–$8/sq ft, 100% waterproof, works over concrete. Best flooring choice for Georgia humidity. Carroll County free estimates.';
$canonicalUrl    = $siteUrl . '/services/lvp-flooring/';
$ogImage         = $clientPhotos['photo08'];
$heroPreloadImage = $clientPhotos['photo08'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'lvp-flooring') { $currentService = $svc; break; }
}

$pageFaqs = [
    [
        'q' => 'How much does LVP flooring cost in Bowdon, GA?',
        'a' => 'LVP flooring runs $3–$8 per square foot installed in Bowdon and Carroll County. That range covers labor, basic subfloor prep, and transitions. Budget-tier LVP (6 mil wear layer, thinner plank) lands at $3–$4. Mid-grade (12 mil wear layer, attached underlayment) runs $4–$6. Premium commercial-grade planks (20 mil) cost $6–$8. We recommend 12 mil or better for high-traffic areas.',
    ],
    [
        'q' => 'LVP vs hardwood — which is better in Georgia\'s humidity?',
        'a' => 'LVP wins in Georgia\'s climate. Solid hardwood can expand and contract 1/8"–3/8" across a 10-foot room between Georgia\'s humid summers and drier winters with heating. LVP is dimensionally stable because it\'s made from PVC — it doesn\'t absorb moisture. In Bowdon\'s older homes with less precise HVAC control, LVP holds up year after year where hardwood develops gaps or crowning.',
    ],
    [
        'q' => 'Can LVP flooring be installed over a concrete slab?',
        'a' => 'Yes — LVP is one of the best flooring choices for concrete slab homes. It floats over the surface, so it doesn\'t require adhesive. We test the slab for moisture first — Georgia slabs can wick moisture from the ground, and high vapor readings need a moisture barrier before installation. Most LVP products already include an attached underlayment that provides basic vapor protection.',
    ],
    [
        'q' => 'Is LVP flooring actually waterproof?',
        'a' => 'The LVP planks themselves are 100% waterproof — water cannot damage the core material. The caveat is the seams and edges: standing water that penetrates the click-lock joints can reach the subfloor. For bathrooms and laundry rooms, we apply a seam sealer at joints and keep baseboards and transitions properly caulked. For those areas, tile may still be a better long-term choice; we\'ll tell you which makes more sense for your specific bathroom.',
    ],
    [
        'q' => 'What are the differences in LVP brands and quality?',
        'a' => 'The two most important specs are wear layer thickness (measured in mils) and the total plank thickness. Wear layer: 6 mil for low-traffic bedrooms, 12 mil for living areas, 20 mil for kitchens or commercial use. Total thickness: thicker planks (5mm–8mm) feel more solid underfoot and hide minor subfloor imperfections better. We carry Shaw, LifeProof, and COREtec among others — we\'ll show you samples in your home before you decide.',
    ],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   LVP FLOORING — /services/lvp-flooring/index.php
   Page-specific styles. All values use var() tokens only.
   CSS prefix: .lvp-
   ================================================================ */

/* ── Hero: Asymmetric split ───────────────────────────────────── */
.lvp-hero {
  position: relative;
  min-height: 90vh;
  display: grid;
  grid-template-columns: 55% 45%;
  overflow: hidden;
}
@media (max-width: 767px) {
  .lvp-hero {
    grid-template-columns: 1fr;
    min-height: auto;
  }
}
.lvp-hero-left {
  position: relative;
  display: flex;
  align-items: center;
  background: var(--color-primary-dark);
  padding: var(--space-4xl) var(--space-3xl);
  z-index: 2;
}
.lvp-hero-left::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06;
  pointer-events: none;
}
.lvp-hero-copy {
  position: relative;
  z-index: 1;
  max-width: 480px;
}
.lvp-hero-copy h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.88) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.lvp-hero-copy .hero-lead {
  color: rgba(255,255,255,0.85);
  font-size: clamp(0.95rem, 1.8vw, 1.15rem);
  line-height: 1.7;
  margin-bottom: var(--space-2xl);
  max-width: 50ch;
}
.lvp-hero-copy .hero-cta-row {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.lvp-hero-right {
  position: relative;
  background-image: url('<?php echo $clientPhotos['photo08']; ?>');
  background-size: cover;
  background-position: center;
  min-height: 60vh;
  animation: lvp-kenburns 20s ease-in-out infinite alternate;
}
@keyframes lvp-kenburns {
  from { background-position: center 45%; background-size: 105%; }
  to   { background-position: center 55%; background-size: 115%; }
}
.lvp-hero-right::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(to right, rgba(var(--color-primary-dark-rgb), 0.4) 0%, transparent 60%);
}
.lvp-hero-price-tag {
  position: absolute;
  bottom: var(--space-2xl);
  right: var(--space-2xl);
  background: var(--color-accent);
  color: var(--color-white);
  border-radius: var(--radius-md);
  padding: var(--space-md) var(--space-xl);
  font-family: var(--font-heading);
  font-weight: 700;
  text-align: center;
  box-shadow: var(--shadow-lg);
  z-index: 2;
}
.lvp-hero-price-tag .price-val {
  font-size: 1.6rem;
  line-height: 1;
  display: block;
}
.lvp-hero-price-tag .price-desc {
  font-size: 0.8rem;
  opacity: 0.9;
  display: block;
  margin-top: var(--space-xs);
}
@media (max-width: 767px) {
  .lvp-hero-left { padding: var(--space-3xl) var(--space-xl) var(--space-2xl); }
  .lvp-hero-right { min-height: 300px; animation: none; }
  .lvp-hero-price-tag { bottom: var(--space-lg); right: var(--space-lg); }
}

/* ── Breadcrumb ───────────────────────────────────────────────── */
.lvp-breadcrumb {
  background: var(--color-bg-alt);
  padding: var(--space-md) 0;
  border-bottom: 1px solid rgba(var(--color-primary-rgb), 0.08);
}
.lvp-breadcrumb nav {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: 0.875rem;
  color: var(--color-text-light);
  flex-wrap: wrap;
}
.lvp-breadcrumb nav a { color: var(--color-accent); font-weight: 500; transition: color var(--transition-fast); }
.lvp-breadcrumb nav a:hover { color: var(--color-primary); }
.lvp-breadcrumb .bc-sep { color: var(--color-text-light); }
.lvp-breadcrumb .bc-current { color: var(--color-text); font-weight: 600; }

/* ── Eyebrow ──────────────────────────────────────────────────── */
.lvp-eyebrow {
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
.lvp-intro {
  padding: var(--section-pad);
  background: var(--color-bg);
}
@media (max-width: 767px) { .lvp-intro { padding: var(--section-pad-mobile); } }
.lvp-intro-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: center;
}
@media (max-width: 767px) { .lvp-intro-grid { grid-template-columns: 1fr; } }
.lvp-intro-copy h2 { text-wrap: balance; margin-bottom: var(--space-lg); color: var(--color-primary); }
.lvp-intro-copy .text-accent { color: var(--color-accent); -webkit-text-fill-color: var(--color-accent); }
.lvp-intro-copy p { color: var(--color-text); line-height: 1.7; margin-bottom: var(--space-md); max-width: 60ch; }
.lvp-intro-image { position: relative; }
.lvp-intro-img-wrap {
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  aspect-ratio: 4 / 3;
}
.lvp-intro-img-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

/* ── Dividers ─────────────────────────────────────────────────── */
.lvp-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.lvp-divider svg { display: block; width: 100%; height: 60px; }

/* ── Why LVP for Georgia — Editorial Split ───────────────────── */
.lvp-why {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
@media (max-width: 767px) { .lvp-why { padding: var(--section-pad-mobile); } }
.lvp-why-header { text-align: center; margin-bottom: var(--space-3xl); }
.lvp-why-header h2 { text-wrap: balance; color: var(--color-primary); margin-bottom: var(--space-md); }
.lvp-why-header p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto; }
.lvp-reasons-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-2xl);
}
@media (max-width: 767px) { .lvp-reasons-grid { grid-template-columns: 1fr; } }
.lvp-reason-card {
  background: var(--color-bg);
  border-radius: var(--radius-lg);
  padding: var(--space-2xl) var(--space-xl);
  box-shadow: var(--shadow-card);
  display: grid;
  grid-template-columns: 60px 1fr;
  gap: var(--space-lg);
  align-items: flex-start;
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.lvp-reason-card:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-lg);
}
.lvp-reason-icon {
  width: 52px;
  height: 52px;
  border-radius: var(--radius-md);
  background: rgba(var(--color-accent-rgb), 0.12);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
  flex-shrink: 0;
}
.lvp-reason-copy h3 {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
  text-wrap: balance;
}
.lvp-reason-copy p {
  font-size: 0.92rem;
  color: var(--color-text-light);
  line-height: 1.65;
  margin: 0;
}
.lvp-reason-copy .reason-stat {
  font-family: var(--font-heading);
  font-size: 1.35rem;
  font-weight: 700;
  color: var(--color-accent);
  margin-top: var(--space-md);
  display: block;
}

/* ── Process Steps ────────────────────────────────────────────── */
.lvp-process {
  padding: var(--section-pad);
  background: var(--color-bg);
}
@media (max-width: 767px) { .lvp-process { padding: var(--section-pad-mobile); } }
.lvp-process-header { text-align: center; margin-bottom: var(--space-3xl); }
.lvp-process-header h2 { text-wrap: balance; color: var(--color-primary); margin-bottom: var(--space-md); }
.lvp-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl);
  position: relative;
}
.lvp-steps::before {
  content: '';
  position: absolute;
  top: 28px;
  left: 10%;
  right: 10%;
  height: 2px;
  background: linear-gradient(90deg, var(--color-accent), rgba(var(--color-accent-rgb), 0.2));
}
@media (max-width: 767px) {
  .lvp-steps { grid-template-columns: 1fr; }
  .lvp-steps::before { display: none; }
}
@media (min-width: 768px) and (max-width: 1023px) {
  .lvp-steps { grid-template-columns: repeat(2, 1fr); }
  .lvp-steps::before { display: none; }
}
.lvp-step { text-align: center; position: relative; z-index: 1; }
.lvp-step-num {
  width: 56px; height: 56px;
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
.lvp-step h3 { font-family: var(--font-heading); font-size: 1.05rem; color: var(--color-primary); margin-bottom: var(--space-sm); text-wrap: balance; }
.lvp-step p { font-size: 0.9rem; color: var(--color-text-light); line-height: 1.6; max-width: 26ch; margin: 0 auto; }

/* ── Mid-page CTA Banner ──────────────────────────────────────── */
.lvp-cta-banner {
  padding: var(--space-4xl) var(--space-xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative;
  overflow: hidden;
  text-align: center;
}
.lvp-cta-banner::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06;
  pointer-events: none;
}
.lvp-cta-banner .container { position: relative; z-index: 1; }
.lvp-cta-banner h2 { color: var(--color-white); text-wrap: balance; margin-bottom: var(--space-md); }
.lvp-cta-banner p { color: rgba(255,255,255,0.8); max-width: 52ch; margin: 0 auto var(--space-xl); }
.lvp-cta-phone {
  display: block;
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 3vw, 2.5rem);
  font-weight: 700;
  color: var(--color-accent);
  margin-bottom: var(--space-xl);
  letter-spacing: 0.02em;
  text-decoration: none;
}
.lvp-cta-phone:hover { color: var(--color-white); }
.lvp-cta-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.lvp-faq {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
@media (max-width: 767px) { .lvp-faq { padding: var(--section-pad-mobile); } }
.lvp-faq-header { text-align: center; margin-bottom: var(--space-3xl); }
.lvp-faq-header h2 { text-wrap: balance; color: var(--color-primary); margin-bottom: var(--space-md); }
.lvp-faq-list {
  max-width: 820px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.lvp-faq-item {
  border: 1px solid rgba(var(--color-primary-rgb), 0.12);
  border-radius: var(--radius-md);
  overflow: hidden;
  background: var(--color-bg);
  transition: box-shadow var(--transition-base);
}
.lvp-faq-item:hover { box-shadow: var(--shadow-md); }
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
.lvp-related { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .lvp-related { padding: var(--section-pad-mobile); } }
.lvp-related-header { text-align: center; margin-bottom: var(--space-3xl); }
.lvp-related-header h2 { text-wrap: balance; color: var(--color-primary); }

/* ── Closing CTA ──────────────────────────────────────────────── */
.lvp-closing {
  padding: var(--section-pad);
  background: var(--color-bg-dark);
  position: relative;
  overflow: hidden;
  text-align: center;
}
@media (max-width: 767px) { .lvp-closing { padding: var(--section-pad-mobile); } }
.lvp-closing::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.05;
  pointer-events: none;
}
.lvp-closing .container { position: relative; z-index: 1; }
.lvp-closing h2 { color: var(--color-white); text-wrap: balance; margin-bottom: var(--space-md); }
.lvp-closing p { color: rgba(255,255,255,0.78); max-width: 55ch; margin: 0 auto var(--space-2xl); }
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="lvp-hero" aria-label="LVP flooring hero">
    <div class="lvp-hero-left">
      <div class="lvp-hero-copy" data-animate="fade-up">
        <h1>LVP Flooring in Bowdon, GA</h1>
        <p class="hero-lead prose">
          $3–$8 per square foot installed. 100% waterproof. Floats over concrete slabs. LVP is the most durable flooring choice for West Georgia's heat-humidity cycle — and we've been installing it across Carroll County for years.
        </p>
        <div class="hero-cta-row">
          <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Estimate</a>
          <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="btn btn-outline-white btn-lg"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
        </div>
      </div>
    </div>
    <div class="lvp-hero-right" aria-hidden="true">
      <div class="lvp-hero-price-tag">
        <span class="price-val">$3–$8</span>
        <span class="price-desc">Per sq ft installed</span>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="lvp-breadcrumb">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span class="bc-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="bc-sep" aria-hidden="true">›</span>
        <span class="bc-current" aria-current="page">LVP Flooring</span>
      </nav>
    </div>
  </div>

  <!-- ══ INTRO SPLIT ═══════════════════════════════════════════ -->
  <section class="lvp-intro" aria-label="About our LVP flooring service">
    <div class="container">
      <div class="lvp-intro-grid">
        <div class="lvp-intro-copy" data-animate="fade-up">
          <span class="lvp-eyebrow">Luxury Vinyl Plank</span>
          <h2>Built for Georgia Homes. <span class="text-accent">Priced for Real Budgets.</span></h2>
          <p class="prose">
            LVP has replaced hardwood as the go-to flooring in Carroll County for a simple reason: it performs better in Georgia's conditions. Humidity between 60–90% from May through September, slab foundations in most Bowdon homes, and homeowners who want a floor that requires nothing more than a wet mop to maintain.
          </p>
          <p class="prose">
            We stock and install brands from Shaw, LifeProof, and COREtec. We bring samples to your home so you see how colors look in your actual lighting before you commit. No showroom visits required.
          </p>
          <p class="prose" style="font-size:0.85rem;color:var(--color-text-light);">Last updated: April 2026</p>
        </div>
        <div class="lvp-intro-image" data-animate="fade-up">
          <div class="lvp-intro-img-wrap">
            <img
              src="<?php echo $clientPhotos['gallery04']; ?>"
              alt="Luxury vinyl plank LVP flooring installed in Bowdon Georgia home"
              width="800" height="600"
              loading="lazy">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="lvp-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ WHY LVP FOR GEORGIA ═══════════════════════════════════ -->
  <section class="lvp-why" aria-label="Why LVP is the right choice for Georgia homes">
    <div class="container">
      <div class="lvp-why-header" data-animate="fade-up">
        <span class="lvp-eyebrow">Georgia-Specific</span>
        <h2>Why LVP Outperforms Every Other Flooring <span class="text-accent">in Georgia's Climate</span></h2>
        <p class="prose-centered">Four reasons West Georgia homeowners choose LVP — each one directly connected to the conditions your floors face year-round.</p>
      </div>
      <div class="lvp-reasons-grid">

        <div class="lvp-reason-card" data-animate="fade-up">
          <div class="lvp-reason-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2a7 7 0 0 0-7 7c0 2.5 1.4 4.7 3.5 5.9l.5 2.1h6l.5-2.1C17.6 13.7 19 11.5 19 9a7 7 0 0 0-7-7z"/><rect x="9" y="17" width="6" height="4" rx="1"/></svg>
          </div>
          <div class="lvp-reason-copy">
            <h3>100% Humidity Resistance</h3>
            <p>PVC core material cannot absorb water. Georgia's July average indoor humidity of 65–75% causes hardwood floors to cup and gap. LVP stays flat and tight through every season.</p>
            <span class="reason-stat">0% moisture absorption</span>
          </div>
        </div>

        <div class="lvp-reason-card" data-animate="fade-up">
          <div class="lvp-reason-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><path d="M3 9h18"/><path d="M3 15h18"/></svg>
          </div>
          <div class="lvp-reason-copy">
            <h3>Concrete Slab Compatible</h3>
            <p>Most Bowdon homes sit on concrete slabs. LVP floats over the surface and handles the vapor that rises through concrete year-round — no glue, no nailing, no special prep beyond leveling.</p>
            <span class="reason-stat">No adhesive required</span>
          </div>
        </div>

        <div class="lvp-reason-card" data-animate="fade-up">
          <div class="lvp-reason-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          </div>
          <div class="lvp-reason-copy">
            <h3>Cost vs Hardwood</h3>
            <p>LVP runs 50–60% less than comparable hardwood — same look, less maintenance, better performance in humid conditions. A 1,000 sq ft installation saves $4,000–$8,000 over solid hardwood.</p>
            <span class="reason-stat">50–60% less than hardwood</span>
          </div>
        </div>

        <div class="lvp-reason-card" data-animate="fade-up">
          <div class="lvp-reason-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <div class="lvp-reason-copy">
            <h3>Durability Under Georgia Conditions</h3>
            <p>12 mil wear layer handles pet scratches, furniture drag, and the grit tracked in from Carroll County's red clay soil. Commercial-grade 20 mil products are rated for 20-plus years of residential use.</p>
            <span class="reason-stat">15–25 year lifespan</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="lvp-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,30 C300,60 900,0 1200,30 L1200,60 L0,60 Z" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ PROCESS ════════════════════════════════════════════════ -->
  <section class="lvp-process" aria-label="LVP installation process">
    <div class="container">
      <div class="lvp-process-header" data-animate="fade-up">
        <span class="lvp-eyebrow">How We Work</span>
        <h2>LVP Installation — <span class="text-accent">4 Steps, No Surprises</span></h2>
        <p class="prose-centered" style="color:var(--color-text-light);">From subfloor inspection to finished room — here's exactly how an LVP install goes in your Bowdon home.</p>
      </div>
      <div class="lvp-steps">
        <div class="lvp-step" data-animate="fade-up">
          <div class="lvp-step-num">1</div>
          <h3>Moisture Testing</h3>
          <p>Slab vapor levels checked with a meter. High readings get a moisture barrier installed first — critical step most contractors skip.</p>
        </div>
        <div class="lvp-step" data-animate="fade-up">
          <div class="lvp-step-num">2</div>
          <h3>Leveling &amp; Prep</h3>
          <p>Surface leveled to within 3/16" over 10 feet. Old adhesive removed, transitions mapped, material acclimated 48 hrs in your home.</p>
        </div>
        <div class="lvp-step" data-animate="fade-up">
          <div class="lvp-step-num">3</div>
          <h3>Floating Install</h3>
          <p>Planks click-locked from longest wall, staggered for natural look, expansion gap maintained at all walls and obstacles.</p>
        </div>
        <div class="lvp-step" data-animate="fade-up">
          <div class="lvp-step-num">4</div>
          <h3>Transitions &amp; Finish</h3>
          <p>Baseboards re-installed, all transitions fitted, room cleaned. Ready to walk on immediately after install.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="lvp-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,60 1200,0 1200,60" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,60" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ══════════════════════════════════════════ -->
  <section class="lvp-cta-banner" aria-label="Request an LVP flooring estimate">
    <div class="container">
      <h2 data-animate="fade-up">See LVP Samples in Your Home — Same Week</h2>
      <p class="prose-centered" data-animate="fade-up">
        We bring flooring samples to your Bowdon home, check your subfloor, and give you a written per-room quote. Most estimates completed same-week. No obligation.
      </p>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="lvp-cta-phone" data-animate="fade-up">
        <?php echo htmlspecialchars(formatPhone($phone)); ?>
      </a>
      <div class="lvp-cta-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Schedule Free Estimate</a>
        <a href="/services/flooring-installation/" class="btn btn-outline-white btn-lg">All Flooring Options</a>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="lvp-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="lvp-faq" aria-labelledby="lvp-faq-heading">
    <div class="container">
      <div class="lvp-faq-header" data-animate="fade-up">
        <span class="lvp-eyebrow">Common Questions</span>
        <h2 id="lvp-faq-heading">LVP Flooring Questions — <span class="text-accent">Honest Answers</span></h2>
      </div>
      <div class="lvp-faq-list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="lvp-faq-item">
          <button class="faq-question" aria-expanded="false" aria-controls="lvp-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="lvp-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="lvp-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,30 C300,0 900,60 1200,30 L1200,60 L0,60 Z" fill="var(--color-bg-alt)"/>
      <path d="M0,30 C300,0 900,60 1200,30 L1200,0 L0,0 Z" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ══════════════════════════════════════ -->
  <section class="lvp-related" aria-label="Related services">
    <div class="container">
      <div class="lvp-related-header" data-animate="fade-up">
        <span class="lvp-eyebrow">Keep Going</span>
        <h2>Other Services You May Need</h2>
      </div>
      <div class="services-grid">

        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo06']; ?>" alt="Professional flooring installation Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Flooring Installation</h3>
            <p class="service-card__desc">All flooring materials installed — tile, LVP, hardwood, engineered for Carroll County homes.</p>
            <ul>
              <li>All material types available</li>
              <li>Subfloor prep included</li>
              <li>Written quote before we start</li>
            </ul>
            <a href="/services/flooring-installation/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo09']; ?>" alt="Subfloor replacement service Bowdon Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hammer"></i></div>
            <h3>Subfloor Replacement</h3>
            <p class="service-card__desc">Damaged subfloor repaired before LVP or tile goes down — the foundation that matters.</p>
            <ul>
              <li>Soft spots and rot removed</li>
              <li>Level surface guaranteed</li>
              <li>Ready for LVP same week</li>
            </ul>
            <a href="/services/subfloor-replacement/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo05']; ?>" alt="Custom tile shower installation in Bowdon GA bathroom" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="droplets"></i></div>
            <h3>Custom Tile Showers</h3>
            <p class="service-card__desc">Walk-in showers and tub surrounds installed with full waterproofing in 3–5 days.</p>
            <ul>
              <li>Walk-ins from $3,500</li>
              <li>Full membrane waterproofing</li>
              <li>Pairs well with LVP bath floors</li>
            </ul>
            <a href="/services/custom-tile-showers/" class="service-card__cta">Learn more</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="lvp-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg-dark)"/>
    </svg>
  </div>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="lvp-closing" aria-label="Closing call to action">
    <div class="container">
      <div data-animate="fade-up">
        <span class="lvp-eyebrow" style="background:rgba(var(--color-accent-rgb),0.15);">Get Started</span>
        <h2>New LVP Floors — In as Few as 2 Days</h2>
        <p class="prose-centered">
          Free in-home estimate, material samples, written quote. Most Bowdon projects start within a week of estimate approval. Call us or use the contact form.
        </p>
        <div class="lvp-cta-btn-group">
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
