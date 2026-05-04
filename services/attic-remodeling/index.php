<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Attic Remodeling in Bowdon, GA | Gray Tile & Remodeling';
$pageDescription = 'Attic remodeling in Bowdon, GA — convert your attic to a bedroom, office, or bonus room. Add 400–800 sq ft. Georgia insulation & egress expertise. Free estimates, Carroll County.';
$canonicalUrl    = $siteUrl . '/services/attic-remodeling/';
$ogImage         = $clientPhotos['photo05'];
$heroPreloadImage = $clientPhotos['photo05'];
$currentPage     = 'services';

$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'attic-remodeling') { $currentService = $svc; break; }
}

$pageFaqs = [
    [
        'q' => 'Does my attic floor have the structural capacity to be finished in a Bowdon home?',
        'a' => 'Most attic floors in Carroll County homes built before 1990 were designed as storage-only — ceiling joists sized for the load of drywall below, not for people walking around or sleeping above. Before any finish work begins, we assess joist sizing, span, and spacing against the live load requirements for habitable space (typically 40 lbs/sq ft). If the existing joists are undersized, we sistering additional joists alongside the existing ones to bring the floor up to code. This is included in our estimate when it\'s needed.',
    ],
    [
        'q' => 'What insulation is required for an attic conversion in Georgia?',
        'a' => 'Georgia\'s climate zone requires R-38 in attic floors under the current energy code — but for a finished attic room, the insulation moves to the roof plane (rafters) rather than the floor. Spray foam applied directly to the underside of the roof deck creates a conditioned attic space that maintains comfortable temperatures in Georgia\'s summers. Batt insulation between rafters is an alternative but is less effective in hot Georgia summers because it allows convection. We specify the insulation approach during the design phase so your finished space is actually comfortable in August.',
    ],
    [
        'q' => 'How much does an attic remodel cost in Bowdon, GA?',
        'a' => 'Attic remodels in Bowdon and Carroll County typically run $35,000–$75,000 depending on scope. A simple storage-to-home-office conversion with HVAC extension, drywall, and flooring runs $35,000–$45,000. Adding a full bedroom with egress window, closet, and a bathroom runs $55,000–$75,000. Structural floor upgrades, dormers, and skylights add cost but also add light and standing room in sloped-ceiling spaces.',
    ],
    [
        'q' => 'What are the egress window requirements for an attic bedroom in Georgia?',
        'a' => 'Georgia follows the International Residential Code for egress from sleeping rooms. An attic bedroom requires at least one egress window with a minimum net clear opening of 5.7 sq ft, a minimum clear opening height of 24 inches, and a minimum sill height of no more than 44 inches from the floor. For most Carroll County attics, this means a dormer window or a gable window at the correct dimension — existing attic windows are usually too small. We design egress solutions that meet code and complement the home\'s exterior appearance before any framing is done.',
    ],
];

$schemaMarkup = $currentService ? generateServiceSchema($currentService) . "\n" . generateFAQSchema($pageFaqs) : generateFAQSchema($pageFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   ATTIC REMODELING — Gray Tile & Remodeling
   Page-specific styles (atr- prefix). All values use var() tokens.
   ================================================================ */

/* ── 1. Hero ─────────────────────────────────────────────────── */
.atr-hero {
  position: relative;
  min-height: 65vh;
  display: flex;
  align-items: flex-end;
  overflow: hidden;
  background-size: cover;
  background-position: center 40%;
  background-repeat: no-repeat;
  animation: atr-kenburns 24s ease-in-out infinite alternate;
}
@keyframes atr-kenburns {
  from { background-size: 110%; background-position: center 38%; }
  to   { background-size: 124%; background-position: center 46%; }
}
.atr-hero::before {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(
    145deg,
    rgba(var(--color-primary-dark-rgb), 0.92) 0%,
    rgba(var(--color-primary-rgb), 0.68) 48%,
    rgba(var(--color-accent-rgb), 0.18) 100%
  );
  z-index: 1;
}
.atr-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5; z-index: 2; pointer-events: none;
}
.atr-hero-inner { position: relative; z-index: 3; width: 100%; padding: var(--space-4xl) var(--space-lg); }
.atr-hero-content { max-width: 760px; }
.atr-eyebrow {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: rgba(var(--color-accent-rgb), 0.15); color: var(--color-accent);
  font-family: var(--font-body); font-size: 0.78rem; font-weight: 700;
  letter-spacing: 0.13em; text-transform: uppercase;
  padding: 5px 14px; border-radius: 100px; margin-bottom: var(--space-lg);
  border: 1px solid rgba(var(--color-accent-rgb), 0.3);
}
.atr-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.4rem, 5.8vw, 4.2rem);
  font-weight: 800; line-height: 1.1; text-wrap: balance;
  letter-spacing: -0.02em; color: var(--color-white); margin-bottom: var(--space-lg);
}
.atr-hero h1 .atr-gradient {
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.9) 100%);
  -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
}
.atr-hero-stat {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: rgba(var(--color-accent-rgb), 0.18);
  border: 1px solid rgba(var(--color-accent-rgb), 0.4);
  color: var(--color-accent);
  font-family: var(--font-heading); font-size: 0.9rem; font-weight: 700;
  letter-spacing: 0.06em; padding: 6px 16px; border-radius: var(--radius-md); margin-bottom: var(--space-xl);
}
.atr-hero-sub {
  font-family: var(--font-body); font-size: clamp(0.95rem, 2vw, 1.12rem);
  line-height: 1.7; color: rgba(255,255,255,0.84); max-width: 545px; margin-bottom: var(--space-xl);
}
.atr-hero-actions { display: flex; align-items: center; gap: var(--space-md); flex-wrap: wrap; }
.atr-btn-primary {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: var(--color-accent); color: var(--color-primary-dark);
  font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; letter-spacing: 0.04em;
  padding: 14px 28px; border-radius: var(--radius-md); text-decoration: none;
  box-shadow: 0 4px 0 rgba(var(--color-primary-dark-rgb), 0.5);
  transition: transform var(--transition-fast), box-shadow var(--transition-fast); overflow: hidden;
}
.atr-btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 0 rgba(var(--color-primary-dark-rgb), 0.5); }
.atr-btn-primary:active { transform: translateY(2px); box-shadow: 0 2px 0 rgba(var(--color-primary-dark-rgb), 0.5); }
.atr-btn-ghost {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: transparent; color: var(--color-white);
  font-family: var(--font-heading); font-size: 1rem; font-weight: 600;
  padding: 13px 24px; border-radius: var(--radius-md);
  border: 2px solid rgba(255,255,255,0.38); text-decoration: none;
  transition: background var(--transition-fast), border-color var(--transition-fast);
}
.atr-btn-ghost:hover { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.6); }
@media (max-width: 767px) {
  .atr-hero { min-height: 52vh; }
  .atr-hero-inner { padding: var(--space-3xl) var(--space-md); }
}

/* ── 2. Breadcrumb ───────────────────────────────────────────── */
.atr-breadcrumb { background: var(--color-bg-alt); padding: var(--space-md) 0; border-bottom: 1px solid var(--color-gray-light); }
.atr-breadcrumb nav { display: flex; align-items: center; gap: var(--space-sm); font-family: var(--font-body); font-size: 0.85rem; color: var(--color-text-light); flex-wrap: wrap; }
.atr-breadcrumb a { color: var(--color-accent); text-decoration: none; transition: color var(--transition-fast); }
.atr-breadcrumb a:hover { color: var(--color-primary); }
.atr-breadcrumb-sep { color: var(--color-gray-light); }

/* ── 3. Dividers ─────────────────────────────────────────────── */
.atr-divider-down { position: relative; height: 60px; overflow: hidden; background: var(--color-bg); margin: 0; }
.atr-divider-down::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg-alt); clip-path: polygon(0 100%, 100% 0, 100% 100%); }
.atr-divider-to-bg { position: relative; height: 60px; overflow: hidden; background: var(--color-bg-alt); margin: 0; }
.atr-divider-to-bg::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg); clip-path: polygon(0 0, 100% 100%, 0 100%); }
.atr-divider-to-dark { position: relative; height: 60px; overflow: hidden; background: var(--color-bg); margin: 0; }
.atr-divider-to-dark::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg-dark); clip-path: polygon(0 100%, 100% 0, 100% 100%); }
.atr-divider-from-dark { position: relative; height: 60px; overflow: hidden; background: var(--color-bg-dark); margin: 0; }
.atr-divider-from-dark::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg-alt); clip-path: polygon(0 0, 100% 100%, 0 100%); }
.atr-divider-alt { position: relative; height: 60px; overflow: hidden; background: var(--color-bg-alt); margin: 0; }
.atr-divider-alt::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--color-bg); clip-path: polygon(0 100%, 100% 0, 100% 100%); }

/* ── 4. Shared eyebrow ───────────────────────────────────────── */
.atr-section-eyebrow { display: inline-block; font-family: var(--font-body); font-size: 0.78rem; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: var(--color-accent); margin-bottom: var(--space-sm); }

/* ── 5. Intro Split ──────────────────────────────────────────── */
.atr-intro { background: var(--color-bg); padding: var(--section-pad); }
.atr-intro-split { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3xl); align-items: center; }
.atr-intro-content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.75rem, 3.8vw, 2.6rem);
  font-weight: 800; line-height: 1.15; text-wrap: balance; letter-spacing: -0.02em;
  color: var(--color-primary); margin-bottom: var(--space-lg);
}
.atr-intro-content h2 .atr-accent { color: var(--color-accent); }
.atr-intro-content p { font-family: var(--font-body); font-size: 0.97rem; line-height: 1.72; color: var(--color-text-light); max-width: 65ch; margin-bottom: var(--space-md); }
.atr-intro-meta { display: flex; align-items: center; gap: var(--space-lg); flex-wrap: wrap; margin-top: var(--space-lg); padding-top: var(--space-lg); border-top: 1px solid var(--color-gray-light); }
.atr-meta-item { display: flex; align-items: center; gap: var(--space-sm); font-family: var(--font-body); font-size: 0.88rem; color: var(--color-text-light); }
.atr-intro-photo-wrap { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); aspect-ratio: 4/5; }
.atr-intro-photo-wrap img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform var(--transition-slow); }
.atr-intro-photo-wrap:hover img { transform: scale(1.04); }
.atr-intro-badge { position: absolute; bottom: var(--space-lg); right: var(--space-lg); background: var(--color-accent); color: var(--color-primary-dark); font-family: var(--font-heading); font-size: 0.95rem; font-weight: 800; padding: var(--space-sm) var(--space-md); border-radius: var(--radius-md); text-align: center; line-height: 1.3; box-shadow: var(--shadow-lg); }
@media (max-width: 1023px) { .atr-intro-split { grid-template-columns: 1fr; gap: var(--space-2xl); } .atr-intro-photo-col { order: -1; } .atr-intro-photo-wrap { aspect-ratio: 16/9; } }

/* ── 6. Signature: Attic Use Types Grid ──────────────────────── */
.atr-uses { background: var(--color-bg-alt); padding: var(--section-pad); }
.atr-uses-header { text-align: center; max-width: 680px; margin-inline: auto; margin-bottom: var(--space-3xl); }
.atr-uses-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800; line-height: 1.15; text-wrap: balance; letter-spacing: -0.02em;
  color: var(--color-primary); margin-bottom: var(--space-md);
}
.atr-uses-header h2 .atr-accent { color: var(--color-accent); }
.atr-uses-header p { font-family: var(--font-body); font-size: 1rem; line-height: 1.65; color: var(--color-text-light); max-width: 58ch; margin-inline: auto; }
.atr-uses-grid {
  display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--space-md);
}
.atr-use-card {
  background: var(--color-bg);
  border-radius: var(--radius-lg);
  overflow: hidden;
  display: flex;
  box-shadow: var(--shadow-card);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.atr-use-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.atr-use-card-accent {
  width: 6px;
  flex-shrink: 0;
  background: var(--color-accent);
}
.atr-use-card-body {
  padding: var(--space-xl) var(--space-lg);
  display: flex; flex-direction: column; gap: var(--space-sm);
}
.atr-use-card-icon {
  width: 48px; height: 48px; border-radius: var(--radius-md);
  background: rgba(var(--color-primary-rgb), 0.07);
  display: flex; align-items: center; justify-content: center; flex-shrink: 0;
  margin-bottom: var(--space-xs);
}
.atr-use-card-icon svg { width: 24px; height: 24px; stroke: var(--color-primary); }
.atr-use-card h3 { font-family: var(--font-heading); font-size: 1.25rem; font-weight: 700; color: var(--color-primary); margin: 0; text-wrap: balance; }
.atr-use-badge {
  display: inline-block;
  background: rgba(var(--color-accent-rgb), 0.12);
  color: var(--color-accent);
  font-family: var(--font-heading); font-size: 0.78rem; font-weight: 700;
  letter-spacing: 0.06em; padding: 3px 10px; border-radius: 100px;
  border: 1px solid rgba(var(--color-accent-rgb), 0.25);
}
.atr-use-card p { font-family: var(--font-body); font-size: 0.9rem; line-height: 1.62; color: var(--color-text-light); margin: 0; max-width: 50ch; }
@media (max-width: 767px) { .atr-uses-grid { grid-template-columns: 1fr; } }

/* ── 7. Process Steps ────────────────────────────────────────── */
.atr-process { background: var(--color-bg); padding: var(--section-pad); }
.atr-process-header { text-align: center; margin-bottom: var(--space-3xl); }
.atr-process-header h2 { font-family: var(--font-heading); font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; line-height: 1.15; text-wrap: balance; letter-spacing: -0.02em; color: var(--color-primary); margin-bottom: var(--space-sm); }
.atr-process-header h2 .atr-accent { color: var(--color-accent); }
.atr-process-header p { font-family: var(--font-body); font-size: 1rem; color: var(--color-text-light); line-height: 1.65; max-width: 52ch; margin-inline: auto; }
.atr-steps { display: grid; grid-template-columns: repeat(5, 1fr); gap: var(--space-lg); position: relative; margin-top: var(--space-3xl); }
.atr-steps::before { content: ''; position: absolute; top: 30px; left: calc(10% + 12px); right: calc(10% + 12px); height: 2px; background: linear-gradient(to right, var(--color-accent), rgba(var(--color-accent-rgb), 0.1)); z-index: 0; }
.atr-step { text-align: center; position: relative; z-index: 1; }
.atr-step-num { width: 60px; height: 60px; border-radius: 50%; background: var(--color-primary); color: var(--color-white); font-family: var(--font-heading); font-size: 1.4rem; font-weight: 800; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-md); border: 3px solid var(--color-accent); box-shadow: var(--shadow-md); }
.atr-step h3 { font-family: var(--font-heading); font-size: 1rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-xs); text-wrap: balance; }
.atr-step p { font-family: var(--font-body); font-size: 0.86rem; line-height: 1.55; color: var(--color-text-light); max-width: 18ch; margin-inline: auto; }
@media (max-width: 1023px) { .atr-steps { grid-template-columns: repeat(3, 1fr); } .atr-steps::before { display: none; } }
@media (max-width: 600px) { .atr-steps { grid-template-columns: 1fr 1fr; } }

/* ── 8. Mid-Page CTA Banner ──────────────────────────────────── */
.atr-cta-banner {
  position: relative;
  background: linear-gradient(140deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  padding: var(--space-4xl) var(--space-lg);
  text-align: center; overflow: hidden;
}
.atr-cta-banner::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5; pointer-events: none;
}
.atr-cta-inner { position: relative; z-index: 1; max-width: 680px; margin-inline: auto; }
.atr-cta-inner h2 { font-family: var(--font-heading); font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; color: var(--color-white); text-wrap: balance; letter-spacing: -0.01em; margin-bottom: var(--space-md); }
.atr-cta-inner h2 .atr-accent { color: var(--color-accent); }
.atr-cta-inner p { font-family: var(--font-body); font-size: 1.05rem; line-height: 1.62; color: rgba(255,255,255,0.82); margin-bottom: var(--space-xl); max-width: 55ch; margin-inline: auto; }
.atr-btn-cta {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  background: var(--color-accent); color: var(--color-primary-dark);
  font-family: var(--font-heading); font-size: 1.1rem; font-weight: 700;
  padding: 14px 32px; border-radius: var(--radius-md); text-decoration: none;
  box-shadow: 0 4px 0 rgba(0,0,0,0.3);
  transition: transform var(--transition-fast), box-shadow var(--transition-fast);
}
.atr-btn-cta:hover { transform: translateY(-2px); box-shadow: 0 6px 0 rgba(0,0,0,0.3); }
.atr-phone-link { display: block; margin-top: var(--space-md); font-family: var(--font-heading); font-size: 1.25rem; font-weight: 700; color: rgba(255,255,255,0.9); text-decoration: none; letter-spacing: 0.03em; transition: color var(--transition-fast); }
.atr-phone-link:hover { color: var(--color-accent); }

/* ── 9. FAQ ──────────────────────────────────────────────────── */
.atr-faq { background: var(--color-bg-alt); padding: var(--section-pad); }
.atr-faq-header { text-align: center; margin-bottom: var(--space-3xl); }
.atr-faq-header h2 { font-family: var(--font-heading); font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; line-height: 1.15; text-wrap: balance; letter-spacing: -0.02em; color: var(--color-primary); margin-bottom: var(--space-sm); }
.atr-faq-header h2 .atr-accent { color: var(--color-accent); }
.atr-faq-list { max-width: 760px; margin-inline: auto; display: flex; flex-direction: column; gap: var(--space-sm); }
.atr-faq-item { border-radius: var(--radius-md); border: 1px solid var(--color-gray-light); overflow: hidden; background: var(--color-bg); }
.atr-faq-q { display: flex; align-items: center; justify-content: space-between; gap: var(--space-md); width: 100%; padding: var(--space-lg); background: none; border: none; cursor: pointer; text-align: left; font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--color-primary); transition: background var(--transition-fast); }
.atr-faq-q:hover { background: rgba(var(--color-accent-rgb), 0.05); }
.atr-faq-q svg { flex-shrink: 0; stroke: var(--color-accent); transition: transform var(--transition-fast); }
.atr-faq-item.open .atr-faq-q svg { transform: rotate(180deg); }
.atr-faq-a { display: none; padding: 0 var(--space-lg) var(--space-lg); font-family: var(--font-body); font-size: 0.95rem; line-height: 1.72; color: var(--color-text-light); max-width: 65ch; }
.atr-faq-item.open .atr-faq-a { display: block; }

/* ── 10. Related ─────────────────────────────────────────────── */
.atr-related { background: var(--color-bg); padding: var(--section-pad); }
.atr-related-header { text-align: center; margin-bottom: var(--space-3xl); }
.atr-related-header h2 { font-family: var(--font-heading); font-size: clamp(1.6rem, 3.5vw, 2.4rem); font-weight: 800; line-height: 1.15; text-wrap: balance; color: var(--color-primary); }
.atr-related-header h2 .atr-accent { color: var(--color-accent); }

/* ── 11. Closing CTA ─────────────────────────────────────────── */
.atr-closing { background: var(--color-bg-dark); padding: var(--space-4xl) var(--space-lg); text-align: center; position: relative; overflow: hidden; }
.atr-closing::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse at 60% 40%, rgba(var(--color-accent-rgb), 0.09) 0%, transparent 55%); pointer-events: none; }
.atr-closing-inner { position: relative; z-index: 1; max-width: 640px; margin-inline: auto; }
.atr-closing-inner h2 { font-family: var(--font-heading); font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; color: var(--color-white); text-wrap: balance; letter-spacing: -0.01em; margin-bottom: var(--space-md); }
.atr-closing-inner p { font-family: var(--font-body); font-size: 1rem; color: rgba(255,255,255,0.75); margin-bottom: var(--space-xl); max-width: 55ch; margin-inline: auto; line-height: 1.65; }

/* ── Mobile ──────────────────────────────────────────────────── */
@media (max-width: 767px) {
  .atr-intro, .atr-uses, .atr-process,
  .atr-faq, .atr-related, .atr-closing { padding: var(--section-pad-mobile); }
  .atr-cta-banner { padding: var(--space-3xl) var(--space-md); }
}
</style>

<main id="main-content">

  <!-- ── Hero ─────────────────────────────────────────────────── -->
  <section class="atr-hero" style="background-image: url('<?php echo htmlspecialchars($clientPhotos['photo05']); ?>');" aria-label="Attic Remodeling hero">
    <div class="atr-hero-inner container">
      <div class="atr-hero-content" data-animate="fade-up">
        <span class="atr-eyebrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          Bowdon, GA &amp; Carroll County
        </span>
        <h1>Attic Remodeling<br><span class="atr-gradient">Space You're Not Using Yet</span></h1>
        <div class="atr-hero-stat">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
          Add 400–800 sq ft of Livable Space
        </div>
        <p class="atr-hero-sub">Convert your attic into a bedroom, home office, playroom, or bonus room — structural floor assessment, Georgia-appropriate insulation, egress windows, and Carroll County permits all handled. <?php echo $yearsInBusiness; ?> years remodeling West Georgia homes.</p>
        <div class="atr-hero-actions">
          <a href="/contact/" class="atr-btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
            Get a Free Estimate
          </a>
          <a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>" class="atr-btn-ghost">Call <?php echo htmlspecialchars($phone); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Breadcrumb ────────────────────────────────────────────── -->
  <div class="atr-breadcrumb">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span class="atr-breadcrumb-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="atr-breadcrumb-sep" aria-hidden="true">›</span>
        <span aria-current="page">Attic Remodeling</span>
      </nav>
    </div>
  </div>

  <!-- ── Intro Split ───────────────────────────────────────────── -->
  <section class="atr-intro" aria-labelledby="atr-intro-heading">
    <div class="container">
      <div class="atr-intro-split">

        <div class="atr-intro-content" data-animate="fade-up">
          <span class="atr-section-eyebrow">Attic Remodeling in Bowdon, GA</span>
          <h2 id="atr-intro-heading">$35K–$75K.<br><span class="atr-accent">400–800 sq ft Added.</span></h2>
          <p>Attic remodels in Bowdon and Carroll County run $35,000–$75,000 depending on scope and structural condition. A home office or bonus room conversion with HVAC extension, insulation, drywall, and flooring runs $35,000–$45,000. Adding a legal bedroom — which requires an egress window, closet, and code compliance — runs $50,000–$65,000. A full suite with bathroom runs $65,000–$75,000.</p>
          <p>Before we quote any attic project, we assess two things first: whether the floor structure can carry habitable loads, and whether the attic has enough headroom for the intended use. Most Carroll County attics have 7–9 feet at the peak with usable floor area of 400–800 sq ft depending on the home's footprint and pitch. We design around the shape of the space rather than against it.</p>
          <p>Georgia's summers make insulation the most important decision in an attic conversion. A spray foam conditioned attic runs significantly cooler than one with batt insulation — the difference between a room that's comfortable in August and one that's unusable. We specify the right insulation approach for the intended use before anything else is decided.</p>
          <div class="atr-intro-meta">
            <span class="atr-meta-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              8–14 weeks typical
            </span>
            <span class="atr-meta-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              Carroll County permitted
            </span>
            <span class="atr-meta-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
              Licensed &amp; insured, GA
            </span>
          </div>
          <p style="font-family: var(--font-body); font-size: 0.82rem; color: var(--color-text-light); margin-top: var(--space-md);">Last updated: April 2026</p>
        </div>

        <div class="atr-intro-photo-col" data-animate="fade-up">
          <div class="atr-intro-photo-wrap">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo06']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo06']); ?>" alt="Finished attic remodel in Bowdon GA — converted to home office with natural light and hardwood flooring" width="800" height="1000" loading="lazy">
            </picture>
            <div class="atr-intro-badge">400–800<br>sq ft Added</div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="atr-divider-down" aria-hidden="true"></div>

  <!-- ── Signature: Attic Use Types Grid ───────────────────────── -->
  <section class="atr-uses" aria-labelledby="atr-uses-heading">
    <div class="container">
      <div class="atr-uses-header" data-animate="fade-up">
        <span class="atr-section-eyebrow">What We Build</span>
        <h2 id="atr-uses-heading">Four Ways Bowdon Homeowners<br><span class="atr-accent">Use Their Attic Conversion</span></h2>
        <p>The right use depends on your home's attic geometry, structural condition, and your household's needs. Here's how each configuration differs in scope and cost.</p>
      </div>
      <div class="atr-uses-grid" data-animate="fade-up">

        <div class="atr-use-card">
          <div class="atr-use-card-accent" aria-hidden="true"></div>
          <div class="atr-use-card-body">
            <div class="atr-use-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            </div>
            <h3>Home Office</h3>
            <span class="atr-use-badge">$35K–$45K</span>
            <p>The most common conversion — hardwood or LVP flooring, built-in shelving, recessed lighting, and HVAC extension. Egress window not required for non-sleeping use. Fastest-to-complete attic project.</p>
          </div>
        </div>

        <div class="atr-use-card">
          <div class="atr-use-card-accent" aria-hidden="true"></div>
          <div class="atr-use-card-body">
            <div class="atr-use-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            </div>
            <h3>Bedroom</h3>
            <span class="atr-use-badge">$50K–$65K</span>
            <p>Requires a code-compliant egress window (5.7 sq ft min net clear opening), a closet, and HVAC. We design egress solutions that fit the home's roofline before pricing. Adds a bedroom to the home's legal count.</p>
          </div>
        </div>

        <div class="atr-use-card">
          <div class="atr-use-card-accent" aria-hidden="true"></div>
          <div class="atr-use-card-body">
            <div class="atr-use-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
            </div>
            <h3>Playroom / Bonus Room</h3>
            <span class="atr-use-badge">$38K–$50K</span>
            <p>Open floor plan with durable flooring, built-in storage niches, and adequate lighting. Sound insulation between floors is a common add-on for households with young children and main-level living below.</p>
          </div>
        </div>

        <div class="atr-use-card">
          <div class="atr-use-card-accent" aria-hidden="true"></div>
          <div class="atr-use-card-body">
            <div class="atr-use-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            </div>
            <h3>Conditioned Storage</h3>
            <span class="atr-use-badge">$22K–$32K</span>
            <p>Spray foam insulation, pull-down stair upgrade, lighting, and finished flooring — without full habitability requirements. Protects stored items from Georgia's summer heat and humidity. No egress or HVAC extension required.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="atr-divider-to-bg" aria-hidden="true"></div>

  <!-- ── Process Steps ────────────────────────────────────────── -->
  <section class="atr-process" aria-labelledby="atr-process-heading">
    <div class="container">
      <div class="atr-process-header" data-animate="fade-up">
        <span class="atr-section-eyebrow">How It Works</span>
        <h2 id="atr-process-heading">Structural Check to<br><span class="atr-accent">Finished Space</span></h2>
        <p class="prose prose-centered">Attic conversions require structural and thermal assessments before design work begins. Here's the sequence that keeps projects on schedule and on budget in Carroll County.</p>
      </div>
      <div class="atr-steps" data-animate="fade-up">
        <div class="atr-step">
          <div class="atr-step-num">1</div>
          <h3>Structural Assessment</h3>
          <p>Floor joist sizing and headroom evaluated before any scope is committed.</p>
        </div>
        <div class="atr-step">
          <div class="atr-step-num">2</div>
          <h3>Design &amp; Permits</h3>
          <p>Egress solutions designed, permits applied to Carroll County.</p>
        </div>
        <div class="atr-step">
          <div class="atr-step-num">3</div>
          <h3>Structural Upgrades</h3>
          <p>Floor sistering and egress framing completed and inspected.</p>
        </div>
        <div class="atr-step">
          <div class="atr-step-num">4</div>
          <h3>Insulation &amp; HVAC</h3>
          <p>Spray foam applied, HVAC extended — inspected before drywall.</p>
        </div>
        <div class="atr-step">
          <div class="atr-step-num">5</div>
          <h3>Finish &amp; Certificate</h3>
          <p>Flooring, drywall, trim — final county inspection and certificate.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="atr-divider-to-dark" aria-hidden="true"></div>

  <!-- ── Mid-Page CTA Banner ───────────────────────────────────── -->
  <section class="atr-cta-banner" aria-label="Get an attic remodeling estimate">
    <div class="atr-cta-inner" data-animate="fade-up">
      <h2>The Space Is Already There.<br><span class="atr-accent">Let's Make It Livable.</span></h2>
      <p>Free on-site estimates across Bowdon, Carrollton, Villa Rica, Bremen, and Carroll County. We assess structural conditions and insulation needs — and tell you what's realistic before you commit to a scope.</p>
      <a href="/contact/" class="atr-btn-cta">Get Your Free Attic Assessment →</a>
      <a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>" class="atr-phone-link"><?php echo htmlspecialchars($phone); ?> — Call or Text</a>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="atr-divider-from-dark" aria-hidden="true"></div>

  <!-- ── FAQ ──────────────────────────────────────────────────── -->
  <section class="atr-faq" aria-labelledby="atr-faq-heading">
    <div class="container">
      <div class="atr-faq-header" data-animate="fade-up">
        <span class="atr-section-eyebrow">Common Questions</span>
        <h2 id="atr-faq-heading">Attic Remodeling in Georgia —<br><span class="atr-accent">Answered</span></h2>
      </div>
      <div class="atr-faq-list" data-animate="fade-up">
        <?php foreach ($pageFaqs as $i => $faq): ?>
        <div class="atr-faq-item" id="atr-faq-<?php echo $i; ?>">
          <button class="atr-faq-q faq-question" aria-expanded="false" aria-controls="atr-faq-a-<?php echo $i; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="atr-faq-a" id="atr-faq-a-<?php echo $i; ?>" role="region">
            <?php echo htmlspecialchars($faq['a']); ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="atr-divider-alt" aria-hidden="true"></div>

  <!-- ── Related Services ──────────────────────────────────────── -->
  <section class="atr-related" aria-labelledby="atr-related-heading">
    <div class="container">
      <div class="atr-related-header" data-animate="fade-up">
        <span class="atr-section-eyebrow">Keep Exploring</span>
        <h2 id="atr-related-heading">Other Services You <span class="atr-accent">May Need</span></h2>
      </div>
      <div class="services-grid" data-animate="fade-up">

        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo13']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo13']); ?>" alt="Garage conversion in Bowdon GA — converting attached garage to living space" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="car"></i></div>
            <h3>Garage Conversion</h3>
            <p class="service-card__desc">Convert your attached garage to livable space in Bowdon, GA.</p>
            <ul>
              <li>Insulated walls and ceiling</li>
              <li>HVAC and electrical work</li>
              <li>Carroll County permitted</li>
            </ul>
            <a href="/services/garage-conversion/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo12']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo12']); ?>" alt="Room additions in Bowdon GA — new master bedroom addition" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="plus-square"></i></div>
            <h3>Room Additions</h3>
            <p class="service-card__desc">Add bedrooms, bathrooms, or living space beyond your home's current footprint.</p>
            <ul>
              <li>Full foundation to finish</li>
              <li>Seamless exterior match</li>
              <li>Increases legal sq footage</li>
            </ul>
            <a href="/services/room-additions/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo14']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo14']); ?>" alt="Framing contractor in Bowdon GA — structural framing for attic conversion" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="building-2"></i></div>
            <h3>Framing Contractor</h3>
            <p class="service-card__desc">Expert structural framing for attic floor upgrades, dormers, and additions.</p>
            <ul>
              <li>Joist sistering for live loads</li>
              <li>Dormer framing and egress</li>
              <li>Carroll County permitted</li>
            </ul>
            <a href="/services/framing-contractor/" class="service-card__cta">Learn more</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── Closing CTA ───────────────────────────────────────────── -->
  <section class="atr-closing" aria-label="Start your attic remodeling project">
    <div class="atr-closing-inner" data-animate="fade-up">
      <span class="atr-section-eyebrow" style="color: var(--color-accent);">Ready to Start?</span>
      <h2>Your Attic.<br>Georgia-Ready.</h2>
      <p>We've converted attics across Bowdon, Carrollton, Villa Rica, and Carroll County since <?php echo $yearEstablished; ?>. We handle structural assessment, insulation design, permits, and finish work — tell us what you want the space to be and we'll tell you what it takes.</p>
      <a href="/contact/" class="atr-btn-primary">Schedule a Free Assessment →</a>
    </div>
  </section>

</main>

<script>
(function () {
  document.querySelectorAll('.atr-faq-q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = this.closest('.atr-faq-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.atr-faq-item.open').forEach(function (el) {
        el.classList.remove('open');
        el.querySelector('.atr-faq-q').setAttribute('aria-expanded', 'false');
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
