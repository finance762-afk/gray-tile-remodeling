<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Home Restoration Bowdon GA | Historic & Older Home Specialists';
$pageDescription = 'Restore your Bowdon, GA home to its original beauty with Gray Tile & Remodeling — specialists in older home renovation, water damage repair, and structural updates in West Georgia.';
$canonicalUrl    = $siteUrl . '/services/home-restoration/';
$ogImage         = $clientPhotos['photo14'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'home-restoration') { $currentService = $svc; break; }
}

$pageFaqs = [
    ['q' => 'What makes restoring older Bowdon homes different from standard remodeling?',
     'a' => 'Homes built before the 1970s in Carroll County often have plaster walls instead of drywall, original hardwood floors with unique milling profiles, older tile work in non-standard sizes, and foundations that have shifted over decades. Standard remodeling crews aren\'t equipped to match original materials or navigate these construction methods. Gray Tile has restored Carroll County homes from the 1920s through the 1970s and understands what each era requires.'],
    ['q' => 'Can you match original tile and flooring materials?',
     'a' => 'In most cases, yes. For historic tile, we source period-appropriate materials from specialty suppliers and can create custom blends to match original patterns. For hardwood, we sand and refinish existing floors to match restored sections, or source reclaimed lumber that matches the grain and species. We document existing materials before any demolition begins.'],
    ['q' => 'Do you handle mold and water damage as part of home restoration?',
     'a' => 'Yes. Georgia\'s humid climate — especially in the Bowdon area — makes water intrusion and mold common in older homes. We assess and remediate moisture damage before any restoration work begins. This includes addressing the source (failed waterproofing, deteriorated grout, roof damage, plumbing leaks) as well as treating affected materials. We do not cosmetically cover water damage.'],
    ['q' => 'Will home restoration work require permits in Carroll County?',
     'a' => 'It depends on scope. Cosmetic restoration (refinishing floors, replacing tile, repainting) generally does not require permits. Structural work, electrical updates, plumbing modifications, and HVAC changes require Carroll County building permits. Gray Tile handles permit applications for all work that requires them and coordinates required inspections.'],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

// SEO: head.php outputs <link rel="canonical"> and application/ld+json schema for this page.
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   HOME-RESTORATION/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.hr-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo14']; ?>');
  background-size: cover;
  background-position: center 30%;
  background-repeat: no-repeat;
}
.hr-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    150deg,
    rgba(var(--color-primary-dark-rgb), 0.94) 0%,
    rgba(var(--color-primary-rgb), 0.72) 50%,
    rgba(var(--color-accent-rgb), 0.1) 100%
  );
  z-index: 1;
}
.hr-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 2; pointer-events: none;
}
.hr-hero .hero-content {
  position: relative; z-index: 3;
  padding: var(--space-4xl) 0 var(--space-3xl);
  max-width: 680px;
}
.hr-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.88) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.hr-hero .hero-subhead {
  color: rgba(255,255,255,0.88);
  font-size: clamp(1rem, 2vw, 1.2rem);
  max-width: 58ch;
  margin-bottom: var(--space-2xl);
  line-height: 1.65;
}
.hr-hero .hero-cta-group { display: flex; gap: var(--space-md); flex-wrap: wrap; }

/* ── Breadcrumb ───────────────────────────────────────────────── */
.breadcrumb-bar {
  background: var(--color-bg-alt);
  padding: var(--space-md) 0;
  border-bottom: 1px solid var(--color-gray-light);
}
.breadcrumb-nav {
  display: flex; align-items: center; gap: var(--space-sm);
  font-size: 0.875rem; color: var(--color-text-light); flex-wrap: wrap;
}
.breadcrumb-nav a { color: var(--color-accent); font-weight: 500; }
.breadcrumb-nav a:hover { color: var(--color-primary); }
.breadcrumb-sep { color: var(--color-gray); font-size: 0.75rem; }
.breadcrumb-current { color: var(--color-text); font-weight: 600; }

/* ── Shared Labels & Dividers ─────────────────────────────────── */
.eyebrow-label {
  display: inline-block;
  font-family: var(--font-heading); font-size: 0.78rem; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.12em;
  color: var(--color-accent); background: rgba(var(--color-accent-rgb), 0.1);
  padding: var(--space-xs) var(--space-md); border-radius: var(--radius-full);
  margin-bottom: var(--space-md);
}
.text-accent { color: var(--color-accent); }
.skew-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.skew-divider svg { display: block; width: 100%; height: 55px; }

/* ── Answer-first split section ───────────────────────────────── */
.hr-intro-section {
  padding: var(--space-3xl) 0 var(--space-2xl);
  background: var(--color-bg);
}
.hr-intro-inner {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: start;
}
@media (max-width: 899px) { .hr-intro-inner { grid-template-columns: 1fr; } }
.hr-intro-copy h2 { font-size: clamp(1.6rem, 3.5vw, 2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.hr-intro-copy p { color: var(--color-text); font-size: 1rem; line-height: 1.7; max-width: 62ch; }
.hr-intro-copy p.lead-para {
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
.photo-stat-badge .stat-number {
  display: block; font-family: var(--font-heading);
  font-size: 2rem; font-weight: 800; line-height: 1; margin-bottom: var(--space-xs);
}
.photo-stat-badge .stat-label {
  display: block; font-size: 0.75rem; font-weight: 600;
  text-transform: uppercase; letter-spacing: 0.08em; opacity: 0.9;
}
.photo-accent-strip {
  position: absolute; top: -8px; left: 20px;
  width: 60px; height: 4px; background: var(--color-accent); border-radius: var(--radius-full);
}

/* ── Why Choose Section ───────────────────────────────────────── */
.why-section {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
@media (max-width: 767px) { .why-section { padding: var(--section-pad-mobile); } }
.why-grid {
  display: grid; grid-template-columns: repeat(2, 1fr);
  gap: var(--space-lg); margin-top: var(--space-2xl);
}
@media (max-width: 767px) { .why-grid { grid-template-columns: 1fr; } }
.why-card {
  background: var(--color-bg); border-radius: var(--radius-md); padding: var(--space-xl);
  display: flex; gap: var(--space-lg); align-items: flex-start; box-shadow: var(--shadow-card);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.why-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.why-card-icon {
  flex-shrink: 0; width: 48px; height: 48px;
  background: rgba(var(--color-accent-rgb), 0.1); border-radius: var(--radius-md);
  display: flex; align-items: center; justify-content: center; color: var(--color-accent);
}
.why-card h4 { font-family: var(--font-heading); font-size: 1.1rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-sm); text-wrap: balance; }
.why-card p { color: var(--color-text-light); font-size: 0.93rem; line-height: 1.6; margin: 0; }

/* ── Process Steps ────────────────────────────────────────────── */
.process-section {
  padding: var(--section-pad); background: var(--color-primary);
  position: relative; overflow: hidden;
}
@media (max-width: 767px) { .process-section { padding: var(--section-pad-mobile); } }
.process-section::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06; pointer-events: none;
}
.process-section .eyebrow-label { background: rgba(var(--color-accent-rgb), 0.2); color: var(--color-accent); }
.process-section h2 { color: var(--color-white); text-wrap: balance; }
.process-steps {
  display: grid; grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl); margin-top: var(--space-2xl); position: relative; z-index: 1;
}
@media (max-width: 1023px) { .process-steps { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 599px) { .process-steps { grid-template-columns: 1fr; } }
.process-step {
  position: relative; padding: var(--space-xl) var(--space-lg);
  background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1);
  border-radius: var(--radius-lg); transition: background var(--transition-base), transform var(--transition-base);
}
.process-step:hover { background: rgba(255,255,255,0.1); transform: translateY(-4px); }
.process-number {
  font-family: var(--font-heading); font-size: 3.5rem; font-weight: 900;
  color: rgba(var(--color-accent-rgb), 0.22); line-height: 1; margin-bottom: var(--space-sm); display: block;
}
.process-step h4 { color: var(--color-white); font-size: 1.1rem; margin-bottom: var(--space-sm); text-wrap: balance; }
.process-step p { color: rgba(255,255,255,0.72); font-size: 0.9rem; line-height: 1.6; margin: 0; }

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
.cta-banner-phone {
  display: block; font-family: var(--font-heading);
  font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 700;
  color: var(--color-accent); margin-bottom: var(--space-xl); letter-spacing: 0.02em;
}
.cta-banner-phone:hover { color: var(--color-white); }
.cta-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.faq-section { padding: var(--section-pad); background: var(--color-bg); }
@media (max-width: 767px) { .faq-section { padding: var(--section-pad-mobile); } }
.faq-list {
  max-width: 800px; margin: var(--space-2xl) auto 0;
  display: flex; flex-direction: column; gap: var(--space-md);
}
.faq-item {
  border: 1px solid var(--color-gray-light); border-radius: var(--radius-md);
  overflow: hidden; transition: box-shadow var(--transition-base);
}
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
.faq-icon {
  flex-shrink: 0; width: 20px; height: 20px; border-radius: 50%;
  border: 2px solid currentColor; display: flex; align-items: center; justify-content: center;
  transition: transform var(--transition-base); font-size: 1rem; line-height: 1;
}
.faq-question[aria-expanded="true"] .faq-icon { transform: rotate(45deg); }
.faq-answer {
  display: none; padding: 0 var(--space-xl) var(--space-lg);
  background: var(--color-bg); color: var(--color-text);
  font-size: 0.97rem; line-height: 1.7; border-top: 1px solid var(--color-gray-light);
}
.faq-answer.is-open { display: block; }

/* ── Closing CTA ──────────────────────────────────────────────── */
.closing-cta-section {
  padding: var(--section-pad); background: var(--color-bg-alt); text-align: center;
}
@media (max-width: 767px) { .closing-cta-section { padding: var(--section-pad-mobile); } }
.closing-cta-section h2 { color: var(--color-primary); margin-bottom: var(--space-md); text-wrap: balance; }
.closing-cta-section p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto var(--space-2xl); }
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="hr-hero" aria-label="Home Restoration hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">Home Restoration in Bowdon, GA</h1>
      <p class="hero-subhead" data-animate="fade-up">
        Carroll County's older homes carry character worth preserving — original hardwood floors,
        period tile, and craftsmanship you can't replicate with modern construction. Gray Tile
        restores Bowdon homes to their original standard while bringing critical systems up to code.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get a Restoration Assessment</a>
        <a href="#restoration-detail" class="btn btn-outline-white btn-lg">What We Restore</a>
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
        <span class="breadcrumb-current" aria-current="page">Home Restoration</span>
      </nav>
    </div>
  </div>

  <!-- ══ ANSWER-FIRST OPENING ══════════════════════════════════ -->
  <section class="hr-intro-section" id="restoration-detail" aria-labelledby="hr-intro-heading">
    <div class="container">
      <div class="hr-intro-inner">

        <div class="hr-intro-copy" data-animate="fade-up">
          <span class="eyebrow-label">Home Restoration Bowdon, GA</span>
          <h2 id="hr-intro-heading">Restoring Carroll County Homes — Original Character, Modern Standards</h2>
          <p class="lead-para prose">
            Older Bowdon homes restore differently from standard remodels. Gray Tile has spent 25 years working with Carroll County's pre-1980 housing stock — matching original tile profiles, refinishing period hardwood, and navigating the structural realities of homes that have settled and shifted over decades.
          </p>
          <p class="prose">
            Most homes in Bowdon and surrounding Carroll County communities were built between the 1930s and 1970s. These properties have plaster walls rather than drywall, original hardwood floors in species that are difficult to source today, and tile installed in non-standard sizes that require custom sourcing to match. Georgia's humid climate compounds the challenge: moisture intrusion over decades creates water damage, rot, and mold that have to be properly addressed before any cosmetic work can hold.
          </p>
          <p class="prose">
            Our restoration process begins with assessment — we document existing materials, identify moisture damage, and evaluate structural integrity before recommending any scope of work. We won't cover a water-damaged subfloor with new tile. We won't install new drywall over plaster that has active moisture behind it. Restoration that doesn't address underlying problems costs homeowners twice.
          </p>
          <p class="prose">
            For homes with significant historic character — original ceramic, encaustic, or hex tile; heart pine floors; original millwork — we work with specialty suppliers to source period-appropriate materials that match the visual character of your home. Where originals can be saved, we save them. Where they can't, we find the closest match available.
          </p>
          <p class="last-updated">Last updated: April 2026</p>
        </div>

        <div class="photo-composition" data-animate="fade-up">
          <div class="photo-accent-strip"></div>
          <div class="photo-frame">
            <img
              src="<?php echo $clientPhotos['photo15']; ?>"
              alt="Restored older Bowdon Georgia home showing original tile and hardwood flooring"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="photo-stat-badge">
            <span class="stat-number">25</span>
            <span class="stat-label">Years Carroll Co.</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="skew-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ WHY CHOOSE GRAY TILE FOR RESTORATION ════════════════ -->
  <section class="why-section" aria-labelledby="why-hr-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="eyebrow-label">Why Gray Tile</span>
        <h2 id="why-hr-heading" style="text-wrap:balance;">Four Reasons Bowdon Homeowners<br><span class="text-accent">Trust Gray Tile for Restoration</span></h2>
      </div>

      <div class="why-grid">
        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          </div>
          <div>
            <h4>25 Years with Carroll County's Housing Stock</h4>
            <p>We've worked in Bowdon homes from 1920s bungalows to 1960s ranch houses. Each era has its own construction methods, and we know what to expect before we open a wall.</p>
          </div>
        </div>

        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z"/><path d="M20.5 10H19V8.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/><path d="M9.5 14c.83 0 1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5S8 21.33 8 20.5v-5c0-.83.67-1.5 1.5-1.5z"/><path d="M3.5 14H5v1.5c0 .83-.67 1.5-1.5 1.5S2 16.33 2 15.5 2.67 14 3.5 14z"/><path d="M14 14.5c0-.83.67-1.5 1.5-1.5h5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-5c-.83 0-1.5-.67-1.5-1.5z"/><path d="M15.5 19H14v1.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5z"/><path d="M10 9.5C10 8.67 9.33 8 8.5 8h-5C2.67 8 2 8.67 2 9.5S2.67 11 3.5 11h5c.83 0 1.5-.67 1.5-1.5z"/><path d="M8.5 5H10V3.5C10 2.67 9.33 2 8.5 2S7 2.67 7 3.5 7.67 5 8.5 5z"/></svg>
          </div>
          <div>
            <h4>Period Material Sourcing</h4>
            <p>We maintain relationships with specialty tile and hardwood suppliers who stock period-appropriate materials. Where original tile sizes or hardwood species are no longer in production, we find the closest available match — not the closest convenient substitute.</p>
          </div>
        </div>

        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <div>
            <h4>Moisture Problems Addressed at the Source</h4>
            <p>Georgia's climate means water damage is in nearly every restoration project we take on. We identify and fix the source — not just the symptom. Restoration that doesn't start with moisture remediation won't last.</p>
          </div>
        </div>

        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
          </div>
          <div>
            <h4>Full Documentation Before and After</h4>
            <p>We photograph and document existing materials and conditions before any demolition. This record protects you and helps us match materials precisely — and gives you a clear before/after record for insurance and resale purposes.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="skew-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,28 C400,55 800,5 1200,32 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ PROCESS STEPS ══════════════════════════════════════════ -->
  <section class="process-section" aria-labelledby="process-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);position:relative;z-index:1;" data-animate="fade-up">
        <span class="eyebrow-label">Our Process</span>
        <h2 id="process-heading" style="text-wrap:balance;">How We Restore<br><span style="color:var(--color-accent)">Bowdon-Area Homes</span></h2>
      </div>
      <div class="process-steps">
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">01</span>
          <h4>Assessment &amp; Documentation</h4>
          <p>We inspect the home, photograph existing conditions, identify moisture damage and structural concerns, and document original materials before any work begins.</p>
        </div>
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">02</span>
          <h4>Moisture &amp; Structural Remediation</h4>
          <p>Water damage, mold, rot, and foundation issues are addressed first. Restoration built on unresolved moisture won't last — we fix the source before anything else.</p>
        </div>
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">03</span>
          <h4>Material Matching &amp; Sourcing</h4>
          <p>We source period-appropriate tile, hardwood, millwork, and fixtures that match original materials as closely as possible. Where originals can be saved, they are.</p>
        </div>
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">04</span>
          <h4>Restoration &amp; Systems Update</h4>
          <p>Cosmetic restoration proceeds alongside any required electrical, plumbing, or HVAC updates — coordinated so the home's character is preserved while meeting modern code.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="skew-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,55 1200,0 1200,55" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,55" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ═══════════════════════════════════════════ -->
  <section class="cta-banner-section" aria-label="Home restoration CTA">
    <div class="container">
      <h2 data-animate="fade-up">Your Older Bowdon Home Deserves More Than a Quick Renovation</h2>
      <p class="prose-centered" data-animate="fade-up">
        Before you gut a home that has 80 years of character, get a restoration assessment.
        We'll tell you what's worth saving, what needs to go, and what it'll cost — honestly.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="cta-banner-phone" data-animate="fade-up">
        <?php echo htmlspecialchars(formatPhone($phone)); ?>
      </a>
      <?php endif; ?>
      <div class="cta-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Schedule a Restoration Assessment</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="faq-section" aria-labelledby="hr-faq-heading">
    <div class="container">
      <div style="text-align:center;" data-animate="fade-up">
        <span class="eyebrow-label">Common Questions</span>
        <h2 id="hr-faq-heading" style="text-wrap:balance;">Home Restoration FAQ — <span class="text-accent">Carroll County, GA</span></h2>
      </div>
      <div class="faq-list" role="list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="hr-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="hr-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="skew-divider" aria-hidden="true">
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
            <img src="<?php echo $clientPhotos['gallery02']; ?>" alt="Flooring installation and tile services Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Flooring Services</h3>
            <p class="service-card__desc">Custom tile, LVP, hardwood refinishing, and subfloor repair from the ground up.</p>
            <ul><li>Custom tile showers</li><li>Hardwood refinishing</li><li>Subfloor replacement</li></ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo12']; ?>" alt="Design-build remodeling one team Bowdon Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="pencil-ruler"></i></div>
            <h3>Design-Build Remodeling</h3>
            <p class="service-card__desc">One team handles design and construction — faster projects, fewer surprises.</p>
            <ul><li>Design through completion</li><li>Fixed-scope estimates</li><li>Faster timelines</li></ul>
            <a href="/services/design-build-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo07']; ?>" alt="Residential framing contractor Carroll County West Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hard-hat"></i></div>
            <h3>Framing Contractor</h3>
            <p class="service-card__desc">Structural framing for additions, remodels, and new construction in Carroll County.</p>
            <ul><li>Load-bearing wall work</li><li>Room additions</li><li>Code-compliant rough-ins</li></ul>
            <a href="/services/framing-contractor/" class="service-card__cta">Learn more</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="closing-cta-section" aria-label="Closing call to action">
    <div class="container" data-animate="fade-up">
      <span class="eyebrow-label">Start the Restoration</span>
      <h2>Your Bowdon Home's History Is Worth Preserving</h2>
      <p class="prose-centered">
        Free restoration assessment in Bowdon. We document what's there, tell you what it'll take
        to restore it right, and give you an honest estimate — no pressure, no upsell.
      </p>
      <div class="cta-btn-group">
        <a href="/contact/" class="btn btn-primary btn-lg">Get Your Free Assessment</a>
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
