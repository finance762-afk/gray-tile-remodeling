<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Garage Conversion in Bowdon GA | Add Living Space | Gray Tile';
$pageDescription = 'Convert your garage into a bedroom, office, studio, or living area in Bowdon, GA. Gray Tile & Remodeling handles insulation, flooring, electrical, and finishing throughout West Georgia.';
$canonicalUrl    = $siteUrl . '/services/garage-conversion/';
$ogImage         = $clientPhotos['photo16'];
$heroPreloadImage = $clientPhotos['photo16'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'garage-conversion') { $currentService = $svc; break; }
}

$pageFaqs = [
    ['q' => 'Is a permit required for a garage conversion in Bowdon, GA?',
     'a' => 'Yes. Converting a garage into habitable living space requires a building permit from Carroll County. The work must meet Georgia Residential Code requirements for ceiling height (minimum 7 feet), insulation (R-13 walls, R-30 ceiling), ventilation, egress windows in sleeping rooms, and smoke/CO detector placement. Gray Tile handles permit applications and all required inspections as part of the project.'],
    ['q' => 'How much does a garage conversion typically cost in West Georgia?',
     'a' => 'A basic single-car garage conversion in the Bowdon area runs $15,000–$30,000 depending on the scope of finishing, HVAC integration, plumbing additions (if a bathroom is included), and flooring choice. A two-car garage with a bathroom and full finishing typically runs $35,000–$65,000. We provide a detailed estimate after assessing your specific garage.'],
    ['q' => 'Can you add a bathroom to a converted garage?',
     'a' => 'Yes, in most cases. Adding a bathroom requires extending plumbing lines from your existing system. Whether this is straightforward or complex depends on where your main stack is located relative to the garage. We assess the plumbing situation during the initial site visit and factor it into the estimate.'],
    ['q' => 'What flooring works best in a converted garage in Georgia?',
     'a' => 'Luxury vinyl plank (LVP) is the most practical choice for converted garage floors in Georgia\'s climate. It handles the moisture that concrete slabs release, installs directly over the slab with minimal prep, and looks finished. For heated and cooled spaces, engineered hardwood also works well. Standard hardwood is not recommended directly over concrete in Georgia\'s humidity. We also install tile for garage bathrooms and utility areas.'],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

// SEO: head.php outputs <link rel="canonical"> and application/ld+json schema for this page.
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   GARAGE-CONVERSION/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.gc-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo16']; ?>');
  background-size: cover;
  background-position: center 45%;
  background-repeat: no-repeat;
}
.gc-hero::before {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(
    140deg,
    rgba(var(--color-primary-rgb), 0.90) 0%,
    rgba(var(--color-primary-dark-rgb), 0.68) 55%,
    rgba(var(--color-accent-rgb), 0.14) 100%
  );
  z-index: 1;
}
.gc-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 2; pointer-events: none;
}
.gc-hero .hero-content {
  position: relative; z-index: 3;
  padding: var(--space-4xl) 0 var(--space-3xl);
  max-width: 700px;
}
.gc-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.88) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  margin-bottom: var(--space-lg); text-wrap: balance;
}
.gc-hero .hero-subhead {
  color: rgba(255,255,255,0.88); font-size: clamp(1rem, 2vw, 1.2rem);
  max-width: 58ch; margin-bottom: var(--space-2xl); line-height: 1.65;
}
.gc-hero .hero-cta-group { display: flex; gap: var(--space-md); flex-wrap: wrap; }

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
.gc-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.gc-divider svg { display: block; width: 100%; height: 55px; }

/* ── Intro split ──────────────────────────────────────────────── */
.gc-intro-section { padding: var(--space-3xl) 0 var(--space-2xl); background: var(--color-bg); }
.gc-intro-inner {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl); align-items: start;
}
@media (max-width: 899px) { .gc-intro-inner { grid-template-columns: 1fr; } }
.gc-intro-copy h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.gc-intro-copy p { color: var(--color-text); font-size: 1rem; line-height: 1.7; max-width: 62ch; }
.gc-intro-copy p.lead-para {
  font-size: 1.08rem; font-weight: 500; color: var(--color-primary);
  border-left: 3px solid var(--color-accent); padding-left: var(--space-md); margin-bottom: var(--space-lg);
}
.last-updated { font-size: 0.8rem; color: var(--color-gray); margin-top: var(--space-md); }

/* ── Photo composition ────────────────────────────────────────── */
.photo-composition { position: relative; }
.photo-frame {
  position: relative; border-radius: var(--radius-lg); overflow: hidden;
  box-shadow: var(--shadow-xl); border: 4px solid var(--color-white); aspect-ratio: 4/3;
}
.photo-frame img { width: 100%; height: 100%; object-fit: cover; display: block; }
.photo-stat-badge {
  position: absolute; bottom: -20px; right: -16px;
  background: var(--color-accent); color: var(--color-white);
  border-radius: var(--radius-md); padding: var(--space-md) var(--space-lg);
  box-shadow: var(--shadow-lg); text-align: center; min-width: 130px; z-index: 2;
}
.photo-stat-badge .stat-number { display: block; font-family: var(--font-heading); font-size: 2rem; font-weight: 800; line-height: 1; margin-bottom: var(--space-xs); }
.photo-stat-badge .stat-label { display: block; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; opacity: 0.9; }
.photo-accent-strip { position: absolute; top: -8px; left: 20px; width: 60px; height: 4px; background: var(--color-accent); border-radius: var(--radius-full); }

/* ── What's included section (dark, full bleed) ───────────────── */
.gc-included-section {
  padding: var(--section-pad); background: var(--color-bg-dark);
  position: relative; overflow: hidden;
}
@media (max-width: 767px) { .gc-included-section { padding: var(--section-pad-mobile); } }
.gc-included-section::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.07; pointer-events: none;
}
.gc-included-section .eyebrow-label { background: rgba(var(--color-accent-rgb), 0.2); color: var(--color-accent); }
.gc-included-section h2 { color: var(--color-white); text-wrap: balance; }
.gc-included-section .section-sub { color: rgba(255,255,255,0.7); max-width: 55ch; margin: 0 auto var(--space-2xl); font-size: 1rem; }
.included-grid {
  display: grid; grid-template-columns: repeat(2, 1fr);
  gap: var(--space-lg); position: relative; z-index: 1;
}
@media (max-width: 767px) { .included-grid { grid-template-columns: 1fr; } }
.included-card {
  background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1);
  border-radius: var(--radius-lg); padding: var(--space-xl);
  display: flex; gap: var(--space-lg); align-items: flex-start;
  transition: background var(--transition-base), transform var(--transition-base);
}
.included-card:hover { background: rgba(255,255,255,0.1); transform: translateY(-3px); }
.included-card-icon {
  flex-shrink: 0; width: 46px; height: 46px;
  background: rgba(var(--color-accent-rgb), 0.18); border-radius: var(--radius-md);
  display: flex; align-items: center; justify-content: center; color: var(--color-accent);
}
.included-card h4 { color: var(--color-white); font-size: 1.05rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.included-card p { color: rgba(255,255,255,0.7); font-size: 0.9rem; line-height: 1.6; margin: 0; }

/* ── Process Steps ────────────────────────────────────────────── */
.process-section { padding: var(--section-pad); background: var(--color-bg-alt); }
@media (max-width: 767px) { .process-section { padding: var(--section-pad-mobile); } }
.process-steps {
  display: grid; grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl); margin-top: var(--space-2xl);
  counter-reset: step-counter;
}
@media (max-width: 1023px) { .process-steps { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .process-steps { grid-template-columns: 1fr; } }
.process-step {
  background: var(--color-bg); border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg); box-shadow: var(--shadow-card);
  position: relative; border-top: 3px solid var(--color-accent);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.process-step:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.process-number {
  font-family: var(--font-heading); font-size: 3rem; font-weight: 900;
  color: rgba(var(--color-accent-rgb), 0.15); line-height: 1; margin-bottom: var(--space-sm); display: block;
}
.process-step h4 { color: var(--color-primary); font-size: 1.05rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.process-step p { color: var(--color-text-light); font-size: 0.9rem; line-height: 1.6; margin: 0; }

/* ── CTA Banner ───────────────────────────────────────────────── */
.cta-banner-section {
  padding: var(--space-4xl) var(--space-xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative; overflow: hidden; text-align: center;
}
.cta-banner-section::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06; pointer-events: none;
}
.cta-banner-section .container { position: relative; z-index: 1; }
.cta-banner-section h2 { color: var(--color-white); margin-bottom: var(--space-md); text-wrap: balance; }
.cta-banner-section p { color: rgba(255,255,255,0.8); font-size: 1.05rem; max-width: 55ch; margin: 0 auto var(--space-2xl); }
.cta-banner-phone { display: block; font-family: var(--font-heading); font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 700; color: var(--color-accent); margin-bottom: var(--space-xl); letter-spacing: 0.02em; }
.cta-banner-phone:hover { color: var(--color-white); }
.cta-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.faq-section { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .faq-section { padding: var(--section-pad-mobile); } }
.faq-list { max-width: 800px; margin: var(--space-2xl) auto 0; display: flex; flex-direction: column; gap: var(--space-md); }
.faq-item { border: 1px solid var(--color-gray-light); border-radius: var(--radius-md); overflow: hidden; transition: box-shadow var(--transition-base); }
.faq-item:hover { box-shadow: var(--shadow-md); }
.faq-question {
  width: 100%; background: var(--color-bg); border: none; text-align: left;
  padding: var(--space-lg) var(--space-xl); font-family: var(--font-heading);
  font-size: 1.05rem; font-weight: 700; color: var(--color-primary);
  cursor: pointer; display: flex; align-items: center; justify-content: space-between;
  gap: var(--space-md); transition: background var(--transition-fast), color var(--transition-fast);
}
.faq-question:hover { background: var(--color-bg-alt); color: var(--color-accent); }
.faq-question[aria-expanded="true"] { background: var(--color-primary); color: var(--color-white); }
.faq-icon { flex-shrink: 0; width: 20px; height: 20px; border-radius: 50%; border: 2px solid currentColor; display: flex; align-items: center; justify-content: center; transition: transform var(--transition-base); font-size: 1rem; line-height: 1; }
.faq-question[aria-expanded="true"] .faq-icon { transform: rotate(45deg); }
.faq-answer { display: none; padding: 0 var(--space-xl) var(--space-lg); background: var(--color-bg); color: var(--color-text); font-size: 0.97rem; line-height: 1.7; border-top: 1px solid var(--color-gray-light); }
.faq-answer.is-open { display: block; }

/* ── Closing CTA ──────────────────────────────────────────────── */
.closing-cta-section { padding: var(--section-pad); background: var(--color-bg-alt); text-align: center; }
@media (max-width: 767px) { .closing-cta-section { padding: var(--section-pad-mobile); } }
.closing-cta-section h2 { color: var(--color-primary); margin-bottom: var(--space-md); text-wrap: balance; }
.closing-cta-section p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto var(--space-2xl); }
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="gc-hero" aria-label="Garage Conversion hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">Garage Conversion in Bowdon, GA</h1>
      <p class="hero-subhead" data-animate="fade-up">
        Your garage is likely the cheapest square footage you can add to your home in Carroll County.
        Gray Tile converts single and double garages into finished living space — bedrooms, offices,
        studios, gyms — that meets Georgia building code and actually gets used.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get a Conversion Estimate</a>
        <a href="#what-we-handle" class="btn btn-outline-white btn-lg">What's Included</a>
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
        <span class="breadcrumb-current" aria-current="page">Garage Conversion</span>
      </nav>
    </div>
  </div>

  <!-- ══ ANSWER-FIRST OPENING ══════════════════════════════════ -->
  <section class="gc-intro-section" aria-labelledby="gc-intro-heading">
    <div class="container">
      <div class="gc-intro-inner">

        <div class="gc-intro-copy" data-animate="fade-up">
          <span class="eyebrow-label">Garage Conversion Bowdon, GA</span>
          <h2 id="gc-intro-heading">Add Livable Square Footage Without Building an Addition</h2>
          <p class="lead-para prose">
            A garage conversion in Bowdon typically costs $15,000–$65,000 depending on scope — significantly less than a full room addition at $40,000–$120,000 for equivalent square footage. You already have the foundation, the walls, and the roof. The remaining work is insulation, flooring, drywall, electrical, and HVAC connection.
          </p>
          <p class="prose">
            In West Georgia's climate, garage conversions require thoughtful insulation and HVAC work. Summers in Carroll County regularly exceed 90°F, and an uninsulated garage space will be unusable six months a year. We install R-13 spray foam or batt insulation in walls, R-30 in the ceiling, and size the HVAC branch appropriately for the converted square footage — so the space is actually comfortable year-round.
          </p>
          <p class="prose">
            The garage door opening is the largest change: we frame in the opening with appropriate headers for the span, install exterior-rated wall sheathing, and finish to match your home's exterior. Interior finishes — tile, LVP, painted drywall — are planned to match or complement your existing living spaces so the converted room feels like it was always there.
          </p>
          <p class="prose">
            Carroll County requires a building permit for garage conversions. We handle the application, the plan review process, and all required inspections — including framing, electrical, and final occupancy inspections. Most permits are issued within 2–4 weeks of application for standard conversions.
          </p>
          <p class="last-updated">Last updated: April 2026</p>
        </div>

        <div class="photo-composition" data-animate="fade-up">
          <div class="photo-accent-strip"></div>
          <div class="photo-frame">
            <img
              src="<?php echo $clientPhotos['photo17']; ?>"
              alt="Garage conversion to finished living room in Bowdon GA home showing tile flooring and drywall"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="photo-stat-badge">
            <span class="stat-number">+</span>
            <span class="stat-label">Sq Ft Without Addition</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="gc-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg-dark)"/>
    </svg>
  </div>

  <!-- ══ WHAT'S INCLUDED ════════════════════════════════════════ -->
  <section class="gc-included-section" id="what-we-handle" aria-labelledby="gc-included-heading">
    <div class="container">
      <div style="text-align:center;position:relative;z-index:1;" data-animate="fade-up">
        <span class="eyebrow-label">Scope of Work</span>
        <h2 id="gc-included-heading" style="text-wrap:balance;">Everything Gray Tile Handles<br><span style="color:var(--color-accent)">in Your Garage Conversion</span></h2>
        <p class="section-sub prose-centered">Every conversion is different, but these four areas are core to every project we complete in Carroll County.</p>
      </div>
      <div class="included-grid">
        <div class="included-card" data-animate="fade-up">
          <div class="included-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="3" y1="15" x2="21" y2="15"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="15" y1="3" x2="15" y2="21"/></svg>
          </div>
          <div>
            <h4>Framing &amp; Structural Work</h4>
            <p>We frame in the garage door opening with a properly sized header, add interior partition walls as needed, and ensure the structural framing meets Georgia Residential Code for habitable space. Load-bearing requirements are assessed before any framing begins.</p>
          </div>
        </div>

        <div class="included-card" data-animate="fade-up">
          <div class="included-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>
          </div>
          <div>
            <h4>Insulation for West Georgia's Climate</h4>
            <p>R-13 wall insulation and R-30 ceiling insulation are the minimum for year-round comfort in Carroll County's 90°F+ summers. We size the insulation package to the specific conversion and HVAC capacity so the room is actually livable — not just technically finished.</p>
          </div>
        </div>

        <div class="included-card" data-animate="fade-up">
          <div class="included-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
          </div>
          <div>
            <h4>Electrical &amp; HVAC Integration</h4>
            <p>We run new circuits for outlets, lighting, and HVAC equipment to the conversion space. HVAC is connected to your existing system or we install a ductless mini-split where the existing system lacks capacity. All electrical work is permitted and inspected.</p>
          </div>
        </div>

        <div class="included-card" data-animate="fade-up">
          <div class="included-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
          </div>
          <div>
            <h4>Flooring, Drywall &amp; Final Finish</h4>
            <p>LVP or tile over the concrete slab, drywall with texture to match your home's interior, painted trim, and doors. We match the finishes and transitions to your existing living spaces so the conversion feels intentional — not added on.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="gc-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,55 1200,0 1200,55" fill="var(--color-bg-dark)"/>
      <polygon points="0,0 1200,0 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ PROCESS STEPS ══════════════════════════════════════════ -->
  <section class="process-section" aria-labelledby="gc-process-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="eyebrow-label">How It Works</span>
        <h2 id="gc-process-heading" style="text-wrap:balance;">Garage Conversion Process in<span class="text-accent"> Bowdon</span></h2>
      </div>
      <div class="process-steps">
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">01</span>
          <h4>Site Assessment &amp; Estimate</h4>
          <p>We visit the garage, measure the space, assess the existing electrical and HVAC situation, and discuss what you want the space to become. You get a detailed estimate with line items, not a ballpark.</p>
        </div>
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">02</span>
          <h4>Carroll County Permit Application</h4>
          <p>We submit the building permit application with drawings showing framing, electrical, and HVAC plans. Most Carroll County permits for standard conversions are issued within 2–4 weeks.</p>
        </div>
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">03</span>
          <h4>Framing, Insulation &amp; Rough-Ins</h4>
          <p>Garage door opening is framed in. Interior framing, insulation, electrical rough-in, and HVAC rough-in are completed. Framing inspection is scheduled before walls are closed.</p>
        </div>
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">04</span>
          <h4>Finish Work &amp; Occupancy Inspection</h4>
          <p>Drywall, flooring, trim, doors, lighting, and outlet plates are installed. Final county inspection is scheduled. Once approved, the space is yours to use.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="gc-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,30 C300,55 900,5 1200,30 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ═══════════════════════════════════════════ -->
  <section class="cta-banner-section" aria-label="Garage conversion CTA">
    <div class="container">
      <h2 data-animate="fade-up">Your Garage Is Cheaper Square Footage Than Any Addition</h2>
      <p class="prose-centered" data-animate="fade-up">
        Get a conversion estimate for your Bowdon-area garage. We'll tell you exactly what the project
        will cost, what Carroll County requires for permits, and how long it will take.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="cta-banner-phone" data-animate="fade-up"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
      <?php endif; ?>
      <div class="cta-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get Your Conversion Estimate</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="faq-section" aria-labelledby="gc-faq-heading">
    <div class="container">
      <div style="text-align:center;" data-animate="fade-up">
        <span class="eyebrow-label">Common Questions</span>
        <h2 id="gc-faq-heading" style="text-wrap:balance;">Garage Conversion FAQ — <span class="text-accent">Bowdon, GA</span></h2>
      </div>
      <div class="faq-list" role="list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="gc-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="gc-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="gc-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg-alt)"/>
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
            <img src="<?php echo $clientPhotos['photo07']; ?>" alt="Residential framing contractor Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hard-hat"></i></div>
            <h3>Framing Contractor</h3>
            <p class="service-card__desc">Structural framing for additions, conversions, and remodels in Carroll County.</p>
            <ul><li>Load-bearing wall work</li><li>Room additions</li><li>Code-compliant rough-ins</li></ul>
            <a href="/services/framing-contractor/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['gallery02']; ?>" alt="Flooring services LVP and tile Bowdon Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Flooring Services</h3>
            <p class="service-card__desc">LVP, tile, and hardwood flooring installed right the first time.</p>
            <ul><li>LVP over concrete slab</li><li>Custom tile</li><li>Subfloor preparation</li></ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['gallery01']; ?>" alt="Full home remodeling services Carroll County West Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hammer"></i></div>
            <h3>Remodeling Services</h3>
            <p class="service-card__desc">Kitchen, bathroom, and full-home remodeling throughout Carroll County.</p>
            <ul><li>Kitchen remodels</li><li>Bathroom renovations</li><li>Basement finishing</li></ul>
            <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="closing-cta-section" aria-label="Closing call to action">
    <div class="container" data-animate="fade-up">
      <span class="eyebrow-label">Ready to Convert?</span>
      <h2>Turn Your Unused Garage Into Space You'll Actually Use</h2>
      <p class="prose-centered">
        Free estimates in Bowdon and throughout Carroll County. We handle permits,
        inspections, and every trade involved — you make one phone call.
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
