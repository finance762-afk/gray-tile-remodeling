<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Legal page identity ───────────────────────────────────────
$companyName       = $siteName;
$companyEntityType = 'Limited Liability Company';
$companyState      = 'Georgia';
$companyEmail      = $contactEmail;
$companyPhone      = $phone ?: $contactEmail;
$companyAddress    = $address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip'];
$lastUpdated       = 'April 24, 2026';

// ── Page Setup ────────────────────────────────────────────────
$pageTitle       = 'Accessibility | ' . $siteName;
$pageDescription = 'Accessibility statement for ' . $siteName . ' — our commitment to WCAG 2.1 AA compliance.';
$canonicalUrl    = $siteUrl . '/accessibility/';
$currentPage     = 'legal';

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'WebPage',
            '@id'   => $siteUrl . '/accessibility/',
            'url'   => $siteUrl . '/accessibility/',
            'name'  => 'Accessibility | ' . $siteName,
            'description' => 'Accessibility statement for ' . $siteName . ' — our commitment to WCAG 2.1 AA compliance.',
            'isPartOf' => ['@id' => $siteUrl . '/'],
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Accessibility', 'item' => $siteUrl . '/accessibility/'],
            ],
        ],
    ],
], JSON_UNESCAPED_SLASHES);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ── Legal Page Shared Styles ────────────────────── */

.legal-hero {
  min-height: 40vh;
  display: flex;
  align-items: flex-end;
  padding: var(--space-3xl) 0 var(--space-2xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative;
  overflow: hidden;
}

.legal-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse 60% 80% at 100% 50%, rgba(var(--color-accent-rgb), 0.12) 0%, transparent 60%);
  pointer-events: none;
}

.legal-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  pointer-events: none;
}

.legal-hero .container {
  position: relative;
  z-index: 1;
}

.legal-breadcrumb {
  display: flex;
  gap: var(--space-sm);
  align-items: center;
  font-family: var(--font-body);
  font-size: 0.85rem;
  color: rgba(255, 255, 255, 0.65);
  margin-bottom: var(--space-lg);
}

.legal-breadcrumb a {
  color: rgba(255, 255, 255, 0.65);
  text-decoration: none;
  transition: color var(--transition-base);
}

.legal-breadcrumb a:hover {
  color: var(--color-white);
}

.legal-breadcrumb span {
  color: rgba(255, 255, 255, 0.4);
}

.legal-hero h1 {
  font-family: var(--font-heading);
  color: var(--color-white);
  font-size: clamp(2rem, 5vw, 3.5rem);
  text-wrap: balance;
  font-weight: 800;
  letter-spacing: -0.02em;
  line-height: 1.15;
  position: relative;
  z-index: 1;
}

/* Content area */
.legal-content {
  padding: var(--space-4xl) 0;
  background: var(--color-bg);
}

.content-narrow {
  max-width: 800px;
  margin-inline: auto;
  padding-inline: var(--space-lg);
}

.content-narrow h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.3rem, 3vw, 1.8rem);
  color: var(--color-primary);
  margin-top: var(--space-3xl);
  margin-bottom: var(--space-md);
  text-wrap: balance;
  font-weight: 700;
  letter-spacing: -0.01em;
}

.content-narrow h3 {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  color: var(--color-primary);
  margin-top: var(--space-xl);
  margin-bottom: var(--space-sm);
  text-wrap: balance;
  font-weight: 600;
}

.content-narrow p,
.content-narrow li {
  font-family: var(--font-body);
  font-size: 1rem;
  line-height: 1.7;
  color: var(--color-text);
  margin-bottom: var(--space-md);
}

.content-narrow ul {
  padding-left: var(--space-xl);
  margin-bottom: var(--space-md);
}

.content-narrow a {
  color: var(--color-accent);
  text-decoration: underline;
}

.content-narrow a:hover {
  color: var(--color-primary);
}

.content-narrow a:focus-visible {
  outline: 2px solid var(--color-accent);
  outline-offset: 2px;
  border-radius: 2px;
}

.legal-updated {
  background: var(--color-bg-alt);
  border-left: 3px solid var(--color-accent);
  padding: var(--space-sm) var(--space-md);
  border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
  margin-bottom: var(--space-2xl);
  font-family: var(--font-body);
  font-size: 0.9rem;
  color: var(--color-text-light);
}

.legal-updated strong {
  color: var(--color-primary);
}

/* Conformance badge */
.a11y-badge {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: rgba(var(--color-accent-rgb), 0.1);
  border: 1px solid rgba(var(--color-accent-rgb), 0.3);
  color: var(--color-primary);
  font-family: var(--font-heading);
  font-size: 0.95rem;
  font-weight: 600;
  padding: var(--space-sm) var(--space-md);
  border-radius: var(--radius-md);
  margin-bottom: var(--space-lg);
}

.a11y-badge svg {
  color: var(--color-accent);
  flex-shrink: 0;
}

/* Feature grid */
.a11y-features {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-sm);
  margin-bottom: var(--space-lg);
}

@media (max-width: 600px) {
  .a11y-features { grid-template-columns: 1fr; }
}

.a11y-feature {
  display: flex;
  gap: var(--space-sm);
  align-items: flex-start;
  background: var(--color-bg-alt);
  border-radius: var(--radius-md);
  padding: var(--space-md);
  font-family: var(--font-body);
  font-size: 0.9rem;
  line-height: 1.5;
  color: var(--color-text);
}

.a11y-feature::before {
  content: '';
  flex-shrink: 0;
  width: 8px;
  height: 8px;
  background: var(--color-accent);
  border-radius: 50%;
  margin-top: 6px;
}

/* Known limitations box */
.a11y-limitations {
  background: rgba(var(--color-primary-rgb), 0.04);
  border: 1px solid rgba(var(--color-primary-rgb), 0.12);
  border-radius: var(--radius-md);
  padding: var(--space-lg);
  margin-bottom: var(--space-lg);
}

.a11y-limitations h3 {
  margin-top: 0;
}

/* Contact box */
.legal-contact-box {
  background: var(--color-bg-alt);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-md);
  padding: var(--space-xl) var(--space-lg);
  margin-top: var(--space-2xl);
}

.legal-contact-box h2 {
  margin-top: 0;
}

@media (max-width: 600px) {
  .content-narrow { padding-inline: var(--space-md); }
}
</style>

<!-- Hero -->
<section class="legal-hero" aria-labelledby="a11y-heading">
  <div class="container">
    <nav class="legal-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span aria-hidden="true">/</span>
      <span aria-current="page">Accessibility</span>
    </nav>
    <h1 id="a11y-heading">Accessibility</h1>
  </div>
</section>

<!-- Content -->
<section class="legal-content">
  <div class="content-narrow" id="main-content">

    <div class="legal-updated">
      <strong>Last Updated:</strong> <?php echo htmlspecialchars($lastUpdated); ?>
    </div>

    <h2>Our Commitment</h2>

    <div class="a11y-badge" aria-label="WCAG 2.1 Level AA conformance target">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
      WCAG 2.1 Level AA Target
    </div>

    <p><?php echo htmlspecialchars($companyName); ?> is committed to ensuring that our website is accessible to everyone, including people with disabilities. We strive to conform to the Web Content Accessibility Guidelines (WCAG) 2.1 Level AA, published by the World Wide Web Consortium (W3C). These guidelines explain how to make web content more accessible to people with disabilities, including visual, auditory, physical, speech, cognitive, language, learning, and neurological disabilities.</p>

    <h2>Accessibility Features</h2>
    <p>Our website includes the following accessibility features:</p>

    <div class="a11y-features" role="list">
      <div class="a11y-feature" role="listitem">Semantic HTML5 structure with proper heading hierarchy</div>
      <div class="a11y-feature" role="listitem">Skip-to-main-content link at the top of every page</div>
      <div class="a11y-feature" role="listitem">ARIA labels and landmark roles (nav, main, footer) throughout</div>
      <div class="a11y-feature" role="listitem">Full keyboard navigation — all interactive elements reachable via Tab</div>
      <div class="a11y-feature" role="listitem">Visible focus indicators for keyboard users on all interactive elements</div>
      <div class="a11y-feature" role="listitem">Color contrast meeting WCAG AA (4.5:1 body text, 3:1 large text)</div>
      <div class="a11y-feature" role="listitem">Descriptive alt text on all meaningful images</div>
      <div class="a11y-feature" role="listitem">Text resizable up to 200% without loss of content or functionality</div>
      <div class="a11y-feature" role="listitem">Reduced motion support via <code>prefers-reduced-motion</code> CSS media query</div>
      <div class="a11y-feature" role="listitem">All form inputs have associated visible labels</div>
      <div class="a11y-feature" role="listitem">Clear, descriptive error messages on required form fields</div>
      <div class="a11y-feature" role="listitem"><code>aria-expanded</code> states on interactive menus and toggles</div>
    </div>

    <div class="a11y-limitations">
      <h3>Known Limitations</h3>
      <p>While we strive for full WCAG 2.1 AA conformance, some third-party content embedded on our site may not fully conform to all accessibility guidelines:</p>
      <ul>
        <li><strong>Google Maps embeds</strong> — Interactive maps provided by Google LLC may have limited keyboard accessibility and ARIA support. We include address information in plain text on all relevant pages as an alternative.</li>
        <li><strong>Third-party scripts</strong> — CDN-delivered libraries (icon fonts, carousel scripts) are sourced from external providers and their accessibility is outside our direct control.</li>
      </ul>
      <p>We are actively working to identify and address accessibility gaps. If you encounter a barrier, please contact us using the information below.</p>
    </div>

    <h2>Feedback and Assistance</h2>
    <p>We welcome feedback on the accessibility of our website. If you experience any difficulty accessing content, encounter an accessibility barrier, or have a suggestion for improvement, please reach out:</p>
    <ul>
      <li>Email: <a href="mailto:<?php echo htmlspecialchars($companyEmail); ?>"><?php echo htmlspecialchars($companyEmail); ?></a></li>
      <?php if ($phone): ?>
      <li>Phone: <a href="tel:<?php echo htmlspecialchars($phone); ?>"><?php echo htmlspecialchars(formatPhone($phone)); ?></a></li>
      <?php endif; ?>
    </ul>
    <p>We aim to respond to accessibility feedback within 5 business days. We will work with you to provide the information, service, or transaction you need through an accessible format.</p>

    <h2>Enforcement</h2>
    <p>Our accessibility efforts are guided by the following legal frameworks:</p>
    <ul>
      <li><strong>Americans with Disabilities Act (ADA), Title III</strong> — Prohibits discrimination on the basis of disability in places of public accommodation. Courts have increasingly applied Title III to websites.</li>
      <li><strong>Section 508 of the Rehabilitation Act</strong> — Requires electronic and information technology developed or maintained by federal agencies to be accessible. We apply these standards as best practice.</li>
      <li><strong>State accessibility laws</strong> — Various states, including <?php echo htmlspecialchars($companyState); ?>, have additional regulations that may apply. We monitor and respond to applicable requirements.</li>
    </ul>

    <div class="legal-contact-box">
      <h2>Contact Us</h2>
      <p>To report an accessibility issue or request accessible content, contact us directly:</p>
      <p>
        <strong><?php echo htmlspecialchars($companyName); ?></strong><br>
        <?php echo htmlspecialchars($companyAddress); ?><br>
        Email: <a href="mailto:<?php echo htmlspecialchars($companyEmail); ?>"><?php echo htmlspecialchars($companyEmail); ?></a><br>
        <?php if ($phone): ?>Phone: <a href="tel:<?php echo htmlspecialchars($phone); ?>"><?php echo htmlspecialchars(formatPhone($phone)); ?></a><?php endif; ?>
      </p>
    </div>

  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
