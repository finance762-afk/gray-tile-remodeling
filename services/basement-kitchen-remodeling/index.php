<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Basement Kitchen Remodeling in Bowdon, GA | Gray Tile & Remodeling';
$pageDescription = 'Basement kitchen remodeling in Bowdon, GA — custom lower-level kitchens, plumbing rough-in, tile & cabinetry. $18K–$55K typical. Carroll County permitted. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/basement-kitchen-remodeling/';
$ogImage         = $clientPhotos['photo04'];
$heroPreloadImage = $clientPhotos['photo04'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'basement-kitchen-remodeling') { $currentService = $svc; break; }
}

$pageFaqs = [
    [
        'q' => 'How much does a basement kitchen remodel cost in Georgia?',
        'a' => 'A basement kitchen in Bowdon and Carroll County typically runs $18,000–$55,000 depending on scope. A secondary kitchenette — sink, mini-fridge, microwave, and limited cabinetry without a full range — runs $18,000–$28,000. A full second kitchen with range, dishwasher, custom cabinetry, and tile backsplash runs $35,000–$55,000. The main cost driver is whether new plumbing lines need to be run from the main floor — gravity drainage from a basement sink requires either an ejector pump or routing to a stack that\'s lower than the basement floor.',
    ],
    [
        'q' => 'What does plumbing rough-in for a basement kitchen involve?',
        'a' => 'A basement kitchen sink drains below the main floor level, which means gravity drainage may not work depending on where your main drain stack exits the house. We assess your existing plumbing before quoting. If the main stack exits above the basement slab, we install a sewage ejector pump in a buried pit to lift waste water up to the drain line. This is standard practice in finished basements and is fully concealed during finish work. Carroll County requires a plumbing permit and inspection for any new rough-in.',
    ],
    [
        'q' => 'Do I need a permit for a basement kitchen in Carroll County, GA?',
        'a' => 'Yes. A basement kitchen involves new plumbing, new electrical circuits (typically 20-amp dedicated circuits for the refrigerator and microwave), and HVAC adjustments. Carroll County requires separate permits for each trade. We apply for and manage all permits as part of the project and coordinate with county inspectors at each required stage. We don\'t close up walls or install finish work until rough-in inspections are passed.',
    ],
    [
        'q' => 'What\'s the difference between a secondary kitchen and a full kitchen in a basement?',
        'a' => 'A secondary kitchen (sometimes called a kitchenette or wet bar) typically includes a single sink, limited counter space, a mini-fridge or under-counter fridge, and a microwave. No range or dishwasher. This scope is appropriate for in-law suites, entertainment spaces, and home offices. A full second kitchen includes a full range, dishwasher, full-size refrigerator, and a full run of upper and lower cabinetry — appropriate for legal accessory dwelling units (ADUs), multigenerational households, or homes with rental potential. We design both configurations.',
    ],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   BASEMENT KITCHEN REMODELING — Gray Tile & Remodeling
   Page-specific styles (bkr- prefix). All values use var() tokens.
   ================================================================ */

/* ── 1. Hero ─────────────────────────────────────────────────── */
.bkr-hero {
  position: relative;
  min-height: 65vh;
  display: flex;
  align-items: flex-end;
  overflow: hidden;
  background-size: cover;
  background-position: center 45%;
  background-repeat: no-repeat;
  animation: bkr-kenburns 26s ease-in-out infinite alternate;
}
@keyframes bkr-kenburns {
  from { background-size: 110%; background-position: center 43%; }
  to   { background-size: 123%; background-position: center 50%; }
}
.bkr-hero::before {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(
    150deg,
    rgba(var(--color-primary-dark-rgb), 0.94) 0%,
    rgba(var(--color-primary-rgb), 0.71) 48%,
    rgba(var(--color-accent-rgb), 0.15) 100%
  );
  z-index: 1;
}
.bkr-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5; z-index: 2; pointer-events: none;
}
.bkr-hero-inner { position: relative; z-index: 3; width: 100%; padding: var(--space-4xl) var(--space-lg); }
.bkr-hero-content { max-width: 740px; }
.bkr-eyebrow {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: rgba(var(--color-accent-rgb), 0.15); color: var(--color-accent);
  font-family: var(--font-body); font-size: 0.78rem; font-weight: 700;
  letter-spacing: 0.13em; text-transform: uppercase;
  padding: 5px 14px; border-radius: 100px; margin-bottom: var(--space-lg);
  border: 1px solid rgba(var(--color-accent-rgb), 0.3);
}
.bkr-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.4rem, 5.8vw, 4rem);
  font-weight: 800; line-height: 1.1; text-wrap: balance;
  letter-spacing: -0.02em; color: var(--color-white); margin-bottom: var(--space-lg);
}
.bkr-hero h1 .bkr-gradient {
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.88) 100%);
  -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
}
.bkr-hero-stat {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: rgba(var(--color-accent-rgb), 0.18);
  border: 1px solid rgba(var(--color-accent-rgb), 0.4);
  color: var(--color-accent);
  font-family: var(--font-heading); font-size: 0.9rem; font-weight: 700;
  letter-spacing: 0.06em; padding: 6px 16px; border-radius: var(--radius-md); margin-bottom: var(--space-xl);
}
.bkr-hero-sub {
  font-family: var(--font-body); font-size: clamp(0.95rem, 2vw, 1.12rem);
  line-height: 1.7; color: rgba(255,255,255,0.84); max-width: 540px; margin-bottom: var(--space-xl);
}
.bkr-hero-actions { display: flex; align-items: center; gap: var(--space-md); flex-wrap: wrap; }
.bkr-btn-primary {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: var(--color-accent); color: var(--color-primary-dark);
  font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; letter-spacing: 0.04em;
  padding: 14px 28px; border-radius: var(--radius-md); text-decoration: none;
  box-shadow: 0 4px 0 rgba(var(--color-primary-dark-rgb), 0.5);
  transition: transform var(--transition-fast), box-shadow var(--transition-fast); overflow: hidden;
}
.bkr-btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 0 rgba(var(--color-primary-dark-rgb), 0.5); }
.bkr-btn-primary:active { transform: translateY(2px); box-shadow: 0 2px 0 rgba(var(--color-primary-dark-rgb), 0.5); }
.bkr-btn-ghost {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: transparent; color: var(--color-white);
  font-family: var(--font-heading); font-size: 1rem; font-weight: 600;
  padding: 13px 24px; border-radius: var(--radius-md);
  border: 2px solid rgba(255,255,255,0.38); text-decoration: none;
  transition: background var(--transition-fast), border-color var(--transition-fast);
}
.bkr-btn-ghost:hover { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.6); }
@media (max-width: 767px) {
  .bkr-hero { min-height: 52vh; }
  .bkr-hero-inner { padding: var(--space-3xl) var(--space-md); }
}

/* ── 2. Breadcrumb ───────────────────────────────────────────── */
.bkr-breadcrumb { background: var(--color-bg-alt); padding: var(--space-md) 0; border-bottom: 1px solid var(--color-gray-light); }
.bkr-breadcrumb nav { display: flex; align-items: center; gap: var(--space-sm); font-family: var(--font-body); font-size: 0.85rem; color: var(--color-text-light); flex-wrap: wrap; }
.bkr-breadcrumb a { color: var(--color-accent); text-decoration: none; transition: color var(--transition-fast); }
.bkr-breadcrumb a:hover { color: var(--color-primary); }
.bkr-breadcrumb-sep { color: var(--color-gray-light); }

/* ── 3. Dividers ─────────────────────────────────────────────── */
.bkr-divider-down { position: relative; height: 60px; overflow: hidden; background: var(--color-bg); margin: 0; }
.bkr-divider-down::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg-alt); clip-path: polygon(0 100%, 100% 0, 100% 100%); }
.bkr-divider-to-bg { position: relative; height: 60px; overflow: hidden; background: var(--color-bg-alt); margin: 0; }
.bkr-divider-to-bg::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg); clip-path: polygon(0 0, 100% 100%, 0 100%); }
.bkr-divider-to-dark { position: relative; height: 60px; overflow: hidden; background: var(--color-bg-alt); margin: 0; }
.bkr-divider-to-dark::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg-dark); clip-path: polygon(0 100%, 100% 0, 100% 100%); }
.bkr-divider-from-dark { position: relative; height: 60px; overflow: hidden; background: var(--color-bg-dark); margin: 0; }
.bkr-divider-from-dark::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg); clip-path: polygon(0 0, 100% 100%, 0 100%); }
.bkr-divider-wave { position: relative; height: 70px; overflow: hidden; background: var(--color-bg); margin: 0; }
.bkr-divider-wave::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 70px; background: var(--color-bg-alt); clip-path: ellipse(55% 100% at 50% 100%); }

/* ── 4. Shared eyebrow ───────────────────────────────────────── */
.bkr-section-eyebrow { display: inline-block; font-family: var(--font-body); font-size: 0.78rem; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: var(--color-accent); margin-bottom: var(--space-sm); }

/* ── 5. Intro Split ──────────────────────────────────────────── */
.bkr-intro { background: var(--color-bg); padding: var(--section-pad); }
.bkr-intro-split { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3xl); align-items: center; }
.bkr-intro-content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.75rem, 3.8vw, 2.6rem);
  font-weight: 800; line-height: 1.15; text-wrap: balance; letter-spacing: -0.02em;
  color: var(--color-primary); margin-bottom: var(--space-lg);
}
.bkr-intro-content h2 .bkr-accent { color: var(--color-accent); }
.bkr-intro-content p { font-family: var(--font-body); font-size: 0.97rem; line-height: 1.72; color: var(--color-text-light); max-width: 65ch; margin-bottom: var(--space-md); }
.bkr-intro-meta { display: flex; align-items: center; gap: var(--space-lg); flex-wrap: wrap; margin-top: var(--space-lg); padding-top: var(--space-lg); border-top: 1px solid var(--color-gray-light); }
.bkr-meta-item { display: flex; align-items: center; gap: var(--space-sm); font-family: var(--font-body); font-size: 0.88rem; color: var(--color-text-light); }
.bkr-intro-photo-wrap { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); aspect-ratio: 4/5; }
.bkr-intro-photo-wrap img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform var(--transition-slow); }
.bkr-intro-photo-wrap:hover img { transform: scale(1.04); }
.bkr-intro-badge { position: absolute; bottom: var(--space-lg); right: var(--space-lg); background: var(--color-accent); color: var(--color-primary-dark); font-family: var(--font-heading); font-size: 0.95rem; font-weight: 800; padding: var(--space-sm) var(--space-md); border-radius: var(--radius-md); text-align: center; line-height: 1.3; box-shadow: var(--shadow-lg); }
@media (max-width: 1023px) { .bkr-intro-split { grid-template-columns: 1fr; gap: var(--space-2xl); } .bkr-intro-photo-col { order: -1; } .bkr-intro-photo-wrap { aspect-ratio: 16/9; } }

/* ── 6. Signature: Editorial Pullquote Split ─────────────────── */
.bkr-editorial {
  background: var(--color-bg-alt);
  padding: var(--section-pad);
}
.bkr-editorial-split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: stretch;
}
.bkr-editorial-photo-col {
  position: relative;
  border-radius: var(--radius-lg);
  overflow: hidden;
  min-height: 420px;
}
.bkr-editorial-photo-col img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  transition: transform var(--transition-slow);
}
.bkr-editorial-photo-col:hover img { transform: scale(1.04); }
.bkr-editorial-photo-col::after {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(to top, rgba(var(--color-primary-dark-rgb), 0.5) 0%, transparent 60%);
}
.bkr-editorial-content {
  display: flex; flex-direction: column; justify-content: center; gap: var(--space-xl);
}
.bkr-editorial-content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.75rem, 3.8vw, 2.6rem);
  font-weight: 800; line-height: 1.15; text-wrap: balance; letter-spacing: -0.02em;
  color: var(--color-primary); margin-bottom: 0;
}
.bkr-editorial-content h2 .bkr-accent { color: var(--color-accent); }
.bkr-pullquote {
  border-left: 4px solid var(--color-accent);
  padding-left: var(--space-lg);
  margin: 0;
}
.bkr-pullquote p {
  font-family: var(--font-heading);
  font-size: clamp(1.15rem, 2.2vw, 1.45rem);
  font-weight: 700;
  line-height: 1.4;
  color: var(--color-primary);
  text-wrap: balance;
  margin: 0;
}
.bkr-editorial-body p {
  font-family: var(--font-body); font-size: 0.97rem; line-height: 1.72; color: var(--color-text-light); max-width: 60ch; margin-bottom: var(--space-md);
}
.bkr-value-list {
  list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: var(--space-sm);
}
.bkr-value-list li {
  display: flex; align-items: flex-start; gap: var(--space-sm);
  font-family: var(--font-body); font-size: 0.9rem; color: var(--color-text); line-height: 1.55;
}
.bkr-value-list li svg { flex-shrink: 0; width: 16px; height: 16px; stroke: var(--color-accent); margin-top: 2px; }
@media (max-width: 1023px) { .bkr-editorial-split { grid-template-columns: 1fr; gap: var(--space-2xl); } .bkr-editorial-photo-col { min-height: 280px; } }

/* ── 7. Process Steps ────────────────────────────────────────── */
.bkr-process { background: var(--color-bg); padding: var(--section-pad); }
.bkr-process-header { text-align: center; margin-bottom: var(--space-3xl); }
.bkr-process-header h2 { font-family: var(--font-heading); font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; line-height: 1.15; text-wrap: balance; letter-spacing: -0.02em; color: var(--color-primary); margin-bottom: var(--space-sm); }
.bkr-process-header h2 .bkr-accent { color: var(--color-accent); }
.bkr-process-header p { font-family: var(--font-body); font-size: 1rem; color: var(--color-text-light); line-height: 1.65; max-width: 52ch; margin-inline: auto; }
.bkr-steps { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl); position: relative; margin-top: var(--space-3xl); }
.bkr-steps::before { content: ''; position: absolute; top: 30px; left: calc(12.5% + 12px); right: calc(12.5% + 12px); height: 2px; background: linear-gradient(to right, var(--color-accent), rgba(var(--color-accent-rgb), 0.1)); z-index: 0; }
.bkr-step { text-align: center; position: relative; z-index: 1; }
.bkr-step-num { width: 60px; height: 60px; border-radius: 50%; background: var(--color-primary); color: var(--color-white); font-family: var(--font-heading); font-size: 1.4rem; font-weight: 800; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-md); border: 3px solid var(--color-accent); box-shadow: var(--shadow-md); }
.bkr-step h3 { font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-xs); text-wrap: balance; }
.bkr-step p { font-family: var(--font-body); font-size: 0.88rem; line-height: 1.55; color: var(--color-text-light); max-width: 20ch; margin-inline: auto; }
@media (max-width: 1023px) { .bkr-steps { grid-template-columns: repeat(2, 1fr); } .bkr-steps::before { display: none; } }
@media (max-width: 600px) { .bkr-steps { grid-template-columns: 1fr; } }

/* ── 8. Mid-Page CTA Banner ──────────────────────────────────── */
.bkr-cta-banner {
  position: relative;
  background: linear-gradient(140deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  padding: var(--space-4xl) var(--space-lg);
  text-align: center; overflow: hidden;
}
.bkr-cta-banner::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5; pointer-events: none;
}
.bkr-cta-inner { position: relative; z-index: 1; max-width: 680px; margin-inline: auto; }
.bkr-cta-inner h2 { font-family: var(--font-heading); font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; color: var(--color-white); text-wrap: balance; letter-spacing: -0.01em; margin-bottom: var(--space-md); }
.bkr-cta-inner h2 .bkr-accent { color: var(--color-accent); }
.bkr-cta-inner p { font-family: var(--font-body); font-size: 1.05rem; line-height: 1.62; color: rgba(255,255,255,0.82); margin-bottom: var(--space-xl); max-width: 55ch; margin-inline: auto; }
.bkr-btn-cta {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: var(--color-accent); color: var(--color-primary-dark);
  font-family: var(--font-heading); font-size: 1.1rem; font-weight: 700;
  padding: 14px 32px; border-radius: var(--radius-md); text-decoration: none;
  box-shadow: 0 4px 0 rgba(0,0,0,0.3);
  transition: transform var(--transition-fast), box-shadow var(--transition-fast);
}
.bkr-btn-cta:hover { transform: translateY(-2px); box-shadow: 0 6px 0 rgba(0,0,0,0.3); }
.bkr-phone-link { display: block; margin-top: var(--space-md); font-family: var(--font-heading); font-size: 1.25rem; font-weight: 700; color: rgba(255,255,255,0.9); text-decoration: none; letter-spacing: 0.03em; transition: color var(--transition-fast); }
.bkr-phone-link:hover { color: var(--color-accent); }

/* ── 9. FAQ ──────────────────────────────────────────────────── */
.bkr-faq { background: var(--color-bg-alt); padding: var(--section-pad); }
.bkr-faq-header { text-align: center; margin-bottom: var(--space-3xl); }
.bkr-faq-header h2 { font-family: var(--font-heading); font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; line-height: 1.15; text-wrap: balance; letter-spacing: -0.02em; color: var(--color-primary); margin-bottom: var(--space-sm); }
.bkr-faq-header h2 .bkr-accent { color: var(--color-accent); }
.bkr-faq-list { max-width: 760px; margin-inline: auto; display: flex; flex-direction: column; gap: var(--space-sm); }
.bkr-faq-item { border-radius: var(--radius-md); border: 1px solid var(--color-gray-light); overflow: hidden; background: var(--color-bg); }
.bkr-faq-q { display: flex; align-items: center; justify-content: space-between; gap: var(--space-md); width: 100%; padding: var(--space-lg); background: none; border: none; cursor: pointer; text-align: left; font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--color-primary); transition: background var(--transition-fast); }
.bkr-faq-q:hover { background: rgba(var(--color-accent-rgb), 0.05); }
.bkr-faq-q svg { flex-shrink: 0; stroke: var(--color-accent); transition: transform var(--transition-fast); }
.bkr-faq-item.open .bkr-faq-q svg { transform: rotate(180deg); }
.bkr-faq-a { display: none; padding: 0 var(--space-lg) var(--space-lg); font-family: var(--font-body); font-size: 0.95rem; line-height: 1.72; color: var(--color-text-light); max-width: 65ch; }
.bkr-faq-item.open .bkr-faq-a { display: block; }

/* ── 10. Related ─────────────────────────────────────────────── */
.bkr-related { background: var(--color-bg); padding: var(--section-pad); }
.bkr-related-header { text-align: center; margin-bottom: var(--space-3xl); }
.bkr-related-header h2 { font-family: var(--font-heading); font-size: clamp(1.6rem, 3.5vw, 2.4rem); font-weight: 800; line-height: 1.15; text-wrap: balance; color: var(--color-primary); }
.bkr-related-header h2 .bkr-accent { color: var(--color-accent); }

/* ── 11. Closing CTA ─────────────────────────────────────────── */
.bkr-closing { background: var(--color-bg-dark); padding: var(--space-4xl) var(--space-lg); text-align: center; position: relative; overflow: hidden; }
.bkr-closing::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse at 30% 70%, rgba(var(--color-accent-rgb), 0.08) 0%, transparent 55%); pointer-events: none; }
.bkr-closing-inner { position: relative; z-index: 1; max-width: 640px; margin-inline: auto; }
.bkr-closing-inner h2 { font-family: var(--font-heading); font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; color: var(--color-white); text-wrap: balance; letter-spacing: -0.01em; margin-bottom: var(--space-md); }
.bkr-closing-inner p { font-family: var(--font-body); font-size: 1rem; color: rgba(255,255,255,0.75); margin-bottom: var(--space-xl); max-width: 55ch; margin-inline: auto; line-height: 1.65; }

/* ── Mobile ──────────────────────────────────────────────────── */
@media (max-width: 767px) {
  .bkr-intro, .bkr-editorial, .bkr-process,
  .bkr-faq, .bkr-related, .bkr-closing { padding: var(--section-pad-mobile); }
  .bkr-cta-banner { padding: var(--space-3xl) var(--space-md); }
}
</style>

<main id="main-content">

  <!-- ── Hero ─────────────────────────────────────────────────── -->
  <section class="bkr-hero" style="background-image: url('<?php echo htmlspecialchars($clientPhotos['photo04']); ?>');" aria-label="Basement Kitchen Remodeling hero">
    <div class="bkr-hero-inner container">
      <div class="bkr-hero-content" data-animate="fade-up">
        <span class="bkr-eyebrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          Bowdon, GA &amp; Carroll County
        </span>
        <h1>Basement Kitchen<br><span class="bkr-gradient">Add Value Below Grade</span></h1>
        <div class="bkr-hero-stat">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
          $18K–$55K Typical Range
        </div>
        <p class="bkr-hero-sub">Custom basement kitchens in Bowdon, GA — from kitchenettes for in-law suites to full second kitchens for multigenerational households. Plumbing rough-in, tile, cabinetry, and Carroll County permits handled in-house.</p>
        <div class="bkr-hero-actions">
          <a href="/contact/" class="bkr-btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
            Get a Free Estimate
          </a>
          <a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>" class="bkr-btn-ghost">Call <?php echo htmlspecialchars($phone); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Breadcrumb ────────────────────────────────────────────── -->
  <div class="bkr-breadcrumb">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span class="bkr-breadcrumb-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="bkr-breadcrumb-sep" aria-hidden="true">›</span>
        <span aria-current="page">Basement Kitchen Remodeling</span>
      </nav>
    </div>
  </div>

  <!-- ── Intro Split ───────────────────────────────────────────── -->
  <section class="bkr-intro" aria-labelledby="bkr-intro-heading">
    <div class="container">
      <div class="bkr-intro-split">

        <div class="bkr-intro-content" data-animate="fade-up">
          <span class="bkr-section-eyebrow">Basement Kitchen Remodeling in Bowdon, GA</span>
          <h2 id="bkr-intro-heading">$18K–$55K.<br><span class="bkr-accent">Plumbing, Tile & Permits Included.</span></h2>
          <p>A basement kitchen in Bowdon and Carroll County runs $18,000–$55,000 depending on scope. A secondary kitchenette — sink, mini-fridge, microwave, limited cabinetry — runs $18,000–$28,000. A full second kitchen with range, dishwasher, and a full run of cabinetry runs $35,000–$55,000. We provide itemized written quotes before any work starts.</p>
          <p>The most common question we get before quoting a basement kitchen is drainage. A sink below grade can't rely on gravity to reach a drain stack that exits above the slab — this is the case in most Carroll County homes. When it applies, we install a sewage ejector pump system in a buried pit. It's a standard solution and fully concealed in finish work. We assess existing plumbing conditions during the on-site estimate and include the correct approach in the quote.</p>
          <p>Carroll County requires plumbing and electrical permits for any new basement kitchen work. We handle applications, coordinate with county inspectors at each required stage, and document everything in your permit file.</p>
          <div class="bkr-intro-meta">
            <span class="bkr-meta-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              6–12 weeks typical
            </span>
            <span class="bkr-meta-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              Carroll County permitted
            </span>
            <span class="bkr-meta-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
              Licensed &amp; insured, GA
            </span>
          </div>
          <p style="font-family: var(--font-body); font-size: 0.82rem; color: var(--color-text-light); margin-top: var(--space-md);">Last updated: April 2026</p>
        </div>

        <div class="bkr-intro-photo-col" data-animate="fade-up">
          <div class="bkr-intro-photo-wrap">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['gallery04']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['gallery04']); ?>" alt="Basement kitchen remodeling in Bowdon GA — custom tile, cabinetry, and countertops in finished lower level" width="800" height="1000" loading="lazy">
            </picture>
            <div class="bkr-intro-badge">$18K–$55K<br>Typical Range</div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="bkr-divider-down" aria-hidden="true"></div>

  <!-- ── Signature: Editorial Pullquote Split ──────────────────── -->
  <section class="bkr-editorial" aria-labelledby="bkr-editorial-heading">
    <div class="container">
      <div class="bkr-editorial-split" data-animate="fade-up">

        <div class="bkr-editorial-photo-col">
          <picture>
            <source srcset="<?php echo htmlspecialchars($clientPhotos['photo04']); ?>" type="image/jpeg">
            <img src="<?php echo htmlspecialchars($clientPhotos['photo04']); ?>" alt="Custom basement kitchen installation in Bowdon GA showing tile backsplash and full cabinetry" width="800" height="900" loading="lazy">
          </picture>
        </div>

        <div class="bkr-editorial-content">
          <span class="bkr-section-eyebrow">Why It Adds Value</span>
          <h2 id="bkr-editorial-heading">A Basement Kitchen<br><span class="bkr-accent">Changes How the House Functions</span></h2>
          <blockquote class="bkr-pullquote">
            <p>"A second kitchen doesn't just add square footage — it adds a use case the house didn't have before."</p>
          </blockquote>
          <div class="bkr-editorial-body">
            <p>In Carroll County, multigenerational households are common — adult children, aging parents, and in-laws sharing a home that wasn't originally designed for two households. A basement kitchen solves the friction point of a shared main-floor kitchen without requiring a home addition or a full ADU build.</p>
            <p>Homes in Bowdon with a legal second kitchen carry measurably higher appraised values because they can accommodate a wider range of buyers — multigenerational families, home-based businesses, and investors who see rental potential.</p>
          </div>
          <ul class="bkr-value-list">
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              In-law suite with independent kitchen access
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              Entertainment or home bar level
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              Accessory dwelling unit (ADU) rental potential
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              Home office with wet bar — convenience without main-floor interruptions
            </li>
          </ul>
          <div>
            <a href="/contact/" class="bkr-btn-primary">Discuss Your Basement Kitchen →</a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="bkr-divider-to-bg" aria-hidden="true"></div>

  <!-- ── Process Steps ────────────────────────────────────────── -->
  <section class="bkr-process" aria-labelledby="bkr-process-heading">
    <div class="container">
      <div class="bkr-process-header" data-animate="fade-up">
        <span class="bkr-section-eyebrow">How It Works</span>
        <h2 id="bkr-process-heading">Plumbing Assessment to<br><span class="bkr-accent">Final Punch List</span></h2>
        <p class="prose prose-centered">Basement kitchens require a specific sequence — plumbing rough-in before any framing is closed, electrical before drywall. Here's the order we follow on every project.</p>
      </div>
      <div class="bkr-steps" data-animate="fade-up">
        <div class="bkr-step">
          <div class="bkr-step-num">1</div>
          <h3>Plumbing Assessment</h3>
          <p>We assess drainage options before committing to scope or pricing.</p>
        </div>
        <div class="bkr-step">
          <div class="bkr-step-num">2</div>
          <h3>Permits Secured</h3>
          <p>Plumbing, electrical, and building permits pulled before any rough work starts.</p>
        </div>
        <div class="bkr-step">
          <div class="bkr-step-num">3</div>
          <h3>Rough-In &amp; Inspection</h3>
          <p>Plumbing and electrical rough-in installed and inspected by county before walls close.</p>
        </div>
        <div class="bkr-step">
          <div class="bkr-step-num">4</div>
          <h3>Finish &amp; Walkthrough</h3>
          <p>Tile, cabinetry, countertops, and fixtures installed. Punch list reviewed before close-out.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="bkr-divider-to-dark" aria-hidden="true"></div>

  <!-- ── Mid-Page CTA Banner ───────────────────────────────────── -->
  <section class="bkr-cta-banner" aria-label="Get a basement kitchen estimate">
    <div class="bkr-cta-inner" data-animate="fade-up">
      <h2>Your Basement.<br><span class="bkr-accent">A Kitchen That Adds Real Value.</span></h2>
      <p>We assess plumbing conditions, pull Carroll County permits, and deliver a finished kitchen that adds function and appraisal value. Free on-site estimates across Bowdon and Carroll County.</p>
      <a href="/contact/" class="bkr-btn-cta">Get Your Free Estimate →</a>
      <a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>" class="bkr-phone-link"><?php echo htmlspecialchars($phone); ?> — Call or Text</a>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="bkr-divider-from-dark" aria-hidden="true"></div>

  <!-- ── FAQ ──────────────────────────────────────────────────── -->
  <section class="bkr-faq" aria-labelledby="bkr-faq-heading">
    <div class="container">
      <div class="bkr-faq-header" data-animate="fade-up">
        <span class="bkr-section-eyebrow">Common Questions</span>
        <h2 id="bkr-faq-heading">Basement Kitchen in Carroll County —<br><span class="bkr-accent">Answered</span></h2>
      </div>
      <div class="bkr-faq-list" data-animate="fade-up">
        <?php foreach ($pageFaqs as $i => $faq): ?>
        <div class="bkr-faq-item" id="bkr-faq-<?php echo $i; ?>">
          <button class="bkr-faq-q faq-question" aria-expanded="false" aria-controls="bkr-faq-a-<?php echo $i; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="bkr-faq-a" id="bkr-faq-a-<?php echo $i; ?>" role="region">
            <?php echo htmlspecialchars($faq['a']); ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="bkr-divider-wave" aria-hidden="true"></div>

  <!-- ── Related Services ──────────────────────────────────────── -->
  <section class="bkr-related" aria-labelledby="bkr-related-heading">
    <div class="container">
      <div class="bkr-related-header" data-animate="fade-up">
        <span class="bkr-section-eyebrow">Keep Exploring</span>
        <h2 id="bkr-related-heading">Other Services You <span class="bkr-accent">May Need</span></h2>
      </div>
      <div class="services-grid" data-animate="fade-up">

        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo03']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo03']); ?>" alt="Basement finishing in Bowdon GA — LVP flooring, drywall, and recessed lighting" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="square-bottom-dashed-scissors"></i></div>
            <h3>Basement Finishing</h3>
            <p class="service-card__desc">Turn unfinished basement space into livable square footage in Bowdon, GA.</p>
            <ul>
              <li>Moisture-managed framing</li>
              <li>LVP flooring and drywall</li>
              <li>Carroll County permitted</li>
            </ul>
            <a href="/services/basement-finishing/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo01']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo01']); ?>" alt="Kitchen remodeling in Bowdon GA — custom cabinetry, tile, and countertops" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="utensils-crossed"></i></div>
            <h3>Kitchen Remodeling</h3>
            <p class="service-card__desc">Full kitchen renovations on the main floor — same team, same craftsmanship.</p>
            <ul>
              <li>Tile backsplash and flooring</li>
              <li>Cabinet and countertop install</li>
              <li>4–8 week typical timeline</li>
            </ul>
            <a href="/services/kitchen-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo08']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo08']); ?>" alt="Flooring services in Bowdon GA — LVP and tile installation for basements" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>Flooring Services</h3>
            <p class="service-card__desc">LVP, tile, and hardwood for basement and main-level flooring in Bowdon.</p>
            <ul>
              <li>LVP over vapor barrier for slabs</li>
              <li>Porcelain tile for wet areas</li>
              <li>Subfloor assessment included</li>
            </ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── Closing CTA ───────────────────────────────────────────── -->
  <section class="bkr-closing" aria-label="Start your basement kitchen project">
    <div class="bkr-closing-inner" data-animate="fade-up">
      <span class="bkr-section-eyebrow" style="color: var(--color-accent);">Ready to Start?</span>
      <h2>Your Basement Kitchen.<br>Built to Last.</h2>
      <p>We've installed basement kitchens across Bowdon, Carrollton, Villa Rica, and Carroll County since <?php echo $yearEstablished; ?>. We handle plumbing assessment, permits, tile, and cabinetry — no subcontractor shuffle, no surprises mid-project.</p>
      <a href="/contact/" class="bkr-btn-primary">Schedule a Free Estimate →</a>
    </div>
  </section>

</main>

<script>
(function () {
  document.querySelectorAll('.bkr-faq-q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = this.closest('.bkr-faq-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.bkr-faq-item.open').forEach(function (el) {
        el.classList.remove('open');
        el.querySelector('.bkr-faq-q').setAttribute('aria-expanded', 'false');
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
