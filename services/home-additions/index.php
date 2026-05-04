<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Home Additions Bowdon GA | Room Additions & Expansions';
$pageDescription = 'Expand your Bowdon home with professionally built additions — from room additions to second stories. Carroll County permits handled. Free estimates. Call (770) 555-0000.';
$canonicalUrl    = $siteUrl . '/services/home-additions/';
$ogImage         = $clientPhotos['photo16'];
$heroPreloadImage = $clientPhotos['photo16'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'home-additions') { $currentService = $svc; break; }
}

$pageFaqs = [
    ['q' => 'How much does a home addition cost in Bowdon, GA?',
     'a' => 'Home additions in the Bowdon and Carroll County area typically run $80–$200 per square foot depending on the type and finish level. A basic 400 sq ft room addition runs $32,000–$55,000. A full second-story addition on a 1,200 sq ft footprint is typically $140,000–$220,000. Sunrooms and screen porches cost less ($25,000–$60,000). These ranges reflect Carroll County labor and materials as of early 2026 — we provide detailed line-item estimates specific to your property.'],
    ['q' => 'How long does it take to build a home addition in Bowdon?',
     'a' => 'Most single-room additions in Carroll County take 8–14 weeks from permit approval to project completion. Permit review at Carroll County Planning & Zoning typically takes 2–4 weeks for residential additions. The construction phase itself — framing, rough-in trades, insulation, drywall, trim, and finish work — runs 6–10 weeks depending on scope and material lead times. A second-story addition will take 12–20 weeks total.'],
    ['q' => 'Do home additions require permits in Carroll County, GA?',
     'a' => 'Yes. Any addition that expands the footprint of your home or creates new habitable space requires a building permit from Carroll County. This includes room additions, sunrooms (if conditioned), garage conversions to living space, and second-story additions. Permits require engineered drawings for structural work, a site plan showing setbacks, and inspections at framing, rough-in, and final stages. We handle the entire permit process as part of every addition project.'],
    ['q' => 'Is it better to add onto my existing home or buy a bigger house?',
     'a' => 'For most homeowners in Bowdon, adding on is significantly more cost-effective than buying. At current Carroll County real estate prices, adding 400–600 sq ft to an existing home typically costs $40,000–$90,000 — far less than the price difference between your current home and one with the extra space. You also keep your existing mortgage rate, your neighborhood, your yard, and the specific features you already like about your home. The math changes if you need to move a school district or significantly upgrade finishes throughout the entire house.'],
    ['q' => 'What types of home additions does Gray Tile & Remodeling build?',
     'a' => 'We build room additions (bedrooms, family rooms, home offices), second-story additions, sunrooms and three-season porches, garage conversions to conditioned living space, and bump-out additions (extending an existing room into the yard). We also build detached structures like workshops and guest quarters that connect to the main house. All addition types require different structural approaches — we assess your specific property, existing foundation, and framing before recommending scope.'],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   HOME-ADDITIONS/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   CSS prefix: .hadd-
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.hadd-hero {
  position: relative;
  min-height: 62vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo16']; ?>');
  background-size: cover;
  background-position: center 35%;
  background-repeat: no-repeat;
}
.hadd-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(150deg, rgba(var(--color-primary-dark-rgb), 0.94) 0%, rgba(var(--color-primary-rgb), 0.68) 60%, rgba(var(--color-accent-rgb), 0.08) 100%);
  z-index: 1;
}
.hadd-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 2; pointer-events: none;
}
.hadd-hero .hero-content { position: relative; z-index: 3; padding: var(--space-4xl) 0 var(--space-3xl); max-width: 720px; }
.hadd-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.9) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  margin-bottom: var(--space-lg); text-wrap: balance;
}
.hadd-hero .hero-subhead {
  color: rgba(255,255,255,0.88); font-size: clamp(1rem, 2vw, 1.2rem);
  max-width: 58ch; margin-bottom: var(--space-2xl); line-height: 1.65;
}
.hadd-hero .hero-cta-group { display: flex; gap: var(--space-md); flex-wrap: wrap; }

/* ── Breadcrumb ───────────────────────────────────────────────── */
.hadd-breadcrumb-bar { background: var(--color-bg-alt); padding: var(--space-md) 0; border-bottom: 1px solid var(--color-gray-light); }
.hadd-breadcrumb-nav { display: flex; align-items: center; gap: var(--space-sm); font-size: 0.875rem; color: var(--color-text-light); flex-wrap: wrap; }
.hadd-breadcrumb-nav a { color: var(--color-accent); font-weight: 500; }
.hadd-breadcrumb-nav a:hover { color: var(--color-primary); }
.hadd-breadcrumb-sep { color: var(--color-gray); font-size: 0.75rem; }
.hadd-breadcrumb-current { color: var(--color-text); font-weight: 600; }

/* ── Shared utilities ─────────────────────────────────────────── */
.hadd-eyebrow {
  display: inline-block; font-family: var(--font-heading); font-size: 0.78rem; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.12em; color: var(--color-accent);
  background: rgba(var(--color-accent-rgb), 0.1); padding: var(--space-xs) var(--space-md);
  border-radius: var(--radius-full); margin-bottom: var(--space-md);
}
.hadd-text-accent { color: var(--color-accent); }
.hadd-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.hadd-divider svg { display: block; width: 100%; height: 55px; }

/* ── Intro split ──────────────────────────────────────────────── */
.hadd-intro { padding: var(--space-3xl) 0 var(--space-2xl); background: var(--color-bg); }
.hadd-intro-inner {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl); align-items: start;
}
@media (max-width: 899px) { .hadd-intro-inner { grid-template-columns: 1fr; } }
.hadd-intro-copy h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.hadd-intro-copy p { color: var(--color-text); font-size: 1rem; line-height: 1.7; max-width: 62ch; margin-bottom: var(--space-md); }
.hadd-intro-copy p.lead-para {
  font-size: 1.08rem; font-weight: 500; color: var(--color-primary);
  border-left: 3px solid var(--color-accent); padding-left: var(--space-md);
}
.hadd-last-updated { font-size: 0.8rem; color: var(--color-gray); margin-top: var(--space-md); }

/* ── Photo composition ────────────────────────────────────────── */
.hadd-photo-comp { position: relative; padding-bottom: var(--space-2xl); }
.hadd-photo-frame {
  position: relative; border-radius: var(--radius-lg); overflow: hidden;
  box-shadow: var(--shadow-xl); border: 4px solid var(--color-white); aspect-ratio: 4/3;
}
.hadd-photo-frame img { width: 100%; height: 100%; object-fit: cover; display: block; }
.hadd-stat-badge {
  position: absolute; bottom: -4px; right: -12px;
  background: var(--color-accent); color: var(--color-white);
  border-radius: var(--radius-md); padding: var(--space-md) var(--space-lg);
  box-shadow: var(--shadow-lg); text-align: center; min-width: 140px; z-index: 2;
}
.hadd-stat-badge .stat-number { display: block; font-family: var(--font-heading); font-size: 1.6rem; font-weight: 800; line-height: 1.1; margin-bottom: var(--space-xs); }
.hadd-stat-badge .stat-label { display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; opacity: 0.92; }
.hadd-accent-strip { position: absolute; top: -8px; left: 20px; width: 56px; height: 4px; background: var(--color-accent); border-radius: var(--radius-full); }

/* ── Addition types feature section ──────────────────────────── */
.hadd-types-section {
  padding: var(--section-pad); background: var(--color-primary);
  position: relative; overflow: hidden;
}
@media (max-width: 767px) { .hadd-types-section { padding: var(--section-pad-mobile); } }
.hadd-types-section::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06; pointer-events: none;
}
.hadd-types-header { text-align: center; margin-bottom: var(--space-3xl); position: relative; z-index: 1; }
.hadd-types-header h2 { color: var(--color-white); text-wrap: balance; }
.hadd-types-grid {
  display: grid; grid-template-columns: repeat(4, 1fr);
  gap: var(--space-lg); position: relative; z-index: 1;
}
@media (max-width: 1023px) { .hadd-types-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .hadd-types-grid { grid-template-columns: 1fr; } }
.hadd-type-card {
  background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.13);
  border-radius: var(--radius-lg); padding: var(--space-xl) var(--space-lg);
  border-top: 3px solid var(--color-accent); transition: background var(--transition-base), transform var(--transition-base);
}
.hadd-type-card:hover { background: rgba(255,255,255,0.12); transform: translateY(-4px); }
.hadd-type-icon {
  width: 52px; height: 52px; border-radius: var(--radius-md);
  background: rgba(var(--color-accent-rgb), 0.18); color: var(--color-accent);
  display: flex; align-items: center; justify-content: center; margin-bottom: var(--space-lg);
}
.hadd-type-card h3 { color: var(--color-white); font-size: 1.15rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.hadd-type-card p { color: rgba(255,255,255,0.72); font-size: 0.9rem; line-height: 1.65; margin: 0; }
.hadd-type-cost {
  display: inline-block; margin-top: var(--space-md);
  font-family: var(--font-heading); font-size: 0.85rem; font-weight: 700;
  color: var(--color-accent); letter-spacing: 0.03em;
}

/* ── Process steps ────────────────────────────────────────────── */
.hadd-process { padding: var(--section-pad); background: var(--color-bg-alt); }
@media (max-width: 767px) { .hadd-process { padding: var(--section-pad-mobile); } }
.hadd-process-grid {
  display: grid; grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl); margin-top: var(--space-2xl);
}
@media (max-width: 1023px) { .hadd-process-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .hadd-process-grid { grid-template-columns: 1fr; } }
.hadd-process-step {
  background: var(--color-bg); border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg); border-top: 3px solid var(--color-accent);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.hadd-process-step:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.hadd-step-num {
  font-family: var(--font-heading); font-size: 3rem; font-weight: 900;
  color: rgba(var(--color-accent-rgb), 0.16); line-height: 1; margin-bottom: var(--space-sm); display: block;
}
.hadd-process-step h4 { color: var(--color-primary); font-size: 1.05rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.hadd-process-step p { color: var(--color-text-light); font-size: 0.9rem; line-height: 1.6; margin: 0; }

/* ── CTA banner ───────────────────────────────────────────────── */
.hadd-cta-banner {
  padding: var(--space-4xl) var(--space-xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative; overflow: hidden; text-align: center;
}
.hadd-cta-banner::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06; pointer-events: none;
}
.hadd-cta-banner .container { position: relative; z-index: 1; }
.hadd-cta-banner h2 { color: var(--color-white); margin-bottom: var(--space-md); text-wrap: balance; }
.hadd-cta-banner p { color: rgba(255,255,255,0.82); font-size: 1.05rem; max-width: 55ch; margin: 0 auto var(--space-2xl); }
.hadd-cta-phone {
  display: block; font-family: var(--font-heading); font-size: clamp(1.6rem, 3vw, 2.4rem);
  font-weight: 700; color: var(--color-accent); margin-bottom: var(--space-xl); letter-spacing: 0.02em;
}
.hadd-cta-phone:hover { color: var(--color-white); }
.hadd-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ section ──────────────────────────────────────────────── */
.hadd-faq { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .hadd-faq { padding: var(--section-pad-mobile); } }
.hadd-faq-list { max-width: 820px; margin: var(--space-2xl) auto 0; display: flex; flex-direction: column; gap: var(--space-md); }
.hadd-faq-item { border: 1px solid var(--color-gray-light); border-radius: var(--radius-md); overflow: hidden; transition: box-shadow var(--transition-base); }
.hadd-faq-item:hover { box-shadow: var(--shadow-md); }
.faq-question {
  width: 100%; background: var(--color-bg); border: none; text-align: left;
  padding: var(--space-lg) var(--space-xl); font-family: var(--font-heading); font-size: 1.05rem;
  font-weight: 700; color: var(--color-primary); cursor: pointer;
  display: flex; align-items: center; justify-content: space-between; gap: var(--space-md);
  transition: background var(--transition-fast), color var(--transition-fast);
}
.faq-question:hover { background: var(--color-bg-alt); color: var(--color-accent); }
.faq-question[aria-expanded="true"] { background: var(--color-primary); color: var(--color-white); }
.faq-icon {
  flex-shrink: 0; width: 20px; height: 20px; border-radius: 50%;
  border: 2px solid currentColor; display: flex; align-items: center; justify-content: center;
  transition: transform var(--transition-base); font-size: 1rem; line-height: 1;
}
.faq-question[aria-expanded="true"] .faq-icon { transform: rotate(45deg); }
.faq-answer {
  display: none; padding: 0 var(--space-xl) var(--space-lg); background: var(--color-bg);
  color: var(--color-text); font-size: 0.97rem; line-height: 1.7;
  border-top: 1px solid var(--color-gray-light);
}
.faq-answer.is-open { display: block; }

/* ── Closing CTA ──────────────────────────────────────────────── */
.hadd-closing { padding: var(--section-pad); background: var(--color-bg-alt); text-align: center; }
@media (max-width: 767px) { .hadd-closing { padding: var(--section-pad-mobile); } }
.hadd-closing h2 { color: var(--color-primary); margin-bottom: var(--space-md); text-wrap: balance; }
.hadd-closing p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto var(--space-2xl); }

/* ── Photo secondary pull ─────────────────────────────────────── */
.hadd-photo-secondary {
  position: absolute; bottom: var(--space-xl); left: -24px;
  width: 140px; border-radius: var(--radius-md);
  box-shadow: var(--shadow-lg); border: 3px solid var(--color-white);
  overflow: hidden; aspect-ratio: 1;
}
.hadd-photo-secondary img { width: 100%; height: 100%; object-fit: cover; display: block; }
@media (max-width: 767px) {
  .hadd-photo-secondary { display: none; }
  .hadd-hero { min-height: 70vh; }
  .hadd-hero .hero-content { padding: var(--space-3xl) 0 var(--space-2xl); }
  .hadd-stat-badge { right: 0; bottom: 0; min-width: 120px; }
  .hadd-stat-badge .stat-number { font-size: 1.35rem; }
  .hadd-types-grid { grid-template-columns: 1fr; }
  .hadd-photo-comp { padding-bottom: var(--space-lg); }
}

/* ── Credential bar ───────────────────────────────────────────── */
.hadd-cred-bar {
  background: var(--color-bg-alt); border-top: 3px solid var(--color-accent);
  border-bottom: 1px solid var(--color-gray-light); padding: var(--space-lg) 0;
}
.hadd-cred-inner {
  display: flex; align-items: center; justify-content: center;
  gap: var(--space-3xl); flex-wrap: wrap;
}
.hadd-cred-item { display: flex; flex-direction: column; align-items: center; gap: var(--space-xs); text-align: center; }
.hadd-cred-item .cred-val { font-family: var(--font-heading); font-size: 1.8rem; font-weight: 800; color: var(--color-primary); line-height: 1; }
.hadd-cred-item .cred-lbl { font-family: var(--font-heading); font-size: 0.74rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--color-text-light); }
.hadd-cred-sep { width: 1px; height: 36px; background: var(--color-gray-light); }
@media (max-width: 599px) { .hadd-cred-sep { display: none; } .hadd-cred-inner { gap: var(--space-xl); } }
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="hadd-hero" aria-label="Home Additions hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">Home Additions in Bowdon, GA</h1>
      <p class="hero-subhead" data-animate="fade-up">
        Expand your home the right way — from single-room additions to full second stories.
        Gray Tile handles framing, rough-in trades, and finish work as one crew throughout
        Carroll County. No handoffs. No surprises.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get an Addition Estimate</a>
        <a href="#addition-types" class="btn btn-outline-white btn-lg">See Addition Types</a>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="hadd-breadcrumb-bar" aria-label="Breadcrumb">
    <div class="container">
      <nav class="hadd-breadcrumb-nav" aria-label="You are here">
        <a href="/">Home</a>
        <span class="hadd-breadcrumb-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="hadd-breadcrumb-sep" aria-hidden="true">›</span>
        <span class="hadd-breadcrumb-current" aria-current="page">Home Additions</span>
      </nav>
    </div>
  </div>

  <!-- ══ CREDENTIAL BAR ════════════════════════════════════════ -->
  <div class="hadd-cred-bar">
    <div class="container">
      <div class="hadd-cred-inner">
        <div class="hadd-cred-item">
          <span class="cred-val">25</span>
          <span class="cred-lbl">Years in Bowdon</span>
        </div>
        <div class="hadd-cred-sep" aria-hidden="true"></div>
        <div class="hadd-cred-item">
          <span class="cred-val">$80K+</span>
          <span class="cred-lbl">Average Addition Budget</span>
        </div>
        <div class="hadd-cred-sep" aria-hidden="true"></div>
        <div class="hadd-cred-item">
          <span class="cred-val">8–14wk</span>
          <span class="cred-lbl">Typical Timeline</span>
        </div>
        <div class="hadd-cred-sep" aria-hidden="true"></div>
        <div class="hadd-cred-item">
          <span class="cred-val">100%</span>
          <span class="cred-lbl">Permitted &amp; Inspected</span>
        </div>
      </div>
    </div>
  </div>

  <!-- ══ INTRO SPLIT ═══════════════════════════════════════════ -->
  <section class="hadd-intro" aria-labelledby="hadd-intro-heading">
    <div class="container">
      <div class="hadd-intro-inner">

        <div class="hadd-intro-copy" data-animate="fade-up">
          <span class="hadd-eyebrow">Home Additions Bowdon, GA</span>
          <h2 id="hadd-intro-heading">Add Space Without Moving — From $80K in Carroll County</h2>
          <p class="lead-para prose">
            A home addition in Bowdon typically costs $80–$200 per square foot and takes 8–14 weeks from permit approval. That's less than the price gap between your current home and a larger one in Carroll County — and you keep your mortgage, your yard, and your neighbors.
          </p>
          <p class="prose">
            Gray Tile & Remodeling builds home additions as a single integrated project: framing, plumbing rough-in, electrical rough-in, HVAC extension, insulation, drywall, trim, and finish tile work. Most contractors coordinate multiple subs for each phase — handoffs that add weeks and create accountability gaps. We carry the full scope.
          </p>
          <p class="prose">
            Carroll County requires building permits for all additions. The permit process includes plan review, a site plan verifying setbacks, and mandatory inspections at framing, rough-in, and final stages. We prepare permit drawings, submit to Carroll County Planning & Zoning, and schedule every required inspection. You don't manage a contractor parade — you get one point of contact from design meeting through final walkthrough.
          </p>
          <p class="prose">
            We've built additions across Bowdon, Whitesburg, Roopville, and the rural Carroll County areas where properties have more flexibility on setbacks and footprint. Whether you're adding a master suite, a garage conversion, or a full second story, the structural work starts with the same principle: build it correctly from the ground up.
          </p>
          <p class="hadd-last-updated">Last updated: April 2026</p>
        </div>

        <div class="hadd-photo-comp" data-animate="fade-up">
          <div class="hadd-accent-strip"></div>
          <div class="hadd-photo-frame">
            <img
              src="<?php echo $clientPhotos['photo16']; ?>"
              alt="Home addition under construction in Bowdon Georgia showing new framing and structural expansion"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="hadd-stat-badge">
            <span class="stat-number">$80K–$200K</span>
            <span class="stat-label">Typical Range in Carroll Co.</span>
          </div>
          <div class="hadd-photo-secondary">
            <img
              src="<?php echo $clientPhotos['photo17']; ?>"
              alt="Completed home addition exterior Bowdon GA"
              width="280" height="280"
              loading="lazy">
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="hadd-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ ADDITION TYPES (FEATURED / SIGNATURE) ═════════════════ -->
  <section class="hadd-types-section" id="addition-types" aria-labelledby="hadd-types-heading">
    <div class="container">
      <div class="hadd-types-header" data-animate="fade-up">
        <span class="hadd-eyebrow" style="background:rgba(var(--color-accent-rgb),0.2);color:var(--color-accent);">Addition Types</span>
        <h2 id="hadd-types-heading">Four Ways to Expand<br><span class="hadd-text-accent">Your Carroll County Home</span></h2>
        <p style="color:rgba(255,255,255,0.75);max-width:58ch;margin:var(--space-md) auto 0;font-size:1rem;line-height:1.7;">Each addition type has different structural requirements, permit complexity, and cost ranges. Here's what we build and what to expect.</p>
      </div>
      <div class="hadd-types-grid">
        <div class="hadd-type-card" data-animate="fade-up">
          <div class="hadd-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          </div>
          <h3>Room Addition</h3>
          <p>Extend your footprint to add a bedroom, home office, family room, or primary suite. Requires new foundation footings, full framing, and connection to existing mechanical systems.</p>
          <span class="hadd-type-cost">$90–$160/sq ft · 8–12 weeks</span>
        </div>
        <div class="hadd-type-card" data-animate="fade-up">
          <div class="hadd-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
          </div>
          <h3>Second Story Addition</h3>
          <p>Double your living space by building up. Requires engineering review of the existing first-floor walls and foundation to confirm they can carry the new load. Most Bowdon-era homes need minimal reinforcement.</p>
          <span class="hadd-type-cost">$120–$200/sq ft · 12–20 weeks</span>
        </div>
        <div class="hadd-type-card" data-animate="fade-up">
          <div class="hadd-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
          </div>
          <h3>Sunroom / 3-Season Porch</h3>
          <p>Add enclosed outdoor living space without full conditioned addition costs. Slab or deck-mounted. Conditioned sunrooms require HVAC extension and thermal insulation to meet Georgia Energy Code.</p>
          <span class="hadd-type-cost">$60–$110/sq ft · 6–10 weeks</span>
        </div>
        <div class="hadd-type-card" data-animate="fade-up">
          <div class="hadd-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
          </div>
          <h3>Garage Conversion</h3>
          <p>Convert attached or detached garage space into conditioned living area. Requires insulated walls, flooring system over concrete, HVAC extension, and electrical upgrades. All at existing footprint — no new foundation needed.</p>
          <span class="hadd-type-cost">$60–$90/sq ft · 4–8 weeks</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="hadd-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,55 1200,0 1200,55" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ PROCESS STEPS ══════════════════════════════════════════ -->
  <section class="hadd-process" aria-labelledby="hadd-process-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="hadd-eyebrow">How It Works</span>
        <h2 id="hadd-process-heading" style="text-wrap:balance;">Our Addition Process<br><span class="hadd-text-accent">Start to Finished Space</span></h2>
      </div>
      <div class="hadd-process-grid">
        <div class="hadd-process-step" data-animate="fade-up">
          <span class="hadd-step-num">01</span>
          <h4>Design Meeting &amp; Site Assessment</h4>
          <p>We walk your property, review setback requirements for your Carroll County lot, discuss scope, and produce a detailed line-item estimate. If structural engineering is needed, we engage a local Georgia-licensed engineer at this stage.</p>
        </div>
        <div class="hadd-process-step" data-animate="fade-up">
          <span class="hadd-step-num">02</span>
          <h4>Carroll County Permit Submission</h4>
          <p>We prepare construction drawings, submit to Carroll County Planning & Zoning, and manage the review process. Residential addition permits typically process in 2–4 weeks. We handle all communication with the building department.</p>
        </div>
        <div class="hadd-process-step" data-animate="fade-up">
          <span class="hadd-step-num">03</span>
          <h4>Foundation, Framing &amp; Rough-In Trades</h4>
          <p>Foundation footings, framing, and rough-in plumbing, electrical, and HVAC work are completed in sequence. Carroll County framing inspection is scheduled and passed before insulation and drywall begin.</p>
        </div>
        <div class="hadd-process-step" data-animate="fade-up">
          <span class="hadd-step-num">04</span>
          <h4>Finish Work &amp; Final Inspection</h4>
          <p>Insulation, drywall, trim, flooring, tile, and paint are completed to match or complement your existing home. Carroll County final inspection is scheduled. You get a finished space with a certificate of occupancy on file.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="hadd-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,32 C300,55 900,10 1200,32 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ═══════════════════════════════════════════ -->
  <section class="hadd-cta-banner" aria-label="Home additions CTA">
    <div class="container">
      <h2 data-animate="fade-up">Get a Line-Item Addition Estimate Before You Commit to Anything</h2>
      <p class="prose-centered" data-animate="fade-up">
        We quote additions in detail — foundation, framing, rough-ins, insulation, drywall, trim, and tile — so you know exactly what you're buying before work starts. Serving Bowdon and all of Carroll County.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="hadd-cta-phone" data-animate="fade-up"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
      <?php endif; ?>
      <div class="hadd-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Start Your Addition Project</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="hadd-faq" aria-labelledby="hadd-faq-heading">
    <div class="container">
      <div style="text-align:center;" data-animate="fade-up">
        <span class="hadd-eyebrow">Common Questions</span>
        <h2 id="hadd-faq-heading" style="text-wrap:balance;">Home Additions FAQ — <span class="hadd-text-accent">Carroll County, GA</span></h2>
      </div>
      <div class="hadd-faq-list" role="list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="hadd-faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="hadd-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="hadd-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="hadd-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ═══════════════════════════════════════ -->
  <section class="section" style="padding:var(--section-pad);background:var(--color-bg-alt);" aria-label="Other services you may need">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-3xl);" data-animate="fade-up">
        <span class="hadd-eyebrow">Also From Gray Tile</span>
        <h2 style="text-wrap:balance;">Other Services <span class="hadd-text-accent">You May Need</span></h2>
      </div>
      <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo09']; ?>" alt="Room additions Bowdon GA Gray Tile Remodeling" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="home"></i></div>
            <h3>Room Additions</h3>
            <p class="service-card__desc">Single-room expansion projects — bedrooms, offices, master suites, and family rooms throughout Carroll County.</p>
            <ul>
              <li>Foundation through finish work</li>
              <li>Carroll County permits included</li>
              <li>8–12 week typical timeline</li>
            </ul>
            <a href="/services/room-additions/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo07']; ?>" alt="Framing contractor Bowdon GA residential additions" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hammer"></i></div>
            <h3>Framing Contractor</h3>
            <p class="service-card__desc">Tile-grade framing (L/360 deflection) for additions, structural modifications, and new construction in Bowdon.</p>
            <ul>
              <li>L/360 tile-grade deflection</li>
              <li>Load-bearing engineering included</li>
              <li>Carroll County permit-ready</li>
            </ul>
            <a href="/services/framing-contractor/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo12']; ?>" alt="Full home remodel Bowdon GA complete renovation" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="building-2"></i></div>
            <h3>Full Home Remodel</h3>
            <p class="service-card__desc">Whole-house transformation from layout redesign to finish tile — one crew, one contract, one timeline.</p>
            <ul>
              <li>Kitchen, bath, and living areas</li>
              <li>Structural changes included</li>
              <li>Design-build coordination</li>
            </ul>
            <a href="/services/full-home-remodel/" class="service-card__cta">Learn more</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="hadd-closing" aria-label="Closing call to action">
    <div class="container" data-animate="fade-up">
      <span class="hadd-eyebrow">Ready to Add Space?</span>
      <h2>Build the Addition Your Family Has Been Waiting For</h2>
      <p class="prose-centered">
        Free estimates throughout Bowdon and Carroll County. We handle every phase — from Carroll County permit submission through final tile — with one crew and one point of contact.
      </p>
      <div class="hadd-btn-group">
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
