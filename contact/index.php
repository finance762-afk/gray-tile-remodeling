<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Get a Free Estimate | Gray Tile & Remodeling Bowdon GA';
$pageDescription = 'Request your free estimate from Gray Tile & Remodeling in Bowdon, GA. We serve Carroll County and West Georgia for tile, kitchen, bathroom, and home renovation.';
$canonicalUrl    = $siteUrl . '/contact/';
$ogImage         = $clientPhotos['photo01'];
$currentPage     = 'contact';

$contactFaqs = [
    [
        'q' => 'What happens after I submit the form?',
        'a' => 'We review every estimate request within 1 business day. A team member will reach out to confirm your project details, answer any initial questions, and schedule a time to visit your home for a full walkthrough — typically within the same week.',
    ],
    [
        'q' => 'Is the estimate truly free?',
        'a' => 'Yes, completely. There is no charge for the site visit, the consultation, or the written estimate. We walk your space, assess the project scope, and provide a detailed written quote at no cost and with no obligation to proceed.',
    ],
    [
        'q' => 'How soon can you start a project in Bowdon?',
        'a' => 'Most projects in and around Bowdon can be scheduled within 2–4 weeks of a signed agreement, depending on season and current workload. We\'ll give you a realistic start date during the estimate conversation — not a vague "we\'ll call you."',
    ],
];

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',    'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Contact', 'item' => $siteUrl . '/contact/'],
            ],
        ],
        [
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(fn($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $contactFaqs),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

// SEO: head.php outputs <link rel="canonical"> and application/ld+json schema for this page.
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   CONTACT/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles. All values use var() tokens only.
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.contact-hero {
  position: relative;
  min-height: 40vh;
  display: flex;
  align-items: center;
  background-image: url('<?php echo htmlspecialchars($clientPhotos['photo01']); ?>');
  background-size: cover;
  background-position: center 30%;
  background-repeat: no-repeat;
  overflow: hidden;
}
.contact-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    135deg,
    rgba(var(--color-primary-dark-rgb), 0.92) 0%,
    rgba(var(--color-primary-rgb), 0.78) 60%,
    rgba(var(--color-primary-dark-rgb), 0.65) 100%
  );
  z-index: 1;
}
.contact-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04;
  z-index: 2;
  pointer-events: none;
}
.contact-hero-content {
  position: relative;
  z-index: 3;
  padding: var(--space-4xl) 0;
  width: 100%;
}
.contact-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.2rem, 5vw, 3.6rem);
  font-weight: 800;
  line-height: 1.12;
  letter-spacing: -0.02em;
  text-wrap: balance;
  color: var(--color-white);
  margin-bottom: var(--space-md);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.9) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.contact-hero-sub {
  font-size: clamp(1rem, 1.8vw, 1.15rem);
  color: rgba(255,255,255,0.82);
  max-width: 50ch;
  line-height: 1.6;
}

/* ── Breadcrumb ───────────────────────────────────────────────── */
.breadcrumb-bar {
  background: var(--color-bg-alt);
  border-bottom: 1px solid var(--color-gray-light);
  padding: var(--space-sm) 0;
}
.breadcrumb {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
  font-size: 0.85rem;
  color: var(--color-text-light);
  list-style: none;
  padding: 0;
  margin: 0;
}
.breadcrumb li + li::before {
  content: '/';
  color: var(--color-text-light);
  margin-right: var(--space-xs);
  opacity: 0.5;
}
.breadcrumb a {
  color: var(--color-accent);
  text-decoration: none;
  transition: color var(--transition-base);
}
.breadcrumb a:hover { color: var(--color-primary); }
.breadcrumb [aria-current="page"] { color: var(--color-text); font-weight: 600; }

/* ── Main Contact Section ────────────────────────────────────── */
.contact-main-section {
  padding: var(--section-pad);
  background: var(--color-bg);
}
.contact-split {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: var(--space-3xl);
  align-items: start;
}

/* ── Form Container ───────────────────────────────────────────── */
.contact-form-wrap {
  background: var(--color-bg);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl);
  box-shadow: var(--shadow-md);
}
.contact-form-wrap .form-header {
  margin-bottom: var(--space-xl);
}
.contact-form-wrap .form-header .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-xs);
}
.contact-form-wrap .form-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.5rem, 2.8vw, 2rem);
  font-weight: 800;
  color: var(--color-primary);
  text-wrap: balance;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-xs);
}
.contact-form-wrap .form-header p {
  font-size: 0.95rem;
  color: var(--color-text-light);
  line-height: 1.6;
}

/* ── Floating Labels ──────────────────────────────────────────── */
.contact-form { width: 100%; }
.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-md);
}
.form-group {
  position: relative;
  margin-bottom: var(--space-lg);
}
.form-group input,
.form-group textarea,
.form-group select {
  width: 100%;
  padding: var(--space-lg) var(--space-md) var(--space-sm);
  border: 2px solid var(--color-gray-light);
  border-radius: var(--radius-md);
  font-family: var(--font-body);
  font-size: 1rem;
  background: var(--color-bg);
  color: var(--color-text);
  transition: border-color var(--transition-base), box-shadow var(--transition-base);
  outline: none;
  -webkit-appearance: none;
  appearance: none;
}
.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
  border-color: var(--color-accent);
  box-shadow: 0 0 0 3px rgba(var(--color-accent-rgb), 0.12);
}
.form-group input:focus-visible,
.form-group textarea:focus-visible,
.form-group select:focus-visible {
  outline: 2px solid var(--color-accent);
  outline-offset: 2px;
}
.form-group label,
.form-group .select-label {
  position: absolute;
  top: 50%;
  left: var(--space-md);
  transform: translateY(-50%);
  font-size: 1rem;
  color: var(--color-text-light);
  pointer-events: none;
  transition: all var(--transition-base);
  background: var(--color-bg);
  padding: 0 var(--space-xs);
}
.form-group textarea ~ label { top: var(--space-lg); transform: none; }
.form-group input:focus ~ label,
.form-group input:not(:placeholder-shown) ~ label,
.form-group textarea:focus ~ label,
.form-group textarea:not(:placeholder-shown) ~ label {
  top: 0;
  transform: translateY(-50%);
  font-size: 0.8rem;
  color: var(--color-accent);
  font-weight: 600;
}
.form-group select ~ .select-label {
  top: 50%;
  transform: translateY(-50%);
}
.form-group select:focus ~ .select-label,
.form-group select:not([value=""]) ~ .select-label {
  top: 0;
  transform: translateY(-50%);
  font-size: 0.8rem;
  color: var(--color-accent);
  font-weight: 600;
}

/* ── Consent Fieldset ─────────────────────────────────────────── */
.form-consent-fieldset {
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-md);
  padding: var(--space-lg);
  margin-bottom: var(--space-lg);
  background: var(--color-bg-alt);
}
.form-consent-legend {
  font-family: var(--font-heading);
  font-size: 0.9rem;
  font-weight: 700;
  color: var(--color-primary);
  letter-spacing: 0.04em;
  text-transform: uppercase;
  padding: 0 var(--space-sm);
}
.form-consent-item {
  display: flex;
  gap: var(--space-sm);
  align-items: flex-start;
  margin-top: var(--space-md);
  cursor: pointer;
}
.consent-checkbox {
  flex-shrink: 0;
  width: 18px;
  height: 18px;
  margin-top: 2px;
  accent-color: var(--color-accent);
  cursor: pointer;
}
.consent-label {
  font-size: 0.84rem;
  color: var(--color-text-light);
  line-height: 1.55;
}
.consent-label a {
  color: var(--color-accent);
  text-decoration: underline;
  text-underline-offset: 2px;
}
.form-consent-required .consent-label {
  color: var(--color-text);
  font-weight: 500;
}
.required-star { color: var(--color-accent); font-weight: 700; }

/* ── Submit Button ────────────────────────────────────────────── */
.btn-submit {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: var(--space-sm);
  background: var(--color-accent);
  color: var(--color-primary);
  font-family: var(--font-heading);
  font-size: 1.1rem;
  font-weight: 700;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  padding: var(--space-lg) var(--space-xl);
  border: none;
  border-radius: var(--radius-md);
  cursor: pointer;
  box-shadow: 0 4px 0 rgba(var(--color-primary-dark-rgb), 0.35);
  transition: transform var(--transition-base), box-shadow var(--transition-base), background var(--transition-base);
  overflow: hidden;
  position: relative;
}
.btn-submit:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 0 rgba(var(--color-primary-dark-rgb), 0.35);
  background: color-mix(in srgb, var(--color-accent) 90%, white 10%);
}
.btn-submit:active {
  transform: translateY(2px);
  box-shadow: 0 2px 0 rgba(var(--color-primary-dark-rgb), 0.35);
}
.btn-submit:focus-visible {
  outline: 2px solid var(--color-accent);
  outline-offset: 3px;
}

/* ── Contact Info Sidebar ─────────────────────────────────────── */
.contact-info-col {
  display: flex;
  flex-direction: column;
  gap: var(--space-lg);
}
.contact-info-header .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-xs);
}
.contact-info-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.5rem, 2.8vw, 2.1rem);
  font-weight: 800;
  color: var(--color-primary);
  text-wrap: balance;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-sm);
}
.contact-info-header p.prose {
  max-width: 42ch;
  line-height: 1.7;
  color: var(--color-text-light);
}
.contact-info-card {
  background: var(--color-bg-alt);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
}
.contact-info-card h3 {
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: var(--space-lg);
  text-transform: uppercase;
  letter-spacing: 0.06em;
  font-size: 0.85rem;
}
.contact-info-item {
  display: flex;
  gap: var(--space-md);
  align-items: flex-start;
  margin-bottom: var(--space-lg);
}
.contact-info-item:last-child { margin-bottom: 0; }
.contact-info-icon {
  flex-shrink: 0;
  width: 40px;
  height: 40px;
  border-radius: var(--radius-md);
  background: linear-gradient(135deg, rgba(var(--color-accent-rgb), 0.12), rgba(var(--color-primary-rgb), 0.05));
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
}
.contact-info-icon svg {
  width: 18px;
  height: 18px;
  stroke: var(--color-accent);
  fill: none;
}
.contact-info-label {
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--color-text-light);
  margin-bottom: var(--space-xs);
}
.contact-info-value {
  font-size: 0.98rem;
  color: var(--color-text);
  font-weight: 500;
  line-height: 1.5;
}
.contact-info-value a {
  color: var(--color-accent);
  text-decoration: none;
  font-weight: 600;
  transition: color var(--transition-base);
}
.contact-info-value a:hover { color: var(--color-primary); }

/* ── Map Placeholder ──────────────────────────────────────────── */
.map-placeholder {
  height: 220px;
  background: var(--color-bg-alt);
  border: 2px dashed var(--color-gray-light);
  border-radius: var(--radius-lg);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: var(--space-sm);
  color: var(--color-text-light);
  text-align: center;
  padding: var(--space-lg);
}
.map-placeholder svg {
  width: 32px;
  height: 32px;
  stroke: var(--color-accent);
  opacity: 0.5;
}
.map-placeholder p {
  font-size: 0.88rem;
  line-height: 1.55;
}
.map-placeholder strong {
  color: var(--color-primary);
  font-size: 0.95rem;
  display: block;
}

/* ── Why-Choose Callout Strip ─────────────────────────────────── */
.contact-trust-strip {
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  padding: var(--space-xl) var(--space-lg);
  border-radius: var(--radius-lg);
}
.contact-trust-strip h3 {
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  color: var(--color-white);
  text-transform: uppercase;
  letter-spacing: 0.08em;
  margin-bottom: var(--space-md);
}
.trust-items {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
}
.trust-items li {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: 0.88rem;
  color: rgba(255,255,255,0.88);
}
.trust-items li::before {
  content: '';
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: var(--color-accent);
  flex-shrink: 0;
}

/* ── Section Divider ──────────────────────────────────────────── */
.divider-wave {
  width: 100%;
  overflow: hidden;
  line-height: 0;
  background: var(--color-bg);
}
.divider-wave svg {
  display: block;
  width: 100%;
}

/* ── FAQ Section ──────────────────────────────────────────────── */
.contact-faq-section {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
.contact-faq-section .section-heading-group {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.contact-faq-section .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.contact-faq-section h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-primary);
  text-wrap: balance;
  letter-spacing: -0.02em;
}
.faq-list {
  max-width: 780px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.faq-item {
  background: var(--color-bg);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-md);
  overflow: hidden;
}
.faq-question {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: var(--space-lg) var(--space-xl);
  cursor: pointer;
  font-family: var(--font-heading);
  font-size: 1.08rem;
  font-weight: 700;
  color: var(--color-primary);
  transition: color var(--transition-base);
  list-style: none;
  gap: var(--space-lg);
}
.faq-question:hover { color: var(--color-accent); }
.faq-question::after {
  content: '+';
  flex-shrink: 0;
  font-size: 1.4rem;
  color: var(--color-accent);
  font-weight: 400;
  transition: transform var(--transition-base);
}
details[open] .faq-question::after {
  transform: rotate(45deg);
}
.faq-answer {
  padding: 0 var(--space-xl) var(--space-lg);
  font-size: 0.96rem;
  color: var(--color-text-light);
  line-height: 1.7;
  max-width: 65ch;
}

/* ── Closing CTA ──────────────────────────────────────────────── */
.contact-closing-cta {
  position: relative;
  padding: var(--space-4xl) var(--space-lg);
  background: var(--color-bg-dark);
  overflow: hidden;
  text-align: center;
  clip-path: polygon(0 8%, 100% 0, 100% 100%, 0 100%);
  padding-top: calc(var(--space-4xl) + 50px);
}
.contact-closing-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse 50% 60% at 50% 60%, rgba(var(--color-accent-rgb), 0.08) 0%, transparent 70%);
  pointer-events: none;
}
.contact-closing-cta .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-md);
  position: relative;
  z-index: 1;
}
.contact-closing-cta h2 {
  position: relative;
  z-index: 1;
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.8rem);
  font-weight: 800;
  color: var(--color-white);
  text-wrap: balance;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-md);
}
.contact-closing-cta p {
  position: relative;
  z-index: 1;
  color: rgba(255,255,255,0.75);
  max-width: 50ch;
  margin: 0 auto var(--space-xl);
  line-height: 1.65;
}
.contact-closing-cta .btn-group {
  position: relative;
  z-index: 1;
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}
.btn-cta-primary {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: var(--color-accent);
  color: var(--color-primary);
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  padding: var(--space-md) var(--space-xl);
  border-radius: var(--radius-md);
  box-shadow: 0 4px 0 rgba(var(--color-primary-dark-rgb), 0.4);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
  text-decoration: none;
}
.btn-cta-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 0 rgba(var(--color-primary-dark-rgb), 0.4);
}
.btn-cta-primary:active {
  transform: translateY(2px);
  box-shadow: 0 2px 0 rgba(var(--color-primary-dark-rgb), 0.4);
}
.btn-cta-secondary {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: transparent;
  color: var(--color-white);
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  padding: var(--space-md) var(--space-xl);
  border-radius: var(--radius-md);
  border: 2px solid rgba(255,255,255,0.35);
  transition: border-color var(--transition-base), background var(--transition-base);
  text-decoration: none;
}
.btn-cta-secondary:hover {
  border-color: rgba(255,255,255,0.7);
  background: rgba(255,255,255,0.06);
}

/* ── Responsive ───────────────────────────────────────────────── */
@media (max-width: 1023px) {
  .contact-split {
    grid-template-columns: 1fr;
    gap: var(--space-2xl);
  }
  .form-row { grid-template-columns: 1fr; }
}
@media (max-width: 767px) {
  .contact-hero { min-height: 50vh; }
  .contact-main-section { padding: var(--section-pad-mobile); }
  .contact-form-wrap { padding: var(--space-lg); }
  .contact-faq-section { padding: var(--section-pad-mobile); }
  .contact-closing-cta { clip-path: none; padding: var(--section-pad-mobile); }
}
</style>

<!-- ═══════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════ -->
<section class="contact-hero" aria-label="Contact Gray Tile and Remodeling hero">
  <div class="contact-hero-content container">
    <h1 data-animate="fade-up">Get Your Free Remodeling Estimate</h1>
    <p class="contact-hero-sub" data-animate="fade-up">
      Serving Bowdon, Carrollton, Villa Rica, Bremen, Temple, and all of Carroll County. Free site visits, no obligation — most estimates delivered within 48 hours.
    </p>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     BREADCRUMB
═══════════════════════════════════════════════════════════ -->
<nav class="breadcrumb-bar" aria-label="Breadcrumb navigation">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li><span aria-current="page">Contact</span></li>
    </ol>
  </div>
</nav>

<!-- ═══════════════════════════════════════════════════════════
     MAIN CONTACT — Split: Form + Info
═══════════════════════════════════════════════════════════ -->
<section class="contact-main-section" aria-labelledby="contact-form-heading">
  <div class="container">
    <div class="contact-split">

      <!-- LEFT: Form -->
      <div class="contact-form-wrap" data-animate="fade-up">
        <div class="form-header">
          <span class="eyebrow-label">Free Estimate Request</span>
          <h2 id="contact-form-heading">Tell Us About Your Project</h2>
          <p>We typically respond within 1 business day. No spam, no pressure — just a straightforward conversation about your home.</p>
        </div>

        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="contact-form" novalidate>
          <!-- Honeypot -->
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <!-- Required hidden fields -->
          <input type="hidden" name="_next" value="/thank-you">
          <input type="hidden" name="_consent_version" value="v2.1">
          <input type="hidden" name="_consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

          <div class="form-row">
            <div class="form-group">
              <input type="text" id="name" name="name" required placeholder=" " autocomplete="name">
              <label for="name">Your Name *</label>
            </div>
            <div class="form-group">
              <input type="tel" id="phone" name="phone" required placeholder=" " autocomplete="tel">
              <label for="phone">Phone Number *</label>
            </div>
          </div>

          <div class="form-group">
            <input type="email" id="email" name="email" required placeholder=" " autocomplete="email">
            <label for="email">Email Address *</label>
          </div>

          <div class="form-group">
            <select id="service" name="service">
              <option value="">Select a service...</option>
              <?php foreach ($services as $svc): ?>
              <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
              <?php endforeach; ?>
            </select>
            <label for="service" class="select-label">Service Needed</label>
          </div>

          <div class="form-group">
            <textarea id="message" name="message" rows="4" placeholder=" "></textarea>
            <label for="message">Project Details</label>
          </div>

          <!-- TCPA Consent Fieldset (REQUIRED — TCPA 2025/2026 + Texas TCPA) -->
          <fieldset class="form-consent-fieldset">
            <legend class="form-consent-legend">Communication Consent</legend>

            <label class="form-consent-item">
              <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label">
                <strong>Email updates (optional):</strong> I agree to receive emails from <?php echo htmlspecialchars($siteName); ?> about my inquiry, services, and promotions. I can unsubscribe anytime.
              </span>
            </label>

            <label class="form-consent-item">
              <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label">
                <strong>SMS/Text messages (optional):</strong> I agree to receive text messages from <?php echo htmlspecialchars($siteName); ?>. Message and data rates may apply. Reply STOP to unsubscribe, HELP for help. <strong>Consent is not a condition of purchase.</strong>
              </span>
            </label>

            <label class="form-consent-item form-consent-required">
              <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
              <span class="consent-label">
                I have read and agree to the
                <a href="/privacy-policy/">Privacy Policy</a>
                and
                <a href="/terms/">Terms of Service</a>. <span class="required-star">*</span>
              </span>
            </label>
          </fieldset>

          <button type="submit" class="btn-submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
            Send My Free Estimate Request
          </button>
        </form>
      </div><!-- /.contact-form-wrap -->

      <!-- RIGHT: Contact Info -->
      <div class="contact-info-col" data-animate="fade-up">

        <div class="contact-info-header">
          <span class="eyebrow-label">Reach Us Directly</span>
          <h2>We're Based in<br>Bowdon, Georgia</h2>
          <p class="prose">Prefer to call or stop by? We're available Monday through Friday 8am–6pm and Saturday mornings. For non-urgent inquiries, the form is the fastest way to get a response.</p>
        </div>

        <div class="contact-info-card">
          <h3>Contact Information</h3>

          <?php if ($phone): ?>
          <div class="contact-info-item">
            <div class="contact-info-icon" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.65 3.39 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.59a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            </div>
            <div>
              <div class="contact-info-label">Phone</div>
              <div class="contact-info-value">
                <a href="tel:<?php echo htmlspecialchars($phone); ?>"><?php echo htmlspecialchars(formatPhone($phone)); ?></a>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <?php if ($email): ?>
          <div class="contact-info-item">
            <div class="contact-info-icon" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </div>
            <div>
              <div class="contact-info-label">Email</div>
              <div class="contact-info-value">
                <a href="mailto:<?php echo htmlspecialchars($contactEmail); ?>"><?php echo htmlspecialchars($contactEmail); ?></a>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <div class="contact-info-item">
            <div class="contact-info-icon" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <div>
              <div class="contact-info-label">Address</div>
              <div class="contact-info-value">
                <?php echo htmlspecialchars($address['street']); ?><br>
                <?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?> <?php echo htmlspecialchars($address['zip']); ?>
              </div>
            </div>
          </div>

          <div class="contact-info-item">
            <div class="contact-info-icon" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <div>
              <div class="contact-info-label">Business Hours</div>
              <div class="contact-info-value">
                Mon–Fri: 8:00 AM – 6:00 PM<br>
                Saturday: 9:00 AM – 2:00 PM<br>
                Sunday: Closed
              </div>
            </div>
          </div>
        </div><!-- /.contact-info-card -->

        <!-- Map Placeholder -->
        <div class="map-placeholder" role="img" aria-label="Service area map — Carroll County, Georgia">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          <strong>Carroll County &amp; West Georgia</strong>
          <p>Serving Bowdon, Carrollton, Villa Rica, Bremen, Temple, and surrounding communities within ~50 miles.</p>
          <a href="/service-area/" style="color:var(--color-accent);font-size:0.85rem;font-weight:600;text-decoration:underline;text-underline-offset:2px;">View Full Service Area →</a>
        </div>

        <!-- Trust Strip -->
        <div class="contact-trust-strip">
          <h3>Why Homeowners Call Us First</h3>
          <ul class="trust-items">
            <li>Free, no-obligation estimates — every time</li>
            <li>Licensed and insured in Georgia</li>
            <li><?php echo $yearsInBusiness; ?> years serving Carroll County</li>
            <li>Respond within 1 business day</li>
            <li>No subcontractors — our own crew on every job</li>
            <li>Start dates confirmed at time of estimate</li>
          </ul>
        </div>

      </div><!-- /.contact-info-col -->
    </div><!-- /.contact-split -->
  </div><!-- /.container -->
</section>

<!-- ═══════════════════════════════════════════════════════════
     SECTION DIVIDER
═══════════════════════════════════════════════════════════ -->
<div class="divider-wave" aria-hidden="true">
  <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="fill:var(--color-bg-alt);display:block;width:100%;height:60px;">
    <path d="M0,30 C360,60 1080,0 1440,30 L1440,60 L0,60 Z"/>
  </svg>
</div>

<!-- ═══════════════════════════════════════════════════════════
     FAQ — Estimate Process
═══════════════════════════════════════════════════════════ -->
<section class="contact-faq-section" aria-labelledby="faq-heading">
  <div class="container">
    <div class="section-heading-group" data-animate="fade-up">
      <span class="eyebrow-label">Before You Reach Out</span>
      <h2 id="faq-heading">Common Questions About the Estimate Process</h2>
    </div>

    <div class="faq-list" data-animate="fade-up">
      <?php foreach ($contactFaqs as $faq): ?>
      <details class="faq-item">
        <summary class="faq-question"><?php echo htmlspecialchars($faq['q']); ?></summary>
        <div class="faq-answer">
          <p><?php echo htmlspecialchars($faq['a']); ?></p>
        </div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     CLOSING CTA (CTA #3)
═══════════════════════════════════════════════════════════ -->
<section class="contact-closing-cta" aria-labelledby="closing-cta-heading">
  <div class="container">
    <span class="eyebrow-label" data-animate="fade-up">No Pressure. No Obligation.</span>
    <h2 id="closing-cta-heading" data-animate="fade-up">A Free Estimate Is the Right<br>First Step for Any Project</h2>
    <p data-animate="fade-up">Whether you're planning a bathroom renovation, a full kitchen remodel, or just need new tile floors — the conversation costs nothing and tells you exactly what to expect.</p>
    <div class="btn-group" data-animate="fade-up">
      <a href="#contact-form-heading" class="btn-cta-primary" onclick="document.getElementById('name').focus();return false;">
        Fill Out the Form Above
      </a>
      <a href="/services/" class="btn-cta-secondary">Browse Services First →</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
