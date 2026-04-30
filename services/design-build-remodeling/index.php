<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Design-Build Remodeling Bowdon GA | Gray Tile & Remodeling';
$pageDescription = 'Streamlined design-build remodeling in Bowdon, GA — one team handles design and construction from concept to completion. Gray Tile & Remodeling, 25 years West Georgia.';
$canonicalUrl    = $siteUrl . '/services/design-build-remodeling/';
$ogImage         = $clientPhotos['photo12'];
$currentPage     = 'services';

// Find service in array
$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'design-build-remodeling') {
        $currentService = $svc;
        break;
    }
}

$pageFaqs = [
    ['q' => 'What\'s included in design-build remodeling?',
     'a' => 'Design-build covers the full project lifecycle: initial consultation, spatial planning and material selection, permits, demolition, framing, tile and flooring installation, fixture work, and final walkthrough. You deal with one contractor — Gray Tile — from first sketch to finished room.'],
    ['q' => 'How does design-build save money compared to hiring a separate designer and contractor?',
     'a' => 'When designers and contractors work separately, changes made during design often require renegotiation with the contractor — adding cost and delay. With design-build, the same team that designs your project also builds it, so specifications are realistic from day one and change orders are minimized. Most Bowdon homeowners save 10–20% compared to the split-contract approach.'],
    ['q' => 'How long does a typical design-build project take in Bowdon?',
     'a' => 'A kitchen remodel typically takes 4–8 weeks from design sign-off through completion. A bathroom design-build runs 3–5 weeks. Timeline depends on scope, material lead times, and permit requirements in Carroll County — we provide a specific schedule with every estimate.'],
    ['q' => 'Do you provide 3D renderings or design mockups?',
     'a' => 'Yes. For kitchen and bathroom projects, we provide digital layout plans and material boards so you can visualize tile patterns, cabinet placement, and fixture positions before a single tool touches your home. This reduces mid-project changes and keeps your project on schedule.'],
];

$schemaMarkup = $currentService
    ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs)
    : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   DESIGN-BUILD-REMODELING/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles — all values use var() tokens only.
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.db-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo12']; ?>');
  background-size: cover;
  background-position: center 40%;
  background-repeat: no-repeat;
}
.db-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    125deg,
    rgba(var(--color-primary-rgb), 0.92) 0%,
    rgba(var(--color-primary-dark-rgb), 0.75) 55%,
    rgba(var(--color-accent-rgb), 0.12) 100%
  );
  z-index: 1;
}
.db-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04;
  z-index: 2;
  pointer-events: none;
}
.db-hero .hero-content {
  position: relative;
  z-index: 3;
  padding: var(--space-4xl) 0 var(--space-3xl);
  max-width: 700px;
}
.db-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.9) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.db-hero .hero-subhead {
  color: rgba(255,255,255,0.88);
  font-size: clamp(1rem, 2vw, 1.2rem);
  max-width: 58ch;
  margin-bottom: var(--space-2xl);
  line-height: 1.65;
}
.db-hero .hero-cta-group {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}

/* ── Breadcrumb ───────────────────────────────────────────────── */
.breadcrumb-bar {
  background: var(--color-bg-alt);
  padding: var(--space-md) 0;
  border-bottom: 1px solid var(--color-gray-light);
}
.breadcrumb-nav {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: 0.875rem;
  color: var(--color-text-light);
  flex-wrap: wrap;
}
.breadcrumb-nav a { color: var(--color-accent); font-weight: 500; }
.breadcrumb-nav a:hover { color: var(--color-primary); }
.breadcrumb-sep { color: var(--color-gray); font-size: 0.75rem; }
.breadcrumb-current { color: var(--color-text); font-weight: 600; }

/* ── Eyebrow / Section headers shared ────────────────────────── */
.eyebrow-label {
  display: inline-block;
  font-family: var(--font-heading);
  font-size: 0.78rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.12em;
  color: var(--color-accent);
  background: rgba(var(--color-accent-rgb), 0.1);
  padding: var(--space-xs) var(--space-md);
  border-radius: var(--radius-full);
  margin-bottom: var(--space-md);
}
.text-accent { color: var(--color-accent); }
.section-divider-skew {
  width: 100%;
  overflow: hidden;
  line-height: 0;
  margin-bottom: -1px;
}
.section-divider-skew svg {
  display: block;
  width: 100%;
  height: 55px;
}

/* ── Answer-first opening ─────────────────────────────────────── */
.answer-first-section {
  padding: var(--space-3xl) 0 var(--space-2xl);
  background: var(--color-bg);
}
.answer-first-inner {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: start;
}
@media (max-width: 899px) {
  .answer-first-inner { grid-template-columns: 1fr; }
}
.answer-first-copy h2 {
  font-size: clamp(1.6rem, 3.5vw, 2.4rem);
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.answer-first-copy p {
  color: var(--color-text);
  font-size: 1rem;
  line-height: 1.7;
  max-width: 62ch;
}
.answer-first-copy p.lead-paragraph {
  font-size: 1.08rem;
  font-weight: 500;
  color: var(--color-primary);
  border-left: 3px solid var(--color-accent);
  padding-left: var(--space-md);
  margin-bottom: var(--space-lg);
}

/* ── Styled photo composition ─────────────────────────────────── */
.photo-composition {
  position: relative;
}
.photo-frame {
  position: relative;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  border: 4px solid var(--color-white);
  aspect-ratio: 4/3;
}
.photo-frame img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.photo-stat-badge {
  position: absolute;
  bottom: -20px;
  right: -16px;
  background: var(--color-accent);
  color: var(--color-white);
  border-radius: var(--radius-md);
  padding: var(--space-md) var(--space-lg);
  box-shadow: var(--shadow-lg);
  text-align: center;
  min-width: 130px;
  z-index: 2;
}
.photo-stat-badge .stat-number {
  display: block;
  font-family: var(--font-heading);
  font-size: 2rem;
  font-weight: 800;
  line-height: 1;
  margin-bottom: var(--space-xs);
}
.photo-stat-badge .stat-label {
  display: block;
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  opacity: 0.9;
}
.photo-accent-strip {
  position: absolute;
  top: -8px;
  left: 20px;
  width: 60px;
  height: 4px;
  background: var(--color-accent);
  border-radius: var(--radius-full);
}

/* ── Why Choose Section ───────────────────────────────────────── */
.why-choose-section {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
@media (max-width: 767px) {
  .why-choose-section { padding: var(--section-pad-mobile); }
}
.why-choose-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-lg);
  margin-top: var(--space-2xl);
}
@media (max-width: 767px) {
  .why-choose-grid { grid-template-columns: 1fr; }
}
.why-card {
  background: var(--color-bg);
  border-radius: var(--radius-md);
  padding: var(--space-xl);
  display: flex;
  gap: var(--space-lg);
  align-items: flex-start;
  box-shadow: var(--shadow-card);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.why-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}
.why-card-icon {
  flex-shrink: 0;
  width: 48px;
  height: 48px;
  background: rgba(var(--color-accent-rgb), 0.1);
  border-radius: var(--radius-md);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
}
.why-card h4 {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
  text-wrap: balance;
}
.why-card p {
  color: var(--color-text-light);
  font-size: 0.93rem;
  line-height: 1.6;
  margin: 0;
}

/* ── Process Steps ────────────────────────────────────────────── */
.process-section {
  padding: var(--section-pad);
  background: var(--color-primary);
  position: relative;
  overflow: hidden;
}
@media (max-width: 767px) {
  .process-section { padding: var(--section-pad-mobile); }
}
.process-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06;
  pointer-events: none;
}
.process-section .eyebrow-label {
  background: rgba(var(--color-accent-rgb), 0.2);
  color: var(--color-accent);
}
.process-section h2 {
  color: var(--color-white);
  text-wrap: balance;
}
.process-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl);
  margin-top: var(--space-2xl);
  position: relative;
  z-index: 1;
}
@media (max-width: 1023px) {
  .process-steps { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 599px) {
  .process-steps { grid-template-columns: 1fr; }
}
.process-step {
  position: relative;
  padding: var(--space-xl) var(--space-lg);
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: var(--radius-lg);
  transition: background var(--transition-base), transform var(--transition-base);
}
.process-step:hover {
  background: rgba(255,255,255,0.1);
  transform: translateY(-4px);
}
.process-number {
  font-family: var(--font-heading);
  font-size: 3.5rem;
  font-weight: 900;
  color: rgba(var(--color-accent-rgb), 0.22);
  line-height: 1;
  margin-bottom: var(--space-sm);
  display: block;
}
.process-step h4 {
  color: var(--color-white);
  font-size: 1.1rem;
  margin-bottom: var(--space-sm);
  text-wrap: balance;
}
.process-step p {
  color: rgba(255,255,255,0.72);
  font-size: 0.9rem;
  line-height: 1.6;
  margin: 0;
}

/* ── CTA Banner ───────────────────────────────────────────────── */
.cta-banner-section {
  padding: var(--space-4xl) var(--space-xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative;
  overflow: hidden;
  text-align: center;
}
.cta-banner-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06;
  pointer-events: none;
}
.cta-banner-section .container { position: relative; z-index: 1; }
.cta-banner-section h2 { color: var(--color-white); margin-bottom: var(--space-md); text-wrap: balance; }
.cta-banner-section p { color: rgba(255,255,255,0.8); font-size: 1.05rem; max-width: 55ch; margin: 0 auto var(--space-2xl); }
.cta-banner-phone {
  display: block;
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 3vw, 2.4rem);
  font-weight: 700;
  color: var(--color-accent);
  margin-bottom: var(--space-xl);
  letter-spacing: 0.02em;
}
.cta-banner-phone:hover { color: var(--color-white); }
.cta-btn-group {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── FAQ ──────────────────────────────────────────────────────── */
.faq-section {
  padding: var(--section-pad);
  background: var(--color-bg);
}
@media (max-width: 767px) {
  .faq-section { padding: var(--section-pad-mobile); }
}
.faq-list {
  max-width: 800px;
  margin: var(--space-2xl) auto 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.faq-item {
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-md);
  overflow: hidden;
  transition: box-shadow var(--transition-base);
}
.faq-item:hover { box-shadow: var(--shadow-md); }
.faq-question {
  width: 100%;
  background: var(--color-bg);
  border: none;
  text-align: left;
  padding: var(--space-lg) var(--space-xl);
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--color-primary);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: var(--space-md);
  transition: background var(--transition-fast), color var(--transition-fast);
}
.faq-question:hover { background: var(--color-bg-alt); color: var(--color-accent); }
.faq-question[aria-expanded="true"] { background: var(--color-primary); color: var(--color-white); }
.faq-icon {
  flex-shrink: 0;
  width: 20px; height: 20px;
  border-radius: 50%;
  border: 2px solid currentColor;
  display: flex; align-items: center; justify-content: center;
  transition: transform var(--transition-base);
  font-size: 1rem; line-height: 1;
}
.faq-question[aria-expanded="true"] .faq-icon { transform: rotate(45deg); }
.faq-answer {
  display: none;
  padding: 0 var(--space-xl) var(--space-lg);
  background: var(--color-bg);
  color: var(--color-text);
  font-size: 0.97rem;
  line-height: 1.7;
  border-top: 1px solid var(--color-gray-light);
}
.faq-answer.is-open { display: block; }

/* ── Closing CTA ──────────────────────────────────────────────── */
.closing-cta-section {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
  text-align: center;
}
@media (max-width: 767px) {
  .closing-cta-section { padding: var(--section-pad-mobile); }
}
.closing-cta-section h2 { color: var(--color-primary); margin-bottom: var(--space-md); text-wrap: balance; }
.closing-cta-section p { color: var(--color-text-light); max-width: 55ch; margin: 0 auto var(--space-2xl); }

/* ── Last Updated ─────────────────────────────────────────────── */
.last-updated {
  font-size: 0.8rem;
  color: var(--color-gray);
  margin-top: var(--space-md);
}
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="db-hero" aria-label="Design-Build Remodeling hero">
    <div class="hero-content container">
      <h1 data-animate="fade-up">Design-Build Remodeling<br>in Bowdon, GA</h1>
      <p class="hero-subhead" data-animate="fade-up">
        One team. One contract. Zero miscommunication between your designer and contractor.
        Gray Tile manages your kitchen or bathroom project from first concept through the
        final tile install — with no gap in accountability.
      </p>
      <div class="hero-cta-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Design Consultation</a>
        <a href="#how-it-works" class="btn btn-outline-white btn-lg">See How It Works</a>
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
        <span class="breadcrumb-current" aria-current="page">Design-Build Remodeling</span>
      </nav>
    </div>
  </div>

  <!-- ══ ANSWER-FIRST OPENING ══════════════════════════════════ -->
  <section class="answer-first-section" aria-labelledby="db-intro-heading">
    <div class="container">
      <div class="answer-first-inner">

        <div class="answer-first-copy" data-animate="fade-up">
          <span class="eyebrow-label">Design-Build in Bowdon, GA</span>
          <h2 id="db-intro-heading">Your Kitchen or Bathroom Project — Delivered by One Team</h2>
          <p class="lead-paragraph prose">
            Design-build remodeling means Gray Tile handles both the design phase and the construction phase of your project. In Bowdon, that eliminates the biggest source of budget overruns — the gap between what a designer specifies and what a contractor can realistically build for the quoted price.
          </p>
          <p class="prose">
            Traditional remodeling splits design and construction between two parties. Your designer draws plans that look great on paper; your contractor bids against those plans and immediately starts negotiating changes. Every revision costs time and money, and when something goes wrong, each party points at the other.
          </p>
          <p class="prose">
            With Gray Tile's design-build approach, the person planning your kitchen is the same person installing your tile. There's no translation layer, no miscommunication, and no finger-pointing. When we quote a scope, we've already accounted for the realities of your specific space — the plumbing stack locations, the load-bearing wall on the east side of your kitchen, the older subfloor that needs leveling before tile goes down.
          </p>
          <p class="prose">
            For Bowdon homeowners considering kitchen or bathroom projects in the $15,000–$60,000 range, design-build consistently delivers faster timelines and tighter final costs than the split-contract alternative.
          </p>
          <p class="last-updated">Last updated: April 2026</p>
        </div>

        <div class="photo-composition" data-animate="fade-up">
          <div class="photo-accent-strip"></div>
          <div class="photo-frame">
            <img
              src="<?php echo $clientPhotos['photo13']; ?>"
              alt="Design-build remodeling project showing tile and cabinetry integration in Bowdon GA home"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="photo-stat-badge">
            <span class="stat-number">25</span>
            <span class="stat-label">Years West Georgia</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="section-divider-skew" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,55 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,55 0,55" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ WHY CHOOSE GRAY TILE FOR DESIGN-BUILD ════════════════ -->
  <section class="why-choose-section" aria-labelledby="why-db-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);" data-animate="fade-up">
        <span class="eyebrow-label">Why Gray Tile</span>
        <h2 id="why-db-heading" style="text-wrap:balance;">Four Reasons to Choose Design-Build<br><span class="text-accent">for Your Bowdon Remodel</span></h2>
      </div>

      <div class="why-choose-grid">
        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div>
            <h4>Realistic Timelines from Day One</h4>
            <p>Because our design team and construction crew are the same people, we scope timelines against what's actually achievable in Carroll County — including permit wait times and material lead times from our local suppliers.</p>
          </div>
        </div>

        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          </div>
          <div>
            <h4>Fewer Change Orders, Lower Final Cost</h4>
            <p>Design-build reduces change orders by 40–60% compared to split-contract projects. When design decisions account for installation realities, mid-project surprises are rare — not routine.</p>
          </div>
        </div>

        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <div>
            <h4>One Point of Accountability</h4>
            <p>If something isn't right at the end, you call one number. Gray Tile owns the outcome — design decision, installation quality, and final result — not two separate parties pointing at each other.</p>
          </div>
        </div>

        <div class="why-card" data-animate="fade-up">
          <div class="why-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
          </div>
          <div>
            <h4>Tile Expertise Built Into the Design</h4>
            <p>Most design-build contractors sub out tile work. Gray Tile is the tile specialist — your layouts are designed by the same craftsmen who will install them, so grout lines, pattern breaks, and transitions are planned correctly from the first sketch.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="section-divider-skew" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,30 C400,55 800,5 1200,35 L1200,55 L0,55 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ PROCESS STEPS ══════════════════════════════════════════ -->
  <section class="process-section" id="how-it-works" aria-labelledby="process-heading">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--space-lg);position:relative;z-index:1;" data-animate="fade-up">
        <span class="eyebrow-label">Our Process</span>
        <h2 id="process-heading" style="text-wrap:balance;">How Design-Build Works<br><span style="color:var(--color-accent)">in Bowdon, GA</span></h2>
      </div>

      <div class="process-steps">
        <div class="process-step" data-animate="fade-up">
          <span class="process-number">01</span>
          <h4>Discovery &amp; Site Visit</h4>
          <p>We visit your Bowdon home, assess the existing space, identify structural and plumbing constraints, and listen to what you want to achieve. No commitment required for this visit.</p>
        </div>

        <div class="process-step" data-animate="fade-up">
          <span class="process-number">02</span>
          <h4>Design &amp; Material Selection</h4>
          <p>We produce a layout plan with tile pattern, fixture placement, and material board. You review and approve before any work begins — including 3D mockups for kitchens and bathrooms.</p>
        </div>

        <div class="process-step" data-animate="fade-up">
          <span class="process-number">03</span>
          <h4>Permitting &amp; Scheduling</h4>
          <p>We handle Carroll County permit applications and schedule the project around your household. Rough-in trades — plumbing, electrical, HVAC — are coordinated by Gray Tile, not managed by you.</p>
        </div>

        <div class="process-step" data-animate="fade-up">
          <span class="process-number">04</span>
          <h4>Build &amp; Final Walkthrough</h4>
          <p>Construction proceeds on the agreed schedule. We do a formal walkthrough at completion — any punch-list items are resolved before final payment. You get a space that matches the design you approved.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="section-divider-skew" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,55 1200,0 1200,55" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,0 0,55" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ═══════════════════════════════════════════ -->
  <section class="cta-banner-section" aria-label="Design-build consultation CTA">
    <div class="container">
      <h2 data-animate="fade-up">Planning a Kitchen or Bathroom Remodel in Bowdon?</h2>
      <p class="prose-centered" data-animate="fade-up">
        Get a design-build estimate — one number that covers design, materials, and installation,
        no hidden handoffs. Most projects kick off within 2–3 weeks of estimate approval.
      </p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="cta-banner-phone" data-animate="fade-up">
        <?php echo htmlspecialchars(formatPhone($phone)); ?>
      </a>
      <?php endif; ?>
      <div class="cta-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Start Your Design-Build Project</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">All Services</a>
      </div>
    </div>
  </section>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="faq-section" aria-labelledby="db-faq-heading">
    <div class="container">
      <div style="text-align:center;" data-animate="fade-up">
        <span class="eyebrow-label">Common Questions</span>
        <h2 id="db-faq-heading" style="text-wrap:balance;">Design-Build FAQ — <span class="text-accent">Bowdon, GA</span></h2>
      </div>

      <div class="faq-list" role="list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="faq-item" role="listitem">
          <button class="faq-question" aria-expanded="false" aria-controls="db-faq-answer-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="db-faq-answer-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ────────────────────────────────────────────── -->
  <div class="section-divider-skew" aria-hidden="true">
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
            <img src="<?php echo $clientPhotos['gallery02']; ?>" alt="Custom tile showers and flooring in Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Flooring Services</h3>
            <p class="service-card__desc">Custom tile showers, LVP, hardwood refinishing, and subfloor work.</p>
            <ul>
              <li>Custom tile showers</li>
              <li>LVP &amp; hardwood refinishing</li>
              <li>Subfloor replacement</li>
            </ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo05']; ?>" alt="Targeted home upgrades and tile backsplashes in Carroll County" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="sparkles"></i></div>
            <h3>Home Upgrades</h3>
            <p class="service-card__desc">Targeted updates — backsplashes, floors, fixtures — completed in days.</p>
            <ul>
              <li>Tile backsplashes</li>
              <li>Flooring replacement</li>
              <li>Fast 3–7 day turnaround</li>
            </ul>
            <a href="/services/home-upgrades/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['gallery01']; ?>" alt="Full kitchen and bathroom remodeling Bowdon Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hammer"></i></div>
            <h3>Remodeling Services</h3>
            <p class="service-card__desc">Kitchen, bathroom, attic, and basement remodels throughout Carroll County.</p>
            <ul>
              <li>Full kitchen remodels</li>
              <li>Bathroom renovations</li>
              <li>Basement finishing</li>
            </ul>
            <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="closing-cta-section" aria-label="Closing call to action">
    <div class="container" data-animate="fade-up">
      <span class="eyebrow-label">Get Started</span>
      <h2>Ready for a Remodel That Goes Exactly as Planned?</h2>
      <p class="prose-centered">
        Free design consultation in Bowdon. We come to your home, look at your space, and
        give you a realistic design-build estimate — one number, one team, no surprises.
      </p>
      <div class="cta-btn-group">
        <a href="/contact/" class="btn btn-primary btn-lg">Schedule Your Free Consultation</a>
        <a href="/services/" class="btn btn-accent btn-lg">Explore All Services</a>
      </div>
    </div>
  </section>

</main>

<script>
document.querySelectorAll('.faq-question').forEach(function(btn) {
  btn.addEventListener('click', function() {
    var expanded = this.getAttribute('aria-expanded') === 'true';
    var answerId = this.getAttribute('aria-controls');
    var answer   = document.getElementById(answerId);
    this.setAttribute('aria-expanded', String(!expanded));
    if (answer) answer.classList.toggle('is-open', !expanded);
  });
});
// Init Lucide icons
if (typeof lucide !== 'undefined') lucide.createIcons();
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
