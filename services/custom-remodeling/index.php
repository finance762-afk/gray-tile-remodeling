<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Custom Remodeling Bowdon GA | Personalized Home Renovation';
$pageDescription = 'Custom remodeling in Bowdon, GA — your vision executed with precision. Gray Tile sources unusual materials, matches existing tile, and builds what standard contractors won\'t attempt.';
$canonicalUrl    = $siteUrl . '/services/custom-remodeling/';
$ogImage         = $clientPhotos['photo10'];
$heroPreloadImage = $clientPhotos['photo10'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'custom-remodeling') { $currentService = $svc; break; }
}

$pageFaqs = [
    ['q' => 'What is custom remodeling versus standard remodeling?',
     'a' => 'Standard remodeling works from a catalog — cabinets from a limited selection, tile in stock colors, layouts that match the contractor\'s existing template. Custom remodeling starts from what you actually want: a specific tile pattern, a non-standard niche configuration, materials sourced from a particular manufacturer, or a layout that doesn\'t follow convention. The difference is whether your home ends up looking like everyone else\'s renovation or like something designed specifically for you and your house.'],
    ['q' => 'How does the design consultation work for custom remodeling?',
     'a' => 'We start with a site visit and a detailed conversation about what you\'re trying to achieve — aesthetics, function, and budget. We bring samples and reference images. After the visit, we develop a scope that reflects your specific vision and price it line-item. For complex tile work, we\'ll mock up a section so you can see the pattern at scale before installation begins. You approve every material selection and layout decision before work starts.'],
    ['q' => 'Can you match unusual tile or discontinued materials?',
     'a' => 'Yes, within limits. For active materials, we can source from specialty distributors, direct from manufacturers, or through specialty tile importers — Carroll County homeowners are sometimes surprised what\'s available when you look beyond the big box stores. For discontinued tile, matching depends on availability. We\'ll assess what exists, what can be reproduced, and what alternatives achieve a similar result. We\'re honest about what\'s feasible rather than selling you something that won\'t actually match.'],
    ['q' => 'What is the custom remodeling process from start to finish?',
     'a' => 'It goes: discovery call and site visit → scope development and material selection → fixed-price estimate with line items → Carroll County permit applications where required → demolition and prep → rough-in work if applicable → substrate and waterproofing → tile and specialty installation → final finishes, grouting, and sealing → walkthrough and punchlist. For complex projects we add a dry-lay verification step before setting begins so you approve the final layout at full scale.'],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   CUSTOM-REMODELING/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   CSS prefix: .cust-
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.cust-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo10']; ?>');
  background-size: cover;
  background-position: center 30%;
  background-repeat: no-repeat;
}
.cust-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(140deg, rgba(var(--color-primary-rgb), 0.92) 0%, rgba(var(--color-primary-dark-rgb), 0.65) 60%, rgba(var(--color-accent-rgb), 0.16) 100%);
  z-index: 1;
}
.cust-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 2; pointer-events: none;
}
.cust-hero .hero-content { position: relative; z-index: 3; padding: var(--space-4xl) 0 var(--space-3xl); max-width: 700px; }
.cust-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.88) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  margin-bottom: var(--space-lg); text-wrap: balance;
}
.cust-hero .hero-subhead { color: rgba(255,255,255,0.88); font-size: clamp(1rem, 2vw, 1.2rem); max-width: 58ch; margin-bottom: var(--space-2xl); line-height: 1.65; }
.cust-hero .hero-cta-group { display: flex; gap: var(--space-md); flex-wrap: wrap; }
@media (max-width: 767px) {
  .cust-hero { min-height: 70vh; }
  .cust-hero .hero-content { padding: var(--space-3xl) 0 var(--space-2xl); }
}

/* ── Breadcrumb ───────────────────────────────────────────────── */
.cust-breadcrumb-bar { background: var(--color-bg-alt); padding: var(--space-md) 0; border-bottom: 1px solid var(--color-gray-light); }
.cust-breadcrumb-nav { display: flex; align-items: center; gap: var(--space-sm); font-size: 0.875rem; color: var(--color-text-light); flex-wrap: wrap; }
.cust-breadcrumb-nav a { color: var(--color-accent); font-weight: 500; }
.cust-breadcrumb-nav a:hover { color: var(--color-primary); }
.cust-breadcrumb-sep { color: var(--color-gray); font-size: 0.75rem; }
.cust-breadcrumb-current { color: var(--color-text); font-weight: 600; }

/* ── Shared utilities ─────────────────────────────────────────── */
.cust-eyebrow {
  display: inline-block; font-family: var(--font-heading); font-size: 0.78rem; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.12em; color: var(--color-accent);
  background: rgba(var(--color-accent-rgb), 0.1); padding: var(--space-xs) var(--space-md);
  border-radius: var(--radius-full); margin-bottom: var(--space-md);
}
.cust-text-accent { color: var(--color-accent); }
.cust-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.cust-divider svg { display: block; width: 100%; height: 55px; }

/* ── Intro split ──────────────────────────────────────────────── */
.cust-intro-section { padding: var(--space-3xl) 0 var(--space-2xl); background: var(--color-bg); }
.cust-intro-inner { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3xl); align-items: start; }
@media (max-width: 899px) { .cust-intro-inner { grid-template-columns: 1fr; } }
.cust-intro-copy h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.cust-intro-copy .lead-para { font-size: 1.08rem; font-weight: 500; color: var(--color-primary); border-left: 3px solid var(--color-accent); padding-left: var(--space-md); margin-bottom: var(--space-lg); max-width: 62ch; }
.cust-intro-copy p { color: var(--color-text); font-size: 1rem; line-height: 1.7; max-width: 62ch; margin-bottom: var(--space-md); }
.cust-last-updated { font-size: 0.8rem; color: var(--color-gray); margin-top: var(--space-md); }

/* ── Photo composition ────────────────────────────────────────── */
.cust-photo-comp { position: relative; padding-bottom: var(--space-2xl); }
.cust-photo-frame { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); border: 4px solid var(--color-white); aspect-ratio: 4/3; }
.cust-photo-frame img { width: 100%; height: 100%; object-fit: cover; display: block; }
.cust-stat-badge { position: absolute; bottom: 0; right: -10px; background: var(--color-accent); color: var(--color-white); border-radius: var(--radius-md); padding: var(--space-md) var(--space-lg); box-shadow: var(--shadow-lg); text-align: center; min-width: 148px; z-index: 2; }
.cust-stat-badge .stat-num { display: block; font-family: var(--font-heading); font-size: 1.1rem; font-weight: 800; line-height: 1.3; margin-bottom: var(--space-xs); }
.cust-stat-badge .stat-lbl { display: block; font-size: 0.72rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; opacity: 0.9; }
.cust-photo-accent { position: absolute; top: -6px; left: 20px; width: 56px; height: 4px; background: var(--color-accent); border-radius: var(--radius-full); }
@media (max-width: 767px) { .cust-stat-badge { right: 0; } }

/* ── Standard vs Custom split (signature editorial section) ─── */
.cust-compare-section {
  padding: var(--section-pad); background: var(--color-primary);
  position: relative; overflow: hidden;
}
@media (max-width: 767px) { .cust-compare-section { padding: var(--section-pad-mobile); } }
.cust-compare-section::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.07; pointer-events: none;
}
.cust-compare-header { text-align: center; margin-bottom: var(--space-3xl); position: relative; z-index: 1; }
.cust-compare-header h2 { color: var(--color-white); font-size: clamp(1.6rem, 3.5vw, 2.4rem); text-wrap: balance; }
.cust-compare-header .cust-eyebrow { background: rgba(var(--color-accent-rgb), 0.2); color: var(--color-accent); }
.cust-compare-cols { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-2xl); position: relative; z-index: 1; }
@media (max-width: 767px) { .cust-compare-cols { grid-template-columns: 1fr; } }
.cust-col-standard {
  background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);
  border-radius: var(--radius-lg); padding: var(--space-2xl);
}
.cust-col-custom {
  background: rgba(var(--color-accent-rgb), 0.1); border: 2px solid rgba(var(--color-accent-rgb), 0.4);
  border-radius: var(--radius-lg); padding: var(--space-2xl);
}
.cust-col-label { font-family: var(--font-heading); font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: var(--space-lg); display: block; }
.cust-col-standard .cust-col-label { color: rgba(255,255,255,0.5); }
.cust-col-custom .cust-col-label { color: var(--color-accent); }
.cust-col-standard h3 { color: rgba(255,255,255,0.65); font-size: 1.25rem; margin-bottom: var(--space-lg); }
.cust-col-custom h3 { color: var(--color-white); font-size: 1.25rem; margin-bottom: var(--space-lg); }
.cust-compare-row { display: flex; align-items: flex-start; gap: var(--space-sm); padding: var(--space-sm) 0; border-bottom: 1px solid rgba(255,255,255,0.06); font-size: 0.9rem; line-height: 1.5; }
.cust-col-standard .cust-compare-row { color: rgba(255,255,255,0.55); }
.cust-col-custom .cust-compare-row { color: rgba(255,255,255,0.9); }
.cust-col-standard .cust-compare-row svg { color: rgba(255,255,255,0.25); flex-shrink: 0; }
.cust-col-custom .cust-compare-row svg { color: var(--color-accent); flex-shrink: 0; }
.cust-compare-row:last-child { border-bottom: none; }

/* ── Process steps ────────────────────────────────────────────── */
.cust-process-section { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .cust-process-section { padding: var(--section-pad-mobile); } }
.cust-process-steps { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl); margin-top: var(--space-2xl); }
@media (max-width: 1023px) { .cust-process-steps { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .cust-process-steps { grid-template-columns: 1fr; } }
.cust-process-step {
  background: var(--color-bg-alt); border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg); border-top: 3px solid var(--color-accent);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.cust-process-step::before { content: ''; display: block; width: 32px; height: 3px; background: var(--color-accent); border-radius: var(--radius-full); margin-bottom: var(--space-sm); }
.cust-process-step:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.cust-step-num { font-family: var(--font-heading); font-size: 3rem; font-weight: 900; color: rgba(var(--color-accent-rgb), 0.18); line-height: 1; margin-bottom: var(--space-sm); display: block; }
.cust-process-step h4 { color: var(--color-primary); font-size: 1.05rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.cust-process-step p { color: var(--color-text-light); font-size: 0.9rem; line-height: 1.6; margin: 0; }

/* ── CTA Banner ───────────────────────────────────────────────── */
.cust-cta-banner {
  padding: var(--space-4xl) var(--space-xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative; overflow: hidden; text-align: center;
}
.cust-cta-banner::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E"); opacity: 0.06; pointer-events: none; }
.cust-cta-banner .container { position: relative; z-index: 1; }
.cust-cta-banner h2 { color: var(--color-white); margin-bottom: var(--space-md); text-wrap: balance; }
.cust-cta-banner p { color: rgba(255,255,255,0.8); font-size: 1.05rem; max-width: 55ch; margin: 0 auto var(--space-2xl); }
.cust-cta-phone { display: block; font-family: var(--font-heading); font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 700; color: var(--color-accent); margin-bottom: var(--space-xl); letter-spacing: 0.02em; }
.cust-cta-phone:hover { color: var(--color-white); }
.cust-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.cust-faq-section { padding: var(--section-pad); background: var(--color-bg-alt); }
@media (max-width: 767px) { .cust-faq-section { padding: var(--section-pad-mobile); } }
.cust-faq-list { max-width: 800px; margin: var(--space-2xl) auto 0; display: flex; flex-direction: column; gap: var(--space-md); }
.cust-faq-item { border: 1px solid var(--color-gray-light); border-radius: var(--radius-md); overflow: hidden; transition: box-shadow var(--transition-base); }
.cust-faq-item:hover { box-shadow: var(--shadow-md); }
.faq-question { width: 100%; background: var(--color-bg); border: none; text-align: left; padding: var(--space-lg) var(--space-xl); font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--color-primary); cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: var(--space-md); transition: background var(--transition-fast), color var(--transition-fast); }
.faq-question:hover { background: var(--color-bg-alt); color: var(--color-accent); }
.faq-question[aria-expanded="true"] { background: var(--color-primary); color: var(--color-white); }
.faq-icon { flex-shrink: 0; width: 20px; height: 20px; border-radius: 50%; border: 2px solid currentColor; display: flex; align-items: center; justify-content: center; transition: transform var(--transition-base); font-size: 1rem; line-height: 1; }
.faq-question[aria-expanded="true"] .faq-icon { transform: rotate(45deg); }
.faq-answer { display: none; padding: 0 var(--space-xl) var(--space-lg); background: var(--color-bg); color: var(--color-text); font-size: 0.97rem; line-height: 1.7; border-top: 1px solid var(--color-gray-light); }
.faq-answer.is-open { display: block; }

/* ── Closing CTA ──────────────────────────────────────────────── */
.cust-closing-cta { padding: var(--section-pad); background: var(--color-bg); text-align: center; }
@media (max-width: 767px) { .cust-closing-cta { padding: var(--section-pad-mobile); } }
.cust-closing-cta h2 { color: var(--color-primary); margin-bottom: var(--space-md); text-wrap: balance; }
.cust-closing-cta p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto var(--space-2xl); }
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="cust-hero" aria-label="Custom remodeling hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">Custom Remodeling in Bowdon, GA</h1>
      <p class="hero-subhead" data-animate="fade-up">
        Your home, your vision — not a contractor's catalog. Gray Tile builds custom tile
        patterns, sources specialty materials, and executes renovations that don't look like
        everyone else's in Carroll County.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Discuss Your Custom Project</a>
        <a href="#cust-compare" class="btn btn-outline-white btn-lg">Custom vs. Standard</a>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="cust-breadcrumb-bar" aria-label="Breadcrumb navigation">
    <div class="container">
      <nav class="cust-breadcrumb-nav" aria-label="You are here">
        <a href="/">Home</a>
        <span class="cust-breadcrumb-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="cust-breadcrumb-sep" aria-hidden="true">›</span>
        <span class="cust-breadcrumb-current" aria-current="page">Custom Remodeling</span>
      </nav>
    </div>
  </div>

  <!-- ══ INTRO SPLIT ══════════════════════════════════════════ -->
  <section class="cust-intro-section" aria-labelledby="cust-intro-heading">
    <div class="container">
      <div class="cust-intro-inner">

        <div class="cust-intro-copy" data-animate="fade-up">
          <span class="cust-eyebrow">Custom Remodeling Bowdon, GA</span>
          <h2 id="cust-intro-heading">When a Standard Renovation Isn't Enough</h2>
          <p class="lead-para">
            Custom remodeling starts with what you actually want, not what a contractor has in their
            standard package. Gray Tile works from your vision — specific tile patterns, unusual material
            selections, non-standard layouts — and executes with 25 years of precision tile and remodeling
            experience in Carroll County.
          </p>
          <p>
            Most remodeling contractors work from a limited selection of materials they've pre-approved
            for ease of installation. That keeps their process efficient — and it keeps your renovation
            looking generic. Custom work requires a different approach: sourcing materials from specialty
            distributors, developing installation methods for unusual substrates, building one-of-a-kind
            niche configurations, and executing patterns that require planning and precision to look right
            at full scale.
          </p>
          <p>
            Gray Tile's tile expertise is the foundation of our custom work. Complex herringbone patterns,
            large-format porcelain with minimal grout joints, handmade ceramic with irregular dimensions,
            natural stone with directional veining — these require skill and experience that general
            remodeling contractors don't carry. We've been executing custom tile work in Carroll County
            and West Georgia since 2001.
          </p>
          <p>
            Custom doesn't mean unlimited budget. We scope custom projects with the same line-item approach
            as any renovation — you know exactly what each element costs and can make informed decisions
            about where to invest and where standard options work just as well.
          </p>
          <p class="cust-last-updated">Last updated: April 2026</p>
        </div>

        <div class="cust-photo-comp" data-animate="fade-up">
          <div class="cust-photo-accent"></div>
          <div class="cust-photo-frame">
            <img
              src="<?php echo $clientPhotos['photo11']; ?>"
              alt="Custom tile remodeling work in Bowdon Georgia showing intricate pattern installation"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="cust-stat-badge">
            <span class="stat-num">Your Vision, Our Craft</span>
            <span class="stat-lbl">Built to Your Spec</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="cust-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ STANDARD VS CUSTOM (SIGNATURE EDITORIAL) ═════════════ -->
  <section class="cust-compare-section" id="cust-compare" aria-labelledby="cust-compare-heading">
    <div class="container">
      <div class="cust-compare-header" data-animate="fade-up">
        <span class="cust-eyebrow">The Real Difference</span>
        <h2 id="cust-compare-heading">Standard Remodeling vs. Custom Remodeling<br><span style="color:var(--color-accent);">What Actually Changes</span></h2>
      </div>
      <div class="cust-compare-cols">
        <div class="cust-col-standard" data-animate="fade-up">
          <span class="cust-col-label">Standard Approach</span>
          <h3>Works From a Catalog</h3>
          <div class="cust-compare-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            <span>Material selection limited to contractor's pre-approved list</span>
          </div>
          <div class="cust-compare-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            <span>Layout follows one of a few standard templates</span>
          </div>
          <div class="cust-compare-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            <span>Tile patterns are simple — straight lay or basic offset</span>
          </div>
          <div class="cust-compare-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            <span>Niche and storage configurations follow a single standard size</span>
          </div>
          <div class="cust-compare-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            <span>Result looks identical to other jobs from the same contractor</span>
          </div>
        </div>
        <div class="cust-col-custom" data-animate="fade-up">
          <span class="cust-col-label">Gray Tile Custom Approach</span>
          <h3>Built From Your Vision</h3>
          <div class="cust-compare-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Materials sourced from specialty distributors — including imports and natural stone</span>
          </div>
          <div class="cust-compare-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Layout designed around your space, not around the contractor's workflow</span>
          </div>
          <div class="cust-compare-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Complex patterns: herringbone, chevron, mixed-format, medallion insets</span>
          </div>
          <div class="cust-compare-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Custom niche dimensions, bench configurations, and specialty features</span>
          </div>
          <div class="cust-compare-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Result is specific to your home — not duplicable from a contractor's template</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="cust-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,55 1200,0 1200,55" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,55" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ PROCESS STEPS ══════════════════════════════════════════ -->
  <section class="cust-process-section" aria-labelledby="cust-process-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="cust-eyebrow">Our Process</span>
        <h2 id="cust-process-heading" style="text-wrap:balance;">How Custom Remodeling Works<br><span class="cust-text-accent">in Carroll County</span></h2>
      </div>
      <div class="cust-process-steps">
        <div class="cust-process-step" data-animate="fade-up">
          <span class="cust-step-num">01</span>
          <h4>Discovery &amp; Vision Development</h4>
          <p>We start with a site visit and a detailed conversation about your goals. We bring material samples, discuss pattern options, and ask the questions that help us understand what "custom" means for your specific project. We come prepared — you don't have to know every answer yet.</p>
        </div>
        <div class="cust-process-step" data-animate="fade-up">
          <span class="cust-step-num">02</span>
          <h4>Material Selection &amp; Sourcing</h4>
          <p>We identify materials that achieve your vision, source samples from specialty distributors where needed, and present options with honest information about installation requirements, maintenance, and cost differences. No material is selected until you're confident in it.</p>
        </div>
        <div class="cust-process-step" data-animate="fade-up">
          <span class="cust-step-num">03</span>
          <h4>Dry-Lay Verification</h4>
          <p>For complex tile work, we dry-lay the pattern or key sections before setting begins. You see the actual layout at full scale and confirm centering, border treatment, and pattern flow before a single tile is permanently installed. This eliminates surprises at the end.</p>
        </div>
        <div class="cust-process-step" data-animate="fade-up">
          <span class="cust-step-num">04</span>
          <h4>Precision Installation &amp; Finishing</h4>
          <p>Custom work is installed by our experienced tile crews — not handed to the newest hire. Grout joint consistency, pattern registration, and edge treatments are controlled throughout. Final walkthrough covers every detail before the job is closed.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="cust-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,28 C400,55 800,5 1200,28 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ═══════════════════════════════════════════ -->
  <section class="cust-cta-banner" aria-label="Custom remodeling CTA">
    <div class="container">
      <h2 data-animate="fade-up">Have a Vision That Doesn't Fit a Standard Package?</h2>
      <p class="prose-centered" data-animate="fade-up">
        Bring us your ideas — specific materials, unusual patterns, non-standard configurations.
        We'll assess feasibility and give you an honest estimate for what custom actually costs.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="cust-cta-phone" data-animate="fade-up"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
      <?php endif; ?>
      <div class="cust-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Start Your Custom Project</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="cust-faq-section" aria-labelledby="cust-faq-heading">
    <div class="container">
      <div style="text-align:center;" data-animate="fade-up">
        <span class="cust-eyebrow">Common Questions</span>
        <h2 id="cust-faq-heading" style="text-wrap:balance;">Custom Remodeling FAQ — <span class="cust-text-accent">Bowdon &amp; Carroll County</span></h2>
      </div>
      <div class="cust-faq-list" role="list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="cust-faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="cust-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="cust-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="cust-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg-alt)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ═══════════════════════════════════════ -->
  <section class="section" style="padding:var(--section-pad);background:var(--color-bg-alt);" aria-label="Other services you may need">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-3xl);" data-animate="fade-up">
        <span class="cust-eyebrow">Also From Gray Tile</span>
        <h2 style="text-wrap:balance;">Other Services <span class="cust-text-accent">You May Need</span></h2>
      </div>
      <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo16']; ?>" alt="Design-build remodeling Bowdon GA design and build one team" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="pencil-ruler"></i></div>
            <h3>Design-Build Remodeling</h3>
            <p class="service-card__desc">Design and build under one contract — ideal for custom projects where design drives scope.</p>
            <ul><li>Integrated design process</li><li>Material consultation included</li><li>Fixed-price execution</li></ul>
            <a href="/services/design-build-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo03']; ?>" alt="Custom tile showers Bowdon Georgia luxury shower design" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="sparkles"></i></div>
            <h3>Custom Tile Showers</h3>
            <p class="service-card__desc">The most custom work we do — complex patterns, specialty stone, and precision installation.</p>
            <ul><li>Complex pattern execution</li><li>Specialty stone sourcing</li><li>Custom niche &amp; bench builds</li></ul>
            <a href="/services/custom-tile-showers/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo17']; ?>" alt="Home upgrades Bowdon Georgia improve your home value" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="star"></i></div>
            <h3>Home Upgrades</h3>
            <p class="service-card__desc">Targeted upgrades that improve specific areas — without committing to a full renovation scope.</p>
            <ul><li>Specific room upgrades</li><li>Value-focused improvements</li><li>Fast turnaround options</li></ul>
            <a href="/services/home-upgrades/" class="service-card__cta">Learn more</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="cust-closing-cta" aria-label="Closing call to action">
    <div class="container" data-animate="fade-up">
      <span class="cust-eyebrow">Built Different by Design</span>
      <h2>Your Home Deserves More Than a Contractor's Template</h2>
      <p class="prose-centered">
        Free consultations for custom remodeling projects throughout Bowdon, Carrollton, Villa Rica,
        and Carroll County. Bring your ideas — we'll tell you honestly what's possible.
      </p>
      <div class="cust-btn-group">
        <a href="/contact/" class="btn btn-primary btn-lg">Get Your Free Consultation</a>
        <a href="/services/" class="btn btn-accent btn-lg">Explore All Services</a>
      </div>
    </div>
  </section>

</main>

<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" defer></script>
<script>
document.querySelectorAll('.faq-question').forEach(function(btn) {
  btn.addEventListener('click', function() {
    var expanded = this.getAttribute('aria-expanded') === 'true';
    var answer = document.getElementById(this.getAttribute('aria-controls'));
    this.setAttribute('aria-expanded', String(!expanded));
    if (answer) answer.classList.toggle('is-open', !expanded);
  });
});
document.addEventListener('DOMContentLoaded', function() {
  if (typeof lucide !== 'undefined') lucide.createIcons();
});
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
