<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Eco-Friendly Remodeling Bowdon GA | Green Home Renovation';
$pageDescription = 'Eco-friendly remodeling in Bowdon, GA — sustainable tile, low-VOC materials, insulation upgrades, and water-efficient fixtures that lower utility bills in Georgia\'s hot humid climate.';
$canonicalUrl    = $siteUrl . '/services/eco-friendly-remodeling/';
$ogImage         = $clientPhotos['photo14'];
$heroPreloadImage = $clientPhotos['photo14'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'eco-friendly-remodeling') { $currentService = $svc; break; }
}

$pageFaqs = [
    ['q' => 'What is eco-friendly remodeling?',
     'a' => 'Eco-friendly remodeling means making material and design decisions that reduce environmental impact and operating costs — typically through better insulation, low-VOC finishes, water-efficient plumbing fixtures, sustainable tile sourced from responsible manufacturers, and LED lighting. In Georgia\'s hot-humid climate, the biggest return usually comes from improving thermal envelope and HVAC efficiency, which directly reduces energy bills in a region where cooling costs run high from May through October.'],
    ['q' => 'What materials do you use for eco-friendly remodeling?',
     'a' => 'For tile, we source from manufacturers with environmental certifications — recycled content porcelain, natural stone with responsible quarrying practices, and large-format tile that reduces grout joint frequency and associated cement use. For substrates, we use low-VOC membranes and setting materials. For flooring, we can specify FSC-certified hardwood, recycled-content LVP, or cork. Insulation upgrades use spray foam or dense-pack cellulose rather than standard fiberglass batts where appropriate for West Georgia\'s climate zone.'],
    ['q' => 'Does green remodeling cost more in Georgia?',
     'a' => 'Sometimes upfront, but rarely over the full ownership period. Insulation upgrades and air sealing typically cost 10–20% more than standard work but pay back in lower utility bills within 3–7 years in Georgia\'s climate. Low-VOC materials add negligible cost at current pricing. Water-efficient fixtures are often cost-neutral or slightly less expensive than premium standard fixtures. Sustainable tile options range from cost-neutral to a premium depending on specific material selection.'],
    ['q' => 'What energy efficiency improvements pay back fastest in Georgia?',
     'a' => 'In Carroll County and West Georgia, the fastest-payback improvements are: (1) air sealing and attic insulation upgrades — Georgia\'s hot summers make cooling load reduction highly valuable; (2) water heater replacement to heat pump water heaters, which cut water heating energy by 60–70%; (3) low-flow shower heads and faucet aerators — simple, inexpensive, immediate savings. HVAC upgrades are high value but typically fall outside our scope unless part of a full renovation. We coordinate with HVAC contractors when a renovation includes mechanical work.'],
    ['q' => 'What sustainable tile options are available for Georgia homes?',
     'a' => 'Recycled-content porcelain tiles are the most common sustainable option — manufacturers like Crossville and Florida Tile offer lines with significant recycled content at prices competitive with standard porcelain. Reclaimed tile from salvage sources is available for specific aesthetic goals but requires careful assessment of compatibility with current installation standards. Natural stone (travertine, slate, limestone) is inherently sustainable when sourced responsibly and can last 50+ years in properly installed applications. We can walk through options at your consultation.'],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   ECO-FRIENDLY-REMODELING/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   CSS prefix: .eco-
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.eco-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo14']; ?>');
  background-size: cover;
  background-position: center 38%;
  background-repeat: no-repeat;
}
.eco-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(140deg, rgba(var(--color-primary-rgb), 0.90) 0%, rgba(var(--color-primary-dark-rgb), 0.65) 55%, rgba(var(--color-accent-rgb), 0.18) 100%);
  z-index: 1;
}
.eco-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 2; pointer-events: none;
}
.eco-hero .hero-content { position: relative; z-index: 3; padding: var(--space-4xl) 0 var(--space-3xl); max-width: 700px; }
.eco-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.88) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  margin-bottom: var(--space-lg); text-wrap: balance;
}
.eco-hero .hero-subhead { color: rgba(255,255,255,0.88); font-size: clamp(1rem, 2vw, 1.2rem); max-width: 58ch; margin-bottom: var(--space-2xl); line-height: 1.65; }
.eco-hero .hero-cta-group { display: flex; gap: var(--space-md); flex-wrap: wrap; }
@media (max-width: 767px) {
  .eco-hero { min-height: 70vh; }
  .eco-hero .hero-content { padding: var(--space-3xl) 0 var(--space-2xl); }
}

/* ── Breadcrumb ───────────────────────────────────────────────── */
.eco-breadcrumb-bar { background: var(--color-bg-alt); padding: var(--space-md) 0; border-bottom: 1px solid var(--color-gray-light); }
.eco-breadcrumb-nav { display: flex; align-items: center; gap: var(--space-sm); font-size: 0.875rem; color: var(--color-text-light); flex-wrap: wrap; }
.eco-breadcrumb-nav a { color: var(--color-accent); font-weight: 500; }
.eco-breadcrumb-nav a:hover { color: var(--color-primary); }
.eco-breadcrumb-sep { color: var(--color-gray); font-size: 0.75rem; }
.eco-breadcrumb-current { color: var(--color-text); font-weight: 600; }

/* ── Shared utilities ─────────────────────────────────────────── */
.eco-eyebrow {
  display: inline-block; font-family: var(--font-heading); font-size: 0.78rem; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.12em; color: var(--color-accent);
  background: rgba(var(--color-accent-rgb), 0.1); padding: var(--space-xs) var(--space-md);
  border-radius: var(--radius-full); margin-bottom: var(--space-md);
}
.eco-text-accent { color: var(--color-accent); }
.eco-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.eco-divider svg { display: block; width: 100%; height: 55px; }

/* ── Intro split ──────────────────────────────────────────────── */
.eco-intro-section { padding: var(--space-3xl) 0 var(--space-2xl); background: var(--color-bg); }
.eco-intro-inner { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3xl); align-items: start; }
@media (max-width: 899px) { .eco-intro-inner { grid-template-columns: 1fr; } }
.eco-intro-copy h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.eco-intro-copy .lead-para { font-size: 1.08rem; font-weight: 500; color: var(--color-primary); border-left: 3px solid var(--color-accent); padding-left: var(--space-md); margin-bottom: var(--space-lg); max-width: 62ch; }
.eco-intro-copy p { color: var(--color-text); font-size: 1rem; line-height: 1.7; max-width: 62ch; margin-bottom: var(--space-md); }
.eco-last-updated { font-size: 0.8rem; color: var(--color-gray); margin-top: var(--space-md); }

/* ── Photo composition ────────────────────────────────────────── */
.eco-photo-comp { position: relative; padding-bottom: var(--space-2xl); }
.eco-photo-frame { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); border: 4px solid var(--color-white); aspect-ratio: 4/3; }
.eco-photo-frame img { width: 100%; height: 100%; object-fit: cover; display: block; }
.eco-stat-badge { position: absolute; bottom: 0; right: -10px; background: var(--color-accent); color: var(--color-white); border-radius: var(--radius-md); padding: var(--space-md) var(--space-lg); box-shadow: var(--shadow-lg); text-align: center; min-width: 155px; z-index: 2; }
.eco-stat-badge .stat-num { display: block; font-family: var(--font-heading); font-size: 1.05rem; font-weight: 800; line-height: 1.3; margin-bottom: var(--space-xs); }
.eco-stat-badge .stat-lbl { display: block; font-size: 0.72rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; opacity: 0.9; }
.eco-photo-accent { position: absolute; top: -6px; left: 20px; width: 56px; height: 4px; background: var(--color-accent); border-radius: var(--radius-full); }
@media (max-width: 767px) { .eco-stat-badge { right: 0; } }

/* ── Green options grid (featured card section) ───────────────── */
.eco-options-section { padding: var(--section-pad); background: var(--color-bg-alt); position: relative; }
@media (max-width: 767px) { .eco-options-section { padding: var(--section-pad-mobile); } }
.eco-options-header { text-align: center; margin-bottom: var(--space-3xl); }
.eco-options-header h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); text-wrap: balance; }
.eco-options-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-lg); }
@media (max-width: 1023px) { .eco-options-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .eco-options-grid { grid-template-columns: 1fr; } }
.eco-option-card {
  background: var(--color-bg); border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg); border-top: 3px solid var(--color-accent);
  box-shadow: var(--shadow-card);
  display: flex; flex-direction: column; gap: var(--space-md);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.eco-option-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.eco-option-icon {
  width: 48px; height: 48px; background: rgba(var(--color-accent-rgb), 0.1);
  border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center;
  color: var(--color-accent); flex-shrink: 0;
}
.eco-option-card h3 { font-family: var(--font-heading); font-size: 1.1rem; color: var(--color-primary); margin: 0; text-wrap: balance; }
.eco-option-card p { color: var(--color-text-light); font-size: 0.92rem; line-height: 1.6; margin: 0; flex: 1; }
.eco-option-payback { font-family: var(--font-heading); font-size: 0.8rem; font-weight: 700; color: var(--color-accent); text-transform: uppercase; letter-spacing: 0.06em; }

/* ── Signature editorial: climate-specific section ────────────── */
.eco-climate-section {
  padding: var(--section-pad); background: var(--color-primary);
  position: relative; overflow: hidden;
}
@media (max-width: 767px) { .eco-climate-section { padding: var(--section-pad-mobile); } }
.eco-climate-section::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.07; pointer-events: none;
}
.eco-climate-inner { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4xl); align-items: center; position: relative; z-index: 1; }
@media (max-width: 899px) { .eco-climate-inner { grid-template-columns: 1fr; } }
.eco-climate-copy h2 { color: var(--color-white); font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.eco-climate-copy p { color: rgba(255,255,255,0.8); font-size: 1rem; line-height: 1.7; max-width: 55ch; margin-bottom: var(--space-md); }
.eco-climate-copy .eco-eyebrow { background: rgba(var(--color-accent-rgb), 0.2); color: var(--color-accent); }
.eco-climate-copy .pullquote {
  font-family: var(--font-heading); font-size: clamp(1.3rem, 2.5vw, 1.8rem); font-weight: 700;
  color: var(--color-accent); border-left: 4px solid var(--color-accent);
  padding-left: var(--space-lg); margin: var(--space-2xl) 0; line-height: 1.3; text-wrap: balance;
}
.eco-climate-stats {
  background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12);
  border-radius: var(--radius-lg); padding: var(--space-2xl);
  display: flex; flex-direction: column; gap: var(--space-xl);
}
.eco-climate-stat { display: flex; flex-direction: column; gap: var(--space-sm); }
.eco-climate-stat .cs-label { font-family: var(--font-heading); font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: rgba(255,255,255,0.6); border-bottom: 1px solid rgba(255,255,255,0.08); padding-bottom: var(--space-xs); }
.eco-climate-stat .cs-value { font-family: var(--font-heading); font-size: 1.5rem; font-weight: 800; color: var(--color-accent); }
.eco-climate-stat .cs-note { font-size: 0.85rem; color: rgba(255,255,255,0.6); }
.eco-climate-sep { border: none; border-top: 1px solid rgba(255,255,255,0.1); }

/* ── Process steps ────────────────────────────────────────────── */
.eco-process-section { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .eco-process-section { padding: var(--section-pad-mobile); } }
.eco-process-steps { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl); margin-top: var(--space-2xl); }
@media (max-width: 1023px) { .eco-process-steps { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .eco-process-steps { grid-template-columns: 1fr; } }
.eco-process-step {
  background: var(--color-bg-alt); border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg); border-top: 3px solid var(--color-accent);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.eco-process-step::before { content: ''; display: block; width: 32px; height: 3px; background: var(--color-accent); border-radius: var(--radius-full); margin-bottom: var(--space-sm); }
.eco-process-step:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.eco-step-num { font-family: var(--font-heading); font-size: 3rem; font-weight: 900; color: rgba(var(--color-accent-rgb), 0.18); line-height: 1; margin-bottom: var(--space-sm); display: block; }
.eco-process-step h4 { color: var(--color-primary); font-size: 1.05rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.eco-process-step p { color: var(--color-text-light); font-size: 0.9rem; line-height: 1.6; margin: 0; }

/* ── CTA Banner ───────────────────────────────────────────────── */
.eco-cta-banner {
  padding: var(--space-4xl) var(--space-xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative; overflow: hidden; text-align: center;
}
.eco-cta-banner::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E"); opacity: 0.06; pointer-events: none; }
.eco-cta-banner .container { position: relative; z-index: 1; }
.eco-cta-banner h2 { color: var(--color-white); margin-bottom: var(--space-md); text-wrap: balance; }
.eco-cta-banner p { color: rgba(255,255,255,0.8); font-size: 1.05rem; max-width: 55ch; margin: 0 auto var(--space-2xl); }
.eco-cta-phone { display: block; font-family: var(--font-heading); font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 700; color: var(--color-accent); margin-bottom: var(--space-xl); letter-spacing: 0.02em; }
.eco-cta-phone:hover { color: var(--color-white); }
.eco-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.eco-faq-section { padding: var(--section-pad); background: var(--color-bg-alt); }
@media (max-width: 767px) { .eco-faq-section { padding: var(--section-pad-mobile); } }
.eco-faq-list { max-width: 800px; margin: var(--space-2xl) auto 0; display: flex; flex-direction: column; gap: var(--space-md); }
.eco-faq-item { border: 1px solid var(--color-gray-light); border-radius: var(--radius-md); overflow: hidden; transition: box-shadow var(--transition-base); }
.eco-faq-item:hover { box-shadow: var(--shadow-md); }
.faq-question { width: 100%; background: var(--color-bg); border: none; text-align: left; padding: var(--space-lg) var(--space-xl); font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--color-primary); cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: var(--space-md); transition: background var(--transition-fast), color var(--transition-fast); }
.faq-question:hover { background: var(--color-bg-alt); color: var(--color-accent); }
.faq-question[aria-expanded="true"] { background: var(--color-primary); color: var(--color-white); }
.faq-icon { flex-shrink: 0; width: 20px; height: 20px; border-radius: 50%; border: 2px solid currentColor; display: flex; align-items: center; justify-content: center; transition: transform var(--transition-base); font-size: 1rem; line-height: 1; }
.faq-question[aria-expanded="true"] .faq-icon { transform: rotate(45deg); }
.faq-answer { display: none; padding: 0 var(--space-xl) var(--space-lg); background: var(--color-bg); color: var(--color-text); font-size: 0.97rem; line-height: 1.7; border-top: 1px solid var(--color-gray-light); }
.faq-answer.is-open { display: block; }

/* ── Closing CTA ──────────────────────────────────────────────── */
.eco-closing-cta { padding: var(--section-pad); background: var(--color-bg); text-align: center; }
@media (max-width: 767px) { .eco-closing-cta { padding: var(--section-pad-mobile); } }
.eco-closing-cta h2 { color: var(--color-primary); margin-bottom: var(--space-md); text-wrap: balance; }
.eco-closing-cta p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto var(--space-2xl); }
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="eco-hero" aria-label="Eco-friendly remodeling hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">Eco-Friendly Remodeling in Bowdon, GA</h1>
      <p class="hero-subhead" data-animate="fade-up">
        Lower utility bills, better indoor air quality, and materials that last — without
        premium markups that don't deliver. Gray Tile builds green renovations that make
        financial sense in Georgia's hot-humid climate.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Discuss Your Green Remodel</a>
        <a href="#eco-options" class="btn btn-outline-white btn-lg">Green Options &amp; Savings</a>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="eco-breadcrumb-bar" aria-label="Breadcrumb navigation">
    <div class="container">
      <nav class="eco-breadcrumb-nav" aria-label="You are here">
        <a href="/">Home</a>
        <span class="eco-breadcrumb-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="eco-breadcrumb-sep" aria-hidden="true">›</span>
        <span class="eco-breadcrumb-current" aria-current="page">Eco-Friendly Remodeling</span>
      </nav>
    </div>
  </div>

  <!-- ══ INTRO SPLIT ══════════════════════════════════════════ -->
  <section class="eco-intro-section" aria-labelledby="eco-intro-heading">
    <div class="container">
      <div class="eco-intro-inner">

        <div class="eco-intro-copy" data-animate="fade-up">
          <span class="eco-eyebrow">Eco-Friendly Remodeling Bowdon, GA</span>
          <h2 id="eco-intro-heading">Renovations That Pay Back in Lower Bills and Healthier Air</h2>
          <p class="lead-para">
            Eco-friendly remodeling in West Georgia means making decisions appropriate for
            our hot-humid climate — better insulation and air sealing, low-VOC materials
            that don't off-gas in enclosed spaces, water-efficient fixtures, and tile with
            sustainable sourcing. The best green improvements are the ones that pay back.
          </p>
          <p>
            Georgia homeowners spend significantly more on cooling than most of the country.
            The HVAC system runs from April through October in Carroll County. In that context,
            insulation upgrades and air sealing deliver measurable, annual returns — every year
            you own the home. This is the highest-value green investment most Bowdon homeowners
            can make, and it's frequently part of our renovation scope when we're already opening
            walls or working on the attic level.
          </p>
          <p>
            For tile, Gray Tile sources from manufacturers with environmental certifications.
            Recycled-content porcelain looks identical to standard porcelain but diverts manufacturing
            waste from landfills. Natural stone with responsible quarrying documentation is available
            for homeowners who want premium materials with sustainable provenance. Low-VOC setting
            materials and grouts are standard in our work — not an upsell.
          </p>
          <p>
            We're direct about what "eco-friendly" actually accomplishes versus what's marketing.
            Some premium green products deliver real value. Others cost more without meaningful
            benefit. We'll tell you the difference for your specific project.
          </p>
          <p class="eco-last-updated">Last updated: April 2026</p>
        </div>

        <div class="eco-photo-comp" data-animate="fade-up">
          <div class="eco-photo-accent"></div>
          <div class="eco-photo-frame">
            <img
              src="<?php echo $clientPhotos['photo15']; ?>"
              alt="Eco-friendly remodeling work in Bowdon Georgia showing sustainable tile installation and green materials"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="eco-stat-badge">
            <span class="stat-num">Lower Bills, Better Home</span>
            <span class="stat-lbl">Sustainable Remodeling</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="eco-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,22 C400,55 800,5 1200,28 L1200,55 L0,55 Z" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ GREEN REMODELING OPTIONS ══════════════════════════════ -->
  <section class="eco-options-section" id="eco-options" aria-labelledby="eco-options-heading">
    <div class="container">
      <div class="eco-options-header" data-animate="fade-up">
        <span class="eco-eyebrow">What We Offer</span>
        <h2 id="eco-options-heading">5 Green Remodeling Options<br><span class="eco-text-accent">for Carroll County Homes</span></h2>
      </div>
      <div class="eco-options-grid">
        <div class="eco-option-card" data-animate="fade-up">
          <div class="eco-option-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
          </div>
          <h3>Insulation &amp; Air Sealing Upgrades</h3>
          <p>Dense-pack cellulose or spray foam in wall cavities opened during renovation. Attic air sealing and insulation upgrade to R-49+ for Georgia's Climate Zone 3. Significant cooling load reduction from May through October.</p>
          <span class="eco-option-payback">Typical payback: 3–7 years</span>
        </div>
        <div class="eco-option-card" data-animate="fade-up">
          <div class="eco-option-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
          </div>
          <h3>Low-VOC Materials Throughout</h3>
          <p>Low-VOC paint, primers, adhesives, and setting materials as a standard of our work. Georgia's humidity keeps homes relatively sealed in summer — indoor air quality matters when windows stay closed. No upcharge for this selection.</p>
          <span class="eco-option-payback">Health benefit: immediate</span>
        </div>
        <div class="eco-option-card" data-animate="fade-up">
          <div class="eco-option-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="3" width="16" height="10" rx="2"/><path d="M2 13h20"/><path d="M8 13v8"/><path d="M16 13v8"/><path d="M4 21h16"/></svg>
          </div>
          <h3>Sustainable &amp; Recycled-Content Tile</h3>
          <p>Porcelain with certified recycled content, natural stone with responsible quarrying documentation, and FSC-certified wood tile alternatives. Visual quality matches standard materials — certifications are additional, not compromises.</p>
          <span class="eco-option-payback">Longevity: 30–50+ years</span>
        </div>
        <div class="eco-option-card" data-animate="fade-up">
          <div class="eco-option-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></svg>
          </div>
          <h3>Water-Efficient Fixtures</h3>
          <p>WaterSense-certified shower heads (1.5–1.8 GPM vs. standard 2.5 GPM), low-flow faucet aerators, and dual-flush or high-efficiency toilets. In Georgia, water costs are rising — efficient fixtures pay back over time and require no behavioral change.</p>
          <span class="eco-option-payback">Typical savings: 20–30% water use</span>
        </div>
        <div class="eco-option-card" data-animate="fade-up">
          <div class="eco-option-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
          </div>
          <h3>LED Lighting Throughout</h3>
          <p>Full LED conversion during renovation — recessed cans, vanity lighting, under-cabinet strips. Integrated with any electrical rough-in work. LED uses 75% less energy than incandescent, lasts 15–25 years, and produces significantly less heat, which matters in Georgia summers.</p>
          <span class="eco-option-payback">Typical payback: 1–3 years</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="eco-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg-alt)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ GEORGIA CLIMATE CONTEXT (SIGNATURE SECTION) ══════════ -->
  <section class="eco-climate-section" aria-labelledby="eco-climate-heading">
    <div class="container">
      <div class="eco-climate-inner">
        <div class="eco-climate-copy" data-animate="fade-up">
          <span class="eco-eyebrow">Georgia Climate Context</span>
          <h2 id="eco-climate-heading">Why Green Remodeling Matters More in Carroll County Than Most of the Country</h2>
          <p>Georgia sits in IECC Climate Zone 3 — hot-humid. Summers run 5–6 months. Average cooling degree days in Carroll County exceed 2,000 annually. Homes here have HVAC systems that work hard for a long time every year.</p>
          <blockquote class="pullquote">
            "In Georgia, every R-value you add to your attic saves money every summer for the life of the home. Green remodeling in the South isn't idealism — it's practical math."
          </blockquote>
          <p>West Georgia also has above-average humidity during renovation season. Low-VOC materials matter more in homes that stay closed in summer. Moisture management in tile installations is more critical than in dry climates — the sustainability of a tile installation is directly tied to waterproofing quality.</p>
        </div>
        <div class="eco-climate-stats" data-animate="fade-up">
          <div class="eco-climate-stat">
            <span class="cs-label">Carroll County Cooling Season</span>
            <span class="cs-value">May – October</span>
            <span class="cs-note">6 months of significant HVAC load annually. Insulation upgrades pay back faster here than in moderate climates.</span>
          </div>
          <hr class="eco-climate-sep">
          <div class="eco-climate-stat">
            <span class="cs-label">Insulation Upgrade Payback (Georgia)</span>
            <span class="cs-value">3–7 years</span>
            <span class="cs-note">Attic insulation to R-49 and air sealing typically pay back within 3–7 years in Georgia's climate and energy rate environment.</span>
          </div>
          <hr class="eco-climate-sep">
          <div class="eco-climate-stat">
            <span class="cs-label">Water Savings (WaterSense Fixtures)</span>
            <span class="cs-value">20–30%</span>
            <span class="cs-note">WaterSense shower heads and faucet aerators reduce residential water consumption 20–30% with zero behavioral change required.</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="eco-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,55 1200,0 1200,55" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,55" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ PROCESS STEPS ══════════════════════════════════════════ -->
  <section class="eco-process-section" aria-labelledby="eco-process-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="eco-eyebrow">Our Process</span>
        <h2 id="eco-process-heading" style="text-wrap:balance;">How We Build Eco-Friendly<br><span class="eco-text-accent">Renovations in Bowdon</span></h2>
      </div>
      <div class="eco-process-steps">
        <div class="eco-process-step" data-animate="fade-up">
          <span class="eco-step-num">01</span>
          <h4>Green Goals Assessment</h4>
          <p>We start with your goals: lower bills, healthier air, sustainable materials, or all three. We identify which green investments make the most financial sense for your specific project and house, and which are less justified. We won't oversell green features that don't deliver measurable value.</p>
        </div>
        <div class="eco-process-step" data-animate="fade-up">
          <span class="eco-step-num">02</span>
          <h4>Material Selection &amp; Sourcing</h4>
          <p>We identify sustainable material options for your tile, flooring, and finishes. We source recycled-content and certified products from our supplier network and present options with honest information about cost, performance, and payback.</p>
        </div>
        <div class="eco-process-step" data-animate="fade-up">
          <span class="eco-step-num">03</span>
          <h4>Opportunistic Upgrades During Renovation</h4>
          <p>The most cost-effective time to upgrade insulation and air seal is during a renovation when walls and ceilings are already open. We identify these opportunities as work progresses and discuss them before closing walls — they're significantly cheaper during renovation than as standalone projects.</p>
        </div>
        <div class="eco-process-step" data-animate="fade-up">
          <span class="eco-step-num">04</span>
          <h4>Documentation for Tax Credits</h4>
          <p>Some energy efficiency improvements qualify for federal tax credits under current law. We document installed insulation R-values, window U-factors, and other qualifying improvements so you have what you need for tax filing. We're not tax advisors, but we make sure you have the documentation.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="eco-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,32 C300,55 900,10 1200,32 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ═══════════════════════════════════════════ -->
  <section class="eco-cta-banner" aria-label="Eco-friendly remodeling CTA">
    <div class="container">
      <h2 data-animate="fade-up">Your Renovation Can Pay You Back for Decades</h2>
      <p class="prose-centered" data-animate="fade-up">
        Free estimates for eco-friendly remodeling in Bowdon and Carroll County. We'll identify
        which green upgrades make the most financial sense for your specific house and goals.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="eco-cta-phone" data-animate="fade-up"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
      <?php endif; ?>
      <div class="eco-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Start Your Green Renovation</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="eco-faq-section" aria-labelledby="eco-faq-heading">
    <div class="container">
      <div style="text-align:center;" data-animate="fade-up">
        <span class="eco-eyebrow">Common Questions</span>
        <h2 id="eco-faq-heading" style="text-wrap:balance;">Eco-Friendly Remodeling FAQ — <span class="eco-text-accent">Bowdon &amp; Georgia</span></h2>
      </div>
      <div class="eco-faq-list" role="list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="eco-faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="eco-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="eco-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="eco-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg-alt)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ═══════════════════════════════════════ -->
  <section class="section" style="padding:var(--section-pad);background:var(--color-bg-alt);" aria-label="Other services you may need">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-3xl);" data-animate="fade-up">
        <span class="eco-eyebrow">Also From Gray Tile</span>
        <h2 style="text-wrap:balance;">Other Services <span class="eco-text-accent">You May Need</span></h2>
      </div>
      <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo08']; ?>" alt="Full home remodel Bowdon GA complete sustainable renovation" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Full Home Remodel</h3>
            <p class="service-card__desc">The best time to add green upgrades is during a full renovation — walls are already open.</p>
            <ul><li>Insulation upgrades included</li><li>Low-VOC materials standard</li><li>Energy-efficient fixtures</li></ul>
            <a href="/services/full-home-remodel/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo17']; ?>" alt="Home upgrades Bowdon Georgia improve value and efficiency" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="zap"></i></div>
            <h3>Home Upgrades</h3>
            <p class="service-card__desc">Targeted efficiency upgrades — insulation, fixtures, and lighting without full renovation scope.</p>
            <ul><li>Targeted upgrades</li><li>Lower utility bills fast</li><li>No full renovation required</li></ul>
            <a href="/services/home-upgrades/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['gallery03']; ?>" alt="Flooring services Bowdon GA sustainable flooring options" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="ruler"></i></div>
            <h3>Flooring Services</h3>
            <p class="service-card__desc">Sustainable flooring options — recycled-content tile, FSC-certified hardwood, and durable LVP.</p>
            <ul><li>Recycled-content tile</li><li>FSC-certified hardwood</li><li>Long-lasting LVP options</li></ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="eco-closing-cta" aria-label="Closing call to action">
    <div class="container" data-animate="fade-up">
      <span class="eco-eyebrow">Renovate Smart, Not Just Green</span>
      <h2>Choose Improvements That Actually Pay Back in Georgia's Climate</h2>
      <p class="prose-centered">
        Free consultations for eco-friendly remodeling throughout Bowdon, Carrollton,
        Villa Rica, Bremen, and Carroll County. We'll be direct about what delivers real value
        for your house and what doesn't.
      </p>
      <div class="eco-btn-group">
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
