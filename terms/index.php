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
$pageTitle       = 'Terms of Service | ' . $siteName;
$pageDescription = 'Terms of Service for ' . $siteName . ' — terms governing your use of our website and services.';
$canonicalUrl    = $siteUrl . '/terms/';
$currentPage     = 'legal';

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'WebPage',
            '@id'   => $siteUrl . '/terms/',
            'url'   => $siteUrl . '/terms/',
            'name'  => 'Terms of Service | ' . $siteName,
            'description' => 'Terms of Service for ' . $siteName . ' — terms governing your use of our website and services.',
            'isPartOf' => ['@id' => $siteUrl . '/'],
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Terms of Service', 'item' => $siteUrl . '/terms/'],
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

.content-narrow ul,
.content-narrow ol {
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
<section class="legal-hero" aria-labelledby="terms-heading">
  <div class="container">
    <nav class="legal-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span aria-hidden="true">/</span>
      <span aria-current="page">Terms of Service</span>
    </nav>
    <h1 id="terms-heading">Terms of Service</h1>
  </div>
</section>

<!-- Content -->
<section class="legal-content">
  <div class="content-narrow" id="main-content">

    <div class="legal-updated">
      <strong>Last Updated:</strong> <?php echo htmlspecialchars($lastUpdated); ?>
    </div>

    <h2>Acceptance of Terms</h2>
    <p>By accessing or using the <?php echo htmlspecialchars($companyName); ?> website, you agree to be bound by these Terms of Service. <?php echo htmlspecialchars($companyName); ?> is a <?php echo htmlspecialchars($companyEntityType); ?> formed in the State of <?php echo htmlspecialchars($companyState); ?>. If you do not agree to these terms, please do not use our website. These terms constitute a binding legal agreement between you and <?php echo htmlspecialchars($companyName); ?>.</p>

    <h2>Description of Services</h2>
    <p>This website provides informational content about <?php echo htmlspecialchars($companyName); ?>'s tile installation and home remodeling services in Bowdon, Georgia and surrounding areas. The information provided is for general informational purposes only. Service availability, pricing, and scope are subject to change without notice and must be confirmed directly with our team prior to any project commencement.</p>

    <h2>Use of This Website</h2>
    <p>You agree to use this website only for lawful purposes. Prohibited uses include:</p>
    <ul>
      <li>Attempting to gain unauthorized access to any portion of the website or its underlying systems</li>
      <li>Scraping, crawling, or harvesting data from this website without express written permission</li>
      <li>Transmitting defamatory, harassing, abusive, fraudulent, or otherwise objectionable content through any website contact form or communication channel</li>
      <li>Interfering with or disrupting the integrity or performance of the website or its infrastructure</li>
      <li>Impersonating any person or entity or misrepresenting your affiliation with a person or entity</li>
    </ul>

    <h2>Intellectual Property</h2>
    <p>All content on this website — including text, photographs, graphics, logos, and design elements — is the property of <?php echo htmlspecialchars($companyName); ?> or its content licensors and is protected under United States copyright law. You may not reproduce, distribute, modify, or create derivative works from any content on this site without express written permission from <?php echo htmlspecialchars($companyName); ?>.</p>

    <h2>User Submissions</h2>
    <p>When you submit information through our contact or estimate request forms, you represent that the information you provide is accurate and truthful to the best of your knowledge. By submitting content such as project descriptions or testimonials, you grant <?php echo htmlspecialchars($companyName); ?> a non-exclusive, royalty-free license to use that content for legitimate business operations, including but not limited to responding to your inquiry and, with your permission, featuring feedback in marketing materials.</p>

    <h2>Estimates and Pricing</h2>
    <p>Any cost ranges, project timelines, or estimates referenced on this website are for general informational purposes only and do not constitute a binding quote or contract. Final pricing is determined only after an in-person site assessment and will be provided in a written estimate. <?php echo htmlspecialchars($companyName); ?> reserves the right to decline any project for any lawful reason.</p>

    <h2>Service Disclaimers</h2>
    <p>This website and all content are provided on an "AS IS" basis without warranties of any kind, either express or implied, including but not limited to warranties of merchantability, fitness for a particular purpose, or non-infringement. <?php echo htmlspecialchars($companyName); ?> does not warrant that the website will be uninterrupted, error-free, or free of viruses or other harmful components.</p>

    <h2>Limitation of Liability</h2>
    <p>To the fullest extent permitted by applicable law, <?php echo htmlspecialchars($companyName); ?> shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from your use of this website or reliance on any information presented herein. In no event shall our total liability to you for any claim arising from these Terms exceed the amounts paid by you to <?php echo htmlspecialchars($companyName); ?> in the twelve (12) months preceding the claim.</p>

    <h2>Indemnification</h2>
    <p>You agree to indemnify, defend, and hold harmless <?php echo htmlspecialchars($companyName); ?>, its owners, employees, contractors, and agents from and against any claims, liabilities, damages, judgments, awards, losses, costs, expenses, or fees (including reasonable attorneys' fees) arising out of or relating to your violation of these Terms of Service or your use of this website.</p>

    <h2>Governing Law</h2>
    <p>These Terms of Service shall be governed by and construed in accordance with the laws of the State of <?php echo htmlspecialchars($companyState); ?>, without regard to its conflict of law principles. Any dispute arising from these Terms shall be subject to the exclusive jurisdiction of the state and federal courts located in <?php echo htmlspecialchars($companyState); ?>.</p>

    <h2>Changes to These Terms</h2>
    <p>We reserve the right to update or modify these Terms of Service at any time. Material changes will be reflected by an updated "Last Updated" date at the top of this page. Continued use of the website following any changes constitutes your acceptance of the revised Terms.</p>

    <h2>Severability</h2>
    <p>If any provision of these Terms is found to be unenforceable or invalid under applicable law, that provision will be modified to the minimum extent necessary to make it enforceable, and the remaining provisions will continue in full force and effect.</p>

    <h2>Entire Agreement</h2>
    <p>These Terms of Service, together with our Privacy Policy and Cookie Policy, constitute the entire agreement between you and <?php echo htmlspecialchars($companyName); ?> with respect to your use of this website and supersede all prior agreements, representations, and understandings.</p>

    <div class="legal-contact-box">
      <h2>Contact Us</h2>
      <p>Questions about these Terms of Service may be directed to us at:</p>
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
