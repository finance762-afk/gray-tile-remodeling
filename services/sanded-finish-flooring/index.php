<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Sanded Finish Flooring in Bowdon, GA | Gray Tile & Remodeling';
$pageDescription = 'Hardwood floor sanding and refinishing in Bowdon, GA — restore worn floors instead of replacing them. $2–$5/sq ft, 3–5 days. Carroll County. Free estimate.';
$canonicalUrl    = $siteUrl . '/services/sanded-finish-flooring/';
$ogImage         = $clientPhotos['photo07'];
$heroPreloadImage = $clientPhotos['photo07'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'sanded-finish-flooring') { $currentService = $svc; break; }
}

$pageFaqs = [
    [
        'q' => 'How much does floor sanding cost in Bowdon, GA?',
        'a' => 'Hardwood floor sanding and refinishing in Bowdon runs $2–$5 per square foot depending on the wood species, current finish condition, and number of coats. A 400 sq ft living room typically costs $800–$2,000 complete. Stairs add $40–$60 per tread. We give you a fixed-price quote before work begins — no per-hour billing surprises.',
    ],
    [
        'q' => 'Can my hardwood floors be refinished, or do they need to be replaced?',
        'a' => 'Most hardwood floors can be refinished as long as the wood is at least 3/4" thick and there\'s enough material above the tongue-and-groove to sand through. Deep gouges, black water stains (indicating rot below), or widespread cupping from moisture damage may require replacement. We measure your floor thickness and show you the reading before we quote anything.',
    ],
    [
        'q' => 'How many times can hardwood floors be sanded?',
        'a' => 'Solid 3/4" hardwood can typically be sanded 4–8 times over its life — each sand removes about 1/16" of material. Engineered hardwood usually allows 1–2 sandings depending on the wear layer thickness. If your floors have been previously refinished, we\'ll measure the remaining thickness to confirm another sand is safe.',
    ],
    [
        'q' => 'How long do I need to stay off my floors after refinishing?',
        'a' => 'Light foot traffic can resume after 24–48 hours. Wait 72 hours before placing rugs, and 7 days before moving heavy furniture back. The finish fully cures in 30 days — avoid dragging anything across it until then. We use water-based polyurethane on most jobs, which dries faster and has less odor than oil-based options.',
    ],
    [
        'q' => 'How much dust does floor sanding create?',
        'a' => 'We use dustless sanding equipment — a drum sander with an integrated HEPA vacuum system. In practice, "dustless" means about 95% less dust than open sanding. Fine particles still get into the air, so we recommend staying out of the room during sanding and cleaning HVAC filters after the project. We seal off doorways with plastic barriers before starting.',
    ],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   SANDED FINISH FLOORING — /services/sanded-finish-flooring/index.php
   Page-specific styles. All values use var() tokens only.
   CSS prefix: .sff-
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.sff-hero {
  position: relative;
  min-height: 90vh;
  display: flex;
  align-items: flex-end;
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos['photo07']; ?>');
  background-size: cover;
  background-position: center 50%;
  background-repeat: no-repeat;
  animation: sff-kenburns 24s ease-in-out infinite alternate;
}
@keyframes sff-kenburns {
  from { background-size: 110%; background-position: center 45%; }
  to   { background-size: 120%; background-position: center 55%; }
}
.sff-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to top,
    rgba(var(--color-primary-dark-rgb), 0.95) 0%,
    rgba(var(--color-primary-rgb), 0.55) 55%,
    rgba(var(--color-primary-rgb), 0.15) 100%
  );
  z-index: 1;
}
.sff-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04;
  z-index: 2;
  pointer-events: none;
}
.sff-hero .sff-hero-inner {
  position: relative;
  z-index: 3;
  padding: var(--space-4xl) 0;
  width: 100%;
}
.sff-hero-content {
  max-width: 680px;
}
@media (max-width: 767px) {
  .sff-hero { min-height: 70vh; align-items: center; animation: none; }
  .sff-hero .sff-hero-inner { padding: var(--space-3xl) 0 var(--space-2xl); }
}
.sff-hero h1 {
  color: var(--color-white);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.88) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.sff-hero .hero-lead {
  color: rgba(255,255,255,0.88);
  font-size: clamp(1rem, 2vw, 1.2rem);
  line-height: 1.65;
  margin-bottom: var(--space-2xl);
  max-width: 55ch;
}
.sff-hero .hero-stat-row {
  display: flex;
  gap: var(--space-2xl);
  margin-bottom: var(--space-2xl);
  flex-wrap: wrap;
}
.sff-hero .hero-stat {
  display: flex;
  flex-direction: column;
  gap: var(--space-xs);
}
.sff-hero .stat-val {
  font-family: var(--font-heading);
  font-size: 1.8rem;
  font-weight: 700;
  color: var(--color-accent);
  line-height: 1;
}
.sff-hero .stat-label {
  font-size: 0.82rem;
  color: rgba(255,255,255,0.7);
  line-height: 1.3;
}
.sff-hero .hero-cta-row {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}

/* ── Breadcrumb ───────────────────────────────────────────────── */
.sff-breadcrumb {
  background: var(--color-bg-alt);
  padding: var(--space-md) 0;
  border-bottom: 1px solid rgba(var(--color-primary-rgb), 0.08);
}
.sff-breadcrumb nav {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: 0.875rem;
  color: var(--color-text-light);
  flex-wrap: wrap;
}
.sff-breadcrumb nav a { color: var(--color-accent); font-weight: 500; transition: color var(--transition-fast); }
.sff-breadcrumb nav a:hover { color: var(--color-primary); }
.sff-breadcrumb .bc-sep { color: var(--color-text-light); }
.sff-breadcrumb .bc-current { color: var(--color-text); font-weight: 600; }

/* ── Eyebrow label ────────────────────────────────────────────── */
.sff-eyebrow {
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

/* ── Intro Split ──────────────────────────────────────────────── */
.sff-intro {
  padding: var(--section-pad);
  background: var(--color-bg);
}
@media (max-width: 767px) { .sff-intro { padding: var(--section-pad-mobile); } }
.sff-intro-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: center;
}
@media (max-width: 767px) { .sff-intro-grid { grid-template-columns: 1fr; } }
.sff-intro-copy h2 { text-wrap: balance; margin-bottom: var(--space-lg); color: var(--color-primary); }
.sff-intro-copy .text-accent { color: var(--color-accent); -webkit-text-fill-color: var(--color-accent); }
.sff-intro-copy p { color: var(--color-text); line-height: 1.7; margin-bottom: var(--space-md); max-width: 60ch; }
.sff-checklist {
  list-style: none;
  padding: 0;
  margin: var(--space-lg) 0 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.sff-checklist li {
  display: flex;
  align-items: flex-start;
  gap: var(--space-md);
  font-size: 0.95rem;
  color: var(--color-text);
  line-height: 1.5;
}
.sff-checklist li::before {
  content: '✓';
  color: var(--color-accent);
  font-weight: 700;
  font-family: var(--font-heading);
  font-size: 1.1rem;
  flex-shrink: 0;
  margin-top: 1px;
}
.sff-intro-image { position: relative; }
.sff-intro-img-wrap {
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  aspect-ratio: 4 / 3;
}
.sff-intro-img-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.sff-intro-badge {
  position: absolute;
  top: calc(-1 * var(--space-lg));
  right: var(--space-xl);
  background: var(--color-accent);
  color: var(--color-white);
  border-radius: var(--radius-md);
  padding: var(--space-md) var(--space-xl);
  font-family: var(--font-heading);
  font-size: 0.95rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  box-shadow: var(--shadow-lg);
  text-align: center;
}
@media (max-width: 767px) {
  .sff-intro-badge { top: var(--space-md); right: var(--space-md); }
}

/* ── Dividers ─────────────────────────────────────────────────── */
.sff-divider { width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px; }
.sff-divider svg { display: block; width: 100%; height: 60px; }

/* ── Before / After Editorial Section (Signature Section) ────── */
.sff-editorial {
  padding: var(--section-pad);
  background: var(--color-bg-dark);
  position: relative;
  overflow: hidden;
}
@media (max-width: 767px) { .sff-editorial { padding: var(--section-pad-mobile); } }
.sff-editorial::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.07;
  pointer-events: none;
}
.sff-editorial .container { position: relative; z-index: 1; }
.sff-editorial-head {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.sff-editorial-head .sff-eyebrow {
  background: rgba(var(--color-accent-rgb), 0.15);
  color: var(--color-accent);
}
.sff-editorial-head h2 {
  color: var(--color-white);
  text-wrap: balance;
  margin-bottom: var(--space-md);
}
.sff-editorial-head p { color: rgba(255,255,255,0.7); max-width: 55ch; margin: 0 auto; }
.sff-process-editorial {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-2xl);
  align-items: start;
}
@media (max-width: 767px) { .sff-process-editorial { grid-template-columns: 1fr; } }
.sff-process-steps-list {
  display: flex;
  flex-direction: column;
  gap: 0;
}
.sff-editorial-step {
  display: flex;
  gap: var(--space-lg);
  padding: var(--space-xl) 0;
  border-bottom: 1px solid rgba(255,255,255,0.08);
  position: relative;
}
.sff-editorial-step:last-child { border-bottom: none; }
.sff-editorial-step-num {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  border: 2px solid var(--color-accent);
  color: var(--color-accent);
  font-family: var(--font-heading);
  font-size: 1.1rem;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.sff-editorial-step-copy h3 {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  color: var(--color-white);
  margin-bottom: var(--space-sm);
  text-wrap: balance;
}
.sff-editorial-step-copy p {
  font-size: 0.9rem;
  color: rgba(255,255,255,0.68);
  line-height: 1.65;
  margin: 0;
}
.sff-editorial-quote {
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.1);
  border-left: 4px solid var(--color-accent);
  border-radius: var(--radius-md);
  padding: var(--space-2xl);
  position: sticky;
  top: calc(var(--navbar-height) + var(--space-xl));
}
.sff-editorial-quote .quote-big {
  font-family: var(--font-heading);
  font-size: clamp(1.4rem, 3vw, 2.2rem);
  font-weight: 700;
  color: var(--color-white);
  line-height: 1.3;
  margin-bottom: var(--space-xl);
  text-wrap: balance;
}
.sff-editorial-quote .quote-accent {
  color: var(--color-accent);
}
.sff-editorial-stats-col {
  display: flex;
  flex-direction: column;
  gap: var(--space-xl);
  margin-top: var(--space-xl);
  padding-top: var(--space-xl);
  border-top: 1px solid rgba(255,255,255,0.1);
}
.sff-editorial-stat {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.sff-editorial-stat .stat-label {
  font-size: 0.9rem;
  color: rgba(255,255,255,0.65);
}
.sff-editorial-stat .stat-val {
  font-family: var(--font-heading);
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--color-accent);
}

/* ── Mid-page CTA Banner ──────────────────────────────────────── */
.sff-cta-banner {
  padding: var(--space-4xl) var(--space-xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative;
  overflow: hidden;
  text-align: center;
}
.sff-cta-banner::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.06;
  pointer-events: none;
}
.sff-cta-banner .container { position: relative; z-index: 1; }
.sff-cta-banner h2 { color: var(--color-white); text-wrap: balance; margin-bottom: var(--space-md); }
.sff-cta-banner p { color: rgba(255,255,255,0.8); max-width: 52ch; margin: 0 auto var(--space-xl); }
.sff-cta-phone {
  display: block;
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 3vw, 2.5rem);
  font-weight: 700;
  color: var(--color-accent);
  margin-bottom: var(--space-xl);
  letter-spacing: 0.02em;
  text-decoration: none;
}
.sff-cta-phone:hover { color: var(--color-white); }
.sff-cta-btn-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── FAQ ──────────────────────────────────────────────────────── */
.sff-faq {
  padding: var(--section-pad);
  background: var(--color-bg);
}
@media (max-width: 767px) { .sff-faq { padding: var(--section-pad-mobile); } }
.sff-faq-header { text-align: center; margin-bottom: var(--space-3xl); }
.sff-faq-header h2 { text-wrap: balance; color: var(--color-primary); margin-bottom: var(--space-md); }
.sff-faq-list {
  max-width: 820px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.sff-faq-item {
  border: 1px solid rgba(var(--color-primary-rgb), 0.12);
  border-radius: var(--radius-md);
  overflow: hidden;
  background: var(--color-bg);
  transition: box-shadow var(--transition-base);
}
.sff-faq-item:hover { box-shadow: var(--shadow-md); }
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
.faq-question:hover { background: rgba(var(--color-accent-rgb), 0.05); color: var(--color-accent); }
.faq-question[aria-expanded="true"] { background: var(--color-primary); color: var(--color-white); }
.faq-icon {
  flex-shrink: 0;
  width: 22px; height: 22px;
  border-radius: 50%;
  border: 2px solid currentColor;
  display: flex;
  align-items: center;
  justify-content: center;
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
  border-top: 1px solid rgba(var(--color-primary-rgb), 0.08);
}
.faq-answer.is-open { display: block; }

/* ── Related Services ─────────────────────────────────────────── */
.sff-related { padding: var(--section-pad); background: var(--color-bg-alt); }
@media (max-width: 767px) { .sff-related { padding: var(--section-pad-mobile); } }
.sff-related-header { text-align: center; margin-bottom: var(--space-3xl); }
.sff-related-header h2 { text-wrap: balance; color: var(--color-primary); }

/* ── Closing CTA ──────────────────────────────────────────────── */
.sff-closing {
  padding: var(--section-pad);
  background: var(--color-bg-dark);
  position: relative;
  overflow: hidden;
  text-align: center;
}
@media (max-width: 767px) { .sff-closing { padding: var(--section-pad-mobile); } }
.sff-closing::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.05;
  pointer-events: none;
}
.sff-closing .container { position: relative; z-index: 1; }
.sff-closing h2 { color: var(--color-white); text-wrap: balance; margin-bottom: var(--space-md); }
.sff-closing p { color: rgba(255,255,255,0.78); max-width: 55ch; margin: 0 auto var(--space-2xl); }
</style>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════════ -->
  <section class="sff-hero" aria-label="Sanded finish flooring hero">
    <div class="sff-hero-inner container">
      <div class="sff-hero-content" data-animate="fade-up">
        <h1>Floor Sanding &amp; Refinishing in Bowdon, GA</h1>
        <p class="hero-lead prose">
          $2–$5 per square foot. Most rooms refinished in 3–5 days. Restore worn hardwood instead of ripping it out — the most cost-effective floor upgrade in your Carroll County home.
        </p>
        <div class="hero-stat-row">
          <div class="hero-stat">
            <span class="stat-val">$2–$5</span>
            <span class="stat-label">Per sq ft refinished</span>
          </div>
          <div class="hero-stat">
            <span class="stat-val">3–5</span>
            <span class="stat-label">Day turnaround</span>
          </div>
          <div class="hero-stat">
            <span class="stat-val">95%</span>
            <span class="stat-label">Dustless equipment</span>
          </div>
        </div>
        <div class="hero-cta-row">
          <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Estimate</a>
          <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="btn btn-outline-white btn-lg"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ══ BREADCRUMB ════════════════════════════════════════════ -->
  <div class="sff-breadcrumb">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span class="bc-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="bc-sep" aria-hidden="true">›</span>
        <span class="bc-current" aria-current="page">Sanded Finish Flooring</span>
      </nav>
    </div>
  </div>

  <!-- ══ INTRO SPLIT ═══════════════════════════════════════════ -->
  <section class="sff-intro" aria-label="About our floor sanding service">
    <div class="container">
      <div class="sff-intro-grid">
        <div class="sff-intro-copy" data-animate="fade-up">
          <span class="sff-eyebrow">Restore vs Replace</span>
          <h2>Your Floors Aren't Worn Out. <span class="text-accent">They're Waiting to Be Restored.</span></h2>
          <p class="prose">
            New hardwood flooring runs $7–$14 per square foot installed. Refinishing the floors you already have costs $2–$5 per square foot and delivers the same result — smooth, freshly finished wood with the stain color and sheen you choose. Most Bowdon homeowners never replace floors that can be refinished.
          </p>
          <p class="prose">
            We use dustless drum sanders and finish with water-based polyurethane — faster cure time, lower odor, and no amber tint that oil-based finishes add over time. If you want the warm amber tone, we offer oil-based as well; we just want you to know the difference before you choose.
          </p>
          <p class="prose" style="font-size:0.85rem;color:var(--color-text-light);">Last updated: April 2026</p>
          <ul class="sff-checklist">
            <li>HEPA-filter dustless sanding equipment</li>
            <li>Water-based or oil-based poly — your choice</li>
            <li>Stain color matching or new stain application</li>
            <li>Stairs quoted per-tread, $40–$60 each</li>
          </ul>
        </div>
        <div class="sff-intro-image" data-animate="fade-up">
          <div class="sff-intro-img-wrap">
            <img
              src="<?php echo $clientPhotos['gallery03']; ?>"
              alt="Hardwood floor sanding and refinishing in Bowdon GA home"
              width="800" height="600"
              loading="lazy">
          </div>
          <div class="sff-intro-badge">Restore vs Replace</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="sff-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-bg)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg-dark)"/>
    </svg>
  </div>

  <!-- ══ EDITORIAL: PROCESS + PULLQUOTE (SIGNATURE SECTION) ═══ -->
  <section class="sff-editorial" aria-label="Sand and refinish process">
    <div class="container">
      <div class="sff-editorial-head" data-animate="fade-up">
        <span class="sff-eyebrow">The Process</span>
        <h2>How Sand-and-Refinish <span class="text-accent">Works</span></h2>
        <p class="prose-centered">Four steps from worn boards to a floor that looks new. Here's what happens in your home.</p>
      </div>
      <div class="sff-process-editorial">
        <div class="sff-process-steps-list" data-animate="fade-up">
          <div class="sff-editorial-step">
            <div class="sff-editorial-step-num">1</div>
            <div class="sff-editorial-step-copy">
              <h3>Floor Assessment</h3>
              <p>We measure wood thickness with a depth gauge, check for subfloor movement that would cause squeaks after finishing, note any deep gouges or stains that need pre-treatment, and confirm there's enough material for a safe sand.</p>
            </div>
          </div>
          <div class="sff-editorial-step">
            <div class="sff-editorial-step-num">2</div>
            <div class="sff-editorial-step-copy">
              <h3>Rough Sanding</h3>
              <p>Drum sander with 40 or 60-grit removes the old finish down to raw wood. Edge sander handles the perimeter. All sanding runs parallel to the grain. Dustless HEPA system captures 95%+ of particles throughout.</p>
            </div>
          </div>
          <div class="sff-editorial-step">
            <div class="sff-editorial-step-num">3</div>
            <div class="sff-editorial-step-copy">
              <h3>Fine Sanding &amp; Stain</h3>
              <p>80-grit and 100-grit finish passes smooth the surface. If staining, color is applied evenly and allowed to penetrate before any topcoat. Stain samples available before commitment.</p>
            </div>
          </div>
          <div class="sff-editorial-step">
            <div class="sff-editorial-step-num">4</div>
            <div class="sff-editorial-step-copy">
              <h3>Finish Coats</h3>
              <p>2–3 coats of water-based or oil-based polyurethane applied with a T-bar or roller. Light screen between coats. Final coat tack-free in 4–6 hours, light traffic in 24–48 hours, furniture back in 72 hours.</p>
            </div>
          </div>
        </div>
        <div class="sff-editorial-quote" data-animate="fade-up">
          <div class="quote-big">
            Refinishing costs <span class="quote-accent">60–70% less</span> than replacing the same hardwood. In most Bowdon homes, it's not even a close call.
          </div>
          <div class="sff-editorial-stats-col">
            <div class="sff-editorial-stat">
              <span class="stat-label">Refinish cost (avg 400 sq ft)</span>
              <span class="stat-val">$800–$2,000</span>
            </div>
            <div class="sff-editorial-stat">
              <span class="stat-label">New floor install (same area)</span>
              <span class="stat-val">$2,800–$5,600</span>
            </div>
            <div class="sff-editorial-stat">
              <span class="stat-label">Typical savings</span>
              <span class="stat-val">$2,000–$3,600</span>
            </div>
            <div class="sff-editorial-stat">
              <span class="stat-label">Dustless equipment</span>
              <span class="stat-val">HEPA filter</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="sff-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,30 C300,60 900,0 1200,30 L1200,60 L0,60 Z" fill="var(--color-bg-dark)"/>
      <path d="M0,30 C300,60 900,0 1200,30 L1200,0 L0,0 Z" fill="var(--color-primary)"/>
    </svg>
  </div>

  <!-- ══ MID-PAGE CTA ══════════════════════════════════════════ -->
  <section class="sff-cta-banner" aria-label="Request a floor refinishing estimate">
    <div class="container">
      <h2 data-animate="fade-up">Find Out If Your Floors Can Be Refinished — Free, Same Week</h2>
      <p class="prose-centered" data-animate="fade-up">
        We come to your Bowdon home, measure wood thickness, check the condition of every room, and give you a written quote. Most homeowners find out within 48 hours whether their floors are restore candidates.
      </p>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="sff-cta-phone" data-animate="fade-up">
        <?php echo htmlspecialchars(formatPhone($phone)); ?>
      </a>
      <div class="sff-cta-btn-group" data-animate="fade-up">
        <a href="/contact/" class="btn btn-accent btn-lg">Schedule Free Assessment</a>
        <a href="/services/flooring-installation/" class="btn btn-outline-white btn-lg">New Flooring Instead</a>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="sff-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-primary)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg)"/>
    </svg>
  </div>

  <!-- ══ FAQ ════════════════════════════════════════════════════ -->
  <section class="sff-faq" aria-labelledby="sff-faq-heading">
    <div class="container">
      <div class="sff-faq-header" data-animate="fade-up">
        <span class="sff-eyebrow">Common Questions</span>
        <h2 id="sff-faq-heading">Floor Refinishing Questions — <span class="text-accent">Answered Directly</span></h2>
      </div>
      <div class="sff-faq-list">
        <?php foreach ($pageFaqs as $idx => $faq): ?>
        <div class="sff-faq-item">
          <button class="faq-question" aria-expanded="false" aria-controls="sff-faq-<?php echo $idx; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="sff-faq-<?php echo $idx; ?>" role="region">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="sff-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,30 C300,0 900,60 1200,30 L1200,60 L0,60 Z" fill="var(--color-bg)"/>
      <path d="M0,30 C300,0 900,60 1200,30 L1200,0 L0,0 Z" fill="var(--color-bg-alt)"/>
    </svg>
  </div>

  <!-- ══ RELATED SERVICES ══════════════════════════════════════ -->
  <section class="sff-related" aria-label="Related services">
    <div class="container">
      <div class="sff-related-header" data-animate="fade-up">
        <span class="sff-eyebrow">Keep Going</span>
        <h2>Other Services You May Need</h2>
      </div>
      <div class="services-grid">

        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo06']; ?>" alt="Professional flooring installation Bowdon Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Flooring Installation</h3>
            <p class="service-card__desc">New tile, LVP, and hardwood flooring installed — all materials, all rooms.</p>
            <ul>
              <li>All material types installed</li>
              <li>Subfloor prep included</li>
              <li>2–5 day project timelines</li>
            </ul>
            <a href="/services/flooring-installation/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo08']; ?>" alt="LVP flooring installation Carroll County Georgia" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="grid-2x2"></i></div>
            <h3>LVP Flooring</h3>
            <p class="service-card__desc">Luxury vinyl plank — waterproof, humidity-stable, and ready over concrete slabs.</p>
            <ul>
              <li>$3–$8 per sq ft installed</li>
              <li>Best option for Georgia humidity</li>
              <li>Same-day traffic after install</li>
            </ul>
            <a href="/services/lvp-flooring/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <img src="<?php echo $clientPhotos['photo15']; ?>" alt="Home upgrade services Gray Tile Bowdon GA" width="600" height="360" loading="lazy">
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="sparkles"></i></div>
            <h3>Home Upgrades</h3>
            <p class="service-card__desc">Targeted improvements that transform individual rooms in under a week.</p>
            <ul>
              <li>Tile, flooring, fixtures</li>
              <li>Most upgrades in 3–7 days</li>
              <li>No full remodel required</li>
            </ul>
            <a href="/services/home-upgrades/" class="service-card__cta">Learn more</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── Divider ─────────────────────────────────────────────── -->
  <div class="sff-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <polygon points="0,0 1200,0 1200,60 0,0" fill="var(--color-bg-alt)"/>
      <polygon points="0,0 1200,60 0,60" fill="var(--color-bg-dark)"/>
    </svg>
  </div>

  <!-- ══ CLOSING CTA ════════════════════════════════════════════ -->
  <section class="sff-closing" aria-label="Closing call to action">
    <div class="container">
      <div data-animate="fade-up">
        <span class="sff-eyebrow" style="background:rgba(var(--color-accent-rgb),0.15);">Ready to Restore?</span>
        <h2>Your Old Floors Are Worth Saving</h2>
        <p class="prose-centered">
          Free assessment. We check your floors, confirm refinishability, and give you a fixed price for the job — in your Bowdon home, no charge, no commitment required.
        </p>
        <div class="sff-cta-btn-group">
          <a href="/contact/" class="btn btn-accent btn-lg">Schedule Free Assessment</a>
          <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="btn btn-outline-white btn-lg">Call <?php echo htmlspecialchars(formatPhone($phone)); ?></a>
        </div>
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
