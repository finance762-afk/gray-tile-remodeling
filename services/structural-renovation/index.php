<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Structural Renovation Bowdon GA | Load-Bearing & Beam Work';
$pageDescription = 'Structural renovation in Bowdon, GA — load-bearing wall removal, beam installation, foundation repair, and major structural modifications with engineering documentation in Carroll County.';
$canonicalUrl    = $siteUrl . '/services/structural-renovation/';
$ogImage         = $clientPhotos['photo12'];
$heroPreloadImage = $clientPhotos['photo12'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'structural-renovation') { $currentService = $svc; break; }
}

$pageFaqs = [
    ['q' => 'What is structural renovation and when do I need it?',
     'a' => 'Structural renovation involves changes to the load-bearing elements of your home — walls that carry the weight of floors and roofs above them, beams, columns, foundations, and major opening modifications. You need structural work when removing walls to open floor plans, creating large window or door openings, repairing structural damage from settling or water, adding second-story loads above existing first-floor spaces, or repairing compromised framing from age or pest damage. Cosmetic remodeling that doesn\'t touch structural elements does not require this scope.'],
    ['q' => 'Do I need a structural engineer for renovation work in Bowdon?',
     'a' => 'Yes, for any work that involves load-bearing walls, beams, or foundation elements, Carroll County requires engineering documentation before a permit is issued. A licensed structural engineer calculates the loads, specifies the correct beam size and post configuration, and stamps the drawings. We work with engineers as part of our process — you don\'t need to find and coordinate one separately. Engineering fees are typically $500–$2,000 depending on project complexity and are included in our project management scope.'],
    ['q' => 'What does structural renovation cost in Carroll County?',
     'a' => 'Cost varies significantly by scope. A single load-bearing wall removal with beam and post installation typically runs $8,000–$20,000 including engineering, permits, and finish work. Multi-room open-floor-plan modifications run $20,000–$50,000. Foundation repair and underpinning projects are assessed individually — typical range is $5,000–$30,000 depending on extent. We provide detailed estimates after a site assessment and engineering review, not ballpark figures from photos.'],
    ['q' => 'How do you handle load-bearing walls in Bowdon-area homes?',
     'a' => 'Load-bearing wall removal follows a strict sequence. First, we document the existing load path with a structural engineer. The engineer specifies the replacement beam size, connection details, and post or column locations. We pull the Carroll County structural permit. During construction, we install temporary shoring before any existing structure is removed, install the new beam and post system, and verify the load transfer before removing shoring. Carroll County inspects the framing before walls are closed. This process is non-negotiable — cutting corners on load-bearing work endangers the structure and occupants.'],
    ['q' => 'What permits are required for structural work in Carroll County?',
     'a' => 'Structural work requires a Carroll County building permit with engineered drawings. The permit application includes the structural engineer\'s stamped plans showing existing conditions, the proposed modifications, and the replacement structural members. Carroll County plan review examines the drawings and may request clarification before issuing the permit. Once issued, work requires framing inspections before walls are closed. Final inspection is required before occupancy. We manage the entire permit process from application through final sign-off.'],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   STRUCTURAL-RENOVATION/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   CSS prefix: .str-
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.str-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo12']; ?>');
  background-size: cover;
  background-position: center 45%;
  background-repeat: no-repeat;
}
.str-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(140deg, rgba(var(--color-primary-dark-rgb), 0.96) 0%, rgba(var(--color-primary-rgb), 0.72) 55%, rgba(var(--color-accent-rgb), 0.10) 100%);
  z-index: 1;
}
.str-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 2; pointer-events: none;
}
.str-hero .hero-content { position: relative; z-index: 3; padding: var(--space-4xl) 0 var(--space-3xl); max-width: 700px; }
.str-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.88) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  margin-bottom: var(--space-lg); text-wrap: balance;
}
.str-hero .hero-subhead { color: rgba(255,255,255,0.88); font-size: clamp(1rem, 2vw, 1.2rem); max-width: 58ch; margin-bottom: var(--space-2xl); line-height: 1.65; }
.str-hero .hero-cta-group { display: flex; gap: var(--space-md); flex-wrap: wrap; }
@media (max-width: 767px) {
  .str-hero { min-height: 70vh; }
  .str-hero .hero-content { padding: var(--space-3xl) 0 var(--space-2xl); }
}

/* ── Breadcrumb ───────────────────────────────────────────────── */
.str-breadcrumb-bar { background: var(--color-bg-alt); padding: var(--space-md) 0; border-bottom: 1px solid var(--color-gray-light); }
.str-breadcrumb-nav { display: flex; align-items: center; gap: var(--space-sm); font-size: 0.875rem; color: var(--color-text-light); flex-wrap: wrap; }
.str-breadcrumb-nav a { color: var(--color-accent); font-weight: 500; }
.str-breadcrumb-nav a:hover { color: var(--color-primary); }
.str-breadcrumb-sep { color: var(--color-gray); font-size: 0.75rem; }
.str-breadcrumb-current { color: var(--color-text); font-weight: 600; }

/* ── Shared utilities ─────────────────────────────────────────── */
.str-eyebrow {
  display: inline-block; font-family: var(--font-heading); font-size: 0.78rem; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.12em; color: var(--color-accent);
  background: rgba(var(--color-accent-rgb), 0.1); padding: var(--space-xs) var(--space-md);
  border-radius: var(--radius-full); margin-bottom: var(--space-md);
}
.str-text-accent { color: var(--color-accent); }
.str-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.str-divider svg { display: block; width: 100%; height: 55px; }

/* ── Intro split ──────────────────────────────────────────────── */
.str-intro-section { padding: var(--space-3xl) 0 var(--space-2xl); background: var(--color-bg); }
.str-intro-inner { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3xl); align-items: start; }
@media (max-width: 899px) { .str-intro-inner { grid-template-columns: 1fr; } }
.str-intro-copy h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.str-intro-copy .lead-para { font-size: 1.08rem; font-weight: 500; color: var(--color-primary); border-left: 3px solid var(--color-accent); padding-left: var(--space-md); margin-bottom: var(--space-lg); max-width: 62ch; }
.str-intro-copy p { color: var(--color-text); font-size: 1rem; line-height: 1.7; max-width: 62ch; margin-bottom: var(--space-md); }
.str-last-updated { font-size: 0.8rem; color: var(--color-gray); margin-top: var(--space-md); }

/* ── Photo composition ────────────────────────────────────────── */
.str-photo-comp { position: relative; padding-bottom: var(--space-2xl); }
.str-photo-frame { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); border: 4px solid var(--color-white); aspect-ratio: 4/3; }
.str-photo-frame img { width: 100%; height: 100%; object-fit: cover; display: block; }
.str-stat-badge { position: absolute; bottom: 0; right: -10px; background: var(--color-primary-dark); color: var(--color-white); border-radius: var(--radius-md); padding: var(--space-md) var(--space-lg); box-shadow: var(--shadow-lg); text-align: center; min-width: 148px; z-index: 2; border: 2px solid var(--color-accent); }
.str-stat-badge .stat-num { display: block; font-family: var(--font-heading); font-size: 1.4rem; font-weight: 800; line-height: 1.2; margin-bottom: var(--space-xs); color: var(--color-accent); }
.str-stat-badge .stat-lbl { display: block; font-size: 0.72rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; opacity: 0.8; }
.str-photo-accent { position: absolute; top: -6px; left: 20px; width: 56px; height: 4px; background: var(--color-accent); border-radius: var(--radius-full); }
@media (max-width: 767px) { .str-stat-badge { right: 0; } }

/* ── Structural work types (dark grid section) ────────────────── */
.str-types-section {
  padding: var(--section-pad); background: var(--color-primary);
  position: relative; overflow: hidden;
}
@media (max-width: 767px) { .str-types-section { padding: var(--section-pad-mobile); } }
.str-types-section::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.07; pointer-events: none;
}
.str-types-header { text-align: center; margin-bottom: var(--space-3xl); position: relative; z-index: 1; }
.str-types-header h2 { color: var(--color-white); font-size: clamp(1.6rem, 3.5vw, 2.4rem); text-wrap: balance; }
.str-types-header .str-eyebrow { background: rgba(var(--color-accent-rgb), 0.2); color: var(--color-accent); }
.str-types-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-lg); position: relative; z-index: 1; }
@media (max-width: 1023px) { .str-types-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .str-types-grid { grid-template-columns: 1fr; } }
.str-type-card {
  background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);
  border-radius: var(--radius-lg); padding: var(--space-xl) var(--space-lg);
  border-top: 3px solid var(--color-accent);
  transition: transform var(--transition-base), background var(--transition-base);
}
.str-type-card:hover { transform: translateY(-4px); background: rgba(255,255,255,0.09); }
.str-type-icon {
  width: 44px; height: 44px; background: rgba(var(--color-accent-rgb), 0.18);
  border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center;
  color: var(--color-accent); margin-bottom: var(--space-md);
}
.str-type-card h3 { color: var(--color-white); font-size: 1.12rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.str-type-card p { color: rgba(255,255,255,0.7); font-size: 0.9rem; line-height: 1.6; margin: 0; }
.str-type-note { display: inline-block; font-family: var(--font-heading); font-size: 0.78rem; font-weight: 700; color: var(--color-accent); text-transform: uppercase; letter-spacing: 0.06em; margin-top: var(--space-md); }

/* ── Process steps ────────────────────────────────────────────── */
.str-process-section { padding: var(--section-pad); background: var(--color-bg-alt); }
@media (max-width: 767px) { .str-process-section { padding: var(--section-pad-mobile); } }
.str-process-steps { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl); margin-top: var(--space-2xl); }
@media (max-width: 1023px) { .str-process-steps { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .str-process-steps { grid-template-columns: 1fr; } }
.str-process-step {
  background: var(--color-bg); border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg); border-top: 3px solid var(--color-accent);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.str-process-step::before { content: ''; display: block; width: 32px; height: 3px; background: var(--color-accent); border-radius: var(--radius-full); margin-bottom: var(--space-sm); }
.str-process-step:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.str-step-num { font-family: var(--font-heading); font-size: 3rem; font-weight: 900; color: rgba(var(--color-accent-rgb), 0.18); line-height: 1; margin-bottom: var(--space-sm); display: block; }
.str-process-step h4 { color: var(--color-primary); font-size: 1.05rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.str-process-step p { color: var(--color-text-light); font-size: 0.9rem; line-height: 1.6; margin: 0; }

/* ── CTA Banner ───────────────────────────────────────────────── */
.str-cta-banner {
  padding: var(--space-4xl) var(--space-xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative; overflow: hidden; text-align: center;
}
.str-cta-banner::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E"); opacity: 0.06; pointer-events: none; }
.str-cta-banner .container { position: relative; z-index: 1; }
.str-cta-banner h2 { color: var(--color-white); margin-bottom: var(--space-md); text-wrap: balance; }
.str-cta-banner p { color: rgba(255,255,255,0.8); font-size: 1.05rem; max-width: 55ch; margin: 0 auto var(--space-2xl); }
.str-cta-phone { display: block; font-family: var(--font-heading); font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 700; color: var(--color-accent); margin-bottom: var(--space-xl); letter-spacing: 0.02em; }
.str-cta-phone:hover { color: var(--color-white); }
.str-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.str-faq-section { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .str-faq-section { padding: var(--section-pad-mobile); } }
.str-faq-list { max-width: 800px; margin: var(--space-2xl) auto 0; display: flex; flex-direction: column; gap: var(--space-md); }
.str-faq-item { border: 1px solid var(--color-gray-light); border-radius: var(--radius-md); overflow: hidden; transition: box-shadow var(--transition-base); }
.str-faq-item:hover { box-shadow: var(--shadow-md); }
.faq-question { width: 100%; background: var(--color-bg); border: none; text-align: left; padding: var(--space-lg) var(--space-xl); font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--color-primary); cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: var(--space-md); transition: background var(--transition-fast), color var(--transition-fast); }
.faq-question:hover { background: var(--color-bg-alt); color: var(--color-accent); }
.faq-question[aria-expanded="true"] { background: var(--color-primary); color: var(--color-white); }
.faq-icon { flex-shrink: 0; width: 20px; height: 20px; border-radius: 50%; border: 2px solid currentColor; display: flex; align-items: center; justify-content: center; transition: transform var(--transition-base); font-size: 1rem; line-height: 1; }
.faq-question[aria-expanded="true"] .faq-icon { transform: rotate(45deg); }
.faq-answer { display: none; padding: 0 var(--space-xl) var(--space-lg); background: var(--color-bg); color: var(--color-text); font-size: 0.97rem; line-height: 1.7; border-top: 1px solid var(--color-gray-light); }
.faq-answer.is-open { display: block; }

/* ── Engineering badge bar ────────────────────────────────────── */
.str-eng-bar { background: var(--color-bg-alt); border-top: 3px solid var(--color-accent); border-bottom: 1px solid var(--color-gray-light); padding: var(--space-lg) 0; }
.str-eng-inner { display: flex; align-items: center; justify-content: center; gap: var(--space-3xl); flex-wrap: wrap; }
.str-eng-item { display: flex; flex-direction: column; align-items: center; gap: var(--space-xs); text-align: center; }
.str-eng-item .ev { font-family: var(--font-heading); font-size: 1.6rem; font-weight: 800; color: var(--color-primary); line-height: 1; }
.str-eng-item .el { font-family: var(--font-heading); font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--color-text-light); }
.str-eng-sep { width: 1px; height: 40px; background: var(--color-gray-light); }
@media (max-width: 599px) { .str-eng-sep { display: none; } .str-eng-inner { gap: var(--space-xl); } }

/* ── Closing CTA ──────────────────────────────────────────────── */
.str-closing-cta { padding: var(--section-pad); background: var(--color-bg-alt); text-align: center; }
@media (max-width: 767px) { .str-closing-cta { padding: var(--section-pad-mobile); } }
.str-closing-cta h2 { color: var(--color-primary); margin-bottom: var(--space-md); text-wrap: balance; }
.str-closing-cta p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto var(--space-2xl); }
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="str-hero" aria-label="Structural renovation hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">Structural Renovation in Bowdon, GA</h1>
      <p class="hero-subhead" data-animate="fade-up">
        Load-bearing wall removal, beam installation, major openings, and foundation work —
        done right with engineering documentation, Carroll County permits, and 25 years of
        structural experience in West Georgia.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Assess Your Project</a>
        <a href="#str-types" class="btn btn-outline-white btn-lg">Types of Structural Work</a>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="str-breadcrumb-bar" aria-label="Breadcrumb navigation">
    <div class="container">
      <nav class="str-breadcrumb-nav" aria-label="You are here">
        <a href="/">Home</a>
        <span class="str-breadcrumb-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="str-breadcrumb-sep" aria-hidden="true">›</span>
        <span class="str-breadcrumb-current" aria-current="page">Structural Renovation</span>
      </nav>
    </div>
  </div>

  <!-- ══ INTRO SPLIT ══════════════════════════════════════════ -->
  <section class="str-intro-section" aria-labelledby="str-intro-heading">
    <div class="container">
      <div class="str-intro-inner">

        <div class="str-intro-copy" data-animate="fade-up">
          <span class="str-eyebrow">Structural Renovation Bowdon, GA</span>
          <h2 id="str-intro-heading">When the Bones of Your Home Need to Change</h2>
          <p class="lead-para">
            Structural renovation means modifying the load-bearing elements of your home —
            walls that carry floors and roofs, beams, foundations, and major openings.
            Gray Tile handles structural work with engineering documentation and Carroll County permits
            on every project. No shortcuts on the structure.
          </p>
          <p>
            Most structural renovation in Carroll County homes involves one of a few scenarios: creating
            an open floor plan by removing a wall between kitchen and living areas, building a large opening
            for a new window or door, repairing framing damage from settling or water intrusion, or adding
            structural capacity for a second-story addition or heavy renovation.
          </p>
          <p>
            The critical difference between structural work done right and structural work done dangerously
            is engineering. A licensed structural engineer calculates the loads a wall is carrying before
            removal, specifies the correct beam size and post configuration to transfer those loads safely,
            and documents the work for the Carroll County permit. We work with structural engineers as a
            standard part of our process — not as an afterthought when the county asks.
          </p>
          <p>
            Carroll County building inspections are required for structural work and protect homeowners as
            much as they protect the building department. Unpermitted structural modifications create title
            issues at sale, void homeowner's insurance in many cases, and — more importantly — can be
            structurally dangerous for the home's occupants. We do not perform structural work without permits.
          </p>
          <p class="str-last-updated">Last updated: April 2026</p>
        </div>

        <div class="str-photo-comp" data-animate="fade-up">
          <div class="str-photo-accent"></div>
          <div class="str-photo-frame">
            <img
              src="<?php echo $clientPhotos['photo13']; ?>"
              alt="Structural renovation in progress Bowdon Georgia showing beam installation and load-bearing wall modification"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="str-stat-badge">
            <span class="stat-num">Engineering-Backed</span>
            <span class="stat-lbl">Every Structural Project</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Engineering Badge Bar ─────────────────────────────── -->
  <div class="str-eng-bar">
    <div class="container">
      <div class="str-eng-inner">
        <div class="str-eng-item">
          <span class="ev">100%</span>
          <span class="el">Engineering Documented</span>
        </div>
        <div class="str-eng-sep" aria-hidden="true"></div>
        <div class="str-eng-item">
          <span class="ev">25</span>
          <span class="el">Years Structural Experience</span>
        </div>
        <div class="str-eng-sep" aria-hidden="true"></div>
        <div class="str-eng-item">
          <span class="ev">All</span>
          <span class="el">Carroll County Permitted</span>
        </div>
        <div class="str-eng-sep" aria-hidden="true"></div>
        <div class="str-eng-item">
          <span class="ev">Licensed</span>
          <span class="el">&amp; Insured</span>
        </div>
      </div>
    </div>
  </div>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="str-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ STRUCTURAL WORK TYPES ═════════════════════════════════ -->
  <section class="str-types-section" id="str-types" aria-labelledby="str-types-heading">
    <div class="container">
      <div class="str-types-header" data-animate="fade-up">
        <span class="str-eyebrow">What We Handle</span>
        <h2 id="str-types-heading">Types of Structural Renovation<br><span style="color:var(--color-accent);">in Carroll County Homes</span></h2>
      </div>
      <div class="str-types-grid">
        <div class="str-type-card" data-animate="fade-up">
          <div class="str-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
          </div>
          <h3>Load-Bearing Wall Removal</h3>
          <p>Opening walls between kitchen, dining, and living areas for open floor plans. Requires structural engineering to size the replacement beam and confirm post locations before any wall comes down.</p>
          <span class="str-type-note">Engineering Required</span>
        </div>
        <div class="str-type-card" data-animate="fade-up">
          <div class="str-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="6" width="20" height="8" rx="1"/><path d="M17 14v7"/><path d="M7 14v7"/><path d="M17 3v3"/><path d="M7 3v3"/><path d="M10 14L2.3 21.3"/><path d="M14 6L21.7 13.7"/></svg>
          </div>
          <h3>Beam Installation</h3>
          <p>LVL, steel, or engineered lumber beam installation for new openings and structural span modifications. Beam sizing is determined by a licensed structural engineer based on actual load calculations.</p>
          <span class="str-type-note">Permit Required</span>
        </div>
        <div class="str-type-card" data-animate="fade-up">
          <div class="str-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
          </div>
          <h3>Foundation Work</h3>
          <p>Pier underpinning for settling foundations, crawl space structural repairs, and sill plate replacement for deteriorated framing near grade. Common in older Bowdon-area homes where original foundations have shifted.</p>
          <span class="str-type-note">Engineered Assessment</span>
        </div>
        <div class="str-type-card" data-animate="fade-up">
          <div class="str-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
          </div>
          <h3>Wall Opening Enlargement</h3>
          <p>Enlarging existing openings for wider doors, picture windows, or garage door openings. Requires header upsizing and temporary shoring during work. Common in garage conversion projects.</p>
          <span class="str-type-note">Permit Required</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="str-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,55 1200,0 1200,55" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ PROCESS STEPS ══════════════════════════════════════════ -->
  <section class="str-process-section" aria-labelledby="str-process-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="str-eyebrow">Our Process</span>
        <h2 id="str-process-heading" style="text-wrap:balance;">How We Handle Structural Work<br><span class="str-text-accent">in Bowdon, GA</span></h2>
      </div>
      <div class="str-process-steps">
        <div class="str-process-step" data-animate="fade-up">
          <span class="str-step-num">01</span>
          <h4>Site Assessment &amp; Load Analysis</h4>
          <p>We visit the site, assess the existing structure, and identify which elements are load-bearing. For any structural modification, we engage a licensed structural engineer for the required load calculations before proposing scope or pricing. This step is non-negotiable.</p>
        </div>
        <div class="str-process-step" data-animate="fade-up">
          <span class="str-step-num">02</span>
          <h4>Engineering Documentation</h4>
          <p>The structural engineer produces stamped drawings specifying the replacement beam size, post locations, connection details, and any required foundation modifications. These drawings are submitted with the Carroll County permit application.</p>
        </div>
        <div class="str-process-step" data-animate="fade-up">
          <span class="str-step-num">03</span>
          <h4>Permit, Shoring &amp; Structural Work</h4>
          <p>After permit issuance, we install temporary shoring to support existing loads before any structural element is modified. New beams, posts, and connections are installed per the engineered drawings. Carroll County framing inspection is scheduled before work is enclosed.</p>
        </div>
        <div class="str-process-step" data-animate="fade-up">
          <span class="str-step-num">04</span>
          <h4>Inspection, Enclosure &amp; Finishes</h4>
          <p>The framing inspection is passed, temporary shoring is removed, and wall enclosure proceeds. Drywall, insulation, paint, and finish materials are installed to match the existing home. Final inspection is scheduled and passed before project close-out.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="str-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,28 C400,55 800,5 1200,28 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ═══════════════════════════════════════════ -->
  <section class="str-cta-banner" aria-label="Structural renovation CTA">
    <div class="container">
      <h2 data-animate="fade-up">Structural Work Is Not a DIY Project — Get It Done Right</h2>
      <p class="prose-centered" data-animate="fade-up">
        Free site assessments for structural renovation in Bowdon and Carroll County.
        We'll tell you what your project requires — engineering, permits, scope, and
        realistic cost — before you make any commitment.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="str-cta-phone" data-animate="fade-up"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
      <?php endif; ?>
      <div class="str-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Schedule Your Assessment</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="str-faq-section" aria-labelledby="str-faq-heading">
    <div class="container">
      <div style="text-align:center;" data-animate="fade-up">
        <span class="str-eyebrow">Common Questions</span>
        <h2 id="str-faq-heading" style="text-wrap:balance;">Structural Renovation FAQ — <span class="str-text-accent">Carroll County, GA</span></h2>
      </div>
      <div class="str-faq-list" role="list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="str-faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="str-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="str-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="str-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ═══════════════════════════════════════ -->
  <section class="section" style="padding:var(--section-pad);background:var(--color-bg-alt);" aria-label="Other services you may need">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-3xl);" data-animate="fade-up">
        <span class="str-eyebrow">Also From Gray Tile</span>
        <h2 style="text-wrap:balance;">Other Services <span class="str-text-accent">You May Need</span></h2>
      </div>
      <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo04']; ?>" alt="Framing contractor Bowdon Georgia structural framing services" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hammer"></i></div>
            <h3>Framing Contractor</h3>
            <p class="service-card__desc">Structural framing for additions and renovations — built to tile-grade L/360 deflection.</p>
            <ul><li>L/360 floor deflection</li><li>Load-bearing expertise</li><li>Carroll County permitted</li></ul>
            <a href="/services/framing-contractor/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo08']; ?>" alt="Full home remodel Bowdon GA complete renovation" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Full Home Remodel</h3>
            <p class="service-card__desc">When structural work is part of a larger renovation — one team handles everything.</p>
            <ul><li>Structural through finish</li><li>All trades coordinated</li><li>One contract, one timeline</li></ul>
            <a href="/services/full-home-remodel/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo05']; ?>" alt="Home additions Bowdon GA structural addition construction" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="home"></i></div>
            <h3>Home Additions</h3>
            <p class="service-card__desc">New structural additions that tie into your existing home — foundation through finishes.</p>
            <ul><li>Foundation &amp; framing</li><li>Ties into existing structure</li><li>Permit management included</li></ul>
            <a href="/services/home-additions/" class="service-card__cta">Learn more</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="str-closing-cta" aria-label="Closing call to action">
    <div class="container" data-animate="fade-up">
      <span class="str-eyebrow">Engineering-Backed from Day One</span>
      <h2>Structural Work Done Right Protects Your Home for Decades</h2>
      <p class="prose-centered">
        Free assessments for structural renovation throughout Bowdon, Carrollton, Villa Rica,
        Bremen, Temple, and Carroll County. We scope the project, coordinate engineering,
        and manage permits — you get a safe, inspected, finished result.
      </p>
      <div class="str-btn-group">
        <a href="/contact/" class="btn btn-primary btn-lg">Get Your Free Assessment</a>
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
