<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Basement Finishing in Bowdon, GA | Gray Tile & Remodeling';
$pageDescription = 'Basement finishing in Bowdon, GA — add 40–75% more livable space with moisture-managed framing, drywall, flooring & HVAC. Carroll County permitted. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/basement-finishing/';
$ogImage         = $clientPhotos['photo03'];
$heroPreloadImage = $clientPhotos['photo03'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'basement-finishing') { $currentService = $svc; break; }
}

$pageFaqs = [
    [
        'q' => 'How much does basement finishing cost in Georgia?',
        'a' => 'Basement finishing in the Bowdon and Carroll County area typically runs $25–$50 per square foot for a complete finish. A 600 sq ft basement runs $15,000–$30,000. A 1,200 sq ft basement with a full kitchen, bathroom, and dedicated media room runs $45,000–$65,000. The spread depends on finish level — basic LVP and drywall vs. tile, custom built-ins, and a wet bar. We provide itemized written estimates that break down every scope item before work begins.',
    ],
    [
        'q' => 'How do you handle Georgia\'s humidity and moisture in basements?',
        'a' => 'Georgia basements — especially in Carroll County\'s clay-heavy soil — require a moisture-management approach before any finish materials go in. We assess the existing drainage, check for hydrostatic pressure signs on the slab, and install vapor barriers as appropriate. LVP is our default floor recommendation for below-grade spaces because it floats over a moisture barrier rather than adhering directly to the slab. We don\'t use hardwood or glue-down carpet in basements because Georgia\'s humidity will destroy them within 3–5 years.',
    ],
    [
        'q' => 'Do I need a permit to finish my basement in Carroll County, GA?',
        'a' => 'Yes. Carroll County requires building permits for basement finishing that adds habitable square footage. Permits cover framing, electrical, plumbing, and HVAC. If the space will be used as a bedroom, egress window requirements also apply — which often involves excavating for a window well. We handle Carroll County permit applications as part of the project and coordinate with county inspectors at each required inspection stage.',
    ],
    [
        'q' => 'How long does it take to finish a basement in Bowdon, GA?',
        'a' => 'A standard 600–900 sq ft basement finish takes 6–10 weeks from permit approval to final walkthrough. Larger basements or those with full kitchens and bathrooms run 10–16 weeks. Permit approval in Carroll County typically takes 5–10 business days, which we build into the project schedule. We don\'t start demo until permits are in hand.',
    ],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   BASEMENT FINISHING — Gray Tile & Remodeling
   Page-specific styles (bsf- prefix). All values use var() tokens.
   ================================================================ */

/* ── 1. Hero ─────────────────────────────────────────────────── */
.bsf-hero {
  position: relative;
  min-height: 65vh;
  display: flex;
  align-items: flex-end;
  overflow: hidden;
  background-size: cover;
  background-position: center 50%;
  background-repeat: no-repeat;
  animation: bsf-kenburns 22s ease-in-out infinite alternate;
}
@keyframes bsf-kenburns {
  from { background-size: 110%; background-position: center 48%; }
  to   { background-size: 122%; background-position: center 54%; }
}
.bsf-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    160deg,
    rgba(var(--color-primary-dark-rgb), 0.93) 0%,
    rgba(var(--color-primary-rgb), 0.7) 50%,
    rgba(var(--color-accent-rgb), 0.16) 100%
  );
  z-index: 1;
}
.bsf-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5;
  z-index: 2;
  pointer-events: none;
}
.bsf-hero-inner {
  position: relative; z-index: 3; width: 100%; padding: var(--space-4xl) var(--space-lg);
}
.bsf-hero-content { max-width: 760px; }
.bsf-eyebrow {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: rgba(var(--color-accent-rgb), 0.15);
  color: var(--color-accent);
  font-family: var(--font-body); font-size: 0.78rem; font-weight: 700;
  letter-spacing: 0.13em; text-transform: uppercase;
  padding: 5px 14px; border-radius: 100px; margin-bottom: var(--space-lg);
  border: 1px solid rgba(var(--color-accent-rgb), 0.3);
}
.bsf-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.4rem, 5.8vw, 4.2rem);
  font-weight: 800; line-height: 1.1; text-wrap: balance;
  letter-spacing: -0.02em; color: var(--color-white); margin-bottom: var(--space-lg);
}
.bsf-hero h1 .bsf-gradient {
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.9) 100%);
  -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
}
.bsf-hero-stat {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: rgba(var(--color-accent-rgb), 0.18);
  border: 1px solid rgba(var(--color-accent-rgb), 0.4);
  color: var(--color-accent);
  font-family: var(--font-heading); font-size: 0.9rem; font-weight: 700;
  letter-spacing: 0.06em; padding: 6px 16px; border-radius: var(--radius-md); margin-bottom: var(--space-xl);
}
.bsf-hero-sub {
  font-family: var(--font-body);
  font-size: clamp(0.95rem, 2vw, 1.12rem);
  line-height: 1.7; color: rgba(255,255,255,0.84); max-width: 540px; margin-bottom: var(--space-xl);
}
.bsf-hero-actions { display: flex; align-items: center; gap: var(--space-md); flex-wrap: wrap; }
.bsf-btn-primary {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: var(--color-accent); color: var(--color-primary-dark);
  font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; letter-spacing: 0.04em;
  padding: 14px 28px; border-radius: var(--radius-md); text-decoration: none;
  box-shadow: 0 4px 0 rgba(var(--color-primary-dark-rgb), 0.5);
  transition: transform var(--transition-fast), box-shadow var(--transition-fast); overflow: hidden;
}
.bsf-btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 0 rgba(var(--color-primary-dark-rgb), 0.5); }
.bsf-btn-primary:active { transform: translateY(2px); box-shadow: 0 2px 0 rgba(var(--color-primary-dark-rgb), 0.5); }
.bsf-btn-ghost {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: transparent; color: var(--color-white);
  font-family: var(--font-heading); font-size: 1rem; font-weight: 600;
  padding: 13px 24px; border-radius: var(--radius-md);
  border: 2px solid rgba(255,255,255,0.38); text-decoration: none;
  transition: background var(--transition-fast), border-color var(--transition-fast);
}
.bsf-btn-ghost:hover { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.6); }
@media (max-width: 767px) {
  .bsf-hero { min-height: 52vh; }
  .bsf-hero-inner { padding: var(--space-3xl) var(--space-md); }
}

/* ── 2. Breadcrumb ───────────────────────────────────────────── */
.bsf-breadcrumb { background: var(--color-bg-alt); padding: var(--space-md) 0; border-bottom: 1px solid var(--color-gray-light); }
.bsf-breadcrumb nav { display: flex; align-items: center; gap: var(--space-sm); font-family: var(--font-body); font-size: 0.85rem; color: var(--color-text-light); flex-wrap: wrap; }
.bsf-breadcrumb a { color: var(--color-accent); text-decoration: none; transition: color var(--transition-fast); }
.bsf-breadcrumb a:hover { color: var(--color-primary); }
.bsf-breadcrumb-sep { color: var(--color-gray-light); }

/* ── 3. Dividers ─────────────────────────────────────────────── */
.bsf-divider-down { position: relative; height: 60px; overflow: hidden; background: var(--color-bg); margin: 0; }
.bsf-divider-down::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg-alt); clip-path: polygon(0 100%, 100% 0, 100% 100%); }
.bsf-divider-to-bg { position: relative; height: 60px; overflow: hidden; background: var(--color-bg-alt); margin: 0; }
.bsf-divider-to-bg::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg); clip-path: polygon(0 0, 100% 100%, 0 100%); }
.bsf-divider-to-dark { position: relative; height: 60px; overflow: hidden; background: var(--color-bg); margin: 0; }
.bsf-divider-to-dark::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg-dark); clip-path: polygon(0 100%, 100% 0, 100% 100%); }
.bsf-divider-from-dark { position: relative; height: 60px; overflow: hidden; background: var(--color-bg-dark); margin: 0; }
.bsf-divider-from-dark::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg-alt); clip-path: polygon(0 0, 100% 100%, 0 100%); }
.bsf-divider-alt { position: relative; height: 60px; overflow: hidden; background: var(--color-bg-alt); margin: 0; }
.bsf-divider-alt::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg); clip-path: polygon(0 100%, 100% 0, 100% 100%); }

/* ── 4. Shared eyebrow ───────────────────────────────────────── */
.bsf-section-eyebrow { display: inline-block; font-family: var(--font-body); font-size: 0.78rem; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: var(--color-accent); margin-bottom: var(--space-sm); }

/* ── 5. Intro Split ──────────────────────────────────────────── */
.bsf-intro { background: var(--color-bg); padding: var(--section-pad); }
.bsf-intro-split {
  display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3xl); align-items: center;
}
.bsf-intro-content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.75rem, 3.8vw, 2.6rem);
  font-weight: 800; line-height: 1.15; text-wrap: balance; letter-spacing: -0.02em;
  color: var(--color-primary); margin-bottom: var(--space-lg);
}
.bsf-intro-content h2 .bsf-accent { color: var(--color-accent); }
.bsf-intro-content p {
  font-family: var(--font-body); font-size: 0.97rem; line-height: 1.72;
  color: var(--color-text-light); max-width: 65ch; margin-bottom: var(--space-md);
}
.bsf-intro-meta { display: flex; align-items: center; gap: var(--space-lg); flex-wrap: wrap; margin-top: var(--space-lg); padding-top: var(--space-lg); border-top: 1px solid var(--color-gray-light); }
.bsf-meta-item { display: flex; align-items: center; gap: var(--space-sm); font-family: var(--font-body); font-size: 0.88rem; color: var(--color-text-light); }
.bsf-intro-photo-wrap { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); aspect-ratio: 4/5; }
.bsf-intro-photo-wrap img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform var(--transition-slow); }
.bsf-intro-photo-wrap:hover img { transform: scale(1.04); }
.bsf-intro-badge {
  position: absolute; bottom: var(--space-lg); right: var(--space-lg);
  background: var(--color-accent); color: var(--color-primary-dark);
  font-family: var(--font-heading); font-size: 0.95rem; font-weight: 800;
  padding: var(--space-sm) var(--space-md); border-radius: var(--radius-md);
  text-align: center; line-height: 1.3; box-shadow: var(--shadow-lg);
}
@media (max-width: 1023px) {
  .bsf-intro-split { grid-template-columns: 1fr; gap: var(--space-2xl); }
  .bsf-intro-photo-col { order: -1; }
  .bsf-intro-photo-wrap { aspect-ratio: 16/9; }
}

/* ── 6. Signature: Scope Items Grid ──────────────────────────── */
.bsf-scope { background: var(--color-bg-alt); padding: var(--section-pad); }
.bsf-scope-header { text-align: center; max-width: 680px; margin-inline: auto; margin-bottom: var(--space-3xl); }
.bsf-scope-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800; line-height: 1.15; text-wrap: balance; letter-spacing: -0.02em;
  color: var(--color-primary); margin-bottom: var(--space-md);
}
.bsf-scope-header h2 .bsf-accent { color: var(--color-accent); }
.bsf-scope-header p { font-family: var(--font-body); font-size: 1rem; line-height: 1.65; color: var(--color-text-light); max-width: 58ch; margin-inline: auto; }
.bsf-scope-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-md);
}
.bsf-scope-card {
  background: var(--color-bg);
  border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg);
  border-left: 4px solid var(--color-accent);
  box-shadow: var(--shadow-card);
  display: flex; flex-direction: column; gap: var(--space-sm);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.bsf-scope-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.bsf-scope-card-icon {
  width: 48px; height: 48px; border-radius: var(--radius-md);
  background: rgba(var(--color-accent-rgb), 0.1);
  display: flex; align-items: center; justify-content: center;
}
.bsf-scope-card-icon svg { width: 24px; height: 24px; stroke: var(--color-accent); }
.bsf-scope-card h3 {
  font-family: var(--font-heading); font-size: 1.15rem; font-weight: 700;
  color: var(--color-primary); margin: 0; text-wrap: balance;
}
.bsf-scope-card p {
  font-family: var(--font-body); font-size: 0.88rem; line-height: 1.6;
  color: var(--color-text-light); margin: 0;
}
@media (max-width: 1023px) { .bsf-scope-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 600px) { .bsf-scope-grid { grid-template-columns: 1fr; } }

/* ── 7. Process Steps ────────────────────────────────────────── */
.bsf-process { background: var(--color-bg); padding: var(--section-pad); }
.bsf-process-header { text-align: center; margin-bottom: var(--space-3xl); }
.bsf-process-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800; line-height: 1.15; text-wrap: balance; letter-spacing: -0.02em;
  color: var(--color-primary); margin-bottom: var(--space-sm);
}
.bsf-process-header h2 .bsf-accent { color: var(--color-accent); }
.bsf-process-header p { font-family: var(--font-body); font-size: 1rem; color: var(--color-text-light); line-height: 1.65; max-width: 52ch; margin-inline: auto; }
.bsf-steps {
  display: grid; grid-template-columns: repeat(5, 1fr); gap: var(--space-lg);
  position: relative; margin-top: var(--space-3xl);
}
.bsf-steps::before {
  content: ''; position: absolute; top: 30px;
  left: calc(10% + 12px); right: calc(10% + 12px);
  height: 2px;
  background: linear-gradient(to right, var(--color-accent), rgba(var(--color-accent-rgb), 0.1));
  z-index: 0;
}
.bsf-step { text-align: center; position: relative; z-index: 1; }
.bsf-step-num {
  width: 60px; height: 60px; border-radius: 50%;
  background: var(--color-primary); color: var(--color-white);
  font-family: var(--font-heading); font-size: 1.4rem; font-weight: 800;
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-md); border: 3px solid var(--color-accent); box-shadow: var(--shadow-md);
}
.bsf-step h3 { font-family: var(--font-heading); font-size: 1rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-xs); text-wrap: balance; }
.bsf-step p { font-family: var(--font-body); font-size: 0.86rem; line-height: 1.55; color: var(--color-text-light); max-width: 18ch; margin-inline: auto; }
@media (max-width: 1023px) { .bsf-steps { grid-template-columns: repeat(3, 1fr); } .bsf-steps::before { display: none; } }
@media (max-width: 600px) { .bsf-steps { grid-template-columns: 1fr 1fr; } }

/* ── 8. Mid-Page CTA Banner ──────────────────────────────────── */
.bsf-cta-banner {
  position: relative;
  background: linear-gradient(140deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  padding: var(--space-4xl) var(--space-lg);
  text-align: center; overflow: hidden;
}
.bsf-cta-banner::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5; pointer-events: none;
}
.bsf-cta-inner { position: relative; z-index: 1; max-width: 680px; margin-inline: auto; }
.bsf-cta-inner h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800; color: var(--color-white); text-wrap: balance; letter-spacing: -0.01em; margin-bottom: var(--space-md);
}
.bsf-cta-inner h2 .bsf-accent { color: var(--color-accent); }
.bsf-cta-inner p { font-family: var(--font-body); font-size: 1.05rem; line-height: 1.62; color: rgba(255,255,255,0.82); margin-bottom: var(--space-xl); max-width: 55ch; margin-inline: auto; }
.bsf-btn-cta {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: var(--color-accent); color: var(--color-primary-dark);
  font-family: var(--font-heading); font-size: 1.1rem; font-weight: 700;
  padding: 14px 32px; border-radius: var(--radius-md); text-decoration: none;
  box-shadow: 0 4px 0 rgba(0,0,0,0.3);
  transition: transform var(--transition-fast), box-shadow var(--transition-fast);
}
.bsf-btn-cta:hover { transform: translateY(-2px); box-shadow: 0 6px 0 rgba(0,0,0,0.3); }
.bsf-phone-link { display: block; margin-top: var(--space-md); font-family: var(--font-heading); font-size: 1.25rem; font-weight: 700; color: rgba(255,255,255,0.9); text-decoration: none; letter-spacing: 0.03em; transition: color var(--transition-fast); }
.bsf-phone-link:hover { color: var(--color-accent); }

/* ── 9. FAQ ──────────────────────────────────────────────────── */
.bsf-faq { background: var(--color-bg-alt); padding: var(--section-pad); }
.bsf-faq-header { text-align: center; margin-bottom: var(--space-3xl); }
.bsf-faq-header h2 { font-family: var(--font-heading); font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; line-height: 1.15; text-wrap: balance; letter-spacing: -0.02em; color: var(--color-primary); margin-bottom: var(--space-sm); }
.bsf-faq-header h2 .bsf-accent { color: var(--color-accent); }
.bsf-faq-list { max-width: 760px; margin-inline: auto; display: flex; flex-direction: column; gap: var(--space-sm); }
.bsf-faq-item { border-radius: var(--radius-md); border: 1px solid var(--color-gray-light); overflow: hidden; background: var(--color-bg); }
.bsf-faq-q { display: flex; align-items: center; justify-content: space-between; gap: var(--space-md); width: 100%; padding: var(--space-lg); background: none; border: none; cursor: pointer; text-align: left; font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--color-primary); transition: background var(--transition-fast); }
.bsf-faq-q:hover { background: rgba(var(--color-accent-rgb), 0.05); }
.bsf-faq-q svg { flex-shrink: 0; stroke: var(--color-accent); transition: transform var(--transition-fast); }
.bsf-faq-item.open .bsf-faq-q svg { transform: rotate(180deg); }
.bsf-faq-a { display: none; padding: 0 var(--space-lg) var(--space-lg); font-family: var(--font-body); font-size: 0.95rem; line-height: 1.72; color: var(--color-text-light); max-width: 65ch; }
.bsf-faq-item.open .bsf-faq-a { display: block; }

/* ── 10. Related ─────────────────────────────────────────────── */
.bsf-related { background: var(--color-bg); padding: var(--section-pad); }
.bsf-related-header { text-align: center; margin-bottom: var(--space-3xl); }
.bsf-related-header h2 { font-family: var(--font-heading); font-size: clamp(1.6rem, 3.5vw, 2.4rem); font-weight: 800; line-height: 1.15; text-wrap: balance; color: var(--color-primary); }
.bsf-related-header h2 .bsf-accent { color: var(--color-accent); }

/* ── 11. Closing CTA ─────────────────────────────────────────── */
.bsf-closing { background: var(--color-bg-dark); padding: var(--space-4xl) var(--space-lg); text-align: center; position: relative; overflow: hidden; }
.bsf-closing::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse at 80% 20%, rgba(var(--color-accent-rgb), 0.1) 0%, transparent 55%); pointer-events: none; }
.bsf-closing-inner { position: relative; z-index: 1; max-width: 640px; margin-inline: auto; }
.bsf-closing-inner h2 { font-family: var(--font-heading); font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; color: var(--color-white); text-wrap: balance; letter-spacing: -0.01em; margin-bottom: var(--space-md); }
.bsf-closing-inner p { font-family: var(--font-body); font-size: 1rem; color: rgba(255,255,255,0.75); margin-bottom: var(--space-xl); max-width: 55ch; margin-inline: auto; line-height: 1.65; }

/* ── Mobile ──────────────────────────────────────────────────── */
@media (max-width: 767px) {
  .bsf-intro, .bsf-scope, .bsf-process,
  .bsf-faq, .bsf-related, .bsf-closing { padding: var(--section-pad-mobile); }
  .bsf-cta-banner { padding: var(--space-3xl) var(--space-md); }
}
</style>

<main id="main-content">

  <!-- ── Hero ─────────────────────────────────────────────────── -->
  <section class="bsf-hero" style="background-image: url('<?php echo htmlspecialchars($clientPhotos['photo03']); ?>');" aria-label="Basement Finishing hero">
    <div class="bsf-hero-inner container">
      <div class="bsf-hero-content" data-animate="fade-up">
        <span class="bsf-eyebrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          Bowdon, GA &amp; Carroll County
        </span>
        <h1>Basement Finishing<br><span class="bsf-gradient">Built for Georgia Humidity</span></h1>
        <div class="bsf-hero-stat">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
          Add 40–75% More Livable Space
        </div>
        <p class="bsf-hero-sub">Turn your unfinished basement into functional living space — moisture-managed framing, LVP flooring, electrical, HVAC, and optional full bathroom. Carroll County permitted. <?php echo $yearsInBusiness; ?> years finishing Georgia basements.</p>
        <div class="bsf-hero-actions">
          <a href="/contact/" class="bsf-btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
            Get a Free Estimate
          </a>
          <a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>" class="bsf-btn-ghost">Call <?php echo htmlspecialchars($phone); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Breadcrumb ────────────────────────────────────────────── -->
  <div class="bsf-breadcrumb">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span class="bsf-breadcrumb-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="bsf-breadcrumb-sep" aria-hidden="true">›</span>
        <span aria-current="page">Basement Finishing</span>
      </nav>
    </div>
  </div>

  <!-- ── Intro Split ───────────────────────────────────────────── -->
  <section class="bsf-intro" aria-labelledby="bsf-intro-heading">
    <div class="container">
      <div class="bsf-intro-split">

        <div class="bsf-intro-content" data-animate="fade-up">
          <span class="bsf-section-eyebrow">Basement Finishing in Bowdon, GA</span>
          <h2 id="bsf-intro-heading">$25–$50 per sq ft.<br><span class="bsf-accent">Moisture-Managed from Day One.</span></h2>
          <p>Basement finishing in Bowdon and Carroll County runs $25–$50 per square foot for a complete finish. A 600 sq ft basement runs $15,000–$30,000. A 1,200 sq ft basement with a full bathroom and wet bar runs $45,000–$65,000. Every estimate we write breaks down the scope line by line — no lump sums.</p>
          <p>Carroll County homes built before 1990 have basements that weren't designed for habitable use — raw concrete block, drain tile that may or may not be functional, and slab moisture that will destroy hardwood or carpet within a few years. Before we frame a single wall, we assess moisture and drainage conditions. Georgia's clay soil holds water differently than other states and that affects every material decision.</p>
          <p>A completed basement finish in Bowdon adds 40–75% more livable square footage at a cost-per-square-foot far lower than a home addition. It's the highest-ROI improvement available for homes that have unfinished space below grade.</p>
          <div class="bsf-intro-meta">
            <span class="bsf-meta-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              6–16 weeks typical
            </span>
            <span class="bsf-meta-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              Carroll County permitted
            </span>
            <span class="bsf-meta-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
              Licensed &amp; insured, GA
            </span>
          </div>
          <p style="font-family: var(--font-body); font-size: 0.82rem; color: var(--color-text-light); margin-top: var(--space-md);">Last updated: April 2026</p>
        </div>

        <div class="bsf-intro-photo-col" data-animate="fade-up">
          <div class="bsf-intro-photo-wrap">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['gallery03']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['gallery03']); ?>" alt="Finished basement in Bowdon GA — LVP flooring, drywall, and recessed lighting throughout" width="800" height="1000" loading="lazy">
            </picture>
            <div class="bsf-intro-badge">40–75% More<br>Livable Space</div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="bsf-divider-down" aria-hidden="true"></div>

  <!-- ── Signature: Scope Items Grid ───────────────────────────── -->
  <section class="bsf-scope" aria-labelledby="bsf-scope-heading">
    <div class="container">
      <div class="bsf-scope-header" data-animate="fade-up">
        <span class="bsf-section-eyebrow">What's Included</span>
        <h2 id="bsf-scope-heading">What a Finished Basement<br><span class="bsf-accent">Actually Includes</span></h2>
        <p>A complete basement finish is more than framing and drywall. Here's every layer we address in a Carroll County basement project — and why each one matters in Georgia's climate.</p>
      </div>
      <div class="bsf-scope-grid" data-animate="fade-up">

        <div class="bsf-scope-card">
          <div class="bsf-scope-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M3 15h18M9 3v18M15 3v18"/></svg>
          </div>
          <h3>Flooring</h3>
          <p>LVP floating over vapor barrier is our standard for below-grade. It tolerates slab moisture that destroys hardwood and glue-down carpet. Tile in wet areas and utility zones.</p>
        </div>

        <div class="bsf-scope-card">
          <div class="bsf-scope-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
          </div>
          <h3>Walls &amp; Insulation</h3>
          <p>Pressure-treated bottom plates where walls contact concrete. Closed-cell spray foam or rigid foam board insulation against exterior walls — required in Georgia to meet energy code and prevent condensation.</p>
        </div>

        <div class="bsf-scope-card">
          <div class="bsf-scope-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          </div>
          <h3>Electrical</h3>
          <p>New circuits for lighting, outlets, and HVAC. Carroll County requires a separate permit for electrical work in finished basements. All work inspected and signed off before drywall goes up.</p>
        </div>

        <div class="bsf-scope-card">
          <div class="bsf-scope-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>
          </div>
          <h3>HVAC Extension</h3>
          <p>Extending existing ductwork into the finished space or installing a dedicated mini-split. Georgia's summers make climate control in basements non-negotiable — unconditioned space promotes mold.</p>
        </div>

        <div class="bsf-scope-card">
          <div class="bsf-scope-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
          </div>
          <h3>Egress Windows</h3>
          <p>Bedrooms in Georgia require egress windows with minimum opening area. We excavate for window wells and install code-compliant egress windows when the basement will include a sleeping room.</p>
        </div>

        <div class="bsf-scope-card">
          <div class="bsf-scope-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
          </div>
          <h3>Carroll County Permits</h3>
          <p>We apply for and manage all required permits — building, electrical, plumbing, and mechanical. Every inspection scheduled and passed before work proceeds to the next phase.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="bsf-divider-to-bg" aria-hidden="true"></div>

  <!-- ── Process Steps ────────────────────────────────────────── -->
  <section class="bsf-process" aria-labelledby="bsf-process-heading">
    <div class="container">
      <div class="bsf-process-header" data-animate="fade-up">
        <span class="bsf-section-eyebrow">How It Works</span>
        <h2 id="bsf-process-heading">Moisture Assessment to<br><span class="bsf-accent">Final Certificate</span></h2>
        <p class="prose prose-centered">Basement finishing has a specific sequence that prevents expensive rework. Every step exists because skipping it created a problem on a past Georgia project.</p>
      </div>
      <div class="bsf-steps" data-animate="fade-up">
        <div class="bsf-step">
          <div class="bsf-step-num">1</div>
          <h3>Moisture Assessment</h3>
          <p>We test the slab and walls for moisture before framing anything.</p>
        </div>
        <div class="bsf-step">
          <div class="bsf-step-num">2</div>
          <h3>Permits Pulled</h3>
          <p>Carroll County permits secured before any demo or framing starts.</p>
        </div>
        <div class="bsf-step">
          <div class="bsf-step-num">3</div>
          <h3>Rough Work</h3>
          <p>Framing, electrical, HVAC, and plumbing rough-in inspected.</p>
        </div>
        <div class="bsf-step">
          <div class="bsf-step-num">4</div>
          <h3>Insulation &amp; Drywall</h3>
          <p>Insulation passes county inspection, then drywall and tape.</p>
        </div>
        <div class="bsf-step">
          <div class="bsf-step-num">5</div>
          <h3>Finish &amp; Certificate</h3>
          <p>Flooring, trim, fixtures — final inspection and certificate of occupancy.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="bsf-divider-to-dark" aria-hidden="true"></div>

  <!-- ── Mid-Page CTA Banner ───────────────────────────────────── -->
  <section class="bsf-cta-banner" aria-label="Get a basement finishing estimate">
    <div class="bsf-cta-inner" data-animate="fade-up">
      <h2>Start Using That<br><span class="bsf-accent">Space Below Your Feet.</span></h2>
      <p>Free on-site estimates across Bowdon, Carrollton, Villa Rica, Bremen, and Carroll County. We assess moisture conditions and give you a written, itemized quote before any commitment.</p>
      <a href="/contact/" class="bsf-btn-cta">Get Your Free Basement Estimate →</a>
      <a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>" class="bsf-phone-link"><?php echo htmlspecialchars($phone); ?> — Call or Text</a>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="bsf-divider-from-dark" aria-hidden="true"></div>

  <!-- ── FAQ ──────────────────────────────────────────────────── -->
  <section class="bsf-faq" aria-labelledby="bsf-faq-heading">
    <div class="container">
      <div class="bsf-faq-header" data-animate="fade-up">
        <span class="bsf-section-eyebrow">Common Questions</span>
        <h2 id="bsf-faq-heading">Basement Finishing in Georgia —<br><span class="bsf-accent">Answered</span></h2>
      </div>
      <div class="bsf-faq-list" data-animate="fade-up">
        <?php foreach ($pageFaqs as $i => $faq): ?>
        <div class="bsf-faq-item" id="bsf-faq-<?php echo $i; ?>">
          <button class="bsf-faq-q faq-question" aria-expanded="false" aria-controls="bsf-faq-a-<?php echo $i; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="bsf-faq-a" id="bsf-faq-a-<?php echo $i; ?>" role="region">
            <?php echo htmlspecialchars($faq['a']); ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="bsf-divider-alt" aria-hidden="true"></div>

  <!-- ── Related Services ──────────────────────────────────────── -->
  <section class="bsf-related" aria-labelledby="bsf-related-heading">
    <div class="container">
      <div class="bsf-related-header" data-animate="fade-up">
        <span class="bsf-section-eyebrow">Keep Exploring</span>
        <h2 id="bsf-related-heading">Other Services You <span class="bsf-accent">May Need</span></h2>
      </div>
      <div class="services-grid" data-animate="fade-up">

        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo04']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo04']); ?>" alt="Basement kitchen remodeling in Bowdon GA — custom lower level kitchen installation" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="utensils-crossed"></i></div>
            <h3>Basement Kitchen</h3>
            <p class="service-card__desc">Add a full or secondary kitchen to your finished basement in Bowdon.</p>
            <ul>
              <li>Plumbing rough-in included</li>
              <li>Custom tile and cabinetry</li>
              <li>$18K–$55K typical range</li>
            </ul>
            <a href="/services/basement-kitchen-remodeling/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo07']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo07']); ?>" alt="Remodeling services in Bowdon GA — full home renovation and custom work" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hammer"></i></div>
            <h3>Remodeling Services</h3>
            <p class="service-card__desc">Full-scope remodeling for every room in your Bowdon, GA home.</p>
            <ul>
              <li>Kitchen and bathroom remodels</li>
              <li>Custom tile throughout</li>
              <li>Design-to-install process</li>
            </ul>
            <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo14']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo14']); ?>" alt="Framing contractor in Bowdon GA — residential framing for basement and additions" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="building-2"></i></div>
            <h3>Framing Contractor</h3>
            <p class="service-card__desc">Expert residential framing for basement walls, additions, and structural work.</p>
            <ul>
              <li>Pressure-treated where required</li>
              <li>Load-bearing assessment</li>
              <li>Carroll County permitted</li>
            </ul>
            <a href="/services/framing-contractor/" class="service-card__cta">Learn more</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── Closing CTA ───────────────────────────────────────────── -->
  <section class="bsf-closing" aria-label="Start your basement finishing project">
    <div class="bsf-closing-inner" data-animate="fade-up">
      <span class="bsf-section-eyebrow" style="color: var(--color-accent);">Ready to Start?</span>
      <h2>Your Basement.<br>Georgia-Ready.</h2>
      <p>We've finished basements across Bowdon, Carrollton, Villa Rica, and Carroll County since <?php echo $yearEstablished; ?>. We assess moisture conditions, manage permits, and finish the space to code — no surprises mid-project.</p>
      <a href="/contact/" class="bsf-btn-primary">Schedule a Free Assessment →</a>
    </div>
  </section>

</main>

<script>
(function () {
  document.querySelectorAll('.bsf-faq-q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = this.closest('.bsf-faq-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.bsf-faq-item.open').forEach(function (el) {
        el.classList.remove('open');
        el.querySelector('.bsf-faq-q').setAttribute('aria-expanded', 'false');
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
