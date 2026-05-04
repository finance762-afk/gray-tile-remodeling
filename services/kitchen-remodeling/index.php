<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Kitchen Remodeling in Bowdon, GA | Gray Tile & Remodeling';
$pageDescription = 'Full kitchen remodels in Bowdon, GA — custom tile, cabinets, countertops & layout redesign. 25 years of West Georgia kitchen renovations. Free estimates, Carroll County.';
$canonicalUrl    = $siteUrl . '/services/kitchen-remodeling/';
$ogImage         = $clientPhotos['photo01'];
$heroPreloadImage = $clientPhotos['photo01'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'kitchen-remodeling') { $currentService = $svc; break; }
}

$pageFaqs = [
    [
        'q' => 'How much does a kitchen remodel cost in Bowdon, GA?',
        'a' => 'Kitchen remodels in Bowdon and Carroll County typically range from $18,000–$75,000 depending on scope. A cosmetic refresh (new tile, fixtures, paint) runs $18,000–$28,000. A full gut-and-rebuild with new cabinets, countertops, appliances, and layout changes runs $45,000–$75,000 for most Bowdon homes. We provide itemized written estimates before any work begins.',
    ],
    [
        'q' => 'How long does a full kitchen remodel take?',
        'a' => 'A standard Bowdon kitchen remodel takes 4–8 weeks from demo to final walkthrough. Projects requiring custom cabinetry add 2–3 weeks for fabrication. Layout changes involving moving plumbing or electrical require Carroll County permits, which add 5–10 business days for inspection scheduling. We build these timelines into the project schedule so you\'re not surprised mid-project.',
    ],
    [
        'q' => 'What tile options work best for kitchen floors and backsplashes in Georgia?',
        'a' => 'Porcelain tile is the best choice for Georgia kitchen floors — it handles moisture, won\'t crack in temperature swings, and cleans up easily. For backsplashes, ceramic subway tile is the most durable and cost-effective option, while large-format porcelain slabs give a high-end look with fewer grout joints to maintain. We stock samples and can help you select material that matches your cabinet finish and countertop before committing.',
    ],
    [
        'q' => 'What does a full kitchen remodel include with Gray Tile & Remodeling?',
        'a' => 'A full kitchen remodel includes: demo and haul-off of existing materials, structural work if layout changes are needed, rough plumbing and electrical (or coordination with licensed subcontractors), new cabinets and countertops, tile backsplash and flooring installation, fixture installation, and final punch-list. We handle Carroll County permits for any structural or plumbing/electrical work and provide documentation for your home\'s permit file.',
    ],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   KITCHEN REMODELING — Gray Tile & Remodeling
   Page-specific styles (km- prefix). All values use var() tokens.
   ================================================================ */

/* ── 1. Hero ─────────────────────────────────────────────────── */
.km-hero {
  position: relative;
  min-height: 65vh;
  display: flex;
  align-items: flex-end;
  overflow: hidden;
  background-size: cover;
  background-position: center 40%;
  background-repeat: no-repeat;
  animation: km-kenburns 22s ease-in-out infinite alternate;
}
@keyframes km-kenburns {
  from { background-size: 110%; background-position: center 38%; }
  to   { background-size: 122%; background-position: center 44%; }
}
.km-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    155deg,
    rgba(var(--color-primary-dark-rgb), 0.92) 0%,
    rgba(var(--color-primary-rgb), 0.72) 45%,
    rgba(var(--color-accent-rgb), 0.18) 100%
  );
  z-index: 1;
}
.km-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5;
  z-index: 2;
  pointer-events: none;
}
.km-hero-inner {
  position: relative;
  z-index: 3;
  width: 100%;
  padding: var(--space-4xl) var(--space-lg);
}
.km-hero-content {
  max-width: 760px;
}
.km-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: rgba(var(--color-accent-rgb), 0.15);
  color: var(--color-accent);
  font-family: var(--font-body);
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.13em;
  text-transform: uppercase;
  padding: 5px 14px;
  border-radius: 100px;
  margin-bottom: var(--space-lg);
  border: 1px solid rgba(var(--color-accent-rgb), 0.3);
}
.km-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.4rem, 5.8vw, 4.2rem);
  font-weight: 800;
  line-height: 1.1;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-white);
  margin-bottom: var(--space-lg);
}
.km-hero h1 .km-gradient {
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.9) 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
.km-hero-sub {
  font-family: var(--font-body);
  font-size: clamp(0.95rem, 2vw, 1.12rem);
  line-height: 1.7;
  color: rgba(255,255,255,0.84);
  max-width: 560px;
  margin-bottom: var(--space-xl);
}
.km-hero-stat {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: rgba(var(--color-accent-rgb), 0.18);
  border: 1px solid rgba(var(--color-accent-rgb), 0.4);
  color: var(--color-accent);
  font-family: var(--font-heading);
  font-size: 0.9rem;
  font-weight: 700;
  letter-spacing: 0.06em;
  padding: 6px 16px;
  border-radius: var(--radius-md);
  margin-bottom: var(--space-xl);
}
.km-hero-actions {
  display: flex;
  align-items: center;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.km-btn-primary {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: var(--color-accent);
  color: var(--color-primary-dark);
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  letter-spacing: 0.04em;
  padding: 14px 28px;
  border-radius: var(--radius-md);
  text-decoration: none;
  box-shadow: 0 4px 0 rgba(var(--color-primary-dark-rgb), 0.5);
  transition: transform var(--transition-fast), box-shadow var(--transition-fast);
  overflow: hidden;
}
.km-btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 0 rgba(var(--color-primary-dark-rgb), 0.5); }
.km-btn-primary:active { transform: translateY(2px); box-shadow: 0 2px 0 rgba(var(--color-primary-dark-rgb), 0.5); }
.km-btn-ghost {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: transparent;
  color: var(--color-white);
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 600;
  padding: 13px 24px;
  border-radius: var(--radius-md);
  border: 2px solid rgba(255,255,255,0.38);
  text-decoration: none;
  transition: background var(--transition-fast), border-color var(--transition-fast);
}
.km-btn-ghost:hover { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.6); }
@media (max-width: 767px) {
  .km-hero { min-height: 52vh; }
  .km-hero-inner { padding: var(--space-3xl) var(--space-md); }
}

/* ── 2. Breadcrumb ───────────────────────────────────────────── */
.km-breadcrumb {
  background: var(--color-bg-alt);
  padding: var(--space-md) 0;
  border-bottom: 1px solid var(--color-gray-light);
}
.km-breadcrumb nav {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-family: var(--font-body);
  font-size: 0.85rem;
  color: var(--color-text-light);
  flex-wrap: wrap;
}
.km-breadcrumb a { color: var(--color-accent); text-decoration: none; transition: color var(--transition-fast); }
.km-breadcrumb a:hover { color: var(--color-primary); }
.km-breadcrumb-sep { color: var(--color-gray-light); }

/* ── 3. Dividers ─────────────────────────────────────────────── */
.km-divider-down {
  position: relative; height: 60px; overflow: hidden; background: var(--color-bg); margin: 0;
}
.km-divider-down::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px;
  background: var(--color-bg-alt); clip-path: polygon(0 100%, 100% 0, 100% 100%);
}
.km-divider-to-bg {
  position: relative; height: 60px; overflow: hidden; background: var(--color-bg-alt); margin: 0;
}
.km-divider-to-bg::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px;
  background: var(--color-bg); clip-path: polygon(0 0, 100% 100%, 0 100%);
}
.km-divider-to-dark {
  position: relative; height: 60px; overflow: hidden; background: var(--color-bg-alt); margin: 0;
}
.km-divider-to-dark::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px;
  background: var(--color-bg-dark); clip-path: polygon(0 100%, 100% 0, 100% 100%);
}
.km-divider-from-dark {
  position: relative; height: 60px; overflow: hidden; background: var(--color-bg-dark); margin: 0;
}
.km-divider-from-dark::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px;
  background: var(--color-bg); clip-path: polygon(0 0, 100% 100%, 0 100%);
}
.km-divider-wave {
  position: relative; height: 70px; overflow: hidden; background: var(--color-bg); margin: 0;
}
.km-divider-wave::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 70px;
  background: var(--color-bg-alt);
  clip-path: ellipse(55% 100% at 50% 100%);
}

/* ── 4. Shared section label ─────────────────────────────────── */
.km-section-eyebrow {
  display: inline-block;
  font-family: var(--font-body);
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}

/* ── 5. Intro Split Section ──────────────────────────────────── */
.km-intro {
  background: var(--color-bg);
  padding: var(--section-pad);
}
.km-intro-split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: center;
}
.km-intro-content {}
.km-intro-content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.75rem, 3.8vw, 2.6rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-primary);
  margin-bottom: var(--space-lg);
}
.km-intro-content h2 .km-accent { color: var(--color-accent); }
.km-intro-content p {
  font-family: var(--font-body);
  font-size: 0.97rem;
  line-height: 1.72;
  color: var(--color-text-light);
  max-width: 65ch;
  margin-bottom: var(--space-md);
}
.km-intro-meta {
  display: flex;
  align-items: center;
  gap: var(--space-lg);
  flex-wrap: wrap;
  margin-top: var(--space-lg);
  padding-top: var(--space-lg);
  border-top: 1px solid var(--color-gray-light);
}
.km-intro-meta-item {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-family: var(--font-body);
  font-size: 0.88rem;
  color: var(--color-text-light);
}
.km-intro-meta-item svg { flex-shrink: 0; }
.km-intro-photo-col {
  position: relative;
}
.km-intro-photo-wrap {
  position: relative;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  aspect-ratio: 4/5;
}
.km-intro-photo-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform var(--transition-slow);
}
.km-intro-photo-wrap:hover img { transform: scale(1.04); }
.km-intro-badge {
  position: absolute;
  bottom: var(--space-lg);
  right: var(--space-lg);
  background: var(--color-accent);
  color: var(--color-primary-dark);
  font-family: var(--font-heading);
  font-size: 0.95rem;
  font-weight: 800;
  padding: var(--space-sm) var(--space-md);
  border-radius: var(--radius-md);
  text-align: center;
  line-height: 1.3;
  box-shadow: var(--shadow-lg);
}
@media (max-width: 1023px) {
  .km-intro-split { grid-template-columns: 1fr; gap: var(--space-2xl); }
  .km-intro-photo-col { order: -1; }
  .km-intro-photo-wrap { aspect-ratio: 16/9; }
}

/* ── 6. Signature: Transformation Showcase ───────────────────── */
.km-showcase {
  background: var(--color-bg-alt);
  padding: var(--section-pad);
}
.km-showcase-header {
  text-align: center;
  max-width: 680px;
  margin-inline: auto;
  margin-bottom: var(--space-3xl);
}
.km-showcase-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-primary);
  margin-bottom: var(--space-md);
}
.km-showcase-header h2 .km-accent { color: var(--color-accent); }
.km-showcase-header p {
  font-family: var(--font-body);
  font-size: 1rem;
  line-height: 1.65;
  color: var(--color-text-light);
  max-width: 58ch;
  margin-inline: auto;
}
/* Dark panel split layout — signature section */
.km-showcase-panel {
  display: grid;
  grid-template-columns: 3fr 2fr;
  gap: 0;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  min-height: 540px;
}
.km-showcase-photo {
  position: relative;
  overflow: hidden;
}
.km-showcase-photo img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  min-height: 480px;
  transition: transform var(--transition-slow);
}
.km-showcase-panel:hover .km-showcase-photo img { transform: scale(1.03); }
.km-showcase-photo::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(to right, transparent 55%, rgba(var(--color-primary-dark-rgb), 0.65) 100%);
}
.km-showcase-content {
  background: var(--color-primary-dark);
  padding: var(--space-3xl) var(--space-2xl);
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: var(--space-lg);
  position: relative;
}
.km-showcase-content::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5;
  pointer-events: none;
}
.km-showcase-content > * { position: relative; z-index: 1; }
.km-showcase-content h3 {
  font-family: var(--font-heading);
  font-size: clamp(1.4rem, 2.5vw, 1.9rem);
  font-weight: 800;
  line-height: 1.2;
  color: var(--color-white);
  text-wrap: balance;
  margin: 0;
}
.km-showcase-content h3 .km-accent-light { color: var(--color-accent); }
.km-scope-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
}
.km-scope-list li {
  display: flex;
  align-items: flex-start;
  gap: var(--space-sm);
  font-family: var(--font-body);
  font-size: 0.9rem;
  color: rgba(255,255,255,0.82);
  line-height: 1.5;
}
.km-scope-list li svg {
  flex-shrink: 0;
  width: 16px;
  height: 16px;
  stroke: var(--color-accent);
  margin-top: 2px;
}
.km-showcase-roi {
  background: rgba(var(--color-accent-rgb), 0.12);
  border: 1px solid rgba(var(--color-accent-rgb), 0.3);
  border-radius: var(--radius-md);
  padding: var(--space-md);
  text-align: center;
}
.km-roi-num {
  display: block;
  font-family: var(--font-heading);
  font-size: 2.4rem;
  font-weight: 800;
  color: var(--color-accent);
  line-height: 1;
}
.km-roi-label {
  display: block;
  font-family: var(--font-body);
  font-size: 0.8rem;
  color: rgba(255,255,255,0.7);
  letter-spacing: 0.06em;
  text-transform: uppercase;
  margin-top: var(--space-xs);
}
@media (max-width: 1023px) {
  .km-showcase-panel { grid-template-columns: 1fr; }
  .km-showcase-photo img { min-height: 280px; }
  .km-showcase-content { padding: var(--space-2xl) var(--space-xl); }
}

/* ── 7. Process Steps ────────────────────────────────────────── */
.km-process {
  background: var(--color-bg);
  padding: var(--section-pad);
}
.km-process-header {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.km-process-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
}
.km-process-header h2 .km-accent { color: var(--color-accent); }
.km-process-header p {
  font-family: var(--font-body);
  font-size: 1rem;
  line-height: 1.65;
  color: var(--color-text-light);
  max-width: 55ch;
  margin-inline: auto;
}
.km-steps-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: var(--space-lg);
  position: relative;
}
.km-steps-grid::before {
  content: '';
  position: absolute;
  top: 30px;
  left: calc(10% + 16px);
  right: calc(10% + 16px);
  height: 2px;
  background: linear-gradient(to right, var(--color-accent), rgba(var(--color-accent-rgb), 0.1));
  z-index: 0;
}
.km-step {
  text-align: center;
  position: relative;
  z-index: 1;
}
.km-step-num {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background: var(--color-primary);
  color: var(--color-white);
  font-family: var(--font-heading);
  font-size: 1.4rem;
  font-weight: 800;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-md);
  border: 3px solid var(--color-accent);
  box-shadow: var(--shadow-md);
}
.km-step h3 {
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: var(--space-xs);
  text-wrap: balance;
}
.km-step p {
  font-family: var(--font-body);
  font-size: 0.85rem;
  line-height: 1.55;
  color: var(--color-text-light);
  max-width: 18ch;
  margin-inline: auto;
}
@media (max-width: 1023px) {
  .km-steps-grid { grid-template-columns: repeat(3, 1fr); }
  .km-steps-grid::before { display: none; }
}
@media (max-width: 600px) {
  .km-steps-grid { grid-template-columns: 1fr 1fr; }
}

/* ── 8. Mid-Page CTA Banner ──────────────────────────────────── */
.km-cta-banner {
  position: relative;
  background: linear-gradient(140deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  padding: var(--space-4xl) var(--space-lg);
  text-align: center;
  overflow: hidden;
}
.km-cta-banner::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5;
  pointer-events: none;
}
.km-cta-inner {
  position: relative;
  z-index: 1;
  max-width: 680px;
  margin-inline: auto;
}
.km-cta-inner h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  color: var(--color-white);
  text-wrap: balance;
  letter-spacing: -0.01em;
  margin-bottom: var(--space-md);
}
.km-cta-inner h2 .km-accent { color: var(--color-accent); }
.km-cta-inner p {
  font-family: var(--font-body);
  font-size: 1.05rem;
  line-height: 1.62;
  color: rgba(255,255,255,0.82);
  margin-bottom: var(--space-xl);
  max-width: 55ch;
  margin-inline: auto;
}
.km-cta-inner a.km-btn-cta {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: var(--color-accent);
  color: var(--color-primary-dark);
  font-family: var(--font-heading);
  font-size: 1.1rem;
  font-weight: 700;
  padding: 14px 32px;
  border-radius: var(--radius-md);
  text-decoration: none;
  box-shadow: 0 4px 0 rgba(0,0,0,0.3);
  transition: transform var(--transition-fast), box-shadow var(--transition-fast);
}
.km-cta-inner a.km-btn-cta:hover { transform: translateY(-2px); box-shadow: 0 6px 0 rgba(0,0,0,0.3); }
.km-phone-link {
  display: block;
  margin-top: var(--space-md);
  font-family: var(--font-heading);
  font-size: 1.25rem;
  font-weight: 700;
  color: rgba(255,255,255,0.9);
  text-decoration: none;
  letter-spacing: 0.03em;
  transition: color var(--transition-fast);
}
.km-phone-link:hover { color: var(--color-accent); }

/* ── 9. FAQ ──────────────────────────────────────────────────── */
.km-faq {
  background: var(--color-bg);
  padding: var(--section-pad);
}
.km-faq-header {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.km-faq-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
}
.km-faq-header h2 .km-accent { color: var(--color-accent); }
.km-faq-list {
  max-width: 760px;
  margin-inline: auto;
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
}
.km-faq-item {
  border-radius: var(--radius-md);
  border: 1px solid var(--color-gray-light);
  overflow: hidden;
  background: var(--color-bg-alt);
}
.km-faq-q {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: var(--space-md);
  width: 100%;
  padding: var(--space-lg);
  background: none;
  border: none;
  cursor: pointer;
  text-align: left;
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--color-primary);
  transition: background var(--transition-fast);
}
.km-faq-q:hover { background: rgba(var(--color-accent-rgb), 0.05); }
.km-faq-q svg { flex-shrink: 0; stroke: var(--color-accent); transition: transform var(--transition-fast); }
.km-faq-item.open .km-faq-q svg { transform: rotate(180deg); }
.km-faq-a {
  display: none;
  padding: 0 var(--space-lg) var(--space-lg);
  font-family: var(--font-body);
  font-size: 0.95rem;
  line-height: 1.72;
  color: var(--color-text-light);
  max-width: 65ch;
}
.km-faq-item.open .km-faq-a { display: block; }

/* ── 10. Related Services ─────────────────────────────────────── */
.km-related {
  background: var(--color-bg-alt);
  padding: var(--section-pad);
}
.km-related-header {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.km-related-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 3.5vw, 2.4rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  color: var(--color-primary);
}
.km-related-header h2 .km-accent { color: var(--color-accent); }

/* ── 11. Closing CTA ─────────────────────────────────────────── */
.km-closing {
  background: var(--color-bg-dark);
  padding: var(--space-4xl) var(--space-lg);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.km-closing::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 70% 30%, rgba(var(--color-accent-rgb), 0.1) 0%, transparent 60%);
  pointer-events: none;
}
.km-closing-inner {
  position: relative;
  z-index: 1;
  max-width: 640px;
  margin-inline: auto;
}
.km-closing-inner h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  color: var(--color-white);
  text-wrap: balance;
  letter-spacing: -0.01em;
  margin-bottom: var(--space-md);
}
.km-closing-inner p {
  font-family: var(--font-body);
  font-size: 1rem;
  color: rgba(255,255,255,0.75);
  margin-bottom: var(--space-xl);
  max-width: 55ch;
  margin-inline: auto;
  line-height: 1.65;
}

/* ── 12. Mobile padding overrides ─────────────────────────────── */
@media (max-width: 767px) {
  .km-intro, .km-showcase, .km-process,
  .km-faq, .km-related, .km-closing { padding: var(--section-pad-mobile); }
  .km-cta-banner { padding: var(--space-3xl) var(--space-md); }
}
</style>

<main id="main-content">

  <!-- ── Hero ─────────────────────────────────────────────────── -->
  <section class="km-hero" style="background-image: url('<?php echo htmlspecialchars($clientPhotos['photo01']); ?>');" aria-label="Kitchen Remodeling hero">
    <div class="km-hero-inner container">
      <div class="km-hero-content" data-animate="fade-up">
        <span class="km-eyebrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          Bowdon, GA &amp; Carroll County
        </span>
        <h1>Kitchen Remodeling<br><span class="km-gradient">Built for Real Life</span></h1>
        <div class="km-hero-stat">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
          Kitchen ROI: 80% — Top Home Investment in Georgia
        </div>
        <p class="km-hero-sub">Complete kitchen renovations in Bowdon, GA — from layout redesign and tile work to custom cabinetry and final trim. We've remodeled kitchens across Carroll County for <?php echo $yearsInBusiness; ?> years.</p>
        <div class="km-hero-actions">
          <a href="/contact/" class="km-btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
            Get a Free Estimate
          </a>
          <a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>" class="km-btn-ghost">Call <?php echo htmlspecialchars($phone); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Breadcrumb ────────────────────────────────────────────── -->
  <div class="km-breadcrumb">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span class="km-breadcrumb-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="km-breadcrumb-sep" aria-hidden="true">›</span>
        <span aria-current="page">Kitchen Remodeling</span>
      </nav>
    </div>
  </div>

  <!-- ── Intro Split ───────────────────────────────────────────── -->
  <section class="km-intro" aria-labelledby="km-intro-heading">
    <div class="container">
      <div class="km-intro-split">

        <div class="km-intro-content" data-animate="fade-up">
          <span class="km-section-eyebrow">Kitchen Remodeling in Bowdon, GA</span>
          <h2 id="km-intro-heading">$18K–$75K. <span class="km-accent">4–8 Weeks.</span> Done Right.</h2>
          <p>A kitchen remodel in Bowdon typically costs $18,000–$75,000 depending on scope. A cosmetic refresh — new tile backsplash, countertops, hardware, and paint — runs on the lower end. A full gut-and-rebuild with layout changes, new cabinetry, and plumbing moves sits at the upper end. We give you an itemized written estimate before any demo begins.</p>
          <p>Most kitchens in Carroll County homes built before 2000 weren't designed for modern cooking habits — narrow galley layouts, inadequate outlet count, and surfaces that show every scratch. We redesign around how you actually use the kitchen, not around what was easiest to build in 1985.</p>
          <p>Our kitchen work includes tile backsplash and flooring, cabinet installation, countertop fabrication and install, lighting updates, and plumbing fixture swaps. Structural changes — moving walls, relocating the sink — require Carroll County permits, which we handle as part of the project.</p>
          <div class="km-intro-meta">
            <span class="km-intro-meta-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              4–8 weeks typical
            </span>
            <span class="km-intro-meta-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              Carroll County permitted
            </span>
            <span class="km-intro-meta-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
              Licensed &amp; insured, GA
            </span>
          </div>
          <p style="font-family: var(--font-body); font-size: 0.82rem; color: var(--color-text-light); margin-top: var(--space-md);">Last updated: April 2026</p>
        </div>

        <div class="km-intro-photo-col" data-animate="fade-up">
          <div class="km-intro-photo-wrap">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['gallery01']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['gallery01']); ?>" alt="Custom kitchen remodeling in Bowdon GA — tile backsplash, new cabinetry and countertops" width="800" height="1000" loading="lazy">
            </picture>
            <div class="km-intro-badge">Kitchen ROI<br>avg. 80%</div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="km-divider-down" aria-hidden="true"></div>

  <!-- ── Signature: Transformation Showcase ────────────────────── -->
  <section class="km-showcase" aria-labelledby="km-showcase-heading">
    <div class="container">
      <div class="km-showcase-header" data-animate="fade-up">
        <span class="km-section-eyebrow">What's Included</span>
        <h2 id="km-showcase-heading">A Full Kitchen Remodel<br><span class="km-accent">Isn't Just Countertops</span></h2>
        <p>Most homeowners underestimate scope because they're focused on visible finishes. Here's what a complete Bowdon kitchen remodel actually includes — and why every layer matters.</p>
      </div>
      <div class="km-showcase-panel" data-animate="fade-up">
        <div class="km-showcase-photo">
          <picture>
            <source srcset="<?php echo htmlspecialchars($clientPhotos['photo01']); ?>" type="image/jpeg">
            <img src="<?php echo htmlspecialchars($clientPhotos['photo01']); ?>" alt="Kitchen remodel in progress in Bowdon GA showing tile flooring and custom cabinetry installation" width="900" height="680" loading="lazy">
          </picture>
        </div>
        <div class="km-showcase-content">
          <h3>Everything Inside the<br><span class="km-accent-light">Kitchen Walls</span></h3>
          <ul class="km-scope-list">
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              Demo &amp; haul-off of existing finishes
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              Porcelain or tile flooring installation
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              Custom tile backsplash with grout selection
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              Cabinet installation (new or refacing)
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              Countertop fabrication &amp; installation
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              Plumbing fixture swap or relocation
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              Carroll County permits for structural work
            </li>
          </ul>
          <div class="km-showcase-roi">
            <span class="km-roi-num">80%</span>
            <span class="km-roi-label">Average Kitchen ROI — Georgia</span>
          </div>
          <a href="/contact/" class="km-btn-primary" style="align-self: flex-start;">Start Planning Your Kitchen →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="km-divider-to-bg" aria-hidden="true"></div>

  <!-- ── Process Steps ────────────────────────────────────────── -->
  <section class="km-process" aria-labelledby="km-process-heading">
    <div class="container">
      <div class="km-process-header" data-animate="fade-up">
        <span class="km-section-eyebrow">How It Works</span>
        <h2 id="km-process-heading">From First Call to<br><span class="km-accent">Final Walkthrough</span></h2>
        <p class="prose prose-centered">We've refined this process across hundreds of Carroll County kitchens. Every step exists because skipping it created a problem on a past project.</p>
      </div>
      <div class="km-steps-grid" data-animate="fade-up">
        <div class="km-step">
          <div class="km-step-num">1</div>
          <h3>On-Site Estimate</h3>
          <p>We visit, measure, and assess existing conditions before quoting anything.</p>
        </div>
        <div class="km-step">
          <div class="km-step-num">2</div>
          <h3>Design Selection</h3>
          <p>Tile, cabinet, countertop, and hardware samples reviewed together.</p>
        </div>
        <div class="km-step">
          <div class="km-step-num">3</div>
          <h3>Permits Pulled</h3>
          <p>Carroll County permits secured before demo starts — no shortcuts.</p>
        </div>
        <div class="km-step">
          <div class="km-step-num">4</div>
          <h3>Demo &amp; Rough Work</h3>
          <p>Existing kitchen removed, structural and mechanical work completed first.</p>
        </div>
        <div class="km-step">
          <div class="km-step-num">5</div>
          <h3>Finish &amp; Punch List</h3>
          <p>Tile, cabinets, countertops, fixtures — final walkthrough before close-out.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="km-divider-to-dark" aria-hidden="true"></div>

  <!-- ── Mid-Page CTA Banner ───────────────────────────────────── -->
  <section class="km-cta-banner" aria-label="Get a kitchen remodeling estimate">
    <div class="km-cta-inner" data-animate="fade-up">
      <h2>Your Kitchen.<br><span class="km-accent">Free Estimate This Week.</span></h2>
      <p>We visit Bowdon, Carrollton, Villa Rica, Bremen, and surrounding Carroll County homes. On-site estimates are free, written, and itemized — no pressure, no vague ballparks.</p>
      <a href="/contact/" class="km-btn-cta">Get Your Free Kitchen Estimate →</a>
      <a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>" class="km-phone-link"><?php echo htmlspecialchars($phone); ?> — Call or Text</a>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="km-divider-from-dark" aria-hidden="true"></div>

  <!-- ── FAQ ──────────────────────────────────────────────────── -->
  <section class="km-faq" aria-labelledby="km-faq-heading">
    <div class="container">
      <div class="km-faq-header" data-animate="fade-up">
        <span class="km-section-eyebrow">Common Questions</span>
        <h2 id="km-faq-heading">Kitchen Remodeling in Bowdon — <span class="km-accent">Answered</span></h2>
      </div>
      <div class="km-faq-list" data-animate="fade-up">
        <?php foreach ($pageFaqs as $i => $faq): ?>
        <div class="km-faq-item" id="km-faq-<?php echo $i; ?>">
          <button class="km-faq-q faq-question" aria-expanded="false" aria-controls="km-faq-a-<?php echo $i; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="km-faq-a" id="km-faq-a-<?php echo $i; ?>" role="region">
            <?php echo htmlspecialchars($faq['a']); ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="km-divider-wave" aria-hidden="true"></div>

  <!-- ── Related Services ──────────────────────────────────────── -->
  <section class="km-related" aria-labelledby="km-related-heading">
    <div class="container">
      <div class="km-related-header" data-animate="fade-up">
        <span class="km-section-eyebrow">Keep Exploring</span>
        <h2 id="km-related-heading">Other Services You <span class="km-accent">May Need</span></h2>
      </div>
      <div class="services-grid" data-animate="fade-up">

        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo02']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo02']); ?>" alt="Bathroom remodeling in Bowdon GA — custom tile and fixtures" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="bath"></i></div>
            <h3>Bathroom Remodeling</h3>
            <p class="service-card__desc">Complete bathroom renovations from tile to fixtures throughout Bowdon, GA.</p>
            <ul>
              <li>Custom tile showers &amp; tub surrounds</li>
              <li>Vanity and fixture replacement</li>
              <li>2–4 weeks typical timeline</li>
            </ul>
            <a href="/services/bathroom-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo10']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo10']); ?>" alt="Custom tile shower installation in Bowdon GA" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="droplets"></i></div>
            <h3>Custom Tile Showers</h3>
            <p class="service-card__desc">Specialty tile shower builds with certified waterproofing systems.</p>
            <ul>
              <li>Schluter KERDI waterproofing</li>
              <li>Large format tile up to 48×48"</li>
              <li>Built-in niches and benches</li>
            </ul>
            <a href="/services/custom-tile-showers/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo08']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo08']); ?>" alt="Flooring installation in Bowdon GA — tile and LVP throughout" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Flooring Services</h3>
            <p class="service-card__desc">Tile, LVP, and hardwood flooring for every room in your Bowdon home.</p>
            <ul>
              <li>Porcelain, ceramic, and LVP</li>
              <li>Subfloor prep included</li>
              <li>Pattern and diagonal layouts</li>
            </ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── Closing CTA ───────────────────────────────────────────── -->
  <section class="km-closing" aria-label="Start your kitchen remodel">
    <div class="km-closing-inner" data-animate="fade-up">
      <span class="km-section-eyebrow" style="color: var(--color-accent);">Ready to Start?</span>
      <h2>Your Kitchen.<br>Our <?php echo $yearsInBusiness; ?> Years.</h2>
      <p>We've remodeled kitchens across Bowdon, Carrollton, Villa Rica, Bremen, and Carroll County since <?php echo $yearEstablished; ?>. Free on-site estimates. Written quotes. No project started until you've approved every line item.</p>
      <a href="/contact/" class="km-btn-primary">Schedule a Free Estimate →</a>
    </div>
  </section>

</main>

<script>
(function () {
  document.querySelectorAll('.km-faq-q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = this.closest('.km-faq-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.km-faq-item.open').forEach(function (el) {
        el.classList.remove('open');
        el.querySelector('.km-faq-q').setAttribute('aria-expanded', 'false');
      });
      if (!isOpen) {
        item.classList.add('open');
        this.setAttribute('aria-expanded', 'true');
      }
    });
  });
}());
</script>
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" defer></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  if (typeof lucide !== 'undefined') lucide.createIcons();
});
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
