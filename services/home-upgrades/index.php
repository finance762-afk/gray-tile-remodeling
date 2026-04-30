<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Home Upgrades in Bowdon GA | Kitchen, Bath & Tile Updates';
$pageDescription = 'Upgrade your Bowdon, GA home without a full remodel — tile backsplashes, countertops, flooring, and fixture updates from Gray Tile & Remodeling, serving all of Carroll County.';
$canonicalUrl    = $siteUrl . '/services/home-upgrades/';
$ogImage         = $clientPhotos['photo05'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'home-upgrades') { $currentService = $svc; break; }
}

$pageFaqs = [
    ['q' => 'What\'s the most impactful home upgrade for resale value in Bowdon?',
     'a' => 'Kitchen tile backsplashes and bathroom floor tile replacement consistently show the highest return-on-investment for targeted upgrades in the Bowdon market. A well-executed tile backsplash costs $800–$2,500 installed and makes a kitchen look significantly newer without touching cabinets or appliances. Bathroom floor tile replacement ($1,500–$4,000 depending on size) is frequently cited by real estate agents in Carroll County as one of the first things buyers notice.'],
    ['q' => 'How long do typical tile upgrades take?',
     'a' => 'Most tile upgrades are completed in 3–7 days including surface preparation, installation, grout, and sealing. A kitchen backsplash typically takes 1–2 days. A bathroom floor replacement runs 2–4 days. Shower tile replacement is 3–5 days. We give you a specific timeline with every estimate so you can plan around the work.'],
    ['q' => 'Can you upgrade just one room without disrupting the whole house?',
     'a' => 'Yes. That\'s exactly what targeted upgrades are designed for. We work in one room at a time, protect surrounding areas, and minimize household disruption. For bathroom tile work, we typically schedule 3–5 days during which the bathroom is out of service — we coordinate the timing to work around your household\'s schedule.'],
    ['q' => 'What tile styles are trending in Georgia homes right now?',
     'a' => 'In 2025–2026, Georgia homeowners are choosing large-format porcelain tile (24"x24" and larger) for bathroom floors, warm-toned wood-look ceramic for kitchen floors, and textured zellige or handmade-look ceramic for kitchen backsplashes. Subway tile remains popular but in less predictable patterns — herringbone and stacked horizontal. Natural stone-look porcelain (especially travertine and marble looks) is strong in bathrooms. We help you choose tile that will look current for 10+ years, not just this season.'],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

// SEO: head.php outputs <link rel="canonical"> and application/ld+json schema for this page.
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   HOME-UPGRADES/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.hu-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo05']; ?>');
  background-size: cover;
  background-position: center 50%;
  background-repeat: no-repeat;
}
.hu-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(130deg, rgba(var(--color-primary-rgb), 0.88) 0%, rgba(var(--color-primary-dark-rgb), 0.65) 50%, rgba(var(--color-accent-rgb), 0.1) 100%);
  z-index: 1;
}
.hu-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 2; pointer-events: none;
}
.hu-hero .hero-content { position: relative; z-index: 3; padding: var(--space-4xl) 0 var(--space-3xl); max-width: 700px; }
.hu-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.88) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  margin-bottom: var(--space-lg); text-wrap: balance;
}
.hu-hero .hero-subhead { color: rgba(255,255,255,0.88); font-size: clamp(1rem, 2vw, 1.2rem); max-width: 58ch; margin-bottom: var(--space-2xl); line-height: 1.65; }
.hu-hero .hero-cta-group { display: flex; gap: var(--space-md); flex-wrap: wrap; }

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
.hu-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.hu-divider svg { display: block; width: 100%; height: 55px; }

/* ── Intro split ──────────────────────────────────────────────── */
.hu-intro-section { padding: var(--space-3xl) 0 var(--space-2xl); background: var(--color-bg); }
.hu-intro-inner { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3xl); align-items: start; }
@media (max-width: 899px) { .hu-intro-inner { grid-template-columns: 1fr; } }
.hu-intro-copy h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.hu-intro-copy p { color: var(--color-text); font-size: 1rem; line-height: 1.7; max-width: 62ch; }
.hu-intro-copy p.lead-para { font-size: 1.08rem; font-weight: 500; color: var(--color-primary); border-left: 3px solid var(--color-accent); padding-left: var(--space-md); margin-bottom: var(--space-lg); }
.last-updated { font-size: 0.8rem; color: var(--color-gray); margin-top: var(--space-md); }

/* ── Photo composition ────────────────────────────────────────── */
.photo-composition { position: relative; }
.photo-frame { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); border: 4px solid var(--color-white); aspect-ratio: 4/3; }
.photo-frame img { width: 100%; height: 100%; object-fit: cover; display: block; }
.photo-stat-badge { position: absolute; bottom: -20px; right: -16px; background: var(--color-accent); color: var(--color-white); border-radius: var(--radius-md); padding: var(--space-md) var(--space-lg); box-shadow: var(--shadow-lg); text-align: center; min-width: 130px; z-index: 2; }
.photo-stat-badge .stat-number { display: block; font-family: var(--font-heading); font-size: 2rem; font-weight: 800; line-height: 1; margin-bottom: var(--space-xs); }
.photo-stat-badge .stat-label { display: block; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; opacity: 0.9; }
.photo-accent-strip { position: absolute; top: -8px; left: 20px; width: 60px; height: 4px; background: var(--color-accent); border-radius: var(--radius-full); }

/* ── Upgrade types grid (signature section) ───────────────────── */
.upgrade-types-section {
  padding: var(--section-pad); background: var(--color-bg-alt);
}
@media (max-width: 767px) { .upgrade-types-section { padding: var(--section-pad-mobile); } }
.upgrade-types-grid {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: var(--space-xl); margin-top: var(--space-2xl);
}
@media (max-width: 1023px) { .upgrade-types-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .upgrade-types-grid { grid-template-columns: 1fr; } }
.upgrade-type-card {
  background: var(--color-bg); border-radius: var(--radius-lg); overflow: hidden;
  box-shadow: var(--shadow-card);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.upgrade-type-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }
.upgrade-card-header {
  background: var(--color-primary); padding: var(--space-lg);
  display: flex; align-items: center; gap: var(--space-md);
}
.upgrade-card-header svg { color: var(--color-accent); flex-shrink: 0; }
.upgrade-card-header h3 { color: var(--color-white); font-size: 1.15rem; margin: 0; text-wrap: balance; }
.upgrade-card-body { padding: var(--space-lg); }
.upgrade-card-body p { color: var(--color-text); font-size: 0.93rem; line-height: 1.6; margin-bottom: var(--space-sm); }
.upgrade-cost {
  display: inline-block; background: rgba(var(--color-accent-rgb), 0.1);
  color: var(--color-accent); font-family: var(--font-heading); font-weight: 700;
  font-size: 0.85rem; padding: var(--space-xs) var(--space-sm); border-radius: var(--radius-sm);
  margin-top: var(--space-xs);
}
.upgrade-timeframe {
  display: inline-block; background: rgba(var(--color-primary-rgb), 0.08);
  color: var(--color-primary); font-family: var(--font-heading); font-weight: 600;
  font-size: 0.8rem; padding: var(--space-xs) var(--space-sm); border-radius: var(--radius-sm);
  margin-top: var(--space-xs); margin-left: var(--space-xs);
}

/* ── Why Choose Section ───────────────────────────────────────── */
.why-section { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .why-section { padding: var(--section-pad-mobile); } }
.why-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--space-lg); margin-top: var(--space-2xl); }
@media (max-width: 767px) { .why-grid { grid-template-columns: 1fr; } }
.why-card { background: var(--color-bg-alt); border-radius: var(--radius-md); padding: var(--space-xl); display: flex; gap: var(--space-lg); align-items: flex-start; transition: transform var(--transition-base), box-shadow var(--transition-base); }
.why-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.why-card-icon { flex-shrink: 0; width: 48px; height: 48px; background: rgba(var(--color-accent-rgb), 0.1); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; color: var(--color-accent); }
.why-card h4 { font-family: var(--font-heading); font-size: 1.1rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-sm); text-wrap: balance; }
.why-card p { color: var(--color-text-light); font-size: 0.93rem; line-height: 1.6; margin: 0; }

/* ── Process Steps ────────────────────────────────────────────── */
.process-section { padding: var(--section-pad); background: var(--color-primary); position: relative; overflow: hidden; }
@media (max-width: 767px) { .process-section { padding: var(--section-pad-mobile); } }
.process-section::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E"); opacity: 0.06; pointer-events: none; }
.process-section .eyebrow-label { background: rgba(var(--color-accent-rgb), 0.2); color: var(--color-accent); }
.process-section h2 { color: var(--color-white); text-wrap: balance; }
.process-steps { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl); margin-top: var(--space-2xl); position: relative; z-index: 1; }
@media (max-width: 1023px) { .process-steps { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .process-steps { grid-template-columns: 1fr; } }
.process-step { padding: var(--space-xl) var(--space-lg); background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-radius: var(--radius-lg); transition: background var(--transition-base), transform var(--transition-base); }
.process-step:hover { background: rgba(255,255,255,0.1); transform: translateY(-4px); }
.process-number { font-family: var(--font-heading); font-size: 3.5rem; font-weight: 900; color: rgba(var(--color-accent-rgb), 0.22); line-height: 1; margin-bottom: var(--space-sm); display: block; }
.process-step h4 { color: var(--color-white); font-size: 1.1rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.process-step p { color: rgba(255,255,255,0.72); font-size: 0.9rem; line-height: 1.6; margin: 0; }

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
.faq-section { padding: var(--section-pad); background: var(--color-bg); }
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
.closing-cta-section { padding: var(--section-pad); background: var(--color-bg-alt); text-align: center; }
@media (max-width: 767px) { .closing-cta-section { padding: var(--section-pad-mobile); } }
.closing-cta-section h2 { color: var(--color-primary); margin-bottom: var(--space-md); text-wrap: balance; }
.closing-cta-section p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto var(--space-2xl); }

/* ── Trust strip below hero ───────────────────────────────────── */
.trust-strip {
  background: var(--color-primary);
  padding: var(--space-md) 0;
  overflow: hidden;
}
.trust-strip-inner {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: var(--space-2xl);
  flex-wrap: wrap;
}
.trust-strip-item {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  color: rgba(255,255,255,0.85);
  font-family: var(--font-heading);
  font-size: 0.82rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  white-space: nowrap;
}
.trust-strip-item svg {
  color: var(--color-accent);
  flex-shrink: 0;
}
.trust-strip-sep {
  color: rgba(255,255,255,0.2);
  font-size: 1.2rem;
  line-height: 1;
}
@media (max-width: 599px) {
  .trust-strip-sep { display: none; }
  .trust-strip-inner { gap: var(--space-md); }
}

/* ── Upgrade card hover state enhancement ────────────────────── */
.upgrade-type-card .upgrade-card-header {
  transition: background var(--transition-base);
}
.upgrade-type-card:hover .upgrade-card-header {
  background: var(--color-accent);
}
.upgrade-type-card:hover .upgrade-card-header h3 {
  color: var(--color-white);
}
.upgrade-type-card:hover .upgrade-card-header svg {
  color: var(--color-white);
}

/* ── Scroll reveal keyframes ──────────────────────────────────── */
@keyframes hu-fadeup {
  from { opacity: 0; transform: translateY(24px); }
  to   { opacity: 1; transform: translateY(0); }
}
.hu-animated {
  animation: hu-fadeup 0.5s ease forwards;
}

/* ── Mobile responsive refinements ───────────────────────────── */
@media (max-width: 767px) {
  .hu-hero { min-height: 70vh; }
  .hu-hero .hero-content { padding: var(--space-3xl) 0 var(--space-2xl); }
  .photo-stat-badge { right: 0; bottom: -16px; min-width: 110px; }
  .photo-stat-badge .stat-number { font-size: 1.6rem; }
  .upgrade-types-section { padding: var(--section-pad-mobile); }
  .why-section { padding: var(--section-pad-mobile); }
}

/* ── Focus states for interactive elements ───────────────────── */
.upgrade-type-card:focus-within {
  outline: 2px solid var(--color-accent);
  outline-offset: 2px;
}
.trust-strip-item a:focus-visible {
  outline: 2px solid var(--color-accent);
  outline-offset: 2px;
  border-radius: var(--radius-sm);
}
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="hu-hero" aria-label="Home Upgrades hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">Home Upgrades in Bowdon, GA — Done in Days, Not Weeks</h1>
      <p class="hero-subhead" data-animate="fade-up">
        Not every improvement requires a full remodel. Tile backsplashes, bathroom floor replacement,
        LVP upgrades, and countertop swaps transform a room in 3–7 days — and Gray Tile does
        them right the first time so you're not living with grout issues two years later.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get an Upgrade Estimate</a>
        <a href="#upgrade-types" class="btn btn-outline-white btn-lg">See What We Upgrade</a>
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
        <span class="breadcrumb-current" aria-current="page">Home Upgrades</span>
      </nav>
    </div>
  </div>

  <!-- ══ ANSWER-FIRST OPENING ══════════════════════════════════ -->
  <section class="hu-intro-section" aria-labelledby="hu-intro-heading">
    <div class="container">
      <div class="hu-intro-inner">

        <div class="hu-intro-copy" data-animate="fade-up">
          <span class="eyebrow-label">Home Upgrades Bowdon, GA</span>
          <h2 id="hu-intro-heading">Targeted Updates That Actually Move the Needle</h2>
          <p class="lead-para prose">
            A tile backsplash in Bowdon costs $800–$2,500 installed. A bathroom floor replacement runs $1,500–$4,000. These are not trivial improvements — in Carroll County's resale market, they're often the difference between a home that sells quickly and one that sits.
          </p>
          <p class="prose">
            Most Bowdon homeowners don't need a full kitchen or bathroom remodel — they need one thing done well. The original tile backsplash from 1994 that's dated the kitchen for years. The cracked bathroom floor tile that gets noticed every morning. The laminate countertop that doesn't belong in an otherwise nice kitchen. Gray Tile does targeted upgrades that address exactly what's bothering you — without requiring you to gut the room or live in construction for a month.
          </p>
          <p class="prose">
            Targeted upgrades work because we have one specialty: tile and flooring. We're not a general contractor who does tile work on the side. Every upgrade we complete reflects 25 years of doing this specific type of work in West Georgia — from layout planning that avoids awkward cuts to grout selection that won't show every footprint in six months.
          </p>
          <p class="prose">
            For homeowners in Bowdon and Carroll County who are thinking about selling in the next 2–5 years, targeted tile and flooring upgrades consistently deliver the highest return per dollar spent — far above kitchen cabinet painting, landscaping, or appliance replacement.
          </p>
          <p class="last-updated">Last updated: April 2026</p>
        </div>

        <div class="photo-composition" data-animate="fade-up">
          <div class="photo-accent-strip"></div>
          <div class="photo-frame">
            <img
              src="<?php echo $clientPhotos['photo06']; ?>"
              alt="New tile backsplash installed in Bowdon GA kitchen showing handmade ceramic tile pattern"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="photo-stat-badge">
            <span class="stat-number">3–7</span>
            <span class="stat-label">Days to Complete</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="hu-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ UPGRADE TYPES (SIGNATURE SECTION) ════════════════════ -->
  <section class="upgrade-types-section" id="upgrade-types" aria-labelledby="upgrade-types-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="eyebrow-label">What We Upgrade</span>
        <h2 id="upgrade-types-heading" style="text-wrap:balance;">Six Upgrades That <span class="text-accent">Transform a Room</span></h2>
        <p style="color:var(--color-text-light);max-width:55ch;margin:0 auto;" class="prose-centered">With typical cost ranges and timelines so you can plan before you call.</p>
      </div>
      <div class="upgrade-types-grid">

        <div class="upgrade-type-card" data-animate="fade-up">
          <div class="upgrade-card-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            <h3>Kitchen Tile Backsplash</h3>
          </div>
          <div class="upgrade-card-body">
            <p>New backsplash tile removes years of visual age from a kitchen. We remove the old backsplash, prep the wall surface, and install your chosen tile from subway to zellige to large-format porcelain.</p>
            <span class="upgrade-cost">$800–$2,500 installed</span>
            <span class="upgrade-timeframe">1–2 days</span>
          </div>
        </div>

        <div class="upgrade-type-card" data-animate="fade-up">
          <div class="upgrade-card-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            <h3>Bathroom Floor Tile</h3>
          </div>
          <div class="upgrade-card-body">
            <p>Replace cracked, dated, or worn bathroom tile with new large-format porcelain, natural stone-look tile, or classic hex patterns. We handle tile removal, subfloor assessment, and full installation.</p>
            <span class="upgrade-cost">$1,500–$4,000 installed</span>
            <span class="upgrade-timeframe">2–4 days</span>
          </div>
        </div>

        <div class="upgrade-type-card" data-animate="fade-up">
          <div class="upgrade-card-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" y1="22" x2="4" y2="15"/></svg>
            <h3>Shower Tile Replacement</h3>
          </div>
          <div class="upgrade-card-body">
            <p>Shower tile that's cracking, failing at the grout lines, or just looking worn gets removed and replaced. We include proper waterproofing — a step many contractors skip — so the installation actually lasts.</p>
            <span class="upgrade-cost">$2,000–$8,000 installed</span>
            <span class="upgrade-timeframe">3–5 days</span>
          </div>
        </div>

        <div class="upgrade-type-card" data-animate="fade-up">
          <div class="upgrade-card-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            <h3>LVP Flooring Upgrade</h3>
          </div>
          <div class="upgrade-card-body">
            <p>Replace carpet, vinyl, or old hardwood in one or more rooms with luxury vinyl plank. LVP is durable, water-resistant, and installs over most existing subfloors without extensive prep.</p>
            <span class="upgrade-cost">$3–$8 per sq ft installed</span>
            <span class="upgrade-timeframe">1–3 days per room</span>
          </div>
        </div>

        <div class="upgrade-type-card" data-animate="fade-up">
          <div class="upgrade-card-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 19H5c-1 0-2-.9-2-2V7c0-1.1.9-2 2-2h3"/><path d="M16 5h3c1 0 2 .9 2 2v10c0 1.1-.9 2-2 2h-3"/><line x1="12" y1="3" x2="12" y2="21"/></svg>
            <h3>Countertop Replacement</h3>
          </div>
          <div class="upgrade-card-body">
            <p>We remove existing laminate or tile countertops and install new material of your choice. We work with tile countertops and coordinate on natural stone and quartz installation with our fabrication partners.</p>
            <span class="upgrade-cost">$1,200–$6,000 installed</span>
            <span class="upgrade-timeframe">2–3 days</span>
          </div>
        </div>

        <div class="upgrade-type-card" data-animate="fade-up">
          <div class="upgrade-card-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            <h3>Grout Replacement &amp; Resealing</h3>
          </div>
          <div class="upgrade-card-body">
            <p>Existing tile that's in good shape but has failing, stained, or cracked grout gets a new life with regrout. We remove failing grout, apply new grout in your choice of color, and seal for long-term protection.</p>
            <span class="upgrade-cost">$300–$1,200 per area</span>
            <span class="upgrade-timeframe">1 day</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="hu-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,35 C400,55 800,10 1200,35 L1200,55 L0,55 Z" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ WHY CHOOSE ════════════════════════════════════════════ -->
  <section class="why-section" aria-labelledby="why-hu-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="eyebrow-label">Why Gray Tile</span>
        <h2 id="why-hu-heading" style="text-wrap:balance;">Four Reasons Bowdon Homeowners<br><span class="text-accent">Choose Gray Tile for Upgrades</span></h2>
      </div>
      <div class="why-grid">
        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div>
            <h4>3–7 Day Completions on Most Upgrades</h4>
            <p>You get a specific completion date with your estimate — not "a few weeks." Most tile and flooring upgrades in Bowdon are done in under a week, with minimal disruption to your household.</p>
          </div>
        </div>
        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
          </div>
          <div>
            <h4>Tile Is Our Specialty — Not a Side Job</h4>
            <p>Gray Tile isn't a general contractor who occasionally lays tile. Tile installation is what we've done for 25 years. Layout, pattern planning, waterproofing, grout selection — these are not afterthoughts.</p>
          </div>
        </div>
        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
          </div>
          <div>
            <h4>Waterproofing Included on Wet Areas</h4>
            <p>Shower and wet-area tile installations include proper waterproofing membrane — not optional, not upcharged. A shower without proper waterproofing fails in 3–5 years. We don't build things that fail.</p>
          </div>
        </div>
        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          </div>
          <div>
            <h4>Real Costs, Not Low-Ball Estimates</h4>
            <p>Our estimates include removal of existing material, surface preparation, and the actual scope of work — not a tile-only number that doubles once we start. What we quote is what you pay.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="hu-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,28 C400,5 800,55 1200,28 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ PROCESS STEPS ══════════════════════════════════════════ -->
  <section class="process-section" aria-labelledby="hu-process-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);position:relative;z-index:1;" data-animate="fade-up">
        <span class="eyebrow-label">How It Works</span>
        <h2 id="hu-process-heading" style="text-wrap:balance;">From Estimate to<span style="color:var(--color-accent)"> Finished Room</span></h2>
      </div>
      <div class="process-steps">
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">01</span>
          <h4>Free Estimate</h4>
          <p>We visit your Bowdon home, measure the area, assess existing conditions, and give you a written estimate that covers removal, prep, materials, and installation — no hidden costs.</p>
        </div>
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">02</span>
          <h4>Tile Selection</h4>
          <p>We bring sample options based on your style preferences and budget, or you can visit a showroom with our guidance. We help you choose tile that will look current for 10+ years — not just this season.</p>
        </div>
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">03</span>
          <h4>Prep &amp; Installation</h4>
          <p>We protect your floors and cabinets, remove existing material, prep the substrate, and install tile on the agreed schedule. Most upgrades are completed in 1–5 days.</p>
        </div>
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">04</span>
          <h4>Grout, Seal &amp; Clean</h4>
          <p>Grout is applied, sealed, and the work area is left clean. We walk through the finished work with you before we leave. If anything isn't right, we address it before final payment.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="hu-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,55 1200,0 1200,55" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,55" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ═══════════════════════════════════════════ -->
  <section class="cta-banner-section" aria-label="Home upgrades CTA">
    <div class="container">
      <h2 data-animate="fade-up">Most Bowdon Homeowners See Results in Under a Week</h2>
      <p class="prose-centered" data-animate="fade-up">
        Get a written estimate for your tile backsplash, bathroom floor, or flooring upgrade.
        We come to your home, measure, and quote — no commitment required.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="cta-banner-phone" data-animate="fade-up"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
      <?php endif; ?>
      <div class="cta-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get Your Upgrade Estimate</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="faq-section" aria-labelledby="hu-faq-heading">
    <div class="container">
      <div style="text-align:center;" data-animate="fade-up">
        <span class="eyebrow-label">Common Questions</span>
        <h2 id="hu-faq-heading" style="text-wrap:balance;">Home Upgrade FAQ — <span class="text-accent">Bowdon, GA</span></h2>
      </div>
      <div class="faq-list" role="list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="hu-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="hu-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="hu-divider" aria-hidden="true">
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
            <img src="<?php echo $clientPhotos['gallery02']; ?>" alt="Flooring services Bowdon Georgia tile and LVP" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Flooring Services</h3>
            <p class="service-card__desc">Custom tile showers, LVP, hardwood refinishing, and subfloor repair.</p>
            <ul><li>Custom tile showers</li><li>LVP installation</li><li>Hardwood refinishing</li></ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['gallery01']; ?>" alt="Full kitchen and bathroom remodeling Carroll County" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hammer"></i></div>
            <h3>Remodeling Services</h3>
            <p class="service-card__desc">Full kitchen, bathroom, and whole-home remodeling in Carroll County.</p>
            <ul><li>Kitchen remodels</li><li>Bathroom renovations</li><li>Basement finishing</li></ul>
            <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo12']; ?>" alt="Design-build remodeling one team Bowdon Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="pencil-ruler"></i></div>
            <h3>Design-Build Remodeling</h3>
            <p class="service-card__desc">One team from design to installation — no gaps, no miscommunication.</p>
            <ul><li>Design through completion</li><li>Fixed-scope estimates</li><li>Faster timelines</li></ul>
            <a href="/services/design-build-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="closing-cta-section" aria-label="Closing call to action">
    <div class="container" data-animate="fade-up">
      <span class="eyebrow-label">Get Started This Week</span>
      <h2>Your Bowdon Home Upgrade Is Closer Than You Think</h2>
      <p class="prose-centered">
        Free estimates throughout Carroll County. We measure, quote, and give you a specific
        completion date — most upgrades are scheduled within 1–2 weeks of estimate approval.
      </p>
      <div class="cta-btn-group">
        <a href="/contact/" class="btn btn-primary btn-lg">Schedule Your Free Estimate</a>
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
