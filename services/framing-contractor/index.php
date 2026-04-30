<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Framing Contractor Bowdon GA | Residential Framing Services';
$pageDescription = 'Expert residential framing for additions, remodels, and new construction in Bowdon, GA. Gray Tile & Remodeling provides professional framing throughout Carroll County and West Georgia.';
$canonicalUrl    = $siteUrl . '/services/framing-contractor/';
$ogImage         = $clientPhotos['photo07'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'framing-contractor') { $currentService = $svc; break; }
}

$pageFaqs = [
    ['q' => 'Do you handle load-bearing wall removal in Bowdon?',
     'a' => 'Yes, but load-bearing wall removal requires engineering verification before any framing work begins. We work with licensed structural engineers to confirm which walls are load-bearing, determine the required beam size and post configuration for the new opening, and pull the required Carroll County permit. Load-bearing work that\'s done without engineering verification is illegal and dangerous — we do not skip this step.'],
    ['q' => 'What types of framing projects do you take on?',
     'a' => 'We handle interior partition framing for room additions and layout changes, load-bearing wall modification with engineering documentation, garage door opening framing for conversions, new construction residential framing, attic framing for conversion projects, and structural repairs to existing framing damaged by water or settling. We work on projects of all sizes throughout Bowdon and Carroll County.'],
    ['q' => 'Do I need a permit for framing work in Carroll County?',
     'a' => 'Any framing work that involves structural changes, additions, or conversion of space to habitable use requires a Carroll County building permit. Interior partition framing (adding non-structural walls) in some cases does not require a permit, but we assess each project and pull permits for all work that requires them. Unpermitted structural work can create title problems when you sell — we don\'t take that risk.'],
    ['q' => 'Why does quality framing matter for tile installation?',
     'a' => 'Tile is rigid and unforgiving. When framing flexes — due to undersized joists, inadequate blocking, or poorly connected members — tile cracks at the grout lines and eventually delaminates. The industry standard for floor framing supporting tile is deflection of L/360 or better. Most framing crews build to L/240, which is adequate for flooring but not tile. Gray Tile frames floor systems to tile standards so installations last. This is one reason we do our own framing rather than relying on other contractors.'],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

// SEO: head.php outputs <link rel="canonical"> and application/ld+json schema for this page.
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   FRAMING-CONTRACTOR/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.fr-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo07']; ?>');
  background-size: cover;
  background-position: center 40%;
  background-repeat: no-repeat;
}
.fr-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(145deg, rgba(var(--color-primary-dark-rgb), 0.95) 0%, rgba(var(--color-primary-rgb), 0.72) 55%, rgba(var(--color-accent-rgb), 0.1) 100%);
  z-index: 1;
}
.fr-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 2; pointer-events: none;
}
.fr-hero .hero-content { position: relative; z-index: 3; padding: var(--space-4xl) 0 var(--space-3xl); max-width: 700px; }
.fr-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.88) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  margin-bottom: var(--space-lg); text-wrap: balance;
}
.fr-hero .hero-subhead { color: rgba(255,255,255,0.88); font-size: clamp(1rem, 2vw, 1.2rem); max-width: 58ch; margin-bottom: var(--space-2xl); line-height: 1.65; }
.fr-hero .hero-cta-group { display: flex; gap: var(--space-md); flex-wrap: wrap; }

/* ── Breadcrumb ───────────────────────────────────────────────── */
.breadcrumb-bar { background: var(--color-bg-alt); padding: var(--space-md) 0; border-bottom: 1px solid var(--color-gray-light); }
.breadcrumb-nav { display: flex; align-items: center; gap: var(--space-sm); font-size: 0.875rem; color: var(--color-text-light); flex-wrap: wrap; }
.breadcrumb-nav a { color: var(--color-accent); font-weight: 500; }
.breadcrumb-nav a:hover { color: var(--color-primary); }
.breadcrumb-sep { color: var(--color-gray); font-size: 0.75rem; }
.breadcrumb-current { color: var(--color-text); font-weight: 600; }

/* ── Shared ───────────────────────────────────────────────────── */
.eyebrow-label {
  display: inline-block; font-family: var(--font-heading); font-size: 0.78rem; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.12em; color: var(--color-accent);
  background: rgba(var(--color-accent-rgb), 0.1); padding: var(--space-xs) var(--space-md);
  border-radius: var(--radius-full); margin-bottom: var(--space-md);
}
.text-accent { color: var(--color-accent); }
.fr-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.fr-divider svg { display: block; width: 100%; height: 55px; }

/* ── Intro split ──────────────────────────────────────────────── */
.fr-intro-section { padding: var(--space-3xl) 0 var(--space-2xl); background: var(--color-bg); }
.fr-intro-inner { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3xl); align-items: start; }
@media (max-width: 899px) { .fr-intro-inner { grid-template-columns: 1fr; } }
.fr-intro-copy h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.fr-intro-copy p { color: var(--color-text); font-size: 1rem; line-height: 1.7; max-width: 62ch; }
.fr-intro-copy p.lead-para { font-size: 1.08rem; font-weight: 500; color: var(--color-primary); border-left: 3px solid var(--color-accent); padding-left: var(--space-md); margin-bottom: var(--space-lg); }
.last-updated { font-size: 0.8rem; color: var(--color-gray); margin-top: var(--space-md); }

/* ── Photo composition ────────────────────────────────────────── */
.photo-composition { position: relative; }
.photo-frame { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); border: 4px solid var(--color-white); aspect-ratio: 4/3; }
.photo-frame img { width: 100%; height: 100%; object-fit: cover; display: block; }
.photo-stat-badge { position: absolute; bottom: -20px; right: -16px; background: var(--color-accent); color: var(--color-white); border-radius: var(--radius-md); padding: var(--space-md) var(--space-lg); box-shadow: var(--shadow-lg); text-align: center; min-width: 130px; z-index: 2; }
.photo-stat-badge .stat-number { display: block; font-family: var(--font-heading); font-size: 2rem; font-weight: 800; line-height: 1; margin-bottom: var(--space-xs); }
.photo-stat-badge .stat-label { display: block; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; opacity: 0.9; }
.photo-accent-strip { position: absolute; top: -8px; left: 20px; width: 60px; height: 4px; background: var(--color-accent); border-radius: var(--radius-full); }

/* ── Why framing matters (signature editorial section) ────────── */
.framing-matters-section {
  padding: var(--section-pad); background: var(--color-primary);
  position: relative; overflow: hidden;
}
@media (max-width: 767px) { .framing-matters-section { padding: var(--section-pad-mobile); } }
.framing-matters-section::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E"); opacity: 0.06; pointer-events: none; }
.framing-matters-inner {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: var(--space-4xl); align-items: center; position: relative; z-index: 1;
}
@media (max-width: 899px) { .framing-matters-inner { grid-template-columns: 1fr; } }
.framing-matters-copy h2 { color: var(--color-white); font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.framing-matters-copy p { color: rgba(255,255,255,0.8); font-size: 1rem; line-height: 1.7; max-width: 55ch; margin-bottom: var(--space-md); }
.framing-matters-copy .pullquote {
  font-family: var(--font-heading); font-size: clamp(1.4rem, 2.5vw, 1.9rem); font-weight: 700;
  color: var(--color-accent); border-left: 4px solid var(--color-accent);
  padding-left: var(--space-lg); margin: var(--space-2xl) 0; line-height: 1.3; text-wrap: balance;
}
.deflection-visual {
  background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12);
  border-radius: var(--radius-lg); padding: var(--space-2xl); display: flex; flex-direction: column; gap: var(--space-xl);
}
.deflection-item { display: flex; flex-direction: column; gap: var(--space-sm); }
.deflection-item .label { font-family: var(--font-heading); font-size: 0.9rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: rgba(255,255,255,0.7); }
.deflection-item .value { font-family: var(--font-heading); font-size: 1.5rem; font-weight: 800; }
.deflection-item .value.good { color: var(--color-accent); }
.deflection-item .value.bad { color: rgba(255,255,255,0.4); }
.deflection-item .note { font-size: 0.85rem; color: rgba(255,255,255,0.6); }
.deflection-divider { border: none; border-top: 1px solid rgba(255,255,255,0.1); }

/* ── Why Choose Section ───────────────────────────────────────── */
.why-section { padding: var(--section-pad); background: var(--color-bg-alt); }
@media (max-width: 767px) { .why-section { padding: var(--section-pad-mobile); } }
.why-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--space-lg); margin-top: var(--space-2xl); }
@media (max-width: 767px) { .why-grid { grid-template-columns: 1fr; } }
.why-card { background: var(--color-bg); border-radius: var(--radius-md); padding: var(--space-xl); display: flex; gap: var(--space-lg); align-items: flex-start; box-shadow: var(--shadow-card); transition: transform var(--transition-base), box-shadow var(--transition-base); }
.why-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.why-card-icon { flex-shrink: 0; width: 48px; height: 48px; background: rgba(var(--color-accent-rgb), 0.1); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; color: var(--color-accent); }
.why-card h4 { font-family: var(--font-heading); font-size: 1.1rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-sm); text-wrap: balance; }
.why-card p { color: var(--color-text-light); font-size: 0.93rem; line-height: 1.6; margin: 0; }

/* ── Process Steps ────────────────────────────────────────────── */
.process-section { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .process-section { padding: var(--section-pad-mobile); } }
.process-steps { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl); margin-top: var(--space-2xl); }
@media (max-width: 1023px) { .process-steps { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .process-steps { grid-template-columns: 1fr; } }
.process-step { background: var(--color-bg-alt); border-radius: var(--radius-lg); padding: var(--space-xl) var(--space-lg); border-top: 3px solid var(--color-accent); transition: transform var(--transition-base), box-shadow var(--transition-base); }
.process-step:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.process-number { font-family: var(--font-heading); font-size: 3rem; font-weight: 900; color: rgba(var(--color-accent-rgb), 0.18); line-height: 1; margin-bottom: var(--space-sm); display: block; }
.process-step h4 { color: var(--color-primary); font-size: 1.05rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.process-step p { color: var(--color-text-light); font-size: 0.9rem; line-height: 1.6; margin: 0; }

/* ── CTA Banner ───────────────────────────────────────────────── */
.cta-banner-section { padding: var(--space-4xl) var(--space-xl); background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); position: relative; overflow: hidden; text-align: center; }
.cta-banner-section::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E"); opacity: 0.06; pointer-events: none; }
.cta-banner-section .container { position: relative; z-index: 1; }
.cta-banner-section h2 { color: var(--color-white); margin-bottom: var(--space-md); text-wrap: balance; }
.cta-banner-section p { color: rgba(255,255,255,0.8); font-size: 1.05rem; max-width: 55ch; margin: 0 auto var(--space-2xl); }
.cta-banner-phone { display: block; font-family: var(--font-heading); font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 700; color: var(--color-accent); margin-bottom: var(--space-xl); letter-spacing: 0.02em; }
.cta-banner-phone:hover { color: var(--color-white); }
.cta-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.faq-section { padding: var(--section-pad); background: var(--color-bg-alt); }
@media (max-width: 767px) { .faq-section { padding: var(--section-pad-mobile); } }
.faq-list { max-width: 800px; margin: var(--space-2xl) auto 0; display: flex; flex-direction: column; gap: var(--space-md); }
.faq-item { border: 1px solid var(--color-gray-light); border-radius: var(--radius-md); overflow: hidden; transition: box-shadow var(--transition-base); }
.faq-item:hover { box-shadow: var(--shadow-md); }
.faq-question { width: 100%; background: var(--color-bg); border: none; text-align: left; padding: var(--space-lg) var(--space-xl); font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--color-primary); cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: var(--space-md); transition: background var(--transition-fast), color var(--transition-fast); }
.faq-question:hover { background: var(--color-bg-alt); color: var(--color-accent); }
.faq-question[aria-expanded="true"] { background: var(--color-primary); color: var(--color-white); }
.faq-icon { flex-shrink: 0; width: 20px; height: 20px; border-radius: 50%; border: 2px solid currentColor; display: flex; align-items: center; justify-content: center; transition: transform var(--transition-base); font-size: 1rem; line-height: 1; }
.faq-question[aria-expanded="true"] .faq-icon { transform: rotate(45deg); }
.faq-answer { display: none; padding: 0 var(--space-xl) var(--space-lg); background: var(--color-bg); color: var(--color-text); font-size: 0.97rem; line-height: 1.7; border-top: 1px solid var(--color-gray-light); }
.faq-answer.is-open { display: block; }

/* ── Closing CTA ──────────────────────────────────────────────── */
.closing-cta-section { padding: var(--section-pad); background: var(--color-bg); text-align: center; }
@media (max-width: 767px) { .closing-cta-section { padding: var(--section-pad-mobile); } }
.closing-cta-section h2 { color: var(--color-primary); margin-bottom: var(--space-md); text-wrap: balance; }
.closing-cta-section p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto var(--space-2xl); }

/* ── Framing credential strip ────────────────────────────────── */
.framing-credentials-strip {
  background: var(--color-bg-alt);
  border-top: 3px solid var(--color-accent);
  border-bottom: 1px solid var(--color-gray-light);
  padding: var(--space-lg) 0;
}
.framing-credentials-inner {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: var(--space-3xl);
  flex-wrap: wrap;
}
.framing-cred-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: var(--space-xs);
  text-align: center;
}
.framing-cred-item .cred-value {
  font-family: var(--font-heading);
  font-size: 1.8rem;
  font-weight: 800;
  color: var(--color-primary);
  line-height: 1;
}
.framing-cred-item .cred-label {
  font-family: var(--font-heading);
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--color-text-light);
}
.framing-cred-sep {
  width: 1px;
  height: 40px;
  background: var(--color-gray-light);
}
@media (max-width: 599px) {
  .framing-cred-sep { display: none; }
  .framing-credentials-inner { gap: var(--space-xl); }
}

/* ── Deflection visual enhancement ───────────────────────────── */
.deflection-visual .deflection-item .value {
  letter-spacing: -0.02em;
}
.deflection-visual .deflection-item .label {
  border-bottom: 1px solid rgba(255,255,255,0.08);
  padding-bottom: var(--space-xs);
}

/* ── Mobile responsive refinements ───────────────────────────── */
@media (max-width: 767px) {
  .fr-hero { min-height: 70vh; }
  .fr-hero .hero-content { padding: var(--space-3xl) 0 var(--space-2xl); }
  .framing-matters-inner { gap: var(--space-2xl); }
  .deflection-visual { padding: var(--space-lg); }
  .photo-stat-badge { right: 0; bottom: -16px; min-width: 110px; }
  .photo-stat-badge .stat-number { font-size: 1.4rem; }
}
@media (max-width: 899px) {
  .framing-matters-inner { grid-template-columns: 1fr; }
  .framing-matters-copy .pullquote { font-size: 1.2rem; }
}

/* ── Process step accent line ─────────────────────────────────── */
.process-section .process-step::before {
  content: '';
  display: block;
  width: 32px;
  height: 3px;
  background: var(--color-accent);
  border-radius: var(--radius-full);
  margin-bottom: var(--space-sm);
}

/* ── Focus visible on key elements ───────────────────────────── */
.why-card:focus-within {
  outline: 2px solid var(--color-accent);
  outline-offset: 2px;
}
.included-card:focus-within {
  outline: 2px solid var(--color-accent);
  outline-offset: 2px;
}
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="fr-hero" aria-label="Framing Contractor hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">Framing Contractor in Bowdon, GA</h1>
      <p class="hero-subhead" data-animate="fade-up">
        Every addition, garage conversion, and remodel starts with framing. Gray Tile frames
        to tile installation standards — L/360 floor deflection — because we're also the crew
        installing the tile. Bad framing means cracked tile. We don't build things that fail.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get a Framing Estimate</a>
        <a href="#framing-detail" class="btn btn-outline-white btn-lg">Why Framing Matters</a>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="breadcrumb-bar" aria-label="Breadcrumb navigation">
    <div class="container">
      <nav class="breadcrumb-nav" aria-label="You are here">
        <a href="/">Home</a>
        <span class="breadcrumb-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="breadcrumb-sep" aria-hidden="true">›</span>
        <span class="breadcrumb-current" aria-current="page">Framing Contractor</span>
      </nav>
    </div>
  </div>

  <!-- ══ ANSWER-FIRST OPENING ══════════════════════════════════ -->
  <section class="fr-intro-section" aria-labelledby="fr-intro-heading">
    <div class="container">
      <div class="fr-intro-inner">

        <div class="fr-intro-copy" data-animate="fade-up">
          <span class="eyebrow-label">Framing Contractor Bowdon, GA</span>
          <h2 id="fr-intro-heading">Residential Framing Built to Carry Tile — Not Just Code</h2>
          <p class="lead-para prose">
            Gray Tile does its own framing because we've seen what happens when tile gets installed on frames built by someone else: cracked grout lines at 18 months, delaminated tile at 3 years, and homeowners wondering what went wrong. The answer is almost always deflection — the framing moved, and the tile couldn't.
          </p>
          <p class="prose">
            Residential framing in Carroll County must meet Georgia Residential Code minimums — typically L/240 deflection for most floor framing. That's adequate for carpet and hardwood. For tile, the standard is L/360 — significantly stiffer. When other contractors frame a bathroom or kitchen floor to L/240 and then hand it off to a tile crew, you have a warranty problem waiting to happen. Gray Tile frames and tiles as a single operation, holding the same standard throughout.
          </p>
          <p class="prose">
            Beyond tile compatibility, we handle the full scope of residential framing work in Bowdon and Carroll County: new room additions where we frame the entire structural shell, interior partition work when clients want to reconfigure a floor plan, garage door opening framing for garage-to-living-space conversions, and load-bearing wall removal with proper engineering documentation and permits.
          </p>
          <p class="prose">
            Carroll County requires building permits and inspections for all structural framing work. We pull permits, schedule inspections, and frame to the standards that pass them — not to the minimum that might pass. Every project has a framing inspection before walls are closed, and we're there for it.
          </p>
          <p class="last-updated">Last updated: April 2026</p>
        </div>

        <div class="photo-composition" data-animate="fade-up">
          <div class="photo-accent-strip"></div>
          <div class="photo-frame">
            <img
              src="<?php echo $clientPhotos['photo08']; ?>"
              alt="Residential framing work in progress on Bowdon GA home addition showing floor joists and wall framing"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="photo-stat-badge">
            <span class="stat-number">L/360</span>
            <span class="stat-label">Tile-Grade Deflection</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="fr-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ WHY FRAMING MATTERS (SIGNATURE SECTION) ══════════════ -->
  <section class="framing-matters-section" id="framing-detail" aria-labelledby="framing-matters-heading">
    <div class="container">
      <div class="framing-matters-inner">
        <div class="framing-matters-copy" data-animate="fade-up">
          <span class="eyebrow-label" style="background:rgba(var(--color-accent-rgb),0.2);color:var(--color-accent);">The Standard That Matters</span>
          <h2 id="framing-matters-heading">Why Tile Installations Fail — and How Framing Prevents It</h2>
          <p>Tile is ceramic or stone. It does not flex. The structure beneath it does — every time someone walks across the floor, every time temperature changes cause expansion and contraction, every time a load shifts. When a floor frame moves more than tile can accommodate, the tile breaks at the weakest point: the grout lines and the bond between tile and substrate.</p>
          <blockquote class="pullquote">
            "We frame floors to L/360. Most contractors frame to L/240. That difference is what separates tile installations that last 25 years from ones that crack at 18 months."
          </blockquote>
          <p>L/360 means a 15-foot span deflects no more than half an inch under load. L/240 means the same span can deflect three-quarters of an inch. That quarter inch is invisible when you're walking. It's catastrophic when you're tile.</p>
        </div>

        <div class="deflection-visual" data-animate="fade-up">
          <div class="deflection-item">
            <span class="label">Gray Tile Standard (Tile-Grade)</span>
            <span class="value good">L/360 Deflection</span>
            <span class="note">Required for tile installations. Half-inch maximum deflection on a 15-foot span under full load.</span>
          </div>
          <hr class="deflection-divider">
          <div class="deflection-item">
            <span class="label">Typical Residential Code Minimum</span>
            <span class="value bad">L/240 Deflection</span>
            <span class="note">Adequate for carpet and hardwood. Too much movement for tile — causes grout cracking within 1–3 years.</span>
          </div>
          <hr class="deflection-divider">
          <div class="deflection-item">
            <span class="label">Carroll County Permit Required?</span>
            <span class="value good">Yes — We Handle It</span>
            <span class="note">All structural framing requires Carroll County building permits. We apply, schedule inspections, and frame to pass.</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="fr-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,55 1200,0 1200,55" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ WHY CHOOSE SECTION ════════════════════════════════════ -->
  <section class="why-section" aria-labelledby="why-fr-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="eyebrow-label">Why Gray Tile</span>
        <h2 id="why-fr-heading" style="text-wrap:balance;">Four Reasons to Choose Gray Tile<br><span class="text-accent">for Framing in Carroll County</span></h2>
      </div>
      <div class="why-grid">
        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
          </div>
          <div>
            <h4>Framed to the Tile Standard, Not Just Code</h4>
            <p>We frame floors to L/360 deflection — the industry standard for tile installation. Code permits L/240. That gap is where most tile failures originate. We eliminate it before the tile ever goes down.</p>
          </div>
        </div>
        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
          </div>
          <div>
            <h4>Engineering Documentation on Load-Bearing Work</h4>
            <p>Load-bearing wall removal requires a licensed structural engineer to specify the beam size and post configuration. We work with engineers, not around them. Every load-bearing modification is documented and permitted.</p>
          </div>
        </div>
        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
          </div>
          <div>
            <h4>Rough-In Coordination Included</h4>
            <p>We coordinate framing schedules with plumbing, electrical, and HVAC rough-in trades so your project doesn't stall waiting for the next contractor. For Gray Tile design-build projects, all rough-ins are managed by us.</p>
          </div>
        </div>
        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div>
            <h4>25 Years of Carroll County Framing</h4>
            <p>We know the local soil conditions, the typical foundation types in Bowdon-area homes, and how the local building department processes structural permits. Framing in Carroll County isn't generic — local knowledge matters.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="fr-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,32 C300,55 900,10 1200,32 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ PROCESS STEPS ══════════════════════════════════════════ -->
  <section class="process-section" style="background:var(--color-bg);" aria-labelledby="fr-process-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="eyebrow-label">Our Process</span>
        <h2 id="fr-process-heading" style="text-wrap:balance;">How We Frame Projects<br><span class="text-accent">in Bowdon, GA</span></h2>
      </div>
      <div class="process-steps">
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">01</span>
          <h4>Site Assessment &amp; Engineering Review</h4>
          <p>We assess the existing structure, identify load-bearing elements, and for any structural modifications, engage a licensed structural engineer before proposing scope or pricing.</p>
        </div>
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">02</span>
          <h4>Carroll County Permit Application</h4>
          <p>We prepare and submit the permit application with structural drawings. Structural permits in Carroll County typically process in 1–3 weeks depending on scope and review load.</p>
        </div>
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">03</span>
          <h4>Framing Installation</h4>
          <p>We frame to the agreed plan — floor systems to tile-grade deflection standards, wall framing square and plumb, headers sized for the actual loads. Rough-in trades are coordinated before walls are closed.</p>
        </div>
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">04</span>
          <h4>Framing Inspection &amp; Tile Prep</h4>
          <p>Carroll County framing inspection is scheduled and passed before walls close. Once cleared, we or your tile contractor can begin substrate preparation and tile installation with confidence.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="fr-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,28 C400,55 800,5 1200,28 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ═══════════════════════════════════════════ -->
  <section class="cta-banner-section" aria-label="Framing contractor CTA">
    <div class="container">
      <h2 data-animate="fade-up">Your Addition or Remodel Needs Framing That Won't Let the Tile Down</h2>
      <p class="prose-centered" data-animate="fade-up">
        Get a framing estimate in Bowdon. We assess the scope, handle Carroll County permits,
        and frame to tile-grade standards — because that's what our own installations require.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="cta-banner-phone" data-animate="fade-up"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
      <?php endif; ?>
      <div class="cta-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get Your Framing Estimate</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="faq-section" aria-labelledby="fr-faq-heading">
    <div class="container">
      <div style="text-align:center;" data-animate="fade-up">
        <span class="eyebrow-label">Common Questions</span>
        <h2 id="fr-faq-heading" style="text-wrap:balance;">Framing FAQ — <span class="text-accent">Carroll County, GA</span></h2>
      </div>
      <div class="faq-list" role="list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="fr-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="fr-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="fr-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg-alt)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ═══════════════════════════════════════ -->
  <section class="section" style="padding:var(--section-pad);background:var(--color-bg-alt);" aria-label="Other services you may need">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-3xl);" data-animate="fade-up">
        <span class="eyebrow-label">Also From Gray Tile</span>
        <h2 style="text-wrap:balance;">Other Services <span class="text-accent">You May Need</span></h2>
      </div>
      <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['gallery02']; ?>" alt="Flooring installation tile and LVP Bowdon Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Flooring Services</h3>
            <p class="service-card__desc">Custom tile, LVP, hardwood refinishing, and subfloor repair throughout Carroll County.</p>
            <ul><li>Custom tile showers</li><li>LVP installation</li><li>Subfloor replacement</li></ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo16']; ?>" alt="Garage conversion to living space Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="door-open"></i></div>
            <h3>Garage Conversion</h3>
            <p class="service-card__desc">Convert your garage into livable space — framing, insulation, flooring, electrical.</p>
            <ul><li>Full framing included</li><li>Insulation &amp; HVAC</li><li>Permit-ready documentation</li></ul>
            <a href="/services/garage-conversion/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo12']; ?>" alt="Design-build remodeling Bowdon Georgia one team" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="pencil-ruler"></i></div>
            <h3>Design-Build Remodeling</h3>
            <p class="service-card__desc">One team from framing through tile installation — no handoffs, no delays.</p>
            <ul><li>Framing through tile</li><li>Permit management</li><li>Fixed-scope estimates</li></ul>
            <a href="/services/design-build-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="closing-cta-section" aria-label="Closing call to action">
    <div class="container" data-animate="fade-up">
      <span class="eyebrow-label">Build It Right from the Start</span>
      <h2>Framing That Sets Your Tile Installation Up to Last</h2>
      <p class="prose-centered">
        Free estimates throughout Bowdon and Carroll County. We handle engineering coordination,
        permits, and framing to the standard your tile installation requires.
      </p>
      <div class="cta-btn-group">
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
