<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Plumbing Services Bowdon GA | Remodel Plumbing Carroll County';
$pageDescription = 'Rough-in plumbing, fixture installation, and supply line work for remodels in Bowdon, GA. Carroll County permits handled. Part of our full remodeling scope. Call (770) 555-0000.';
$canonicalUrl    = $siteUrl . '/services/plumbing-services/';
$ogImage         = $clientPhotos['photo01'];
$heroPreloadImage = $clientPhotos['photo01'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'plumbing-services') { $currentService = $svc; break; }
}

$pageFaqs = [
    ['q' => 'What plumbing work is included in a remodeling project?',
     'a' => 'For bathroom remodels, plumbing scope typically includes rough-in for tub/shower, toilet, and vanity — new supply lines, drain lines, and vent connections. For kitchen remodels, it includes sink rough-in, dishwasher supply, and in some cases adding a pot-filler or island sink with new drain routing. Basement kitchen additions require extending both supply and drain/waste lines from existing home plumbing — this is the most complex routing work. We scope every project specifically so there are no surprises mid-project.'],
    ['q' => 'How much does bathroom plumbing rough-in cost in Georgia?',
     'a' => 'A standard bathroom rough-in in the Bowdon area (new toilet, vanity, and shower supply and drain lines) runs $2,500–$5,500 depending on complexity and distance from existing stack. Moving plumbing to a new location — such as flipping the bathroom layout or adding a bathroom in a new addition — adds $1,500–$4,000 for additional drain routing and venting. Basement rough-ins that require cutting concrete typically add $1,200–$2,800 for the concrete work alone.'],
    ['q' => 'Do I need a permit for plumbing work in Carroll County?',
     'a' => 'Yes. Any plumbing work beyond simple fixture replacement requires a Carroll County plumbing permit. This includes new rough-in, moving supply or drain lines, adding a bathroom, extending waste lines, and water heater replacement (in most cases). We pull the required plumbing permits as part of every project. Unpermitted plumbing work can cause problems with homeowner\'s insurance claims and home sales — we don\'t skip the permit process.'],
    ['q' => 'Can you move plumbing walls during a remodel?',
     'a' => 'Yes, we move plumbing walls regularly — but the extent of what\'s involved depends on what\'s in the wall. Drain lines run on gravity, so moving a toilet or shower drain requires re-sloping the drain run back to the main stack, which may mean opening the floor or ceiling below. Supply lines (hot and cold water) are under pressure and easier to reroute — typically a less invasive process. We assess the existing plumbing layout during the scoping visit so you know what movement costs before committing to a layout change.'],
    ['q' => 'Does Gray Tile handle hot water heater replacement as part of a remodel?',
     'a' => 'Yes. We replace tank-style and tankless water heaters as part of remodeling projects, particularly on bathroom additions and second-kitchen installations where the new demand may exceed the existing heater\'s capacity. In Carroll County, water heater replacement requires a plumbing permit. We assess whether your existing water heater can handle the added load before scoping new rough-in — in some cases, moving to a tankless unit or upgrading the tank size is the smarter path than adding the new fixture and keeping an undersized heater.'],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   PLUMBING-SERVICES/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   CSS prefix: .plm-
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.plm-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo01']; ?>');
  background-size: cover;
  background-position: center 45%;
  background-repeat: no-repeat;
}
.plm-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(148deg, rgba(var(--color-primary-dark-rgb), 0.96) 0%, rgba(var(--color-primary-rgb), 0.70) 58%, rgba(var(--color-accent-rgb), 0.07) 100%);
  z-index: 1;
}
.plm-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 2; pointer-events: none;
}
.plm-hero .hero-content { position: relative; z-index: 3; padding: var(--space-4xl) 0 var(--space-3xl); max-width: 700px; }
.plm-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.9) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  margin-bottom: var(--space-lg); text-wrap: balance;
}
.plm-hero .hero-subhead { color: rgba(255,255,255,0.88); font-size: clamp(1rem, 2vw, 1.2rem); max-width: 58ch; margin-bottom: var(--space-2xl); line-height: 1.65; }
.plm-hero .hero-cta-group { display: flex; gap: var(--space-md); flex-wrap: wrap; }

/* ── Breadcrumb ───────────────────────────────────────────────── */
.plm-bc-bar { background: var(--color-bg-alt); padding: var(--space-md) 0; border-bottom: 1px solid var(--color-gray-light); }
.plm-bc-nav { display: flex; align-items: center; gap: var(--space-sm); font-size: 0.875rem; color: var(--color-text-light); flex-wrap: wrap; }
.plm-bc-nav a { color: var(--color-accent); font-weight: 500; }
.plm-bc-nav a:hover { color: var(--color-primary); }
.plm-bc-sep { color: var(--color-gray); font-size: 0.75rem; }
.plm-bc-current { color: var(--color-text); font-weight: 600; }

/* ── Shared ───────────────────────────────────────────────────── */
.plm-eyebrow {
  display: inline-block; font-family: var(--font-heading); font-size: 0.78rem; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.12em; color: var(--color-accent);
  background: rgba(var(--color-accent-rgb), 0.1); padding: var(--space-xs) var(--space-md);
  border-radius: var(--radius-full); margin-bottom: var(--space-md);
}
.plm-accent { color: var(--color-accent); }
.plm-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.plm-divider svg { display: block; width: 100%; height: 55px; }

/* ── Intro split ──────────────────────────────────────────────── */
.plm-intro { padding: var(--space-3xl) 0 var(--space-2xl); background: var(--color-bg); }
.plm-intro-inner { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3xl); align-items: start; }
@media (max-width: 899px) { .plm-intro-inner { grid-template-columns: 1fr; } }
.plm-intro-copy h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.plm-intro-copy p { color: var(--color-text); font-size: 1rem; line-height: 1.7; max-width: 62ch; margin-bottom: var(--space-md); }
.plm-intro-copy .lead-para {
  font-size: 1.08rem; font-weight: 500; color: var(--color-primary);
  border-left: 3px solid var(--color-accent); padding-left: var(--space-md);
}
.plm-last-updated { font-size: 0.8rem; color: var(--color-gray); margin-top: var(--space-md); }

/* ── Photo composition ────────────────────────────────────────── */
.plm-photo-comp { position: relative; padding-bottom: var(--space-xl); }
.plm-photo-frame { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); border: 4px solid var(--color-white); aspect-ratio: 4/3; }
.plm-photo-frame img { width: 100%; height: 100%; object-fit: cover; display: block; }
.plm-stat-badge { position: absolute; bottom: -4px; right: -12px; background: var(--color-accent); color: var(--color-white); border-radius: var(--radius-md); padding: var(--space-md) var(--space-lg); box-shadow: var(--shadow-lg); text-align: center; min-width: 155px; z-index: 2; }
.plm-stat-badge .stat-number { display: block; font-family: var(--font-heading); font-size: 1.3rem; font-weight: 800; line-height: 1.2; margin-bottom: var(--space-xs); }
.plm-stat-badge .stat-label { display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; opacity: 0.92; }
.plm-accent-strip { position: absolute; top: -8px; left: 20px; width: 56px; height: 4px; background: var(--color-accent); border-radius: var(--radius-full); }

/* ── Plumbing scope section (dark, featured) ──────────────────── */
.plm-scope-section {
  padding: var(--section-pad); background: var(--color-primary);
  position: relative; overflow: hidden;
}
@media (max-width: 767px) { .plm-scope-section { padding: var(--section-pad-mobile); } }
.plm-scope-section::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06; pointer-events: none;
}
.plm-scope-header { text-align: center; margin-bottom: var(--space-3xl); position: relative; z-index: 1; }
.plm-scope-header h2 { color: var(--color-white); text-wrap: balance; }
.plm-scope-header p { color: rgba(255,255,255,0.72); max-width: 58ch; margin: var(--space-md) auto 0; font-size: 1rem; line-height: 1.7; }
.plm-scope-grid {
  display: grid; grid-template-columns: repeat(2, 1fr);
  gap: var(--space-lg); position: relative; z-index: 1;
}
@media (max-width: 767px) { .plm-scope-grid { grid-template-columns: 1fr; } }
.plm-scope-card {
  background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12);
  border-radius: var(--radius-lg); padding: var(--space-xl);
  display: flex; gap: var(--space-lg); align-items: flex-start;
  transition: background var(--transition-base), transform var(--transition-base);
}
.plm-scope-card:hover { background: rgba(255,255,255,0.11); transform: translateY(-3px); }
.plm-scope-icon {
  flex-shrink: 0; width: 48px; height: 48px; background: rgba(var(--color-accent-rgb), 0.18);
  border-radius: var(--radius-md); display: flex; align-items: center;
  justify-content: center; color: var(--color-accent);
}
.plm-scope-card h3 { color: var(--color-white); font-size: 1.1rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.plm-scope-card p { color: rgba(255,255,255,0.72); font-size: 0.9rem; line-height: 1.65; margin: 0; }
.plm-scope-detail { font-size: 0.82rem; color: var(--color-accent); font-weight: 600; margin-top: var(--space-sm); display: block; }

/* ── Process steps ────────────────────────────────────────────── */
.plm-process { padding: var(--section-pad); background: var(--color-bg-alt); }
@media (max-width: 767px) { .plm-process { padding: var(--section-pad-mobile); } }
.plm-process-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl); margin-top: var(--space-2xl); }
@media (max-width: 1023px) { .plm-process-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .plm-process-grid { grid-template-columns: 1fr; } }
.plm-step {
  background: var(--color-bg); border-radius: var(--radius-lg); padding: var(--space-xl) var(--space-lg);
  border-top: 3px solid var(--color-accent); transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.plm-step:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.plm-step-num { font-family: var(--font-heading); font-size: 3rem; font-weight: 900; color: rgba(var(--color-accent-rgb), 0.16); line-height: 1; margin-bottom: var(--space-sm); display: block; }
.plm-step h4 { color: var(--color-primary); font-size: 1.05rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.plm-step p { color: var(--color-text-light); font-size: 0.9rem; line-height: 1.6; margin: 0; }

/* ── CTA banner ───────────────────────────────────────────────── */
.plm-cta-banner { padding: var(--space-4xl) var(--space-xl); background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); position: relative; overflow: hidden; text-align: center; }
.plm-cta-banner::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E"); opacity: 0.06; pointer-events: none; }
.plm-cta-banner .container { position: relative; z-index: 1; }
.plm-cta-banner h2 { color: var(--color-white); margin-bottom: var(--space-md); text-wrap: balance; }
.plm-cta-banner p { color: rgba(255,255,255,0.82); font-size: 1.05rem; max-width: 55ch; margin: 0 auto var(--space-2xl); }
.plm-cta-phone { display: block; font-family: var(--font-heading); font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 700; color: var(--color-accent); margin-bottom: var(--space-xl); letter-spacing: 0.02em; }
.plm-cta-phone:hover { color: var(--color-white); }
.plm-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.plm-faq { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .plm-faq { padding: var(--section-pad-mobile); } }
.plm-faq-list { max-width: 820px; margin: var(--space-2xl) auto 0; display: flex; flex-direction: column; gap: var(--space-md); }
.plm-faq-item { border: 1px solid var(--color-gray-light); border-radius: var(--radius-md); overflow: hidden; transition: box-shadow var(--transition-base); }
.plm-faq-item:hover { box-shadow: var(--shadow-md); }
.faq-question { width: 100%; background: var(--color-bg); border: none; text-align: left; padding: var(--space-lg) var(--space-xl); font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--color-primary); cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: var(--space-md); transition: background var(--transition-fast), color var(--transition-fast); }
.faq-question:hover { background: var(--color-bg-alt); color: var(--color-accent); }
.faq-question[aria-expanded="true"] { background: var(--color-primary); color: var(--color-white); }
.faq-icon { flex-shrink: 0; width: 20px; height: 20px; border-radius: 50%; border: 2px solid currentColor; display: flex; align-items: center; justify-content: center; transition: transform var(--transition-base); font-size: 1rem; line-height: 1; }
.faq-question[aria-expanded="true"] .faq-icon { transform: rotate(45deg); }
.faq-answer { display: none; padding: 0 var(--space-xl) var(--space-lg); background: var(--color-bg); color: var(--color-text); font-size: 0.97rem; line-height: 1.7; border-top: 1px solid var(--color-gray-light); }
.faq-answer.is-open { display: block; }

/* ── Closing CTA ──────────────────────────────────────────────── */
.plm-closing { padding: var(--section-pad); background: var(--color-bg-alt); text-align: center; }
@media (max-width: 767px) { .plm-closing { padding: var(--section-pad-mobile); } }
.plm-closing h2 { color: var(--color-primary); margin-bottom: var(--space-md); text-wrap: balance; }
.plm-closing p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto var(--space-2xl); }

/* ── Mobile adjustments ───────────────────────────────────────── */
@media (max-width: 767px) {
  .plm-hero { min-height: 70vh; }
  .plm-hero .hero-content { padding: var(--space-3xl) 0 var(--space-2xl); }
  .plm-stat-badge { right: 0; min-width: 130px; }
  .plm-photo-comp { padding-bottom: var(--space-lg); }
}

/* ── Secondary image overlay composition ─────────────────────── */
.plm-secondary-img {
  position: absolute; top: var(--space-2xl); left: -20px;
  width: 120px; border-radius: var(--radius-md);
  overflow: hidden; aspect-ratio: 1;
  border: 3px solid var(--color-white); box-shadow: var(--shadow-lg); z-index: 2;
}
.plm-secondary-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
@media (max-width: 767px) { .plm-secondary-img { display: none; } }
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="plm-hero" aria-label="Plumbing Services hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">Plumbing Services for Remodels in Bowdon, GA</h1>
      <p class="hero-subhead" data-animate="fade-up">
        Rough-in plumbing, fixture installation, and drain line work — integrated into your
        remodel so you're not coordinating a separate plumber. Gray Tile handles plumbing scope
        as part of the full project in Carroll County.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get a Plumbing Estimate</a>
        <a href="#plm-scope" class="btn btn-outline-white btn-lg">See Plumbing Scope</a>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="plm-bc-bar" aria-label="Breadcrumb">
    <div class="container">
      <nav class="plm-bc-nav" aria-label="You are here">
        <a href="/">Home</a>
        <span class="plm-bc-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="plm-bc-sep" aria-hidden="true">›</span>
        <span class="plm-bc-current" aria-current="page">Plumbing Services</span>
      </nav>
    </div>
  </div>

  <!-- ══ INTRO SPLIT ═══════════════════════════════════════════ -->
  <section class="plm-intro" aria-labelledby="plm-intro-heading">
    <div class="container">
      <div class="plm-intro-inner">

        <div class="plm-intro-copy" data-animate="fade-up">
          <span class="plm-eyebrow">Remodel Plumbing, Bowdon GA</span>
          <h2 id="plm-intro-heading">Plumbing Rough-In Built Into Your Remodel — Not Tacked On</h2>
          <p class="lead-para prose">
            Bathroom rough-in plumbing in Carroll County runs $2,500–$5,500 for a standard configuration. Moving drain lines or adding a basement kitchen adds $1,500–$4,000. Gray Tile scopes every plumbing phase upfront so there are no mid-project cost surprises.
          </p>
          <p class="prose">
            Most remodeling projects hit plumbing delays because the general contractor and the plumber aren't coordinating in real time. When we sequence framing, plumbing rough-in, and electrical rough-in as a single operation, we avoid the gaps where projects stall — waiting for one trade to finish before another can start.
          </p>
          <p class="prose">
            We handle plumbing scope for bathroom remodels (new rough-in, moving fixtures, custom shower valve and body spray configurations), kitchen remodels (sink rough-in, dishwasher supply, pot-filler rough-in), basement kitchen additions (full supply and drain extension from existing lines), and home additions (new bath rough-in from scratch). Carroll County plumbing permits are pulled for all work that requires them.
          </p>
          <p class="prose">
            Georgia's humid climate makes proper drain venting especially important — a poorly vented drain line in a Bowdon home will siphon trap seals and allow sewer gas into the house within months. We vent to code, not to the minimum that gets a permit.
          </p>
          <p class="plm-last-updated">Last updated: April 2026</p>
        </div>

        <div class="plm-photo-comp" data-animate="fade-up">
          <div class="plm-accent-strip"></div>
          <div class="plm-photo-frame">
            <img
              src="<?php echo $clientPhotos['photo01']; ?>"
              alt="Plumbing rough-in work during bathroom remodel in Bowdon Georgia showing new supply and drain lines"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="plm-stat-badge">
            <span class="stat-number">Remodel-Ready<br>Plumbing</span>
            <span class="stat-label">Coordinated with Framing &amp; Electrical</span>
          </div>
          <div class="plm-secondary-img">
            <img
              src="<?php echo $clientPhotos['gallery01']; ?>"
              alt="Bathroom tile and plumbing fixture installation Bowdon GA"
              width="240" height="240"
              loading="lazy">
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="plm-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ PLUMBING SCOPE (FEATURED / SIGNATURE SECTION) ═════════ -->
  <section class="plm-scope-section" id="plm-scope" aria-labelledby="plm-scope-heading">
    <div class="container">
      <div class="plm-scope-header" data-animate="fade-up">
        <span class="plm-eyebrow" style="background:rgba(var(--color-accent-rgb),0.2);color:var(--color-accent);">What We Handle</span>
        <h2 id="plm-scope-heading">Plumbing Scope During a Remodel</h2>
        <p>From rough-in for new bathrooms to moving waste lines in an open floor plan — here's what plumbing work looks like integrated into a Gray Tile remodel.</p>
      </div>
      <div class="plm-scope-grid">
        <div class="plm-scope-card" data-animate="fade-up">
          <div class="plm-scope-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z"/><path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97"/></svg>
          </div>
          <div>
            <h3>Rough-In for New Bathrooms</h3>
            <p>New toilet, vanity, and shower drain and supply rough-in for additions and converted spaces. Includes drain line sloping back to the main stack, supply runs to each fixture location, and vent connections to prevent siphoning.</p>
            <span class="plm-scope-detail">$2,500–$5,500 typical range in Carroll County</span>
          </div>
        </div>
        <div class="plm-scope-card" data-animate="fade-up">
          <div class="plm-scope-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
          </div>
          <div>
            <h3>Moving Supply Lines</h3>
            <p>Relocating hot and cold supply lines when a layout changes — flipping a bathroom, moving a kitchen sink, or adding an island with a second sink. Supply lines run under pressure and are easier to reroute than drain lines.</p>
            <span class="plm-scope-detail">$800–$2,500 depending on distance and access</span>
          </div>
        </div>
        <div class="plm-scope-card" data-animate="fade-up">
          <div class="plm-scope-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/><line x1="2" y1="12" x2="6" y2="12"/><line x1="18" y1="12" x2="22" y2="12"/><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/></svg>
          </div>
          <div>
            <h3>Waste Line Extension</h3>
            <p>Extending drain and waste lines to serve a basement kitchen or addition. Basement rough-in often requires cutting concrete for drain line installation — a separate cost item we scope explicitly before quoting.</p>
            <span class="plm-scope-detail">Concrete cutting adds $1,200–$2,800 for basement work</span>
          </div>
        </div>
        <div class="plm-scope-card" data-animate="fade-up">
          <div class="plm-scope-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
          </div>
          <div>
            <h3>Fixture Installation</h3>
            <p>Toilet, vanity faucet, shower valve, tub filler, and kitchen fixture installation at the completion phase of a remodel. We install fixtures after tile and finish work is complete so nothing gets damaged during construction.</p>
            <span class="plm-scope-detail">Included as part of full remodel scope</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="plm-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,55 1200,0 1200,55" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ PROCESS STEPS ══════════════════════════════════════════ -->
  <section class="plm-process" aria-labelledby="plm-process-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="plm-eyebrow">How It Works</span>
        <h2 id="plm-process-heading" style="text-wrap:balance;">Plumbing Phase<br><span class="plm-accent">Within Your Remodel</span></h2>
      </div>
      <div class="plm-process-grid">
        <div class="plm-step" data-animate="fade-up">
          <span class="plm-step-num">01</span>
          <h4>Plumbing Scope Assessment</h4>
          <p>We trace existing supply and drain lines, identify the main stack location, and determine what's required to serve the new layout. Complex moves (flipped bathrooms, basement kitchens) get specific line-item pricing before demo begins.</p>
        </div>
        <div class="plm-step" data-animate="fade-up">
          <span class="plm-step-num">02</span>
          <h4>Carroll County Plumbing Permit</h4>
          <p>All rough-in and line-relocation work requires a Carroll County plumbing permit. We apply for the permit before demolition so work can begin immediately after demo is complete — no waiting.</p>
        </div>
        <div class="plm-step" data-animate="fade-up">
          <span class="plm-step-num">03</span>
          <h4>Rough-In After Framing</h4>
          <p>Plumbing rough-in is scheduled immediately after framing inspection passes — drain lines, supply lines, and vent connections before walls are insulated and closed. Carroll County rough-in inspection is scheduled and passed at this stage.</p>
        </div>
        <div class="plm-step" data-animate="fade-up">
          <span class="plm-step-num">04</span>
          <h4>Fixture Trim-Out at Project End</h4>
          <p>Fixtures are installed at the completion of finish work — after tile, drywall, and paint. This prevents damage during construction and allows exact fixture placement relative to final tile layout.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="plm-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,28 C400,55 800,5 1200,28 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ═══════════════════════════════════════════ -->
  <section class="plm-cta-banner" aria-label="Plumbing services CTA">
    <div class="container">
      <h2 data-animate="fade-up">Plan Your Plumbing Scope Before Demolition Starts</h2>
      <p class="prose-centered" data-animate="fade-up">
        Plumbing changes are far cheaper to plan before demo than to discover mid-project. Get a full plumbing scope assessment with your remodel estimate — no separate plumber call required.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="plm-cta-phone" data-animate="fade-up"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
      <?php endif; ?>
      <div class="plm-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get Your Plumbing Estimate</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="plm-faq" aria-labelledby="plm-faq-heading">
    <div class="container">
      <div style="text-align:center;" data-animate="fade-up">
        <span class="plm-eyebrow">Common Questions</span>
        <h2 id="plm-faq-heading" style="text-wrap:balance;">Plumbing FAQ — <span class="plm-accent">Remodels in Carroll County</span></h2>
      </div>
      <div class="plm-faq-list" role="list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="plm-faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="plm-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="plm-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="plm-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ═══════════════════════════════════════ -->
  <section class="section" style="padding:var(--section-pad);background:var(--color-bg-alt);" aria-label="Other services you may need">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-3xl);" data-animate="fade-up">
        <span class="plm-eyebrow">Also From Gray Tile</span>
        <h2 style="text-wrap:balance;">Other Services <span class="plm-accent">You May Need</span></h2>
      </div>
      <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo05']; ?>" alt="Bathroom remodeling Bowdon Georgia tile showers vanities" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="bath"></i></div>
            <h3>Bathroom Remodeling</h3>
            <p class="service-card__desc">Complete bathroom renovations — tile, fixtures, vanities, and all rough-in plumbing throughout Carroll County.</p>
            <ul>
              <li>Custom tile showers &amp; floors</li>
              <li>Plumbing rough-in included</li>
              <li>2–4 week typical timeline</li>
            </ul>
            <a href="/services/bathroom-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo06']; ?>" alt="Basement kitchen remodeling Bowdon GA plumbing extension" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="utensils"></i></div>
            <h3>Basement Kitchen Remodeling</h3>
            <p class="service-card__desc">Full basement kitchen addition with supply and drain line extension, rough-in, and fixture installation.</p>
            <ul>
              <li>Drain line extension included</li>
              <li>Concrete cutting if needed</li>
              <li>Permit-managed process</li>
            </ul>
            <a href="/services/basement-kitchen-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo08']; ?>" alt="Seasonal services maintenance Bowdon GA remodeling" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="wrench"></i></div>
            <h3>Seasonal Services</h3>
            <p class="service-card__desc">Scheduled maintenance, minor plumbing repairs, and pre-winter and pre-summer home readiness throughout Carroll County.</p>
            <ul>
              <li>Plumbing inspection &amp; repair</li>
              <li>Fixture replacement</li>
              <li>Scheduled service visits</li>
            </ul>
            <a href="/services/seasonal-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="plm-closing" aria-label="Closing call to action">
    <div class="container" data-animate="fade-up">
      <span class="plm-eyebrow">No Separate Plumber Required</span>
      <h2>Get Plumbing Scoped with Your Remodel from Day One</h2>
      <p class="prose-centered">
        Free remodel estimates throughout Bowdon and Carroll County. Plumbing, electrical, and framing scoped together — no handoffs, no mid-project surprises.
      </p>
      <div class="plm-btn-group">
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
