<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Subfloor Replacement in Bowdon, GA | Gray Tile & Remodeling';
$pageDescription = 'Subfloor replacement and repair in Bowdon, GA — soft spots, water damage, rot, squeaking floors fixed. Foundation for tile and LVP. Carroll County. Free estimate.';
$canonicalUrl    = $siteUrl . '/services/subfloor-replacement/';
$ogImage         = $clientPhotos['photo09'];
$heroPreloadImage = $clientPhotos['photo09'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'subfloor-replacement') { $currentService = $svc; break; }
}

$pageFaqs = [
    [
        'q' => 'What is a subfloor and why does it matter?',
        'a' => 'The subfloor is the structural layer between your floor joists and your finished flooring. In most Bowdon homes, it\'s 3/4" plywood or OSB fastened to floor joists. It has to be level, rigid, and dry for any flooring to perform — tile cracks on a subfloor that flexes, LVP develops dips where the subfloor sags, and hardwood buckles where moisture has compromised the wood. A bad subfloor is the most common cause of premature flooring failure.',
    ],
    [
        'q' => 'How much does subfloor replacement cost in Georgia?',
        'a' => 'Subfloor repair in Bowdon typically runs $3–$7 per square foot for the affected area, depending on the extent of damage, accessibility, and whether joists also need reinforcement. Spot repairs on a single soft spot may cost $300–$600. Full room replacement for a 200 sq ft bathroom runs $700–$1,500. We scope the damage before quoting — partial replacement costs significantly less than full room replacement if damage is contained.',
    ],
    [
        'q' => 'What are the signs that I need subfloor replacement?',
        'a' => 'Key signs include: soft or spongy spots when you walk (especially near toilets or under sinks), floor tiles cracking or popping loose with no impact cause, persistent squeaking that doesn\'t go away after fastening attempts, visible dips or waves in finished flooring, and a musty smell coming through floor vents. In older Bowdon homes, under-sink plumbing leaks and toilet seal failures are the two most common causes of subfloor rot.',
    ],
    [
        'q' => 'Can I install tile over a damaged or weak subfloor?',
        'a' => 'No. Tile is rigid — it will crack if the substrate flexes. TCNA guidelines require the subfloor to deflect no more than L/360 of the span. A 10-foot floor joist span can flex no more than 1/3 inch under load. Soft, damaged, or structurally compromised subfloor material fails this test immediately. Installing tile over it wastes the material and labor, and you\'ll be doing the work again in 1–3 years.',
    ],
    [
        'q' => 'How long does subfloor replacement take?',
        'a' => 'A single-room subfloor replacement (bathroom, laundry, small bedroom) typically takes 1–2 days to demo and install. Curing time for adhesives and any self-leveling compound adds 12–24 hours before the finished flooring can go down. We coordinate subfloor work directly with flooring installation so your project stays on one timeline — you don\'t need to hire separate contractors.',
    ],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   SUBFLOOR REPLACEMENT — /services/subfloor-replacement/index.php
   Page-specific styles. All values use var() tokens only.
   CSS prefix: .sbf-
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.sbf-hero {
  position: relative;
  min-height: 90vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo09']; ?>');
  background-size: cover;
  background-position: center 40%;
  background-repeat: no-repeat;
  animation: sbf-kenburns 22s ease-in-out infinite alternate;
}
@keyframes sbf-kenburns {
  from { background-size: 108%; background-position: center 38%; }
  to   { background-size: 118%; background-position: center 48%; }
}
.sbf-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    160deg,
    rgba(var(--color-primary-dark-rgb), 0.94) 0%,
    rgba(var(--color-primary-rgb), 0.65) 50%,
    rgba(var(--color-primary-rgb), 0.25) 100%
  );
  z-index: 1;
}
.sbf-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04;
  z-index: 2;
  pointer-events: none;
}
.sbf-hero .sbf-hero-inner {
  position: relative;
  z-index: 3;
  padding: var(--space-4xl) 0 var(--space-3xl);
  display: grid;
  grid-template-columns: 3fr 2fr;
  gap: var(--space-3xl);
  align-items: center;
}
@media (max-width: 767px) {
  .sbf-hero { min-height: 70vh; animation: none; }
  .sbf-hero .sbf-hero-inner {
    grid-template-columns: 1fr;
    padding: var(--space-3xl) 0 var(--space-2xl);
  }
}
.sbf-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.88) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.sbf-hero .hero-lead {
  color: rgba(255,255,255,0.88);
  font-size: clamp(0.95rem, 1.8vw, 1.15rem);
  line-height: 1.7;
  margin-bottom: var(--space-2xl);
  max-width: 55ch;
}
.sbf-hero .hero-cta-row {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.sbf-hero-warn-card {
  background: rgba(var(--color-accent-rgb), 0.12);
  border: 1px solid rgba(var(--color-accent-rgb), 0.35);
  border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg);
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
}
.sbf-hero-warn-card .warn-title {
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--color-accent);
  margin-bottom: var(--space-lg);
  display: flex;
  align-items: center;
  gap: var(--space-sm);
}
.sbf-hero-warn-card .warn-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.sbf-hero-warn-card .warn-list li {
  font-size: 0.88rem;
  color: rgba(255,255,255,0.82);
  padding-left: var(--space-xl);
  position: relative;
  line-height: 1.5;
}
.sbf-hero-warn-card .warn-list li::before {
  content: '⚠';
  position: absolute;
  left: 0;
  font-size: 0.8rem;
  opacity: 0.7;
}
@media (max-width: 767px) {
  .sbf-hero-warn-card { display: none; }
}

/* ── Breadcrumb ───────────────────────────────────────────────── */
.sbf-breadcrumb {
  background: var(--color-bg-alt);
  padding: var(--space-md) 0;
  border-bottom: 1px solid rgba(var(--color-primary-rgb), 0.08);
}
.sbf-breadcrumb nav {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: 0.875rem;
  color: var(--color-text-light);
  flex-wrap: wrap;
}
.sbf-breadcrumb nav a { color: var(--color-accent); font-weight: 500; transition: color var(--transition-fast); }
.sbf-breadcrumb nav a:hover { color: var(--color-primary); }
.sbf-breadcrumb .bc-sep { color: var(--color-text-light); }
.sbf-breadcrumb .bc-current { color: var(--color-text); font-weight: 600; }

/* ── Eyebrow ──────────────────────────────────────────────────── */
.sbf-eyebrow {
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
.sbf-intro {
  padding: var(--section-pad);
  background: var(--color-bg);
}
@media (max-width: 767px) { .sbf-intro { padding: var(--section-pad-mobile); } }
.sbf-intro-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: center;
}
@media (max-width: 767px) { .sbf-intro-grid { grid-template-columns: 1fr; } }
.sbf-intro-copy h2 { text-wrap: balance; margin-bottom: var(--space-lg); color: var(--color-primary); }
.sbf-intro-copy .text-accent { color: var(--color-accent); -webkit-text-fill-color: var(--color-accent); }
.sbf-intro-copy p { color: var(--color-text); line-height: 1.7; margin-bottom: var(--space-md); max-width: 60ch; }
.sbf-intro-img-wrap {
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  aspect-ratio: 4 / 3;
  position: relative;
}
.sbf-intro-img-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.sbf-intro-badge {
  position: absolute;
  bottom: var(--space-xl);
  left: calc(-1 * var(--space-md));
  background: var(--color-primary);
  color: var(--color-white);
  border-radius: 0 var(--radius-md) var(--radius-md) 0;
  padding: var(--space-sm) var(--space-xl) var(--space-sm) var(--space-lg);
  font-family: var(--font-heading);
  font-size: 0.9rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  box-shadow: var(--shadow-md);
}
@media (max-width: 767px) {
  .sbf-intro-badge { left: var(--space-md); border-radius: var(--radius-md); }
}

/* ── Dividers ─────────────────────────────────────────────────── */
.sbf-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.sbf-divider svg { display: block; width: 100%; height: 60px; }

/* ── Warning Signs — Signature Dark Section ──────────────────── */
.sbf-signs {
  padding: var(--section-pad);
  background: var(--color-bg-dark);
  position: relative;
  overflow: hidden;
}
@media (max-width: 767px) { .sbf-signs { padding: var(--section-pad-mobile); } }
.sbf-signs::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.07;
  pointer-events: none;
}
.sbf-signs .container { position: relative; z-index: 1; }
.sbf-signs-header {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.sbf-signs-header .sbf-eyebrow {
  background: rgba(var(--color-accent-rgb), 0.15);
  color: var(--color-accent);
}
.sbf-signs-header h2 {
  color: var(--color-white);
  text-wrap: balance;
  margin-bottom: var(--space-md);
}
.sbf-signs-header p { color: rgba(255,255,255,0.68); max-width: 55ch; margin: 0 auto; }
.sbf-signs-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-xl);
  margin-bottom: var(--space-3xl);
}
@media (max-width: 1023px) { .sbf-signs-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px)  { .sbf-signs-grid { grid-template-columns: 1fr; } }
.sbf-sign-card {
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg);
  transition: background var(--transition-base), transform var(--transition-base);
}
.sbf-sign-card:hover {
  background: rgba(255,255,255,0.09);
  transform: translateY(-4px);
}
.sbf-sign-card-top {
  display: flex;
  align-items: center;
  gap: var(--space-md);
  margin-bottom: var(--space-md);
}
.sbf-sign-num {
  font-family: var(--font-heading);
  font-size: 2.5rem;
  font-weight: 700;
  color: var(--color-accent);
  line-height: 1;
  flex-shrink: 0;
}
.sbf-sign-card h3 {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  color: var(--color-white);
  text-wrap: balance;
  margin: 0;
}
.sbf-sign-card p {
  font-size: 0.9rem;
  color: rgba(255,255,255,0.65);
  line-height: 1.65;
  margin: 0;
}
.sbf-sign-card .sign-action {
  margin-top: var(--space-md);
  font-size: 0.82rem;
  color: var(--color-accent);
  font-style: italic;
}
.sbf-signs-bottom-cta {
  text-align: center;
  padding-top: var(--space-2xl);
  border-top: 1px solid rgba(255,255,255,0.08);
}
.sbf-signs-bottom-cta p {
  color: rgba(255,255,255,0.72);
  max-width: 55ch;
  margin: 0 auto var(--space-xl);
}

/* ── Process Steps ────────────────────────────────────────────── */
.sbf-process {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
@media (max-width: 767px) { .sbf-process { padding: var(--section-pad-mobile); } }
.sbf-process-header { text-align: center; margin-bottom: var(--space-3xl); }
.sbf-process-header h2 { text-wrap: balance; color: var(--color-primary); margin-bottom: var(--space-md); }
.sbf-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl);
  position: relative;
}
.sbf-steps::before {
  content: '';
  position: absolute;
  top: 28px;
  left: 10%;
  right: 10%;
  height: 2px;
  background: linear-gradient(90deg, var(--color-accent), rgba(var(--color-accent-rgb), 0.2));
}
@media (max-width: 767px) {
  .sbf-steps { grid-template-columns: 1fr; }
  .sbf-steps::before { display: none; }
}
@media (min-width: 768px) and (max-width: 1023px) {
  .sbf-steps { grid-template-columns: repeat(2, 1fr); }
  .sbf-steps::before { display: none; }
}
.sbf-step { text-align: center; position: relative; z-index: 1; }
.sbf-step-num {
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
.sbf-step h3 { font-family: var(--font-heading); font-size: 1.05rem; color: var(--color-primary); margin-bottom: var(--space-sm); text-wrap: balance; }
.sbf-step p { font-size: 0.9rem; color: var(--color-text-light); line-height: 1.6; max-width: 26ch; margin: 0 auto; }

/* ── Mid-page CTA Banner ──────────────────────────────────────── */
.sbf-cta-banner {
  padding: var(--space-4xl) var(--space-xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative;
  overflow: hidden;
  text-align: center;
}
.sbf-cta-banner::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06;
  pointer-events: none;
}
.sbf-cta-banner .container { position: relative; z-index: 1; }
.sbf-cta-banner h2 { color: var(--color-white); text-wrap: balance; margin-bottom: var(--space-md); }
.sbf-cta-banner p { color: rgba(255,255,255,0.8); max-width: 52ch; margin: 0 auto var(--space-xl); }
.sbf-cta-phone {
  display: block;
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 3vw, 2.5rem);
  font-weight: 700;
  color: var(--color-accent);
  margin-bottom: var(--space-xl);
  letter-spacing: 0.02em;
  text-decoration: none;
}
.sbf-cta-phone:hover { color: var(--color-white); }
.sbf-cta-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.sbf-faq {
  padding: var(--section-pad);
  background: var(--color-bg);
}
@media (max-width: 767px) { .sbf-faq { padding: var(--section-pad-mobile); } }
.sbf-faq-header { text-align: center; margin-bottom: var(--space-3xl); }
.sbf-faq-header h2 { text-wrap: balance; color: var(--color-primary); margin-bottom: var(--space-md); }
.sbf-faq-list {
  max-width: 820px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.sbf-faq-item {
  border: 1px solid rgba(var(--color-primary-rgb), 0.12);
  border-radius: var(--radius-md);
  overflow: hidden;
  background: var(--color-bg);
  transition: box-shadow var(--transition-base);
}
.sbf-faq-item:hover { box-shadow: var(--shadow-md); }
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
.sbf-related { padding: var(--section-pad); background: var(--color-bg-alt); }
@media (max-width: 767px) { .sbf-related { padding: var(--section-pad-mobile); } }
.sbf-related-header { text-align: center; margin-bottom: var(--space-3xl); }
.sbf-related-header h2 { text-wrap: balance; color: var(--color-primary); }

/* ── Closing CTA ──────────────────────────────────────────────── */
.sbf-closing {
  padding: var(--section-pad);
  background: var(--color-bg-dark);
  position: relative;
  overflow: hidden;
  text-align: center;
}
@media (max-width: 767px) { .sbf-closing { padding: var(--section-pad-mobile); } }
.sbf-closing::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.05;
  pointer-events: none;
}
.sbf-closing .container { position: relative; z-index: 1; }
.sbf-closing h2 { color: var(--color-white); text-wrap: balance; margin-bottom: var(--space-md); }
.sbf-closing p { color: rgba(255,255,255,0.78); max-width: 55ch; margin: 0 auto var(--space-2xl); }
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="sbf-hero" aria-label="Subfloor replacement hero">
    <div class="sbf-hero-inner container">
      <div data-animate="fade-up">
        <h1>Subfloor Replacement in Bowdon, GA</h1>
        <p class="hero-lead prose">
          Soft spots, squeaking, cracked tile — the subfloor under your floor is the problem. We fix it before new flooring goes down. $3–$7 per square foot for affected area. Carroll County same-week estimates.
        </p>
        <div class="hero-cta-row">
          <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Estimate</a>
          <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="btn btn-outline-white btn-lg"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
        </div>
      </div>
      <div class="sbf-hero-warn-card" data-animate="fade-up" aria-label="Warning signs checklist">
        <div class="warn-title">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
          Signs You Have Subfloor Damage
        </div>
        <ul class="warn-list">
          <li>Soft or spongy spots underfoot</li>
          <li>Tiles cracking with no impact</li>
          <li>Persistent floor squeaking</li>
          <li>Dips or waves in flooring</li>
          <li>Musty smell from floor vents</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="sbf-breadcrumb">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span class="bc-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="bc-sep" aria-hidden="true">›</span>
        <span class="bc-current" aria-current="page">Subfloor Replacement</span>
      </nav>
    </div>
  </div>

  <!-- ══ INTRO SPLIT ═══════════════════════════════════════════ -->
  <section class="sbf-intro" aria-label="About our subfloor replacement service">
    <div class="container">
      <div class="sbf-intro-grid">
        <div class="sbf-intro-copy" data-animate="fade-up">
          <span class="sbf-eyebrow">Foundation for Every Floor</span>
          <h2>The Floor You See Is Only as Good as <span class="text-accent">What's Underneath</span></h2>
          <p class="prose">
            Most flooring failures in Bowdon homes start underground — not from the flooring material itself, but from a subfloor that's soft from moisture damage, uneven from settling, or structurally compromised from a toilet seal or sink leak that went unnoticed for months.
          </p>
          <p class="prose">
            Tile on a damaged subfloor cracks. LVP over a soft spot creates hollow-sounding dips. Hardwood over a wet subfloor buckles. The fix isn't a new floor — it's addressing the substrate first, then installing the finish material correctly. We handle both in one project.
          </p>
          <p class="prose" style="font-size:0.85rem;color:var(--color-text-light);">Last updated: April 2026</p>
        </div>
        <div data-animate="fade-up" style="position:relative;">
          <div class="sbf-intro-img-wrap">
            <img
              src="<?php echo $clientPhotos['photo10']; ?>"
              alt="Subfloor replacement in progress in Bowdon GA home bathroom"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="sbf-intro-badge">Foundation for Every Floor</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="sbf-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg-dark)"/>
    </svg>
  </div>

  <!-- ══ SIGNS — SIGNATURE SECTION (DARK) ══════════════════════ -->
  <section class="sbf-signs" aria-label="Signs your subfloor needs replacement">
    <div class="container">
      <div class="sbf-signs-header" data-animate="fade-up">
        <span class="sbf-eyebrow">Problem Diagnosis</span>
        <h2>5 Signs Your Subfloor <span class="text-accent">Needs Replacing</span></h2>
        <p class="prose-centered">Bowdon homes most often develop subfloor problems from plumbing leaks, toilet seal failures, and the vapor that rises from Carroll County's clay soil through slab foundations. Here's what to look for.</p>
      </div>
      <div class="sbf-signs-grid">

        <div class="sbf-sign-card" data-animate="fade-up">
          <div class="sbf-sign-card-top">
            <div class="sbf-sign-num">1</div>
            <h3>Soft or Spongy Spots</h3>
          </div>
          <p>The floor compresses noticeably when you walk in a specific area — most common near toilets, under sinks, or along exterior walls where rain intrusion can occur. The wood fibers have rotted or delaminated and can no longer support load.</p>
          <div class="sign-action">Action required before any flooring installation</div>
        </div>

        <div class="sbf-sign-card" data-animate="fade-up">
          <div class="sbf-sign-card-top">
            <div class="sbf-sign-num">2</div>
            <h3>Squeaking That Won't Stop</h3>
          </div>
          <p>Normal floor squeaking comes from subfloor panels rubbing against joists and can often be fixed from below with screws. But squeaking caused by subfloor rot means the material is failing at the fastener points — the screw has nothing solid to grip.</p>
          <div class="sign-action">Test by pressing firmly — if floor moves vertically, it's rotted</div>
        </div>

        <div class="sbf-sign-card" data-animate="fade-up">
          <div class="sbf-sign-card-top">
            <div class="sbf-sign-num">3</div>
            <h3>Uneven or Wavy Surface</h3>
          </div>
          <p>Subfloor panels that have absorbed moisture swell at the joints and create humps. OSB (common in 1990s–2010s Bowdon construction) swells more than plywood when wet. Visible waves across the floor almost always mean the panels need replacement.</p>
          <div class="sign-action">Leveling compound is a temporary fix only — replacement is permanent</div>
        </div>

        <div class="sbf-sign-card" data-animate="fade-up">
          <div class="sbf-sign-card-top">
            <div class="sbf-sign-num">4</div>
            <h3>Tile Cracking with No Impact</h3>
          </div>
          <p>Tile is rigid and cracks when the substrate flexes below it. If you're finding hairline or full cracks in floor tile and no one dropped anything heavy, the subfloor is deflecting more than tile adhesive can tolerate. Replacing the tile without fixing the subfloor means cracked tiles in 12–18 months.</p>
          <div class="sign-action">Check deflection: more than 3/16" over 10 feet = subfloor problem</div>
        </div>

        <div class="sbf-sign-card" data-animate="fade-up">
          <div class="sbf-sign-card-top">
            <div class="sbf-sign-num">5</div>
            <h3>Water Damage Visible Below</h3>
          </div>
          <p>Black staining on the underside of subfloor panels means mold. Dark staining on joists means prolonged moisture exposure. If you can see the crawlspace or basement, water-damaged subfloor material is obvious — and it always looks worse from above once demo starts.</p>
          <div class="sign-action">Mold present: remediation required before replacement</div>
        </div>

        <div class="sbf-sign-card" data-animate="fade-up">
          <div class="sbf-sign-card-top">
            <div class="sbf-sign-num">+</div>
            <h3>Not Sure? Get Inspected.</h3>
          </div>
          <p>Most homeowners can't see subfloor damage without lifting flooring. If your floors feel off — soft, bouncy, wavy, or you've had a water leak near that area — have us inspect before you install new flooring. Discovery cost is zero. Replacing flooring again in 2 years is not.</p>
          <div class="sign-action">Free on-site inspection with any flooring estimate</div>
        </div>

      </div>
      <div class="sbf-signs-bottom-cta" data-animate="fade-up">
        <p class="prose-centered">Subfloor damage doesn't get better on its own. The longer a soft spot stays wet, the more the rot spreads to adjacent panels and joists. Early replacement is always less expensive.</p>
        <a href="/contact/" class="btn btn-accent btn-lg">Schedule a Free Inspection</a>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="sbf-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,30 C300,60 900,0 1200,30 L1200,60 L0,60 Z" fill="var(--color-bg-dark)"/>
      <path d="M0,30 C300,60 900,0 1200,30 L1200,0 L0,0 Z" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ PROCESS ════════════════════════════════════════════════ -->
  <section class="sbf-process" aria-label="Subfloor replacement process">
    <div class="container">
      <div class="sbf-process-header" data-animate="fade-up">
        <span class="sbf-eyebrow">How We Work</span>
        <h2>Subfloor Replacement — <span class="text-accent">Step by Step</span></h2>
        <p class="prose-centered" style="color:var(--color-text-light);">From flooring removal to new subfloor installation — a process that sets up your new floor to perform for decades.</p>
      </div>
      <div class="sbf-steps">
        <div class="sbf-step" data-animate="fade-up">
          <div class="sbf-step-num">1</div>
          <h3>Flooring Removal &amp; Scope</h3>
          <p>Existing flooring removed, damage extent marked, any mold treated before new material goes in.</p>
        </div>
        <div class="sbf-step" data-animate="fade-up">
          <div class="sbf-step-num">2</div>
          <h3>Damaged Panel Removal</h3>
          <p>Affected panels cut out at joist centers. Joists inspected and sistered or reinforced if structurally compromised.</p>
        </div>
        <div class="sbf-step" data-animate="fade-up">
          <div class="sbf-step-num">3</div>
          <h3>New Subfloor Install</h3>
          <p>3/4" tongue-and-groove plywood installed, construction adhesive and screws at every joist, joints staggered for rigidity.</p>
        </div>
        <div class="sbf-step" data-animate="fade-up">
          <div class="sbf-step-num">4</div>
          <h3>Level &amp; Finish-Ready</h3>
          <p>Surface leveled to spec, transitions to adjacent subfloor feathered, moisture tested before finish flooring goes down.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="sbf-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,60 1200,0 1200,60" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,60" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ══════════════════════════════════════════ -->
  <section class="sbf-cta-banner" aria-label="Request a subfloor inspection">
    <div class="container">
      <h2 data-animate="fade-up">Soft Spot? Let Us Check It Before Your New Floor Goes Down</h2>
      <p class="prose-centered" data-animate="fade-up">
        We inspect your subfloor as part of any flooring estimate — no extra charge. If replacement is needed, you get a written scope and price before a single board comes up. Serving Bowdon and all Carroll County.
      </p>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="sbf-cta-phone" data-animate="fade-up">
        <?php echo htmlspecialchars(formatPhone($phone)); ?>
      </a>
      <div class="sbf-cta-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Schedule Free Inspection</a>
        <a href="/services/flooring-installation/" class="btn btn-outline-white btn-lg">Flooring Installation</a>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="sbf-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="sbf-faq" aria-labelledby="sbf-faq-heading">
    <div class="container">
      <div class="sbf-faq-header" data-animate="fade-up">
        <span class="sbf-eyebrow">Common Questions</span>
        <h2 id="sbf-faq-heading">Subfloor Questions — <span class="text-accent">Direct Answers</span></h2>
      </div>
      <div class="sbf-faq-list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="sbf-faq-item">
          <button class="faq-question" aria-expanded="false" aria-controls="sbf-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="sbf-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="sbf-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,30 C300,0 900,60 1200,30 L1200,60 L0,60 Z" fill="var(--color-bg)"/>
      <path d="M0,30 C300,0 900,60 1200,30 L1200,0 L0,0 Z" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ══════════════════════════════════════ -->
  <section class="sbf-related" aria-label="Related services">
    <div class="container">
      <div class="sbf-related-header" data-animate="fade-up">
        <span class="sbf-eyebrow">Next Steps</span>
        <h2>Other Services You May Need</h2>
      </div>
      <div class="services-grid">

        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo06']; ?>" alt="Flooring installation in Bowdon Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Flooring Installation</h3>
            <p class="service-card__desc">New tile, LVP, and hardwood installed after subfloor is repaired — one team for both.</p>
            <ul>
              <li>Coordinated with subfloor work</li>
              <li>All material types installed</li>
              <li>One estimate covers both</li>
            </ul>
            <a href="/services/flooring-installation/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo08']; ?>" alt="LVP luxury vinyl plank flooring Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="grid-2x2"></i></div>
            <h3>LVP Flooring</h3>
            <p class="service-card__desc">The best flooring choice after subfloor repair — waterproof, floats over concrete, no adhesive.</p>
            <ul>
              <li>$3–$8 per sq ft installed</li>
              <li>Ideal for repaired subfloors</li>
              <li>100% waterproof planks</li>
            </ul>
            <a href="/services/lvp-flooring/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo16']; ?>" alt="Framing contractor Carroll County Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hard-hat"></i></div>
            <h3>Framing Contractor</h3>
            <p class="service-card__desc">Structural framing and joist sistering when damage extends beyond the subfloor.</p>
            <ul>
              <li>Joist repair and reinforcement</li>
              <li>Load-bearing wall work</li>
              <li>Coordinated with subfloor replacement</li>
            </ul>
            <a href="/services/framing-contractor/" class="service-card__cta">Learn more</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="sbf-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-bg-alt)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg-dark)"/>
    </svg>
  </div>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="sbf-closing" aria-label="Closing call to action">
    <div class="container">
      <div data-animate="fade-up">
        <span class="sbf-eyebrow" style="background:rgba(var(--color-accent-rgb),0.15);">Get the Foundation Right</span>
        <h2>Fix the Subfloor First. Then the Floor.</h2>
        <p class="prose-centered">
          Free inspection. Written scope. One team handles subfloor and finish flooring from start to finish. No subcontractors, no scheduling gaps between phases. Serving Bowdon and Carroll County.
        </p>
        <div class="sbf-cta-btn-group">
          <a href="/contact/" class="btn btn-accent btn-lg">Schedule Free Inspection</a>
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
