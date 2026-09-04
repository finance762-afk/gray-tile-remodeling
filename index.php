<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page Setup ────────────────────────────────────────────────
$pageTitle       = 'Home Remodeling in Bowdon, GA | Gray Tile & Remodeling';
$pageDescription = 'Expert tile installation and home remodeling in Bowdon, GA. Gray Tile & Remodeling — West Georgia craftsmanship. Free estimates. Call today.';
$canonicalUrl    = $siteUrl . '/';
$ogImage         = $clientPhotos['hero'];
$currentPage     = 'home';
$heroPreloadImage = $clientPhotos['hero'];
$pageType        = 'home';

// ── Homepage FAQs (5 from config + 1 local) ──────────────────
$homeFaqs = $faqs;
$homeFaqs[] = [
    'q' => 'What areas near Bowdon do you serve?',
    'a' => 'We serve Bowdon and surrounding communities throughout Carroll County and West Georgia, including Carrollton, Villa Rica, Bremen, Temple, and areas within approximately 50 miles of Bowdon.',
];

// ── Schema (WebSite + FAQPage — never a self-serving AggregateRating) ─────────────
$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'           => 'WebSite',
            'url'             => $siteUrl,
            'name'            => $siteName,
            'potentialAction' => [
                '@type'       => 'SearchAction',
                'target'      => [
                    '@type'       => 'EntryPoint',
                    'urlTemplate' => $siteUrl . '/?s={search_term_string}',
                ],
                'query-input' => 'required name=search_term_string',
            ],
        ],
        [
            '@type'           => 'HomeAndConstructionBusiness',
            'name'            => $siteName,
            'url'             => $siteUrl,
        ],
        [
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(fn($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $homeFaqs),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

// SEO: head.php outputs <link rel="canonical"> and application/ld+json schema for this page.
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles. All values use var() tokens only.
   ================================================================ */

/* --- Hero: Split Layout --------------------------------------- */
.hp-hero {
  position: relative;
  min-height: 0;
  display: flex;
  align-items: center;
  overflow: hidden;
  background-size: cover;
  background-position: center 40%;
  background-repeat: no-repeat;
  animation: hp-kenburns 22s ease-in-out infinite alternate;
}
.hp-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    115deg,
    rgba(var(--color-primary-rgb), 0.92) 0%,
    rgba(var(--color-primary-rgb), 0.76) 52%,
    rgba(var(--color-primary-dark-rgb), 0.58) 100%
  );
  z-index: 1;
}
.hp-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5;
  z-index: 2;
  pointer-events: none;
}
@keyframes hp-kenburns {
  from { background-size: 110%; background-position: center 38%; }
  to   { background-size: 122%; background-position: center 52%; }
}
.hp-hero-inner {
  position: relative;
  z-index: 3;
  width: 100%;
  max-width: var(--max-width);
  margin: 0 auto;
  padding: calc(var(--navbar-height) + var(--space-3xl)) 5% var(--space-4xl);
  display: grid;
  grid-template-columns: 60fr 40fr;
  gap: var(--space-3xl);
  align-items: center;
}

/* --- Hero Text (left 60%) ------------------------------------ */
.hp-hero-text { color: var(--color-white); }
.hp-hero-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  font-family: var(--font-heading);
  font-size: var(--font-size-xs);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 3px;
  color: var(--color-accent);
  border: 1px solid rgba(255,255,255,0.22);
  border-radius: var(--radius-full);
  padding: 5px var(--space-md);
  margin-bottom: var(--space-lg);
}
.hp-hero-eyebrow svg { width: 14px; height: 14px; flex-shrink: 0; }
.hp-hero-title {
  font-size: clamp(2.4rem, 5.2vw, 3.8rem);
  font-weight: 800;
  line-height: 1.08;
  letter-spacing: -0.025em;
  color: var(--color-white);
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.hp-hero-title .text-accent { color: var(--color-accent); }
.hp-hero-subtitle {
  font-size: clamp(1rem, 1.5vw, 1.12rem);
  line-height: 1.7;
  color: rgba(255,255,255,0.88);
  max-width: 50ch;
  margin-bottom: var(--space-2xl);
}
.hp-hero-actions {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
  margin-bottom: var(--space-2xl);
}
.hp-hero-trust { display: flex; flex-wrap: wrap; gap: var(--space-md); }
.hp-trust-item {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
  font-size: var(--font-size-sm);
  color: rgba(255,255,255,0.8);
  font-weight: 500;
}
.hp-trust-item svg { width: 15px; height: 15px; color: var(--color-accent); flex-shrink: 0; }

/* --- Hero Form Card (right 40%) ----------------------------- */
.hp-form-card {
  background: rgba(255,255,255,0.09);
  backdrop-filter: blur(18px);
  -webkit-backdrop-filter: blur(18px);
  border: 1px solid rgba(255,255,255,0.16);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl) var(--space-xl);
  box-shadow: 0 16px 48px rgba(0,0,0,0.32), inset 0 1px 0 rgba(255,255,255,0.1);
}
.hp-form-card h2 {
  font-size: clamp(1.35rem, 2.2vw, 1.75rem);
  color: var(--color-white);
  margin-bottom: var(--space-xs);
  text-wrap: balance;
}
.hp-form-tagline {
  font-size: var(--font-size-sm);
  color: rgba(255,255,255,0.6);
  margin-bottom: var(--space-lg);
}
.hp-form .form-row { margin-bottom: var(--space-md); }
.hp-form .form-row input,
.hp-form .form-row select {
  width: 100%;
  padding: 13px var(--space-md);
  background: rgba(255,255,255,0.1);
  border: 1px solid rgba(255,255,255,0.2);
  border-radius: var(--radius-md);
  color: var(--color-white);
  font-family: var(--font-body);
  font-size: var(--font-size-sm);
  transition: border-color var(--transition-fast), background var(--transition-fast);
  outline: none;
  -webkit-appearance: none;
}
.hp-form .form-row input::placeholder { color: rgba(255,255,255,0.48); }
.hp-form .form-row select option { color: var(--color-text); background: var(--color-white); }
.hp-form .form-row input:focus,
.hp-form .form-row select:focus {
  border-color: var(--color-accent);
  background: rgba(255,255,255,0.14);
  box-shadow: 0 0 0 3px rgba(var(--color-accent-rgb), 0.18);
}
.btn-block { width: 100%; justify-content: center; }
.hp-form .form-footnote {
  font-size: 0.7rem;
  color: rgba(255,255,255,0.42);
  text-align: center;
  margin-top: var(--space-sm);
  line-height: 1.55;
}
.hp-form .form-footnote a { color: rgba(255,255,255,0.58); text-decoration: underline; }

/* --- Section Dividers ---------------------------------------- */
.divider-diagonal {
  height: 56px;
  overflow: hidden;
  line-height: 0;
}
.divider-diagonal svg { display: block; width: 100%; height: 100%; }
.divider-wave {
  height: 64px;
  overflow: hidden;
  line-height: 0;
}
.divider-wave svg { display: block; width: 100%; height: 100%; }

/* --- Services Section ---------------------------------------- */
.hp-services { background: var(--color-bg); padding: var(--space-4xl) 0; }
.eyebrow-label {
  display: inline-block;
  font-family: var(--font-heading);
  font-size: var(--font-size-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 3px;
  color: var(--color-accent);
  margin-bottom: var(--space-md);
}
.text-accent { color: var(--color-accent); }
.section-title { text-align: center; margin-bottom: var(--space-3xl); }
.section-title h2 { text-wrap: balance; margin-bottom: var(--space-md); }
.section-subtitle {
  display: block;
  color: var(--color-text-light);
  max-width: 58ch;
  margin: 0 auto var(--space-md);
  line-height: 1.65;
}
.services-footer-link { text-align: center; margin-top: var(--space-2xl); }

/* Reveal animations */
.reveal-up {
  opacity: 0;
  transform: translateY(28px);
  transition: opacity 0.6s ease, transform 0.6s ease;
}
.reveal-up.animated { opacity: 1; transform: translateY(0); }
.reveal-delay-1 { transition-delay: 0.1s; }
.reveal-delay-2 { transition-delay: 0.2s; }
.reveal-delay-3 { transition-delay: 0.3s; }

/* --- Stats Section ------------------------------------------- */
.hp-stats {
  background: var(--color-primary);
  padding: var(--space-3xl) 0;
  position: relative;
  overflow: hidden;
}
.hp-stats::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5;
}
.hp-stats .container { position: relative; z-index: 1; }
.hp-stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  text-align: center;
}
.hp-stat {
  padding: var(--space-xl) var(--space-lg);
  border-left: 1px solid rgba(255,255,255,0.1);
}
.hp-stat:first-child { border-left: none; }
.hp-stat-number {
  font-family: var(--font-heading);
  font-size: clamp(2.8rem, 5vw, 4rem);
  font-weight: 900;
  color: var(--color-white);
  line-height: 1;
  display: block;
}
.hp-stat-number .s-suffix { color: var(--color-accent); }
.hp-stat-label {
  font-size: var(--font-size-xs);
  color: rgba(255,255,255,0.62);
  text-transform: uppercase;
  letter-spacing: 1.5px;
  margin-top: var(--space-sm);
  display: block;
}

/* --- Mid-Page CTA (CTA #2) ----------------------------------- */
.hp-mid-cta {
  position: relative;
  padding: var(--space-4xl) 0;
  overflow: hidden;
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 65%, var(--color-bg-dark) 100%);
}
.hp-mid-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.06'/%3E%3C/svg%3E");
}
.hp-mid-cta::after {
  content: '';
  position: absolute;
  top: -80px; right: -80px;
  width: 320px; height: 320px;
  border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.06);
  pointer-events: none;
}
.hp-mid-cta .container { position: relative; z-index: 1; text-align: center; }
.hp-mid-cta h2 { color: var(--color-white); margin-bottom: var(--space-md); text-wrap: balance; }
.hp-mid-cta .cta-lead { color: rgba(255,255,255,0.78); max-width: 54ch; margin: 0 auto var(--space-2xl); }
.hp-cta-actions {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
  align-items: center;
}

/* --- About / Process (Signature Section) --------------------- */
.hp-about {
  background: var(--color-bg-alt);
  padding: var(--space-4xl) 0;
  overflow: visible;
}
.hp-about-inner {
  display: grid;
  grid-template-columns: 52fr 48fr;
  gap: var(--space-4xl);
  align-items: center;
}
.hp-about-image-wrap {
  position: relative;
  padding-bottom: var(--space-4xl);
  padding-right: var(--space-2xl);
}
.hp-about-image-wrap > img {
  border-radius: var(--radius-lg);
  width: 100%;
  aspect-ratio: 4 / 5;
  object-fit: cover;
  display: block;
  box-shadow: var(--shadow-xl);
}
.hp-about-stat-card {
  position: absolute;
  bottom: 0;
  right: 0;
  background: var(--color-accent);
  color: var(--color-white);
  border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg);
  text-align: center;
  box-shadow: var(--shadow-xl);
  min-width: 148px;
}
.hp-stat-big {
  font-family: var(--font-heading);
  font-size: clamp(2.5rem, 4vw, 3.5rem);
  font-weight: 900;
  line-height: 1;
  display: block;
}
.hp-stat-lbl {
  font-size: var(--font-size-xs);
  font-weight: 600;
  opacity: 0.88;
  margin-top: var(--space-xs);
  display: block;
  text-transform: uppercase;
  letter-spacing: 1px;
}
.hp-about-text .eyebrow-label { margin-bottom: var(--space-md); }
.hp-about-text h2 { margin-bottom: var(--space-lg); text-wrap: balance; }
.hp-about-text p { color: var(--color-text-light); max-width: 52ch; margin-bottom: var(--space-md); }
.hp-process {
  margin-top: var(--space-xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.hp-process-step {
  display: flex;
  gap: var(--space-md);
  align-items: flex-start;
}
.hp-step-num {
  width: 38px; height: 38px;
  border-radius: 50%;
  background: var(--color-primary);
  color: var(--color-white);
  font-family: var(--font-heading);
  font-size: var(--font-size-sm);
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.hp-step-body h4 { font-size: var(--font-size-base); color: var(--color-primary); margin-bottom: 3px; }
.hp-step-body p { font-size: var(--font-size-sm); color: var(--color-text-light); margin: 0; max-width: 36ch; }

/* --- Reviews Section (dark full-bleed) ----------------------- */
.hp-reviews {
  background: var(--color-bg-dark);
  padding: var(--space-4xl) 0;
}
.hp-reviews-header {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.hp-reviews-header .eyebrow-label { color: var(--color-accent); }
.hp-reviews-header h2 { color: var(--color-white); margin-bottom: var(--space-md); text-wrap: balance; }
.hp-reviews-header p { color: rgba(255,255,255,0.6); max-width: 50ch; margin: 0 auto; }
.hp-reviews-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
  margin-bottom: var(--space-3xl);
}
.hp-review-card {
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.09);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  transition: background var(--transition-base), border-color var(--transition-base);
}
.hp-review-card:hover {
  background: rgba(255,255,255,0.08);
  border-color: rgba(var(--color-accent-rgb), 0.28);
}
.hp-review-stars {
  display: flex;
  gap: 3px;
  margin-bottom: var(--space-md);
  color: var(--color-star);
}
.hp-review-stars svg { width: 18px; height: 18px; }
.hp-review-text {
  font-size: var(--font-size-sm);
  color: rgba(255,255,255,0.82);
  font-style: italic;
  line-height: 1.78;
  margin-bottom: var(--space-lg);
}
.hp-review-author { display: flex; align-items: center; gap: var(--space-sm); }
.hp-review-avatar {
  width: 40px; height: 40px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-white);
  font-family: var(--font-heading);
  font-weight: 700;
  font-size: var(--font-size-sm);
  flex-shrink: 0;
}
.hp-review-name { color: var(--color-white); font-size: var(--font-size-sm); font-weight: 600; display: block; }
.hp-review-service { color: rgba(255,255,255,0.42); font-size: var(--font-size-xs); display: block; }
.hp-badge-strip {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: var(--space-2xl);
  flex-wrap: wrap;
  padding-top: var(--space-2xl);
  border-top: 1px solid rgba(255,255,255,0.08);
}
.hp-badge {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  color: rgba(255,255,255,0.58);
  font-size: var(--font-size-sm);
  font-weight: 500;
}
.hp-badge svg { width: 22px; height: 22px; color: var(--color-star); flex-shrink: 0; }

/* --- FAQ Section --------------------------------------------- */
.hp-faq { background: var(--color-bg); padding: var(--space-4xl) 0; }
.hp-faq-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-lg);
  margin-top: var(--space-3xl);
}
.hp-faq-item {
  background: var(--color-bg-alt);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  border-left: 3px solid var(--color-accent);
  transition: box-shadow var(--transition-base), transform var(--transition-base);
}
.hp-faq-item:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
.hp-faq-q {
  font-family: var(--font-heading);
  font-size: clamp(0.95rem, 1.4vw, 1.08rem);
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
  text-wrap: balance;
  display: flex;
  gap: var(--space-sm);
  align-items: flex-start;
}
.hp-faq-q svg { width: 18px; height: 18px; color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.hp-faq-a { font-size: var(--font-size-sm); color: var(--color-text-light); line-height: 1.72; }

/* --- Closing CTA (CTA #3) ------------------------------------ */
.hp-closing-cta {
  background: var(--color-bg-alt);
  padding: var(--space-4xl) 0;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.hp-closing-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, transparent 55%, rgba(var(--color-accent-rgb), 0.05) 100%);
}
.hp-closing-cta .container { position: relative; z-index: 1; }
.hp-closing-cta h2 { margin-bottom: var(--space-md); text-wrap: balance; }
.hp-closing-cta p { color: var(--color-text-light); max-width: 54ch; margin: 0 auto var(--space-2xl); }
.hp-closing-cta-actions { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* === Responsive ================================================ */
@media (max-width: 1024px) {
  .hp-hero-inner { grid-template-columns: 1fr 1fr; gap: var(--space-2xl); }
  .hp-stats-grid { grid-template-columns: repeat(2, 1fr); }
  .hp-stat:nth-child(3) { border-left: none; }
  .hp-about-inner { grid-template-columns: 1fr; gap: var(--space-3xl); }
  .hp-about-image-wrap { padding-right: 0; max-width: 540px; margin: 0 auto; }
  .hp-reviews-grid { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 767px) {
  .hp-hero-inner {
    grid-template-columns: 1fr;
    gap: var(--space-2xl);
    padding-top: calc(var(--navbar-height) + var(--space-xl));
    padding-bottom: var(--space-3xl);
  }
  .hp-hero-text { order: 1; }
  .hp-form-card { order: 2; }
  .hp-hero-actions { flex-direction: column; align-items: flex-start; }
  .hp-stats-grid { grid-template-columns: 1fr 1fr; }
  .hp-stat:nth-child(3) { border-left: 1px solid rgba(255,255,255,0.1); }
  .hp-about-inner { grid-template-columns: 1fr; }
  .hp-reviews-grid { grid-template-columns: 1fr; }
  .hp-faq-grid { grid-template-columns: 1fr; }
  .hp-cta-actions { flex-direction: column; align-items: center; }
  .hp-closing-cta-actions { flex-direction: column; align-items: center; }
  .hp-badge-strip { gap: var(--space-xl); }
}
</style>


<!-- ═══════════════════════════════════════════════════════════
     HERO — Split Layout with Lead-Capture Form
═══════════════════════════════════════════════════════════════ -->
<section class="hp-hero hero--picture hero--has-form" aria-label="Expert tile remodeling in Bowdon, Georgia">
  <?php echo p1_hero_picture('kitchen-remodel', 'Remodeled kitchen with white cabinets and tile backsplash by Gray Tile & Remodeling in Bowdon, GA'); ?>

  <div class="hp-hero-inner">

    <!-- Left 60%: headline, subtitle, actions, trust -->
    <div class="hp-hero-text" data-animate>

      <div class="hp-hero-eyebrow">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        Tile &amp; Remodeling &middot; Bowdon, GA
      </div>

      <h1 class="hp-hero-title">
        Expert Tile &amp; Remodeling for<br>
        <span class="text-accent">Bowdon, GA</span> Homes
      </h1>

      <p class="hp-hero-subtitle hero-answer">
        Gray Tile &amp; Remodeling is a Bowdon, GA tile contractor that remodels kitchens, bathrooms and floors for Carroll County and West Georgia homeowners — custom tile showers, backsplashes, LVP and full remodels, handled in-house from layout to final grout.
      </p>

      <div class="hp-hero-actions">
        <a href="#estimate-form" class="btn btn-accent btn-lg hero-form-open" data-open-estimate>Get My Free Estimate</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">Explore Services</a>
      </div>

      <div class="hp-hero-trust">
        <span class="hp-trust-item">
          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
          Tile Specialists
        </span>
        <span class="hp-trust-item">
          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          Kitchens &middot; Baths &middot; Floors
        </span>
        <span class="hp-trust-item">
          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          Google-verified business
        </span>
        <span class="hp-trust-item">
          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
          Free Estimates
        </span>
      </div>

    </div><!-- /.hp-hero-text -->

    <!-- Right 40%: Quick-Capture Form -->
    <aside class="hp-form-card hero-form-card" id="estimate-form" aria-labelledby="hero-form-title">
      <p class="hero-form-title" id="hero-form-title" role="heading" aria-level="2">Get Your Free Estimate</p>
      <p class="hero-form-tagline">No obligation. We reply within one business day.</p>
      <?php $efPrefix = 'hero'; $efLocation = 'hero'; $efCompact = true;
            include $_SERVER['DOCUMENT_ROOT'] . '/includes/estimate-form.php'; ?>
    </aside>

  </div><!-- /.hp-hero-inner -->
</section><!-- /.hp-hero -->


<!-- ═══════════════════════════════════════════════════════════
     TICKER STRIP — Proof & Trust
═══════════════════════════════════════════════════════════════ -->
<div class="ticker-strip hp-ticker" aria-hidden="true" role="presentation">
  <div class="ticker-track">
    <span>★ Bowdon, GA Tile Specialists</span>
    <span>· Carroll County &amp; West Georgia ·</span>
    <span>✓ Kitchen Remodeling</span>
    <span>· Custom Tile Showers ·</span>
    <span>✓ Bathroom Remodeling</span>
    <span>· Serving Carroll County ·</span>
    <span>✓ Flooring Installation</span>
    <span>· Free Estimates ·</span>
    <span>✓ Design-Build Services</span>
    <span>· Basement Finishing ·</span>
    <span>★ Bowdon, GA Tile Specialists</span>
    <span>· Carroll County &amp; West Georgia ·</span>
    <span>✓ Kitchen Remodeling</span>
    <span>· Custom Tile Showers ·</span>
    <span>✓ Bathroom Remodeling</span>
    <span>· Serving Carroll County ·</span>
    <span>✓ Flooring Installation</span>
    <span>· Free Estimates ·</span>
    <span>✓ Design-Build Services</span>
    <span>· Basement Finishing ·</span>
  </div>
</div>


<!-- ═══════════════════════════════════════════════════════════
     SERVICES — Tinted Image Card Grid (CLAUDE.md Required Pattern)
═══════════════════════════════════════════════════════════════ -->
<section class="hp-services" id="services" aria-label="Remodeling and tile services">
  <div class="container">

    <div class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">What We Do</span>
      <h2>8 Services. <span class="text-accent">One Standard.</span></h2>
      <span class="section-subtitle">From custom tile showers to full home remodels — specialized craftsmanship for every room in your Bowdon, GA home.</span>
      <p class="prose prose-centered">Gray Tile &amp; Remodeling handles every phase of your project in-house, from design consultation to final inspection. No subcontracting surprises — just one expert team, start to finish.</p>
    </div>

    <div class="services-grid">

      <!-- Card 1: Kitchen Remodeling -->
      <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1" data-animate>
        <div class="service-card__image">
          <img src="<?= htmlspecialchars($clientPhotos['photo_kitchen']) ?>"
               alt="Kitchen remodeling with custom tile backsplash in Bowdon, GA"
               width="600" height="360" loading="lazy">
        </div>
        <div class="service-card__body">
          <div class="service-card__icon" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3zm0 0v7"/></svg>
          </div>
          <h3>Kitchen Remodeling</h3>
          <p class="service-card__desc">Complete kitchen transformation from cabinets to countertops and custom tile backsplashes — designed for how you cook and live.</p>
          <ul>
            <li>Design consultation included</li>
            <li>Custom tile backsplash work</li>
            <li>2–6 week project timeline</li>
          </ul>
          <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
        </div>
      </article>

      <!-- Card 2: Bathroom Remodeling -->
      <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2" data-animate>
        <div class="service-card__image">
          <img src="<?= htmlspecialchars($clientPhotos['photo_bathroom']) ?>"
               alt="Bathroom remodeling with tile floors and shower in Bowdon, GA"
               width="600" height="360" loading="lazy">
        </div>
        <div class="service-card__body">
          <div class="service-card__icon" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z"/><path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97"/></svg>
          </div>
          <h3>Bathroom Remodeling</h3>
          <p class="service-card__desc">Full bathroom renovations with expert tile installation for showers, floors, and feature walls — Georgia humidity handled correctly.</p>
          <ul>
            <li>Waterproof shower systems</li>
            <li>Floor-to-ceiling tile options</li>
            <li>Same-day consultation available</li>
          </ul>
          <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
        </div>
      </article>

      <!-- Card 3: Custom Tile Showers -->
      <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3" data-animate>
        <div class="service-card__image">
          <img src="<?= htmlspecialchars($clientPhotos['photo_tile_work']) ?>"
               alt="Custom tile shower installation in Bowdon Georgia bathroom"
               width="600" height="360" loading="lazy">
        </div>
        <div class="service-card__body">
          <div class="service-card__icon" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
          </div>
          <h3>Custom Tile Showers</h3>
          <p class="service-card__desc">Luxury walk-in showers crafted with premium ceramic, porcelain, or natural stone tile — built for Georgia's moisture conditions.</p>
          <ul>
            <li>Moisture barrier installation</li>
            <li>Designer layout patterns</li>
            <li>Built to Georgia climate standards</li>
          </ul>
          <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
        </div>
      </article>

      <!-- Card 4: Flooring Installation -->
      <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1" data-animate>
        <div class="service-card__image">
          <img src="<?= htmlspecialchars($clientPhotos['photo06']) ?>"
               alt="Professional flooring installation in Bowdon Georgia home"
               width="600" height="360" loading="lazy">
        </div>
        <div class="service-card__body">
          <div class="service-card__icon" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="18" rx="2"/><path d="M2 9h20M2 15h20M9 3v18M15 3v18"/></svg>
          </div>
          <h3>Flooring Installation</h3>
          <p class="service-card__desc">Tile, LVP, and hardwood flooring installed to perfection — including subfloor prep for a foundation that lasts decades.</p>
          <ul>
            <li>Tile, LVP, and hardwood options</li>
            <li>Subfloor prep included</li>
            <li>20–30 year service life</li>
          </ul>
          <a href="/services/flooring-services/" class="service-card__cta">Learn more</a>
        </div>
      </article>

      <!-- Card 5: Basement Finishing -->
      <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2" data-animate>
        <div class="service-card__image">
          <img src="<?= htmlspecialchars($clientPhotos['photo05']) ?>"
               alt="Basement finishing and remodeling in Bowdon GA"
               width="600" height="360" loading="lazy">
        </div>
        <div class="service-card__body">
          <div class="service-card__icon" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
          </div>
          <h3>Basement Finishing</h3>
          <p class="service-card__desc">Turn unfinished basement square footage into functional, beautiful living space — game rooms, home offices, in-law suites.</p>
          <ul>
            <li>Full electrical and plumbing</li>
            <li>Moisture-resistant materials</li>
            <li>Custom bar or kitchen add-ons</li>
          </ul>
          <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
        </div>
      </article>

      <!-- Card 6: Room Additions -->
      <article class="service-card-with-image card-tint-3 reveal-up reveal-delay-3" data-animate>
        <div class="service-card__image">
          <img src="<?= htmlspecialchars($clientPhotos['photo06']) ?>"
               alt="Room addition construction on Bowdon Georgia home"
               width="600" height="360" loading="lazy">
        </div>
        <div class="service-card__body">
          <div class="service-card__icon" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="2" y="2" width="9" height="9"/><rect x="13" y="2" width="9" height="9"/><rect x="2" y="13" width="9" height="9"/><path d="M17.5 13v8M13 17.5h8"/></svg>
          </div>
          <h3>Room Additions</h3>
          <p class="service-card__desc">Expand your home's footprint with seamlessly integrated room additions that match your existing architecture and finish level.</p>
          <ul>
            <li>Structural framing included</li>
            <li>Matches existing home style</li>
            <li>Permits and inspections handled</li>
          </ul>
          <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
        </div>
      </article>

      <!-- Card 7: Design-Build Remodeling -->
      <article class="service-card-with-image card-tint-1 reveal-up reveal-delay-1" data-animate>
        <div class="service-card__image">
          <img src="<?= htmlspecialchars($clientPhotos['photo07']) ?>"
               alt="Design-build remodeling project planning in Georgia"
               width="600" height="360" loading="lazy">
        </div>
        <div class="service-card__body">
          <div class="service-card__icon" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
          </div>
          <h3>Design-Build Remodeling</h3>
          <p class="service-card__desc">One company handles design and construction — no coordination headaches between architects and contractors. Streamlined from concept to completion.</p>
          <ul>
            <li>Single point of contact</li>
            <li>Faster project timelines</li>
            <li>Budget transparency upfront</li>
          </ul>
          <a href="/services/design-build-remodeling/" class="service-card__cta">Learn more</a>
        </div>
      </article>

      <!-- Card 8: Full Home Remodel -->
      <article class="service-card-with-image card-tint-2 reveal-up reveal-delay-2" data-animate>
        <div class="service-card__image">
          <img src="<?= htmlspecialchars($clientPhotos['photo08']) ?>"
               alt="Full home remodel project in Bowdon Georgia"
               width="600" height="360" loading="lazy">
        </div>
        <div class="service-card__body">
          <div class="service-card__icon" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          </div>
          <h3>Full Home Remodel</h3>
          <p class="service-card__desc">Whole-house renovation services coordinated by one trusted contractor — every room updated, every trade managed by our team.</p>
          <ul>
            <li>Phased project planning</li>
            <li>Multi-trade coordination</li>
            <li>Consistent finish quality throughout</li>
          </ul>
          <a href="/services/remodeling-services/" class="service-card__cta">Learn more</a>
        </div>
      </article>

    </div><!-- /.services-grid -->

    <div class="services-footer-link" data-animate>
      <a href="/services/" class="btn btn-primary btn-lg">View All 25 Services →</a>
    </div>

  </div><!-- /.container -->
</section>


<!-- ═══════════════════════════════════════════════════════════
     STATS — Proof by Numbers
═══════════════════════════════════════════════════════════════ -->
<!-- Divider: hero-to-stats -->
<div class="divider-diagonal" style="background:var(--color-bg);" aria-hidden="true">
  <svg viewBox="0 0 1440 56" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
    <polygon fill="var(--color-primary)" points="0,0 1440,56 1440,56 0,56"/>
  </svg>
</div>

<section class="proof-strip texture-grain" aria-label="Facts about Gray Tile and Remodeling">
  <div class="container">
    <div class="proof-item"><?php echo p1_icon('map-pin'); ?><div><b>Bowdon, GA</b><span>Serving Carroll County &amp; West Georgia</span></div></div>
    <div class="proof-item"><?php echo p1_icon('badge-check'); ?><div><b>Google-verified</b><span>Tile contractor listing on Google Business Profile</span></div></div>
    <div class="proof-item"><?php echo p1_icon('layers'); ?><div><b>In-house crew</b><span>Tile, kitchens, baths &amp; floors — one team start to finish</span></div></div>
    <div class="proof-item"><?php echo p1_icon('clock'); ?><div><b>Mon–Thu 9am–5pm</b><span>Free estimates · replies within one business day</span></div></div>
  </div>
</section>

<!-- Divider: stats-to-cta -->
<div class="divider-wave" style="background:var(--color-primary);" aria-hidden="true">
  <svg viewBox="0 0 1440 64" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
    <path fill="var(--color-bg)" d="M0,32 C360,64 1080,0 1440,32 L1440,64 L0,64 Z"/>
  </svg>
</div>


<!-- ═══════════════════════════════════════════════════════════
     MID-PAGE CTA — CTA #2
═══════════════════════════════════════════════════════════════ -->
<section class="hp-mid-cta" aria-label="Schedule your free estimate">
  <div class="container">
    <div data-animate>
      <h2>Your Remodel Shouldn't Wait<br>for the Right Contractor</h2>
      <p class="cta-lead">Gray Tile &amp; Remodeling brings years of specialized tile and remodeling expertise to every project in Carroll County. We show up, we communicate, and we finish what we start — on time and on budget.</p>
      <div class="hp-cta-actions">
        <?php if ($phone): ?>
        <a href="tel:<?= htmlspecialchars($phone) ?>" class="btn btn-accent btn-lg">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.65 3.39 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Call Now — Same-Day Available
        </a>
        <?php endif; ?>
        <a href="/contact/" class="btn btn-outline-white btn-lg">Request Estimate Online</a>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════════════════
     ABOUT / PROCESS — Signature Section (overlapping image + card)
═══════════════════════════════════════════════════════════════ -->
<!-- Divider -->
<div class="divider-diagonal" style="background:var(--color-bg-dark);" aria-hidden="true">
  <svg viewBox="0 0 1440 56" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
    <polygon fill="var(--color-bg-alt)" points="0,0 1440,56 0,56"/>
  </svg>
</div>

<section class="hp-about" id="about" aria-label="About Gray Tile and Remodeling">
  <div class="container">
    <div class="hp-about-inner">

      <!-- Left: Photo with overlapping stat card -->
      <div class="hp-about-image-wrap" data-animate>
        <img src="<?= htmlspecialchars($clientPhotos['photo09']) ?>"
             alt="Gray Tile and Remodeling craftsman working on tile installation in Bowdon Georgia"
             width="800" height="1000" loading="lazy">
      </div>

      <!-- Right: Text + Process Steps -->
      <div class="hp-about-text" data-animate>

        <span class="eyebrow-label">About Us</span>
        <h2>Bowdon's Dedicated<br><span class="text-accent">Tile Specialists</span></h2>

        <p>At Gray Tile &amp; Remodeling, we do one thing and we do it exceptionally well — tile installation and full-scope remodeling for homes throughout Carroll County and West Georgia. We're not a general contractor trying to be everything to everyone. We're tile specialists who've spent years perfecting the craft.</p>

        <p>Based right here in Bowdon, our team understands Georgia's climate, its humidity challenges, and the specific demands of homes in our region. That means your tile installation won't just look great on day one — it'll hold up for decades.</p>

        <div class="hp-process" aria-label="Our process">

          <div class="hp-process-step">
            <div class="hp-step-num" aria-hidden="true">01</div>
            <div class="hp-step-body">
              <h4>Free Consultation</h4>
              <p>We visit your home, assess the space, and walk you through realistic options for your budget and timeline.</p>
            </div>
          </div>

          <div class="hp-process-step">
            <div class="hp-step-num" aria-hidden="true">02</div>
            <div class="hp-step-body">
              <h4>Design &amp; Material Selection</h4>
              <p>Our design consultation helps you choose tiles, layouts, and finishes that work for your style and Georgia's climate.</p>
            </div>
          </div>

          <div class="hp-process-step">
            <div class="hp-step-num" aria-hidden="true">03</div>
            <div class="hp-step-body">
              <h4>Expert Installation</h4>
              <p>Our crew handles demo, prep, and installation with the precision that only comes from years of focused tile work.</p>
            </div>
          </div>

          <div class="hp-process-step">
            <div class="hp-step-num" aria-hidden="true">04</div>
            <div class="hp-step-body">
              <h4>Final Walkthrough</h4>
              <p>We walk every project with the homeowner before calling it complete — no punch list left behind, no detail overlooked.</p>
            </div>
          </div>

        </div><!-- /.hp-process -->

        <div style="margin-top: var(--space-2xl);">
          <a href="/about/" class="btn btn-primary btn-lg">Meet Our Team</a>
        </div>

      </div><!-- /.hp-about-text -->

    </div><!-- /.hp-about-inner -->
  </div><!-- /.container -->
</section><!-- /.hp-about -->


<!-- ═══════════════════════════════════════════════════════════
     REVIEWS — Dark Background, Full-Bleed
═══════════════════════════════════════════════════════════════ -->
<!-- Divider -->
<div class="divider-wave" style="background:var(--color-bg-alt);" aria-hidden="true">
  <svg viewBox="0 0 1440 64" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
    <path fill="var(--color-bg-dark)" d="M0,32 C480,0 960,64 1440,32 L1440,64 L0,64 Z"/>
  </svg>
</div>

<section class="hp-reviews hp-gallery texture-grain" id="recent-work" aria-label="Recent tile and remodeling work">
  <div class="container">
    <div class="hp-reviews-header" data-animate>
      <span class="eyebrow-label">Recent Work</span>
      <h2>What Does Our Tile Work<br><span class="text-accent">Actually Look Like?</span></h2>
      <p>Showers, kitchens and floors from real Carroll County jobs — the crew's own photos, no stock imagery.</p>
    </div>
    <?php $recentWork = [
      ['project-07', 'Walk-in tile shower with glass enclosure and freestanding tub in a Bowdon, GA bathroom remodel', 'Walk-in shower &amp; tub'],
      ['custom-tile-work', 'Custom tile shower with built-in niche and half wall during installation in Carroll County', 'Custom tile shower'],
      ['kitchen-remodel', 'Remodeled kitchen with white cabinets, subway tile backsplash and stainless range in Bowdon, GA', 'Kitchen remodel'],
      ['project-10', 'White subway tile shower with rain head in a West Georgia bathroom', 'Subway tile shower'],
      ['project-15', 'Kitchen island with quartz top and new hardwood flooring in a Carrollton area home', 'Island &amp; new floors'],
      ['project-06', 'Subway tile shower with tiled bench and mosaic floor', 'Tile shower &amp; bench'],
      ['room-addition', 'Open living and kitchen space with plank flooring during a room addition in Carroll County', 'Open floor plan'],
      ['project-08', 'Heated tile floor underlayment being installed before tile in a Bowdon bathroom', 'Heated tile floor'],
    ]; ?>
    <div class="gallery-track" data-p1-dynamic>
      <?php foreach ($recentWork as $g): ?>
      <figure><?php echo p1_picture($g[0], $g[1], ['sizes' => '(max-width: 900px) 70vw, 30vw']); ?><figcaption><?php echo $g[2]; ?></figcaption></figure>
      <?php endforeach; ?>
    </div>
  </div>
</section><!-- /.hp-gallery -->


<!-- ═══════════════════════════════════════════════════════════
     FAQ SECTION
═══════════════════════════════════════════════════════════════ -->
<!-- Divider -->
<div class="divider-diagonal" style="background:var(--color-bg-dark);" aria-hidden="true">
  <svg viewBox="0 0 1440 56" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
    <polygon fill="var(--color-bg)" points="0,0 1440,0 0,56"/>
  </svg>
</div>

<section class="hp-faq" id="faq" aria-label="Frequently asked questions about tile remodeling">
  <div class="container">

    <div class="section-title" data-animate>
      <span class="eyebrow-label">FAQ</span>
      <h2>Answers Before<br>You Even Ask</h2>
      <span class="section-subtitle">The questions Bowdon homeowners ask us most — answered directly, no fluff.</span>
    </div>

    <div class="hp-faq-grid" data-p1-dynamic>
      <?php foreach ($homeFaqs as $faq): ?>
      <div class="hp-faq-item" data-animate>
        <div class="hp-faq-q">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
          <?= htmlspecialchars($faq['q']) ?>
        </div>
        <p class="hp-faq-a"><?= htmlspecialchars($faq['a']) ?></p>
      </div>
      <?php endforeach; ?>
    </div><!-- /.hp-faq-grid -->

  </div><!-- /.container -->
</section><!-- /.hp-faq -->


<!-- ═══════════════════════════════════════════════════════════
     CLOSING CTA — CTA #3
═══════════════════════════════════════════════════════════════ -->
<section class="hp-closing-cta" aria-label="Get your free remodeling estimate">
  <div class="container">
    <div data-animate>
      <h2>Your Next Project Starts<br>with a Free Conversation</h2>
      <p>Most of our customers in Bowdon, Carrollton, and Villa Rica find out we're already familiar with their neighborhood. Reach out — we'll tell you what's realistic, what it will cost, and what the finished result will look like.</p>
      <div class="hp-closing-cta-actions">
        <a href="/contact/" class="btn btn-primary btn-lg">Request Your Free Estimate</a>
        <?php if ($phone): ?>
        <a href="tel:<?= htmlspecialchars($phone) ?>" class="btn btn-accent btn-lg">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.65 3.39 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Call Now
        </a>
        <?php else: ?>
        <a href="/service-area/" class="btn btn-accent btn-lg">See Our Service Area</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section><!-- /.hp-closing-cta -->


<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
