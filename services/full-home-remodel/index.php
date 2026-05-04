<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Full Home Remodel Bowdon GA | Whole House Renovation';
$pageDescription = 'Complete whole-house renovation in Bowdon, GA — kitchen, baths, flooring, framing, and every finish. Gray Tile manages all trades and Carroll County permits under one contract.';
$canonicalUrl    = $siteUrl . '/services/full-home-remodel/';
$ogImage         = $clientPhotos['photo08'];
$heroPreloadImage = $clientPhotos['photo08'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'full-home-remodel') { $currentService = $svc; break; }
}

$pageFaqs = [
    ['q' => 'What does a full home remodel actually include?',
     'a' => 'A full home remodel means every interior surface of your home is updated under one contract. That typically includes kitchen cabinets, countertops, and appliances; all bathroom tile, vanities, and fixtures; flooring throughout; interior paint and trim; lighting; HVAC duct cleaning or replacement; and electrical panel update if needed. We assess what your specific home requires and scope it exactly — we don\'t use a fixed package list because every house is different.'],
    ['q' => 'What does a whole-house renovation cost in Georgia?',
     'a' => 'Whole-house renovations in Carroll County and West Georgia typically run $80,000–$250,000 depending on square footage, scope, and finish level. A 1,400 sq ft home with mid-range finishes runs $80,000–$130,000. A 2,200 sq ft home with custom tile, hardwood refinishing, and full kitchen renovation runs $140,000–$220,000. We provide detailed fixed-price estimates after a full walkthrough — not rough ballpark figures over the phone.'],
    ['q' => 'How long does a full home remodel take in Carroll County?',
     'a' => 'Full home renovations typically take 12–24 weeks depending on scope and whether the home is occupied during work. Carroll County permit processing adds 2–4 weeks to the start. We phase work so you can remain in the home in many cases — kitchens and baths on a sequenced schedule, with other trades working in other areas simultaneously. We provide a detailed project schedule at the estimate stage.'],
    ['q' => 'Do you handle all trades for a full home remodel?',
     'a' => 'Yes. Gray Tile manages plumbing, electrical, HVAC, framing, tile, flooring, drywall, paint, and finish carpentry under one contract. You have one point of contact, one schedule, and one warranty. We coordinate sub-trades we\'ve vetted over 25 years of Carroll County work — not random bids from contractor marketplaces.'],
    ['q' => 'What permits are required for a whole-house remodel in Carroll County?',
     'a' => 'The permit requirements depend on scope. Cosmetic work — paint, flooring, cabinet replacement — typically does not require permits. Work that touches structural framing, electrical, plumbing, or HVAC requires the corresponding Carroll County permits. We assess which permits apply to your project, handle all applications, and schedule all required inspections. Permitted work protects your investment and keeps your homeowner\'s insurance valid.'],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   FULL-HOME-REMODEL/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   CSS prefix: .fhr-
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.fhr-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo08']; ?>');
  background-size: cover;
  background-position: center 40%;
  background-repeat: no-repeat;
}
.fhr-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(145deg, rgba(var(--color-primary-dark-rgb), 0.93) 0%, rgba(var(--color-primary-rgb), 0.70) 55%, rgba(var(--color-accent-rgb), 0.12) 100%);
  z-index: 1;
}
.fhr-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 2; pointer-events: none;
}
.fhr-hero .hero-content { position: relative; z-index: 3; padding: var(--space-4xl) 0 var(--space-3xl); max-width: 700px; }
.fhr-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.88) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  margin-bottom: var(--space-lg); text-wrap: balance;
}
.fhr-hero .hero-subhead { color: rgba(255,255,255,0.88); font-size: clamp(1rem, 2vw, 1.2rem); max-width: 58ch; margin-bottom: var(--space-2xl); line-height: 1.65; }
.fhr-hero .hero-cta-group { display: flex; gap: var(--space-md); flex-wrap: wrap; }
@media (max-width: 767px) {
  .fhr-hero { min-height: 70vh; }
  .fhr-hero .hero-content { padding: var(--space-3xl) 0 var(--space-2xl); }
}

/* ── Breadcrumb ───────────────────────────────────────────────── */
.fhr-breadcrumb-bar { background: var(--color-bg-alt); padding: var(--space-md) 0; border-bottom: 1px solid var(--color-gray-light); }
.fhr-breadcrumb-nav { display: flex; align-items: center; gap: var(--space-sm); font-size: 0.875rem; color: var(--color-text-light); flex-wrap: wrap; }
.fhr-breadcrumb-nav a { color: var(--color-accent); font-weight: 500; }
.fhr-breadcrumb-nav a:hover { color: var(--color-primary); }
.fhr-breadcrumb-sep { color: var(--color-gray); font-size: 0.75rem; }
.fhr-breadcrumb-current { color: var(--color-text); font-weight: 600; }

/* ── Shared utilities ─────────────────────────────────────────── */
.fhr-eyebrow {
  display: inline-block; font-family: var(--font-heading); font-size: 0.78rem; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.12em; color: var(--color-accent);
  background: rgba(var(--color-accent-rgb), 0.1); padding: var(--space-xs) var(--space-md);
  border-radius: var(--radius-full); margin-bottom: var(--space-md);
}
.fhr-text-accent { color: var(--color-accent); }
.fhr-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.fhr-divider svg { display: block; width: 100%; height: 55px; }

/* ── Intro split ──────────────────────────────────────────────── */
.fhr-intro-section { padding: var(--space-3xl) 0 var(--space-2xl); background: var(--color-bg); }
.fhr-intro-inner { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3xl); align-items: start; }
@media (max-width: 899px) { .fhr-intro-inner { grid-template-columns: 1fr; } }
.fhr-intro-copy h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.fhr-intro-copy .lead-para { font-size: 1.08rem; font-weight: 500; color: var(--color-primary); border-left: 3px solid var(--color-accent); padding-left: var(--space-md); margin-bottom: var(--space-lg); max-width: 62ch; }
.fhr-intro-copy p { color: var(--color-text); font-size: 1rem; line-height: 1.7; max-width: 62ch; margin-bottom: var(--space-md); }
.fhr-last-updated { font-size: 0.8rem; color: var(--color-gray); margin-top: var(--space-md); }

/* ── Photo composition ────────────────────────────────────────── */
.fhr-photo-comp { position: relative; padding-bottom: var(--space-2xl); }
.fhr-photo-frame { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); border: 4px solid var(--color-white); aspect-ratio: 4/3; }
.fhr-photo-frame img { width: 100%; height: 100%; object-fit: cover; display: block; }
.fhr-stat-badge { position: absolute; bottom: 0; right: -10px; background: var(--color-primary); color: var(--color-white); border-radius: var(--radius-md); padding: var(--space-md) var(--space-lg); box-shadow: var(--shadow-lg); text-align: center; min-width: 150px; z-index: 2; border: 2px solid var(--color-accent); }
.fhr-stat-badge .stat-num { display: block; font-family: var(--font-heading); font-size: 1rem; font-weight: 800; line-height: 1.3; margin-bottom: var(--space-xs); letter-spacing: -0.01em; }
.fhr-stat-badge .stat-lbl { display: block; font-size: 0.72rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--color-accent); }
.fhr-photo-accent { position: absolute; top: -6px; left: 20px; width: 56px; height: 4px; background: var(--color-accent); border-radius: var(--radius-full); }
@media (max-width: 767px) {
  .fhr-stat-badge { right: 0; min-width: 130px; }
  .fhr-stat-badge .stat-num { font-size: 0.9rem; }
}

/* ── Scope checklist (signature editorial section) ────────────── */
.fhr-scope-section {
  padding: var(--section-pad); background: var(--color-bg-alt);
  position: relative; overflow: hidden;
}
@media (max-width: 767px) { .fhr-scope-section { padding: var(--section-pad-mobile); } }
.fhr-scope-inner { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4xl); align-items: start; }
@media (max-width: 899px) { .fhr-scope-inner { grid-template-columns: 1fr; } }
.fhr-scope-copy h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.fhr-scope-copy p { color: var(--color-text-light); font-size: 1rem; line-height: 1.7; max-width: 55ch; margin-bottom: var(--space-md); }
.fhr-scope-copy .pullquote {
  font-family: var(--font-heading); font-size: clamp(1.3rem, 2.5vw, 1.8rem); font-weight: 700;
  color: var(--color-primary); border-left: 4px solid var(--color-accent);
  padding-left: var(--space-lg); margin: var(--space-2xl) 0; line-height: 1.3; text-wrap: balance;
}
.fhr-checklist { display: flex; flex-direction: column; gap: var(--space-sm); }
.fhr-checklist-category { margin-bottom: var(--space-lg); }
.fhr-checklist-category h4 { font-family: var(--font-heading); font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: var(--color-accent); margin-bottom: var(--space-md); border-bottom: 1px solid var(--color-gray-light); padding-bottom: var(--space-sm); }
.fhr-check-item { display: flex; align-items: flex-start; gap: var(--space-sm); font-size: 0.93rem; color: var(--color-text); line-height: 1.5; padding: var(--space-xs) 0; }
.fhr-check-icon { flex-shrink: 0; width: 18px; height: 18px; background: rgba(var(--color-accent-rgb), 0.12); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-top: 2px; }
.fhr-check-icon svg { color: var(--color-accent); }

/* ── Process steps ────────────────────────────────────────────── */
.fhr-process-section { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .fhr-process-section { padding: var(--section-pad-mobile); } }
.fhr-process-steps { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl); margin-top: var(--space-2xl); }
@media (max-width: 1023px) { .fhr-process-steps { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .fhr-process-steps { grid-template-columns: 1fr; } }
.fhr-process-step {
  background: var(--color-bg-alt); border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg); border-top: 3px solid var(--color-accent);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.fhr-process-step::before { content: ''; display: block; width: 32px; height: 3px; background: var(--color-accent); border-radius: var(--radius-full); margin-bottom: var(--space-sm); }
.fhr-process-step:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.fhr-step-num { font-family: var(--font-heading); font-size: 3rem; font-weight: 900; color: rgba(var(--color-accent-rgb), 0.18); line-height: 1; margin-bottom: var(--space-sm); display: block; }
.fhr-process-step h4 { color: var(--color-primary); font-size: 1.05rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.fhr-process-step p { color: var(--color-text-light); font-size: 0.9rem; line-height: 1.6; margin: 0; }

/* ── CTA Banner ───────────────────────────────────────────────── */
.fhr-cta-banner {
  padding: var(--space-4xl) var(--space-xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative; overflow: hidden; text-align: center;
}
.fhr-cta-banner::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E"); opacity: 0.06; pointer-events: none; }
.fhr-cta-banner .container { position: relative; z-index: 1; }
.fhr-cta-banner h2 { color: var(--color-white); margin-bottom: var(--space-md); text-wrap: balance; }
.fhr-cta-banner p { color: rgba(255,255,255,0.8); font-size: 1.05rem; max-width: 55ch; margin: 0 auto var(--space-2xl); }
.fhr-cta-phone { display: block; font-family: var(--font-heading); font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 700; color: var(--color-accent); margin-bottom: var(--space-xl); letter-spacing: 0.02em; }
.fhr-cta-phone:hover { color: var(--color-white); }
.fhr-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.fhr-faq-section { padding: var(--section-pad); background: var(--color-bg-alt); }
@media (max-width: 767px) { .fhr-faq-section { padding: var(--section-pad-mobile); } }
.fhr-faq-list { max-width: 800px; margin: var(--space-2xl) auto 0; display: flex; flex-direction: column; gap: var(--space-md); }
.fhr-faq-item { border: 1px solid var(--color-gray-light); border-radius: var(--radius-md); overflow: hidden; transition: box-shadow var(--transition-base); }
.fhr-faq-item:hover { box-shadow: var(--shadow-md); }
.faq-question { width: 100%; background: var(--color-bg); border: none; text-align: left; padding: var(--space-lg) var(--space-xl); font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--color-primary); cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: var(--space-md); transition: background var(--transition-fast), color var(--transition-fast); }
.faq-question:hover { background: var(--color-bg-alt); color: var(--color-accent); }
.faq-question[aria-expanded="true"] { background: var(--color-primary); color: var(--color-white); }
.faq-icon { flex-shrink: 0; width: 20px; height: 20px; border-radius: 50%; border: 2px solid currentColor; display: flex; align-items: center; justify-content: center; transition: transform var(--transition-base); font-size: 1rem; line-height: 1; }
.faq-question[aria-expanded="true"] .faq-icon { transform: rotate(45deg); }
.faq-answer { display: none; padding: 0 var(--space-xl) var(--space-lg); background: var(--color-bg); color: var(--color-text); font-size: 0.97rem; line-height: 1.7; border-top: 1px solid var(--color-gray-light); }
.faq-answer.is-open { display: block; }

/* ── Closing CTA ──────────────────────────────────────────────── */
.fhr-closing-cta { padding: var(--section-pad); background: var(--color-bg); text-align: center; }
@media (max-width: 767px) { .fhr-closing-cta { padding: var(--section-pad-mobile); } }
.fhr-closing-cta h2 { color: var(--color-primary); margin-bottom: var(--space-md); text-wrap: balance; }
.fhr-closing-cta p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto var(--space-2xl); }

/* ── Stat bar ─────────────────────────────────────────────────── */
.fhr-stat-bar { background: var(--color-primary); padding: var(--space-lg) 0; }
.fhr-stat-bar-inner { display: flex; align-items: center; justify-content: center; gap: var(--space-3xl); flex-wrap: wrap; }
.fhr-stat { display: flex; flex-direction: column; align-items: center; gap: var(--space-xs); text-align: center; }
.fhr-stat .sv { font-family: var(--font-heading); font-size: 2rem; font-weight: 800; color: var(--color-accent); line-height: 1; }
.fhr-stat .sl { font-family: var(--font-heading); font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: rgba(255,255,255,0.7); }
.fhr-stat-sep { width: 1px; height: 40px; background: rgba(255,255,255,0.15); }
@media (max-width: 599px) { .fhr-stat-sep { display: none; } .fhr-stat-bar-inner { gap: var(--space-xl); } }
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="fhr-hero" aria-label="Full home remodel hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">Full Home Remodel in Bowdon, GA</h1>
      <p class="hero-subhead" data-animate="fade-up">
        Every room. One team. One contract. Gray Tile handles whole-house renovations from framing
        and tile through kitchen and flooring — $80,000–$250,000 depending on scope.
        Carroll County permits managed start to finish.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get a Whole-House Estimate</a>
        <a href="#fhr-scope" class="btn btn-outline-white btn-lg">What's Included</a>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="fhr-breadcrumb-bar" aria-label="Breadcrumb navigation">
    <div class="container">
      <nav class="fhr-breadcrumb-nav" aria-label="You are here">
        <a href="/">Home</a>
        <span class="fhr-breadcrumb-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="fhr-breadcrumb-sep" aria-hidden="true">›</span>
        <span class="fhr-breadcrumb-current" aria-current="page">Full Home Remodel</span>
      </nav>
    </div>
  </div>

  <!-- ══ INTRO SPLIT ══════════════════════════════════════════ -->
  <section class="fhr-intro-section" aria-labelledby="fhr-intro-heading">
    <div class="container">
      <div class="fhr-intro-inner">

        <div class="fhr-intro-copy" data-animate="fade-up">
          <span class="fhr-eyebrow">Full Home Remodel Bowdon, GA</span>
          <h2 id="fhr-intro-heading">One Team Handles Every Room — No Contractor Juggling</h2>
          <p class="lead-para">
            A full home remodel means every surface in your house is updated under one contract.
            Gray Tile manages kitchen, bathrooms, flooring, framing, tile, HVAC, electrical,
            and all finish work. Typical cost: $80,000–$250,000. Typical timeline: 12–24 weeks.
          </p>
          <p>
            The biggest problem homeowners face on whole-house renovations isn't the renovation itself —
            it's coordination. When you have a separate kitchen contractor, a separate tile crew, a separate
            electrician, and a separate flooring company, you spend more time managing contractors than living
            your life. Work stalls when one trade waits on another. Disputes arise over who is responsible for
            problems that cross scopes.
          </p>
          <p>
            Gray Tile runs whole-house renovations as a single managed project. Our crews cover tile,
            flooring, and framing. We coordinate the licensed subs we've worked with in Carroll County
            for over 25 years for plumbing, electrical, and HVAC. Everything moves on one schedule.
            One call solves any problem.
          </p>
          <p>
            Carroll County requires building permits for structural and mechanical work within a renovation.
            We determine what your specific project requires and handle every application. Work is inspected
            at the required stages before it's covered. Your renovation is fully permitted and compliant —
            something that matters when you sell or file an insurance claim.
          </p>
          <p class="fhr-last-updated">Last updated: April 2026</p>
        </div>

        <div class="fhr-photo-comp" data-animate="fade-up">
          <div class="fhr-photo-accent"></div>
          <div class="fhr-photo-frame">
            <img
              src="<?php echo $clientPhotos['photo09']; ?>"
              alt="Whole house renovation in progress Bowdon Georgia showing completed kitchen and tile work"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="fhr-stat-badge">
            <span class="stat-num">One Team, Every Room</span>
            <span class="stat-lbl">Full Scope Managed</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Stat Bar ───────────────────────────────────────────── -->
  <div class="fhr-stat-bar">
    <div class="container">
      <div class="fhr-stat-bar-inner">
        <div class="fhr-stat">
          <span class="sv">25</span>
          <span class="sl">Years in Carroll County</span>
        </div>
        <div class="fhr-stat-sep" aria-hidden="true"></div>
        <div class="fhr-stat">
          <span class="sv">12–24</span>
          <span class="sl">Week Typical Timeline</span>
        </div>
        <div class="fhr-stat-sep" aria-hidden="true"></div>
        <div class="fhr-stat">
          <span class="sv">1</span>
          <span class="sl">Contract, All Trades</span>
        </div>
        <div class="fhr-stat-sep" aria-hidden="true"></div>
        <div class="fhr-stat">
          <span class="sv">100%</span>
          <span class="sl">Permitted &amp; Inspected</span>
        </div>
      </div>
    </div>
  </div>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="fhr-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,22 C400,55 800,5 1200,28 L1200,55 L0,55 Z" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ SCOPE CHECKLIST (SIGNATURE EDITORIAL) ════════════════ -->
  <section class="fhr-scope-section" id="fhr-scope" aria-labelledby="fhr-scope-heading">
    <div class="container">
      <div class="fhr-scope-inner">
        <div class="fhr-scope-copy" data-animate="fade-up">
          <span class="fhr-eyebrow">What Full Home Really Means</span>
          <h2 id="fhr-scope-heading">What "Full Home Remodel" Covers — and What It Doesn't</h2>
          <p>Full home remodel is a term contractors use loosely. Here's what Gray Tile means by it: every interior surface is touched, every mechanical system is evaluated, and nothing is left half-done.</p>
          <blockquote class="pullquote">
            "The scope of a full remodel isn't a package — it's determined by what your specific house needs. We walk every room before we write a single line of estimate."
          </blockquote>
          <p>Some items in a whole-house renovation are optional (open-concept floor plan changes, structural wall removal) and some are effectively mandatory for a complete result (paint, trim, lighting). We scope to your goals and your house — not to a standard template.</p>
        </div>

        <div class="fhr-checklist" data-animate="fade-up">
          <div class="fhr-checklist-category">
            <h4>Interior Finishes (typically included)</h4>
            <div class="fhr-check-item">
              <div class="fhr-check-icon"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
              <span>Kitchen cabinets, countertops, backsplash tile, appliances</span>
            </div>
            <div class="fhr-check-item">
              <div class="fhr-check-icon"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
              <span>All bathroom tile, vanities, fixtures, and plumbing</span>
            </div>
            <div class="fhr-check-item">
              <div class="fhr-check-icon"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
              <span>Flooring throughout — tile, hardwood, LVP, or mixed</span>
            </div>
            <div class="fhr-check-item">
              <div class="fhr-check-icon"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
              <span>Interior paint, baseboards, door casings, and trim</span>
            </div>
            <div class="fhr-check-item">
              <div class="fhr-check-icon"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
              <span>Interior doors and hardware</span>
            </div>
            <div class="fhr-check-item">
              <div class="fhr-check-icon"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
              <span>Lighting fixtures throughout</span>
            </div>
          </div>
          <div class="fhr-checklist-category">
            <h4>Mechanical &amp; Structural (as needed)</h4>
            <div class="fhr-check-item">
              <div class="fhr-check-icon"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
              <span>Electrical panel update and wiring as needed</span>
            </div>
            <div class="fhr-check-item">
              <div class="fhr-check-icon"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
              <span>HVAC duct cleaning, zoning, or system replacement</span>
            </div>
            <div class="fhr-check-item">
              <div class="fhr-check-icon"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
              <span>Framing repairs, subfloor replacement, drywall throughout</span>
            </div>
            <div class="fhr-check-item">
              <div class="fhr-check-icon"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
              <span>Open-concept layout changes with engineering (optional)</span>
            </div>
            <div class="fhr-check-item">
              <div class="fhr-check-icon"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
              <span>All Carroll County permits and inspections</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="fhr-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg-alt)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ PROCESS STEPS ══════════════════════════════════════════ -->
  <section class="fhr-process-section" aria-labelledby="fhr-process-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="fhr-eyebrow">Our Process</span>
        <h2 id="fhr-process-heading" style="text-wrap:balance;">How We Run a Whole-House<br><span class="fhr-text-accent">Renovation in Bowdon</span></h2>
      </div>
      <div class="fhr-process-steps">
        <div class="fhr-process-step" data-animate="fade-up">
          <span class="fhr-step-num">01</span>
          <h4>Full Home Walkthrough &amp; Scope Build</h4>
          <p>We walk every room, assess every system, and document what the renovation requires. We're looking at subfloor condition, framing issues, electrical and plumbing state — not just what needs to look better. Scope is built from the ground up, not from a template.</p>
        </div>
        <div class="fhr-process-step" data-animate="fade-up">
          <span class="fhr-step-num">02</span>
          <h4>Fixed-Price Estimate &amp; Schedule</h4>
          <p>You receive a detailed line-item estimate and a phased project schedule. For occupied homes, the schedule sequences trades so you always have functional kitchen and bath access. Fixed price means no surprises unless you change scope mid-project.</p>
        </div>
        <div class="fhr-process-step" data-animate="fade-up">
          <span class="fhr-step-num">03</span>
          <h4>Permits, Demo &amp; Rough-Ins</h4>
          <p>We pull Carroll County permits, complete demolition in the scheduled sequence, and manage framing, plumbing, electrical, and HVAC rough-ins. All rough-in work is inspected before walls are closed. This is the phase most contractors rush — we don't.</p>
        </div>
        <div class="fhr-process-step" data-animate="fade-up">
          <span class="fhr-step-num">04</span>
          <h4>Finish Work &amp; Final Walkthrough</h4>
          <p>Tile, flooring, cabinets, paint, trim, fixtures, and hardware are installed room by room on the project schedule. We do a final walkthrough with you to review every item before close-out. Any punch items are addressed before we consider the job done.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="fhr-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,28 C400,55 800,5 1200,28 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ═══════════════════════════════════════════ -->
  <section class="fhr-cta-banner" aria-label="Full home remodel CTA">
    <div class="container">
      <h2 data-animate="fade-up">Ready to Renovate Every Room at Once — and Be Done?</h2>
      <p class="prose-centered" data-animate="fade-up">
        Free whole-house estimates in Bowdon and Carroll County. We scope to what your house
        actually needs, price it clearly, and execute it under one managed contract.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="fhr-cta-phone" data-animate="fade-up"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
      <?php endif; ?>
      <div class="fhr-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Schedule Your Walkthrough</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="fhr-faq-section" aria-labelledby="fhr-faq-heading">
    <div class="container">
      <div style="text-align:center;" data-animate="fade-up">
        <span class="fhr-eyebrow">Common Questions</span>
        <h2 id="fhr-faq-heading" style="text-wrap:balance;">Full Home Remodel FAQ — <span class="fhr-text-accent">Carroll County, GA</span></h2>
      </div>
      <div class="fhr-faq-list" role="list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="fhr-faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="fhr-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="fhr-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="fhr-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg-alt)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ═══════════════════════════════════════ -->
  <section class="section" style="padding:var(--section-pad);background:var(--color-bg-alt);" aria-label="Other services you may need">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-3xl);" data-animate="fade-up">
        <span class="fhr-eyebrow">Also From Gray Tile</span>
        <h2 style="text-wrap:balance;">Other Services <span class="fhr-text-accent">You May Need</span></h2>
      </div>
      <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo16']; ?>" alt="Design-build remodeling Bowdon GA one contract all trades" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="pencil-ruler"></i></div>
            <h3>Design-Build Remodeling</h3>
            <p class="service-card__desc">Design and construction under one contract — faster, simpler, no scope gaps between designers and builders.</p>
            <ul><li>Design through permit</li><li>Fixed-price execution</li><li>One point of accountability</li></ul>
            <a href="/services/design-build-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo01']; ?>" alt="Kitchen remodeling Bowdon Georgia custom cabinets and tile" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="utensils"></i></div>
            <h3>Kitchen Remodeling</h3>
            <p class="service-card__desc">Complete kitchen renovations — cabinets, counters, backsplash tile, and full layout changes.</p>
            <ul><li>Custom tile backsplash</li><li>Cabinet &amp; counter install</li><li>Full layout redesign</li></ul>
            <a href="/services/kitchen-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo02']; ?>" alt="Bathroom remodeling Bowdon GA custom tile shower renovation" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="droplets"></i></div>
            <h3>Bathroom Remodeling</h3>
            <p class="service-card__desc">Bathroom renovations with custom tile work — showers, floors, vanities, and full plumbing.</p>
            <ul><li>Custom tile showers</li><li>Vanity &amp; fixture install</li><li>Plumbing rough-in included</li></ul>
            <a href="/services/bathroom-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="fhr-closing-cta" aria-label="Closing call to action">
    <div class="container" data-animate="fade-up">
      <span class="fhr-eyebrow">One Decision, Every Room</span>
      <h2>Stop Managing Multiple Contractors and Start Your Renovation</h2>
      <p class="prose-centered">
        Free whole-house estimates for Bowdon, Carrollton, Villa Rica, Bremen, and surrounding Carroll County
        communities. One team, one contract, one timeline.
      </p>
      <div class="fhr-btn-group">
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
