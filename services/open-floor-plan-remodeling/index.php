<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Open Floor Plan Remodeling Bowdon GA | Wall Removal Carroll County';
$pageDescription = 'Remove walls and open your floor plan in 2–6 weeks in Bowdon, GA. Load-bearing engineering, Carroll County permits, beam installation, and finish work included. Call (770) 555-0000.';
$canonicalUrl    = $siteUrl . '/services/open-floor-plan-remodeling/';
$ogImage         = $clientPhotos['photo04'];
$heroPreloadImage = $clientPhotos['photo04'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'open-floor-plan-remodeling') { $currentService = $svc; break; }
}

$pageFaqs = [
    ['q' => 'How much does open floor plan remodeling cost in Georgia?',
     'a' => 'Removing a single non-load-bearing wall between a kitchen and living room in Carroll County typically runs $3,000–$7,500 including demo, structural patching, drywall, paint, and flooring repair. A load-bearing wall removal with engineered beam installation runs $8,000–$22,000 depending on span length and beam specification — larger spans require bigger beams and more substantial post footings. A full kitchen-to-living room open concept that involves two adjacent walls and one load-bearing element runs $14,000–$30,000 all-in, including all trades.'],
    ['q' => 'How do I know if my wall is load-bearing?',
     'a' => 'The most reliable method is having a licensed structural engineer review your framing plans or inspect the structure in person — which is exactly what Carroll County requires before you remove a load-bearing wall anyway. General indicators of a load-bearing wall include walls that run perpendicular to the floor joists, walls that sit above a beam or a wall directly below them on a lower floor, and walls that run through the center of the house parallel to the ridge. Kitchen-to-living room walls are frequently load-bearing in Bowdon-area homes built before 1990. We verify before any demo occurs.'],
    ['q' => 'Do I need a permit to remove a wall in Carroll County?',
     'a' => 'Yes, for any load-bearing wall removal. Carroll County requires a structural permit that includes engineer-stamped drawings showing the proposed beam, post configuration, and footing design before any structural work begins. Non-load-bearing wall removal in some cases doesn\'t require a permit, but the determination of whether a wall is load-bearing requires engineering review — so the permit process is essentially always the starting point. We handle the engineering coordination and Carroll County permit submission as part of every open floor plan project.'],
    ['q' => 'How long does an open floor plan remodel take in Bowdon?',
     'a' => 'A non-load-bearing wall removal with standard finish work takes 1–3 weeks from start to final paint. A load-bearing wall removal with beam installation and full finish work takes 3–6 weeks. The permit review period at Carroll County adds 1–3 weeks before work begins for load-bearing projects. Total project duration from initial meeting to finished space is typically 5–9 weeks for a single load-bearing wall removal project.'],
    ['q' => 'What happens to the HVAC, electrical, and plumbing that\'s in the walls?',
     'a' => 'This is the most important pre-project question on any wall removal project. Before demo, we identify every HVAC duct, electrical circuit, and plumbing line in the affected wall. Ductwork must be rerouted before the wall comes down — not after. Electrical circuits must be mapped and rerouted to the new locations. Plumbing is rarely in interior load-bearing walls, but kitchen walls often carry gas or water lines. We scope all of this during the estimate walkthrough. A wall removal project that "discovers" a duct stack behind the wall on demo day costs significantly more than one that scoped it correctly beforehand.'],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   OPEN-FLOOR-PLAN-REMODELING/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   CSS prefix: .ofp-
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.ofp-hero {
  position: relative;
  min-height: 62vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo04']; ?>');
  background-size: cover;
  background-position: center 35%;
  background-repeat: no-repeat;
}
.ofp-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(145deg, rgba(var(--color-primary-dark-rgb), 0.95) 0%, rgba(var(--color-primary-rgb), 0.72) 55%, rgba(var(--color-accent-rgb), 0.07) 100%);
  z-index: 1;
}
.ofp-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 2; pointer-events: none;
}
.ofp-hero .hero-content { position: relative; z-index: 3; padding: var(--space-4xl) 0 var(--space-3xl); max-width: 720px; }
.ofp-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.9) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  margin-bottom: var(--space-lg); text-wrap: balance;
}
.ofp-hero .hero-subhead { color: rgba(255,255,255,0.88); font-size: clamp(1rem, 2vw, 1.2rem); max-width: 58ch; margin-bottom: var(--space-2xl); line-height: 1.65; }
.ofp-hero .hero-cta-group { display: flex; gap: var(--space-md); flex-wrap: wrap; }

/* ── Breadcrumb ───────────────────────────────────────────────── */
.ofp-bc-bar { background: var(--color-bg-alt); padding: var(--space-md) 0; border-bottom: 1px solid var(--color-gray-light); }
.ofp-bc-nav { display: flex; align-items: center; gap: var(--space-sm); font-size: 0.875rem; color: var(--color-text-light); flex-wrap: wrap; }
.ofp-bc-nav a { color: var(--color-accent); font-weight: 500; }
.ofp-bc-nav a:hover { color: var(--color-primary); }
.ofp-bc-sep { color: var(--color-gray); font-size: 0.75rem; }
.ofp-bc-current { color: var(--color-text); font-weight: 600; }

/* ── Shared utilities ─────────────────────────────────────────── */
.ofp-eyebrow {
  display: inline-block; font-family: var(--font-heading); font-size: 0.78rem; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.12em; color: var(--color-accent);
  background: rgba(var(--color-accent-rgb), 0.1); padding: var(--space-xs) var(--space-md);
  border-radius: var(--radius-full); margin-bottom: var(--space-md);
}
.ofp-accent { color: var(--color-accent); }
.ofp-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.ofp-divider svg { display: block; width: 100%; height: 55px; }

/* ── Intro split ──────────────────────────────────────────────── */
.ofp-intro { padding: var(--space-3xl) 0 var(--space-2xl); background: var(--color-bg); }
.ofp-intro-inner { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3xl); align-items: start; }
@media (max-width: 899px) { .ofp-intro-inner { grid-template-columns: 1fr; } }
.ofp-intro-copy h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.ofp-intro-copy p { color: var(--color-text); font-size: 1rem; line-height: 1.7; max-width: 62ch; margin-bottom: var(--space-md); }
.ofp-intro-copy .lead-para { font-size: 1.08rem; font-weight: 500; color: var(--color-primary); border-left: 3px solid var(--color-accent); padding-left: var(--space-md); }
.ofp-last-updated { font-size: 0.8rem; color: var(--color-gray); margin-top: var(--space-md); }

/* ── Photo composition ────────────────────────────────────────── */
.ofp-photo-comp { position: relative; padding-bottom: var(--space-2xl); }
.ofp-photo-frame { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); border: 4px solid var(--color-white); aspect-ratio: 4/3; }
.ofp-photo-frame img { width: 100%; height: 100%; object-fit: cover; display: block; }
.ofp-stat-badge { position: absolute; bottom: -4px; right: -12px; background: var(--color-accent); color: var(--color-white); border-radius: var(--radius-md); padding: var(--space-md) var(--space-lg); box-shadow: var(--shadow-lg); text-align: center; min-width: 165px; z-index: 2; }
.ofp-stat-badge .stat-number { display: block; font-family: var(--font-heading); font-size: 1.15rem; font-weight: 800; line-height: 1.3; margin-bottom: var(--space-xs); }
.ofp-stat-badge .stat-label { display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; opacity: 0.92; }
.ofp-accent-strip { position: absolute; top: -8px; left: 20px; width: 56px; height: 4px; background: var(--color-accent); border-radius: var(--radius-full); }

/* ── Process editorial section (SIGNATURE — dark bg, editorial split) */
.ofp-process-editorial {
  padding: var(--section-pad); background: var(--color-primary);
  position: relative; overflow: hidden;
}
@media (max-width: 767px) { .ofp-process-editorial { padding: var(--section-pad-mobile); } }
.ofp-process-editorial::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06; pointer-events: none;
}
.ofp-editorial-inner {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: var(--space-4xl); align-items: start; position: relative; z-index: 1;
}
@media (max-width: 899px) { .ofp-editorial-inner { grid-template-columns: 1fr; } }
.ofp-editorial-copy h2 { color: var(--color-white); font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.ofp-editorial-copy p { color: rgba(255,255,255,0.78); font-size: 0.97rem; line-height: 1.7; margin-bottom: var(--space-md); max-width: 55ch; }
.ofp-pullquote {
  font-family: var(--font-heading); font-size: clamp(1.3rem, 2.5vw, 1.8rem); font-weight: 700;
  color: var(--color-accent); border-left: 4px solid var(--color-accent);
  padding-left: var(--space-lg); margin: var(--space-2xl) 0; line-height: 1.35; text-wrap: balance;
}
.ofp-steps-panel {
  background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12);
  border-radius: var(--radius-lg); padding: var(--space-2xl);
  display: flex; flex-direction: column; gap: var(--space-xl);
}
.ofp-step-item { display: flex; gap: var(--space-lg); align-items: flex-start; }
.ofp-step-num-badge {
  flex-shrink: 0; width: 40px; height: 40px; border-radius: 50%;
  background: var(--color-accent); color: var(--color-white);
  display: flex; align-items: center; justify-content: center;
  font-family: var(--font-heading); font-size: 1rem; font-weight: 800; line-height: 1;
}
.ofp-step-text h4 { color: var(--color-white); font-size: 1rem; margin-bottom: var(--space-xs); text-wrap: balance; }
.ofp-step-text p { color: rgba(255,255,255,0.7); font-size: 0.88rem; line-height: 1.6; margin: 0; }
.ofp-step-divider { border: none; border-top: 1px solid rgba(255,255,255,0.08); }

/* ── Cost breakdown strip ─────────────────────────────────────── */
.ofp-cost-strip {
  background: var(--color-bg-alt); border-top: 3px solid var(--color-accent);
  border-bottom: 1px solid var(--color-gray-light); padding: var(--space-xl) 0;
}
.ofp-cost-inner { display: flex; align-items: center; justify-content: center; gap: var(--space-3xl); flex-wrap: wrap; }
.ofp-cost-item { text-align: center; }
.ofp-cost-type { font-family: var(--font-heading); font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--color-text-light); margin-bottom: var(--space-xs); display: block; }
.ofp-cost-range { font-family: var(--font-heading); font-size: 1.5rem; font-weight: 800; color: var(--color-primary); display: block; }
.ofp-cost-note { font-size: 0.78rem; color: var(--color-text-light); display: block; margin-top: var(--space-xs); }
.ofp-cost-sep { width: 1px; height: 50px; background: var(--color-gray-light); }
@media (max-width: 767px) { .ofp-cost-sep { display: none; } .ofp-cost-inner { gap: var(--space-xl); } }

/* ── Process steps (lighter) ──────────────────────────────────── */
.ofp-process { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .ofp-process { padding: var(--section-pad-mobile); } }
.ofp-process-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl); margin-top: var(--space-2xl); }
@media (max-width: 1023px) { .ofp-process-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .ofp-process-grid { grid-template-columns: 1fr; } }
.ofp-step { background: var(--color-bg-alt); border-radius: var(--radius-lg); padding: var(--space-xl) var(--space-lg); border-top: 3px solid var(--color-accent); transition: transform var(--transition-base), box-shadow var(--transition-base); }
.ofp-step:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.ofp-step-number { font-family: var(--font-heading); font-size: 3rem; font-weight: 900; color: rgba(var(--color-accent-rgb), 0.16); line-height: 1; margin-bottom: var(--space-sm); display: block; }
.ofp-step h4 { color: var(--color-primary); font-size: 1.05rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.ofp-step p { color: var(--color-text-light); font-size: 0.9rem; line-height: 1.6; margin: 0; }

/* ── CTA banner ───────────────────────────────────────────────── */
.ofp-cta-banner { padding: var(--space-4xl) var(--space-xl); background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); position: relative; overflow: hidden; text-align: center; }
.ofp-cta-banner::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E"); opacity: 0.06; pointer-events: none; }
.ofp-cta-banner .container { position: relative; z-index: 1; }
.ofp-cta-banner h2 { color: var(--color-white); margin-bottom: var(--space-md); text-wrap: balance; }
.ofp-cta-banner p { color: rgba(255,255,255,0.82); font-size: 1.05rem; max-width: 55ch; margin: 0 auto var(--space-2xl); }
.ofp-cta-phone { display: block; font-family: var(--font-heading); font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 700; color: var(--color-accent); margin-bottom: var(--space-xl); letter-spacing: 0.02em; }
.ofp-cta-phone:hover { color: var(--color-white); }
.ofp-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.ofp-faq { padding: var(--section-pad); background: var(--color-bg-alt); }
@media (max-width: 767px) { .ofp-faq { padding: var(--section-pad-mobile); } }
.ofp-faq-list { max-width: 820px; margin: var(--space-2xl) auto 0; display: flex; flex-direction: column; gap: var(--space-md); }
.ofp-faq-item { border: 1px solid var(--color-gray-light); border-radius: var(--radius-md); overflow: hidden; transition: box-shadow var(--transition-base); }
.ofp-faq-item:hover { box-shadow: var(--shadow-md); }
.faq-question { width: 100%; background: var(--color-bg); border: none; text-align: left; padding: var(--space-lg) var(--space-xl); font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--color-primary); cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: var(--space-md); transition: background var(--transition-fast), color var(--transition-fast); }
.faq-question:hover { background: var(--color-bg-alt); color: var(--color-accent); }
.faq-question[aria-expanded="true"] { background: var(--color-primary); color: var(--color-white); }
.faq-icon { flex-shrink: 0; width: 20px; height: 20px; border-radius: 50%; border: 2px solid currentColor; display: flex; align-items: center; justify-content: center; transition: transform var(--transition-base); font-size: 1rem; line-height: 1; }
.faq-question[aria-expanded="true"] .faq-icon { transform: rotate(45deg); }
.faq-answer { display: none; padding: 0 var(--space-xl) var(--space-lg); background: var(--color-bg); color: var(--color-text); font-size: 0.97rem; line-height: 1.7; border-top: 1px solid var(--color-gray-light); }
.faq-answer.is-open { display: block; }

/* ── Closing CTA ──────────────────────────────────────────────── */
.ofp-closing { padding: var(--section-pad); background: var(--color-bg); text-align: center; }
@media (max-width: 767px) { .ofp-closing { padding: var(--section-pad-mobile); } }
.ofp-closing h2 { color: var(--color-primary); margin-bottom: var(--space-md); text-wrap: balance; }
.ofp-closing p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto var(--space-2xl); }

/* ── Secondary photo overlay ──────────────────────────────────── */
.ofp-secondary-img {
  position: absolute; bottom: var(--space-xl); left: -24px;
  width: 130px; border-radius: var(--radius-md); aspect-ratio: 1;
  overflow: hidden; border: 3px solid var(--color-white); box-shadow: var(--shadow-lg); z-index: 2;
}
.ofp-secondary-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
@media (max-width: 767px) {
  .ofp-secondary-img { display: none; }
  .ofp-hero { min-height: 70vh; }
  .ofp-hero .hero-content { padding: var(--space-3xl) 0 var(--space-2xl); }
  .ofp-stat-badge { right: 0; min-width: 135px; }
  .ofp-photo-comp { padding-bottom: var(--space-lg); }
  .ofp-editorial-inner { gap: var(--space-2xl); }
}
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="ofp-hero" aria-label="Open Floor Plan Remodeling hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">Open Floor Plan Remodeling in Bowdon, GA</h1>
      <p class="hero-subhead" data-animate="fade-up">
        Wall removal, beam installation, and full finish work — completed in 2–6 weeks
        in Carroll County. Load-bearing walls require engineering and a permit.
        We handle both. Non-load-bearing removals start for less.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get a Wall Removal Estimate</a>
        <a href="#ofp-process" class="btn btn-outline-white btn-lg">How It Works</a>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="ofp-bc-bar" aria-label="Breadcrumb">
    <div class="container">
      <nav class="ofp-bc-nav" aria-label="You are here">
        <a href="/">Home</a>
        <span class="ofp-bc-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="ofp-bc-sep" aria-hidden="true">›</span>
        <span class="ofp-bc-current" aria-current="page">Open Floor Plan Remodeling</span>
      </nav>
    </div>
  </div>

  <!-- ══ COST BREAKDOWN STRIP ══════════════════════════════════ -->
  <div class="ofp-cost-strip">
    <div class="container">
      <div class="ofp-cost-inner">
        <div class="ofp-cost-item">
          <span class="ofp-cost-type">Non-Load-Bearing Wall</span>
          <span class="ofp-cost-range">$3K–$7.5K</span>
          <span class="ofp-cost-note">Demo, patch, finish &amp; flooring repair</span>
        </div>
        <div class="ofp-cost-sep" aria-hidden="true"></div>
        <div class="ofp-cost-item">
          <span class="ofp-cost-type">Load-Bearing Removal</span>
          <span class="ofp-cost-range">$8K–$22K</span>
          <span class="ofp-cost-note">Includes engineering &amp; beam installation</span>
        </div>
        <div class="ofp-cost-sep" aria-hidden="true"></div>
        <div class="ofp-cost-item">
          <span class="ofp-cost-type">Full Open Concept Kitchen</span>
          <span class="ofp-cost-range">$14K–$30K</span>
          <span class="ofp-cost-note">Multi-wall removal, all trades included</span>
        </div>
        <div class="ofp-cost-sep" aria-hidden="true"></div>
        <div class="ofp-cost-item">
          <span class="ofp-cost-type">Timeline</span>
          <span class="ofp-cost-range">2–6 Weeks</span>
          <span class="ofp-cost-note">Permit review adds 1–3 weeks before start</span>
        </div>
      </div>
    </div>
  </div>

  <!-- ══ INTRO SPLIT ═══════════════════════════════════════════ -->
  <section class="ofp-intro" aria-labelledby="ofp-intro-heading">
    <div class="container">
      <div class="ofp-intro-inner">

        <div class="ofp-intro-copy" data-animate="fade-up">
          <span class="ofp-eyebrow">Open Floor Plans, Bowdon GA</span>
          <h2 id="ofp-intro-heading">Remove the Wall. Keep the Structural Integrity. Get the Open Plan You Want.</h2>
          <p class="lead-para prose">
            A non-load-bearing wall removal between your kitchen and living room runs $3,000–$7,500 in Carroll County, all-in. A load-bearing wall removal with engineered beam costs $8,000–$22,000 depending on span. Both can be done in 2–6 weeks once permits are in hand.
          </p>
          <p class="prose">
            Most Bowdon homes built before 1990 have their kitchen separated from the living area by at least one wall — and that wall is often load-bearing. Gray Tile has removed hundreds of walls in Carroll County homes. The process is the same every time: verify load path first, engineer the solution, permit the work, then execute.
          </p>
          <p class="prose">
            What separates a $3,000 wall removal from a $22,000 one isn't the square footage of opening — it's what's carrying load and how far it's spanning. A 10-foot span requires a different beam than a 20-foot span. The beam specification comes from the structural engineer, not from our preference. We work with Georgia-licensed engineers who have done Carroll County residential projects before.
          </p>
          <p class="prose">
            Beyond the structural work, an open floor plan project involves every trade: HVAC ductwork in the wall gets rerouted. Electrical circuits in the wall get relocated. The flooring where the wall stood needs repair or replacement to match the existing floor. Drywall, paint, and trim complete the space. We scope all of it upfront so you get one estimate for the complete job.
          </p>
          <p class="ofp-last-updated">Last updated: April 2026</p>
        </div>

        <div class="ofp-photo-comp" data-animate="fade-up">
          <div class="ofp-accent-strip"></div>
          <div class="ofp-photo-frame">
            <img
              src="<?php echo $clientPhotos['photo04']; ?>"
              alt="Open floor plan remodeling in Bowdon Georgia showing wall removal and open kitchen living room layout"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="ofp-stat-badge">
            <span class="stat-number">Wall-to-Open<br>in 2–6 Weeks</span>
            <span class="stat-label">Carroll County Permits Included</span>
          </div>
          <div class="ofp-secondary-img">
            <img
              src="<?php echo $clientPhotos['gallery04']; ?>"
              alt="Completed open concept kitchen dining living area Bowdon GA"
              width="260" height="260"
              loading="lazy">
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="ofp-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ EDITORIAL PROCESS SECTION (SIGNATURE) ═════════════════ -->
  <section class="ofp-process-editorial" id="ofp-process" aria-labelledby="ofp-editorial-heading">
    <div class="container">
      <div class="ofp-editorial-inner">
        <div class="ofp-editorial-copy" data-animate="fade-up">
          <span class="ofp-eyebrow" style="background:rgba(var(--color-accent-rgb),0.2);color:var(--color-accent);">The Reality of Wall Removal</span>
          <h2 id="ofp-editorial-heading">What Actually Happens When We Remove a Wall</h2>
          <p>Every wall removal starts the same way: we look up. The load path in a house runs from the roof down through the floors to the foundation. A wall that's in the load path is carrying weight from above. Removing it without transferring that load to a properly designed beam and post system will cause the structure above it to settle — sometimes immediately, sometimes over months.</p>
          <blockquote class="ofp-pullquote">
            "Every load-bearing wall removal we do in Bowdon gets an engineer's stamp before a hammer swings. That stamp is your protection. It's also Carroll County's requirement."
          </blockquote>
          <p>Most kitchen-to-living room walls in Carroll County homes built before 1990 are load-bearing. Most walls between dining rooms and kitchens are too. This doesn't make the project impossible — it makes it more expensive and more important to do correctly. An engineered beam and proper posts transfer the load. The opening you get is structurally sound for the life of the home.</p>
          <p>The non-structural work often surprises homeowners: HVAC supply ducts routed through the wall need to move before demo. Electrical runs that cross the opening need to be rerouted. The flooring under the wall needs to be repaired, sometimes across a large section if the floor was installed around the wall. We scope all of this at the estimate — not on demo day.</p>
        </div>
        <div class="ofp-steps-panel" data-animate="fade-up">
          <div class="ofp-step-item">
            <div class="ofp-step-num-badge">1</div>
            <div class="ofp-step-text">
              <h4>Engineering Assessment</h4>
              <p>Licensed structural engineer reviews the framing plans or inspects in person. Load path confirmed. Beam size, post configuration, and footing specification determined. This happens before anything else.</p>
            </div>
          </div>
          <hr class="ofp-step-divider">
          <div class="ofp-step-item">
            <div class="ofp-step-num-badge">2</div>
            <div class="ofp-step-text">
              <h4>Carroll County Permit Submission</h4>
              <p>Engineer-stamped drawings submitted to Carroll County Building Department. Structural permits typically process in 2–3 weeks. Permit in hand before demo begins — no exceptions.</p>
            </div>
          </div>
          <hr class="ofp-step-divider">
          <div class="ofp-step-item">
            <div class="ofp-step-num-badge">3</div>
            <div class="ofp-step-text">
              <h4>Mechanical Relocation &amp; Demo</h4>
              <p>HVAC ductwork and electrical circuits in the wall are rerouted before demo begins. Demolition follows with temporary shoring in place for load-bearing work. Beam and posts installed per engineering spec.</p>
            </div>
          </div>
          <hr class="ofp-step-divider">
          <div class="ofp-step-item">
            <div class="ofp-step-num-badge">4</div>
            <div class="ofp-step-text">
              <h4>Finish Work &amp; Inspection</h4>
              <p>Drywall, paint, trim, and flooring repair complete the open space. Carroll County structural inspection is scheduled and passed. You get a finished open floor plan with permits closed.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="ofp-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,55 1200,0 1200,55" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,55" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ PROCESS STEPS (lighter version for scope detail) ══════ -->
  <section class="ofp-process" aria-labelledby="ofp-scope-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="ofp-eyebrow">What's Included</span>
        <h2 id="ofp-scope-heading" style="text-wrap:balance;">Complete Project Scope —<br><span class="ofp-accent">From Engineering to Final Paint</span></h2>
      </div>
      <div class="ofp-process-grid">
        <div class="ofp-step" data-animate="fade-up">
          <span class="ofp-step-number">01</span>
          <h4>Structural Engineering</h4>
          <p>Licensed Georgia structural engineer reviews the load path, specifies the beam size, post locations, and footing requirements. Engineering cost is included in our project pricing — you don't hire an engineer separately.</p>
        </div>
        <div class="ofp-step" data-animate="fade-up">
          <span class="ofp-step-number">02</span>
          <h4>Mechanical Relocation</h4>
          <p>HVAC ductwork, electrical circuits, and any data or low-voltage runs in the affected wall are identified and rerouted before demo day. No mid-project discoveries — we scope what's in the wall at the estimate walk.</p>
        </div>
        <div class="ofp-step" data-animate="fade-up">
          <span class="ofp-step-number">03</span>
          <h4>Structural Beam Installation</h4>
          <p>Load-bearing walls get a properly specified beam — LVL or steel depending on span — installed with temporary shoring in place. Posts are set with adequate bearing on the structure below. Carroll County framing inspection scheduled.</p>
        </div>
        <div class="ofp-step" data-animate="fade-up">
          <span class="ofp-step-number">04</span>
          <h4>Drywall, Flooring &amp; Final Finish</h4>
          <p>New drywall on ceiling and walls where the old wall met. Flooring repair or replacement in the wall footprint — tile, LVP, or hardwood matched to the existing floor. Paint, trim, and final touch-up. Ready to live in.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="ofp-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,28 C400,55 800,5 1200,28 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ═══════════════════════════════════════════ -->
  <section class="ofp-cta-banner" aria-label="Open floor plan remodeling CTA">
    <div class="container">
      <h2 data-animate="fade-up">Find Out If Your Wall Is Load-Bearing — Before You Commit to Anything</h2>
      <p class="prose-centered" data-animate="fade-up">
        We assess your wall, trace the load path, and tell you exactly what removing it involves — including the full cost with engineering, permits, and finish work. Free estimate in Bowdon and Carroll County.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="ofp-cta-phone" data-animate="fade-up"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
      <?php endif; ?>
      <div class="ofp-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get Your Wall Removal Estimate</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="ofp-faq" aria-labelledby="ofp-faq-heading">
    <div class="container">
      <div style="text-align:center;" data-animate="fade-up">
        <span class="ofp-eyebrow">Common Questions</span>
        <h2 id="ofp-faq-heading" style="text-wrap:balance;">Open Floor Plan FAQ — <span class="ofp-accent">Carroll County, GA</span></h2>
      </div>
      <div class="ofp-faq-list" role="list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="ofp-faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="ofp-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="ofp-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="ofp-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ═══════════════════════════════════════ -->
  <section class="section" style="padding:var(--section-pad);background:var(--color-bg-alt);" aria-label="Other services you may need">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-3xl);" data-animate="fade-up">
        <span class="ofp-eyebrow">Also From Gray Tile</span>
        <h2 style="text-wrap:balance;">Other Services <span class="ofp-accent">You May Need</span></h2>
      </div>
      <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo04']; ?>" alt="Kitchen remodeling open floor plan Bowdon Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="utensils"></i></div>
            <h3>Kitchen Remodeling</h3>
            <p class="service-card__desc">Complete kitchen renovations — often combined with open floor plan wall removal for a fully transformed space.</p>
            <ul>
              <li>Design through installation</li>
              <li>Wall removal coordination</li>
              <li>Tile, cabinets &amp; counters</li>
            </ul>
            <a href="/services/kitchen-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo11']; ?>" alt="Structural renovation Bowdon Georgia load bearing walls beams" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hard-hat"></i></div>
            <h3>Structural Renovation</h3>
            <p class="service-card__desc">Comprehensive structural changes beyond wall removal — foundation work, major beam installations, and complex load path modifications.</p>
            <ul>
              <li>Engineer-coordinated work</li>
              <li>Complex beam installations</li>
              <li>Foundation &amp; framing repairs</li>
            </ul>
            <a href="/services/structural-renovation/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo07']; ?>" alt="Framing contractor Bowdon Georgia structural framing" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hammer"></i></div>
            <h3>Framing Contractor</h3>
            <p class="service-card__desc">Residential framing for additions, structural modifications, and new construction — framed to tile-grade deflection standards.</p>
            <ul>
              <li>L/360 tile-grade deflection</li>
              <li>Load-bearing engineering</li>
              <li>Carroll County permitted</li>
            </ul>
            <a href="/services/framing-contractor/" class="service-card__cta">Learn more</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="ofp-closing" aria-label="Closing call to action">
    <div class="container" data-animate="fade-up">
      <span class="ofp-eyebrow">The Open Plan Starts Here</span>
      <h2>Get an Honest Wall Removal Assessment Before You Commit</h2>
      <p class="prose-centered">
        Free estimates throughout Bowdon and Carroll County. We'll tell you whether the wall is load-bearing, what it takes to remove it safely, and what the complete project costs — before you decide.
      </p>
      <div class="ofp-btn-group">
        <a href="/contact/" class="btn btn-primary btn-lg">Get Your Free Estimate</a>
        <a href="/services/" class="btn btn-accent btn-lg">Explore All Services</a>
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
