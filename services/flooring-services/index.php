<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Flooring Services in Bowdon, GA — Tile, LVP & Hardwood | Gray Tile & Remodeling';
$pageDescription = 'Custom tile showers, LVP flooring, hardwood refinishing, and subfloor replacement in Bowdon, GA. Gray Tile & Remodeling — 25 years of West Georgia floor expertise.';
$canonicalUrl    = $siteUrl . '/services/flooring-services/';
$ogImage         = $clientPhotos['photo08'];
$currentPage     = 'services';

$pageFaqs = [
    [
        'q' => 'Is tile or LVP better for Georgia homes with humidity?',
        'a' => 'Both are appropriate for Georgia\'s humidity when installed correctly. Porcelain tile is the more dimensionally stable option in high-moisture areas like bathrooms and laundry rooms — it doesn\'t swell. LVP is superior in below-grade applications like basements where water infiltration through the slab is possible, since it can be installed floating over a moisture barrier. In main living areas, LVP installs faster and costs less. We\'ll tell you which is the better call for your specific room, subfloor condition, and moisture profile.',
    ],
    [
        'q' => 'What subfloor conditions are required before tile installation in Bowdon?',
        'a' => 'Tile requires a substrate that deflects less than L/360 (length divided by 360) under live load. Most Bowdon homes built before 1995 have subfloors that are borderline — they need either blocking between joists, a layer of Schluter Ditra or cement board, or a full subfloor panel replacement before tile will last without cracking. We assess subfloor stiffness during our on-site estimate and include any required preparation in the project quote rather than discovering it mid-project.',
    ],
    [
        'q' => 'How long does flooring installation take for a typical Bowdon home?',
        'a' => 'A single room with LVP takes 1–2 days. A full ground floor with LVP runs 3–5 days. Custom tile showers require 5–10 days including waterproofing cure time. Hardwood refinishing takes 3–5 days plus 24–48 hours of off-gassing before you can walk on it. These timelines assume subfloor prep is complete before we start finish flooring — we build all prep time into the project schedule.',
    ],
];

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',             'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services',         'item' => $siteUrl . '/services/'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Flooring Services','item' => $siteUrl . '/services/flooring-services/'],
            ],
        ],
        [
            '@type'       => 'ItemList',
            'name'        => 'Flooring Services — Gray Tile & Remodeling',
            'description' => 'Custom tile showers, LVP flooring, hardwood refinishing, and subfloor work in Bowdon, GA.',
            'itemListElement' => array_map(function($name, $i) {
                return ['@type' => 'ListItem', 'position' => $i + 1, 'name' => $name, 'item' => ['@type' => 'Service', 'name' => $name]];
            }, ['Open Floor Plan Remodeling','Custom Tile Showers','Flooring Installation','Sanded Finish Flooring','LVP Flooring','Subfloor Replacement'], range(0, 5)),
        ],
        [
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(fn($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $pageFaqs),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   FLOORING SERVICES — Gray Tile & Remodeling
   Page-specific styles. All values use var() tokens only.
   ================================================================ */

/* ── 1. Hero ─────────────────────────────────────────────────── */
.fs-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: flex-end;
  overflow: hidden;
  background-size: cover;
  background-position: center 50%;
  background-repeat: no-repeat;
  animation: fs-kenburns 24s ease-in-out infinite alternate;
}
@keyframes fs-kenburns {
  from { background-size: 112%; background-position: center 48%; }
  to   { background-size: 122%; background-position: center 54%; }
}
.fs-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to top,
    rgba(var(--color-primary-dark-rgb), 0.97) 0%,
    rgba(var(--color-primary-rgb), 0.75) 50%,
    rgba(var(--color-primary-rgb), 0.35) 100%
  );
  z-index: 1;
}
.fs-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.7' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5;
  z-index: 2;
  pointer-events: none;
}
.fs-hero-inner {
  position: relative;
  z-index: 3;
  width: 100%;
  padding: var(--space-4xl) var(--space-lg);
  display: flex;
  align-items: flex-end;
}
.fs-hero-content {
  max-width: 780px;
}
.fs-hero-eyebrow {
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
.fs-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.2rem, 5.5vw, 4rem);
  font-weight: 800;
  line-height: 1.1;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-white);
  margin-bottom: var(--space-lg);
}
.fs-hero h1 .text-gradient {
  background: linear-gradient(135deg, var(--color-accent), #a5f3fc);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
.fs-hero-sub {
  font-family: var(--font-body);
  font-size: clamp(0.95rem, 2vw, 1.15rem);
  line-height: 1.65;
  color: rgba(255,255,255,0.82);
  max-width: 560px;
  margin-bottom: var(--space-xl);
}
.fs-hero-actions {
  display: flex;
  align-items: center;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.fs-btn-primary {
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
.fs-btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 0 rgba(var(--color-primary-dark-rgb), 0.5); }
.fs-btn-primary:active { transform: translateY(2px); box-shadow: 0 2px 0 rgba(var(--color-primary-dark-rgb), 0.5); }
.fs-btn-ghost {
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
  border: 2px solid rgba(255,255,255,0.4);
  text-decoration: none;
  transition: background var(--transition-fast), border-color var(--transition-fast);
}
.fs-btn-ghost:hover { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.65); }
@media (max-width: 767px) {
  .fs-hero { min-height: 50vh; }
  .fs-hero-inner { padding: var(--space-3xl) var(--space-md); }
}

/* ── 2. Breadcrumb ───────────────────────────────────────────── */
.fs-breadcrumb {
  background: var(--color-bg-alt);
  padding: var(--space-md) 0;
  border-bottom: 1px solid var(--color-gray-light);
}
.fs-breadcrumb nav {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-family: var(--font-body);
  font-size: 0.85rem;
  color: var(--color-text-light);
  flex-wrap: wrap;
}
.fs-breadcrumb a { color: var(--color-accent); text-decoration: none; transition: color var(--transition-fast); }
.fs-breadcrumb a:hover { color: var(--color-primary); }
.fs-breadcrumb-sep { color: var(--color-gray-light); }

/* ── 3. Section Dividers ─────────────────────────────────────── */
.fs-divider-down {
  position: relative; height: 60px; overflow: hidden; background: var(--color-bg); margin: 0;
}
.fs-divider-down::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px;
  background: var(--color-bg-alt); clip-path: polygon(0 100%, 100% 0, 100% 100%);
}
.fs-divider-to-bg {
  position: relative; height: 60px; overflow: hidden; background: var(--color-bg-alt); margin: 0;
}
.fs-divider-to-bg::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px;
  background: var(--color-bg); clip-path: polygon(0 0, 100% 100%, 0 100%);
}
.fs-divider-to-dark {
  position: relative; height: 60px; overflow: hidden; background: var(--color-bg); margin: 0;
}
.fs-divider-to-dark::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px;
  background: var(--color-bg-dark); clip-path: polygon(0 100%, 100% 0, 100% 100%);
}
.fs-divider-from-dark {
  position: relative; height: 60px; overflow: hidden; background: var(--color-bg-dark); margin: 0;
}
.fs-divider-from-dark::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px;
  background: var(--color-bg-alt); clip-path: polygon(0 0, 100% 100%, 0 100%);
}

/* ── 4. Services Grid ────────────────────────────────────────── */
.fs-services-section {
  background: var(--color-bg);
  padding: var(--section-pad);
}
.fs-section-eyebrow {
  display: inline-block;
  font-family: var(--font-body);
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.fs-section-title {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.fs-section-title h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
}
.fs-section-title h2 .text-accent { color: var(--color-accent); }
.fs-section-subtitle-text {
  display: block;
  font-family: var(--font-body);
  font-size: 1.05rem;
  color: var(--color-text-light);
  margin-bottom: var(--space-md);
}

/* ── 5. Open Floor Plan Deep-Dive ────────────────────────────── */
.fs-featured {
  background: var(--color-bg-alt);
  padding: var(--section-pad);
}
.fs-featured-split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: center;
}
.fs-featured-content { order: 2; }
.fs-featured-img { order: 1; }
.fs-featured-img-wrap {
  position: relative;
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
}
.fs-featured-img-wrap img {
  width: 100%;
  aspect-ratio: 4 / 3;
  object-fit: cover;
  display: block;
  transition: transform var(--transition-slow);
}
.fs-featured-img-wrap:hover img { transform: scale(1.04); }
.fs-featured-img-badge {
  position: absolute;
  bottom: var(--space-lg);
  left: var(--space-lg);
  background: var(--color-accent);
  color: var(--color-primary-dark);
  font-family: var(--font-heading);
  font-size: 0.8rem;
  font-weight: 700;
  letter-spacing: 0.05em;
  padding: 5px 12px;
  border-radius: var(--radius-md);
  text-transform: uppercase;
}
.fs-featured-content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.7rem, 3.5vw, 2.5rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  letter-spacing: -0.02em;
  color: var(--color-primary);
  margin-bottom: var(--space-lg);
}
.fs-featured-content h2 .text-gradient {
  background: linear-gradient(135deg, var(--color-accent), var(--color-primary));
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
.fs-featured-content p {
  font-family: var(--font-body);
  font-size: 0.98rem;
  line-height: 1.7;
  color: var(--color-text-light);
  max-width: 65ch;
  margin-bottom: var(--space-md);
}
@media (max-width: 767px) {
  .fs-featured-split { grid-template-columns: 1fr; gap: var(--space-xl); }
  .fs-featured-content { order: 2; }
  .fs-featured-img { order: 1; }
}

/* ── 6. Signature Section: Custom Tile Showers ───────────────── */
.fs-signature {
  background: var(--color-bg);
  padding: var(--section-pad);
  position: relative;
  overflow: hidden;
}
.fs-signature-inner {
  position: relative;
  display: grid;
  grid-template-columns: 3fr 2fr;
  gap: 0;
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  min-height: 580px;
}
.fs-signature-photo {
  position: relative;
  overflow: hidden;
}
.fs-signature-photo img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  min-height: 500px;
  transition: transform var(--transition-slow);
}
.fs-signature-inner:hover .fs-signature-photo img { transform: scale(1.04); }
.fs-signature-photo::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(to right, transparent 50%, rgba(var(--color-primary-dark-rgb), 0.72) 100%);
}
.fs-signature-content {
  background: var(--color-primary-dark);
  padding: var(--space-3xl) var(--space-2xl);
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: var(--space-lg);
  position: relative;
}
.fs-signature-content::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5;
  pointer-events: none;
}
.fs-signature-content > * { position: relative; z-index: 1; }
.fs-signature-content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 3vw, 2.2rem);
  font-weight: 800;
  line-height: 1.2;
  text-wrap: balance;
  color: var(--color-white);
  margin: 0;
}
.fs-signature-content h2 .text-accent { color: var(--color-accent); }
.fs-signature-content p {
  font-family: var(--font-body);
  font-size: 0.92rem;
  line-height: 1.65;
  color: rgba(255,255,255,0.82);
  max-width: 38ch;
}
.fs-stats-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-md);
  margin-top: var(--space-sm);
}
.fs-stat-block {
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(var(--color-accent-rgb), 0.2);
  border-radius: var(--radius-md);
  padding: var(--space-md);
  text-align: center;
}
.fs-stat-num {
  display: block;
  font-family: var(--font-heading);
  font-size: 2rem;
  font-weight: 800;
  color: var(--color-accent);
  line-height: 1;
  margin-bottom: var(--space-xs);
}
.fs-stat-label {
  display: block;
  font-family: var(--font-body);
  font-size: 0.75rem;
  font-weight: 600;
  color: rgba(255,255,255,0.7);
  letter-spacing: 0.06em;
  text-transform: uppercase;
}
@media (max-width: 1023px) {
  .fs-signature-inner {
    grid-template-columns: 1fr;
  }
  .fs-signature-photo img { min-height: 300px; }
  .fs-signature-content { padding: var(--space-2xl) var(--space-xl); }
}

/* ── 7. CTA Banner ───────────────────────────────────────────── */
.fs-cta-banner {
  position: relative;
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  padding: var(--space-4xl) var(--space-lg);
  text-align: center;
  overflow: hidden;
}
.fs-cta-banner::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5;
  pointer-events: none;
}
.fs-cta-banner-inner {
  position: relative;
  z-index: 1;
  max-width: 680px;
  margin-inline: auto;
}
.fs-cta-banner h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  color: var(--color-white);
  text-wrap: balance;
  letter-spacing: -0.01em;
  margin-bottom: var(--space-md);
}
.fs-cta-banner h2 .text-accent { color: var(--color-accent); }
.fs-cta-banner p {
  font-family: var(--font-body);
  font-size: 1.05rem;
  line-height: 1.6;
  color: rgba(255,255,255,0.82);
  margin-bottom: var(--space-xl);
  max-width: 55ch;
  margin-inline: auto;
}
.fs-btn-cta {
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
.fs-btn-cta:hover { transform: translateY(-2px); box-shadow: 0 6px 0 rgba(0,0,0,0.3); }

/* ── 8. LVP vs Tile Comparison ───────────────────────────────── */
.fs-comparison {
  background: var(--color-bg-alt);
  padding: var(--section-pad);
}
.fs-comparison-layout {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-xl);
  margin-top: var(--space-3xl);
  align-items: stretch;
}
.fs-comparison-col {
  border-radius: var(--radius-xl);
  overflow: hidden;
  display: flex;
  flex-direction: column;
}
.fs-comparison-col-header {
  padding: var(--space-xl) var(--space-xl) var(--space-lg);
  display: flex;
  align-items: center;
  gap: var(--space-md);
}
.fs-comparison-col.col-tile .fs-comparison-col-header { background: var(--color-primary); }
.fs-comparison-col.col-lvp .fs-comparison-col-header { background: var(--color-secondary); }
.fs-comparison-col-icon {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  background: rgba(255,255,255,0.12);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.fs-comparison-col-icon svg { width: 22px; height: 22px; stroke: var(--color-white); }
.fs-comparison-col-header h3 {
  font-family: var(--font-heading);
  font-size: 1.3rem;
  font-weight: 800;
  color: var(--color-white);
  margin: 0;
  text-wrap: balance;
}
.fs-comparison-col-body {
  background: var(--color-bg);
  padding: var(--space-xl);
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
  border: 1px solid var(--color-gray-light);
  border-top: none;
  border-bottom-left-radius: var(--radius-xl);
  border-bottom-right-radius: var(--radius-xl);
}
.fs-comparison-col-body p {
  font-family: var(--font-body);
  font-size: 0.95rem;
  line-height: 1.7;
  color: var(--color-text-light);
  max-width: 65ch;
}
.fs-comparison-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
  border-top: 1px solid var(--color-gray-light);
  padding-top: var(--space-md);
}
.fs-comparison-list li {
  display: flex;
  align-items: flex-start;
  gap: var(--space-sm);
  font-family: var(--font-body);
  font-size: 0.88rem;
  color: var(--color-text);
  line-height: 1.5;
}
.fs-comparison-list li::before {
  content: '✓';
  color: var(--color-accent);
  font-weight: 700;
  flex-shrink: 0;
  line-height: 1.5;
}
@media (max-width: 767px) {
  .fs-comparison-layout { grid-template-columns: 1fr; }
}

/* ── 9. Process Section ──────────────────────────────────────── */
.fs-process {
  background: var(--color-bg);
  padding: var(--section-pad);
}
.fs-process-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl);
  margin-top: var(--space-3xl);
  position: relative;
}
.fs-process-steps::before {
  content: '';
  position: absolute;
  top: 36px;
  left: calc(12.5% + var(--space-xl));
  right: calc(12.5% + var(--space-xl));
  height: 2px;
  background: linear-gradient(to right, var(--color-accent), rgba(var(--color-accent-rgb), 0.1));
  z-index: 0;
}
.fs-step { text-align: center; position: relative; z-index: 1; }
.fs-step-num {
  width: 72px; height: 72px; border-radius: 50%; background: var(--color-primary);
  color: var(--color-white); font-family: var(--font-heading); font-size: 1.6rem;
  font-weight: 800; display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-lg); box-shadow: var(--shadow-md); position: relative;
  z-index: 2; border: 3px solid var(--color-accent);
}
.fs-step h3 {
  font-family: var(--font-heading); font-size: 1.15rem; font-weight: 700;
  color: var(--color-primary); margin-bottom: var(--space-sm); text-wrap: balance;
}
.fs-step p {
  font-family: var(--font-body); font-size: 0.9rem; line-height: 1.6;
  color: var(--color-text-light); max-width: 22ch; margin-inline: auto;
}
@media (max-width: 1023px) {
  .fs-process-steps { grid-template-columns: repeat(2, 1fr); }
  .fs-process-steps::before { display: none; }
}
@media (max-width: 767px) { .fs-process-steps { grid-template-columns: 1fr; } }

/* ── 10. FAQ ─────────────────────────────────────────────────── */
.fs-faq {
  background: var(--color-bg-alt);
  padding: var(--section-pad);
}
.fs-faq-list {
  max-width: 760px;
  margin-inline: auto;
  margin-top: var(--space-3xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
}
.fs-faq-item {
  border-radius: var(--radius-md);
  border: 1px solid var(--color-gray-light);
  overflow: hidden;
  background: var(--color-bg);
  box-shadow: var(--shadow-sm);
}
.fs-faq-q {
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
.fs-faq-q:hover { background: rgba(var(--color-accent-rgb), 0.05); }
.fs-faq-q svg { flex-shrink: 0; width: 20px; height: 20px; stroke: var(--color-accent); transition: transform var(--transition-fast); }
.fs-faq-item.open .fs-faq-q svg { transform: rotate(180deg); }
.fs-faq-a {
  display: none;
  padding: 0 var(--space-lg) var(--space-lg);
  font-family: var(--font-body);
  font-size: 0.95rem;
  line-height: 1.7;
  color: var(--color-text-light);
  max-width: 65ch;
}
.fs-faq-item.open .fs-faq-a { display: block; }

/* ── 11. Closing CTA ─────────────────────────────────────────── */
.fs-closing-cta {
  background: var(--color-bg-dark);
  padding: var(--space-4xl) var(--space-lg);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.fs-closing-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 80% 40%, rgba(var(--color-accent-rgb), 0.08) 0%, transparent 60%);
  pointer-events: none;
}
.fs-closing-cta-inner {
  position: relative;
  z-index: 1;
  max-width: 640px;
  margin-inline: auto;
}
.fs-closing-cta h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  color: var(--color-white);
  text-wrap: balance;
  letter-spacing: -0.01em;
  margin-bottom: var(--space-md);
}
.fs-closing-cta p {
  font-family: var(--font-body);
  font-size: 1rem;
  color: rgba(255,255,255,0.75);
  margin-bottom: var(--space-xl);
  max-width: 55ch;
  margin-inline: auto;
  line-height: 1.65;
}

/* ── Mobile Section Padding ──────────────────────────────────── */
@media (max-width: 767px) {
  .fs-services-section,
  .fs-featured,
  .fs-signature,
  .fs-comparison,
  .fs-process,
  .fs-faq,
  .fs-closing-cta { padding: var(--section-pad-mobile); }
  .fs-cta-banner { padding: var(--space-3xl) var(--space-md); }
}
</style>

<main id="main-content">

  <!-- ── Hero ─────────────────────────────────────────────────── -->
  <section class="fs-hero" style="background-image: url('<?php echo htmlspecialchars($clientPhotos['photo08']); ?>');" aria-label="Flooring Services hero">
    <div class="fs-hero-inner container">
      <div class="fs-hero-content" data-animate="fade-up">
        <span class="fs-hero-eyebrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
          Bowdon, GA &amp; Carroll County — <?php echo $yearsInBusiness; ?> Years Experience
        </span>
        <h1>Flooring &amp;<br><span class="text-gradient">Custom Tile Services</span><br>in Bowdon, GA</h1>
        <p class="fs-hero-sub">Open floor plans, custom tile showers, LVP, hardwood refinishing, and subfloor work — every floor application handled by the same crew, built for Georgia's climate challenges.</p>
        <div class="fs-hero-actions">
          <a href="/contact/" class="fs-btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
            Get a Free Estimate
          </a>
          <a href="#flooring-services-grid" class="fs-btn-ghost">Browse Services ↓</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Breadcrumb ────────────────────────────────────────────── -->
  <div class="fs-breadcrumb">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span class="fs-breadcrumb-sep" aria-hidden="true">›</span>
        <a href="/services/">Services</a>
        <span class="fs-breadcrumb-sep" aria-hidden="true">›</span>
        <span aria-current="page">Flooring Services</span>
      </nav>
    </div>
  </div>

  <!-- ── Services Grid ─────────────────────────────────────────── -->
  <section class="fs-services-section" id="flooring-services-grid" aria-label="Flooring services">
    <div class="container">
      <div class="fs-section-title" data-animate="fade-up">
        <span class="fs-section-eyebrow eyebrow-label">What We Do</span>
        <h2>6 Services. <span class="text-accent">One Standard.</span></h2>
        <span class="fs-section-subtitle-text">From subfloor replacement to custom tile showers — every layer of your floor done right.</span>
        <p class="prose prose-centered">West Georgia homes built before 2000 have a specific set of flooring challenges: clay soil movement, seasonal moisture through slabs, and subfloors that were designed for carpet and haven't been upgraded for hard surface materials. We assess what you have before we recommend what you need.</p>
      </div>

      <div class="services-grid" data-animate="fade-up">

        <!-- Card 1: Open Floor Plan Remodeling -->
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo09']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo09']); ?>" alt="Open floor plan remodeling in Bowdon GA — wall removal and LVP flooring throughout" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layout"></i></div>
            <h3>Open Floor Plan</h3>
            <p class="service-card__desc">Remove walls and reconfigure layouts to create connected, flowing living spaces.</p>
            <ul>
              <li>Load-bearing wall assessment</li>
              <li>Carroll County structural permits</li>
              <li>Beam installation and finishing</li>
            </ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <!-- Card 2: Custom Tile Showers -->
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo10']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo10']); ?>" alt="Custom tile shower installation in Bowdon GA — large format porcelain with niche and bench" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="droplets"></i></div>
            <h3>Custom Tile Showers</h3>
            <p class="service-card__desc">Specialty tile shower builds with waterproofing systems rated for wet applications.</p>
            <ul>
              <li>Schluter KERDI waterproofing</li>
              <li>Large format tile up to 48×48"</li>
              <li>Built-in niches and benches</li>
            </ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <!-- Card 3: Flooring Installation -->
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo11']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo11']); ?>" alt="Flooring installation in Bowdon GA — hardwood and tile throughout main living areas" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="square"></i></div>
            <h3>Flooring Installation</h3>
            <p class="service-card__desc">Full floor installation for ceramic, porcelain, hardwood, and LVP in any room configuration.</p>
            <ul>
              <li>Subfloor prep and leveling</li>
              <li>Transition strips and thresholds</li>
              <li>Pattern and diagonal layouts</li>
            </ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <!-- Card 4: Sanded Finish Flooring -->
        <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo08']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo08']); ?>" alt="Hardwood floor sanding and refinishing in Bowdon GA — restored original wood floors" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="wind"></i></div>
            <h3>Sanded Finish Flooring</h3>
            <p class="service-card__desc">Hardwood floor sanding and refinishing to restore original wood without full replacement.</p>
            <ul>
              <li>Dustless sanding equipment</li>
              <li>Stain color matching available</li>
              <li>24–48 hr cure time before traffic</li>
            </ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <!-- Card 5: LVP Flooring -->
        <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo09']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo09']); ?>" alt="LVP flooring installation in Bowdon GA — luxury vinyl plank throughout open floor plan" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="layers"></i></div>
            <h3>LVP Flooring</h3>
            <p class="service-card__desc">Luxury vinyl plank installation — waterproof, durable, and appropriate for Georgia's humidity.</p>
            <ul>
              <li>12-mil wear layer minimum</li>
              <li>Floating install over moisture barrier</li>
              <li>Works below grade in basements</li>
            </ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

        <!-- Card 6: Subfloor Replacement -->
        <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3">
          <div class="service-card__image">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo10']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo10']); ?>" alt="Subfloor replacement in Bowdon GA — new OSB subfloor prepared for tile installation" width="600" height="360" loading="lazy">
            </picture>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon"><i data-lucide="hammer"></i></div>
            <h3>Subfloor Replacement</h3>
            <p class="service-card__desc">Full subfloor panel replacement when existing substrate fails deflection requirements for hard surfaces.</p>
            <ul>
              <li>Joist blocking and stiffening</li>
              <li>OSB and plywood replacement</li>
              <li>L/360 deflection verified before tile</li>
            </ul>
            <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
          </div>
        </article>

      </div><!-- /.services-grid -->
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="fs-divider-down" aria-hidden="true"></div>

  <!-- ── Open Floor Plan Deep-Dive ─────────────────────────────── -->
  <section class="fs-featured" aria-labelledby="open-floor-heading">
    <div class="container">
      <div class="fs-featured-split">

        <div class="fs-featured-img" data-animate="fade-up">
          <div class="fs-featured-img-wrap">
            <picture>
              <source srcset="<?php echo htmlspecialchars($clientPhotos['photo09']); ?>" type="image/jpeg">
              <img src="<?php echo htmlspecialchars($clientPhotos['photo09']); ?>" alt="Open floor plan remodeling in Bowdon GA — load-bearing wall removal with LVP throughout" width="800" height="600" loading="lazy">
            </picture>
            <span class="fs-featured-img-badge">Carroll County Permitted</span>
          </div>
        </div>

        <div class="fs-featured-content" data-animate="fade-up">
          <span class="fs-section-eyebrow">Primary Keyword Service</span>
          <h2 id="open-floor-heading">
            <span class="text-gradient">Open Floor Plan Remodeling</span><br>Bowdon, GA
          </h2>
          <p>Removing walls in a Bowdon home built before 1990 requires more than a sledgehammer. Most single-family homes in Carroll County use platform framing where interior walls carry floor or roof loads — they aren't simply partition walls you can remove without engineering. The first step we take on any open floor plan project is confirming which walls are load-bearing before any demolition plan is written.</p>
          <p>When a load-bearing wall comes out, it's replaced by a properly sized beam — LVL, steel, or dimensional lumber depending on the span and load. Carroll County requires a permit and structural inspection for any work involving load-bearing modifications. We handle the permit application, work with the county inspector's schedule, and provide the structural documentation required for the permit file. This protects your home's resale title — buyers' lenders require permitted structural work.</p>
          <p>The flooring component of open floor plan projects is where the visual payoff lives. Removing a wall between the kitchen and living room means you now have one continuous floor that was previously two separate floors. We handle the transition — matching new hardwood or LVP to existing material, or replacing both rooms with a unified new floor that makes the space feel cohesive rather than patched. Open floor plans in Bowdon homes typically add $15,000–$40,000 in assessed value depending on the scope.</p>
          <div style="margin-top: var(--space-xl);">
            <a href="/contact/" class="fs-btn-primary">
              Get an Open Floor Plan Estimate
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="fs-divider-to-bg" aria-hidden="true"></div>

  <!-- ── Signature Section: Custom Tile Showers ────────────────── -->
  <section class="fs-signature" aria-labelledby="tile-showers-heading">
    <div class="container">
      <div class="fs-section-title" data-animate="fade-up" style="margin-bottom: var(--space-2xl);">
        <span class="fs-section-eyebrow">Our Signature Service</span>
        <h2 id="tile-showers-heading">Custom Tile Showers — <span class="text-accent">Where We're Different</span></h2>
      </div>
      <div class="fs-signature-inner" data-animate="fade-up">
        <div class="fs-signature-photo">
          <picture>
            <source srcset="<?php echo htmlspecialchars($clientPhotos['photo11']); ?>" type="image/jpeg">
            <img src="<?php echo htmlspecialchars($clientPhotos['photo11']); ?>" alt="Custom tile shower installation in Bowdon GA — large format marble look porcelain with linear drain" width="900" height="700" loading="lazy">
          </picture>
        </div>
        <div class="fs-signature-content">
          <h2>Tile Work That<br>Holds in <span class="text-accent">Georgia's Humidity</span></h2>
          <p>We've repaired failed tile showers installed by other contractors. The failure mode is almost always the same: no certified waterproofing membrane behind the tile, grout joints left unsealed, or inadequate slope to the drain. A tile shower is only as good as what's behind the tile.</p>
          <p>Every custom shower we build uses Schluter KERDI waterproofing membrane or equivalent — a bonded system that's been third-party tested for wet-area applications. We don't use sheet plastic or painted-on waterproofing as a cost-cutting measure.</p>
          <div class="fs-stats-grid">
            <div class="fs-stat-block">
              <span class="fs-stat-num"><?php echo $yearsInBusiness; ?></span>
              <span class="fs-stat-label">Years Experience</span>
            </div>
            <div class="fs-stat-block">
              <span class="fs-stat-num">200+</span>
              <span class="fs-stat-label">Showers Built</span>
            </div>
            <div class="fs-stat-block">
              <span class="fs-stat-num">48"</span>
              <span class="fs-stat-label">Max Tile Format</span>
            </div>
            <div class="fs-stat-block">
              <span class="fs-stat-num">0</span>
              <span class="fs-stat-label">Waterproofing Failures</span>
            </div>
          </div>
          <a href="/contact/" class="fs-btn-primary" style="align-self: flex-start;">Start Your Tile Shower →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="fs-divider-to-dark" aria-hidden="true"></div>

  <!-- ── Mid-Page CTA Banner ───────────────────────────────────── -->
  <section class="fs-cta-banner" aria-label="Get a flooring estimate">
    <div class="fs-cta-banner-inner" data-animate="fade-up">
      <h2>Your Floor. Your<br><span class="text-accent">West Georgia Home.</span></h2>
      <p>Free on-site estimates for flooring, tile showers, and open floor plan projects across Bowdon, Carrollton, Villa Rica, and Carroll County. We'll assess your subfloor and give you a written quote before any work begins.</p>
      <a href="/contact/" class="fs-btn-cta">Get Your Free Flooring Estimate →</a>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="fs-divider-from-dark" aria-hidden="true"></div>

  <!-- ── LVP vs Tile Comparison ────────────────────────────────── -->
  <section class="fs-comparison" aria-labelledby="comparison-heading">
    <div class="container">
      <div class="fs-section-title" data-animate="fade-up">
        <span class="fs-section-eyebrow">Material Guide</span>
        <h2 id="comparison-heading">LVP or Tile for <span class="text-accent">Georgia Homes?</span></h2>
        <p class="prose prose-centered">Both are smart choices when applied correctly. Here's how to think about which belongs in each room of your Bowdon home.</p>
      </div>
      <div class="fs-comparison-layout" data-animate="fade-up">
        <div class="fs-comparison-col col-tile">
          <div class="fs-comparison-col-header">
            <div class="fs-comparison-col-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="8" height="8" rx="1"/><rect x="13" y="3" width="8" height="8" rx="1"/><rect x="3" y="13" width="8" height="8" rx="1"/><rect x="13" y="13" width="8" height="8" rx="1"/></svg>
            </div>
            <h3>Porcelain &amp; Ceramic Tile</h3>
          </div>
          <div class="fs-comparison-col-body">
            <p>Tile is dimensionally stable — it doesn't expand or contract with temperature swings the way wood-based products do. In Georgia's climate this matters most in bathrooms, kitchens, and laundry rooms where moisture exposure is frequent. Porcelain absorbs less than 0.5% moisture by weight, making it the most appropriate material for shower surrounds and kitchen floors near sinks.</p>
            <ul class="fs-comparison-list">
              <li>Best choice for showers, tub surrounds, and wet rooms</li>
              <li>Kitchen floors — especially near dishwashers and sinks</li>
              <li>Outdoor-rated porcelain for patios and covered entries</li>
              <li>Radiant heat-compatible — tile conducts heat efficiently</li>
              <li>Lifespans of 30–50+ years with proper grout maintenance</li>
            </ul>
          </div>
        </div>
        <div class="fs-comparison-col col-lvp">
          <div class="fs-comparison-col-header">
            <div class="fs-comparison-col-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 20h20v-4H2z"/><path d="M2 16h20v-4H2z"/><path d="M2 12h20V8H2z"/></svg>
            </div>
            <h3>LVP (Luxury Vinyl Plank)</h3>
          </div>
          <div class="fs-comparison-col-body">
            <p>LVP's advantage in Georgia is its floating installation over a moisture barrier — making it the best option for basements and below-grade spaces where slab moisture migration would destroy hardwood or glue-down tile. Modern LVP with a 12-mil wear layer handles heavy foot traffic in living rooms, bedrooms, and hallways with maintenance comparable to hardwood but far lower cost.</p>
            <ul class="fs-comparison-list">
              <li>Basements and below-grade rooms — floating over moisture barrier</li>
              <li>Living rooms, bedrooms, and hallways — waterproof, lower cost</li>
              <li>Pet households — scratch resistance superior to hardwood</li>
              <li>Faster installation — 1–3 days vs 5–10 for tile in the same area</li>
              <li>Not appropriate for showers or direct water exposure zones</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="fs-divider-to-bg" aria-hidden="true"></div>

  <!-- ── Process Section ───────────────────────────────────────── -->
  <section class="fs-process" aria-labelledby="fs-process-heading">
    <div class="container">
      <div class="fs-section-title" data-animate="fade-up">
        <span class="fs-section-eyebrow">How It Works</span>
        <h2 id="fs-process-heading">From Subfloor Check to<br><span class="text-accent">Final Grout Seal</span></h2>
        <p class="prose prose-centered">Every flooring project follows a four-step sequence that eliminates the mid-project surprises that turn simple floor jobs into expensive callbacks.</p>
      </div>
      <div class="fs-process-steps">
        <div class="fs-step" data-animate="fade-up">
          <div class="fs-step-num">1</div>
          <h3>Subfloor Assessment</h3>
          <p>We test deflection, check for moisture, and document any substrate issues before pricing the job.</p>
        </div>
        <div class="fs-step" data-animate="fade-up">
          <div class="fs-step-num">2</div>
          <h3>Material Selection</h3>
          <p>We guide you through tile, LVP, and hardwood options appropriate for your specific room and subfloor condition.</p>
        </div>
        <div class="fs-step" data-animate="fade-up">
          <div class="fs-step-num">3</div>
          <h3>Substrate Preparation</h3>
          <p>Subfloor repair, leveling, and waterproofing membranes installed before any finish material goes down.</p>
        </div>
        <div class="fs-step" data-animate="fade-up">
          <div class="fs-step-num">4</div>
          <h3>Installation &amp; Sealing</h3>
          <p>Finish material installed, grouted, and sealed. Final walkthrough before we consider the job done.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Divider ───────────────────────────────────────────────── -->
  <div class="fs-divider-down" aria-hidden="true"></div>

  <!-- ── FAQ Section ───────────────────────────────────────────── -->
  <section class="fs-faq" aria-labelledby="fs-faq-heading">
    <div class="container">
      <div class="fs-section-title" data-animate="fade-up">
        <span class="fs-section-eyebrow">Common Questions</span>
        <h2 id="fs-faq-heading">Flooring in <span class="text-accent">Bowdon &amp; Carroll County — Answered</span></h2>
      </div>
      <div class="fs-faq-list" data-animate="fade-up">
        <?php foreach ($pageFaqs as $i => $faq): ?>
        <div class="fs-faq-item" id="fs-faq-<?php echo $i; ?>">
          <button class="fs-faq-q" aria-expanded="false" aria-controls="fs-faq-a-<?php echo $i; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="fs-faq-a" id="fs-faq-a-<?php echo $i; ?>" role="region">
            <?php echo htmlspecialchars($faq['a']); ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Closing CTA ───────────────────────────────────────────── -->
  <section class="fs-closing-cta" aria-label="Start your flooring project">
    <div class="fs-closing-cta-inner" data-animate="fade-up">
      <span class="fs-section-eyebrow" style="color: var(--color-accent);">Ready to Start?</span>
      <h2>The Right Floor Starts<br>With the Right Subfloor</h2>
      <p>We assess what you have before we recommend what you need. Free on-site estimates across Bowdon, Carrollton, Villa Rica, Bremen, and Carroll County. <?php echo $yearsInBusiness; ?> years of tile and flooring in West Georgia homes.</p>
      <a href="/contact/" class="fs-btn-cta">Schedule a Free Assessment →</a>
    </div>
  </section>

</main>

<script>
// FAQ Accordion
(function () {
  document.querySelectorAll('.fs-faq-q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = this.closest('.fs-faq-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.fs-faq-item.open').forEach(function (el) {
        el.classList.remove('open');
        el.querySelector('.fs-faq-q').setAttribute('aria-expanded', 'false');
      });
      if (!isOpen) {
        item.classList.add('open');
        this.setAttribute('aria-expanded', 'true');
      }
    });
  });
}());
</script>

<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" defer></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  if (typeof lucide !== 'undefined') lucide.createIcons();
});
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
