<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Room Additions Bowdon GA | Bedroom, Bath & Sunroom';
$pageDescription = 'Add a bedroom, bathroom, sunroom, or family room to your Bowdon, GA home. Gray Tile handles Carroll County permits, framing, and finish work — $40K–$120K typical range.';
$canonicalUrl    = $siteUrl . '/services/room-additions/';
$ogImage         = $clientPhotos['photo06'];
$heroPreloadImage = $clientPhotos['photo06'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'room-additions') { $currentService = $svc; break; }
}

$pageFaqs = [
    ['q' => 'How much does a room addition cost in Bowdon, GA?',
     'a' => 'Room additions in the Bowdon area typically run $40,000–$120,000 depending on type and size. A simple bedroom addition with standard finishes lands in the $40,000–$65,000 range. Bathroom additions with custom tile and plumbing rough-in run $45,000–$75,000. A full sunroom or family room with HVAC integration typically falls between $60,000–$120,000. These ranges include Carroll County permits, framing, mechanical rough-ins, insulation, drywall, and finish work.'],
    ['q' => 'How long does a room addition take in Carroll County?',
     'a' => 'Most room additions take 8–16 weeks from permit approval to final inspection. Carroll County building permit processing typically takes 2–4 weeks for residential additions. Framing and rough-ins take 2–3 weeks. Inspections, drywall, and finishes add another 3–6 weeks depending on scope and material lead times. We provide a project schedule at the estimate stage and update it as the build progresses.'],
    ['q' => 'What permits are required for a room addition in Carroll County?',
     'a' => 'Carroll County requires a building permit for any room addition — no exceptions. You\'ll need a structural permit for the foundation and framing, mechanical permits for HVAC and electrical, and a plumbing permit if the addition includes a bathroom. We apply for all required permits and schedule all required inspections. Permitted work protects your home\'s resale value and your homeowner\'s insurance coverage.'],
    ['q' => 'What types of room additions add the most value in Bowdon?',
     'a' => 'In the Bowdon and Carroll County market, bathroom additions consistently deliver the highest return — particularly when a home has only one full bath. Bedroom additions that bring a home to three or four bedrooms also perform well given buyer demand patterns in West Georgia. Sunrooms and family rooms add significant lifestyle value but tend to recover less on resale than bedroom and bathroom adds. We can walk through what makes sense for your specific home and goals.'],
    ['q' => 'Does a room addition require a structural engineer in Georgia?',
     'a' => 'Not always, but frequently. Any addition that ties into an existing load-bearing wall, requires new foundation work, or creates unusual structural loads requires engineering documentation. Carroll County plan review will flag these items during permit processing. We work with licensed structural engineers when required and include engineering coordination in our project scope — we don\'t sub this out to you to figure out.'],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   ROOM-ADDITIONS/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   CSS prefix: .ra-
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.ra-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo06']; ?>');
  background-size: cover;
  background-position: center 35%;
  background-repeat: no-repeat;
}
.ra-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(140deg, rgba(var(--color-primary-rgb), 0.90) 0%, rgba(var(--color-primary-dark-rgb), 0.68) 55%, rgba(var(--color-accent-rgb), 0.14) 100%);
  z-index: 1;
}
.ra-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 2; pointer-events: none;
}
.ra-hero .hero-content { position: relative; z-index: 3; padding: var(--space-4xl) 0 var(--space-3xl); max-width: 700px; }
.ra-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.88) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  margin-bottom: var(--space-lg); text-wrap: balance;
}
.ra-hero .hero-subhead { color: rgba(255,255,255,0.88); font-size: clamp(1rem, 2vw, 1.2rem); max-width: 58ch; margin-bottom: var(--space-2xl); line-height: 1.65; }
.ra-hero .hero-cta-group { display: flex; gap: var(--space-md); flex-wrap: wrap; }
@media (max-width: 767px) {
  .ra-hero { min-height: 70vh; }
  .ra-hero .hero-content { padding: var(--space-3xl) 0 var(--space-2xl); }
}

/* ── Breadcrumb ───────────────────────────────────────────────── */
.ra-breadcrumb-bar { background: var(--color-bg-alt); padding: var(--space-md) 0; border-bottom: 1px solid var(--color-gray-light); }
.ra-breadcrumb-nav { display: flex; align-items: center; gap: var(--space-sm); font-size: 0.875rem; color: var(--color-text-light); flex-wrap: wrap; }
.ra-breadcrumb-nav a { color: var(--color-accent); font-weight: 500; }
.ra-breadcrumb-nav a:hover { color: var(--color-primary); }
.ra-breadcrumb-sep { color: var(--color-gray); font-size: 0.75rem; }
.ra-breadcrumb-current { color: var(--color-text); font-weight: 600; }

/* ── Eyebrow & shared text utilities ─────────────────────────── */
.ra-eyebrow {
  display: inline-block; font-family: var(--font-heading); font-size: 0.78rem; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.12em; color: var(--color-accent);
  background: rgba(var(--color-accent-rgb), 0.1); padding: var(--space-xs) var(--space-md);
  border-radius: var(--radius-full); margin-bottom: var(--space-md);
}
.ra-text-accent { color: var(--color-accent); }
.ra-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.ra-divider svg { display: block; width: 100%; height: 55px; }

/* ── Intro split ──────────────────────────────────────────────── */
.ra-intro-section { padding: var(--space-3xl) 0 var(--space-2xl); background: var(--color-bg); }
.ra-intro-inner { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3xl); align-items: start; }
@media (max-width: 899px) { .ra-intro-inner { grid-template-columns: 1fr; } }
.ra-intro-copy h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.ra-intro-copy .lead-para { font-size: 1.08rem; font-weight: 500; color: var(--color-primary); border-left: 3px solid var(--color-accent); padding-left: var(--space-md); margin-bottom: var(--space-lg); max-width: 62ch; }
.ra-intro-copy p { color: var(--color-text); font-size: 1rem; line-height: 1.7; max-width: 62ch; margin-bottom: var(--space-md); }
.ra-last-updated { font-size: 0.8rem; color: var(--color-gray); margin-top: var(--space-md); }

/* ── Photo composition ────────────────────────────────────────── */
.ra-photo-comp { position: relative; padding-bottom: var(--space-2xl); }
.ra-photo-frame { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); border: 4px solid var(--color-white); aspect-ratio: 4/3; }
.ra-photo-frame img { width: 100%; height: 100%; object-fit: cover; display: block; }
.ra-stat-badge { position: absolute; bottom: 0; right: -10px; background: var(--color-accent); color: var(--color-white); border-radius: var(--radius-md); padding: var(--space-md) var(--space-lg); box-shadow: var(--shadow-lg); text-align: center; min-width: 140px; z-index: 2; }
.ra-stat-badge .stat-num { display: block; font-family: var(--font-heading); font-size: 1.7rem; font-weight: 800; line-height: 1; margin-bottom: var(--space-xs); }
.ra-stat-badge .stat-lbl { display: block; font-size: 0.72rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; opacity: 0.9; }
.ra-photo-accent { position: absolute; top: -6px; left: 20px; width: 56px; height: 4px; background: var(--color-accent); border-radius: var(--radius-full); }
@media (max-width: 767px) {
  .ra-stat-badge { right: 0; min-width: 120px; }
  .ra-stat-badge .stat-num { font-size: 1.3rem; }
}

/* ── Addition types (featured dark section) ───────────────────── */
.ra-types-section {
  padding: var(--section-pad); background: var(--color-primary);
  position: relative; overflow: hidden;
}
@media (max-width: 767px) { .ra-types-section { padding: var(--section-pad-mobile); } }
.ra-types-section::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.07; pointer-events: none;
}
.ra-types-header { text-align: center; margin-bottom: var(--space-3xl); position: relative; z-index: 1; }
.ra-types-header h2 { color: var(--color-white); font-size: clamp(1.6rem, 3.5vw, 2.4rem); text-wrap: balance; }
.ra-types-header .ra-eyebrow { background: rgba(var(--color-accent-rgb), 0.2); color: var(--color-accent); }
.ra-types-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-lg); position: relative; z-index: 1; }
@media (max-width: 1023px) { .ra-types-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .ra-types-grid { grid-template-columns: 1fr; } }
.ra-type-card {
  background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1);
  border-radius: var(--radius-lg); padding: var(--space-xl) var(--space-lg);
  border-top: 3px solid var(--color-accent);
  transition: transform var(--transition-base), background var(--transition-base);
}
.ra-type-card:hover { transform: translateY(-4px); background: rgba(255,255,255,0.10); }
.ra-type-icon {
  width: 44px; height: 44px; background: rgba(var(--color-accent-rgb), 0.18);
  border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center;
  color: var(--color-accent); margin-bottom: var(--space-md);
}
.ra-type-card h3 { color: var(--color-white); font-size: 1.15rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.ra-type-card p { color: rgba(255,255,255,0.7); font-size: 0.9rem; line-height: 1.6; margin: 0; }
.ra-type-price { display: inline-block; font-family: var(--font-heading); font-size: 0.82rem; font-weight: 700; color: var(--color-accent); text-transform: uppercase; letter-spacing: 0.06em; margin-top: var(--space-md); }

/* ── Process steps ────────────────────────────────────────────── */
.ra-process-section { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .ra-process-section { padding: var(--section-pad-mobile); } }
.ra-process-steps { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl); margin-top: var(--space-2xl); }
@media (max-width: 1023px) { .ra-process-steps { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .ra-process-steps { grid-template-columns: 1fr; } }
.ra-process-step {
  background: var(--color-bg-alt); border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg); border-top: 3px solid var(--color-accent);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.ra-process-step::before { content: ''; display: block; width: 32px; height: 3px; background: var(--color-accent); border-radius: var(--radius-full); margin-bottom: var(--space-sm); }
.ra-process-step:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.ra-step-num { font-family: var(--font-heading); font-size: 3rem; font-weight: 900; color: rgba(var(--color-accent-rgb), 0.18); line-height: 1; margin-bottom: var(--space-sm); display: block; }
.ra-process-step h4 { color: var(--color-primary); font-size: 1.05rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.ra-process-step p { color: var(--color-text-light); font-size: 0.9rem; line-height: 1.6; margin: 0; }

/* ── CTA Banner ───────────────────────────────────────────────── */
.ra-cta-banner {
  padding: var(--space-4xl) var(--space-xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative; overflow: hidden; text-align: center;
}
.ra-cta-banner::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E"); opacity: 0.06; pointer-events: none; }
.ra-cta-banner .container { position: relative; z-index: 1; }
.ra-cta-banner h2 { color: var(--color-white); margin-bottom: var(--space-md); text-wrap: balance; }
.ra-cta-banner p { color: rgba(255,255,255,0.8); font-size: 1.05rem; max-width: 55ch; margin: 0 auto var(--space-2xl); }
.ra-cta-phone { display: block; font-family: var(--font-heading); font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 700; color: var(--color-accent); margin-bottom: var(--space-xl); letter-spacing: 0.02em; }
.ra-cta-phone:hover { color: var(--color-white); }
.ra-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.ra-faq-section { padding: var(--section-pad); background: var(--color-bg-alt); }
@media (max-width: 767px) { .ra-faq-section { padding: var(--section-pad-mobile); } }
.ra-faq-list { max-width: 800px; margin: var(--space-2xl) auto 0; display: flex; flex-direction: column; gap: var(--space-md); }
.ra-faq-item { border: 1px solid var(--color-gray-light); border-radius: var(--radius-md); overflow: hidden; transition: box-shadow var(--transition-base); }
.ra-faq-item:hover { box-shadow: var(--shadow-md); }
.faq-question { width: 100%; background: var(--color-bg); border: none; text-align: left; padding: var(--space-lg) var(--space-xl); font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--color-primary); cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: var(--space-md); transition: background var(--transition-fast), color var(--transition-fast); }
.faq-question:hover { background: var(--color-bg-alt); color: var(--color-accent); }
.faq-question[aria-expanded="true"] { background: var(--color-primary); color: var(--color-white); }
.faq-icon { flex-shrink: 0; width: 20px; height: 20px; border-radius: 50%; border: 2px solid currentColor; display: flex; align-items: center; justify-content: center; transition: transform var(--transition-base); font-size: 1rem; line-height: 1; }
.faq-question[aria-expanded="true"] .faq-icon { transform: rotate(45deg); }
.faq-answer { display: none; padding: 0 var(--space-xl) var(--space-lg); background: var(--color-bg); color: var(--color-text); font-size: 0.97rem; line-height: 1.7; border-top: 1px solid var(--color-gray-light); }
.faq-answer.is-open { display: block; }

/* ── Credential strip ─────────────────────────────────────────── */
.ra-cred-strip { background: var(--color-bg-alt); border-top: 3px solid var(--color-accent); border-bottom: 1px solid var(--color-gray-light); padding: var(--space-lg) 0; }
.ra-cred-inner { display: flex; align-items: center; justify-content: center; gap: var(--space-3xl); flex-wrap: wrap; }
.ra-cred-item { display: flex; flex-direction: column; align-items: center; gap: var(--space-xs); text-align: center; }
.ra-cred-item .cv { font-family: var(--font-heading); font-size: 1.8rem; font-weight: 800; color: var(--color-primary); line-height: 1; }
.ra-cred-item .cl { font-family: var(--font-heading); font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--color-text-light); }
.ra-cred-sep { width: 1px; height: 40px; background: var(--color-gray-light); }
@media (max-width: 599px) { .ra-cred-sep { display: none; } .ra-cred-inner { gap: var(--space-xl); } }

/* ── Closing CTA ──────────────────────────────────────────────── */
.ra-closing-cta { padding: var(--section-pad); background: var(--color-bg); text-align: center; }
@media (max-width: 767px) { .ra-closing-cta { padding: var(--section-pad-mobile); } }
.ra-closing-cta h2 { color: var(--color-primary); margin-bottom: var(--space-md); text-wrap: balance; }
.ra-closing-cta p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto var(--space-2xl); }
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="ra-hero" aria-label="Room Additions hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">Room Additions in Bowdon, GA</h1>
      <p class="hero-subhead" data-animate="fade-up">
        Add the square footage your family actually needs — bedroom, bathroom, sunroom, or family room.
        Gray Tile handles Carroll County permits, structural framing, and every finish, start to finish.
        Typical projects: $40,000–$120,000.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get Your Addition Estimate</a>
        <a href="#ra-types" class="btn btn-outline-white btn-lg">See Addition Types</a>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="ra-breadcrumb-bar" aria-label="Breadcrumb navigation">
    <div class="container">
      <nav class="ra-breadcrumb-nav" aria-label="You are here">
        <a href="/">Home</a>
        <span class="ra-breadcrumb-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="ra-breadcrumb-sep" aria-hidden="true">›</span>
        <span class="ra-breadcrumb-current" aria-current="page">Room Additions</span>
      </nav>
    </div>
  </div>

  <!-- ══ INTRO SPLIT ══════════════════════════════════════════ -->
  <section class="ra-intro-section" aria-labelledby="ra-intro-heading">
    <div class="container">
      <div class="ra-intro-inner">

        <div class="ra-intro-copy" data-animate="fade-up">
          <span class="ra-eyebrow">Room Additions Bowdon, GA</span>
          <h2 id="ra-intro-heading">Expand Your Home Without Leaving Carroll County</h2>
          <p class="lead-para">
            A room addition adds permanent square footage to your home — typically $40,000–$120,000
            in the Bowdon area depending on type, size, and finish level. Most projects take 8–16 weeks
            from permit approval. Gray Tile manages the entire process: design, permits, framing, mechanicals,
            and all finish work including custom tile where applicable.
          </p>
          <p>
            West Georgia homes — especially those built in the 1970s through 1990s — often have three bedrooms
            and a single full bath. As families grow or resale value matters more, adding a bedroom or bathroom
            changes the home's entire market position. In Carroll County, bedroom additions consistently produce
            strong return on investment because inventory in the three-to-four bedroom range is competitive.
          </p>
          <p>
            The permit and engineering side of additions is where many contractors cut corners. Every addition
            in Carroll County requires a building permit. Foundation work requires a soil evaluation in some cases.
            Load-bearing wall tie-ins require structural engineering. We handle all of it — you don't get handed
            a list of sub-permits to figure out yourself.
          </p>
          <p>
            We also handle all finish work: custom tile in bathroom additions, hardwood or LVP matching your
            existing floors, drywall and paint, and HVAC extension. The addition finishes to the same standard
            as the rest of your home — not a box that looks bolted on.
          </p>
          <p class="ra-last-updated">Last updated: April 2026</p>
        </div>

        <div class="ra-photo-comp" data-animate="fade-up">
          <div class="ra-photo-accent"></div>
          <div class="ra-photo-frame">
            <img
              src="<?php echo $clientPhotos['photo07']; ?>"
              alt="Room addition construction in progress on Bowdon Georgia home showing framing and new exterior walls"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="ra-stat-badge">
            <span class="stat-num">$40K–$120K</span>
            <span class="stat-lbl">Typical Range</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Credential Strip ───────────────────────────────────── -->
  <div class="ra-cred-strip">
    <div class="container">
      <div class="ra-cred-inner">
        <div class="ra-cred-item">
          <span class="cv">25</span>
          <span class="cl">Years Building Additions</span>
        </div>
        <div class="ra-cred-sep" aria-hidden="true"></div>
        <div class="ra-cred-item">
          <span class="cv">8–16</span>
          <span class="cl">Weeks Typical Timeline</span>
        </div>
        <div class="ra-cred-sep" aria-hidden="true"></div>
        <div class="ra-cred-item">
          <span class="cv">100%</span>
          <span class="cl">Carroll County Permitted</span>
        </div>
        <div class="ra-cred-sep" aria-hidden="true"></div>
        <div class="ra-cred-item">
          <span class="cv">1</span>
          <span class="cl">Team, All Trades</span>
        </div>
      </div>
    </div>
  </div>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="ra-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ ADDITION TYPES (FEATURED) ════════════════════════════ -->
  <section class="ra-types-section" id="ra-types" aria-labelledby="ra-types-heading">
    <div class="container">
      <div class="ra-types-header" data-animate="fade-up">
        <span class="ra-eyebrow">What We Build</span>
        <h2 id="ra-types-heading">Four Types of Room Additions<br><span class="ra-text-accent" style="color:var(--color-accent);">for Bowdon-Area Homes</span></h2>
      </div>
      <div class="ra-types-grid">
        <div class="ra-type-card" data-animate="fade-up">
          <div class="ra-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
          </div>
          <h3>Bedroom Additions</h3>
          <p>Add a master suite or fourth bedroom to an under-roomed home. Includes closet, ceiling fan rough-in, and egress window per Georgia code. HVAC extension included in scope.</p>
          <span class="ra-type-price">$40,000 – $75,000</span>
        </div>
        <div class="ra-type-card" data-animate="fade-up">
          <div class="ra-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12h16"/><path d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v14H4V6z"/><circle cx="12" cy="16" r="2"/></svg>
          </div>
          <h3>Bathroom Additions</h3>
          <p>Full bath addition with custom tile shower or tub surround, vanity, toilet, and all plumbing rough-in. We tile our own bathroom additions — same crew, no handoffs, no seam in quality.</p>
          <span class="ra-type-price">$45,000 – $80,000</span>
        </div>
        <div class="ra-type-card" data-animate="fade-up">
          <div class="ra-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          </div>
          <h3>Sunrooms</h3>
          <p>Three-season or four-season sunrooms with insulated glazing appropriate for Georgia summers. Foundation and framing built to handle Georgia heat loads. Tile floors or LVP available.</p>
          <span class="ra-type-price">$55,000 – $100,000</span>
        </div>
        <div class="ra-type-card" data-animate="fade-up">
          <div class="ra-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
          </div>
          <h3>Family Rooms</h3>
          <p>Open-plan family room additions that flow naturally from the existing living or kitchen area. Structural wall opening, beam installation where needed, and flooring that matches the rest of the home.</p>
          <span class="ra-type-price">$65,000 – $120,000</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="ra-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,55 1200,0 1200,55" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,55" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ PROCESS STEPS ══════════════════════════════════════════ -->
  <section class="ra-process-section" aria-labelledby="ra-process-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="ra-eyebrow">Our Process</span>
        <h2 id="ra-process-heading" style="text-wrap:balance;">How We Build Your Addition<br><span class="ra-text-accent">in Carroll County</span></h2>
      </div>
      <div class="ra-process-steps">
        <div class="ra-process-step" data-animate="fade-up">
          <span class="ra-step-num">01</span>
          <h4>Site Visit &amp; Scope Development</h4>
          <p>We walk the site, assess the existing structure, measure, and develop a detailed scope. We identify structural considerations — load-bearing walls, foundation type, HVAC extension requirements — before pricing anything.</p>
        </div>
        <div class="ra-process-step" data-animate="fade-up">
          <span class="ra-step-num">02</span>
          <h4>Carroll County Permits</h4>
          <p>We prepare and submit permit applications for building, mechanical, and plumbing as required. Carroll County residential addition permits typically process in 2–4 weeks. We track status and notify you when approved.</p>
        </div>
        <div class="ra-process-step" data-animate="fade-up">
          <span class="ra-step-num">03</span>
          <h4>Foundation, Framing &amp; Rough-Ins</h4>
          <p>Foundation work begins, followed by framing the exterior and interior walls to structural standards. Plumbing, electrical, and HVAC rough-ins are completed and inspected before walls are closed. We frame to tile-grade L/360 deflection on all floor systems.</p>
        </div>
        <div class="ra-process-step" data-animate="fade-up">
          <span class="ra-step-num">04</span>
          <h4>Insulation, Drywall &amp; Finishes</h4>
          <p>Insulation, drywall, paint, trim, flooring, tile, and fixtures are installed to match your existing home. Final inspections are scheduled and passed. We hand over a finished space, not a construction site.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="ra-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,32 C300,55 900,10 1200,32 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ═══════════════════════════════════════════ -->
  <section class="ra-cta-banner" aria-label="Room additions CTA">
    <div class="container">
      <h2 data-animate="fade-up">Find Out What Your Addition Will Cost Before You Commit</h2>
      <p class="prose-centered" data-animate="fade-up">
        Free estimates for room additions throughout Bowdon and Carroll County. We assess the scope,
        pull the permits, and give you a fixed price before any work starts.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="ra-cta-phone" data-animate="fade-up"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
      <?php endif; ?>
      <div class="ra-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Schedule Your Free Estimate</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="ra-faq-section" aria-labelledby="ra-faq-heading">
    <div class="container">
      <div style="text-align:center;" data-animate="fade-up">
        <span class="ra-eyebrow">Common Questions</span>
        <h2 id="ra-faq-heading" style="text-wrap:balance;">Room Addition FAQ — <span class="ra-text-accent">Bowdon &amp; Carroll County</span></h2>
      </div>
      <div class="ra-faq-list" role="list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="ra-faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="ra-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="ra-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="ra-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg-alt)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ═══════════════════════════════════════ -->
  <section class="section" style="padding:var(--section-pad);background:var(--color-bg-alt);" aria-label="Other services you may need">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-3xl);" data-animate="fade-up">
        <span class="ra-eyebrow">Also From Gray Tile</span>
        <h2 style="text-wrap:balance;">Other Services <span class="ra-text-accent">You May Need</span></h2>
      </div>
      <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo05']; ?>" alt="Home additions Bowdon Georgia expand your living space" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="home"></i></div>
            <h3>Home Additions</h3>
            <p class="service-card__desc">Larger-scale additions — full wings, in-law suites, and multi-room expansions.</p>
            <ul><li>Multi-room additions</li><li>In-law suite builds</li><li>Full structural expansion</li></ul>
            <a href="/services/home-additions/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo04']; ?>" alt="Framing contractor Bowdon GA structural framing for additions" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hammer"></i></div>
            <h3>Framing Contractor</h3>
            <p class="service-card__desc">Structural framing built to tile-grade L/360 deflection — no shortcuts on the bones.</p>
            <ul><li>L/360 floor deflection</li><li>Load-bearing engineering</li><li>Permit-ready framing</li></ul>
            <a href="/services/framing-contractor/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo08']; ?>" alt="Full home remodel Bowdon GA complete renovation one team" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Full Home Remodel</h3>
            <p class="service-card__desc">When you need more than an addition — complete whole-house renovation from one team.</p>
            <ul><li>Every room, one contract</li><li>Permits &amp; trade coordination</li><li>Design through tile finish</li></ul>
            <a href="/services/full-home-remodel/" class="service-card__cta">Learn more</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="ra-closing-cta" aria-label="Closing call to action">
    <div class="container" data-animate="fade-up">
      <span class="ra-eyebrow">Ready When You Are</span>
      <h2>Start with a Free Estimate for Your Room Addition</h2>
      <p class="prose-centered">
        Serving Bowdon, Carrollton, Villa Rica, Bremen, and communities throughout Carroll County.
        One team handles everything from Carroll County permits through final finish.
      </p>
      <div class="ra-btn-group">
        <a href="/contact/" class="btn btn-primary btn-lg">Get Your Free Estimate</a>
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
