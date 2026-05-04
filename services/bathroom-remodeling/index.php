<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Bathroom Remodeling in Bowdon, GA | Gray Tile & Remodeling';
$pageDescription = 'Custom bathroom remodels in Bowdon, GA — tile showers, vanities, waterproofing & full gut renovations. 2–4 weeks typical. 25 years serving Carroll County. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/bathroom-remodeling/';
$ogImage         = $clientPhotos['photo02'];
$heroPreloadImage = $clientPhotos['photo02'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'bathroom-remodeling') { $currentService = $svc; break; }
}

$pageFaqs = [
    [
        'q' => 'How much does a bathroom remodel cost in Bowdon, GA?',
        'a' => 'Bathroom remodels in Bowdon and Carroll County typically run $8,500–$35,000. A half-bath refresh (new vanity, tile floor, fixtures) starts around $8,500. A full master bath gut — custom tile shower, new tub surround, double vanity, heated floor — runs $22,000–$35,000 for most Bowdon homes. We provide written, itemized estimates before any work begins.',
    ],
    [
        'q' => 'How long does a bathroom remodel take?',
        'a' => 'Most Bowdon bathroom remodels take 2–4 weeks from demo to final walk-through. Simple cosmetic refreshes run closer to 2 weeks. Full gut-and-rebuilds with custom tile showers require 3–4 weeks including waterproofing cure time. We build permit lead time into the schedule so inspections don\'t delay finish work.',
    ],
    [
        'q' => 'What tile options are best for Bowdon bathrooms?',
        'a' => 'Porcelain tile is our recommendation for all wet areas — shower floors, shower walls, and bathroom floors. It absorbs less than 0.5% moisture, won\'t crack in Georgia\'s temperature swings, and holds up in Carroll County\'s humid summers. For shower walls specifically, large-format porcelain (12×24" or larger) means fewer grout joints and less maintenance over time. We carry samples and can match your vanity finish before you commit.',
    ],
    [
        'q' => 'Do you handle waterproofing in tile showers?',
        'a' => 'Yes — and it\'s the most important step most contractors skip. Every shower we build uses a certified waterproofing membrane (Schluter KERDI or equivalent) behind the tile. Painted-on waterproofing and sheet plastic are cost-cutting measures that fail in Georgia\'s humidity within 5–8 years. Our waterproofing systems are third-party tested and warrantied for wet-area applications.',
    ],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   BATHROOM REMODELING — Gray Tile & Remodeling
   Page-specific styles (bmr- prefix). All values use var() tokens.
   ================================================================ */

/* ── 1. Hero ─────────────────────────────────────────────────── */
.bmr-hero {
  position: relative;
  min-height: 65vh;
  display: flex;
  align-items: flex-end;
  overflow: hidden;
  background-size: cover;
  background-position: center 35%;
  background-repeat: no-repeat;
  animation: bmr-kenburns 24s ease-in-out infinite alternate;
}
@keyframes bmr-kenburns {
  from { background-size: 108%; background-position: center 33%; }
  to   { background-size: 120%; background-position: center 40%; }
}
.bmr-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to top,
    rgba(var(--color-primary-dark-rgb), 0.95) 0%,
    rgba(var(--color-primary-rgb), 0.68) 50%,
    rgba(var(--color-primary-rgb), 0.32) 100%
  );
  z-index: 1;
}
.bmr-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5;
  z-index: 2;
  pointer-events: none;
}
.bmr-hero-inner {
  position: relative;
  z-index: 3;
  width: 100%;
  padding: var(--space-4xl) var(--space-lg);
}
.bmr-hero-content { max-width: 720px; }
.bmr-eyebrow {
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
.bmr-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.4rem, 5.8vw, 4rem);
  font-weight: 800;
  line-height: 1.1;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-white);
  margin-bottom: var(--space-lg);
}
.bmr-hero h1 .bmr-gradient {
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.88) 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
.bmr-hero-stat {
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
.bmr-hero-sub {
  font-family: var(--font-body);
  font-size: clamp(0.95rem, 2vw, 1.12rem);
  line-height: 1.7;
  color: rgba(255,255,255,0.84);
  max-width: 540px;
  margin-bottom: var(--space-xl);
}
.bmr-hero-actions {
  display: flex;
  align-items: center;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.bmr-btn-primary {
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
.bmr-btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 0 rgba(var(--color-primary-dark-rgb), 0.5); }
.bmr-btn-primary:active { transform: translateY(2px); box-shadow: 0 2px 0 rgba(var(--color-primary-dark-rgb), 0.5); }
.bmr-btn-ghost {
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
.bmr-btn-ghost:hover { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.6); }
@media (max-width: 767px) {
  .bmr-hero { min-height: 52vh; }
  .bmr-hero-inner { padding: var(--space-3xl) var(--space-md); }
}

/* ── 2. Breadcrumb ───────────────────────────────────────────── */
.bmr-breadcrumb {
  background: var(--color-bg-alt);
  padding: var(--space-md) 0;
  border-bottom: 1px solid var(--color-gray-light);
}
.bmr-breadcrumb nav {
  display: flex; align-items: center; gap: var(--space-sm);
  font-family: var(--font-body); font-size: 0.85rem; color: var(--color-text-light); flex-wrap: wrap;
}
.bmr-breadcrumb a { color: var(--color-accent); text-decoration: none; transition: color var(--transition-fast); }
.bmr-breadcrumb a:hover { color: var(--color-primary); }
.bmr-breadcrumb-sep { color: var(--color-gray-light); }

/* ── 3. Dividers ─────────────────────────────────────────────── */
.bmr-divider-down { position: relative; height: 60px; overflow: hidden; background: var(--color-bg); margin: 0; }
.bmr-divider-down::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg-alt); clip-path: polygon(0 100%, 100% 0, 100% 100%); }
.bmr-divider-to-bg { position: relative; height: 60px; overflow: hidden; background: var(--color-bg-alt); margin: 0; }
.bmr-divider-to-bg::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg); clip-path: polygon(0 0, 100% 100%, 0 100%); }
.bmr-divider-to-dark { position: relative; height: 60px; overflow: hidden; background: var(--color-bg); margin: 0; }
.bmr-divider-to-dark::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg-dark); clip-path: polygon(0 100%, 100% 0, 100% 100%); }
.bmr-divider-from-dark { position: relative; height: 60px; overflow: hidden; background: var(--color-bg-dark); margin: 0; }
.bmr-divider-from-dark::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg-alt); clip-path: polygon(0 0, 100% 100%, 0 100%); }
.bmr-divider-alt { position: relative; height: 60px; overflow: hidden; background: var(--color-bg-alt); margin: 0; }
.bmr-divider-alt::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg); clip-path: polygon(0 100%, 100% 0, 100% 100%); }

/* ── 4. Shared eyebrow label ─────────────────────────────────── */
.bmr-section-eyebrow {
  display: inline-block;
  font-family: var(--font-body); font-size: 0.78rem; font-weight: 700;
  letter-spacing: 0.14em; text-transform: uppercase;
  color: var(--color-accent); margin-bottom: var(--space-sm);
}

/* ── 5. Intro Split ──────────────────────────────────────────── */
.bmr-intro {
  background: var(--color-bg);
  padding: var(--section-pad);
}
.bmr-intro-split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: center;
}
.bmr-intro-content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.75rem, 3.8vw, 2.6rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-primary);
  margin-bottom: var(--space-lg);
}
.bmr-intro-content h2 .bmr-accent { color: var(--color-accent); }
.bmr-intro-content p {
  font-family: var(--font-body);
  font-size: 0.97rem;
  line-height: 1.72;
  color: var(--color-text-light);
  max-width: 65ch;
  margin-bottom: var(--space-md);
}
.bmr-intro-meta {
  display: flex;
  align-items: center;
  gap: var(--space-lg);
  flex-wrap: wrap;
  margin-top: var(--space-lg);
  padding-top: var(--space-lg);
  border-top: 1px solid var(--color-gray-light);
}
.bmr-meta-item {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-family: var(--font-body);
  font-size: 0.88rem;
  color: var(--color-text-light);
}
.bmr-intro-photo-wrap {
  position: relative;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  aspect-ratio: 4/5;
}
.bmr-intro-photo-wrap img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform var(--transition-slow); }
.bmr-intro-photo-wrap:hover img { transform: scale(1.04); }
.bmr-intro-badge {
  position: absolute;
  bottom: var(--space-lg); right: var(--space-lg);
  background: var(--color-accent);
  color: var(--color-primary-dark);
  font-family: var(--font-heading); font-size: 0.95rem; font-weight: 800;
  padding: var(--space-sm) var(--space-md);
  border-radius: var(--radius-md); text-align: center; line-height: 1.3;
  box-shadow: var(--shadow-lg);
}
@media (max-width: 1023px) {
  .bmr-intro-split { grid-template-columns: 1fr; gap: var(--space-2xl); }
  .bmr-intro-photo-col { order: -1; }
  .bmr-intro-photo-wrap { aspect-ratio: 16/9; }
}

/* ── 6. Bathroom Types Grid (Signature Section) ──────────────── */
.bmr-types {
  background: var(--color-bg-alt);
  padding: var(--section-pad);
}
.bmr-types-header {
  text-align: center;
  max-width: 680px;
  margin-inline: auto;
  margin-bottom: var(--space-3xl);
}
.bmr-types-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-primary);
  margin-bottom: var(--space-md);
}
.bmr-types-header h2 .bmr-accent { color: var(--color-accent); }
.bmr-types-header p {
  font-family: var(--font-body);
  font-size: 1rem;
  line-height: 1.65;
  color: var(--color-text-light);
  max-width: 58ch;
  margin-inline: auto;
}
.bmr-types-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-md);
}
.bmr-type-card {
  background: var(--color-bg);
  border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg);
  text-align: center;
  border: 1px solid var(--color-gray-light);
  box-shadow: var(--shadow-card);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: var(--space-md);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.bmr-type-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }
.bmr-type-icon {
  width: 62px;
  height: 62px;
  border-radius: 50%;
  background: rgba(var(--color-primary-rgb), 0.07);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.bmr-type-icon svg {
  width: 28px;
  height: 28px;
  stroke: var(--color-primary);
}
.bmr-type-card h3 {
  font-family: var(--font-heading);
  font-size: 1.2rem;
  font-weight: 700;
  color: var(--color-primary);
  margin: 0;
  text-wrap: balance;
}
.bmr-type-range {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  font-weight: 800;
  color: var(--color-accent);
}
.bmr-type-card p {
  font-family: var(--font-body);
  font-size: 0.88rem;
  line-height: 1.6;
  color: var(--color-text-light);
  margin: 0;
  max-width: 22ch;
}
@media (max-width: 1023px) { .bmr-types-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 600px) { .bmr-types-grid { grid-template-columns: 1fr; } }

/* ── 7. Process Steps ────────────────────────────────────────── */
.bmr-process {
  background: var(--color-bg);
  padding: var(--section-pad);
}
.bmr-process-header {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.bmr-process-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
}
.bmr-process-header h2 .bmr-accent { color: var(--color-accent); }
.bmr-process-header p {
  font-family: var(--font-body);
  font-size: 1rem;
  color: var(--color-text-light);
  line-height: 1.65;
  max-width: 52ch;
  margin-inline: auto;
}
.bmr-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl);
  position: relative;
  margin-top: var(--space-3xl);
}
.bmr-steps::before {
  content: '';
  position: absolute;
  top: 30px;
  left: calc(12.5% + 12px);
  right: calc(12.5% + 12px);
  height: 2px;
  background: linear-gradient(to right, var(--color-accent), rgba(var(--color-accent-rgb), 0.1));
  z-index: 0;
}
.bmr-step { text-align: center; position: relative; z-index: 1; }
.bmr-step-num {
  width: 60px; height: 60px; border-radius: 50%;
  background: var(--color-primary); color: var(--color-white);
  font-family: var(--font-heading); font-size: 1.4rem; font-weight: 800;
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-md);
  border: 3px solid var(--color-accent); box-shadow: var(--shadow-md);
}
.bmr-step h3 { font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-xs); text-wrap: balance; }
.bmr-step p { font-family: var(--font-body); font-size: 0.88rem; line-height: 1.55; color: var(--color-text-light); max-width: 20ch; margin-inline: auto; }
@media (max-width: 1023px) { .bmr-steps { grid-template-columns: repeat(2, 1fr); } .bmr-steps::before { display: none; } }
@media (max-width: 600px) { .bmr-steps { grid-template-columns: 1fr; } }

/* ── 8. Mid-Page CTA Banner ──────────────────────────────────── */
.bmr-cta-banner {
  position: relative;
  background: linear-gradient(140deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  padding: var(--space-4xl) var(--space-lg);
  text-align: center;
  overflow: hidden;
}
.bmr-cta-banner::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5; pointer-events: none;
}
.bmr-cta-inner {
  position: relative; z-index: 1;
  max-width: 680px; margin-inline: auto;
}
.bmr-cta-inner h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800; color: var(--color-white);
  text-wrap: balance; letter-spacing: -0.01em; margin-bottom: var(--space-md);
}
.bmr-cta-inner h2 .bmr-accent { color: var(--color-accent); }
.bmr-cta-inner p {
  font-family: var(--font-body);
  font-size: 1.05rem; line-height: 1.62;
  color: rgba(255,255,255,0.82);
  margin-bottom: var(--space-xl);
  max-width: 55ch; margin-inline: auto;
}
.bmr-btn-cta {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: var(--color-accent); color: var(--color-primary-dark);
  font-family: var(--font-heading); font-size: 1.1rem; font-weight: 700;
  padding: 14px 32px; border-radius: var(--radius-md); text-decoration: none;
  box-shadow: 0 4px 0 rgba(0,0,0,0.3);
  transition: transform var(--transition-fast), box-shadow var(--transition-fast);
}
.bmr-btn-cta:hover { transform: translateY(-2px); box-shadow: 0 6px 0 rgba(0,0,0,0.3); }
.bmr-phone-link {
  display: block; margin-top: var(--space-md);
  font-family: var(--font-heading); font-size: 1.25rem; font-weight: 700;
  color: rgba(255,255,255,0.9); text-decoration: none; letter-spacing: 0.03em;
  transition: color var(--transition-fast);
}
.bmr-phone-link:hover { color: var(--color-accent); }

/* ── 9. FAQ ──────────────────────────────────────────────────── */
.bmr-faq { background: var(--color-bg-alt); padding: var(--section-pad); }
.bmr-faq-header { text-align: center; margin-bottom: var(--space-3xl); }
.bmr-faq-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800; line-height: 1.15; text-wrap: balance;
  letter-spacing: -0.02em; color: var(--color-primary); margin-bottom: var(--space-sm);
}
.bmr-faq-header h2 .bmr-accent { color: var(--color-accent); }
.bmr-faq-list { max-width: 760px; margin-inline: auto; display: flex; flex-direction: column; gap: var(--space-sm); }
.bmr-faq-item { border-radius: var(--radius-md); border: 1px solid var(--color-gray-light); overflow: hidden; background: var(--color-bg); }
.bmr-faq-q {
  display: flex; align-items: center; justify-content: space-between; gap: var(--space-md);
  width: 100%; padding: var(--space-lg); background: none; border: none; cursor: pointer;
  text-align: left; font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700;
  color: var(--color-primary); transition: background var(--transition-fast);
}
.bmr-faq-q:hover { background: rgba(var(--color-accent-rgb), 0.05); }
.bmr-faq-q svg { flex-shrink: 0; stroke: var(--color-accent); transition: transform var(--transition-fast); }
.bmr-faq-item.open .bmr-faq-q svg { transform: rotate(180deg); }
.bmr-faq-a {
  display: none; padding: 0 var(--space-lg) var(--space-lg);
  font-family: var(--font-body); font-size: 0.95rem; line-height: 1.72;
  color: var(--color-text-light); max-width: 65ch;
}
.bmr-faq-item.open .bmr-faq-a { display: block; }

/* ── 10. Related Services ─────────────────────────────────────── */
.bmr-related { background: var(--color-bg); padding: var(--section-pad); }
.bmr-related-header { text-align: center; margin-bottom: var(--space-3xl); }
.bmr-related-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 3.5vw, 2.4rem);
  font-weight: 800; line-height: 1.15; text-wrap: balance; color: var(--color-primary);
}
.bmr-related-header h2 .bmr-accent { color: var(--color-accent); }

/* ── 11. Closing CTA ─────────────────────────────────────────── */
.bmr-closing {
  background: var(--color-bg-dark);
  padding: var(--space-4xl) var(--space-lg);
  text-align: center; position: relative; overflow: hidden;
}
.bmr-closing::before {
  content: ''; position: absolute; inset: 0;
  background: radial-gradient(ellipse at 25% 60%, rgba(var(--color-accent-rgb), 0.08) 0%, transparent 55%);
  pointer-events: none;
}
.bmr-closing-inner { position: relative; z-index: 1; max-width: 640px; margin-inline: auto; }
.bmr-closing-inner h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800; color: var(--color-white);
  text-wrap: balance; letter-spacing: -0.01em; margin-bottom: var(--space-md);
}
.bmr-closing-inner p {
  font-family: var(--font-body); font-size: 1rem;
  color: rgba(255,255,255,0.75);
  margin-bottom: var(--space-xl); max-width: 55ch; margin-inline: auto; line-height: 1.65;
}

/* ── Mobile ──────────────────────────────────────────────────── */
@media (max-width: 767px) {
  .bmr-intro, .bmr-types, .bmr-process,
  .bmr-faq, .bmr-related, .bmr-closing { padding: var(--section-pad-mobile); }
  .bmr-cta-banner { padding: var(--space-3xl) var(--space-md); }
}
</style>

<main id="main-content">

  <!-- ── Hero ─────────────────────────────────────────────────── -->
  <section class="bmr-hero" style="background-image: url('<?php echo htmlspecialchars($clientPhotos['photo02']); ?>');" aria-label="Bathroom Remodeling hero">
    <div class="bmr-hero-inner container">
      <div class="bmr-hero-content" data-animate="fade-up">
        <span class="bmr-eyebrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12h8m-8 6V6a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12H4z"/><line x1="20" y1="6" x2="20" y2="18"/></svg>
          Bowdon, GA &amp; Carroll County
        </span>
        <h1>Bathroom Remodeling<br><span class="bmr-gradient">That Holds in Georgia</span></h1>
        <div class="bmr-hero-stat">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          2–4 Weeks Typical — All Bathroom Types
        </div>
        <p class="bmr-hero-sub">Full and partial bathroom remodels across Bowdon, Carrollton, Villa Rica, and Carroll County. Tile work, waterproofing, vanities, and fixtures — every scope handled in-house by the same crew that's been working Georgia bathrooms for <?php echo $yearsInBusiness; ?> years.</p>
        <div class="bmr-hero-actions">
          <a href="/contact/" class="bmr-btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
            Get a Free Estimate
          </a>
          <a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>" class="bmr-btn-ghost">Call <?php echo htmlspecialchars($phone); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Breadcrumb ────────────────────────────────────────────── -->
  <div class="bmr-breadcrumb">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span class="bmr-breadcrumb-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="bmr-breadcrumb-sep" aria-hidden="true">›</span>
        <span aria-current="page">Bathroom Remodeling</span>
      </nav>
    </div>
  </div>

  <!-- ── Intro Split ───────────────────────────────────────────── -->
  <section class="bmr-intro" aria-labelledby="bmr-intro-heading">
    <div class="container">
      <div class="bmr-intro-split">

        <div class="bmr-intro-content" data-animate="fade-up">
          <span class="bmr-section-eyebrow">Bathroom Remodeling in Bowdon, GA</span>
          <h2 id="bmr-intro-heading">$8,500–$35,000.<br><span class="bmr-accent">2–4 Weeks. Waterproof.</span></h2>
          <p>Bathroom remodels in Bowdon and Carroll County run $8,500–$35,000 depending on scope. A half-bath cosmetic refresh starts around $8,500. A full master bath gut-and-rebuild with custom tile shower, double vanity, and heated floor runs $22,000–$35,000 for most homes. We write itemized quotes before any work starts.</p>
          <p>Georgia's humid summers create specific failure modes in bathrooms — grout that cracks, caulk that molds, and tile that pops off walls when waterproofing was skipped or done wrong. Our bathroom work starts with a substrate assessment because what's behind the tile is as important as the tile itself.</p>
          <p>Every bathroom remodel includes demo and haul-off, waterproofing where appropriate, tile installation, vanity and fixture work, and final seal. We pull Carroll County permits for any plumbing or structural changes.</p>
          <div class="bmr-intro-meta">
            <span class="bmr-meta-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              2–4 weeks typical
            </span>
            <span class="bmr-meta-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              Certified waterproofing
            </span>
            <span class="bmr-meta-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
              Licensed &amp; insured, GA
            </span>
          </div>
          <p style="font-family: var(--font-body); font-size: 0.82rem; color: var(--color-text-light); margin-top: var(--space-md);">Last updated: April 2026</p>
        </div>

        <div class="bmr-intro-photo-col" data-animate="fade-up">
          <div class="bmr-intro-photo-wrap">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['gallery02']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['gallery02']); ?>" alt="Custom bathroom remodeling in Bowdon GA — large format tile, frameless glass shower enclosure" width="800" height="1000" loading="lazy">
            </picture>
            <div class="bmr-intro-badge">2–4 Weeks<br>Typical</div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="bmr-divider-down" aria-hidden="true"></div>

  <!-- ── Bathroom Types Grid (Signature Section) ───────────────── -->
  <section class="bmr-types" aria-labelledby="bmr-types-heading">
    <div class="container">
      <div class="bmr-types-header" data-animate="fade-up">
        <span class="bmr-section-eyebrow">All Bathroom Types</span>
        <h2 id="bmr-types-heading">Every Bathroom We Remodel —<br><span class="bmr-accent">From Half-Bath to Master Suite</span></h2>
        <p>Bowdon homes range from 1960s ranch houses with a single full bath to newer builds with master suite layouts. We remodel all configurations — here's what each scope typically looks like.</p>
      </div>
      <div class="bmr-types-grid" data-animate="fade-up">

        <div class="bmr-type-card">
          <div class="bmr-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 6 6.5 3.5a1.5 1.5 0 0 0-1-.5C4.683 3 4 3.683 4 4.5V17a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"/><line x1="10" y1="5" x2="8" y2="7"/><line x1="2" y1="12" x2="22" y2="12"/></svg>
          </div>
          <h3>Full Bath</h3>
          <span class="bmr-type-range">$12,000–$22,000</span>
          <p>Tub/shower, vanity, toilet, and tile floor. The most common remodel scope in Carroll County homes.</p>
        </div>

        <div class="bmr-type-card">
          <div class="bmr-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="3"/><path d="M16 11c0 2.76-1.79 5-4 5s-4-2.24-4-5 1.79-5 4-5 4 2.24 4 5z"/><line x1="12" y1="6" x2="12" y2="4"/></svg>
          </div>
          <h3>Master Bath</h3>
          <span class="bmr-type-range">$22,000–$35,000</span>
          <p>Custom tile shower, soaking tub, double vanity, and upscale fixtures. Adds measurable resale value.</p>
        </div>

        <div class="bmr-type-card">
          <div class="bmr-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
          </div>
          <h3>Guest Bath</h3>
          <span class="bmr-type-range">$9,500–$18,000</span>
          <p>Refreshed tile, new vanity, and fixtures. Efficient scope, strong visual impact for guests and buyers.</p>
        </div>

        <div class="bmr-type-card">
          <div class="bmr-type-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          </div>
          <h3>Half Bath</h3>
          <span class="bmr-type-range">$8,500–$14,000</span>
          <p>Vanity, toilet, tile floor, and paint. Fastest turnaround — most finish in under 2 weeks.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="bmr-divider-to-bg" aria-hidden="true"></div>

  <!-- ── Process Steps ────────────────────────────────────────── -->
  <section class="bmr-process" aria-labelledby="bmr-process-heading">
    <div class="container">
      <div class="bmr-process-header" data-animate="fade-up">
        <span class="bmr-section-eyebrow">How It Works</span>
        <h2 id="bmr-process-heading">Estimate to<br><span class="bmr-accent">Grout-Sealed Finish</span></h2>
        <p class="prose prose-centered">Every bathroom remodel follows four steps that keep waterproofing and finish work in the right sequence — skipping any step is how bathrooms fail in 5 years.</p>
      </div>
      <div class="bmr-steps" data-animate="fade-up">
        <div class="bmr-step">
          <div class="bmr-step-num">1</div>
          <h3>On-Site Estimate</h3>
          <p>Free visit, scope review, and written itemized quote.</p>
        </div>
        <div class="bmr-step">
          <div class="bmr-step-num">2</div>
          <h3>Demo &amp; Substrate</h3>
          <p>Existing surfaces removed, substrate repaired and waterproofed.</p>
        </div>
        <div class="bmr-step">
          <div class="bmr-step-num">3</div>
          <h3>Tile &amp; Fixtures</h3>
          <p>Tile installed, grouted and sealed. Vanity and fixtures set.</p>
        </div>
        <div class="bmr-step">
          <div class="bmr-step-num">4</div>
          <h3>Final Walkthrough</h3>
          <p>Punch list reviewed with you before we consider the job complete.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="bmr-divider-to-dark" aria-hidden="true"></div>

  <!-- ── Mid-Page CTA Banner ───────────────────────────────────── -->
  <section class="bmr-cta-banner" aria-label="Get a bathroom remodeling estimate">
    <div class="bmr-cta-inner" data-animate="fade-up">
      <h2>Your Bathroom.<br><span class="bmr-accent">Free Estimate This Week.</span></h2>
      <p>We serve Bowdon, Carrollton, Villa Rica, Bremen, and all of Carroll County. Free on-site estimates, written scope, no pressure. Same-day callbacks on all estimate requests.</p>
      <a href="/contact/" class="bmr-btn-cta">Get Your Free Bathroom Estimate →</a>
      <a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>" class="bmr-phone-link"><?php echo htmlspecialchars($phone); ?> — Call or Text</a>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="bmr-divider-from-dark" aria-hidden="true"></div>

  <!-- ── FAQ ──────────────────────────────────────────────────── -->
  <section class="bmr-faq" aria-labelledby="bmr-faq-heading">
    <div class="container">
      <div class="bmr-faq-header" data-animate="fade-up">
        <span class="bmr-section-eyebrow">Common Questions</span>
        <h2 id="bmr-faq-heading">Bathroom Remodeling in<br><span class="bmr-accent">Carroll County — Answered</span></h2>
      </div>
      <div class="bmr-faq-list" data-animate="fade-up">
        <?php foreach ($pageFaqs as $i => $faq): ?>
        <div class="bmr-faq-item" id="bmr-faq-<?php echo $i; ?>">
          <button class="bmr-faq-q faq-question" aria-expanded="false" aria-controls="bmr-faq-a-<?php echo $i; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="bmr-faq-a" id="bmr-faq-a-<?php echo $i; ?>" role="region">
            <?php echo htmlspecialchars($faq['a']); ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="bmr-divider-alt" aria-hidden="true"></div>

  <!-- ── Related Services ──────────────────────────────────────── -->
  <section class="bmr-related" aria-labelledby="bmr-related-heading">
    <div class="container">
      <div class="bmr-related-header" data-animate="fade-up">
        <span class="bmr-section-eyebrow">Keep Exploring</span>
        <h2 id="bmr-related-heading">Other Services You <span class="bmr-accent">May Need</span></h2>
      </div>
      <div class="services-grid" data-animate="fade-up">

        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo10']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo10']); ?>" alt="Custom tile shower installation in Bowdon GA — Schluter waterproofing system" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="droplets"></i></div>
            <h3>Custom Tile Showers</h3>
            <p class="service-card__desc">Specialty tile shower builds with certified waterproofing membranes.</p>
            <ul>
              <li>Schluter KERDI waterproofing</li>
              <li>Large format tile to 48×48"</li>
              <li>Built-in niches and benches</li>
            </ul>
            <a href="/services/custom-tile-showers/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo01']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo01']); ?>" alt="Kitchen remodeling in Bowdon GA — custom tile backsplash and cabinetry" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="utensils-crossed"></i></div>
            <h3>Kitchen Remodeling</h3>
            <p class="service-card__desc">Complete kitchen renovations from tile to custom cabinetry in Bowdon, GA.</p>
            <ul>
              <li>Tile backsplash and flooring</li>
              <li>Cabinet and countertop install</li>
              <li>Carroll County permitted</li>
            </ul>
            <a href="/services/kitchen-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo08']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo08']); ?>" alt="Flooring installation in Bowdon GA — porcelain tile and LVP" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Flooring Services</h3>
            <p class="service-card__desc">Tile, LVP, and hardwood flooring for bathrooms and every other room.</p>
            <ul>
              <li>Porcelain and ceramic tile</li>
              <li>L/360 subfloor verification</li>
              <li>Pattern and heated floor installs</li>
            </ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── Closing CTA ───────────────────────────────────────────── -->
  <section class="bmr-closing" aria-label="Start your bathroom remodel">
    <div class="bmr-closing-inner" data-animate="fade-up">
      <span class="bmr-section-eyebrow" style="color: var(--color-accent);">Ready to Start?</span>
      <h2>Your Bathroom.<br>Our <?php echo $yearsInBusiness; ?> Years.</h2>
      <p>We've remodeled bathrooms across Bowdon, Carrollton, Villa Rica, Bremen, and Carroll County since <?php echo $yearEstablished; ?>. Free on-site estimates. Written, itemized quotes. No pressure, no vague ballparks.</p>
      <a href="/contact/" class="bmr-btn-primary">Schedule a Free Estimate →</a>
    </div>
  </section>

</main>

<script>
(function () {
  document.querySelectorAll('.bmr-faq-q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = this.closest('.bmr-faq-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.bmr-faq-item.open').forEach(function (el) {
        el.classList.remove('open');
        el.querySelector('.bmr-faq-q').setAttribute('aria-expanded', 'false');
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
