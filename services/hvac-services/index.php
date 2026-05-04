<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'HVAC Services Bowdon GA | Remodel HVAC Carroll County Georgia';
$pageDescription = "HVAC rough-in, ductwork extension, and mini-split installation for remodels and additions in Bowdon, GA. Georgia-rated equipment, Carroll County permits. Call (770) 555-0000.";
$canonicalUrl    = $siteUrl . '/services/hvac-services/';
$ogImage         = $clientPhotos['photo03'];
$heroPreloadImage = $clientPhotos['photo03'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'hvac-services') { $currentService = $svc; break; }
}

$pageFaqs = [
    ['q' => 'How is HVAC handled for a remodel or addition in Georgia?',
     'a' => "For remodels that don't add conditioned square footage (kitchen and bath remodels, basement finishing), HVAC work typically involves extending or rerouting existing ductwork to serve the new layout — and confirming the existing system has enough capacity for the space. For additions and garage conversions, you're adding conditioned area, which requires either extending the existing ductwork system (if capacity allows) or adding a dedicated mini-split or zoned unit. Georgia's climate — hot humid summers with mild winters — means air conditioning capacity is almost always the governing factor in sizing decisions."],
    ['q' => 'Should I use a mini-split or central HVAC for a room addition in Bowdon?',
     'a' => 'For most single-room additions under 600 sq ft in Carroll County, a ductless mini-split is the right answer. Mini-splits are more efficient for conditioning a single isolated space, avoid the ductwork penetrations through existing walls that central system extensions require, and can be installed without disrupting the rest of your home. For larger additions (800+ sq ft with multiple rooms), extending the central system with a new air handler zone or a standalone package unit may be more cost-effective. We assess the existing system capacity before recommending either path.'],
    ['q' => 'How much does HVAC rough-in cost in Bowdon, GA?',
     'a' => "Ductwork extension for a room addition in Carroll County runs $1,800–$4,500 depending on the number of supplies and returns, distance from the existing air handler, and whether attic or crawlspace access is available for routing. A ductless mini-split system installed for a new addition or garage conversion runs $2,800–$6,500 installed depending on BTU capacity — single-zone units start around $2,800 and multi-zone systems go higher. Georgia's energy code requires Manual J load calculations for sizing, which we complete as part of the HVAC scope."],
    ['q' => 'How do you plan ductwork for an open floor plan remodel?',
     'a' => 'Open floor plan remodels change the airflow zones in a home significantly — removing walls affects both supply and return air distribution. We evaluate the existing duct layout before any walls come down and identify which supplies and returns need to be relocated, removed, or added to serve the new open layout correctly. Improperly handled, an open floor plan can create hot/cold spots because the airflow pattern that worked for divided rooms doesn\'t work for open space. We reroute ductwork as part of the open floor plan project, not as a separate HVAC service call afterward.'],
    ['q' => 'Does HVAC need permits in Carroll County for a remodel?',
     'a' => "Yes. HVAC work that involves installing new equipment (mini-splits, replacement air handlers, package units) or modifying existing ductwork requires a Carroll County mechanical permit. Equipment replacements typically require both a mechanical permit and inspections. Ductwork extensions for additions require mechanical permits. We pull all required mechanical permits and schedule the required inspections — including the rough-in inspection before ductwork is insulated in an attic or covered by drywall."],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   HVAC-SERVICES/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   CSS prefix: .hvac-
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.hvac-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo03']; ?>');
  background-size: cover;
  background-position: center 38%;
  background-repeat: no-repeat;
}
.hvac-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(155deg, rgba(var(--color-primary-dark-rgb), 0.95) 0%, rgba(var(--color-primary-rgb), 0.68) 60%, rgba(var(--color-accent-rgb), 0.06) 100%);
  z-index: 1;
}
.hvac-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 2; pointer-events: none;
}
.hvac-hero .hero-content { position: relative; z-index: 3; padding: var(--space-4xl) 0 var(--space-3xl); max-width: 720px; }
.hvac-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.9) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  margin-bottom: var(--space-lg); text-wrap: balance;
}
.hvac-hero .hero-subhead { color: rgba(255,255,255,0.88); font-size: clamp(1rem, 2vw, 1.2rem); max-width: 58ch; margin-bottom: var(--space-2xl); line-height: 1.65; }
.hvac-hero .hero-cta-group { display: flex; gap: var(--space-md); flex-wrap: wrap; }

/* ── Breadcrumb ───────────────────────────────────────────────── */
.hvac-bc-bar { background: var(--color-bg-alt); padding: var(--space-md) 0; border-bottom: 1px solid var(--color-gray-light); }
.hvac-bc-nav { display: flex; align-items: center; gap: var(--space-sm); font-size: 0.875rem; color: var(--color-text-light); flex-wrap: wrap; }
.hvac-bc-nav a { color: var(--color-accent); font-weight: 500; }
.hvac-bc-nav a:hover { color: var(--color-primary); }
.hvac-bc-sep { color: var(--color-gray); font-size: 0.75rem; }
.hvac-bc-current { color: var(--color-text); font-weight: 600; }

/* ── Shared ───────────────────────────────────────────────────── */
.hvac-eyebrow {
  display: inline-block; font-family: var(--font-heading); font-size: 0.78rem; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.12em; color: var(--color-accent);
  background: rgba(var(--color-accent-rgb), 0.1); padding: var(--space-xs) var(--space-md);
  border-radius: var(--radius-full); margin-bottom: var(--space-md);
}
.hvac-accent { color: var(--color-accent); }
.hvac-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.hvac-divider svg { display: block; width: 100%; height: 55px; }

/* ── Intro split ──────────────────────────────────────────────── */
.hvac-intro { padding: var(--space-3xl) 0 var(--space-2xl); background: var(--color-bg); }
.hvac-intro-inner { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3xl); align-items: start; }
@media (max-width: 899px) { .hvac-intro-inner { grid-template-columns: 1fr; } }
.hvac-intro-copy h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.hvac-intro-copy p { color: var(--color-text); font-size: 1rem; line-height: 1.7; max-width: 62ch; margin-bottom: var(--space-md); }
.hvac-intro-copy .lead-para { font-size: 1.08rem; font-weight: 500; color: var(--color-primary); border-left: 3px solid var(--color-accent); padding-left: var(--space-md); }
.hvac-last-updated { font-size: 0.8rem; color: var(--color-gray); margin-top: var(--space-md); }

/* ── Photo composition ────────────────────────────────────────── */
.hvac-photo-comp { position: relative; padding-bottom: var(--space-2xl); }
.hvac-photo-frame { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); border: 4px solid var(--color-white); aspect-ratio: 4/3; }
.hvac-photo-frame img { width: 100%; height: 100%; object-fit: cover; display: block; }
.hvac-stat-badge { position: absolute; bottom: -4px; right: -12px; background: var(--color-accent); color: var(--color-white); border-radius: var(--radius-md); padding: var(--space-md) var(--space-lg); box-shadow: var(--shadow-lg); text-align: center; min-width: 150px; z-index: 2; }
.hvac-stat-badge .stat-number { display: block; font-family: var(--font-heading); font-size: 1.2rem; font-weight: 800; line-height: 1.3; margin-bottom: var(--space-xs); }
.hvac-stat-badge .stat-label { display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; opacity: 0.92; }
.hvac-accent-strip { position: absolute; top: -8px; left: 20px; width: 56px; height: 4px; background: var(--color-accent); border-radius: var(--radius-full); }

/* ── HVAC scope options (featured/signature) ──────────────────── */
.hvac-scope-section {
  padding: var(--section-pad); background: var(--color-primary);
  position: relative; overflow: hidden;
}
@media (max-width: 767px) { .hvac-scope-section { padding: var(--section-pad-mobile); } }
.hvac-scope-section::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06; pointer-events: none;
}
.hvac-scope-header { text-align: center; margin-bottom: var(--space-3xl); position: relative; z-index: 1; }
.hvac-scope-header h2 { color: var(--color-white); text-wrap: balance; }
.hvac-scope-header p { color: rgba(255,255,255,0.72); max-width: 58ch; margin: var(--space-md) auto 0; font-size: 1rem; line-height: 1.7; }
.hvac-scope-grid {
  display: grid; grid-template-columns: repeat(2, 1fr);
  gap: var(--space-lg); position: relative; z-index: 1;
}
@media (max-width: 767px) { .hvac-scope-grid { grid-template-columns: 1fr; } }
.hvac-scope-card {
  background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.12);
  border-radius: var(--radius-lg); padding: var(--space-xl);
  display: flex; gap: var(--space-lg); align-items: flex-start;
  transition: background var(--transition-base), transform var(--transition-base);
}
.hvac-scope-card:hover { background: rgba(255,255,255,0.12); transform: translateY(-3px); }
.hvac-scope-icon {
  flex-shrink: 0; width: 48px; height: 48px; background: rgba(var(--color-accent-rgb), 0.18);
  border-radius: var(--radius-md); display: flex; align-items: center;
  justify-content: center; color: var(--color-accent);
}
.hvac-scope-card h3 { color: var(--color-white); font-size: 1.1rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.hvac-scope-card p { color: rgba(255,255,255,0.72); font-size: 0.9rem; line-height: 1.65; margin: 0; }
.hvac-scope-cost { display: inline-block; margin-top: var(--space-sm); font-family: var(--font-heading); font-size: 0.82rem; font-weight: 700; color: var(--color-accent); }

/* ── Process steps ────────────────────────────────────────────── */
.hvac-process { padding: var(--section-pad); background: var(--color-bg-alt); }
@media (max-width: 767px) { .hvac-process { padding: var(--section-pad-mobile); } }
.hvac-process-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl); margin-top: var(--space-2xl); }
@media (max-width: 1023px) { .hvac-process-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .hvac-process-grid { grid-template-columns: 1fr; } }
.hvac-step { background: var(--color-bg); border-radius: var(--radius-lg); padding: var(--space-xl) var(--space-lg); border-top: 3px solid var(--color-accent); transition: transform var(--transition-base), box-shadow var(--transition-base); }
.hvac-step:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.hvac-step-num { font-family: var(--font-heading); font-size: 3rem; font-weight: 900; color: rgba(var(--color-accent-rgb), 0.16); line-height: 1; margin-bottom: var(--space-sm); display: block; }
.hvac-step h4 { color: var(--color-primary); font-size: 1.05rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.hvac-step p { color: var(--color-text-light); font-size: 0.9rem; line-height: 1.6; margin: 0; }

/* ── CTA banner ───────────────────────────────────────────────── */
.hvac-cta-banner { padding: var(--space-4xl) var(--space-xl); background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); position: relative; overflow: hidden; text-align: center; }
.hvac-cta-banner::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E"); opacity: 0.06; pointer-events: none; }
.hvac-cta-banner .container { position: relative; z-index: 1; }
.hvac-cta-banner h2 { color: var(--color-white); margin-bottom: var(--space-md); text-wrap: balance; }
.hvac-cta-banner p { color: rgba(255,255,255,0.82); font-size: 1.05rem; max-width: 55ch; margin: 0 auto var(--space-2xl); }
.hvac-cta-phone { display: block; font-family: var(--font-heading); font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 700; color: var(--color-accent); margin-bottom: var(--space-xl); letter-spacing: 0.02em; }
.hvac-cta-phone:hover { color: var(--color-white); }
.hvac-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.hvac-faq { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .hvac-faq { padding: var(--section-pad-mobile); } }
.hvac-faq-list { max-width: 820px; margin: var(--space-2xl) auto 0; display: flex; flex-direction: column; gap: var(--space-md); }
.hvac-faq-item { border: 1px solid var(--color-gray-light); border-radius: var(--radius-md); overflow: hidden; transition: box-shadow var(--transition-base); }
.hvac-faq-item:hover { box-shadow: var(--shadow-md); }
.faq-question { width: 100%; background: var(--color-bg); border: none; text-align: left; padding: var(--space-lg) var(--space-xl); font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--color-primary); cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: var(--space-md); transition: background var(--transition-fast), color var(--transition-fast); }
.faq-question:hover { background: var(--color-bg-alt); color: var(--color-accent); }
.faq-question[aria-expanded="true"] { background: var(--color-primary); color: var(--color-white); }
.faq-icon { flex-shrink: 0; width: 20px; height: 20px; border-radius: 50%; border: 2px solid currentColor; display: flex; align-items: center; justify-content: center; transition: transform var(--transition-base); font-size: 1rem; line-height: 1; }
.faq-question[aria-expanded="true"] .faq-icon { transform: rotate(45deg); }
.faq-answer { display: none; padding: 0 var(--space-xl) var(--space-lg); background: var(--color-bg); color: var(--color-text); font-size: 0.97rem; line-height: 1.7; border-top: 1px solid var(--color-gray-light); }
.faq-answer.is-open { display: block; }

/* ── Closing CTA ──────────────────────────────────────────────── */
.hvac-closing { padding: var(--section-pad); background: var(--color-bg-alt); text-align: center; }
@media (max-width: 767px) { .hvac-closing { padding: var(--section-pad-mobile); } }
.hvac-closing h2 { color: var(--color-primary); margin-bottom: var(--space-md); text-wrap: balance; }
.hvac-closing p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto var(--space-2xl); }

/* ── Georgia climate callout ──────────────────────────────────── */
.hvac-climate-note {
  background: rgba(var(--color-accent-rgb), 0.06);
  border: 1px solid rgba(var(--color-accent-rgb), 0.2);
  border-radius: var(--radius-md); padding: var(--space-lg);
  margin-top: var(--space-lg); font-size: 0.9rem; line-height: 1.6;
  color: var(--color-text);
}
.hvac-climate-note strong { color: var(--color-primary); }

/* ── Gallery secondary ────────────────────────────────────────── */
.hvac-secondary-img {
  position: absolute; bottom: var(--space-md); left: -20px;
  width: 120px; border-radius: var(--radius-md); aspect-ratio: 1;
  overflow: hidden; border: 3px solid var(--color-white); box-shadow: var(--shadow-lg); z-index: 2;
}
.hvac-secondary-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
@media (max-width: 767px) {
  .hvac-secondary-img { display: none; }
  .hvac-hero { min-height: 70vh; }
  .hvac-hero .hero-content { padding: var(--space-3xl) 0 var(--space-2xl); }
  .hvac-stat-badge { right: 0; min-width: 130px; }
  .hvac-photo-comp { padding-bottom: var(--space-lg); }
}
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="hvac-hero" aria-label="HVAC Services hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">HVAC Services for Remodels in Bowdon, GA</h1>
      <p class="hero-subhead" data-animate="fade-up">
        Ductwork extension, mini-split installation, and HVAC rough-in for additions and
        conversions — sized for Georgia's climate, permitted through Carroll County, and
        coordinated with your full remodel timeline.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get an HVAC Estimate</a>
        <a href="#hvac-scope" class="btn btn-outline-white btn-lg">See HVAC Options</a>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="hvac-bc-bar" aria-label="Breadcrumb">
    <div class="container">
      <nav class="hvac-bc-nav" aria-label="You are here">
        <a href="/">Home</a>
        <span class="hvac-bc-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="hvac-bc-sep" aria-hidden="true">›</span>
        <span class="hvac-bc-current" aria-current="page">HVAC Services</span>
      </nav>
    </div>
  </div>

  <!-- ══ INTRO SPLIT ═══════════════════════════════════════════ -->
  <section class="hvac-intro" aria-labelledby="hvac-intro-heading">
    <div class="container">
      <div class="hvac-intro-inner">

        <div class="hvac-intro-copy" data-animate="fade-up">
          <span class="hvac-eyebrow">HVAC for Remodels, Bowdon GA</span>
          <h2 id="hvac-intro-heading">HVAC Sizing and Rough-In for Carroll County Additions — Planned Before Walls Close</h2>
          <p class="lead-para prose">
            Ductwork extension for a Carroll County room addition runs $1,800–$4,500. A mini-split for a single-room addition or garage conversion runs $2,800–$6,500 installed. Gray Tile includes HVAC scope in your initial estimate — not as an afterthought.
          </p>
          <p class="prose">
            Bowdon sits in Carroll County's climate zone 3A — humid subtropical, with hot humid summers regularly pushing 90°F+ and humidity that makes cooling capacity the primary constraint in any HVAC sizing decision. The Manual J load calculation required by Georgia Energy Code for new additions isn't just a permit formality here; it's how you avoid installing an undersized unit that runs continuously and never fully dehumidifies.
          </p>
          <p class="prose">
            For remodels that don't add space (kitchen and bath renovations), HVAC work is usually limited to rerouting affected registers and verifying existing system capacity can serve the new layout. For additions and garage conversions, we evaluate the existing system capacity against the new total square footage before recommending extension versus a dedicated new unit.
          </p>
          <p class="prose">
            Georgia Energy Code also requires insulation levels appropriate to climate zone 3A in any conditioned addition — R-20 wall insulation, R-38 attic insulation minimum. HVAC sizing and insulation work together; a properly insulated addition needs less mechanical capacity than a poorly insulated one. We spec both together.
          </p>
          <div class="hvac-climate-note">
            <strong>Carroll County climate note:</strong> Climate zone 3A. Average summer high 90°F+ with high humidity. Air conditioning capacity almost always governs over heating in sizing decisions. Dehumidification control is a design criterion, not a luxury.
          </div>
          <p class="hvac-last-updated">Last updated: April 2026</p>
        </div>

        <div class="hvac-photo-comp" data-animate="fade-up">
          <div class="hvac-accent-strip"></div>
          <div class="hvac-photo-frame">
            <img
              src="<?php echo $clientPhotos['photo03']; ?>"
              alt="HVAC installation and ductwork during home addition remodel in Bowdon Georgia Carroll County"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="hvac-stat-badge">
            <span class="stat-number">Georgia-Rated<br>HVAC</span>
            <span class="stat-label">Sized for Zone 3A Climate</span>
          </div>
          <div class="hvac-secondary-img">
            <img
              src="<?php echo $clientPhotos['gallery03']; ?>"
              alt="HVAC mini-split installation Carroll County Georgia"
              width="240" height="240"
              loading="lazy">
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="hvac-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ HVAC SCOPE OPTIONS (FEATURED / SIGNATURE SECTION) ═════ -->
  <section class="hvac-scope-section" id="hvac-scope" aria-labelledby="hvac-scope-heading">
    <div class="container">
      <div class="hvac-scope-header" data-animate="fade-up">
        <span class="hvac-eyebrow" style="background:rgba(var(--color-accent-rgb),0.2);color:var(--color-accent);">HVAC Options</span>
        <h2 id="hvac-scope-heading">HVAC Scope for Remodels<br><span class="hvac-accent">and Additions in Carroll County</span></h2>
        <p>The right HVAC approach depends on whether you're adding space, reconfiguring existing space, or converting an unconditioned area. Here's what each path looks like.</p>
      </div>
      <div class="hvac-scope-grid">
        <div class="hvac-scope-card" data-animate="fade-up">
          <div class="hvac-scope-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2"/></svg>
          </div>
          <div>
            <h3>Ductwork Extension for Additions</h3>
            <p>Extending the existing central HVAC system to serve a room addition — new supply and return registers, ductwork runs to the addition through attic or crawlspace, and balancing existing zones to account for the added square footage. Requires existing system capacity assessment first.</p>
            <span class="hvac-scope-cost">$1,800–$4,500 in Carroll County · Manual J load calc included</span>
          </div>
        </div>
        <div class="hvac-scope-card" data-animate="fade-up">
          <div class="hvac-scope-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
          </div>
          <div>
            <h3>Mini-Split Installation</h3>
            <p>Ductless mini-split systems for single-room additions under 600 sq ft, garage conversions, and spaces where extending existing ductwork isn't practical. More efficient for isolated zones in Georgia's climate — runs cooling-dominant operation through our 9-month cooling season.</p>
            <span class="hvac-scope-cost">$2,800–$6,500 installed · Single-zone units start around $2,800</span>
          </div>
        </div>
        <div class="hvac-scope-card" data-animate="fade-up">
          <div class="hvac-scope-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
          </div>
          <div>
            <h3>Fresh Air Ventilation</h3>
            <p>Georgia Energy Code requires mechanical ventilation for tight construction. Additions and converted spaces that achieve good insulation levels need controlled fresh air intake — typically an ERV or HRV unit — to maintain air quality without the energy penalty of uncontrolled infiltration.</p>
            <span class="hvac-scope-cost">$800–$2,200 for ERV/HRV integration during remodel</span>
          </div>
        </div>
        <div class="hvac-scope-card" data-animate="fade-up">
          <div class="hvac-scope-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 2v4"/><path d="M16 2v4"/><rect x="2" y="4" width="20" height="18" rx="2"/><path d="M2 10h20"/><path d="M7 15h.01"/><path d="M12 15h.01"/><path d="M17 15h.01"/><path d="M7 19h.01"/><path d="M12 19h.01"/><path d="M17 19h.01"/></svg>
          </div>
          <div>
            <h3>Humidity Control for Georgia</h3>
            <p>Standalone dehumidification for basements and converted spaces where the central system runs too few hours in mild weather to adequately control humidity. Carroll County's shoulder seasons (spring and fall) often have high humidity with moderate temperatures — the worst combination for a basement or enclosed addition without dedicated dehumidification.</p>
            <span class="hvac-scope-cost">$900–$2,800 for whole-house or zone dehumidifier</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="hvac-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,55 1200,0 1200,55" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ PROCESS STEPS ══════════════════════════════════════════ -->
  <section class="hvac-process" aria-labelledby="hvac-process-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="hvac-eyebrow">How It Works</span>
        <h2 id="hvac-process-heading" style="text-wrap:balance;">HVAC Phase<br><span class="hvac-accent">Within Your Remodel</span></h2>
      </div>
      <div class="hvac-process-grid">
        <div class="hvac-step" data-animate="fade-up">
          <span class="hvac-step-num">01</span>
          <h4>Existing System Capacity Review</h4>
          <p>We assess your existing HVAC system's capacity against the total conditioned square footage after the remodel. If the existing system can't handle the addition's load, we discuss extension options and alternatives before finalizing scope — not after.</p>
        </div>
        <div class="hvac-step" data-animate="fade-up">
          <span class="hvac-step-num">02</span>
          <h4>Manual J Load Calculation</h4>
          <p>Georgia Energy Code requires a Manual J load calculation for new additions and HVAC equipment sizing. We complete this before specifying equipment — it determines actual BTU requirements for the addition based on window area, insulation levels, orientation, and local climate data.</p>
        </div>
        <div class="hvac-step" data-animate="fade-up">
          <span class="hvac-step-num">03</span>
          <h4>Rough-In During Open Walls</h4>
          <p>Ductwork is run and mini-split line sets are roughed-in while framing is exposed — before insulation and drywall. This is when penetrations through framing members are made neatly and sealed properly for air and fire-stopping requirements.</p>
        </div>
        <div class="hvac-step" data-animate="fade-up">
          <span class="hvac-step-num">04</span>
          <h4>Equipment Installation &amp; Commissioning</h4>
          <p>Equipment installation and final connections happen after finish work — protecting equipment during the dusty construction phases. Carroll County mechanical inspection is scheduled. System is commissioned and airflow is balanced before project handoff.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="hvac-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,32 C300,55 900,10 1200,32 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ═══════════════════════════════════════════ -->
  <section class="hvac-cta-banner" aria-label="HVAC services CTA">
    <div class="container">
      <h2 data-animate="fade-up">Size Your HVAC Right for Georgia Before Your Addition Walls Close</h2>
      <p class="prose-centered" data-animate="fade-up">
        Undersized HVAC in a Bowdon addition means a room that never gets comfortable in July — and you can't fix it cheaply after drywall. We assess capacity and include HVAC scope in your initial estimate.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="hvac-cta-phone" data-animate="fade-up"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
      <?php endif; ?>
      <div class="hvac-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get Your HVAC Estimate</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="hvac-faq" aria-labelledby="hvac-faq-heading">
    <div class="container">
      <div style="text-align:center;" data-animate="fade-up">
        <span class="hvac-eyebrow">Common Questions</span>
        <h2 id="hvac-faq-heading" style="text-wrap:balance;">HVAC FAQ — <span class="hvac-accent">Remodels in Carroll County, GA</span></h2>
      </div>
      <div class="hvac-faq-list" role="list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="hvac-faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="hvac-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="hvac-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="hvac-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ═══════════════════════════════════════ -->
  <section class="section" style="padding:var(--section-pad);background:var(--color-bg-alt);" aria-label="Other services you may need">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-3xl);" data-animate="fade-up">
        <span class="hvac-eyebrow">Also From Gray Tile</span>
        <h2 style="text-wrap:balance;">Other Services <span class="hvac-accent">You May Need</span></h2>
      </div>
      <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo16']; ?>" alt="Garage conversion HVAC mini-split Bowdon Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="door-open"></i></div>
            <h3>Garage Conversion</h3>
            <p class="service-card__desc">Convert your garage to conditioned living space — mini-split sizing, insulation, and finish work throughout Carroll County.</p>
            <ul>
              <li>Mini-split or ducted HVAC</li>
              <li>Insulation to energy code</li>
              <li>Permit-managed process</li>
            </ul>
            <a href="/services/garage-conversion/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo09']; ?>" alt="Attic remodeling HVAC insulation Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="home"></i></div>
            <h3>Attic Remodeling</h3>
            <p class="service-card__desc">Attic conversions to conditioned living space require careful HVAC planning — we include ductwork and insulation in scope.</p>
            <ul>
              <li>HVAC extension or mini-split</li>
              <li>R-38 insulation minimum</li>
              <li>Structural &amp; finish work</li>
            </ul>
            <a href="/services/attic-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo08']; ?>" alt="Seasonal HVAC maintenance Bowdon Georgia Carroll County" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="wrench"></i></div>
            <h3>Seasonal Services</h3>
            <p class="service-card__desc">Pre-summer and pre-winter HVAC maintenance, filter service, and minor repairs throughout Bowdon and Carroll County.</p>
            <ul>
              <li>Pre-summer cooling check</li>
              <li>Filter &amp; coil maintenance</li>
              <li>Minor repair &amp; tune-up</li>
            </ul>
            <a href="/services/seasonal-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="hvac-closing" aria-label="Closing call to action">
    <div class="container" data-animate="fade-up">
      <span class="hvac-eyebrow">HVAC Planned from Day One</span>
      <h2>Get HVAC Scoped into Your Addition or Remodel Before Walls Open</h2>
      <p class="prose-centered">
        Free estimates throughout Bowdon and Carroll County. Manual J load calculations, Carroll County mechanical permits, and coordinated installation included — no separate HVAC contractor to schedule.
      </p>
      <div class="hvac-btn-group">
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
