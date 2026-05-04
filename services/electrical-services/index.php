<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Electrical Services Bowdon GA | Remodel Electrical Carroll County';
$pageDescription = 'Electrical rough-in, panel upgrades, recessed lighting, and circuit work for remodels in Bowdon, GA. Carroll County permits pulled. Integrated with your full remodel scope.';
$canonicalUrl    = $siteUrl . '/services/electrical-services/';
$ogImage         = $clientPhotos['photo02'];
$heroPreloadImage = $clientPhotos['photo02'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'electrical-services') { $currentService = $svc; break; }
}

$pageFaqs = [
    ['q' => 'Does Gray Tile handle electrical work during a remodel?',
     'a' => 'Yes. Electrical rough-in, panel upgrades, recessed lighting installation, and circuit work are handled as part of our full remodeling scope. We coordinate electrical with framing and plumbing rough-in so all three trades work in the same open-wall window — before insulation and drywall close everything up. This is how you avoid the most common remodel delay: waiting for one trade to finish before the next can start.'],
    ['q' => 'What electrical permits are required in Carroll County for a remodel?',
     'a' => 'Carroll County requires an electrical permit for any new circuit installation, panel upgrades, adding outlets or switches, recessed lighting installation that involves new circuits, and GFCI/AFCI updates to comply with current Georgia Energy Code. Simple fixture swaps (replacing a light fixture on an existing circuit) generally don\'t require a permit. We pull the required electrical permits before rough-in begins and schedule the rough-in inspection before closing walls.'],
    ['q' => 'How much does electrical rough-in cost in Georgia?',
     'a' => 'For a standard bathroom remodel in the Bowdon area, electrical rough-in (new circuits for GFCI outlets, exhaust fan, and lighting) runs $800–$2,200 depending on panel distance and circuit count. A kitchen remodel typically requires $1,800–$4,500 for electrical — dedicated circuits for refrigerator, dishwasher, microwave, and 20-amp countertop circuits are required by code. If a panel upgrade is needed to support new circuits, that adds $1,500–$3,500 for a 100-to-200 amp upgrade.'],
    ['q' => 'Can you upgrade the electrical panel during a remodel?',
     'a' => 'Yes, and for many Bowdon homes built before the 1990s, a panel upgrade is the right move during a larger remodel anyway. If you\'re adding a bathroom, finishing a basement, or creating an addition, the new circuit demand often makes an upgrade logical rather than optional. Carroll County requires a permit for panel upgrades and the utility (Georgia Power) must perform the final meter connection. We coordinate with Georgia Power so the timing doesn\'t hold up your project.'],
    ['q' => 'How is recessed lighting installed during a remodel?',
     'a' => 'During an open-ceiling remodel, recessed lighting installation is straightforward — can housings are mounted between joists before drywall, wired back to a switch and circuit. The cost depends on the number of cans, whether it\'s a new circuit or tapping an existing one, and whether dimmer control is included. A typical 8-can layout in a kitchen or living room runs $650–$1,400 installed during a remodel. Adding recessed lighting to a finished ceiling after the fact is significantly more expensive due to fishing wire through closed walls.'],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   ELECTRICAL-SERVICES/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   CSS prefix: .elc-
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.elc-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo02']; ?>');
  background-size: cover;
  background-position: center 40%;
  background-repeat: no-repeat;
}
.elc-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(152deg, rgba(var(--color-primary-dark-rgb), 0.95) 0%, rgba(var(--color-primary-rgb), 0.72) 55%, rgba(var(--color-accent-rgb), 0.06) 100%);
  z-index: 1;
}
.elc-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 2; pointer-events: none;
}
.elc-hero .hero-content { position: relative; z-index: 3; padding: var(--space-4xl) 0 var(--space-3xl); max-width: 720px; }
.elc-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.9) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  margin-bottom: var(--space-lg); text-wrap: balance;
}
.elc-hero .hero-subhead { color: rgba(255,255,255,0.88); font-size: clamp(1rem, 2vw, 1.2rem); max-width: 58ch; margin-bottom: var(--space-2xl); line-height: 1.65; }
.elc-hero .hero-cta-group { display: flex; gap: var(--space-md); flex-wrap: wrap; }

/* ── Breadcrumb ───────────────────────────────────────────────── */
.elc-bc-bar { background: var(--color-bg-alt); padding: var(--space-md) 0; border-bottom: 1px solid var(--color-gray-light); }
.elc-bc-nav { display: flex; align-items: center; gap: var(--space-sm); font-size: 0.875rem; color: var(--color-text-light); flex-wrap: wrap; }
.elc-bc-nav a { color: var(--color-accent); font-weight: 500; }
.elc-bc-nav a:hover { color: var(--color-primary); }
.elc-bc-sep { color: var(--color-gray); font-size: 0.75rem; }
.elc-bc-current { color: var(--color-text); font-weight: 600; }

/* ── Shared ───────────────────────────────────────────────────── */
.elc-eyebrow {
  display: inline-block; font-family: var(--font-heading); font-size: 0.78rem; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.12em; color: var(--color-accent);
  background: rgba(var(--color-accent-rgb), 0.1); padding: var(--space-xs) var(--space-md);
  border-radius: var(--radius-full); margin-bottom: var(--space-md);
}
.elc-accent { color: var(--color-accent); }
.elc-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.elc-divider svg { display: block; width: 100%; height: 55px; }

/* ── Intro split ──────────────────────────────────────────────── */
.elc-intro { padding: var(--space-3xl) 0 var(--space-2xl); background: var(--color-bg); }
.elc-intro-inner { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3xl); align-items: start; }
@media (max-width: 899px) { .elc-intro-inner { grid-template-columns: 1fr; } }
.elc-intro-copy h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.elc-intro-copy p { color: var(--color-text); font-size: 1rem; line-height: 1.7; max-width: 62ch; margin-bottom: var(--space-md); }
.elc-intro-copy .lead-para { font-size: 1.08rem; font-weight: 500; color: var(--color-primary); border-left: 3px solid var(--color-accent); padding-left: var(--space-md); }
.elc-last-updated { font-size: 0.8rem; color: var(--color-gray); margin-top: var(--space-md); }

/* ── Photo composition ────────────────────────────────────────── */
.elc-photo-comp { position: relative; padding-bottom: var(--space-xl); }
.elc-photo-frame { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); border: 4px solid var(--color-white); aspect-ratio: 4/3; }
.elc-photo-frame img { width: 100%; height: 100%; object-fit: cover; display: block; }
.elc-stat-badge { position: absolute; bottom: -4px; right: -12px; background: var(--color-accent); color: var(--color-white); border-radius: var(--radius-md); padding: var(--space-md) var(--space-lg); box-shadow: var(--shadow-lg); text-align: center; min-width: 155px; z-index: 2; }
.elc-stat-badge .stat-number { display: block; font-family: var(--font-heading); font-size: 1.15rem; font-weight: 800; line-height: 1.3; margin-bottom: var(--space-xs); }
.elc-stat-badge .stat-label { display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; opacity: 0.92; }
.elc-accent-strip { position: absolute; top: -8px; left: 20px; width: 56px; height: 4px; background: var(--color-accent); border-radius: var(--radius-full); }

/* ── Electrical scope grid (featured/signature section) ──────── */
.elc-scope-section {
  padding: var(--section-pad); background: var(--color-primary);
  position: relative; overflow: hidden;
}
@media (max-width: 767px) { .elc-scope-section { padding: var(--section-pad-mobile); } }
.elc-scope-section::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06; pointer-events: none;
}
.elc-scope-header { text-align: center; margin-bottom: var(--space-3xl); position: relative; z-index: 1; }
.elc-scope-header h2 { color: var(--color-white); text-wrap: balance; }
.elc-scope-header p { color: rgba(255,255,255,0.72); max-width: 58ch; margin: var(--space-md) auto 0; font-size: 1rem; line-height: 1.7; }
.elc-scope-grid {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg); position: relative; z-index: 1;
}
@media (max-width: 1023px) { .elc-scope-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .elc-scope-grid { grid-template-columns: 1fr; } }
.elc-scope-card {
  background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.12);
  border-radius: var(--radius-lg); padding: var(--space-xl) var(--space-lg);
  border-top: 3px solid var(--color-accent);
  transition: background var(--transition-base), transform var(--transition-base);
}
.elc-scope-card:hover { background: rgba(255,255,255,0.12); transform: translateY(-4px); }
.elc-scope-icon {
  width: 48px; height: 48px; background: rgba(var(--color-accent-rgb), 0.18);
  border-radius: var(--radius-md); display: flex; align-items: center;
  justify-content: center; color: var(--color-accent); margin-bottom: var(--space-lg);
}
.elc-scope-card h3 { color: var(--color-white); font-size: 1.1rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.elc-scope-card p { color: rgba(255,255,255,0.72); font-size: 0.9rem; line-height: 1.65; margin: 0; }
.elc-scope-cost { display: inline-block; margin-top: var(--space-sm); font-family: var(--font-heading); font-size: 0.82rem; font-weight: 700; color: var(--color-accent); }

/* ── Process steps ────────────────────────────────────────────── */
.elc-process { padding: var(--section-pad); background: var(--color-bg-alt); }
@media (max-width: 767px) { .elc-process { padding: var(--section-pad-mobile); } }
.elc-process-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl); margin-top: var(--space-2xl); }
@media (max-width: 1023px) { .elc-process-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .elc-process-grid { grid-template-columns: 1fr; } }
.elc-step { background: var(--color-bg); border-radius: var(--radius-lg); padding: var(--space-xl) var(--space-lg); border-top: 3px solid var(--color-accent); transition: transform var(--transition-base), box-shadow var(--transition-base); }
.elc-step:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.elc-step-num { font-family: var(--font-heading); font-size: 3rem; font-weight: 900; color: rgba(var(--color-accent-rgb), 0.16); line-height: 1; margin-bottom: var(--space-sm); display: block; }
.elc-step h4 { color: var(--color-primary); font-size: 1.05rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.elc-step p { color: var(--color-text-light); font-size: 0.9rem; line-height: 1.6; margin: 0; }

/* ── CTA banner ───────────────────────────────────────────────── */
.elc-cta-banner { padding: var(--space-4xl) var(--space-xl); background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); position: relative; overflow: hidden; text-align: center; }
.elc-cta-banner::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E"); opacity: 0.06; pointer-events: none; }
.elc-cta-banner .container { position: relative; z-index: 1; }
.elc-cta-banner h2 { color: var(--color-white); margin-bottom: var(--space-md); text-wrap: balance; }
.elc-cta-banner p { color: rgba(255,255,255,0.82); font-size: 1.05rem; max-width: 55ch; margin: 0 auto var(--space-2xl); }
.elc-cta-phone { display: block; font-family: var(--font-heading); font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 700; color: var(--color-accent); margin-bottom: var(--space-xl); letter-spacing: 0.02em; }
.elc-cta-phone:hover { color: var(--color-white); }
.elc-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.elc-faq { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .elc-faq { padding: var(--section-pad-mobile); } }
.elc-faq-list { max-width: 820px; margin: var(--space-2xl) auto 0; display: flex; flex-direction: column; gap: var(--space-md); }
.elc-faq-item { border: 1px solid var(--color-gray-light); border-radius: var(--radius-md); overflow: hidden; transition: box-shadow var(--transition-base); }
.elc-faq-item:hover { box-shadow: var(--shadow-md); }
.faq-question { width: 100%; background: var(--color-bg); border: none; text-align: left; padding: var(--space-lg) var(--space-xl); font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--color-primary); cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: var(--space-md); transition: background var(--transition-fast), color var(--transition-fast); }
.faq-question:hover { background: var(--color-bg-alt); color: var(--color-accent); }
.faq-question[aria-expanded="true"] { background: var(--color-primary); color: var(--color-white); }
.faq-icon { flex-shrink: 0; width: 20px; height: 20px; border-radius: 50%; border: 2px solid currentColor; display: flex; align-items: center; justify-content: center; transition: transform var(--transition-base); font-size: 1rem; line-height: 1; }
.faq-question[aria-expanded="true"] .faq-icon { transform: rotate(45deg); }
.faq-answer { display: none; padding: 0 var(--space-xl) var(--space-lg); background: var(--color-bg); color: var(--color-text); font-size: 0.97rem; line-height: 1.7; border-top: 1px solid var(--color-gray-light); }
.faq-answer.is-open { display: block; }

/* ── Closing CTA ──────────────────────────────────────────────── */
.elc-closing { padding: var(--section-pad); background: var(--color-bg-alt); text-align: center; }
@media (max-width: 767px) { .elc-closing { padding: var(--section-pad-mobile); } }
.elc-closing h2 { color: var(--color-primary); margin-bottom: var(--space-md); text-wrap: balance; }
.elc-closing p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto var(--space-2xl); }

/* ── Mobile ───────────────────────────────────────────────────── */
@media (max-width: 767px) {
  .elc-hero { min-height: 70vh; }
  .elc-hero .hero-content { padding: var(--space-3xl) 0 var(--space-2xl); }
  .elc-stat-badge { right: 0; min-width: 130px; }
  .elc-photo-comp { padding-bottom: var(--space-lg); }
}

/* ── Code-required highlight strip ───────────────────────────── */
.elc-code-note {
  display: inline-block; background: rgba(var(--color-accent-rgb), 0.08);
  border: 1px solid rgba(var(--color-accent-rgb), 0.25); border-radius: var(--radius-md);
  padding: var(--space-sm) var(--space-md); margin-top: var(--space-lg);
  font-size: 0.88rem; color: var(--color-text-light); line-height: 1.55;
}
.elc-code-note strong { color: var(--color-primary); }
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="elc-hero" aria-label="Electrical Services hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">Electrical Services for Remodels in Bowdon, GA</h1>
      <p class="hero-subhead" data-animate="fade-up">
        Circuit rough-in, panel upgrades, recessed lighting, and GFCI/AFCI compliance —
        handled as part of your remodel so there's no separate electrical contractor to
        coordinate. Gray Tile pulls the permit and schedules every required inspection.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get an Electrical Estimate</a>
        <a href="#elc-scope" class="btn btn-outline-white btn-lg">See Electrical Scope</a>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="elc-bc-bar" aria-label="Breadcrumb">
    <div class="container">
      <nav class="elc-bc-nav" aria-label="You are here">
        <a href="/">Home</a>
        <span class="elc-bc-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="elc-bc-sep" aria-hidden="true">›</span>
        <span class="elc-bc-current" aria-current="page">Electrical Services</span>
      </nav>
    </div>
  </div>

  <!-- ══ INTRO SPLIT ═══════════════════════════════════════════ -->
  <section class="elc-intro" aria-labelledby="elc-intro-heading">
    <div class="container">
      <div class="elc-intro-inner">

        <div class="elc-intro-copy" data-animate="fade-up">
          <span class="elc-eyebrow">Remodel Electrical, Bowdon GA</span>
          <h2 id="elc-intro-heading">Electrical Rough-In Sequenced with Your Framing — Not After</h2>
          <p class="lead-para prose">
            Bathroom electrical rough-in in Carroll County runs $800–$2,200. Kitchen electrical — dedicated circuits for appliances plus countertop outlets — runs $1,800–$4,500. Panel upgrades add $1,500–$3,500. Every item is scoped before demo begins.
          </p>
          <p class="prose">
            The typical remodel electrical delay happens when a separate electrician can't schedule rough-in until after the framer finishes. Gray Tile frames and rough-ins electrical in the same open-wall window because we manage both. When the framing inspection passes, electrical rough-in starts the same week — not three weeks later.
          </p>
          <p class="prose">
            Georgia's residential code (based on the 2020 NEC with Georgia amendments) requires AFCI protection on most living area circuits and GFCI protection on all kitchen, bathroom, garage, and outdoor circuits. Older Carroll County homes frequently lack both. When we open walls for a remodel, we bring the affected circuits up to current code — that work is always included in our electrical scope, never presented as an add-on.
          </p>
          <p class="prose">
            For kitchen remodels, the code requirements are specific: dedicated 20-amp circuits for refrigerator and dishwasher, two dedicated 20-amp circuits for countertop receptacles, and a dedicated circuit for the microwave. If your existing panel doesn't have headroom, that's an upgrade conversation we have upfront — not mid-project.
          </p>
          <div class="elc-code-note">
            <strong>Georgia NEC Note:</strong> Carroll County enforces the 2020 NEC with Georgia-specific amendments. AFCI required on bedroom, living area, and kitchen circuits. GFCI required on all bathroom, kitchen, garage, crawlspace, and outdoor circuits.
          </div>
          <p class="elc-last-updated">Last updated: April 2026</p>
        </div>

        <div class="elc-photo-comp" data-animate="fade-up">
          <div class="elc-accent-strip"></div>
          <div class="elc-photo-frame">
            <img
              src="<?php echo $clientPhotos['photo02']; ?>"
              alt="Electrical rough-in work during kitchen remodel in Bowdon Georgia showing new circuits and wiring"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="elc-stat-badge">
            <span class="stat-number">Panel-to-Outlet<br>Service</span>
            <span class="stat-label">Full Electrical Scope in Carroll Co.</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="elc-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ ELECTRICAL SCOPE (FEATURED / SIGNATURE SECTION) ═══════ -->
  <section class="elc-scope-section" id="elc-scope" aria-labelledby="elc-scope-heading">
    <div class="container">
      <div class="elc-scope-header" data-animate="fade-up">
        <span class="elc-eyebrow" style="background:rgba(var(--color-accent-rgb),0.2);color:var(--color-accent);">Electrical Scope</span>
        <h2 id="elc-scope-heading">What We Handle Electrically<br><span class="elc-accent">During Your Remodel</span></h2>
        <p>From circuit rough-in to panel upgrades — here's the electrical work we include as part of remodeling scope in Bowdon and Carroll County.</p>
      </div>
      <div class="elc-scope-grid">
        <div class="elc-scope-card" data-animate="fade-up">
          <div class="elc-scope-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
          </div>
          <h3>Circuit Rough-In</h3>
          <p>New circuits for kitchens, bathrooms, and additions — wired to the panel before walls close. We run dedicated circuits for appliances, countertop outlets, and AFCI/GFCI-protected areas per 2020 NEC/Georgia code requirements.</p>
          <span class="elc-scope-cost">$800–$4,500 depending on circuit count and panel distance</span>
        </div>
        <div class="elc-scope-card" data-animate="fade-up">
          <div class="elc-scope-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
          </div>
          <h3>Panel Upgrades</h3>
          <p>100-to-200 amp panel upgrades for homes that need more circuit capacity to support a remodel or addition. We coordinate with Georgia Power for the service upgrade and final meter reconnection so the utility timeline doesn't delay your project.</p>
          <span class="elc-scope-cost">$1,500–$3,500 for 100→200 amp upgrade with permit</span>
        </div>
        <div class="elc-scope-card" data-animate="fade-up">
          <div class="elc-scope-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
          </div>
          <h3>Recessed Lighting</h3>
          <p>Can housing and trim installation during open-ceiling remodels — kitchens, living rooms, hallways. Dimmer-compatible circuits and LED driver compatibility specified at rough-in. Far less expensive during a remodel than as a standalone project.</p>
          <span class="elc-scope-cost">$650–$1,400 for 6–10 cans during open-ceiling work</span>
        </div>
        <div class="elc-scope-card" data-animate="fade-up">
          <div class="elc-scope-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
          </div>
          <h3>GFCI &amp; AFCI Compliance</h3>
          <p>Code-required protection on all circuits opened during the remodel — bathroom, kitchen, and garage GFCI; bedroom and living area AFCI. Carroll County inspectors check these at rough-in inspection. We bring affected circuits to current code as part of our standard scope.</p>
          <span class="elc-scope-cost">Included in standard electrical scope — not an add-on</span>
        </div>
        <div class="elc-scope-card" data-animate="fade-up">
          <div class="elc-scope-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
          </div>
          <h3>Carroll County Permit &amp; Inspection</h3>
          <p>We apply for the electrical permit before rough-in begins and schedule the required rough-in inspection before walls are insulated and closed. The final inspection is scheduled at project completion. No inspection is skipped or deferred.</p>
          <span class="elc-scope-cost">Permit fee included in project scope</span>
        </div>
        <div class="elc-scope-card" data-animate="fade-up">
          <div class="elc-scope-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          </div>
          <h3>EV Outlet Installation</h3>
          <p>240V NEMA 14-50 or dedicated EVSE circuit installation during a garage remodel or addition — while the walls are open. The incremental cost during an open-wall project is typically $400–$900, far less than a standalone EV charger installation later.</p>
          <span class="elc-scope-cost">$400–$900 as add-on during garage or addition work</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="elc-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,55 1200,0 1200,55" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ PROCESS STEPS ══════════════════════════════════════════ -->
  <section class="elc-process" aria-labelledby="elc-process-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="elc-eyebrow">How It Works</span>
        <h2 id="elc-process-heading" style="text-wrap:balance;">Electrical Phase<br><span class="elc-accent">Within Your Remodel</span></h2>
      </div>
      <div class="elc-process-grid">
        <div class="elc-step" data-animate="fade-up">
          <span class="elc-step-num">01</span>
          <h4>Panel &amp; Load Assessment</h4>
          <p>We evaluate your existing panel capacity, identify circuits that will be affected by the remodel, and determine whether a panel upgrade is needed before adding new circuits. This conversation happens at estimate — not mid-project.</p>
        </div>
        <div class="elc-step" data-animate="fade-up">
          <span class="elc-step-num">02</span>
          <h4>Carroll County Electrical Permit</h4>
          <p>We apply for the electrical permit before demo. Carroll County electrical permits typically process in 5–10 business days. We have the permit in hand before any walls open, so there's no gap between demo and rough-in start.</p>
        </div>
        <div class="elc-step" data-animate="fade-up">
          <span class="elc-step-num">03</span>
          <h4>Rough-In After Framing Inspection</h4>
          <p>Electrical rough-in follows framing inspection — new circuits, outlet and switch rough-in locations, can housing for recessed lighting, and exhaust fan wiring all happen before walls are insulated. Carroll County rough-in inspection is scheduled and passed before walls close.</p>
        </div>
        <div class="elc-step" data-animate="fade-up">
          <span class="elc-step-num">04</span>
          <h4>Trim-Out &amp; Final Inspection</h4>
          <p>Outlet covers, switch plates, fixture installation, and panel connections are completed at the end of finish work. Carroll County final electrical inspection is scheduled and passed. You receive a completed project with all permits closed out.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="elc-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,28 C400,55 800,5 1200,28 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ═══════════════════════════════════════════ -->
  <section class="elc-cta-banner" aria-label="Electrical services CTA">
    <div class="container">
      <h2 data-animate="fade-up">Get Your Electrical Scope Assessed Before Demo Day</h2>
      <p class="prose-centered" data-animate="fade-up">
        Electrical surprises discovered mid-remodel cost 3× what they cost planned upfront. We assess your panel, circuit count, and code compliance before demo — and build the electrical scope into your project estimate from day one.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="elc-cta-phone" data-animate="fade-up"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
      <?php endif; ?>
      <div class="elc-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get Your Electrical Estimate</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="elc-faq" aria-labelledby="elc-faq-heading">
    <div class="container">
      <div style="text-align:center;" data-animate="fade-up">
        <span class="elc-eyebrow">Common Questions</span>
        <h2 id="elc-faq-heading" style="text-wrap:balance;">Electrical FAQ — <span class="elc-accent">Remodels in Carroll County</span></h2>
      </div>
      <div class="elc-faq-list" role="list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="elc-faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="elc-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="elc-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="elc-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ═══════════════════════════════════════ -->
  <section class="section" style="padding:var(--section-pad);background:var(--color-bg-alt);" aria-label="Other services you may need">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-3xl);" data-animate="fade-up">
        <span class="elc-eyebrow">Also From Gray Tile</span>
        <h2 style="text-wrap:balance;">Other Services <span class="elc-accent">You May Need</span></h2>
      </div>
      <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo04']; ?>" alt="Kitchen remodeling Bowdon Georgia electrical circuits lighting" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="utensils"></i></div>
            <h3>Kitchen Remodeling</h3>
            <p class="service-card__desc">Complete kitchen renovations with all required electrical circuits, recessed lighting, and panel assessment included.</p>
            <ul>
              <li>Dedicated appliance circuits</li>
              <li>Recessed lighting layout</li>
              <li>20-amp countertop circuits</li>
            </ul>
            <a href="/services/kitchen-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo05']; ?>" alt="Bathroom remodeling electrical GFCI Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="bath"></i></div>
            <h3>Bathroom Remodeling</h3>
            <p class="service-card__desc">Bathroom remodels with GFCI-compliant circuits, exhaust fan wiring, and lighting rough-in handled in-house.</p>
            <ul>
              <li>GFCI outlet installation</li>
              <li>Exhaust fan circuit included</li>
              <li>Vanity lighting rough-in</li>
            </ul>
            <a href="/services/bathroom-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo08']; ?>" alt="Seasonal services electrical maintenance Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="wrench"></i></div>
            <h3>Seasonal Services</h3>
            <p class="service-card__desc">Scheduled electrical inspection, outlet and circuit maintenance, and minor electrical repairs throughout Carroll County.</p>
            <ul>
              <li>Circuit safety inspection</li>
              <li>GFCI/AFCI testing</li>
              <li>Minor repair &amp; upgrade</li>
            </ul>
            <a href="/services/seasonal-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="elc-closing" aria-label="Closing call to action">
    <div class="container" data-animate="fade-up">
      <span class="elc-eyebrow">Electrical Done Right from Rough-In</span>
      <h2>No Separate Electrician — Electrical Scoped into Your Remodel from Day One</h2>
      <p class="prose-centered">
        Free estimates throughout Bowdon and Carroll County. Panel assessment, circuit planning, permit management, and rough-in inspection — all handled as part of your remodel.
      </p>
      <div class="elc-btn-group">
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
